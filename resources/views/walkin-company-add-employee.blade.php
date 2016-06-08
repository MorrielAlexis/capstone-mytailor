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
							<span class="page-title" style="margin-top:15px"><center><h4 style="color:teal"><b>Employees Information</b></h4></center></span>
							<center><p style="color:gray">(Add necessary detail about the company's employees and distinguish which package suits which.)</p></center>
							<div class="divider" style="height:3.5px; background-color:teal; margin-bottom:80px"></div>

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
								      
								      <option value="1">Men Set A</option>	
								      <option value="2">Women Set A</option>
								      <option value="3">Unisex Set A</option>
								    </select>
								    <label>Choose a package</label>
								</div>

								<div class="col s1">
								<a style="color:black; margin-top:15px" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to remove employee data from list" href="#removeOrder"><i class="mdi-navigation-close"></i></a>
								<div id="removeOrder" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:150px">
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
							</div>
							</div>

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
								      
								      <option value="1">Men Set A</option>	
								      <option value="2">Women Set A</option>
								      <option value="3">Unisex Set A</option>
								    </select>
								    <label>Choose a package</label>
								</div>

								<div class="col s1">
								<a style="color:black; margin-top:15px" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to remove employee data from list" href="#removeOrder"><i class="mdi-navigation-close"></i></a>
								<div id="removeOrder" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:150px">
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
							</div>
							</div>

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
								      
								      <option value="1">Men Set A</option>	
								      <option value="2">Women Set A</option>
								      <option value="3">Unisex Set A</option>
								    </select>
								    <label>Choose a package</label>
								</div>

								<div class="col s1">
								<a style="color:black; margin-top:15px" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to remove employee data from list" href="#removeOrder"><i class="mdi-navigation-close"></i></a>
								<div id="removeOrder" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:150px">
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
							</div>
							</div>

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
								      
								      <option value="1">Men Set A</option>	
								      <option value="2">Women Set A</option>
								      <option value="3">Unisex Set A</option>
								    </select>
								    <label>Choose a package</label>
								</div>

								<div class="col s1">
								<a style="color:black; margin-top:15px" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to remove employee data from list" href="#removeOrder"><i class="mdi-navigation-close"></i></a>
								<div id="removeOrder" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:150px">
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
							</div>
							</div>

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
								      
								      <option value="1">Men Set A</option>	
								      <option value="2">Women Set A</option>
								      <option value="3">Unisex Set A</option>
								    </select>
								    <label>Choose a package</label>
								</div>

								<div class="col s1">
								<a style="color:black; margin-top:15px" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to remove employee data from list" href="#removeOrder"><i class="mdi-navigation-close"></i></a>
								<div id="removeOrder" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:150px">
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
							</div>
							</div>

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
								      
								      <option value="1">Men Set A</option>	
								      <option value="2">Women Set A</option>
								      <option value="3">Unisex Set A</option>
								    </select>
								    <label>Choose a package</label>
								</div>

								<div class="col s1">
								<a style="color:black; margin-top:15px" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to remove employee data from list" href="#removeOrder"><i class="mdi-navigation-close"></i></a>
								<div id="removeOrder" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:150px">
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
							</div>
							</div>

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
								      
								      <option value="1">Men Set A</option>	
								      <option value="2">Women Set A</option>
								      <option value="3">Unisex Set A</option>
								    </select>
								    <label>Choose a package</label>
								</div>

								<div class="col s1">
								<a style="color:black; margin-top:15px" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to remove employee data from list" href="#removeOrder"><i class="mdi-navigation-close"></i></a>
								<div id="removeOrder" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:150px">
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
							</div>
							</div>

						
						<div class="col s12"><div class="divider" style="margin-bottom:20px; margin-top:20px"></div></div>
		                <a href="{{URL::to('transaction/walkin-company-payment-measure-detail')}}" class="left" style="color:teal; font-size:20px; margin-left:15px"><u>I will do this later<u></a>
		                <a class="right waves-effect waves-green btn" href="{{URL::to('transaction/walkin-company-payment-measure-detail')}}" style="background-color:teal; margin-left:60px; margin-right:60px"><font color="white">Save</font></a>
		                <a href="{{URL::to('transaction/walkin-company-payment-measure-detail')}}" class="right modal-action modal-close waves-effect waves-green btn" style="background-color:teal"><font color="white">Cancel</font></a>
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