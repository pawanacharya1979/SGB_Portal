 @extends('layouts.master')
   @section('content')

   <div class="container-fluid p-0">
    
        <div class="row m-0">
          <div class="slider-inner-course">
          <div class="col-md-8 col-sm-12 col-xs-12">
             <h2>DAI Local Content Masterclass</h2>
             <h1>Community of Practice</h1>
             </div>
          </div>
        	
        </div>
        <div class="inner-sld">
        <div class="container">
        <div class="row m-0">
          <div class="col-md-5 col-sm-8 col-xs-12">
          <div class="frm-course">
          <h3>LOGIN</h3>
          
            <div class="form-group">
             	<div class="icn"><i class="fa fa-user"></i></div>
             	<div class="icn-text">
                    <input type="text" class="form-control" name="Firstname" id="Firstname" placeholder="Username"/>
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
     	</div>
		
         </div>
         </div>
        </div>
     
      <div class="container">
        <div class="mrg-30 community-content">
          <div class="row m-0">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
          <div class="local-community">
          <p>All participants who have completed the DAI Masterclass are invited to joint the <span class="text-bld"> DAI Local Content Masterclass Community of Practice</span></p>
          <p>300+ government officials, and procurement, HR and  social performance private sector managers from over 100 different organizations are alumni to the DAI Local Content Masterclass</p>
<p>To join the <span class="text-bld">DAI Local Content Masterclass Community,</span> please:</p>
<ul>
<li><span>Click here to join the Linked-in Group</span> <a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
<li><span>Click here to follow our Local Content feeds on Twitter @DAIlocalcontentMC</span> <a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
</ul>

         </div> 
         
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 community-img">
          
          <img src="img/img-community.jpg" alt="">
          <div class="img-title">
          <h4>Class of November 2018</h4>
          <p>DAI Local Content Masterclass, Oxfordshire, England</p>
           </div>  
          </div>
          </div>
        </div>
         
          
        </div>
    </div>
 @stop