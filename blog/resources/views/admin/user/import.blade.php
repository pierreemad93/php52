@extends('layouts.admin')
@section('title') add user @endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Add user</h4>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('user.import')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Upload Excelsheet</label>
                                <input type="file" class="form-control" name="file">
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Submit data</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
