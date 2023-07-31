@extends('layouts.admin')
@section('title', $admin_data['title'])
@section('content')
<div class="card mb-4">
    <div class="card-header">
        Edit article
    </div>
    <div class="card-body">
        @if($errors->any())
        <ul class="alert alert-danger list-unstyled">
            @foreach($errors->all() as $e)
            <li>- {{ $e }}</li>
            @endforeach
        </ul>
        @endif

        <form action="{{ route('admin.article.update',['id'=>$admin_data['articles']->getId()]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label for="title" class="col-lg-2 col-md-6 col-sm-12 col-form-label">
                            Title :
                        </label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input type="text" name="title" value="{{$admin_data['articles']->getTitle()}}" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label for="image" class="col-lg-2 col-md-6 col-sm-12 col-form-label">
                            Image :
                        </label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input type="file" name="image" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col">
                    &nbsp;
                </div>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">
                    Description :
                </label>
                <textarea name="content" class="form-control" rows="3">
                    {{ $admin_data['articles']->getContent() }}
                </textarea>
            </div>
            <button type="submit" class="btn btn-primary">
                Edit
            </button>
        </form>
    </div>
</div>
@endsection
