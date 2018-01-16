@extends('site.layouts.main')
@section('content')
	<section id="login-form" class="col-6" style="margin: 30px auto;">
		<div class="card">
			<div class="card-header">Login</div>
			<div class="card-block">
				<form>
					
					<div class="form-group row">
						<div class="col-12">
							<input type="email" class="form-control" id="inputEmail3" placeholder="Email">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-12">
							<input type="password" class="form-control" id="inputPassword3" placeholder="Password">
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-8 mx-lg-auto">
							<button type="submit" class="btn btn-primary form-control">
								Login
							</button>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-8 mx-lg-auto">
							<a type="button" href="auth/facebook" class="btn btn-primary form-control">
								Login with Facebook
							</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
@stop