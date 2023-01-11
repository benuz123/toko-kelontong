@extends('backoffice.layouts.master')

@section('title', 'List Transaksi')

@section('content')
<div class="card">
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Tanggal Transaksi</th>
                    <th>Nama Produk</th>
                    <th>Tujuan</th>
                    <th>Invoice ID</th>
                    <th>Status</th>
                    <th>Jumlah</th>
                    <th>Metode Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{$transaction->created_at}}</td>
                        <td>{{$transaction->product_id}}</td>
                        <td>{{$transaction->customer_number}}</td>
                        <td>{{$transaction->invoice_id}}</td>
                        @if ($transaction->transaction_status == 0) <td>Belum di Proses</td>
                        @elseif ($transaction->transaction_status == 1) <td>Di Proses</td> 
                        @elseif ($transaction->transaction_status == 2) <td>Sukses</td> 
                        @else <td>Gagal/Expired</td> @endif
                        <td>Rp. {{$transaction->total_amount}}</td>
                        <td>{{$transaction->channel_code}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection

@push('script')
<script>
    $(document).ready( function () {
        $('#example1').DataTable();
    } );
</script>
@endpush