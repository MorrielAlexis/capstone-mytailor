@extends('layouts.master')

@section('content')

	<div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><center><h3><b>Welcome to <font color="white">MyTailor</font></b></h3></center></span>
        <center><h5>Walk-in Individual - Customization Process</h5></center>
      </div>
    </div>

	<div class="row">
		<div class="col s12 m12 l12">

			<!-- CUSTOMIZING ORDER HERE -->
			<div class="col s12">
				<ul class="tabs transparent" style="margin-top:10px">
					<li class="tab col s12" style="border-top-left-radius: 20px; border-top-right-radius: 20px;"><a style="color:black; padding-top:5px; opacity:0.80" href="#shoppingCart"></a></li>	
					<div class="indicator white" style="z-index:1"></div>
	            </ul>
				<div class="card-panel">
					<div class="card-content">
						<div class="row">
						<div class="col s12">						
							<div class="col s12">
								
								<div class="col s6"><p><h5><b>Customize Orders Per Package</b></h5></p></div>
									<div class="right col s1"><a style="margin-top:15px; background-color:teal" type="submit" class="waves-effect waves-green btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to go back home" href="{{URL::to('/transaction/walkin-individual')}}"><i class="mdi-action-home" style="color:white; opacity:0.90; font-size:30px;"></i></a></div>
									<div class="right col s5"><a style="background-color:teal; margin-top:15px" type="submit" class="right waves-effect waves-green modal-trigger btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to proceed to payment of orders" href="#summary-of-order"><font color="white" size="+1"><!--<i class="mdi-action-payment" style="font-size:20px;">  -->Proceed to Checkout<!--</i>--></font></a></div>				
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

												      	<div class="col s12" style="margin-bottom:50px" >
															<div class="col s6"><p style="color:gray">Estimated time to finish all orders:<p style="color:black">10 days</p></p></div>
															<div class="col s6"><p style="color:gray">Total Amoun to Pay:<p style="color:black">1,650.00 PHP</p></p></div>
														</div>
													</div>



													<div class="modal-footer col s12">
										                <p class="left" style="margin-left:10px; color:gray;">Continue to payment?</p>
										                <a class="waves-effect waves-green btn-flat" href="{{URL::to('/transaction/walkin-individual-bulk-orders-payment-customer-info')}}"><font color="black">Yes</font></a>
										                <a href="{{URL::to('/transaction/walkin-individual-bulk-orders-customize')}}" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">No</font></a>
										            </div>
												{!! Form::close() !!}
										</div>
							</div>
							
							<div class="divider" style="margin-bottom:30px"></div>
							<div class="divider" style="margin-bottom:30px"></div>
							<div class="divider" style="margin-bottom:20px; height:3px"></div>

							<div class="col s12" style="margin-top:2px; padding-top:5px; margin-bottom:30px;">
						        <center><h4 style="color:teal"><b>List of Orders</b><!--<a class="right btn-floating tooltipped btn-large blue" data-position="bottom" data-delay="50"  data-tooltip="CLick to print a receipt for current transaction" href="#!" style="color:black; margin-right:35px; margin-left: 20px;"><i class="large mdi-editor-mode-edit"></i></a>--></h4></center>
						        <center><p style="color:gray">Click on each of the products purchased for customization</p></center>
						        <div class="divider" style="margin-bottom:5px; background-color:teal; height:2px"></div>
						    </div>    
						    

							<div class="col s6">
								<a style="color:black; margin-left:50px" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to remove order" href="#removeOrder"><i class="mdi-navigation-close"></i></a>
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
								                <a class="waves-effect waves-green btn-flat" href="{{URL::to('/transaction/walkin-individual-bulk-orders-customize')}}"><font color="white">Yes</font></a>
								                <a href="{{URL::to('/transaction/walkin-individual-bulk-orders-customize')}}" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="white">No</font></a>
								            </div>
										{!! Form::close() !!}
								</div>

								<div class="card medium z-depth-2" style="margin-left:100px; margin-top:20px; height:350px; width:350px; border:3px gray solid">
				           				 <div class="card-image">
				              				<img class="responsive-img" height = "80%" src="{{URL::to('img/mens-uniform.jpg')}}">
				           				 </div>
				            			<div class="card-content">
				             				<p class="center-align">
				             				 <span class="card-title" style="color:black"><b>Men Set <font color="red">A</font></b></span>
				             					 <p class="center-align" style="color:teal">Package includes:</p>
				             					 <p class="center-align" style="color:gray">1 x Polo, 1 x Pants</p>
				           				 	</p>
				           				</div>
				         		</div>
	                  			
				         		<div class="col s12" style="margin-top:10px; margin-left:20px">
				         			<center><a class="btn" href="{{URL::to('/transaction/walkin-individual-bulk-orders-customize-per-piece')}}" style="background-color:red">Customize Package</a></center>
				         		</div>

								</div>


								<div class="col s6">
								<a style="color:black; margin-left:50px" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to remove order" href="#removeOrder"><i class="mdi-navigation-close"></i></a>
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
								                <a class="waves-effect waves-green btn-flat" href="{{URL::to('/transaction/walkin-individual-bulk-orders-customize')}}"><font color="white">Yes</font></a>
								                <a href="{{URL::to('/transaction/walkin-individual-bulk-orders-customize')}}" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="white">No</font></a>
								            </div>
										{!! Form::close() !!}
								</div>

								<div class="z-depth-2 card medium" style="margin-left:100px; margin-top:20px; height:350px; width:350px; border:3px gray solid">
			           				<div class="card-image">
			              				<img class="responsive-img" height = "80%" src="{{URL::to('img/womens-uniform.jpg')}}">
			           				</div>
			            			<div class="card-content">
			             				<p class="center-align">
			             				 	<span class="card-title" style="color:black"><b>Women Set <font color="red">A</font></b></span>
			             						<p class="center-align" style="color:teal">Package includes:</p>
			             						<p class="center-align" style="color:gray">1 x Polo, 1 x Skirt</p>
			           				 	</p>
			           				</div>
			         			</div>
	                  			
			         			<div class="col s12" style="margin-top:10px; margin-left:20px;">
				         			<center><a class="btn" href="" style="background-color:red">Customize Package</a></center>
				         		</div>

								</div>

								<div class="col s12"  style="margin-bottom:40px"></div>


					</div>
				</div>

						<div class="divider" style="height:2px;margin-top:40px"></div>
						<div class="col s12" style="padding:30px">
							<div class="col s6">
								<a href="{{URL::to('transaction/walkin-individual')}}" class="btn" style="color:white; background-color:teal; border:3px teal solid">Cancel Transaction</a>
							</div>	
							<div class="col s6">
								<a href="{{URL::to('transaction/walkin-individual-bulk-orders')}}" class="right btn" style="color:white; background-color:teal; margin-left:20px; border:3px teal solid">Add another set</a>
								<a href="{{URL::to('transaction/walkin-individual')}}" class="right btn" style="color:white; background-color:teal; border:3px teal solid">Add a retail order</a>
							</div>
						</div>


							<div class="divider" style="height:2px; margin-top:50px"></div>    
							<div class="divider" style="height:2px; margin-top:50px"></div>   	
				      		<center><p><font color="gray">End of list of packages purchased</font></p></center>
						
						</div>
					</div>
					</div>


				<!-- END OF CUSTOMIZATION HERE-->


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


@stop