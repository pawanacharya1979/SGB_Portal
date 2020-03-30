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
    <div>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>$320,800</td>
            </tr>
            <tr>
                <td></td>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>$170,750</td>
            </tr>
            <tr>
                <td></td>
                <td>Ashton Cox</td>
                <td>Junior Technical Author</td>
                <td>San Francisco</td>
                <td>66</td>
                <td>$86,000</td>
            </tr>
            <tr>
                <td></td>
                <td>Cedric Kelly</td>
                <td>Senior Javascript Developer</td>
                <td>Edinburgh</td>
                <td>22</td>
                <td>$433,060</td>
            </tr>
            <tr>
                <td></td>
                <td>Airi Satou</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>33</td>
                <td>$162,700</td>
            </tr>
            <tr>
                <td></td>
                <td>Brielle Williamson</td>
                <td>Integration Specialist</td>
                <td>New York</td>
                <td>61</td>
                <td>$372,000</td>
            </tr>
            <tr>
                <td></td>
                <td>Herrod Chandler</td>
                <td>Sales Assistant</td>
                <td>San Francisco</td>
                <td>59</td>
                <td>$137,500</td>
            </tr>
            <tr>
                <td></td>
                <td>Rhona Davidson</td>
                <td>Integration Specialist</td>
                <td>Tokyo</td>
                <td>55</td>
                <td>$327,900</td>
            </tr>
            <tr>
                <td></td>
                <td>Colleen Hurst</td>
                <td>Javascript Developer</td>
                <td>San Francisco</td>
                <td>39</td>
                <td>$205,500</td>
            </tr>
            <tr>
                <td></td>
                <td>Sonya Frost</td>
                <td>Software Engineer</td>
                <td>Edinburgh</td>
                <td>23</td>
                <td>$103,600</td>
            </tr>
            <tr>
                <td></td>
                <td>Jena Gaines</td>
                <td>Office Manager</td>
                <td>London</td>
                <td>30</td>
                <td>$90,560</td>
            </tr>
            <tr>
                <td></td>
                <td>Quinn Flynn</td>
                <td>Support Lead</td>
                <td>Edinburgh</td>
                <td>22</td>
                <td>$342,000</td>
            </tr>
            <tr>
                <td></td>
                <td>Charde Marshall</td>
                <td>Regional Director</td>
                <td>San Francisco</td>
                <td>36</td>
                <td>$470,600</td>
            </tr>
            <tr>
                <td></td>
                <td>Haley Kennedy</td>
                <td>Senior Marketing Designer</td>
                <td>London</td>
                <td>43</td>
                <td>$313,500</td>
            </tr>
            <tr>
                <td></td>
                <td>Tatyana Fitzpatrick</td>
                <td>Regional Director</td>
                <td>London</td>
                <td>19</td>
                <td>$385,750</td>
            </tr>
            <tr>
                <td></td>
                <td>Michael Silva</td>
                <td>Marketing Designer</td>
                <td>London</td>
                <td>66</td>
                <td>$198,500</td>
            </tr>
            <tr>
                <td></td>
                <td>Paul Byrd</td>
                <td>Chief Financial Officer (CFO)</td>
                <td>New York</td>
                <td>64</td>
                <td>$725,000</td>
            </tr>
            <tr>
                <td></td>
                <td>Gloria Little</td>
                <td>Systems Administrator</td>
                <td>New York</td>
                <td>59</td>
                <td>$237,500</td>
            </tr>
            <tr>
                <td></td>
                <td>Bradley Greer</td>
                <td>Software Engineer</td>
                <td>London</td>
                <td>41</td>
                <td>$132,000</td>
            </tr>
            <tr>
                <td></td>
                <td>Dai Rios</td>
                <td>Personnel Lead</td>
                <td>Edinburgh</td>
                <td>35</td>
                <td>$217,500</td>
            </tr>
            <tr>
                <td></td>
                <td>Jenette Caldwell</td>
                <td>Development Lead</td>
                <td>New York</td>
                <td>30</td>
                <td>$345,000</td>
            </tr>
            <tr>
                <td></td>
                <td>Yuri Berry</td>
                <td>Chief Marketing Officer (CMO)</td>
                <td>New York</td>
                <td>40</td>
                <td>$675,000</td>
            </tr>
            <tr>
                <td></td>
                <td>Caesar Vance</td>
                <td>Pre-Sales Support</td>
                <td>New York</td>
                <td>21</td>
                <td>$106,450</td>
            </tr>
            <tr>
                <td></td>
                <td>Doris Wilder</td>
                <td>Sales Assistant</td>
                <td>Sidney</td>
                <td>23</td>
                <td>$85,600</td>
            </tr>
            <tr>
                <td></td>
                <td>Angelica Ramos</td>
                <td>Chief Executive Officer (CEO)</td>
                <td>London</td>
                <td>47</td>
                <td>$1,200,000</td>
            </tr>
            <tr>
                <td></td>
                <td>Gavin Joyce</td>
                <td>Developer</td>
                <td>Edinburgh</td>
                <td>42</td>
                <td>$92,575</td>
            </tr>
            <tr>
                <td></td>
                <td>Jennifer Chang</td>
                <td>Regional Director</td>
                <td>Singapore</td>
                <td>28</td>
                <td>$357,650</td>
            </tr>
            <tr>
                <td></td>
                <td>Brenden Wagner</td>
                <td>Software Engineer</td>
                <td>San Francisco</td>
                <td>28</td>
                <td>$206,850</td>
            </tr>
            <tr>
                <td></td>
                <td>Fiona Green</td>
                <td>Chief Operating Officer (COO)</td>
                <td>San Francisco</td>
                <td>48</td>
                <td>$850,000</td>
            </tr>
            <tr>
                <td></td>
                <td>Shou Itou</td>
                <td>Regional Marketing</td>
                <td>Tokyo</td>
                <td>20</td>
                <td>$163,000</td>
            </tr>
            <tr>
                <td></td>
                <td>Michelle House</td>
                <td>Integration Specialist</td>
                <td>Sidney</td>
                <td>37</td>
                <td>$95,400</td>
            </tr>
            <tr>
                <td></td>
                <td>Suki Burks</td>
                <td>Developer</td>
                <td>London</td>
                <td>53</td>
                <td>$114,500</td>
            </tr>
            <tr>
                <td></td>
                <td>Prescott Bartlett</td>
                <td>Technical Author</td>
                <td>London</td>
                <td>27</td>
                <td>$145,000</td>
            </tr>
            <tr>
                <td></td>
                <td>Gavin Cortez</td>
                <td>Team Leader</td>
                <td>San Francisco</td>
                <td>22</td>
                <td>$235,500</td>
            </tr>
            <tr>
                <td></td>
                <td>Martena Mccray</td>
                <td>Post-Sales support</td>
                <td>Edinburgh</td>
                <td>46</td>
                <td>$324,050</td>
            </tr>
            <tr>
                <td></td>
                <td>Unity Butler</td>
                <td>Marketing Designer</td>
                <td>San Francisco</td>
                <td>47</td>
                <td>$85,675</td>
            </tr>
            <tr>
                <td></td>
                <td>Howard Hatfield</td>
                <td>Office Manager</td>
                <td>San Francisco</td>
                <td>51</td>
                <td>$164,500</td>
            </tr>
            <tr>
                <td></td>
                <td>Hope Fuentes</td>
                <td>Secretary</td>
                <td>San Francisco</td>
                <td>41</td>
                <td>$109,850</td>
            </tr>
            <tr>
                <td></td>
                <td>Vivian Harrell</td>
                <td>Financial Controller</td>
                <td>San Francisco</td>
                <td>62</td>
                <td>$452,500</td>
            </tr>
            <tr>
                <td></td>
                <td>Timothy Mooney</td>
                <td>Office Manager</td>
                <td>London</td>
                <td>37</td>
                <td>$136,200</td>
            </tr>
            <tr>
                <td></td>
                <td>Jackson Bradshaw</td>
                <td>Director</td>
                <td>New York</td>
                <td>65</td>
                <td>$645,750</td>
            </tr>
            <tr>
                <td></td>
                <td>Olivia Liang</td>
                <td>Support Engineer</td>
                <td>Singapore</td>
                <td>64</td>
                <td>$234,500</td>
            </tr>
            <tr>
                <td></td>
                <td>Bruno Nash</td>
                <td>Software Engineer</td>
                <td>London</td>
                <td>38</td>
                <td>$163,500</td>
            </tr>
            <tr>
                <td></td>
                <td>Sakura Yamamoto</td>
                <td>Support Engineer</td>
                <td>Tokyo</td>
                <td>37</td>
                <td>$139,575</td>
            </tr>
            <tr>
                <td></td>
                <td>Thor Walton</td>
                <td>Developer</td>
                <td>New York</td>
                <td>61</td>
                <td>$98,540</td>
            </tr>
            <tr>
                <td></td>
                <td>Finn Camacho</td>
                <td>Support Engineer</td>
                <td>San Francisco</td>
                <td>47</td>
                <td>$87,500</td>
            </tr>
            <tr>
                <td></td>
                <td>Serge Baldwin</td>
                <td>Data Coordinator</td>
                <td>Singapore</td>
                <td>64</td>
                <td>$138,575</td>
            </tr>
            <tr>
                <td></td>
                <td>Zenaida Frank</td>
                <td>Software Engineer</td>
                <td>New York</td>
                <td>63</td>
                <td>$125,250</td>
            </tr>
            <tr>
                <td></td>
                <td>Zorita Serrano</td>
                <td>Software Engineer</td>
                <td>San Francisco</td>
                <td>56</td>
                <td>$115,000</td>
            </tr>
            <tr>
                <td></td>
                <td>Jennifer Acosta</td>
                <td>Junior Javascript Developer</td>
                <td>Edinburgh</td>
                <td>43</td>
                <td>$75,650</td>
            </tr>
            <tr>
                <td></td>
                <td>Cara Stevens</td>
                <td>Sales Assistant</td>
                <td>New York</td>
                <td>46</td>
                <td>$145,600</td>
            </tr>
            <tr>
                <td></td>
                <td>Hermione Butler</td>
                <td>Regional Director</td>
                <td>London</td>
                <td>47</td>
                <td>$356,250</td>
            </tr>
            <tr>
                <td></td>
                <td>Lael Greer</td>
                <td>Systems Administrator</td>
                <td>London</td>
                <td>21</td>
                <td>$103,500</td>
            </tr>
            <tr>
                <td></td>
                <td>Jonas Alexander</td>
                <td>Developer</td>
                <td>San Francisco</td>
                <td>30</td>
                <td>$86,500</td>
            </tr>
            <tr>
                <td></td>
                <td>Shad Decker</td>
                <td>Regional Director</td>
                <td>Edinburgh</td>
                <td>51</td>
                <td>$183,000</td>
            </tr>
            <tr>
                <td></td>
                <td>Michael Bruce</td>
                <td>Javascript Developer</td>
                <td>Singapore</td>
                <td>29</td>
                <td>$183,000</td>
            </tr>
            <tr>
                <td></td>
                <td>Donna Snider</td>
                <td>Customer Support</td>
                <td>New York</td>
                <td>27</td>
                <td>$112,000</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Salary</th>
            </tr>
        </tfoot>
    </table>
    
    
    </div>
@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('la-assets/plugins/datatables/datatables.min.css') }}"/>
@endpush


@push('scripts')

<script src="{{ asset('la-assets/plugins/datatables/datatables.min.js') }}"></script>
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
</script>

@endpush
@stop