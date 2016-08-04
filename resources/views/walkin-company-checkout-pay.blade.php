@extends('layouts.master')

@section('content')


	<div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><center><h3><b>Welcome to <font color="white">MyTailor</font></b></h3></center></span>
        <center><h5>Walk-in Company - Payout</h5></center>
      </div>
    </div>

    	<div class="row" style="padding:30px">
        
	        <ul class="col s12 breadcrumb">
				<li><a style="padding-left:200px" href="{{URL::to('transaction/walkin-company-payment-customer-info')}}"><b>1.FILL-UP FORM</b></a></li>
				<li><a style="padding-left:200px" href="{{URL::to('transaction/walkin-company-payment-measure-detail')}}"><b>2.ADD MEASUREMENT DETAIL</b></a></li>
				<li><a class="active" style="padding-left:200px" href="#payment-info"><b>3.PAYMENT</b></a></li>			
			</ul>

			<!-- Tab for Payment-->
	    <div id="payment-info" class = "hue col s12 active" style="background-color: white; border:2px outset">
	        <div class="row">
		        <div class="col s12 m12 l12">
                	<span class="page-title" style="margin:15px"><center><h5><b>Payment Information</b></h5></center></span>
              		<div class="divider" style="height:1px; background-color:#80d8ff"></div>
              		<div class="divider" style="height:1px; background-color:#80d8ff"></div>
              	</div>
	       	</div>

	       	<div class="left col s12">
		        <div class="fixed-action-btn vertical" style="bottom: 45px; right: 24px;">
			        <a class="mdi-action-print btn-floating btn-large red " style="font-size:40px; height:70px; width:70px; padding:5px; padding-bottom:3px; margin-right:40px" ></a>
			          	<ul>
					      <li><a href="{{URL::to('transaction/walkin-company')}}" class="btn-floating blue tooltipped" data-position="left" data-delay="50" data-tooltip="Print a copy of the contract" style="height:50px; width:50px; margin-right:40px; padding-top:5px;"><i class="mdi-content-content-copy"></i></a></li>
					      <li><a href="{{URL::to('transaction/walkin-company-customize-orders')}}" class="btn-floating yellow darken-2 tooltipped" data-position="left" data-delay="50" data-tooltip="Print a receipt" style="height:50px; width:50px; margin-right:40px; padding-top:5px;"><i class="mdi-action-assignment">Return to Customize Order</i></a></li>
					 	</ul>
				</div>		    
			</div>

	       	<div class="row" style="background-color:white;">
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
						                  <th data-field="quantity">Quantity</th>
						                  <th data-field="design">Design</th>
						                  <th data-field="fabric">Fabric</th>
						                  <th data-field="price">Unit Price</th>
						                  <th data-field="price">Total Price</th>
						              	</tr>
					              	</thead>
					              	<tbody>
								            <tr>
								               <td>Uniform, Polo</td>
								               <td>1</td>
								               <td>No-fit</td>
								               <td>Traditional Cotton</td>
								               <td>800.00 PHP</td>
								               <td>800.00 PHP</td>
								            </tr>
							        </tbody>
							    </table>
						</div>

					<!--For the design summary-->
						<div class="col s6" style="border-left:3px gray solid">
							<h6><b>Generic FA (per Garment Design)</b></h6>
			      			<p style="color: teal">Design for <b>Uniform, Polo</b></p>
	                        <table class = "table centered design-summary z-depth-1" border = "1">
			       				<thead style="color:gray">
				          			<tr>
					                  <th data-field="product">Style Category</th>         
					                  <th data-field="quantity">Segment Pattern</th>
					                  <th data-field="price">Style Price</th>
					                  <!--<th data-field="price">Total Price</th>-->
					              	</tr>
				              	</thead>
				              	<tbody>
						            <tr>
						               <td>Collar</td>
						               <td>Baby Collar</td>
						               <td>200.00 PHP</td>
						            </tr>
						        </tbody>
						    </table>

						    <div class="col s12"><div class="divider" style="height:2px"></div></div>
						</div>
		      		<!--End of design summary-->
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

			      			<div class="col s4" style="color:red; font-size:15px"><p><b>Grand Total</b></p></div>
			      			<div class="col s8" style="color:red;"><p><input id="total_price" name="total_price" type="text" class="" readonly><b></b></p></div>

                        	<div class="col s4" style="color:gray; font-size:15px"><p><b>Terms of Payment</b></p></div>
                        	<div class="col s8" style="padding:18px; padding-top:30px">
	                        	<div class="col s6">
			          				<input name="termsOfPayment" value="Half Payment" type="radio" class="filled-in payment" id="half_pay"/>
	      							<label for="half_pay">Half (50-50)</label>
								</div>
								<div class="col s6">
				          			<input name="termsOfPayment" value="Full Payment" type="radio" class="filled-in payment" id="full_pay" />
		      						<label for="full_pay">Full (100)</label>
		      					</div>
	      					</div>

							<!-- <div class="col s4" style="color:red; font-size:15px"><p><b>Mode of Payment</b></p></div>
                        	<div class="col s8" style="padding:18px; padding-top:30px; color:red">
	                        	<div class="col s6">
			          				<input name="termsOfPayment" value="Half Payment" type="radio" class="filled-in payment selected" id="half_pay" selected/>
	      							<label color="red" for="half_pay">Cash</label>
								</div>
								<div class="col s6">
				          			<input name="termsOfPayment" value="Full Payment" type="radio" class="filled-in payment" id="full_pay" />
		      						<label color="red" for="full_pay">Cheque</label>
		      					</div>
	      					</div> -->

							<input type="hidden" id="transaction_date" name="transaction_date" />

		      				<div class="col s4" style="color:gray; font-size:15px"><p><b>Amount Payable</b></p></div>
		      				<div class="col s8" style="color:red;"><p><input value="" id="amount-payable" name="amount-payable" type="text" class="" readonly></p></div>

		      			<!--	<div class="col s4" style="color:gray; font-size:15px"><p><b>Additional Charge (*)</b></p></div>
		      				<div class="col s8" style="color:red;"><p><input value="" id="add-charge" name="add-charge" type="text" class="" readonly></p></div> -->

		      				<div class="col s4" style="color:gray; font-size:15px"><p><b>Remaining Balance</b></p></div>
		      				<div class="col s8" style="color:red;"><p><input value="" id="balance" name="balance" type="text" class="" readonly></p></div>		

							<div class="col s12">
								<a href="#pay-by-check" class="right btn modal-trigger" style="background-color:#03a9f4; color:black; margin-top:20px"><b>Make payment by Cheque</b></a>
							</div>
						</div>

						<div class="col s6 z-depth-1" style="border-left:2px gray solid">
							<h5 style="color:teal"><b>Payment <font size="-1">(Default by Cash)</font></b></h5>
							<span>Fill up the following information</span>
							<div class="col s12"><div class="divider" style="margin:15px"></div></div>
							<div style="color:black" class="col s12"> 
								<div class="col s4"><p style="color:black; margin-top:5px; font-size:15px"><b>Amount Tendered:</b></p></div>                
	                          	<div class="col s8"><input placeholder="How much you'll pay" style="padding:5px; border:3px gray solid" name="amount-tendered" id="amount-tendered" type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="right"><right></right></div>	                          
	                        </div>

	                        <div style="color:black" class="col s12"> 
								<div class="col s4"><p style="color:black; margin-top:5px; font-size:15px"><b>Amount To Pay:</b></p></div>                
	                          	<div class="col s8"><input placeholder="How much want to pay from the total."  style="padding:5px; border:3px gray solid;" name="amount-to-pay" id="amount-to-pay" type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="right"></div>
	                        </div>

	                        <div style="color:black" class="col s12"> 
								<div class="col s4"><p style="color:red; margin-top:5px; font-size:15px"><b>Change*:</b></p></div>                
	                          	<div class="col s8" style="color:red;"><input readonly style="padding:5px; border:3px gray solid" name="amount-change" id="amount-change" type="text" class="right"></div>
	                        </div>

	                        <div style="color:black" class="col s12"> 
								<div class="col s4"><p style="color:red; margin-top:5px; font-size:15px"><b>Outstanding Balance*:</b></p></div>                
	                          	<div class="col s8 style="color:red;""><input readonly style="padding:5px; border:3px gray solid" name="outstanding-bal" id="outstanding-bal" type="text" class="right"></div>
	                        </div>

							<input type="hidden" id="transaction_date" name="transaction_date">
							<input type="hidden" id="due_date" name="due_date">

							<div class="col s12"><div class="divider" style="padding-top:10px"></div></div>								
								<div class="modal-content col s12" style="padding-bottom:20px;">
										<div class="col s5" style="padding-top:10px"><h5><font color="teal"><center><b>Due Date: </b></center></font></h5></div>
										<div class="col s7"><p style="font-size:20px" ><b id="due-date"></b></p></div>

										<div class="col s12" style="padding-left:10px"><p style="color:gray;">Pay balance on (or before) the said due date above</p></div>
								</div>
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


					<!-- <div class="container">
	                    <div class="col s12" style="border:4px solid teal; padding:5px; margin-top:30px; padding-left:30px; padding-right:30px">
								<left><p style="padding-left:40px"><font size="+1"><b>CHEQUE DETAILS</b></font><font color="gray" style="padding-left:30px">In case payment is made through cheque</font></p></left> 
								
								<div class="divider" style="height:2px; background-color:teal; margin-left:30px; margin-right:30px"></div>        
									
									<div class="col s4" style="color:teal; padding-top:20px; padding-left:30px"><p>Account Number:</p></div>
			      					<div class="col s8" style="color:black; padding-right:50px"><p><input value="" id="account_no" name="account_no" type="text" class=""></p></div>
								
									<div class="col s4" style="color:teal; padding-top:20px; padding-left:30px"><p>Account Name:</p></div>
			      					<div class="col s8" style="color:black; padding-right:50px"><p><input value="" id="account_name" name="account_name" type="text" class=""></p></div>

			      					<div class="col s4" style="color:teal; padding-top:20px; padding-left:30px"><p>Check Number:</p></div>
			      					<div class="col s8" style="color:black; padding-right:50px"><p><input value="" id="check_no" name="check_no" type="text" class=""></p></div>

			      					<div class="col s4" style="color:teal; padding-top:20px; padding-left:30px"><p>Date:</p></div>
			      					<div class="col s8" style="color:black; padding-right:50px"><p><input value="" id="transac_date" name="transac_date" type="date" class="datepicker"></p></div>
	    

	                    </div>
                 	</div> -->

                 	<div id="pay-by-check" class="modal modal-fixed-footer" style="height:500px; width:800px; margin-top:30px">
						<h5><font color="teal"><center><b>Fill up Cheque Information</b></center></font></h5>
						<div class="divider" style="height:2px"></div>

						<div class="modal-content col s12">

							<div class="col s4">Bank Account</div>
							<div class="col s8"><p><input value="" id="bank-acct" name="bank-acct" type="text" placeholder="Name of Bank"></p></div>

							<div class="col s4">Account Code</div>
							<div class="col s8"><p><input value="" id="acct-code" name="acct-code" type="number" placeholder="1111"></p></div>

							<div class="col s4">Cheque No</div>
							<div class="col s8"><p><input value="" id="cheque-no" name="cheque-no" type="number" placeholder="17"></p></div>

							<div class="col s4">Date</div>
							<div class="col s8"><p><input value="" id="payment-date" name="payment-date" type="date" placeholder="Wednesday, 15 August 1996" class="datepicker"></p></div>

							<div class="col s4">Period</div>
							<div class="col s8"><p><input value="" id="cheque-period" name="cheque-period" type="date" placeholder="February, 2006" class="datepicker"></p></div>

							<div class="col s4">Credit Amount (in Php)</div>
							<div class="col s8"><p><input value="" id="credit-amt" name="credit-amt" type="number" placeholder="200.00 Php"></p></div>

							<div class="col s4">Payee (Contact Code)</div>
							<div class="col s8"><p><input value="" id="payee-code" name="payee-code" type="number" placeholder="12416"></p></div>

							<div class="col s4">Name</div>
							<div class="col s8"><p><input value="" id="payee-name" name="payee-name" type="text" placeholder="Bayer Philippines"></p></div>

							<div class="col s4">Description</div>
							<div class="col s8"><p><input value="" id="cheque-desc" name="cheque-desc" type="text" placeholder="insert text"></p></div>

						</div>
						
						<div style="margin-bottom:50px"></div>

						<div class="modal-footer col s12">
			                <a class="waves-effect waves-green btn-flat" href="{{URL::to('transaction/walkin-company-payment-payment-info')}}"><font color="teal"><b>Save Payment</b></font></a>
			                <a href="{{URL::to('/transaction/walkin-company-payment-payment-info')}}" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="teal"><b>Cancel</b></font></a>
			            </div>
                 	</div>

					<div class="col s12"><div class="divider" style="height:2px; color:gray; margin:15px"></div></div>
                    <div class="col s12">                  	
                    		<a href="{{URL::to('transaction/walkin-company')}}" class="right btn tooltipped" data-position="top" data-delay="50" data-tooltip="Click to save payment information and get measured" style="background-color:teal; padding:9.5px; padding-bottom:45px; margin-top:20px;"><label style="font-size:15px; color:white">Save Payment</label></a>
                    		<a href="{{URL::to('transaction/walkin-company')}}" class="left btn tooltipped" data-position="top" data-delay="50" data-tooltip="Transfers you back to shopping for garments and clears current unsaved transaction" style="background-color:teal; padding:9.5px; padding-bottom:45px; margin-top:20px;"><label style="font-size:15px; color:white">Cancel Transaction</label></a>                   	
                    </div>


	            </div>
	        </div>

	        <div class="divider" style="height:2px; margin-bottom:20px; margin-top:50px"></div>
	      	
	      		<center><p><font color="gray">End of Payment Information Form</font></p></center>
	
	    </div>
	    <!-- End of Tab for Payment-->


		</div>





