@extends('layouts.master')

@section('content')
<title>Tambah Surat Masuk</title>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Tambah Surat Masuk</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('inbox.index') }}">Surat Masuk</a></li>
                            <li class="breadcrumb-item active">Tambah Surat</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('inbox.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sender">Pengirim</label>
                                <input type="text" class="form-control" id="sender" name="sender" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Judul Surat</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="received_date">Tanggal Terima</label>
                                <input type="date" class="form-control" id="received_date" name="received_date" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category">Kategori</label>
                                <input type="text" class="form-control" id="category" name="category" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <input type="text" class="form-control" id="status" name="status" required>
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Tambah Surat</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
