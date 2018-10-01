@extends('layouts.app')

@section('content')

	@include('inc.jumbotron-small', ['title' => 'Inloggen'])

	<div class="row">
		<div class="col-12 offset-md-1 col-md-10">
			<div class="row row--white pb-3">
				<div class="col-12 offset-md-1 col-md-6">
					<form method="post" action="{{ url('/inloggen/checklogin') }}" class="mt-2">
						{{ csrf_field() }}

						<div class="form-group">
							<label>E-mailadres</label>
							<input type="email" name="email" class="form-control" @if(!empty(old('email')))value="{{ old('email') }}"@endif />
						</div>
						<div class="form-group">
							<label>Wachtwoord</label>
							<input type="password" name="password" class="form-control" />
						</div>
						@if ($errors->any())
						    <div class="alert alert-danger">
						     	<ul class="list-unstyled pl-0 mb-0">
						     		<li>{{ $errors->first() }}</li>
						    	</ul>
						    </div>
						@endif
						@if (session()->has('success'))
						    <div class="alert alert-success">
						     	<ul class="list-unstyled pl-0 mb-0">
						     		<li>{{ session()->get('success') }}</li>
						    	</ul>
						    </div>
						@endif
						<div class="form-group">
							<a href="{{ url('/') }}/aanmelden">Ik heb nog geen account</a>
							<input type="submit" name="login" class="btn btn-secondary float-right" value="Login" />
						</div>
						<div class="clear"></div>
					</form>
				</div>
				<div class="col-12 col-md-4 mt-3">
					<p>Log hier in om gebruik te maken van het lesmateriaal voor docenten.</p>
					<p>Faucibus conubia nostra diam metus rutrum torquent curae ad, vel nec congue vehicula fringilla aliquam adipiscing ante rhoncus.</p>
				</div>
			</div>
		</div>
	</div>

@endsection