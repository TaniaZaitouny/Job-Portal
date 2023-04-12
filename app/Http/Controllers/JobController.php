<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Job;
use App\Models\User;
use App\Models\SavedJob;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use PHPUnit\Framework\Constraint\Count;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  
        
         $categories = Category::all();
         $countries = Country::all();
        $jobs = Job::paginate(5);
        return view('joblisting', compact('jobs', 'categories', 'countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Job::class);
        $categories = Category::all();
        $countries = Country::all();
        return view('jobposting_form', compact('categories', 'countries'));
        
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
        $job->country=$request->input('country');
        $job->location = $request->input('location');
        $job->description = $request->input('description');
        $job->requirements = $request->input('requirements');
        $job->workspace = $request->input('workspace');
        $job->employment = $request->input('employment');
        $job->category = $request->input('category');
        $job->salary = $request->input('salary');
        $job->save();
        return redirect()->route('jobs.index');
    }
 
    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return view("jobdetails", ['job' => $job]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    
    public function edit(Job $job)
    {
        $this->authorize('update', $job);
        $categories = Category::all();
        $countries = Country::all();
        return view('jobposting_form', compact('job', 'categories', 'countries'));
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

    /**
     * Search for jobs according to input search key 
     */
    public function searchJob(Request $request)
    { 
        $categories = Category::all();
        $countries = Country::all();
        
        if ($search = $request->search) {
            $jobs = Job::where('title', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%')
                        ->orWhere('requirements', 'like', '%' . $search . '%')
                        ->paginate(5);
            
         return view('joblisting', compact('jobs', 'categories', 'countries'));
        }
    }

    /** 
     * Calculate total number of jobs in a category 
     */
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

    /** 
     * Display categories
     */
    public function display_category($name)
    {
        $categories = Category::all();
        $countries = Country::all();
        $jobs = Job::where('category',$name)->paginate(5);
        return view('joblisting', compact('jobs', 'categories', 'countries'));
    }

    /** 
     * Add a job to the saved jobs table
     */
    public function save(Request $request, Job $job)    
    {
        $user = Auth::user();
        $savedJob = SavedJob::where('user_id', $user->id)->where('job_id', $job->id)->first();

        if (!$savedJob) {
            // the job is not already saved, so add it to the user's saved jobs
            $savedJob = new SavedJob();
            $savedJob->user_id = $user->id;
            $savedJob->job_id = $job->id;
            $savedJob->save();
        }
        else {
            // the job is already saved, so delete it from the user's saved jobs
            $savedJob->delete();
        }

        return redirect()->back();
    }

    /** 
     * Filter jobs
     */
    public function filter(Request $request)
    {
     
        $categories = Category::all();
        $countries = Country::all();
        $category = $request->input('select_category');
        $type = $request->input('employement_type');
        $country = $request->input('select_country');
        $jobs = Job::query();
        if(!is_null($category))
        {
            $jobs->where('category', $category);
        }
        if(!is_null($type))
        {
            $jobs->where('employment', $type);
        }
        if(!is_null($country))
        {
            $jobs->where('country', $country);
        }
        $jobs = $jobs->paginate(5);
       
        return view('joblisting', compact('jobs', 'categories', 'countries'));
        
    }

    
}
