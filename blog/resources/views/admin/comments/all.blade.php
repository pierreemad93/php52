@extends('layouts.admin')
@section('title') Comments @endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">All Comments</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <tr>
                                <th>Comments</th>
                                <th>Commenter</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comments as $comment)
                            <tr>
                                <td>{{$comment->comment}}</td>
                                <td>{{$comment->commenter}}</td>
                                <td>
                                    <div class="container">
                                        <div class="row">
                                            {{-- {{url('admin/user/'.$user->id)}} --}}
                                            <a class="btn btn-info" href="">Approve</a>
                                            <a class="btn btn-danger" href="">UnApprove</a>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
