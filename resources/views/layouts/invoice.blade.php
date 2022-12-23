@extends('layouts.master')

@section('content')

<div class="container">
    <h1 class="text-center" style="margin-top: 40px; margin-bottom: 40px">Invoice</h1>
        <br>
    <div class="card">
        <table class="table">
            <tbody>
                <tr>
                    <td>Nomor Transaksi</td>
                    <td>{{$transaction->invoice_id}}</td>
                </tr>
                <tr>
                    <td>Produk</td>
                    <td>{{$transaction->product->name}}</td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td>Rp. {{$transaction->amount}}</td>
                </tr>
                <tr>
                    <td>Nickname</td>
                    <td>{{$transaction->nickname ? $transaction->nickname : '-'}}</td>
                </tr>
                <tr>
                    <td>Metode Pembayaran</td>
                    <td>{{$channel['name']}}</td>
                </tr>
                <tr>
                    <td>Status Pembayaran</td>
                    <td>{{$payment_status}}</td>
                </tr>
                <tr>
                    <td>Status Transaksi</td>
                    <td>{{$transaction_status}}</td>
                </tr>
                <tr>
                    <td>Total Tagihan</td>
                    <td>Rp. {{$transaction->total_amount}}</td>
                </tr>
                @if ($transaction->va_number != null)
                    <tr>
                        <td>Kode Pembayaran</td>
                        <td>{{$transaction->va_number}}</td>
                    </tr>
                @endif
                @if ($transaction->qr_string != null)
                    <tr>
                        <td>Kode QRIS</td>
                        <td>{{ QrCode::size(300)->generate($transaction->qr_string) }}</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

    
@endsection