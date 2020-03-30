@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/course_details') }}">Course Detail</a> :
@endsection
@section("contentheader_description", $course_detail->$view_col)
@section("section", "Course Details")
@section("section_url", url(config('laraadmin.adminRoute') . '/course_details'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Course Details Edit : ".$course_detail->$view_col)

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
				{!! Form::model($course_detail, ['route' => [config('laraadmin.adminRoute') . '.course_details.update', $course_detail->id ], 'method'=>'PUT', 'id' => 'course_detail-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'coursename')
					@la_input($module, 'coursedetails')
					@la_input($module, 'startdate')
					@la_input($module, 'enddate')
					@la_input($module, 'courseprogram')
					@la_input($module, 'traveldetails')
					@la_input($module, 'materials')
					@la_input($module, 'status')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/course_details') }}">Cancel</a></button>
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
	$("#course_detail-edit-form").validate({
		
	});
});
</script>
<script>
        $(document).ready(function() {
            $('.summernote').summernote();
        });
</script>
@endpush
