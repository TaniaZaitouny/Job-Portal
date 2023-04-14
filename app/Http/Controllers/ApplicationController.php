<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Education;
use App\Models\Information;
use App\Models\Job;
use App\Models\Skill;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Job $job)
    {
        $this->authorize('create', Application::class);
        $application = new Application();
        $application->user_id = Auth::user()->id;
        $application->job_id = $job->id;
        if($request->input('bid')) {
            $application->bid = $request->input('bid');
        }
        $application->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        $this->authorize('delete', $application);
        $application->delete();
    }

    public function postApplicants(Request $request, Job $post) 
    {
        $this->authorize('view', $post);
        $users = Application::where('job_id', $post->id)->get();
        $applicants = array();

        foreach($users as $user) {
            $applicant = array();

            $applicant['id'] = $user->user_id;
            if($user->bid) {
                $applicant['bid'] = $user->bid;
            }
            else {
                $applicant['bid'] = 0;
            }

            $information = Information::where('user_id', $user->user_id)->first();
            $applicant['first_name'] = $information->first_name;
            $applicant['last_name'] = $information->last_name;
            $applicant['experience'] = $information->experience;

            $contact = Contact::where('user_id', $user->user_id)->first();
            $applicant['country'] = $contact->country;

            $applicants[] = $applicant;
        }

        $categories = Category::all();
        $countries = Country::all();

        return view('applicants', compact('post', 'applicants', 'categories', 'countries'));
    }
}
