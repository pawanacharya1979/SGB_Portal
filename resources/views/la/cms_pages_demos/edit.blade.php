@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/cms_pages_demos') }}">CMS Pages Demo</a> :
@endsection
@section("contentheader_description", $cms_pages_demo->$view_col)
@section("section", "CMS Pages Demos")
@section("section_url", url(config('laraadmin.adminRoute') . '/cms_pages_demos'))
@section("sub_section", "Edit")

@section("htmlheader_title", "CMS Pages Demos Edit : ".$cms_pages_demo->$view_col)

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
				{!! Form::model($cms_pages_demo, ['route' => [config('laraadmin.adminRoute') . '.cms_pages_demos.update', $cms_pages_demo->id ], 'method'=>'PUT', 'id' => 'cms_pages_demo-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'title')
					@la_input($module, 'short description')
					@la_input($module, 'name')
					@la_input($module, 'content')
					@la_input($module, 'added on')
					@la_input($module, 'updated on')
					@la_input($module, 'status')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/cms_pages_demos') }}">Cancel</a></button>
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
	$("#cms_pages_demo-edit-form").validate({
		
	});
});
</script>
@endpush
