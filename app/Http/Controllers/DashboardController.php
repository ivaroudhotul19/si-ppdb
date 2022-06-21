<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\NewStudent;
use App\Models\Payment;
use App\Models\Registration;
use App\Models\Revocation;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $user = User::count();
        $major = Major::count();
        $student = NewStudent::count();
        $payment = Payment::count();
        $registration = Registration::count();
        $revocation = Revocation::count();
        return view('dashboard.pages.main.main', 
            compact('user', 'major', 'student', 'payment', 'registration', 'revocation')
        );
    }   
}
