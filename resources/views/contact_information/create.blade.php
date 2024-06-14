@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Tambah Kontak Baru</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">Kontak</li>
                            <li class="breadcrumb-item active">Tambah Kontak Baru</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('contact_information.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="name">Nama:</label>
                                <input type="text" name="name" class="form-control" placeholder="Nama" value="{{ old('name') }}">
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                            </div>

                            <div class="form-group">
                                <label for="phone_number">Nomor Telepon:</label>
                                <input type="text" name="phone_number" class="form-control" placeholder="Nomor Telepon" value="{{ old('phone_number') }}">
                            </div>

                            <div class="form-group">
                                <label for="address">Alamat:</label>
                                <textarea name="address" class="form-control" placeholder="Alamat">{{ old('address') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="twitter">Twitter:</label>
                                <input type="text" name="twitter" class="form-control" placeholder="Twitter" value="{{ old('twitter') }}">
                            </div>

                            <div class="form-group">
                                <label for="facebook">Facebook:</label>
                                <input type="text" name="facebook" class="form-control" placeholder="Facebook" value="{{ old('facebook') }}">
                            </div>

                            <div class="form-group">
                                <label for="instagram">Instagram:</label>
                                <input type="text" name="instagram" class="form-control" placeholder="Instagram" value="{{ old('instagram') }}">
                            </div>

                            <div class="form-group">
                                <label for="github">GitHub:</label>
                                <input type="text" name="github" class="form-control" placeholder="GitHub" value="{{ old('github') }}">
                            </div>

                            <div class="form-group">
                                <label for="whatsapp">WhatsApp:</label>
                                <input type="text" name="whatsapp" class="form-control" placeholder="WhatsApp" value="{{ old('whatsapp') }}">
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                            <a href="{{ route('contact_information.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
