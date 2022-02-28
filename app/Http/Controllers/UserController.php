<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function showAll(Request $request) {

        Gate::authorize('show-users'); 

        $users = DB::table('users')
            ->select('name', 'email', 'role')
            ->get();

        return view('show_users', ['users' => $users]);
    }

    public function showDashboard() {
        $user = Auth::user();

        return view('dashboard', ['user' => $user]);
    }
}
