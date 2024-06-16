<?php

namespace App\Http\Controllers;

use App\Models\UserReview;
use Illuminate\Http\Request;

class UserReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'reviewer_id' => 'required|exists:users,id',
            'review' => 'required|string',
        ]);

        UserReview::create($request->all());

        return redirect()->back()->with('success', 'Review added successfully');
    }
}
