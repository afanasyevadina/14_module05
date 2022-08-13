<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Level;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('index', [
            'jobs' => Job::all(),
            'levels' => Level::all(),
        ]);
    }
}
