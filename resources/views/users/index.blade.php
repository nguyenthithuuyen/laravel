@extends('layouts.master')
@section('page-title','Danh sach nguoi dung')
@section('content')

    <div class="container">
        <div class="col-12 col-md-12">
            @can('create-user')
            <a href="{{route('user.create')}}" class="btn btn-success">Add</a>
            @endcan
                    <input type="text" name="keyword" id="search-user">

            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>

                </tr>
                </thead>
                <tbody id="users-list">
                @foreach($users as $key=> $user)

                    <tr class="user-item">
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>@foreach($user->roles as $role)
                                {{$role->name. ';'}}
                            @endforeach
                        </td>
                        @can('create-user')
                        <td><a onclick="return confirm('Are you sure delete this user?')"
                               href="{{ route('user.delete', $user->id) }}" class="btn btn-danger">Delete</a>
                            <a href="{{ route('user.update', $user->id) }}" class="btn btn-primary">Edit</a>
                        </td>
                        @endcan
                    </tr>
                @endforeach
            </table>
        </div>


    </div>


@endsection
