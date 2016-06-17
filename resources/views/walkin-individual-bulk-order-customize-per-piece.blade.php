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

							<div class="col s6" style="margin-bottom:30px">
								<div class="col s6" style="margin-top:30px">
								<label>Choose your design:</label>
											<div class="file-field input-field">
												<a style="color:black" class="modal-trigger btn tooltipped btn-floating teal" data-position="bottom" data-delay="50" data-tooltip="Click to choose a segment pattern" href="#editDesign"><i class="mdi-editor-mode-edit"></i></a>
													<div id="editDesign" class="modal modal-fixed-footer">
														<h5><font color = "#1b5e20"><center>List of Available Designs</center> </font> </h5>
                        
									                      {!! Form::open() !!} 
									                        <div class="divider" style="height:2px"></div>
									                        <div class="modal-content col s12">
									                        	<div class="col s1" style="margin-top:60px">
									                        		<input name="garmentDesigns" type="radio" class="filled-in" id="pattern1" />
									                        		<label for="pattern1"></label>
									                        	</div>
									                        	 <div class="col s11">
															        <div class="card-panel grey lighten-5 z-depth-1">
															          <div class="row valign-wrapper">
															            <div class="col s4">
															              <img src="#!" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
															            </div>
															            <div class="col s7"> 
															              <p>STRAIGHT-CUT</p> <!-- This will be the name of the pattern -->
															              <span class="black-text">
															                This is a square image. Add the "circle" class to it to make it appear circular.
															              </span>
															            </div>
															          </div>
															        </div>
															      </div>

															    <div class="col s1" style="margin-top:60px">
									                        		<input name="garmentDesigns" type="radio" class="filled-in" id="pattern2" />
									                        		<label for="pattern2"></label>
									                        	</div>
															      <div class="col s11">
															        <div class="card-panel grey lighten-5 z-depth-1">
															          <div class="row valign-wrapper">
															            <div class="col s4">
															              <img src="#!" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
															            </div>
															            <div class="col s7">
															            	<p>SPECIAL PATTERN</p>
															              <span class="black-text">
															                This is a square image. Add the "circle" class to it to make it appear circular.
															              </span>
															            </div>
															          </div>
															        </div>
															      </div>


															    <div class="col s1" style="margin-top:60px">
									                        		<input name="garmentDesigns" type="radio" class="filled-in" id="pattern3" />
									                        		<label for="pattern3"></label>
									                        	</div>
															      <div class="col s11">
															        <div class="card-panel grey lighten-5 z-depth-1">
															          <div class="row valign-wrapper">
															            <div class="col s4">
															              <img src="#!" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
															            </div>
															            <div class="col s7">
															            	<p>JUST ANOTHER PATTERN</p>
															              <span class="black-text">
															                This is a square image. Add the "circle" class to it to make it appear circular.
															              </span>
															            </div>
															          </div>
															        </div>
															      </div>
															<div style="margin:570px"></div>
															</div>


														<div class="modal-footer col s12">
															<a href="{{URL::to('transaction/walkin-company-catalogue-designs')}}" class="left btn-flat" style="background-color:teal; color:white">Check designs from catalogue</a>
								                          	<a href="{{URL::to('transaction/walkin-individual-bulk-orders-customize-per-piece')}}" class="right waves-effect waves-green btn-flat">OK</a>
								                          	<a href="{{URL::to('transaction/walkin-individual-bulk-orders-customize-per-piece')}}" class="right modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
								                        </div>
									                      {!! Form::close() !!}
													</div>
												<div class="file-path-wrapper">
													<input class="file-path validate" type="text">
												</div>
											</div>
								</div>
								
								<div class="col s6" style="margin-top:30px;">
								<label>Choose your fabric:</label>
											<div class="file-field input-field">	
												<a style="color:black" class="modal-trigger btn tooltipped btn-floating teal" data-position="bottom" data-delay="50" data-tooltip="Click to choose a fabric" href="#editFabric"><i class="mdi-editor-mode-edit"></i></a>
                     								<div id="editFabric" class="modal modal-fixed-footer">
                     								<h5><font color = "#1b5e20"><center>List of Available Fabrics</center> </font> </h5>
                        
									                      {!! Form::open() !!} 
									                        <div class="divider" style="height:2px"></div>
									                        <div class="modal-content col s12">
									                        	<div class="col s1" style="margin-top:60px">
									                        		<input name="garmentFabrics" type="radio" class="filled-in" id="fabric1" />
									                        		<label for="fabric1"></label>
									                        	</div>
									                        	 <div class="col s11">
															        <div class="card-panel grey lighten-5 z-depth-1">
															          <div class="row valign-wrapper">
															            <div class="col s4">
															              <img src="#!" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
															            </div>
															            <div class="col s7"> 
															              <p>COTTON CHENES</p> <!-- This will be the name of the pattern -->
															              <span class="black-text">
															                This is a square image. Add the "circle" class to it to make it appear circular.
															              </span>
															            </div>
															          </div>
															        </div>
															      </div>

															    <div class="col s1" style="margin-top:60px">
									                        		<input name="garmentFabrics" type="radio" class="filled-in" id="fabric2" />
									                        		<label for="fabric2"></label>
									                        	</div>
															      <div class="col s11">
															        <div class="card-panel grey lighten-5 z-depth-1">
															          <div class="row valign-wrapper">
															            <div class="col s4">
															              <img src="#!" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
															            </div>
															            <div class="col s7">
															            	<p>REGULAR COTTON</p>
															              <span class="black-text">
															                This is a square image. Add the "circle" class to it to make it appear circular.
															              </span>
															            </div>
															          </div>
															        </div>
															      </div>


															    <div class="col s1" style="margin-top:60px">
									                        		<input name="garmentFabrics" type="radio" class="filled-in" id="fabric3" />
									                        		<label for="fabric3"></label>
									                        	</div>
															      <div class="col s11">
															        <div class="card-panel grey lighten-5 z-depth-1">
															          <div class="row valign-wrapper">
															            <div class="col s4">
															              <img src="#!" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
															            </div>
															            <div class="col s7">
															            	<p>REMARKABLE COTTON</p>
															              <span class="black-text">
															                This is a square image. Add the "circle" class to it to make it appear circular.
															              </span>
															            </div>
															          </div>
															        </div>
															      </div>
															<div style="margin:570px"></div>
															</div>


														<div class="modal-footer col s12">
								                          <a href="{{URL::to('transaction/walkin-individual-bulk-orders-customize-per-piece')}}" class="waves-effect waves-green btn-flat">OK</a>
								                          <a href="{{URL::to('transaction/walkin-individual-bulk-orders-customize-per-piece')}}" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
								                        </div>
									                      {!! Form::close() !!}
													</div>
												<div class="file-path-wrapper">
													<input class="file-path validate" type="text">
												</div>
											</div>
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

							<div class="col s6">
						    	<div class="container">
									<center><img src="{{URL::to('img/male-uniform-pants-plain.jpg')}}" style="height:350px; width:350px; border: 3px gray solid"></center>
								</div>
							</div>

							<div class="col s6" style="margin-bottom:30px">
								<div class="col s6" style="margin-top:30px">
								<label>Choose your design:</label>
											<div class="file-field input-field">
												<a style="color:black" class="modal-trigger btn tooltipped btn-floating teal" data-position="bottom" data-delay="50" data-tooltip="Click to choose a segment pattern" href="#editDesign"><i class="mdi-editor-mode-edit"></i></a>
													<div id="editDesign" class="modal modal-fixed-footer">
														<h5><font color = "#1b5e20"><center>List of Available Designs</center> </font> </h5>
                        
									                      {!! Form::open() !!} 
									                        <div class="divider" style="height:2px"></div>
									                        <div class="modal-content col s12">
									                        	<div class="col s1" style="margin-top:60px">
									                        		<input type="radio" class="filled-in" id="pattern1" />
									                        		<label for="pattern1"></label>
									                        	</div>
									                        	 <div class="col s11">
															        <div class="card-panel grey lighten-5 z-depth-1">
															          <div class="row valign-wrapper">
															            <div class="col s4">
															              <img src="#!" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
															            </div>
															            <div class="col s7"> 
															              <p>STRAIGHT-CUT</p> <!-- This will be the name of the pattern -->
															              <span class="black-text">
															                This is a square image. Add the "circle" class to it to make it appear circular.
															              </span>
															            </div>
															          </div>
															        </div>
															      </div>

															    <div class="col s1" style="margin-top:60px">
									                        		<input type="radio" class="filled-in" id="pattern2" />
									                        		<label for="pattern2"></label>
									                        	</div>
															      <div class="col s11">
															        <div class="card-panel grey lighten-5 z-depth-1">
															          <div class="row valign-wrapper">
															            <div class="col s4">
															              <img src="#!" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
															            </div>
															            <div class="col s7">
															            	<p>SPECIAL PATTERN</p>
															              <span class="black-text">
															                This is a square image. Add the "circle" class to it to make it appear circular.
															              </span>
															            </div>
															          </div>
															        </div>
															      </div>


															    <div class="col s1" style="margin-top:60px">
									                        		<input type="radio" class="filled-in" id="pattern3" />
									                        		<label for="pattern3"></label>
									                        	</div>
															      <div class="col s11">
															        <div class="card-panel grey lighten-5 z-depth-1">
															          <div class="row valign-wrapper">
															            <div class="col s4">
															              <img src="#!" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
															            </div>
															            <div class="col s7">
															            	<p>JUST ANOTHER PATTERN</p>
															              <span class="black-text">
															                This is a square image. Add the "circle" class to it to make it appear circular.
															              </span>
															            </div>
															          </div>
															        </div>
															      </div>
															<div style="margin:570px"></div>
															</div>


														<div class="modal-footer col s12">
															<a href="" class="left btn-flat" style="background-color:teal; color:white">Check designs from catalogue</a>
								                          	<a href="{{URL::to('transaction/walkin-individual-bulk-orders-customize-per-piece')}}" class="right waves-effect waves-green btn-flat">OK</a>
								                          	<a href="{{URL::to('transaction/walkin-individual-bulk-orders-customize-per-piece')}}" class="right modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
								                        </div>
									                      {!! Form::close() !!}
													</div>
												<div class="file-path-wrapper">
													<input class="file-path validate" type="text">
												</div>
											</div>
								</div>
								
								<div class="col s6" style="margin-top:30px;">
								<label>Choose your fabric:</label>
											<div class="file-field input-field">	
												<a style="color:black" class="modal-trigger btn tooltipped btn-floating teal" data-position="bottom" data-delay="50" data-tooltip="Click to choose a fabric" href="#editFabric"><i class="mdi-editor-mode-edit"></i></a>
                     								<div id="editFabric" class="modal modal-fixed-footer">
                     								<h5><font color = "#1b5e20"><center>List of Available Fabrics</center> </font> </h5>
                        
									                      {!! Form::open() !!} 
									                        <div class="divider" style="height:2px"></div>
									                        <div class="modal-content col s12">
									                        	<div class="col s1" style="margin-top:60px">
									                        		<input type="radio" class="filled-in" id="fabric1" />
									                        		<label for="fabric1"></label>
									                        	</div>
									                        	 <div class="col s11">
															        <div class="card-panel grey lighten-5 z-depth-1">
															          <div class="row valign-wrapper">
															            <div class="col s4">
															              <img src="#!" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
															            </div>
															            <div class="col s7"> 
															              <p>COTTON CHENES</p> <!-- This will be the name of the pattern -->
															              <span class="black-text">
															                This is a square image. Add the "circle" class to it to make it appear circular.
															              </span>
															            </div>
															          </div>
															        </div>
															      </div>

															    <div class="col s1" style="margin-top:60px">
									                        		<input type="radio" class="filled-in" id="fabric2" />
									                        		<label for="fabric2"></label>
									                        	</div>
															      <div class="col s11">
															        <div class="card-panel grey lighten-5 z-depth-1">
															          <div class="row valign-wrapper">
															            <div class="col s4">
															              <img src="#!" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
															            </div>
															            <div class="col s7">
															            	<p>REGULAR COTTON</p>
															              <span class="black-text">
															                This is a square image. Add the "circle" class to it to make it appear circular.
															              </span>
															            </div>
															          </div>
															        </div>
															      </div>


															    <div class="col s1" style="margin-top:60px">
									                        		<input type="radio" class="filled-in" id="fabric3" />
									                        		<label for="fabric3"></label>
									                        	</div>
															      <div class="col s11">
															        <div class="card-panel grey lighten-5 z-depth-1">
															          <div class="row valign-wrapper">
															            <div class="col s4">
															              <img src="#!" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
															            </div>
															            <div class="col s7">
															            	<p>REMARKABLE COTTON</p>
															              <span class="black-text">
															                This is a square image. Add the "circle" class to it to make it appear circular.
															              </span>
															            </div>
															          </div>
															        </div>
															      </div>
															<div style="margin:570px"></div>
															</div>


														<div class="modal-footer col s12">
								                          <a href="{{URL::to('transaction/walkin-individual-bulk-orders-customize-per-piece')}}" class="waves-effect waves-green btn-flat">OK</a>
								                          <a href="{{URL::to('transaction/walkin-individual-bulk-orders-customize-per-piece')}}" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
								                        </div>
									                      {!! Form::close() !!}
													</div>
												<div class="file-path-wrapper">
													<input class="file-path validate" type="text">
												</div>
											</div>
								</div>

								<!--Garment Description Here-->
								<div class="col s12" style="margin-top:10px; color:gray"><p>Garment description below:</p></div>
									<div class="col s12" style="margin-left:130px">
										<div class="col s4" style="color:teal;"><p><b>Garment Category:</b></p></div>
										<div class="col s8"><p>Uniform</p></div>

										<div class="col s4" style="color:teal;"><p><b>Garment Segment:</b></p></div>
										<div class="col s8"><p>Pants</p></div>

										<div class="col s4" style="color:teal;"><p><b>Price starts from:</b></p></div>
										<div class="col s8" style="color:red"><p>1,000.00 PHP</p></div>
									</div>
								</div>
							<!--End of Second Garment-->



						</div>

						<div class="col s12"><div class="divider" style="height:2px; margin-top:20px; margin-bottom:20px"></div></div>
						<div class="col s12">
							<a href="{{URL::to('transaction/walkin-individual-catalogue-designs')}}" class="left btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Design the whole set once by choosing among the available designs in the catalogue" style="background-color:teal; color:white">Choose design from Catalogue</a>
							<a class="right waves-effect waves-green btn" style="background-color:teal; margin-left:80px; margin-right:30px" href="{{URL::to('transaction/walkin-individual-bulk-orders-customize')}}">Save</a>
							<a href="{{URL::to('transaction/walkin-individual-bulk-orders-customize')}}" class="right waves-effect waves-green btn" style="background-color:teal">Cancel</a>
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