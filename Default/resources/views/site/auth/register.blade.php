@extends('site.layouts.main')

@section('title','Login Page')

@section('content')
	<section id="login-form" class="row mt-sm-5" style="height: 100%;">
		<div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">Login</div>
                <div class="card-block">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('postRegister') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} row">
                            <label for="name" class="col-md-4 col-form-label text-center">User name</label>

                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} row">
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

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-center">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 mx-lg-auto">
                                <button type="submit" class="btn btn-primary form-control">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                	<a class="btn btn-link" href="{{route('Login')}}">
                        Have Account?
                    </a>
                </div>
            </div>
        </div>
	</section>
@stop