<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600|Open+Sans:400,600,700" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="/css/ticketpal.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <script src="/js/chart-js-config.js"></script>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <title>TicketPal</title>
	<meta name="csrf_token" content="{{ csrf_token() }}" />
</head>
<body>
    <div class="dash">
		@include('nav')
        <div class="dash-app">
			@include('header')
            <main class="dash-content">
				@include($data['template'])
            </main>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="/js/ticketpal.js"></script>
</body>
</html>