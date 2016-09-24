@extends('layouts.masterOnline')

@section('content')


    	<div class="row" style="padding:30px">
        	<div class="col s12" style="padding-left:15%">
		        <ul class="breadcrumb">
					<li><a class="active" href="#customer-info">1. Fill-up form</a></li>
					<li><a href="{{URL::to('company-checkout-measure')}}">2. Add measurement detail</a></li>
					<li><a href="{{URL::to('company-checkout-pay')}}">3. Payment</a></li>				
				</ul>
			</div>

			<!-- Tab for Customer Info -->

		<div id="customer-info" class = "hue col s12" style="background-color: white; border:2px outset">
	        <div class="row">
		        <div class="col s12 m12 l12">
                	<span class="page-title" style="margin:15px"><center><h5><b>Company's Personal Information</b></h5></center></span>
              		<div class="divider" style="height:1px; background-color:#80d8ff"></div>
              		<div class="divider" style="height:1px; background-color:#80d8ff"></div>
              	</div>
	       	</div>

	       	<div class="row" style="background-color:white; padding-left:4%; padding-right: 4%">
	       		

	       		<!--Start of header with company id and transaction no-->
	            <div class="col s12">   
	            	<div class="col s12">
                    	<div class="col s6">       
                        	<div class="col s5" style="color:teal; font-size:17px"><p><b>Customer ID</b></p></div>
                        	<div class="col s7" style="color:red;"><p><input value="" id="compID" name="compID" type="text" readonly></p></div> 
                      	</div>
                      	<div class="col s6">
                        	<div class="col s5" style="color:teal; font-size:17px"><p><b>Transaction No.</b></p></div>
                        	<div class="col s7" style="color:red;"><p><input value="{" id="joID" name="joID" type="text" readonly></p></div> 
	            	    </div>
                	</div>

					<!--Modal for Cancel Transaction-->
					<div id="cancel-order" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:80px">
						<h5><font color="red"><center><b>Warning!</b></center></font></h5>
							
								<div class="divider" style="height:2px"></div>
								<div class="modal-content col s12">
									<div class="center col s4"><i class="mdi-alert-warning" style="color:red; font-size:60px"></i></div>
									<div class="col s8"><p style="font-size:18px">Are you sure? Doing this will delete current transaction.</p></div>
								</div>

								<div class="modal-footer col s12">
					                <button class="waves-effect waves-green btn-flat"><font color="black">Yes</font></button>
					                <a href="{{URL::to('/transaction/walkin-company-payment-customer-info')}}" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">No</font></a>
					            </div>

					</div>
					<!--End of modal for cancel transaction-->

	

	            	

	            </div> <!--End of header-->


                <div class="col s12" style="margin-top:30px">
                	<div class="divider" style="margin-bottom:30px"></div>
	            	
	            	<span class="col s12" style="color:teal;"><b>Company Detail</b></span>
	            	<div class="card-panel col s12" style="border:3px solid gray; padding:15px;">                      
                        <div style="color:black" class="input-field col s12">                 
                          <input value="" id="company_name" name="company_name" type="text" class="" pattern=">
                          <label style="color:gray" for="company_name"><b>*Company Name </b></label>
                        </div>

                        <div style="color:black" class="input-field col s6">                 
                          <input value="" id="contact_person" name="contact_person" type="text" class="" pattern="">
                          <label style="color:gray" for="contact_person"><b>*Contact Person </b></label>
                        </div>

                    </div>

                    <span class="col s12" style="color:teal; margin-top:20px"><b>Company Address</b></span>
                    <div class="card-panel col s12" style="border:3px solid gray; padding:15px">
                        <div style="color:black" class="input-field col s4">
                            <input required id="comp_house_no" name="comp_house_no" type="text" class="" pattern="[0-9a-zA-Z\-\s]+$">
                            <label style="color:gray" for="comp_house_no"><b>*House No. </b></label>
                        </div>

                        <div style="color:black" class="input-field col s4">
                            <input required id="comp_street" name="comp_street" type="text" class="" pattern="^[a-zA-Z\d\-'`]+(\s[a-zA-Z\-'`]+)?">
                            <label style="color:gray" for=" comp_street"><b>*Street </b></label>
                        </div>

                        <div style="color:black" class="input-field col s4">
                            <input  id="comp_barangay" name="comp_barangay" type="text" class="validateBarangay" pattern="^[a-zA-Z\d\-'`]+(\s[a-zA-Z\-'`]+)?">
                            <label style="color:gray" for=" comp_barangay"><b>*Barangay/Subd </b></label>
                        </div>

                        <div style="color:black" class="input-field col s4">
                            <input required id="comp_city" name="comp_city" type="text" class="validateCity" pattern="^[a-zA-Z\d\-'`]+(\s[a-zA-Z\-'`]+)?">
                            <label style="color:gray" for=" comp_city"><b>*City/Municipality </b></label>
                        </div>


                        <div style="color:black" class="input-field col s4">
                            <input id="comp_province" name="comp_province" type="text" class="validateProvince" pattern="^[a-zA-Z\d\-'`]+(\s[a-zA-Z\-'`]+)?">
                            <label style="color:gray" for="comp_province"><b>Province/Region </b></label>
	                    </div>

                        <div style="color:black" class="input-field col s4">
                            <input id="comp_zip_code" name="comp_zip_code" type="text" class="" pattern="0-9]+$">
                            <label style="color:gray" for="comp_zip_code"><b>Zip Code </b></label>
	                    </div>
	                </div>

	                <span class="col s12" style="color:teal; margin-top:20px"><b>Company Contact Information</b></span>
                    <div class="card-panel col s12" style="border:3px solid gray; padding:15px">
	                    <div style="color:black" class="input-field col s12">
                            <input required id="comp_email" name = "comp_email" type="email">
                            <label style="color:gray" for="comp_email"><b> *Company Email Address </b></label>
                        </div>

                        <div style="color:black" class="input-field col s6">
                            <input required id="comp_cell" name = "comp_cell" type="text" class="validateCell" pattern="^[0-9]{11,11}$" maxlength="11">
                            <label style="color:gray" for="comp_cell"><b> *Cellphone Number </b></label>
                        </div>

                        <div style="color:black" class="input-field col s6">
                            <input id="comp_cell_alt" name = "comp_cell_alt" type="text" class="validateCellAlt" maxlength="11" pattern="^[0-9]{11,11}$">
                            <label style="color:gray" for="comp_cell_alt"><b> Cellphone Number (alternate)</b></label>
                        </div>

                        <div style="color:black" class="input-field col s6">
                            <input id="comp_tel" name = "comp_tel" type="text" class="validatePhone" maxlength="10" pattern="^[0-9]{6,10}$">
                            <label style="color:gray" for="comp_tel"><b> Telephone Number </b></label>
                        </div>

                        <div style="color:black" class="input-field col s6">
                            <input id="comp_fax" name = "comp_fax" type="text" class="validatePhone" maxlength="10" pattern="^[0-9]{6,10}$">
                            <label style="color:gray" for="comp_fax"><b> Fax Number </b></label>
                        </div>
                    </div>

                    </div>

					<!--Start of bottom button-->
					<div class="col s12" style="margin-top:30px">
						<button type="submit" id="addPayment" class="right btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to save data and proceed to next step" style="margin-left:40px; background-color:teal; color:white;width:200px"><b>Save and Proceed</b></button>
	            		<a id="cancelTransac" href="#cancel-order" class="right btn modal-trigger tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to cancel transaction and go back to homepage" style="background-color:#a7ffeb; color:black;width:200px"><b>Cancel Transaction</b></a>
					</div>
					<!--End of bottom button-->

	       		
	       		        <div style="color:gray; margin-top:30px; margin-left:20px" class="col s12">
                            <h6>IMPORTANT NOTE: Fields with asterisk (*) must not be left blank.</h6>
                        </div>
	       	</div>
	      	<div class="divider" style="height:2px; margin-bottom:20px; margin-top:50px"></div>
	      	
	      		<center><p><font color="gray">End of Customer Profile Information Form</font></p></center>
	    </div>

	    <!-- End of tab for Customer Info-->

		</div>


@stop

@section('scripts')

	

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
		$('select').material_select();
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