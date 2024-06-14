<!-- resources/views/classes/edit.blade.php -->

@extends('layouts.master')
@section('content')

{{-- Displaying toastr messages --}}
{!! Toastr::message() !!}

<div class="page-wrapper">
    <div class="content container-fluid">
        
        {{-- Page Header --}}
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Edit Kelas</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="classes.html">Kelas</a></li>
                        <li class="breadcrumb-item active">Edit Kelas</li>
                    </ul>
                </div>
            </div>
        </div>
        
        {{-- Form Section --}}
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('classes.update', $class->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            {{-- First Row --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="class_name">Nama Kelas:</label>
                                        <input type="text" id="class_name" name="class_name" class="form-control" value="{{ $class->class_name }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="teacher_id">Guru:</label>
                                        <select id="teacher_id" name="teacher_id" class="form-control" required>
                                            <option value="">Pilih Guru</option>
                                            @foreach ($teachers as $teacher)
                                                <option value="{{ $teacher->id }}" @if($teacher->id == $class->teacher_id) selected @endif>
                                                    {{ $teacher->full_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            {{-- Second Row --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="subject_id">Mata Pelajaran:</label>
                                        <select id="subject_id" name="subject_id" class="form-control" required>
                                            <option value="">Pilih Mata Pelajaran</option>
                                            @foreach ($subjects as $subject)
                                                <option value="{{ $subject->id }}" @if($subject->id == $class->subject_id) selected @endif>
                                                    {{ $subject->subject_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="subject_id">Kelas:</label>
                                        <select id="subject_id" name="subject_id" class="form-control" required>
                                            <option value="">Pilih Kelas</option>
                                            @foreach ($subjects as $subject)
                                                <option value="{{ $subject->id }}" @if($subject->id == $class->subject_id) selected @endif>
                                                    {{ $subject->class }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="start_time">Waktu Mulai:</label>
                                        <input type="datetime-local" id="start_time" name="start_time" class="form-control" value="{{ $class->start_time }}" required>
                                    </div>
                                </div>
                            </div>
                            
                            {{-- Third Row --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="end_time">Waktu Berakhir:</label>
                                        <input type="datetime-local" id="end_time" name="end_time" class="form-control" value="{{ $class->end_time }}" required>
                                    </div>
                                </div>
                            </div>
                            
                            {{-- Buttons --}}
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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

@endsection
