<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected function redirectTo()
    {
        return optional(auth()->user()->role)->role === 'admin' ? '/dashboard' : '/antrian';
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
