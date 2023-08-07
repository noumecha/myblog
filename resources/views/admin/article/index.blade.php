@extends('layouts.admin')
@section('title', $admin_data['title'])
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            Create Article
        </div>
        <div class="card-body">
            @if($errors->any())
            <ul class="alert alert-danger list-unstyled">
                @foreach($errors->all() as $e)
                    <li>-{{ $e }} </li>
                @endforeach
            </ul>
            @endif
            <form method="POST" action="{{route('admin.article.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label for="title" class="col-lg-2 col-md-6 col-sm-12 col-form-label">
                        Title :
                    </label>
                    <div class="col-lg-10 col-md-6 col-sm-12">
                        <input type="text" class="form-control" name="title" value="{{ old('title') }}">
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
                        Contenu de l'Article :
                    </label>
                    <textarea id="editor" name="content" class="form-control">
                        {{ old('content') }}
                    </textarea>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label for="tag" class="col-lg-2 col-md-6 col-sm-12 col-form-label">
                                Tags :
                            </label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <select class="form-control" multiple name="tags" id="tags">
                                    @foreach ($admin_data['tags'] as $tag)
                                        <option id="{{ $tag->getId() }}" value="{{ $tag->getId() }}">{{ $tag->getName() }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label for="categorie" class="col-lg-2 col-md-6 col-sm-12 col-form-label">
                        Categorie :
                    </label>
                    <div class="col-lg-10 col-md-6 col-sm-12">
                        <select class="form-control" name="categorie" id="categorie">
                            @foreach ($admin_data['categories'] as $cat)
                                <option id="{{ $cat->getId() }}" value="{{ $cat->getId() }}">{{ $cat->getName() }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
                <!-- /div -->
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            Manage Article
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Categorie</th>
                        <th scope="col">Tags</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admin_data['articles'] as $article)
                        @if ( auth()->user()->getId() == $article->getUserId() )
                        <tr>
                            <td>{{ $article->getId() }}</td>
                            <td>{{ $article->getTitle() }}</td>
                            <td>{{ $article->getCategorieId() }}</td>
                            <td>{{ $article->getTagId() }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('admin.article.edit', ['id' => $article->getId()]) }}">
                                    <i class="bi-pencil"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('admin.article.delete', $article->getId()) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">
                                        <i class="bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
    </script>
@endsection
