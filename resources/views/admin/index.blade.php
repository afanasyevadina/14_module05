@extends('layouts.app')
@section('content')
    <main>
        <div class="container">
            <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                    <span class="fs-4">Job Indicator List</span>
                </a>

                <a href="#" class="btn btn-primary">New Job</a>
            </header>
        </div>

        <div class="container">
            <div class="accordion" id="accordionExample">
                @foreach($jobs as $job)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="header-{{ $job->id }}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#job-{{ $job->id }}" aria-expanded="false" aria-controls="job-{{ $job->id }}">
                                {{ $job->job }}
                            </button>
                        </h2>
                        <div id="job-{{ $job->id }}" class="accordion-collapse collapse" aria-labelledby="header-{{ $job->id }}" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="accordion" id="accordionExample-{{ $job->id }}">
                                    @foreach($job->applications->sortByDesc('referralValue') as $application)
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="header-application-{{ $application->id }}">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#application-{{ $application->id }}" aria-expanded="false" aria-controls="application-{{ $application->id }}">
                                                    <div class="w-100 d-flex justify-content-between">
                                                        {{ $application->candidate->name }}
                                                        <span class="mx-4">{{ $application->referralValue }}</span>
                                                    </div>
                                                </button>
                                            </h2>
                                            <div id="application-{{ $application->id }}" class="accordion-collapse collapse" aria-labelledby="header-application-{{ $job->id }}" data-bs-parent="#accordionExample-{{ $application->id }}">
                                                <div class="accordion-body">
                                                    <div class="mb-3">E-mail: {{ $application->candidate->email }}</div>
                                                    <div class="mb-4">Phone Number: {{ $application->candidate->phone }}</div>
                                                    <h4 class="mb-4">Competences Leves</h4>
                                                    <div class="row">
                                                        @foreach($application->applicationCompetences as $item)
                                                            <div class="col-6 mb-3">{{ $item->competence->competence }}</div>
                                                            <div class="col-6 mb-3">{{ $item->level->level }}</div>
                                                        @endforeach
                                                    </div>
                                                    <div class="text-end">Registration Time: {{ \Carbon\Carbon::create($application->created_at)->toDateTimeString() }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>


    </main>
@endsection
