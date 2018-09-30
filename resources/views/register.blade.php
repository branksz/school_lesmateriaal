@extends('layouts.app')

@section('content')

	@include('inc.jumbotron-small', ['title' => 'Aanmelden'])

	<div class="row">
		<div class="col-12 offset-md-1 col-md-10">
			<div class="row row--white pb-3">
				<div class="col-12 offset-md-1 col-md-6">
					<form method="post" action="{{ url('/aanmelden/validate') }}" class="mt-2">
						{{ csrf_field() }}

					    <div class="form-group">
					        <label for="name">Naam</label>
					        <input id="name" type="text" class="form-control" name="name" required autofocus />
					    </div>

					    <div class="form-group">
					        <label for="email">E-mail</label>
					        <input id="email" type="email" class="form-control" name="email" required />
					    </div>

					    <div class="form-group">
					        <label for="schoolName">Schoolnaam</label>
					        <input id="schoolName" type="text" class="form-control" name="schoolName" required />
					    </div>

					    <div class="form-group">
					        <label for="city">Stad</label>
					        <input id="city" type="text" class="form-control" name="city" required />
					    </div>

					    <div class="form-group">
					        <label for="password">Wachtwoord</label>
					        <input id="password" type="password" class="form-control" name="password" required />
					    </div>

					    <div class="form-group">
					        <label for="password_confirmation">Wachtwoord Nogmaals</label>
					        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required />
					    </div>

			    		@if ($errors->any())
			    		    <div class="alert alert-danger">
			    		     	<ul class="list-unstyled pl-0 mb-0">
			    		     		@foreach ($errors->all() as $error)
			    		     			<li>{{ $error }}</li>
			    		     		@endforeach
			    		    	</ul>
			    		    </div>
			    		@endif

					    <div class="form-group">
				        	<a href="{{ url('/') }}/inloggen">Klik hier om in te loggen</a>
				        	<input type="submit" name="login" class="btn btn-secondary float-right" value="Meld je aan" />
					        <div class="clear"></div>
					    </div>
					</form>
				</div>
				<div class="col-12 col-md-4 mt-3">
					<p>Meld je hier aan om gebruik te kunnen maken van het lesmateriaal voor docenten.</p>
					<p>Faucibus conubia nostra diam metus rutrum torquent curae ad, vel nec congue vehicula fringilla aliquam adipiscing ante rhoncus.</p>
				</div>
			</div>
		</div>
	</div>

@endsection