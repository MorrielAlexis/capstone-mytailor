@extends('layouts.master')

@section('content')

	<div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><center><h3><b>Welcome to <font color="white">MyTailor</font></b></h3></center></span>
        <center><h5>Walk-in Company - Order Process</h5></center>
      </div>
    </div>

	<div class="row">
		<div class="col s12 m12 l12">

			<div class="col s12">
				<ul class="tabs transparent" style="margin-top:15px">
					<li class="tab col s12" style="border-top-left-radius: 20px; border-top-right-radius: 20px; background-color: #00b0ff;"><a style="color:black; padding-top:5px; opacity:0.80" href="#shoppingCart"></a></li>	
					<div class="indicator white" style="z-index:1"></div>
	            </ul>
				<div id="shoppingCart" class="card-panel">
					<div class="card-content">
						<div class="row">
						<div class="col s12">
							<div class="col s6"><p>Choose your garment type</p></div>
							<div class="col s6">
								<div class="input-field col s12">
										<select>
										    <option value="1" data-icon="#!" class="circle">Uniform</option>
										    <option value="2" data-icon="#!" class="circle">Suit</option>
										    <option value="3" data-icon="#!" class="circle">Uniform</option>
										</select>
								</div>
							</div>
						</div>

						<div class="col s12" style="margin-bottom:20px">
							<div class="col s3">
		      							<label for="label"><font size="+0.5">Show garments for:</font></label>
		      				</div>
							<div class="col s3">
				          				<input type="checkbox" class="filled-in" id="male" />
		      							<label for="male">Male Only</label>
		      				</div>
		      				<div class="col s3">
				          				<input type="checkbox" class="filled-in" id="female" />
		      							<label for="female">Female Only</label>
		      				</div>
		      				<div class="col s3">
				          				<input type="checkbox" class="filled-in" id="all" checked/>
		      							<label for="all">All</label>
		      				</div>
						</div>

						<div class="divider"></div>

						<div class="col s12" style="margin-top:15px">
							<div class="divider" style="height:2px"></div>
							<div class="right modal-trigger btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to remove order" href="#resetOrder" style="margin-bottom:40px;  margin-top:10px; font-size:15px; color:black"><!--<i class="mdi-navigation-cancel" style="font-size:20px;">-->  Reset Order<!--</i>--></div>
									<div id="resetOrder" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:150px">
										<h5><font color="red"><center><b>Warning!</b></center></font></h5>	
										{!! Form::open() !!}
												<div class="divider" style="height:2px"></div>
												<div class="modal-content col s12">
													<div class="col s3">
														<i class="mdi-alert-error" style="font-size:50px; color:red"></i>
													</div>
													<div class="col s9">
														<p><font size="+1">Doing this will clear all orders made!</font></p>
													</div>
												</div>

												<div class="modal-footer col s12" style="background-color:red; opacity:0.85">
									                <button type="submit" class="waves-effect waves-green btn-flat" href="#!"><font color="black">OK</font></button>
									                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">Cancel</font></a>
									            </div>
											{!! Form::close() !!}
									</div>

						<div class="col s12">	
							<div class="col s4">
				          				<input type="checkbox" class="filled-in" id="polo" style="padding:5px"/>
		      							<label for="polo" ><font size="+1">Polo</font></label>
								<img src="{{URL::to('img/female-uniform-plain.jpeg')}}" style="height:170px; width:210px; padding-left:10px">
								<center><h6>Quantity</h6></center>
				                  <div class="row">
				                    <div class="col s3 center"><i class="small mdi-content-add-circle" style="color:teal"></i></div>
				                    <div class="input-field col s6" style="margin-top:-2px;">
				                      <input class="center" id="quantity" value="1" type="text" readonly>
				                    </div>
				                    <div class="col s3 center"><i class="small mdi-content-remove-circle" style="color:teal"></i></div>
				                  </div>
							</div>
							<div class="col s4">
										<input type="checkbox" class="filled-in" id="pants" style="padding:5px" />
		      							<label for="pants"><font size="+1">Pants</font></label>
								<img src="{{URL::to('img/male-uniform-pants-plain.jpg')}}" style="height:170px; width:210px; padding-left:10px">
								<center><h6>Quantity</h6></center>
				                  <div class="row">
				                    <div class="col s3 center"><i class="small mdi-content-add-circle" style="color:teal"></i></div>
				                    <div class="input-field col s6" style="margin-top:-2px;">
				                      <input class="center" id="quantity" value="1" type="text" readonly>
				                    </div>
				                    <div class="col s3 center"><i class="small mdi-content-remove-circle" style="color:teal"></i></div>
				                  </div>
							</div>
							<div class="col s4">
										<input type="checkbox" class="filled-in" id="shorts" style="padding:5px"/>
		      							<label for="shorts"><font size="+1">Shorts</font></label>
								<img src="{{URL::to('img/male-uniform-shorts-plain.jpg')}}" style="height:170px; width:200px; padding-left:10px">
								<center><h6>Quantity</h6></center>
				                  <div class="row">
				                    <div class="col s3 center"><i class="small mdi-content-add-circle" style="color:teal"></i></div>
				                    <div class="input-field col s6" style="margin-top:-2px;">
				                      <input class="center" id="quantity" value="1" type="text" readonly>
				                    </div>
				                    <div class="col s3 center"><i class="small mdi-content-remove-circle" style="color:teal"></i></div>
				                  </div>
							</div>
						</div>
					</div>

						<div class="col s12">
							<div class="divider"></div>
						</div>


						<div class="col s12">
							<div class="col s5">
									<a class="left btn-floating tooltipped teal modal-trigger" data-position="right" data-delay="50" data-tooltip="Click to add additional order to an existing package" href="#add-to-package" style="height:70px; width:70px; margin-top:20px; padding-top:15px; padding-left:1px;"><i class="mdi-av-queue" style="font-size:40px;"></i></a>	
										<div id="add-to-package" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:150px">
											<h5><font color="black"><center><b>Choose an existing package</b></center></font></h5>	
											{!! Form::open() !!}
													<div class="divider" style="height:2px"></div>
													<div class="modal-content col s12">
														<div class="col s12"  style="margin-top:20px">
											          			<input type="checkbox" class="filled-in" id="male" />
									      						<label for="package1">Package for Male</label>
									      				</div>
									      				<div class="col s12">
											          			<input type="checkbox" class="filled-in" id="female" />
									      						<label for="package2">Package for Female</label>
									      				</div>
													</div>

													<div class="modal-footer col s12">
										                <a class="waves-effect waves-green btn-flat" href="{{URL::to('transaction/walkin-company')}}"><font color="black">Add</font></button>
										                <a href="{{URL::to('transaction/walkin-company')}}" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">Cancel</font></a>
										            </div>
												{!! Form::close() !!}
										</div>
							</div>
								

							<div class="col s7">
								<a class="right btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to customize orders" style="margin-left:40px; margin-top:40px; font-size:15px; color:white; background-color: teal; opacity:0.90" href="{{URL::to('/transaction/walkin-company-customize-orders')}}"><!--<i class="mdi-editor-add" style="font-size:20px;">-->  Customize Orders<!--</i>--></a>
								<a href="#create-package" class="right btn modal-trigger tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to create a new package of orders " style="margin-top:40px; font-size:15px; background-color:teal; color:white"><!--<i class="mdi-editor-add" style="font-size:20px;">-->  Create New Package<!--</i>--></a>
									<div id="create-package" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:150px">
											
											{!! Form::open() !!}
													<div class="divider" style="height:2px"></div>
													<div class="modal-content col s12">
														<div class="input-field col s12" style="margin-top:40px;">
									                      <input class="center" id="package-name" value="" type="text">
									                      <label for="package-name">Create a name for this package</label>
									                    </div>
													</div>

													<div class="modal-footer col s12">
										                <a class="waves-effect waves-green btn-flat" href="{{URL::to('transaction/walkin-company')}}"><font color="black">OK</font></button>
										                <a href="{{URL::to('transaction/walkin-company')}}" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">Cancel</font></a>
										            </div>
												{!! Form::close() !!}
									</div>
							</div>
						</div>


					<div class="col s12">
						<div class="divider" style="height:2px; margin-top:50px"></div>      	
		      			<center><p><font color="gray">End of product list for MyTailor</font></p></center>
					</div>
				</div>
			</div>
			</div>


			
		</div>
	</div>

@stop

@section('scripts')

	<script>
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
		$('.tooltipped').tooltip({delay: 50});
	 });
	</script>

@stop