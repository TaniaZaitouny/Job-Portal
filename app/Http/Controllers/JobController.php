<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = \App\Models\Job::all();
        return view('joblisting',compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobposting_form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $job = new Job();
        $job->company_id = "123";
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
    public function show(string $id)
    {
        //
        $job = Job::find($id);
        return view("jobdetails",['job'=>$job]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
