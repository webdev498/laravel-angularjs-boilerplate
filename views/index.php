<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
	<link rel="stylesheet" href="css/base.css">
	<script src="js/lib.js"></script>
	<script src="js/base.js"></script>

	<link rel="stylesheet" href="css/base.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">


</head>
<body>
<body class="container" ng-app="passwordApp" ng-controller="mainController">

	<div class="col-md-8 col-md-offset-2" >

		<div class="page-header clearfix">
			<h2>Passwords</h2>
			<h4>password system</h4>
			<button type="submit" ng-click="create()" class="btn btn-primary btn-lg pull-right">New</button>
			<div class="form-group col-md-6">
				<input type="text" class="form-control" name="search" ng-model="search" placeholder="Go find some passwords">
			</div>
		</div>

		<p class="text-center" ng-show="loading"><i class="fa fa-cog fa-spin"></i></p>

		<table ng-hide="loading" class="table table-hover">
		  <thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Note</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<tr ng-repeat="password in passwords">
				<td>{{ password.id }}</td>
				<td>{{ password.name }}</td>
				<td>
 					<i ng-if="password.note" class="fa fa-info-circle fa-1x" popover-placement="top" popover="{{ password.note }}" ></i>
				</td>
				<td>
					<a ng-click="edit(password.id)" href="#"><i class="fa fa-pencil"></i></a>
					<a href="#" ng-click="deletePassword(password.id)" class="text-muted"><i class="fa fa-trash"></i></a>
				</td>
			</tr>
		  </tbody>
		</table>

	</div>

</body>
</html>
