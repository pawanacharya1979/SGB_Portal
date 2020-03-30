 @extends('layouts.master')
   @section('content')


   <div class="container-fluid p-0">
         
          
        <div class="row m-0">
          <div class="slider-inner-course">
          <div class="col-md-8 col-sm-12 col-xs-12">
             <h2>DAI Local Content Masterclass</h2>
             <h1>Course-Materials</h1>
             </div>
          </div>
        	
        </div>
        
        <div class="inner-sld">
        <div class="container">
        {{ Form::open(array('url' => 'userlogin')) }}
        <div class="row m-0">
          <div class="col-md-5 col-sm-8 col-xs-12">
          <div class="frm-course" id="inpagelogin">
          <h3>LOGIN</h3>
          
            <div class="form-group">
             	<div class="icn"><i class="fa fa-user"></i></div>
             	<div class="icn-text">
                    <input type="text" class="form-control" name="username" id="username" placeholder="Username"/>
             </div>
          </div>
          <div class="form-group">
             	<div class="icn"><i class="fa fa-lock"></i></div>
             	<div class="icn-text">
                    <input type="password"  class="form-control password" id="pwd" name="password" placeholder="Password" value="">
             </div>
          </div>
      
          <button type="submit" name="submit" value="submit" class="btn btn-primary pull-left">Login</button>
          <label for="remember" class="checkbox-inline pull-right">Password Reminder</label>
        </div>
        {{ Form::close() }}
     	</div>
		
         </div>
         </div>
        </div>
        
        
      <div class="container">
        <div class="mrg-30 local-content">
          <div class="row m-0">
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
          <div class="course-model">
          <p>All course training materials are the intellectual property of DAI.    These materials and the DAI suit of analytical tools will be available to participants at the course via their own laptops and tablets.  
</p>
          <p>In addition participants will be provided with an electronic folder of local content policies, regulations, studies and reports from around the world: our Document Bank. </p>
<p>Prior to participating on the course, participants are download and read the following pre-course materials:</p>
<ul>
<li><a href="#">Comparison of local content regulations in Africa</a></li>
<li><span>Ghana Local Content and Local Participation Regulations 2013 LI 2204</span></li>
<li><span>other</span></li>
</ul>

         </div> 
         
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 download-btn">
          <h4>Download <span class="dwn-smb"><i class="fa fa-angle-double-down" aria-hidden="true"></i></span></h4>
          <img src="img/book.png" alt="">
             @if (Auth::guest())
				 <button class="colr-blue"><a href="#inpagelogin">Course Program</a></button>
				 <button class="colr-drk-blu"><a href="#inpagelogin">Travel Details</a></button>
				 <button class="colr-brown"><a href="#inpagelogin">Course Meterials</a></button>
			 @else
				<button class="colr-blue"><a href="https://www.tutorialspoint.com/php/php_tutorial.pdf" target=”_blank”>Course Program</a></button>
				<button class="colr-drk-blu"><a href="https://www.tutorialspoint.com/php/php_tutorial.pdf" target=”_blank”>Travel Details</a></button>
				<button class="colr-brown"><a href="https://www.tutorialspoint.com/php/php_tutorial.pdf" target=”_blank”>Course Meterials</a></button> 
			 @endif
          </div>
          </div>
        </div>
         <div class="mrg-30 model-cont">
          <div class="row m-0">
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
          <div class="model-info">
          <p>DAI's suite of analytical tools are integrated into the Masterclass course:</p>
          <h4>(LCTO) Local Content Trade-Off Model</h4>
          <p>Sensitivity analysis of public policy trade-offs between Local Content and other economic and social policy objectives </p>
          <h4>(LCOM) Local Content Optimization Model</h4>
          <p>Demand/Supply assessment of capabilities of local suppliers and labour to win work in projects and major contract. Generates forecast of what Can, Could and Cannot be provided by local supply chains.  Informs targets, plans, contracting strategy and tender evaluation.</p>
          
         </div> 
         
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
          <div class=" model-img">
         <img src="img/comp-1.jpg" alt="">
         <img src="img/comp-2.jpg" alt="">
           </div>
          </div>
          </div>
           <div class="row m-0">
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
          <div class="model-info">
          <h4>(SRQ) Supplier Registration and Pre-Qualification Portal</h4>
          <p>On-Line portal to register local suppliers, pre-qualify for bid selection, match to international partners, and design supplier development programs</p>
          <h4>(LCPR) Local Content Plan and Reporting Platform</h4>
          <p>On-line platform to assure compliance with regulations for Local Content Plans and targets for Reporting.  Generates dashboards and scorecards, evaluates major contract tenders, and calculates impact on the economy</p>
          </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
          <div class="model-img">
          <img src="img/comp-3.jpg" alt="">
           <img src="img/comp-4.jpg" alt="">
           </div>
          </div>
          </div>
        </div>
          
        </div>
        
    </div>
@stop