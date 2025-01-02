<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreApplicatntRequest;
use App\Http\Requests\UpdateApplicatntRequest;
use App\Http\Resources\Admin\ApplicatntResource;
use App\Models\Applicatnt;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApplicatntApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('applicatnt_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ApplicatntResource(Applicatnt::with(['user', 'salary', 'nationality', 'cvs', 'skills'])->get());
    }

    public function store(StoreApplicatntRequest $request)
    {
        $applicatnt = Applicatnt::create($request->all());
        $applicatnt->cvs()->sync($request->input('cvs', []));
        $applicatnt->skills()->sync($request->input('skills', []));
        if ($request->input('image', false)) {
            $applicatnt->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        return (new ApplicatntResource($applicatnt))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Applicatnt $applicatnt)
    {
        abort_if(Gate::denies('applicatnt_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ApplicatntResource($applicatnt->load(['user', 'salary', 'nationality', 'cvs', 'skills']));
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

        return (new ApplicatntResource($applicatnt))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Applicatnt $applicatnt)
    {
        abort_if(Gate::denies('applicatnt_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $applicatnt->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
