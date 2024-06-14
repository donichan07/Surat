@extends('layouts.master')

@section('content')
<title>Tambah Pembayaran</title>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Create Payment</h1>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#paymentModal">
                Launch Create Payment Modal
            </button>

            <!-- Modal -->
            <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel"
                aria-hidden="true">
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
                                    <select class="form-control" id="payment_method" name="payment_method">
                                        <option value="Transfer Bank">Transfer Bank</option>
                                        <option value="Pembayaran Tunai">Pembayaran Tunai</option>
                                        <option value="Pembayaran Online">Pembayaran Online</option>
                                        <option value="Cek atau Giro">Cek atau Giro</option>
                                        <option value="Pembayaran Daring melalui Bank">Pembayaran Daring melalui Bank
                                        </option>
                                        <option value="Pembayaran dengan Kartu Prabayar">Pembayaran dengan Kartu
                                            Prabayar</option>
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
                                    <label for="payment_instructions">Payment Instructions</label>
                                    <textarea class="form-control" id="payment_instructions"
                                        name="payment_instructions"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="payment_status">Payment Status</label>
                                    <select class="form-control" id="payment_status" name="payment_status">
                                        <option value="Pending">Pending</option>
                                        <option value="Success">Success</option>
                                        <option value="Failed">Failed</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="proof_of_payment">Proof of Payment</label>
                                    <input type="file" class="form-control-file" id="proof_of_payment"
                                        name="proof_of_payment">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
