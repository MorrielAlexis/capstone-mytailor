@extends('layouts.master')

@section('content')


	<div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><center><h3><b>Welcome to <font color="white">MyTailor</font></b></h3></center></span>
        <center><h5>Payout</h5></center>
      </div>
    </div>


    <div class="row" style="padding:20px">

		<div class="col s12" style="margin-top:15px">
			<ul class="tabs transparent">
				<li class="tab col s4" style="border-top-left-radius: 20px; border-top-right-radius: 20px; background-color: #00b0ff;"><a style="color:black; padding-top:5px; opacity:0.80" class="tooltipped center-text" accent data-position="bottom" data-delay="50" data-tooltip="Fill up personal information" href="#tabCustomerInfo">1.	Fill-up Form</a></li>	
				<li class="tab col s4" style="border-top-left-radius: 20px; border-top-right-radius: 20px; background-color: #00b0ff;"><a style="color:black; padding-top:5px; opacity:0.80" class="tooltipped center-text" accent data-position="bottom" data-delay="50" data-tooltip="Provide necessary detail" href="#tabPayment">2.		Payment</a></li>		
				<li class="tab col s4" style="border-top-left-radius: 20px; border-top-right-radius: 20px; background-color: #00b0ff;"><a style="color:black; padding-top:5px; opacity:0.80" class="tooltipped center-text" accent data-position="bottom" data-delay="50" data-tooltip="Add measurements per segment" href="#tabMeasurementDetail">3.		Add Measurement Detail</a></li>
				<div class="indicator white" style="z-index:1"></div>
            </ul>		               
		
    <!-- Tab for Customer Info -->
		<div id="tabCustomerInfo" class = "hue col s12" style="background-color: white; border:2px outset">
	        <div class="row">
		        <div class="col s12 m12 l12">
                	<span class="page-title" style="margin:15px"><center><h5>Company's Personal Information</h5></center></span>
              		<div class="divider" style="height:1px; background-color:#80d8ff"></div>
              	</div>
	       	</div>

	       	<div class="row" style="background-color:white;">
	       		<div class="container">
	            <div class="col s12">    
	                <div class="col s6">       
                        <div style="color:black; padding-left:140px" class="input-field col s12">                 
                          <input value="" id="addCompID" name="addCompID" type="text" class="">
                          <label style="color:black">Company ID </label>
                        </div>

                        <div style="color:black; padding-left:140px; margin-left:1px" class="input-field col s12">                 
                          <input value="" id="dateToday" name="dateToday" type="text" class="">
                          <label style="color:black">Transaction No. </label>
                        </div>
	            	</div>
            
	            	<div class="col s2">
	            		<!--<img class="col s12" src="#!" style="height:180px; width:200px; margin-left:150px">-->
	            		<i class="mdi-action-shopping-cart" style="font-size:100px; margin-left:50px"></i>	           		
	            	</div>

	            	<div class="col s4" style="margin-top:45px">
	            		<a href="{{URL::to('transaction/walkin-company')}}" class="btn mdi-maps-store-mall-directory tooltipped" data-position="bottom" data-delay="50" data-tooltip="Forgot something? Click to go back shopping" style="opacity:0.90; font-size:50px; background-color:green; margin-left:50px; padding:9.5px; padding-bottom:45px; border-radius:180px; margin-top:280px color:black"></a>
	            		<a id="addPayment" href="#tabPayment" class="btn mdi-action-done tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to save data and proceed to next step" style="opacity:0.90; font-size:50px; background-color:red; margin-left:20px; padding:9.5px; padding-bottom:45px; border-radius:180px; margin-top:280px color:black"></a>
	            	</div>


	            </div>


                <div class="col s12" style="margin-top:30px">
                	<div class="divider" style="margin-bottom:30px"></div>
	            	
                        <div style="color:black" class="input-field col s6">                 
                          <input value="" id="first_name" name="first_name" type="text" class="">
                          <label style="color:black" for="first_name">*Company Name </label>
                        </div>

                        <div style="color:black" class="input-field col s6">                 
                          <input value="" id="middle_name" name="middle_name" type="text" class="">
                          <label style="color:black" for="middle_name">*Contact Person </label>
                        </div>


                        <div style="color:black" class="input-field col s4">
                            <input required id="addCustPrivHouseNo" name="addCustPrivHouseNo" type="text" class="validateHouseNo">
                            <label style="color:black" for="house_no">*House No. </label>
                        </div>

                        <div style="color:black" class="input-field col s4">
                            <input required id="addCustPrivStreet" name="addCustPrivStreet" type="text" class="validateStreet">
                            <label style="color:black" for=" Street">*Street </label>
                        </div>

                        <div style="color:black" class="input-field col s4">
                            <input  id="addCustPrivBarangay" name="addCustPrivBarangay" type="text" class="validateBarangay">
                            <label style="color:black" for=" Brgy">*Barangay/Subd </label>
                        </div>

                        <div style="color:black" class="input-field col s4">
                            <input required id="addCustPrivCity" name="addCustPrivCity" type="text" class="validateCity">
                            <label style="color:black" for=" City">*City/Municipality </label>
                        </div>


                        <div style="color:black" class="input-field col s4">
                            <input id="addCustPrivProvince" name="addCustPrivProvince" type="text" class="validateProvince">
                            <label style="color:black" for=" Province">Province/Region </label>
	                    </div>

                        <div style="color:black" class="input-field col s4">
                            <input id="addCustPrivZipCode" name="addCustPrivZipCode" type="text" class="validateZip">
                            <label style="color:black" for=" Zip Code">Zip Code </label>
	                    </div>

	                    <div style="color:black" class="input-field col s12">
                            <input required id="addEmail" name = "addEmail" type="text" class="validateEmail">
                            <label style="color:black" for="email"> *Company Email Address </label>
                        </div>

                        <div style="color:black" class="input-field col s6">
                            <input required id="addCel" name = "addCel" type="text" class="validateCell" maxlength="11">
                            <label style="color:black" for="cellphone"> *Cellphone Number </label>
                        </div>

                        <div style="color:black" class="input-field col s6">
                            <input id="addCelAlt" name = "addCelAlt" type="text" class="validateCellAlt" maxlength="11">
                            <label style="color:black" for="cellphone"> Cellphone Number (alternate)</label>
                        </div>

                        <div style="color:black" class="input-field col s6">
                            <input id="addPhone" name = "addPhone" type="text" class="validatePhone" maxlength="10">
                            <label style="color:black" for="tel"> Telephone Number </label>
                        </div>

                        <div style="color:black" class="input-field col s6">
                            <input id="addPhone" name = "addPhone" type="text" class="validatePhone" maxlength="10">
                            <label style="color:black" for="tel"> Fax Number </label>
                        </div>

                        <div style="color:black; padding-left:200px" class="input-field col s6">
                            <input id="addCelAlt" name = "addCelAlt" type="text" class="validateCellAlt" maxlength="11">
                            <label style="color:black" for="cellphone"> *Number of Employees</label>
                        </div>

                        <div style="color:black;" class="input-field col s6">
                            <div class="modal-trigger btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to edit data for company employees" href="#edit-employee" style="font-size:15px; color:black"><!--<i class="mdi-navigation-cancel" style="font-size:20px;">-->  Edit Employees<!--</i>--></div>
									<div id="edit-employee" class="modal modal-fixed-footer">
										<h5><center><b>List of Employees</b></center></h5>	
										{!! Form::open() !!}
												<div class="divider" style="height:2px"></div>
												<div class="modal-content col s12">
												<div class="col s12" style="margin-bottom:50px">
													<div class="col s12">
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
													</div>
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

													<div style="color:black" class="col s1">
														<a style="color:black; margin-top:20px" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of employee from list" href="#!"><i class="mdi-action-delete"></i></a>
													</div>

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

													<div style="color:black" class="col s1">
														<a style="color:black; margin-top:20px" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of employee from list" href="#!"><i class="mdi-action-delete"></i></a>
													</div>

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

													<div style="color:black" class="col s1">
														<a style="color:black; margin-top:20px" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of employee from list" href="#!"><i class="mdi-action-delete"></i></a>
													</div>

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

													<div style="color:black" class="col s1">
														<a style="color:black; margin-top:20px" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of employee from list" href="#!"><i class="mdi-action-delete"></i></a>
													</div>

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

													<div style="color:black" class="col s1">
														<a style="color:black; margin-top:20px" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of employee from list" href="#!"><i class="mdi-action-delete"></i></a>
													</div>

													

													<div class="col s12" style="margin-top:40px">
														<a class="left btn-floating tooltipped blue" data-position="bottom" data-delay="50" data-tooltip="Click to add additional data fields for more employees" href="#!" ><i class="medium mdi-content-add-circle"></i></a>	
														<a href="#!" style="margin-top:120px; margin-left:20px"><u>Add more fields for employee data</u></a>
													</div>
												</div>
											</div>

												<div class="modal-footer col s12" style="background-color:green; opacity:0.98">
									                <button type="submit" class="waves-effect waves-green btn-flat" href="#!"><font color="black">Save</font></button>
									                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">Cancel</font></a>
									            </div>
											{!! Form::close() !!}
									</div>
                        </div>

                    </div>
	       		</div>
	       		        <div style="color:gray; margin-top:30px; margin-left:20px" class="col s12">
                            <h6>IMPORTANT NOTE: Fields with asterisk (*) must not be left blank.</h6>
                        </div>
	       	</div>
	      	<div class="divider" style="height:2px; margin-bottom:20px; margin-top:50px"></div>
	      	
	      		<center><p><font color="gray">End of Customer Profile Information Form</font></p></center>
	    </div>
	    <!-- End of tab for Customer Info-->

	    <!-- Tab for Payment-->
	    <div id="tabPayment" class = "hue col s12 active" style="background-color: white; border:2px outset">
	        <div class="row">
		        <div class="col s12 m12 l12">
                	<span class="page-title" style="margin:15px"><center><h5>Payment Information</h5></center></span>
              		<div class="divider" style="height:1px; background-color:#80d8ff"></div>
              	</div>
	       	</div>

	       	<div class="col s12 left">
		        <a class="right btn-floating tooltipped btn-large green" data-position="bottom" data-delay="50"  data-tooltip="CLick to print a receipt for current transaction" href="#!" style="color:black; margin-right:35px; margin-left: 20px;"><i class="large mdi-action-print"></i></a>
		    </div>

	       	<div class="row" style="background-color:white;">
	       		<div class="container">
	            <div class="col s12"> 

	            	<div class="col s12" style="margin-bottom:20px">
	            	   <div style="color:gray; padding-left:140px;" class="input-field col s6">                 
                          <input value="" id="transac_no" name="transac_no" type="text" class="" readonly>
                          <label style="color:gray" for="transac_no">Transaction #: </label>
                        </div>
                        <div style="color:gray; padding-left:140px;" class="input-field col s6">                 
                          <input value="" id="transac_date" name="transac_date" type="date" class="datepicker">
                          <label style="color:gray" for="transac_date">Date and Time: </label>
                        </div>
                    </div>

                    <label style="font-size:15px; color:black"><center>Order Summary</center></label>
                    <div class="container">
                        <table class = "table centered order-summary" border = "1">
		       				<thead style="color:gray">
			          			<tr>
				                  <th data-field="product">Product</th>         
				                  <th data-field="quantity">Quantity</th>
				                  <th data-field="price">Price</th>
				              	</tr>
			              	</thead>
			              	<tbody>
					            <tr>
					               <td>Polo</td>
					               <td>2</td>
					               <td>800.00</td>
					            </tr>
					        </tbody>
					    </table>
		      		</div>

		      		<div class="container">
		      			<div class="container">
			      			<div style="color:gray; padding-left:140px;" class="input-field col s12">                 
	                          <input value="" id="transac_no" name="transac_no" type="text" class="" readonly>
	                          <label style="color:red" for="transac_no">Total Amount: </label>
	                        </div>
	                        <div class="col s6">
			          				<input type="checkbox" class="filled-in" id="half_pay" />
	      							<label for="half_pay">Half-payment</label>
		      				</div>
		      				<div class="col s6">
				          			<input type="checkbox" class="filled-in" id="full_pay" />
		      						<label for="full_pay">Full-payment</label>
		      				</div>
		      				<div style="color:gray; padding-left:140px;" class="input-field col s12">                 
	                          <input value="" id="transac_no" name="transac_no" type="text" class="" readonly>
	                          <label style="color:red" for="transac_no">Amount Payable: </label>
	                        </div>
		      				<div style="color:gray; padding-left:140px;" class="input-field col s12">                 
	                          <input value="" id="transac_no" name="transac_no" type="text" class="" readonly>
	                          <label style="color:red" for="transac_no">Balance: </label>
	                        </div>
                    	</div>
                    </div>

                    <div class="col s12" style="border:3px solid gray; padding:5px">
							<left><p style="padding-left:40px"><b><font size="+1">CHEQUE DETAILS</font></b></p></left> 
							
							<div class="divider" style="height:2px; background-color:gray; margin-left:30px; margin-right:30px"></div>        

								<div style="color:gray; padding-left:140px;" class="input-field col s12">                 
		                          <input value="" id="transac_no" name="transac_no" type="text" class="">
		                          <label style="color:red" for="transac_no">Account Number: </label>
		                        </div>
		                        <div style="color:gray; padding-left:140px;" class="input-field col s12">                 
		                          <input value="" id="transac_no" name="transac_no" type="text" class="">
		                          <label style="color:red" for="transac_no">Account Name: </label>
		                        </div>  
		                        <div style="color:gray; padding-left:140px;" class="input-field col s12">                 
		                          <input value="" id="transac_no" name="transac_no" type="text" class="">
		                          <label style="color:red" for="transac_no">Check No.: </label>
		                        </div>       
		                        <div style="padding-left:140px;" class="input-field col s6">                 
		                          <input value="" id="transac_date" name="transac_date" type="date" class="datepicker">
		                          <label style="color:red" for="transac_date">Date and Time: </label>
		                        </div>	

                     </div>

                    <div class="container">
                    	
                    		<a href="#tabMeasurementDetail" class="btn tooltipped" data-position="top" data-delay="50" data-tooltip="Click to save payment information and get measured" style="background-color:blue; padding:9.5px; padding-bottom:45px; margin-top:20px;"><label style="font-size:15px; color:white">Get Measured!</label></a>
                    		<a href="{{URL::to('transaction/walkin-company')}}" class="btn tooltipped" data-position="top" data-delay="50" data-tooltip="Transfers you back to shopping for garments and clears previous unsaved transaction" style="background-color:red; margin-left:200px; padding:9.5px; padding-bottom:45px; margin-top:20px;"><label style="font-size:15px; color:white">Cancel Transaction</label></a>
                    	
                    </div>


	            </div>
	        	</div>
	        </div>

	        <div class="divider" style="height:2px; margin-bottom:20px; margin-top:50px"></div>
	      	
	      		<center><p><font color="gray">End of Payment Information Form</font></p></center>
	
	    </div>
	    <!-- End of Tab for Payment-->

	    <!-- Tab for Adding Measurement Detail-->
	    <div id="tabMeasurementDetail" class = "hue col s12" style="background-color: white; border:2px outset">
	        <div class="row">
		        <div class="col s12 m12 l12">
                	<span class="page-title" style="margin:15px"><center><h5>Measurement Detail</h5></center></span>
              		<div class="divider" style="height:1px; background-color:#80d8ff"></div>
              	</div>
	       	</div>

	       	<div class="container" style="color:gray">
		       	<center><h6><b>NOTES WHEN TAKING MEASUREMENTS:</b></h6></center>
		       	<center><h6>* Use "inches" (no allowance).</h6></center>
	      		<center><h6>* Place one (1) finger between bust and measuring tape while measuring waist.</h6></center>
	      		<center><h6>* Place one (1) finger between waistline and measuring tape while measuring waist.</h6></center>
	      		<center><h6>* Measure four (4) inches from waistline (downward) and place three (3) fingers between hips and measuring tape to get measurement of first hip.</h6></center>
	      		<center><h6>* Meaure eight (8) inches from waistline and place three (3) fingers between hips and measuring tape to get measurement second hip.</h6></center>
	      		<center><h6>* Measure from waistline to knee to get measurement of length of skirt.</h6></center>
	      		<div class="divider"></div>
	      		<div class="divider"></div>
	      	</div>


	       	<div class="row" style="background-color:white; margin-top:20px">
	       		<div class="container">
	            <div class="col s12"> 

	            	<div class="col s12">
		            	<!--Two ways to submit measurements-->
	                    <center><h4 style="margin-bottom:50px; color:green"><b>Ways to submit measurements</b></h4></center>
	                    
	                    <!--First Way-->
	                    <div class="left col s5">	                    	
	                    		<center><img style="height:150px; width:150px" src="{{URL::to('img/temp-online.png')}}"></center>	                    	
	                    		<center><p><a href="#!"><font size="+1">Submit measurement of employees online via Access Code to be provided by the system</font></a></p></center>
	                    </div>

	                    <!--Or-->
	                    <div class="col s2" style="margin-top:50px">
	                    	<center><h5><b>OR</b></h5></center>
	                    </div>

	                    <!--Second Way-->
	                    <div class="right col s5">	                    	
	                    		<center><img style="height:150px; width:150px" src="{{URL::to('img/temp-measure.png')}}"></center>	                    	
	                    		<center><p><a href="#!"><font size="+1">Provide or upload a copy of the measurement of each employee to be later inputted in the system</font></a></p></center>
	                    </div>
	                </div>

	            </div>
