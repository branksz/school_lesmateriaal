@extends('layouts.app')

@section('content')

	@include('inc.jumbotron-small', ['title' => 'Admin Dashboard'])

	<div class="row">
		<div class="col-12 offset-md-1 col-md-10">
			<div class="row row--white pb-3">
				<div class="col-12 offset-md-1 col-md-6">
					<a href="{{ url('/admin/inzendingen') }}" class="btn btn-info d-block text-white ml-0 mt-2 mb-2 pb-3 pt-3">Inzendingen overzicht</a>
					<a href="{{ url('/admin/lesmateriaal') }}" class="btn btn-info d-block text-white ml-0 mt-2 mb-2 pb-3 pt-3">Materiaal overzicht</a>
				</div>
			</div>
		</div>
	</div>

@endsection