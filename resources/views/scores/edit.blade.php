@extends('layouts.master')

@section('content')
    <title>Edit Nilai Siswa</title>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Edit Nilai Siswa</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('student/add/page') }}">Siswa</a></li>
                                <li class="breadcrumb-item active">Edit Nilai Siswa</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            {{-- pesan --}}
            {!! Toastr::message() !!}
            <div class="row">
                <div class="col-sm-12">
                    <div class="card comman-shadow">
                        <div class="card-body">
                            <form action="{{ route('scores.update', $score->id) }}" method="POST" id="editScoreForm" class="mt-4">
                                @csrf
                                @method('PUT') {{-- Perubahan utama di sini untuk mengirimkan metode PUT --}}
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title student-info">Informasi Nilai Siswa
                                            <span>
                                                <a href="javascript:;"><i class="feather-more-vertical"></i></a>
                                            </span>
                                        </h5>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <div class="form-group local-forms">
                                            <label for="teacher_id" class="form-label">Nama Guru <span
                                                    class="login-danger">*</span></label>
                                            <select name="teacher_id" id="teacher_id" class="form-control select">
                                                @foreach ($teachers as $id => $name)
                                                    <option value="{{ $id }}"
                                                        @if ($score->teacher_id == $id) selected @endif>
                                                        {{ $name }}</option>
                                                @endforeach
                                            </select>
                                            @error('teacher_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group local-forms">
                                            <label for="student_id" class="form-label">Nama Siswa <span
                                                    class="login-danger">*</span></label>
                                            <select name="student_id" id="student_id" class="form-control select">
                                                @foreach ($students as $id => $name)
                                                    <option value="{{ $id }}"
                                                        @if ($score->student_id == $id) selected @endif>
                                                        {{ $name }}</option>
                                                @endforeach
                                            </select>
                                            @error('student_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <div class="form-group local-forms">
                                            <label for="subject_id" class="form-label">Mata Pelajaran <span
                                                    class="login-danger">*</span></label>
                                            <select name="subject_id" id="subject_id" class="form-control select">
                                                @foreach ($subjects as $id => $name)
                                                    <option value="{{ $id }}"
                                                        @if ($score->subject_id == $id) selected @endif>
                                                        {{ $name }}</option>
                                                @endforeach
                                            </select>
                                            @error('subject_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group local-forms">
                                            <label for="score" class="form-label">Nilai Siswa <span
                                                    class="login-danger">*</span></label>
                                            <input type="text" name="score" id="score" value="{{ $score->score }}"
                                                class="form-control">
                                            @error('score')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary ms-2">Reset</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
