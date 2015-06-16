@extends('03-templates/default')

@section('title')
  Home
@stop

@section('header')
	<h1>Welcome to Sapayol</h1>
@stop




@section('main')
{{-- 	<h1>{{ entry.title }}</h1>

	{{ entry.body }} --}}
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