@extends('layouts/default')

@section("page_wrap_class")
	nav-item-page
@stop

@section('title')
How It Works
@stop

@section('description')
Learn how you can order a made-to-measure leather jacket, how long it takes and get information about our return policy.
@stop

@section('header')
	<a ng-click="displayMenu = false">How It Works</a>
@stop

@section('main')
	<article class="small-12 medium-10 large-7 medium-centered columns">
		<p>Every SAPAYOL leather jacket is made for you, and no one else. We tailor each piece according to your measurements and customizations and then ship it directly from the atelier to your door.</p>
		<p>It takes less than 3 weeks from your order to delivery.</p>
		<ol>
			<br>
			<h2 class="text-center">Order Process</h2>
			<li>
				<h3>Choose a jacket style</h3>
				<p></p>
			</li>
			<li>
				<h3>Design your look</h3>
				<p>For every style, you can choose hardware and lining colors.</p>
			</li>
			<li>
				<h3>Create an account or log in</h3>
				<p>An email address and password lets us save the design choices you just made and the body measurements you&rsquo;re about to enter.</p>
			</li>
			<li>
				<h3>Provide measurements</h3>
				<p>With the help of our video instructions, you can add your measurements to your order.</p>
			</li>
			<li>
				<h3>Buy</h3>
				<p>We accept all major credit and debit cards. <br> We currently don't support PayPal, wire transfers, or checks.</p>
			</li>
			<li>
				<h3>Discuss measurements</h3>
				<p>Within a day, we will get in touch with you by phone or email and discuss your measurements. We&rsquo;ll make sure you&rsquo;ll get the exact fit you want.</p>
			</li>
			<li>
				<h3>Production starts</h3>
				<p></p>
			</li>
			<li>
				<h3>Direct shipment to your door</h3>
				<p>You will be able to track your order via express shipping.</p>
			</li>
		</ol>
		<div class="text-center">
			<a href="/#jackets" class="button call-to-action expand-on-small">Start An Order Now</a>
		</div>
	</article>
	<hr>
	<article class="small-12 medium-10 large-7 medium-centered columns">
			<h2 class="text-center">Warranty</h2>
			<p>All our jackets come with a 1 year warranty against the rare case of defects in materials or workmanship. Contact us to confirm the issue. If it can be fixed, we will fix it for free and pay for shipping. If it can’t be fixed, we will remake the jacket for free.</p>
	</article>
		<hr>
	<article class="small-12 medium-10 large-10 medium-centered columns">
		<ul class="large-block-grid-2 medium-block-grid-2 small-block-grid-1">
			<li>
				<h3>Repairs</h3>
				<p>Should you get any tears, abrasions or holes in your jacket, you can send it to us at any time and we will repair it by replacing the damaged part with a new one of the same leather quality. We will not charge for work, all you will have to cover are shipping costs and materials.</p>
				<a class="underlined" href="mailto:contact@sapayol.com">contact@sapayol.com</a>
			</li>
			<li id="return-policy">
				<h3>Returns</h3>
				<p>Because each leather jacket is made exclusively for you, <em>all sales are final</em>.</p>
				<p>We take extra care in discussing your measurements and any other questions with you before production to make sure you will be satisfied.</p>
				<p>The only exception to this rule is if your jacket deviates significantly from the measurements we agreed on. After we&rsquo;ve confirmed the issue with you, you can send us the unused jacket in the same condition that you received it. We will remake the jacket for free and pay for shipping.</p>
				<a class="underlined" href="mailto:contact@sapayol.com">contact@sapayol.com</a>
			</li>
		</ul>
	</article>
@stop