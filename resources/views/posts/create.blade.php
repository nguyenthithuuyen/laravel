@extends('layouts.master')
@section('content')
    <h3>Create post</h3>
    <form action="{{ route('posts.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Desc</label>
            <input type="text" name="desc" class="form-control">
        </div>
        <div class="form-group">

            <label for="">Category</label>

            <select name="category_id" id="">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Content</label>
            <textarea name="contentPost" type="text" class="form-control"></textarea>
            @error('content')
            <p class="text-danger">{{$rule}}</p>
            @enderror
        </div>
        <div>
            <button type="submit" class="btn btn-success">Submit</button>
            <a class="btn btn-info" href="{{route('posts.showList')}}">Cancel</a>
        </div>
    </form>
    @endsection
