@extends('backend.layouts.master')

@section('libcss')
    
    <link rel="stylesheet" type="text/css" href="{{asset('/css/backendStyle.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/dataTables.min.css')}}">
    
@endsection

@section('adminindex')
@php
  $sl = 1;
@endphp

<div class="card">
  <div class="card-body">

    <h5 class="card-title float-left">Product List</h5>
    <a href="{{ route('admin.product.input') }}" class="float-right btn btn-success"><i class="fas fa-edit"></i><span class="hide-menu"> ADD Product </span></a>

  <div id="showUpdateData" class="card-body table-responsive">
    @include('backend.partial.messages')
      <table id="zero_config" class="table  table-striped table-hover table-bordered">
        <thead class="thead-dark">

          <tr>
            <th>SN</th>
            <th>Name</th>
            <th>Image</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Pro Category</th>
            <th>Pro Brand</th>
            <th>Created At</th>
            <th>acton</th>
          </tr>

        </thead>
        <tbody style="color: black !important;">
          @foreach ($products as $product)
          <tr>
            <td ><strong>{{$sl++}}</strong></td>
            <td ><strong>{{$product->name}}</strong></td>
            <td >
              @foreach ($product->images as $image)
                <img src="{{ asset('images/products/' . $image->image ) }}" width="50" height="50">
              @endforeach
            </td>
            <td>{{$product->price}} ৳</td>
            <td>{{$product->quantity}}</td>
            <td>

              {{App\Models\Category::where('id', $product->category_id)->value('name')}}
              
            </td>
            <td>{{App\Models\Brand::where('id', $product->brand_id)->value('name')}}</td>
            <td>{{date("d-m-Y", strtotime($product->created_at))}}</td>
            <td>
              {{-- category publish status--}}
              @if ($product->status == 1)
                <a href="{{ route('admin.product.statusUpdate' , $product->id) }}"  class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="left" title="Unpublished ?"> <i class="fas fa-arrow-up"></i> </a>
              @else
                <a href="{{ route('admin.product.statusUpdate' , $product->id) }}" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="left" title="Published ?"> <i class="fas fa-arrow-down"></i> </a>
              @endif
              {{-- view product --}}
              <a href="{{ route('admin.product.view') }}" data-id="{{$product->id}}" id="view" class="btn btn-sm btn-dark" data-toggle="tooltip" data-placement="left" title="View"> <i class="fas fa-eye"></i> </a>
              {{-- edit product --}}
              <a href="{{ route('admin.product.edit' , $product->id) }}" id="edit" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fas fa-edit"></i></a>
              {{-- delete product --}}
              <a href="#deleteModel{{ $product->id }}" data-toggle="modal" id="delete" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="left" title="Delete"><i class="fas fa-trash-alt"></i></a>

              <!-- Delete Modal -->
              <div class="modal fade" id="deleteModel{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <form action="{{ route('admin.product.delete' , $product->id) }}" method="post">
                        @csrf

                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete <span class="text-danger">{{$product->name}}</span>?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <span class="text-warning"><i class="fas fa-exclamation-triangle fa-5x"></i></span>

                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" >Permanent Delete</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <!-- Delete Modal ends -->

            </td>
          </tr>
          @endforeach
          
        </tbody>
        {{-- <tfoot >
          <tr>
            <th>SL</th>
            <th>Name</th>
            <th>Image</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Created At</th>
            <th>acton</th>
          </tr>
        </tfoot> --}}
      </table>
      {{-- laravel pagination --}}
      {{-- <div class="float-right">
        {{$products->links()}} 
      </div> --}}

    </div>


<!-- view Modal -->
  <div class="modal fade" id="viewProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h3 class="modal-title" id="bookName"></h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <h5 class="vname"></h5>
          <h5 class="vdescription"></h5>
          <h5 class="vquantity"></h5>
          <h5 class="vprice"></h5>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<!-- view Modal ends -->

  </div>

</div>


@endsection

@section('libjs')
    <script src="{{asset('/js/productscript.js')}}"></script>
    <script src="{{asset('/js/dataTables.min.js')}}"></script>
    <script class="">
        /****************************************
         *       Data Table                   *
         ****************************************/
         // $('#zero_config').DataTable();

         $(document).ready(function() {
          $('#zero_config').DataTable( {
            "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]
          } );
        } );
    </script>
@endsection


