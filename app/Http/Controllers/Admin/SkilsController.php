<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySkilRequest;
use App\Http\Requests\StoreSkilRequest;
use App\Http\Requests\UpdateSkilRequest;
use App\Models\Skil;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SkilsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('skil_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $skils = Skil::all();

        return view('admin.skils.index', compact('skils'));
    }

    public function create()
    {
        abort_if(Gate::denies('skil_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.skils.create');
    }

    public function store(StoreSkilRequest $request)
    {
        $skil = Skil::create($request->all());

        return redirect()->route('admin.skils.index');
    }

    public function edit(Skil $skil)
    {
        abort_if(Gate::denies('skil_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.skils.edit', compact('skil'));
    }

    public function update(UpdateSkilRequest $request, Skil $skil)
    {
        $skil->update($request->all());

        return redirect()->route('admin.skils.index');
    }

    public function show(Skil $skil)
    {
        abort_if(Gate::denies('skil_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $skil->load('skillsJobs', 'skillsApplicatnts');

        return view('admin.skils.show', compact('skil'));
    }

    public function destroy(Skil $skil)
    {
        abort_if(Gate::denies('skil_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $skil->delete();

        return back();
    }

    public function massDestroy(MassDestroySkilRequest $request)
    {
        $skils = Skil::find(request('ids'));

        foreach ($skils as $skil) {
            $skil->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
