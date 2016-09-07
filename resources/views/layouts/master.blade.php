<!DOCTYPE html>
<html>
    <head>

      <title>MyTailor</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="shortcut icon" href="{{{ asset('img/logo.jpg') }}}">

      {!! Html::style('css/materialize.min.css'); !!}
      {!! Html::style('css/style.css'); !!}
      {!! Html::style('css/jquery.dataTables.min.css'); !!}

    </head>

    <body>

    <header>
        <img src="../img/logo.jpg"  alt="" class="right circle responsive-img valign profile-image center" style="height:70px; width:80px; margin-top:5px;">
        <div class="right col s9 " style="padding-top:20px">
          <font size = "+2" color = "black" style="margin-top:5px" >Tailoring Management System</font>
        </div>
    </header>

      <nav id="slide-out" class="side-nav fixed" style="position fixed; top: 0; padding-top:0px; margin-top:0px; background: #C8E6C9; width:310px;"> 
        <div class="row">
          <div style="height:20px"></div>
          <div class="col s12 center">
          @if(Auth::check())
            <img src="{{ Auth::user()->user_image }}" alt="" class="circle responsive-img valign profile-image center" style="height:130px; width:130px;"/>
          </div>
        </div>
        <div class="col s12 container" style="margin-top:-40px;">
          <a class='dropdown-button btn btn-flat waves-effect waves-light profile-btn black-txt' href="#!" style="background-color: #C8E6C9;" data-activates='profile-dropdown'>{{ Auth::user()->name }}</a>
          @endif
          <ul id="profile-dropdown" class="dropdown-content">
            <li><a href="#!"><i class="mdi-action-face-unlock" style="font-size:16px; margin-top:10px;margin-left:0px;font-style:Segoe UI"> Profile</i></a></li>
            <li><a href="{{URL::to('/logout')}}"><i class="mdi-hardware-keyboard-tab" style="font-size:16px;margin-top:10px;margin-left:0px;font-style:Segoe UI"> Logout</i></a></li>
          </ul>
        </div>

        <ul id="sidenav-ul">

          <!--<div class="divider" style="background-color:black"></div>-->

          <div style="padding-top:10px"></div>
          <li class="no-padding">
            <ul class="collapsible collapsible-accordion">

      
              <!-- <div class="divider"></div> -->
              <li class="bold"><a class="collapsible-header waves-effect waves-white" style="color:#212121" href="{{URL::to('/dashboard')}}"><i style="font-size:30px" class="small mdi-action-dashboard" style="color:#ccff90;"></i><b>Dashboard</b></a></li>
              <!--<div class="divider"></div>-->
              <li class="bold"><a class="collapsible-header waves-effect waves-white {{ Request::is('maintenance/*') ? 'active' : '' }}" style="color:#212121"><i style="font-size:30px" class="mdi-action-settings" style="color:#ccff90"></i><b>Maintenance</b></a>

                <div class="collapsible-body" position = "fixed" style = "display: block;">
                  <ul>
                    <li class="no-padding">
                      <ul class="collapsible collapsible-accordion">

                        <li class="bold"><a style="color:#212121; opacity:0.90" class="collapsible-header waves-effect waves-white {{ Request::is('maintenance/individual') || Request::is('maintenance/company') ? 'active' : '' }}"><b>Customer Profile</b></a> 
                          <div class="collapsible-body">
                            <ul>
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white " href="{{URL::to('maintenance/individual')}}"><i style="font-size:15px" class="mdi-action-label-outline" style="color:#cc ff90;"><font font-family: "Century Gothic">Individual</font></i></a></li>
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('maintenance/company')}}"><i style="font-size:15px" class="mdi-action-label-outline" style="color:#ccff90;"><font font-family: "Century Gothic">Company</font></i></a></li>

                             <div class="divider"></div>
                            </ul>
                          </div>
                        </li>

                        <li class="bold"><a style="color:#212121; opacity:0.90" class="collapsible-header waves-effect waves-white {{ Request::is('maintenance/employee-role') || Request::is('maintenance/employee') ? 'active' : '' }}"><b>Employee</b></a>
                          <div class="collapsible-body">
                            <ul>  
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('maintenance/employee-role')}}"><i style="font-size:15px" class="mdi-action-label-outline" style="color:#ccff90;"><font font-family: "Century Gothic">Employee Roles</font></i></a></li>
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('maintenance/employee')}}"><i style="font-size:15px" class="mdi-action-label-outline" style="color:#ccff90;"><font font-family: "Century Gothic">Employee Profile</font></i></a></li>
                              <div class="divider"></div>
                            </ul>
                           </div>
                        </li>

                        <li class="bold"><a style="color:#212121; opacity:0.90" class="collapsible-header waves-effect waves-white {{ Request::is('maintenance/garment-category') || Request::is('maintenance/garment-segment') || Request::is('maintenance/segment-style') ||Request::is('maintenance/segment-pattern') ? 'active' : '' }}"><b>Garments</b></a>
                          <div class="collapsible-body">
                            <ul>  
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('maintenance/garment-category')}}"><i style="font-size:15px" class="mdi-action-label-outline" style="color:#ccff90;"><font font-family: "Century Gothic">Category</font></i></a></li>
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('maintenance/garment-segment')}}"><i style="font-size:15px" class="mdi-action-label-outline" style="color:#ccff90;"><font font-family: "Century Gothic">Segment</font></i></a></li>
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('maintenance/segment-style')}}"><i style="font-size:15px" class="mdi-action-label-outline" style="color:#ccff90;"><font font-family: "Century Gothic">Segment Style</font></i></a></li>
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('maintenance/segment-pattern')}}"><i style="font-size:15px" class="mdi-action-label-outline" style="color:#ccff90;"><font font-family: "Century Gothic">Segment Pattern</font></i></a></li>
                              <div class="divider"></div>
                            </ul>
                          </div>
                        </li>

                        <li class="bold"><a style="color:#212121; opacity:0.90" class="collapsible-header waves-effect waves-white {{ Request::is('maintenance/fabric-type') || Request::is('maintenance/fabric-thread-count') || Request::is('maintenance/fabric-color') || Request::is('maintenance/fabric-pattern')|| Request::is('maintenance/fabric') ? 'active' : '' }}"><b>Fabrics</b></a>

                          <div class="collapsible-body">
                            <ul>  
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('maintenance/fabric-type')}}"><i style="font-size:15px" class="mdi-action-label-outline" style="color:#ccff90;"><font font-family: "Century Gothic">Fabric Type</font></i></a></li>
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('maintenance/fabric-thread-count')}}"><i style="font-size:15px" class="mdi-action-label-outline" style="color:#ccff90;"><font font-family: "Century Gothic">Fabric Thread Count</font></i></a></li>
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('maintenance/fabric-color')}}"><i style="font-size:15px" class="mdi-action-label-outline" style="color:#ccff90;"><font font-family: "Century Gothic">Fabric Color</font></i></a></li>
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('maintenance/fabric-pattern')}}"><i style="font-size:15px" class="mdi-action-label-outline" style="color:#ccff90;"><font font-family: "Century Gothic">Fabric Pattern</font></i></a></li>
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('maintenance/fabric')}}"><i style="font-size:15px" class="mdi-action-label-outline" style="color:#ccff90;"><font font-family: "Century Gothic">Fabric List</font></i></a></li>
                              <div class="divider"></div>
                            </ul>
                          </div>
                        </li>

                          <li class="bold"><a style="color:#212121; opacity:0.90" class="collapsible-header waves-effect waves-white {{ Request::is('maintenance/body-part-category') || Request::is('maintenance/body-part-form') || Request::is('maintenance/standard-size-category') || Request::is('maintenance/standard-size-detail')|| Request::is('maintenance/measurement-category') || Request::is('maintenance/measurement-detail') ? 'active' : '' }}"><b>Measurements & Body Forms</b></a>

                          <div class="collapsible-body">
                            <ul>  
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('maintenance/body-part-category')}}"><i style="font-size:15px" class="mdi-action-label-outline" style="color:#ccff90;"><font font-family: "Century Gothic">Body Part Category</font></i></a></li>
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('maintenance/body-part-form')}}"><i style="font-size:15px" class="mdi-action-label-outline" style="color:#ccff90;"><font font-family: "Century Gothic">Body Part Form</font></i></a></li>
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('maintenance/standard-size-category')}}"><i style="font-size:15px" class="mdi-action-label-outline" style="color:#ccff90;"><font font-family: "Century Gothic">Standard Size Category</font></i></a></li>
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('maintenance/standard-size-detail')}}"><i style="font-size:15px" class="mdi-action-label-outline" style="color:#ccff90;"><font font-family: "Century Gothic">Standard Size Detail</font></i></a></li>
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('maintenance/measurement-category')}}"><i style="font-size:15px" class="mdi-action-label-outline" style="color:#ccff90;"><font font-family "Century Gothic">Measurement Category</font></i></a></li>
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('maintenance/measurement-detail')}}"><i style="font-size:15px" class="mdi-action-label-outline" style="color:#ccff90;"><font font-family "Century Gothic">Measurement Detail</font></i></a></li>
                              <div class="divider"></div>
                            </ul>
                          </div>
                        </li>

                        <li class="bold"><a style="color:#212121; opacity:0.90" class="collapsible-header waves-effect waves-white {{ Request::is('maintenance/material-thread') || Request::is('maintenance/material-needle') || Request::is('maintenance/material-button') || Request::is('maintenance/material-zipper') || Request::is('maintenance/material-hookandeye') ? 'active' : '' }}"><b>Materials</b></a>
                          <div class="collapsible-body">
                            <ul>  
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('maintenance/material-thread')}}"><i style="font-size:15px" class="mdi-action-label-outline" style="color:#ccff90;"><font font-family: "Century Gothic">Threads</font></i></a></li>
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('maintenance/material-needle')}}"><i style="font-size:15px" class="mdi-action-label-outline" style="color:#ccff90;"><font font-family: "Century Gothic">Needles</font></i></a></li>
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('maintenance/material-button')}}"><i style="font-size:15px" class="mdi-action-label-outline" style="color:#ccff90;"><font font-family: "Century Gothic">Buttons</font></i></a></li>
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('maintenance/material-zipper')}}"><i style="font-size:15px" class="mdi-action-label-outline" style="color:#ccff90;"><font font-family: "Century Gothic">Zippers</font></i></a></li>
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('maintenance/material-hookandeye')}}"><i style="font-size:15px" class="mdi-action-label-outline" style="color:#ccff90;"><font font-family: "Century Gothic">Hook and Eyes</font></i></a></li>
                              <div class="divider"></div>
                            </ul>
                          </div>
                        </li>

                        <li class="bold"><a style="color:#212121; opacity:0.90" class="collapsible-header waves-effect waves-white {{  Request::is('maintenance/charges-category') || Request::is('maintenance/charges-detail') ? 'active' : '' }}"><b>Charges</b></a>
                          <div class="collapsible-body">
                            <ul>  
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('maintenance/charges-category')}}"><i style="font-size:15px" class="mdi-action-label-outline" style="color:#ccff90;"><font font-family: "Century Gothic">Charge Category</font></i></a></li>
                              <div class="divider"></div>
                             <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('maintenance/charges-detail')}}"><i style="font-size:15px" class="mdi-action-label-outline" style="color:#ccff90;"><font font-family: "Century Gothic">Charge Details</font></i></a></li>
                              <div class="divider"></div>
                            </ul>
                          </div>
                        </li>

                        <li class="bold"><a style="color:#212121; opacity:0.90" class="collapsible-header waves-effect waves-white {{ Request::is('maintenance/catalogue') ? 'active' : '' }}" href="{{URL::to('maintenance/catalogue')}}"><b>Catalogue</b></a></li>
                        <li class="bold"><a style="color:#212121; opacity:0.90" class="collapsible-header waves-effect waves-white {{ Request::is('maintenance/alteration') ? 'active' : '' }}" href="{{URL::to('maintenance/alteration')}}"><b>Alteration</b></a></li>
                         <li class="bold"><a style="color:#212121; opacity:0.90" class="collapsible-header waves-effect waves-white {{ Request::is('maintenance/sets') ? 'active' : '' }}" href="{{URL::to('maintenance/sets')}}"><b>Sets</b></a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </li>
    
              <!--<div class="divider"></div>-->
              <li class="bold"><a class="collapsible-header waves-effect waves-white {{ Request::is('transaction/*') ? 'active' : '' }}" style="color:#212121"><i style="font-size:30px" class="small mdi-editor-attach-money" style="color:#ccff90"></i><b>Transaction</b></a>
                <div class = "collapsible-body" position = "fixed" style = "display:block;">
                  <ul>
                    <li class = "no padding">
                       <ul class = "collapsible collapsible-accordion">
                        <li class="bold"><a style="color:#212121; opacity:0.90" class="collapsible-header waves-effect waves-white {{ Request::is('transaction/walkin-individual') || Request::is('transaction/walkin-company') ? 'active' : '' }}"><b>Walk In Order</b></a>
                          <div class="collapsible-body">
                            <ul>
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white " href="{{URL::to('transaction/walkin-individual')}}"><i style="font-size:15px" class="mdi-action-label-outline" style="color:#ccff90;"><font font-family: "Century Gothic">Individual</font></i></a></li>
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('transaction/walkin-company')}}"><i style="font-size:15px" class="mdi-action-label-outline" style="color:#ccff90;"><font font-family: "Century Gothic">Company</font></i></a></li>
                             <div class="divider"></div>
                            </ul>
                          </div>
                        </li>
                        <li class="bold"><a style="color:#212121; opacity:0.90" class="collapsible-header waves-effect waves-white {{ Request::is('transaction/online-customer-individual') || Request::is('transaction/online-customer-company') ? 'active' : '' }}"><b>Online Order</b></a>
                          <div class="collapsible-body">
                            <ul>
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white " href="{{URL::to('transaction/online-customer-individual')}}"><i style="font-size:15px" class="mdi-action-label-outline" style="color:#ccff90;"><font font-family: "Century Gothic">Individual</font></i></a></li>
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('transaction/online-customer-company')}}"><i style="font-size:15px" class="mdi-action-label-outline" style="color:#ccff90;"><font font-family: "Century Gothic">Company</font></i></a></li>
                             <div class="divider"></div>
                            </ul>
                          </div>
                        </li>
                        <li class="bold"><a style="color:#212121; opacity:0.90" class="collapsible-header waves-effect waves-white {{ Request::is('transaction/alteration-walkin-transaction') || Request::is('transaction/alteration-online-transaction') ? 'active' : '' }}"><b>Alteration</b></a>
                          <div class="collapsible-body">
                            <ul>
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white " href="{{URL::to('transaction/alteration-walkin-newcustomer')}}"><i style="font-size:15px" class="mdi-action-label-outline" style="color:#ccff90;"><font font-family: "Century Gothic">Walk In Alteration</font></i></a></li>
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('transaction/alteration-online-transaction')}}"><i style="font-size:15px" class="mdi-action-label-outline" style="color:#ccff90;"><font font-family: "Century Gothic">Online Alteration</font></i></a></li>
                             <div class="divider"></div>
                            </ul>
                          </div>
                        </li>
                        <li class="bold"><a style="color:#212121; opacity:0.90" class="collapsible-header waves-effect waves-white {{ Request::is('transaction/modifyIndividual') || Request::is('transaction/modifyCompany') ? 'active' : '' }}"><b>Modify Job Order</b></a>
                          <div class="collapsible-body">
                            <ul>
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white " href="{{URL::to('transaction/modifyIndividual')}}"><i style="font-size:15px" class="mdi-action-label-outline" style="color:#ccff90;"><font font-family: "Century Gothic">Individual Orders</font></i></a></li>
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('transaction/modifyCompany')}}"><i style="font-size:15px" class="mdi-action-label-outline" style="color:#ccff90;"><font font-family: "Century Gothic">Company Orders</font></i></a></li>
                             <div class="divider"></div>
                            </ul>
                          </div>
                        </li>
                        <li class="bold"><a style="color:#212121; opacity:0.90" class="collapsible-header waves-effect waves-white" href= "{{URL::to('transaction/orderProgress')}}"><b>Job Order Progress</b></a><li>
                        <!-- <li class="bold"><a style="color:#212121; opacity:0.90" class="collapsible-header waves-effect waves-white" href= "{{URL::to('transaction/materialPurchasing')}}"><b>Material Purchasing</b></a><li> -->
                        <li class="bold"><a style="color:#212121; opacity:0.90" class="collapsible-header waves-effect waves-white {{ Request::is('transaction/billing-payment') || Request::is('transaction/billing-collection') ? 'active' : '' }}"><b>Payment & Collection</b></a>
                            <div class="collapsible-body">
                                <ul>  
                                  <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('transaction/billing-payment')}}"><i style="font-size:15px" class="mdi-action-label-outline" style="color:#ccff90;"><font font-family: "Century Gothic">Payment</font></i></a></li>
                                  <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('transaction/billing-collection')}}"><i style="font-size:15px" class="mdi-action-label-outline" style="color:#ccff90;"><font font-family: "Century Gothic">Collection</font></i></a></li>
                                  <div class="divider"></div>
                                </ul>
                          </div>
                      </ul>
                    </li>
                  </ul>
                </div>

              </li>
              <!--<div class="divider"></div>-->
              <li class="bold"><a class="collapsible-header waves-effect waves-white {{ Request::is('queries/*') ? 'active' : '' }}" style="color:#212121"><i style="font-size:30px" class="small mdi-action-assessment" style="color:#ccff90"></i><b>Queries</b></a>
                   <div class="collapsible-body" position = "fixed" style = "display: block;">
                  <ul>
                    <li class="no-padding">
                      <ul class="collapsible collapsible-accordion">

                        <li class="bold"><a style="color:#212121; opacity:0.90" class="collapsible-header waves-effect waves-white" href= "{{URL::to('queries/list-of-online-customers')}}"><b>Online Customers</b></a></li>

                      </ul>
                    </li>
                  </ul>
                </div>
              </li>
              <!--<div class="divider"></div>-->
              <li class="bold"><a class="collapsible-header waves-effect waves-white" style="color:#212121"><i style="font-size:30px" class="small mdi-action-assignment" style="color:#ccff90"></i><b>Reports</b></a></li>
              <!--<div class="divider"></div>-->
              
              <li class="bold"><a class="collapsible-header waves-effect waves-white {{ Request::is('utilities/*') ? 'active' : '' }}" style="color:#212121"><i style="font-size:30px" class="small mdi-action-perm-contact-cal" style="color:#ccff90"></i><b>Utilities</b></a>
                
                <div class="collapsible-body" position = "fixed" style = "display: block;">
                  <ul>
                    <li class="no-padding">
                      <ul class="collapsible collapsible-accordion">

                        <li class="bold"><a style="color:#212121; opacity:0.90" class="collapsible-header waves-effect waves-white" href= "{{URL::to('utilities/inactive-data')}}"><b>Data Reactivation</b></a></li>

                      </ul>
                    </li>
                  </ul>
                </div>
              </li>
            
            </ul>
          </li>
        </ul>
      </nav>


      <main>
        @yield('content')
      </main>

      {!! Html::script('js/jquery-2.1.4.min.js'); !!}
      {!! Html::script('js/materialize.min.js'); !!}
      {!! Html::script('js/jquery.dataTables.min.js'); !!}
      {!! Html::script('js/angular.min.js'); !!}
      {!! Html::script('js/knockout-3.4.0.js'); !!}

      <script>
        $(document).ready(function(){
        $('.button-collapse').sideNav({
          menuWidth: 240, // Default is 240
          edge: 'right', // Choose the horizontal origin
          closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
        });
        $('.collapsible').collapsible();
            // Show sideNav
        $('.button-collapse').sideNav('show');
            // Hide sideNav
        $('.button-collapse').sideNav('hide');     

        $('ul.tabs').tabs();

        });

      $(document).ready(function(){
      // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
      $('.modal-trigger').leanModal({
          dismissible: false
        });
      });


      $(document).ready(function(){
        $('.collapsible').collapsible({
          accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
        });
      });
          
      </script>

        @yield('scripts')
    </body>

</html>