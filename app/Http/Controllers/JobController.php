<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::all();
        return view('joblisting', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Job::class);
        return view('jobposting_form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Job::class);
        $job = new Job();
        $job->company_id = Auth::user()->id;
        $job->title = $request->input('title');
        $job->location = $request->input('location');
        $job->description = $request->input('description');
        $job->requirements = $request->input('requirements');
        $job->workspace = $request->input('workspace');
        $job->employment = $request->input('employment');
        $job->category = $request->input('category');
        $job->salary = $request->input('salary');
        $job->save();
    }
 
    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return view("jobdetails", ['job' => $job]);
    }

    /**search jobs according to input search key */
    public function searchJob(Request $request)
    { 
        if ($search = $request->search) {
            $jobs = Job::where('title', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%')
                        ->orWhere('requirements', 'like', '%' . $search . '%')
                        ->get();
      
            return view('joblisting',compact('jobs'));
        }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        $this->authorize('update', $job);
        return view('jobposting_form', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        $this->authorize('update', $job);
        $job->title = $request->input('title');
        $job->location = $request->input('location');
        $job->description = $request->input('description');
        $job->requirements = $request->input('requirements');
        $job->workspace = $request->input('workspace');
        $job->employment = $request->input('employment');
        $job->category = $request->input('category');
        $job->salary = $request->input('salary');
        $job->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        $this->authorize('delete', $job);
    }
}
