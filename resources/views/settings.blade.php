<div class="col-xl-12">
	<div class="card ticketpal-card">
		<div class="card-header">
			<div class="ticketpal-card-icon">
				<i class="{{ $settings[0]->icon }}"></i>
			</div>
			<div class="ticketpal-card-title"> {{ $settings[0]->title }} </div>
		</div>
		<div class="card-body ">
			@foreach($settings as $setting)
			<div class="form-group">
				<label for="{{ $setting->_id }}">{{ $setting->key }}</label>
				<input type="text" class="form-control" id="{{ $setting->_id }}" value="{{ $setting->value }}">
			</div>
			@endforeach
			<button type="submit" id="submit" class="btn btn-primary">Sign in</button>
		</div>
	</div>
</div>
<script>

	$("#submit").click(function(){
		var Data = {
			@foreach($settings as $setting)
				'{{ $setting->id }}':$( '#{{ $setting->_id }}' ).val(),
			@endforeach
			_token:$('meta[name="csrf_token"]').attr('content'),
		}
		$.ajax({
		  type: "POST",
		  url: "/settings/update",
		  data: Data,
		}).done(function (data) {
		  //location.reload();
		});
	});

</script>