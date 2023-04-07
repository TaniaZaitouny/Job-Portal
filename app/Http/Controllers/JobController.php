<?php

namespace App\Http\Controllers;
use App\Models\Job;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JobController extends Controller
{
    public function index()
    {
        return view('jobposting_form');
    }
    public function store(){
        $job = new Job();
        $job->company_id = "123";
        $job->title = request('title');
        $job->location = request('location');
        $job->description = request('description');
        $job->requirements = request('requirements');
        $job->workspace = request('workspace');
        $job->employment = request('employment');
        $job->category = "Tech";
        $job->salary = request('salary');
        $job->save();
      
    }
    public function listjob()
    {
     
        $jobs = \App\Models\Job::all();
        return view('joblisting',compact('jobs'));
      
    }
}
