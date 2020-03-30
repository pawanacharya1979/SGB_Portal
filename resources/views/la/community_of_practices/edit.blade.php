@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/community_of_practices') }}">Community of Practice</a> :
@endsection
@section("contentheader_description", $community_of_practice->$view_col)
@section("section", "Community of Practices")
@section("section_url", url(config('laraadmin.adminRoute') . '/community_of_practices'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Community of Practices Edit : ".$community_of_practice->$view_col)

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
				{!! Form::model($community_of_practice, ['route' => [config('laraadmin.adminRoute') . '.community_of_practices.update', $community_of_practice->id ], 'method'=>'PUT', 'id' => 'community_of_practice-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'twitter')
					@la_input($module, 'linkedin')
					@la_input($module, 'content')
					@la_input($module, 'banner')
					@la_input($module, 'bannerheader1')
					@la_input($module, 'bannerheader2')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/community_of_practices') }}">Cancel</a></button>
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
	$("#community_of_practice-edit-form").validate({
		
	});
});
</script>
@endpush
