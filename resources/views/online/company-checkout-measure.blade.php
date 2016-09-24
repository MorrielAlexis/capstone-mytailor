@extends('layouts.masterOnline')

@section('content')




    	<div class="row" style="padding:30px">
        	<div class="col s12" style="padding-left:15%">
		        <ul class="breadcrumb">
					<li><a>1. Fill-up form</a></li>
					<li><a class="active" href="#measure-detail">2. Add measurement detail</a></li>
					<li><a>3. Payment</a></li>	
				</ul>
			</div>


			<!-- Tab for Adding Measurement Detail-->
	    <div id="measure-detail" class = "hue col s12" style="background-color: white; border:2px outset">
	        <div class="row">
		        <div class="col s12 m12 l12">
                	<span class="page-title" style="margin:15px"><center><h5><b>Measurement Detail</b></h5></center></span>
              		<div class="divider" style="height:1px; background-color:#80d8ff"></div>
              		<div class="divider" style="height:1px; background-color:#80d8ff"></div>
              	</div>
	       	</div>

	      


	       	<div class="row" style="background-color:white; margin-top:20px">
	       		<div class="container">
	            <div class="col s12"> 

	            	<div class="col s12">
		            	<!--Two ways to submit measurements-->
	                    <center><h4 style="margin-bottom:50px; color:teal"><b>Ways to submit measurements</b></h4></center>
	                    
	                    <!--First Way-->
	                    <div class="left col s5">	                    	
	                    		<center><img style="height:150px; width:150px" src="{{URL::to('img/temp-online.png')}}"></center>	                    	
	                    		<center><p><a href="{{ URL::to('transaction/walkin-company-measure-download-forms') }}" class="modal-trigger"><font size="+1">Acquire downloadable forms for taking measurements and send it through email</font></a></p></center>
	                    			
	                    </div>

	                    <!--Or-->
	                    <div class="col s2" style="margin-top:50px">
	                    	<center><h5><b>OR</b></h5></center>
	                    </div>

	                    <!--Second Way-->
	                    <div class="right col s5">	                    	
	                    		<center><img style="height:150px; width:150px" src="{{URL::to('img/temp-measure.png')}}"></center>	                    	
	                    		<center><p><a href="{{ URL::to('transaction/walkin-company-measure-add-employee-profile') }}" class="modal-trigger"><font size="+1">Provide a copy of the measurement of each employee to be inputted in the system</font></a></p></center>
	                    			<!-- <div id="upload-copy" class="modal modal-fixed-footer" style="height:300px; width:500px; margin-top:30px">
											<h5><font color="teal"><center><b>Upload File of Measurements</b></center></font></h5>
												
											
													<div class="divider" style="height:2px"></div>
													<div class="modal-content col s12">
														<br><br>
															<div class="file-field input-field col s12">
										                      <div style="color:white" class="btn tooltipped btn-small center-text teal" data-position="bottom" data-delay="50" data-tooltip="May upload jpg, png, gif, bmp, tif, tiff files">
										                        <span>Upload File</span>
										                        <input id="addFile" name="addFile" type="file" accept=".doc, .docx, .jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
										                      </div>
										                    
										                      <div class="file-path-wrapper">
										                        <input id="addFile" name="addFile" class="file-path validate" type="text" readonly="readonly">
										                      </div>
										                    </div>													
													</div>

													<div class="modal-footer col s12">
										                <a class="waves-effect waves-green btn-flat" href="{{URL::to('transaction/walkin-company-payment-measure-detail')}}"><font color="black">Save</font></a>
										                <a href="{{URL::to('/transaction/walkin-company-payment-measure-detail')}}" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">Cancel</font></a>
										            </div>
												
									</div> -->
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
									
				</div>-->
	        	</div>

                    		<a href="{{URL::to('transaction/walkin-company-payment-info')}}" class="right btn tooltipped" data-position="top" data-delay="50" data-tooltip="Click to go back to home and start shopping!" style="background-color:#1976d2; padding:9.5px; padding-bottom:45px; margin-top:80px; margin-right:60px"><label style="font-size:15px; color:white">Save and Go to Payment</label></a>
                    		<a href="#reset-order" class="left btn modal-trigger tooltipped" data-position="top" data-delay="50" data-tooltip="Transfers you back home and clears current unsaved transaction" style="background-color:#26a69a; padding:9.5px; padding-bottom:45px; margin-left:30px; margin-top:80px;"><label style="font-size:15px; color:white">Cancel Transaction</label></a>

						<!--Modal for Reset Order-->
						<div id="reset-order" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:120px;">
							<h5><font color="red"><center><b>Warning!</b></center></font></h5>	
							{!! Form::open(['url' => 'transaction/walkin-company-reset-order', 'method' => 'POST']) !!}
									<div class="divider" style="height:2px"></div>
									<div class="modal-content col s12">
										<div class="col s3">
											<i class="mdi-alert-error" style="font-size:50px; color:red"></i>
										</div>
										<div class="col s9">
											<p><font size="+1">Doing this will clear all orders made!</font></p>
										</div>
									</div>

									<div class="modal-footer col s12">
						                <button class="waves-effect waves-green btn-flat"><font color="black"><b>OK</b></font></button>
						                <a class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black"><b>Cancel</b></font></a>
						            </div>
						
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