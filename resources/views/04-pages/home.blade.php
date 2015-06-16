@extends('03-templates/default')

@section('title')
  Home
@stop

@section('main')
	{{-- <div class="large-12 medium-12 small-12 columns text-center"> --}}
		<img class="hero-image" src="images/photos/jacket-full_body-profile.jpg" alt="">
		<h1 class="hero-text">
			<strong>Le<span>ather Jacke</span>ts</strong>
		</h1>
	{{-- </div> --}}
@stop

@section('footer')
	<div class="alert-box info" data-alert >
	  <h3><strong><small>Page Description</small></strong></h3>
		<h4>
			<small>
				Communicate instantly what the site is selling and highlight the content areas that are most important to the brand.
			</small>
		</h4>

		<h3><strong><small>Purpose Served</small></strong></h3>
		<h4>
			<small>
				Get the audience to explore the jacket and customization options. Make them curious about the materials used and the process.
			</small>
		</h4>
		<h3><strong><small>Components</small></strong></h3>
		<h4>
			<small>
				- main heading on top of image/video <br>
				- subheadings under or on top of images <br>
				- short paragraph about the content that the image links to
			</small>
		</h4>
  	<a href="#" class="close">&times;</a>
	</div>
@stop