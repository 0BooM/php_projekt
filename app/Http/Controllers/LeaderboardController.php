<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function index()
    {
        $users = User::withCount('followers')->orderByDesc('followers_count')->take(10)->get();
        return view('leaderboard', compact('users'));
    }
}
