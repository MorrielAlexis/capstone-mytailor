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
			<li><a style="padding-left:200px" href="{{URL::to('transaction/walkin-individual-bulk-orders-payment-customer-info')}}"><b>1.FILL-UP FORM</b></a></li>
			<li><a style="padding-left:200px" href="{{URL::to('transaction/walkin-individual-bulk-orders-payment-payment-info')}}"><b>2.PAYMENT</b></a></li>
			<li><a class="active" style="padding-left:200px" href="#measure-detail"><b>3.ADD MEASUREMENT DETAIL</b></a></li>
		</ul>

		<!-- Tab for Adding Measurement Detail-->
	    <div id="measure-detail" class = "hue col s12" style="background-color: white; border:2px outset">
	        <div class="row">
		        <div class="col s12 m12 l12">
                	<span class="page-title" style="margin:15px"><center><h5><b>Measurement Detail</b></h5></center></span>
              		<div class="divider" style="height:1px; background-color:#80d8ff"></div>
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
	       		<div class="col s12" style="font-size:15px; color:red; margin-top:10px; margin-bottom:50px; margin-left:30px">
						<a class="modal-trigger tooltipped" href="#add-new-fields-measure" data-position="right" data-delay="50" data-tooltip="Click to add more measurement fields to accomodate multiple customers in a single transaction"><u>Add another fields for measurement</u></a>
							<div id="add-new-fields-measure" class="modal modal-fixed-footer" style="height:400px; width:600px; margin-top:50px">
										
								{!! Form::open() !!}
										
								<div class="modal-content col s12">
									<div class="col s12">
										<div class="col s3" style="color:teal"><p>Category</p></div>
										<div class="col s3" style="color:black">
											<div class="input-field col s12">
												<select>
												    <option value="1" class="circle">Uniform</option>
												    <option value="2" class="circle">Suit</option>
												    <option value="3" class="circle">Gown</option>
												</select>
											</div>
										</div>

										<div class="col s3" style="color:teal"><p>Section</p></div>
										<div class="col s3" style="color:black">
											<div class="input-field col s12">
												<select>
												    <option value="1" class="circle">Top</option>
												    <option value="2" class="circle">Bottom</option>
												</select>
											</div>
										</div>

										<div class="col s12" style="margin-bottom:30px; height:3px; background-color:teal"><div class="divider"></div></div>

									<div class="col s12" style="margin-left:30px">
										<div class="col s6">
											<input type="checkbox" class="filled-in" id="shoulder"/>
			      							<label for="shoulder">Shoulder</label>
			      						</div>
			      						<div class="col s6">
											<input type="checkbox" class="filled-in" id="bust"/>
			      							<label for="bust">Bust</label>
			      						</div>
			      						<div class="col s6">
											<input type="checkbox" class="filled-in" id="waist"/>
			      							<label for="waist">Waist</label>
			      						</div>
			      						<div class="col s6">
											<input type="checkbox" class="filled-in" id="hip"/>
			      							<label for="hip">Hip</label>
			      						</div>
			      						<div class="col s6">
											<input type="checkbox" class="filled-in" id="armhole"/>
			      							<label for="armhole">Armhole</label>
			      						</div>
			      						<div class="col s6">
											<input type="checkbox" class="filled-in" id="circumference"/>
			      							<label for="circumference">Circumference</label>
			      						</div>
			      						<div class="col s6">
											<input type="checkbox" class="filled-in" id="length_sleeves"/>
			      							<label for="length_sleeves">Length of Sleeves</label>
			      						</div>
			      						<div class="col s6">
											<input type="checkbox" class="filled-in" id="length_polo"/>
			      							<label for="length_polo">Length of Polo</label>
			      						</div>
			      						<div class="col s6">
											<input type="checkbox" class="filled-in" id="neck"/>
			      							<label for="neck">Neck</label>
			      						</div>
			      						<div class="col s6">
											<input type="checkbox" class="filled-in" id="thigh"/>
			      							<label for="thigh">Thigh</label>
			      						</div>
			      						<div class="col s6">
											<input type="checkbox" class="filled-in" id="knee"/>
			      							<label for="knee">Knee</label>
			      						</div>
			      						<div class="col s6">
											<input type="checkbox" class="filled-in" id="cuffs"/>
			      							<label for="cuffs">Cuffs</label>
			      						</div>
			      						<div class="col s6">
											<input type="checkbox" class="filled-in" id="crotch"/>
			      							<label for="crotch">Crotch</label>
			      						</div>
			      						<div class="col s6">
											<input type="checkbox" class="filled-in" id="length"/>
			      							<label for="length">Length</label>
			      						</div>
			      					</div>
									</div>
								</div>

									<div class="modal-footer col s12">									
										<div class="col s12">
											<div class="col s4" style="padding-left:10px; color:red; padding-top:10px">
												<input type="checkbox" class="left filled-in" id="select-all"></input>
												<label for="select-all" style="color:red">Select All</label>
											</div>
											<div class="col s8">
												<a href="{{URL::to('transaction/walkin-individual-bulk-orders-measure-now')}}" class="right waves-effect waves-green btn-flat">Cancel</a>
							                	<a class="right waves-effect waves-green btn-flat" href="{{URL::to('transaction/walkin-individual-bulk-orders-measure-now')}}"><font color="black">OK</font></a>
							            	</div>
							            </div>
							        </div>
									{!! Form::close() !!}
						</div>	
				</div>

	       		<div class="container">
	            <div class="col s12"> 

		      		
	            	<div id="for_top" class="col s12" style="color:black">
	            		<h5><b>Parts to be measured</b></h5>
	            	   	<div style="color:black; padding-left:140px" class="input-field col s6">                 
                          <input value="" id="shoulder" name="shoulder" type="text" class="">
                          <label style="color:teal" for="shoulder">Shoulder: </label>
                        </div>
                        <div style="color:black; padding-left:140px" class="input-field col s6">                 
                          <input value="" id="bust" name="bust" type="text" class="">
                          <label style="color:teal" for="bust">Bust: </label>
                        </div>
                        <div style="color:black; padding-left:140px" class="input-field col s6">                 
                          <input value="" id="waist" name="waist" type="text" class="">
                          <label style="color:teal" for="waist">Waist: </label>
                        </div>
                        <div style="color:black; padding-left:140px" class="input-field col s6">                 
                          <input value="" id="hip" name="hip" type="text" class="">
                          <label style="color:teal" for="hip">Hip: </label>
                        </div>
                        <div style="color:black; padding-left:140px" class="input-field col s6">                 
                          <input value="" id="armhole" name="armhole" type="text" class="">
                          <label style="color:teal" for="armhole">Armhole: </label>
                        </div>
                        <div style="color:black; padding-left:140px" class="input-field col s6">                 
                          <input value="" id="circumference" name="circumference" type="text" class="">
                          <label style="color:teal" for="circumference">Circumference: </label>
                        </div>
                        <div style="color:black; padding-left:140px" class="input-field col s6">                 
                          <input value="" id="length_sleeves" name="length_sleeves" type="text" class="">
                          <label style="color:teal" for="length_sleeves">Length of Sleeves: </label>
                        </div>
                        <div style="color:black; padding-left:140px" class="input-field col s6">                 
                          <input value="" id="length_polo" name="length_polo" type="text" class="">
                          <label style="color:teal" for="length_polo">Length of Polo: </label>
                        </div>
                        <div style="color:black; padding-left:140px" class="input-field col s6">                 
                          <input value="" id="neck" name="neck" type="text" class="">
                          <label style="color:teal" for="neck">Neck: </label>
                        </div>
                        <div style="color:black; padding-left:140px" class="input-field col s6">                 
                          <input value="" id="thigh" name="thigh" type="text" class="">
                          <label style="color:teal" for="thigh">Thigh: </label>
                        </div>
                        <div style="color:black; padding-left:140px" class="input-field col s6">                 
                          <input value="" id="knee" name="knee" type="text" class="">
                          <label style="color:teal" for="knee">Knee: </label>
                        </div>
                        <div style="color:black; padding-left:140px" class="input-field col s6">                 
                          <input value="" id="cuffs" name="cuffs" type="text" class="">
                          <label style="color:teal" for="cuffs">Cuffs: </label>
                        </div>
                        <div style="color:black; padding-left:140px" class="input-field col s6">                 
                          <input value="" id="crotch" name="crotch" type="text" class="">
                          <label style="color:teal" for="crotch">Crotch: </label>
                        </div>
                        <div style="color:black; padding-left:140px" class="input-field col s6">                 
                          <input value="" id="length" name="length" type="text" class="">
                          <label style="color:teal" for="length">Length: </label>
                        </div>
                    </div>


	            </div>
	        	</div>
                   

                    <div class="col s12">

                    	<div class="container">
                    		<p style="color:red">In case of multiple measurements</p>
                    	<div style="color:black;" class="input-field col s8">                 
                          <input value="" id="length" name="length" type="text" class="">
                          <label style="color:gray" for="length">Target Customer: </label>
                    	</div>

                    	<div style="color:gray" class="input-field col s4">                 
                          <select>
						    <option value="" disabled selected color="red">Sex</option>
						    <option value="1">Female</option>
						    <option value="2">Male</option>
						  </select>
                    	</div>
                    </div>
                    </div>

                    <div class="col s12"><div class="divider" style="height:5px; color:gray; margin-top:15px; margin-bottom:30px"></div></div>

                    	       		<div class="container">
	            <div class="col s12"> 

		      		
	            	<div id="for_top" class="col s12" style="color:black">
	            		<h5><b>Parts to be measured</b></h5>
	            	   	<div style="color:black; padding-left:140px" class="input-field col s6">                 
                          <input value="" id="shoulder" name="shoulder" type="text" class="">
                          <label style="color:teal" for="shoulder">Shoulder: </label>
                        </div>
                        <div style="color:black; padding-left:140px" class="input-field col s6">                 
                          <input value="" id="bust" name="bust" type="text" class="">
                          <label style="color:teal" for="bust">Bust: </label>
                        </div>
                        <div style="color:black; padding-left:140px" class="input-field col s6">                 
                          <input value="" id="waist" name="waist" type="text" class="">
                          <label style="color:teal" for="waist">Waist: </label>
                        </div>
                        <div style="color:black; padding-left:140px" class="input-field col s6">                 
                          <input value="" id="hip" name="hip" type="text" class="">
                          <label style="color:teal" for="hip">Hip: </label>
                        </div>
                        <div style="color:black; padding-left:140px" class="input-field col s6">                 
                          <input value="" id="armhole" name="armhole" type="text" class="">
                          <label style="color:teal" for="armhole">Armhole: </label>
                        </div>
                        <div style="color:black; padding-left:140px" class="input-field col s6">                 
                          <input value="" id="circumference" name="circumference" type="text" class="">
                          <label style="color:teal" for="circumference">Circumference: </label>
                        </div>
                        <div style="color:black; padding-left:140px" class="input-field col s6">                 
                          <input value="" id="length_sleeves" name="length_sleeves" type="text" class="">
                          <label style="color:teal" for="length_sleeves">Length of Sleeves: </label>
                        </div>
                        <div style="color:black; padding-left:140px" class="input-field col s6">                 
                          <input value="" id="length_polo" name="length_polo" type="text" class="">
                          <label style="color:teal" for="length_polo">Length of Polo: </label>
                        </div>
                        <div style="color:black; padding-left:140px" class="input-field col s6">                 
                          <input value="" id="neck" name="neck" type="text" class="">
                          <label style="color:teal" for="neck">Neck: </label>
                        </div>
                        <div style="color:black; padding-left:140px" class="input-field col s6">                 
                          <input value="" id="thigh" name="thigh" type="text" class="">
                          <label style="color:teal" for="thigh">Thigh: </label>
                        </div>
                        <div style="color:black; padding-left:140px" class="input-field col s6">                 
                          <input value="" id="knee" name="knee" type="text" class="">
                          <label style="color:teal" for="knee">Knee: </label>
                        </div>
                        <div style="color:black; padding-left:140px" class="input-field col s6">                 
                          <input value="" id="cuffs" name="cuffs" type="text" class="">
                          <label style="color:teal" for="cuffs">Cuffs: </label>
                        </div>
                        <div style="color:black; padding-left:140px" class="input-field col s6">                 
                          <input value="" id="crotch" name="crotch" type="text" class="">
                          <label style="color:teal" for="crotch">Crotch: </label>
                        </div>
                        <div style="color:black; padding-left:140px" class="input-field col s6">                 
                          <input value="" id="length" name="length" type="text" class="">
                          <label style="color:teal" for="length">Length: </label>
                        </div>
                    </div>


	            </div>
	        	</div>
                   

                    <div class="col s12">

                    	<div class="container">
                    		<p style="color:red">In case of multiple measurements</p>
                    	<div style="color:black;" class="input-field col s8">                 
                          <input value="" id="length" name="length" type="text" class="">
                          <label style="color:gray" for="length">Target Customer: </label>
                    	</div>

                    	<div style="color:gray" class="input-field col s4">                 
                          <select>
						    <option value="" disabled selected color="red">Sex</option>
						    <option value="1">Female</option>
						    <option value="2">Male</option>
						  </select>
                    	</div>
                    </div>
                    </div>


                    <div class="col s12"><div class="divider"></div></div>
                    <a href="{{URL::to('transaction/walkin-individual')}}" class="right btn tooltipped" data-position="top" data-delay="50" data-tooltip="Transfers you back home and clears current unsaved transaction" style="background-color:teal; padding:9.5px; padding-bottom:45px; margin-right:50px; margin-top:20px; color:white">Cancel Transaction</a>
                    <a href="#save-transaction" class="right modal-trigger btn tooltipped" data-position="top" data-delay="50" data-tooltip="Click to save measurement information and go back to shop" style="background-color:teal; margin-right:50px; padding:9.5px; padding-bottom:45px; margin-top:20px; color:white"><!--<i class="mdi-action-done"> -->Save Measurements<!--</i>--></a>
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
							                <a class="waves-effect waves-green btn-flat" href="{{URL::to('transaction/walkin-individual-bulk-orders-measure-now')}}"><font color="white">OK</font></a>
							            </div>
									{!! Form::close() !!}
						</div>



	        </div>

	        <div class="divider" style="height:2px; margin-bottom:20px; margin-top:50px"></div>
	      	
	      		<center><p><font color="gray">End of Measurement Form</font></p></center>
	

	    </div>
	    <!-- End of Tab for Adding Measurement Detail-->

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