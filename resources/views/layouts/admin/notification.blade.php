@if(Session::has('message'))
<div class="alert alert-success alert-dismissible lobibox-notify-wrapper bottom right" style="width: 400px;">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
   <h5>{{ session('message') }}</h5>
    Your have been {{ session('message') }}
</div>
<script type="text/javascript">
	setTimeout(function(){ 
		$('.alert').addClass('d-none');
	}, 3000);
</script>
@endif