@extends('layouts.master')
@section('content')
<title>Daftar Guru</title>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Daftar Guru</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dasbor</a></li>
                        <li class="breadcrumb-item active">Guru</li>
                    </ul>
                </div>
            </div>
        </div>
        {{-- pesan --}}
        {!! Toastr::message() !!}
        <div class="student-group-form">
            <div class="row">
                <!-- Search form -->
                    <div class="col-md-4">
                        <form action="{{ route('teacher.list') }}" method="GET">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Cari Guru..." value="{{ request()->get('search') }}">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <div>
            </div>
            <div>
                <h1></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Daftar Guru</h3>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">
                                @if (auth()->user()->role_name === 'Super Admin')
                                    <a href="{{ route('teacher/add/page') }}" class="btn btn-primary">Tambah Guru <i
                                            class="fas fa-plus"></i></a>
                                @endif
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="DataList"
                                class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                <thead class="student-thread">
                                    <tr>
                                        <th>
                                            <div class="form-check check-tables">
                                                <input class="form-check-input" type="checkbox" value="something">
                                            </div>
                                        </th>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Kualifikasi</th>
                                        <th>Pengalaman</th>
                                        <th>Nomor Ponsel</th>
                                        <th>Alamat</th>
                                        @if (auth()->user()->role_name === 'Super Admin')
                                        <th class="text-end">Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listTeacher as $list)
                                    <tr>
                                        <td>
                                            <div class="form-check check-tables">
                                                <input class="form-check-input" type="checkbox" value="something">
                                            </div>
                                        </td>
                                        <td hidden class="user_id">{{ $list->user_id }}</td>
                                        <td>{{ $list->user_id }}</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="teacher-details.html" class="avatar avatar-sm me-2">
                                                    @if (!empty($list->avatar))
                                                    <img class="avatar-img rounded-circle"
                                                        src="{{ URL::to('images/'.$list->avatar) }}"
                                                        alt="{{ $list->name }}">
                                                    @else
                                                    <img class="avatar-img rounded-circle"
                                                        src="{{ URL::to('images/photo_defaults.jpg') }}"
                                                        alt="{{ $list->name }}">
                                                    @endif
                                                </a>
                                                <a href="teacher-details.html">{{ $list-> full_name }}</a>
                                            </h2>
                                        </td>
                                        <td>{{ $list->gender }}</td>
                                        <td>{{ $list->qualification }}</td>
                                        <td>{{ $list->experience }}</td>
                                        <td>{{ $list->phone_number }}</td>
                                        <td>{{ $list->address }}</td>
                                        @if (auth()->user()->role_name === 'Super Admin')
                                        <td class="text-end">
                                            <div class="actions">
                                                <a href="{{ url('teacher/edit/'.$list->user_id) }}"
                                                    class="btn btn-sm bg-danger-light">
                                                    <i class="far fa-edit me-2"></i>
                                                </a>
                                                <a class="btn btn-sm bg-danger-light teacher_delete"
                                                    data-bs-toggle="modal" data-bs-target="#teacherDelete">
                                                    <i class="far fa-trash-alt me-2"></i>
                                                </a>
                                            </div>
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- model teacher delete --}}
<div class="modal custom-modal fade" id="teacherDelete" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Hapus Data Guru</h3>
                    <p>Apakah Anda yakin ingin menghapus?</p>
                </div>
                <div class="modal-btn delete-action">
                    <form action="{{ route('teacher/delete') }}" method="POST">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="id" class="e_user_id" value="">
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary continue-btn submit-btn"
                                    style="border-radius: 5px !important;">Hapus</button>
                            </div>
                            <div class="col-6">
                                <a href="#" data-bs-dismiss="modal" class="btn btn-primary paid-cancel-btn">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@section('script')
{{-- delete js --}}
<script>
$(document).on('click', '.teacher_delete', function() {
    var _this = $(this).parents('tr');
    $('.e_user_id').val(_this.find('.user_id').text());
});
</script>
@endsection

@endsection