<!--
	            <a href="#save-transaction" class="right modal-trigger btn tooltipped" data-position="top" data-delay="50" data-tooltip="Click to save measurement information and go back to shop" style="padding:9.5px; padding-bottom:45px; margin-top:20px; color:black"><!--<i class="mdi-action-done"> Save All</i>--></a>
<!--	        	<div id="save-transaction" class="modal modal-fixed-footer" style="height:200px; width:500px; margin-top:150px">
										
									{!! Form::open() !!}
											
											<div class="modal-content col s12">
												<div class="col s3">
													<i class="mdi-action-done" style="font-size:50px; color:green"></i>
												</div>
												<div class="col s9">
													<p><font size="+1">Successfully saved transaction!</font></p>
												</div>
											</div>

											<div class="modal-footer col s12" style="background-color:green; opacity:0.85">
								                <button type="" class="waves-effect waves-green btn-flat" href="{{URL::to('transaction/walkin-individual-payment#tabPayment')}}"><font color="black">OK</font></button>
								            </div>
										{!! Form::close() !!}
				</div>-->
	        	</div>


	        </div>

	        <div class="divider" style="height:2px; margin-bottom:20px; margin-top:50px"></div>
	      	
	      		<center><p><font color="gray">End of Measurement Form</font></p></center>
	

	    </div>
	    <!-- End of Tab for Adding Measurement Detail-->

	    </div>
	</div>

@stop

@section('scripts')

	<script type="text/javascript">
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
    	$('body').on('load', 'ul.tabs', function() {
   	 	$('ul.tabs').tabs();
		});
  		
  		$("#addMeasurementDetail").on('click', function(){
/*  			setTimeout(function(){
  				$('ul.tabs').tabs();
  				$('#tabMeasurementDetail').style('display', 'block');
  			}, 2000);
*/  		});

  	});

	</script>

	<script>
	function tabInit() {
    $('ul.tabs').tabs();
	}

	$.ajax({
	    type: "GET",
	    //Url to the XML-file
	    url: "transaction/walkInIndividualCheckout",
	    dataType: "blade.php",
	    success: tabInit
	});
	</script>


@stop