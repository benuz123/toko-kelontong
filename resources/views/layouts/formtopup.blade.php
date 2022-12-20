@extends('layouts.master')

@section('content')

<h1>{{$product->name}}</h1>
<div class="container" style="padding-top: 30px">
    <h1 style="margin-bottom: 30px">Masukkan Data</h1>
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
    <h1 style="margin-bottom: 30px">Pilih Nominal</h1>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <select class="form-control" id="exampleFormControlSelect1">
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
    <h1 style="margin-bottom: 30px">Metode Pembayaran</h1>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <select class="form-control" id="exampleFormControlSelect1">
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
            <button type="button" class="btn btn-primary btn-lg btn-block">Order</button>
        </div>
    </div>
</div>
@endsection