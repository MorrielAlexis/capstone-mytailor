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
	            		<a id="addPayment" href="#tabPayment" class="btn mdi-action-done tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to save data and proceed to next step" style="opacity:0.90; font-size:50px; background-color:red; margin-left:20px; padding:9.5px; padding-bottom:45px; border-radius:180px; margin-top:280px color:black"></a>
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

                    <div class="container">
                    	
                    		<a href="#tabMeasurementDetail" class="btn tooltipped" data-position="top" data-delay="50" data-tooltip="Click to save payment information and get measured" style="background-color:blue; padding:9.5px; padding-bottom:45px; margin-top:20px;"><label style="font-size:15px; color:white">Get Measured!</label></a>
                    		<a href="{{URL::to('transaction/walkin-individual')}}" class="btn tooltipped" data-position="top" data-delay="50" data-tooltip="Click to cancel current unsaved transaction and transfered back to the shop" style="background-color:red; margin-left:200px; padding:9.5px; padding-bottom:45px; margin-top:20px;"><label style="font-size:15px; color:white">Cancel Transaction</label></a>
                    	
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

	            	<div class="col s6" style="margin-top:30px; margin-bottom:30px">
          				<input type="checkbox" class="filled-in" id="same_meas" checked/>
							<label for="same_meas" style="color:red">Same measurements with similar garments</label>
		      		</div>
		      		<div class="col s6 right" style="margin-top:10px; margin-bottom:30px">
				         <a class="right waves-effect waves-light btn-floating tooltipped btn-large red" data-position="bottom" data-delay="50" data-tooltip="Click to add a new set of measurement fields" href="#!" style=""><i class="small mdi-content-add"></i></a>
				    </div>

	            	<div id="for_top" class="col s12" style="color:green">
	            		<h5><b>Top</b> - Parts to be measured</h5>
	            	   	<div style="color:black; padding-left:140px" class="input-field col s6">                 
                          <input value="" id="shoulder" name="shoulder" type="text" class="">
                          <label style="color:black" for="shoulder">Shoulder: </label>
                        </div>
                        <div style="color:black; padding-left:140px" class="input-field col s6">                 
                          <input value="" id="bust" name="bust" type="text" class="">
                          <label style="color:black" for="bust">Bust: </label>
                        </div>
                        <div style="color:black; padding-left:140px" class="input-field col s6">                 
                          <input value="" id="waist" name="waist" type="text" class="">
                          <label style="color:black" for="waist">Waist: </label>
                        </div>
                        <div style="color:black; padding-left:140px" class="input-field col s6">                 
                          <input value="" id="hip" name="hip" type="text" class="">
                          <label style="color:black" for="hip">Hip: </label>
                        </div>
                        <div style="color:black; padding-left:140px" class="input-field col s6">                 
                          <input value="" id="armhole" name="armhole" type="text" class="">
                          <label style="color:black" for="armhole">Armhole: </label>
                        </div>
                        <div style="color:black; padding-left:140px" class="input-field col s6">                 
                          <input value="" id="circumference" name="circumference" type="text" class="">
                          <label style="color:black" for="circumference">Circumference: </label>
                        </div>
                        <div style="color:black; padding-left:140px" class="input-field col s6">                 
                          <input value="" id="length_sleeves" name="length_sleeves" type="text" class="">
                          <label style="color:black" for="length_sleeves">Length of Sleeves: </label>
                        </div>
                        <div style="color:black; padding-left:140px" class="input-field col s6">                 
                          <input value="" id="length_polo" name="length_polo" type="text" class="">
                          <label style="color:black" for="length_polo">Length of Polo: </label>
                        </div>
                        <div style="color:black; padding-left:140px" class="input-field col s6">                 
                          <input value="" id="neck" name="neck" type="text" class="">
                          <label style="color:black" for="neck">Neck: </label>
                        </div>
                    </div>

                    <div id="for_pants" class="col s12" style="margin-top:30px; color:blue">
                        <h5><b>Pants</b> - Parts to be measured</h5>
	            	   	<div style="color:black; padding-left:140px" class="input-field col s6">                 
                          <input value="" id="waist" name="waist" type="text" class="">
                          <label style="color:black" for="waist">Waist: </label>
                        </div>
                        <div style="color:black; padding-left:140px" class="input-field col s6">                 
                          <input value="" id="hip" name="hip" type="text" class="">
                          <label style="color:black" for="hip">Hip: </label>
                        </div>
                        <div style="color:black; padding-left:140px" class="input-field col s6">                 
                          <input value="" id="thigh" name="thigh" type="text" class="">
                          <label style="color:black" for="thigh">Thigh: </label>
                        </div>
                        <div style="color:black; padding-left:140px" class="input-field col s6">                 
                          <input value="" id="knee" name="knee" type="text" class="">
                          <label style="color:black" for="knee">Knee: </label>
                        </div>
                        <div style="color:black; padding-left:140px" class="input-field col s6">                 
                          <input value="" id="cuffs" name="cuffs" type="text" class="">
                          <label style="color:black" for="cuffs">Cuffs: </label>
                        </div>
                        <div style="color:black; padding-left:140px" class="input-field col s6">                 
                          <input value="" id="crotch" name="crotch" type="text" class="">
                          <label style="color:black" for="crotch">Crotch: </label>
                        </div>
                        <div style="color:black; padding-left:140px" class="input-field col s6">                 
                          <input value="" id="length" name="length" type="text" class="">
                          <label style="color:black" for="length">Length: </label>
                        </div>
                    </div>

                    <a href="#save-transaction" class="right modal-trigger btn tooltipped" data-position="top" data-delay="50" data-tooltip="Click to save measurement information and go back to shop" style="padding:9.5px; padding-bottom:45px; margin-top:20px; color:black"><!--<i class="mdi-action-done"> -->Save All<!--</i>--></a>
                    	<div id="save-transaction" class="modal modal-fixed-footer" style="height:200px; width:500px; margin-top:150px">
										
								{!! Form::open() !!}
										
										<div class="modal-content col s12">
											<div class="col s3">
												<i class="mdi-action-done" style="font-size:50px; color:green"></i>
											</div>
											<div class="col s9">
												<p><font size="+1">Successfully saved measurement and transaction!</font></p>
											</div>
										</div>

										<div class="modal-footer col s12" style="background-color:green; opacity:0.85">
							                <button type="" class="waves-effect waves-green btn-flat" href="{{URL::to('transaction/walkin-individual-payment#tabPayment')}}"><font color="black">OK</font></button>
							            </div>
									{!! Form::close() !!}
						</div>
	            </div>
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