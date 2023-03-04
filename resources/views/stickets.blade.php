<div class="col-lg-12">
    <div class="dash-title">
		<a href="/tickets/create" ><button type="button" class="btn btn-primary">Create Ticket</button></a>
		<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteticket">Delete Ticket's</button>
		<a href="/tickets/open/{{ $status }}/{{ $tk->next }}" ><button type="button" class="btn btn-warning float-right ml-2"><i class="
fas fa-angle-right"></i></button></a>
		<a href="/tickets/open/{{ $status }}/{{ $tk->previous }}" ><button type="button" class="btn btn-warning float-right ml-2"><i class="fas fa-angle-left"></i></button></a>
		<a href="/tickets/open/{{ $status }}" ><button type="button" class="btn btn-warning float-right ml-2"><i class="
fas fa-angle-double-left"></i></button></a>
	</div>
</div>
<div class="col-lg-12">
	<div class="card ticketpal-card">
		<div class="card-header">
			<div class="ticketpal-card-icon">
				<i class="fas fa-users"></i>
			</div>
			<div class="ticketpal-card-title">Ticket's</div>
		</div>
		<div class="card-body ">
			<table class="table table-in-card">
				<thead>
					<tr>
						<th scope="col">Email</th>
						<th scope="col" class="th-lg">Title</th>
						<th scope="col">Status</th>
						<th scope="col"><input class="tickets" name="checkall" type="checkbox" value="checkall" id="checkall"></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($tickets as $ticket)
					<tr>
						<th scope="row">{{ $ticket->email }}</th>
						<td><a href="/tickets/open/{{ $ticket->node }}" >{{ $ticket->title }}</a></td>
						<td><span class="badge badge-pill badge-{{ $ticket->status }}">{{ $ticket->status }}</span></td>
						<td><input class="tickets" name="tickets" type="checkbox" value="{{ $ticket->node }}" id="flexCheckDefault"></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="modal fade" id="deleteticket" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Ticket's</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">Are you sure?</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="dtickets" data-dismiss="modal" >Delete Ticket's</button>
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

	$("#dtickets").click(function(){
		tickets = [...document.querySelectorAll('input[name=tickets]:checked')].map(e => e.value);
		var Data = {
			tickets:tickets,
			_token:$('meta[name="csrf_token"]').attr('content'),
		}
		$.ajax({
		  type: "POST",
		  url: "/tickets/delete",
		  data: Data,
		}).done(function (data) {
		  location.reload();
		});
	});
	
	$("#checkall").click(function(){
		$('.tickets').attr('checked', isCheckedById('checkall'));
	});
</script>