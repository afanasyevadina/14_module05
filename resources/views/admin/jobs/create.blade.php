@extends('layouts.app', ['title' => 'New Job'])
@section('content')
    <main>
        <div class="container">
            <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                    <span class="fs-4">Job Indicator List</span>
                </a>

                <a href="{{ route('joblist.create') }}" class="btn btn-primary">New Job</a>
            </header>
        </div>

        <div class="container">
            <form action="{{ route('joblist.create') }}" method="POST">@csrf
                <div class="mb-4">
                    <input type="text" class="form-control @error('job') is-invalid @enderror" name="job" placeholder="Job Title" value="{{ old('job') }}">
                    @error('job')
                    <div class="invalid-feedback">{{ $errors->first('job') }}</div>
                    @enderror
                </div>
                <h5 class="mb-3">Competences</h5>
                <div class="mb-3">
                    <small>Total sum of weights must be 100.</small>
                </div>
                <div class="row">
                    <div class="col" id="input-rows">
                        @foreach(old('competences') ?? [[]] as $key => $row)
                            <div class="row mb-3">
                                <div class="col-sm-6 mb-3">
                                    <input type="text" class="form-control input-competence @error('competences.' . $key . '.competence') is-invalid @enderror" name="competences[{{ $key }}][competence]" placeholder="Competence Title" value="{{ old('competences.' . $key . '.competence') }}">
                                    @error('competences.' . $key . '.competence')
                                    <div class="invalid-feedback">{{ $errors->first('competences.' . $key . '.competence') }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <input type="number" step="0.01" class="form-control input-height @error('competences.' . $key . '.height') is-invalid @enderror" name="competences[{{ $key }}][height]" placeholder="Competence Weight (0-100)" value="{{ old('competences.' . $key . '.height') }}">
                                    @error('competences.' . $key . '.height')
                                    <div class="invalid-feedback">{{ $errors->first('competences.' . $key . '.height') }}</div>
                                    @enderror
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-light" type="button" id="add-row">+ Add competence</button>
                    </div>
                </div>
                @error('competences_sum')
                <div class="text-danger">{{ $errors->first('competences_sum') }}</div>
                @enderror
                <div class="text-end">
                    <button class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </main>
@endsection

@section('scripts')
    <script>
        document.getElementById('add-row').onclick = e => {
            const inputRows = document.getElementById('input-rows')
            let clone = inputRows.lastElementChild.cloneNode(true)
            clone.querySelector('.input-competence').name = `competences[${inputRows.childElementCount}][competence]`
            clone.querySelector('.input-height').name = `competences[${inputRows.childElementCount}][height]`
            clone.querySelector('.input-competence').value = ''
            clone.querySelector('.input-height').value = ''
            inputRows.appendChild(clone)
        }
    </script>
@endsection
