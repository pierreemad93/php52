@extends('layouts.admin')
@section('title') users @endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Simple Table</h4>
                <p class="card-category"> Here is a subtitle for this table</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <tr>
                                <th>image</th>
                                <th>title</th>
                                <th>author</th>
                                <th>created_at</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <td> 
                                    <img src="{{URL::asset('adminpanel/img')}}/{{$post->image}}" style="height: 10vh">
                                </td>
                                <td>{{$post->title }}</td>
                                <td>{{$post->author}}</td>
                                <td>{{$post->created_at}}</td>
                                <td>
                                    <div class="container">
                                        <div class="row">
                                            {{-- {{url('admin/user/'.$user->id)}} --}}
                                            <a class="btn btn-info" href="{{route('post.show' , $post->id)}} ">show</a>
                                            <a class="btn btn-warning"
                                                href="{{route('user.edit' , $post->id)}}">Edit</a>
                                            {{-- <a class="btn btn-danger" href="">Delete</a> --}}
                                            <form method="post" action="{{ route('post.destroy' , $post->id)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <a class="btn btn-primary" href="{{route('post.create')}}">add post</a>
            </div>
        </div>
    </div>
</div>
@endsection
