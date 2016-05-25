@extends('layouts.master')

@section('content')

	<div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><center><h3><b>Welcome to <font color="white">MyTailor</font></b></h3></center></span>
        <center><h5>Walk-in Individual - Customization of Orders</h5></center>
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
							<div class="col s12">
								
								<div class="col s6"><p><h5><b>Customize Orders Per Package</b></h5></p></div>
									<div class="right col s1"><a style="margin-top:15px; background-color:teal" type="submit" class="waves-effect waves-green btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to go back to ordering" href="{{URL::to('/transaction/walkin-company')}}"><i class="mdi-action-work" style="color:white; opacity:0.90; font-size:30px;"></i></a></div>
									<div class="right col s5"><a style="background-color:teal; margin-top:15px" type="submit" class="right waves-effect waves-green btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to proceed to payment of orders" href="{{URL::to('/transaction/walkin-company-payment-customer-info')}}"><font color="white" size="+1"><!--<i class="mdi-action-payment" style="font-size:20px;">  -->Proceed to Checkout<!--</i>--></font></a></div>				
							</div>
							
							<div class="divider" style="margin-bottom:30px"></div>
							<div class="divider" style="margin-bottom:30px"></div>
							<div class="divider" style="margin-bottom:20px; height:3px"></div>

							<div class="col s12" style="margin-top:2px; padding-top:5px; margin-bottom:30px;">
						        <center><h4 style="color:teal"><b>Package for Male</b><!--<a class="right btn-floating tooltipped btn-large blue" data-position="bottom" data-delay="50"  data-tooltip="CLick to print a receipt for current transaction" href="#!" style="color:black; margin-right:35px; margin-left: 20px;"><i class="large mdi-editor-mode-edit"></i></a>--></h4></center>
						        <div class="divider" style="margin-bottom:20px; background-color:teal; height:2px"></div>
						    </div>    
						    

							<div class="col s6">
							<a style="color:black" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to remove order" href="#removeOrder"><i class="mdi-navigation-close"></i></a>
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
								                <button class="waves-effect waves-green btn-flat" href="{{URL::to('transaction/walkin-company-ustomize-orders')}}"><font color="white">Yes</font></button>
								                <a href="{{URL::to('transaction/walkin-company-customize-orders')}}" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="white">No</font></a>
								            </div>
										{!! Form::close() !!}
								</div>
							<center><img src="{{URL::to('img/male-uniform-plain.jpg')}}" style="height:450px; width:450px;"></center>
								<center><label>Garment Category: Uniform</label></center>
								<center><label>Garment Segment: Polo</label></center>
								<center><label>Sex: Male</label></center>

                  			
							</div>

								<br>
								<div class="col s6">
								<div class="col s12" style="margin-top:90px">
								<label>Choose your design:</label>
											<div class="file-field input-field">
												<a style="color:black" class="modal-trigger btn tooltipped btn-floating teal" data-position="bottom" data-delay="50" data-tooltip="Click to choose a segment pattern" href="#editDesign"><i class="mdi-editor-mode-edit"></i></a>
													<div id="editDesign" class="modal modal-fixed-footer">
														<h5><font color = "#1b5e20"><center>Segment Patterns</center> </font> </h5>
                        
									                      {!! Form::open() !!} 
									                        <div class="divider" style="height:2px"></div>
									                        <div class="modal-content col s12">
									                        	<div class="col s1" style="margin-top:60px">
									                        		<input type="checkbox" class="filled-in" id="pattern1" />
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
									                        		<input type="checkbox" class="filled-in" id="pattern2" />
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
									                        		<input type="checkbox" class="filled-in" id="pattern3" />
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


														<div class="modal-footer col s12" style="background-color:#26a69a">
								                          <button type="submit" class="waves-effect waves-green btn-flat">OK</button>
								                          <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
								                        </div>
									                      {!! Form::close() !!}
													</div>
												<div class="file-path-wrapper">
													<input class="file-path validate" type="text">
												</div>
											</div>
								</div>
								
								<div class="col s12" style="margin-top:30px">
								<label>Choose your fabric:</label>
											<div class="file-field input-field">	
												<a style="color:black" class="modal-trigger btn tooltipped btn-floating teal" data-position="bottom" data-delay="50" data-tooltip="Click to choose a fabric" href="#editFabric"><i class="mdi-editor-mode-edit"></i></a>
                     								<div id="editFabric" class="modal modal-fixed-footer">
                     								<h5><font color = "#1b5e20"><center>Fabric</center> </font> </h5>
                        
									                      {!! Form::open() !!} 
									                        <div class="divider" style="height:2px"></div>
									                        <div class="modal-content col s12">
									                        	<div class="col s1" style="margin-top:60px">
									                        		<input type="checkbox" class="filled-in" id="fabric1" />
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
									                        		<input type="checkbox" class="filled-in" id="fabric2" />
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
									                        		<input type="checkbox" class="filled-in" id="fabric3" />
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


														<div class="modal-footer col s12" style="background-color:#26a69a">
								                          <button type="submit" class="waves-effect waves-green btn-flat">OK</button>
								                          <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
								                        </div>
									                      {!! Form::close() !!}
													</div>
												<div class="file-path-wrapper">
													<input class="file-path validate" type="text">
												</div>
											</div>
								</div>
							</div>
						

						<div class="col s12">
						<div class="divider" style="margin-bottom:30px; margin-top:30px; height:5px"></div>
					</div>

							<div class="col s6">
							<a style="color:black" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to remove order" href="#removeOrder"><i class="mdi-navigation-close"></i></a>
								<div id="removeOrder" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:150px">
									<h5><font color="red"><center><b>Warning!</b></center></font></h5>
										
										{!! Form::open() !!}
											<div class="divider" style="heightL2px"></div>
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
							<center><img src="{{URL::to('img/male-uniform-pants-plain.jpg')}}" style="height:450px; width:450px;"></center>
								<center><label>Garment Category: Uniform</label></center>
								<center><label>Garment Segment: Pants</label></center>
								<center><label>Sex: Male</label></center>

                  			
							</div>

								<br>
								<div class="col s6">
								<div class="col s12" style="margin-top:120px">
								<label>Choose your design:</label>
											<div class="file-field input-field">
												<a style="color:black" class="modal-trigger btn tooltipped btn-floating teal" data-position="bottom" data-delay="50" data-tooltip="Click to choose a segment pattern" href="#editDesign"><i class="mdi-editor-mode-edit"></i></a>
													<div id="editDesign" class="modal modal-fixed-footer">
													<h5><font color = "#1b5e20"><center>Segment Patterns</center> </font> </h5>
                        
									                      {!! Form::open() !!} 
									                        <div class="divider" style="height:2px"></div>
									                        <div class="modal-content col s12">
									                        	<div class="col s1" style="margin-top:60px">
									                        		<input type="checkbox" class="filled-in" id="pattern1" />
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
									                        		<input type="checkbox" class="filled-in" id="pattern2" />
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
									                        		<input type="checkbox" class="filled-in" id="pattern3" />
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


														<div class="modal-footer col s12" style="background-color:#26a69a">
								                          <button type="submit" class="waves-effect waves-green btn-flat">OK</button>
								                          <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
								                        </div>
									                      {!! Form::close() !!}
									                </div>

													<div class="file-path-wrapper">
														<input class="file-path validate" type="text">
													</div>
												</div>
									</div>
								
								<div class="col s12" style="margin-top:30px">
								<label>Choose your fabric:</label>
											<div class="file-field input-field">
												<a style="color:black" class="modal-trigger btn tooltipped btn-floating teal" data-position="bottom" data-delay="50" data-tooltip="Click to choose a fabric" href="#editFabric"><i class="mdi-editor-mode-edit"></i></a>
												<div id="editFabric" class="modal modal-fixed-footer">
													<h5><font color = "#1b5e20"><center>Segment Patterns</center> </font> </h5>
                        
									                      {!! Form::open() !!} 
									                        <div class="divider" style="height:2px"></div>
									                        <div class="modal-content col s12">
									                        	<div class="col s1" style="margin-top:60px">
									                        		<input type="checkbox" class="filled-in" id="pattern1" />
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
									                        		<input type="checkbox" class="filled-in" id="pattern2" />
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
									                        		<input type="checkbox" class="filled-in" id="pattern3" />
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


														<div class="modal-footer col s12" style="background-color:#26a69a">
								                          <button type="submit" class="waves-effect waves-green btn-flat">OK</button>
								                          <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
								                        </div>
									                      {!! Form::close() !!}
									                </div>

												<div class="file-path-wrapper">
													<input class="file-path validate" type="text">
												</div>
											</div>
								</div>
							</div>


						<div class="col s12">
							<div class="divider" style="margin-bottom:30px; margin-top:30px; height:5px"></div>
						</div>
							<div class="col s6">
							<a style="color:black" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to remove order" href="#removeOrder"><i class="mdi-navigation-close"></i></a>
								<div id="removeOrder" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:150px">
									<h5><font color="red"><center><b>Warning!</b></center></font></h5>
										
										{!! Form::open() !!}
											<div class="divider" style="heightL2px"></div>
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
							<center><img src="{{URL::to('img/male-uniform-shorts-plain.jpg')}}" style="height:450px; width:450px;"></center>
								<center><label>Garment Category: Shorts</label></center>
								<center><label>Garment Segment: Shorts</label></center>
								<center><label>Sex: Male</label></center>

                  			
							</div>

								<br>
								<div class="col s6">
								<div class="col s12" style="margin-top:120px">
								<label>Choose your design:</label>
											<div class="file-field input-field">
												<a style="color:black" class="modal-trigger btn tooltipped btn-floating teal" data-position="bottom" data-delay="50" data-tooltip="Click to choose a segment pattern" href="#editDesign"><i class="mdi-editor-mode-edit"></i></a>
													<div id="editDesign" class="modal modal-fixed-footer">
													<h5><font color = "#1b5e20"><center>Segment Patterns</center> </font> </h5>
                        
									                      {!! Form::open() !!} 
									                        <div class="divider" style="height:2px"></div>
									                        <div class="modal-content col s12">
									                        	<div class="col s1" style="margin-top:60px">
									                        		<input type="checkbox" class="filled-in" id="pattern1" />
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
									                        		<input type="checkbox" class="filled-in" id="pattern2" />
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
									                        		<input type="checkbox" class="filled-in" id="pattern3" />
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


														<div class="modal-footer col s12" style="background-color:#26a69a">
								                          <button type="submit" class="waves-effect waves-green btn-flat">OK</button>
								                          <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
								                        </div>
									                      {!! Form::close() !!}
									                </div>

													<div class="file-path-wrapper">
														<input class="file-path validate" type="text">
													</div>
												</div>
									</div>
								
								<div class="col s12" style="margin-top:30px">
								<label>Choose your fabric:</label>
											<div class="file-field input-field">
												<a style="color:black" class="modal-trigger btn tooltipped btn-floating teal" data-position="bottom" data-delay="50" data-tooltip="Click to choose a fabric" href="#editFabric"><i class="mdi-editor-mode-edit"></i></a>
												<div id="editFabric" class="modal modal-fixed-footer">
													<h5><font color = "#1b5e20"><center>Segment Patterns</center> </font> </h5>
                        
									                      {!! Form::open() !!} 
									                        <div class="divider" style="height:2px"></div>
									                        <div class="modal-content col s12">
									                        	<div class="col s1" style="margin-top:60px">
									                        		<input type="checkbox" class="filled-in" id="pattern1" />
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
									                        		<input type="checkbox" class="filled-in" id="pattern2" />
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
									                        		<input type="checkbox" class="filled-in" id="pattern3" />
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


														<div class="modal-footer col s12" style="background-color:#26a69a">
								                          <button type="submit" class="waves-effect waves-green btn-flat">OK</button>
								                          <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
								                        </div>
									                      {!! Form::close() !!}
									                </div>

												<div class="file-path-wrapper">
													<input class="file-path validate" type="text">
												</div>
											</div>
								</div>
							</div>

						<br><br><br>

