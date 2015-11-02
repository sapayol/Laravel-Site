@extends("layouts/default")

@section("page_wrap_class")
	headless-page
@stop

@section("title")
	Who We Are
@stop

@section("main")
	<section class="small-12 medium-10 large-8 medium-centered columns" id="our-leather-header">
		<p>We don&rsquo;t compromise on the quality of our leather.</p>
		<p>Truly exceptional leather lasts long, doesn&rsquo;t bulge or tear easily and develops a characteristic patina over time. It features a natural, delicate texture that feels warm and supple. Great leather has a pleasant, unobtrusive smell and a rich color that doesn&rsquo;t rub off.</p>
		<p>From the very start to finish, we choose the most exclusive parts and methods to get all of these characteristics right:</p>
		<nav>
			<ul>
				<li><a href="#leathers" title="">Full&ndash;grain leather</a></li>
				<li><a href="#tanning-process" title="">World&ndash;class tanning</a></li>
				<li><a href="#animal-treatment" title="">Humane animal treatment</a></li>
			</ul>
		</nav>
	</section>


	<section class="small-12 medium-10 large-8 medium-centered columns" id="leathers">
		<h2>The difference between full&ndash;grain, top&ndash;grain, genuine, and bonded leather</h2>
		<p>The most crucial difference in leather quality comes from the fact that every skin is sliced into two pieces: the outer part (grain&ndash;side) and the inner part (flesh&ndash;side). The outer part is much stronger, has a natural grain, and is much more expensive.</p>
		<p>So&ndash;called genuine and bonded leather is made of the inner part. It is not meant to last long and requires heavy coating as well as an artificially embossed grain pattern to make it look like leather.</p>
		<p>The more valuable grain&ndash;side is divided into two general types:</p>
		<p>An animal might have gotten scratches from rocks or bite marks from insects. Sometimes, these imperfections are sanded off. This is then called top&ndash;grain/corrected leather and also needs coating and an artificially embossed grain pattern, leading to a less durable leather.</p>
		<p>If the natural grain&ndash;side is left intact, the leather is called full&ndash;grain.</p>
		<p><em>We exclusively use full&ndash;grain leather. Our tannery sorts through every hide and sets the most flawless ones aside for us. Because of that, our jackets have a consistently pristine surface. It also means that we can use almost the entire surface of the hide and allows us to construct our jackets with as little parts and seams as possible.</em></p>
		<a href="#our-leather-header" class="under-heading-link underlined">Back to Top</a>
	</section>

	<section class="small-12 medium-10 large-8 medium-centered columns" id="tanning-process">
		<h2>Chrome vs. vegetable tanning and the importance of a world&ndash;class tannery</h2>
		<p>Animal skin needs to treated chemically to be turned into durable, flexible leather, otherwise, it would decompose. The two most common methods to do this are chrome tanning and vegetable tanning.</p>
		<p>Chrome tanning uses chromium salts as the main agent. Almost all leather is made through this process today because it is much more simple than vegetable tanning. If not done properly, there is a danger that the chromium salts change nature and become carcinogenic, although strict supervision can almost eliminate this risk. Nevertheless, the chromium salts are not biodegradable.</p>
		<p>Vegetable tanning is a more traditional, environmentally friendly method which takes longer and uses naturally occurring tannins from plants. The resulting leather ages differently from chrome tanned leather and gains a beautiful patina from wear and sun exposure. It used to produce more rigid leather than chrome tanning, but state&ndash;of&ndash;the&ndash;art technology has closed that gap.</p>
		<p><em>All our jackets are made of vegetable tanned leather.</em></p>
		<p>Both tanning methods can be done the right way or more poorly, to save time and money. A tannery can cut corners by using low&ndash;grade chemicals, cheaper dye, and most commonly, do things superficially and allow less time for each step. The resulting leather will crack or tear, rub off color and be potentially unsafe.</p>
		<p><em>We work exclusively with one of the most innovative tanneries in the world. Only the highest&ndash;grade substances are used, state&ndash;of&ndash;the art methods and equipment are utilized, and extra time is taken to make sure that the skins are properly prepared, tanned and thoroughly dyed with perfectly even color.</em></p>
		<p><em>We don&rsquo;t cover our leather with a top paint, but add a very thin protective, colorless coat to it. This way, the leather displays its natural grain but is slightly protected from wear and staining.</em></p>
		<a href="#our-leather-header" class="under-heading-link underlined">Back to Top</a>
	</section>

	<section class="small-12 medium-10 large-8 medium-centered columns" id="animal-treatment">
		<h2>Healthy animals from humane sources</h2>
		<p>Apart from the very fundamental difference between bovine skin and sheep skin for example, or the fact that younger animals have more flexible skin than older ones, the health of a skin is also directly affected by the general health of its animal.</p>
		<p>The meat industry is very broken and an incredible amount of animals are being held under extremely poor conditions. We don&rsquo;t support that and strive very hard to only use leather from humane and healthy sources.</p>
		<p><em>All our lamb skins come from Turkey, where animals are being herded in traditional ways, get ample movement, sunlight, and natural nutrition.</em></p>
		<a href="#our-leather-header" class="under-heading-link underlined">Back to Top</a>
	</section>

	<section class="small-12 medium-8 large-6 medium-centered columns">
		@if ($jacket)
			<a href="/jackets/{{{ $jacket }}}" class="button expand">Go Back To Your Jacket</a>
		@else
			<a href="/jackets" class="button expand">See Our Jackets</a>
		@endif
	</section>
@stop