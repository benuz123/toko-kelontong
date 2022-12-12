@extends('backoffice.layouts.master')

@section('title', 'Tambah Product')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Tambah Produk</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('product-detail-simpan')}}" method="POST" enctype="multipart/form-data">
        @csrf 
      <div class="card-body">
        <div class="form-group">
          <label>Produk</label>
          <input type="text" class="form-control" name="product_id" placeholder="nama detail">
        </div>
        <!--<div class="form-group">
          <label>Produk</label>
          <select class="form-control" name="product_id">
            <option value="MLBB">MLBB</option>
            <option value="PLN">PLN</option>
          </select>
        </div>-->
        <div class="form-group">
          <label>Detail Produk</label>
          <input type="text" class="form-control" name="name" placeholder="nama detail">
        </div>
          <div class="form-group">
            <label>Harga</label>
            <input type="text" class="form-control" name="price" placeholder="harga">
          </div>
          <div class="form-group">
            <label>Kode</label>
            <input type="text" class="form-control" name="code" placeholder="kode detail">
          </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
@endsection