<!Doctype html>
<html lang="en">
    <head>
      @section('title', 'index')
      @include('includes.head')
    </head>
    <body>
     
        <header class="header_area">
           @include('includes.header')
        </header>
       
      <div id="main" class="container-fluid p-0">

            @yield('content')

    </div>

        <footer class="footer_area p_120">
        @include('includes.footer')	
        </footer>