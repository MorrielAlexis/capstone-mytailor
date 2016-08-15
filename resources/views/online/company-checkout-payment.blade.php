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

      <div id="payment-info" class = "hue col s12 active" style="background-color: white;">
          <div class="row">
            <div class="col s12 m12 l12">
                  <span class="page-title" style="margin:15px"><center><h5><b>Payment Information</b></h5></center></span>
                  <div class="divider" style="height:1px; background-color:#80d8ff"></div>
                  <div class="divider" style="height:1px; background-color:#80d8ff"></div>
                </div>
          </div>

      <div class="row">
        <div class="col offset-s10">
          <a class="btn-floating tooltipped btn-large green" data-position="bottom" data-delay="50"  data-tooltip="CLick to print a receipt for current transaction" href="#!" style="color:black; margin-right:35px; margin-left: 20px;"><i class="large mdi-action-print"></i></a>
        </div>
      </div>

          <div class="row" style="padding:40px">
              <div class="col s12"> 

                <div class="col s12" style="margin-bottom:20px">
                  <div class="col s6">
                    <div class="col s6" style="color:gray;padding-left:50px;padding-top:15px"><p>Transaction No.:</p></div>
                  <div class="col s6" style="color:red;"><p><input value="" id="transac_no" name="transac_no" type="text" class="" readonly></p></div>
                        </div>

                        <div class="col s6">              
                          <div class="col s12">
                            <div class="col s4" style="color:gray"><p>Date:</div>
                            <div class="col s8" id="Date" style="padding:15px; color:teal;"></div>
                          </div>
                          <div class="col s12">
                             <div class="col s4" style="color:gray"><p>Time:</div>
                            <div class="col s8" id="clock" style="padding:15px; color:teal;"></div>
                          </div>
                      </div>
                    </div>

          <div class="col s12 overflow-x" style="max-height:350px; border: 3px gray solid; padding:20px">
            <div class="col s6">
                        <label style="font-size:16px; color:dimgray; margin-bottom:10px"><center>Order Summary</center></label>
                            <table class = "table centered order-summary z-depth-1" border = "1">
                      <thead style="color:gray">
                          <tr>
                              <th data-field="product">Product</th>    
                              <th data-field="fabric">Fabric</th>
                              <th data-field="price">Unit Price</th>
                            </tr>
                          </thead>
                          <tbody>
                          <tr>
                             <td></td>
                             <td> </td>
                             <td>PHP</td>
                          </tr>
                      </tbody>
                  </table>
            </div>

          <!--For the design summary-->
            <div class="col s6" style="border-left:3px gray solid">
                  <p style="color: teal">Design for <b></b></p>
                          <table class = "table centered design-summary z-depth-1" border = "1">
                    <thead style="color:gray">
                        <tr>
                            <th data-field="product">Style Category</th>         
                            <th data-field="quantity">Segment Pattern</th>
                            <!--<th data-field="price">Total Price</th>-->
                          </tr>
                        </thead>
                        <tbody>
                        <tr>
                           <td>Lapel</td>
                           <td>Shawl Type</td>
                           <!--<td> </td>-->
                        </tr>
                    </tbody>
                </table>

                <div class="col s12"><div class="divider" style="height:2px"></div></div>

                <p style="color: teal">Design for <b></b></p>
                          <table class = "table centered design-summary z-depth-1" border = "1">
                    <thead style="color:gray">
                        <tr>
                            <th data-field="product">Style Category</th>         
                            <th data-field="quantity">Segment Pattern</th>
                            <!--<th data-field="price">Total Price</th>-->
                          </tr>
                        </thead>
                        <tbody>
                        <tr>
                           <td>Lapel</td>
                           <td>Shawl Type</td>
                           <!--<td> </td>-->
                        </tr>
                    </tbody>
                </table>
            </div>
              <!--End of design summary-->
              </div>

          <div class="col s12" style="margin:10px"></div>
          {!! Form::open() !!}
            <div class="col s6" style="border-right:2px gray solid">
              <h5 style="color:teal"><b>Price Quotation*</b></h5>
              <span>Determine terms of payment to get payment details</span>
              <div class="col s12"><div class="divider" style="margin:15px"></div></div>
                  <div class="col s4" style="color:gray; font-size:15px"><p><b>Total Amount</b></p></div>
                  <div class="col s8" style="color:red;"><p><input id="total-price" name="total-price" type="text" class="" readonly></p></div>

                          <div class="col s4" style="color:gray; font-size:15px"><p><b>Terms of Payment</b></p></div>
                          <div class="col s8" style="padding:18px; padding-top:30px">
                            <div class="col s6">
                        <input name="termOfPayment" type="radio" class="filled-in payment" id="half_pay" />
                      <label for="half_pay">Half (50-50)</label>
                </div>
                <div class="col s6">
                        <input name="termOfPayment" type="radio" class="filled-in payment" id="full_pay" />
                      <label for="full_pay">Full (100)</label>
                    </div>
                  </div>

                  <div class="col s4" style="color:gray; font-size:15px"><p><b>Amount Payable</b></p></div>
                  <div class="col s8" style="color:red;"><p><input value="" id="amount-payable" name="amount-payable" type="text" class="" readonly></p></div>

                  <div class="col s4" style="color:gray; font-size:15px"><p><b>Additional Charge (*)</b></p></div>
                  <div class="col s8" style="color:red;"><p><input value="" id="add-charge" name="add-charge" type="text" class="" readonly></p></div>

                  <div class="col s4" style="color:gray; font-size:15px"><p><b>Remaining Balance</b></p></div>
                  <div class="col s8" style="color:red;"><p><input value="" id="balance" name="balance" type="text" class="" readonly></p></div>    

            </div>

            <div class="col s6 z-depth-1">
              <h5 style="color:teal"><b>Payment</b></h5>
              <span>Fill up the following information</span>
              <div class="col s12"><div class="divider" style="margin:15px"></div></div>
              <div style="color:black" class="col s12"> 
                <div class="col s4"><p style="color:black; margin-top:5px; font-size:15px"><b>Amount Tendered:</b></p></div>                
                              <div class="col s8"><input style="padding:5px; border:3px gray solid" name="amount-tendered" type="text" class="right"><right></right></div>                            
                          </div>

                          <div style="color:black" class="col s12"> 
                <div class="col s4"><p style="color:black; margin-top:5px; font-size:15px"><b>Amount To Pay:</b></p></div>                
                              <div class="col s8"><input style="padding:5px; border:3px gray solid" name="amount-to-pay" type="text" class="right"></div>
                          </div>

                          <div style="color:black" class="col s12"> 
                <div class="col s4"><p style="color:red; margin-top:5px; font-size:15px"><b>Change*:</b></p></div>                
                              <div class="col s8"><input style="padding:5px; border:3px gray solid" name="change" type="text" class="right"></div>
                          </div>

                          <div style="color:black" class="col s12"> 
                <div class="col s4"><p style="color:red; margin-top:5px; font-size:15px"><b>Outstanding Balance*:</b></p></div>                
                              <div class="col s8"><input style="padding:5px; border:3px gray solid" name="outstanding-bal" type="text" class="right"></div>
                          </div>

                          <div class="right col s12" style="padding:18px"><a style="margin-top:5px; background-color:red" type="submit" class="right waves-effect waves-green btn modal-trigger tooltipped z-depth-2" data-position="bottom" data-delay="50" data-tooltip="Click to continue payment process" href="#due-date"><font color="white" size="+1">Pay for Order</font></a>   
                <div id="due-date" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:50px">
                    <h5><font color="red"><center><b>Reminder:</b></center></font></h5> 
                    <div class="col s12"><div class="divider" style="padding-top:50px"></div></div>               
                      <div class="modal-content col s12" style="padding:40px;">
                        <div class="col s5" style="padding-top:10px"><h5><font color="teal"><center><b>Due Date</b></center></font></h5></div>
                        <div class="col s7"><p style="font-size:20px"><b>August 16,2016</b></p></div>

                        <div class="col s12" style="padding-left:10px"><p style="color:gray;">Pay balance on (or before) the said due date above</p></div>
                      </div>

                      <div class="modal-footer col s12">
                        <p class="left" style="margin-left:10px; color:gray; font-size:15px">Continue with payment?</p>
                                <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat" ><font color="black">Yes</font></button>
                                <a class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">No</font></a>
                            </div>

                </div>
                
              </div>      
            </div>


                        <!--start of bottom button-->
            <div class="col s12" style="margin-top:20px">
              <a href="#save-transaction" class="right modal-trigger btn tooltipped" data-position="top" data-delay="50" data-tooltip="Click to save info and begin processing" style="background-color:#a7ffeb; padding:9.5px; padding-bottom:45px; margin-top:20px; margin-left:30px"><label style="font-size:15px; color:black"><!--<i class="mdi-action-done"> --><b>Save Order</b><!--</i>--></a>
                <div id="save-transaction" class="modal modal-fixed-footer" style="height:200px; width:500px; margin-top:150px">
                    
                  {!! Form::open() !!}
                    
                    <div class="modal-content col s12">
                      <div class="col s3">
                        <i class="mdi-action-done" style="font-size:50px; color:green"></i>
                      </div>
                      <div class="col s9">
                        <p><font size="+1">Successfully saved measurement and transaction!</font></p>
                      </div>
                    </div>

                    <div class="modal-footer col s12" style="background-color:green; opacity:0.85; color:white">
                              <a class="waves-effect waves-green btn-flat" href="{{URL::to('/online-home')}}"><font color="white">OK</font></a>
                          </div>
                  {!! Form::close() !!}
                </div>              
              <a href="#cancel-order" class="right btn modal-trigger tooltipped" data-position="top" data-delay="50" data-tooltip="Click to cancel current unsaved transaction" style="background-color:#a7ffeb; padding:9.5px; padding-bottom:45px; margin-top:20px; margin-left:30px"><label style="font-size:15px; color:black"><b>Cancel Transaction</b></label></a>
                <div id="cancel-order" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:80px">
                    <h5><font color="red"><center><b>Warning!</b></center></font></h5>
                      
                      <div class="divider" style="height:2px"></div>
                      <div class="modal-content col s12">
                        <div class="center col s4"><i class="mdi-alert-warning" style="color:red; font-size:60px"></i></div>
                        <div class="col s8"><p style="font-size:18px">Are you sure? Doing this will delete current transaction.</p></div>
                      </div>

                      <div class="modal-footer col s12">
                          <a class="waves-effect waves-green btn-flat" href="{{URL::to('/online-home')}}"><font color="black">Yes</font></a>
                          <a href="{{URL::to('/online-individual-checkout-info')}}" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">No</font></a>
                      </div>
                  </div>
              </div>
              <!--end of bottom button-->

          {!! Form::close() !!}


              </div>
            </div>

          <div class="divider" style="height:2px; margin-bottom:20px; margin-top:30px"></div>
          
  
      </div>

    </div>
  </div>

@stop

@section('scripts')

  <script>

  </script> 

@stop