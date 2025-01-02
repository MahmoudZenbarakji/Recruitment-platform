<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSkilRequest;
use App\Http\Requests\UpdateSkilRequest;
use App\Http\Resources\Admin\SkilResource;
use App\Models\Skil;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SkilsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('skil_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SkilResource(Skil::all());
    }

    public function store(StoreSkilRequest $request)
    {
        $skil = Skil::create($request->all());

        return (new SkilResource($skil))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Skil $skil)
    {
        abort_if(Gate::denies('skil_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SkilResource($skil);
    }

    public function update(UpdateSkilRequest $request, Skil $skil)
    {
        $skil->update($request->all());

        return (new SkilResource($skil))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Skil $skil)
    {
        abort_if(Gate::denies('skil_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $skil->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
