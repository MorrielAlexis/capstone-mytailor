@extends('layouts.master')

@section('content')

  <div class="main-wrapper"  style="margin-top:30px">

  	<div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><h4>Company Walk In Customer</h4></span>
      </div>
    </div>

	<div class="row">
	    <div class="col s12 m12 l12">
	    	<div class="card-panel">
		        <span class="card-title"><h5 style="color:#1b5e20"><center>Walk In Order</center></h5></span>
		        <div class="divider"></div>

	    		<div class="card-content">
	    			<div class="row">
	    				<div class="col s12">
		    				<div class="col s6 m6 l6" style="margin-top:30px">
		    					<div class="container">
		    						  <div class="input-field col s12">
									    <select>
									      <option value="" disabled selected>GARMENT</option>
									      <option value="1" data-icon="#!" class="circle">Gown</option>
									      <option value="2" data-icon="#!" class="circle">Suit</option>
									      <option value="3" data-icon="#!" class="circle">Uniform</option>
									    </select>
									  </div>

									    <form class="col s12" style="margin-top:20px;">
											<label>Choose your design:</label>
											<div class="file-field input-field">
												<div class="btn">
													<span>Catalogue</span>
														<input type="file">
												</div>
												<div class="file-path-wrapper">
													<input class="file-path validate" type="text">
												</div>
											</div>
										</form>

		    					</div>
		    				</div>

		    				<div class="col s6 m6 l6" style="margin-top:20px">
		    					<div class="right button red accent-1">
		    						<label><h3>Track #001</h3></label>
			    				</div>
		    				</div>
		    			</div>
		    			
		    			<div class="col s12">
		    				<div class="container" style="margin-top:30px;">

		    				<table class="bordered centered responsive-table">
						        <thead>
						          <tr style="color:#1b5e20">
						              <th data-field="segment">Segments</th>
						              <th data-field="fabric">Fabrics</th>
						              <th data-field="swatch">Swatches</th>
						          </tr>
						        </thead>

						        <tbody>
						          <tr>
						            <td>
						            	<a class="modal-trigger" href="#segment">
						            		<img src="#!">
						            		<label>segmentname</label>
						            	</a>
						            </td>
						            <td>
						            	<a class="modal-trigger" href="#fabric">
						            		<img src="#!">
						            		<label>fabricname</label>
						            	</a>
						            </td>
						            <td>
						            	<a class="modal-trigger" href="#swatch">
						            		<img src="#!">
						            		<label>swatchname</label>
						            	</a>
						            </td>
						          </tr>
						        </tbody>
						  	</table>

						  </div>
		    			</div>

		    			<div class="row container">
		    				<div class="col s12 center" style="margin-top:20px;">
	    						<div style="border:3px solid #69f0ae; padding:10px;">
	    							<h5>List of employees</h5>
	    							<div style="border:4px solid white; background-color:#ffebee" style="padding:5px; margin-bottom:10px;">
	    								<div class="input-field" style="padding:10px;">
							                <input id="empname" name="empname" type="text" class="validate">
							                <label for="empname">Employee Name</label>
							        	</div>
							        	<div class="row">
		    								<div class="input-field col s7">
											    <select>
											    	<option value="" disabled selected>Female</option>
											    	<option value="1">Female</option>
											    	<option value="2">Male</option>
											    </select>
											    <label>Gender</label>
											</div>
											<div class="col s5" style="margin-top:10px;">
												<center><a class="btn modal-trigger tooltipped" href="#measurementmodal" data-position="bottom" data-delay="50" data-tooltip="Supply measurements"><i class="large material-icons">playlist_add</i></a></center>
											</div>
										</div>
	    							</div>
	    							<div style="border:4px solid white; background-color:#ffebee" style="padding:5px; margin-bottom:10px;">
	    								<div class="input-field" style="padding:10px;">
							                <input id="empname" name="empname" type="text" class="validate">
							                <label for="empname">Employee Name</label>
							        	</div>
							        	<div class="row">
		    								<div class="input-field col s7">
											    <select>
											    	<option value="" disabled selected>Female</option>
											    	<option value="1">Female</option>
											    	<option value="2">Male</option>
											    </select>
											    <label>Gender</label>
											</div>
											<div class="col s5" style="margin-top:10px;">
												<center><a class="btn modal-trigger tooltipped" href="#measurementmodal" data-position="bottom" data-delay="50" data-tooltip="Supply measurements"><i class="large material-icons">playlist_add</i></a></center>
											</div>
										</div>
	    							</div>
	    						<center><div class="btn container" style="width:100%; margin-top:10px;"><font size="+1">+</font></div></center>

	    						</div>
		    				</div>

		    			</div>

		    			<center><div class="modal-trigger btn teal-accent 2" href="#save">SAVE</div></center>


	    			</div>
	    		</div>

	    	</div>
	    </div>
	</div>

	<!--save modal-->
	<div id="save" class="modal modal-fixed-footer">
		<div class="modal-content">
            <div class = "label"><h5><font color = "#1b5e20"><center>CUSTOMER INFO</center> </font> </h5>
			<div class="divider container" style="margin-bottom:20px;"></div>
			<div class="row">
					<div class = "col s12" style="padding:15px;  border:3px solid white;">
			            <div class="input-field col s12">
			                <input required id="addComName" name = "addComName" type="text" class="validateComName">
			        	    <label for="company_name"> *Company Name </label>
			            </div>
			        </div>

			        <div class = "col s12" style="padding:15px;  border:3px solid white;">
			            <div class="input-field col s3">
			                <input required id="addCustCompanyHouseNo" name="addCustCompanyHouseNo" type="text" class="validateHouseNo">
			                <label for="House No">*House No. </label>
			        	</div>

			            <div class="input-field col s3">
			                <input  required id="addCustCompanyStreet" name="addCustCompanyStreet" type="text" class="validateStreet">
			                <label for=" Street">*Street </label>
			            </div>

			            <div class="input-field col s3">
			                <input id="addCustCompanyBarangay" name="addCustCompanyBarangay" type="text" class="validateBarangay">
			                <label for=" Brgy">Barangay/Subd </label>
			            </div>

			            <div class="input-field col s3">
			                <input required="" id="addCustCompanyCity" name="addCustCompanyCity" type="text" class="validateCity">
			                <label for=" City">*City/Municipality </label>
			            </div>
			        </div>

			        <div class = "col s12" style="padding:15px;  border:3px solid white;">
			            <div class="input-field col s6">
			        	    <input id="addCustCompanyProvince" name="addCustCompanyProvince" type="text" class="validateProvince">
			                <label for=" Province">Province </label>
			            </div>

			            <div class="input-field col s6">
			            	<input id="addCustCompanyZipCode" name="addCustCompanyZipCode" type="text" class="validateZip">
			                <label for=" Zip Code">Zip Code </label>
			            </div>
			        </div>

			        <div class = "col s12" style="padding:15px;  border:3px solid white;">
			            <div class="input-field col s6">
			                <input required id="addConPerson" name = "addConPerson" type="text" class="validateConPerson">
			                <label for="company_name"> *Contact Person </label>
			            </div>

			            <div class="input-field col s6">
			                <input required id="addComEmailAdd" name = "addComEmailAddress" type="text" class="validateEmail">
			                <label for="com_email_address"> *Company Email Address </label>
			            </div>
			        </div>

			        <div class = "col s12" style="padding:15px;  border:3px solid white;">
			            <div class="input-field col s6">
			                <input required id="addCel" name = "addCel" type="text" class="validateCell" maxlength="11" minlength="11">
			                <label for="cellphone"> *Cellphone Number </label>
			            </div>

			            <div class="input-field col s6">
			                <input id="addCelAlt" name = "addCelAlt" type="text" class="validateCellAlt" maxlength="11" minlength="11">
			                <label for="cellphone"> Cellphone Number (alternate)</label>
			            </div>
			        </div>

			        <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
			            <div class="input-field col s6">
			                <input  id="addPhone" name = "addPhone" type="text" class="validatePhone" maxlength="10" minlength="10">
			                <label for="tel"> Telephone Number </label>
			            </div>

			            <div class="input-field col s6">
			                <input id="addFax" name = "addFax" type="text" class="validateFax" maxlength="9" minlength="9">
			                <label for="fax"> Fax Number </label>
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

	<!--segment modal-->
	<div id="segment" class="modal modal-fixed-footer">
		<div class="modal-content">
			<h4 style="color:#1b5e20" class="center">SEGMENTS</h4>
			<div class="divider container" style="margin-bottom:20px;"></div>
			<div class="row">
				<div class="center">
				<div class="col s3">
					<img src="#!">
					<img src="#!">
					<img src="#!">
					<img src="#!">
				</div>
				<div class="col s3">
					<img src="#!">
					<img src="#!">
					<img src="#!">
					<img src="#!">
				</div>
				<div class="col s3">
					<img src="#!">
					<img src="#!">
					<img src="#!">
				</div>
				<div class="col s3">
					<img src="#!">
					<img src="#!">
					<img src="#!">
				</div>
				</div>
			</div>
		</div>

		<div class="modal-footer" style="background-color:#26a69a">
			<a href="" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
			<a href="" class="modal-action modal-close waves-effect waves-green btn-flat">Save</a>
		</div>
	</div>

	<!--fabric modal-->
	<div id="fabric" class="modal modal-fixed-footer">
		<div class="modal-content">
			<h4 style="color:#1b5e20" class="center">FABRICS</h4>
			<div class="divider container" style="margin-bottom:20px;"></div>
			<div class="row">
				<div class="center">
				<div class="col s3">
					<img src="#!">
					<img src="#!">
					<img src="#!">
					<img src="#!">
				</div>
				<div class="col s3">
					<img src="#!">
					<img src="#!">
					<img src="#!">
					<img src="#!">
				</div>
				<div class="col s3">
					<img src="#!">
					<img src="#!">
					<img src="#!">
				</div>
				<div class="col s3">
					<img src="#!">
					<img src="#!">
					<img src="#!">
				</div>
				</div>
			</div>
		</div>

		<div class="modal-footer" style="background-color:#26a69a">
			<a href="" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
			<a href="" class="modal-action modal-close waves-effect waves-green btn-flat">Save</a>
		</div>
	</div>


	<!--swatch modal-->
	<div id="swatch" class="modal modal-fixed-footer">
		<div class="modal-content">
			<h4 style="color:#1b5e20" class="center">SWATCHES</h4>
			<div class="divider container" style="margin-bottom:20px;"></div>
			<div class="row">
				<div class="center">
				<div class="col s3">
					<img src="#!">
					<img src="#!">
					<img src="#!">
					<img src="#!">
				</div>
				<div class="col s3">
					<img src="#!">
					<img src="#!">
					<img src="#!">
					<img src="#!">
				</div>
				<div class="col s3">
					<img src="#!">
					<img src="#!">
					<img src="#!">
				</div>
				<div class="col s3">
					<img src="#!">
					<img src="#!">
					<img src="#!">
				</div>
				</div>
			</div>
		</div>

		<div class="modal-footer" style="background-color:#26a69a">
			<a href="" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
			<a href="" class="modal-action modal-close waves-effect waves-green btn-flat">Save</a>
		</div>
	</div>

	<!--measurement modal--> 
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

@stop