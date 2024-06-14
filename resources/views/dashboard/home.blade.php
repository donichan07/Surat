@extends('layouts.master')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title"><span style="color: blue;">Selamat Datang</span> {{ Session::get('name') }}!</h3>
                            <hr
                                style="border: none; height: 2px; background-color: blue; animation: underline 2s infinite;">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active">{{ Session::get('name') }}</li>
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
                                    <h6><span style="color: rgb(3, 3, 3); font-weight: bold;">Total Murid</span></h6>
                                    <h3>{{ \App\Models\Student::count() }}</h3>
                                </div>
                                <div class="db-icon">
                                    <i class="fas fa-user-graduate" style="font-size: 2em; color: #141b1f;"></i>
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
                                    <h6><span style="color: rgb(0, 0, 0); font-weight: bold;">Jumlah Guru</span></h6>
                                    <h3>{{ \App\Models\Teacher::count() }}</h3>
                                </div>
                                <div class="db-icon">
                                    <i class="fas fa-chalkboard-teacher" style="font-size: 2em; color: #3498db;"></i>

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
                                    <h6><span style="color: rgb(0, 0, 0); font-weight: bold;">Orang Tua</span></h6>
                                    <h3>{{ \App\Models\Student::distinct('parent_name')->count('parent_name') }}</h3>
                                </div>

                                <div class="db-icon">
                                    <i class="fas fa-user-friends" style="font-size: 2em; color: #f39c12;"></i>
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
                                    <h6><span style="color: rgb(0, 0, 0); font-weight: bold;">Pendapatan</span></h6>
                                    
                                </div>
                                <div class="db-icon">
                                    <img src="{{ URL::to('assets/img/icons/dash-icon-04.svg') }}" alt="Dashboard Icon">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card card-chart">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-12 text-center">
                                    <h5 class="card-title">Jenis Kelamin</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    var ctx = document.getElementById('genderChart').getContext('2d');
                                    var genderChart = new Chart(ctx, {
                                        type: 'doughnut',
                                        data: {
                                            labels: ['Perempuan', 'Laki-laki'],
                                            datasets: [{
                                                label: 'Jumlah Siswa',
                                                data: [{{ \App\Models\Student::where('gender', 'Perempuan')->count() }},
                                                    {{ \App\Models\Student::where('gender', 'Laki-laki')->count() }}
                                                ],
                                                backgroundColor: [
                                                    'rgba(255, 99, 132, 0.6)',
                                                    'rgba(54, 162, 235, 0.6)'
                                                ],
                                                borderColor: [
                                                    'rgba(255, 99, 132, 1)',
                                                    'rgba(54, 162, 235, 1)'
                                                ],
                                                borderWidth: 2,
                                                hoverOffset: 4
                                            }]
                                        },
                                        options: {
                                            responsive: true,
                                            plugins: {
                                                legend: {
                                                    position: 'top',
                                                },
                                                tooltip: {
                                                    enabled: true,
                                                    mode: 'point'
                                                }
                                            },
                                            animation: {
                                                animateScale: true,
                                                animateRotate: true
                                            },
                                            aspectRatio: 2 // Menambahkan aspect ratio untuk lebih memperkecil ukuran chart
                                        }
                                    });
                                });
                            </script>
                            <canvas id="genderChart"></canvas>
                            <div class="text-center">
                                <div>Total Perempuan: {{ \App\Models\Student::where('gender', 'Perempuan')->count() }}</div>
                                <div>Total Laki-laki: {{ \App\Models\Student::where('gender', 'Laki-laki')->count() }}
                                </div>
                            </div>
                            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card card-chart">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Detail Pendapatan</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="pendapatanTable" class="table table-striped table-bordered table-hover table-center">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>ID Siswa</th>
                                            <th>Metode Pembayaran</th>
                                            <th>Jenis Pembayaran</th>
                                            <th>Status Pembayaran</th>
                                            <th>Bukti Pembayaran</th>
                                            <th>Instruksi Pembayaran</th>
                                        </tr>
                                    </thead>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            
                <script>
                    $(document).ready(function() {
                        $('#pendapatanTable').DataTable();
                    });
                </script>
                
            </div>




            <div class="row">
                {{-- Table Data Kelas --}}
                <div class="col-xl-6 d-flex">
                    <div class="card flex-fill student-space comman-shadow">
                        <div class="card-header d-flex align-items-center">
                            <h5 class="card-title">Data Kelas</h5>
                            <ul class="chart-list-out student-ellips">
                                <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="classTable"
                                    class="table star-student table-hover table-center table-borderless table-striped">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama Kelas</th>
                                            <th>Nama Guru</th>
                                            <th>Mata Pelajaran</th>
                                            <th>Kelas</th>
                                            @if (auth()->user()->role_name === 'Super Admin')
                                            <th>Aksi</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (\App\Models\ClassModel::all() as $class)
                                            <tr>
                                                <td>{{ $class->id }}</td>
                                                <td>{{ $class->class_name }}</td>
                                                <td>{{ $class->teacher->full_name }}</td>
                                                <td>{{ $class->subject->subject_name }}</td>
                                                <td>{{ $class->subject->class }}</td>
                                                @if (auth()->user()->role_name === 'Super Admin')
                                                <td>
                                                    <div class="actions">
                                                        <a href="{{ route('classes.edit', $class->id) }}" class="btn btn-sm bg-danger-light">
                                                            <i class="far fa-edit me-2"></i>
                                                        </a>
                                                        <form method="POST" action="{{ route('classes.destroy', $class->id) }}" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm bg-danger-light" onclick="return confirm('Apakah Anda yakin ingin menghapus kelas ini?')">
                                                                <i class="far fa-trash-alt me-2"></i>
                                                            </button>
                                                        </form>
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

                {{-- Table Jadwal Event --}}
                <div class="col-xl-6 d-flex">
                    <div class="card flex-fill student-space comman-shadow">
                        <div class="card-header d-flex align-items-center">
                            <h5 class="card-title">Jadwal Acara Mendatang</h5>
                            <ul class="chart-list-out student-ellips">
                                <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a></li>
                            </ul>
                        </div>
                        <div class="card-body">
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
                                            @if (auth()->user()->role_name === 'Super Admin')
                                            <th>Aksi</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Initialize DataTables -->
            <script>
                $(document).ready(function() {
                    $('#classTable').DataTable({
                        "pageLength": 5,
                        "language": {
                            "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/Indonesian.json"
                        }
                    });
                    $('#eventTable').DataTable({
                        "pageLength": 5,
                        "language": {
                            "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/Indonesian.json"
                        }
                    });
                });
            </script>


            <!--Tambahkan Script Font Awesome -->
            <script src="https://kit.fontawesome.com/a076d05399.js"></script>

            {{-- data user --}}
            <div class="row">
                <div class="col-xl-12">
                    <div class="card flex-fill student-space comman-shadow">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Data Pengguna</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="userTable"
                                    class="table star-student table-hover table-center table-borderless table-striped">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Tanggal Pendaftaran</th>
                                            <th>Role</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (\App\Models\User::all() as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->created_at->format('d M Y') }}</td>
                                                <td>{{ $user->role_name }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Initialize DataTables -->
            <script>
                $(document).ready(function() {
                    $('#userTable').DataTable({
                        "pageLength": 5,
                        "language": {
                            "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/Indonesian.json"
                        }
                    });
                });
            </script>
            {{-- Akhir Table Data Pengguna --}}


            <div class="row">
                <div class="col-xl-6 d-flex">

                    <div class="card flex-fill student-space comman-shadow">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="card-title">Daftar Buku</h5>
                            <ul class="chart-list-out student-ellipsis">
                                <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div>
                                <div class="table-responsive">
                                    <table id="bookTable" class="table">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Judul</th>
                                                <th>Penulis</th>
                                                <th>Penerbit</th>
                                                <th>Tahun Terbit</th>
                                                <th>Genre</th>
                                                <th>Stok</th>
                                                @if (auth()->user()->role_name === 'Super Admin')
                                                <th>Aksi</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $('#bookTable').DataTable();
                        });
                    </script>



                </div>
                <div class="col-xl-6 d-flex">
                    {{-- menu peminjaman --}}
                    <div class="card flex-fill comman-shadow">
                        <div class="card-header d-flex align-items-center">
                            <h5 class="card-title">Daftar Peminjaman Buku</h5>
                            <ul class="chart-list-out student-ellips">
                                <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table
                                    class="table border-0 star-book table-hover table-center mb-0 datatable table-striped">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">ID</th>
                                            <th scope="col">Judul Buku</th>
                                            <th scope="col">Nama Peminjam</th>
                                            <th scope="col">Tanggal Pinjam</th>
                                            <th scope="col">Tanggal Kembali</th>
                                            <th scope="col">Jumlah Buku</th>
                                            <th scope="col">Status</th>
                                            @if (auth()->user()->role_name === 'Super Admin')
                                            <th scope="col">Aksi</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Initialize DataTables -->
                    <script>
                        $(document).ready(function() {
                            $('.datatable').DataTable();
                        });
                    </script>

                </div>
            </div>

        </div>
    </div>
@endsection
