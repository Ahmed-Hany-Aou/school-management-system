<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function Logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
