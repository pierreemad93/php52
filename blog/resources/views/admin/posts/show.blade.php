@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-profile">
                <div class="card-avatar">
                    <a href="#pablo">
                        <img src="{{URL::asset('adminpanel/img')}}/{{$post->image}}" style="height: 10vh">
                    </a>
                </div>
                <div class="card-body">
                    <h6 class="card-category">{{$post->author}}</h6>
                    <h4 class="card-title">{{$post->title}}</h4>
                    <p class="card-description">{{ $post->desc}}</p>
                    <h6 class="card-category">add at {{ $post->created_at->diffForHumans()}}</h6>
                </div>
            </div>
        </div>
    </div>
    {{-- start show comment --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card card-profile">
                <div class="" style="text-align: left">
                    <h2>Comments</h2>
                </div>
                @forelse ($comments as $comment )
                <div class="card-body" style="text-align: left">
                    <h4 class="card-title">{{$comment->commenter}}</h4>
                    <p class="card-description">{{ $comment->comment}}</p>
                    <h6 class="card-category">add at {{ $comment->created_at->diffForHumans()}}</h6>
                    {{-- start show reply --}}
                    @foreach ($replies as $reply)
                    <div class="card-body" style="text-align: left">
                        <h4 class="card-title">{{$reply->replier}}</h4>
                        <p class="card-description">{{$reply->reply}}</p>
                        <h6 class="card-category">add at {{ $reply->created_at->diffForHumans()}}</h6>
                    </div>
                    @endforeach
                    {{-- end show reply --}}
                    {{-- Start reply--}}
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="post" action="{{route('reply.store')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-group bmd-form-group">
                                                    <textarea class="form-control" rows="1" name="reply"></textarea>
                                                </div>
                                            </div>
                                            <input type="hidden" name="replier" value="{{ Auth::user()->name}}">
                                            <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                            <input type="hidden" name="post_id" value="{{$post->id}}">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary pull-right">Add Reply</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- end reply--}}
                </div>
                @empty
                <div class="card-body" style="text-align: left">
                    <h3 class="card-description">Put the first comment</h3>
                </div>
                @endforelse
            </div>
        </div>
    </div>
    {{-- Start add comment --}}
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Add Comment</h4>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('comment.store')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-group bmd-form-group">
                                    <textarea class="form-control" rows="5" name="comment"></textarea>
                                </div>
                            </div>
                            <input type="hidden" name="commenter" value="{{ Auth::user()->name}}">
                            <input type="hidden" name="post_id" value="{{$post->id}}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id}}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Submit comment</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
