@extends("la.layouts.app")

@section("contentheader_title", "Users")
@section("contentheader_description", "Users listing")
@section("section", "Users")
@section("sub_section", "Listing")
@section("htmlheader_title", "Users Listing")

@section("headerElems")
@la_access("Users", "create")
	<button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#AddModal">Add Student</button>
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
@la_access("Users", "create")
<div class="modal fade" id="AddModal" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Student</h4>
			</div>
			{!! Form::open(['action' => 'LA\StudentController@store', 'id' => 'user-add-form']) !!}
			<div class="modal-body">
				<div class="box-body">
                    @la_form($module)
					
					{{--
					@la_input($module, 'email')
					@la_input($module, 'password')
					@la_input($module, 'firstname')
					@la_input($module, 'lastname')
					@la_input($module, 'notes')
					@la_input($module, 'course')
					@la_input($module, 'userappform')
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
        ajax: "{{ url(config('laraadmin.adminRoute') . '/student_dt_ajax') }}",
		language: {
			lengthMenu: "_MENU_",
			search: "_INPUT_",
			searchPlaceholder: "Search"
		},
		@if($show_actions)
		columnDefs: [ { orderable: false, targets: [-1] }],
		columnDefs: [{ visible: false, targets: [2,7] } ],
		@endif
	});
	$("#user-add-form").validate({
		
	});
});
</script>
<script>
        $(document).ready(function() {
            $('.summernote').summernote();
        });
</script>
<script>
	  var YOUR_MESSAGE_STRING_CONST = "Do you wish to continue?";
      $('#btnSubmit').on('click', function(e){
    		confirmDialog(YOUR_MESSAGE_STRING_CONST, function(){ 
    			//My code to delete
				console.log("deleted!");
    		});
    	});

        function confirmDialog(message, onConfirm){
    	    var fClose = function(){
    			  modal.modal("hide");
    	    };
    	    var modal = $("#confirmModal");
    	    modal.modal("show");
    	    $("#confirmMessage").empty().append(message);
    	    $("#confirmOk").unbind().one('click', onConfirm).one('click', fClose);
    	    $("#confirmCancel").unbind().one("click", fClose);
        }
		
        function deleteRow($id){
        	$($id).submit(function(e){
				var r = confirm("Are you sure to delete?");
				if (r == true) {
				
				} else {
				  e.preventDefault();
				}	
			});
        }

		$(document).ready(function() {
			
			
			$("#user-add-form").submit(function(e){
				var r = confirm("Do you wish to continue?");
				if (r == true) {
				
				} else {
				  e.preventDefault();
				}	
			});
			
			$(".frmrecord_delete").submit(function(e){
				var r = confirm("Do you wish to continue?");
				if (r == true) {
				
				} else {
				  e.preventDefault();
				}
				e.preventDefault();				
			});
			
			$(".btn-danger").on("click",function(e){
		        
		        var r = confirm("Do you wish to continue?");
		        if (r == true) {
		        
		        } else {
		          e.preventDefault();
		        }
		        e.preventDefault();
		    });

		    $(".fa-times").on("click",function(e){
		        
		        var r = confirm("Do you wish to continue?");
		        if (r == true) {
		        
		        } else {
		          e.preventDefault();
		        }
		        e.preventDefault();
		    });
			
		});
</script>
@endpush
