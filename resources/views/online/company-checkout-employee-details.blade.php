@extends('layouts.masterOnline')

@section('content')


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
							
								<!--Employee Information starts here-->
								<div class="col s12" style="margin-bottom:30px">
									<div class="input-field col s3">
							          	<input id="" name="empFirstName[]" required type="text" pattern="">
							          	<label for="empFirstName">First Name</label>
							        </div>

							        <div class="input-field col s3">
							          	<input id="empLastName" name="empLastName[]" required type="text" pattern="">
							          	<label for="empLastName">Last Name</label>
							        </div>

							        <div class="input-field col s2">
							        	<input id="empMiddleName" name="empMiddleName[]" type="text" pattern="">
							          	<label for="empMiddleName">Middle Name</label>
							        </div>

							        <div class="input-field col s1">
								       
											    	<input type="hidden" name="empSex[]" value="M">
													<input type="text" id="empSex" value="Male" readonly>
											
											    	<input type="hidden" name="empSex[]" value="F">
													<input type="text" id="empSex" value="Female" readonly>
											
									</div>

									<div class="input-field col s2">
										
												<input type="hidden" name="empSet[]" value="" >
												<input readonly type="text" id="empSet">
										
									</div>

									<div class="col s1">
										<a style="color:white; margin-top:18px;width:100px" class="modal-trigger btn tooltipped blue" data-position="bottom" data-delay="50" data-tooltip="Click to add additional segments from the set purchased" href="#empSpecification"><i class="mdi-editor-mode-edit"></i></a>
									</div>

									<!--Modal for editing employee -->
									<div id="empSpecification" class="modal modal-fixed-footer" style="width:70%; height:80%">
										<h5><font color="teal"><center><b>Employee's Specification</b></center></font></h5>
										<div class="divider" style="height:2px"></div>
										<div class="modal-content col s12" style="padding-bottom:10%">

											<div class="col s12">
												<div class="col s12" style="font-size:1.5em">
												
													<p>Package Availed: <font color="red" style="padding-left:5%"><b><i></i></b></font></p>
													
												</div>
												<div class="col s12 z-depth-1">
													<table class = "table centered" border = "1">
														<thead>
															<tr>
																<th>Item</th>
																<th>Image</th>
																<th>Quantity</th>										
															</tr>
														</thead>

														<tbody>
															
																	<tr>
																		<td></b></td>
																		<td><img src=""/></td>
																		<td><input min=0 name="segment-qty[]" id="add-garment" type="number" value="" style="margin-top:20px" placeholder="How many additional ?" ></td>
																	</tr>
																	
														</tbody>
													</table>
												</div>
											</div>

										</div>
										

										<div class="modal-footer col s12">
							                <a class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">Close</font></a>	
							            </div>
									</div>
									<!--End of modal for editing employee data-->
							</div>
							<!--Employee Information ends here-->
					
						<div class="col s12"><div class="divider" style="margin-bottom:20px; margin-top:20px"></div>
			                <a href="{{URL::to('company-checkout')}}" type="submit" class="right waves-effect waves-green btn" style="background-color:teal; margin-right:10px;width:100px"><font color="white">Save</font></a>
			                <a href="{{URL::to('online/company-checkout-customer-check')}}" class="left modal-action modal-close waves-effect waves-green btn" style="background-color:teal; margin-left:10px;width:100px"><font color="white">Cancel</font></a>
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