@extends('site.layouts.main')
@section('content')
	<section class="row card-columns mt-sm-2 mt-md-4 mt-lg-4">

    	@if(isset($posts))
			
			@foreach($posts as $item)

				<div class="col-sm-12 col-md-4 col-lg-4 p-sm-2 p-md-4 p-lg-4">
					<div class="card " style="width: 20rem;">
						<img class="card-img-top w-100" src="{{$item->image}}" alt="Card image cap" height="200">
						<div class="card-block">
						    <h4 class="card-title">
						    	@php
						    		$title = trans('menu.Title');
						    	@endphp
						    	{!! $item->$title !!}
						    </h4>
						    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						    <a href="{{route('blogdetail',['slug'=>$item->slug])}}" class="btn btn-primary">Read more</a>
						</div>
					</div>
				</div>

			@endforeach

    	@endif

	</section>
@stop