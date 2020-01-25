@extends('layouts.master')
@section('content')


<!-- product card stars here -->

<div class="container">
    <div class="col-sm-6 offset-3">
        @include('admin.partial.messages')
        <form method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="panel panel-default">
                <div class="panel-body">

                    <div class="offset-3" style="margin-top: 10px;margin-bottom: 10px;">
                        <h5>Sell Exchange & Share posts.</h5>
                    </div>

                    <div class="form-group ">
                        <input type="text" name="title" class="form-control" placeholder="Enter your post title">

                    </div>

                    <div>
                        <small >Choose Book Category</small></p>
                        <select name="category" class="form-group form-control" placeholder="">
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

                        <input type="number" name="bookprice" placeholder="Enter Book Price" class="form-control">

                    </div>

                    <div class="form-group ">
                        <textarea name="body" rows="3" cols="50" class="form-control" placeholder="Enter your post description"></textarea>

                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control" name="pic" id="pic">
                    </div>
                    <input type="submit" value="Post" class="btn btn-primary btn-block" style="margin-bottom: 20px;">
                </div>
            </div>
        </form>

        @foreach ($posts as $post)
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                  <img src="{{asset('images/post_pic/' . $post->image)}}" class="card-img" alt="...">
                </div>

              <div class="col-md-8">
                <div class="card-body">
                    <h5 href="#" class="card-title"><i class="nav-item fa fa-user"> </i> {{ $post->user->name}}</h5>
                    <h6 class="card-title">Book Name: {{ $post->title}}</h6>
                    <p class="card-text">{{$post->body}}</p>
                    <p class="text-primary" >Book Category: {{$post->category}} </p>
                    <p class="text-success">Book Sharing Type: {{$post->post_type}}</p>
                    <p class="text-danger ">Selling Price: {{$post->price}}</p>
                    {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                </div>

            </div>
            <div class="card-footer">
                <a href="" class="btn btn-link">Like</a>
                <a href="" class="btn btn-link">Dislike</a>
                <a href="{{ route('newsfeed.show', [$post->id]) }}" class="btn btn-link">Comment</a>
                <a href="{{ route('newsfeed.edit', [$post->id]) }}" class="btn btn-link">Edit</a>
                <a href="#deleteModel{{$post->id}}" data-toggle="modal" class="btn btn-danger">Delete</a>

                

                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModel{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete this post?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form action="{{ route('newsfeed.delete' , $post->id) }}" method="post">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger" >Permanent Delete</button>
                                </form>

                            </div>
                            <div class="modal-footer">

                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endforeach
</div>


</div>
<!-- product card ends here class="card-footer" -->
@endsection
