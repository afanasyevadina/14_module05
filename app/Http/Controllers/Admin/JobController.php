<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobRequest;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function create()
    {
        return view('admin.jobs.create');
    }

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
