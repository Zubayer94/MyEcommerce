@extends('backend.layouts.master')

@section('libcss')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/backendStyle.css')}}">
@endsection

@section('adminindex')

<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">
      
      <div class="card-header">
        <h5 class="card-title float-left">Add product</h5>
        <a href="{{ route('admin.products') }}" class="float-right btn btn-info"><i class="fas fa-clipboard-list"></i><span class="hide-menu"> Product List </span></a>
      </div>
      @include('backend.partial.messages')

      <div class="card-body">

        <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          
          <div class="form-group">
            <label for="exampleInputEmail1" class=" @error('name') text-info @enderror ">Name</label>
            <input type="text" class="form-control @error('name') border-danger @enderror " value="{{ old('name') }}" name="name"  placeholder="Enter product name">
            @error('name')
              <span class="text-danger">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="description" class=" @error('description') text-primary @enderror ">Description</label>
            <textarea id="editor" name="description" rows="6" cols="60" class="form-control @error('description') border-danger @enderror"  placeholder="Enter product description">{{ old('description') }}</textarea>
            @error('description')
              <span class="text-danger">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1" class=" @error('price') text-primary @enderror ">Price</label>
            <input type="number" class="form-control @error('price') border-danger @enderror" name="price" value="{{ old('price') }}"  placeholder="Enter product price">
            @error('price')
              <span class="text-danger">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1" class=" @error('quantity') text-primary @enderror ">Quantity</label>
            <input type="number" class="form-control @error('quantity') border-danger @enderror" name="quantity" value="{{ old('quantity') }}"  placeholder="Enter product quantity">
            @error('quantity')
              <span class="text-danger">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group">
            <label class=" @error('category_id') text-primary @enderror ">Select Category</label>
            <select class="form-control @error('category_id') border-danger @enderror" name="category_id" >
              <option selected>Click to select product Category</option>
              @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', 0)->get() as $parentCat)
              <option value="{{$parentCat->id}}" >{{$parentCat->name}}</option>
                @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', $parentCat->id)->get() as $childCat)
                  <option value="{{$childCat->id}}" >Sub Cat---> {{$childCat->name}}</option>
                @endforeach
              @endforeach
            </select>
            @error('category_id')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group">
            <label class=" @error('brand_id') text-primary @enderror ">Select Brand</label>
            <select class="form-control @error('brand_id') border-danger @enderror" name="brand_id" >
              <option selected>Click to select product Brand</option>
              @foreach (App\Models\Brand::orderBy('name', 'asc')->get() as $brand)
              <option value="{{$brand->id}}" >{{$brand->name}}</option>
              @endforeach
            </select>
            @error('brand_id')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group">
            <label class=" @error('status') text-primary @enderror ">Product Publication Status</label>
            <br>
            
            <label class="radio-inline">
              <input type="radio"  name="status" value="1" checked>  Publish Product
            </label>

            <br>
            
            <label class="radio-inline">
              <input type="radio"  name="status" value="0" >  Unpublish Product
            </label>
            @error('status')
            <span class="text-danger">{{$message}}</span>
            @enderror
            
          </div>

          <div class="form-group">
            <label for="product_image" class=" @error('pic') text-primary @enderror " >Add product image</label>
            <input class="form-control" id="image-upload" name="pic[]" type="file"  multiple/>
            <div id="thumb-output"></div>

            @error('pic')
              <span class="text-danger">{{$message}}</span>
            @enderror

          </div>

          <button type="submit" class="btn btn-primary">Add Product</button>
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