<!--
						<div class="col s12" style="margin-top:20px; padding-top:10px; margin-bottom:30px; background-color:red">
							<center><h5><b><font color="white">Package B</font></b><!--<a class="right btn-floating tooltipped btn-large blue" data-position="bottom" data-delay="50"  data-tooltip="CLick to print a receipt for current transaction" href="#!" style="color:black; margin-right:35px; margin-left: 20px;"><i class="large mdi-editor-mode-edit"></i></a>--></h5></center>
<!--							<div class="divider" style="margin-bottom:20px; background-color:red; height:2px"></div>
						</div>        

						<div class="container">
							<div class="col s6">
							<a style="color:black" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to remove order" href="#removeOrder"><i class="mdi-action-delete"></i></a>
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
							<center><img src="#!" style="height:250px; width:250px;"></center>
								<center><label>Garment Segment: Polo</label></center>
								<center><label>Sex: Female</label></center>

                  			
							</div>

								<br>
								<div class="col s6">
								<div class="col s12">
								<label>Choose your design:</label>
											<div class="file-field input-field">
												<a style="color:black" class="modal-trigger btn tooltipped btn-floating blue" data-position="bottom" data-delay="50" data-tooltip="Click to choose a segment pattern" href="#editDesign"><i class="mdi-editor-mode-edit"></i></a>
													<div id="editDesign" class="modal modal-fixed-footer">
														<h5><font color = "#1b5e20"><center>Segment Patterns</center> </font> </h5>
                        
									                      {!! Form::open() !!} 
									                        <div class="divider" style="height:2px"></div>
									                        <div class="modal-content col s12">
									                        	<div class="col s1" style="margin-top:60px">
									                        		<input type="checkbox" class="filled-in" id="pattern1" />
									                        		<label for="pattern1"></label>
									                        	</div>
									                        	 <div class="col s11">
															        <div class="card-panel grey lighten-5 z-depth-1">
															          <div class="row valign-wrapper">
															            <div class="col s4">
															              <img src="#!" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
