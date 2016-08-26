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
              <center><span style="font-size:40px; color: #757575; font-family:'Segoe UI',cursive;">CUSTOMER PROFILE</span></center>
            </div>

            <div class="col s4">
              <div class="divider grey" style="margin-bottom:5px;"></div>
              <div class="divider grey"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col s12" style="padding-left:2%; padding-right:2%; font-family:'Segoe UI',sans-serif;">
      <div class="col s3" style="padding:0; margin-top:10px;">
        <ul class="collapsible white">
          <li class="sidemenu"><div><a href="{{URL::to('/customerprofile-company')}}" class="collapsible-header"><font color="#424242">Information Details<i class="mdi-navigation-chevron-right right"></i></font></a></div></li>

          <li class="sidemenu"><div><a href="{{URL::to('/customerprofile-company-measurement-details')}}" class="collapsible-header"><font color="#424242">Measurement Details<i class="mdi-navigation-chevron-right right"></i></font></a></div></li>

          <li class="sidemenu"><div><a href="{{URL::to('/customerprofile-company-order-details')}}" class="collapsible-header"><font color="#424242">Order Details<i class="mdi-navigation-chevron-right right"></i></font></a></div></li>

          <li class="sidemenu"><div><a href="{{URL::to('/customerprofile-company-order-tracking')}}" class="collapsible-header"><font color="#424242">Order Tracking<i class="mdi-navigation-chevron-right right"></i></font></a></div></li>

          <li class="sidemenu"><div><a href="{{URL::to('/customerprofile-company-payment-history')}}" class="collapsible-header teal lighten-4"><font size="+1" color="teal">Payment History<i class="mdi-navigation-chevron-right right"></i></font></a></div></li>

          <div class="clear"></div>
        </ul>
      </div>

      <div class="col s9" style="font-family:'Segoe UI',serif; margin-top:17px; padding-top:0; padding-right:0; padding-left:17px;">
        <div class="white" style="padding:20px;">
          <div style="border:4px solid #b2dfdb; padding:20px;">
            <h3 style="color:#757575; font-family:'Segoe UI',cursive;">Payment History</h3>
            <div class="divider" style="margin-top:-10px; margin-bottom:20px;"></div>
            
          </div>
        </div>
      </div>
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