@extends('layouts.master')

@section('content')


	<div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><center><h3><b>Welcome to <font color="white">MyTailor</font></b></h3></center></span>
        <center><h5>Walk-in Company - Add Employees</h5></center>
      </div>
    </div>

    <div class="row">
		<div class="col s12 m12 l12">

			<div class="col s12">
				<ul class="tabs transparent" style="margin-top:15px">
					<li class="tab col s12" style="border-top-left-radius: 20px; border-top-right-radius: 20px; background-color: #00b0ff;"><a style="color:black; padding-top:5px; opacity:0.80" href="#shoppingCart"></a></li>	
					<div class="indicator white" style="z-index:1"></div>
	            </ul>
				<div id="add-employees" class="card-panel">
					<div class="card-content">
						<div class="row">
							<span class="page-title" style="margin-top:15px"><center><h4 style="color:teal"><b>Company Employees Information</b></h4></center></span>
							<center><p style="color:gray">(Add necessary detail about the company's employees and distinguish which package suits which.)</p></center>
							<div class="divider" style="height:3.5px; background-color:teal; margin-bottom:40px"></div>

							<div class="col s12" style="border-bottom:2px white outset; padding:10px; margin-bottom:40px;">
								<div style="color:gray" class="right col s5"> 
									<div class="col s7"><p style="color:gray; font-size:15px; margin-top:20px"><b>Input no. of employees to add:</b></p></div>                
				                  	<div class="col s2"><input class="" name="emp-num" id="emp-num" type="number" value="" style="padding:5px; margin-top:5px; border:2px teal solid"></div>
				                  	<div class="col s3"><a href="" class="btn" style="background-color:teal; color:white; margin-top:15px">Add</a></div>
				                </div>				         
				            </div>

							<!--Employee Information starts here-->
							<div class="col s12" style="margin-bottom:30px">
								<div class="input-field col s3">
						          <input id="first_name" type="text" class="validate">
						          <label for="first_name">First Name</label>
						        </div>

						        <div class="input-field col s3">
						          <input id="last_name" type="text" class="validate">
						          <label for="last_name">Last Name</label>
						        </div>

						        <div class="input-field col s1">
						          <input id="middle_initial" type="text" class="validate">
						          <label for="middle_initial">M.I</label>
						        </div>

						        <div class="input-field col s1">
								    <select>
								      
								      <option value="1">F</option>
								      <option value="2">M</option>
								    </select>
								    <label>Sex</label>
								</div>

								<div class="input-field col s3">
								    <select>
								      
								      <option value="1"></option>	
								    </select>
								    <label>Choose a set</label>
								</div>

								<div class="col s1">
								<a style="color:white; margin-top:18px" class="modal-trigger btn tooltipped blue" data-position="bottom" data-delay="50" data-tooltip="Click to edit the set purchased" href="#edit-emp-data"><i class="mdi-editor-mode-edit"></i></a>
								
								<!--Modal for editing employee data-->
								<div id="edit-emp-data" class="modal modal-fixed-footer" style="width:70%; height:80%">
									<h5><font color="teal"><center><b>Employee Data</b></center></font></h5>
									<div class="divider" style="height:2px"></div>
									{!! Form::open() !!}
									<div class="modal-content col s12" style="padding-bottom:10%">

										<div class="col s12" style="font-size:1.2em">
											<div class="left col s7"><p style="color:dimgray"><b>Employee Name:</b> <font color="teal" style="padding-left:5%"><i>Honey May Buenavides</i></font></p></div>
											<div class="right col s3"><p style="color:dimgray"><b>Sex:</b> <font color="teal" style="padding-left:5%"><i>Female</i></font></p></div>
										</div>

										<div class="col s12"><div class="divider" style="height:4px"></div></div>

										<div class="col s12">
											<div class="col s12" style="font-size:1.5em"><p>Package Availed: <font color="red" style="padding-left:5%"><b><i>Generic FA</i></b></font></p></div>
											<div class="col s12 z-depth-1">
												<table class = "table centered" border = "1">
													<thead>
														<tr>
															<th>Item</th>
															<th>Image</th>
															<th>Quantity</th>
															<th style="color:gray">Add or Edit</th>												
														</tr>
													</thead>

													<tbody>
														<tr>
															<td>Uniform, Skirt</td>
															<td><img src="../img/female-uniform-skirt.jpg"/></td>
															<td>1</td>
															<td><a class="modal-trigger tooltipped" data-position="bottom" data-delay="50" data-tooltip="Add or edit quantity of this garment" href="#add-edit">Add/Edit</a></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>

									</div>
									

									<div class="modal-footer col s12">
						                <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">Save</font></button>
						                <a href="#" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">Cancel</font></a>	
						            </div>
									{!! Form::close() !!}
								</div>
								<!--End of modal for editing employee data-->

								<!--Modal for add-edit -->
										<div id="add-edit" class="modal modal-fixed-footer" style="width:35%; height:45%; margin-top:5%">
											<h5><font color = "#1b5e20"><center>Add / Edit Quantity</center> </font> </h5>
				                        	<div class="divider" style="height:2px"></div>

											<div class="modal-content col s12">

												<div class="col s8"  style="padding-left:40px; padding-right:40px">
													<div class="col s6"><img src="../img/female-uniform-skirt.jpg"/></div>
													<div class="col s6" style="margin-top:10%"><p>Uniform, Skirt</p></div>
												</div>

												<div class="col s4" style="padding-right:40px; margin-left:0">
													<input class="" name="add-garment" id="add-garment" type="number" value="" style="margin-top:20px" placeholder="How many?">
												</div>

											</div>


											<div class="modal-footer col s12">
								                <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">Save</font></button>
								                <a href="#" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">Cancel</font></a>	
								            </div>

										</div>
										<!--End of modal for add-edit -->


										<!--Modal for remove-->
										<!-- <div id="remove" class="modal modal-fixed-footer" style="width:45%; height:45%; margin-top:5%">
											<h5><font color = "#1b5e20"><center>Remove from Purchased Set</center> </font> </h5>
				                        	<div class="divider" style="height:2px"></div>

											<div class="modal-content col s12" style="padding-left:40px; padding-right:40px">
												<div class="col s4">
													<i class="mdi-alert-warning" style="font-size:70px; color:red"></i>
												</div>
												<div class="col s8">
													<p><font size="+1" color="red">Are you sure to remove this order from your purchased set?</font></p>
												</div>

											</div>

											<div class="modal-footer col s12">
								                <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">Yes</font></button>
								                <a href="#" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">No</font></a>	
								            </div>

										</div> -->
										<!--End of modal for remove-->



								<!--Modal for removing employee-->
								<!--
								<div id="removeEmp" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:150px">
									<h5><font color="red"><center><b>Warning!</b></center></font></h5>
										
										{!! Form::open() !!}
											<div class="divider" style="height:2px"></div>
											<div class="modal-content col s12">
												<div class="col s3">
													<i class="mdi-alert-warning" style="font-size:50px; color:red"></i>
												</div>
												<div class="col s9">
													<p><font size="+1">Are you sure to remove this order from cart?</font></p>
												</div>
											</div>

											<div class="modal-footer col s12" style="background-color:red; opacity:0.85">
								                <button type="submit" class="waves-effect waves-green btn-flat" href="#!"><font color="black">Yes</font></button>
								                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">No</font></a>
								            </div>
										{!! Form::close() !!}
								</div>
								-->
								<!--End of modal for removing employees-->


							</div>
							</div>
							<!--Employee Information ends here-->
						
						<div class="col s12"><div class="divider" style="margin-bottom:20px; margin-top:20px"></div></div>
		                <a class="right waves-effect waves-green btn" href="{{URL::to('transaction/walkin-company-show-order')}}" style="background-color:teal; margin-right:10px"><font color="white">Save</font></a>
		                <a href="{{URL::to('transaction/walkin-company-show-order')}}" class="left modal-action modal-close waves-effect waves-green btn" style="background-color:teal; margin-left:10px;"><font color="white">Cancel</font></a>
		            	</div>
		            </div>

				</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@stop

@section('scripts')

	<script type="text/javascript">
	  $('.modal-trigger').leanModal({
	      dismissible: true, // Modal can be dismissed by clicking outside of the modal
	      opacity: 1, // Opacity of modal background
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