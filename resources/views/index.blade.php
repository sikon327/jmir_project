<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Listing Index</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/css/bootstrap.min.css">
	</head>
	<body>
		<nav class="navbar" style="text-align:center; float:none;">
			<a href="/submit">Add Information</a> | Listing Page
		</nav>
		<div class="container">
		<table class="table">
			<thead class="thead-inverse">
				<tr>
					<th>Name</th>
					<th>Province</th>
					<th>Telephone</th>
					<th>Postal Code</th>
					<th>Salary</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			@foreach($listings as $listing)
				<tr scope="row">
					<td>{{$listing->name}}</td>
					<td>{{$listing->province}}</td>
					<td>{{$listing->telephone}}</td>
					<td>{{$listing->postcode}}</td>
					<td>{{$listing->salary}}</td>
					<td>
						<div class="input-append">
						<a href="api/listings/{{$listing->id}}">Update</a> | 
						<form style="display:inline-block; font-size:0; vertical-align:top" action="/api/listings/{{$listing->id}}" method="POST">
							{{ method_field('DELETE') }}
							<button style="font-size:medium; padding:0" type="submit" class="btn btn-link">Delete</button>
						</form>
						</div>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
		{{ $listings->links() }}
		</div>

	</body>
</html>