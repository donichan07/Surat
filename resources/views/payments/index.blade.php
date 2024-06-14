@extends('layouts.master')

@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header mt-2">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">All Payments</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">Pembayaran</li>
                                <li class="breadcrumb-item active">Semua Pembayaran</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-sm-12 mb-3">
                        <div class="card card-table comman-shadow ">
                            <div class="card-body">
                                <div class="page-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h3 class="page-title">Daftar Pembayaran</h3>
                                        </div>
                                        <div class="col-auto text-end float-end ms-auto download-grp">
                                            <!-- Buttons -->
                                            <a href="#" class="btn btn-outline-gray me-2 active">
                                                <i class="fa fa-list" aria-hidden="true"></i>
                                            </a>
                                            <a href="#" class="btn btn-outline-gray me-2">
                                                <i class="fa fa-th" aria-hidden="true"></i>
                                            </a>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#paymentModal">
                                                Pembayaran <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive  px-3">
                                <table class="table border-0 star-book table-hover table-center mb-0 table-striped"
                                    id="paymentTable">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama Siswa</th>
                                            <th>Metode Pembayaran</th>
                                            <th>Jenis Pembayaran</th>
                                            <th>Nominal Pembayaran</th>
                                            <th>Status Pembayaran</th>
                                            <th>Bukti Pembayaran</th>
                                            <th>Waktu Pembayaran</th>
                                            <th>update_at Pembayaran</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($payments as $payment)
                                            <tr>
                                                <td>{{ $payment->id }}</td>
                                                <td>{{ $payment->first_name }} {{ $payment->last_name }}</td>
                                                <td>{{ $payment->payment_method }}</td>
                                                <td>{{ $payment->payment_type }}</td>
                                                <td>{{ $payment->payment_instructions }}</td>
                                                @if ($payment->payment_status == 'Success')
                                                    <td><span
                                                            class="bg-success opacity-50 px-2 py-1 rounded-pill text-white fw-bold">{{ $payment->payment_status }}</span>
                                                    </td>
                                                @elseif($payment->payment_status == 'Pending')
                                                    <td><span
                                                            class="bg-info opacity-50 px-2 py-1 rounded-pill text-white fw-bold">{{ $payment->payment_status }}</span>
                                                    </td>
                                                @elseif($payment->payment_status == 'Ditolak')
                                                    <td><span
                                                            class="bg-danger opacity-50 px-2 py-1 rounded-pill text-white fw-bold">{{ $payment->payment_status }}</span>
                                                    </td>
                                                @endif
                                                <td>
                                                    @if ($payment->proof_of_payment)
                                                        <img src="{{ asset('storage/' . $payment->proof_of_payment) }}"
                                                            alt="Proof of Payment" width="100">
                                                    @else
                                                        No Proof
                                                    @endif
                                                </td>
                                                <td>{{ $payment->created_at }}</td>
                                                <td>{{ $payment->updated_at }}</td>
                                                <td>
                                                    <div class="actions d-flex justify-content-start">
                                                        <!-- Tombol Edit -->
                                                        <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-sm me-2">
                                                            <i class="far fa-edit me-1"></i>
                                                        </a>

                                                        <!-- Form untuk menghapus -->
                                                        <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" style="display: inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pembayaran ini?')">
                                                                <i class="far fa-trash-alt me-1"></i>
                                                            </button>
                                                        </form>
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
            <!-- Modal -->
            <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="paymentModalLabel">Create Payment</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('payments.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="student_id">Student</label>
                                    <select class="form-control" id="student_id" name="student_id">
                                        @foreach ($students as $student)
                                            <option value="{{ $student->id }}">{{ $student->first_name }}
                                                {{ $student->last_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="payment_method">Payment Method</label>
                                    <select class="form-control" id="payment_method" name="payment_method"
                                        onchange="toggleProofOfPayment()">
                                        <option value="Transfer Bank">Transfer Bank</option>
                                        <option value="Pembayaran Tunai">Pembayaran Tunai</option>
                                        <option value="Pembayaran Online">Pembayaran Online</option>
                                        <option value="Cek atau Giro">Cek atau Giro</option>
                                        <option value="Pembayaran Daring melalui Bank">Pembayaran Daring melalui Bank
                                        </option>
                                        <option value="Pembayaran dengan Kartu Prabayar">Pembayaran dengan Kartu Prabayar
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="payment_type">Payment Type</label>
                                    <select class="form-control" id="payment_type" name="payment_type">
                                        <option value="Biaya Pendidikan">Biaya Pendidikan</option>
                                        <option value="Seragam Sekolah">Seragam Sekolah</option>
                                        <option value="Buku dan Materi Pelajaran">Buku dan Materi Pelajaran</option>
                                        <option value="Kegiatan Ekstrakurikuler">Kegiatan Ekstrakurikuler</option>
                                        <option value="Makanan dan Kantin">Makanan dan Kantin</option>
                                        <option value="Transportasi">Transportasi</option>
                                        <option value="Biaya Acara dan Perjalanan">Biaya Acara dan Perjalanan</option>
                                        <option value="Biaya Teknologi">Biaya Teknologi</option>
                                        <option value="Biaya Tambahan">Biaya Tambahan</option>
                                        <option value="Donasi dan Sumbangan">Donasi dan Sumbangan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="payment_instructions">Amount (in IDR)</label>
                                    <input type="number" class="form-control" id="payment_instructions"
                                        name="payment_instructions" placeholder="Enter amount in IDR">
                                </div>

                                <div class="form-group">
                                    {{-- <label for="payment_status">Payment Status</label>
                            <select class="form-control" id="payment_status" name="payment_status">
                                <option value="Pending">Pending</option>
                                <option value="Success">Success</option>
                                <option value="Failed">Failed</option>
                            </select>
                        </div> --}}
                                    <div class="form-group" id="proof_of_payment_div">
                                        <label for="proof_of_payment">Proof of Payment</label>
                                        <input type="file" class="form-control-file" id="proof_of_payment"
                                            name="proof_of_payment">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Alert Modal -->
    <div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="alertModalLabel">Notification</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="alertModalBody">
                    <!-- Message will be inserted here dynamically -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Function to toggle proof of payment visibility
        function toggleProofOfPayment() {
            var paymentMethod = document.getElementById('payment_method').value;
            var proofOfPaymentDiv = document.getElementById('proof_of_payment_div');

            if (paymentMethod === 'Pembayaran Tunai') {
                proofOfPaymentDiv.style.display = 'none';
            } else {
                proofOfPaymentDiv.style.display = 'block';
            }
        }

        // Initialize the form with the correct visibility for the proof of payment field
        document.addEventListener('DOMContentLoaded', function() {
            toggleProofOfPayment();

            // Initialize DataTable for paymentTable
            $('#paymentTable').DataTable({
                "pageLength": 5 // Display only five records per page
            });

            // Check for flash messages in the session and show the alert modal if they exist
            @if (session('success'))
                showAlertModal('{{ session('success') }}');
            @endif

            @if (session('error'))
                showAlertModal('{{ session('error') }}');
            @endif
        });

        // Function to show alert modal
        function showAlertModal(message) {
            document.getElementById('alertModalBody').innerText = message;
            var alertModal = new bootstrap.Modal(document.getElementById('alertModal'));
            alertModal.show();
        }
    </script>
@endsection
