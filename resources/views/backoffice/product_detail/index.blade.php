@extends('backoffice.layouts.master')

@section('title', 'Detail Product')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row mb-3">
              <a href="{{route('product-detail-add')}}" class="btn btn-primary add-button">Tambah Detail</a>
          </div>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Detail Produk</th>
                    <th>Kode</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($details as $detail)
                    <tr>
                        <td>{{$detail->products->name}}</td>
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


@push('script')
<script>
    $(document).ready( function () {
        $('#example1').DataTable();
    } );
</script>
@endpush