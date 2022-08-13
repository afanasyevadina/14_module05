<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Admin dashboard
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.index', [
            'jobs' => Job::with('applications')
                ->withCount('applications')
                ->get()
                ->sortByDesc(fn($item) => $item->applications->first()?->created_at),
        ]);
    }
}
