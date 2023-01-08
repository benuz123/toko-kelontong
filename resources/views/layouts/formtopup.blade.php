@extends('layouts.master')

@section('content')

<form action="{{route('confirm-order')}}" method="POST">
    @csrf
    <input type="hidden" name="product_code" value="{{$product->code}}">
    <div class="container" style="padding-top: 30px">
        <h1 style="margin-bottom: 30px" class="text-white text-center" >{{$product->name}}</h1>
        @if ($message = Session::get('error'))
        <div class="alert alert-danger" role="alert">
            {{$message}}
          </div>
        @elseif($errors->any())
        <div class="alert alert-danger" role="alert">
            {{$errors}}
          </div>
        @endif
        <h1 style="margin-bottom: 30px" class="text-white" >Masukkan Data</h1>
    <div class="row">
        @foreach ($product->parameter as $parameter)
            <div class="col">
                <div class="form-group">
                    <input type="text" name="{{$parameter->code}}" placeholder="Masukkan {{$parameter->name}}" class="form-control" >
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="container" style="padding-top: 30px">
    <h1 style="margin-bottom: 30px" class="text-white">Pilih Nominal</h1>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <select name="product_id" class="form-control" id="exampleFormControlSelect1">
                    @foreach ($product->product_details as $item)
                    <option value="{{$item->code}}">{{$item->name}}</option>
                    @endforeach
                  {{-- <option>1</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option> --}}
                </select>
              </div>
        </div>
    </div>
</div>

<div class="container" style="padding-top: 30px">
    <h1 style="margin-bottom: 30px" class="text-white">Metode Pembayaran</h1>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <select name="channel_code" class="form-control" id="exampleFormControlSelect1">
                    @foreach ($channels as $channel)
                        <option value="{{$channel['channel_code']}}">{{$channel['name']}}</option>
                    @endforeach
                  {{-- <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option> --}}
                </select>
              </div>
        </div>
    </div>
</div>

<div class="container" style="padding-top: 30px">
    <div class="row">
        <div class="col">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Order</button>
        </div>
    </div>
</div>
</form>
@endsection