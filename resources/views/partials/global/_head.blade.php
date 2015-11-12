<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US" ng-app="sapayolApp" class="no-js" ng-controller="GlobalCtrl">
	<head>
		<meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title> SAPAYOL | @yield('title') </title>

		<link rel="home" href="{{ getenv('SITE_URL') }}"/>
		@if (app()->env == 'production')
			<link rel="stylesheet" href="/css/combo.min.css">
		@else
			<link rel="stylesheet" href="/css/vendor.css">
			<link rel="stylesheet" href="/css/main.css">
		@endif
	</head>

	<body "@yield('angular_page_controller')" id="top">