<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield('title')</title>
	<base href="{{asset('')}}">
	<!-- Favicon -->
    <link rel="shortcut icon" href="{{ 'storage/'.Voyager::setting('logo') }}" type="image/x-icon">
	<link rel="stylesheet" href="site/css/bootstrap.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>

@include('site.layouts.header')

<div class="container">

	@yield('content')
	
</div>

@include('site.layouts.footer')

<!-- inlucde js -->
<script src="site/js/jquery-3.2.1.min.js"></script>
<script src="site/js/bootstrap.min.js"></script>
<script src="site/js/myscript.js"></script>

</body>
</html>