<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Work::class);
        return view('cv');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Work::class);
        $work = new Work();
        $work->company_name = $request->input('company_name');
        $work->position = $request->input('position');
        $work->start_year = $request->input('start_year');
        $work->end_year = $request->input('end_year');
        $work->user()->associate($request->user());
        $work->save();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Work $work)
    {
        $this->authorize('update', $work);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Work $work)
    {
        $this->authorize('update', $work);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Work $work)
    {
        $this->authorize('delete', $work);
        $work->delete();
    }
}
