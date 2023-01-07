@extends('backoffice.layouts.master')

@section('title', 'List Product Biller')

@section('content')
<div class="card">
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <th>{{$item->name}}</th>
                        <th>Harga</th>
                        <th>Kode</th>
                    </tr>
                    @foreach($item->product_details as $sub)
                        <tr>
                            <td>{{$sub->name}}</td>
                            <td>1000</td>
                            <td>{{$sub->code}}</td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection