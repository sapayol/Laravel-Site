<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US" ng-app="sapayolApp" class="no-js">
	<head>
		<meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title> SAPAYOL | @yield('title') </title>

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
		<link rel="home" href="{{ getenv('SITE_URL') }}" />
		<link href="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.2/css/normalize.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.2/css/foundation.min.css" rel="stylesheet">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link href="/css/vendor.css" rel="stylesheet">
		<link href="/css/main.css" rel="stylesheet">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
	  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
	</head>

	<body>

		<div "@yield('angular_page_controller')" class="container">
