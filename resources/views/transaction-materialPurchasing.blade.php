@extends('layouts.master')

@section('content')

	<div class = "main-wrapper" style="margin-top:30px">	
			<div class="row">
		      <div class="col s12 m12 l12">
		      	<span class="page-title"><h4>Material Purchasing</h4></span>
		      </div>
	    	</div>
	</div>

	<button class="waves-effect waves-dark btn light-green accent-1" style="color:black; margin-left:20px"><i class="material-icons left">system_update_alt</i>Print Data</button>

	<div class = "row" style="margin:20px;">

		<div class = "col s12 m12 l12" style="background:white; padding-top:20px; padding-left:5px; padding-right:5px; padding-bottom:5px;  border:3px outset gray;">			
			<div class="input-field col s6" style="padding-left:20px">
		          <input style="color:black" disabled id="cust_id" type="text" class="validate" value="IND00001"></input>
		          <label for="cust_id" style="color:black">CUSTOMER ID:</label>
  			</div>

  			<div class="input-field col s6" style="padding-left:20px">
		          <input style="color:black" disabled id="cust_name" type="text" class="validate" value="BUENAVIDES, HONEY MAY A."></input>
		          <label for="cust_name" style="color:black">CUSTOMER NAME:</label>
  			</div> 			
  		</div>


  		<div class = "col s12 m12 l12" style="background:white; padding:40px;  border:3px inset gray;">			
			<label><left>Materials To be Purchased</left></label>
			<label style="padding-left:600px">March 12, 2016 2:30AM</label>

			<div>
				<label style="color:red"><font size="+1">JobOrder 0001</font></label>
			</div>
			<div class="input-field col s12" style="padding-left:10px">
			
				<div class="col s12" style="margin-top:5px; background:white; padding-top:20px; padding-bottom:25px;">
					<table class = "table centered" border = "1">
					<div class="divider"></div>
	       				<thead>
		          			<tr>
		          				 <th data-field="job_order">MATERIAL CATEGORY</th>
		                 		 <th data-field="order">MATERIAL NAME</th> 
		                 		 <th data-field="swatch">SWATCH CODE (if available)</th> 
		                 		 <th data-field="quantity">SPECIFICATION</th>
		                 		 <th data-field="price">QUANTITY</th>
		                 	</tr>
	                 	</thead>
	                 	<tbody>
	                 		<tr>
	                 			<td>Fabric</td>
	                 			<td>Cotton</td>
	                 			<td>#COT0001</td>
	                 			<td></td>
	                 			<td>3 yards</td>
	                 		</tr>
	                 		<tr>
	                 			<td>Button</td>
	                 			<td>Mushroom Button</td>
	                 			<td></td>
	                 			<td>3-holed, black, small</td>
	                 			<td>1 dozen</td>
	                 		</tr>
	                 		<tr>
	                 			<td>Thread</td>
	                 			<td>Nylon Thread</td>
	                 			<td></td>
	                 			<td>Yellow, Large</td>
	                 			<td>2 pieces</td>
	                 		</tr>
	                 		<tr>
	                 			<td>Fabric</td>
	                 			<td>Linen</td>
	                 			<td>#LIN0002</td>
	                 			<td></td>
	                 			<td>30 yards</td>
	                 		</tr>
	                 	</tbody>
                 	</table> 
	  			</div>
	  		</div>
	  	</div>


	  	<div class = "col s12 m12 l12" style="background:white; padding:40px;  border:3px inset gray;">			
				<label><left>Materials To be Purchased</left></label>
				<label style="padding-left:600px">March 12, 2016 2:30AM</label>
	  		<div>
				<label style="color:red"><font size="+1">JobOrder 0002</font></label>
			</div>
			<div class="input-field col s12" style="padding-left:10px">
			
				<div class="col s12" style="margin-top:5px; background:white; padding-top:20px; padding-bottom:25px;">
					<table class = "table centered" border = "1">
					<div class="divider"></div>
	       				<thead>
		          			<tr>
		          				 <th data-field="job_order">MATERIAL CATEGORY</th>
		                 		 <th data-field="order">MATERIAL NAME</th> 
		                 		 <th data-field="swatch">SWATCH CODE (if available)</th> 
		                 		 <th data-field="quantity">SPECIFICATION</th>
		                 		 <th data-field="price">QUANTITY</th>
		                 	</tr>
	                 	</thead>
	                 	<tbody>
	                 		<tr>
	                 			<td>Fabric</td>
	                 			<td>Cotton</td>
	                 			<td>#COT0001</td>
	                 			<td></td>
	                 			<td>3 yards</td>
	                 		</tr>
	                 		<tr>
	                 			<td>Button</td>
	                 			<td>Mushroom Button</td>
	                 			<td></td>
	                 			<td>3-holed, black, small</td>
	                 			<td>1 dozen</td>
	                 		</tr>
	                 		<tr>
	                 			<td>Thread</td>
	                 			<td>Nylon Thread</td>
	                 			<td></td>
	                 			<td>Yellow, Large</td>
	                 			<td>2 pieces</td>
	                 		</tr>
	                 		<tr>
	                 			<td>Fabric</td>
	                 			<td>Linen</td>
	                 			<td>#LIN0002</td>
	                 			<td></td>
	                 			<td>30 yards</td>
	                 		</tr>
	                 	</tbody>
                 	</table> 
	  			</div>
			</div>
		</div>
	</div>

@stop


 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
 <script type="text/javascript" src="js/materialize.min.js"></script>
 <script type="text/javascript">
	 $(document).ready(function() {
	    $('select').material_select();
	  });
 </script>