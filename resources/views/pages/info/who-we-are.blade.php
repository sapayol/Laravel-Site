@extends('layouts/default')

@section("page_wrap_class")
	nav-item-page
@stop

@section('title')
Who We Are
@stop

@section('description')
SAPAYOL is a New York City based company that is committed to master craftsmanship, finest materials, and respect for people, the environment, and animals.
@stop

@section('header')
	<a ng-click="displayMenu = false">Who We Are</a>
@stop

@section('main')
	<article class="large-12 medium-12 small-12 columns">
		<section class="row">
			<div class="large-10 medium-10 medium-centered small-12 columns">
				<div class="player" ng-controller="videoCtrl">
				  <video poster="/images/video-posters/sapayol_vapur.jpg" controls crossorigin preload="none">
				    <source src="/videos/sapayol_vapur.webm" type="video/webm">
				    <source src="/videos/sapayol_vapur.mp4"  type="video/mp4">
				    <a href="/videos/sapayol_vapur.mp4">Download</a>
				  </video>
				</div>
			</div>
		</section>
		<section class="row">
			<div class="medium-10 large-8 medium-centered columns">
				<p>Something about the way you&rsquo;re supposed to do things doesn&rsquo;t feel right. And the path you&rsquo;re being shown seems to be the shortest, but not very exciting.</p>
				<p>
					You want to know what&rsquo;s behind that door. You approach things from a different angle. You find your own way. <em>Regular doesn&rsquo;t fit you.</em>
				</p>
				<p>We understand. It&rsquo;s the same urge that motivates us to design leather jackets without compromises. To create a company that does things the right way. To build a community of the curious.</p>
			</div>
		</section>
		<hr>
		<section class="row">
			<div class="small-12 medium-10 large-8 medium-centered columns definition-section">
				<br>
				<h3>SAPAYOL</h3>
				<p> noun <br> 1. the road less traveled by </p>
				<p>ORIGIN <br> Turkish</p> <br>
			</div>
		</section>
		<hr>

		<section class="row">
			<div class="small-12 medium-10 large-8 medium-centered columns">
				<h2 class="medium-text-center">We tailor minimalistic leather jackets to your individual measurements.</h2>
				<br>
				<p>Every single jacket is made according to your individual measurements. You can tell us if you like your sleeves a little longer or shorter, or any other preference.</p>
				<p>You can also choose from a selection of lining and hardware colors.</p>
				<div class="text-center">
					<a href="{{ route('jackets.index') }}" class="button call-to-action expand-on-small">See Our Jackets</a>
					<br>
					<a href="mailto:contact@sapayol.com"  class="under-button-link underlined">Contact Us</a>
				</div>
			</div>
		</section>

		<hr>

		<div class="row">
			<div class="large-11 medium-11 small-12 medium-centered columns">
				<section class="row flex-section" id="master-craftsmanship">
					<div class="small-12 medium-10 large-6 large-push-6 columns medium-centered image-container">
						<img class="sidekick-image" src="/images/photos/other/tailor-ironing.jpg" alt="Tailor Ironing">
					</div>
					<div class="small-12 medium-10 large-6 large-pull-6 medium-centered columns">
						<div>
							<br class="hide-for-large">
							<h2>Our jackets are made by master tailors.</h2>
							<p>Know&#8208;how, skill, and passion are the fuel of great craftsmen. We work exclusively with a studio that possesses an infinite reserve of these values. Members of this atelier have been working together since 1980, dedicated to producing the finest leather garments and pushing their art in every respect.</p>
							<p>To meet our quality requirements, five specialists will be working on your jacket over a period of seven hours to create your finished product.</p>
						</div>
					</div>
				</section>

				<section class="row flex-section" id="best-materials">
					<div class="small-12 large-6 medium-10 medium-centered columns image-container">
						<img class="sidekick-image" src="/images/photos/other/tailor-cutting.jpg" alt="Tailor Cutting Leather">
					</div>
					<div class="small-12 large-6 medium-10 medium-centered columns" id="best-materials">
						<div>
							<br class="hide-for-large">
							<h2>Finding the best leather and materials is our obsession.</h2>
							<p>We only work with the most exclusive leather available: full&#8208;grain, vegetable tanned (chrome&#8208;free), and aniline dyed. Our tannery uses the best components and takes the time that&rsquo;s necessary to produce extraordinary, long-lasting leather that becomes even more beautiful with age. From that leather, the most flawless is set aside for us.</p>
							<p>Our care about the smallest details carries over to all other materials we use. Our zippers and buttons (YKK Excella) are extremely reliable and are polished down to every single tooth, finished with scratch&#8208;resistant, elegant coatings.</p>
							<p>The lining is made out of a smooth Bemberg Cupro oxford weave with the exception of the pockets, which are lined with a more robust Tencel fabric.</p>
							<a href="/our-leather" class="underlined">More about our leather</a><br><br>
						</div>
					</div>
				</section>
			</div>
		</div>

		<hr>

		<div class="row">
			<div class="large-10 medium-11 small-12 medium-centered columns">
				<section class="row">
					<div class="small-12 medium-10 large-10 medium-centered columns">
						<h2>New York City is our home.</h2>
						<p>SAPAYOL is based and incorporated in New York City. This city fuels us with energy and inspiration.</p>
						<h2> Our jackets are made in Istanbul, Turkey.</h2>
						<p>The long textile and leather tradition in the region makes it possible to buy top&#8208;grade skins, work with a world&#8208;class tannery, have our jackets tailored by master craftsmen and source all materials within a 250 mile radius. In addition to that, we can work with supply partners that pay above&#8208;average wage.</p>
					</div>
				</section>

				<section class="row" id="respect-nature">
					<div class="small-12 medium-10 large-10 medium-centered columns">
						<h2>Every decision is guided by the greatest respect for people, our environment, and animals.</h2>
						<p>We believe that everyone we work with and all their employees should feel respected and valued for their work. Not only will that lead to the best possible product, we just don&rsquo;t like any other type of relationship. That&rsquo;s why we&rsquo;ve visited all our supply partners and made sure that their workers have safe and healthy work conditions. We&rsquo;re proud to know that workers get above-average pay and social insurance.</p>
						<p>Just as importantly, we see ourselves as part of one big organism. It&rsquo;s our responsibility &#8208; and also in our best interest &#8208; to honor and care for our environment and animals. We&rsquo;re pushing every aspect of our company in that regard.</p>
						<p>All skins come from Turkey, where animals are being herded in traditional ways and get ample movement, sunlight, and natural nutrition.</p>
						<p>With vegetable tanning, we&rsquo;ve chosen the most ecological tanning process, avoiding the usual chromium salts which aren&rsquo;t biodegradable and become carcinogenic under certain circumstances. Our tannery only uses top-grade chemical components, in the smallest possible amounts, and all wastewater gets treated.</p>
						<p>It is our goal to not use any plastic and eventually exclusively use natural or recycled materials, from the care instruction label to packaging.</p>
						<p>Last but not least, our direct shipment from the leather workshop to the customer is the most ecological logistics process we can think of. Other than putting a sheep herd and a master craftsman in your backyard.</p>
						<div class="text-center">
							<a href="{{ route('jackets.index') }}" class="button call-to-action expand-on-small">See Our Jackets</a>
							<br>
							<a href="mailto:contact@sapayol.com"  class="under-button-link underlined">Contact Us</a>
						</div>
					</div>
				</section>
			</div>
		</div>

	</article>
@stop