<div class="col-lg-12">
    <div class="dash-title">
		<a href="/users/create" ><button type="button" class="btn btn-primary">Create User</button></a>
		<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteusers">Delete User's</button>
		<a href="/users/{{ $pg->next }}" ><button type="button" class="btn btn-warning float-right ml-2"><i class="
fas fa-angle-right"></i></button></a>
		<a href="/users/{{ $pg->previous }}" ><button type="button" class="btn btn-warning float-right ml-2"><i class="fas fa-angle-left"></i></button></a>
		<a href="/users" ><button type="button" class="btn btn-warning float-right ml-2"><i class="
fas fa-angle-double-left"></i></button></a>
	</div>
</div>
<div class="col-lg-12">
	<div class="card ticketpal-card">
		<div class="card-header">
			<div class="ticketpal-card-icon">
				<i class="fas fa-users"></i>
			</div>
			<div class="ticketpal-card-title">Users</div>
		</div>
		<div class="card-body ">
			<table class="table table-in-card">
				<thead>
					<tr>
						<th scope="col">id</th>
						<th scope="col">Username</th>
						<th scope="col">First Name</th>
						<th scope="col">Last Name</th>
						<th scope="col">Email</th>
						<th scope="col">Role</th>
						<th scope="col"><input class="users" name="checkall" type="checkbox" value="checkall" id="checkall"></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($users as $user)
					<tr>
						<th scope="row">{{ $user->id }}</th>
						<td>{{ $user->username }}</td>
						<td>{{ $user->first_name }}</td>
						<td>{{ $user->last_name }}</td>
						<td>{{ $user->email }}</td>
						<td>{{ $user->role }}</td>
						<td><input class="users" name="users" type="checkbox" value="{{ $user->id }}" id="flexCheckDefault"></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="modal fade" id="deleteusers" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete User's</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">Are you sure?</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="duser" data-dismiss="modal" >Delete User's</button>
      </div>
    </div>
  </div>
</div>
<script>

	function isCheckedById(id) {
		var checked = $("input[id=" + id + "]:checked").length;
		if (checked == 0) {
			return false;
		} else {
			return true;
		}
	}

	$("#duser").click(function(){
		users = [...document.querySelectorAll('input[name=users]:checked')].map(e => e.value);
		var Data = {
			users:users,
			_token:$('meta[name="csrf_token"]').attr('content'),
		}
		$.ajax({
		  type: "POST",
		  url: "/users/delete",
		  data: Data,
		}).done(function (data) {
		  location.reload();
		});
	});
	
	$("#checkall").click(function(){
		$('.users').attr('checked', isCheckedById('checkall'));
	});
</script>