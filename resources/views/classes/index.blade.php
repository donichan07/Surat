<!-- resources/views/classes/index.blade.php -->

@extends('layouts.master')

@section('content')


    <!-- Tambahkan tombol untuk membuat kelas baru -->
    <a href="{{ route('classes.create') }}" class="btn btn-primary mb-3">Tambah Kelas Baru</a>

    @if ($classes->count() > 0)
        <table class="table">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card shadow-lg">
                        <div class="card-header bg-warning text-white">
                            <h5 class="card-title mb-0">Data Kelas</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover table-center">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama Kelas</th>
                                            <th>Nama Guru</th>
                                            <th>Kelas</th> <!-- Mengubah subject_id menjadi Kelas -->
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(\App\Models\ClassModel::all() as $class)
                                            <tr>
                                                <td>{{ $class->id }}</td>
                                                <td>{{ $class->class_name }}</td>
                                                <td>{{ $class->teacher->full_name }}</td>
                                                <td>{{ $class->subject->subject_name }}</td> <!-- Mengubah subject_id menjadi Kelas -->
                                                <td>
                                                    <a href="{{ route('classes.edit', $class->id) }}" class="btn btn-sm btn-info">Edit</a>
                                                    <form action="{{ route('classes.destroy', $class->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus kelas ini?')">Hapus</button>
                                                    </form>
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
        </table>
    @else
        <p>Tidak ada kelas yang tersedia.</p>
    @endif
@endsection
