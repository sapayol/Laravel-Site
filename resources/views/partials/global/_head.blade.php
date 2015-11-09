<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US" ng-app="sapayolApp" class="no-js" ng-controller="GlobalCtrl">
	<head>
		<meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title> SAPAYOL | @yield('title') </title>

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
		<link rel="home" href="{{ getenv('SITE_URL') }}" />
		@if (app()->env == 'production')
			<link rel="stylesheet" href="/css/combo.min.css">
		@else
			<link rel="stylesheet" href="/css/vendor.css">
			<link rel="stylesheet" href="/css/main.css">
		@endif
	</head>

 		@if (app()->env == 'production')
      <!-- Google Analytics -->
			<script>
			  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			  ga('create', '{{{ env('GOOGLE_ANALYTICS_ID') }}}', 'auto');
			  ga('send', 'pageview');
			</script>
	  @endif


	<body "@yield('angular_page_controller')" id="top">

	{{-- @include('partials.meta.breakpoint-helper') --}}