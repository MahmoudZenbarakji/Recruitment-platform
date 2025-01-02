<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreCvRequest;
use App\Http\Requests\UpdateCvRequest;
use App\Http\Resources\Admin\CvResource;
use App\Models\Cv;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CvApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('cv_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CvResource(Cv::all());
    }

    public function store(StoreCvRequest $request)
    {
        $cv = Cv::create($request->all());

        if ($request->input('cv', false)) {
            $cv->addMedia(storage_path('tmp/uploads/' . basename($request->input('cv'))))->toMediaCollection('cv');
        }

        return (new CvResource($cv))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Cv $cv)
    {
        abort_if(Gate::denies('cv_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CvResource($cv);
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

        return (new CvResource($cv))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Cv $cv)
    {
        abort_if(Gate::denies('cv_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cv->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
