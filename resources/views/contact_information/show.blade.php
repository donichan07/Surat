@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Detail Kontak</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">Kontak</li>
                            <li class="breadcrumb-item active">{{ $contact_information->name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ $contact_information->name }}</h4>
                    </div>
                    <div class="card-body">
                        <p><strong>Email:</strong> {{ $contact_information->email }}</p>
                        <p><strong>Nomor Telepon:</strong> {{ $contact_information->phone_number }}</p>
                        <p><strong>Alamat:</strong> {{ $contact_information->address }}</p>
                        <p><strong>Twitter:</strong> {{ $contact_information->twitter }}</p>
                        <p><strong>Facebook:</strong> {{ $contact_information->facebook }}</p>
                        <p><strong>Instagram:</strong> {{ $contact_information->instagram }}</p>
                        <p><strong>GitHub:</strong> {{ $contact_information->github }}</p>
                        <p><strong>WhatsApp:</strong> {{ $contact_information->whatsapp }}</p>
                        <a href="{{ route('contact_information.index') }}" class="btn btn-primary mt-3">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
