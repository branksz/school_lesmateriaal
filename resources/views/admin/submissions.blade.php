@extends('layouts.app')

@section('content')

	@include('inc.jumbotron-small', ['title' => 'Overzicht inzendingen'])

	<div class="row">
		<div class="col-12 offset-md-1 col-md-10">
			<div class="row row--white pb-3">
				<div class="col-12 mt-1">
					@if (empty('contact'))
						<ul class="mt-3">
							@foreach ($entries as $entry)
								<li>{{ $entry['subject'] }}</li>
							@endforeach
						</ul>
					@else
						<table class="mt-3">
							<thead>
								<tr>
									<th>Naam</th>
									<th>Email</th>
									<th>Bericht</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($entries as $entry)
									<tr>
										<td>{{ $entry['name'] }}</td>
										<td>{{ $entry['email'] }}</td>
										<td>{{ $entry['message'] }}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					@endif
				</div>
			</div>
		</div>
	</div>

@endsection