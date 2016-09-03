@extends('layouts.master')

@section('content')


	<div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><center><h3><b>Welcome to <font color="white">MyTailor</font></b></h3></center></span>
        <center><h5>Walk-in Company</h5></center>
      </div>
    </div>

    <div class="row" style="padding:30px">
		
		<div class="col s12">
			<div id="payment-info" class = "hue col s12 active" style="background-color: white; border:2px outset">
		        <div class="row">
			        <div class="col s12 m12 l12">
	                	<span class="page-title" style="margin:15px; color:teal"><center><h5><b>Downloadable Forms</b></h5></center></span>
	              		<div class="divider" style="height:1px; background-color:#80d8ff"></div>
	              		<div class="divider" style="height:1px; background-color:#80d8ff"></div>
	              	</div>
		       	</div>

		       	<div class="row" style="background-color:white; padding:40px">
	            	<div class="col s12">
						
						<!-- <h1>HERE WILL BE THE LIST OF DOWNLOADABLE FORMS</h1> -->
						<!--List of Downloadable Forms-->
						<div class="col s12" style="margin-bottom:4%">
							<div class="col s6 z-depth-2" style="padding:2%; background-color:teal; opacity:0.80">
								<center><a href=""><img class="responsive-image z-depth-2" src="{{URL::to('imgMeasurementDetail/chest.png')}}" style="border:2px gray solid"></a></center>	                    	
		                    	<center><p><a href="#!" class="modal-trigger" style="color:white"><font size="+1"><u>Click to download PDF</u></font></a></p></center>
							</div>
							<div class="col s6" style="padding:3%;">
								<center><h5 style="color:teal">Uniform - Male Measurement Form</h5></center>
								<center><p>Click to see guide in taking measurements</p></center>
							</div>
						</div>

						<div class="col s12" style="margin-bottom:4%">
							<div class="col s6 z-depth-2" style="padding:2%; background-color:teal; opacity:0.80">
								<center><a href=""><img class="responsive-image z-depth-2" src="{{URL::to('imgMeasurementDetail/chest.png')}}" style="border:2px gray solid"></a></center>	                    	
		                    	<center><p><a href="#!" class="modal-trigger" style="color:white"><font size="+1"><u>Click to download PDF</u></font></a></p></center>
							</div>
							<div class="col s6" style="padding:3%;">
								<center><h5 style="color:teal">Uniform - Female Measurement Form</h5></center>
								<center><p>Click to see guide in taking measurements</p></center>
							</div>
						</div>
						<!--End of downloadable forms-->

						<div class="col s12">
							<div class="col s12"><div class="divider" style="height:2px; margin-bottom:2%"></div></div>
							<a href="{{URL::to('transaction/walkin-company-payment-measure-detail')}}" class="right btn tooltipped" data-position="top" data-delay="50" data-tooltip="Click to go back to measurement homepage!" style="background-color:#1976d2;"><label style="font-size:15px; color:white">Go Back</label></a>
						</div>
	            	</div> <!-- end of col s12 -->
	            </div> <!-- end of row -->
		    </div> 
				
		</div> <!-- end of col s12 -->

    </div> <!-- end of row -->

@stop

@section('scripts')