<?php

namespace App\Http\Controllers;
use App\Models\Information;
use App\Models\Skill;
use Carbon\Carbon;

use App\Models\Contact;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CvController extends Controller
{
    public function store(Request $request)
    {
        $userId = Auth::id();

        $this->authorize('create', Contact::class);
        $contact = new Contact();
        $contact->country = $request->input('country');
        $contact->state = $request->input('state');
        $contact->city = $request->input('city');
        $contact->phone = $request->input('phone');
        $contact->address = $request->input('address');
        $contact->user_id=$userId;
        $contact->save();
        $this->authorize('create', Information::class);
        $information = new Information();
        $information->first_name = $request->input('first_name');
        $information->middle_name = $request->input('middle_name');
        $information->last_name = $request->input('last_name');
        // $birthday = Carbon::createFromFormat('d-m-Y', $request->input('birthday'));
       
      

        $information->birthday = $birthday;
        $information->gender = $request->input('gender');
        $information->user_id=$userId;
        // $information->user()->associate($request->user());
        $information->save();
        $this->authorize('create', Skill::class);
        $skill = new Skill();
        $skill->skill = $request->input('skill');
        $skill->user_id=$userId;
        $skill->save();
        // $skill->user()->associate($request->user());
        
        $this->authorize('create', Education::class);
        $education = new Education();
        $education->certificate_name = $request->input('certificate_name');
        $education->year = $request->input('year');
        $education->user_id=$userId;
        $education->save();
        // $education->user()->associate($request->user());
    }
}
