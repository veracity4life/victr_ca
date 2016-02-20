<!DOCTYPE html>

<html>
	<head>
		<title>VICTR | Candidate Assesment</title>
		
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-theme.min.css" />

		<script>

		function relocate() {
			window.location.assign("?data=refresh");
		}

		</script>

	</head>

	<body>

		<div class="container">

		<header class="jumbotron">
			<h2>Candidate Assesment</h2>
			<p>
				This assesment completes the goal of retrieving the most starred public PHP projects on Github as well as storing the list of repositories in a MySQL database.
			</p>
			<button type="button" class="btn btn-primary" onclick="relocate();">Manual Data Refresh</button>
		</header>
