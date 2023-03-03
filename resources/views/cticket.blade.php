<div class="container-fluid">
<div class="row">
	<div class="col-xl-12">
<div class="card ticketpal-card">
	<div class="card-header">
		<div class="ticketpal-card-icon">
			<i class="fas fa-chart-bar"></i>
		</div>
		<div class="ticketpal-card-title"> Create Ticket </div>
	</div>
	<div class="card-body ">
		<div class="form-group">
			<label for="exampleFormControlInput1">Title</label>
			<input type="text" class="form-control" id="title" placeholder="Title">
		</div>
		<div class="form-group">
			<label for="exampleFormControlTextarea1">Write</label>
			<textarea class="form-control" id="body" rows="5"></textarea>
		</div>
		<button type="submit" class="btn btn-primary" id="cticket" >Create</button>
	</div>
</div>
		</div>
	</div>
</div>
<script>

	$("#cticket").click(function(){
		var Data = {
			title:$("#title").val(),
			body:$("#body").val(),
			_token:$('meta[name="csrf_token"]').attr('content'),
		}
		$.ajax({
		  type: "POST",
		  url: "/tickets/createticket",
		  data: Data,
		}).done(function (data) {
			location.href = '/tickets/open/'+data;
		});
	});

</script>