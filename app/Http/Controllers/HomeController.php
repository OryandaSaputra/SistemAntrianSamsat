<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $role = optional(auth()->user()->role)->role;

        return redirect($role === 'admin' ? '/dashboard' : '/antrian');
    }
}
