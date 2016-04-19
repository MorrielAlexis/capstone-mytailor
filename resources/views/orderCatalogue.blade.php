@extends('layouts.master')

@section('content')
	
	<a style="color:black" class="btn btn-large center-text light-green accent-1" href="{{URL::to('/madeOrder')}}">Previous</a>

	<div class = "main-wrapper">	
		<div class="row">
	      <div class="col s12 m12 l12">
	      	<span class="page-title"><h4>Catalogue Design</h4></span>
	      </div>
    	</div>
  	</div>

  	<div class = "container">
	  	<div class="row">
	      	<div class="col s12 m12 l12">
		        <div class="card-panel">
		          	<div class="card-content">
		          		<div class = "row">
							<div class="input-field col s12">
							    <select>
							      <option value="" disabled selected>Choose Garment</option>
							      <option value="1">Uniform</option>
							      <option value="2">Gown</option>
							      <option value="3">Suit</option>
							    </select>
							    <label>Garment Type:</label>    
							</div>

							<div class="input-field col s12">
							    <select>
							      <option value="" disabled selected>Choose Garment Name</option>
							      <option value="1">Women's Uniform</option>
							      <option value="2">Men's Uniform</option>
							    </select>
							    <label>Garment Name:</label>
							</div>

						 	<div class = "col s3">
						 		<label>Image:</label>
						 	</div>
						 	<div class = "col s3">
						 		<img class="img hoverable" src="img/uniform3.jpg">
						 	</div>	

							<div class = "input-field col s6">
								<input id="quantity" name = "quantity" type="text">
				                <label for="quantity"> Quantity:</label>
							</div>
							<div class = "col s12">
								<center>
									<br><br>
			          				<input type="checkbox" class="filled-in" id="ownFabric" />
	      							<label for="ownFabric">Fabric is provided by the customer.</label>
	      						</center>	
		          			</div>
							<div class="input-field col s12">
							    <select>
							      <option value="" disabled selected>Choose Fabric Type</option>
							      <option value="1">Linen</option>
							      <option value="2">Cotton</option>
							    </select>
							    <label>Fabric Type:</label>
							</div>

							<div class="input-field col s12">
							    <select>
							      <option value="" disabled selected>Choose Swatch Name</option>
							      <option value="1">Chiffon Citadel</option>
							      <option value="2">Silk Citadel</option>
							    </select>
							    <label>Swatch Name:</label>
							</div>

						 	<div class = "col s3">
						 		<label>Image:</label>
						 	</div>
						 	<div class = "col s3">
						 		<img class="img hoverable" src="imgSwatches/citadel alpine.jpg">
						 	</div>	

							<div class = "input-field col s6">
								<input id="swatchCode" name = "swatchCode" type="text" readonly>
				                <label for="swatchCode"> Swatch Code:</label>
							</div>
							 <div class="input-field col s12">
			                  <input id="note" name = "note" type="text" readonly>
			                  <label for="note"> Note:</label>
			                </div>

			        		<center><a style="color:black" class="btn btn-large center-text light-green accent-1" href="">Place Order</a></center>
						</div>	
		          	</div>
		        </div>
		    </div>
		</div>
	</div>	          	
@stop  	

@section('scripts')
	<script type="text/javascript">
		$(document).ready(function() {
	    $('select').material_select();
	  });
	</script>
@stop