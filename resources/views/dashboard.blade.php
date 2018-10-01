@extends('layouts.app')

@section('content')

	@include('inc.jumbotron-small', ['title' => 'Dashboard', 'button' => true])

	<div class="row">
		<div class="col-12 offset-md-1 col-md-10">
			<div class="row row--white pb-3">
				<div class="col-12 col-lg-8 mt-4">
					<p class="h2">De prins trouwt, de wereld glimlacht</p>
				</div>
				<div class="col-12 col-lg-4 mt-4">
					<p class="h4">Recent lesmateriaal</p>
					<a href="" class="btn btn-info d-block text-white m-3 pb-3 pt-3">Week 5</a>
					<a href="" class="btn btn-info d-block text-white m-3 pb-3 pt-3">Week 5</a>
					<a href="" class="btn btn-info d-block text-white m-3 pb-3 pt-3">Week 5</a>
					<a href="" class="btn btn-secondary d-block text-white m-3 pb-3 pt-3">Bekijk alles <i class="fa fa-arrow-right"></i></a>
				</div>
			</div>
		</div>
	</div>

@endsection