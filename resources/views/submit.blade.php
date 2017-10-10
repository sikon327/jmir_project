<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Create Listing</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/css/bootstrap.min.css">
        <script src="http://code.angularjs.org/1.2.6/angular.js"></script>
    </head>
    <body>
    	<script>
	    	var app = angular.module('addListing', []);
	    		app.controller('patternController', function($scope) {
      			$scope.phonepattern = /((\(\d{3}\) ?)|(\d{3}-))?\d{3}-\d{4}/;
      			$scope.postpattern = /^(?!.*[DFIOQU])[A-VXY][0-9][A-Z] ?[0-9][A-Z][0-9]$/;
      			$scope.salarypattern = /^\d{1,3}(?:[, ]\d{3})?(?:[\.\,]\d{0,2})?$/;});
	    </script>
	    <nav class="navbar" style="text-align:center; float:none;">
			Add Information | <a href="/">Listing Page</a>
		</nav>
		<div class="container">
	    <form ng-app="addListing" ng-controller="patternController" name="listingForm" action="/api/create" method="post" novalidate>
	        {!! csrf_field() !!}
	        <div class="form-group">
	            <label for="name">Name</label>
	            <input type="text" class="form-control" name="name" ng-model="name" ng-minlength="2">
	            <span ng-show="listingForm.name.$dirty && listingForm.name.$invalid">Minimum 2 Characters</span>
	        </div>
	        <div class="form-group">
	            <label for="province">Province</label>
	            <select type="text" class="form-control" name="province" ng-model="province" required>
	            	<option disabled selected value></option>
	            	<option value="Ontario">Ontario</option>
	            	<option value="Québec">Québec</option>
	            	<option value="Nova Scotia">Nova Scotia</option>
	            	<option value="New Brunswick">New Brunswick</option>
	            	<option value="Manitoba">Manitoba</option>
	            	<option value="British Columbia">British Columbia</option>
	            	<option value="Prince Edward Island">Prince Edward Island</option>
	            	<option value="Saskatchewan">Saskatchewan</option>
	            	<option value="Alberta">Alberta</option>
	            	<option value="Newfoundland and Labrador">Newfoundland and Labrador</option>
	            	<option value="Northwest Territories">Northwest Territories</option>
	            	<option value="Yukon">Yukon</option>
	            	<option value="Nunavut">Nunavut</option>
	            </select>
	            <span ng-show="listingForm.province.$touched && listingForm.province.$invalid">Please choose a province.</span>
	        </div>
	        <div class="control-group controls controls-row row-fluid">
	        	<label for="telephone">Telephone</label>
	        	<input type="text" class="form-control" name="telephone" ng-model="telephone" ng-pattern="phonepattern">
	        	<span ng-show="listingForm.telephone.$dirty && listingForm.telephone.$error.pattern">Invalid format</span>

	        	<label for="postcode">Postal Code</label>
	        	<input type="text" class="form-control span5" name="postcode" ng-model="postcode" ng-pattern="postpattern">
	        	<span ng-show="listingForm.postcode.$dirty && listingForm.postcode.$error.pattern">Invalid format</span>
	    	</div>
	        <div class="form-group">
	        	<label for="salary">Salary</label>
	        	<input type="text" class="form-control" name="salary" ng-model="salary" ng-pattern="salarypattern">
	        	<span ng-show="listingForm.salary.$dirty && listingForm.salary.$error.pattern">Invalid format</span>
	        </div>
	        <button type="submit" class="btn btn-default" 
	        ng-disabled="listingForm.name.$invalid || listingForm.province.$invalid ||
	        listingForm.telephone.$invalid || listingForm.postcode.$invalid ||
	        listingForm.salary.$invalid">Save</button>
	    </form>
	    </div>
	</body>
</html>