<!--															            </div>
															            <div class="col s7"> 
															              <p>STRAIGHT-CUT</p> <!-- This will be the name of the pattern -->
<!--															              <span class="black-text">
															                This is a square image. Add the "circle" class to it to make it appear circular.
															              </span>
															            </div>
															          </div>
															        </div>
															      </div>

															    <div class="col s1" style="margin-top:60px">
									                        		<input type="checkbox" class="filled-in" id="pattern2" />
									                        		<label for="pattern2"></label>
									                        	</div>
															      <div class="col s11">
															        <div class="card-panel grey lighten-5 z-depth-1">
															          <div class="row valign-wrapper">
															            <div class="col s4">
															              <img src="#!" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
<!--															            </div>
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
									                        		<input type="checkbox" class="filled-in" id="pattern3" />
									                        		<label for="pattern3"></label>
									                        	</div>
															      <div class="col s11">
															        <div class="card-panel grey lighten-5 z-depth-1">
															          <div class="row valign-wrapper">
															            <div class="col s4">
															              <img src="#!" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
<!--															            </div>
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


														<div class="modal-footer col s12" style="background-color:#26a69a">
								                          <button type="submit" class="waves-effect waves-green btn-flat">OK</button>
								                          <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
								                        </div>
									                      {!! Form::close() !!}
													</div>
												<div class="file-path-wrapper">
													<input class="file-path validate" type="text">
												</div>
											</div>
								</div>
								
								<div class="col s12" style="margin-top:30px">
								<label>Choose your fabric:</label>
											<div class="file-field input-field">	
												<a style="color:black" class="modal-trigger btn tooltipped btn-floating blue" data-position="bottom" data-delay="50" data-tooltip="Click to choose a fabric" href="#editFabric"><i class="mdi-editor-mode-edit"></i></a>
                     								<div id="editFabric" class="modal modal-fixed-footer">
                     								<h5><font color = "#1b5e20"><center>Fabric</center> </font> </h5>
                        
									                      {!! Form::open() !!} 
									                        <div class="divider" style="height:2px"></div>
									                        <div class="modal-content col s12">
									                        	<div class="col s1" style="margin-top:60px">
									                        		<input type="checkbox" class="filled-in" id="fabric1" />
									                        		<label for="fabric1"></label>
									                        	</div>
									                        	 <div class="col s11">
															        <div class="card-panel grey lighten-5 z-depth-1">
															          <div class="row valign-wrapper">
															            <div class="col s4">
															              <img src="#!" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
