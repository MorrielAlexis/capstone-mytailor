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
        </div>
      </div>
    </div>

    <div class="col s12" style="padding-left:2%; padding-right:2%;">
      <div class="col s3" style="padding:0; margin-top:10px;">
        <ul class="collapsible white">
          <li class="sidemenu"><div><a href="{{URL::to('/customerprofile-individual')}}" class="collapsible-header"><font color="#424242">Information Details<i class="mdi-navigation-chevron-right right"></i></font></a></div></li>

          <li class="sidemenu"><div><a href="{{URL::to('/customerprofile-individual-measurement-details')}}" class="collapsible-header teal lighten-4"><font size="+1" color="teal">Measurement Details<i class="mdi-navigation-chevron-right right"></i></font></a></div></li>

          <li class="sidemenu"><div><a href="{{URL::to('/customerprofile-individual-order-details')}}" class="collapsible-header"><font color="#424242">Order Details<i class="mdi-navigation-chevron-right right"></i></font></a></div></li>

          <li class="sidemenu"><div><a href="{{URL::to('/customerprofile-individual-order-tracking')}}" class="collapsible-header"><font color="#424242">Order Tracking<i class="mdi-navigation-chevron-right right"></i></font></a></div></li>

          <li class="sidemenu"><div><a href="{{URL::to('/customerprofile-individual-payment-history')}}" class="collapsible-header"><font color="#424242">Payment History<i class="mdi-navigation-chevron-right right"></i></font></a></div></li>

          <div class="clear"></div>
        </ul>
      </div>

      <div class="col s9" style="margin-top:17px; padding-top:0; padding-right:0; padding-left:17px;">
        <div class="white" style="padding:20px;">
          <div style="border:4px solid #b2dfdb; padding:20px;">
            <h5 style="color:#757575; margin-left:15px;">Measurement Profiles</h5>
            <div class="divider" style="margin-top:-10px; margin-bottom:20px;"></div>
            <span style="margin:20px;">Here are the following current profiles filed for you:</span>
            
            <div class="container" style="width:90%; margin:20px;">
              <table class="centered">
                <thead>
                  <tr>
                    <th class="col s3">Transaction No.</th>
                    <th class="col s3">Name of Profile</th>
                    <th class="col s3">Last Changed</th>
                    <th class="col s3"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="col s3">#2316548</td>
                    <td class="col s3"><a class="btn-flat modal-trigger blue-text" href="#measurementprofile">Wedding Gown</a></td>
                    <td class="col s3">today at 07:15</td>
                    <td class="col s3">
                      <a class="btn-flat modal-trigger green" href="#modalEdit"><i style="font-size:15px;" class="mdi-editor-border-color"></i></a>
                      <a class="btn-flat modal-trigger red" href="#modalRemove"><i style="font-size:15px;" class="mdi-content-clear"></i></a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

            <span style="margin:10px;">* changes do not affect running orders</span>

          </div>
        </div>
      </div>
    </div>

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

  <!--MEASUREMENT PROFILE-->
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