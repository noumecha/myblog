@extends('layouts.admin')
@section('title', $admin_data['title'])
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            Add Tag
        </div>
        <div class="card-body">
            @if($errors->any())
            <ul class="alert alert-danger list-unstyled">
                @foreach($errors->all() as $e)
                    <li>-{{ $e }} </li>
                @endforeach
            </ul>
            @endif
            <form method="POST" action="{{route('admin.tag.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label for="name" class="col-lg-2 col-md-6 col-sm-12 col-form-label">
                                Name :
                            </label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            </div>
                        </div>
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
            Manage tag
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Names</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admin_data['tags'] as $tag)
                        <tr>
                            <td>{{ $tag->getId() }}</td>
                            <td>{{ $tag->getName() }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('admin.tag.edit', ['id' => $tag->getId()]) }}">
                                    <i class="bi-pencil"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('admin.tag.delete', $tag->getId()) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">
                                        <i class="bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="{{ asset('js/ckeditor/ckeditor.js') }}">

        // Get the editor
        var editor = CKEDITOR.replace('editor');

        // Set default content :
        editor.setData('This is the default content');

    </script>
@endsection
