<div class="row">
	<article id="jackets" class="large-12 medium-12 small-12 columns text-center">
		<ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-4 x-large-block-grid-4">
			@foreach ($jackets as $jacket)
			  <li class="text-center" ng-controller="jacketCtrl" ng-init="init('{{{ $jacket->model }}}')">
					@if ($jacket->active)
						<h2>
							<a class="underlined" href="/jackets/{{{ $jacket->model }}}">
								{{{ $jacket->name }}}
							</a>
						</h2>

						<a href="/jackets/{{{ $jacket->model }}}">
							<img src="/images/photos/jackets/{{{ $jacket->model }}}/thumbnail-@{{ getColorName(leather_color) }}.jpg" alt="Jacket Placeholder Image">
						</a>

						<div class="look-options">
					    @if ($jacket->leather_colors()->count() > 1)
				        @foreach ($jacket->leather_colors() as $leather_color)
				          <label class="button tiny hollow {{{ camel_case($leather_color->name) }}}" ng-class="{active: leather_color == '{{{ $leather_color->id}}}' }">{{{ $leather_color->name }}}
				            <input type="radio" name="leather_color" ng-model="leather_color" value="{{{ $leather_color->id }}}"  ng-change="updateSessionCache()">
				       		</label>
				        @endforeach
				      @else
				        {{{ $jacket->leather_colors()->first()->name }}}
				      @endif
				    </div>

						@if ($jacket->model === 'linden')
							<span class="price-note">
								<small>starts at<br></small>
						@else
							<span>
						@endif
						US ${{{ number_format($jacket->price) }}}
					</span>
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
</div>
