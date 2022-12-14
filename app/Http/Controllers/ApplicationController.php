<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Models\Candidate;
use App\Models\Job;

class ApplicationController extends Controller
{
    /**
     * Saving new application for job
     * @param ApplicationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ApplicationRequest $request)
    {
        $job = Job::findOrFail($request->input('job_id'));
        $candidate = Candidate::updateOrCreate([
            'email' => $request->input('email'),
        ], [
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
        ]);
        $application = $candidate->applications()->firstOrCreate([
            'job_id' => $job->id,
        ]);
        foreach ($request->input('competences') ?? [] as $item) {
            $application->applicationCompetences()->updateOrCreate([
                'competence_id' => $item['competence_id'],
            ], [
                'level_id' => $item['level_id'],
            ]);
        }
        return redirect()->back()->with('success', 'Saved!');
    }
}
