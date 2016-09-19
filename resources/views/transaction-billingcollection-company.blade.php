@extends('layouts.master')

@section('content')


	<div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><center><h3><b>Welcome to <font color="white">MyTailor</font></b></h3></center></span>
        <center><h5>Collection - Company</h5></center>
      </div>
    </div>

    <div class="row" style="margin-top:50px">
		<div class="col s12 m12 l12">

			<div class="col s12">
				<ul class="tabs transparent" style="margin-top:15px">
					<li class="tab col s12" style="border-top-left-radius: 20px; border-top-right-radius: 20px; background-color: #00b0ff;"><a style="color:black; padding-top:5px; opacity:0.80" href="#shoppingCart"></a></li>	
					<div class="indicator white" style="z-index:1"></div>
	            </ul>
				<!-- <div id="shoppingCart" class="card-panel">
					<div class="card-content">
						<div class="row">
						<div class="col s12">
							<center><p style="color:gray">Filter data records with the following:</p></center>
							<div class="divider" style="color:gray; height:2px; margin-bottom:20px"></div>
						</div>
						<div class="col s12">
							<div class="col s6">
								<select class="browser-default">
									<option value="" style="color:gray">Status</option>
									<option value="1">All</option>
									<option value="2">Paid</option>
									<option value="3">Partial</option>
									<option value="4">Canceled</option>
								</select>
							</div>
							<div class="col s6">
								<select class="browser-default">
									<option value="" style="color:gray">Payment Type</option>
									<option value="1">All</option>
									<option value="2">Cash</option>
									<option value="3">Cheque</option>
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

						<div class="col s12" style="margin-top:20px">
							<a href="" class="left btn" style="background-color:teal; color:white; margin-left:10px">Cancel</a>
							<a href="{{URL::to('/transaction/payment/individual/home')}}" class="left btn" style="background-color:teal; color:white; margin-left:10px">Go to Payment</a>
							<a href="" class="right btn" style="background-color:teal; color:white; margin-right:10px">Search</a>
							<a href="" class="right btn" style="background-color:teal; color:white; margin-right:40px">Edit</a>
						</div>


						</div>
					</div>
				</div> -->

				<div id="data-record" class="card-panel">
					<div class="card-content">
						<div class="row">
						<div class="col s12">

							<center><h5 style="color:teal"><b>Payment Records of Company Customers</b></h5></center>
							<div class="col s12" style="margin-top:40px">
								<div class="divider"></div>
								<div class="divider"></div>
							</div>

							<table class="table centered data-company" align = "center" border = "1">
								<thead>
									<tr>
										<!-- <th class="center" style="color:gray">ID</th> -->
										<th class="center" style="color:gray">Customer Name</th>
										<th class="center" style="color:gray">Job Order #</th>
										<th class="center" style="color:gray">Payment Type</th>
										<th class="center" style="color:gray">Cheque Number</th>
										<th class="center" style="color:teal">Total Amount</th>
										<th class="center" style="color:gray">Downpayment (50%)</th>
										<th class="center" style="color:gray">Amount Paid</th>
										<th class="center" style="color:teal">Outstanding Balance</th>
										<th class="center" style="color:teal">Due Date</th>
										<!-- <th class="center" style="color:gray">Date of Payment</th> -->
										<th class="center" style="color:green">Status</th>
									</tr>
								</thead>
								<tbody>
									
									@foreach($companies as $company)
									@foreach($comp as $comps)
										@if($company->boolIsActive == 1 AND $company->strJO_CustomerCompanyFK == $comps->strCompanyID)

									@if($company->strPaymentStatus == "Pending")
									<tr style="background-color:rgba(54, 162, 235, 0.2)" @if($company->strTransactionFK != $comps->strJobOrderID AND $company->strJO_CustomerCompanyFK == $comps->strCompanyID) hidden @endif>
										
										<td class="center" >{{ $company->strCompanyName }}</td>
										<td class="center">{{ $company->strTransactionFK }}</td>
										<td class="center">{{ $company->strModeOfPayment}}</td>
										@if($company->strModeOfPayment != "Cash")
										<td class="center">Cheque here</td>
										@elseif($company->strModeOfPayment == "Cash")
										<td class="center"> ---- </td>
										@endif
										<td class="center" style="color:teal">{{ number_format($company->dblOrderTotalPrice, 2) }}</td>
										<td class="center">{{ number_format(($company->dblOrderTotalPrice/2), 2) }}</td>
										<td class="center">{{ number_format($company->dblAmountToPay, 2) }}</td>
										<td class="center">{{ number_format($company->dblOutstandingBal, 2)}}</td>
										@if($company->strPaymentStatus != "Pending") 
											<td class="center" style="color:teal">----</td>
										@elseif($company->strPaymentStatus == "Pending")
										<td class="center" style="color:teal" >{{ $company->dtPaymentDueDate }}</td>
										@endif
										<td class="center" style="color:green" ><i>{{ $company->strPaymentStatus }}</i></td>
											
									</tr>
									
									@elseif($company->strPaymentStatus != "Pending")
									<tr @if($company->strTransactionFK != $comps->strJobOrderID) hidden @endif>
										
										<!--  -->

										<td class="center" >{{ $company->strCompanyName }}</td>
										<td class="center">{{ $company->strTransactionFK }}</td>
										<td class="center">{{ $company->strModeOfPayment}}</td>
										@if($company->strModeOfPayment != "Cash")
										<td class="center">Cheque here</td>
										@elseif($company->strModeOfPayment == "Cash")
										<td class="center"> ---- </td>
										@endif
										<td class="center" style="color:teal">{{ number_format($company->dblOrderTotalPrice, 2) }}</td>
										<td class="center">{{ number_format(($company->dblOrderTotalPrice/2), 2) }}</td>
										<td class="center">{{ number_format($company->dblAmountToPay, 2) }}</td>
										<td class="center">{{ number_format($company->dblOutstandingBal, 2)}}</td>
										@if($company->strPaymentStatus != "Pending") 
											<td class="center" style="color:teal">----</td>
										@elseif($company->strPaymentStatus == "Pending")
										<td class="center" style="color:teal" >{{ $company->dtPaymentDueDate }}</td>
										@endif
										<td class="center" style="color:green" ><i>{{ $company->strPaymentStatus }}</i></td>
											
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

							<div id="view-detail" class="modal modal-fixed-footer">
								{!! Form::open() !!}
									<div class="divider" style="height:2px"></div>
									<div class="modal-content col s12" style="padding:30px">
											
											<div class="col s6">
									          	<input id="customer-name" type="text" class="validate" placeholder="Customer Name">	          
					      					</div>
					      					<div class="col s6">
									          <input id="customer-id" type="text" class="validate" placeholder="Customer ID">
					      					</div>

					      					<div class="col s12">
					      						<div class="container">
					      						<table class = "table centered order-summary" border = "1" style="border:1px gray solid">
								       				<center><h6 style="color:teal"><b>ORDER SUMMARY</b></h6></center>
								       				<thead style="color:gray">
									          			<tr>
										                  <th data-field="product">Package</th>         
										                  <th data-field="quantity">Quantity</th>
										                  <th data-field="price">Unit Price</th>
										                  <th data-field="price">Total Price</th>
										              	</tr>
									              	</thead>
									              	<tbody>
											            <tr>
											               <td>Men Set A</td>
											               <td>19</td>
											               <td>1,400.00 PHP</td>
											               <td>26,600.00 PHP</td>
											            </tr>

											            <tr>
											               <td>Women Set A</td>
											               <td>38</td>
											               <td>1,300.00 PHP</td>
											               <td>49,400.00 PHP</td>
											            </tr>

											        </tbody>
											    </table>
											</div>
					      					</div>

					      					<div class="col s12"><div class="divider" style="margin-bottom:40px"></div></div>

					      					<div class="col s12">
					      						<div class="container">
					      						<table class = "table centered data-company" border = "1" style="border:1px gray solid">
								       				<center><h6 style="color:black"><b>PAYMENT HISTORY</b></h6></center>
								       				<thead style="color:gray">
									          			<tr>
										                  <th data-field="product">Amount Paid</th>         
										                  <th data-field="quantity">Outstanding Balance</th>
										                  <th data-field="price">Payment Date</th>
										                  <th data-field="status">Made By</th>
										              	</tr>
									              	</thead>
									              	<tbody>
											            <tr>
											               <td>5,000.00 Php</td>
											               <td>10,000.00 Php</td>
											               <td>2016-06-17</td>
											               <td>Wakalu Papito</td>
											            </tr>

											            <tr>
											               <td>3,000.00 Php</td>
											               <td>37,000.00 Php</td>
											               <td>2016-06-17</td>
											               <td>Wakalu Papito</td>
											            </tr>

											        </tbody>
											    </table>
											</div>
					      					</div>

					      					<div class="col s12" style="margin-top:20px"><div class="divider" style="height:3px; margin-bottom:10px"></div></div>

					      					<div class="col s12">
					      						<div class="col s6" style="margin-top:25px; color:red">
													<label for="due-date"><font size="+0.8" color="red"><b>Due Date</b></font></label>
													<input id="due-date" type="date" class="datepicker" readonly>			
												</div>
												<div class="col s6" style="margin-top:48px; color:red">
													<input readonly id="status" type="text" class="validate" placeholder="Current Status">
												</div>
					      					</div>

					      					<div class="col s12" style="margin-top:40px">					      							
										        <a href="" class="left btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Send email to remind customer of due date" style="background-color:red; margin-right:15px"><i class="mdi-communication-quick-contacts-dialer" style="font-size:30px"></i></a>
										        <a href="" class="left btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Send SMS to remind customer of due date" style="background-color:red"><i class="mdi-communication-quick-contacts-mail" style="font-size:30px"></i></a>
										        <a href="" class="right btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Print this data and have a personal copy" style="background-color:teal;">Print a copy</a>
										        <a href="" class="right btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Send a copy of this data through email" style="background-color:teal; margin-right:8px;">Send a copy</a>
										        <a href="" class="right btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Save this data in a PDF format" style="background-color:teal; margin-right:8px">Save as PDF</a>
					      					</div>

									</div>

									<div class="modal-footer col s12">
						                <a class="waves-effect waves-green btn-flat" href="{{URL::to('transaction/billing-collection')}}"><font color="black">OK</font></a>
						                <a href="{{URL::to('transaction/billing-collection')}}" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">Cancel</font></a>
						            </div>
								{!! Form::close() !!}

							</div>

							<div class="col s12" style="margin-top:60px" hidden>
								<div class="divider" style="margin-bottom:20px"></div>
								<a href="" class="left btn" style="background-color:teal; color:white"><i class="large mdi-editor-insert-chart" style="padding-right:15px"></i>View Summary Report</a>
								<a href="" class="right btn" style="background-color:teal; color:white;"><i class="large mdi-editor-insert-drive-file" style="padding-right:15px"></i>Export as PDF</a>
								<a href="" class="right btn" style="background-color:teal; color:white; margin-right:50px"><i class="large mdi-action-print" style="padding-right:15px"></i>Print a copy</a>
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
	    url: "transaction/collection/company/home",
	    dataType: "blade.php",
	    success: tabInit
	});
	</script>

	<script type="text/javascript">
      $(document).ready(function() {
          $('.data-company').DataTable();
          $('select').material_select();
      } );
    </script>

@stop