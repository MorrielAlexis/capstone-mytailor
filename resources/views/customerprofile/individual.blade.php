@extends('layouts.masterOnline')

@section('content')

  <div class="row">
    <section id="ind_cust_profile">

        <!--HEADER-->      
          <div class="col s12" style="padding-left:2%; padding-right:2%; padding-top:2%;">
            <div class="section white z-depth-3">
              <div class="row" style="margin-top:40px;">
                <div class="col s12">
                  <div class="col s4">
                    <div class="divider grey" style="margin-bottom:5px;"></div>
                    <div class="divider grey"></div>
                  </div>

                  <div class="col s4" style="margin-top:-30px;">
                    <center><span style="font-size:40px; color: #757575; font-family:'Lemonada',cursive;">CUSTOMER PROFILE</span></center>
                  </div>

                  <div class="col s4">
                    <div class="divider grey" style="margin-bottom:5px;"></div>
                    <div class="divider grey"></div>
                  </div>
                </div>
                    <p class="center container" style="width:80%; font-family:'Philosopher',sans-serif;">Welcome to your personal page at MyTailor. Here you can find and modify all your registered personal data such as addresses, previous orders, and measurement profiles to make sure your information are up to date.</p>
              </div>
            </div>
          </div>
        <!--END OF HEADER-->

        <!--CONTENT-->
          <div class="col s12" style="padding-left:2%; padding-right:2%;">
 
          <!--SIDE MENU-->
            <div class="col s3" style="padding:0; font-family:'Philosopher',sans-serif;">
              <ul class="collapsible white">
                <li class="sidemenu"><div><a href="{{URL::to('/customerprofile-individual')}}" class="collapsible-header teal lighten-4"><font size="+1" color="teal">Information Details<i class="mdi-navigation-chevron-right right"></i></font></a></div></li>

                <li class="sidemenu"><div><a href="{{URL::to('/customerprofile-individual-measurement-details')}}" class="collapsible-header"><font color="#424242">Measurement Details<i class="mdi-navigation-chevron-right right"></i></font></a></div></li>

                <li class="sidemenu"><div><a href="{{URL::to('/customerprofile-individual-order-details')}}" class="collapsible-header"><font color="#424242">Order Details<i class="mdi-navigation-chevron-right right"></i></font></a></div></li>

                <li class="sidemenu"><div><a href="{{URL::to('/customerprofile-individual-order-tracking')}}" class="collapsible-header"><font color="#424242">Order Tracking<i class="mdi-navigation-chevron-right right"></i></font></a></div></li>

                <li class="sidemenu"><div><a href="{{URL::to('/customerprofile-individual-payment-history')}}" class="collapsible-header"><font color="#424242">Payment History<i class="mdi-navigation-chevron-right right"></i></font></a></div></li>

                <div class="clear"></div>
              </ul>
            </div>
          <!--END OF SIDE MENU-->


          <!--CONTENT FOR SIDE-MENU: Information Details-->
            <div class="col s9" style="font-family:'Cormorant Infant',serif; margin-top:7px; padding-top:0; padding-right:0; padding-left:17px;">
              <div class="white" style="padding:20px;">
                <div style="border:4px solid #b2dfdb; padding:20px;">
                  <section id="head">
                  @if(Auth::check())
                    <h3 style="color:#757575; font-family:'Lobster Two',cursive;">Hi, {{ Auth::user()->name }} !</h3>
                  @endif
                    <div class="divider" style="margin-top:-10px; margin-bottom:20px;"></div>
                    <span>Below are the personal information you have provided us upon registration. Kindly update if there are any changes.</span>
                    <br>
                    <span>So far, your current registered details are:</span>
                  </section> 

                  <br>

                    <div class="row">
                      <section id="details">
                        <div class="col s12">
                          <div class="col s5">
                            <h5>Shipping Address</h5>
                            <h6>BlkLot Zamboanga Cor. Naga, Primavera Homes, Brgy. San Luis, Antipolo City</h6> 
                          </div>
                          <div class="col s3">
                            <h5>Contact Numbers</h5>
                            <h6>09365702049</h6>
                          </div>
                          <div class="col s4">
                            <h5>E-mail Address</h5>
                            <h6>casandradeasis@yahoo.com</h6>
                          </div>
                        </div>  
                      </section>    
                    </div>

                    <div style="margin:20px; margin-top:50px">
                      <a class="btn-flat teal lighten-1 modal-trigger white-text" href="#changedetails" style="font-family:'Yatra One',cursive;">Change Details</a>
                      <a class="btn-flat teal lighten-1 modal-trigger white-text" href="#changepassword" style="font-family:'Yatra One',cursive;">Change Password</a>
                    </div>      
                </div>
              </div>
            </div>
          <!--END OF CONTENT FOR SIDE-MENU: Information Details-->

          </div>
        <!--END OF CONTENT-->

    </section>
  </div>


    <!--MODAL FOR CHANGE DETAILS-->
      <div id="changedetails" class="modal modal-fixed-footer" style="width:700px;">
        <h5><center><b>Individual Customer</b></center></h5>
        <div class="divider" style="height:2px"></div>
        <div class="modal-content">
          <div class="input-field">
              <input placeholder="Cassandra" pattern="[A-Za-z ]+" id="addFName" name = "addFName" type="text" class="validate" required>
              <label for="first_name"> First Name: </label>
          </div>

          <div class="input-field">
              <input placeholder="De Asis" pattern="[A-Za-z\' ]+" id="addLName" name = "addLName" type="text" class="validate" required>
              <label for="last_name"> Last Name </label>
          </div>

          <div class="input-field">
              <input placeholder="BlkLot Zamboanga Cor. Naga Primavera Homes Brgy. San Luis, Antipolo City" id="addStreet" name = "addAddress" type="text" class="validate" required>
              <label for="Address"> Address: </label>
          </div>

          <div class="input-field">
              <input placeholder="cassandradeasis@yahoo.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" id="addEmail" name = "addEmail" type="text" class="validate">
              <label for="email"> Email Address: </label>
          </div>

          <div class="input-field">
              <input placeholder="09365702049" pattern="[^1-9][^0-8]+\d{9}" id="addCel" name = "addCel" type="text" class="validate" required>
              <label for="cellphone"> Cellphone Number: </label>
          </div>

          <div class="input-field">
              <input placeholder="2193856" pattern="[0-9]{7}" id="addPhone" name = "addPhone" type="text" class="validate">
              <label for="tel"> Telephone Number: </label>
          </div>
        </div>

        <div class="modal-footer">
          <a href="" class="modal-action modal-close waves-effect waves-green btn-flat ">Save</a>          
          <a href="" class="modal-action modal-close waves-effect waves-green btn-flat ">Cancel</a>
        </div>
      </div>
    <!--END OF MODAL FOR CHANGE DETAILS-->

  <!--Modal for CHANGE PASSWORD-->
    <div id="changepassword" class="modal modal-fixed-footer" style="height:400px; width:500px; margin-top:70px">
      <h5><center><b>Change Password</b></center></h5>
      <div class="divider" style="height:2px"></div>
      <div class="modal-content">
        <div class="row">
          <div class="input-field col s12">
                <input id="current" type="password" class="validate">
                  <label for="current">Current Password</label>
              </div>
              <div class="input-field col s12">
                <input id="new" type="password" class="validate">
                  <label for="new">New Password</label>
              </div>
              <div class="input-field col s12">
                <input id="retype" type="password" class="validate">
                  <label for="retype">Re-type Password</label>
              </div>
        </div>
      </div>
      <div class="modal-footer col s12">
              <a type="submit" class="waves-effect waves-green btn-flat" href=""><font color="black">Save</font></a>
              <a href="" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">Cancel</font></a>
          </div>
    </div>  
  <!--END OF MODAL FOR CHANGE PASSWORD-->

     <div class="col s12" style="margin:75px"></div>

@stop

@section('scripts')


    <script>
      $(document).ready(function(){
        $('.modal-trigger').leanModal();
      });
    </script>
    
    <script>
      $(document).ready(function() {
        Materialize.updateTextFields();
    });
    </script>

@stop