@extends('layouts.master')
@section('content')


<!-- product card stars here -->

<div class="container">
    <div class="col-sm-6 offset-3">
        @include('admin.partial.messages')
        <form action="{{ route('newsfeed.update', [$post->id]) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="panel panel-default">
                <div class="panel-body">

                    <div class="offset-3" style="margin-top: 10px;margin-bottom: 10px;">
                        <h5>Edit Post</h5>
                    </div>

                    <div class="form-group ">
                        <input type="text" name="title" class="form-control" value="{{ $post->title}}">

                    </div>

                    <div>
                        <small >Choose Book Category</small></p>
                        <select name="category" class="form-group form-control" placeholder="">
                            <option value="{{$post->category}} selected">Romantic</option>
                            <option value="Romantic">Romantic</option>
                            <option value="Comic">Comic </option>
                            <option value="Suspence">Suspence </option>
                            <option value="Thriller">Thriller </option>
                        </select>
                    </div>

                    <div class="form-group ">

                        <input type="radio" name="posttype" value="Sell Book" checked> Sell<br>
                        <input type="radio" name="posttype" value="Exchange Book" > Exchange<br>


                    </div>

                    <div class="form-group ">

                        <input type="number" name="bookprice" value="{{$post->price}}" class="form-control">

                    </div>

                    <div class="form-group ">
                        <textarea name="body" rows="3" cols="50" class="form-control" >{{$post->body}}</textarea>

                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control" name="pic" id="pic">
                    </div>
                    <input type="submit" value="Update Post" class="btn btn-primary btn-block" style="margin-bottom: 20px;">
                </div>
            </div>
        </form>

</div>


</div>
<!-- product card ends here class="card-footer" -->
@endsection
