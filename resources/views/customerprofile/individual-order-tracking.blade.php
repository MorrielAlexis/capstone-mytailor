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

          <li class="sidemenu"><div><a href="{{URL::to('/customerprofile-individual-measurement-details')}}" class="collapsible-header"><font color="#424242">Measurement Details<i class="mdi-navigation-chevron-right right"></i></font></a></div></li>

          <li class="sidemenu"><div><a href="{{URL::to('/customerprofile-individual-order-details')}}" class="collapsible-header"><font color="#424242">Order Details<i class="mdi-navigation-chevron-right right"></i></font></a></div></li>

          <li class="sidemenu"><div><a href="{{URL::to('/customerprofile-individual-order-tracking')}}" class="collapsible-header teal lighten-4"><font size="+1" color="teal">Order Tracking<i class="mdi-navigation-chevron-right right"></i></font></a></div></li>

          <li class="sidemenu"><div><a href="{{URL::to('/customerprofile-individual-payment-history')}}" class="collapsible-header"><font color="#424242">Payment History<i class="mdi-navigation-chevron-right right"></i></font></a></div></li>

          <div class="clear"></div>
        </ul>
      </div>

      <div class="col s9" style="margin-top:17px; padding-top:0; padding-right:0; padding-left:17px;">
        <div class="white" style="padding:20px;">
          <div style="border:4px solid #b2dfdb; padding:20px;">
            <h5 style="color:#757575; margin-left:15px;">Order Tracking</h5>
            <div class="divider" style="margin-top:-10px; margin-bottom:20px;"></div>
              {!! Form::open() !!}
              <div class="row">
                <div class="col s12">
                  <div class="col s12">
                    <div class="col offset-s8">
                      <div class = "input-field col s6">
                        <label class="center"><font color="teal">Tracking code</font></label>
                        <input class="center" id = "trackno" value = "JOB001" name = "trackno" type = "text">
                      </div>
                      <div class = "col s6">
                        <button  type = "submit" class="teal waves-effect waves-light btn-flat white-text" style="margin-top:10px;" href="#!">Track</button>
                      </div>
                    </div>
                  </div>
                  <div class="col s12" style="padding:20px;">
                    <div class = "container">
                      <h6 class="center" style="margin-bottom:20px;"><font size = "+2" color = "black">Job Order: JOB001</font></h6>
                      <div class="divider"></div>

                      <label><center><font size = "+1">Progress:</font></center> </label>

                      <div id="progress">
                        <span id="percent">60%</span>
                        <div id="bar"></div>
                          <label><center><font size ="+2">30 out of 50 garments is done</font></center></label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>

</div>

@stop