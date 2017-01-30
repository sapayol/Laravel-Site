<article id="jackets" class="large-12 medium-12 small-12 columns text-center">
	<ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-2 x-large-block-grid-4">
		@foreach ($jackets as $jacket)
		  <li class="text-center">
				@if ($jacket->active)
					<a href="/jackets/{{{ $jacket->model }}}">
						<img src="/images/photos/jackets/{{{ $jacket->model }}}/thumbnail.jpg" alt="Jacket Placeholder Image">
					</a>
					<h2>
						<a class="underlined" href="/jackets/{{{ $jacket->model }}}">
							{{{ $jacket->name }}}
						</a>
					</h2>
					<span>US ${{{ number_format($jacket->price) }}}</span>
				@else
					<div class="jacket-placeholder-container">
						<img class="jacket-placeholder" src="/images/photos/jackets/{{{ $jacket->model }}}/{{{ $jacket->model }}}.svg" alt="Jacket Placeholder Image">
						<h2>{{{ $jacket->name }}}</h2>
						<h3><em>Coming Soon</em></h3>
						<br>
					</div>
				@endif
		  </li>
		@endforeach
	</ul>
	<span>Free shipping worldwide. Taxes and duties included.</span>
</article>