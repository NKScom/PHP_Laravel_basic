@extends('site.layouts.main')

@section('title','Login Page')

@section('content')
	<section id="login-form" class="row mt-sm-5" style="height: 100%;">
		<div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">Login</div>
                <div class="card-block">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('postLogin') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? 'has-danger' : '' }} row">
                            <label for="email" class="col-md-4 col-form-label text-center">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }} row">
                            <label for="password" class="col-md-4 col-form-label text-center">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 mx-lg-auto">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 mx-lg-auto">
                                <button type="submit" class="btn btn-primary form-control">
                                    Login
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                	<a class="btn btn-link" href="{{route('Forgotpass')}}">
                        Forgot Your Password?
                    </a>
                </div>
            </div>
        </div>
	</section>
@stop