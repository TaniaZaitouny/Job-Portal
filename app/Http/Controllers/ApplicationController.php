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
use App\Models\User;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApplicationController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Job $job)
    {
        //$this->authorize('create', Application::class);
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
        //$this->authorize('delete', $application);
        $application->delete();
    }

    public function postApplicants(Request $request, Job $post) 
    {
        //$this->authorize('view', $post);
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

    public function filter(Request $request, Job $post) {
        $applicantIds = Application::where('job_id', $post->id)->pluck('user_id')->toArray();
        $applicants = array();

        $country = $request->input('country');
        $experience = $request->input('experience');
        $certificates = $request->input('certificate');
        $certificates = array_filter($certificates, function($value) {
            return !is_null($value) && strlen($value) > 0;
        });

        if($country) {
            $countryIds = Contact::where('country', $country)->pluck('user_id')->toArray();
        }
        
        if($experience) {
            $experienceIds = Information::where('experience', $experience)->pluck('user_id')->toArray();
        }
        
        if($certificates) {
            $certificateIds = DB::table('users')
                    ->select('id')
                    ->where(function($query) use ($certificates) {
                                foreach ($certificates as $certificate) {
                                    $query->whereExists(function($query) use ($certificate) {
                                        $query->select(DB::raw(1))
                                        ->from('education')
                                        ->whereRaw('education.user_id = users.id')
                                        ->where('education.certificate_name', '=', $certificate);
                                    });
                                }
                    })
                    ->get()
                    ->pluck('id')
                    ->toArray();
        }

        if($country && $experience && $certificates) {
            $ids = array_intersect($applicantIds, $countryIds, $experienceIds, $certificateIds);
        }
        else if($country && $experience) {
            $ids = array_intersect($applicantIds, $countryIds, $experienceIds);
        }
        else if($experience && $certificates) {
            $ids = array_intersect($applicantIds, $experienceIds, $certificateIds);
        }
        else if($country && $certificates) {
            $ids = array_intersect($applicantIds, $countryIds, $certificateIds);
        }
        else if($country) {
            $ids = array_intersect($applicantIds, $countryIds);
        }
        else if($experience) {
            $ids = array_intersect($applicantIds, $experienceIds);
        }
        else if($certificates) {
            $ids = array_intersect($applicantIds, $certificateIds);
        }
        else {
            $ids = $applicantIds;
        }
        

        $users = User::whereIn('id', $ids)->get();

        foreach($users as $user) {
            $applicant = array();

            $applicant['id'] = $user->user_id;
            if($user->bid) {
                $applicant['bid'] = $user->bid;
            }
            else {
                $applicant['bid'] = 0;
            }

            $information = Information::where('user_id', $user->id)->first();
            $applicant['first_name'] = $information->first_name;
            $applicant['last_name'] = $information->last_name;
            $applicant['experience'] = $information->experience;

            $contact = Contact::where('user_id', $user->id)->first();
            $applicant['country'] = $contact->country;

            $applicants[] = $applicant;
        }

        $countries = Country::all();

        return view('applicants', compact('post', 'applicants', 'countries', 'experience', 'country', 'certificates'));
    }
}
