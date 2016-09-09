@extends('layouts.masterOnline')

@section('content')

    <div class="section white" style="margin:40px; padding:40px;"> 

    <div class="row" style="margin-top:40px;">
      <div class="col s12">
        <div class="col s4">
          <div class="divider grey" style="margin-bottom:5px;"></div>
          <div class="divider grey"></div>
        </div>

        <div class="col s4" style="margin-top:-30px;">
          <center><span style="font-size:40px; color: #757575;">LIST OF ORDERS</span></center>
        </div>

        <div class="col s4">
          <div class="divider grey" style="margin-bottom:5px;"></div>
          <div class="divider grey"></div>
        </div>
      </div>
    </div>

      <div class="col s6" style="margin-bottom:40px">
        
        <a style="color:black; margin-left:50px" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to remove order" href="#removeOrder"><i class="mdi-navigation-close"></i></a>
        

        <!--Modal for Remove Order-->
        <div id="removeOrder" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:150px">
            
          <h5><font color="red"><center><b>Warning!</b></center></font></h5>
            
              <div class="divider" style="height:2px"></div>
              <div class="modal-content col s12">
                <div class="col s3">
                  <i class="mdi-alert-warning" style="font-size:50px; color:red"></i>
                </div>
                <div class="col s9">
                  <p><font size="+1">Are you sure to remove this order from cart?</font></p>
                </div>
              </div>

              <div class="modal-footer col s12">
                  <button type="submit" class="waves-effect waves-green btn-flat" href="#!"><font color="black">Yes</font></button>
                  <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">No</font></a>
              </div>

        </div>
        <!--End of modal for remove order-->

          <div class="z-depth-2 card medium" style="margin-left:100px; margin-top:20px; height:350px; width:350px; border:3px gray solid">
              <input type="hidden" name="hidden-package-id" value="">
              <div class="card-image">
                  <img class="responsive-img" height = "80%" src="">
              </div>
              <div class="card-content">
                <p class="center-align">
                  <span class="card-title" style="color:black"><b></b></span>
                    <p class="center-align" style="color:teal">Package includes:</p>
                    <p class="center-align" style="color:gray"></p>
                </p>
              </div>
            <div style="margin-top:20px">   
              <center><button type="submit" class="center btn white-text" style="padding-left:10px; padding-right:10px; font-size:15px; color:white; background-color: red; opacity:0.90;"><a style="color:white;" href="{{URL::to('/customize-sets-customize-order')}}">Customize Orders</a></button></center>
            </div>
          </div>
    
                  
      </div>

      <div class="divider"></div>

      <div class="col s12" style="padding:30px">
          <a href="{{URL::to('/online-company-checkout-employee-details')}}" class="btn-flat white-text" style="color:white; background-color:#03a9f4;">Add EMPLOYEES</a>
        <div class="right">
          <a href="#!" class="btn-flat white-text" style="color:white; background-color:teal;">Add Another Set</a>
          <a href="{{URL::to('/online-company-checkout-info')}}" class="red btn-flat white-text" style="color:white; background-color:teal;">Proceed To Checkout</a>
        </div>
      </div>

      <div class="divider" style="margin-bottom:20px;"></div>      

</div>
@stop