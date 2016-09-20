@extends('layouts/default')

@section("page_wrap_class")
	nav-item-page
@stop

@section('title')
Who We Are
@stop

@section('description')
	{{-- NEED DESCRIPTION!!! --}}
@stop

@section('header')
	<a ng-click="displayMenu = false">About Us</a>
@stop

@section('main')
	<article class="large-12 medium-12 small-12 columns">
		<h1>About SAPAYOL</h1>
		<p>SAPAYOL, based in New York City, offers made-to-measure leather jackets online, tailored by master craftsmen and made from the most exclusive vegetable tanned leather.</p>

		<p>A boutique online experience allows customers to individualize our minimalistic reinterpretations of classic leather jacket styles, provide detailed body measurements and have their perfectly fitted custom jacket delivered directly to their door.</p>

		<p>To achieve our exceptionally demanding level of excellence, we work exclusively with a team of six master tailors in Istanbul, Turkey, that have been perfecting their craft together for over 30 years.</p>

		<p>We only use the most luxurious full-grain, vegetable tanned, aniline dyed leather from one of the most innovative tanneries in the world, also located in Turkey. In addition to a beautiful feel and look, fully vegetable tanned leather is also free from the usual chromium salts that can become carcinogenic, found in most leather garments.</p>

		<p>The same obsessive care about details carries over to all other materials we use, whether that’s highly reliable, polished zippers or silky, breathable Bemberg Cupro lining.</p>

		<p>Every decision at SAPAYOL is guided by the greatest respect for people, our environment, and animals. We make sure that all our suppliers provide a safe and healthy workplace and we’re proud that workers get above-average pay and social insurance. Our tannery only uses top-grade chemical components, in the smallest possible amounts, and all wastewater gets treated. All skins come from Turkey, where animals are being herded in traditional ways and get ample movement, sunlight, and natural nutrition.</p>

		<p>
			<strong>Contact</strong><br>
			Ediz Binder<br>
			<a href="mailto:ediz@sapayol.com">ediz@sapayol.com</a><br>
			+1-347-541-3349
		</p>
	</article>

	<article class="large-12 medium-12 small-12 columns">
		<h1>About Ediz Binder</h1>
		<p>SAPAYOL has been founded by Ediz Binder and is the result of his unique combination of cultural influences.</p>

		<p>Growing up in Switzerland, he got infused with a tradition of exclusivity, perfectionism, clean design, and eco-awareness. His dad, a mechanical engineer, instilled a deep appreciation for how things are made, down to the smallest details.</p>

		<p>To meet these standards, it was necessary to work with the most skilled experts, which he found in Turkey, a global hub of the leather industry and the birthplace of his mother.</p>

		<p>Life in New York City provided the necessary spark to this vision that connects all the dots.</p>
	</article>
@stop