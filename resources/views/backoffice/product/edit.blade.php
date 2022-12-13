@extends('backoffice.layouts.master')

@section('title', 'Edit Product')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit Produk</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('product-update')}}" method="POST" enctype="multipart/form-data">
        @csrf 
        @method('PUT')
      <div class="card-body">
        <input type="hidden" name="id" value="{{$product->id}}">
        <div class="form-group">
          <label>Nama Produk</label>
          <input type="text" class="form-control" name="name" placeholder="nama produk" value="{{$product->name}}">
        </div>
        <div class="form-group">
            <label >Status Produk</label>
            <select class="form-control" name="status">
              <option @if($product->status == 1) selected @endif value="1">Aktif </option>
              <option @if($product->status == 0) selected @endif value="0">Non-Aktif</option>
            </select>
          </div>
        <div class="form-group">
            <label >Tipe Produk</label>
            <select class="form-control" name="type">
              <option @if($product->type == 'Game') selected @endif value="Game">Game </option>
              <option @if($product->type == 'Pascabayar') selected @endif value="Pascabayar">Pascabayar</option>
              <option @if($product->type == 'Prabayar') selected @endif value="Prabayar">Prabayar</option>
            </select>
          </div>
          <div class="form-group">
            <label>Url Gambar</label>
            <input type="text" class="form-control" name="img" placeholder="url gambar" value="{{$product->img}}">
          </div>
          <div class="form-group">
            <label>Code Produk</label>
            <input type="text" class="form-control" name="code" placeholder="kode produk" value="{{$product->code}}">
          </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
@endsection