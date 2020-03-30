<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<base href="/public/" >

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
      <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">

    <title>DAI</title>
  </head>
<body>
        <?php 
          $segment = Request::segment(1);
		  $pages = array('master-class','about','registration','course-materials','community-of-practice');
		  if (in_array($segment, $pages)){	  
		 ?>
            @include('includes.header')
        <?php }else{ ?>
        
   <div class="container-fluid p-0">
         
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
        <div class="container">
          <a class="navbar-brand" href="{{url('/')}}"><img src="{{ URL::asset('img/logo2.png') }}" alt="logo"></a>
          <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="line"></span> 
            <span class="line"></span> 
            <span class="line"></span>
          </button>
        
          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="#">Who We Are</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="index.html">Our Work</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Publications</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">News</a>
              </li>
               <li class="nav-item">
                <a class="nav-link" href="#">Careers</a>
              </li>
               <li class="nav-item nav-dd">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="kurse.html">SBG Training</a>
                <div class="dropdown-menu">
    <a class="dropdown-item" href="{{url('/master-class')}}">Master Class</a>
    <a class="dropdown-item" href="#">Other Training</a>
    
  </div>
        <?php } ?>
              </li>
            </ul>
          </div>
          </div>
        </nav>
        
        
        @yield('content')
        
      
        <footer>
          <div class="container">
          <div class="footer-content">
            <div class="row m-0">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <img src="img/logo2.png" alt="">
            </div>
            <!--<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 links">
              <h3>About Us</h3>
              <ul>
                        <li><a href="#">Terms and Conditions</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">About Us</a></li>
                        </ul>
            </div>-->
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 social">
               <h3>Social Media</h3>
               <div class="socials-box">
                            <a href="https://www.facebook.com/DAIGlobal/"><i class="fa fa-facebook"></i></a>
                            <a href="https://twitter.com/DAIGlobal"><i class="fa fa-twitter"></i></a>
                            <!--<a href="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#"><i class="fa fa-youtube"></i></a>-->
                            <a href="https://www.linkedin.com/company/14028385/"><i class="fa fa-linkedin"></i></a>
                            
                        </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 contact">
            <h3>Contact Us</h3>
            <ul><li><a href="mailto:masterclass@dai.com">masterclass@dai.com</a></li>
                <!--<li><a href="#">info@dai.com</a></li>-->
                
                </ul>
            </div>
            </div>
            
            <div class="row m-0">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="copyright mrg-20"> Copyright © DAI <?php echo date("Y"); ?>.</div>
              </div>
            </div>
          </div>
          </div>
        </footer>


   
    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.js" ></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>
    <script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js" ></script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    
   
    <script>
$(document).ready(function() {
  let myTable = $('#example').DataTable( {        

        /*columnDefs: [ {
            orderable: false,
            className: 'select-checkbox',
            targets:   0
        } ],
        select: {
            style:    'os',// 'single', 'multi', 'os', 'multi+shift'
            selector: 'td:first-child'
        },*/
        
        order: [[ 1, 'asc' ]]
    } );

    $('#MyTableCheckAllButton').click(function() {
        if (myTable.rows({
                selected: true
            }).count() > 0) {
            myTable.rows().deselect();
            return;
        }

        myTable.rows().select();
    });

    myTable.on('select deselect', function(e, dt, type, indexes) {
        if (type === 'row') {
            // We may use dt instead of myTable to have the freshest data.
            if (dt.rows().count() === dt.rows({
                    selected: true
                }).count()) {
                // Deselect all items button.
                $('#MyTableCheckAllButton i').attr('class', 'far fa-check-square');
                return;
            }

            if (dt.rows({
                    selected: true
                }).count() === 0) {
                // Select all items button.
                $('#MyTableCheckAllButton i').attr('class', 'far fa-square');
                return;
            }

            // Deselect some items button.
            $('#MyTableCheckAllButton i').attr('class', 'far fa-minus-square');
        }
    });

} );
</script>
</body>