@extends('backoffice.layouts.master')

@section('title', 'Detail Product')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col col-sm-1">
              <a href="{{route('product-detail-add')}}" class="btn btn-primary add-button">Tambah Detail Produk</a>
              
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
                    <th>product ID</th>
                    <th>Detail Product</th>
                    <th>Kode</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($details as $detail)
                    <tr>
                        <td>{{$detail->product_id}}</td>
                        <td>{{$detail->name}}</td>
                        <td>{{$detail->code}}</td>
                        <td>{{$detail->price}}</td>

                        <td class="row">
                          <a href="{{route('product-detail-edit', $detail->id)}}" class="btn btn-success btn-sm edit-button ml-3" >Edit</a>
                          <form action="{{route('product-detail-delete', $detail->id)}}" method="POST" >
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