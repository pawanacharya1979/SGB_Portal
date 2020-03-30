@extends("la.layouts.app")

@section("contentheader_title", "CMS Pages")
@section("contentheader_description", "CMS Pages listing")
@section("section", "CMS Pages")
@section("sub_section", "Listing")
@section("htmlheader_title", "CMS Pages Listing")

@section("headerElems")
@la_access("CMS_Pages", "create")
	<button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#AddModal">Add CMS Page</button>
@endla_access
@endsection

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

<div class="box box-success">
	<!--<div class="box-header"></div>-->
	<div class="box-body">
		<table id="example1" class="table table-bordered">
		<thead>
		<tr class="success">
			@foreach( $listing_cols as $col )
			<th>{{ $module->fields[$col]['label'] or ucfirst($col) }}</th>
			@endforeach
			@if($show_actions)
			<th>Actions</th>
			@endif
		</tr>
		</thead>
		<tbody>
			
		</tbody>
		</table>
	</div>
</div>
@push('styles')
<!-- include summernote css/js-->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
@endpush
@la_access("CMS_Pages", "create")
<div class="modal fade" id="AddModal" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add CMS Page</h4>
			</div>
			{!! Form::open(['action' => 'LA\CMS_PagesController@store', 'id' => 'cms_page-add-form']) !!}
			<div class="modal-body">
				<div class="box-body">
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
					
					--}}
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				{!! Form::submit( 'Submit', ['class'=>'btn btn-success']) !!}
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endla_access

@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('la-assets/plugins/datatables/datatables.min.css') }}"/>
<style>
.form-group:nth-child(9),.form-group:nth-child(13){
   display:none;
}
</style>
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>   
<script src="{{ asset('la-assets/plugins/datatables/datatables.min.js') }}"></script>
<script>
$(function () {
	$("#example1").DataTable({
		processing: true,
        serverSide: true,
        ajax: "{{ url(config('laraadmin.adminRoute') . '/cms_page_dt_ajax') }}",
		language: {
			lengthMenu: "_MENU_",
			search: "_INPUT_",
			searchPlaceholder: "Search"
		},
		@if($show_actions)
		columnDefs: [ { orderable: false, targets: [-1] }],
		columnDefs: [{ visible: false, targets:[ 3, 4, 5, 6, 7, 8, 9, 10, 11, 12,13] }],
		@endif
	});
	$("#cms_page-add-form").validate({
		
	});
});
</script>
<script>
        $(document).ready(function() {
            $('.summernote').summernote();
        });


        function deleteRow($id){
        	$($id).submit(function(e){
				var r = confirm("Are you sure to delete?");
				if (r == true) {
				
				} else {
				  e.preventDefault();
				}	
			});
        }
</script>
@endpush
