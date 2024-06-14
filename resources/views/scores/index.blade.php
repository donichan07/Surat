@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Nilai Siswa</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('student/list') }}">Siswa</a></li>
                                <li class="breadcrumb-item active">Semua Siswa</li>
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
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table comman-shadow">
                        <div class="card-body">
                            <div class="page-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="page-title">Nilai Siswa</h3>
                                    </div>
                                    <div class="col-auto text-end float-end ms-auto download-grp">
                                       
                                        @if (auth()->user()->role_name === 'Super Admin' || Session::get('role_name') === 'Teachers')
                                        <a href="{{ route('scores.create') }}" class="btn btn-primary"><i
                                                class="fas fa-plus"></i></a>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table id="studentTable"
                                    class="table border-0 star-student table-hover table-center mb-0 table-striped">
                                    <thead class="student-thread">
                                        <tr>
                                            <th>No</th>
                                            <th>Guru</th>
                                            <th>Murid</th>
                                            <th>Mata Pelajaran</th>
                                            <th>Nilai</th>
                                            @if (auth()->user()->role_name === 'Super Admin' || Session::get('role_name') === 'Teachers')
                                            <th class="text-center">Aksi</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($scores as $index => $score)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $score->teacher->full_name }}</td>
                                                <td>{{ $score->student->first_name }} {{ $score->student->last_name }}</td>
                                                <td>{{ $score->subject->subject_name }}</td>
                                                @if ($score->score >= 80 && $score->score <= 100)
                                                    <td><span
                                                            class="bg-success opacity-50 px-2 py-1 rounded-pill text-white fw-bold">{{ $score->score }}</span>
                                                    </td>
                                                @elseif($score->score >= 70 && $score->score <= 79)
                                                    <td><span
                                                            class="bg-warning opacity-50 px-2 py-1 rounded-pill text-white fw-bold">{{ $score->score }}</span>
                                                    </td>
                                                @elseif($score->score >= 1 && $score->score <= 69)
                                                    <td><span
                                                            class="bg-danger opacity-50 px-2 py-1 rounded-pill text-white fw-bold">{{ $score->score }}</span>
                                                    </td>
                                                @endif
                                                @if (auth()->user()->role_name === 'Super Admin' || Session::get('role_name') === 'Teachers')
                                                <td class="text-center align-middle">
                                                    <div class="actions d-flex justify-content-center align-items-center">
                                                        <a href="{{ route('scores.show', $score->id) }}"
                                                            class="btn btn-sm bg-danger-light me-2">
                                                            <i class="far fa-eye me-2"></i>
                                                        </a>
                                                        <a href="{{ route('scores.edit', $score->id) }}"
                                                            class="btn btn-sm bg-danger-light me-2">
                                                            <i class="far fa-edit me-2"></i>
                                                        </a>
                                                        <button type="button"
                                                            class="btn btn-sm bg-danger-light student_delete"
                                                            data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                            data-id="{{ $score->id }}">
                                                            <i class="far fa-trash-alt py-1"></i>
                                                        </button>
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

    {{-- model hapus siswa --}}
    <div class="modal custom-modal fade" id="deleteModal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Hapus Nilai</h3>
                        <p>Apakah Anda yakin ingin menghapus?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <form id="deleteForm" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" class="e_id" value="">
                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary continue-btn submit-btn"
                                        style="border-radius: 5px !important;">Hapus</button>
                                </div>
                                <div class="col-6">
                                    <a href="#" data-bs-dismiss="modal"
                                        class="btn btn-primary paid-cancel-btn">Batal</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@section('script')
    {{-- Include DataTables JS --}}
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#studentTable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "lengthMenu": [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "All"]
                ],
                "pageLength": 5

            });

            $(document).on('click', '.student_delete', function() {
                var scoreId = $(this).data('id');
                var url = '{{ route('scores.destroy', ':id') }}';
                url = url.replace(':id', scoreId);
                $('#deleteForm').attr('action', url);
            });

            @if (session('success'))
                toastr.success('{{ session('success') }}');
            @endif
        });
    </script>
@endsection
