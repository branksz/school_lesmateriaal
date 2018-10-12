@extends('layouts.app')

@section('content')

	@include('inc.jumbotron-small', ['title' => $entry['name'], 'button' => false])

	<div class="row">
		<div class="col-12 offset-md-1 col-md-10">
			<div class="row row--white pb-3">
				<div class="col-12 col-lg-8 mt-4">
					<img src="{{ url('/img/' . $entry['imagename']) }}" class="img-fluid" alt="{{ $entry['name'] }}" />
					<p class="mt-2"><i>{{ $entry['introduction'] }}</i></p>
				</div>
				<div class="col-12 col-lg-4 mt-4">
					<p class="text-center bg-secondary d-block text-white ml-0 mt-2 mb-2 pb-3 pt-3">Week {{ $entry['week'] }}</p>
					<a download href="{{ url('/files/' . $entry['filename']) }}" class="btn btn-primary d-block text-white ml-0 mt-2 mb-2 pb-3 pt-3">Download PDF <i class="fa fa-download"></i></a>

					<a href="{{ url('/dashboard/materiaal') }}" class="btn btn-info d-block text-white ml-0 mt-2 mb-2 pb-1 pt-1">Bekijk overzicht <i class="fa fa-arrow-right"></i></a>
				</div>
			</div>
		</div>
	</div>

@endsection