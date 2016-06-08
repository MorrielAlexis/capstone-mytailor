@extends('layouts.master')

@section('content')

<div class="main-wrapper"  style="margin-top:30px">

  	<div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><h4>Individual Customers</h4></span>
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
					        	<input color="black" placeholder="001" id="order_name" type="text" class="validate" readonly>
					          	<label style="margin-top:20px;" for="order_name">Order No.</label>
					        </div>
					        <div class="input-field col s6">
					        	<input color="black" placeholder="Liza Soberano" id="customer_name" type="text" class="validate" readonly>
					          	<label style="margin-top:20px;" for="customer_name">Customer Name</label>
					        </div>
	        			</div>
	        			{!! Form::close() !!}
			        </div>

					<div class="collapsible-body">
						<h5 style="color:#1b5e20; margin-left:20px;">Order Specification</h5>

						<div class = "row">

						    <div class="col s12 m12 l12 overflow-x">
						    	<table class = "centered">
						    		<thead>
						    			<tr>
						    				<th>Garment Type</th>
						    				<th>Garment Image</th>
						    				<th>Garment Segment</th>
						    				<th>Segment Pattern</th>
						    				<th>Quantity</th>
						    				<th>Fabric Type</th>
						    				<th>Swatch Pattern</th>
						    				<th></th>
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
						    				<td>1</td>
						    				<td>Linen</td>
						    				<td><img src="../imgSwatches/citadel alpine.jpg"></td>
						    				<td><a class=" btn modal-trigger tooltipped" href="#measurementmodal" data-position="top" data-delay="50" data-tooltip="Measurements"><i class="mdi-action-view-headline"></i></a></td>
						    				<td><a class=" btn modal-trigger tooltipped" href="{{URL::to('transaction-modifyindividualorders-modifyorder')}}" data-position="top" data-delay="50" data-tooltip="Edit/Modify Order"><i class="mdi-editor-border-color"></i></a></td>
						    				<td><a class="btn modal-trigger tooltipped circle red" href="#removeOrder" data-position="top" data-delay="50" data-tooltip="Delete Order" style="border-radius:180px;"><i class="mdi-content-clear"></i></a></td>
						    			</tr>
						    			<tr>
						    				<td>Uniform</td>
						    				<td><img src="{{URL::to('img/male-uniform-pants-plain.jpg')}}"></td>
						    				<td>Pants</td>
						    				<td>Pencil Cut</td>
						    				<td>1</td>
						    				<td>Linen</td>
						    				<td><img src="../imgSwatches/citadel grape.jpg"></td>
						    				<td><a class=" btn modal-trigger tooltipped" href="#measurementmodal" data-position="top" data-delay="50" data-tooltip="Measurements"><i class="mdi-action-view-headline"></i></a></td>
						    				<td><a class=" btn modal-trigger tooltipped" href="{{URL::to('transaction-modifyindividualorders-modifyorder')}}" data-position="top" data-delay="50" data-tooltip="Edit/Modify Order"><i class="mdi-editor-border-color"></i></a></td>
						    				<td><a class="btn modal-trigger tooltipped circle red" href="#removeOrder" data-position="top" data-delay="50" data-tooltip="Delete Order" style="border-radius:180px;"><i class="mdi-content-clear"></i></a></td>
						    			</tr>
						    		</tbody>
						    	</table>
						    </div>
				                  
				            <div class = "clearfix"></div>
				            <div class="input-field col offset-s9">
					        	<input color="black" placeholder="07 / 07 / 2016" id="delivery_date" type="text" class="validate" readonly>
					          	<label for="delivery_date">Estimated Delivery Date</label>
					        </div>
				        </div>

					</div>
			    </li>
			    <li style="margin-bottom:10px;">
			        <div class="collapsible-header" style="padding:10px;">
			        	{!! Form::open() !!}
	        			<div class="input-field row">
	        				<div class="input-field col s6">
					        	<input color="black" placeholder="001" id="order_name" type="text" class="validate" readonly>
					          	<label style="margin-top:20px;" for="order_name">Order No.</label>
					        </div>
					        <div class="input-field col s6">
					        	<input color="black" placeholder="Liza Soberano" id="customer_name" type="text" class="validate" readonly>
					          	<label style="margin-top:20px;" for="customer_name">Customer Name</label>
					        </div>
	        			</div>
	        			{!! Form::close() !!}
			        </div>

					<div class="collapsible-body">
						<h5 style="color:#1b5e20; margin-left:20px;">Order Specification</h5>

						<div class = "row">

						    <div class="col s12 m12 l12 overflow-x">
						    	<table class = "centered">
						    		<thead>
						    			<tr>
						    				<th>Garment Type</th>
						    				<th>Garment Image</th>
						    				<th>Garment Segment</th>
						    				<th>Segment Pattern</th>
						    				<th>Quantity</th>
						    				<th>Fabric Type</th>
						    				<th>Swatch Pattern</th>
						    				<th></th>
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
						    				<td>1</td>
						    				<td>Linen</td>
						    				<td><img src="../imgSwatches/citadel alpine.jpg"></td>
						    				<td><a class=" btn modal-trigger tooltipped" href="#measurementmodal" data-position="top" data-delay="50" data-tooltip="Measurements"><i class="mdi-action-view-headline"></i></a></td>
						    				<td><a class=" btn modal-trigger tooltipped" href="{{URL::to('transaction-modifyindividualorders-modifyorder')}}" data-position="top" data-delay="50" data-tooltip="Edit/Modify Order"><i class="mdi-editor-border-color"></i></a></td>
						    				<td><a class="btn modal-trigger tooltipped circle red" href="#removeOrder" data-position="top" data-delay="50" data-tooltip="Delete Order" style="border-radius:180px;"><i class="mdi-content-clear"></i></a></td>
						    			</tr>
						    			<tr>
						    				<td>Uniform</td>
						    				<td><img src="{{URL::to('img/male-uniform-pants-plain.jpg')}}"></td>
						    				<td>Pants</td>
						    				<td>Pencil Cut</td>
						    				<td>1</td>
						    				<td>Linen</td>
						    				<td><img src="../imgSwatches/citadel grape.jpg"></td>
						    				<td><a class=" btn modal-trigger tooltipped" href="#measurementmodal" data-position="top" data-delay="50" data-tooltip="Measurements"><i class="mdi-action-view-headline"></i></a></td>
						    				<td><a class=" btn modal-trigger tooltipped" href="{{URL::to('transaction-modifyindividualorders-modifyorder')}}" data-position="top" data-delay="50" data-tooltip="Edit/Modify Order"><i class="mdi-editor-border-color"></i></a></td>
						    				<td><a class="btn modal-trigger tooltipped circle red" href="#removeOrder" data-position="top" data-delay="50" data-tooltip="Delete Order" style="border-radius:180px;"><i class="mdi-content-clear"></i></a></td>
						    			</tr>
						    		</tbody>
						    	</table>
						    </div>
				                  
				            <div class = "clearfix"></div>
				            <div class="input-field col offset-s9">
					        	<input color="black" placeholder="07 / 07 / 2016" id="delivery_date" type="text" class="validate" readonly>
					          	<label for="delivery_date">Estimated Delivery Date</label>
					        </div>
				        </div>

					</div>
			    </li>
				</ul>

		    </div>
		</div>
	</div>


	<!--Measurement button Modal-->
	<div id="measurementmodal" class="modal modal-fixed-footer">
		<div class="modal-content">
			<h4 style="color:#1b5e20" class="center">Measurements</h4>
			<div class="divider container" style="margin-bottom:20px;"></div>
			<div class="row">
				<div class="col s6">
					<div class="input-field">
	                  	<input id ="measurement" type="text" class="validate">
	                  	<label for="measurement">Hem</label>
	                </div>
	                <div class="input-field">
	                  	<input id ="measurement" type="text" class="validate">
	                  	<label for="measurement">Slim</label>
	                </div>
	                <div class="input-field">
	                  	<input id ="measurement" type="text" class="validate">
	                  	<label for="measurement">Sleeves</label>
	                </div>
				</div>
				<div class="col s6">
					<div class="input-field">
	                  	<input id ="measurement" type="text" class="validate">
	                  	<label for="measurement">Hips</label>
	                </div>
	                <div class="input-field">
	                  	<input id ="measurement" type="text" class="validate">
	                  	<label for="measurement">Circumference</label>
	                </div>
	                <div class="input-field">
	                  	<input id ="measurement" type="text" class="validate">
	                  	<label for="measurement">Slit</label>
	                </div>
				</div>
			</div>

		</div>

		<div class="modal-footer" style="background-color:#26a69a">
			<a href="" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
			<a href="" class="modal-action modal-close waves-effect waves-green btn-flat">Save</a>
		</div>
	</div>

	<!--Remove Order Modal-->
	<div id="removeOrder" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:150px">
		<h5><font color="red"><center><b>Warning!</b></center></font></h5>
		<div class="divider" style="height:2px"></div>
		<div class="modal-content">
			<div class="row">
				<div class="col s3">
					<i class="mdi-alert-warning" style="font-size:50px; color:yellow"></i>
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