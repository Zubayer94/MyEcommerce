@extends('backend.layouts.master')

@section('libcss')
    
    <link rel="stylesheet" type="text/css" href="{{asset('/css/backendStyle.css')}}">
@endsection

@section('adminindex')
{{-- @php
  $sl = 1;
@endphp --}}

<div class="card">
  <div class="card-body">

    <h5 class="card-title float-left">Product List</h5>
    {{-- @include('backend.partial.messages') --}}
    {{-- <a href="{{ route('admin.products.input') }}" class="float-right btn btn-success"><i class="mdi mdi-pencil"></i><span class="hide-menu"> ADD Product </span></a> --}}
    <button class="float-right btn btn-success" data-toggle="modal" data-target="#editProuctModal" ><i class="fas fa-edit"></i> ADD Product</button>
    
    <div id="getUrl" data-url= {{-- {{ route('admin.index.update') }} --}}></div>


    <div id="showUpdateData" class="card-body table-responsive">
      <table id="zero_config" class="table table-sm table-striped table-hover table-bordered">
        <thead class="thead-dark">

          <tr>
            <th>SL</th>
            <th>title</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>acton</th>
          </tr>

        </thead>
        <tbody >
          {{-- @foreach ($products as $product) --}}
          <tr>
            <td >#{{-- {{$sl++}} --}}</td>
            <td >33333333333333{{-- {{$product->title}} --}}</td>
            <td>4444444444444444444444{{-- {{$product->price}} --}}</td>
            <td>44444444444{{-- {{$product->quantity}} --}}</td>
            <td>
              <a href="{{-- {{ route('admin.product.view') }} --}}" data-id="{{-- {{$product->id}} --}}" id="view" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="left" title="View"> <i class="fas fa-eye"></i> </a>

              <a href="{{-- {{ route('admin.product.edit') }} --}}" data-id="{{-- {{$product->id}} --}}" id="edit" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fas fa-pencil-alt"></i></a>

              <a href="{{-- {{ route('admin.product.delete') }} --}}" data-id="{{-- {{$product->id}} --}}" id="delete" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="left" title="Delete"><i class="fas fa-trash-alt"></i></a>
            </td>
          </tr>
          {{-- @endforeach --}}
          
        </tbody>
        <tfoot >
          <tr>
            <th>SL</th>
            <th>title</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>acton</th>
          </tr>
        </tfoot>
      </table>
    </div>


  </div>

</div>

{{-- add product model stars --}}
<div class="modal fade" id="editProuctModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">

    <form action="{{ route('admin.product.store') }}" id="dataForm" method="POST" enctype="multipart/form-data">
    @csrf
    
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="oldBookTitle"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">

          {{-- This div is used to put the product id --}}
          <input type="hidden" name="id" id="productid"></input> 

          <div class="form-group " id="form-group-title" >
            <label for="exampleInputEmail1 ">Title</label>
            <input type="text" class="form-control border-title" name="title" id="title" placeholder="Enter product title">
            <strong><span class="help-block text-danger"></span></strong>
          </div>

          <div class="form-group" id="form-group-description" >
            <label for="description">Description</label>
            <textarea  name="description" id="description" rows="6" cols="60" class="form-control border-description" placeholder="Enter product description"></textarea>
            <strong><span class="help-block text-danger"></span></strong>
          </div>

          <div class="form-group" id="form-group-price" >
            <label for="exampleInputEmail1">Price</label>
            <input type="number" class="form-control border-price" name="price" id="price" placeholder="Enter product price">
            <strong><span class="help-block text-danger"></span></strong>
          </div>

          <div class="form-group" id="form-group-quantity" >
            <label for="exampleInputEmail1">Quantity</label>
            <input type="number" class="form-control border-quantity" name="quantity" id="quantity" placeholder="Enter product quantity">
            <strong><span class="help-block text-danger"></span></strong>
          </div>

          <div class="form-group" >
            <label for="product_image">Add product image</label>

            <input class="form-control" id="pic" name="pic[]" type="file" value="{{ old('pic') }}" multiple/> 

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="submit" class="btn btn-primary">Add Product</button>
        </div>

      </div>
    </form>
  </div>
</div>
{{-- add product model ends --}}

{{-- <div class="load">
  <img src="{{ asset('image/loading1.gif') }}" class="img-fluid loading">
</div> --}}





@endsection

@section('libjs')
    
    {{-- <script src="{{asset('/js/datatableCustom.js')}}"></script> --}}
    <script src="{{asset('/js/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('/js/productscript.js')}}"></script>

    {{-- <script class="">
        /****************************************
         *       Data Table                   *
         ****************************************/
         // $('#zero_config').DataTable();

         $(document).ready(function() {
          $('#zero_config').DataTable( {
            "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]
          } );
        } );
    </script> --}}
@endsection


