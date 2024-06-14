@extends('layouts.master')

@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">
            <div class="row justify-content-center mt-5">
                <div class="col-md-12">
                    <div class="card bg-command mb-4 border-0 shadow">
                        <div class="card-header bg-primary text-white border-0">
                            <h5 class="card-title mb-0">Score Details</h5>
                        </div>
                        <div class="card-body">
                            <div class="card-text">
                                <p class="mb-2"><strong>Nama Guru :</strong> {{ $score->teacher->full_name }}</p>
                                <p class="mb-2"><strong>Nama  Siswa :</strong> {{ $score->student->first_name }}
                                    {{ $score->student->last_name }}</p>
                                <p class="mb-2"><strong>Mata Pelajar :</strong> {{ $score->subject->subject_name }}</p>
                                <p class="mb-0"><strong>Nilai :</strong> {{ $score->score }}</p>
                            </div>
                        </div>
                        <div class="card-footer text-muted text-center border-0">
                            <a href="{{ route('scores.edit', $score->id) }}" class="btn btn-sm btn-warning">Edit Score</a>
                            <form action="{{ route('scores.destroy', $score->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete Score</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
