@extends('layouts.master')
@section('content')
{{-- Displaying toastr messages --}}
{!! Toastr::message() !!}
<title>Tambah Kelas</title>

<div class="page-wrapper">
    <div class="content container-fluid">

        {{-- Page Header --}}
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Tambahkan Kelas</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="classes.html">Kelas</a></li>
                        <li class="breadcrumb-item active">Tambahkan Kelas</li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Form Section --}}
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('classes.store') }}" method="POST">
                            @csrf

                            {{-- First Row --}}
                            <div class="row">
                                <h5 class="form-title student-info">Informasi Kelas
                                    <span>
                                        <a href="javascript:;"><i class="feather-more-vertical"></i></a>
                                    </span>
                                </h5>
                                <div class="col-md-6">
                                    <div class="form-group local-forms">
                                        <label for="class_name">Nama Kelas:</label>
                                        <input type="text" id="class_name" name="class_name" class="form-control"
                                            placeholder="Masukan Nama Kelas" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group local-forms">
                                        <label for="teacher_id">Guru:</label>
                                        <select id="teacher_id" name="teacher_id" class="form-control select" required>
                                            <option value="">Pilih Guru</option>
                                            @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}">{{ $teacher->full_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            {{-- Second Row --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group local-forms">
                                        <label for="subject_id">Mata Pelajaran:</label>
                                        <select id="subject_id" name="subject_id" class="form-control select" required>
                                            <option value="">Pilih Mata Pelajaran</option>
                                            @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group local-forms">
                                        <label for="class">Kelas:</label>
                                        <select id="class" name="class" class="form-control select" required>
                                            <option value="">Pilih Kelas</option>
                                            @foreach ($subjects as $subject)
                                            <option value="{{ $subject->class }}">{{ $subject->class }}</option>
                                            @endforeach
                                        </select>
                                        @error('class')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Third Row --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group local-forms">
                                        <label for="start_time">Waktu Mulai:</label>
                                        <input type="datetime-local" id="start_time" name="start_time"
                                            class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group local-forms">
                                        <label for="end_time">Waktu Berakhir:</label>
                                        <input type="datetime-local" id="end_time" name="end_time" class="form-control"
                                            required>
                                    </div>
                                </div>
                            </div>

                            {{-- Buttons --}}
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">Tambah Kelas</button>
                                <a href="{{ route('home') }}" class="btn btn-secondary">Batal</a>
                                <button type="reset" class="btn btn-warning ms-2">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Custom Scripts --}}
@section('script')
<script>
// Auto-select teacher ID based on selected teacher name
$('#full_name').on('change', function() {
    $('#teacher_id').val($(this).find(':selected').data('teacher_id'));
});
</script>
@endsection
@endsection