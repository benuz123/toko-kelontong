@extends('backoffice.layouts.master')

@section('title', 'Edit Detail Product')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit Detail Produk</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('product-detail-update')}}" method="POST" enctype="multipart/form-data">
        @csrf 
        @method('PUT')
    
        <input type="hidden" name="id" value="{{$product->id}}">
    
      <div class="card-body">
        {{-- <div class="form-group">
          <label>Produk</label>
          <input type="text" class="form-control" name="product_id" placeholder="nama detail">
        </div> --}}
        <div class="form-group">
          <label>Produk</label>
          <select class="form-control" name="product_id">
            @foreach($products as $productx)
              <option @if($product->product_id == $productx->id) value="{{$productx->id}}" selected @endif>{{$productx->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label>Detail Produk</label>
          <input type="text" class="form-control" name="name" placeholder="nama detail" value="{{$product->name}}">
        </div>
          <div class="form-group">
            <label>Harga</label>
            <input type="text" class="form-control" name="price" placeholder="harga" value="{{$product->price}}">
          </div>
          <div class="form-group">
            <label>Kode</label>
            <input type="text" class="form-control" name="code" placeholder="kode detail" value="{{$product->code}}">
          </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
@endsection