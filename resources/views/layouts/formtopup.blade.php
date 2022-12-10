@extends('layouts.master')

@section('content')

<div class="container" style="padding-top: 30px">
    <h1 style="margin-bottom: 30px">Masukkan Data</h1>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <input type="email" placeholder="Masukkan Server" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
        </div>
        <div class="col">
            <div class="form-group">
                <input type="email" placeholder="Masukkan ID" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
        </div>
    </div>
</div>

<div class="container" style="padding-top: 30px">
    <h1 style="margin-bottom: 30px">Pilih Nominal</h1>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <select class="form-control" id="exampleFormControlSelect1">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
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
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
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