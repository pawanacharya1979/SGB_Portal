@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/manage_course_materials') }}">Manage Course Material</a> :
@endsection
@section("contentheader_description", $manage_course_material->$view_col)
@section("section", "Manage Course Materials")
@section("section_url", url(config('laraadmin.adminRoute') . '/manage_course_materials'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Manage Course Materials Edit : ".$manage_course_material->$view_col)

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
				{!! Form::model($manage_course_material, ['route' => [config('laraadmin.adminRoute') . '.manage_course_materials.update', $manage_course_material->id ], 'method'=>'PUT', 'id' => 'manage_course_material-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'coursename')
					@la_input($module, 'materialfile')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/manage_course_materials') }}">Cancel</a></button>
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
	$("#manage_course_material-edit-form").validate({
		
	});
});
</script>
@endpush
