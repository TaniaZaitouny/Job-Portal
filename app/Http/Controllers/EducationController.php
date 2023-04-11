<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Education::class);
        return view('cv');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Education::class);
        $education = new Education();
        $education->certificate_name = $request->input('certificate_name');
        $education->year = $request->input('year');
        $education->user()->associate($request->user());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Education $education)
    {
        $this->authorize('update', $education);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Education $education)
    {
        $this->authorize('update', $education);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Education $education)
    {
        $this->authorize('delete', $education);
        $education->delete();
    }
}
