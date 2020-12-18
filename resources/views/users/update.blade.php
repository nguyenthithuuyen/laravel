@extends('layouts.master')
@section('content')
    <div class="col-12 col-md-12">
        <h3>Edit new user</h3>
        <form action="{{route('user.edit',$user->id)}}" method="post">
            @csrf
            <div class="mb-3">
                <label  class="form-label">Name</label>
                <input type="text" value="{{$user->name}}" name="name" class="form-control" >
                @error('name')
                <p class="text-danger">{{$massage}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label  class="form-label">EmailAddress</label>
                <input type="email"  value="{{$user->email}}" name="email" class="form-control" >
                @error('email')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div>
                <button type="submit" class="btn btn-success">Submit</button>
                <a class="btn btn-info" href="{{route('user.index')}}">Cancel</a>
            </div>
        </form>
    </div>
@endsection
