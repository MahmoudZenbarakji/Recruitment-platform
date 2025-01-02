<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyApplicatntRequest;
use App\Http\Requests\StoreApplicatntRequest;
use App\Http\Requests\UpdateApplicatntRequest;
use App\Models\Applicatnt;
use App\Models\Cv;
use App\Models\Nationality;
use App\Models\Salary;
use App\Models\Skil;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ApplicatntController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('applicatnt_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $applicatnts = Applicatnt::with(['user', 'salary', 'nationality', 'cvs', 'skills', 'media'])->get();

        return view('admin.applicatnts.index', compact('applicatnts'));
    }

    public function create()
    {
        abort_if(Gate::denies('applicatnt_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $salaries = Salary::pluck('range', 'id')->prepend(trans('global.pleaseSelect'), '');

        $nationalities = Nationality::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cvs = Cv::pluck('is_main', 'id');

        $skills = Skil::pluck('name', 'id');

        return view('admin.applicatnts.create', compact('cvs', 'nationalities', 'salaries', 'skills', 'users'));
    }

    public function store(StoreApplicatntRequest $request)
    {
        $applicatnt = Applicatnt::create($request->all());
        $applicatnt->cvs()->sync($request->input('cvs', []));
        $applicatnt->skills()->sync($request->input('skills', []));
        if ($request->input('image', false)) {
            $applicatnt->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $applicatnt->id]);
        }

        return redirect()->route('admin.applicatnts.index');
    }

    public function edit(Applicatnt $applicatnt)
    {
        abort_if(Gate::denies('applicatnt_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $salaries = Salary::pluck('range', 'id')->prepend(trans('global.pleaseSelect'), '');

        $nationalities = Nationality::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cvs = Cv::pluck('is_main', 'id');

        $skills = Skil::pluck('name', 'id');

        $applicatnt->load('user', 'salary', 'nationality', 'cvs', 'skills');

        return view('admin.applicatnts.edit', compact('applicatnt', 'cvs', 'nationalities', 'salaries', 'skills', 'users'));
    }

    public function update(UpdateApplicatntRequest $request, Applicatnt $applicatnt)
    {
        $applicatnt->update($request->all());
        $applicatnt->cvs()->sync($request->input('cvs', []));
        $applicatnt->skills()->sync($request->input('skills', []));
        if ($request->input('image', false)) {
            if (! $applicatnt->image || $request->input('image') !== $applicatnt->image->file_name) {
                if ($applicatnt->image) {
                    $applicatnt->image->delete();
                }
                $applicatnt->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($applicatnt->image) {
            $applicatnt->image->delete();
        }

        return redirect()->route('admin.applicatnts.index');
    }

    public function show(Applicatnt $applicatnt)
    {
        abort_if(Gate::denies('applicatnt_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $applicatnt->load('user', 'salary', 'nationality', 'cvs', 'skills', 'applicantReviews', 'applicantApplications');

        return view('admin.applicatnts.show', compact('applicatnt'));
    }

    public function destroy(Applicatnt $applicatnt)
    {
        abort_if(Gate::denies('applicatnt_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $applicatnt->delete();

        return back();
    }

    public function massDestroy(MassDestroyApplicatntRequest $request)
    {
        $applicatnts = Applicatnt::find(request('ids'));

        foreach ($applicatnts as $applicatnt) {
            $applicatnt->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('applicatnt_create') && Gate::denies('applicatnt_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Applicatnt();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
