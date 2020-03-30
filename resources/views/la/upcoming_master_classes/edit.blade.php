@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/upcoming_master_classes') }}">Upcoming Master Class</a> :
@endsection
@section("contentheader_description", $upcoming_master_class->$view_col)
@section("section", "Upcoming Master Classes")
@section("section_url", url(config('laraadmin.adminRoute') . '/upcoming_master_classes'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Upcoming Master Classes Edit : ".$upcoming_master_class->$view_col)

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
@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>    
@endpush
<div class="box">
	<div class="box-header">
		
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				{!! Form::model($upcoming_master_class, ['route' => [config('laraadmin.adminRoute') . '.upcoming_master_classes.update', $upcoming_master_class->id ], 'method'=>'PUT', 'id' => 'upcoming_master_class-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'coursename')
					@la_input($module, 'coursedetails')
					@la_input($module, 'applicationform')
					@la_input($module, 'status')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/upcoming_master_classes') }}">Cancel</a></button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script>
$(function () {
	$("#upcoming_master_class-edit-form").validate({
		
	});
});
</script>

<script>
        $(document).ready(function() {
            $('.summernote').summernote();

			$( "select[name='coursename']").change(function(){
				//alert($(this).val());
				
				$.ajax({
					url: "{{url('/admin/upcoming_master_classes/getcoursedetails')}}/"+$(this).val(),
					type: "GET",
					success:function(data) {
						//$('#notetext').val(data);
						//$('.note-editable').html(data);
						$('.summernote').summernote('code', data);
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						alert(errorThrown);
					}
				});
			});


        });
</script>


<script>
        $(document).ready(function() {
            $('.summernote').summernote();
        });
</script>
@endpush
