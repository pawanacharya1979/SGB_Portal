@extends('layouts.master1')
@section('content')

<div class="slider-inner-about" style="background-image: url(http://dai.avedemos.uk/storage/uploads/{{ $Data->path }}); background-repeat:no-repeat;">
	<div class="row m-0">
		<div class="col-md-8 col-sm-12 col-xs-12">
			<h2>a{{$Data->bannertext}}</h2>
		</div>
	</div>
</div>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" />

@if (Auth::guest())
<form method="post" action="{{url('/doLogin')}}" accept-charset="UTF-8">
    {{ csrf_field() }}
<div class="inner-sld">
        <div class="container">
        <div class="row m-0">
          <div class="col-md-5 col-sm-8 col-xs-12">
          <div class="frm-course">
          <h3>LOGIN</h3>
          
            <div class="form-group">
             	<div class="icn"><i class="fa fa-user"></i></div>
             	<div class="icn-text">
                    <input type="text" class="form-control" name="email" id="email" placeholder="Username">
             </div>
          </div>
          <div class="form-group">
             	<div class="icn"><i class="fa fa-lock"></i></div>
             	<div class="icn-text">
                    <input type="password" class="form-control password" id="pwd" name="password" placeholder="Password" value="">
             </div>
          </div>
      
          <button type="submit" name="submit" value="submit" class="btn btn-primary pull-left">Login</button>
          <label for="remember" class="checkbox-inline pull-right">Password Reminder</label>
        </div>
     	</div>
		
         </div>
         </div>
        </div>
</form>
@endif

<div class="container custom-container">
<div class="mrg-30 local-content">
	<div class="row m-0">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
	<div class="course-model">
		@if($Data->contentblock1 != '')
			
		<?php
	$email = Auth::user()->email;
	$segment = Request::segment(1);
	$results = DB::select( DB::raw("SELECT * FROM assign_course_materials ACM, users U WHERE ACM.username = U.id and U.email='".$email."'"));
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
		echo $string = str_replace('{{DATAGRID}}', '', $Data->contentblock1);
	}else{
	} ?>
	
		@endif
	</div> 

	</div>
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 download-btn">
	<h4>Download <span class="dwn-smb"><i class="fa fa-angle-double-down" aria-hidden="true"></i></span></h4>
	<img src="img/book.png" alt="">
	<button class="colr-blue"><a href="#">Course Program</a></button>
	<button class="colr-blue"><a href="#">Travel Details</a></button>
	@foreach($aCourses as $aCourse)
	<!--<button class="colr-blue"><a href="{{ $aCourse['link'] }}"> {{ $aCourse['course'] }} </a></button>-->
	@endforeach
	
	<?php 
	/*<button class="colr-blue"><a href="{{ $aCourses[0] }}">{{ $aCourse }}</a></button>
	<button class="colr-brown"><a href="{{ $aCourses[0] }}">Travel Details</a></button>
	<button class="colr-drk-blue"><a href="{{ $aCourses[0] }}">Course Meterials</a></button>*/
	?>
	</div>
	</div>
	<?php echo $value?>
</div>

</div>

	
	@if($Data->contentblock2 != '')
<div class="container custom-container">
		<div class="mrg-30 local-content">
			{!!$Data->contentblock2!!}
		</div>
		</div>
	@endif
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

