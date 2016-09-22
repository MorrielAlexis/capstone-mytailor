@extends('layouts.master')

@section('content')


	<div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><center><h3><b>Welcome to <font color="white">MyTailor</font></b></h3></center></span>
        <center><h5>Walk-in Individual - Payout</h5></center>
      </div>
    </div>

	<div class="row" style="padding:30px">
        <div class="col s12" style="padding-left:15%">
	        <ul class="breadcrumb">
				<li><a><b>1.FILL-UP FORM</b></a></li>
				<li><a><b>2.ADD MEASUREMENT DETAIL</b></a></li>
				<li><a class="active" href="#payment-info"><b>3.PAYMENT</b></a></li>
			</ul>
		</div>

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
	            			<div class="col s2" style="color:gray;padding-top:15px"><p>Date:</div>
	                        <div class="col s10" id="Date" style="color:teal;padding-top:30px"></div>
                        </div>

                    </div>
					
					<label style="font-size:23px; color:teal;"><center><b>ORDER SUMMARY</b></center></label>
					<div class="col s12 overflow-x" style="min-height:300px; max-height:550px; border: 3px gray solid; padding:10px">
						<div class="col s12">	

		                        <div class="col s12" style="margin-bottom:30px"><!-- <div class="divider" style="height:2px; background-color:teal"></div> --></div>
		                        <table class="table centered" border="1">
		                        	<thead style="border:1px teal solid; background-color:rgba(54, 162, 235, 0.8)">
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
		                        	@for($i = 0; $i < count($package_values); $i++)
		                        		<tr style="border:1px teal solid">
		                        			<td style="border:1px teal solid; background-color:rgba(52, 162, 232, 0.2)"><b>1</b></td>
		                        			<td style="border:1px teal solid; padding-left:5%; padding-right:5%; background-color:rgba(52, 162, 232, 0.2)"><a class="btn-flat tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to expand and see package details" onclick="packageDetail({{ $i }})" style="color:black"><b>One (1) set {{ $package_values[$i]->strPackageName}}</b></a></td>
		                        			<td style="border:1px teal solid; padding-left:2%; padding-right:2%; background-color:rgba(52, 162, 232, 0.2)"></td>
		                        			<td style="border:1px teal solid; padding-left:2%; padding-right:2%; background-color:rgba(52, 162, 232, 0.2)"><b>P {{ number_format($style_total[$i] + $fabric_total[$i] + $segment_total[$i], 2) }}</b></td>
		                        			<td style="border:1px teal solid; padding-left:2%; padding-right:2%; background-color:rgba(52, 162, 232, 0.2)"><b>P {{ number_format($style_total[$i] + $fabric_total[$i] + $segment_total[$i], 2) }}</b></td>
		                        			<td style="border:1px teal solid; padding-left:2%; padding-right:2%; background-color:rgba(52, 162, 232, 0.2)"><b>P {{ number_format($style_total[$i] + $fabric_total[$i] + $segment_total[$i], 2) }}</b></td>
		                        		</tr>
		                        		@endfor			                        	
		                        	</tbody>
		                        </table>			
						</div>

					<!--PACKAGE DETAIL WILL BE HERE-->
					@for($i = 0; $i < count($package_values); $i++)
						
						<div class="card horizontal col s12 package-detail hidden" id="package-detail{{ $i }}" style="display:none; margin-top:3%; padding-bottom:4%; border:1px #e0f2f1 outset;">
						<i class="right mdi-navigation-close tooltipped" data-poition="bottom" data-delay="50" data-tooltip="Click to close" onclick="packageClose({{$i}})" style="font-size:30px"></i>
							<center><h7 style="padding-top:1%"><b>Package Detail for <font color="teal">{{ $package_values[$i]->strPackageName}}</font></b></h7></center>
							<table class="table centered z-depth-1">
								<thead style="background-color:rgba(255, 99, 132, 0.2)">
									<tr>
										<th style="border:1px rgba(255, 99, 132, 1) solid">Quantity</th>
										<th style="border:1px rgba(255, 99, 132, 1) solid" colspan="3">Description</th>
										<th style="border:1px rgba(255, 99, 132, 1) solid">Unit Price</th>
										<th style="border:1px rgba(255, 99, 132, 1) solid">Total Price</th>
									</tr>
									<tr>
										<th style="border:1px rgba(255, 99, 132, 1) solid"></th>
										<th style="border:1px rgba(255, 99, 132, 1) solid">Item</th>
										<th style="border:1px rgba(255, 99, 132, 1) solid"></th>
										<th style="border:1px rgba(255, 99, 132, 1) solid">Price</th>
										<th style="border:1px rgba(255, 99, 132, 1) solid"></th>
										<th style="border:1px rgba(255, 99, 132, 1) solid"></th>
									</tr>
								</thead>
								<tbody>								
		                        	@for($j = 0; $j < count($package_segments[$i]); $j++)	
										@if($package_values[$i]->strPackageID == $package_segments[$i][$j]->strPackageID)
			                        		<tr style="border:1px teal solid">
			                        			<td style="border:1px teal solid; background-color:rgba(52, 162, 232, 0.2)">{{ $segment_qty[$i][$j] }}</td>
			                        			<td style="border:none; background-color:rgba(52, 162, 232, 0.2)">{{ $package_segments[$i][$j]->strSegmentName }}</td>
			                        			<td style="border:1px teal solid; padding-top:0; padding-bottom:0; background-color:rgba(52, 162, 232, 0.2)"><br> <font color="gray"><b><i></i></b></font></td>
			                        			<td style="border:1px teal solid; padding-top:0; padding-bottom:0; background-color:rgba(52, 162, 232, 0.2)">P {{ number_format($package_segments[$i][$j]->dblSegmentPrice, 2) }}</td>
			                        			<td style="border:1px teal solid; padding-top:0; padding-bottom:0; background-color:rgba(52, 162, 232, 0.2)">P {{ number_format($package_segments[$i][$j]->dblSegmentPrice, 2) }}</td>
			                        			<td style="border:1px teal solid; padding-top:0; padding-bottom:0; background-color:rgba(52, 162, 232, 0.2)">P {{ number_format($package_segments[$i][$j]->dblSegmentPrice * $segment_qty[$i][$j], 2) }}</td>
			                        			
			                        		</tr>
			                        		<tr style="border:1px teal solid">
			                        			<td style="border:1px teal solid"></td>
			                        			<td class="right" style="border:none; color:teal; padding-right:10%">Fabric Name</td>
			                        			<td style="border:1px teal solid">{{ $segment_fabrics[$i][$j]->strFabricName }}</td>
			                        			<td style="border:1px teal solid">P {{ number_format($segment_fabrics[$i][$j]->dblFabricPrice, 2)}}</td>
			                        			<td style="border:1px teal solid"></td>
			                        			<td style="border:1px teal solid"></td>		                        			
		                        			</tr>
				                        	<tr style="border:1px teal solid">
				                        		<td style="border:1px teal solid"></td>
				                        		<td class="right" style="border:none; color:teal; padding-right:10%">Style Name and Pattern</td>
				                        		<td style="border:1px teal solid">{{ $segment_patterns[$i][$j][0]->strSegStyleName }}<br> <font color="gray"><b><i>{{ $segment_patterns[$i][$j][0]->strSegPName }}</i></b></font></td>
				                        		<td style="border:1px teal solid">P {{ number_format($segment_patterns[$i][$j][0]->dblPatternPrice, 2		) }}</td>
				                        		<td style="border:1px teal solid"></td>
				                        		<td style="border:1px teal solid"></td>		                        			
			                        		</tr>
			                        	@endif
									@endfor
									
								</tbody>
							</table>
						</div>
						
					@endfor
					<div class="col s12" style="margin-bottom:38px"></div>
					</div>


					<div class="col s12" style="margin:10px"></div>
					{!! Form::open(['url' => 'transaction/walkin-company-save-order', 'method' => 'POST']) !!}
						<div class="col s6">
							<h5 style="color:teal"><b>Price Quotation*</b></h5>
							<span>Determine terms of payment to get payment details</span>

							<!--Eto yung mga pinapadagdag non sa Capstone-->
							<!--Ikinoment ko muna dahil hindi naman yata pina-require sa soft eng..... ADD NOTE: Dahil tapos na ang SOFTENG!!!-->
							
							<div class="col s12 z-depth-2" style=" padding:2%; margin-top:2%">
								
								<div class="col s12">
									<div class="col s4" style="color:gray; font-size:15px"><p><b>Estimated Total Sales</b></p></div>
			      					<div class="col s8" style="color:gray;"><p><input id="estimated_total_sales" name="estimated_total_sales" type="text" class="" readonly><b></b></p></div>
								</div>

								<div class="col s12">
									<div class="col s4" style="color:gray; font-size:15px"><p><b>VAT ({{ $vat }}%)</b></p></div>
			      					<div class="col s8" style="color:gray;"><p><input id="vat_price" name="vat_price" type="text" class="" readonly><b></b></p></div>
								</div>

							</div>

							<div class="col s12"><div class="divider" style="margin:15px; height:5px"></div></div>
							
							<!-- <div class="col s4" style="color:gray; font-size:15px"><p><b>Total Labor Price</b></p></div>
			      			<div class="col s8" style="color:gray;"><p><input id="style_price_total" name="style_price_total" type="text" class="" readonly><b></b></p></div> -->

			      			<div class="col s4" style="color:black; font-size:15px"><p><b>Grand Total</b></p></div>
			      			<div class="col s8" style="color:black;"><p><input id="total_price" name="total_price" type="text" class="" readonly style="font-size:3em"></p></div>
							<input type="hidden" name="hidden_total_price" id="hidden_total_price">						

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
	                          	<div class="col s8"><b><input readonly style="padding:5px; border:3px gray solid; font-size:1.5em" id="amount-payable" name="amount-payable" type="text" class="right"></b></div>
	                        	<input type="hidden" id="hidden-amount-payable" name="hidden-amount-payable">
	                        </div>

	                        <div style="color:black" class="col s12"> 
								<div class="col s4"><p style="color:black; margin-top:5px; font-size:15px"><b>Outstanding Balance*:</b></p></div>                
	                          	<div class="col s8" style="color:black;"><b><input readonly style="padding:5px; border:3px gray solid; font-size:1.5em" id="balance" name="balance" type="text" class="right"></b></div>
	                        	<input type="hidden" name="hidden-balance" id="hidden-balance">
	                        </div>

	                        <div style="color:black" class="col s12"> 
								<div class="col s4"><p style="color:black; margin-top:5px; font-size:15px"><b>Amount Tendered:</b></p></div>                
	                          	<div class="col s8"><input style="padding:5px; border:3px gray solid; font-size:1em" name="amount-tendered" id="amount-tendered" type="number" class="right"><right></right></div>	                          
	                        </div>

	                        <div style="color:black" class="col s12"> 
								<div class="col s4"><p style="color:black; margin-top:5px; font-size:15px"><b>Change*:</b></p></div>                
	                          	<div class="col s8" style="color:black;"><input readonly style="padding:5px; border:3px gray solid; font-size:1em" name="amount-change" id="amount-change" type="text" class="right"></div>
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
	                    		<button type="submit" class="right btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to save data and proceed to next step" style="margin-left:40px; background-color:#00695c; color:white"><b><i class="mdi-navigation-check" style="padding-right:10px"></i>Save Order</b></button> 
									
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

	        <div class="col s12"><div class="divider" style="height:2px; margin-bottom:20px; margin-top:30px"></div></div>
	      	
	      	<center><p><font color="gray">End of Payment Information Form</font></p></center>
	
	    </div>
	    <!-- End of Tab for Payment-->

	</div>

