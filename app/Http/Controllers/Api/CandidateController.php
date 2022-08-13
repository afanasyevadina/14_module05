<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApplicationResource;
use App\Models\Candidate;

class CandidateController extends Controller
{
    /**
     * Load previous info about candidate by email and job
     * @return ApplicationResource
     */
    public function show()
    {
        /**
         * Check if candidate exists
         */
        $candidate = Candidate::firstOrNew(['email' => \request()->input('email')]);
        /**
         * And he/she already applied to this job
         */
        $application = $candidate->applications()->latest()->firstOrNew(['job_id' => \request()->input('job_id')]);
        return ApplicationResource::make($application);
    }
}
