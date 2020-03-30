@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/course_material_managements') }}">Course Material Management</a> :
@endsection
@section("contentheader_description", $course_material_management->$view_col)
@section("section", "Course Material Managements")
@section("section_url", url(config('laraadmin.adminRoute') . '/course_material_managements'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Course Material Managements Edit : ".$course_material_management->$view_col)

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
				{!! Form::model($course_material_management, ['route' => [config('laraadmin.adminRoute') . '.course_material_managements.update', $course_material_management->id ], 'method'=>'PUT', 'id' => 'course_material_management-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'coursename')
					@la_input($module, 'coursematerial')
					@la_input($module, 'status')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/course_material_managements') }}">Cancel</a></button>
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
	$("#course_material_management-edit-form").validate({
		
	});
});
</script>
@endpush
