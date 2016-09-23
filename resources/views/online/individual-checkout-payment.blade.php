@extends('layouts.masterOnline')

@section('content')

    <div class="container" style="width:100%;">
      <div class="row" style="margin:40px;">
        <ul class="col s12 breadcrumb">
          <li><a style="padding-left:100px; padding-top:20px; padding-bottom:20px; padding-right:20px;"><b>Select Fabric</b></a></li>
          <li><a style="padding-left:140px; padding-top:20px; padding-bottom:20px; padding-right:20px;"><b>Choose Style</b></a></li>
          <li><a style="padding-left:140px; padding-top:20px; padding-bottom:20px; padding-right:20px;"><b>Measurement</b></a></li>
          <li><a class="active" style="padding-left:140px; padding-top:20px; padding-bottom:20px; padding-right:20px;"><b>Step 4: Check Out</b></a></li>
        </ul>
      </div>
    </div>
  
  <div class="container">
    <div style="padding:20px; margin-bottom:20px;"> 

      <!-- Tab for Payment-->
      <div id="payment-info" class = "hue col s12 active" style="background-color: white; ">
          <div class="row" style="background-color:white; padding:40px">
        
            <div class="col s12 m12 l12">
              <span class="page-title" style="margin:15px"><center><h5><b>Payment Information</b></h5></center></span>
              <div class="divider" style="height:1px; background-color:#80d8ff"></div>
              <div class="divider" style="height:1px; background-color:#80d8ff"></div>
            </div>        

              <div class="col s12"> 

                <div class="col s12" style="margin-bottom:20px">
                  <div class="col s6">
                    <div class="col s6" style="color:gray;padding-left:50px;padding-top:15px"><p>Transaction No.:</p></div>
                    <div class="col s6" style="color:red;"><p><input value="{{$joID}}" id="transac_no" name="transac_no" type="text" class="" readonly></p></div>
                  </div>

                  <div class="col s6">              
                    <div class="col s12">
                      <div class="col s4" style="color:gray"><p>Date:</p></div>
                      <div class="col s8" id="Date" style="padding:15px; color:teal;"></div>
                    </div>
                    <div class="col s12">
                      <div class="col s4" style="color:gray"><p>Time:</p></div>
                      <div class="col s8" id="clock" style="padding:15px; color:teal;"></div>
                    </div>
                  </div>

                </div>
                
                <label style="font-size:23px; color:teal;"><center><b>ORDER SUMMARY</b></center></label>
                
                <div class="col s12 overflow-x" style="min-height:300px; max-height:550px; border: 3px gray solid; padding:10px">
                  <div class="col s12">                       
                    <div class="col s12" style="margin-bottom:30px"></div>
                    <table class="table centered" border="1">
                      <thead style="border:1px teal solid; background-color:rgba(54, 162, 235, 0.5)">
                        <tr style="border:1px teal solid">
                          <th style="border:1px teal solid">Quantity</th>
                          <th colspan="3" style="border:1px teal solid">Description</th>
                          <th style="border:1px teal solid; border-bottom:none">Unit Price</th>
                          <th style="border:1px teal solid">Total Price</th>
                        </tr>
                        <tr style="border:1px teal solid">
                          <th style="border:1px teal solid; border-top:none"></th>
                          <th style="border:1px teal solid" colspan="2">Item Name</th>
                          <th style="border:1px teal solid">Price</th>
                          <th style="border:1px teal solid"></th>
                          <th style="border:1px teal solid"></th>
                        </tr>
                      </thead>
                      <tbody style="border:1px teal solid">
                      
                        <tr style="border:1px teal solid">
                          <td style="border:1px teal solid; background-color:rgba(52, 162, 232, 0.2)">{{$mqty}}<b></b></td>
                          <td style="border:1px teal solid; padding-left:5%; padding-right:5%; background-color:rgba(52, 162, 232, 0.2)"><b>{{$mname}}</b></td>
                          <td style="padding-left:2%; padding-right:2%; background-color:rgba(52, 162, 232, 0.2)"></td>
                          <td style="border:1px teal solid; background-color:rgba(52, 162, 232, 0.2)"><b>PHP {{number_format($mprice, 2)}}</b></td>
                          <td style="border:1px teal solid; background-color:rgba(52, 162, 232, 0.2)"><b>PHP {{number_format($mlinetotal, 2)}}</b></td>
                          <td style="border:1px teal solid; background-color:rgba(52, 162, 232, 0.2)"><b></b>PHP {{number_format($mtotal, 2)}}</td>
                        </tr>
                        <tr style="border:1px teal solid">
                          <td style="border:1px teal solid"></td>
                          <td style="border:none; color:teal; padding-left:10%">Fabric Name</td>
                          <td style="padding-left:4%; padding-right:4%; border:1px teal solid">{{$mfname}}</td>
                          <td style="border:1px teal solid">PHP {{number_format($mfprice, 2)}}</td>
                          <td style="border:1px teal solid"></td>
                          <td style="border:1px teal solid"></td>
                        </tr>

                        @foreach($styles as $style)
                          <tr style="border:1px teal solid">
                            <td style="border:1px teal solid"></td>
                            <td class="right" style="border:none; color:teal; padding-right:10%">Style Name and Pattern</td>
                            <td style="border:1px teal solid"> <br> <font color="gray"><b><i>{{$style->strSegStyleName}} {{$style->strSegPName}}</i></b></font></td>
                            <td style="border:1px teal solid">PHP {{number_format ($style->dblPatternPrice , 2)}}</td>
                            <td style="border:1px teal solid"></td>
                            <td style="border:1px teal solid"></td>  
                          </tr>
                        @endforeach
                    
                      </tbody>
                    </table>         
                  </div>
                  <div class="col s12" style="margin-bottom:38px"></div>
                </div>

                <div class="col s6">
                  {!! Form::open(['url' => 'save-order', 'method' => 'POST']) !!}
                    <h5 style="color:teal"><b>Price Quotation*</b></h5>
                    <span>Determine terms of payment to get payment details</span>

                    <div class="col s12 z-depth-2" style=" padding:2%; margin-top:2%">
                      
                      <div class="col s12">
                        <div class="col s4" style="color:gray; font-size:15px"><p><b>Total Amount Due</b></p></div>
                            <div class="col s8" style="color:black;"><p><input id="total_due" value = "PHP {{number_format($grand, 2)}}"name="total_due" type="text" class="" readonly /></p></div>
                      </div>

                      <div class="col s12">
                        <div class="col s4" style="color:grey; font-size:10px"><p><b>Labor Fee Inclusive</b>
                          <b style="color:gray; font-size:15px">Estimated Total Sales</b></p>
                        </div>
                            <div class="col s8" style="color:black;"><p><input id="estimated_total"  value = "PHP {{number_format($estimated, 2)}}" name="estimated_total" type="text" class="" readonly /></p></div>
                      </div>

                      <div class="col s12">
                        <div class="col s4" style="color:gray; font-size:15px"><p><b>VAT (12%)</b></p></div>
                            <div class="col s8" style="color:black;"><p><input id="vat_total" value = "PHP {{number_format($vat_total, 2)}}" name="vat_total" type="text" class="" readonly /></p></div>
                      </div>

                      
                      <div class="col s4" style="color:gray; font-size:15px"><p><b>Terms of Payment</b></p></div>
                      <div class="col s8" style="padding:18px; padding-top:30px">
                        <div class="col s6">
                            <input name="termsOfPayment" value="Half Payment" type="radio" class="filled-in payment" id="half_pay"/>
                            <label for="half_pay">Half (50%)</label>
                        </div>
                        <div class="col s6">
                          <input name="termsOfPayment" value="Full Payment" type="radio" class="filled-in payment" id="full_pay" />
                          <label for="full_pay">Full (100%)</label>
                        </div>
                      </div>


                    </div>

                    <div class="col s12"><div class="divider" style="margin:15px; height:5px"></div></div>   
                    <!--start of bottom button-->
                    <div class="col s12" style="margin-top:20px">
                      <button type="submit" class="right btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to save data" style="margin-left:40px; background-color:#00695c; color:white"><b><i class="mdi-navigation-check" style="padding-right:10px"></i>Save Order</b></button> 
                    </div>  
                      <!--end of bottom button-->

                  </div>
                {!! Form::close() !!} 
               
              </div>


            <div class="divider" style="height:2px; margin-bottom:20px; margin-top:30px"></div>
          
  
          </div>

      </div>
    </div>
  </div>

@stop

@section('scripts')

    <script type="text/javascript">
        var monthNames = [ "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December" ];
        var dayNames= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]

        var newDate = new Date();
        newDate.setDate(newDate.getDate());    
        $('#Date').html(dayNames[newDate.getDay()] +" | " +" " + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + "," + ' ' + newDate.getFullYear());
    
    </script>

    <script type="text/javascript">
        function updateClock ( )
            {
            var currentTime = new Date ( );
            var currentHours = currentTime.getHours ( );
            var currentMinutes = currentTime.getMinutes ( );
            var currentSeconds = currentTime.getSeconds ( );

            // Pad the minutes and seconds with leading zeros, if required
            currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
            currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;

            // Choose either "AM" or "PM" as appropriate
            var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";

            // Convert the hours component to 12-hour format if needed
            currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;

            // Convert an hours component of "0" to "12"
            currentHours = ( currentHours == 0 ) ? 12 : currentHours;

            // Compose the string for display
            var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;
            
            
            $("#clock").html(currentTimeString);
                
         }

        $(document).ready(function()
        {
           setInterval('updateClock()', 1000);
        });
    </script>

@stop 