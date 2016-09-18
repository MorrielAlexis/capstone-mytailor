@extends('layouts.master')

@section('content')


	<div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><center><h3><b>Welcome to <font color="white">MyTailor</font></b></h3></center></span>
        <center><h5>Payment - Individual Customer</h5></center>
      </div>
    </div>

    <div class="row" style="margin-top:50px">
		<div class="col s12 m12 l12">

			<div class="col s12 m9 l12" style="padding-left:5%; padding-right:5%">
				<ul class="tabs transparent" style="margin-top:15px">
					<li class="tab col s12" style="border-top-left-radius: 20px; border-top-right-radius: 20px; background-color: #00b0ff;"><a style="color:black; padding-top:5px; opacity:0.80" href="#billCustomer"></a></li>	
					<div class="indicator white" style="z-index:1"></div>
	            </ul>
	        </div>
				<div class="row">
				    <div class="col s12 m9 l12" style="padding-left:5%; padding-right:5%">
				    	<div id="billCustomer" class="card-panel">
							<div class="card-content">
								<div class="row">
									<div class="col s12">
										<center><p style="color:gray"><b>MyTailor Store</b> Payment Process - Step 1</p></center>
										<div class="divider" style="color:gray; height:2px; margin-bottom:20px"></div>
									</div>

									<div class="col s12">
										<div class="right col s6" style="border: 1px white solid">
											<div id="clock" class="center" style="background-color: teal; font-size:23px; color:white; padding:10px;"></div>
										</div>
										<div class="left col s6" style="border: 1px white solid">
											<div id="Date" class="center" style="background-color: #00b0ff; font-size:23px; color:white; padding:10px;"></div>
										</div>	
									</div>

									<!--Customer search and info-->
									<div class="col s12" style="margin-top:30px">
										{!! Form::open(['url' => 'transaction/payment/individual/customer-info', 'method' => 'GET']) !!}
										<div class="col s12 customer" style="background-color: #e0f2f1; padding-top:3%; padding-bottom:3%">
												<div style="color:black" class="col s12">                   					                          
						                          	<div class="col s3" style="color:black; margin-top:2%"><center><b>CUSTOMER NAME:</b></center></div>
						                          	<div class="col s9"><input style="border:3px teal solid; padding:5px; padding-left:10px; background-color:white; color:teal" id="cust_name" name="cust_name" type="text" placeholder="ex. Honey Buenavides"></div>					                         			                          	
						                        </div>

					                         <button type="submit" class="right btn" id="getCustomer" style="background-color:#004d40; color:white">Start Payment</button> 
				                    	</div>
				                    	<div class="col s12" style="margin-top:30px"><div class="divider" style="height:3px; color:gray"></div></div>
				                    	{!! Form::close() !!}
									<!-- Customer Info -->					
									
										<div class="col s12" style="margin-top:10px">

											<div class="col s12">
					                    		<div style="color:black" class="col s12">     
					                    			<div class="col s3" style="color:teal; margin-top:4%"><b>Customer Name:</b></div>            
						                          	<div class="col s9" style="color:black; margin-top:3%; padding:0; font-size:18px"><b></b></div>
					                        	</div>
					                    	</div>
											<div class="col s12">
												<div style="color:black" class="col s12">  
													<div class="col s3" style="color:teal; margin-top:4%;"><b>Customer ID:</b></div>               
						                          	<div class="col s9" style="color:black; margin-top:3%; padding:0; font-size:18px"><b></b></div>
						                        </div>
					                    	</div>
					                    	<div class="col s12">
					                    		<div class="col s12">
					                    			<div class="col s12">
						                    			<div class="col s3" style="color:teal; margin-top:4%; padding:0"><b>Pending Payment(s):</b></div>
						                    			<div class="col s9" style="color:white; background-color: gray; margin-top:4%; padding:0" hidden><font style="padding-left:4%">Kindly settle unpaid payment(s) before or on due date</font></div>
						                    		</div>
						                    		<!--eto ang iloloop beybe-->
						                    		<div class="col s12" style="padding-left:15%" hidden>
						                    			
						                    			<div class="col s12" style="color:black; margin-top:3%; padding:0; font-size:18px"><b></b>
						                    				<a href=""><u>See transaction detail</u></a>
						                    				<a style="background-color:#ef9a9a; color:white; padding-left:3%; padding-right:3%">Due date: </a>
						                    			</div>
						                    			
						                    		</div>
						                    		<!--ends here-->
					                    			</div>
					                    		</div>
					                    		<div class="col s12" style="margin-top:3%"><div class="divider" style="height:3px; color:gray; margin-bottom:4%"></div></div> 
											</div><!--End of customer info-->

					                    	<!--START OF PAYMENT PROCESS HERE-->
					                    	<div class="col s12" style="padding-left:5%">
												<div class="input-field col s9">
													<div class="container">
														<select class="browser-default tooltipped" data-position="bottom" data-delay="50" data-tooltip="In case of multiple pending payments" style="margin-left:45%">
															
															<option disabled></option>
														
														</select>
													</div>
													<label style="color:teal"><b>Choose a transaction date to pay:</b></label>
												</div>
											</div>

											<div class="col s12" style="margin-top:30px">
										<div class="col s7">
										<div class="card-panel">
											<div class="card-content">
												<div class="row">
													<div style="color:black" class="input-field col s7">                 
							                          <input style="margin-left:80%; padding:1%; padding-left:1%" name="payment-info" type="text" class="" value="">
							                          <label style="color:teal; margin-top:1%; margin-left:2%"><b>Total Amount to Pay:</b></label>
							                        </div>

							                        <div style="color:black" class="input-field col s7">                 
							                          <input style="margin-left:80%; padding:1%; padding-left:1%" name="payment-info" type="text" class="" value="">
							                          <label style="color:teal; margin-top:1%; margin-left:2%"><b>Total Amount Paid:</b></label>
							                        </div>

							                        <div style="color:black" class="input-field col s7">                 
							                          <input style="margin-left:80%; padding:1%; padding-left:1%" name="payment-info" type="text" class="" value="">
							                          <label style="color:teal; margin-top:1%; margin-left:2%"><b>Outstanding Balance:</b></label>
							                        </div>
							

							                        <div class="col s12" style="margin-top:3%"><div class="divider" style="height:3px; color:gray"></div></div>

							                        <div style="color:black" class="input-field col s7">                 
							                          <input style="margin-left:80%; padding:1%; padding-left:1%; border:3px gray solid" name="payment-info" type="text" class="">
							                          <label style="color:black; margin-top:1%; margin-left:2%"><b>Amount Tendered:</b></label>
							                        </div>

							                        <div style="color:black" class="input-field col s7">                 
							                          <input style="margin-left:80%; padding:1%; padding-left:1%; border:3px gray solid" name="payment-info" type="text" class="">
							                          <label style="color:black; margin-top:1%; margin-left:2%"><b>Amount to Pay :</b></label>
							                        </div>

							                        <div class="container">
								                        <div style="color:black" class="input-field col s7">                 
								                          <input style="margin-left:80%; padding:1%; padding-left:1%; border:3px gray solid" name="payment-info" type="text" class="">
								                          <label style="color:teal; margin-top:1%; margin-left:40px"><b>Change:</b></label>
								                        </div>
							                    	</div>

							                    	<div style="color:black" class="input-field col s7">                 
							                          <input style="margin-left:180px; padding:5px; padding-left:10px; border:3px gray solid" name="payment-info" type="text" class="">
							                          <label style="color:black; margin-top:5px; margin-left:20px"><b>Remaining Balance:</b></label>							                          
							                        </div>

							                        <div class="col s12" hidden>
							                        	<center><p style="color:gray">*** Pay balance before or on <font color="teal"><b><u>"DECEMBER 25, 2016"</u></b></font> ***</p></center>
							                        </div>

							                        <div style="color:black" class="input-field col s7">                 
							                          <input style="margin-left:180px; padding:5px; padding-left:10px;" value="Honey May Buenavides - Cashier" name="payment-info" type="text" class="">
							                          <label style="color:black; margin-top:5px; margin-left:20px"><b>Process Done By:</b></label>							                          
							                        </div>
													
													<div class="col s12" style="margin-top:30px">
														<a href="{{ URL::to('billing-payment/payment-receipt-pdf') }}" class="left btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to print a copy of receipt" style="background-color:teal"><i class="large mdi-action-print" style="font-size:30px"></i></a>
														<a href="" class="right btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="CLick to save data" style="background-color:teal; margin-left:20px">Save</a>
														<a href="" class="right btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to clear all fields for payment process" style="background-color:teal">Cancel</a>
													</div>

												</div>
											</div>
										</div>


										</div>

										<div class="col s5">
											<div class="card-panel">
											<div class="card-content">
												<div class="row">
													<center><h6><b>ORDER SUMMARY</b></h6></center>
													<div class="col s12" style="margin-top:2%; padding-bottom:6%"><div class="divider" style="height:3px; color:gray"></div></div>
													<center><font color="teal">Nothing to display</font></center>
												</div>
											</div>
										</div>
										</div>

										

									</div>


					                    	<!--Payment process ends here-->

					                    	
					                    	<!-- <div class="col s6">
												<div style="color:black" class="col s12">  
													<div class="col s4" style="color:gray; margin-top:4%"><b>Customer Type:</b></div>               
						                          	<div class="col s8"><input value="" style="padding:5px; padding-left:10px; color:red" name="custtyoe" id="custtype" type="text" class="" placeholder="ex. IND 20001" editable="false" readonly><b></b></div>
						                        </div>
					                    	</div> -->


									

									<!-- <div class="col s12" style="padding:10px; padding-left:20px">
										<p style="color:teal; font-size:20px"><b>Customer Name: </b>
											
										</p>
										<div style="color:teal; font-size:20px">
											<label style="color:teal; font-size:20px"><b>Customer Type:</b></label>
											 <label id="cust_type" style="color:teal; font-size:20px"></label>
										</div>
									</div> -->

									<!-- <div class="col s12">
										<center><h5 style="color:black"><b>List of Pending Payments</b></h5></center>
										<div class="card-panel" style="border: 4px black inset">
											<div class="card-content">
												<div class="row">
													<div class="col s12">
														<table class="table centered pending-payments" border="1">
															<thead style="color:gray">
																<th data-field="order-no">Order No.</th>
																<th data-field="transaction-date">Transaction Date</th>
																<th data-field="total-amount-pay">Total Amount To Pay</th>
																<th data-field="total-amount-paid">Total Amount Paid</th>
																<th data-field="outstanding-bal">Outstanding Balance</th>
																<th data-field="due-date" style="color:red">Due Date</th>
															</thead>
															<tbody>
															@if(isset($pending_payments))
															@foreach($pending_payments as $pending_payment)
																@if($pending_payment->boolIsActive == 1)
																<tr>																
																	<td><a href="#summary-of-order" class="modal-trigger tooltipped" data-position="bottom" data-delay"50" data-tooltip="Click to view summary of orders"><u>{{ $pending_payment->strJobOrderID }}</u></a></td>
																	<td>{{ $pending_payment->dtOrderDate }}</td>
																	<td>Php {{ number_format($pending_payment->dblOrderTotalPrice, 2) }}</td>
																	<td>Php {{ number_format($pending_payment->dblAmountToPay, 2) }}</td>
																	<td>Php {{ number_format($pending_payment->dblOutstandingBal, 2) }}</td>
																	<td style="color:red">{{ $pending_payment->dtPaymentDueDate}}</td>
																</tr>
																@endif
															@endforeach
															@endif
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div> -->
									
									<div id="summary-of-order" class="modal modal-fixed-footer" style="height:500px; width:800px; margin-top:30px">
									<h5><font color="teal"><center><b>Summary of Orders</b></center></font></h5>
										
											<div class="divider" style="height:2px"></div>
											<div class="modal-content col s12">

												<div class="col s6" style="margin-top:20px;">
												<label>This is a summary of orders:</label>
												</div>

												<div class="col s6">
													<div class="col s6"><p style="color:gray">Date of Transaction:</p></div>
													
													<div class="col s6"><h6 style="color:red; margin-top:15px"><b></b></h6></div>
														
												</div>

														<div class="container">
									                        <table class = "table centered order-summary" border = "1">
											       				<thead style="color:gray">
												          			<tr>
													                  <th data-field="product">Item</th>         
													                  <th data-field="quantity">Quantity</th>
													                  <th data-field="price">Unit Price</th>
													                  
													              	</tr>
												              	</thead>
												              	<tbody>
												              	
												              	
																
														        </tbody>
														    </table>
											      		</div>

											      		<div class="divider"></div>
											      		<div class="divider"></div>
														
												      	<div class="col s12">
															<div class="col s6"><p style="color:gray">Estimated time to finish all orders:<p style="color:black">60 days</p></p></div>
															<div class="col s6"><p style="color:gray">Total Amoun to Pay:<p style="color:black"></p></p></div>
														</div>

														<div class="col s12" style="margin-bottom:50px">
															<p style="color:red"><b>Due date of payment (pay balance before or on the said date):</b></p>
														</div>
														

													</div>

											<div class="modal-footer col s12">	
								                <a class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">OK</font></a>								                
								            </div>
									
							</div>

								<div class="col s12" style="margin-top:4%" hidden>
									<div class="col s12" style="margin-top:3%"><div class="divider" style="height:3px; color:gray; margin-bottom:4%"></div></div>
									<!-- <a href="{{URL::to('billing-payment/pending-payment-pdf')}}" class="left btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to print a copy of pending payments" style="background-color:teal"><i class="medium mdi-action-print"></i>Print a copy</a>
									<button class="left btn tooltipped" type="submit" data-position="bottom" data-delay="50" data-tooltip="Click to clear all fields" style="background-color:teal; margin-left:5%"><i class="medium mdi-editor-format-clear"></i>Clear view</button> -->
									<a href="{{URL::to('/transaction/billing-payment-bill-customer')}}" class="right btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to proceeed to billing process" style="background-color:teal"><i class="medium mdi-action-payment" style="margin-right:15px;"></i>Save Payment</a>
								</div>

								</div>
							</div>
						</div>
				    </div>

				    <!--<div class="col hide-on-small-only m3 l2" style="margin-top:60px">
				    	
				    	<a href="{{URL::to('/transaction/billing-collection')}}" class="btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to view collections" style="padding-left:10px; padding-right:10px; background-color:#b2dfdb; opacity:0.95; color:black; margin-bottom:30px;"><b>View Collections</b></a>
				    	<a href="" class="btn tooltipped" data-position="bottom" data-delay"50" data-tooltip="Click to check for incoming deadlines" style="padding-left:13.5px; padding-right:13.5px; background-color:#b2dfdb; opacity:0.95; color:black;"><b>Review Deadlines</b></a>
				    </div>-->


				</div>
			
        

		</div>
	</div>


@stop

@section('scripts')

	<script>
	  $(document).ready(function() {
	    $('select').material_select();
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

	 <script type="text/javascript">
	 	$(document).ready(function() {

	 		// var customer_type = ;

	 		// 	if(customer_type == "ind") {
	 		// 		$("#custtype").text("Individual");
	 		// 	}
	 		// 	else if(customer_type == "comp") {
				// 	$("#custtype").text("Company");
	 		// 	}
	 	});
	 </script>

	 <script>
	 	// var type = $('#cust_type');

	 	// type.change(function() {
	 	// 	updateUI();
	 	// });

	 	// function updateUI () {
	 	// 	$('.customer').hide();

	 	// 	var typeValue = type.val();

	 	// 	if(typeValue == '')
	 	// }
	 </script>

	<script>

	    $(document).ready(function() {
	      $('select').material_select();
	    });

	</script>

	<script>
	function tabInit() {
    $('ul.tabs').tabs();
	}

	$.ajax({
	    type: "GET",
	    //Url to the XML-file
	    url: "transaction/payment/individual/home",
	    dataType: "blade.php",
	    success: tabInit
	});
	</script>


@stop