<?php

namespace App\Http\Controllers;

use App\Models\ContactInformation;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    /** home dashboard */
    public function index()
    {
        return view('dashboard.home');
    }

    /** profile user */
    public function userProfile()
    {
        return view('dashboard.profile');
    }

    /** teacher dashboard */
    public function teacherDashboardIndex()
    {
        $contactInformation = ContactInformation::first(); // Mengambil satu data pertama
        return view('dashboard.teacher_dashboard', compact('contactInformation'));
    }

    /** student dashboard */
    public function studentDashboardIndex()
    {
        $contactInformation = ContactInformation::first(); // Mengambil satu data pertama
        return view('dashboard.student_dashboard', compact('contactInformation'));
    }
}
