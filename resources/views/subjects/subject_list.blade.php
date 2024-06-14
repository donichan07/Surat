@extends('layouts.master')

@section('content')
{{-- message --}}
{!! Toastr::message() !!}
<title>Daftar Mata Pelajaran</title>
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Mata Pelajaran</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Mata Pelajaran</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Mata Pelajaran</h3>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">
                                    @if (auth()->user()->role_name === 'Super Admin')
                                    <a href="{{ route('subject/add/page') }}" class="btn btn-primary">
                                        Tambah <i class="fas fa-plus"></i>
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="subject-table"
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
                                        <th>Kelas</th>
                                        @if (auth()->user()->role_name === 'Super Admin')
                                        <th class="text-end">Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($subjectList as $key => $value)
                                    <tr>
                                        <td>
                                            <div class="form-check check-tables">
                                                <input class="form-check-input" type="checkbox" value="something">
                                            </div>
                                        </td>
                                        <td class="subject_id">{{ $value->subject_id }}</td>
                                        <td>
                                            <h2>
                                                <a>{{ $value->subject_name }}</a>
                                            </h2>
                                        </td>
                                        <td>{{ $value->class }}</td>
                                        @if (auth()->user()->role_name === 'Super Admin')
                                        <td class="text-end">
                                            <div class="actions">
                                                <a href="{{ url('subject/edit/'.$value->subject_id) }}"
                                                    class="btn btn-sm bg-danger-light">
                                                    <i class="far fa-edit me-2"></i>
                                                </a>
                                                <a class="btn btn-sm bg-danger-light delete" data-bs-toggle="modal"
                                                    data-bs-target="#delete">
                                                    <i class="fe fe-trash-2"></i>
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

{{-- modal delete --}}
<div class="modal custom-modal fade" id="delete" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Delete Subject</h3>
                    <p>Are you sure want to delete?</p>
                </div>
                <div class="modal-btn delete-action">
                    <div class="row">
                        <form action="{{ route('subject/delete') }}" method="POST">
                            @csrf
                            <input type="hidden" name="subject_id" class="e_subject_id" value="">
                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary paid-continue-btn"
                                        style="width: 100%;">Delete</button>
                                </div>
                                <div class="col-6">
                                    <a data-bs-dismiss="modal" class="btn btn-primary paid-cancel-btn">Cancel
                                    </a>
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

@section('script')
{{-- DataTables --}}
<script src="{{ URL::to('assets/plugins/datatables/datatables.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#subject-table').DataTable({
            "paging": false,
            "info": false,
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Cari",
            }
        });
    });
</script>
{{-- Delete subject --}}
<script>
    $(document).on('click', '.delete', function () {
        var _this = $(this).parents('tr');
        $('.e_subject_id').val(_this.find('.subject_id').text());
    });
</script>
@endsection
