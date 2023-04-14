<?php

namespace App\Http\Controllers;
use App\Models\Information;
use App\Models\Skill;
use App\Models\Contact;
use App\Models\Education;
use App\Models\User;
use App\Models\Work;
use App\Models\Review;
use App\Models\Company;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function storeCompany(Request $request)
    {
        $user = Auth::user();
        $company = Company::where('company_id', $user->id)->first();
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'about_us' => 'nullable|string',
            'website' => 'nullable|string'
        ]);
        if($company)
        {
            $company->company_name = $request->input('name');
            $company->description = $request->input('description');
            $company->about_us = $request->input('about_us');
            $company->website = $request->input('website');
            $company->save();
        }
        else{
        $company = new Company();
        $company->company_name = $request->input('name');
        $company->description = $request ->input('description');
        $company->about_us = $request->input('about_us');
        $company->website = $request->input('website');
        $company->company_id = $user->id; 
        $company->save();
        }
        return redirect('/viewprofile');
        
    }
    
    public function companyProfile()
    {
        return view('editProfile');
    }
    public function showProfile()
    {
        
            $user = Auth::user();
            $userId = Auth::user()->id;
            if($user->role == 'company')
            {
                $user = User::where('id', $userId)->first();
                $company = Company::where('company_id', $userId)->first();
                $review = Review::where('company_id', $userId)->get();
                $reviews = array();
                foreach($review as $current) {
                    $user = User::where('id', $current->user_id)->get();
                    $reviews[] = ['content' => $current->content, 'name' => $user->username, 'id' => $user->id];
                }
                return view('companyProfile', compact('company', 'user', 'reviews'));
            }
           else{
            
                $information = Information::where('user_id', $userId)->first();
                $contact = Contact::where('user_id', $userId)->first();
                $education = Education::where('user_id', $userId)->get();
                $skill = Skill::where('user_id', $userId)->get();
                $work = Work::where('user_id', $userId)->get();
                
                return view('userProfile',compact('user', 'information','contact','education','skill','work'));
           }
       
    }

        public function viewUser(Request $request, User $user)
        {
            if($user->role =='company') {
                $company = Company::where('company_id', $user->id)->first();
                $review = Review::where('company_id', $user->id)->get();
                $reviews = array();
                foreach($review as $current) {
                    $reviewer = User::where('id', $current->user_id)->first();
                    $reviews[] = ['content' => $current->content, 'name' => $reviewer->name, 'id' => $reviewer->id];
                }
                return view('companyProfile', compact('company', 'user', 'reviews'));
            }
            else {
                $information = Information::where('user_id', $user->id)->first();
                $contact = Contact::where('user_id', $user->id)->first();
                $education = Education::where('user_id', $user->id)->get();
                $skill = Skill::where('user_id', $user->id)->get();
                $work = Work::where('user_id', $user->id)->get();
                
                return view('userProfile',compact('user', 'information','contact','education','skill','work'));
            }

        }
        public function edit(Request $request): View
        {
             return view('profile.edit', [
                 'user' => $request->user(),
             ]);
        }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function signOut(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/')->with('success', 'You have been signed out.');
    }

    public function addReview(Request $request, User $user)
    {
        $review= new Review();
        $review->content = $request->input('review');
        $review->company_id = $user->id;
        $review->user_id = Auth::user()->id;
        $review->save();

        return back();
    }

}
