<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegistrationController extends Controller
{
    public function viewRegistration()
    {
        $registrations = User::where('is_approved', false)->get();
        return view('dashboard.registration.view', compact('registrations'));
    }
}
