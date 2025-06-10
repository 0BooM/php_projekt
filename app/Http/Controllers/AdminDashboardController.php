<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;

class AdminDashboardController extends Controller
{

    public function index()
    {
        $categories = Category::paginate(12);
        $users = User::paginate(12);
        return view('admin.dashboard', compact('categories', 'users'));
    }
    public function destroyUser(User $user)
    {
        $user->delete();
        return redirect()->route('admin.dashboard')->with('success', 'User deleted!');
    }
}
