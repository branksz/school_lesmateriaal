<div class="jumbotron jumbotron--hero p-5 mb-0">
	<div class="container">
		<div class="row">
			<div class="col-12 offset-md-1 col-md-10">
				<h1 class="text-white d-inline-block"><strong>{{ $title }}</strong></h1>
				@if(!empty($button) && $button == true)
					<a href="{{ url('/dashboard/onderwerp') }}" class="btn btn-primary float-right">Stuur een onderwerp in</a>
				@endif
			</div>			
		</div>
	</div>
</div>