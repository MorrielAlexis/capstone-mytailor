@extends('layouts.master')

@section('content')


	<div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><h4>Checkout</h4></span>
      </div>
    </div>

	<div class="row" style="padding:20px">

		<div class="col s12" style="margin-top:15px">
			<ul class="tabs transparent">
				<li class="tab col s4" style="border-top-left-radius: 20px; border-top-right-radius: 20px; background-color: #00b0ff;"><a style="color:black; padding-top:5px; opacity:0.80" class="tooltipped center-text" accent data-position="bottom" data-delay="50" data-tooltip="Fill up personal information" href="#tabCustomerInfo">1.	Fill-up Form</a></li>	
				<li class="tab col s4" style="border-top-left-radius: 20px; border-top-right-radius: 20px; background-color: #00b0ff;"><a style="color:black; padding-top:5px; opacity:0.80" class="tooltipped center-text" accent data-position="bottom" data-delay="50" data-tooltip="Add measurements per segment" href="#tabMeasurementDetail">2.		Add Measurement Detail</a></li>
				<li class="tab col s4" style="border-top-left-radius: 20px; border-top-right-radius: 20px; background-color: #00b0ff;"><a style="color:black; padding-top:5px; opacity:0.80" class="tooltipped center-text" accent data-position="bottom" data-delay="50" data-tooltip="Provide necessary detail" href="#tabPayment">3.		Payment</a></li>		
            <div class="indicator white" style="z-index:1"></div>
            </ul>		               
		
    <!-- Tab for Customer Info -->
		<div id="tabCustomerInfo" class = "hue col s12 active" style="background-color: white; border:2px outset">
	        <div class="row">
		        <div class="col s12 m12 l12">
                	<span class="page-title" style="margin:15px"><center><h5>Customer's Personal Information</h5></center></span>
              		<div class="divider" style="height:1px; background-color:#80d8ff"></div>
              	</div>
	       	</div>

	       	<div class="row" style="background-color:white;">
	       		<div class="container">
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
            
	            	<div class="col s2">
	            		<!--<img class="col s12" src="#!" style="height:180px; width:200px; margin-left:150px">-->
	            		<i class="mdi-action-shopping-cart" style="font-size:100px; margin-left:50px"></i>	           		
	            	</div>

	            	<div class="col s4" style="margin-top:45px">
	            		<a href="{{URL::to('transaction/walkin-individual')}}" class="btn mdi-maps-store-mall-directory tooltipped" data-position="bottom" data-delay="50" data-tooltip="Forgot something? Click to go back shopping" style="opacity:0.90; font-size:50px; background-color:green; margin-left:50px; padding:9.5px; padding-bottom:45px; border-radius:180px; margin-top:280px color:black"></a>
	            		<a href="#tabMeasurementDetail" class="btn mdi-action-done tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to save data and proceed to next step" style="opacity:0.90; font-size:50px; background-color:red; margin-left:20px; padding:9.5px; padding-bottom:45px; border-radius:180px; margin-top:280px color:black"></a>
	            	</div>


	            </div>


                <div class="col s12" style="margin-top:30px">
                	<div class="divider" style="margin-bottom:30px"></div>
	            	
                        <div style="color:black" class="input-field col s4">                 
                          <input value="" id="first_name" name="first_name" type="text" class="">
                          <label style="color:black" for="first_name">First Name </label>
                        </div>

                        <div style="color:black" class="input-field col s4">                 
                          <input value="" id="middle_name" name="middle_name" type="text" class="">
                          <label style="color:black" for="middle_name">Middle Name </label>
                        </div>

                        <div style="color:black" class="input-field col s4">                 
                          <input value="" id="last_name" name="last_name" type="text" class="">
                          <label style="color:black" for="last_name">Last Name </label>
                        </div>

                        <div style="color:black" class="input-field col s6">
							<p> Gender</p>
							<select>
								<option value="0"></option>
							    <option value="1">Female</option>
							    <option value="2">Male</option>
							</select>
						</div>

						<div style="color:black" class="input-field col s6">
                        	<p>Date of Birth</p>
                        	<input class="datepicker" id="editDtEmpBday" name="editDtEmpBday" type="date" placeholder="May 3, 1997">	
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
                            <label style="color:black" for=" Brgy">Barangay/Subd </label>
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

	                    <div style="color:black" class="input-field col s6">
                            <input required id="addEmail" name = "addEmail" type="text" class="validateEmail">
                            <label style="color:black" for="email"> *Email Address </label>
                        </div>

                        <div style="color:black" class="input-field col s6">
                            <input id="addPhone" name = "addPhone" type="text" class="validatePhone" maxlength="10">
                            <label style="color:black" for="tel"> Telephone Number </label>
                        </div>

                        <div style="color:black" class="input-field col s6">
                            <input required id="addCel" name = "addCel" type="text" class="validateCell" maxlength="11">
                            <label style="color:black" for="cellphone"> *Cellphone Number </label>
                        </div>

                        <div style="color:black" class="input-field col s6">
                            <input id="addCelAlt" name = "addCelAlt" type="text" class="validateCellAlt" maxlength="11">
                            <label style="color:black" for="cellphone"> Cellphone Number (alternate)</label>
                        </div>

                    </div>
	       		</div>
	       	</div>
	      	<div class="divider" style="height:2px; margin-bottom:20px; margin-top:50px"></div>
	      	
	      		<center><p><font color="gray">End of Customer Profile Information Form</font></p></center>
	    </div>
	    <!-- End of tab for Customer Info-->

	    <!-- Tab for Adding Measurement Detail-->
	    <div id="tabMeasurementDetail" class = "hue col s12 active" style="background-color: white; border:2px outset">
	        <div class="row">
		        <div class="col s12 m12 l12">
                	<span class="page-title" style="margin:15px"><center><h5>Measurement Detail</h5></center></span>
              		<div class="divider" style="height:1px; background-color:#80d8ff"></div>
              	</div>
	       	</div>

	       	<div class="row" style="background-color:white;">
	       		<div class="container">
	            <div class="col s12"> 

	            	   <div style="color:black" class="input-field col s4">                 
                          <input value="" id="first_name" name="first_name" type="text" class="">
                          <label style="color:black" for="first_name">First Name </label>
                        </div>
	            </div>
	        	</div>
	        </div>


	    </div>
	    <!-- End of Tab for Adding Measurement Detail-->

	    <!-- Tab for Payment-->
	    <div id="tabPayment" class = "hue col s12 active" style="background-color: white; border:2px outset">
	        <div class="row">
		        <div class="col s12 m12 l12">
                	<span class="page-title" style="margin:15px"><center><h5>Payment Information</h5></center></span>
              		<div class="divider" style="height:1px; background-color:#80d8ff"></div>
              	</div>
	       	</div>

	       	<div class="row" style="background-color:white;">
	       		<div class="container">
	            <div class="col s12"> 

	            	   <div style="color:black" class="input-field col s4">                 
                          <input value="" id="first_name" name="first_name" type="text" class="">
                          <label style="color:black" for="first_name">First Name </label>
                        </div>
	            </div>
	        	</div>
	        </div>
	    </div>
	    <!-- End of Tab for Payment-->
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
   	 	$('ul.tabs').tabs()
});
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