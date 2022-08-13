<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobRequest;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Shows job create form
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.jobs.create');
    }

    /**
     * Saving new job with its competences
     * @param JobRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(JobRequest $request)
    {
        $job = Job::create([
            'job' => $request->job,
        ]);
        foreach ($request->input('competences') ?? [] as $item) {
            $job->competences()->create(collect($item)->only(['competence', 'height'])->toArray());
        }
        return redirect()->route('joblist')->with('success', 'Saved!');
    }
}
