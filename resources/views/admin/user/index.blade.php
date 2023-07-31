@extends('layouts.admin')
@section('tile', $admin_data['title'])
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            Create Users
        </div>
        <div class="card-body">
            @if($errors->any())
            <ul class="alert alert-danger list-unstyled">
                @foreach($errors->all() as $e)
                    <li>-{{ $e }} </li>
                @endforeach
            </ul>
            @endif
            <form method="POST" action="{{route('admin.user.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label for="name" class="col-lg-4 col-md-6 col-sm-12 col-form-label">
                                Name :
                            </label>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label for="email" class="col-lg-4 col-md-6 col-sm-12 col-form-label">
                                Email :
                            </label>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label for="tel" class="col-lg-4 col-md-6 col-sm-12 col-form-label">
                                Telephone :
                            </label>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <input id="tel" type="text" class="form-control" name="tel" value="{{ old('tel') }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label for="password" class="col-lg-4 col-md-6 col-sm-12 col-form-label">
                                Password :
                            </label>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <input id="password" type="text" class="form-control" name="password" value="{{ old('password') }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="row mb-3">
                            <label for="confirm_password" class="col-lg-4 col-md-6 col-sm-12 col-form-label">
                                Confirm :
                            </label>

                            <div class="col-md-6">
                                <input id="confirm_password" type="password" class="form-control" name="confirm_password" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label for="role" class="col-lg-4 col-md-6 col-sm-12 col-form-label">
                                Role :
                            </label>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <select class="form-control" name="role" id="role">
                                    <option value="admin">admin</option>
                                    <option value="autor">autor</option>
                                </select>
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
            Manage user
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Role</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admin_data['users'] as $user)
                        <tr>
                            <td>{{ $user->getId() }}</td>
                            <td>{{ $user->getName() }}</td>
                            <td>{{ $user->getRole() }}</td>
                            <td>
                                <div class="btn btn-primary">
                                    <a class="btn btn-primary" href="{{ route('admin.user.edit', ['id' => $user->getId()]) }}">
                                        <i class="bi-pencil"></i>
                                    </a>
                                </div>
                            </td>
                            <td>
                                <form action="{{ route('admin.user.delete', $user->getId()) }}" method="POST">
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
@endsection
