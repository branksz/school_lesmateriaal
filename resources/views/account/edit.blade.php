@extends('layouts.app')

@section('content')

	@include('inc.jumbotron-small', ['title' => 'Account'])

	<div class="row">
		<div class="col-12 offset-md-1 col-md-10">
			<div class="row row--white pb-3">
				<div class="col-12 mt-3">
					<div class="row">
						<div class="col-12">
							<h2 class="text-secondary">Mijn profiel</h2>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-12">
							<form method="post" action="{{ url('/account/bewerken') }}" class="row mt-2">
								{{ csrf_field() }}

								<div class="col-sm-6 col-lg-3">
									<label>Naam</label>
									<input type="text" name="name" class="form-control" value="{{ $user['name'] }}" required />
									@if ($errors->has('name'))
										<div class="alert- alert-danger">
											<ul class="list-unstyled pl-0 mb-0">
												<li class="pl-3 p-2 mt-2">{{ $errors->first('name') }}</li>
											</ul>
										</div>
									@endif
								</div>
								<div class="col-sm-6 col-lg-3">
									<label>E-mail</label>
									<input type="email" name="email" class="form-control" value="{{ $user['email'] }}" required />
									@if ($errors->has('email'))
										<div class="alert- alert-danger">
											<ul class="list-unstyled pl-0 mb-0">
												<li class="pl-3 p-2 mt-2">{{ $errors->first('email') }}</li>
											</ul>
										</div>
									@endif
								</div>
								<div class="col-sm-6 col-lg-3">
									<label>Schoolnaam</label>
									<input type="text" name="schoolName" class="form-control" value="{{ $user['schoolName'] }}" required />
									@if ($errors->has('schoolName'))
										<div class="alert- alert-danger">
											<ul class="list-unstyled pl-0 mb-0">
												<li class="pl-3 p-2 mt-2">{{ $errors->first('schoolName') }}</li>
											</ul>
										</div>
									@endif
								</div>
								<div class="col-sm-6 col-lg-3">
									<label>Stad</label>
									<input type="text" name="city" class="form-control" value="{{ $user['city'] }}" required />
									@if ($errors->has('city'))
										<div class="alert- alert-danger">
											<ul class="list-unstyled pl-0 mb-0">
												<li class="pl-3 p-2 mt-2">{{ $errors->first('city') }}</li>
											</ul>
										</div>
									@endif
								</div>
								<div class="col-12 mt-3">
									<button type="submit" class="btn btn-primary float-right">Opslaan</button>
									<a href="{{ url('/account') }}" class="btn btn-link mr-2 float-right">Annuleren</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection