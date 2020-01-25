{{-- @if ($errors->any())
    <div class="alert alert-danger">
    	<button type="button" class="close" data-dismiss="alert">&times;</button>
        <ul>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </ul>
    </div>
@endif --}}

@if (Session::has('success'))
	<div class="alert alert-success" role="alert">
		<p style="margin-bottom: 0rem;"><i class="fas fa-check-circle"></i> {{ Session::get('success') }}</p>
	</div>
@elseif(Session::has('alert'))
    <div class="alert alert-danger" role="alert">
        <p style="margin-bottom: 0rem;"><i class="fas fa-exclamation-triangle"></i> {{ Session::get('alert') }}</p>
    </div>
@endif
