@extends('layouts.admin')
@section('tile', $admin_data['title'])
@section('content')
@php
    use Illuminate\Support\Str;
@endphp
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
                                <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="row mb-3">
                            <label for="password_confirmation" class="col-lg-4 col-md-6 col-sm-12 col-form-label">
                                Confirm :
                            </label>

                            <div class="col-md-6">
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
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
    <!-- users table -->
    <div class="card">
        <div class="card-body">
            <!-- title -->
            <div class="d-md-flex">
                <div>
                    <h4 class="card-title">Manage Users</h4>
                    <h5 class="card-subtitle">Overview of Top Selling Items</h5>
                </div>
                <div class="ms-auto">
                    <div class="dl">
                        <select class="form-select shadow-none">
                            <option value="0" selected>Monthly</option>
                            <option value="1">Daily</option>
                            <option value="2">Weekly</option>
                            <option value="3">Yearly</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- title -->
        </div>
        <div class="table-responsive">
            <table class="table v-middle">
                <thead>
                    <tr class="bg-light">
                        <th class="border-top-0"></th>
                        <th class="border-top-0">ID</th>
                        <th class="border-top-0">Name</th>
                        <th class="border-top-0">Role</th>
                        <th class="border-top-0">Date Creation</th>
                        <th class="border-top-0">Tel</th>
                        <th class="border-top-0">Email</th>
                        <th class="border-top-0">Edit</th>
                        <th class="border-top-0">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admin_data['users'] as $user)
                    <tr>
                        <td class="pt-2 pb-2 pl-0 pr-0">
                            <a class="btn btn-circle fw-bold d-flex btn-orange text-uppercase text-white">
                                {{ Str::limit($user->getName(), $limit=2, $end="") }}
                            </a>
                        </td>
                        <td>{{ $user->getId() }}</td>
                        <td>{{ $user->getName() }}</td>
                        <td>{{ $user->getRole() }}</td>
                        <td>{{ $user->getCreatedAt() }}</td>
                        <td>{{ $user->getTel() }}</td>
                        <td>{{ $user->getEmail() }}</td>
                        <td>
                            <div class="">
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
    <!-- end users table -->
@endsection
