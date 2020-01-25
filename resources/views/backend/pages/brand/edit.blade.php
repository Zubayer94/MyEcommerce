@extends('backend.layouts.master')

@section('libcss')
<link rel="stylesheet" type="text/css" href="{{asset('/css/backendStyle.css')}}">
@endsection

@section('adminindex')

<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">
      
      <div class="card-header">
        <h5 class="card-title float-left">Edit <strong><span class="text-danger">{{$brand->name}}</span></strong></h5>
        <a href="{{ route('admin.brands') }}" class="float-right btn btn-info"><i class="fas fa-clipboard-list"></i><span class="hide-menu"> brand List </span></a>
      </div>
      
      <div class="card-body">
        
        <form action="{{ route('admin.brand.update', $brand->id)}}" method="post" enctype="multipart/form-data">
          @csrf
          
          <div class="form-group">
            <label  class=" @error('name') text-primary @enderror "> Name </label>
            <input type="text" class="form-control @error('name') border-danger @enderror " name="name" value="{{$brand->name}}"   >
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          
          <div class="form-group">
            <label  class=" @error('description') text-primary @enderror "> Description </label>
            <textarea id="editor" name="description" rows="6" cols="60" class="form-control @error('description') border-danger @enderror"  >{{$brand->description}}</textarea>
            @error('description')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          
          <div class="form-group">
            <label class=" @error('brand_status') text-primary @enderror ">brand Publication Status</label>
            <br>
            <label class="radio-inline">
              <input type="radio"  name="brand_status" value="1" {{$brand->brand_status == 1 ? 'checked' : ''}}>  Publish brand
            </label>

            <br>
            
            <label class="radio-inline">
              <input type="radio"  name="brand_status" value="0" {{$brand->brand_status == 0 ? 'checked' : ''}}>  Unpublish brand
            </label>

            @error('brand_status')
            <span class="text-danger">{{$message}}</span>
            @enderror
            
          </div>
          
          
          <div class="form-group">
            <label>Uploaded Image</label>
            <div class="row">
              @if ($brand->image != NULL)
                <div class="col-md-3">
                  <img src="{{ asset('images/brands/' . $brand->image ) }}" width="150">
                </div>
              @else
                <strong><p class="text-warning">**No Image Uploaded for that brand!!</p></strong>
              @endif
            </div>
          </div>
          
          <div class="form-group">
            <label class=" @error('image') text-primary @enderror " >Add brand image (Optional)</label>
            <input class="form-control" id="image-upload" name="image" type="file" />
            <div id="thumb-output"></div>
            @error('image')
            <span class="text-danger">{{$message}}</span>
            @enderror
            
          </div>
          
          <button type="submit" class="btn btn-primary">Update brand</button>
        </form>
        
        
        
      </div>
    </div>
  </div>
</div>



@endsection

@section('libjs')
<script>
  $(document).ready(function(){
    $('#image-upload').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
        {
        $('#thumb-output').html(''); //clear html of output element
        var data = $(this)[0].files; //this file data
        
        $.each(data, function(index, file){ //loop though each file
          if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
            var fRead = new FileReader(); //new filereader
            fRead.onload = (function(file){ //trigger function on successful read
            return function(e) {
              var img = $('<img/>').addClass('thumb').attr('src', e.target.result); //create image element 
              $('#thumb-output').append(img); //append image to output element
            };
              })(file);
            fRead.readAsDataURL(file); //URL representing the file's data.
          }
        });
        
      }else{
        alert("Your browser doesn't support File API!"); //if File API is absent
      }
    });
  });
</script>

@endsection


