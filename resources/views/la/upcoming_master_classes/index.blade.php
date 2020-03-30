@extends("la.layouts.app")

@section("contentheader_title", "Upcoming Master Classes")
@section("contentheader_description", "Upcoming Master Classes listing")
@section("section", "Upcoming Master Classes")
@section("sub_section", "Listing")
@section("htmlheader_title", "Upcoming Master Classes Listing")

@section("headerElems")
@la_access("Upcoming_Master_Classes", "create")
	<button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#AddModal">Add Upcoming Master Class</button>
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

@la_access("Upcoming_Master_Classes", "create")
<div class="modal fade" id="AddModal" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Upcoming Master Class</h4>
			</div>
			{!! Form::open(['action' => 'LA\Upcoming_Master_ClassesController@store', 'id' => 'upcoming_master_class-add-form']) !!}
			<div class="modal-body">
				<div class="box-body">
                    @la_form($module)
					
					{{--
					@la_input($module, 'coursename')
					@la_input($module, 'coursedetails')
					@la_input($module, 'applicationform')
					@la_input($module, 'status')
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
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script> 
<script src="{{ asset('la-assets/plugins/datatables/datatables.min.js') }}"></script>
<script>
$(function () {
	$("#example1").DataTable({
		processing: true,
        serverSide: true,
        ajax: "{{ url(config('laraadmin.adminRoute') . '/upcoming_master_class_dt_ajax') }}",
		language: {
			lengthMenu: "_MENU_",
			search: "_INPUT_",
			searchPlaceholder: "Search"
		},
		@if($show_actions)
		columnDefs: [ { orderable: false, targets: [-1] }],
		columnDefs: [{ visible: false, targets: [3 ]} ],
		@endif
	});
	$("#upcoming_master_class-add-form").validate({
		
	});
});
</script>
<script>
        $(document).ready(function() {
            $('.summernote').summernote();

			$( "select[name='coursename']").change(function(){
				//alert($(this).val());
				
				$.ajax({
					url: "{{url('/admin/upcoming_master_classes/getcoursedetails')}}/"+$(this).val(),
					type: "GET",
					success:function(data) {
						//$('#notetext').val(data);
						//$('.note-editable').html(data);
						$('.summernote').summernote('code', data);
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						alert(errorThrown);
					}
				});
			});


        });
</script>
<script>
        $(document).ready(function() {
            $('.summernote').summernote();
        });
</script>
@endpush
