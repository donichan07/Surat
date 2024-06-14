@extends('layouts.master')
@section('content')
    
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Selamat Datang {{ Auth::user()->name }}, {{ Auth::user()->role_name }} </h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                                <li class="breadcrumb-item active">Siswa</li>
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
                                    <h6>Mata Pelajaran</h6>
                                    <h3>{{ \App\Models\Subject::count() }}</h3>
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
                                    <h6>Jadwal</h6>
                                    <h3>{{ \App\Models\Lessons::count() }}</h3>
                                </div>
                                <div class="db-icon">
                                    <img src="{{URL::to('assets/img/icons/teacher-icon-02.svg')}}" alt="Ikon Dasbor">
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
                                    <h6>Ujian yang Diikuti</h6>
                                    <h3>{{ \App\Models\Eskul::count() }}</h3>
                                </div>
                                <div class="db-icon">
                                    <img src="{{URL::to('assets/img/icons/student-icon-01.svg')}}" alt="Ikon Dasbor">
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

 
            </div>
            <div class="container px-2">
                <div class="row">
                    <div class="col-12 col-lg-12 col-xl-8">
                        <div class="card flex-fill comman-shadow">
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
                                    <div class="pt-3 pb-3">
                                        @if (\Carbon\Carbon::setLocale('id') && ($today = \Carbon\Carbon::now()->isoFormat('dddd')))
                                            @if ($lessons = \App\Models\Lessons::where('days', $today)->with('subject')->get())
                                                @foreach ($lessons as $lesson)
                                                    <div class="table-responsive lesson">
                                                        <table class="table table-center">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <div class="date">
                                                                            <b>Kelas {{ $lesson->class }} {{ $lesson->class_type }}</b>
                                                                            <p>{{ $lesson->subject->subject_name }}</p>
                                                                            <ul class="teacher-date-list">
                                                                                <li><i class="fas fa-calendar-alt me-2"></i>
                                                                                    {{ $lesson->days }}
                                                                                    {{\Carbon\Carbon::now()->format('j M, Y')}}</li>
                                                                                <li>|</li>
                                                                                <li><i
                                                                                        class="fas fa-clock me-2"></i>{{ \Carbon\Carbon::parse($lesson->time_start)->format('H:i') }}
                                                                                    -
                                                                                    {{ \Carbon\Carbon::parse($lesson->time_end)->format('H:i') }}
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="lesson-confirm">
                                                                            <a href="#">Dikonfirmasi</a>
                                                                        </div>
                                                                        <button type="submit" class="btn btn-info">Jadwal
                                                                            Ulang</button>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                @endforeach
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


            <div class="container ">
                <div class="row">                       
                    <div class="col-12 col-lg-12 col-xl-12 d-flex">
                            <div class="card flex-fill comman-shadow">
                                <div class="card-header d-flex align-items-center">
                                    <h5 class="card-title">Nilai Siswa</h5>                                   
                                    <div class="col-auto text-end float-end ms-auto download-grp">
                                        @if (auth()->user()->role_name === 'Super Admin' || Session::get('role_name') === 'Teachers')
                                        <a href="{{ route('scores.create') }}" class="btn btn-primary"><i
                                                class="fas fa-plus"></i></a>
                                        @endif
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
                                    @foreach (\App\Models\Score::all() as $key => $score)
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
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
                                    <table id="eventTable" class="table star-student table-hover table-center table-borderless table-striped">
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
                                        <tbody>
                                            @foreach (\App\Models\Event::all() as $event)
                                                <tr>
                                                    <td>{{ $event->id }}</td>
                                                    <td>{{ $event->title }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($event->start)->format('d M Y H:i') }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($event->end)->format('d M Y H:i') }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($event->start)->diffInHours(\Carbon\Carbon::parse($event->end)) }} jam</td>
                                                    <td>
                                                        <div class="actions">
                                                            <a href="{{ url('fullcalender') }}" class="btn btn-sm">
                                                                <i class="fas fa-sign-in-alt me-2"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection                             
                

