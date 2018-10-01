@extends('layouts.app')

@section('content')

	@include('inc.jumbotron-small', ['title' => 'Dashboard', 'button' => true])
	@php $entry = $entries[0] @endphp

	<div class="row">
		<div class="col-12 offset-md-1 col-md-10">
			<div class="row row--white pb-3">
				<div class="col-12 col-lg-8 mt-4">
					<div class="newestItem">
						<p class="h2">{{ $entry['name'] }}</p>
						<img src="{{ url('/img/' . $entry['imagename']) }}" class="img-fluid" alt="{{ $entry['name'] }}" />
						<p class="mt-2"><i>{{ str_limit($entry['introduction'], 200) }}</i></p>
						<a href="">Lees verder <i class="fa fa-arrow-right"></i></a>
					</div>
				</div>
				<div class="col-12 col-lg-4 mt-4">
					<p class="h4">Recent lesmateriaal</p>
					{{-- loopen door het lesmateriaal --}}
					@foreach ($entries as $entry)
						<a href="" class="btn btn-info d-block text-white ml-0 mt-2 mb-2 pb-3 pt-3">Week {{ $entry['week'] }}</a>
					@endforeach
					<a href="" class="btn btn-secondary d-block text-white ml-0 mt-2 mb-2 pb-1 pt-1">Bekijk alles <i class="fa fa-arrow-right"></i></a>
				</div>
			</div>
		</div>
	</div>

@endsection