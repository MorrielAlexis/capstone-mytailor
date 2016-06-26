@extends('layouts.master')

@section('content')

	<div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><center><h3><b>Welcome to <font color="white">MyTailor</font></b></h3></center></span>
        <center><h5>Walk-in Individual - Customization of Orders</h5></center>
      </div>
    </div>

	<div class="row">
		<div class="col s12 m12 l12">

		<!-- CUSTOMIZING ORDER HERE -->
			<div class="col s12">
				<ul class="tabs transparent" style="margin-top:10px">
					<li class="tab col s12" style="border-top-left-radius: 20px; border-top-right-radius: 20px; "><a style="color:black; padding-top:5px; opacity:0.80" href="#shoppingCart"></a></li>	
					<div class="indicator white" style="z-index:1"></div>
	            </ul>
				<div class="card-panel">
					<div class="card-content">
						<div class="row">
						<div class="col s12">
							<div class="col s12">
								
								<div class="col s6"><p><h5><b>Customize Order</b></h5></p></div>							
									<div class="right col s1"><a style="margin-top:15px; background-color:teal" type="submit" class="waves-effect waves-green btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to go back home" href="{{URL::to('/transaction/walkin-individual')}}"><i class="mdi-action-home" style="color:white; opacity:0.90; font-size:30px;"></i></a></div>
									<div class="right col s5"><a style="margin-top:15px; background-color:teal" type="submit" class="right waves-effect waves-green btn modal-trigger tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to proceed to payment of orders" href="#summary-of-order"><font color="white" size="+1"><!--<i class="mdi-action-payment" style="font-size:20px;">-->  Proceed to Checkout<!--</i>--></font></a>
										<div id="summary-of-order" class="modal modal-fixed-footer" style="height:500px; width:800px; margin-top:30px">
											<h5><font color="teal"><center><b>Summary of Orders</b></center></font></h5>
												
												{!! Form::open() !!}
													<div class="divider" style="height:2px"></div>
													<div class="modal-content col s12">
														<label>This is a summary of orders:</label>
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
												              		@foreach($segments as $segment)
														            <tr>
														               <td>{{ $segment->strGarmentCategoryName }}, {{ $segment->strSegmentName }}</td>
														               <td>1</td>
														               <td>No-fit</td>
														               <td>Traditional Cotton</td>
														               <td> {{ number_format($segment->dblSegmentPrice, 2) }} PHP</td>
														               <td>800.00 PHP</td>
														            </tr>
																	@endforeach
														        </tbody>
														    </table>
											      		</div>

											      		<div class="divider"></div>
											      		<div class="divider"></div>

												      	<div class="col s12" style="margin-bottom:50px" >
															<div class="col s6"><p style="color:gray">Estimated time to finish all orders:<p style="color:black">10 days</p></p></div>
															<div class="col s6"><p style="color:gray">Total Amount to Pay:<p style="color:black">1,650.00 PHP</p></p></div>
														</div>
													</div>



													<div class="modal-footer col s12">
										                <p class="left" style="margin-left:10px; color:gray;">Continue to payment?</p>
										                <a class="waves-effect waves-green btn-flat" href="{{URL::to('/transaction/walkin-individual-payment-customer-info')}}"><font color="black">Yes</font></a>
										                <a class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">No</font></a>
										            </div>
												{!! Form::close() !!}
										</div>
									</div>													
										
							</div>

<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////--> 
<!--/////////////////////////////////////////// START OF AN ITERATION  ////////////////////////////////////////////////////////-->
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////--> 		
							<div class="divider" style="margin-bottom:30px"></div>
							<div class="divider" style="margin-bottom:30px"></div>
							<div class="divider" style="margin-bottom:30px; height:3px"></div>

