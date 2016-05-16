@extends('layouts.master')

@section('content')

	<div class="main-wrapper"  style="margin-top:30px">

	  	<div class="row">
		  	<div class="col s12 m12 l12">
		    	<span class="page-title"><h4>Customer Info</h4></span>
		  	</div>
		</div>

		<div class="row">
		    <div class="col s12 m12 l12">
		    	<div class="card-panel">

		    		<!--DELIVERY DETAILS-->
			    	<center>
			    	<div style="width:90%;">
				        <div style="background-color:#ef5350;"><h5 style="color:#1b5e20; padding:10px;"><center><b>Delivery Details</b></center></h5></div>
				        <div class="divider" style="margin-bottom:30px;"></div>

						<div class="row container">
							<div class = "col s12" style="border:3px solid white;">
					            <div class="input-field col s12">
					                <input required id="addComName" name = "addComName" type="text" class="validateComName">
					        	    <label for="company_name"> *Company Name </label>
					            </div>
					        </div>

					        <div class = "col s12" style="border:3px solid white;">
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

					        <div class = "col s12" style="border:3px solid white;">
					            <div class="input-field col s6">
					        	    <input id="addCustCompanyProvince" name="addCustCompanyProvince" type="text" class="validateProvince">
					                <label for=" Province">Province </label>
					            </div>

					            <div class="input-field col s6">
					            	<input id="addCustCompanyZipCode" name="addCustCompanyZipCode" type="text" class="validateZip">
					                <label for=" Zip Code">Zip Code </label>
					            </div>
					        </div>

					        <div class = "col s12" style="border:3px solid white;">
					            <div class="input-field col s6">
					                <input required id="addConPerson" name = "addConPerson" type="text" class="validateConPerson">
					                <label for="company_name"> *Contact Person </label>
					            </div>

					            <div class="input-field col s6">
					                <input required id="addComEmailAdd" name = "addComEmailAddress" type="text" class="validateEmail">
					                <label for="com_email_address"> *Company Email Address </label>
					            </div>
					        </div>

					        <div class = "col s12" style="border:3px solid white;">
					            <div class="input-field col s6">
					                <input required id="addCel" name = "addCel" type="text" class="validateCell" maxlength="11" minlength="11">
					                <label for="cellphone"> *Cellphone Number </label>
					            </div>

					            <div class="input-field col s6">
					                <input id="addCelAlt" name = "addCelAlt" type="text" class="validateCellAlt" maxlength="11" minlength="11">
					                <label for="cellphone"> Cellphone Number (alternate)</label>
					            </div>
					        </div>

					        <div class = "col s12" style="border:3px solid white; margin-bottom:40px">
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
					</center>

				    <!--PAYMENT DETAILS-->
				    <center>
				    <div style="width:90%;">
				        <div style="background-color:#ef5350;"><h5 style="color:#1b5e20; padding:10px;"><center><b>Payment Details</b></center></h5></div>
				        <div class="divider" style="margin-bottom:30px;"></div>

				        <div class="container">
					        <h6 class="green-text"><b>Order Summary</b> (2 items)</h6>
							<div class="divider"></div>
								<table class="responsive-table scrollable" style="margin-top:10px; margin-bottom:10px;">
									<thead>
									  <tr style="background-color:grey lighten-3;">
									    <th class="left-align"><font size="-1">PRODUCT</font></th>
									    <th class="center"><font size="-1">QUANTITY</font></th>
									    <th class="right-align"><font size="-1">PRICE</font></th>
									  </tr>
									</thead>
									<tbody>
									  <tr>
									    <td>Women's Uniform</td>
									    <td class="center">1</td>
									    <td class="right">1,700.00</td>
									  </tr>
									  <tr>
									    <td>Gown</td>
									    <td class="center">1</td>
									    <td class="right">2,400.00</td>
									  </tr>
									</tbody>
								</table>

							<div class="divider"></div>
							
							<div class="row" style="margin-top:10px; margin-bottom:10px;">
								<p class="col s6"><b>Downpayment</b></p>
								<p class = "col s6 input-field" style="margin-top:-1px;">
								  <input class="center" id = "subtotal" value = "P 2,050.00" name = "subtotal" type = "text" readonly>
								</p>
							</div>
							
							<div class="divider"></div>
							
							<div class="row" style="margin-top:10px; margin-bottom:10px;">
								<p class="col s6 green-text darken-1"><font size="+1"><b>TOTAL</b></font></p>
								<p class = "col s6 input-field" style="margin-top:-0px;">
								  	<b><input class="center red-text darken-1" id = "total" value = "P 4,100.00" name = "total" type = "text" readonly></b>
								</p>
							</div>

							<div class="container">
			                    <center><h5 class="blue-text">Mode Of Payment</h5></center>
			                    <p class = "input-field">
			                    	<input class="center" id = "mode" value="CHECK" name="mode" type = "text" readonly>
			                    </p>
			                </div>
			                
						</div>
				    </div>
			    	</center>


				    <!--DURATION-->
				    <center>
				    <div style="width:90%;">
				        <div style="background-color:#ef5350;"><h5 style="color:#1b5e20; padding:10px;"><center><b>Duration</b></center></h5></div>
				        <div class="divider" style="margin-bottom:30px;"></div>

				        <div class="container">
		                    <center><h5 class="blue-text">Estimated Delivery</h5></center>
		                    <p class = "input-field">
		                    	<input class="center" placeholder="days / weeks" id = "deliverydate" type = "text" class="validate">
		                    </p>
		                </div>
				    </div>
					</center>

            	<div class="btn green white-text container" style="width:100%; height:50px; margin-top:20px;" href="#!"><i class="mdi-action-lock"></i>SAVE</div>

				</div>
			</div>
		</div>

	</div>

@stop