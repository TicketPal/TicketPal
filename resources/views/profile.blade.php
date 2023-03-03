<div class="container-fluid">
<div class="row">
	<div class="col-xl-12">
			<div class="card ticketpal-card">
				<div class="card-header">
					<div class="ticketpal-card-icon">
						<i class="fas fa-user"></i>
					</div>
					<div class="ticketpal-card-title"> Profile </div>
				</div>
				<div class="card-body ">
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="email">Email</label>
							<input type="email" class="form-control" id="email" value="{{ $profile->email }}" placeholder="Email" disabled>
						</div>
						<div class="form-group col-md-6">
							<label for="password">Password</label>
							<input type="password" class="form-control" id="password" placeholder="Password">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="first_name">First Name</label>
							<input type="text" class="form-control" id="first_name" value="{{ $profile->first_name }}" placeholder="First Name">
						</div>
						<div class="form-group col-md-6">
							<label for="last_name">Last Name</label>
							<input type="text" class="form-control" id="last_name" value="{{ $profile->last_name }}" placeholder="Last Name">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="username">Username</label>
							<input type="text" class="form-control" value="{{ $profile->username }}" id="username">
						</div>
					</div>
					<button type="submit" class="btn btn-primary" id="uuser">Update</button>
				</div>
			</div>
		</div>
	</div>
</div>
<script>

	$("#uuser").click(function(){
		var Data = {
			email:$("#email").val(),
			password:$("#password").val(),
			first_name:$("#first_name").val(),
			last_name:$("#last_name").val(),
			username:$("#username").val(),
			_token:$('meta[name="csrf_token"]').attr('content'),
		}
		$.ajax({
		  type: "POST",
		  url: "/profileupdate",
		  data: Data,
		}).done(function (data) {
		  //location.reload();
		});
	});

</script>