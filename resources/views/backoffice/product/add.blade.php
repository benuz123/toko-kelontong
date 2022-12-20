@extends('backoffice.layouts.master')

@section('title', 'Tambah Product')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Tambah Produk</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('product-simpan')}}" method="POST" enctype="multipart/form-data">
        @csrf 
      <div class="card-body">
        <div class="form-group">
          <label>Nama Produk</label>
          <input type="text" class="form-control" name="name" placeholder="nama produk">
        </div>
        <div class="form-group">
          <label>Parameter</label>
          <select class="select2 " name="parameters[]" multiple="multiple" data-placeholder="Pilih Parameter"
                  style="width: 100%;">
            @foreach ($parameters as $parameter)
                <option value="{{$parameter->id}}">{{$parameter->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
            <label >Status Produk</label>
            <select class="form-control" name="status">
              <option value="1">Aktif </option>
              <option value="0">Non-Aktif</option>
            </select>
          </div>
        <div class="form-group">
            <label >Tipe Produk</label>
            <select class="form-control" name="type">
              <option value="Game">Game </option>
              <option value="Pascabayar">Pascabayar</option>
              <option value="Prabayar">Prabayar</option>
              <option value="Voucer">Voucer</option>
              <option value="E-Money">E-Money</option>
            </select>
          </div>
          <div class="form-group">
            <label>Url Gambar</label>
            <input type="text" class="form-control" name="img" placeholder="url gambar">
          </div>
          <div class="form-group">
            <label>Code Produk</label>
            <input type="text" class="form-control" name="code" placeholder="kode produk">
          </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
@endsection

@push('script')
  <script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
  <script>
    $('.select2').select2()
  </script>
@endpush

@push('css')
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
@endpush