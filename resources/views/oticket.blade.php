<div class="col-lg-12">
	<h5 class="dash-title">{{ $tickets->title }}
	<span class="badge badge-pill badge-primary float-right ml-2">{{ $tickets->status }}</span>
	<span class="badge badge-pill badge-primary float-right ml-2">{{ $tickets->user }}</span>
	<span class="badge badge-pill badge-primary float-right ml-2">{{ $tickets->created_at }}</span>
	</h5>
</div>
<div class="col-lg-12">
	@foreach ($contents as $content)
	<div class="card ticketpal-card">
		<div class="card-header">
			<div class="ticketpal-card-title">{{ $content->email }}<span class="float-right ml-2">Commented on {{ $content->created_at }}</span></div>
		</div>
		<div class="card-body">
			{{ $content->body }}
		</div>
	</div>
	@endforeach
	<div class="form-group">
		<label for="exampleFormControlTextarea1">Write</label>
		<textarea class="form-control" id="body" rows="5"></textarea>
	</div>
	<div class="col-lg-12">
		<div class="dash-title">
			<button type="submit" class="btn btn-primary" id="wticket">Comment</button>
			@if($tickets->status == 'new')
				<button type="submit" status-to="closed" class="btn btn-danger" id="cticket">Close</button>
			@endif
			@if($tickets->status == 'closed')
				<button type="submit" status-to="open"  class="btn btn-danger" id="cticket">Re-Open</button>
			@endif
			@if($tickets->status == 'open')
				<button type="submit" status-to="closed" class="btn btn-danger" id="cticket">Close</button>
			@endif
			@if($tickets->status == 'new')
				<button type="submit" status-to="open"  class="btn btn-primary" id="aticket">Assign to self</button>
			@endif
		</div>
	</div>
</div>
</div>
<script>

	$("#wticket").click(function(){
		body = $("#body").val();
		$("#body").val('');
		var Data = {
			body:body,
			_token:$('meta[name="csrf_token"]').attr('content'),
		}
		$.ajax({
		  type: "POST",
		  url: "/tickets/write/{{ $tickets->id }}",
		  data: Data,
		}).done(function (data) {
		  location.reload();
		});
	});
	
	$("#cticket").click(function(){
		var Data = {
			_token:$('meta[name="csrf_token"]').attr('content'),
			status:$("#cticket").attr('status-to'),
		}
		$.ajax({
		  type: "POST",
		  url: "/tickets/status/{{ $tickets->id }}",
		  data: Data,
		}).done(function (data) {
		  location.reload();
		});
	});
	
	$("#aticket").click(function(){
		var Data = {
			_token:$('meta[name="csrf_token"]').attr('content'),
			status:$("#body").val(''),
		}
		$.ajax({
		  type: "POST",
		  url: "/tickets/status/{{ $tickets->id }}",
		  data: Data,
		}).done(function (data) {
		  location.reload();
		});
	});
	
</script>