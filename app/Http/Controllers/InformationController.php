<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Information::class);
        return view('cv');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Information::class);
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
     * Show the form for editing the specified resource.
     */
    public function edit(Information $information)
    {
        $this->authorize('update', $information);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Information $information)
    {
        $this->authorize('update', $information);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Information $information)
    {
        $this->authorize('delete', $information);
        $information->delete();
    }
}