@stop

@section('scripts')

	<script type="text/javascript">
	  $('.modal-trigger').leanModal({
	      dismissible: true, // Modal can be dismissed by clicking outside of the modal
	      opacity: .5, // Opacity of modal background
	      in_duration: 300, // Transition in duration
	      out_duration: 200, // Transition out duration
	      width:400,
	    }
	  );
	</script>

	<script>
	  $(document).ready(function() {
	    $('select').material_select();
	  });
	</script>	

	<script>
	$(document).ready(function(){
    	$('body').on('load', 'ul.tabs', function() {
   	 	$('ul.tabs').tabs();
		});
  		
  		$("#addMeasurementDetail").on('click', function(){
/*  			setTimeout(function(){
  				$('ul.tabs').tabs();
  				$('#tabMeasurementDetail').style('display', 'block');
  			}, 2000);
*/  		});

  	});

	</script>

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
		  	//var currentSeconds = currentTime.getSeconds ( );

		  	// Pad the minutes and seconds with leading zeros, if required
		  	currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
		  	//currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;

		  	// Choose either "AM" or "PM" as appropriate
		  	var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";

		  	// Convert the hours component to 12-hour format if needed
		  	currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;

		  	// Convert an hours component of "0" to "12"
		  	currentHours = ( currentHours == 0 ) ? 12 : currentHours;

		  	// Compose the string for display
		  	var currentTimeString = currentHours + ":" + currentMinutes + " " + timeOfDay;
		  	
		  	
		   	$("#clock").html(currentTimeString);
		   	  	
		 }

		$(document).ready(function()
		{
		   setInterval('updateClock()', 1000);
		});
	</script>

	<script>
	function tabInit() {
    $('ul.tabs').tabs();
	}

	$.ajax({
	    type: "GET",
	    //Url to the XML-file
	    url: "transaction/walkInIndividualCheckout",
	    dataType: "blade.php",
	    success: tabInit
	});
	</script>


@stop