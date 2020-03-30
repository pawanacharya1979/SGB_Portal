@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/upcoming_masterclasses') }}">Upcoming Masterclass</a> :
@endsection
@section("contentheader_description", $upcoming_masterclass->$view_col)
@section("section", "Upcoming Masterclasses")
@section("section_url", url(config('laraadmin.adminRoute') . '/upcoming_masterclasses'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Upcoming Masterclasses Edit : ".$upcoming_masterclass->$view_col)

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
				{!! Form::model($upcoming_masterclass, ['route' => [config('laraadmin.adminRoute') . '.upcoming_masterclasses.update', $upcoming_masterclass->id ], 'method'=>'PUT', 'id' => 'upcoming_masterclass-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'title')
					@la_input($module, 'details')
					@la_input($module, 'applicationform')
					@la_input($module, 'status')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/upcoming_masterclasses') }}">Cancel</a></button>
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
	$("#upcoming_masterclass-edit-form").validate({
		
	});
});
</script>
@endpush
