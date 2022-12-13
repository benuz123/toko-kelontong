@extends('backoffice.layouts.master')

@section('title', 'Setting Product')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col col-sm-1">
              <a href="{{route('product-add')}}" class="btn btn-primary add-button">Tambah</a>
              
            </div>
            <div class="col col-sm-11">
              <div class="form-group row float-right">
                <label for="search" class="col-sm-3 col-form-label">Search : </label>
                <div class="col-sm-8">
                  <input type="search" class="form-control" id="search" name="search">
                </div>
              </div>
              
            </div>
            
          </div>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nama Product</th>
                    <th>Kode</th>
                    <th>Tipe</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{$product->name}}</td>
                        <td>{{$product->code}}</td>
                        <td>{{$product->type}}</td>
                        <td>{{$product->status}}</td>
                        <td class="row">
                          <a href="{{route('product-edit', $product->id)}}" class="btn btn-success btn-sm edit-button ml-3" >Edit</a>
                          <form action="{{route('product-delete', $product->id)}}" method="POST" >
                            @csrf
                            @method('DELETE')
                            <button  type="submit" class="btn btn-danger btn-sm delete-button ml-3">Delete</button>
                          </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection