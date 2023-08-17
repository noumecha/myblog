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
        @else
        <ul class="alert alert-success list-unstyled">
            <li>successfully done !</li>
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
                <textarea id="editor" name="content" class="form-control" cols="10" rows="30">
                    {{ $admin_data['articles']->getContent() }}
                </textarea>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label for="tags" class="mb-3 col-lg-2 col-md-6 col-sm-12 col-form-label">
                            Tags :
                        </label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input type="input" id="tags" name="tags" value="" placeholder="click on tag to add it" class="form-control">
                        </div>
                        <label class="list-group d-flex flex-row">
                            @foreach ($admin_data['tags'] as $tag)
                            <div class="list-group-item">
                                <input class="form-group-check-input me-1 tags_items" type="checkbox" id="{{ $tag->getId() }}" value="{{ $tag->getName() }}"/>
                                <label for="{{ $tag->getId() }}">
                                    {{ $tag->getName() }}
                                </label>
                            </div>
                            @endforeach
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <label for="categorie_id" class="col-lg-2 col-md-6 col-sm-12 col-form-label">
                    Categorie :
                </label>
                <div class="col-lg-10 col-md-6 col-sm-12">
                    <select class="form-control" name="categorie_id" id="categorie_id">
                        @foreach ($admin_data['categories'] as $cat)
                            @if($admin_data['articles']->getCategorieId() == $cat->getId())
                                <option selected id="{{ $cat->getId() }}" value="{{ $cat->getId() }}">{{ $cat->getName() }}</option>
                            @else
                                <option id="{{ $cat->getId() }}" value="{{ $cat->getId() }}">{{ $cat->getName() }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">
                Edit
            </button>
        </form>
    </div>
</div>
@endsection
