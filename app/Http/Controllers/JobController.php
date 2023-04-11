<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JobController extends Controller
{

    // public function __construct()
    // {
    //     $this->authorizeResource(Job::class, 'job');
    // }


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
        $job->user_id = "1";
        $job->save();
    }
 
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $job = Job::find($id);
        if($job)
        {
        return view("jobdetails",['job'=>$job]);
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        //
    }



    /*function to calculate total number of jobs in a category */
    public function jobs_per_category()
    {
       
        $categories = Job::pluck('category')->toArray();
        $arr = [];
        if($categories)
        {
            $arr = array_count_values($categories);
            arsort($arr);
        }
        return view('home', ['categories' => $arr]);
    }


    
}
