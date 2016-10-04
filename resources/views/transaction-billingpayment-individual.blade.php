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
						                          	<div class="col s9"><input style="border:3px teal solid; padding:5px; padding-left:10px; background-color:white; color:teal" id="cust_name" name="cust_name" type="text" placeholder="Input complete name here"></div>					                         			                          	
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
					                    			<div class="col s3" style="color:teal; margin-top:4%"><b>Customer Name:</b></div>            
						                          	<div class="col s9" style="color:black; margin-top:3%; padding:0; font-size:18px"><b>{{ $customer_info->fullname }}</b></div>
					                        	</div>
					                    	</div>
											<div class="col s12">
												<div style="color:black" class="col s12">  
													<div class="col s3" style="color:teal; margin-top:4%;"><b>Customer ID:</b></div>               
						                          	<div class="col s9" style="color:black; margin-top:3%; padding:0; font-size:18px"><b>{{ $customer_info->strIndivID }}</b></div>
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
					                    		</div>

					                    		<div class="col s12">
					                    			<div class="col s12">
						                    			<div class="col s3" style="color:teal; margin-top:1%; padding:0"><b>Pending Payment(s):</b></div>
						                    			<div class="col s9" style="color:white; background-color: gray; margin-top:1%; padding:0"><font style="padding-left:4%">Kindly settle unpaid payment(s) before or on due date</font></div>
						                    		</div>
						                    		<!--eto ang iloloop beybe-->
						                    		<div class="col s12" style="padding-left:15%">
						                    		
															@for($j = 0; $j < count($orders); $j++)

															@if($orders[$j]->strTermsOfPayment == "Full Payment")

						                    					<div @if($orders[$j]->strTransactionFK != $customer_info->strJobOrderID) hidden @endif> You have no pending payment</div>

						                    					
															@elseif($orders[$j]->strTermsOfPayment != "Full Payment")
																@if($orders[$j]->strPaymentStatus == "Pending")
																	
																	
									                    			<div class="col s12 {{$orders[$j]->strJobOrderID}}" style="color:black; margin-top:3%; padding:0; font-size:18px" id="{{$orders[$j]->strJobOrderID}}"><center><strong><font color="gray">( {{$j+1}} )</font> {{ $orders[$j]->dtOrderDate }} {{ $orders[$j]->strJobOrderID }}</strong>
								                    				<!-- <a href=""><u>See transaction detail</u></a> -->
								                    				<a class="{{$orders[$j]->strJobOrderID}}" style="background-color:#e0f2f1; color:black; padding-left:3%; padding-right:3%" id="{{$orders[$j]->dtPaymentDueDate}}">Due date: <strong style="color:teal">{{$orders[$j]->dtPaymentDueDate }}</strong></a></center>
								                    				</div>
								                    				
								                    				
							                    				@elseif($orders[$j]->strPaymentStatus != "Pending")
								                    				@if($orders[$j]->strTransactionFK == $customer_info->strJobOrderID)
								                    					<div @if($orders[$j]->strTransactionFK != $customer_info->strJobOrderID) hidden @endif><center> You have no pending payment</center></div>
								                    				@endif
								                    			@endif				                    				
						                    					
							                    			@endif
							                    			@endfor
							                    			
							                    		
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
													<select class="browser-default unpaid-payments" id="unpaid-payments" style="margin-left:45%">

													<option value="0">Choose your option</option>
													
															@for($j = 0; $j < count($orders); $j++)											
																@if($orders[$j]->strTermsOfPayment != "Full Payment")
																	@if($orders[$j]->strPaymentStatus == "Pending")
																		<option value="{{ $orders[$j]->strJobOrderID }}">{{ $orders[$j]->dtOrderDate }} {{ $orders[$j]->strJobOrderID }}</option>	
																	@endif
																@endif
															@endfor
													
													</select>
													</div>
													<label style="color:teal"><b>Choose a transaction date to pay:</b></label>
												</div>
											</div>

									<div class="col s12" style="margin-top:30px">
										<div class="col s7">
											<div class="card-panel">
												<div class="card-content">
													<div class="row" id="pay_form" style="display:none">
													
												
													@for($i = 0; $i < count($orders); $i++)
														@if($payments[$i]->strTransactionFK == $orders[$i]->strJobOrderID)
														<div class="payment-summary {{ $payments[$i]->strJobOrderID}}">
															<div style="color:black" class="input-field col s12">                 
											                  <div class="col s8" style="padding-right: 15%"><input style="margin-left:80%; padding:1%; padding-left:1%" name="amount-to-pay" type="text" class="" id="amount-to-pay" readonly></div>
											                  <div class="col s4"><label style="color:teal; margin-top:1%; margin-left:2%"><center><b>Total Amount Due<br> <font style="opacity:0.80">(Php)</font>:</b></center></label></div>
											                </div>

											                <div style="color:black" class="input-field col s12">                 
											                  <div class="col s8" style="padding-right: 15%"><input style="margin-left:80%; padding:1%; padding-left:1%" name="amount-paid" type="text" class="" id="amount-paid" readonly></div>
											                  <div class="col s4"><label style="color:teal; margin-top:1%; margin-left:2%"><center><b>Total Amount Paid<br><font style="opacity:0.80">(Php)</font>:</b></center></label></div>
											                </div>

											                <div style="color:black" class="input-field col s12">                 
											                  <div class="col s8" style="padding-right: 15%"><input style="margin-left:80%; padding:1%; padding-left:1%; color:teal; font-style:bold" name="outstanding-bal" type="text" class="outstanding-bal" id="outstanding-bal" readonly></div>
											                  <div class="col s4"><label style="color:teal; margin-top:1%; margin-left:2%"><center><b>Outstanding Balance<br><font style="opacity:0.80">(Php)</font>:</b></center></label></div>
											                	
											                </div>
											            </div>
											          @endif
												@endfor
											           

											        <div id="summary-of-order" class="modal modal-fixed-footer" style="height:500px; width:800px; margin-top:30px">
													<h5><font color="teal"><center><b>Summary of Orders</b></center></font></h5>
														
															<div class="divider" style="height:2px"></div>
															<div class="modal-content col s12">

																<div class="col s6" style="margin-top:20px;">
																<label>This is a summary of orders:</label>
																</div>

																<div class="col s6">
																	<div class="col s6"><h6 style="color:gray">Date of Transaction:</h6></div>
																	
																	<div class="col s6"><h6 style="color:teal; margin-top:6%"><b>{{ $customer_info->dtOrderDate }}</b></h6></div>
																		
																</div>

											                        <table class="table centered" border="1">
											                        	<thead style="border:1px teal solid; background-color:rgba(54, 162, 235, 0.5)">
											                        		<tr style="border:1px teal solid">
											                        			<th style="border:1px teal solid">Quantity</th>
											                        			<th colspan="3" style="border:1px teal solid">Description</th>
											                        			<!-- <th style="border:1px teal solid; border-bottom:none">Unit Price</th> -->
											                        			<!-- <th style="border:1px teal solid">Total Price</th> -->
											                        		</tr>
											                        		<tr style="border:1px teal solid">
											                        			<th style="border:1px teal solid; border-top:none"></th>
											                        			<th style="border:1px teal solid" colspan="2">Item Name</th>
											                        			<th style="border:1px teal solid">Price</th>
											                        			<!-- <th style="border:1px teal solid"></th> -->
											                        			<!-- <th style="border:1px teal solid"></th> -->
											                        		</tr>
											                        	</thead>
											                        	<tbody style="border:1px teal solid">
											                        	@foreach($payments as $payment)
											                        		@if($payment->strTransactionFK == $customer_info->strJobOrderID)
											                        		<tr style="border:1px teal solid">
											                        			<td style="border:1px teal solid"><b>{{ $payment->intQuantity }}</b></td>
											                        			<td style="border:1px teal solid; padding-left:5%; padding-right:5%"><b>{{ $payment->strGarmentCategoryName }}, {{ $payment->strSegmentName }}</b></td>
											                        			<td style="padding-left:2%; padding-right:2%"></td>
											                        			<td style="border:1px teal solid;"><b>P {{ number_format($payment->dblSegmentPrice, 2) }}</b></td>
											                        			<!-- <td style="border:1px teal solid; background-color:rgba(52, 162, 232, 0.2)"><b>P {{ number_format($payment->dblUnitPrice, 2) }}</b></td> -->
											                        			<!-- <td style="border:1px teal solid; background-color:rgba(52, 162, 232, 0.2)"><b>P {{ number_format($payment->dblUnitPrice * $payment->intQuantity, 2) }}</b></td> -->
											                        		</tr>

											                        		
											                        		@endif
											                        	@endforeach
											                        	</tbody>
											                        </table>
															      		

															      		<div class="divider"></div>
															      		<div class="divider"></div>
																		
																      	<div class="col s12" style="margin-bottom: 5%">
																			<!-- <div class="right col s6" hidden><p style="color:gray">Estimated time to finish all orders:<p style="color:black">60 days</p></p></div> -->
																			<div class="right col s6" style="font-size:15px; margin-top: 1.5%">
																				<div class="col s6"><p style="color:gray">Terms of Payment:</p></div>

																				<div class="col s6"><p style="color:black"><font color="teal"><b>{{ $customer_info->strTermsOfPayment }}</b></font></p></div>
																			</div>
																			<div class="left col s6" style="font-size:20px">
																				<div class="col s7"><p style="color:gray">Order Total Price:</p></div>

																				<div class="col s5"><p style="color:black"><font size="+2" color="teal"><b>P {{ number_format($customer_info->dblOrderTotalPrice, 2) }}</b></font></p></div>
																			</div>
																		</div>

																		<!-- <div class="col s12" style="margin-bottom:50px">
																			<p style="color:red"><b>Due date of payment (pay balance before or on the said date):</b></p>
																		</div> -->
																		

																	</div>

															<div class="modal-footer col s12">	
												                <a class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">OK</font></a>								                
												            </div>
													
													</div><!--modal to-->
											   
								        		

								                        <div class="col s12" style="margin-top:3%"><div class="divider" style="height:3px; color:gray"></div></div>
								                    
								                    <div class="payment-form" id="payment-form" style="display:block">
								                        <div style="color:black" class="input-field col s12">                 
								                          <div class="col s8"><input style="margin-left:60%; padding:1%; padding-left:1%; border:3px gray solid" name="amount-tendered" id="amount-tendered" type="text" class="" onkeypress='return event.charCode >= 48 && event.charCode <= 57'></div>
								                          <div class="col s4"><label style="color:black; margin-top:1%; margin-left:2%"><center><b>Amount Tendered<br><font style="opacity:0.80">(Php)</font>:</b></center></label></div>
								                        </div>

								                        <div style="color:black" class="input-field col s12">                 
								                          <div class="col s8"><input style="margin-left:60%; padding:1%; padding-left:1%; border:3px gray solid" name="amount-payable" id="amount-payable" type="text" class=""  onkeypress='return event.charCode >= 48 && event.charCode <= 57' ></div>
								                          <div class="col s4"><label style="color:black; margin-top:1%; margin-left:2%"><center><b>Amount to Pay<br> <font style="opacity:0.80">(Php)</font>:</b></center></label></div>
								                        </div>

								                        <div class="container">
									                        <div style="color:black" class="input-field col s12">                 
									                          <div class="col s8"><input readonly style="margin-left:55%; padding:1%; padding-left:1%; border:3px gray solid" name="amount-change" id="amount-change" type="text" class=""></div>
									                          <div class="col s4"><label style="color:teal; margin-top:1%; margin-left:10%"><center><b>Change<br> <font style="opacity:0.80">(Php)</font>:</b></center></label></div>
									                        </div>
								                    	</div>

								                    	<div style="color:black" class="input-field col s7" hidden>                 
								                          <div class="col s8"><input style="margin-left:180px; padding:5px; padding-left:10px; border:3px gray solid" name="payment-info" type="text" class=""></div>
								                          <div class="col s4"><label style="color:black; margin-top:5px; margin-left:20px"><b>Remaining Balance:</b></label></div>							                          
								                        </div>

								                        <div class="col s12" hidden>
								                        	<center><p style="color:gray">*** Pay balance before or on <font color="teal"><b><u>"DECEMBER 25, 2016"</u></b></font> ***</p></center>
								                        </div>

								                        <div style="color:black" class="input-field col s12">                 
								                          <div class="col s8"><input style="margin-left:60%; padding:5px; padding-left:10px;" value="{{ $empname->employeename }}" name="payment-info" type="text" class=""></div>
								                          <div class="col s4"><label style="color:black; margin-top:5px; margin-left:20px"><b>Process Done By:</b></label></div>							                          
								                        </div>
														<input type="hidden" id="hidden-outstanding-bal" name="hidden-outstanding-bal">
								                        <input type="hidden" id="Date" name="Date">
								                        <input type="hidden" id="transaction_date" name="transaction_date" />
														<input type="hidden" id="dueDate" name="dueDate" />
														
														<div class="col s12" style="margin-top:30px">
															<!-- <a hidden href="{{ URL::to('billing-payment/payment-receipt-pdf') }}" class="left btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to print a copy of receipt" style="background-color:teal"><i class="large mdi-action-print" style="font-size:30px"></i></a> -->
															<a href="{{URL::to('transaction/payment/individual/save-payment')}}" class="right btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="CLick to save data" style="background-color:teal; margin-left:20px">Save</button>
															<a href="{{URL::to('transaction/payment/individual/home')}}" class="left btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to clear all fields for payment process" style="background-color:teal">Cancel</a>
														</div>
													</div>
													
													</div>
												</div>
											</div>
										</div>

										<div class="col s5">
											<div class="card-panel">
											<div class="card-content">
												@for($i = 0; $i < count($orders); $i++)
												@if($orders[$i]->strTermsOfPayment != "Full Payment")
												@if($payments[$i]->strTransactionFK == $orders[$i]->strJobOrderID)
												<div class="row payment-summary {{ $orders[$i]->strJobOrderID}}" id="or_summary" style="display:none">
													<center><h6><b>Payment History</b></h6></center>
													<div class="col s12" style="margin-top:10px"><div class="divider" style="height:3px; color:gray"></div></div>
												
												<!--In case of multiple pending transactions...-->
													<div  class="col s6" style="border-right:1px darkgray solid">
														<h6>Order No.: <p style="color:teal"><b><a href="#summary-of-order" class="modal-trigger tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to view summary of order" style="color:teal"><u>{{ $orders[$i]->strJobOrderID }}</u></a></b></p></h6>
													</div>

													<div  class="col s6">
														<h6>Transaction Date: <p style="color:teal"><b>{{ $orders[$i]->dtOrderDate}}</b></p></h6>
													</div>

													<div class="col s12"><div class="divider" style="background-color: gray; height:2px; margin-bottom: 2%"></div></div>

													<div class="col s12">
													<center><font color="gray" size="-1">Recent payment(s) made for this job order:</font></center>
														<table class="table centered" style="font-size:15px; font-weight:normal">
															<thead style="color:gray">
																<tr>
																	<th>Payment ID</th>
																	<th>Amt Paid</th>
																	<th>Balance</th>
																	<th>Date Paid</th>
																</tr>
															</thead>
															<tbody>
															@for($i = 0; $i < count($orders); $i++)
															@if($payments[$i]->strTransactionFK == $orders[$i]->strJobOrderID)
																<tr>
																	<td>{{ $payments[$i]->strPaymentID }}</td>
																	<td>{{ number_format($payments[$i]->dblAmountToPay, 2) }}</td>
																	<td>{{ number_format($payments[$i]->dblOutstandingBal ,2) }}</td>
																	<td>{{ $payments[$i]->dtPaymentDate }}</td>
																</tr>
															@endif
															@endfor
															</tbody>
														</table>
													</div>

													
												</div>
												@endif
													@endif
												@endfor
													
											</div>
										</div>
										</div>
										@endif
										@endif       							                    												
										{!! Form::close() !!}

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

		var amount_to_pay = 0.00;
		var amount_paid = 0.00;
		var bal = 0.00;

		//Gets the days needed to finish the product



		var form = document.getElementById('pay_form');
		var summary = document.getElementById('or_summary');
		var dropdown = document.getElementById('unpaid-payments');

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

				$('#amount-to-pay').val(amount_to_pay.toFixed(2));
				$('#amount-paid').val(amount_paid.toFixed(2));
				$('#outstanding-bal').val(bal.toFixed(2));
				$('#hidden-outstanding-bal').val(bal.toFixed(2));

				break;
			}
			else{

				summary.style.display = "none";
				form.style.display = "none";

			}
			// alert($('#unpaid-payments').val());
		}
						

		});

		$('#amount-tendered').blur(function(){	
			var amountChange = $('#amount-tendered').val() - $('#amount-payable').val();
			$('#amount-change').val(amountChange.toFixed(2));
		});

		$('#amount-payable').blur(function(){	
			// if($('#amount-to-pay').val() > $('#total_price').val()){
			// 	alert("You can't choose to pay more than the total.");
			// 	$('#amount-to-pay').val("");
			// }
				var amountChange = $('#amount-tendered').val() - $('#amount-payable').val();
				$('#amount-change').val(amountChange.toFixed(2));	
				// $('#outstanding-bal').val(($('#total_price').val() - $('#amount-to-pay').val()).toFixed(2) + ' PHP');				

		});

		var monthNames = [ "January", "February", "March", "April", "May", "June",
		    "July", "August", "September", "October", "November", "December" ];
			var dayNames= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]

			var newDate = new Date();
			var dueDate = new Date();

			var parameter = minDays + 2;

			newDate.setDate(newDate.getDate());   
			dueDate.setDate(newDate.getDate()+minDays);
	  
			function commaSeparateNumber(val){
			    while (/(\d+)(\d{3})/.test(val.toString())){
			      val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
			    }
			    return val;
			 }

			 $('#dueDate').val(dueDate.getFullYear() + "-" +  (dueDate.getMonth()+1) + "-" + dueDate.getDate());

			$('#due-date').text(dayNames[dueDate.getDay()] +" | " +" " + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + "," + ' ' + newDate.getFullYear());
			$('#transaction_date').val(monthNames[(newDate.getMonth()+1)] + " " + newDate.getDate() + ", " + newDate.getFullYear());
			$('#due_date').val(monthNames[(dueDate.getMonth()+1)] + " " + dueDate.getDate() + ", " + dueDate.getFullYear());
		
	</script>

	<script type="text/javascript">
		var monthNames = [ "January", "February", "March", "April", "May", "June",
	    "July", "August", "September", "October", "November", "December" ];
		var dayNames= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]

		var newDate = new Date();
		var dueDate = new Date();

		var parameter = minDays + 2;

		newDate.setDate(newDate.getDate());   
		dueDate.setDate(newDate.getDate()+minDays);
  
		function commaSeparateNumber(val){
		    while (/(\d+)(\d{3})/.test(val.toString())){
		      val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
		    }
		    return val;
		 }

		 $('#dueDate').val(dueDate.getFullYear() + "-" +  (dueDate.getMonth()+1) + "-" + dueDate.getDate());
	
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