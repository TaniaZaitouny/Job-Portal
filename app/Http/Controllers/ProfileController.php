<?php

namespace App\Http\Controllers;
use App\Models\Information;
use App\Models\Skill;
use App\Models\Contact;
use App\Models\Education;
use App\Models\User;
use App\Models\Work;
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
    public function showProfile()
    {
        
            $user = Auth::user();
            $userId = Auth::user()->id;
            if($user->role == 'company')
            {
                return view('companyProfile');
            }
           else{
            
                $information = Information::where('user_id', $userId)->first();
                $contact = Contact::where('user_id', $userId)->first();
                $education = Education::where('user_id', $userId)->get();
                $skill = Skill::where('user_id', $userId)->get();
                $work = Work::where('user_id', $userId)->get();
               
                return view('userProfile',compact('information','contact','education','skill','work'));
           }
       
    }

        public function viewCompanyofId($id)
        {
            //get company information of this $id

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

}
