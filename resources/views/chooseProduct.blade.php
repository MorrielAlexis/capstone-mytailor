@extends('layouts.master')

@section('content')

	<a style="color:black" class="btn btn-large center-text light-green accent-1" href="{{URL::to('transaction/walk')}}">Back to Main Menu</a>

	<div class = "main-wrapper">	
		<div class="row">
	      <div class="col s12 m12 l12">
	      	<span class="page-title"><h4>Choose Product</h4></span>
	      </div>
    	</div>   
  	</div>

  	<div class = "container">
	  	<div class="row">
	      	<div class="col s12 m12 l12">
		        <div class="card-panel">
		          	<div class="card-content">
		          		<div class = "row">
				    		<div class = "col s6">
				    			<center><button style="color:black" class="modal-trigger btn btn-small center-text light-green accent-1" href="#modalChoose">Choose Design from Catalogue</button></center>
				    		</div>
				    		<div class = "col s6">
				    			<center><button style="color:black" class="modal-trigger btn btn-small center-text light-green accent-1" href="#modalUpload">Upload Design</button></center>
				    		</div>
				    	</div> 
				    	 <div class = "row">

						    <div class="col s12 m12 l12 overflow-x">
						    	<table class = "centered">
						    		<thead>
						    			<tr>
						    				<th>Order No.</th>
						    				<th>Garment Type</th>
						    				<th>Garment Name</th>
						    				<th>Garment Image</th>
						    				<th>Quantity</th>
						    				<th>Fabric Type</th>
						    				<th>Swatch Fabric Name</th>
						    				<th>Swatch Image</th>
						    				<th>Swatch Code</th>
						    				<th>Measurement</th>
						    			</tr>
						    		</thead>
						    		<tbody>
						    			<tr>
						    				<td>1</td>
						    				<td>Uniform</td>
						    				<td>Women's Uniform</td>
						    				<td><img class="img hoverable" src="img/uniform3.jpg"></td>
						    				<td>1</td>
						    				<td>Linen</td>
						    				<td>Linen Keme</td>
						    				<td><img class="img hoverable" src="imgSwatches/citadel alpine.jpg"></td>
						    				<td>LINK001</td>
						    				<td><button style="color:black" class="modal-trigger btn btn-small center-text light-green accent-1" href="#modalUpload">Record</button></td>
						    			</tr>
						    			<tr>
						    				<td>2</td>
						    				<td>Gown</td>
						    				<td>Tube Cocktail</td>
						    				<td><img class="img hoverable" src="img/gown2.jpg"></td>
						    				<td>1</td>
						    				<td>Cotton</td>
						    				<td>Cotton Keme</td>
						    				<td><img class="img hoverable" src="imgSwatches/citadel grape.jpg"></td>
						    				<td>COT001</td>
						    				<td><button style="color:black" class="modal-trigger btn btn-small center-text light-green accent-1" href="#modalUpload">Record</button></td>
						    			</tr>
						    		</tbody>
						    	</table>
						    </div>
				                  
				            <div class = "clearfix"></div>
				        </div>
		          	</div>
		        </div>
		    </div>
		</div>
	</div>

	<div id="modalChoose" class="modal modal-fixed-footer">	
		<div class = "modal-content">
			<h3>Catalogue Design</h3>

			<div class = "row">
				<div class="input-field col s6">
				    <select>
				      <option value="" disabled selected>Choose Garment</option>
				      <option value="1">Uniform</option>
				      <option value="2">Gown</option>
				      <option value="3">Suit</option>
				    </select>
				    <label>Garment Type:</label>
				</div>

				<div class="input-field col s6">
				    <select>
				      <option value="" disabled selected>Choose Garment Name</option>
				      <option value="1">Women's Uniform</option>
				      <option value="2">Men's Uniform</option>
				      <option value="3">Uniform Something Fucking Shit :3</option>
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
				<div class = "divider col s12"></div>
				<br>
				<div class="input-field col s6">
				    <select>
				      <option value="" disabled selected>Choose Fabric Type</option>
				      <option value="1">Linen</option>
				      <option value="2">Cotton</option>
				    </select>
				    <label>Fabric Type:</label>
				</div>

				<div class="input-field col s6">
				    <select>
				      <option value="" disabled selected>Choose Swatch Name</option>
				      <option value="1">Linen Keme</option>
				      <option value="2">Linen Chuchu</option>
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
			</div>	

		</div>	
		<div class = "modal-footer">
            <button type="submit" class="waves-effect waves-green btn-flat">Save</button>  
            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>   
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