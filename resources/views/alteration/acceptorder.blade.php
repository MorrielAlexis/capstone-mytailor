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
				        <div style="background-color:#ef5350; border-radius:180px;"><h5 style="color:#1b5e20; padding:20px;"><center><b>Delivery Details</b></center></h5></div>
				        <div class="divider" style="margin-bottom:30px;"></div>

						<div class="row container">
							<div class = "col s12" style="border:3px solid white;">
				                <div class="input-field col s12">                 
				                  <input value = "" id="addIndiID" name="addIndiID" type="text" class="" readonly>
				                  <label for="indi_id">Individual ID </label>
				                </div>
				            </div>

				            <div class = "col s12" style="border:3px solid white;">
				                <div class="input-field col s4">
				                  <input required id="addFName" name = "addFName" type="text" class="validateFirst">
				                  <label for="first_name" > *First Name </label>
				                </div>

				                <div class="input-field col s4">
				                  <input id="addMName" name = "addMName" type="text" class="validateMiddle">
				                  <label for="middle_name"> Middle Name </label>
				                </div>

				                <div class="input-field col s4">
				                  <input required id="addLName" name = "addLName" type="text" class="validateLast">
				                  <label for="last_name"> *Last Name </label>
				                </div>
				            </div>

				            <div class = "col s12" style="border:3px solid white;">
			                  	<div class="input-field col s3">
			                    	<input required id="addCustPrivHouseNo" name="addCustPrivHouseNo" type="text" class="validateHouseNo">
			                    	<label for="House No">*House No. </label>
			                  	</div>

			                    <div class="input-field col s3">
			                    	<input required id="addCustPrivStreet" name="addCustPrivStreet" type="text" class="validateStreet">
			                    	<label for=" Street">*Street </label>
			                    </div>

				                <div class="input-field col s3">
				                    <input  id="addCustPrivBarangay" name="addCustPrivBarangay" type="text" class="validateBarangay">
				                    <label for=" Brgy">Barangay/Subd </label>
				                </div>

				                <div class="input-field col s3">
				                    <input required id="addCustPrivCity" name="addCustPrivCity" type="text" class="validateCity">
				                    <label for=" City">*City/Municipality </label>
				                </div>
				            </div>

				             <div class = "col s12" style="border:3px solid white;">
				                <div class="input-field col s6">
				                	<input id="addCustPrivProvince" name="addCustPrivProvince" type="text" class="validateProvince">
				                    <label for=" Province">Province/Region </label>
				                </div>

				                <div class="input-field col s6">
				                    <input id="addCustPrivZipCode" name="addCustPrivZipCode" type="text" class="validateZip">
				                    <label for=" Zip Code">Zip Code </label>
				                </div>
				            </div>

				            <div class = "col s12" style="border:3px solid white;">
				                <div class="input-field col s12">
				                    <input required id="addEmail" name = "addEmail" type="text" class="validateEmail">
				                    <label for="email"> *Email Address </label>
				                </div>
				            </div>

				            <div class = "col s12" style="border:3px solid white;">
				                <div class="input-field col s6">
				                    <input required id="addCel" name = "addCel" type="text" class="validateCell" maxlength="11">
				                    <label for="cellphone"> *Cellphone Number </label>
				                </div>

				                <div class="input-field col s6">
				                    <input id="addCelAlt" name = "addCelAlt" type="text" class="validateCellAlt" maxlength="11">
				                    <label for="cellphone"> Cellphone Number (alternate)</label>
				                </div>
				            </div>

				            <div class = "col s12" style="border:3px solid white; margin-bottom:40px">
				                <div class="input-field col s12">
				                    <input id="addPhone" name = "addPhone" type="text" class="validatePhone" maxlength="10">
				                    <label for="tel"> Telephone Number </label>
				                </div>
				            </div>
				        </div>
				    </div>
					</center>

				    <!--PAYMENT DETAILS-->
				    <center>
				    <div style="width:90%;">
				        <div style="background-color:#ef5350; border-radius:180px;"><h5 style="color:#1b5e20; padding:20px;"><center><b>Payment Details</b></center></h5></div>
				        <div class="divider" style="margin-bottom:30px;"></div>

				        <div class="container">
					        <h6 class="green-text"><b>Order Summary</b> (2 items)</h6>
							<div class="divider"></div>
								<table class="responsive-table scrollable" style="margin-top:10px; margin-bottom:10px;">
									<thead>
									  <tr style="background-color:grey lighten-3;">
									    <th class="left-align"><font size="-1">PRODUCT</font></th>
									    <th class="center"><font size="-1">Alteration Type</font></th>
									    <th class="right-align"><font size="-1">PRICE</font></th>
									  </tr>
									</thead>
									<tbody>
									  <tr>
									    <td>Women's Uniform</td>
									    <td class="center">Hem</td>
									    <td class="right">700.00</td>
									  </tr>
									  <tr>
									    <td>Gown</td>
									    <td class="center">Length</td>
									    <td class="right">400.00</td>
									  </tr>
									</tbody>
								</table>

							<div class="divider"></div>
							
							<div class="row" style="margin-top:10px; margin-bottom:10px;">
								<p class="col s6"><b>Downpayment</b></p>
								<p class = "col s6 input-field" style="margin-top:-1px;">
								  <input class="center" id = "subtotal" value = "P 550.00" name = "subtotal" type = "text" readonly>
								</p>
							</div>
							
							<div class="divider"></div>
							
							<div class="row" style="margin-top:10px; margin-bottom:10px;">
								<p class="col s6 green-text darken-1"><font size="+1"><b>TOTAL</b></font></p>
								<p class = "col s6 input-field" style="margin-top:-0px;">
								  	<b><input class="center red-text darken-1" id = "total" value = "P 1,100.00" name = "total" type = "text" readonly></b>
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
				        <div style="background-color:#ef5350; border-radius:180px;"><h5 style="color:#1b5e20; padding:20px;"><center><b>Duration</b></center></h5></div>
				        <div class="divider" style="margin-bottom:30px;"></div>

				        <div class="container">
		                    <center><h5 class="blue-text">Estimated Delivery</h5></center>
		                    <p class = "input-field">
		                    	<input class="center" placeholder="days / weeks" id = "deliverydate" type = "text" class="validate">
		                    </p>
		                </div>
				    </div>
					</center>

            	<div><a class="btn green white-text container" style="width:100%; height:50px; margin-top:20px;" href="{{URL::to('transaction/alterationOnline')}}"><i class="mdi-action-lock"></i>SAVE</a></div>

				</div>
			</div>
		</div>

	</div>

@stop