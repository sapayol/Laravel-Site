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
		<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Quattrocento+Sans:400,700|Oswald:400,300,700">
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/foundation/5.5.2/css/normalize.min.css" >
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/foundation/5.5.2/css/foundation.min.css">
		<link rel="stylesheet" href="//cdn.jsdelivr.net/jquery.slick/1.5.8/slick.css"/>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="/css/vendor.css">
		<link rel="stylesheet" href="/css/main.css">

		<script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

<link rel="stylesheet" href="https://cdn.plyr.io/1.3.3/plyr.css">
<script src="https://cdn.plyr.io/1.3.3/plyr.js"></script>
	</head>

	<body "@yield('angular_page_controller')">