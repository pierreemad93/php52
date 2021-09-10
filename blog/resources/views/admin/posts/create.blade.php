@extends('layouts.admin')
@section('title') add user @endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Add Post</h4>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">title</label>
                                <input type="text" class="form-control" name="title">
                                @error('title')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Description</label>
                                <textarea class="form-control" name="desc"></textarea>
                                @error('desc')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Post image</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                            @error('image')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label class="">Author</label>
                                <input type="text" class="form-control" name="author" value="{{Auth::user()->name}}">
                                @error('author')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <input type="hidden" class="form-control" name="user_id" value="{{ Auth::user()->id }}">
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Submit Post</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
