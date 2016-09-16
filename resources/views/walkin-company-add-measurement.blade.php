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
	                	<span class="page-title" style="margin:15px; color:teal"><center><h5><b>Employee Measurement Profile</b></h5></center></span>
	              		<div class="divider" style="height:1px; background-color:#80d8ff"></div>
	              		<div class="divider" style="height:1px; background-color:#80d8ff"></div>
	              	</div>
		       	</div>

		       	<div class="row" style="background-color:white; padding:40px">
	            	<div class="col s12">
						
						<!-- <h1>Search a company and list of employees will appear here</h1> -->
						<!--Employees List-->

						<div class="col s12">
							<center><h5 style="color:teal; margin-bottom:5%">List of Employees</h5></center>

							<table class="col s12" style="color:teal; margin-bottom:3%; border-top:1px lightgray solid">
								<thead>
									<tr>
										<th style="padding-left:5%">Employee Name</th>
										<th>Action</th>
									</tr>
								</thead>
							</table>
							
							@for($i = 0; $i < $total_quantity; $i++)
							<div class="col s12" style="margin-bottom:4%">
								<div class="col s6" style="padding-top:1%"><font size="4.5em" color="dimgray">{{ $employee_fname[$i] }} {{ $employee_mname[$i] }} {{ $employee_lname[$i] }}</font></div>
								<div class="col s5"><a style="color:white;" class="right modal-trigger btn tooltipped blue" data-position="bottom" data-delay="50" data-tooltip="Click to edit the set purchased" href="#edit-emp-data">Edit Measurement</a></div>
								<!--<div class="col s3"><a style="color:white;" class="right modal-trigger btn tooltipped red" data-position="bottom" data-delay="50" data-tooltip="Click to edit the set purchased" href="#edit-emp-data">Delete Employee</a></div>-->
								<div class="col s12"><div class="divider" style="margin-top:4%"></div></div>
							</div>
							@endfor
						</div>
						<!--End of Empployees List-->

						<div id="edit-emp-data" class="modal modal-fixed-footer" style="max-height:50%; max-width:60%">
							<h5><font color="teal"><center><b>Add Measurement Profile</b></center></font></h5>
							<div class="divider" style="height:2px"></div>
								
								<div class="modal-content col s12 overflow-x" style="padding-top:5%">
									<div class="col s12" style="background-color:#e0f2f1; padding:3%">
										<div class="col s9">
											<div class="col s5"><font size="+1"><b>EMPLOYEE NAME:</b></font></div>
											<div class="col s7"><font size="+1">Honey May Buenavides</font></div>
										</div>
										<div class="col s3">
											<div class="col s6">
												<b>Gender: </b>
											</div>
											<div class="col s6">
												Female
											</div>
										</div>
									</div>
									<div class="col s12"><div class="divider" style="height:2px; background-color:#e0f2f1"></div></div>

									<div class="col s12" style="margin-top:3%;">
										<div class="col s4"><p><b>Measurement Type</b></p></div>
										<div class="col s8">		
											<select class="browser-default" id = "measurement-category">
												<option value="standard-measure" class="circle">Standard Measurement</option>						
												<option value="body-measure" class="circle">Body Measurement</option>
												<option value="cloth-measure" class="circle">Clothing Measurement</option>
											</select>
										</div>
									</div>


									<div class="col s12" style="margin-top:3%; margin-bottom:5%; padding-left:3%; padding-right:3%">
											<div class="center col s6">
												<div class="right col s5">
												<right><p>Shoulder</p></right>
												</div>
												<div class="col s7">
												<input id="measure_name" type="text" class="validate">
												</div>
											</div>
											<div class="center col s6">
												<div class="right col s5">
												<right><p>Collar</p></right>
												</div>
												<div class="col s7">
												<input id="measure_name" type="text" class="validate">
												</div>
											</div>
											<div class="center col s6">
												<div class="right col s5">
												<right><p>Half Chest</p></right>
												</div>
												<div class="col s7">
												<input id="measure_name" type="text" class="validate">
												</div>
											</div>	
									</div>

								</div>
								<div class="modal-footer col s12">
									<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">No</font></a>
								</div>

						</div>

						<div class="col s12">
							<div class="col s12"><div class="divider" style="height:2px; margin-bottom:2%"></div></div>
							<a href="{{URL::to('transaction/walkin-company-payment-measure-detail')}}" class="left btn tooltipped" data-position="top" data-delay="50" data-tooltip="Click to go back to measurement homepage!" style="background-color:#1976d2; opacity:0.80"><label style="font-size:15px; color:white">Go Back</label></a>
						</div>

	            	</div> <!-- end of col s12 -->
	            </div> <!-- end of row -->
		    </div> <!-- end of payment info -->
				
		</div> <!-- end of col s12 -->

    </div> <!-- end of row -->

@stop

@section('scripts')

<script type="text/javascript">
	$(document).ready(function() {
	    $('select').material_select();
	  });       
</script>