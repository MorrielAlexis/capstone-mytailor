@extends('layouts.master')

@section('content')

	<div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><center><h3><b>Welcome to <font color="white">MyTailor</font></b></h3></center></span>
        <center><h5>Walk-in Individual</h5></center>
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
				          				<input type="checkbox" class="filled-in" id="all" />
		      							<label for="all">All</label>
		      				</div>
						</div>

						<div class="divider"></div>

						<div class="col s12" style="margin-top:15px">
							<div class="divider" style="margin-bottom:40px; height:2px"></div>
							<div class="col s4">
				          				<input type="checkbox" class="filled-in" id="polo" style="padding:5px"/>
		      							<label for="polo" ><font size="+1">Polo</font></label>
								<img src="#!" style="height:170px; width:210px; padding-left:10px">
								<center><h6>Quantity</h6></center>
				                  <div class="row">
				                    <div class="col s3 center"><i class="small mdi-content-add-circle" style="color:teal"></i></div>
				                    <div class="input-field col s6" style="margin-top:-2px;">
				                      <input class="center" id="quantity" value="2" type="text" readonly>
				                    </div>
				                    <div class="col s3 center"><i class="small mdi-content-remove-circle" style="color:teal"></i></div>
				                  </div>
							</div>
							<div class="col s4">
										<input type="checkbox" class="filled-in" id="pants" style="padding:5px" />
		      							<label for="pants"><font size="+1">Pants</font></label>
								<img src="#!" style="height:170px; width:210px; padding-left:10px">
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
								<img src="#!" style="height:170px; width:200px; padding-left:10px">
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

						<div class="col s12">
							<div class="divider"></div>
						<div>

							<div class="col s12">
								<div class="right btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to create a new package of orders " style="margin-left:40px; margin-top:30px; font-size:15px; color:black"><!--<i class="mdi-editor-add" style="font-size:20px;">-->  Add to Cart<!--</i>--></div>
								<div class="right modal-trigger btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to remove order" href="#resetOrder" style=" margin-top:30px; font-size:15px; color:black"><!--<i class="mdi-navigation-cancel" style="font-size:20px;">-->  Reset Order<!--</i>--></div>
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
							</div>
						</div>

					</div>

					<div class="col s12">
						<div class="divider" style="height:2px; margin-top:50px"></div>      	
		      			<center><p><font color="gray">End of product list for MyTailor</font></p></center>
					</div>
				</div>
			</div>


			<!-- CUSTOMIZING ORDER HERE -->
			<div class="col s12">
				<ul class="tabs transparent" style="margin-top:50px">
					<li class="tab col s12" style="border-top-left-radius: 20px; border-top-right-radius: 20px; background-color: red;"><a style="color:black; padding-top:5px; opacity:0.80" href="#shoppingCart"></a></li>	
					<div class="indicator white" style="z-index:1"></div>
	            </ul>
				<div class="card-panel">
					<div class="card-content">
						<div class="row">
						<div class="col s12">
							<div class="col s12">
								
								<div class="col s6"><p><h5>Customize Order</h5></p></div>
								<div class="col s6"><a style="margin-left:170px; margin-top:15px" type="submit" class="right waves-effect waves-green btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to proceed to payment of orders" href="{{URL::to('/transaction/walkin-individual-payment')}}"><font color="black" size="+1"><!--<i class="mdi-action-payment" style="font-size:20px;">-->  Proceed to Checkout<!--</i>--></font></a></div>				
							</div>
							
							<div class="divider" style="margin-bottom:30px"></div>
							<div class="divider" style="margin-bottom:30px"></div>
							<div class="divider" style="margin-bottom:30px; height:3px"></div>
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
								<center><label>Sex: Male</label></center>

                  			
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
								<center><label>Sex: Male</label></center>

                  			
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
						</div>
						</div><!--Col s12-->

							<div class="divider" style="height:2px; margin-top:50px"></div>      	
				      		<center><p><font color="gray">End of order list wanting to purchase</font></p></center>
						
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


@stop