@extends('layouts.master')

@section('content')

<div class="main-wrapper"  style="margin-top:30px">

  	<div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><h4>Online Individual Customers</h4></span>
      </div>
    </div>

	<div class="row">
	    <div class="col s12 m12 l12">
	    	<div class="card-panel">
		        <span class="card-title"><h5 style="color:#1b5e20"><center>Orders</center></h5></span>
		        <div class="divider" style="margin-bottom:30px;"></div>

		        <ul class="collapsible z-depth-0" data-collapsible="accordion" style="border:none;">
			    
			    <!--Order#1-->
			    <li style="margin-bottom:10px;">
			        <div class="collapsible-header" style="background-color:#ffebee">
						<div class="row">
							<div class="col s7">
								<table class="centered">
								    <thead>
								    	<tr>
								        	<th style="color:#1b5e20">Track#</th>
								            <th style="color:#1b5e20">Customer Name</th>
								            <th style="color:#1b5e20">Due Date</th>
								        </tr>
								    </thead>

								    <tbody>
								        <tr>
								        	<td>#001</td>
								        	<td>Terena Marqueta</td>
								        	<td>01/04/03</td>
								        </tr>
								    </tbody>
								</table>
							</div>
							<div class="col s5 center" style="margin-top:50px;">
								<table class="centered">
								    <tbody>
								        <tr>
								        	<td><a class="btn modal-trigger" href="#acceptmodal">Accept</a></td>
								        	<td><a class="btn modal-trigger" href="#rejectmodal">Reject</a></td>
								        </tr>
								    </tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="collapsible-body" style="border:3px solid #ffebee;">
						<h5 style="color:#1b5e20; margin-left:20px;">Order Specification</h5>

					    <div class = "row">

						    <div class="col s12 m12 l12 overflow-x">
						    	<table class = "centered">
						    		<thead>
						    			<tr>
						    				<th>Garment Type</th>
						    				<th>Garment Name</th>
						    				<th>Garment Image</th>
						    				<th>Quantity</th>
						    				<th>Fabric Type</th>
						    				<th>Swatch Fabric Name</th>
						    				<th>Swatch Image</th>
						    				<th>Swatch Code</th>
						    				<th></th>
						    			</tr>
						    		</thead>
						    		<tbody>
						    			<tr>
						    				<td>Uniform</td>
						    				<td>Women's Uniform</td>
						    				<td><img class="img hoverable" src="../img/uniform3.jpg"></td>
						    				<td>1</td>
						    				<td>Linen</td>
						    				<td>Linen Keme</td>
						    				<td><img class="img hoverable" src="../imgSwatches/citadel alpine.jpg"></td>
						    				<td>LINK001</td>
						    				<td><a class="btn modal-trigger tooltipped" href="#measurementmodal" data-position="top" data-delay="50" data-tooltip="Measurements"><i class="large material-icons">reorder</i></a></td>
						    			</tr>
						    			<tr>
						    				<td>Gown</td>
						    				<td>Tube Cocktail</td>
						    				<td><img class="img hoverable" src="../img/gown2.jpg"></td>
						    				<td>1</td>
						    				<td>Cotton</td>
						    				<td>Cotton Keme</td>
						    				<td><img class="img hoverable" src="../imgSwatches/citadel grape.jpg"></td>
						    				<td>COT001</td>
						    				<td><a class="btn modal-trigger tooltipped" href="#measurementmodal" data-position="top" data-delay="50" data-tooltip="Measurements"><i class="large material-icons">reorder</i></a></td>
						    			</tr>
						    		</tbody>
						    	</table>
						    </div>
				                  
				            <div class = "clearfix"></div>
				        </div>

					</div>
				</li>

				<!--Order#2-->
			    <li style="margin-bottom:10px;">
			        <div class="collapsible-header" style="background-color:#ffebee">
						<div class="row">
							<div class="col s7">
								<table class="centered">
								    <thead>
								    	<tr>
								        	<th style="color:#1b5e20">Track#</th>
								            <th style="color:#1b5e20">Customer Name</th>
								            <th style="color:#1b5e20">Due Date</th>
								        </tr>
								    </thead>

								    <tbody>
								        <tr>
								        	<td>#002</td>
								        	<td>Timon Vitente Ibarra</td>
								        	<td>01/04/03</td>
								        </tr>
								    </tbody>
								</table>
							</div>
							<div class="col s5 center" style="margin-top:50px;">
								<table class="centered">
								    <tbody>
								        <tr>
								        	<td><a class="btn modal-trigger" href="#acceptmodal">Accept</a></td>
								        	<td><a class="btn modal-trigger" href="#rejectmodal">Reject</a></td>
								        </tr>
								    </tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="collapsible-body" style="border:3px solid #ffebee;">
						<h5 style="color:#1b5e20; margin-left:20px;">Order Specification</h5>

					    <div class = "row">

						    <div class="col s12 m12 l12 overflow-x">
						    	<table class = "centered">
						    		<thead>
						    			<tr>
						    				<th>Garment Type</th>
						    				<th>Garment Name</th>
						    				<th>Garment Image</th>
						    				<th>Quantity</th>
						    				<th>Fabric Type</th>
						    				<th>Swatch Fabric Name</th>
						    				<th>Swatch Image</th>
						    				<th>Swatch Code</th>
						    				<th></th>
						    			</tr>
						    		</thead>
						    		<tbody>
						    			<tr>
						    				<td>Uniform</td>
						    				<td>Women's Uniform</td>
						    				<td><img class="img hoverable" src="../img/uniform3.jpg"></td>
						    				<td>1</td>
						    				<td>Linen</td>
						    				<td>Linen Keme</td>
						    				<td><img class="img hoverable" src="../imgSwatches/citadel alpine.jpg"></td>
						    				<td>LINK001</td>
						    				<td><a class="btn modal-trigger tooltipped" href="#measurementmodal" data-position="top" data-delay="50" data-tooltip="Measurements"><i class="large material-icons">reorder</i></a></td>
						    			</tr>
						    			<tr>
						    				<td>Gown</td>
						    				<td>Tube Cocktail</td>
						    				<td><img class="img hoverable" src="../img/gown2.jpg"></td>
						    				<td>1</td>
						    				<td>Cotton</td>
						    				<td>Cotton Keme</td>
						    				<td><img class="img hoverable" src="../imgSwatches/citadel grape.jpg"></td>
						    				<td>COT001</td>
						    				<td><a class="btn modal-trigger tooltipped" href="#measurementmodal" data-position="top" data-delay="50" data-tooltip="Measurements"><i class="large material-icons">reorder</i></a></td>
						    			</tr>
						    		</tbody>
						    	</table>
						    </div>
				                  
				            <div class = "clearfix"></div>
				        </div>

					</div>
				</li>
				</ul>

		    </div>
		</div>
	</div>


	<!--Accept button Modal-->
	<div id="acceptmodal" class="modal modal-fixed-footer">
		<div class="modal-content">
			<h4 style="color:#1b5e20" class="center">Accepted Order</h4>
			<div class="divider container" style="margin-bottom:20px;"></div>
			<div class="row">
		        <div class="col s12">
		            <div class="card" style="background-color:#ffebee">
		            	<div class="card-content">
		            		<table class="centered">
							    <tbody>
							        <tr>
							        	<td>track#</td>
							        	<td>customer name</td>
							        	<td></td>
							        	<td style="color:#1b5e20">Paid</td>
							        </tr>
							    </tbody>
							</table>
		            	</div>
		            </div>
		        </div>
		    </div>

		</div>

		<div class="modal-footer" style="background-color:#26a69a">
			<a href="" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
			<a href="" class="modal-action modal-close waves-effect waves-green btn-flat">Save</a>
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

		<div class="modal-footer" style="background-color:#26a69a">
			<a href="" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
			<a href="" class="modal-action modal-close waves-effect waves-green btn-flat">Save</a>
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


@stop