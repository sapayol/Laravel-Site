@extends('layouts/default')

@section("page_wrap_class")
	nav-item-page
@stop

@section('title')
Care Instructions
@stop

@section('description')
	{{-- NEED DESCRIPTION!!! --}}
@stop

@section('header')
	<a ng-click="displayMenu = false">Care Instructions</a>
@stop

@section('main')
	<article class="small-12 medium-10 large-7 medium-centered columns">
		<section>
			<h2>Storage</h2>
			<p>Put your jacket on a nice, wide hanger when you’re not wearing it. Narrow hangers will create unwanted creases or bulges.
			Cover it with the robust, protective, breathable garment bag that it came in. Don’t use plastic bags or PVC garment bags. A lack of air circulation will damage any natural leather.</p>
		</section>
		<section>
			<h2>Rain and Water</h2>
			<p>Your jacket will tolerate a rain shower. Just be aware that real leather like ours – which isn’t coated with paint or a water-repellent – will change its appearance if it’s exposed to water a lot.</p>
			<p>When your jacket gets wet, let it dry in a well-ventilated room, but keep it far from a radiator or other heat source. Don’t try to speed up the drying process, because it will harden the leather, in many cases irreversibly. Let it dry on a wide, shaped hanger. If the jacket is heavily soaked, it is better to not put it on a hanger and instead lay it on a flat surface and turn it frequently.
			Never put a wet leather jacket in your closet because leather is very susceptible to mildew.</p>
		</section>
		<section>
			<h2>Sunshine</h2>
			<p>It’s absolutely ok to wear your jacket on a bright, sunny day. Just don’t leave it behind a glass window or have some parts of it exposed to sunlight while others are in the shade for an extended period.</p>
		</section>
		<section>
			<h2>Dirt and Stains</h2>
			<p>Loose dirt and small stains can be removed by brushing it with a very soft brush or sponge. Test on an unnoticeable part of the jacket.</p>
			<p>For more persistent dirt and stains, have it cleaned by a professional.</p>
		</section>
	</article>
@stop