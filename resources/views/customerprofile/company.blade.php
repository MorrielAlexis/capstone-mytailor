@extends('layouts.masterOnline')

@section('content')

  <div class="row">

    <div class="col s12" style="padding-left:2%; padding-right:2%; padding-top:2%;">
      <div class="section white z-depth-3">
        <div class="row" style="margin-top:40px;">
          <div class="col s12">
            <div class="col s4">
              <div class="divider grey" style="margin-bottom:5px;"></div>
              <div class="divider grey"></div>
            </div>

            <div class="col s4" style="margin-top:-30px;">
              <center><span style="font-size:40px; color: #757575; font-family:'Playfair Display','Times';">CUSTOMER PROFILE</span></center>
            </div>

            <div class="col s4">
              <div class="divider grey" style="margin-bottom:5px;"></div>
              <div class="divider grey"></div>
            </div>
          </div>
              <p class="center container" style="width:80%;">Welcome to your personal page at MyTailor. Here you can find and modify all your registered personal data such as addresses, previous orders, and measurement profiles to make sure your information are up to date.</p>
        </div>
      </div>
    </div>

    <div class="col s12" style="padding-left:2%; padding-right:2%;">
      <div class="col s3" style="padding:0; margin-top:10px;">
        <ul class="collapsible white">
          <li class="sidemenu"><div><a href="{{URL::to('/customerprofile-company')}}" class="collapsible-header teal lighten-4"><font size="+1" color="teal">Information Details<i class="mdi-navigation-chevron-right right"></i></font></a></div></li>

          <li class="sidemenu"><div><a href="{{URL::to('/customerprofile-company-measurement-details')}}" class="collapsible-header"><font color="#424242">Measurement Details<i class="mdi-navigation-chevron-right right"></i></font></a></div></li>

          <li class="sidemenu"><div><a href="{{URL::to('/customerprofile-company-order-details')}}" class="collapsible-header"><font color="#424242">Order Details<i class="mdi-navigation-chevron-right right"></i></font></a></div></li>

          <li class="sidemenu"><div><a href="{{URL::to('/customerprofile-company-order-tracking')}}" class="collapsible-header"><font color="#424242">Order Tracking<i class="mdi-navigation-chevron-right right"></i></font></a></div></li>

          <li class="sidemenu"><div><a href="{{URL::to('/customerprofile-company-payment-history')}}" class="collapsible-header"><font color="#424242">Payment History<i class="mdi-navigation-chevron-right right"></i></font></a></div></li>

          <div class="clear"></div>
        </ul>
      </div>

      <div class="col s9" style="margin-top:17px; padding-top:0; padding-right:0; padding-left:17px;">
        <div class="white" style="padding:20px;">
          <div style="border:4px solid #b2dfdb; padding:20px;">
            <h5 style="color:#757575; margin-left:15px;">Company Details</h5>
            <div class="divider" style="margin-top:-10px; margin-bottom:20px;"></div>
            
            <div class="row">
              <div class="col s12">
                <div class="col s6">
                  <div class="col s4">
                    <h6 style="color: #757575; font-family:'Playfair Display','Times';"><b>Company Name</b></h6>
                    <h6 style="color: #757575; font-family:'Playfair Display','Times';"><b>Contact Person</b></h6>
                    <h6 style="color: #757575; font-family:'Playfair Display','Times';"><b>E-mail Address</b></h6>
                    <h6 style="color: #757575; font-family:'Playfair Display','Times';"><b>Fax Number</b></h6>
                  </div>
                  <div class="col s8">
                    <h6>Watanabe Corp.</h6>
                    <h6>Takashi Watanabe</h6>
                    <h6>kahitanonalang@yahoo.com</h6>
                    <h6>123-4567-8910</h6>
                  </div>
                </div>
                <div class="col s6">
                  <div class="col s6">
                    <h6 style="margin-bottom:10px; color: #757575; font-family:'Playfair Display','Times';"><b>Contact Numbers</b></h6>
                    <h6>09156359462</h6>
                    <h6>6961252</h6>
                  </div>
                  <div class="col s6">
                    <h6 style="margin-bottom:10px; color: #757575; font-family:'Playfair Display','Times';"><b>Shipping Address</b></h6>
                    <h6>#042 Evangelista st.</h6>
                    <h6>Santolan</h6>
                    <h6>Pasig City</h6>
                  </div>
                </div>
              </div>
            </div>

            <div style="margin:10px;">
              <a class="btn-flat teal lighten-4 modal-trigger" href="#changedetails">Change Details</a>
              <a class="btn-flat teal lighten-4 modal-trigger" href="#changepassword">Change Password</a>
            </div>
        </div>
      </div>
    </div>

</div>


  <!--Modal for CHANGE DETAILS-->
  <div id="changedetails" class="modal modal-fixed-footer">
    <h5><center><b>Company Customer</b></center></h5>
    <div class="divider" style="height:2px"></div>
    <div class="modal-content">


      <div class="input-field">
        <input placeholder="Watanabe Corp." required pattern="[A-Za-z\'., ]+" id="addComName" name = "addComName" type="text" class="validate">
        <label for="company_name"> Company Name: </label>
      </div>

      <div class="input-field">
        <input placeholder="#042 Evangelista St. Santolan, Pasig City" required="" id="addAddress" name = "addAddress" type="text" class="validate">
        <label for="address"> Address: </label>
      </div>

      <div class="input-field">
        <input placeholder="Takashi Watanabe" required pattern="[A-Za-z\' ]+" id="addConPerson" name = "addConPerson" type="text" class="validate">
        <label for="company_name"> Contact Person: </label>
      </div>

      <div class="input-field">
        <input placeholder="kahitanonalang@yahoo.com" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" id="addComEmailAdd" name = "addComEmailAddress" type="text" class="validate">
        <label for="com_email_address"> Company Email Address: </label>
      </div>

      <div class="input-field">
        <input placeholder="09156359462" required pattern="[^1-9][^0-8]+\d{9}" id="addCel" name = "addCel" type="text" class="validate">
        <label for="cellphone"> Cellphone Number: </label>
      </div>

      <div class="input-field">
        <input placeholder="6961252" pattern="[0-9]{7}" id="addPhone" name = "addPhone" type="text" class="validate">
        <label for="tel"> Telephone Number: </label>
      </div>

      <div class="input-field">
        <input placeholder="123-4567-8910" pattern="[0-9]{7}" id="addFax" name = "addFax" type="text" class="validate">
        <label for="fax"> Fax Number: </label>
      </div>

    </div>

    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Save</a>          
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Cancel</a>
    </div>
  </div>

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
      <a type="submit" class="waves-effect waves-green btn-flat" href="#!"><font color="black">Save</font></a>
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">Cancel</font></a>
    </div>
  </div>  

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