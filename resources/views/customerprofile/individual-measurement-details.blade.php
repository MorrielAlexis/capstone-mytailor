@extends('layouts.masterOnline')

@section('content')

  <div class="row">
    <section id="ind_cust_profile">

    <!--HEADER-->
      <div class="col s12" style="padding-left:2%; padding-right:2%; padding-top:2%;">
        <div class="section">
          <div class="row" style="margin-top:40px;">

            <section id="ind_header">
            <div class="col s12">
              <div class="col s4">
                <div class="divider white" style="height:3px; margin-bottom:5px;"></div>
                <div class="divider white" style="height:3px;"></div>
              </div>

              <div class="col s4" style="margin-top:-30px;">
                <center><span><b>CUSTOMER PROFILE</b></span></center>
              </div>

              <div class="col s4">
                <div class="divider white" style="height:3px; margin-bottom:5px;"></div>
                <div class="divider white" style="height:3px;"></div>
              </div>
            </div>
              <p class="center container">Welcome to your personal page here at MyTailor.</p>
            </section>

          </div>
        </div>
      </div>
      <!--END OF HEADER-->

      <!--CONTENT-->
      <div class="col s12" style="padding-left:2%; padding-right:2%;">
        
      <!--SIDE MENU-->
        <div class="col s3" style="padding:0;">
          <ul class="collapsible white">
            <li class="sidemenu"><div><a href="{{URL::to('/customerprofile-individual')}}" class="collapsible-header"><font color="#424242">Information Details<i class="mdi-navigation-chevron-right right"></i></font></a></div></li>

            <li class="sidemenu"><div><a href="{{URL::to('/customerprofile-individual-measurement-details')}}" class="collapsible-header teal lighten-4"><font size="+1" color="teal">Measurement Details<i class="mdi-navigation-chevron-right right"></i></font></a></div></li>

            <li class="sidemenu"><div><a href="{{URL::to('/customerprofile-individual-order-details')}}" class="collapsible-header"><font color="#424242">Order Details<i class="mdi-navigation-chevron-right right"></i></font></a></div></li>

            <li class="sidemenu"><div><a href="{{URL::to('/customerprofile-individual-order-tracking')}}" class="collapsible-header"><font color="#424242">Order Tracking<i class="mdi-navigation-chevron-right right"></i></font></a></div></li>

            <li class="sidemenu"><div><a href="{{URL::to('/customerprofile-individual-payment-history')}}" class="collapsible-header"><font color="#424242">Payment History<i class="mdi-navigation-chevron-right right"></i></font></a></div></li>

            <div class="clear"></div>
          </ul>
        </div>
      <!--END OF SIDE MENU-->

      <!--CONTENT FOR SIDE-MENU: Measurement Details-->
        <div class="col s9" style="margin-top:7px; padding-top:0; padding-right:0; padding-left:17px;">
          <div class="white" style="padding:20px;">
            <div style="border:4px solid #b2dfdb; padding:20px;">
              <section id="head">
                <h3>Measurement Profile</h3>
                <div class="divider" style="margin-top:-10px; margin-bottom:20px;"></div>
                <span>Below are the following measurement profiles registered under your account. Kindly update if ever there are changes.</span>
                <br>
                <a href="/"><u>See how it's done</u></a>
              </section>

              <br>

              <div class="container" style="width:90%; margin:20px;">
                <table class="centered">
                  <thead style="color:teal">
                    <tr>
                      <th class="col s3">Profile Name</th>
                      <th class="col s3">Profile Type</th>
                      <th class="col s3">Last Modified Time</th>
                      <th class="col s3">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="col s3" style="margin-top:15px">Cassandra</td>
                      <td class="col s3" style="margin-top:15px"><a class="modal-trigger blue-text" href="#measurementprofile"><b>Women Shirt</b></a></td>
                      <td class="col s3" style="margin-top:15px">2016-07-11 18:04:19.0</td>
                      <td class="col s3" style="margin-top:8px">
                        <a class="btn-flat modal-trigger blue" href="#modalEdit"><i style="font-size:18px; color:white" class="mdi-editor-border-color"></i></a>
                        <a class="btn-flat modal-trigger red" href="#modalRemove"><i style="font-size:18px; color:white" class="mdi-content-clear"></i></a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              
              <br><br>
              <span style="margin:10px; color:#e57373">* changes do not affect running orders</span>

            </div>
          </div>
        </div>
      <!--END OF CONTENT FOR SIDE-MENU: Measurement Details-->

      </div>

    </section>
  </div>


    <!--Modal for EDIT-->
      <div id="modalEdit" class="modal modal-fixed-footer" style="width:700px;">
        <h5><center><b>Measurements</b></center></h5>
          <div class="divider" style="height:2px"></div>
          <div class="modal-content">

            <div class="input-field">
              <input pattern="[A-Za-z ]+" id="addProfile" name = "addProfile" type="text" class="validate" required>
              <label for="addProfile"> Profile Name: </label>
          </div>

          <div class="row">
            <div class="col s6">
              <div class="input-field">
                  <input id ="measurement" type="text" class="validate">
                  <label for="measurement">Hem</label>
              </div>
              <div class="input-field">
                  <input id ="measurement" type="text" class="validate">
                  <label for="measurement">Slim</label>
              </div>
              <div class="input-field">
                  <input id ="measurement" type="text" class="validate">
                  <label for="measurement">Sleeves</label>
              </div>
            </div>
            <div class="col s6">
              <div class="input-field">
                  <input id ="measurement" type="text" class="validate">
                  <label for="measurement">Hips</label>
              </div>
              <div class="input-field">
                  <input id ="measurement" type="text" class="validate">
                  <label for="measurement">Circumference</label>
              </div>
              <div class="input-field">
                  <input id ="measurement" type="text" class="validate">
                  <label for="measurement">Slit</label>
              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Save</a>
          <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
        </div>
      </div>
    <!--END OF MODAL for EDIT-->


    <!--Modal for REMOVE-->
      <div id="modalRemove" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:150px">
        <h5><center><b>Warning!</b></center></h5>
        <div class="divider" style="height:2px"></div>
        <div class="modal-content">
          <div class="row">
            <div class="col s3">
              <i class="mdi-alert-warning" style="font-size:50px;"></i>
            </div>
            <div class="col s9">
              <p><font size="+1">Are you sure you want to remove this profile?</font></p>
            </div>
          </div>
        </div>
        <div class="modal-footer col s12">
                <button type="submit" class="waves-effect waves-green btn-flat" href="#!"><font color="black">Yes</font></button>
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">No</font></a>
            </div>
      </div>  
    <!--END OF MODAL for REMOVE-->


    <!--Modal for MEASUREMENT PROFILE-->
      <div id="measurementprofile" class="modal modal-fixed-footer" style="width:700px;">
        <h5><center><b>Measurements</b></center></h5>
          <div class="divider" style="height:2px"></div>
          <div class="modal-content">

            <div class="input-field">
              <input placeholder="Wedding Gown" pattern="[A-Za-z ]+" id="addProfile" name = "addProfile" type="text" class="validate" required>
              <label for="addProfile"> Profile Name: </label>
          </div>

          <div class="row">
            <div class="col s6">
              <div class="input-field">
                  <input id ="measurement" type="text" class="validate">
                  <label for="measurement">Hem</label>
              </div>
              <div class="input-field">
                  <input id ="measurement" type="text" class="validate">
                  <label for="measurement">Slim</label>
              </div>
              <div class="input-field">
                  <input id ="measurement" type="text" class="validate">
                  <label for="measurement">Sleeves</label>
              </div>
            </div>
            <div class="col s6">
              <div class="input-field">
                  <input id ="measurement" type="text" class="validate">
                  <label for="measurement">Hips</label>
              </div>
              <div class="input-field">
                  <input id ="measurement" type="text" class="validate">
                  <label for="measurement">Circumference</label>
              </div>
              <div class="input-field">
                  <input id ="measurement" type="text" class="validate">
                  <label for="measurement">Slit</label>
              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Save</a>
          <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
        </div>
      </div>
    <!--END OF MODAL for Measurement Profile-->

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