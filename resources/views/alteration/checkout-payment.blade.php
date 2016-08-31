@extends('layouts.master')

@section('content')

	<div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><center><h3><b>Welcome to <font color="white">MyTailor</font></b></h3></center></span>
        <center><h5>Walk-in Alteration - Payout</h5></center>
      </div>
    </div>

	<div class="row white" style="margin:40px;">
      <div style="padding:30px">

    <ul class="col s12 breadcrumb">
			<li><a style="padding-left:200px"><b>FILL-UP FORM</b></a></li>
			<li><a class="active" style="padding-left:200px"><b>PAYMENT</b></a></li>
		</ul>

          <div class="row">
            <div class="col s12 m12 l12">
              <span class="page-title" style="margin:15px"><center><h5><b>Payment Information</b></h5></center></span>
              <div class="divider" style="height:1px; background-color:#80d8ff"></div>
              <div class="divider" style="height:1px; background-color:#80d8ff"></div>
            </div>
          </div>

          <div class="row" style="background-color:white;">
            <div>
              <div class="col s12"> 

              {!! Form::open(['url' => 'transaction/alteration-walkin-newcustomer-save-transaction', 'method' => 'POST']) !!}
                <div class="col s12" style="margin-bottom:20px">
                  <div class="col s3" style="color:gray;padding-left:50px;padding-top:15px"><p>Transaction No.:</p></div>
                  <div class="col s3" style="color:red;"><p><input value="{{ $alte_id }}" id="alteID" name="alteID" type="text" class="" readonly></p></div>
                        
                  <div style="color:gray; padding-left:140px;" class="input-field col s6">                 
                      <div class="col s4" style="color:gray"><p>Date:</div>
                      <div class="col s8" id="Date" style="padding:15px; color:teal;"></div>
                  </div>
                </div>

                <label style="font-size:15px; color:black"><center>Order Summary</center></label>
                <table class = "table centered order-summary" border = "1">
                    <thead>
                      <tr>
                        <th>Segment</th>
                        <th>Alteration Type</th>
                        <th>Unit Price</th>
                      </tr>
                    </thead>
                    <tbody>
                      @for($i = 0; $i < count($alterations); $i++)
                      <tr>
                        <td>{!! $alterations[$i][2] !!}</td>
                        <td>{!! $alterations[$i][3] !!}</td>
                        <td>PHP {!! number_format($alterations[$i][5], 2) !!}</td>
                       </tr>
                       @endfor
                    </tbody>
                </table>

                <div class="divider" style="margin-bottom:30px"></div>
                <div>
                  <div class="col s4" style="color:teal; font-size:15px"><p><b>Total Amount:</b></p></div>
                  <div class="col s8" style="color:red;"><p><input id="total-price" name="total-price" type="text" class="" readonly></p></div>

                  <div class="left col s12" id="mode-of-payment" style="margin-bottom:20px">
                    <div class="col s6">
                      <input name="modePayment" type="radio" class="filled-in payment" id="half_pay" />
                      <label for="half_pay">Half-payment</label>
                    </div>
                    <div class="col s6">
                      <input name="modePayment" type="radio" class="filled-in payment" id="full_pay" />
                      <label for="full_pay">Full-payment</label>
                    </div>
                  </div>

                  <div class="col s4" style="color:gray; font-size:15px"><p><b>Amount Payable</b></p></div>
                  <div class="col s8" style="color:red;"><p><input value="" id="amount-payable" name="amount-payable" type="text" class="" readonly></p></div>

                  <div class="col s4" style="color:gray; font-size:15px"><p><b>Remaining Balance</b></p></div>
                  <div class="col s8" style="color:red;"><p><input value="" id="balance" name="balance" type="text" class="" readonly></p></div>  
                </div>

                <span class="col s12" style="color:teal; margin-top:20px"><b>Delivery Details</b></span>
                <div class="col s12" style="padding:15px">

                  <div class="row" style="padding:20px;">
                    <center><h5 style="color:#e53935">Estimated Delivery</h5></center>
                    <p class = "input-field container">
                      <input class="center" readonly placeholder="days / weeks" name="deliveryDate" id = "deliveryDate" type = "text" class="validate">
                    </p>
                    <!--
                    <p class="center">
                      <input type="checkbox" id="delivernot" />
                      <label for="delivernot"><b><font size="+1" style="color:black">Pick-up order at MyTailor shop</font></b></label>
                    </p>              

                    <p>
                      <input type="checkbox" id="employee" />
                      <label for="employee">If this order is under a transaction from a company please indicate the name and address below before proceeding.</label>
                    </p>

                    <div class="col s12">
                      <div class="input-field col s6">
                        <input disabled id ="companyname" type="text" class="validate">
                        <label for="companyname">Company Name</label>
                      </div>
                      <div class="input-field col s6">
                        <input disabled id ="companyadd" type="text" class="validate">
                        <label for="companyadd">Company Address</label>
                      </div>
                    </div>-->
                  </div>
                </div>
                    
              </div>
            </div>
          </div>

            <div class="row">
              <div class="col s12">

                <div class="row" style="margin-top:70px;">
                  
                  <div class="col s12">
                    <div class="col s4">
                      <div class="divider grey"></div>
                    </div>

                    <div class="col s4" style="margin-top:-30px;">
                      <center><span style="font-size:35px; color: #e53935; font-family:'Playfair Display','Times';">Total amount to pay</span></center>
                    </div>

                    <div class="col s4">
                      <div class="divider grey"></div>
                    </div>
                  </div>
                </div>

                <div class="container">
                  <div class="container" style="font-family:'Playfair Display','Times';"><center><h3><b>PHP {{ number_format($total_price, 2) }}</b></h3></center></div>
                </div>
                  <div>
                    <button type="submit" class="right btn tooltipped" data-position="top" data-delay="50" data-tooltip="Click to save payment information and get measured" style="background-color:teal; margin-right:20px; padding:9.5px; padding-bottom:45px; margin-top:20px;"><label style="font-size:15px; color:white">Save Transaction</label></button>
                    <a href="#cancel-order" class="left btn modal-trigger tooltipped" data-position="top" data-delay="50" data-tooltip="Click to cancel current unsaved transaction and be transfered back to the shop" style="background-color:teal; margin-left:20px; padding:9.5px; padding-bottom:45px; margin-top:20px;"><label style="font-size:15px; color:white">Cancel Transaction</label></a>
                  </div>
              </div>
            </div> 
          {!! Form::close() !!}
    </div>
  </div>

    <!--CANCEL ORDER-->
    <div id="cancel-order" class="modal modal-fixed-footer row" style="height:250px; width:500px; margin-top:80px">
      <h5><font color="red"><center><b>Warning!</b></center></font></h5>
      <div class="divider" style="height:2px"></div>
      
      <div class="modal-content col s12">
        <div class="center col s4"><i class="mdi-alert-warning" style="color:red; font-size:60px"></i></div>
        <div class="col s8"><p style="font-size:18px">Are you sure? Doing this will delete current transaction.</p></div>
      </div>

      <div class="modal-footer col s12">
        <a class="waves-effect waves-green btn-flat" href="{{URL::to('transaction/alteration-walkin-newcustomer')}}"><font color="black">Yes</font></a>
        <a href="{{URL::to('/alteration-checkout-payment')}}" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">No</font></a>
      </div>
    </div>

