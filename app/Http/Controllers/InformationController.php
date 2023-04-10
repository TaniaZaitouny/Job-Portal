<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Information::class, '');
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
        $information = new Information();
        $information->first_name = $request->input('first_name');
        $information->middle_name = $request->input('middle_name');
        $information->last_name = $request->input('last_name');
        $information->birthday = $request->input('birthday');
        $information->gender = $request->input('gender');
        $information->user()->associate($request->user());
        $information->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(Information $information)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Information $information)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Information $information)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Information $information)
    {
        $information->delete();
    }
}