<!--															            </div>
															            <div class="col s7"> 
															              <p>COTTON CHENES</p> <!-- This will be the name of the pattern -->
<!--															              <span class="black-text">
															                This is a square image. Add the "circle" class to it to make it appear circular.
															              </span>
															            </div>
															          </div>
															        </div>
															      </div>

															    <div class="col s1" style="margin-top:60px">
									                        		<input type="checkbox" class="filled-in" id="fabric2" />
									                        		<label for="fabric2"></label>
									                        	</div>
															      <div class="col s11">
															        <div class="card-panel grey lighten-5 z-depth-1">
															          <div class="row valign-wrapper">
															            <div class="col s4">
															              <img src="#!" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
<!--															            </div>
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
									                        		<input type="checkbox" class="filled-in" id="fabric3" />
									                        		<label for="fabric3"></label>
									                        	</div>
															      <div class="col s11">
															        <div class="card-panel grey lighten-5 z-depth-1">
															          <div class="row valign-wrapper">
															            <div class="col s4">
															              <img src="#!" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
<!--															            </div>
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


														<div class="modal-footer col s12" style="background-color:#26a69a">
								                          <button type="submit" class="waves-effect waves-green btn-flat">OK</button>
								                          <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
								                        </div>
									                      {!! Form::close() !!}
													</div>
												<div class="file-path-wrapper">
													<input class="file-path validate" type="text">
												</div>
											</div>
								</div>
							</div>
						

						<div class="col s12">
						<div class="divider" style="margin-bottom:30px; margin-top:30px"></div>
					</div>
							<div class="col s6">
							<a style="color:black" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to remove order" href="#removeOrder"><i class="mdi-action-delete"></i></a>
								<div id="removeOrder" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:150px">
									<h5><font color="red"><center><b>Warning!</b></center></font></h5>
										
										{!! Form::open() !!}
											<div class="divider" style="heightL2px"></div>
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
							<center><img src="#!" style="height:250px; width:250px;"></center>
								<center><label>Garment Segment: Polo</label></center>
								<center><label>Sex: Female</label></center>

                  			
							</div>

								<br>
								<div class="col s6">
								<div class="col s12" style="margin-top:30px">
								<label>Choose your design:</label>
											<div class="file-field input-field">
												<a style="color:black" class="modal-trigger btn tooltipped btn-floating blue" data-position="bottom" data-delay="50" data-tooltip="Click to choose a segment pattern" href="#editDesign"><i class="mdi-editor-mode-edit"></i></a>
													<div id="editDesign" class="modal modal-fixed-footer">
													<h5><font color = "#1b5e20"><center>Segment Patterns</center> </font> </h5>
                        
									                      {!! Form::open() !!} 
									                        <div class="divider" style="height:2px"></div>
									                        <div class="modal-content col s12">
									                        	<div class="col s1" style="margin-top:60px">
									                        		<input type="checkbox" class="filled-in" id="pattern1" />
									                        		<label for="pattern1"></label>
									                        	</div>
									                        	 <div class="col s11">
															        <div class="card-panel grey lighten-5 z-depth-1">
															          <div class="row valign-wrapper">
															            <div class="col s4">
															              <img src="#!" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
