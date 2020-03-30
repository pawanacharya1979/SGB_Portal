@extends('layouts.master1')
@section('content')

<div class="slider-inner-about" style="background-image: url(http://dai.avedemos.uk/storage/uploads/{{ $Data->path }}); background-repeat:no-repeat;">
	<div class="row m-0">
		<div class="col-md-8 col-sm-12 col-xs-12">
			<h2>{{$Data->bannertext}}</h2>
		</div>
	</div>
</div>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" />
<div class="container custom-container">
	@if($Data->contentblock1 != '')
	
	<?php
	$segment = Request::segment(1);
	$results = DB::select( DB::raw("SELECT * FROM assign_course_materials ACM, users U WHERE ACM.username = U.id") );
	//echo "<pre>";print_r($results);die();
	$value = "<table id='example' class='display' style='width:100%'>
	<thead>
	  <tr>
		<th></th>
		<th>User Name</th>
		<th>Course Name</th>
		<th>Start Date</th>
		<th>End Date</th>
		<th>Status</th>
		<th>Download</th>
	  </tr>
	</thead>
	
	<tbody>";
	foreach($results as $data){	
		$sCourseStr = str_replace('"','',$data->coursename);
		$sCourseStr = str_replace('[','',$sCourseStr);
		$sCourseStr = str_replace(']','',$sCourseStr);
		$pieces = explode(",", $sCourseStr);
		for($i = 0; $i < count($pieces); $i++){

			$rResult = DB::select( DB::raw("SELECT CD.coursename AS CourseName, CD.startdate, 
								CD.enddate, UPL.path 
								FROM course_details CD, manage_course_materials MCM, 
								uploads UPL WHERE CD.id = $pieces[$i] 
								AND MCM.coursename = $pieces[$i] 
								AND UPL.id = MCM.materialfile") );
			
			//print_r($rResult);die();
			//echo $pieces[0].'=='.$pieces[1].$pieces[2];die();
			foreach($rResult as $row){
				$sPath = str_replace('/home/sites/avedemos.uk/public_html/dai','',$row->path);	
				$value .= "<tr>
								<td></td>
								<td>".$data->firstname."</td>
								<td>".$row->CourseName."</td>
								<td>".$row->startdate."</td>
								<td>".$row->enddate."</td>
								<td>".$data->status."</td>
								<td><a href=".$sPath." download>Download</a></td>
							</tr>";
			}
		}
	} 
	$value .= "</tbody></table>";

	if($segment = 'course-materials'){
		echo $string = str_replace('{{DATAGRID}}', $value, $Data->contentblock1);

	}else{
	
	?>
		{!!$Data->contentblock1!!}

  <?php } ?>
	
	@endif
	
	@if($Data->contentblock2 != '')
	{!!$Data->contentblock2!!}
	@endif
</div>
<!--<script src="https://code.jquery.com/jquery-3.3.1.js" ></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>
<script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js" ></script>
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        columnDefs: [ {
            orderable: false,
            className: 'select-checkbox',
            targets:   0
        } ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]]
    } );
} );
</script>-->
@endsection

