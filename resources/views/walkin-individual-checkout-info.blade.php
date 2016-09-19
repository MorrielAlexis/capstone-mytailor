@extends('layouts.master')
@section('content')


	<div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><center><h3><b>Welcome to <font color="white">MyTailor</font></b></h3></center></span>
        <center><h5>Walk-in Individual - Payout</h5></center>
      </div>
    </div>

	<div class="row" style="padding:30px">
        
    <ul class="col s12 breadcrumb">
			<li><a class="active" style="padding-left:200px" href="#customer-info"><b>1.FILL-UP FORM</b></a></li>		
			<li><a style="padding-left:200px"><b>2.ADD MEASUREMENT DETAIL</b></a></li>
      <li><a style="padding-left:200px"><b>3.PAYMENT</b></a></li>
		</ul>

		<!-- Tab for Customer Info -->
		<div id="customer-info" class = "hue col s12" style="background-color: white; border:2px outset">
	        <div class="row">
		        <div class="col s12 m12 l12">
                	<span class="page-title" style="margin:15px"><center><h5><b>Customer's Personal Information</b></h5></center></span>
              		<div class="divider" style="height:1px; background-color:#80d8ff"></div>
              		<div class="divider" style="height:1px; background-color:#80d8ff"></div>
              	</div>
	       	</div>

	       	<div class="row" style="background-color:white;">
	       		<div class="container">

              <!--Start of header with customer id and transaction no-->
	            <div class="col s12">

            {!! Form::open(['url' => 'transaction/walkin-individual-save-customer', 'method' => 'POST']) !!}
                  <div class="col s12">
                      <div class="col s6">       
                        <div class="col s5" style="color:teal; font-size:17px"><p><b>Customer ID</b></p></div>
                        <div class="col s7" style="color:red;"><p><input value="{{ $custID }}" id="addIndiID" name="addIndiID" type="text" readonly></p></div> 
                      </div>
                      <div class="col s6">
                        <div class="col s5" style="color:teal; font-size:17px"><p><b>Transaction No.</b></p></div>
                        <div class="col s7" style="color:red;"><p><input value="{{ $joID }}" id="addJOID" name="addJOID" type="text" readonly></p></div> 
                      </div>
                </div>
                
                <!--Eto yung floating button sa gilid. Yung may home icon-->
                <div class="col s4" style="margin-top:5px">
                   <div class="fixed-action-btn vertical" style="bottom: 45px; right: 24px;">
                    <a class="mdi-maps-store-mall-directory btn-floating btn-large red " style="font-size:40px; height:70px; width:70px; padding:5px; padding-bottom:3px; margin-right:40px" ></a>
                      <ul>
                        <li><a href="{{URL::to('transaction/walkin-individual-show-items')}}" class="btn-floating green tooltipped" data-position="left" data-delay="50" data-tooltip="Forgot something? Click to go back shopping" style="margin-right:40px"><i class="mdi-action-shopping-basket"></i></a></li>
                        <li><a href="{{URL::to('transaction/walkin-individual-customize-orders')}}" class="btn-floating yellow darken-1 tooltipped" data-position="left" data-delay="50" data-tooltip="Click to go back editing your order" style="margin-right:40px"><i class="mdi-action-description">Return to Customize Order</i></a></li>
                      </ul>
                    </div>                
                </div>
                <!--end nung sa floating button-->
              </div>
              <!--end of header for customer id and transaction no-->
              <!-- Start of Customer Information-->
                <div class="col s12" style="margin-top:10px">
                	<div class="divider" style="height:2px; background-color:teal; margin-bottom:40px"></div>
	            	
                    <span class="col s12" style="color:teal;"><b>Customer Details</b></span>
                    <div class="card-panel col s12" style="border:3px solid gray; padding:15px;">
                        <div style="color:black" class="input-field col s4">                 
                          <input required value="" id="first_name" name="addIndiFirstName" type="text" class="" placeholder="Hope Elizabeth" pattern="^([A-Za-z\-'`]+ )+[A-Za-z\-'`]+$|^[A-Za-z\-'`]+$">
                          <label style="color:gray" for="first_name"><b><span class="red-text"><b>*</b></span>First Name</b></label>
                        </div>

                        <div style="color:black" class="input-field col s4">                 
                          <input value="" id="middle_name" name="addIndiMiddleName" type="text" class="" placeholder="Soberano" pattern="^([A-Za-z\-'`]+ )+[A-Za-z\-'`]+$|^[A-Za-z\-'`]+$">
                          <label style="color:gray" for="middle_name"><b>Middle Name</b></label>
                        </div>

                        <div style="color:black" class="input-field col s4">                 
                          <input required value="" id="last_name" name="addIndiLastName" type="text" class="" placeholder="Aquino" pattern="^([A-Za-z\-'`]+ )+[A-Za-z\-'`]+$|^[A-Za-z\-'`]+$">
                          <label style="color:gray" for="last_name"><b><span class="red-text"><b>*</b></span>Last Name </b></label>
                        </div>

                        <div class="input-field col s12" style="color:black">
            							<!--<p style="color:gray"><b>Sex</b></p>-->
            							<select value="" name='strIndivSex' required>
                              <option value="M">Male</option>
                              <option value="F">Female</option>
                          </select>    
                          <label>Sex</label>
            						</div>
                    </div>    

                    <span class="col s12" style="color:teal; margin-top:20px"><b>Customer Address</b></span>
                    <div class="card-panel col s12" style="border:3px solid gray; padding:15px">
                        <div style="color:black" class="input-field col s4">
                            <input required id="addCustPrivHouseNo" name="addCustPrivHouseNo" type="text" pattern="[0-9a-zA-Z\-\s]+$" class="validateHouseNo" placeholder="77-B">
                            <label style="color:gray" for="house_no"><b><span class="red-text"><b>*</b></span>House No. </b></label>
                        </div>

                        <div style="color:black" class="input-field col s4">
                            <input required id="addCustPrivStreet" name="addCustPrivStreet" type="text" class="validateStreet" placeholder="Dolce Amore" pattern="^[a-zA-Z\d\-'`]+(\s[a-zA-Z\-'`]+)?">
                            <label style="color:gray" for=" Street"><b><span class="red-text"><b>*</b></span>Street </b></label>
                        </div>

                        <div style="color:black" class="input-field col s4">
                            <input  id="addCustPrivBarangay" name="addCustPrivBarangay" type="text" class="validateBarangay" placeholder="Willpower Homes" pattern="^[a-zA-Z\d\-'`]+(\s[a-zA-Z\-'`]+)?">
                            <label style="color:gray" for=" Brgy"><b><span class="red-text"><b>*</b></span>Barangay/Subd </b></label>
                        </div>

                        <div style="color:black" class="input-field col s4">
                            <input required id="addCustPrivCity" name="addCustPrivCity" type="text" class="validateCity" placeholder="Mandaluyong" pattern="^[a-zA-Z\d\-'`]+(\s[a-zA-Z\-'`]+)?">
                            <label style="color:gray" for=" City"><b><span class="red-text"><b>*</b></span>City/Municipality </b></label>
                        </div>


                        <div style="color:black" class="input-field col s4">
                            <input id="addCustPrivProvince" name="addCustPrivProvince" type="text" class="validateProvince" placeholder="Metro Manila" pattern="^[a-zA-Z\d\-'`]+(\s[a-zA-Z\-'`]+)?">
                            <label style="color:gray" for=" Province"><b>Province/Region </b></label>
	                    </div>

                        <div style="color:black" class="input-field col s4">
                            <input id="addCustPrivZipCode" name="addCustPrivZipCode" type="text" class="validateZip" placeholder="1016" pattern="^[0-9]+$">
                            <label style="color:gray" for=" Zip Code"><b>Zip Code </b></label>
	                    </div>
                  </div>

                  <span class="col s12" style="color:teal; margin-top:20px"><b>Customer Contact Information</b></span>
                    <div class="card-panel col s12" style="border:3px solid gray; padding:15px">
	                    <div style="color:black" class="input-field col s6">
                            <input required id="addEmail" name = "addEmail" type="email" class="validate" placeholder="lizahope@gmail.com">
                            <label style="color:gray" for="email"><b> Email Address </b></label>
                        </div>

                        <div style="color:black" class="input-field col s6">
                            <input id="addPhone" name = "addPhone" type="text" class="validatePhone" maxlength="10" pattern="^[0-9]{6,10}$">
                            <label style="color:gray" for="tel"><b> Telephone Number </b></label>
                        </div>

                        <div style="color:black" class="input-field col s6">
                            <input required id="addCel" name = "addCel" type="text" class="validate" maxlength="11" placeholder="09178919988" pattern="^[0-9]{11,11}$">
                            <label style="color:gray" for="cellphone"><b> <span class="red-text"><b>*</b></span>Cellphone Number </b></label>
                        </div>

                        <div style="color:black" class="input-field col s6">
                            <input id="addCelAlt" name = "addCelAlt" type="text" class="validateCellAlt" maxlength="11" pattern="^[0-9]{11,11}$">
                            <label style="color:gray" for="cellphone"><b> Cellphone Number (alternate)</b></label>
                        </div>
                    </div>

                </div>
                  <a href="#confirm-submission" class="right btn modal-trigger tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to save data and proceed to next step" style="margin-left:40px; background-color:#00695c; color:white"><b><i class="mdi-navigation-check" style="padding-right:10px"></i>Save</b></a>                                
                  <a href="#cancel-order" class="right btn modal-trigger tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to cancel transaction and go back to homepage" style="background-color:#a7ffeb; color:black"><b><i class="mdi-navigation-close" style="padding-right:10px"></i>Cancel</b></a>                   
              
              <div class="col s12" style="margin-top:30px">
                  <div id="confirm-submission" class="modal modal-fixed-footer" style="height:300px; width:500px; margin-top:80px">
                      <h5><font color="black"><center><b>Warning!</b></center></font></h5>
                        
                          <div class="divider" style="height:2px"></div>
                            <div class="modal-content col s12">
                              <div class="center col s4"><i class="mdi-alert-warning" style="color:yellow; font-size:60px"></i></div>
                              <div class="col s8"><p style="font-size:18px">Confirm submission? You will not be able to change or cancel your transaction once you have proceeded.</p></div>
                            </div>

                          <div class="modal-footer col s12">
                              <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">Yes</font></button>
                              <a class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">No</font></a>
                          </div>
                    </div>
              </div>

            {!! Form::close() !!}
              <!--End of Customer Information-->
              
              <!--Start of bottom button-->
              <div class="col s12" style="margin-top:30px">
                  <div id="cancel-order" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:80px">
                      <h5><font color="red"><center><b>Warning!</b></center></font></h5>
                        
                        {!! Form::open(['url' => 'transaction/walkin-individual-clear-order', 'method' => 'POST']) !!}
                          <div class="divider" style="height:2px"></div>
                            <div class="modal-content col s12">
                              <div class="center col s4"><i class="mdi-alert-warning" style="color:red; font-size:60px"></i></div>
                              <div class="col s8"><p style="font-size:18px">Are you sure? Doing this will delete current transaction.</p></div>
                            </div>

                          <div class="modal-footer col s12">
                              <button type="submit" class="waves-effect waves-green btn-flat"><font color="black">Yes</font></button>
                              <a class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">No</font></a>
                          </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                <!--End of bottom button-->

	       		</div>

	       		 		<div style="color:gray; margin-top:10px; margin-left:20px" class="col s12">
                      <h6>IMPORTANT NOTE: Fields with asterisk (*) must not be left blank.</h6>
                </div>
	       	</div>
	      	<div class="divider" style="height:2px; margin-bottom:20px; margin-top:30px"></div>
	      	
	      		<center><p><font color="gray">End of Customer Profile Information Form</font></p></center>
	    </div>
	    <!-- End of tab for Customer Info-->


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