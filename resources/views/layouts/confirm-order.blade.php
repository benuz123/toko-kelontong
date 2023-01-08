@extends('layouts.master')

@section('content')

<div class="container">
    <h1 class="text-center" style="margin-top: 40px; margin-bottom: 40px">Konfirmasi Transaksi</h1>
        <br>
    <div class="card">
        <table class="table">
            <tbody>
                <tr>
                    <td>Produk</td>
                    <td>{{$product->name}}</td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td>Rp. {{$product->price}}</td>
                </tr>
                @if ($nickname)
                    <tr>
                        <td>Nama Penerima</td>
                        <td>{{$nickname}}</td>
                    </tr>
                @endif
                <tr>
                    <td>Nomor Penerima</td>
                    <td>{{$param}}</td>
                </tr>
                <tr>
                    <td>Metode Pembayaran</td>
                    <td>{{$channel['name']}}</td>
                </tr>
                <tr>
                    <td>Total Tagihan</td>
                    <td>{{$total_amount}}</td>
                </tr>
            </tbody>
        </table>
        <form action="{{route('create-order')}}" class="text-center" method="POST">
            @csrf
            @foreach ($data as $key => $item)
                <input type="hidden" name="{{$key}}" value="{{$item}}">
            @endforeach
            @if <input type="hidden" name="total_amount" value="{{$total_amount}}"> @endif
            @if <input type="hidden" name="seller_ref_id" value="{{$seller_ref_id}}"> @endif
            <button type="submit" class="btn btn-sm btn-primary">Konfirmasi</button>
        </form>
    </div>
</div>

    
@endsection