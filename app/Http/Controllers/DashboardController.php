<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function prof()
    {
        return view('professeur.dashboard');
    }

    public function administration()
    {
        return view('');
    }

    public function parent()
    {
        return view('');
    }

    public function etudiant()
    {
        return view('');
    }
}
