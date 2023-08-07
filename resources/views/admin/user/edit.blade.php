@extends('layouts.admin')
@section('title', $admin_data['title'])
@section('content')
<div class="card mb-4">
    <div class="card-header">
        Edit User
    </div>
    <div class="card-body">
        @if($errors->any())
        <ul class="alert alert-danger list-unstyled">
            @foreach($errors->all() as $e)
            <li>- {{ $e }}</li>
            @endforeach
        </ul>
        @endif

        <form action="{{ route('admin.user.update',['id'=>$admin_data['users']->getId()]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label for="name" class="col-lg-2 col-md-6 col-sm-12 col-form-label">
                            Name :
                        </label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input type="text" name="name" value="{{$admin_data['users']->getName()}}" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3 row">
                        <label for="email" class="col-lg-2 col-md-6 col-sm-12 col-form-label">
                            Email :
                        </label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input type="email" name="email" value="{{$admin_data['users']->getEmail()}}" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3 row">
                        <label for="tel" class="col-lg-2 col-md-6 col-sm-12 col-form-label">
                            Telephone :
                        </label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input type="text" name="tel" value="{{$admin_data['users']->getTel()}}" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3 row">
                        <label for="role" class="col-lg-2 col-md-6 col-sm-12 col-form-label">
                            Role :
                        </label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <select name="role" id="role">
                                <option value="{{$admin_data['users']->getRole()}}" selected>{{$admin_data['users']->getRole()}}</option>
                                <option value="admin">admin</option>
                                <option value="autor">autor</option>
                                <option value="autor">user</option>
                            </select>
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
