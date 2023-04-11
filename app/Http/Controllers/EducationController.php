<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Education::class, '');
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
        $education = new Education();
        $education->certificate_name = $request->input('certificate_name');
        $education->year = $request->input('year');
        $education->user()->associate($request->user());
    }

    /**
     * Display the specified resource.
     */
    public function show(Education $education)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Education $education)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Education $education)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Education $education)
    {
        $education->delete();
    }
}
