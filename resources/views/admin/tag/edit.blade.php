@extends('layouts.admin')
@section('title', $admin_data['title'])
@section('content')
<div class="card mb-4">
    <div class="card-header">
        Edit tag
    </div>
    <div class="card-body">
        @if($errors->any())
        <ul class="alert alert-danger list-unstyled">
            @foreach($errors->all() as $e)
            <li>- {{ $e }}</li>
            @endforeach
        </ul>
        @else
        <ul class="alert alert-success list-unstyled">
            <li>successfully done !</li>
        </ul>
        @endif

        <form action="{{ route('admin.tag.update',['id'=>$admin_data['tags']->getId()]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label for="name" class="col-lg-2 col-md-6 col-sm-12 col-form-label">
                            Name :
                        </label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input type="text" name="name" value="{{$admin_data['tags']->getTitle()}}" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">
                Edit
            </button>
        </form>
    </div>
</div>
@endsection
