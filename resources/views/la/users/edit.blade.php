@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/users') }}">User</a> :
@endsection
@section("contentheader_description", $user->$view_col)
@section("section", "Users")
@section("section_url", url(config('laraadmin.adminRoute') . '/users'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Users Edit : ".$user->$view_col)

@section("main-content")

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@push('styles')
<!-- include summernote css/js-->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<style>
/*.form-group:nth-child(8),.form-group:nth-child(9){
   display:none;
}*/
</style>
@endpush

<div class="box">
	<div class="box-header">
		
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				{!! Form::model($user, ['route' => [config('laraadmin.adminRoute') . '.users.update', $user->id ], 'method'=>'PUT', 'id' => 'user-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'email')
					@la_input($module, 'password')
					@la_input($module, 'firstname')
					@la_input($module, 'lastname')
					@la_input($module, 'role')
					@la_input($module, 'notes')
					@la_input($module, 'course')
					@la_input($module, 'userappform')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/users') }}">Cancel</a></button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
 <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
<script>
$(function () {
	$("#user-edit-form").validate({
		
	});
});
</script>
<script>
        $(document).ready(function() {
            $('.summernote').summernote();
        });
</script>
@endpush
