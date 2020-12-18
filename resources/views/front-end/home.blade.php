@extends('front-end.master')
@section('page-content')
    <div class="col-12 col-md-12">
        <div class="row">
            @foreach($posts as $key=>$posts)
                <div class="col-12 col-md-3">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{$posts->name}}</h5>
                            <p class="card-text">{{$posts->desc}}</p>
                            <a href="{{route('showDetailPost', $posts->id)}}" class="btn btn-primary">Đọc tiếp </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
