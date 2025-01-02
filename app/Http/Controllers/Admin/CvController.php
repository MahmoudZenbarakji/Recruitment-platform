<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCvRequest;
use App\Http\Requests\StoreCvRequest;
use App\Http\Requests\UpdateCvRequest;
use App\Models\Cv;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CvController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('cv_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cvs = Cv::with(['media'])->get();

        return view('admin.cvs.index', compact('cvs'));
    }

    public function create()
    {
        abort_if(Gate::denies('cv_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cvs.create');
    }

    public function store(StoreCvRequest $request)
    {
        $cv = Cv::create($request->all());

        if ($request->input('cv', false)) {
            $cv->addMedia(storage_path('tmp/uploads/' . basename($request->input('cv'))))->toMediaCollection('cv');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $cv->id]);
        }

        return redirect()->route('admin.cvs.index');
    }

    public function edit(Cv $cv)
    {
        abort_if(Gate::denies('cv_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cvs.edit', compact('cv'));
    }

    public function update(UpdateCvRequest $request, Cv $cv)
    {
        $cv->update($request->all());

        if ($request->input('cv', false)) {
            if (! $cv->cv || $request->input('cv') !== $cv->cv->file_name) {
                if ($cv->cv) {
                    $cv->cv->delete();
                }
                $cv->addMedia(storage_path('tmp/uploads/' . basename($request->input('cv'))))->toMediaCollection('cv');
            }
        } elseif ($cv->cv) {
            $cv->cv->delete();
        }

        return redirect()->route('admin.cvs.index');
    }

    public function show(Cv $cv)
    {
        abort_if(Gate::denies('cv_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cv->load('cvApplicatnts');

        return view('admin.cvs.show', compact('cv'));
    }

    public function destroy(Cv $cv)
    {
        abort_if(Gate::denies('cv_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cv->delete();

        return back();
    }

    public function massDestroy(MassDestroyCvRequest $request)
    {
        $cvs = Cv::find(request('ids'));

        foreach ($cvs as $cv) {
            $cv->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('cv_create') && Gate::denies('cv_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Cv();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
