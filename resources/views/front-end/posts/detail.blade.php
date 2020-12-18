@extends('front-end.master')
@section('page-content')
    <h3>{{$post->name}}</h3>
    <h3>{{$post->content}}</h3>
    <div>
        Luot xem: {{session('post-'.$post->id)}}
    </div>
@endsection
