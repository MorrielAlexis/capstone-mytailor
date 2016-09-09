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
          
                <label style="font-size:23px; color:teal;"><center><b>ORDER SUMMARY</b></center></label>

                <div class="col s12 overflow-x" style="min-height:300px; max-height:550px; border: 3px gray solid; padding:10px">
                  <div class="col s12">                       
                    <div class="col s12" style="margin-bottom:30px"></div>
                      <table class = "table centered order-summary z-depth-1" border = "1">
                        <thead style="color:gray">
                            <tr style="border-top:1px teal solid; border-bottom:1px teal solid; background-color:teal; color:white">
                              <th data-field="product" style="border-right:1px teal solid; border-left:1px teal solid">Product</th> 
                              <th data-field="fabric" style="border-right:1px teal solid">Fabric</th>
                              <th data-field="base-price" style="border-right:1px teal solid">Base Price</th>
                              <th data-field="description" style="border-right:1px teal solid">Description</th>  
                            </tr>
                        </thead>
                        <tbody>
                          <tr style="border-top:1px teal solid; border-bottom:1px teal solid">
                            <td style="border-right:1px teal solid; border-left:1px teal solid">Product</td>
                            <td style="border-right:1px teal solid">Fabric</td>
                            <td style="border-right:1px teal solid">PHP Base Price</td>
                            <td style="border-right:1px teal solid">
                              <div class="col s12">
                                <div class="col s4"><b style="color:teal">Style Category</b></div>
                                <div class="col s4"><b style="color:teal">Segment Pattern</b></div>
                                <div class="col s4"><b style="color:teal">Style Price</b></div>
                              <div class="col s12"><div class="divider"></div></div>
                              </div>                                
                              <div class="col s4">style category</div>
                              <div class="col s4">segment pattern</div>
                              <div class="col s4">PHP Style Price</div><br>
                            </td>                 
                        </tbody>
                      </table>          
                  </div>

                  <div class="col s12" style="margin-bottom:38px"></div>

                </div>

          <div class="col s12" style="margin:10px"></div>
            <div class="col s6">
              <h5 style="color:teal"><b>Price Quotation*</b></h5>
              <span>Determine terms of payment to get payment details</span>

              <!--Eto yung mga pinapadagdag non sa Capstone-->
              <!--Ikinoment ko muna dahil hindi naman yata pina-require sa soft eng-->
              <!--
              <div class="col s12 z-depth-1" style="border: 2px gray solid; padding:20px; margin-top:2%">
                
                <div class="col s12">
                  <div class="col s4" style="color:gray; font-size:15px"><p><b>Estimated Total Amount</b></p></div>
                      <div class="col s8" style="color:red;"><p><input id="estimated_total" name="estimated_total" type="text" class=""></p></div>
                </div>

                <div class="col s12">
                  <div class="col s4" style="color:gray; font-size:15px"><p><b>Labor Fee</b></p></div>
                      <div class="col s8" style="color:red;"><p><input id="labor_fee" name="labor_fee" type="text" class=""></p></div>
                </div>
                
                <div class="col s12">
                  <div class="col s4" style="color:gray; font-size:15px"><p><b>Additional Fee</b></p></div>
                      <div class="col s8" style="color:red;"><p><input id="addtnl_fee" name="addtnl_fee" type="text" class=""></p></div>
                </div>

              </div>-->

              <div class="col s12"><div class="divider" style="margin:15px"></div></div>
              
              <!-- <div class="col s4" style="color:gray; font-size:15px"><p><b>Total Labor Price</b></p></div>
                  <div class="col s8" style="color:gray;"><p><input id="style_price_total" name="style_price_total" type="text" class="" readonly><b></b></p></div> -->

                  <div class="col s4" style="color:red; font-size:15px"><p><b>Grand Total</b></p></div>
                  <div class="col s8" style="color:red;"><p><input id="total_price" name="total_price" type="text" class="" readonly style="font-size:3em"></p></div>

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
              
              <input type="hidden" id="transaction_date" name="transaction_date" />

                  <!-- <div class="col s4" style="color:gray; font-size:15px"><p><b>Amount Payable</b></p></div>
                  <div class="col s8" style="color:red;"><p><input value="" id="amount-payable" name="amount-payable" type="text" class="" readonly></p></div>

                  <div class="col s4" style="color:gray; font-size:15px"><p><b>Additional Charge (*)</b></p></div>
                  <div class="col s8" style="color:red;"><p><input value="" id="add-charge" name="add-charge" type="text" class="" readonly></p></div> 

                  <div class="col s4" style="color:gray; font-size:15px"><p><b>Remaining Balance</b></p></div>
                  <div class="col s8" style="color:red;"><p><input value="" id="balance" name="balance" type="text" class="" readonly></p></div>    
 -->
            </div>

            <div class="col s6 z-depth-1"  style="border-left:2px gray solid">
              <h5 style="color:teal"><b>Payment</b></h5>
              <span>Fill up the following information</span>
              <div class="col s12"><div class="divider" style="margin:15px"></div></div>

                <div style="color:black" class="col s12"> 
                  <div class="col s4"><p style="color:black; margin-top:5px; font-size:15px"><b>Amount To Pay:</b></p></div>                
                  <div class="col s8"><b><input  style="padding:5px; border:3px gray solid; font-size:1.5em" id="amount-payable" name="amount-payable" type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="right"></b></div>
                </div>

                <div style="color:black" class="col s12"> 
                  <div class="col s4"><p style="color:red; margin-top:5px; font-size:15px"><b>Outstanding Balance*:</b></p></div>                
                  <div class="col s8" style="color:red;"><b><input readonly style="padding:5px; border:3px gray solid; font-size:1.5em" id="balance" name="balance" type="text" class="right"></b></div>
                </div>

                <div style="color:black" class="col s12"> 
                  <div class="col s4"><p style="color:black; margin-top:5px; font-size:15px"><b>Amount Tendered:</b></p></div>                
                  <div class="col s8"><input style="padding:5px; border:3px gray solid; font-size:1em" name="amount-tendered" id="amount-tendered" type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="right"><right></right></div>                           
                </div>

                <div style="color:black" class="col s12"> 
                  <div class="col s4"><p style="color:red; margin-top:5px; font-size:15px"><b>Change*:</b></p></div>                
                  <div class="col s8" style="color:red;"><input readonly style="padding:5px; border:3px gray solid; font-size:1em" name="amount-change" id="amount-change" type="text" class="right"></div>
                </div>


              <input type="hidden" id="transaction_date" name="transaction_date">
              <input type="hidden" id="due_date" name="due_date">

              <div class="col s12"><div class="divider" style="padding-top:10px"></div></div>               
                <!-- <div class="modal-content col s12" style="padding-bottom:20px;">
                    <div class="col s5" style="padding-top:10px"><h5><font color="teal"><center><b>Due Date</b></center></font></h5></div>
                    <div class="col s7"><p style="font-size:20px" ><b id="due-date"></b></p></div>

                    <div class="col s12" style="padding-left:10px"><p style="color:gray;">Pay balance on (or before) the said due date above</p></div>
                </div> -->
                          <!--<div class="right col s12" style="padding:18px"><a style="margin-top:5px; background-color:red" type="submit" class="right waves-effect waves-green btn modal-trigger tooltipped z-depth-2" data-position="bottom" data-delay="50" data-tooltip="Click to continue payment process" href="#due-date"><font color="white" size="+1">Pay for Order</font></a>   
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
                
              </div>-->     
            </div>


              <!--start of bottom button-->
              <div class="col s12" style="margin-top:20px">
                <button type="submit" class="right btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to save data" style="margin-left:40px; background-color:#00695c; color:white"><b><i class="mdi-navigation-check" style="padding-right:10px"></i>Save Order</b></button> 
                  
                  <!-- <div class="col s12" style="margin-top:30px">
                            <div  id="confirm-submission" class="modal modal-fixed-footer" style="height:300px; width:500px; margin-top:80px">
                                <h5><font color="black"><center><b>Warning!</b></center></font></h5>
                               
                                    <div class="divider" style="height:2px"></div>
                                      <div class="modal-content col s12">
                                        <div class="center col s4"><i class="mdi-alert-warning" style="color:green; font-size:60px"></i></div>
                                        <div class="col s8"><p style="font-size:18px">Print Receipt</p></div>
                                      </div>

                                    <div class="modal-footer col s12">
                                        <button type="submit"  href="{{ URL::to('/transaction/walkin-individual') }}" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">OK</font></button>
                                    </div>
                              </div>
                      </div> -->
      {!! Form::close() !!}   
              <!--end of bottom button-->
              </div>  
          </div>


          <div class="divider" style="height:2px; margin-bottom:20px; margin-top:30px"></div>
          
  
      </div>

    </div>
  </div>
  </div>

@stop

@section('scripts')

  <script>

  </script> 

@stop