<div class="container-fluid">
<div class="row">
	<div class="col-xl-12">
			<div class="card ticketpal-card">
				<div class="card-header">
					<div class="ticketpal-card-icon">
						<i class="fas fa-user"></i>
					</div>
					<div class="ticketpal-card-title"> Create User </div>
				</div>
				<div class="card-body ">
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="email">Email</label>
							<input type="email" class="form-control" id="email" placeholder="Email">
						</div>
						<div class="form-group col-md-6">
							<label for="password">Password</label>
							<input type="password" class="form-control" id="password" placeholder="Password">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="first_name">First Name</label>
							<input type="text" class="form-control" id="first_name" placeholder="First Name">
						</div>
						<div class="form-group col-md-6">
							<label for="last_name">Last Name</label>
							<input type="text" class="form-control" id="last_name" placeholder="Last Name">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="username">Username</label>
							<input type="text" class="form-control" id="username">
						</div>
						<div class="form-group col-md-6">
							<label for="role">Role's</label>
							<select id="role" class="form-control">
								<option selected="">Choose...</option>
								<option>...</option>
							</select>
						</div>
					</div>
					<button type="submit" class="btn btn-primary" id="cuser" >Create User</button>
				</div>
			</div>
		</div>
	</div>
</div>
<script>

	$("#cuser").click(function(){
		var Data = {
			email:$("#email").val(),
			password:$("#password").val(),
			first_name:$("#first_name").val(),
			last_name:$("#last_name").val(),
			username:$("#username").val(),
			role:$("#role").val(),
			_token:$('meta[name="csrf_token"]').attr('content'),
		}
		$.ajax({
		  type: "POST",
		  url: "/users/createuser",
		  data: Data,
		}).done(function (data) {
		  location.reload();
		});
	});

</script>