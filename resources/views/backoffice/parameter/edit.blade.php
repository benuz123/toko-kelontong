@extends('backoffice.layouts.master')

@section('title', 'Edit Parameter')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit Produk</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('parameter-update')}}" method="POST" enctype="multipart/form-data">
        @csrf 
        @method('PUT')
      <div class="card-body">
        <input type="hidden" name="id" value="{{$parameter->id}}">
          <div class="form-group">
            <label>Nama Parameter</label>
            <input type="text" class="form-control" name="name" placeholder="url gambar" value="{{$parameter->name}}">
          </div>
          <div class="form-group">
            <label>Code Parameter</label>
            <input type="text" class="form-control" name="code" placeholder="kode produk" value="{{$parameter->code}}">
          </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
@endsection