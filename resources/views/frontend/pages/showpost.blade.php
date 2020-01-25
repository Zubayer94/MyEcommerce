@extends('layouts.master')
@section('content')


<!-- product card stars here -->

<div class="container">
    <div class="col-sm-6 offset-3">
        @include('admin.partial.messages')
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
                <a href="{{ route('newsfeed.edit', [$post->id]) }}" class="btn btn-link">Edit</a>
                <a href="#deleteModel{{$post->id}}" data-toggle="modal" class="btn btn-danger">Delete</a>
                <a href="{{ route('newsfeed') }}" class="btn btn-success">Back</a>

                

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
                
                <div class="panel panel-default">
                    <div class="panel-body">
                        All comments here
                    </div>
                
                </div>
                @if ( Auth::check() )
                <div class="panel panel-default">
                    <div class="panel-body" >
                        <form action="{{ url('/comment') }}" method="POST" style="display: flex;" >
                            {{csrf_field()}}
                            <input type="hidden" name="post_id" value="{{$post->id}}">
                            <input type="text" name="comment" class="form-control" placeholder="comment here">
                            <div class="input-group-append">
                              <button class="btn btn-success" type="submit">Comment</button>  
                            </div>

                        </form>
                    </div>

                </div>
                @endif
                @foreach ($post->comments as $comment)
                    <div class="card-body">
                    <h6 href="#" class="card-title"><i class="nav-item fa fa-user"> </i> {{ $comment->user->name}}</h6>
                    <p class="card-text">{{$comment->comment}}</p>
                </div>
                @endforeach


            </div>
            



        </div>

    </div>

    </div>


</div>
<!-- product card ends here class="card-footer" -->
@endsection
