@extends('layouts.app')

@section('content')

	@include('inc.jumbotron-small', ['title' => 'Overzicht lesmateriaal'])

	<div class="row">
		<div class="col-12 offset-md-1 col-md-10">
			<div class="row row--white pb-3">
				<div class="col-12 mt-1">
					<form method="post" action="{{ url('/admin/lesmateriaal/zoeken') }}">
						{{ csrf_field() }}

						<div class="form-group">
							<input type="text" name="query" class="form-control d-inline" 
							@if (!empty($searchTerm)) value="{{ $searchTerm }}" @endif
							 placeholder="Typ hier je zoekterm..." />
						</div>
						<div class="form-group">
							<select name="status">
								<option {{ (!empty($status) && $status) == 1 ? 'selected' : '' }} value="1">Alleen actief tonen</option>
								<option {{ (!empty($status) && $status) == 0 ? 'selected' : '' }} value="0">Alles tonen</option>
							</select>
						</div>
						<button type="submit" class="btn btn-secondary d-inline"><i class="fa fa-search"></i></button>
					</form>
					@if (!empty($searchTerm))
						<p class="alert alert-info">Zoeknresultaten voor '{{ $searchTerm }}'</p>
					@endif
					<table class="table mt-3">
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
										<form method="post" action="{{ url('/admin/lesmateriaal/status') }}">
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