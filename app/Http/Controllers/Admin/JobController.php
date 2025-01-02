<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyJobRequest;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Company;
use App\Models\Job;
use App\Models\JobType;
use App\Models\Salary;
use App\Models\Skil;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JobController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('job_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobs = Job::with(['type', 'salary', 'company', 'skills'])->get();

        return view('admin.jobs.index', compact('jobs'));
    }

    public function create()
    {
        abort_if(Gate::denies('job_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $types = JobType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $salaries = Salary::pluck('range', 'id')->prepend(trans('global.pleaseSelect'), '');

        $companies = Company::pluck('company_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $skills = Skil::pluck('name', 'id');

        return view('admin.jobs.create', compact('companies', 'salaries', 'skills', 'types'));
    }

    public function store(StoreJobRequest $request)
    {
        $job = Job::create($request->all());
        $job->skills()->sync($request->input('skills', []));

        return redirect()->route('admin.jobs.index');
    }

    public function edit(Job $job)
    {
        abort_if(Gate::denies('job_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $types = JobType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $salaries = Salary::pluck('range', 'id')->prepend(trans('global.pleaseSelect'), '');

        $companies = Company::pluck('company_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $skills = Skil::pluck('name', 'id');

        $job->load('type', 'salary', 'company', 'skills');

        return view('admin.jobs.edit', compact('companies', 'job', 'salaries', 'skills', 'types'));
    }

    public function update(UpdateJobRequest $request, Job $job)
    {
        $job->update($request->all());
        $job->skills()->sync($request->input('skills', []));

        return redirect()->route('admin.jobs.index');
    }

    public function show(Job $job)
    {
        abort_if(Gate::denies('job_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $job->load('type', 'salary', 'company', 'skills', 'jobApplications');

        return view('admin.jobs.show', compact('job'));
    }

    public function destroy(Job $job)
    {
        abort_if(Gate::denies('job_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $job->delete();

        return back();
    }

    public function massDestroy(MassDestroyJobRequest $request)
    {
        $jobs = Job::find(request('ids'));

        foreach ($jobs as $job) {
            $job->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
