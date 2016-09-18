@extends('layouts.master')

@section('content')


	<div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><center><h3><b>Welcome to <font color="white">MyTailor</font></b></h3></center></span>
        <center><h5>Walk-in Company - Payout</h5></center>
      </div>
    </div>

    	<div class="row" style="padding:30px">
        	<div class="col s12" style="padding-left:15%">
		        <ul class="breadcrumb">
					<li><a class="active col s12" href="#customer-info"><b>1. FILL-UP FORM</b></a></li>
					<li><a class="col s12" style="margin-left:7%;" href="{{URL::to('transaction/walkin-company-payment-measure-detail')}}"><b>2. ADD MEASUREMENT DETAIL</b></a></li>
					<li><a class="col s12" style="margin-left:33%" href="{{URL::to('transaction/walkin-company-payment-info')}}"><b>3. PAYMENT</b></a></li>				
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

	       	<div class="row" style="background-color:white;">
	       		<div class="container">

	       		<!--Start of header with company id and transaction no-->
	            <div class="col s12">   
	            	<div class="col s12">
                    	<div class="col s6">       
                        	<div class="col s5" style="color:teal; font-size:17px"><p><b>Customer ID</b></p></div>
                        	<div class="col s7" style="color:red;"><p><input value="{{ $custID }}" id="addCompID" name="addCompID" type="text" readonly></p></div> 
                      	</div>
                      	<div class="col s6">
                        	<div class="col s5" style="color:teal; font-size:17px"><p><b>Transaction No.</b></p></div>
                        	<div class="col s7" style="color:red;"><p><input value="{{ $joID }}" id="addJOID" name="addJOID" type="text" readonly></p></div> 
	            	    </div>
                	</div>

            

					<!--Modal for summary of orders-->
					<div id="summary-of-order" class="modal modal-fixed-footer" style="height:500px; width:800px; margin-top:30px">
						<h5><font color="teal"><center><b>Summary of Orders</b></center></font></h5>
							
							{!! Form::open() !!}
								<div class="divider" style="height:2px"></div>
								<div class="modal-content col s12">
									<label>This is a summary of orders:</label>
										<div class="container">
					                        <table class = "table centered order-summary" border = "1">
							       				<thead style="color:gray">
								          			<tr>
									                  <th data-field="product">Package</th>         
									                  <th data-field="quantity">Quantity</th>
									                  <th data-field="price">Unit Price</th>
									                  <th data-field="price">Total Price</th>
									              	</tr>
								              	</thead>
								              	<tbody>
								              		@for($i = 0; $i < count($packages); $i++)
										            <tr>
										               <td>{{ $packages[$i]->strPackageName }}</td>
										               <td>{{ $quantity[$i] }}</td>
										               <td>{{ number_format($packages[$i]->dblPackagePrice, 2) }} PHP</td>
										               <td>{{ number_format($prices[$i], 2) }} PHP</td>
										            </tr>
													@endfor
										        </tbody>
										    </table>
							      		</div>

							      		
							      		<div class="col s12"><div class="divider"></div></div>

								      	<div class="col s12" style="margin-bottom:50px" >
											<div class="col s6"><p style="color:gray">Estimated time to finish all orders:<p style="color:black" id="totalTime"></p></p></div>
											<div class="col s6"><p style="color:gray">Total Amount to Pay:<p style="color:black" id="totalPrice"></p></p></div>
										</div>
								</div>

								<div class="modal-footer col s12">
									<p class="left" style="margin-left:10px; color:gray;">Continue to payment?</p>
					                <a class="waves-effect waves-green btn-flat" href="{{URL::to('transaction/walkin-company-payment-measure-detail')}}"><font color="black">Yes</font></a>
					                <a class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">No</font></a>
					            </div>
							{!! Form::close() !!}
					</div>
					<!--End of modal for summary of orders-->

					<!--Modal for Cancel Transaction-->
					<div id="cancel-order" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:80px">
						<h5><font color="red"><center><b>Warning!</b></center></font></h5>
							
							{!! Form::open() !!}
								<div class="divider" style="height:2px"></div>
								<div class="modal-content col s12">
									<div class="center col s4"><i class="mdi-alert-warning" style="color:red; font-size:60px"></i></div>
									<div class="col s8"><p style="font-size:18px">Are you sure? Doing this will delete current transaction.</p></div>
								</div>

								<div class="modal-footer col s12">
					                <a class="waves-effect waves-green btn-flat" href="{{URL::to('transaction/walkin-company')}}"><font color="black">Yes</font></a>
					                <a href="{{URL::to('/transaction/walkin-company-payment-customer-info')}}" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">No</font></a>
					            </div>
							{!! Form::close() !!}
					</div>
					<!--End of modal for cancel transaction-->

	

	            	<div class="col s4" style="margin-top:5px">
	            		<div class="fixed-action-btn vertical" style="bottom: 45px; right: 24px;">
						        <a class="mdi-maps-store-mall-directory btn-floating btn-large red " style="font-size:40px; height:70px; width:70px; padding:5px; padding-bottom:3px; margin-right:40px" ></a>
						        <ul>
      						      <li><a href="{{URL::to('transaction/walkin-company')}}" class="btn-floating green tooltipped" data-position="left" data-delay="50" data-tooltip="Forgot something? Click to go back shopping" style="height:50px; width:50px; margin-right:40px; padding-top:5px;"><i class="mdi-action-shopping-basket"></i></a></li>
      						      <li><a href="{{URL::to('transaction/walkin-company-customize-orders')}}" class="btn-floating yellow darken-1 tooltipped" data-position="left" data-delay="50" data-tooltip="Click to go back editing your order" style="height:50px; width:50px; margin-right:40px; padding-top:5px;"><i class="mdi-action-description">Return to Customize Order</i></a></li>
      						    </ul>
						</div>	
	            		
	            	</div>

	            </div> <!--End of header-->


                <div class="col s12" style="margin-top:30px">
                	<div class="divider" style="margin-bottom:30px"></div>
	            	
	            	<span class="col s12" style="color:teal;"><b>Company Detail</b></span>
	            	<div class="card-panel col s12" style="border:3px solid gray; padding:15px;">                      
                        <div style="color:black" class="input-field col s12">                 
                          <input value="" id="first_name" name="first_name" type="text" class="" pattern="^([A-Za-z\-'`]+ )+[A-Za-z\-'`]+$|^[A-Za-z\-'`]+$">
                          <label style="color:gray" for="first_name"><b>*Company Name </b></label>
                        </div>

                        <div style="color:black" class="input-field col s6">                 
                          <input value="" id="middle_name" name="middle_name" type="text" class="" pattern="^([A-Za-z\-'`]+ )+[A-Za-z\-'`]+$|^[A-Za-z\-'`]+$">
                          <label style="color:gray" for="middle_name"><b>*Contact Person </b></label>
                        </div>

                        <div style="color:black" class="input-field col s6">                 
                          <input value="" id="contact_position" name="contact_position" type="text" class="" pattern="^([A-Za-z\-'`]+ )+[A-Za-z\-'`]+$|^[A-Za-z\-'`]+$">
                          <label style="color:gray" for="contact_position"><b>*Position </b></label>
                        </div>
                    </div>

                    <span class="col s12" style="color:teal; margin-top:20px"><b>Company Address</b></span>
                    <div class="card-panel col s12" style="border:3px solid gray; padding:15px">
                        <div style="color:black" class="input-field col s4">
                            <input required id="addCustPrivHouseNo" name="addCustPrivHouseNo" type="text" class="" pattern="[0-9a-zA-Z\-\s]+$">
                            <label style="color:gray" for="house_no"><b>*House No. </b></label>
                        </div>

                        <div style="color:black" class="input-field col s4">
                            <input required id="addCustPrivStreet" name="addCustPrivStreet" type="text" class="" pattern="^[a-zA-Z\d\-'`]+(\s[a-zA-Z\-'`]+)?">
                            <label style="color:gray" for=" Street"><b>*Street </b></label>
                        </div>

                        <div style="color:black" class="input-field col s4">
                            <input  id="addCustPrivBarangay" name="addCustPrivBarangay" type="text" class="validateBarangay" pattern="^[a-zA-Z\d\-'`]+(\s[a-zA-Z\-'`]+)?">
                            <label style="color:gray" for=" Brgy"><b>*Barangay/Subd </b></label>
                        </div>

                        <div style="color:black" class="input-field col s4">
                            <input required id="addCustPrivCity" name="addCustPrivCity" type="text" class="validateCity" pattern="^[a-zA-Z\d\-'`]+(\s[a-zA-Z\-'`]+)?">
                            <label style="color:gray" for=" City"><b>*City/Municipality </b></label>
                        </div>


                        <div style="color:black" class="input-field col s4">
                            <input id="addCustPrivProvince" name="addCustPrivProvince" type="text" class="validateProvince" pattern="^[a-zA-Z\d\-'`]+(\s[a-zA-Z\-'`]+)?">
                            <label style="color:gray" for=" Province"><b>Province/Region </b></label>
	                    </div>

                        <div style="color:black" class="input-field col s4">
                            <input id="addCustPrivZipCode" name="addCustPrivZipCode" type="text" class="" pattern="0-9]+$">
                            <label style="color:gray" for=" Zip Code"><b>Zip Code </b></label>
	                    </div>
	                </div>

	                <span class="col s12" style="color:teal; margin-top:20px"><b>Company Contact Information</b></span>
                    <div class="card-panel col s12" style="border:3px solid gray; padding:15px">
	                    <div style="color:black" class="input-field col s12">
                            <input required id="addEmail" name = "addEmail" type="email" class="validate">
                            <label style="color:gray" for="email"><b> *Company Email Address </b></label>
                        </div>

                        <div style="color:black" class="input-field col s6">
                            <input required id="addCel" name = "addCel" type="text" class="validateCell" pattern="^[0-9]{11,11}$" maxlength="11">
                            <label style="color:gray" for="cellphone"><b> *Cellphone Number </b></label>
                        </div>

                        <div style="color:black" class="input-field col s6">
                            <input id="addCelAlt" name = "addCelAlt" type="text" class="validateCellAlt" maxlength="11" pattern="^[0-9]{11,11}$">
                            <label style="color:gray" for="cellphone"><b> Cellphone Number (alternate)</b></label>
                        </div>

                        <div style="color:black" class="input-field col s6">
                            <input id="addPhone" name = "addPhone" type="text" class="validatePhone" maxlength="10" pattern="^[0-9]{6,10}$">
                            <label style="color:gray" for="tel"><b> Telephone Number </b></label>
                        </div>

                        <div style="color:black" class="input-field col s6">
                            <input id="addPhone" name = "addPhone" type="text" class="validatePhone" maxlength="10" pattern="^[0-9]{6,10}$">
                            <label style="color:gray" for="tel"><b> Fax Number </b></label>
                        </div>
                    </div>

                    </div>

					<!--Start of bottom button-->
					<div class="col s12" style="margin-top:30px">
						<a id="addPayment" href="#summary-of-order" class="right btn modal-trigger tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to save data and proceed to next step" style="margin-left:40px; background-color:teal; color:white"><b>Save and Proceed</b></a>
	            		<a id="cancelTransac" href="#cancel-order" class="right btn modal-trigger tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to cancel transaction and go back to homepage" style="background-color:#a7ffeb; color:black"><b>Cancel Transaction</b></a>
					</div>
					<!--End of bottom button-->

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

	<script>
		$(document).ready(function() {
		
			var a = {!! json_encode($packages) !!};
			var b = {!! json_encode($prices) !!};
			var c = {!! json_encode($quantity) !!};
			var totalTime = 0, totalPrice = 0.0;

			for(var i = 0; i < a.length; i++)
			{
				totalTime = totalTime + (a[i].intPackageMinDays * c[i]);
				totalPrice = totalPrice + b[i];
			}

			$('#totalTime').text(totalTime + " days");
			$('#totalPrice').text((totalPrice.toFixed(2)) + " PHP");

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