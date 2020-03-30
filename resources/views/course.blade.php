@extends('layouts.master1')
@section('content')
<style>
#example_wrapper{display:none;}
</style>
<div class="slider-inner-about" style="background-image: url(http://dai.avedemos.uk/storage/uploads/{{ $Data->path }}); background-repeat:no-repeat;">
	<div class="row m-0">
          <div class="slider-inner-course">
			<div class="col-md-8 col-sm-12 col-xs-12">
				<h2>DAI Local Content Masterclass</h2>
				<h1>Course Materials</h1>
			</div>
          </div>

</div>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" />
@if (session('error'))
            <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
        @endif
@if (Auth::guest())
<form method="post" action="{{url('/doLogin')}}" accept-charset="UTF-8">
    {{ csrf_field() }}
<div class="inner-sld">
        <div class="container">
        <div class="row m-0">
          <div class="col-md-5 col-sm-8 col-xs-12">
          <div class="frm-course">
          	@if($errors->any())
			 <label style="color: red;">{{$errors->first()}}</label>
			@endif
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
<div class="container custom-container">
<!--<div class="mrg-30 local-content">
	<div class="row m-0">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
	<div class="course-model">
	Please Login
	</div></div></div></div></div>-->
@else
<div class="container custom-container">
<div class="mrg-30 local-content">
	<div class="row m-0">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
	<div class="course-model">
		
		<?php
				$user = Auth::user();
				$email = Auth::user()->email;
				$curdate = date("Y-m-d");

				$results = DB::select( DB::raw("SELECT startdate, enddate FROM users U,course_details cd WHERE U.course=cd.id AND U.email='".$email."'"));
				//echo "<pre>";print_r($email);die();
				$startdate = $results[0]->startdate;
				
				$enddate = $results[0]->enddate;
				
				//startdate-curdate
				$diff = abs(strtotime($startdate) - strtotime($curdate));
				$years = floor($diff / (365*60*60*24));
				$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
				$startdiffdays = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
				//echo "<br>";
				
				//enddate-curdate
				$diff = abs(strtotime($enddate) - strtotime($curdate));
				$years = floor($diff / (365*60*60*24));
				$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
				$enddiffdays = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
				//echo "<br>";
				//die();
					
				if($startdiffdays <= 7 || $enddiffdays >= 7){
					
					$user = Auth::user();
					$email = Auth::user()->email;
					$segment = Request::segment(1);
					
					$results =	DB::select( DB::raw("SELECT CD.coursename AS CourseName, CD.startdate, 
												CD.enddate, USR.course, CD.materials 
												FROM course_details CD JOIN users USR 
												ON USR.course = CD.id
												WHERE USR.email='".$email."'") );
					//echo "<pre>";print_r($results);die();
					$value = "<table id='example' class='course_materials display' style='width:100%;'>
					<thead>
					<tr>
														
						<th>File Name</th>					
						<th>Download</th>
					</tr>
					</thead>
					
					<tbody>";
					foreach($results as $data){	
						$sCourseStr = str_replace('"','',$data->materials);
						$sCourseStr = str_replace('[','',$sCourseStr);
						$sCourseStr = str_replace(']','',$sCourseStr);
						$pieces = explode(",", $sCourseStr);
						$pieces = explode(",", $sCourseStr);
						//echo "<pre>";print_r($pieces);die();
						for($i = 0; $i < count($pieces); $i++){

							if(isset($pieces[$i]) && !empty($pieces[$i])){
								$rResult = DB::select( DB::raw("SELECT * 
													FROM uploads 
													WHERE id = $pieces[$i]") );
								
								//echo "<pre>";print_r($rResult);die();
								//echo $pieces[0].'=='.$pieces[1].$pieces[2];die();
								foreach($rResult as $row){
									$sPath = str_replace('/home/sites/avedemos.uk/public_html/dai','',trim($row->path));	
									$value .= "<tr>											
													<td>".$row->name."</td>											
													<td><a href=".$sPath." target='_blank'>Download</a></td>
												</tr>";
								}
							}
						}
					} 
					$value .= "</tbody></table>";

				//if($segment = 'course-materials'){
					echo $string = str_replace('{{DATAGRID}}', '', $Data->contentblock1);
				//}
				} else {
					echo $string = str_replace('{{DATAGRID}}', "", $Data->contentblock1);
				}
			//}
	?>
	
		
	
	</div> 

	</div>
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 download-btn">
	<h4>Download <span class="dwn-smb"><i class="fa fa-angle-double-down" aria-hidden="true"></i></span></h4>
	<img src="img/book.png" alt="">
	<?php
	$user = Auth::user();
	$email = Auth::user()->email;
	$results =	DB::select( DB::raw("SELECT CD.coursename AS CourseName, CD.startdate,CD.enddate, 
										USR.course, CD.materials, CD.courseprogram, CD.traveldetails 
												FROM course_details CD, users USR 
												WHERE USR.course = CD.id
												AND USR.email='".$email."'") );
	//echo "<pre>";print_r($results);die();
	foreach($results as $data){
		if(!empty($data->courseprogram)){
			$courseprogram=$data->courseprogram;
		} else {
			$courseprogram=0;
		}

		if(!empty($data->traveldetails)){
			$traveldetails=$data->traveldetails;
		} else {
			$traveldetails=0;
		}

	$aUploads = DB::select( DB::raw("SELECT * FROM uploads 
									WHERE id=".$courseprogram." || id=".$traveldetails." ") );
		//echo "<pre>";print_r($aUploads);die();
	$sPath = array();
		foreach($aUploads as $row){
			$sPath[] = str_replace('/home/sites/avedemos.uk/public_html/dai','',trim($row->path));
	}
	//print_r($sPath);die()
	?>
	<div class="colr-blue"><a href="{{!empty($course)?$course->courseprogram:''}}" target="_blank">Course Program</a></div>
	<div class="colr-drk-blu"><a href="{{!empty($course)?$course->traveldetails:''}}" target="_blank">Travel Details</a></div>

	<?php } ?>
	<?php
		//$aCourses = DB::select( DB::raw("SELECT * FROM course_details "));
		//echo "<pre>";print_r($aCourses);die();
	?>
	<div class="colr-brown">
		<a id="course_material" style="cursor: pointer;">
			Course Materials
		</a>
	</div>
	
	</div>
	</div>

	<div class="row m-0">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<?php echo $value;?>
	</div>
	</div>	
	<?php 
	// if($user = Auth::user()){
	
	// 	echo $value;
	// }
	?>
</div>

</div>

	
	@if($Data->contentblock2 != '')
<div class="container custom-container">
		<div class="mrg-30 local-content">
			{!!$Data->contentblock2!!}
		</div>
		</div>
	@endif
	
	
	<?php
	//if($startdiffdays > 7 || $enddiffdays > 7){
		if($startdiffdays > 7){
	?>
	<!-- Modal -->
<div id="modalRegister" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
        <p>Hi Sorry!!</p>
		<p>The Course Materials section will be avaialble a week before the course start date and a week after the course end date.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
	<?php } ?>
	@endif
<script src="https://code.jquery.com/jquery-3.3.1.js" ></script>
<!--
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
<script>
$(document).ready(function() {
	$('#course_material').click(function(){
		$("#example_wrapper").show();
	});
});	
</script>
@endsection

