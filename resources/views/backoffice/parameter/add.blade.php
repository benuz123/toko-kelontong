@extends('backoffice.layouts.master')

@section('title', 'Tambah Parameter')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Parameter</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('parameter-simpan')}}" method="POST" enctype="multipart/form-data">
        @csrf 
      <div class="card-body">
        <input type="hidden" name="id" value="">
          <div class="form-group">
            <label>Nama Parameter</label>
            <input type="text" class="form-control" name="name" placeholder="nama parameter">
          </div>
          <div class="form-group">
            <label>Code Parameter</label>
            <input type="text" class="form-control" name="code" placeholder="kode parameter">
          </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
@endsection

