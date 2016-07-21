@extends('layouts.master')

@section('content')

	<div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><center><h3><b>Welcome to <font color="white">MyTailor</font></b></h3></center></span>
        <center><h5>Walk-in Company - Customization Process</h5></center>
      </div>
    </div>

	<div class="row">
		<div class="col s12 m12 l12">

			<!-- CUSTOMIZING ORDER HERE -->
			<div class="col s12">
				<ul class="tabs transparent" style="margin-top:10px">
					<li class="tab col s12" style="border-top-left-radius: 20px; border-top-right-radius: 20px;"><a style="color:black; padding-top:5px; opacity:0.80" href="#shoppingCart"></a></li>	
					<div class="indicator white" style="z-index:1"></div>
	            </ul>
				<div class="card-panel">
					<div class="card-content">
						<div class="row">
						<div class="col s12">					

							<div class="col s12" style="margin-top:2px; padding-top:5px; margin-bottom:30px;">
						        <center><h4 style="color:teal"><b>Package: </b><font color="red">Men Set A</font><!--<a class="right btn-floating tooltipped btn-large blue" data-position="bottom" data-delay="50"  data-tooltip="CLick to print a receipt for current transaction" href="#!" style="color:black; margin-right:35px; margin-left: 20px;"><i class="large mdi-editor-mode-edit"></i></a>--></h4></center>
						        <center><p style="color:gray">All garments included in the set are listed below.</p></center>
						        <div class="divider" style="margin-bottom:5px; background-color:teal; height:2px"></div>
						    </div>   

						    <div class="col s6">
						    	<div class="container">
									<center><img src="{{URL::to('img/male-uniform-plain.jpg')}}" style="height:350px; width:350px; border: 3px gray solid"></center>
								</div>
							</div>

							<!--Modal for Choosing Design-->
							<div id="editDesign" class="modal modal-fixed-footer" style="width:1100px; height:600px">
								<h5><font color = "#1b5e20"><center>List of Available Designs</center> </font> </h5>
				                        <div class="divider" style="height:2px"></div>
				                        <div class="modal-content col s12">
										<span style="color:#ff8a80; margin-left:5px">Click on the part to be customized.</span>
										<!--Collapsible Accordion-->
										<!--This will be the "style categories" na ic-customize ni customer-->
										<!--Under each "style category" ay may mga segment pattern na pipiliin-->
										<!--Check maintenance for a better understanding. Under Garments-->
										<ul class="collapsible z-depth-2" data-collapsible="accordion" style="border:none">
										    <li style="margin-bottom:10px;">
										      	<div class="collapsible-header" style="background-color:#00838f; color:white; height:30px; padding-top:10px; padding-bottom:50px; font-size:18px"></div>
										      	<div class="collapsible-body overflow-x">
												      	<p style="color:gray; margin-left:20px">*Choose one of your desired design</p>
												      	
												      	<div class="col s6">
								                        	<div class="center col s2" style="margin-top:60px">
								                        		<input name="rdb-pattern" type="radio" class="filled-in" value = "" id="" />
								                        		<label for=""></label>
								                        	</div>
								                        	 <div class="col s10">
														        <div class="card-panel teal lighten-4 z-depth-1" style="height:200px">
														          <div class="row valign-wrapper">
														            <div class="center col s4">
														              <img src="#!" alt="" class="responsive-img">
														            </div>
														            <div class="col s6"> 
														              <span><b></b></span> <!-- This will be the name of the pattern -->
														              <br/>
														              <span class="black-text">
														              </span>
														            </div>
														          </div>
														        </div>
														     </div>
														</div>
														
										      	</div>
										    </li>
										  </ul>
									</div>										
									<!--End of Collapsible Accordion-->

									<div class="col s12" style="margin:20px"></div>

									<div class="modal-footer col s12">
			                          <a  class="right modal-action modal-close waves-effect waves-green btn-flat">OK</a>
			                          <a  class="right modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
			                        </div>
							</div>
							<!--End of modal for choosing design-->

							
							<!--Modal for choosing fabric-->
							<div id="editFabric" class="modal modal-fixed-footer" style="width:1100px; height:600px">
								<h5><font color = "#1b5e20"><center>List of Available Fabrics</center> </font> </h5>
	    
					                        <div class="divider" style="height:2px"></div>				
					                        <div class="modal-content col s12">
												<!--Select-->
												<div class="col s3"><!--fabric type-->
													<div class="input-field col s12">
															<select class = "fabric-type" id = "fabric-type">
																<option value="All" class="circle" selected>All</option>
																
																	<option value="">[Something here]</option>
																
															</select>
															<label><font size="3" color="gray">Fabric Type</font></label>
													</div>
												</div>

												<div class="col s3"><!--fabric color-->
													<div class="input-field col s12">
															<select class = "fabric-color" id = "fabric-color">
																<option value="All" class="circle" selected>All</option>
																
																	<option value="">[Something here]</option>
																
															</select>
															<label><font size="3" color="gray">Fabric Color</font></label>
													</div>
												</div>

												<div class="col s3"><!--fabric pattern-->
													<div class="input-field col s12">
															<select class = "fabric-pattern" id = "fabric-pattern">
																<option value="All" class="circle" selected>All</option>
																
																	<option value="">[Something here]</option>
																
															</select>
															<label><font size="3" color="gray">Fabric Pattern</font></label>
													</div>
												</div>

												<div class="col s3"><!--fabric thread count-->
													<div class="input-field col s12">
															<select class = "fabric-thread-count" id = "fabric-thread-count">
																<option value="All" class="circle" selected>All</option>
																
																	<option value=""></option>
																
															</select>
															<label><font size="3" color="gray">Fabric Thread Count</font></label>
													</div>
												</div>
												<!--end of select-->
												
												<div class="col s12" style="margin:20px">
													<div class="divider" style="height:2px gray solid"></div>
													<div class="divider" style="height:2px gray solid"></div>
												</div> 
												
												<p style="color:gray; margin-left:20px">*Choose one of your desired fabric</p>

												
					                        	
					                        	<div class="col s6">
					                        	<div class="center col s2" style="margin-top:60px">
					                        		<input name="garmentFabrics" type="radio" class="filled-in" value="" id="" />
					                        		<label for=""></label>
					                        	</div>
					                        	 <div class="col s10">
											        <div class="card-panel teal lighten-4 z-depth-1">
											          <div class="row valign-wrapper">
											            <div class="center col s4">
											              <img src="#!" alt="" class="responsive-img"> <!-- notice the "circle" class -->
											            </div>
											            <div class="col s6"> 
											              <p><b></b></p> <!-- This will be the name of the pattern -->
											              <span class="black-text">
											                
											              </span>
											            </div>
											          </div>
											        </div>
											      </div>
											      </div>
											
												
											<div class="col s12" style="margin:20px"></div>
											
											</div>
								
										<div class="modal-footer col s12">
				                          <a  class="right modal-action modal-close waves-effect waves-green btn-flat">OK</a>
				                          <a  class="right modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
				                        </div>
							</div>
	
							<!--End of Modal for choosing fabric-->



							<div class="col s6">
								<div class="col s6" style="margin-top:50px">
											<a style="color:white; margin-top:10px" class="modal-trigger btn tooltipped teal" data-position="bottom" data-delay="50" data-tooltip="Click to choose a segment pattern" href="#editDesign"><i class="mdi-content-content-cut" style="padding-right:10px"></i>Choose Design</a>
											
											<!--<div class="file-field input-field">
												<a style="color:black" class="modal-trigger btn tooltipped btn-floating teal" data-position="bottom" data-delay="50" data-tooltip="Click to choose a segment pattern" href="#editDesign"><i class="mdi-editor-mode-edit"></i></a>
													
												<div class="file-path-wrapper">
													<input class="file-path validate" type="text">
												</div>
											</div>-->
								</div>
								
								<div class="col s6" style="margin-top:50px;">
											<a style="color:white; margin-top:10px" class="modal-trigger btn tooltipped teal" data-position="bottom" data-delay="50" data-tooltip="Click to choose a fabric" href="#editFabric"><i class="mdi-maps-layers" style="padding-right:10px"></i>Choose Fabric</a>
											<!--<div class="file-field input-field">	
												<a style="color:black" class="modal-trigger btn tooltipped btn-floating teal" data-position="bottom" data-delay="50" data-tooltip="Click to choose a fabric" href="#editFabric"><i class="mdi-editor-mode-edit"></i></a>
                     								
												<div class="file-path-wrapper">
													<input class="file-path validate" type="text">
												</div>
											</div>-->
								</div>

								<!--Garment Description Here-->
								<div class="col s12" style="margin-top:10px; color:gray"><p>Garment description below:</p></div>
									<div class="col s12" style="margin-left:130px">
										<div class="col s4" style="color:teal;"><p><b>Garment Category:</b></p></div>
										<div class="col s8"><p>Uniform</p></div>

										<div class="col s4" style="color:teal;"><p><b>Garment Segment:</b></p></div>
										<div class="col s8"><p>Polo</p></div>

										<div class="col s4" style="color:teal;"><p><b>Price starts from:</b></p></div>
										<div class="col s8" style="color:red"><p>800.00 PHP</p></div>
									</div>
								</div>
							</div>
							<!--End of First Garment-->


							<div class="col s12">
								<div class="divider" style="margin-bottom:30px; height:3px"></div>
							</div>


						</div>

						<div class="col s12"><div class="divider" style="height:2px; margin-top:20px; margin-bottom:20px"></div></div>
						<div class="col s12">
							<a href="{{URL::to('transaction/walkin-company-catalogue-designs')}}" class="left btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Design the whole set once by choosing among the available designs in the catalogue" style="background-color:teal; color:white">Choose design from Catalogue</a>
							<a class="right waves-effect waves-green btn" style="background-color:teal; margin-left:80px; margin-right:30px" href="{{URL::to('transaction/walkin-company-customize-orders')}}">Save</a>
							<a href="{{URL::to('transaction/walkin-company-customize-orders')}}" class="right waves-effect waves-green btn" style="background-color:teal">Cancel</a>
						</div>

						<div class="col s12"><div class="divider" style="height:2px; margin-top:20px; margin-bottom:20px"></div></div>      	
				      		<center><p><font color="gray">End of order list wanting to purchase</font></p></center>
						
						</div>
					</div>
				</div>
			</div>


		</div>
	</div>


@stop

@section('scripts')

	<script>
		 $(document).ready(function(){
		    $('.collapsible').collapsible({
		      accordion : true // A setting that changes the collapsible behavior to expandable instead of the default accordion style
		    });
		  });
	</script>

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