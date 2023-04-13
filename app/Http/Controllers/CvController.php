<?php

namespace App\Http\Controllers;
use App\Models\Information;
use App\Models\Skill;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Models\Contact;
use App\Models\Education;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CvController extends Controller
{

    public function create() 
    {
        $this->authorize('create', Information::class);
        return view('cv');
    }

    public function store(Request $request)
    {
        $userId = Auth::user()->id;
        // $validator = Validator::make($request->all(), [
        //     'first_name' => 'required|string|max:255',
        //     'middle_name' => 'nullable|string|max:255',
        //     'last_name' => 'required|string|max:255',
        //     'birthday' => 'required|string',
        //     'gender' => 'required|in:male,female',
        //     'experience' => 'nullable|integer',
        //     'country' => 'required|string|max:255',
        //     'state' => 'nullable|string|max:255',
        //     'city' => 'required|string|max:255',
        //     'phone' => 'required|string|max:255',
        //     'address' => 'required|string|max:255',
        //     'education.*.certificate_name' => 'required|string|max:255',
        //     'education.*.year' => 'required|integer|min:1900|max:' . date('Y'),
        //     'work.*.company_name' => 'required|string|max:255',
        //     'work.*.position' => 'required|string|max:255',
        //     'work.*.start_year' => 'required|integer|min:1900|max:' . date('Y'),
        //     'work.*.end_year' => 'nullable|integer|min:1900|max:' . date('Y'),
        //     'skill.*.skill' => 'required|string|max:255',
        // ]);
    
        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator);
        // }
        
        $this->authorize('create', Information::class);
        $information = new Information();
        $information->first_name = $request->input('first_name');
        if($request->input('middle_name')) {
            $information->middle_name = $request->input('middle_name');
        }
        $information->last_name = $request->input('last_name');
        $information->birthday = $request->input('birthday');
        $information->gender = $request->input('gender');
        $information->experience = $request->input('experience');
        $information->user_id = $userId;
        $information->save();

        $this->authorize('create', Contact::class);
        $contact = new Contact();
        $contact->country = $request->input('country');
        if($request->input('state')) {
            $contact->state = $request->input('state');
        }
        $contact->city = $request->input('city');
        $contact->phone = $request->input('phone');
        $contact->address = $request->input('address');
        $contact->user_id = $userId;
        $contact->save();

        $this->authorize('create', Education::class);
        $educations = $request->input('education');
        foreach($educations as $education) {
            $neweducation = new Education();
            $neweducation->certificate_name = $education['certificate_name'];
            $neweducation->year = $education['year'];
            $neweducation->user_id = $userId;
            $neweducation->save();
        }

        $this->authorize('create', Work::class);
        $works = $request->input('work');
        foreach($works as $work) {
            $newwork = new Work();
            $newwork->company_name = $work['company_name'];
            $newwork->position = $work['position'];
            $newwork->start_year = $work['start_year'];
            $newwork->end_year = $work['end_year'];
            $newwork->user_id = $userId;
            $newwork->save();
        }

        $this->authorize('create', Skill::class);
        $skills = $request->input('skill');
        foreach ($skills as $skill) {
            $newskill = new Skill();
            $newskill->skill = $skill['skill'];
            $newskill->user_id = $userId;
            $newskill->save();
        }

    }

    public function edit(Request $request) 
    {
        $user = Auth::user();

        $cv = array();

        $information = Information::where('user_id', $user->id)->first();
        $cv['id'] = $information->user_id;
        $cv['first_name'] = $information->first_name;
        if($information->middle_name) {
            $cv['middle_name'] = $information->middle_name;
        }
        $cv['last_name'] = $information->last_name;
        $cv['birthday'] = $information->birthday;
        $cv['gender'] = $information->gender;
        $cv['experience'] = $information->experience;

        $contact = Contact::where('user_id', $user->id)->first();
        $cv['country'] = $contact->country;
        if($contact->state) {
            $cv['state'] = $contact->state;
        }
        $cv['city'] = $contact->city;
        $cv['phone'] = $contact->phone;
        $cv['address'] = $contact->address;

        $educations = Education::where('user_id', $user->id)->get();
        $cv['education'] = $educations;

        $works = Work::where('user_id', $user->id)->get();
        $cv['work'] = $works;

        $skills = Skill::where('user_id', $user->id)->get();
        $cv['skill'] = $skills;

        return view('cv', compact('cv'));
    }

    public function update(Request $request)
    {
        $userId = Auth::user()->id;
        
        $information = array();
        $information['last_name'] = $request->input('last_name');
        $information['birthday'] = $request->input('birthday');
        $information['gender'] = $request->input('gender');
        $information['experience'] = $request->input('experience');
        $information['user_id'] = $userId;
        $oldinformation = Information::where('user_id', $userId)->first();
        $oldinformation->update($information);

        //$this->authorize('update', Contact::class);
        $contact = array();
        $contact['country'] = $request->input('country');
        if($request->input('state')) {
            $contact['state'] = $request->input('state');
        }
        $contact['city'] = $request->input('city');
        $contact['phone'] = $request->input('phone');
        $contact['address'] = $request->input('address');
        $contact['user_id'] = $userId;
        $oldcontact= Contact::where('user_id', $userId)->first();
        $oldcontact->update($contact);

        $educationData = $request->input('education');
        if ($educationData) {
            $educationIds = collect($educationData)->pluck('id')->toArray();
            Education::where('user_id', $userId)
                ->whereNotIn('id', $educationIds)
                ->delete();

            foreach ($educationData as $data) {
                if (isset($data['id'])) {
                    $education = Education::where('user_id', $userId)
                        ->findOrFail($data['id']);
                    $education->update($data);
                } else {
                    $education = new Education($data);
                    $education->user_id = $userId;
                    $education->save();
                }
            }
        }

        $workData = $request->input('work');
        if ($workData) {
            $workIds = collect($workData)->pluck('id')->toArray();
            Work::where('user_id', $userId)
                ->whereNotIn('id', $workIds)
                ->delete();

            foreach ($workData as $data) {
                if (isset($data['id'])) {
                    $work = Work::where('user_id', $userId)
                        ->findOrFail($data['id']);
                    $work->update($data);
                } else {
                    $work = new Work($data);
                    $work->user_id = $userId;
                    $work->save();
                }
            }
        }

        $skillData = $request->input('skill');
        if ($skillData) {
            $skillIds = collect($skillData)->pluck('id')->toArray();
            Skill::where('user_id', $userId)
                ->whereNotIn('id', $skillIds)
                ->delete();

            foreach ($skillData as $data) {
                if (isset($data['id'])) {
                    $skill = Skill::where('user_id', $userId)
                        ->findOrFail($data['id']);
                    $skill->update($data);
                } else {
                    $skill = new Skill($data);
                    $skill->user_id = $userId;
                    $skill->save();
                }
            }
        }
    }

}
