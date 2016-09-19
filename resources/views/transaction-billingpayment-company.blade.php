@extends('layouts.master')

@section('content')


	<div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><center><h3><b>Welcome to <font color="white">MyTailor</font></b></h3></center></span>
        <center><h5>Payment - Company Customer</h5></center>
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
										{!! Form::open(['url' => 'transaction/payment/company/company-info', 'method' => 'GET']) !!}
										<div class="col s12 customer" style="background-color: #e0f2f1; padding-top:3%; padding-bottom:3%">
												<div style="color:black" class="col s12">                   					                          
						                          	<div class="col s3" style="color:black; margin-top:2%"><center><b>COMPANY NAME:</b></center></div>
						                          	<div class="col s9"><input style="border:3px teal solid; padding:5px; padding-left:10px; background-color:white; color:teal" id="cust_name" name="cust_name" type="text" placeholder="ex. Honey Buenavides"></div>					                         			                          	
						                        </div>

					                         <button class="right btn" type="submit" id="getCustomer" style="background-color:#004d40; color:white">Start Payment</button> 
				                    	</div>
				                    	<div class="col s12" style="margin-top:30px"><div class="divider" style="height:3px; color:gray"></div></div>

									<!-- Customer Info -->
										@if($customer_info == null)
										<div class="row" id="success-message">
								          <div class="col s12 m12 l12">
								            <div class="card-panel yellow accent-1">
											<span class="alert alert-success"> 
												<b>{{ $search_custname }}</b> does not exist as a customer of the shop. <font color="gray">Kindly check your spelling.</font>
								              	<!-- <i class="right tiny mdi-navigation-close" onclick="$('#success-message').hide()"></i>	 -->						              	
								              </span>							             
								             </div>
								            </div>
								        </div>


								        @elseif(!($customer_info == null))
										<div class="col s12" style="margin-top:10px">
											<div class="col s12">
					                    		<div style="color:black" class="col s12">     
					                    			<div class="col s3" style="color:teal; margin-top:4%"><b>Company Name:</b></div>            
						                          	<div class="col s9" style="color:black; margin-top:3%; padding:0; font-size:18px"><b>{{ $customer_info->strCompanyName }}</b></div>
					                        	</div>
					                    	</div>
											<div class="col s12">
												<div style="color:black" class="col s12">  
													<div class="col s3" style="color:teal; margin-top:4%;"><b>Customer ID:</b></div>               
						                          	<div class="col s9" style="color:black; margin-top:3%; padding:0; font-size:18px"><b>{{ $customer_info->strCompanyID }}</b></div>
						                        </div>
					                    	</div>
					                    	<div class="col s12">
					                    		<div class="col s12">
					                    			@if(count($customer_info->strPaymentID) == 0)
							                    	<div class="col s12" style="margin-top:1%"><div class="divider" style="height:3px; color:gray; margin-bottom:4%"></div></div> 
							                    		<div class="center col s12" style="color:teal; padding:5%; font-size:15px;">
							                    			<center><b>*** Customer has no pending balance ***</b></center>
							                    		</div>	
						                    		
						                    		<div class="col s9">				                    				
							                    		@elseif(count($customer_info->strPaymentID) != 0)
							                    		<div class="col s7" style="color:black; margin-top:3%; padding:0; font-size:18px;"><b></b>

							                    		</div>
						                    		</div>

						                    		<div class="col s12">
						                    			<div class="col s12">
							                    			<div class="col s3" style="color:teal; margin-top:1%; padding:0"><b>Pending Payment(s):</b></div>
							                    			<div class="col s9" style="color:white; background-color: gray; margin-top:1%; padding:0"><font style="padding-left:4%">Kindly settle unpaid payment(s) before or on due date</font></div>
							                    		</div>
							                    		<!--eto ang iloloop beybe-->
							                    		<div class="col s12" style="padding-left:15%">
							                    		@foreach($customer_orders as $j => $order)
														@foreach($payments as $i => $payment)

														@if($order->strTermsOfPayment == "Full Payment")
						                    				 
						                    				<div @if($payment->strTransactionFK != $order->strJobOrderID) hidden @endif> You have no pending payment</div>

														@elseif($order->strTermsOfPayment != "Full Payment")
							                    			<div class="col s12 {{$payment->strJobOrderID}}{{$i+1}}" style="color:black; margin-top:3%; padding:0; font-size:18px" id="{{$payment->strJobOrderID}}{{$i+1}}" @if($payment->strTransactionFK != $customer_info->strJobOrderID) hidden @endif>{{ $order->dtOrderDate }} {{ $order->strJobOrderID }}</b>
						                    				<!-- <a href=""><u>See transaction detail</u></a> -->
						                    				<a class="{{$payment->strJobOrderID}}{{$i+1}}" style="background-color:#ef9a9a; color:white; padding-left:3%; padding-right:3%" id="{{$payment->dtPaymentDueDate}}">Due date: {{$payment->dtPaymentDueDate }}</a>
						                    				</div>					                    				

							                    			@endif
							                    			@endforeach
							                    			@endforeach
							                    		</div>
							                    		<!--ends here-->
						                    		</div>
						                    		
					                    		</div>
					                    	</div>
					                    	<div class="col s12" style="margin-top:3%"><div class="divider" style="height:3px; color:gray; margin-bottom:4%"></div></div>           							                    												
										</div><!--End of customer info-->



										<!--Select Transaction to pay-->
										<div class="col s12" style="padding-left:5%">
											<div class="input-field col s9">
												<div class="container">
													<select class="browser-default unpaid-payments" id="unpaid-payments" style="margin-left:45%">
														<option value="0">Choose your option</option>
														@foreach($customer_orders as $j => $order)
															@foreach($payments as $i => $payment)													
															@if($order->strTermsOfPayment != "Full Payment")
															<option value="{{ $payment->strJobOrderID }}" @if($payment->strTransactionFK != $customer_info->strJobOrderID) hidden @endif>{{ $order->dtOrderDate }} {{ $order->strJobOrderID }}</option>
															@endif
															@endforeach
														@endforeach
													</select>
												</div>
												<label style="color:teal"><b>Choose a transaction date to pay:</b></label>
											</div>
										</div>	

										<!--Actual payment here-->
										<div class="col s12" style="margin-top:30px">
											<div class="col s7">
												<div class="card-panel">
													<div class="card-content">
														<div class="row" id="pay_form" style="display:none">
														@foreach($payments as $payment)
														@if($payment->strTransactionFK == $customer_info->strJobOrderID)
															<div class="payment-summary{{ $payment->strJobOrderID}}">
																<div style="color:black" class="input-field col s7">                 
										                          <input style="margin-left:80%; padding:1%; padding-left:1%" type="text" class="" name="amount-to-pay" id="amount-to-pay">
										                          <label style="color:teal; margin-top:1%; margin-left:2%"><b>Job Order Total Price:</b></label>
										                        </div>

										                        <div style="color:black" class="input-field col s7">                 
										                          <input style="margin-left:80%; padding:1%; padding-left:1%" type="text" class="" name="amount-paid" id="amount-paid">
										                          <label style="color:teal; margin-top:1%; margin-left:2%"><b>Total Amount Paid:</b></label>
										                        </div>

										                        <div style="color:black" class="input-field col s7">                 
										                          <input style="margin-left:80%; padding:1%; padding-left:1%; color:teal" type="text" class="" name="outstanding-bal" id="outstanding-bal">
										                          <label style="color:teal; margin-top:1%; margin-left:2%"><b>Outstanding Balance:</b></label>
										                        </div>
								                        	</div>
								                        @endif
								                    	@endforeach
								                    {!! Form::close() !!} 
								        		

								                        <div class="col s12" style="margin-top:3%"><div class="divider" style="height:3px; color:gray"></div></div>
								                    	{!! Form::open(['url' => 'transaction/payment/company/save-payment', 'method' => 'POST']) !!}
								                    	<div class="payment-form" id="payment-form" style="display:block">
									                        <div style="color:black" class="input-field col s7">                 
									                          <input style="margin-left:80%; padding:1%; padding-left:1%; border:3px gray solid" name="amount-tendered" id="amount-tendered" type="text" class="">
									                          <label style="color:black; margin-top:1%; margin-left:2%"><b>Amount Tendered:</b></label>
									                        </div>

									                        <div style="color:black" class="input-field col s7">                 
									                          <input style="margin-left:80%; padding:1%; padding-left:1%; border:3px gray solid" name="amt-to-pay" id="amt-to-pay" type="text" class="">
									                          <label style="color:black; margin-top:1%; margin-left:2%"><b>Amount to Pay :</b></label>
									                        </div>

									                        <div class="container">
										                        <div style="color:black" class="input-field col s7">                 
										                          <input style="margin-left:80%; padding:1%; padding-left:1%; border:3px gray solid" name="amount-change" id="amount-change" type="text" class="">
										                          <label style="color:teal; margin-top:1%; margin-left:40px"><b>Change:</b></label>
										                        </div>
									                    	</div>

									                    	<div hidden style="color:black" class="input-field col s7">                 
									                          <input style="margin-left:180px; padding:5px; padding-left:10px; border:3px gray solid" name="payment-info" type="text" class="">
									                          <label style="color:teal; margin-top:5px; margin-left:20px"><b>Remaining Balance:</b></label>							                          
									                        </div>

									                        <div class="col s12" hidden>
									                        	<center><p style="color:gray">*** Pay balance before or on <font color="teal"><b><u>"DECEMBER 25, 2016"</u></b></font> ***</p></center>
									                        </div>

									                        <div style="color:black" class="input-field col s7">                 
									                          <input style="margin-left:180px; padding:5px; padding-left:10px;" value="Honey May Buenavides - Cashier" name="payment-info" type="text" class="">
									                          <label style="color:black; margin-top:5px; margin-left:20px"><b>Process Done By:</b></label>							                          
									                        </div>
														
															<div class="col s12" style="margin-top:30px">
																<a hidden href="{{ URL::to('billing-payment/payment-receipt-pdf') }}" class="left btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to print a copy of receipt" style="background-color:teal"><i class="large mdi-action-print" style="font-size:30px"></i></a>
																<button type="submit" href="" class="right btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="CLick to save data" style="background-color:teal; margin-left:20px">Save</button>
																<a href="" class="right btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to clear all fields for payment process" style="background-color:teal">Cancel</a>
															</div>
														</div>
														{!! Form::close() !!}
														</div>
													</div>
												</div>
											</div>

											<div class="col s5">
												<div class="card-panel">
													<div class="card-content">
													@foreach($customer_orders as $j => $order)
													@foreach($payments as $i => $payment)
													@if($order->strTermsOfPayment != "Full Payment")
														<div class="row" id="or_summary" style="display:none">
														
															<center><h6><b>ORDER SUMMARY</b></h6></center>
															<div class="col s12" style="margin-top:10px"><div class="divider" style="height:3px; color:gray"></div></div>
													
															<!--In case of multiple pending transactions...-->
															<div  class="col s6">
																<h6>Order No.: <p style="color:teal"><b>ORN 001</b></p></h6>
															</div>

															<div  class="col s6">
																<h6>Transaction Date: <p style="color:teal"><b>2016-05-03</b></p></h6>
															</div>

															<div class="col s12">
																<table class="table centered order-summary">
																	<thead style="color:gray">
																		<th>Product Code</th>
																		<th>Quantity</th>
																		<th>Unit Price</th>
																	</thead>
																	<tbody>
																		<tr>
																			<td>GAR 0001</td>
																			<td>5</td>
																			<td>P 600.00</td>
																		</tr>
																	</tbody>
																</table>

																<center><a href="#summary-of-order" class="btn modal-trigger tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to view summary of orders" style="background-color:teal">View Order Details</a></center>
															</div>

															<div class="col s12"><div class="divider" style="height:2px; color:gray; margin-top:15px; margin-bottom:15px"></div></div>
														</div>
														@endif
														@endforeach
														@endforeach
													</div>
												</div>
											</div>
										@endif
										@endif       							                    												
								
									</div>
									
							</div>
						</div>
				    </div>
				</div>
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

	<script>

		var amount_to_pay = 0.00;
		var amount_paid = 0.00;
		var bal = 0.00;

		var form = document.getElementById('pay_form');
		var summary = document.getElementById('or_summary');

		$('#unpaid-payments').change(function(){
			var orders = {!! json_encode($customer_orders) !!}
			var payment = {!! json_encode($payments) !!}

				
		for(var i = 0; i < payment.length; i++){
		
				amount_to_pay = payment[i].dblOrderTotalPrice;
				amount_paid = payment[i].dblAmountToPay;
				bal = payment[i].dblOutstandingBal;

			if($('#unpaid-payments').val() == payment[i].strJobOrderID)
			{
				form.style.display = "block";
				summary.style.display = "block";

				$('#amount-to-pay').val(amount_to_pay.toFixed(2)) + "PHP";
				$('#amount-paid').val(amount_paid.toFixed(2)) + "PHP";
				$('#outstanding-bal').val(bal.toFixed(2)) + "PHP";

				break;
			}
			else{

				summary.style.display = "none";
				form.style.display = "none";

			}
		}
						

		});

		$('#amount-tendered').blur(function(){	
			var amountChange = $('#amount-tendered').val() - $('#amt-to-pay').val();
			$('#amount-change').val(amountChange.toFixed(2));
		});

		$('#amt-to-pay').blur(function(){	
			// if($('#amount-to-pay').val() > $('#total_price').val()){
			// 	alert("You can't choose to pay more than the total.");
			// 	$('#amount-to-pay').val("");
			// }
				var amountChange = $('#amount-tendered').val() - $('#amt-to-pay').val();
				$('#amount-change').val(amountChange.toFixed(2));	
				// $('#outstanding-bal').val(($('#total_price').val() - $('#amount-to-pay').val()).toFixed(2) + ' PHP');				

		});

		var monthNames = [ "January", "February", "March", "April", "May", "June",
		    "July", "August", "September", "October", "November", "December" ];
			var dayNames= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]

			var newDate = new Date();
			var dueDate = new Date();

			newDate.setDate(newDate.getDate());   
			dueDate.setDate(newDate.getDate()+minDays);

			$('#due-date').text(dayNames[dueDate.getDay()] +" | " +" " + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + "," + ' ' + newDate.getFullYear());
			$('#transaction_date').val(monthNames[(newDate.getMonth()+1)] + " " + newDate.getDate() + ", " + newDate.getFullYear());
			$('#due_date').val(monthNames[(dueDate.getMonth()+1)] + " " + dueDate.getDate() + ", " + dueDate.getFullYear());
		
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
	    url: "transaction/payment/company/home",
	    dataType: "blade.php",
	    success: tabInit
	});
	</script>


@stop