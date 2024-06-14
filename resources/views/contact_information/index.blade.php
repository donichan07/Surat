@extends('layouts.master')

@section('content')
<title>Setting Informasi</title>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Daftar Kontak</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">Kontak</li>
                            <li class="breadcrumb-item active">Daftar Kontak</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success mt-3">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table comman-shadow">
                    <div class="card-body">
                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Daftar Kontak</h3>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">
                                    <a href="{{ route('contact_information.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Kontak</a>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="contactTable" class="table border-0 star-book table-hover table-center mb-0 table-striped">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Nomor Telepon</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contacts as $key => $contact)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->phone_number }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-info" href="{{ route('contact_information.show', $contact->id) }}">Tampilkan</a>
                                            <a class="btn btn-sm btn-primary" href="{{ route('contact_information.edit', $contact->id) }}">Edit</a>
                                            <form action="{{ route('contact_information.destroy', $contact->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-3">
                            {{-- {{ $contacts->links() }} --}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables CSS and JS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<!-- Initialize DataTable -->
<script>
    $(document).ready(function() {
        // Initialize DataTable with pagination and search functionality
        $('#contactTable').DataTable({
            "pageLength": 5, // Set number of rows per page
            "language": {
                "search": "Cari:",
                "lengthMenu": "Tampilkan _MENU_ data per halaman",
                "zeroRecords": "Tidak ada data yang ditemukan",
                "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                "infoEmpty": "Tidak ada data yang tersedia",
                "infoFiltered": "(difilter dari total _MAX_ data)",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "Selanjutnya",
                    "previous": "Sebelumnya"
                }
            }
        });

        // Toastr notifications
        var successMessage = '{{ Session::get('success') }}';
        var errorMessage = '{{ Session::get('error') }}';

        if(successMessage){
            toastr.success(successMessage, 'Sukses');
        }
        if(errorMessage){
            toastr.error(errorMessage, 'Error');
        }
    });
</script>

@endsection
