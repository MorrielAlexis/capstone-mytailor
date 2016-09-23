@extends('layouts.master')

@section('content')


	<div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><center><h3><b>Welcome to <font color="white">MyTailor</font></b></h3></center></span>
        <center><h5>Collection - Individual</h5></center>
      </div>
    </div>

    <div class="row" style="margin-top:50px">
		<div class="col s12 m12 l12">

			<div class="col s12">
				<ul class="tabs transparent" style="margin-top:15px">
					<li class="tab col s12" style="border-top-left-radius: 20px; border-top-right-radius: 20px; background-color: #00b0ff;"><a style="color:black; padding-top:5px; opacity:0.80" href="#shoppingCart"></a></li>	
					<div class="indicator white" style="z-index:1"></div>
	            </ul>
				<div id="shoppingCart" class="card-panel">
					<div class="card-content">
						<div class="row">
					 <div class="col s12">
							<center><p style="color:gray">Filter data records with the following:</p></center>
							<div class="divider" style="color:gray; height:2px; margin-bottom:20px"></div>
						</div>

					<div class="filter-record" id="filter-record">
						<div class="col s12">
							<div class="col s6">
								<select class="browser-default" id="pay-status">
									<option value="" style="color:gray" disabled>Payment Status</option>
									<option value="1">All</option>
									<option value="2">Paid</option>
									<option value="3">Pending</option>
								</select>
							</div>
							<div class="col s6" hidden>
								<select class="browser-default" id="pay_type">
									<option value="" style="color:gray" disabled="">Payment Type</option>								
									<option value="PA" selected>All</option>
									<option value="CA">Cash</option>
									<option value="CQ">Cheque</option>
								</select>
							</div>
						</div>

						<div class="col s12">
							<div class="col s6" style="margin-top:25px">
								<label for="billing-date"><font size="+0.8" color="gray">Payment Date</font></label>
								<input id="billing-date" type="date" class="datepicker">			
							</div>
							<div class="col s6" style="margin-top:25px">
								<label for="due-date"><font size="+0.8" color="gray">Due Date</font></label>
								<input id="due-date" type="date" class="datepicker">			
							</div>
						</div>
					</div>

						<div class="col s12" style="margin-top:20px"> 
							<!-- <a href="" class="left btn" style="background-color:teal; color:white; margin-left:10px">Cancel</a> 
							<a href="{{URL::to('/transaction/payment/individual/home')}}" class="left btn" style="background-color:teal; color:white; margin-left:10px">Go to Payment</a> -->
							<a href="" class="right btn" style="background-color:teal; color:white; margin-right:10px">Save Filter</a>
							<a href="" class="left btn" style="background-color:teal; color:white; margin-right:40px">Edit</a>
						</div>


						</div>
					</div>
				</div>

				<div id="data-record" class="card-panel">
				{!! Form::open(['url' => 'transaction/collection/individual/home', 'method' => 'GET']) !!}
					<div class="card-content">
						<div class="row">
						<div class="col s12" id="data-cust">

							<center><h5 style="color:teal"><b>Payment Records of Individual Customers</b></h5></center>
							<div class="col s12" style="margin-top:40px">
								<div class="divider"></div>
								<div class="divider"></div>
							</div>

							<table id="data-cust">
								<thead>
									<tr>
										<th class="center" style="color:gray">Payment Id</th>
										<th class="center" style="color:gray">Job Order #</th>
										<th class="center" style="color:gray">Customer Name</th>
										
										<th class="center" style="color:gray">Payment Type</th>
										<!-- <th class="center" style="color:gray">Cheque Number</th> -->
										<th class="center" style="color:teal">Total Amount</th>
										<th class="center" style="color:gray">Downpayment (50%)</th>
										<th class="center" style="color:gray">Amount Paid</th>
										<th class="center" style="color:gray">Outstanding Balance</th>
										<th class="center" style="color:teal">Due Date</th>
										<!-- <th class="center" style="color:gray">Date of Payment</th> -->
										<th class="center" style="color:green">Status</th>
									</tr>
								</thead>
								<tbody>
								
									@foreach($customers as $customer)
									@foreach($cust as $custs)
									@if($customer->boolIsActive == 1 AND $customer->strJO_CustomerFK == $custs->strIndivID AND $customer->strTransactionFK == $custs->strJobOrderID)
								
									@if($customer->strPaymentStatus == "Pending")	
									<tr style="background-color:rgba(54, 162, 235, 0.2)" @if($customer->strJO_CustomerFK != $custs->strIndivID) hidden @endif>	
										<td class="center"><a class="modal-trigger tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to see order summary" href="#view{{ $customer->strPaymentID }}"><b>{{ $customer->strPaymentID }}</b></a></td>									
										<td class="center">{{ $customer->strJobOrderID }}</td>
										
										<td class="center">{{ $customer->fullname }}</td>
										<!-- <td class="center">{{ $customer->strTransactionFK }}</td> -->
										<td class="center">{{ $customer->strModeOfPayment }}</td>
										
										<td class="center" style="color:teal">P {{ number_format($customer->dblOrderTotalPrice, 2) }}</td>
										<td class="center">P {{ number_format(($customer->dblOrderTotalPrice/2), 2) }}</td>
										<td class="center">P {{ number_format($customer->dblAmountToPay, 2) }}</td>
										<td class="center">P {{ number_format($customer->dblOutstandingBal, 2)}}</td>
										<td class="center" style="color:teal">{{ $customer->dtPaymentDueDate }}</td>
										<td class="center" style="color:green"><i>{{ $customer->strPaymentStatus }}</i></td>
											
									</tr>

									@elseif($customer->strPaymentStatus != "Pending")	
									<tr @if($customer->strJO_CustomerFK != $custs->strIndivID) hidden @endif>							
										<td class="center"><a class="modal-trigger tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to see order summary" href="#view{{ $customer->strPaymentID }}"><b>{{ $customer->strPaymentID }}</b></a></td>
										<td class="center">{{ $customer->strJobOrderID }}</td>
										<!--Modal for order summary-->
										
										<td class="center">{{ $customer->fullname }}</td>
										<!-- <td class="center">{{ $customer->strTransactionFK }}</td> -->
										<td class="center">{{ $customer->strModeOfPayment }}</td>
										<td class="center" style="color:teal">P {{ number_format($customer->dblOrderTotalPrice, 2) }}</td>
										<td class="center">P {{ number_format(($customer->dblOrderTotalPrice/2), 2) }}</td>
										<td class="center">P {{ number_format($customer->dblAmountToPay, 2) }}</td>
										<td class="center">P {{ number_format($customer->dblOutstandingBal, 2)}}</td>
										@if($customer->strPaymentStatus != "Pending") 
											<td class="center" style="color:teal">Completed</td>
										@elseif($customer->strPaymentStatus == "Pending")
										<td class="center" style="color:teal" >{{ $customer->dtPaymentDueDate }}</td>
										@endif
										<td class="center" style="color:green"><i>{{ $customer->strPaymentStatus }}</i></td>
											
									</tr>

									
									@endif
									@endif	
									@endforeach
									@endforeach
								</tbody>
							</table>


						<div class="col s12" style="margin-top:6%">
							<div class="divider"></div>
							<a href="{{URL::to('/transaction/payment/individual/home')}}" class="right  btn" style="background-color:teal; color:white; margin-top:2%">Go to Payment</a>
						</div>

						<div id="view{{ $customer->strPaymentID }}" class="modal modal-fixed-footer" style="width:70%; height:80%">
											<center><h5 style="color:teal">Order and Payment Information of Customer</h5></center>
											<div class="divider" style="height:2px"></div>
											<div class="modal-content col s12" style="padding:3%">
												@foreach($customers as $customer)
												@foreach($cust as $custs)
													@if($customer->boolIsActive == 1 AND $customer->strJO_CustomerFK == $custs->strIndivID AND $customer->strTransactionFK == $custs->strJobOrderID)	
													<div class="col s7">
											          	<div class="right col s8"><b><input id="customer-name" type="text" class="validate" value="{{ $customer->fullname }}" readonly></b></div>
											          	<div class="left col s4" style="margin-top: 4%; color:teal">Customer Name</div>	          
							      					</div>
							      					<div class="col s5" style="margin-left: 0">
											          <div class="right col s8"><b><input id="customer-id" type="text" class="validate" value="{{ $customer->strIndivID }}" readonly></b></div>
											          <div class="left col s4" style="margin-top: 4%; color:teal">Customer ID</div>
							      					</div>

							      					<div class="col s12" style="margin-top:3%">
							      						<table class="table centered" border="1">
							      						<center><h6 style="color:black"><b>Order Summary</b></h6></center>
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
								                        	@foreach($orders as $order)
								                        	@if($order->strTransactionFK == $custs->strJobOrderID)
								                        		<tr style="border:1px teal solid">
								                        			<td style="border:1px teal solid"><b>{{ $order->intQuantity}}</b></td>
								                        			<td style="border:1px teal solid; padding-left:5%; padding-right:5%"><b>{{ $order->strGarmentCategoryName }}, {{ $order->strSegmentName }}</b></td>
								                        			<td style="padding-left:2%; padding-right:2%"></td>
								                        			<td style="border:1px teal solid"><b>P {{ number_format($order->dblSegmentPrice, 2) }}</b></td>
								                        			<!-- <td style="border:1px teal solid; background-color:rgba(52, 162, 232, 0.2)"><b>P {{ number_format($order->dblUnitPrice ,2) }}</b></td> -->
								                        			<!-- <td style="border:1px teal solid; background-color:rgba(52, 162, 232, 0.2)"><b>P {{ number_format($order->dblUnitPrice * $order->intQuantity, 2) }}</b></td> -->
								                        		</tr>
								                        		<!-- <tr>
								                        			<td style="border-left:1px teal solid;"></td>
								                        			<td style="border:1px teal solid; color:black; padding-left:10%; padding-top:1%; padding-bottom:1%; color:black"><b></b></td>
								                        			<td style="padding-top:1%; padding-bottom:1%; border:1px teal solid"><b>Fabric Name</b></td>
								                        			<td style=""></td>
								                        			<td style="border:1px teal solid"></td>
								                        			<td style="border:1px teal solid"></td>
								                        		</tr> -->
								                        		<!-- <tr style="border:1px teal solid">
								                        			<td style="border:1px teal solid"></td>
								                        			<td style="border:none; color:teal; padding-left:10%">Fabric Name</td>
								                        			<td style="padding-left:4%; padding-right:4%; border:1px teal solid">{{ $order->strFabricName }}</td>
								                        			<td style="border:1px teal solid">P {{ number_format($order->dblFabricPrice ,2) }}</td>
								                        			<td style="border:1px teal solid"></td>
								                        			<td style="border:1px teal solid"></td>
								                        		</tr> -->
								                        		<!-- <tr>
								                        			<td style="border-left:1px teal solid"></td>
								                        			<td style="border:1px teal solid; color:black; padding-left:10%; padding-top:1%; padding-bottom:1%; color:black"><b>Style Name</b></td>
								                        			<td style="padding-top:1%; padding-bottom:1%; border:1px teal solid"><b>Segment Pattern</b></td>
								                        			<td style=""></td>
								                        			<td style="border:1px teal solid"></td>
								                        			<td style="border:1px teal solid"></td>
								                        		</tr> -->

								                        		<!-- <tr style="border:1px teal solid">
								                        			<td style="border:1px teal solid"></td>
								                        			<td class="right" style="border:none; color:teal; padding-right:10%">Style Name and Pattern</td>
								                        			<td style="border:1px teal solid">{{ $order->strSegStyleName }} <br> <font color="gray"><b><i>{{ $order->strSegPName }}</i></b></font></td>
								                        			<td style="border:1px teal solid">P {{ number_format($order->dblPatternPrice, 2) }}</td>
								                        			<td style="border:1px teal solid"></td>
								                        			<td style="border:1px teal solid"></td>
								                        			
								                        		</tr> -->
								                        		@endif
								                        	@endforeach
								                        	</tbody>
								                        </table>
							      					</div>

							      					<div class="col s12"><div class="divider" style="margin-top:5%; margin-bottom:5%; height:4px; background-color: darkgray"></div></div>

							      					<div class="col s12 overflow-x" style="max-height:60%">
							      						<table class = "table centered order-summary" border = "1" style="border:1px gray solid">
										       				<center><h6 style="color:black"><b>Payment Summary</b></h6></center>
										       				<thead style="border:1px teal solid; background-color:rgba(54, 162, 235, 0.5)">
								                        		<tr style="border:1px teal solid">
								                        			<th style="border:1px teal solid">Order Total Price</th>
								                        			<th style="border:1px teal solid">Amount Paid</th>
								                        			<th style="border:1px teal solid">Outstanding Balance</th>
								                        			<th style="border:1px teal solid; border-bottom:none">Payment Date</th>
								                        			<th style="border:1px teal solid">Issued By</th>
								                        		</tr>
								                        	</thead>
											              	<tbody>
											              	@foreach($orders as $order)
								                        	@if($order->strTransactionFK == $custs->strJobOrderID)
													            <tr>
													               <td  style="border:1px gray solid">P {{ number_format($order->dblOrderTotalPrice, 2) }}</td>
													               <td  style="border:1px gray solid">P {{ number_format($order->dblAmountToPay ,2)}}</td>
													               <td  style="border:1px gray solid">P {{ number_format($order->dblOutstandingBal, 2) }}</td>
													               <td  style="border:1px gray solid">{{ $order->dtPaymentDate }}</td>
													               <td  style="border:1px gray solid">{{ $empname->employeename }}</td>
													            </tr>
													         @endif
													         @endforeach
													        </tbody>
													    </table>
							      					</div>

							      					<div class="col s12" style="margin-top:20px"><div class="divider" style="height:3px; margin-bottom:10px"></div></div>

							      					<div class="col s12 overflow-x" style="max-height: 50%">
							      						<div class="left col s6" style="margin-top:25px; color:teal">
															<label for="due-date"><font size="+0.8" color="teal"><b>Due Date</b></font> (Pay balance before or on the said date)</label>
															<b><input id="due-date" type="date" class="center datepicker" value="{{ $order->dtPaymentDueDate }}" readonly></b>			
														</div>
														<div class="right col s6" style="margin-top:25px; color:teal">
														<label for="due-date"><font size="+0.8" color="teal"><b>Payment Status</b></font> (Current status of payment)</label>
															<b><input readonly id="status" type="text" class="center validate" value="{{ $order->strPaymentStatus }}" readonly></b>
														</div>
							      					</div>

							      					@if($order->strPaymentStatus == "Pending")
							      					<div class="col s12" style="margin-top:5%">			

							      						<a href="" class="right btn tooltipped" data-position="left" data-delay="50" data-tooltip="Send an email to customer as a reminder on their pending payment near due date" style="background-color:teal;"><i class="mdi-communication-email" style="margin-right: 1%"></i></a>		      		
												        <!-- <a href="" class="left btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Send email to remind customer of due date" style="background-color:red; margin-right:15px"><i class="mdi-communication-quick-contacts-dialer" style="font-size:30px"></i></a>
												        <a href="" class="left btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Send SMS to remind customer of due date" style="background-color:red"><i class="mdi-communication-quick-contacts-mail" style="font-size:30px"></i></a>
												        <a href="" class="right btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Print this data and have a personal copy" style="background-color:teal;">Print a copy</a>
												        <a href="" class="right btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Send a copy of this data through email" style="background-color:teal; margin-right:8px;">Send a copy</a>
												        <a href="" class="right btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Save this data in a PDF format" style="background-color:teal; margin-right:8px">Save as PDF</a> -->
							      					</div>
							      					@endif
							      					@endif
							      				@endforeach
							      			@endforeach
											</div>

											<div class="modal-footer col s12" style="margin-top: 5%">
								                <!-- <a class="waves-effect waves-green btn-flat" href="{{URL::to('transaction/billing-collection')}}"><font color="black">OK</font></a> -->
								                <a class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">OK</font></a>
								            </div>
										
									</div>
										<!--end-->
							


							<div class="col s12" style="margin-top:60px" hidden>
								<div class="divider" style="margin-bottom:20px"></div>
								<a href="" class="left btn" style="background-color:teal; color:white"><i class="large mdi-editor-insert-chart" style="padding-right:15px" hidden=""></i>View Summary Report</a>
								<a href="" class="right btn" style="background-color:teal; color:white;"><i class="large mdi-editor-insert-drive-file" style="padding-right:15px"></i>Export as PDF</a>
								<a href="" class="right btn" style="background-color:teal; color:white; margin-right:50px"><i class="large mdi-action-print" style="padding-right:15px"></i>Print a copy</a>
							</div>

						</div>
						</div>
					</div>
				</div>
				{!! Form::close() !!}
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
		$(document).ready(function() {
			$('.datepicker').pickdate();
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

	<script>
	function tabInit() {
    $('ul.tabs').tabs();
	}

	$.ajax({
	    type: "GET",
	    //Url to the XML-file
	    url: "transaction/collection/individual/home",
	    dataType: "blade.php",
	    success: tabInit
	});
	</script>

	<script>
		var type = $('#pay_type');

		type.change(function () {
		  updateUI();
		});


		function updateUI () {
		  $('.data-cust').hide();

		  var typeValue = type.val();
		  
		  if (typeValue == 'PA'){
		  	return $('.data-cust').show();
		  } 
		  else if (typeValue == 'CA'){
		  	return $('.data-cust').show();
		  } 
		  else if (typeValue == 'CQ'){
		  	return $('.data-cust').show();
		  } 
		  
		  var typeClass = typeValue == 'PA' ? '' : '.' + typeValue;

		  var classesToUpdate = typeClass;
		  console.log(classesToUpdate);
		  $(classesToUpdate).show();
		}

		updateUI();
	</script>


@stop