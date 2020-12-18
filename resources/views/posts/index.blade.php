@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="col-12 col-md-12">
            <form action="{{route('posts.search')}}" class="form-inline mr-auto w-100 navbar-search">
                <div class="input-group">
                    <input type="text" name="keyword" class="form-control bg-light border-0 small"
                           placeholder="Search for..." aria-label="Search"
                           aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
            <a href="{{ route('posts.create') }}" class="btn btn-success">Add</a>
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Desc</th>
                    <th scope="col">Action</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $key => $post)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category->name ?? 'Khong xac dinh'  }}</td>

                        <td>{{ $post->desc }}</td>
                        <td><a onclick="return confirm('Are you sure delete this posts?')" href="{{route('posts.delete',$post->id)}}" class="btn btn-danger">Delete</a>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                        </td>



                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