<!--															            </div>
															            <div class="col s7"> 
															              <p>STRAIGHT-CUT</p> <!-- This will be the name of the pattern -->
<!--															              <span class="black-text">
															                This is a square image. Add the "circle" class to it to make it appear circular.
															              </span>
															            </div>
															          </div>
															        </div>
															      </div>

															    <div class="col s1" style="margin-top:60px">
									                        		<input type="checkbox" class="filled-in" id="pattern2" />
									                        		<label for="pattern2"></label>
									                        	</div>
															      <div class="col s11">
															        <div class="card-panel grey lighten-5 z-depth-1">
															          <div class="row valign-wrapper">
															            <div class="col s4">
															              <img src="#!" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
<!--															            </div>
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
									                        		<input type="checkbox" class="filled-in" id="pattern3" />
									                        		<label for="pattern3"></label>
									                        	</div>
															      <div class="col s11">
															        <div class="card-panel grey lighten-5 z-depth-1">
															          <div class="row valign-wrapper">
															            <div class="col s4">
															              <img src="#!" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
<!--															            </div>
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


														<div class="modal-footer col s12" style="background-color:#26a69a">
								                          <button type="submit" class="waves-effect waves-green btn-flat">OK</button>
								                          <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
								                        </div>
									                      {!! Form::close() !!}
									                </div>

													<div class="file-path-wrapper">
														<input class="file-path validate" type="text">
													</div>
												</div>
									</div>
								
								<div class="col s12" style="margin-top:30px">
								<label>Choose your fabric:</label>
											<div class="file-field input-field">
												<a style="color:black" class="modal-trigger btn tooltipped btn-floating blue" data-position="bottom" data-delay="50" data-tooltip="Click to choose a fabric" href="#editFabric"><i class="mdi-editor-mode-edit"></i></a>
												<div id="editFabric" class="modal modal-fixed-footer">
													<h5><font color = "#1b5e20"><center>Segment Patterns</center> </font> </h5>
                        
									                      {!! Form::open() !!} 
									                        <div class="divider" style="height:2px"></div>
									                        <div class="modal-content col s12">
									                        	<div class="col s1" style="margin-top:60px">
									                        		<input type="checkbox" class="filled-in" id="pattern1" />
									                        		<label for="pattern1"></label>
									                        	</div>
									                        	 <div class="col s11">
															        <div class="card-panel grey lighten-5 z-depth-1">
															          <div class="row valign-wrapper">
															            <div class="col s4">
															              <img src="#!" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
