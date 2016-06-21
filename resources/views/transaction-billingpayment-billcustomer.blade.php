@extends('layouts.master')

@section('content')


	<div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><center><h3><b>Welcome to <font color="white">MyTailor</font></b></h3></center></span>
        <center><h5>Billing and Collection - Billing</h5></center>
      </div>
    </div>

   <div class="row" style="margin-top:50px">
		<div class="col s12 m12 l12">

			<div class="col s12 m9 l10">
				<ul class="tabs transparent" style="margin-top:15px">
					<li class="tab col s12" style="border-top-left-radius: 20px; border-top-right-radius: 20px; background-color: #00b0ff;"><a style="color:black; padding-top:5px; opacity:0.80" href="#shoppingCart"></a></li>	
					<div class="indicator white" style="z-index:1"></div>
	            </ul>
	        </div>
				<div class="row">
				    <div class="col s12 m9 l10">
				    	<div id="billCustomer" class="card-panel">
							<div class="card-content">
								<div class="row">
									<div class="col s12">
										<center><p style="color:gray"><b>MyTailor Store</b> Billing Process - Step 2</p></center>
										<div class="divider" style="color:gray; height:2px; margin-bottom:20px"></div>
									</div>

									<div class="col s12" style="margin-top:10px">
										<div style="color:black" class="input-field col s5">                 
				                          <div class="container"><input style="margin-left:53px; border:3px teal solid; padding:5px; padding-left:10px" name="customer-info" type="text" class="" placeholder="ex. IND 20001" editable="false"></div>
				                          <label style="color:teal; margin-top:5px;"><b>CUSTOMER ID:</b></label>
				                        </div>
										<div style="color:black" class="input-field col s7">                 
				                          <div class="container"><input style="margin-left:80px; margin-right:100px; border:3px teal solid; padding:5px; padding-left:10px" name="customer-info" type="text" class="" placeholder="ex. Honey Buenavides"></div>
				                          <label style="color:teal; margin-top:5px; margin-left:20px"><b>CUSTOMER NAME:</b></label>
				                        </div>
									</div>

									<div class="col s12">
										<div class="input-field col s9">
										<div class="container">
											<select class="browser-default tooltipped" data-position="bottom" data-delay="50" data-tooltip="In case of multiple pending payments" style="margin-left:150px; border:3px teal solid; padding-left:10px">
												<option disabled>Choose a transaction date...</option>
											    <option value="date1">2016-05-03</option>
											    <option value="date2">2016-06-16</option>
											    <option value="date3">2016-09-21</option>
											    <option value="A" selected class="circle">All</option>
											</select>
										</div>
										<label style="color:teal; margin-top:5px;"><b>Choose a transaction date to bill:</b></label>
										</div>
										<div class="col s3">
											<a href="" class="right btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to start billing customer" style="background-color:teal; margin-left:45px; margin-top:20px; padding:20px; padding-top:0px">Begin Billing</a>
										</div>
									</div>

									<div class="col s12" style="margin-top:30px"><div class="divider" style="height:3px; color:gray"></div></div>

									<div class="col s12" style="margin-top:30px">
										<div class="col s7">
										<div class="card-panel">
											<div class="card-content">
												<div class="row">
													<div style="color:black" class="input-field col s7">                 
							                          <input style="margin-left:180px; padding:5px; padding-left:10px" name="payment-info" type="text" class="">
							                          <label style="color:red; margin-top:5px; margin-left:20px"><b>Total Amount to Pay:</b></label>
							                        </div>

							                        <div style="color:black" class="input-field col s7">                 
							                          <input style="margin-left:180px; padding:5px; padding-left:10px" name="payment-info" type="text" class="">
							                          <label style="color:red; margin-top:5px; margin-left:20px"><b>Total Amount Paid:</b></label>
							                        </div>

							                        <div style="color:black" class="input-field col s7">                 
							                          <input style="margin-left:180px; padding:5px; padding-left:10px" name="payment-info" type="text" class="">
							                          <label style="color:red; margin-top:5px; margin-left:20px"><b>Outstanding Balance:</b></label>
							                        </div>

							                        <div class="col s12" style="margin-top:30px"><div class="divider" style="height:3px; color:gray"></div></div>

							                        <div style="color:black" class="input-field col s7">                 
							                          <input style="margin-left:180px; padding:5px; padding-left:10px; border:3px gray solid" name="payment-info" type="text" class="">
							                          <label style="color:black; margin-top:5px; margin-left:20px"><b>Amount Tendered:</b></label>
							                        </div>

							                        <div style="color:black" class="input-field col s7">                 
							                          <input style="margin-left:180px; padding:5px; padding-left:10px; border:3px gray solid" name="payment-info" type="text" class="">
							                          <label style="color:black; margin-top:5px; margin-left:20px"><b>Amount to Pay :</b></label>
							                        </div>

							                        <div class="container">
								                        <div style="color:black" class="input-field col s7">                 
								                          <input style="margin-left:116px; padding:5px; padding-left:10px; border:3px gray solid" name="payment-info" type="text" class="">
								                          <label style="color:red; margin-top:5px; margin-left:40px"><b>Change:</b></label>
								                        </div>
							                    	</div>

							                    	<div style="color:black" class="input-field col s7">                 
							                          <input style="margin-left:180px; padding:5px; padding-left:10px; border:3px gray solid" name="payment-info" type="text" class="">
							                          <label style="color:black; margin-top:5px; margin-left:20px"><b>Remaining Balance:</b></label>							                          
							                        </div>

							                        <div class="col s12">
							                        	<center><p style="color:gray">*** Pay balance before or on <font color="red"><b><u>"DECEMBER 25, 2016"</u></b></font> ***</p></center>
							                        </div>

							                        <div style="color:black" class="input-field col s7">                 
							                          <input style="margin-left:180px; padding:5px; padding-left:10px;" value="Honey May Buenavides - Cashier" name="payment-info" type="text" class="">
							                          <label style="color:black; margin-top:5px; margin-left:20px"><b>Process Done By:</b></label>							                          
							                        </div>
													
													<div class="col s12" style="margin-top:30px">
														<a href="" class="left btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to print a copy of receipt" style="background-color:teal"><i class="large mdi-action-print" style="font-size:30px"></i></a>
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
													<div class="col s12" style="margin-top:10px"><div class="divider" style="height:3px; color:gray"></div></div>
												
												<!--In case of multiple pending transactions...-->
													<div  class="col s6">
														<h6>Order No.: <p style="color:red"><b>ORN 001</b></p></h6>
													</div>

													<div  class="col s6">
														<h6>Transaction Date: <p style="color:red"><b>2016-05-03</b></p></h6>
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
																<tr>
																	<td>GAR 1003</td>
																	<td>1</td>
																	<td>P 600.00</td>
																</tr>
															</tbody>
														</table>

														<center><a href="#summary-of-order" class="btn modal-trigger tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to view summary of orders" style="background-color:teal">View Order Details</a></center>
													</div>

													<div class="col s12"><div class="divider" style="height:2px; color:gray; margin-top:15px; margin-bottom:15px"></div></div>


													<!--Second example, just to emphasize the sample situation-->
													
													<div  class="col s6">
														<h6>Order No.: <p style="color:red"><b>ORN 002</b></p></h6>
													</div>

													<div  class="col s6">
														<h6>Transaction Date: <p style="color:red"><b>2016-06-16</b></p></h6>
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
																	<td>GAR 1011</td>
																	<td>1</td>
																	<td>P 800.00</td>
																</tr>
																<tr>
																	<td>GAR 1012</td>
																	<td>1</td>
																	<td>P 1,600.00</td>
																</tr>
															</tbody>
														</table>

														<center><a href="#summary-of-order" class="btn modal-trigger tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to view summary of orders" style="background-color:teal">View Order Details</a></center>
													</div>

													<div id="summary-of-order" class="modal modal-fixed-footer" style="height:500px; width:800px; margin-top:30px">
														<h5><font color="teal"><center><b>Summary of Orders</b></center></font></h5>
															
															{!! Form::open() !!}
																<div class="divider" style="height:2px"></div>
																<div class="modal-content col s12">
																	<div class="col s6" style="margin-top:20px;">
																		<label>This is a summary of orders:</label>
																	</div>

																	<div class="col s6">
																		<div class="col s6"><p style="color:gray">Date of Transaction:</p></div>
																		<div class="col s6"><h6 style="color:red; margin-top:15px"><b>May 3, 2016</b></h6></div>
																	</div>
																	<div class="container">
												                        <table class = "table centered order-summary" border = "1">
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

																	             <tr>
																	               <td>Uniform, Polo</td>
																	               <td>1</td>
																	               <td>Slim-fit</td>
																	               <td>Remarkable Cotton</td>
																	               <td>850.00 PHP</td>
																	               <td>850.00 PHP</td>
																	            </tr>

																	        </tbody>
																	    </table>
														      		</div>

														      		<div class="divider"></div>
														      		<div class="divider"></div>

															      	<div class="col s12">
																		<div class="col s6"><p style="color:gray">Estimated time to finish all orders:<p style="color:black">10 days</p></p></div>
																		<div class="col s6"><p style="color:gray">Total Amoun to Pay:<p style="color:black">1,650.00 PHP</p></p></div>
																	</div>

																	<div class="col s12" style="margin-bottom:50px">
																		<p style="color:red"><b>Due date of payment (pay balance before or on the said date):</b> JULY 16, 2015</p>
																	</div>
																</div>



																<div class="modal-footer col s12">
													                
													                <a class="waves-effect waves-green btn-flat" href="{{URL::to('/transaction/billing-payment-bill-customer')}}"><font color="black">OK</font></a>
													                
													            </div>
															{!! Form::close() !!}
													</div>

													<div class="col s12"><div class="divider" style="height:2px; color:gray; margin-top:15px; margin-bottom:15px"></div></div>


												</div>
											</div>
										</div>
										</div>

										

									</div>

								</div>
							</div>
						</div>
					</div>




					<div class="col hide-on-small-only m3 l2" style="margin-top:60px">
				    	<a href="{{URL::to('/transaction/billing-payment')}}" class="btn tooltipped" data-position="bottom" data-delay"50" data-tooltip="Click to bill a new customer" style="padding-left:7px; padding-right:7px; background-color:#fb8c00; margin-bottom:30px"><b>Bill New Customer</b></a>
				    	<a href="{{URL::to('/transaction/billing-collection')}}" class="btn tooltipped" data-position="bottom" data-delay"50" data-tooltip="Click to view collections" style="padding-left:10px; padding-right:10px; background-color:#fb8c00; margin-bottom:30px"><b>View Collections</b></a>
				    	<a href="" class="btn tooltipped" data-position="bottom" data-delay"50" data-tooltip="Click to check for incoming deadlines" style="padding-left:13.5px; padding-right:13.5px; background-color:#fb8c00"><b>Review Deadlines</b></a>
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
	    url: "transaction/walkInIndividualCheckout",
	    dataType: "blade.php",
	    success: tabInit
	});
	</script>

	<script>
		$(document).ready(function(){
   		$('.scrollspy').scrollSpy();
 	});
	</script>


@stop