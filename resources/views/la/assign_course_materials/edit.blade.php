@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/assign_course_materials') }}">Assign Course Material</a> :
@endsection
@section("contentheader_description", $assign_course_material->$view_col)
@section("section", "Assign Course Materials")
@section("section_url", url(config('laraadmin.adminRoute') . '/assign_course_materials'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Assign Course Materials Edit : ".$assign_course_material->$view_col)

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
				{!! Form::model($assign_course_material, ['route' => [config('laraadmin.adminRoute') . '.assign_course_materials.update', $assign_course_material->id ], 'method'=>'PUT', 'id' => 'assign_course_material-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'username')
					@la_input($module, 'coursename')
					@la_input($module, 'status')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/assign_course_materials') }}">Cancel</a></button>
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
	$("#assign_course_material-edit-form").validate({
		
	});
});
</script>
@endpush
