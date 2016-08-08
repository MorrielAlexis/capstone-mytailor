@extends('layouts.master')

@section('content')


	<div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><center><h3><b>Welcome to <font color="white">MyTailor</font></b></h3></center></span>
        <center><h5>Walk-in Individual - Payout</h5></center>
      </div>
    </div>

	<div class="row" style="padding:30px">
        
        <ul class="col s12 breadcrumb">
			<li><a style="padding-left:200px"><b>1.FILL-UP FORM</b></a></li>
			<li><a style="padding-left:200px"><b>2.ADD MEASUREMENT DETAIL</b></a></li>
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

	       <!-- 	<div class="col s12 left">
		        <a href="{{ URL::to('generate-payment-receipt') }}" class="right btn-floating tooltipped btn-large green" data-position="bottom" data-delay="50"  data-tooltip="CLick to print a receipt for current transaction" href="#!" style="color:black; margin-right:35px; margin-left: 20px;"><i class="large mdi-action-print"></i></a>
		    </div>
 -->
	       	<div class="row" style="background-color:white; padding:40px">
	            <div class="col s12"> 

	            	<div class="col s12" style="margin-bottom:20px">
	            		<div class="col s6">
	            			<div class="col s6" style="color:gray;padding-left:50px;padding-top:15px"><p>Transaction No.:</p></div>
			      			<div class="col s6" style="color:red;"><p><input value="{{ $joID }}" id="transac_no" name="transac_no" type="text" class="" readonly></p></div>
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

					<div class="col s6 overflow-x" style="min-height:200px; max-height:350px; border: 3px gray solid; padding:20px">
						<div class="col s12">
		                    <label style="font-size:20px; color:dimgray;"><center><b>Order Summary</b></center></label>
		                        <div class="col s12" style="margin-bottom:30px"><div class="divider" style="height:2px; background-color:teal"></div></div>
		                        <table class = "table centered order-summary z-depth-1" border = "1">
				       				<thead style="color:gray">
					          			<tr>
						                  <th data-field="product">Product</th>    
						                  <th data-field="fabric">Fabric</th>
						                  <th data-field="price">Unit Price</th>
						              	</tr>
					              	</thead>
					              	<tbody>
					              		@foreach($segments as $segment)
								            <tr>
								                <td>{{ $segment->strGarmentCategoryName }}, {{ $segment->strSegmentName }}</td>
												<td>{{ $segment->strFabricName }}</td>
								                <td>{{ number_format(($segment->dblSegmentPrice + $segment->dblFabricPrice) , 2) }} PHP</td>
								            </tr>
							            @endforeach
							        </tbody>
							    </table>					
						</div>
						<div class="col s12" style="margin-bottom:38px"></div>
					</div>

					<!--For the design summary-->
					<div class="col s6 overflow-x" style="min-height:200px; max-height:350px; border: 3px gray solid; padding:20px">
					<label style="font-size:20px; color:dimgray;"><center><b>Design Summary</b></center></label>
		                        <div class="col s12" style="margin-bottom:20px"><div class="divider" style="height:2px; background-color:teal"></div></div>
					@foreach($segments as $segment)
						<div class="col s12">
			      			<p style="color: teal">Design for <b>{{ $segment->strGarmentCategoryName }} - {{ $segment->strSegmentName }}</b></p>
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
				              	@for($i = 0; $i < count($segments); $i++)
									@for($j = 0; $j < count($styles[$i]); $j++)
										@if($styles[$i][$j]->strSegmentID == $segment->strSegmentID)
							            <tr>
							               <td>{{ $styles[$i][$j]->strSegStyleName }}</td>
							               <td>{{ $styles[$i][$j]->strSegPName }}</td>
							               <td>{{ number_format($styles[$i][$j]->dblPatternPrice, 2) }} PHP</td>
							            </tr>
							            @endif
							        @endfor
							    @endfor
						        </tbody>
						    </table>

						    <div class="col s12"><div class="divider" style="height:2px"></div></div>
						</div>	
					@endforeach
					</div>
		      		<!--End of design summary-->

					<div class="col s12" style="margin:10px"></div>
					{!! Form::open(['url' => 'transaction/walkin-individual-save-order', 'method' => 'POST']) !!}
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
							
							<input type="hidden" id="transaction_date" name="transaction_date" />

		      				<div class="col s4" style="color:gray; font-size:15px"><p><b>Amount Payable</b></p></div>
		      				<div class="col s8" style="color:red;"><p><input value="" id="amount-payable" name="amount-payable" type="text" class="" readonly></p></div>

		      			<!--	<div class="col s4" style="color:gray; font-size:15px"><p><b>Additional Charge (*)</b></p></div>
		      				<div class="col s8" style="color:red;"><p><input value="" id="add-charge" name="add-charge" type="text" class="" readonly></p></div> -->

		      				<div class="col s4" style="color:gray; font-size:15px"><p><b>Remaining Balance</b></p></div>
		      				<div class="col s8" style="color:red;"><p><input value="" id="balance" name="balance" type="text" class="" readonly></p></div>		

						</div>

						<div class="col s6 z-depth-1" style="border-left:2px gray solid">
							<h5 style="color:teal"><b>Payment</b></h5>
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
										<div class="col s5" style="padding-top:10px"><h5><font color="teal"><center><b>Due Date</b></center></font></h5></div>
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


                    		<!--start of bottom button-->
                    		<div class="col s12" style="margin-top:20px">
	                    		<button type="submit" class="right btn tooltipped" data-position="top" data-delay="50" data-tooltip="Click to save payment information and get measured" style="background-color:#00695c; padding:9.5px; padding-bottom:45px; margin-top:20px; margin-left:30px"><label style="font-size:15px; color:white"><b>Save Order</b></label></button>
					{!! Form::close() !!}
							<!--end of bottom button-->
	            </div>
	        </div>

	        <div class="divider" style="height:2px; margin-bottom:20px; margin-top:30px"></div>
	      	
	      	<center><p><font color="gray">End of Payment Information Form</font></p></center>
	
	    </div>
	    <!-- End of Tab for Payment-->

	</div>

