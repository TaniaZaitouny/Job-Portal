<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Review::class);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $company)
    {
        $this->authorize('create', Review::class);
        $review= new Review();
        $review->content = $request->input('review');
        $review->company()->associate($company);
        $review->user()->associate($request->user());
        $review->save();
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        $this->authorize('delete', $review);
        $review->delete();
    }
    
  
}
