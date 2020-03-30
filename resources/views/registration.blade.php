@extends('layouts.master1')
@section('content')

<div class="row m-0">
	<div class="slider-inner-reg">
		<div class="col-md-8 col-sm-12 col-xs-12">
			<h2>{{$Data->bannerheader1}}</h2>
			<h1>{{$Data->bannerheader2}}</h1>
		</div>
	</div>
</div>
<div class="container">
 
        <div class="mrg-30 master-content">
		<div class="row m-0">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
		
          		<h4>Upcoming Masterclasses</h4>          
          </div>
		<div class="col col-lg-6 col-md-6 col-sm-6 col-xs-6 download-btn-reg">
          		<h4>Download <span class="dwn-smb"><i class="fa fa-angle-double-down" aria-hidden="true"></i></span></h4>
		  </div>
		  </div>
          <div class="row m-0">
        
		 
		  
          @if($Data->contentblock1 != '')
				<?php
				

				if (strpos($Data->contentblock1, '{{COURSES}}') !== false) {
					 

						$segment = Request::segment(1);
						$results = DB::select( DB::raw("SELECT CD.coursename, CD.coursedetails, CD.startdate, UPL.path FROM upcoming_master_classes UMC JOIN course_details CD JOIN uploads UPL ON UMC.coursename = CD.id WHERE UPL.id = UMC.applicationform AND UMC.coursename = CD.id AND UMC.status='Active' AND CD.deleted_at IS NULL ORDER BY CD.startdate ASC") );
						//echo "<pre>";print_r($results);die();
						$value = "";
						$value2 = "";
						 $bootstrapColWidth=6;
						foreach($results as $data){	
							 $bs_url='https://sbg-dev.daiglobal.net';
									$sPath = str_replace('/var/www/dev','',$data->path);	
									
									//$sPath = str_replace('/home/sites/avedemos.uk/public_html/dai','',$row->path);	
									$value .= "<div class='col-lg-$bootstrapColWidth col-md-$bootstrapColWidth col-sm-$bootstrapColWidth col-xs-$bootstrapColWidth'><div class='master-class'>
									<h4>".$data->coursename."</h4>
									<p>".$data->coursedetails."</p>
									</div>
									</div>
									<div class='col col-lg-$bootstrapColWidth col-md-$bootstrapColWidth col-sm-$bootstrapColWidth col-xs-$bootstrapColWidth download-btn-reg'>
									<div class='colr-brown'>
										<a href=".$bs_url.$sPath." target='_blank'>Application Form ".$data->coursename."</a></div></div>";
											
								}
					
					echo $string = str_replace('{{COURSES}}', $value, $Data->contentblock1);
					echo $value2;
					//echo $string = str_replace('{{APPFRMS}}', $value, $string);
				}else{
				?>
					
				<?php } ?>
		@endif
         
     
          </div>
        </div>
        </div>
	
	
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