@stop

@section('scripts')

	<script type="text/javascript">
		$(document).ready(function(){
			$('select').material_select();

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

			var a = {!! json_encode($segments) !!};
			var b = {!! json_encode($styles) !!};

			var totalAmount = 0.00;
			var minDays = 0;

			for(var i = 0; i < a.length; i++){
				totalAmount += a[i].dblSegmentPrice;
				totalAmount += a[i].dblFabricPrice;
					for(var j = 0; j < b[i].length; j++){
						totalAmount += b[i][j].dblPatternPrice;
					}
				minDays += a[i].intMinDays;
			}

			var monthNames = [ "January", "February", "March", "April", "May", "June",
		    "July", "August", "September", "October", "November", "December" ];
			var dayNames= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]

			var newDate = new Date();
			var dueDate = new Date();

			newDate.setDate(newDate.getDate());   
			dueDate.setDate(newDate.getDate()+minDays); 

			$('#total_price').val(totalAmount.toFixed(2));
			$('#due-date').text(dayNames[dueDate.getDay()] +" | " +" " + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + "," + ' ' + newDate.getFullYear());
			$('#transaction_date').val(newDate.getFullYear() + "-" +  (newDate.getMonth()+1) + "-" + newDate.getDate());
			$('#due_date').val(dueDate.getFullYear() + "-" +  (dueDate.getMonth()+1) + "-" + dueDate.getDate())
		});
	</script>

	<script>
		$('.payment').change(function(){
				if($('#half_pay').prop("checked")){

					var a = {!! json_encode($segments) !!};
					var b = {!! json_encode($styles) !!};
					var totalAmount = 0.00;

					for(var i = 0; i < a.length; i++){
						totalAmount += a[i].dblSegmentPrice;
						totalAmount += a[i].dblFabricPrice;
							for(var j = 0; j < b[i].length; j++){
								totalAmount += b[i][j].dblPatternPrice;
							}
					}
					
					$('#amount-payable').val((totalAmount/2).toFixed(2) + ' PHP');
					$('#balance').val((totalAmount - (totalAmount/2)).toFixed(2) + ' PHP');
				}

				if($('#full_pay').prop("checked")){

					var a = {!! json_encode($segments) !!};
					var b = {!! json_encode($styles) !!};	

					var totalAmount = 0.00;

					for(var i = 0; i < a.length; i++){
						totalAmount += a[i].dblSegmentPrice;
						totalAmount += a[i].dblFabricPrice;
							for(var j = 0; j < b[i].length; j++){
								totalAmount += b[i][j].dblPatternPrice;
							}
					}
					
					$('#amount-payable').val(totalAmount.toFixed(2) + ' PHP');
					$('#balance').val((totalAmount - totalAmount).toFixed(2) + ' PHP');
				}
		});

		$('#amount-tendered').blur(function(){	
			var amountChange = $('#amount-tendered').val() - $('#amount-to-pay').val();
			$('#amount-change').val(amountChange.toFixed(2) + ' PHP');
		});

		$('#amount-to-pay').blur(function(){	
			// if($('#amount-to-pay').val() > $('#total_price').val()){
			// 	alert("You can't choose to pay more than the total.");
			// 	$('#amount-to-pay').val("");
			// }
				var amountChange = $('#amount-tendered').val() - $('#amount-to-pay').val();
				$('#amount-change').val(amountChange.toFixed(2) + ' PHP');	
				$('#outstanding-bal').val(($('#total_price').val() - $('#amount-to-pay').val()).toFixed(2) + ' PHP');				

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
	
	<script type="text/javascript">
		var monthNames = [ "January", "February", "March", "April", "May", "June",
	    "July", "August", "September", "October", "November", "December" ];
		var dayNames= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]

		var newDate = new Date();
		newDate.setDate(newDate.getDate());    
		$('#Date').html(dayNames[newDate.getDay()] +" | " +" " + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + "," + ' ' + newDate.getFullYear());
   	 	$('#transaction_date').val(newDate.getFullYear() + "-" +  (newDate.getMonth()+1) + "-" + newDate.getDate());

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

@stop