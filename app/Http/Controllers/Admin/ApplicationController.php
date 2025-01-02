<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyApplicationRequest;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use App\Models\Application;
use App\Models\Applicatnt;
use App\Models\Job;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApplicationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('application_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $applications = Application::with(['job', 'applicant'])->get();

        return view('admin.applications.index', compact('applications'));
    }

    public function create()
    {
        abort_if(Gate::denies('application_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobs = Job::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $applicants = Applicatnt::pluck('full_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.applications.create', compact('applicants', 'jobs'));
    }

    public function store(StoreApplicationRequest $request)
    {
        $application = Application::create($request->all());

        return redirect()->route('admin.applications.index');
    }

    public function edit(Application $application)
    {
        abort_if(Gate::denies('application_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobs = Job::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $applicants = Applicatnt::pluck('full_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $application->load('job', 'applicant');

        return view('admin.applications.edit', compact('applicants', 'application', 'jobs'));
    }

    public function update(UpdateApplicationRequest $request, Application $application)
    {
        $application->update($request->all());

        return redirect()->route('admin.applications.index');
    }

    public function show(Application $application)
    {
        abort_if(Gate::denies('application_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $application->load('job', 'applicant');

        return view('admin.applications.show', compact('application'));
    }

    public function destroy(Application $application)
    {
        abort_if(Gate::denies('application_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $application->delete();

        return back();
    }

    public function massDestroy(MassDestroyApplicationRequest $request)
    {
        $applications = Application::find(request('ids'));

        foreach ($applications as $application) {
            $application->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
