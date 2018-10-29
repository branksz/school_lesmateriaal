@extends('layouts.app')

@section('content')

	@include('inc.jumbotron-small', ['title' => 'Overzicht lesmateriaal'])

	<div class="row">
		<div class="col-12 offset-md-1 col-md-10">
			<div class="row row--white pb-3">
				<div class="col-12 mt-1">
					<table class="table">
						<thead>
							<tr>
								<th>Naam</th>
								<th>Week</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach ($entries as $entry)
								<tr>
									<td>{{ $entry['name'] }}</td>
									<td>{{ $entry['week'] }}</td>
									<td>
										<form method="post" action="{{ url('/admin/lesmateriaal/toggleStatus') }}">
											{{ csrf_field() }}

											<input type="hidden" name="id" value="{{ $entry['id'] }}" />
											<button class="btn btn-primary" type="submit">{{ $entry['status'] == 1 ? 'Uitzetten' : 'Aanzetten' }}</button>
										</form>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

@endsection