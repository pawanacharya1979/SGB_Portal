<div class="top-bar">
          	<div class="container">
           <div class="row m-0">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 top-links">
         <!--<ul class="list-inline">
         <li><a href="#">FAQ</a></li>
         <li><a href="#">SIGN UP</a></li>
         <li><a href="#">CONTACT US</a></li>
         <li><a href="#">PROJECT LOGIN</a></li>
         <li><a href="#">JOBS</a></li>
        
         </ul>-->
         </div>
         
         <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="row top-nav">
		  <!--<div class="top-search">
            <i class="fa fa-search"></i> <input type="text" value="" placeholder="Search">
          </div>-->
          @if (Auth::check())
		  <div class="btn-log">Welcome {{Auth::user()->firstname}}, <a href="{{url('/logout')}}">Log Out</a></div>
		  @endif
         </div>
       </div>
       </div>
       </div>
       </div>
      
      
    	<nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid pad-lft-rgt150">
        <a class="navbar-brand" href="{{url('/')}}"><img src="{{ URL::asset('img/logo2.png') }}" alt="logo"></a>
          <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="line"></span> 
            <span class="line"></span> 
            <span class="line"></span>
          </button>
        
          <div class="collapse navbar-collapse col-lg-9 col-12" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="{{url('/master-class')}}">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/registration')}}">Registration</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href=" {{url('/course-materials')}}">Course Materials</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href=" {{url('/community-of-practice')}}">Community Of Practice</a>
              </li>   
            </ul>
          </div>
          </div>
        </nav>



