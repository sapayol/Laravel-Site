@if (Session::has('message'))
	<div class="row">
		<div ng-hide="hideAlert" data-alert class="large-4 medium-6 small-12 medium-centered alert-box highlight animated shake" ng-init="hideAlert = false">
    	{{ Session::get('message') }}
    	<a href="#" class="close" ng-click="hideAlert = true">&times;</a>
		</div>
	</div>
@endif

@if (Session::has('success'))
	<div class="row">
		<div ng-hide="hideAlert" data-alert class="large-4 medium-6 small-12 medium-centered alert-box highlight animated bounceIn" ng-init="hideAlert = false">
    	{{ Session::get('success') }}
    	<a href="#" class="close" ng-click="hideAlert = true">&times;</a>
		</div>
	</div>
@endif

@if (Session::has('alert'))
	<div class="row">
		<div ng-hide="hideAlert" data-alert class="alert large-4 medium-6 small-12 alert-box animated shake right" ng-init="hideAlert = false">
    	{{ Session::get('alert') }}
    	<a href="#" class="close" ng-click="hideAlert = true">&times;</a>
		</div>
	</div>
@endif

@if (count($errors) > 0)
	<div ng-hide="hideAlert" data-alert class="large-4 medium-6 small-12 medium-centered alert-box alert animated shake" ng-init="hideAlert = false">
		<ul class="no-bullet">
			@foreach ($errors->all() as $error)
				<li><small>{{ $error }}</small></li>
			@endforeach
		</ul>
	  <a href="#" class="close" ng-click="hideAlert = true">&times;</a>
	</div>
@endif