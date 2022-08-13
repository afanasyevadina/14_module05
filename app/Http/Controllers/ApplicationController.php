<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Models\Candidate;
use App\Models\Job;

class ApplicationController extends Controller
{
    public function store(ApplicationRequest $request)
    {
        $job = Job::findOrFail($request->input('job_id'));
        $candidate = Candidate::updateOrCreate([
            'email' => $request->input('email'),
        ], [
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
        ]);
        $application = $candidate->applications()->create([
            'job_id' => $job->id,
        ]);
        foreach ($request->input('competences') ?? [] as $item) {
            $application->applicationCompetences()->create(collect($item)->only(['competence_id', 'level_id'])->toArray());
        }
        return redirect()->back();
    }
}
