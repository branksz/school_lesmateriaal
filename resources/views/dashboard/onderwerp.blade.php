@extends('layouts.app')

@section('content')

	@include('inc.jumbotron-small', ['title' => 'Stuur een onderwerp in', 'button' => false])

	<div class="row">
		<div class="col-12 offset-md-1 col-md-10">
			<div class="row row--white pb-3">
				<div class="col-12 col-md-8 mt-1">
					@if (session()->has('success'))
					    <div class="mt-2 alert alert-success">
					     	<ul class="list-unstyled pl-0 mb-0">
					     		<li>{{ session()->get('success') }}</li>
					    	</ul>
					    </div>
					@endif
					@if ($errors->any())
					    <div class="mt-2 alert alert-danger">
					     	<ul class="list-unstyled pl-0 mb-0">
					     		<li>{{ $errors->first() }}</li>
					    	</ul>
					    </div>
					@endif
					<p class="h5 mt-2">Is er een onderwerp dat je graar terug wilt zien in het lesmateriaal? Geef het dan hier aan en wellicht maken wij hier een lesmateriaal van!</p>
					<form method="post" action="{{ url('/dashboard/onderwerp') }}" class="mt-3">
						{{ csrf_field() }}

						<div class="form-group">
							<label for="subjectName">Typ hier je onderwerp</label>
							<input type="text" id="subjectName" name="subject" class="d-inline form-control" required />
							<button type="submit" class="d-inline mt-2 float-right btn btn-primary">verstuur</button>
						</div>
					</form>
				</div>
				<div class="col-12 col-md-4 mt-2">
					<p class="h5">Kan je niks verzinnen?<br /> Hier zijn wat ideeën:</p>
					<ul class="list-group">
						<li class="list-group-item">De nieuwe spiderman film</li>
						<li class="list-group-item">Mcgregor vs Khabib</li>
						<li class="list-group-item">Politieagent worden doe je zo</li>
						<li class="list-group-item">Nog iets</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

@endsection