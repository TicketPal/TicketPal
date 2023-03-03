<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" >
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600|Open+Sans:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="css/ticketpal.css">
    <script src="js/Chart.bundle.min.js"></script>
    <script src="js/chart-js-config.js"></script>
    <title>TicketPal  - Bootstrap Dashboard Template</title>
</head>

<body>
    <div class="form-screen">
        <a href="index.html" class="ticketpal-logo"><i class="fas fa-sun"></i> <span>TicketPal </span></a>
        <div class="card account-dialog">
            <div class="card-header bg-primary text-white"> Create an account </div>
            <div class="card-body">
                <form action="{{ route('sample.validate_registration') }}" method="POST">
				@csrf
                    <div class="form-group">
						<input type="text" name="username" class="form-control" placeholder="UserName" />
						@if($errors->has('username'))
							<span class="text-danger">{{ $errors->first('username') }}</span>
						@endif
                    </div>
                    <div class="form-group">
						<input type="text" name="first_name" class="form-control" placeholder="First Name" />
						@if($errors->has('first_name'))
							<span class="text-danger">{{ $errors->first('first_name') }}</span>
						@endif
                    </div>
                    <div class="form-group">
						<input type="text" name="last_name" class="form-control" placeholder="Last Name" />
						@if($errors->has('last_name'))
							<span class="text-danger">{{ $errors->first('last_name') }}</span>
						@endif
                    </div>
                    <div class="form-group">
						<input type="text" name="email" class="form-control" placeholder="Email Address" />
						@if($errors->has('email'))
							<span class="text-danger">{{ $errors->first('email') }}</span>
						@endif
                    </div>
                    <div class="form-group">
						<input type="text" name="role" class="form-control" placeholder="Role" />
						@if($errors->has('role'))
							<span class="text-danger">{{ $errors->first('role') }}</span>
						@endif
                    </div>
                    <div class="form-group">
					<input type="password" name="password" class="form-control" placeholder="Password" />
						@if($errors->has('password'))
							<span class="text-danger">{{ $errors->first('password') }}</span>
						@endif
                    </div>
                    <div class="account-dialog-actions">
                        <button type="submit" class="btn btn-primary">Sign up</button>
                        <a class="account-dialog-link" href="login">Already have an account?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="js/ticketpal.js"></script>
</body>

</html>