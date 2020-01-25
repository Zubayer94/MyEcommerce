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

    <h5 class="card-title float-left">Brand List</h5>
    <a href="{{ route('admin.brand.input') }}" class="float-right btn btn-success"><i class="fas fa-edit"></i><span class="hide-menu"> ADD Brand </span></a>

  <div id="showUpdateData" class="card-body table-responsive">
    @include('backend.partial.messages')
      <table id="zero_config" class="table  table-striped table-hover table-bordered">
        <thead class="thead-dark">

          <tr>
            <th><strong>SN</strong></th>
            <th><strong>Brand Name</strong></th>
            <th><strong>Image</strong></th>
            <th><strong>Publication Status</strong></th>
            <th><strong>Created At</strong></th>
            <th><strong>acton</strong></th>
          </tr>

        </thead>
        <tbody style="color: black !important;">
          @foreach ($brands as $brand)
          <tr>
            <td ><strong>{{$sl++}}</strong></td>
            <td ><strong>{{$brand->name}}</strong></td>
            <td >
              @if ($brand->image == NULL)
                NO image
              @else
                <img src="{{ asset('images/brands/' . $brand->image ) }}" width="60" height="30">
              @endif
            </td>
            <td>{{$brand->brand_status == 1 ? 'Published' : 'Unpublished'}}</td>
            <td>{{date("d-m-Y", strtotime($brand->created_at))}}</td>
            <td>
              {{-- brand publish status--}}
              @if ($brand->brand_status == 1)
                <a href="{{ route('admin.brand.statusUpdate' , $brand->id) }}"  class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="left" title="Unpublished ?"> <i class="fas fa-arrow-up"></i> </a>
              @else
                <a href="{{ route('admin.brand.statusUpdate' , $brand->id) }}" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="left" title="Published ?"> <i class="fas fa-arrow-down"></i> </a>
              @endif
              
              {{-- view brand --}}
              {{-- <a href="{{ route('admin.brand.view') }}" data-id="{{$brand->id}}" id="view" class="btn btn-sm btn-dark" data-toggle="tooltip" data-placement="left" title="View"> <i class="fas fa-eye"></i> </a> --}}
              
              {{-- edit brand --}}
              <a href="{{ route('admin.brand.edit' , $brand->id) }}" id="edit" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fas fa-edit"></i></a>
              {{-- delete brand --}}
              <a href="#deleteModel{{ $brand->id }}" data-toggle="modal" id="delete" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="left" title="Delete"><i class="fas fa-trash-alt"></i></a>

              <!-- Delete Modal -->
              <div class="modal fade" id="deleteModel{{ $brand->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <form action="{{ route('admin.brand.delete' , $brand->id) }}" method="post">
                        @csrf

                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete <span class="text-danger">{{$brand->name}}</span> brand?</h5>
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
            <th>SN</th>
            <th>brand Name</th>
            <th>Image</th>
            <th>Publication Status</th>
            <th>Created At</th>
            <th>acton</th>
          </tr>
        </tfoot> --}}
      </table>

      {{-- laravel pagination --}}
      {{-- <div class="float-right">
        {{$brands->links()}} 
      </div> --}}

    </div>


{{-- <!-- view Modal -->
  <div class="modal fade" id="viewbrand" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h3 class="modal-title" id="bookName"></h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <h5 class="cname"></h5>
          <br>
          <img src="" id="catimage" >
          <br>
          <h5 class="cdescription"></h5>
          <h5 class="vquantity"></h5>
          <h5 class="vprice"></h5>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<!-- view Modal ends --> --}}

  </div>

</div>


@endsection

@section('libjs')
    {{-- <script src="{{asset('/js/brandscript.js')}}"></script> --}}
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


