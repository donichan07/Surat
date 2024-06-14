@extends('layouts.master')
@section('content')
    {{-- pesan --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Selamat Datang {{ Auth::user()->name }},
                                {{ Auth::user()->role_name ? 'Guru' : '' }}
                            </h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                                <li class="breadcrumb-item active">Guru</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>Total Kelas</h6>
                                    <h3>{{ \App\Models\ClassModel::count() }}/{{ \App\Models\ClassModel::all()->count() }}
                                    </h3>
                                </div>
                                <div class="db-icon">
                                    <img src="{{ URL::to('assets/img/icons/teacher-icon-01.svg') }}" alt="Ikon Dasbor">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>Total Siswa</h6>
                                    <h3>{{ \App\Models\Student::count() }}</h3>
                                </div>
                                <div class="db-icon">
                                    <img src="{{ URL::to('assets/img/icons/dash-icon-01.svg') }}" alt="Ikon Dasbor">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>Total Pelajaran</h6>
                                    <h3>{{ \App\Models\Subject::count() }}/{{ \App\Models\Subject::all()->count() }}</h3>
                                </div>
                                <div class="db-icon">
                                    <img src="{{ URL::to('assets/img/icons/teacher-icon-02.svg') }}" alt="Ikon Dasbor">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>Narahubung</h6>
                                </div>
                                <div class="db-icon">
                                    <!-- WhatsApp Icon -->
                                    <div class="db-icon">
                                        <?php if (!is_null($contactInformation) && !is_null($contactInformation->whatsapp)): ?>
                                            <a href="https://wa.me/<?= $contactInformation->whatsapp ?>" target="_blank">
                                                <i class="fab fa-whatsapp fa-lg"></i>
                                            </a>
                                        <?php else: ?>
                                            <i class="fab fa-whatsapp fa-lg" style="color: grey;"></i> <!-- Placeholder jika tidak ada nomor WhatsApp -->
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <div class="row">
                <div class="col-12 col-lg-12 col-xl-8">
                    <div class="row">
                        <div class="col-12 col-lg-12 col-xl-12 d-flex">
                            <div class="card flex-fill comman-shadow">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col-6">
                                            <h5 class="card-title">Pelajaran Hari ini</h5>
                                        </div>
                                        <div class="col-6">
                                            <span class="float-end view-link"><a href="{{ route('lessons.index') }}">Lihat
                                                    Semua
                                                    Jadwal</a></span>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-lg-12 col-xl-12 d-flex">
                            <div class="card flex-fill comman-shadow">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col-6">
                                            <h5 class="card-title">Daftar Siswa</h5>
                                        </div>
                                        <table id="studentList"
                                            class="table border-0 star-student table-hover table-center mb-0 datatable table-striped px-3">
                                            <thead class="student-thread">
                                                <tr>
                                                    <th>
                                                        <div class="form-check check-tables">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="something">
                                                        </div>
                                                    </th>
                                                    <th>ID</th>
                                                    <th>Nama</th>
                                                    <th>Kelas</th>
                                                    <th>Tanggal Lahir</th>
                                                    <th>Nama Orang Tua</th>
                                                    <th>Nomor Ponsel</th>
                                                    <th>Alamat</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach (\App\Models\Student::all() as $key => $list)
                                                    <tr>
                                                        <td>
                                                            <div class="form-check check-tables">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="something">
                                                            </div>
                                                        </td>
                                                        <td>{{ ++$key }}</td>
                                                        <td hidden class="id">{{ $list->id }}</td>
                                                        <td hidden class="avatar">{{ $list->upload }}</td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href="student-details.html"
                                                                    class="avatar avatar-sm me-2">
                                                                    <img class="avatar-img rounded-circle"
                                                                        src="{{ Storage::url('student-photos/' . $list->upload) }}"
                                                                        alt="Gambar Pengguna">
                                                                </a>
                                                                <a href="student-details.html">{{ $list->first_name }}
                                                                    {{ $list->last_name }}</a>
                                                            </h2>
                                                        </td>
                                                        <td>{{ $list->class }} {{ $list->section }}</td>
                                                        <td>{{ $list->date_of_birth }}</td>
                                                        <td>{{ $list->parent_name }}</td>
                                                        <td>{{ $list->phone_number }}</td>
                                                        <td>{{ $list->address }}</td>

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
                </div>
                <!-- jQuery -->
                <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                <!-- DataTables JS -->
                <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
                <!-- Your existing JS files -->

                <script>
                    $(document).ready(function() {
                        $('#studentTable').DataTable({
                            // Customize DataTables options here
                            "paging": true,
                            "lengthChange": true,
                            "searching": true,
                            "ordering": true,
                            "info": true,
                            "autoWidth": false,
                            "responsive": true
                        });
                    });
                </script>
                <div class="col-12 col-lg-12 col-xl-4 d-flex">
                    <div class="card flex-fill comman-shadow">
                        <div class="card-body">
                            <div id="calendar-doctor" class="calendar-container"></div>
                            <div class="calendar-info calendar-info1">
                                <div class="up-come-header mb-3">
                                    <h2>Acara Mendatang</h2>
                                </div>
                                <div class="table-responsive">
                                    <table id="eventTable"
                                        class="table star-student table-hover table-center table-borderless table-striped">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>ID</th>
                                                <th>Judul Acara</th>
                                                <th>Waktu Mulai</th>
                                                <th>Waktu Berakhir</th>
                                                <th>Durasi</th>
                                                <th>Aksi</th>
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
    </div>
@endsection

@section('script')
    {{-- Include DataTables JS --}}
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {


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
