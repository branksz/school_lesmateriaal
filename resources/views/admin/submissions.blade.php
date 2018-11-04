@extends('layouts.app')

@section('content')

	@include('inc.jumbotron-small', ['title' => 'Overzicht inzendingen'])

	<div class="row">
		<div class="col-12 offset-md-1 col-md-10">
			<div class="row row--white pb-3">
				<div class="col-12 mt-1">
					<ul class="mt-3">
						@foreach ($entries as $entry)
							<li>{{ $entry['subject'] }}</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>

@endsection