@stop

@section('scripts')

  <script>
    $(document).ready(function(){
        var totalAmount = {!! json_encode($total_price) !!};
        var totalDays = {!! json_encode($total_days) !!};

        $('#total-price').val(totalAmount.toFixed(2));
        $('#deliveryDate').val(totalDays + ' days');
    });

  </script> 

  <script type="text/javascript">
    var monthNames = [ "January", "February", "March", "April", "May", "June",
      "July", "August", "September", "October", "November", "December" ];
    var dayNames= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]

    var newDate = new Date();
 
    $('#Date').html(dayNames[newDate.getDay()] +" | " +" " + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + "," + ' ' + newDate.getFullYear());
    $('#transaction_date').val(newDate.getFullYear() + "-" +  (newDate.getMonth()+1) + "-" + newDate.getDate());
  </script>

  <script>
      $('.payment').change(function(){
        if($('#half_pay').prop("checked")){

          var totalAmount = {!! json_encode($total_price) !!};
          
          $('#amount-payable').val((totalAmount/2).toFixed(2) + ' PHP');
          $('#balance').val((totalAmount - (totalAmount/2)).toFixed(2) + 'PHP');
        }

        if($('#full_pay').prop("checked")){

          var totalAmount = {!! json_encode($total_price) !!};
          
          $('#amount-payable').val(totalAmount.toFixed(2) + ' PHP');
          $('#balance').val((totalAmount - totalAmount).toFixed(2) + 'PHP');
        }
    });
  </script>
@stop