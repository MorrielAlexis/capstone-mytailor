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
							{!! Form::open(['url' => 'transaction/walkin-company-save-employees', 'method' => 'POST']) !!}
							@for($i = 0; $i < $total_quantity; $i++)
								<!--Employee Information starts here-->
								<div class="col s12" style="margin-bottom:30px">
									<div class="input-field col s3">
							          	<input id="empFirstName{{ $i }}" name="empFirstName[]" required type="text" class="validate">
							          	<label for="empFirstName{{ $i }}">First Name</label>
							        </div>

							        <div class="input-field col s3">
							          	<input id="empLastName{{ $i }}" name="empLastName[]" required type="text" class="validate">
							          	<label for="empLastName{{ $i }}">Last Name</label>
							        </div>

							        <div class="input-field col s2">
							        	<input id="empMiddleName{{ $i }}" name="empMiddleName[]" type="text" class="validate">
							          	<label for="empMiddleName{{ $i }}">Middle Name</label>
							        </div>

							        <div class="input-field col s1">
								        @foreach($packages as $package)
								        	@if($orderPackages[$i] == $package->strPackageID)
												@if($package->strPackageSex == 'M')
											    	<input type="hidden" name="empSex[]" value="M">
													<input type="text" id="empSex{{ $i }}" value="Male" readonly>
											    @elseif($package->strPackageSex == 'F')
											    	<input type="hidden" name="empSex[]" value="F">
													<input type="text" id="empSex{{ $i }}" value="Female" readonly>
											    @endif
											@endif
										@endforeach
									</div>

									<div class="input-field col s2">
										@foreach($packages as $package)
											@if($orderPackages[$i] == $package->strPackageID)
												<input type="hidden" name="empSet[]" value="{{ $orderPackages[$i] }}" >
												<input readonly type="text" id="empSet{!! $i !!}" value="{!! $package->strPackageName !!}"> 
											@endif
										@endforeach
									</div>

									<div class="col s1">
										<a style="color:white; margin-top:18px" class="modal-trigger btn tooltipped blue" data-position="bottom" data-delay="50" data-tooltip="Click to edit the set purchased" href="#empSpecification{!! $i !!}"><i class="mdi-editor-mode-edit"></i></a>
									</div>

									<!--Modal for editing employee -->
									<div id="empSpecification{!! $i !!}" class="modal modal-fixed-footer" style="width:70%; height:80%">
										<h5><font color="teal"><center><b>Employee's Specification</b></center></font></h5>
										<div class="divider" style="height:2px"></div>
										<div class="modal-content col s12" style="padding-bottom:10%">

											<div class="col s12">
												<div class="col s12" style="font-size:1.5em">
												@foreach($packages as $package)
													@if($orderPackages[$i] == $package->strPackageID)
													<p>Package Availed: <font color="red" style="padding-left:5%"><b><i>{{ $package->strPackageName }}</i></b></font></p>
													@endif
												@endforeach
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
															@foreach($packages as $j => $package)
																@for($k = 0; $k < count($segments); $k++)
																	@if($segments[$k][$j][0]->strPackageID == $orderPackages[$i])
																	<tr>
																		<td>{{ $segments[$k][$j][0]->strGarmentCategoryName }}, <b>{{ $segments[$k][$j][0]->strSegmentName }}</b></td>
																		<td><img src="../{{ $segments[$k][$j][0]->strSegmentImage }}"/></td>
																		<td><input name="segment-qty{{ $i }}[]" id="add-garment" type="number" value="1" style="margin-top:20px" placeholder="How many?" ></td>
																	</tr>
																	@endif
																@endfor
															@endforeach
														</tbody>
													</table>
												</div>
											</div>

										</div>
										

										<div class="modal-footer col s12">
							                <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">Save</font></button>
							                <a class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">Cancel</font></a>	
							            </div>
									</div>
									<!--End of modal for editing employee data-->
							</div>
							<!--Employee Information ends here-->
						@endfor
						<div class="col s12"><div class="divider" style="margin-bottom:20px; margin-top:20px"></div>
			                <button type="submit" class="right waves-effect waves-green btn" style="background-color:teal; margin-right:10px"><font color="white">Save</font></button>
			                <a href="{{URL::to('transaction/walkin-company-show-order')}}" class="left modal-action modal-close waves-effect waves-green btn" style="background-color:teal; margin-left:10px;"><font color="white">Cancel</font></a>
		            	</div>
		            	{!! Form::close() !!}
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
	
	<script>
	$(".empSet").change(function(){
		var setId = "#" + this.id;
		
	});
	</script>	

	<script>
	$(document).ready(function(){
		$('select').material_select();
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