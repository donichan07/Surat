@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Edit Kontak</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">Kontak</li>
                            <li class="breadcrumb-item active">Edit Kontak</li>
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
                        <form action="{{ route('contact_information.update', $contact_information->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Nama:</label>
                                <input type="text" name="name" value="{{ $contact_information->name }}" class="form-control" placeholder="Nama">
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" value="{{ $contact_information->email }}" class="form-control" placeholder="Email">
                            </div>

                            <div class="form-group">
                                <label for="phone_number">Nomor Telepon:</label>
                                <input type="text" name="phone_number" value="{{ $contact_information->phone_number }}" class="form-control" placeholder="Nomor Telepon">
                            </div>

                            <div class="form-group">
                                <label for="address">Alamat:</label>
                                <textarea name="address" class="form-control" placeholder="Alamat">{{ $contact_information->address }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="twitter">Twitter:</label>
                                <input type="text" name="twitter" value="{{ $contact_information->twitter }}" class="form-control" placeholder="Twitter">
                            </div>

                            <div class="form-group">
                                <label for="facebook">Facebook:</label>
                                <input type="text" name="facebook" value="{{ $contact_information->facebook }}" class="form-control" placeholder="Facebook">
                            </div>

                            <div class="form-group">
                                <label for="instagram">Instagram:</label>
                                <input type="text" name="instagram" value="{{ $contact_information->instagram }}" class="form-control" placeholder="Instagram">
                            </div>

                            <div class="form-group">
                                <label for="github">GitHub:</label>
                                <input type="text" name="github" value="{{ $contact_information->github }}" class="form-control" placeholder="GitHub">
                            </div>

                            <div class="form-group">
                                <label for="whatsapp">WhatsApp:</label>
                                <input type="text" name="whatsapp" value="{{ $contact_information->whatsapp }}" class="form-control" placeholder="WhatsApp">
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
