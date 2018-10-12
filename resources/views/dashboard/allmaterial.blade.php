@extends('layouts.app')

@section('content')

	@include('inc.jumbotron-small', ['title' => 'Al het lesmateriaal', 'button' => true])

	<div class="row">
		<div class="col-12 offset-md-1 col-md-10">
			<div class="row row--white pb-3">
				<div class="col-12 mt-1">
					@foreach ($entries as $entry)
						<div class="newestItem mt-3 p-3 border-grey">
							<p class="h2">{{ $entry['name'] }}</p>
							<img src="{{ url('/img/' . $entry['imagename']) }}" class="img-fluid" alt="{{ $entry['name'] }}" />
							<p class="mt-2"><i>{{ str_limit($entry['introduction'], 200) }}</i></p>
							<a href="{{ url('/dashboard/materiaal/' . $entry['slug']) }}">Lees verder <i class="fa fa-arrow-right"></i></a>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>

@endsection