<!--															            </div>
															            <div class="col s7"> 
															              <p>STRAIGHT-CUT</p> <!-- This will be the name of the pattern -->
<!--															              <span class="black-text">
															                This is a square image. Add the "circle" class to it to make it appear circular.
															              </span>
															            </div>
															          </div>
															        </div>
															      </div>

															    <div class="col s1" style="margin-top:60px">
									                        		<input type="checkbox" class="filled-in" id="pattern2" />
									                        		<label for="pattern2"></label>
									                        	</div>
															      <div class="col s11">
															        <div class="card-panel grey lighten-5 z-depth-1">
															          <div class="row valign-wrapper">
															            <div class="col s4">
															              <img src="#!" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
<!--															            </div>
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
									                        		<input type="checkbox" class="filled-in" id="pattern3" />
									                        		<label for="pattern3"></label>
									                        	</div>
															      <div class="col s11">
															        <div class="card-panel grey lighten-5 z-depth-1">
															          <div class="row valign-wrapper">
															            <div class="col s4">
															              <img src="#!" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
<!--															            </div>
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


														<div class="modal-footer col s12" style="background-color:#26a69a">
								                          <button type="submit" class="waves-effect waves-green btn-flat">OK</button>
								                          <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
								                        </div>
									                      {!! Form::close() !!}
									                </div>

												<div class="file-path-wrapper">
													<input class="file-path validate" type="text">
												</div>
											</div>
								</div>
							</div>

					<div class="col s12">
						<div class="divider" style="margin-bottom:30px; margin-top:30px"></div>
					</div>
							<div class="col s6">
							<a style="color:black" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to remove order" href="#removeOrder"><i class="mdi-action-delete"></i></a>
								<div id="removeOrder" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:150px">
									<h5><font color="red"><center><b>Warning!</b></center></font></h5>
										
										{!! Form::open() !!}
											<div class="divider" style="heightL2px"></div>
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
							<center><img src="#!" style="height:250px; width:250px;"></center>
								<center><label>Garment Segment: Pants</label></center>
								<center><label>Sex: Female</label></center>

                  			
							</div>

								<br>
								<div class="col s6">
								<div class="col s12" style="margin-top:30px">
								<label>Choose your design:</label>
											<div class="file-field input-field">
												<a style="color:black" class="modal-trigger btn tooltipped btn-floating blue" data-position="bottom" data-delay="50" data-tooltip="Click to choose a segment pattern" href="#editDesign"><i class="mdi-editor-mode-edit"></i></a>
													<div id="editDesign" class="modal modal-fixed-footer">
													<h5><font color = "#1b5e20"><center>Segment Patterns</center> </font> </h5>
                        
									                      {!! Form::open() !!} 
									                        <div class="divider" style="height:2px"></div>
									                        <div class="modal-content col s12">
									                        	<div class="col s1" style="margin-top:60px">
									                        		<input type="checkbox" class="filled-in" id="pattern1" />
									                        		<label for="pattern1"></label>
									                        	</div>
									                        	 <div class="col s11">
															        <div class="card-panel grey lighten-5 z-depth-1">
															          <div class="row valign-wrapper">
															            <div class="col s4">
															              <img src="#!" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
<!--															            </div>
															            <div class="col s7"> 
															              <p>STRAIGHT-CUT</p> <!-- This will be the name of the pattern -->
<!--															              <span class="black-text">
															                This is a square image. Add the "circle" class to it to make it appear circular.
															              </span>
															            </div>
															          </div>
															        </div>
															      </div>

															    <div class="col s1" style="margin-top:60px">
									                        		<input type="checkbox" class="filled-in" id="pattern2" />
									                        		<label for="pattern2"></label>
									                        	</div>
															      <div class="col s11">
															        <div class="card-panel grey lighten-5 z-depth-1">
															          <div class="row valign-wrapper">
															            <div class="col s4">
															              <img src="#!" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
<!--															            </div>
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
									                        		<input type="checkbox" class="filled-in" id="pattern3" />
									                        		<label for="pattern3"></label>
									                        	</div>
															      <div class="col s11">
															        <div class="card-panel grey lighten-5 z-depth-1">
															          <div class="row valign-wrapper">
															            <div class="col s4">
															              <img src="#!" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