@stop

@section('scripts')

	<script type="text/javascript">
		$(document).ready(function(){
			$('select').material_select();
		    	$('body').on('load', 'ul.tabs', function() {
		   	 	$('ul.tabs').tabs();
				});
		  		
		  		$("#addMeasurementDetail").on('click', function(){
		/*  			setTimeout(function(){
		  				$('ul.tabs').tabs();
		  				$('#tabMeasurementDetail').style('display', 'block');
		  			}, 2000);
		*/  	});
		  	var a = {!! json_encode($style_total) !!};
		  	var b = {!! json_encode($fabric_total) !!};
		  	var c = {!! json_encode($segment_total) !!};
		  	var vat = {!! json_encode($vat) !!};

		  	var total = 0;
		  	for(var i = 0; i < a.length; i++)
		  	{
		  		total += a[i] + b[i] + c[i];
		  	}

		  	$('#estimated_total_sales').val(((total - (total * (vat/100))).toFixed(2)).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
		  	$('#vat_price').val(((total * (vat/100)).toFixed(2)).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
		  	$('#total_price').val((total.toFixed(2)).replace(/\B(?=(\d{3})+(?!\d))/g, ","));
		  	$('#hidden_total_price').val(total.toFixed(2));

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
		});
	</script>

	<script>
		$('.payment').change(function(){
				if($('#half_pay').prop("checked")){
				  	var a = {!! json_encode($style_total) !!};
				  	var b = {!! json_encode($fabric_total) !!};
				  	var c = {!! json_encode($segment_total) !!};
				  	var total = 0;
				  	for(var i = 0; i < a.length; i++)
				  	{
				  		total += a[i] + b[i] + c[i];
				  	}
					$('#hidden-amount-payable').val((total/2).toFixed(2));
					$('#amount-payable').val(((total/2).toFixed(2)).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
					$('#balance').val(((total - (total/2)).toFixed(2)).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
					$('#hidden-balance').val((total - (total/2)).toFixed(2));
				}
				if($('#full_pay').prop("checked")){
				  	var a = {!! json_encode($style_total) !!};
				  	var b = {!! json_encode($fabric_total) !!};
				  	var c = {!! json_encode($segment_total) !!};
				  	var total = 0;
				  	for(var i = 0; i < a.length; i++)
				  	{
				  		total += a[i] + b[i] + c[i];
				  	}
					
					$('#hidden-amount-payable').val(total.toFixed(2));
					$('#amount-payable').val((total.toFixed(2)).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
					$('#balance').val(((total - total).toFixed(2)).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
					$('#hidden-balance').val((total - (total)).toFixed(2));
				}
		});
		$('#amount-tendered').blur(function(){	
			var amountChange = $('#amount-tendered').val() - $('#hidden-amount-payable').val();
			if($('#amount-tendered').val() == ''){
				$('#amount-change').val('');
			}else{
				$('#amount-change').val(amountChange.toFixed(2));
			}
		});
		$('#amount-payable').blur(function(){	
			// if($('#amount-to-pay').val() > $('#total_price').val()){
			// 	alert("You can't choose to pay more than the total.");
			// 	$('#amount-to-pay').val("");
			// }
				var amountChange = $('#amount-tendered').val() - $('#hidden-amount-payable').val();
				$('#amount-change').val(amountChange.toFixed(2));	
				// $('#outstanding-bal').val(($('#total_price').val() - $('#amount-to-pay').val()).toFixed(2) + ' PHP');				
				var a = {!! json_encode($style_total) !!};
				var b = {!! json_encode($fabric_total) !!};
				var c = {!! json_encode($segment_total) !!};
				var total = 0;
				for(var i = 0; i < a.length; i++)
				{
					total += a[i] + b[i] + c[i];
				}
				var payable = $('#amount-payable').val();
				if(event.which >= 37 && event.which <= 40){
			        event.preventDefault();
			    }
			    if(payable == ''){
					$('#balance').val('');
				}else if(payable > total){
					alert("You can't pay more than the total.")
				}else{
					$('#balance').val((total - payable).toFixed(2));	
				}
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
	
	<script>
		$(document).ready(function(){
			$("#confirm-submission").on('click', function(){
				// window.open($this.)
			});
		});
	</script>

	<script type="text/javascript">
	
	// $('#button').on('click', function() {
	// 	$('#custId').show();
	// 	$('#custId').style.display = "block";
	// });
	function packageDetail(value) 
	{
		document.getElementById('package-detail' + value).style.display = "block";
		
	}
	function packageClose(value) 
	{
		document.getElementById('package-detail' + value).style.display = "none";
		
	}
</script>

@stop