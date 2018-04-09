@extends('layouts.app')

@section('content')

@if(Session::has('message'))
    <div class="alert alert-success">
        <strong>{{Session::get('message')}}</strong>
    </div>
@endif
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Oops!</strong> There are several problems<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Products 
                    <div style="float:right">
                        <a href="/products/create">Add Product</a>
                    </div>
                </div>
                <div class="panel-body">
                    <table id="table_id" String class="display" String>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                              <tr>
                                  <td>{{$product->name}}</td>
                                  <td><img src='{{asset("images/$product->image_name")}}' width="50"></td>
                                  <td>
                                      <a href="/products/{{$product->id}}/edit">Edit</a> | 
                                      <a href="#" onclick="event.preventDefault();
                                          document.getElementById('delete-product-{{$product->id}}').submit();">
                                          Delete
                                      </a>
                                      <form id="delete-product-{{$product->id}}" action="/products/{{$product->id}}"
                                          method="POST" style="display: none;">
                                          {{ csrf_field() }}
                                          <input type="hidden" name="_method" value="DELETE">
                                      </form>
                                  </td>
                              </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@push('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endpush
@push('scripts')
    <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script>
        $(table_id).DataTable();
    </script>
@endpush    
@endsection