<!--															            </div>
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


														<div class="modal-footer col s12" style="background-color:#26a69a">
								                          <button type="submit" class="waves-effect waves-green btn-flat">OK</button>
								                          <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
								                        </div>
									                      {!! Form::close() !!}
									                </div>

													<div class="file-path-wrapper">
														<input class="file-path validate" type="text">
													</div>
												</div>
									</div>
								
								<div class="col s12" style="margin-top:30px">
								<label>Choose your fabric:</label>
											<div class="file-field input-field">
												<a style="color:black" class="modal-trigger btn tooltipped btn-floating blue" data-position="bottom" data-delay="50" data-tooltip="Click to choose a fabric" href="#editFabric"><i class="mdi-editor-mode-edit"></i></a>
												<div id="editFabric" class="modal modal-fixed-footer">
													<h5><font color = "#1b5e20"><center>Segment Patterns</center> </font> </h5>
                        
									                      {!! Form::open() !!} 
									                        <div class="divider" style="height:2px"></div>
									                        <div class="modal-content col s12">
									                        	<div class="col s1" style="margin-top:60px">
									                        		<input type="checkbox" class="filled-in" id="pattern1" />
									                        		<label for="pattern1"></label>
									                        	</div>
									                        	 <div class="col s11">
															        <div class="card-panel grey lighten-5 z-depth-1">
															          <div class="row valign-wrapper">
															            <div class="col s4">
															              <img src="#!" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
<!--															            </div>
															            <div class="col s7"> 
															              <p>STRAIGHT-CUT</p> <!-- This will be the name of the pattern -->
<!--															              <span class="black-text">
															                This is a square image. Add the "circle" class to it to make it appear circular.
															              </span>
															            </div>
															          </div>
															        </div>
															      </div>

															    <div class="col s1" style="margin-top:60px">
									                        		<input type="checkbox" class="filled-in" id="pattern2" />
									                        		<label for="pattern2"></label>
									                        	</div>
															      <div class="col s11">
															        <div class="card-panel grey lighten-5 z-depth-1">
															          <div class="row valign-wrapper">
															            <div class="col s4">
															              <img src="#!" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
<!--															            </div>
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
									                        		<input type="checkbox" class="filled-in" id="pattern3" />
									                        		<label for="pattern3"></label>
									                        	</div>
															      <div class="col s11">
															        <div class="card-panel grey lighten-5 z-depth-1">
															          <div class="row valign-wrapper">
															            <div class="col s4">
															              <img src="#!" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
<!--															            </div>
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


														<div class="modal-footer col s12" style="background-color:#26a69a">
								                          <button type="submit" class="waves-effect waves-green btn-flat">OK</button>
								                          <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
								                        </div>
									                      {!! Form::close() !!}
									                </div>

												<div class="file-path-wrapper">
													<input class="file-path validate" type="text">
												</div>
											</div>
								</div>
							</div>


													<div class="col s12">
						<div class="divider" style="margin-bottom:30px; margin-top:30px"></div>
					</div>
							<div class="col s6">
							<a style="color:black" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to remove order" href="#removeOrder"><i class="mdi-action-delete"></i></a>
								<div id="removeOrder" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:150px">
									<h5><font color="red"><center><b>Warning!</b></center></font></h5>
										
										{!! Form::open() !!}
											<div class="divider" style="heightL2px"></div>
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
							<center><img src="#!" style="height:250px; width:250px;"></center>
								<center><label>Garment Segment: Skirt</label></center>
								<center><label>Sex: Female</label></center>

                  			
							</div>

								<br>
								<div class="col s6">
								<div class="col s12" style="margin-top:30px">
								<label>Choose your design:</label>
											<div class="file-field input-field">
												<a style="color:black" class="modal-trigger btn tooltipped btn-floating blue" data-position="bottom" data-delay="50" data-tooltip="Click to choose a segment pattern" href="#editDesign"><i class="mdi-editor-mode-edit"></i></a>
													<div id="editDesign" class="modal modal-fixed-footer">
													<h5><font color = "#1b5e20"><center>Segment Patterns</center> </font> </h5>
                        
									                      {!! Form::open() !!} 
									                        <div class="divider" style="height:2px"></div>
									                        <div class="modal-content col s12">
									                        	<div class="col s1" style="margin-top:60px">
									                        		<input type="checkbox" class="filled-in" id="pattern1" />
									                        		<label for="pattern1"></label>
									                        	</div>
									                        	 <div class="col s11">
															        <div class="card-panel grey lighten-5 z-depth-1">
															          <div class="row valign-wrapper">
															            <div class="col s4">
															              <img src="#!" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
