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
			<li><a style="padding-left:200px" href="{{URL::to('transaction/walkin-individual-payment-payment-info')}}"><b>2.PAYMENT</b></a></li>
			<li><a style="padding-left:200px" href="{{URL::to('transaction/walkin-individual-payment-measure-detail')}}"><b>3.ADD MEASUREMENT DETAIL</b></a></li>
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
            
	            	
                  <a id="cancelTransac" href="#cancel-order" class="btn modal-trigger tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to cancel transaction and go back to homepage" style="margin-top:60px; margin-left:40px; padding:10px; padding-bottom:45px; background-color:teal; color:white">Cancel</a>  	            		
                  <div id="cancel-order" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:80px">
                      <h5><font color="red"><center><b>Warning!</b></center></font></h5>
                        
                        {!! Form::open() !!}
                          <div class="divider" style="height:2px"></div>
                          <div class="modal-content col s12">
                            <div class="center col s4"><i class="mdi-alert-warning" style="color:red; font-size:60px"></i></div>
                            <div class="col s8"><p style="font-size:18px">Are you sure? Doing this will delete current transaction.</p></div>
                          </div>

                          <div class="modal-footer col s12">
                                    <a class="waves-effect waves-green btn-flat" href="{{URL::to('transaction/walkin-individual')}}"><font color="black">Yes</font></a>
                                    <a href="{{URL::to('/transaction/walkin-individual-payment-customer-info')}}" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">No</font></a>
                                </div>
                        {!! Form::close() !!}
                    </div>
                  <a id="addPayment" href="{{URL::to('transaction/walkin-individual-payment-payment-info')}}" class="btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to save data and proceed to next step" style="margin-top:60px; margin-left:40px; padding:10px; padding-bottom:45px; background-color:teal; color:white">Save and Proceed</a> 

	            	
	            	<div class="col s4" style="margin-top:45px">
	            		 <div class="fixed-action-btn vertical" style="bottom: 45px; right: 24px;">
						        <a class="mdi-maps-store-mall-directory btn-floating btn-large red " style="font-size:40px; height:70px; width:70px; padding:5px; padding-bottom:3px; margin-right:40px" ></a>
						          <ul>
      						      <li><a href="{{URL::to('transaction/walkin-individual')}}" class="btn-floating green tooltipped" data-position="left" data-delay="50" data-tooltip="Forgot something? Click to go back shopping" style="margin-right:40px"><i class="mdi-action-shopping-basket"></i></a></li>
      						      <li><a href="{{URL::to('transaction/walkin-individual-customize-orders')}}" class="btn-floating yellow darken-1 tooltipped" data-position="left" data-delay="50" data-tooltip="Click to go back editing your order" style="margin-right:40px"><i class="mdi-action-description">Return to Customize Order</i></a></li>
      						    </ul>
						        </div>
	            		
	            		
	            	</div>


	            </div>


                <div class="col s12" style="margin-top:30px">
                	<div class="divider" style="margin-bottom:30px"></div>
	            	
                        <div style="color:black" class="input-field col s4">                 
                          <input value="" id="first_name" name="first_name" type="text" class="">
                          <label style="color:black" for="first_name">*First Name </label>
                        </div>

                        <div style="color:black" class="input-field col s4">                 
                          <input value="" id="middle_name" name="middle_name" type="text" class="">
                          <label style="color:black" for="middle_name">Middle Name </label>
                        </div>

                        <div style="color:black" class="input-field col s4">                 
                          <input value="" id="last_name" name="last_name" type="text" class="">
                          <label style="color:black" for="last_name">*Last Name </label>
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