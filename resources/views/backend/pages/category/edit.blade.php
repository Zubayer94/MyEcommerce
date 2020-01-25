@extends('backend.layouts.master')

@section('libcss')
<link rel="stylesheet" type="text/css" href="{{asset('/css/backendStyle.css')}}">
@endsection

@section('adminindex')

<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">
      
      <div class="card-header">
        <h5 class="card-title float-left">Edit <strong><span class="text-danger">{{$category->name}}</span></strong></h5>
        <a href="{{ route('admin.categories') }}" class="float-right btn btn-info"><i class="fas fa-clipboard-list"></i><span class="hide-menu"> Category List </span></a>
      </div>
      
      <div class="card-body">
        
        <form action="{{ route('admin.category.update', $category->id)}}" method="post" enctype="multipart/form-data">
          @csrf
          
          <div class="form-group">
            <label  class=" @error('name') text-primary @enderror "> Name </label>
            <input type="text" class="form-control @error('name') border-danger @enderror " name="name" value="{{$category->name}}"   >
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          
          <div class="form-group">
            <label  class=" @error('description') text-primary @enderror "> Description </label>
            <textarea id="editor" name="description" rows="6" cols="60" class="form-control @error('description') border-danger @enderror"  >{{$category->description}}</textarea>
            @error('description')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          
          <div class="form-group">
            <label class=" @error('category_status') text-primary @enderror ">Category Publication Status</label>
            <br>
            <label class="radio-inline">
              <input type="radio"  name="category_status" value="1" {{$category->category_status == 1 ? 'checked' : ''}}>  Publish Category
            </label>

            <br>
            
            <label class="radio-inline">
              <input type="radio"  name="category_status" value="0" {{$category->category_status == 0 ? 'checked' : ''}}>  Unpublish Category
            </label>

            @error('category_status')
            <span class="text-danger">{{$message}}</span>
            @enderror
            
          </div>
          
          <div class="form-group">
            <label class=" @error('parent_id') text-primary @enderror ">Parent Category</label>
            <select class="form-control @error('parent_id') border-danger @enderror" name="parent_id" >
              {{-- <option >Click to select Parent Category</option> --}}
              <option value="0" {{$category->parent_id == 0 ? 'selected' : ''}}>Null</option>
              @foreach ($parent_categories as $par)
              <option value="{{$par->id}}" {{$category->parent_id == $par->id ? 'selected' : ''}}> {{$par->name}} </option>
              @endforeach
            </select>
            @error('parent_id')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <span><p class="text-warning">{{$category->parent_id == 0 ? '**No Parent selected!' : ''}}</p></span>
          </div>
          
          <div class="form-group">
            <label>Uploaded Image</label>
            <div class="row">
              @if ($category->image != NULL)
                <div class="col-md-3">
                  <img src="{{ asset('images/categories/' . $category->image ) }}" width="40" height="40">
                </div>
              @else
                <strong><p class="text-warning">**No Image Uploaded for that category!!</p></strong>
              @endif
            </div>
          </div>
          
          <div class="form-group">
            <label class=" @error('image') text-primary @enderror " >Add Category image (Optional)</label>
            <input class="form-control" id="image-upload" name="image" type="file" />
            <div id="thumb-output"></div>
            
            @error('image')
            <span class="text-danger">{{$message}}</span>
            @enderror
            
          </div>
          
          <button type="submit" class="btn btn-primary">Update Category</button>
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


