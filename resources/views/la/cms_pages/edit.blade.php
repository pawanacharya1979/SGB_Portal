@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/cms_pages') }}">CMS Page</a> :
@endsection
@section("contentheader_description", $cms_page->$view_col)
@section("section", "CMS Pages")
@section("section_url", url(config('laraadmin.adminRoute') . '/cms_pages'))
@section("sub_section", "Edit")

@section("htmlheader_title", "CMS Pages Edit : ".$cms_page->$view_col)

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
.form-group:nth-child(11),.form-group:nth-child(15){
   display:none;
}
</style>
@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
<!--<script src="http://dai.avedemos.uk/public/la-assets/js/pages/summernote.js"></script> -->   
@endpush

<div class="box">
	<div class="box-header">
		
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				{!! Form::model($cms_page, ['route' => [config('laraadmin.adminRoute') . '.cms_pages.update', $cms_page->id ], 'method'=>'PUT', 'id' => 'cms_page-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'pagetitle')
					@la_input($module, 'pagesubtitle')
					@la_input($module, 'bannerheader1')
					@la_input($module, 'bannerheader2')
					@la_input($module, 'bannerbackground1')
					@la_input($module, 'bannerbackground2')
					@la_input($module, 'contentblock1')
					@la_input($module, 'contentblock2')
					@la_input($module, 'contentblock3')
					@la_input($module, 'coursebrochure')
					@la_input($module, 'exampleprogram')
					@la_input($module, 'registration')
					@la_input($module, 'status')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/cms_pages') }}">Cancel</a></button>
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
	$("#cms_page-edit-form").validate({
		
	});
});
</script>
<script>
        $(document).ready(function() {
            $('.summernote').summernote();
        });
</script>
@endpush
