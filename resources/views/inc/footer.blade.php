<footer class="footer py-5">
	<div class="container">
		<div class="row">
			<div class="col-md-2">
				<p class="h4">Menu</p>
				<ul class="list-unstyled">
					@foreach ($nav as $item)
					    <li><a href="{{ $item['slug'] }}">{{ $item['title'] }}</a></li>
					@endforeach
				</ul>
			</div>
			<div class="col-md-3">
				<p class="h4">Social Media</p>
				<ul class="list-unstyled">
					<li><a class="icon icon__social facebook" href="https://www.facebook.com//" target="_blank">Facebook</a></li>
					<li><a class="icon icon__social twitter" href="https://twitter.com/" target="_blank">Twitter</a></li>
					<li><a class="icon icon__social linkedin" href="https://www.linkedin.com/" target="_blank">LinkedIn</a></li>
				</ul>
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-12">
				<p>Copyright &copy; {{ now()->year }} | Gemaakt door Branko Gurbaj 0946540</p>
			</div>
		</div>
	</div>
</footer>