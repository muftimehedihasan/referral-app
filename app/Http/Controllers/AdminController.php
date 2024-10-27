<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Referral;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('backend.admin.users', compact('users'));
    }
}
