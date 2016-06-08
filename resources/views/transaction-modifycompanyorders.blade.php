@extends('layouts.master')

@section('content')

<div class="main-wrapper"  style="margin-top:30px">

  	<div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><h4>Company Customers</h4></span>
      </div>
    </div>

	<div class="row">
	    <div class="col s12 m12 l12">
	    	<div class="card-panel">
		        <span class="card-title"><h5 style="color:#1b5e20"><center>Orders</center></h5></span>
		        <div class="divider" style="margin-bottom:30px;"></div>

		        <ul class="collapsible popout" data-collapsible="accordion" style="border:none;">
			    
			    <li style="margin-bottom:10px;">
			        <div class="collapsible-header" style="padding:10px;">
			        	{!! Form::open() !!}
	        			<div class="input-field row">
	        				<div class="input-field col s6">
					        	<input placeholder="001" id="order_name" type="text" class="validate" readonly>
					          	<label style="color:black; margin-top:20px;" for="order_name">Company ID</label>
					        </div>
					        <div class="input-field col s6">
					        	<input placeholder="Little Mix" id="customer_name" type="text" class="validate" readonly>
					          	<label style="color:black; margin-top:20px;" for="customer_name">Company Name</label>
					        </div>
	        			</div>
	        			{!! Form::close() !!}
			        </div>

					<div class="collapsible-body">
						<div class="row">
							<div class="col s12">
								<div class="col s10">
									<h5 style="color:#1b5e20; margin-left:20px;">Package Details</h5>
								</div>
								<div class="col s2">
									<div class="btn modal-trigger red lighten-1" href="#employeesmodal" style="margin-top:20px;"><font color="#ffebee">Employees</font></div>
								</div>
							</div>
						</div>

						<div class = "row">

						    <div class="col s12 m12 l12 overflow-x">
						    	<table class = "centered">
						    		<thead>
						    			<tr>
						    				<th>Garment Type</th>
						    				<th>Garment Image</th>
						    				<th>Garment Segment</th>
						    				<th>Segment Pattern</th>
						    				<th>Fabric Type</th>
						    				<th>Swatch Pattern</th>
						    				<th></th>
						    				<th></th>
						    			</tr>
						    		</thead>
						    		<tbody>
						    			<tr>
						    				<td>Uniform</td>
						    				<td><img src="{{URL::to('img/female-uniform-plain.jpeg')}}"></td>
						    				<td>Polo</td>
						    				<td>Pencil Cut</td>
						    				<td>Linen</td>
						    				<td><img src="../imgSwatches/citadel alpine.jpg"></td>
						    				<td><a class=" btn modal-trigger tooltipped" href="{{URL::to('transaction-modifycompanyorders-modifyorder')}}" data-position="top" data-delay="50" data-tooltip="Edit/Modify Order"><i class="mdi-editor-border-color"></i></a></td>
						    				<td><a class="btn modal-trigger tooltipped circle red" href="#removeOrder" data-position="top" data-delay="50" data-tooltip="Delete Order" style="border-radius:180px;"><i class="mdi-content-clear"></i></a></td>
						    			</tr>
						    			<tr>
						    				<td>Uniform</td>
						    				<td><img src="{{URL::to('img/male-uniform-pants-plain.jpg')}}"></td>
						    				<td>Pants</td>
						    				<td>Pencil Cut</td>
						    				<td>Linen</td>
						    				<td><img src="../imgSwatches/citadel grape.jpg"></td>
						    				<td><a class=" btn modal-trigger tooltipped" href="{{URL::to('transaction-modifycompanyorders-modifyorder')}}" data-position="top" data-delay="50" data-tooltip="Edit/Modify Order"><i class="mdi-editor-border-color"></i></a></td>
						    				<td><a class="btn modal-trigger tooltipped circle red" href="#removeOrder" data-position="top" data-delay="50" data-tooltip="Delete Order" style="border-radius:180px;"><i class="mdi-content-clear"></i></a></td>
						    			</tr>
						    		</tbody>
						    	</table>
						    </div>
				                  
				            <div class = "clearfix"></div>

				            <div class="divider container" style="width:95%; margin-bottom:20px;"></div>

				            <div class="col s12">
					            <div class="input-field col s3">
						        	<input placeholder="" id="delivery_date" type="text" class="validate" readonly>
						          	<label style="color:black" for="package_name">Package Name</label>
						        </div>
					            <div class="input-field col s3">
						        	<input style="color:black" placeholder="" id="delivery_date" type="text" class="validate" readonly>
						          	<label style="color:black" for="quantity_package">Quantity per Package</label>
						        </div>
						        <div class="col s2">
						        	<h5></h5>
						        </div>
						        <div class="input-field col s4">
						        	<input style="color:black" placeholder="07 / 07 / 2016" id="delivery_date" type="text" class="validate" readonly>
						          	<label style="color:black" for="delivery_date">Estimated Delivery Date</label>
						        </div>
					        </div>

				        </div>

					</div>
			    </li>
			    
			    </ul>

		    </div>
		</div>
	</div>



	<!--Remove Order Modal-->
	<div id="removeOrder" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:150px">
		<h5><font color="red"><center><b>Warning!</b></center></font></h5>
		<div class="divider" style="height:2px"></div>
		<div class="modal-content">
			<div class="row">
				<div class="col s3">
					<i class="mdi-alert-warning" style="font-size:50px; color:red"></i>
				</div>
				<div class="col s9">
					<p><font size="+1">Are you sure you want to remove this order?</font></p>
				</div>
			</div>
		</div>
		<div class="modal-footer col s12" style="background-color:red; opacity:0.85">
            <button type="submit" class="waves-effect waves-green btn-flat" href="#!"><font color="black">Yes</font></button>
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">No</font></a>
        </div>
	</div>	

	<!--Employees button Modal-->
	<div id="employeesmodal" class="modal modal-fixed-footer">
		<div class="modal-content">
			<h4 style="color:#1b5e20" class="center">Employees</h4>
			<div class="divider container" style="margin-bottom:20px;"></div>

			<table style="margin-bottom:10px;">
			    <table class = "table centered order-summary" border = "1">
       				<thead style="color:gray">
	          			<tr>
		                  	<th>Employee Name</th>
		                  	<th>Sex</th>
		                  	<th>Package</th>
		                  	<th>Order Details</th>
		                  	<th>
								<a class="btn tooltipped purple accent-1" data-position="bottom" data-delay="50" data-tooltip="Edit Employee Details" href="{{URL::to('transaction-modifycompanyorders-modifyemployee')}}" style="margin-top:20px;"><i class="mdi-editor-border-color"></i></a>	
		                  	</th>
		              	</tr>
	              	</thead>
			    </table>
			</table>
			<div class="row">
		        <div>
    		        <ul class="collapsible z-depth-0" data-collapsible="accordion" style="border:none;">
		
					    <li>
					        <div class="collapsible-header" style="background-color:#ffebee;">
								<div class="row">
									<div style="color:black" class="input-field col s4">
			                            <input value="Klare Desteen T. Montefalco" id="empname" type="text">		           
			                        </div>
			                        <div style="color:black" class="input-field col s2">
			                            <input class="center" value="Female" id="sex" type="text">		           
			                        </div>
			                        <div style="color:black" class="input-field col s1">
			                            <input class="center" value="A" id="package" type="text">		           
			                        </div>
			                        <div style="color:black" class="input-field col s4">
			                            <input class="left" value="Package A for Female" id="orderdetails" type="text">		           
			                        </div>

									<div style="color:black" class="col s1">
										<a style="color:black; margin-top:20px" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of employee from list" href="#!"><i class="mdi-action-delete center"></i></a>
									</div>
								</div>
							</div>
							<div class="collapsible-body" style="border:3px solid #ffebee; border-top:none;">
								<div class="row">
									<div class="col s6">
										<div class="input-field">
						                  	<input id ="measurement" type="text" class="validate">
						                  	<label for="measurement">Measurement</label>
						                </div>
						                <div class="input-field">
						                  	<input id ="measurement" type="text" class="validate">
						                  	<label for="measurement">Measurement</label>
						                </div>
						                <div class="input-field">
						                  	<input id ="measurement" type="text" class="validate">
						                  	<label for="measurement">Measurement</label>
						                </div>
									</div>
									<div class="col s6">
										<div class="input-field">
						                  	<input id ="measurement" type="text" class="validate">
						                  	<label for="measurement">Measurement</label>
						                </div>
						                <div class="input-field">
						                  	<input id ="measurement" type="text" class="validate">
						                  	<label for="measurement">Measurement</label>
						                </div>
						                <div class="input-field">
						                  	<input id ="measurement" type="text" class="validate">
						                  	<label for="measurement">Measurement</label>
						                </div>
									</div>
								</div>
							</div>
						</li>
						<li>
					        <div class="collapsible-header" style="background-color:#e1f5fe;">
								<div class="row">
									<div style="color:black" class="input-field col s4">
			                            <input value="Elijah Riley V. Montefalco" id="empname" type="text">		           
			                        </div>
			                        <div style="color:black" class="input-field col s2">
			                            <input class="center" value="Male" id="sex" type="text">		           
			                        </div>
			                        <div style="color:black" class="input-field col s1">
			                            <input class="center" value="none" id="package" type="text">		           
			                        </div>
			                        <div style="color:black" class="input-field col s4">
			                            <input value="1 pc pants, 2 pc polo" id="orderdetails" type="text">		           
			                        </div>

									<div style="color:black" class="col s1">
										<a style="color:black; margin-top:20px" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of employee from list" href="#!"><i class="mdi-action-delete"></i></a>
									</div>
								</div>
							</div>
							<div class="collapsible-body" style="border:3px solid #ffebee; border-top:none;">
								<div class="row">
									<div class="col s6">
										<div class="input-field">
						                  	<input id ="measurement" type="text" class="validate">
						                  	<label for="measurement">Measurement</label>
						                </div>
						                <div class="input-field">
						                  	<input id ="measurement" type="text" class="validate">
						                  	<label for="measurement">Measurement</label>
						                </div>
						                <div class="input-field">
						                  	<input id ="measurement" type="text" class="validate">
						                  	<label for="measurement">Measurement</label>
						                </div>
									</div>
									<div class="col s6">
										<div class="input-field">
						                  	<input id ="measurement" type="text" class="validate">
						                  	<label for="measurement">Measurement</label>
						                </div>
						                <div class="input-field">
						                  	<input id ="measurement" type="text" class="validate">
						                  	<label for="measurement">Measurement</label>
						                </div>
						                <div class="input-field">
						                  	<input id ="measurement" type="text" class="validate">
						                  	<label for="measurement">Measurement</label>
						                </div>
									</div>
								</div>
							</div>
						</li>

					</ul>
		        </div>
		    </div>

		</div>

		<div class="modal-footer" style="background-color:#26a69a">
			<a href="" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
		</div>
	</div>

@stop

@section('scripts')

	<script>
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
	 $(document).ready(function(){
		$('.tooltipped').tooltip({delay: 50});
	 });
	</script>

	<script>
		$(document).ready(function(){
		    $('.collapsible').collapsible({
		    	accordion : true // A setting that changes the collapsible behavior to expandable instead of the default accordion style
		    });
		});
	</script>

	<script>
	 $(document).ready(function(){
	    $('.materialboxed').materialbox();
	  });
	 </script>

@stop