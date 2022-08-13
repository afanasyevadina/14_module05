<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApplicationResource;
use App\Models\Candidate;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function show()
    {
        $candidate = Candidate::firstOrNew(['email' => \request()->input('email')]);
        $application = $candidate->applications()->latest()->firstOrNew(['job_id' => \request()->input('job_id')]);
        return ApplicationResource::make($application);
    }
}
