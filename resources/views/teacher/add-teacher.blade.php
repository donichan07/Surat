@extends('layouts.master')
@section('content')
{{-- pesan --}}
{!! Toastr::message() !!}
<title>Tambah Guru</title>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Tambahkan Data Guru</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="teachers.html">Guru</a></li>
                        <li class="breadcrumb-item active">Tambahkan Data Guru</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('teacher/save') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title"><span>Detail Data Guru</span></h5>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Nama Lengkap<span class="login-danger">*</span></label>
                                        <select
                                            class="select select2s-hidden-accessible @error('full_name') is-invalid @enderror"
                                            style="width: 100%;" tabindex="-1" aria-hidden="true" id="full_name"
                                            name="full_name">
                                            <option selected disabled>-- Pilih Nama --</option>
                                            @foreach($users as $key => $names)
                                            <option value="{{ $names->name }}" data-teacher_id={{ $names->user_id }}
                                                {{ old('full_name') == $names->name ? "selected" :""}}>
                                                {{ $names->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('full_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>ID Guru <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control" name="teacher_id" id="teacher_id"
                                            placeholder="ID Guru" value="{{ old('teacher_id') }}" readonly>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Jenis Kelamin <span class="login-danger">*</span></label>
                                        <select class="form-control select  @error('gender') is-invalid @enderror"
                                            name="gender">
                                            <option selected disabled>Pilih Jenis Kelamin</option>
                                            <option value="Female"
                                                {{ old('gender') == 'Female' ? "selected" :"Female"}}>Perempuan</option>
                                            <option value="Male" {{ old('gender') == 'Male' ? "selected" :""}}>Laki-laki
                                            </option>
                                        </select>
                                        @error('gender')
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
                                            value="{{ old('experience') }}">
                                        @error('experience')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms calendar-icon">
                                        <label>Kualifikasi <span class="login-danger">*</span></label>
                                        <input type="text"
                                            class="form-control datetimepicker @error('qualification') is-invalid @enderror"
                                            name="qualification" placeholder="DD-MM-YYYY"
                                            value="{{ old('qualification') }}">
                                        @error('qualification')
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
                                            value="{{ old('date_of_birth') }}">
                                        @error('date_of_birth')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <h5 class="form-title"><span>Alamat</span></h5>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group local-forms">
                                        <label>Alamat <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control @error('address') is-invalid @enderror"
                                            name="address" placeholder="Masukkan alamat" value="{{ old('address') }}">
                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group local-forms">
                                        <label>Nomor Telepon </label>
                                        <input class="form-control @error('phone_number') is-invalid @enderror"
                                            type="text"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');"
                                            name="phone_number" placeholder="Masukkan Nomor Telepon"
                                            value="{{ old('phone_number') }}">
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
                                            name="city" placeholder="Masukkan Kota" value="{{ old('city') }}">
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
                                            name="state" placeholder="Masukkan Provinsi" value="{{ old('state') }}">
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
                                            value="{{ old('zip_code') }}">
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
                                            name="country" placeholder="Masukkan Negara" value="{{ old('country') }}">
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
                                        <button type="reset" class="btn btn-warning ms-2">Reset</button>
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
@section('script')
<script>
// pilih otomatis id guru
$('#full_name').on('change', function() {
    $('#teacher_id').val($(this).find(':selected').data('teacher_id'));
});
</script>
@endsection
@endsection
