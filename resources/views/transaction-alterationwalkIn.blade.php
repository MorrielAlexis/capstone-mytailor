@extends('layouts.master')

@section('content')

<div class="main-wrapper"  style="margin-top:30px">

	<div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><center><h3><b>Welcome to <font color="white">MyTailor</font></b></h3></center></span>
        <center><h5>Walk-in Alteration </h5></center>
      </div>
    </div>

    <div class="row">
        <div class="col s12 m12 l12">
        	<div class="card-panel">

	          <div class="row">
	            <div class=" container left input-field col s4">
	              <i class="medium mdi-action-search prefix"></i>
	              <input id="icon_prefix" type="text" class="validate">
	              <label for="icon_prefix">Transaction Code</label>
	            </div>
	            <div class="col s8">
					<a class="btn-floating tooltipped purple accent-1" data-position="bottom" data-delay="50" data-tooltip="Create new transaction" href="{{URL::to('/transaction-alterationwalkIn-newtransaction')}}" style="margin-top:15px;"><i class="large mdi-social-person-add"></i></a>	
	            </div>
	          </div>

	        <!--Individual order-->
	        <div class="card">
				<div class="card-content container" style="width:90%;">	
					
					<!--CUSTOMER details-->
					<div class="divider" style="margin-top:20px;"></div>
					<h5 style="color:#1b5e20; margin-left:20px;">Customer Details</h5>
					<div class="divider" style="margin-bottom:20px;"></div>

					<div class="row container" style="width:90%;">
						<div class="col s12">
							<div class="col s6">       
		                        <div style="color:black; padding-left:140px" class="input-field col s12">                 
		                          <input value="" id="addIndiID" name="addIndiID" type="text" class="">
		                          <label style="color:black">Individual ID </label>
		                        </div>

		                        <div style="color:black; padding-left:140px; margin-left:1px" class="input-field col s12">                 
		                          <input value="" id="dateToday" name="dateToday" type="text" class="">
		                          <label style="color:black">Transaction No. </label>
		                        </div>
			            	</div>
			            </div>

			            <div class="col s12 container">
			            	<div style="color:black; padding-left:140px" class="input-field col s12">                 
		                        <input value="" id="addIndiID" name="addIndiID" type="text" class="">
		                        <label style="color:black">Customer Name </label>
		                    </div>
	                        <div style="color:black; padding-left:140px" class="input-field col s12">                 
		                        <input value="" id="addIndiID" name="addIndiID" type="text" class="">
		                        <label style="color:black">Complete Address </label>
		                    </div>
			            </div>
			        </div>

			        <!--ORDER details-->
			        <div class="divider" style="margin-top:20px;"></div>
					<h5 style="color:#1b5e20; margin-left:20px;">Order Details</h5>
					<div class="divider" style="margin-bottom:20px;"></div>

					<div class = "row">
					    <div class="col s12 m12 l12 overflow-x">
					    	<table class = "centered striped">
					    		<thead>
					    			<tr>
					    				<th>Garment Type</th>
					    				<th>Garment Image</th>
					    				<th>Quantity</th>
					    				<th>Fabric Type</th>
					    				<th>Swatch Pattern</th>
					    				<th>Garment Segment</th>
					    				<th>Alteration Type</th>
					    				<th></th>
					    			</tr>
					    		</thead>
					    		<tbody>
					    			<tr>
					    				<td>Uniform</td>
					    				<td><img class="img hoverable" src="../img/uniform3.jpg"></td>
					    				<td>1</td>
					    				<td>Linen</td>
					    				<td><img class="img hoverable modal-trigger" href="#swatchpattern" src="../imgSwatches/citadel alpine.jpg"></td>
					    				<td class="input-field">
											<select>
											    <option value="1" data-icon="#!" class="circle">Skirt</option>
											    <option value="2" data-icon="#!" class="circle">Pants</option>
											    <option value="3" data-icon="#!" class="circle">Polo</option>
											    <option value="4" data-icon="#!" class="circle">Shorts</option>
											</select>
										</td>
					    				<td class="input-field col s12">
										    <select multiple>
										    	<option value="" disabled selected>What to alter..</option>
										      	<option value="1">Hem</option>
										      	<option value="2">Sleeves</option>
										      	<option value="3">Slim</option>
										    </select>
										</td>
					    				<td><a class=" btn modal-trigger tooltipped" href="#measurementmodal" data-position="top" data-delay="50" data-tooltip="Supply measurements"><i class="mdi-av-playlist-add"></i></a></td>
					    			</tr>
					    			<tr>
					    				<td>Gown</td>
					    				<td><img class="img hoverable" src="../img/gown2.jpg"></td>
					    				<td>1</td>
					    				<td>Cotton</td>
					    				<td><img class="img hoverable modal-trigger" href="#swatchpattern" src="../imgSwatches/citadel grape.jpg"></td>
					    				<td class="input-field">
											<select>
											    <option value="1" data-icon="#!" class="circle">Skirt</option>
											    <option value="2" data-icon="#!" class="circle">Pants</option>
											    <option value="3" data-icon="#!" class="circle">Polo</option>
											    <option value="4" data-icon="#!" class="circle">Shorts</option>
											</select>
										</td>
					    				<td class="input-field col s12">
										    <select multiple>
										    	<option value="" disabled selected>What to alter..</option>
										      	<option value="1">Hem</option>
										      	<option value="2">Sleeves</option>
										      	<option value="3">Slim</option>
										    </select>
										</td>
										<td><a class="btn modal-trigger tooltipped" href="#measurementmodal" data-position="top" data-delay="50" data-tooltip="Supply measurements"><i class="mdi-av-playlist-add"></i></a></td>
					    			</tr>
					    		</tbody>
					    	</table>
					    </div>
			                  
			            <div class = "clearfix"></div>
			        </div>

		            <center><div class="btn green white-text container" style="padding-top:5px; height:50px; margin-top:20px;" href="{{URL::to('/transaction-walkInindividualcheckout')}}"><font color="black" size="+1">Proceed to CHECKOUT</font></div></center>

            	</div>
            </div>

            <!--COMPANY order-->
            <div class="card">
				<div class="card-content container" style="width:90%;">	
					
					<!--CUSTOMER details-->
					<div class="divider" style="margin-top:20px;"></div>
					<h5 style="color:#1b5e20; margin-left:20px;">Customer Details</h5>
					<div class="divider" style="margin-bottom:20px;"></div>

					<div class="row container" style="width:90%;">
						<div class="col s12">
							<div class="col s6">       
		                        <div style="color:black; padding-left:140px" class="input-field col s12">                 
		                          <input value="" id="addIndiID" name="addIndiID" type="text" class="">
		                          <label style="color:black">Company ID </label>
		                        </div>

		                        <div style="color:black; padding-left:140px; margin-left:1px" class="input-field col s12">                 
		                          <input value="" id="dateToday" name="dateToday" type="text" class="">
		                          <label style="color:black">Transaction No. </label>
		                        </div>
			            	</div>
			            </div>

			            <div class="col s12 container" style="padding:15px;">
			            	<label style="padding:20px;">EMPLOYEE NAME</label>
			            	<table class = "table centered order-summary" border = "1">
			       				<thead style="color:gray">
				          			<tr>
					                  <th data-field="first_name" class="col s3">First Name</th>         
					                  <th data-field="middle_name" class="col s3">Middle Name</th>
					                  <th data-field="last_name" class="col s3">Last Name</th>
					                  <th data-field="gender" class="col s1">Sex</th>
					                  <th data-field="package" class="col s1">Package</th>
					              	</tr>
				              	</thead>
						    </table>
						    <div style="color:black" class="input-field col s3">
	                            <input id="addCelAlt" name = "addCelAlt" type="text" class="validateCellAlt" maxlength="11">		           
	                        </div>
	                        <div style="color:black" class="input-field col s3">
	                            <input id="addCelAlt" name = "addCelAlt" type="text" class="validateCellAlt" maxlength="11">		           
	                        </div>
	                        <div style="color:black" class="input-field col s3">
	                            <input id="addCelAlt" name = "addCelAlt" type="text" class="validateCellAlt" maxlength="11">		           
	                        </div>
	                        <div style="color:black" class="input-field col s1">
								<select>
								    <option value="1">F</option>
								    <option value="2">M</option>
								</select>
							</div>
							<div style="color:black" class="input-field col s1">
								<select>
								    <option value="1">A</option>
								    <option value="2">B</option>
								</select>
							</div>
			            </div>
			        </div>

			        <!--ORDER details-->
			        <div class="divider" style="margin-top:20px;"></div>
					<h5 style="color:#1b5e20; margin-left:20px;">Order Details</h5>
					<div class="divider" style="margin-bottom:20px;"></div>

					<div class = "row">
					    <div class="col s12 m12 l12 overflow-x">
					    	<table class = "centered striped">
					    		<thead>
					    			<tr>
					    				<th>Garment Type</th>
					    				<th>Garment Image</th>
					    				<th>Quantity</th>
					    				<th>Fabric Type</th>
					    				<th>Swatch Pattern</th>
					    				<th>Garment Segment</th>
					    				<th>Alteration Type</th>
					    				<th></th>
					    			</tr>
					    		</thead>
					    		<tbody>
					    			<tr>
					    				<td>Uniform</td>
					    				<td><img class="img hoverable" src="../img/uniform3.jpg"></td>
					    				<td>1</td>
					    				<td>Linen</td>
					    				<td><img class="img hoverable modal-trigger" href="#swatchpattern" src="../imgSwatches/citadel alpine.jpg"></td>
					    				<td class="input-field">
											<select>
											    <option value="1" data-icon="#!" class="circle">Skirt</option>
											    <option value="2" data-icon="#!" class="circle">Pants</option>
											    <option value="3" data-icon="#!" class="circle">Polo</option>
											    <option value="4" data-icon="#!" class="circle">Shorts</option>
											</select>
										</td>
					    				<td class="input-field col s12">
										    <select multiple>
										    	<option value="" disabled selected>What to alter..</option>
										      	<option value="1">Hem</option>
										      	<option value="2">Sleeves</option>
										      	<option value="3">Slim</option>
										    </select>
										</td>
					    				<td><a class=" btn modal-trigger tooltipped" href="#measurementmodal" data-position="top" data-delay="50" data-tooltip="Supply measurements"><i class="mdi-av-playlist-add"></i></a></td>
					    			</tr>
					    			<tr>
					    				<td>Gown</td>
					    				<td><img class="img hoverable" src="../img/gown2.jpg"></td>
					    				<td>1</td>
					    				<td>Cotton</td>
					    				<td><img class="img hoverable modal-trigger" href="#swatchpattern" src="../imgSwatches/citadel grape.jpg"></td>
					    				<td class="input-field">
											<select>
											    <option value="1" data-icon="#!" class="circle">Skirt</option>
											    <option value="2" data-icon="#!" class="circle">Pants</option>
											    <option value="3" data-icon="#!" class="circle">Polo</option>
											    <option value="4" data-icon="#!" class="circle">Shorts</option>
											</select>
										</td>
					    				<td class="input-field col s12">
										    <select multiple>
										    	<option value="" disabled selected>What to alter..</option>
										      	<option value="1">Hem</option>
										      	<option value="2">Sleeves</option>
										      	<option value="3">Slim</option>
										    </select>
										</td>
										<td><a class="btn modal-trigger tooltipped" href="#measurementmodal" data-position="top" data-delay="50" data-tooltip="Supply measurements"><i class="mdi-av-playlist-add"></i></a></td>
					    			</tr>
					    		</tbody>
					    	</table>
					    </div>
			                  
			            <div class = "clearfix"></div>
			        </div>

	            	<center><div class="btn green white-text container" style="padding-top:5px; height:50px; margin-top:20px;" href="{{URL::to('/transaction-walkIncompanycheckout')}}"><font color="black" size="+1">Proceed to CHECKOUT</font></div></center>

            	</div>
            </div>

          	</div>
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

			<h4 style="color:#1b5e20" class="center">Note</h4>
			<div class="divider container" style="margin-bottom:20px;"></div>
			    <div class="input-field col s12">
		          	<textarea id="textarea" class="textarea"></textarea>
		          	<label for="textarea"></label>
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
		  $(document).ready(function() {
		    $('select').material_select();
		  });
	</script>

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

@stop