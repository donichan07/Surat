@extends('layouts.master')
@section('content')
{{-- pesan --}}
{!! Toastr::message() !!}
<title>Edit Guru</title>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Edit Data Guru</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('teacher/list/page') }}">Guru</a></li>
                        <li class="breadcrumb-item active">Edit Data Guru</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('teacher/update') }}" method="POST">
                            @csrf
                            <input type="hidden" class="form-control" name="id" value="{{ $teacher->id }}">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title"><span>Detail Dasar</span></h5>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Nama <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control @error('full_name') is-invalid @enderror"
                                            name="full_name" placeholder="Masukkan Nama"
                                            value="{{ $teacher->full_name }}">
                                        @error('full_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Jenis Kelamin <span class="login-danger">*</span></label>
                                        <select class="form-control select  @error('gender') is-invalid @enderror"
                                            name="gender">
                                            <option selected disabled>Pilih Jenis Kelamin</option>
                                            <option value="Perempuan"
                                                {{ $teacher->gender == 'Female' ? "selected" :"Female"}}>Perempuan
                                            </option>
                                            <option value="Laki-laki" {{ $teacher->gender == 'Male' ? "selected" :""}}>
                                                Laki-laki</option>
                                        </select>
                                        @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms calendar-icon">
                                        <label>Tanggal Lahir <span class="login-danger">*</span></label>
                                        <input type="text"
                                            class="form-control datetimepicker @error('date_of_birth') is-invalid @enderror"
                                            name="date_of_birth" placeholder="DD-MM-YYYY"
                                            value="{{ $teacher->date_of_birth }}">
                                        @error('date_of_birth')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms calendar-icon">
                                        <label>Tanggal Bergabung <span class="login-danger">*</span></label>
                                        <input type="text"
                                            class="form-control @error('joining_date') is-invalid @enderror"
                                            name="joining_date" value="{{ $teacher->join_date}}" readonly>
                                        @error('joining_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4 local-forms">
                                    <div class="form-group local-forms calendar-icon">
                                        <label>Kualifikasi <span class="login-danger">*</span></label>
                                        <input type="text"
                                            class="form-control datetimepicker @error('qualification') is-invalid @enderror"
                                            name="qualification" placeholder="Masukkan Kualifikasi"
                                            value="{{ $teacher->qualification }}">
                                        @error('qualification')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Pengalaman <span class="login-danger">*</span></label>
                                        <input type="text"
                                            class="form-control @error('experience') is-invalid @enderror"
                                            name="experience" placeholder="Masukkan Pengalaman"
                                            value="{{ $teacher->experience }}">
                                        @error('experience')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h5 class="form-title"><span>Alamat</span></h5>
                                </div>
                                <div class="col-6">
                                    <div class="form-group local-forms">
                                        <label>Alamat <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control @error('address') is-invalid @enderror"
                                            name="address" placeholder="Masukkan Alamat"
                                            value="{{ $teacher->address }}">
                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group local-forms">
                                        <label>Telepon <span class="login-danger">*</span></label>
                                        <input type="text"
                                            class="form-control @error('phone_number') is-invalid @enderror"
                                            name="phone_number" placeholder="Masukkan Nomor Telepon"
                                            value="{{ $teacher->phone_number }}">
                                        @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Kota <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control @error('city') is-invalid @enderror"
                                            name="city" placeholder="Masukkan Kota" value="{{ $teacher->city }}">
                                        @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Provinsi <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control @error('state') is-invalid @enderror"
                                            name="state" placeholder="Masukkan Provinsi" value="{{ $teacher->state }}">
                                        @error('state')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Kode Pos <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control @error('zip_code') is-invalid @enderror"
                                            name="zip_code" placeholder="Masukkan Kode Pos"
                                            value="{{ $teacher->zip_code }}">
                                        @error('zip_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Negara <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control @error('country') is-invalid @enderror"
                                            name="country" placeholder="Masukkan Negara"
                                            value="{{ $teacher->country }}">
                                        @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="student-submit">
                                        <button type="submit" class="btn btn-primary">Kirim</button>
                                        <button type="reset" class="btn btn-warning ms-1">Riset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
