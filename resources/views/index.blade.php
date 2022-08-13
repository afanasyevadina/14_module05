@extends('layouts.app')
@section('content')
    <main>
        <div class="container">
            <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                    <span class="fs-4">Job indicator</span>
                </a>
            </header>
        </div>

        <div class="container">
            <div class="accordion" id="accordionExample">
                @foreach($jobs as $job)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="header-{{ $job->id }}">
                            <button class="accordion-button {{ old('job_id') == $job->id ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#job-{{ $job->id }}" aria-expanded="false" aria-controls="job-{{ $job->id }}">
                                {{ $job->job }}
                            </button>
                        </h2>
                        <div id="job-{{ $job->id }}" class="accordion-collapse collapse {{ old('job_id') == $job->id ? 'show' : '' }}" aria-labelledby="header-{{ $job->id }}" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <form action="{{ route('application') }}" method="POST">@csrf
                                    <input type="hidden" name="job_id" value="{{ $job->id }}">
                                    <h4 class="mb-3">Competences levels</h4>
                                    @foreach($job->competences as $key => $competence)
                                        <input type="hidden" name="competences[{{ $key }}][competence_id]" value="{{ $competence->id }}">
                                        <div class="mb-4 row flex-column-reverse flex-sm-row">
                                            <div class="col-sm-6">
                                                <select name="competences[{{ $key }}][level_id]" class="form-control @error('competences.' . $key . '.level_id') is-invalid @enderror">
                                                    <option value="">Select</option>
                                                    @foreach($levels as $level)
                                                        <option value="{{ $level->id }}" {{ old('competences.' . $key . '.level_id') == $level->id ? 'selected' : '' }}>{{ $level->level }}</option>
                                                    @endforeach
                                                </select>
                                                @error('competences.' . $key . '.level_id')
                                                <div class="invalid-feedback">{{ $errors->first('competences.' . $key . '.level_id') }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-sm-6">{{ $competence->competence }}</div>
                                        </div>
                                    @endforeach
                                    <div class="row">
                                        <div class="col-12 mb-4">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Complete Name" value="{{ old('name') }}">
                                            @error('name')
                                            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6 mb-4">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="E-mail" value="{{ old('email') }}">
                                            @error('email')
                                            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6 mb-4">
                                            <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Phone number" value="{{ old('phone') }}">
                                            @error('phone')
                                            <div class="invalid-feedback">{{ $errors->first('phone') }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12 text-end">
                                            <button class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>


    </main>
@endsection
