@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/course_programs') }}">Course Program</a> :
@endsection
@section("contentheader_description", $course_program->$view_col)
@section("section", "Course Programs")
@section("section_url", url(config('laraadmin.adminRoute') . '/course_programs'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Course Programs Edit : ".$course_program->$view_col)

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

<div class="box">
	<div class="box-header">
		
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				{!! Form::model($course_program, ['route' => [config('laraadmin.adminRoute') . '.course_programs.update', $course_program->id ], 'method'=>'PUT', 'id' => 'course_program-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'course_program')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/course_programs') }}">Cancel</a></button>
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
	$("#course_program-edit-form").validate({
		
	});
});
</script>
@endpush
