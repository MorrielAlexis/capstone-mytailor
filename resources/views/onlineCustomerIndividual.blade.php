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

		        <!--Order#1-->
		        <ul class="collapsible z-depth-0" data-collapsible="accordion" style="border:none;">
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
								<div class="btn" href="#!">Accept</div>
								<div class="btn" href="#!">Reject</div>
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
								<div class="btn" href="#!">Accept</div>
								<div class="btn" href="#!">Reject</div>
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



@stop

@section('scripts')

	<script>
		$(document).ready(function() {
	    	$('select').material_select();
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