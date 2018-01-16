@extends('site.layouts.main')
@section('content')
    <section class="row mt-sm-2 mt-md-4 mt-lg-4">
        <div class="card">
            <img class="card-img-top" src="{{$post->image}}" alt="Card image cap">
            <div class="card-block">
                <h4 class="card-title">{{$post->title}}</h4>
                {!! $post->body !!}
            </div>
        </div>
    </section>
@stop