<!-- END OF LOOP -->		@foreach($segments as $segment)
							<div class="col s6">
							<a style="color:black" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to remove order" href="#removeOrder"><i class="mdi-navigation-close"></i></a>
								<div id="removeOrder" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:150px">
									<h5><font color="red"><center><b>Warning!</b></center></font></h5>
										
										{!! Form::open() !!}
											<div class="divider" style="height:2px"></div>
											<div class="modal-content col s12">
												<div class="col s3">
													<i class="mdi-alert-warning" style="font-size:50px; color:red"></i>
												</div>
												<div class="col s9">
													<p><font size="+1">Are you sure to remove this order from cart?</font></p>
												</div>
											</div>

											<div class="modal-footer col s12" style="background-color:red; opacity:0.85">
								                <a class="waves-effect waves-green btn-flat" ><font color="white">Yes</font></a>
								                <a class="modal-action modal-close waves-effect waves-green btn-flat"><font color="white">No</font></a>
								            </div>
										{!! Form::close() !!}
								</div>

							<center><img src="{{URL::asset($segment->strSegmentImage)}}" style="height:450px; width:450px; border:3px gray solid"></center>								          	
							</div>
							
								<br>
								<div class="col s6">
								<div class="col s6" style="margin-top:50px">
								<label>Choose your design:</label>
											<div class="file-field input-field">
												<a style="color:black" class="modal-trigger btn tooltipped btn-floating teal" data-position="bottom" data-delay="50" data-tooltip="Click to choose a segment pattern" href="#editDesign"><i class="mdi-editor-mode-edit"></i></a>
													<div id="editDesign" class="modal modal-fixed-footer">
														<h5><font color = "#1b5e20"><center>List of Available Designs</center> </font> </h5>
                        
									                      {!! Form::open() !!} 
									                        <div class="divider" style="height:2px"></div>
									                        <div class="modal-content col s12">
									                        	<div class="col s1" style="margin-top:60px">
									                        		<input name="garmentDesign" type="radio" class="filled-in" id="pattern1" />
									                        		<label for="pattern1"></label>
									                        	</div>
									                        	 <div class="col s11">
															        <div class="card-panel grey lighten-5 z-depth-1">
															          <div class="row valign-wrapper">
															            <div class="col s4">
															              <img src="#!" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
															            </div>
															            <div class="col s7"> 
															              <p>STRAIGHT-CUT</p> <!-- This will be the name of the pattern -->
															              <span class="black-text">
															                This is a square image. Add the "circle" class to it to make it appear circular.
															              </span>
															            </div>
															          </div>
															        </div>
															      </div>

															<div style="margin:570px"></div>
															</div>


														<div class="modal-footer col s12">
															<a href="{{URL::to('transaction/walkin-individual-catalogue-designs')}}" class="left btn-flat" style="background-color:teal; color:white">Check designs from catalogue</a>
								                          	<a class="right waves-effect waves-green btn-flat">OK</a>
								                          	<a class="right modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
								                        </div>
									                      {!! Form::close() !!}
													</div>
												<div class="file-path-wrapper">
													<input class="file-path validate" type="text">
												</div>
											</div>
								</div>
								
								<div class="col s6" style="margin-top:50px">
								<label>Choose your fabric:</label>
											<div class="file-field input-field">	
												<a style="color:black" class="modal-trigger btn tooltipped btn-floating teal" data-position="bottom" data-delay="50" data-tooltip="Click to choose a fabric" href="#editFabric"><i class="mdi-editor-mode-edit"></i></a>
                     								<div id="editFabric" class="modal modal-fixed-footer">
                     								<h5><font color = "#1b5e20"><center>List of Available Fabrics</center> </font> </h5>
                        
									                      {!! Form::open() !!} 
									                        <div class="divider" style="height:2px"></div>
                     							@foreach($fabrics as $fabric)
									                        <div class="modal-content col s12">
									                        	<div class="col s1" style="margin-top:60px">
									                        		<input name="garmentFabrics" type="radio" class="filled-in" id="fabric1" />
									                        		<label for="fabric1"></label>
									                        	</div>
									                        	 <div class="col s11">
															        <div class="card-panel grey lighten-5 z-depth-1">
															          <div class="row valign-wrapper">
															            <div class="col s4">
															              <img src="#!" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
															            </div>
															            <div class="col s7"> 
															              <p>COTTON CHENES</p> <!-- This will be the name of the pattern -->
															              <span class="black-text">
															                This is a square image. Add the "circle" class to it to make it appear circular.
															              </span>
															            </div>
															          </div>
															        </div>
															      </div>

															<div style="margin:570px"></div>
															</div>
												@endforeach


														<div class="modal-footer col s12" >
								                          <a  class="right waves-effect waves-green btn-flat">OK</a>
								                          <a  class="right modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
								                        </div>
									                      {!! Form::close() !!}
													</div>
												<div class="file-path-wrapper">
													<input class="file-path validate" type="text">
												</div>
											</div>
								</div>

								<!--Garment Description Here-->
								<div class="col s12" style="margin-top:10px; color:gray"><p>Garment description below:</p></div>
								<div class="col s12" style="margin-left:130px">
									<div class="col s4" style="color:teal;"><p><b>Garment Category:</b></p></div>
									<div class="col s8"><p>{{ $segment->strGarmentCategoryName }}</p></div>

									<div class="col s4" style="color:teal;"><p><b>Garment Segment:</b></p></div>
									<div class="col s8"><p>{{ $segment->strSegmentName }}</p></div>

									<div class="col s4" style="color:teal;"><p><b>Sex(Applicable):</b></p></div>
									@if($segment->strSegmentSex == 'M') <div class="col s8"><p>Male</p></div>
			                        @elseif($segment->strSegmentSex == 'F') <div class="col s8"><p>Female</p></div>
			                        @endif

									<div class="col s4" style="color:teal;"><p><b>Price starts from:</b></p></div>
									<div class="col s8" style="color:red"><p>{{ number_format($segment->dblSegmentPrice, 2) }} PHP</p></div>

									<div class="col s4" style="color:teal;"><p><b>Time to finish(min):</b></p></div>
									<div class="col s8" style="color:red"><p>{{ $segment->intMinDays }} days</p></div>
								</div>

							</div>
						</div>

							<div class="col s12" >
								<div class="divider" style="margin-bottom:30px; margin-top:30px; height:5px"></div>
							</div>
						<br>
						<div class="divider" style="height:2px;margin-top:40px"></div>
<!-- END OF LOOP -->	@endforeach
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////--> 
<!--/////////////////////////////////////////// END OF AN ITERATION  ////////////////////////////////////////////////////////-->
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////--> 

							<div class="col s12" style="padding:30px">
								<div class="col s6">
									<a class="btn" style="color:white; background-color:teal; border:3px teal solid">Cancel Transaction</a>
								</div>	
								<div class="col s6">
									<a href="{{URL::to('transaction/walkin-individual')}}" class="right btn" style="color:white; background-color:teal; margin-left:20px; border:3px teal solid">Add another set</a>
									<a href="{{URL::to('transaction/walkin-individual-retail-products')}}" class="right btn" style="color:white; background-color:teal; border:3px teal solid">Add a retail order</a>
								</div>
							</div>

							<div class="divider" style="height:2px; margin-top:50px"></div> 
							<div class="divider" style="height:2px; margin-top:50px"></div>      	
				      		<center><p><font color="gray">End of order list wanting to purchase</font></p></center>
						
						</div>
					</div>
				</div>
			</div>
		<!-- END of CUSTOMIZATION OF ORDERS HERE -->

		</div>
	</div>



@stop

@section('scripts')

	<script>

	  $(document).ready(function() {
	    $('select').material_select();
		$('.tooltipped').tooltip({delay: 50});
	  });
	  
	</script>

@stop