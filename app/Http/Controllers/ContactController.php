<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Contact::class, '');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cv');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $contact = new Contact();
        $contact->country = $request->input('country');
        $contact->state = $request->input('state');
        $contact->city = $request->input('city');
        $contact->phone = $request->input('phone');
        $contact->address = $request->input('address');
        $contact->user()->associate($request->user());
        $contact->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
    }
}
