<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Level;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Shows list of all jobs for user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('index', [
            'jobs' => Job::all(),
            'levels' => Level::all(),
        ]);
    }
}
