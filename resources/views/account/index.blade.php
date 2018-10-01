@extends('layouts.app')

@section('content')

	@include('inc.jumbotron-small', ['title' => 'Account'])

	<div class="row">
		<div class="col-12 offset-md-1 col-md-10">
			<div class="row row--white pb-3">
				<div class="col-12 mt-3">
					<div class="row">
						<div class="col-12">
							<h2 class="text-secondary d-inline-block">Mijn profiel</h2>
							<a href="{{ url('/account/bewerken') }}" class="btn btn-primary float-right">bewerken</i></a>
						</div>
					</div>
					<div class="row mt-3">
						@if (session()->has('success'))
							<div class="col-12">
							    <div class="alert alert-success">
							     	<ul class="list-unstyled pl-0 mb-0">
							     		<li>{{ session()->get('success') }}</li>
							    	</ul>
							    </div>
							</div>
						@endif
						<div class="col-sm-6 col-lg-3">
							<h5>Naam</h5>
							<p>{{ $user['name'] }}</p>
						</div>
						<div class="col-sm-6 col-lg-3">
							<h5>E-mail</h5>
							<p>{{ $user['email'] }}</p>
						</div>
						<div class="col-sm-6 col-lg-3">
							<h5>Schoolnaam</h5>
							<p>{{ $user['schoolName'] }}</p>
						</div>
						<div class="col-sm-6 col-lg-3">
							<h5>Stad</h5>
							<p>{{ $user['city'] }}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection