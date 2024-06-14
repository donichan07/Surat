@extends('layouts.master')
@section('content')
<title>Daftar Surat Masuk</title>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Surat Masuk</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('inbox.index') }}">Surat Masuk</a></li>
                            <li class="breadcrumb-item active">Semua Surat Masuk</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        {{-- pesan --}}
        {!! Toastr::message() !!}
        <div class="student-group-form">
            <div class="row">
                <!-- Search form -->
                <div class="col-md-4">
                    <form action="{{ route('inbox.index') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Cari Surat..." value="{{ request()->get('search') }}">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <h1>
                    
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table comman-shadow">
                    <div class="card-body">
                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Surat Masuk</h3>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">
                                    <a href="{{ route('inbox.index') }}" class="btn btn-outline-gray me-2 active">
                                        <i class="fa fa-list" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{ route('inbox.grid') }}" class="btn btn-outline-gray me-2">
                                        <i class="fa fa-th" aria-hidden="true"></i>
                                    </a>
                                    @if (auth()->user()->role_name === 'Super Admin')
                                    <a href="{{ route('inbox.create') }}" class="btn btn-primary">Tambah Surat <i class="fas fa-plus"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="inboxList" class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                <thead class="student-thread">
                                    <tr>
                                        <th>
                                            <div class="form-check check-tables">
                                                <input class="form-check-input" type="checkbox" value="something">
                                            </div>
                                        </th>
                                        <th>ID</th>
                                        <th>Pengirim</th>
                                        <th>Judul Surat</th>
                                        <th>Tanggal Terima</th>
                                        <th>Kategori</th>
                                        <th>Status</th>
                                        @if (auth()->user()->role_name === 'Super Admin')
                                        <th class="text-end">Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- modal hapus surat --}}
<div class="modal custom-modal fade" id="mailDeleteModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Hapus Surat</h3>
                    <p>Apakah Anda yakin ingin menghapus?</p>
                </div>
                <div class="modal-btn delete-action">
                    <form action="{{ route('inbox.destroy') }}" method="POST">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="id" class="e_id" value="">
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary continue-btn submit-btn" style="border-radius: 5px !important;">Hapus</button>
                            </div>
                            <div class="col-6">
                                <a href="#" data-bs-dismiss="modal"class="btn btn-primary paid-cancel-btn">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@section('script')

{{-- js hapus --}}
<script>
    $(document).on('click','.mail_delete',function() {
        var _this = $(this).parents('tr');
        $('.e_id').val(_this.find('.id').text());
    });
</script>
@endsection

@endsection