<!--															            </div>
															            <div class="col s7"> 
															              <p>STRAIGHT-CUT</p> <!-- This will be the name of the pattern -->
<!--															              <span class="black-text">
															                This is a square image. Add the "circle" class to it to make it appear circular.
															              </span>
															            </div>
															          </div>
															        </div>
															      </div>

															    <div class="col s1" style="margin-top:60px">
									                        		<input type="checkbox" class="filled-in" id="pattern2" />
									                        		<label for="pattern2"></label>
									                        	</div>
															      <div class="col s11">
															        <div class="card-panel grey lighten-5 z-depth-1">
															          <div class="row valign-wrapper">
															            <div class="col s4">
															              <img src="#!" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
<!--															            </div>
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
									                        		<input type="checkbox" class="filled-in" id="pattern3" />
									                        		<label for="pattern3"></label>
									                        	</div>
															      <div class="col s11">
															        <div class="card-panel grey lighten-5 z-depth-1">
															          <div class="row valign-wrapper">
															            <div class="col s4">
															              <img src="#!" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
<!--															            </div>
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


														<div class="modal-footer col s12" style="background-color:#26a69a">
								                          <button type="submit" class="waves-effect waves-green btn-flat">OK</button>
								                          <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
								                        </div>
									                      {!! Form::close() !!}
									                </div>

													<div class="file-path-wrapper">
														<input class="file-path validate" type="text">
													</div>
												</div>
									</div>
								
								<div class="col s12" style="margin-top:30px">
								<label>Choose your fabric:</label>
											<div class="file-field input-field">
												<a style="color:black" class="modal-trigger btn tooltipped btn-floating blue" data-position="bottom" data-delay="50" data-tooltip="Click to choose a fabric" href="#editFabric"><i class="mdi-editor-mode-edit"></i></a>
												<div id="editFabric" class="modal modal-fixed-footer">
													<h5><font color = "#1b5e20"><center>Segment Patterns</center> </font> </h5>
                        
									                      {!! Form::open() !!} 
									                        <div class="divider" style="height:2px"></div>
									                        <div class="modal-content col s12">
									                        	<div class="col s1" style="margin-top:60px">
									                        		<input type="checkbox" class="filled-in" id="pattern1" />
									                        		<label for="pattern1"></label>
									                        	</div>
									                        	 <div class="col s11">
															        <div class="card-panel grey lighten-5 z-depth-1">
															          <div class="row valign-wrapper">
															            <div class="col s4">
															              <img src="#!" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
<!--															            </div>
															            <div class="col s7"> 
															              <p>STRAIGHT-CUT</p> <!-- This will be the name of the pattern -->
<!--															              <span class="black-text">
															                This is a square image. Add the "circle" class to it to make it appear circular.
															              </span>
															            </div>
															          </div>
															        </div>
															      </div>

															    <div class="col s1" style="margin-top:60px">
									                        		<input type="checkbox" class="filled-in" id="pattern2" />
									                        		<label for="pattern2"></label>
									                        	</div>
															      <div class="col s11">
															        <div class="card-panel grey lighten-5 z-depth-1">
															          <div class="row valign-wrapper">
															            <div class="col s4">
															              <img src="#!" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
<!--															            </div>
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
									                        		<input type="checkbox" class="filled-in" id="pattern3" />
									                        		<label for="pattern3"></label>
									                        	</div>
															      <div class="col s11">
															        <div class="card-panel grey lighten-5 z-depth-1">
															          <div class="row valign-wrapper">
															            <div class="col s4">
															              <img src="#!" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
<!--															            </div>
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


														<div class="modal-footer col s12" style="background-color:#26a69a">
								                          <button type="submit" class="waves-effect waves-green btn-flat">OK</button>
								                          <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
								                        </div>
									                      {!! Form::close() !!}
									                </div>

												<div class="file-path-wrapper">
													<input class="file-path validate" type="text">
												</div>
											</div>
								</div>
							</div>

						</div>
-->


						</div>

						</div>

							<div class="divider" style="height:2px; margin-top:50px"></div>      	
				      		<center><p><font color="gray">End of order list wanting to purchase</font></p></center>
						
						</div>
					</div>
					</div>

				<!-- END OF CUSTOMIZATION HERE-->

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