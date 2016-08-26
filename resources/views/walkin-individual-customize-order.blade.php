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
					<li class="tab col s12" style="border-top-left-radius: 20px; border-top-right-radius: 20px; "><a style="color:black; padding-top:5px; opacity:0.80" href="#shoppingCart"></a></li>	
					<div class="indicator white" style="z-index:1"></div>
	            </ul>
				<div class="card-panel">
					<div class="card-content">
						<div class="row">
						<div class="col s12"> <!--start of list-->
							<div class="col s12">
								
										@foreach($segments as $i => $segment)
										<div id="remove{{ $i+1 }}" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:150px">
											<h5><font color="red"><center><b>Warning!</b></center></font></h5>
												
												{!! Form::open(['url' => 'transaction/walkin-individual-remove-item', 'method' => 'post']) !!}
													<div class="divider" style="height:2px"></div>
													<div class="modal-content col s12">

														<input type="hidden" value="{{ $i+1 }}" name="delete-item-id">
														<div class="col s3">
															<i class="mdi-alert-warning" style="font-size:50px; color:red"></i>
														</div>
														<div class="col s9">
															<p><font size="+1">Are you sure to remove this order from cart?</font></p>
														</div>
													</div>

													<div class="modal-footer col s12">
										                <button type="submit" class=" modal-action modal-close waves-effect waves-green btn-flat" ><font color="black">Yes</font></button>
										                <a class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">No</font></a>
										            </div>
												{!! Form::close() !!}
										</div>
										@endforeach
								<div class="col s6"><p><h5><b>Customize Order</b></h5></p></div>							
									<div class="right col s1"><a style="margin-top:15px; background-color:teal" type="submit" class="waves-effect waves-green btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to go back home" href="{{URL::to('/transaction/walkin-individual')}}"><i class="mdi-action-home" style="color:white; opacity:0.90; font-size:30px;"></i></a></div>
							{!! Form::open(['url' => 'transaction/walkin-individual-customer-information', 'method' => 'post']) !!}
									@if($segments != null) 
										<div class="right col s5"><button style="margin-top:15px; background-color:teal" type="submit" class="right waves-effect waves-green btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to proceed to payment of orders" ><font color="white" size="+1"><!--<i class="mdi-action-payment" style="font-size:20px;">-->  Proceed to Checkout<!--</i>--></font></button>
										</div>
									@else 
										<div class="right col s5"><a href="{{URL::to('transaction/walkin-individual-show-items')}}" style="margin-top:15px; background-color:teal"class="right waves-effect waves-green btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to proceed to previous page" ><font color="white" size="+1"><!--<i class="mdi-action-payment" style="font-size:20px;">-->Choose available products<!--</i>--></font></a>
										</div>
									@endif														
							</div>

							<!--/// START OF AN ITERATION  ///-->
							<div class="divider" style="margin-bottom:30px"></div>
							<div class="divider" style="margin-bottom:30px"></div>
							<div class="divider" style="margin-bottom:30px; height:3px"></div>


<!-- END OF LOOP -->		@foreach($segments as $i => $segment)
							<div class="col s6">
							<a style="color:black" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to remove order" href="#remove{{ $i+1 }}"><i class="mdi-navigation-close"></i></a>

							<center><img src="{{URL::asset($segment['strSegmentImage'])}}" style="height:450px; width:450px; border:3px gray solid"></center>								          	
							<center><a href="#!" class="btn tooltipped"  data-position="bottom" data-delay="50" data-tooltip="Click to add similar garment and specify new design and fabric" style="background-color:teal; white:white">Add</a></center>
							</div>
							
							<br>
							<div class="col s6">
								<div class="col s6" style="margin-top:7%">
									<a style="color:white; margin-top:10px" class="modal-trigger btn tooltipped teal" data-position="bottom" data-delay="50" data-tooltip="Click to choose a segment pattern" href="#pattern{{ $i+1 }}"><i class="mdi-content-content-cut" style="padding-right:10px"></i>Choose Design</a>
								<!--Modal for Choosing design-->
								<div id="pattern{{ $i+1 }}" class="modal modal-fixed-footer" style="width:80%; height:85%;">
									<h5><font color = "#1b5e20"><center>List of Available Designs</center> </font> </h5>
				                        <div class="divider" style="height:2px"></div>
				                        <div class="modal-content col s12">
										<span style="color:#ff8a80; margin-left:5px">Click on the part to be customized.</span>
										<!--Collapsible Accordion-->
										<!--This will be the "style categories" na ic-customize ni customer-->
										<!--Under each "style category" ay may mga segment pattern na pipiliin-->
										<!--Check maintenance for a better understanding. Under Garments-->
										@foreach($styles as $j => $style)
										@if($style->boolIsActive == 1)
										<ul class="collapsible z-depth-2" data-collapsible="accordion" style="border:none" @if($segment['strSegmentID'] != $style->strSegmentFK) hidden @endif>
										    <li style="margin-bottom:10px;">
										      	<div class="collapsible-header" style="background-color:#00838f; color:white; height:30px; padding-top:10px; padding-bottom:50px; font-size:18px">{{ $style->strSegStyleName }}</div>
										      	<div class="collapsible-body overflow-x">
										      		<div class="col s12">
												      	<div class="left col s6"><p style="color:gray; margin-left:20px">*Choose one of your desired design</p></div>
												      	<div class="pull-right col s6"  style="margin-top:2.8%; font-size:15px; padding-left:10%"><a class="modal-trigger tooltipped" href="#custom-fabric" data-position="bottom" data-delay="50" data-tooltip="Click this if you want a separate fabric for this specific style category"><u><b>Click to specify fabric for this specific style category</b></u></a></div>
												    </div>
												      	@foreach($patterns as $k => $pattern)
												      	<div class="col s6" @if($pattern->strSegPStyleCategoryFK != $style->strSegStyleCatID) hidden @endif>
								                        	<div class="center col s2 " style="margin-top:60px">
								                        		<input name="rdb_pattern{{ $style->strSegStyleCatID }}{{ $i+1 }}" type="radio" class="filled-in" value = "{{ $pattern->strSegPatternID }}" id="{{ $pattern->strSegPatternID }}{{ $i+1 }}{{ $j+1 }}{{ $k+1 }}" />
								                        		<label for="{{ $pattern->strSegPatternID }}{{ $i+1 }}{{ $j+1 }}{{ $k+1 }}"></label>
								                        	</div>
								                        	 <div class="col s10">
														        <div class="card-panel teal lighten-4 z-depth-1" style="height:200px">
														          <div class="row valign-wrapper">
														            <div class="center col s6">
														              <img src="{{URL::asset($pattern->strSegPImage)}}" alt="" class="responsive-img">
														            </div>
														            <div class="col s6"> 
														              <span><b>{{ $pattern->strSegPName }}</b></span> <!-- This will be the name of the pattern -->
														              <br/>
														              <span class="black-text">
														                {{ $pattern->txtSegPDesc }}
														              </span>
														            </div>
														          </div>
														        </div>
														     </div>
														</div>
														@endforeach
														
														
										      	</div>
										    </li>
										  </ul>
										  @endif
										@endforeach
										<!--End of Collapsible Accordion-->

										<div class="col s12" style="margin:20px"></div>
										</div> <!--end of modal content-->

									<div class="modal-footer col s12">
										<!--<a href="{{URL::to('transaction/walkin-individual-catalogue-designs')}}" class="left btn-flat" style="background-color:teal; color:white">Check designs from catalogue</a>-->
			                          	<a class="right modal-action modal-close waves-effect waves-green btn-flat">OK</a>
			                          	<!--<a class="right modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>-->
			                        </div>
								</div>
								</div>

								<!--Modal for custom-facbric-->
								<div id="custom-fabric" class="modal modal-fixed-footer" style="width:80%; height:85%;">
		 								<h5><font color = "#1b5e20"><center>List of Available Fabrics</center> </font> </h5>
		    
				                        <div class="divider" style="height:2px"></div>				
				                        <div class="modal-content col s12">
												
												<div class="col s3">
													<div class="input-field col s12">
															<select class = "custom-fabric-type" id = "custom-fabric-type">
																<option value="TA" class="circle" selected>All</option>
																@foreach($fabricTypes as $fabricType)
																	<option value="{{ $fabricType->strFabricTypeID }}">{{ $fabricType->strFabricTypeName }}</option>
																@endforeach
															</select>
															<label><font size="3" color="gray">Fabric Type</font></label>
													</div>
												</div>

												<div class="col s3">
													<div class="input-field col s12">
															<select class = "custom-fabric-color" id = "custom-fabric-color">
																<option value="CA" class="circle" selected>All</option>
																@foreach($fabricColors as $fabricColor)
																	<option value="{{ $fabricColor->strFabricColorID }}">{{ $fabricColor->strFabricColorName }}</option>
																@endforeach
															</select>
															<label><font size="3" color="gray">Fabric Color</font></label>
													</div>
												</div>

												<div class="col s3">
													<div class="input-field col s12">
															<select class = "custom-fabric-pattern" id = "custom-fabric-pattern">
																<option value="PA" class="circle" selected>All</option>
																@foreach($fabricPatterns as $fabricPattern)
																	<option value="{{ $fabricPattern->strFabricPatternID }}">{{ $fabricPattern->strFabricPatternName }}</option>
																@endforeach
															</select>
															<label><font size="3" color="gray">Fabric Pattern</font></label>
													</div>
												</div>

												<div class="col s3">
													<div class="input-field col s12">
															<select class = "custom-fabric-thread-count" id = "custom-fabric-thread-count">
																<option value="TCA" class="circle" selected>All</option>
																@foreach($fabricThreadCounts as $fabricThreadCount)
																	<option value="{{ $fabricThreadCount->strFabricThreadCountID }}">{{ $fabricThreadCount->strFabricThreadCountName }}</option>
																@endforeach
															</select>
															<label><font size="3" color="gray">Fabric Thread Count</font></label>
													</div>
												</div>
												
												
												<div class="col s12" style="margin:20px">
													<div class="divider" style="height:2px gray solid"></div>
													<div class="divider" style="height:2px gray solid"></div>
												</div> 
												
												<p style="color:gray; margin-left:20px">*Choose one of your desired fabric</p>

												
					                        	@foreach($fabrics as $j => $fabric)
					                        	<div class="col s6">
					                        	<div class="center col s2" style="margin-top:60px">
					                        		<input name="custom-fabrics{{ $i+1 }}" type="radio" class="filled-in custom-segmentFabric{{ $i+1 }}" value="custom-{{ $fabric->strFabricID }}" id="custom-{{ $fabric->strFabricID }}{{ $i+1 }}{{ $j+1 }}" />					                        	
					                        		<label for="custom-{{ $fabric->strFabricID }}{{ $i+1 }}{{ $j+1 }}"></label>
					                        	</div>
					                        	 <div class="col s10">
											        <div class="card-panel teal lighten-4 z-depth-1">
											          <div class="row valign-wrapper">
											            <div class="center col s4">
											              <img src="{{URL::asset($fabric->strFabricImage)}}"class="responsive-img">
											            </div>
											            <div class="col s8"> 
											              <p><b id="{{ 'fabricText'.$fabric->strFabricID }}">{{ $fabric->strFabricName }}</b></p> 
											              <span class="black-text">
											                {{ $fabric->txtFabricDesc }}
											              </span>
											            </div>
											          </div>
											        </div>
											      </div>
											    </div>
												@endforeach
												
											<div class="col s12" style="margin:20px"></div>
											
									</div>
								
									<div class="modal-footer col s12">
			                          <a  class="right modal-action modal-close waves-effect waves-green btn-flat">OK</a>
			                          <a  class="right modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
			                        </div>
								</div>
								<!--End of modal for custom fabric-->
								
								<div class="col s6" style="margin-top:7%">
									<a style="color:white; margin-top:10px" class="modal-trigger btn tooltipped teal" data-position="bottom" data-delay="50" data-tooltip="Click to choose a fabric" href="#fabric{{ $i+1 }}"><i class="mdi-maps-layers" style="padding-right:10px"></i>Choose Fabric</a>
									<div id="fabric{{ $i+1 }}" class="modal modal-fixed-footer" style="width:1100px; height:600px">
	 									<h5><font color = "#1b5e20"><center>List of Available Fabrics</center> </font> </h5>
	    
					                        <div class="divider" style="height:2px"></div>				
					                        <div class="modal-content col s12">
												<!--Select-->
												<div class="col s3"><!--fabric type-->
													<div class="input-field col s12">
															<select class = "fabric-type" id = "fabric-type">
																<option value="TA" class="circle" selected>All</option>
																@foreach($fabricTypes as $fabricType)
																	<option value="{{ $fabricType->strFabricTypeID }}">{{ $fabricType->strFabricTypeName }}</option>
																@endforeach
															</select>
															<label><font size="3" color="gray">Fabric Type</font></label>
													</div>
												</div>

												<div class="col s3"><!--fabric color-->
													<div class="input-field col s12">
															<select class = "fabric-color" id = "fabric-color">
																<option value="CA" class="circle" selected>All</option>
																@foreach($fabricColors as $fabricColor)
																	<option value="{{ $fabricColor->strFabricColorID }}">{{ $fabricColor->strFabricColorName }}</option>
																@endforeach
															</select>
															<label><font size="3" color="gray">Fabric Color</font></label>
													</div>
												</div>

												<div class="col s3"><!--fabric pattern-->
													<div class="input-field col s12">
															<select class = "fabric-pattern" id = "fabric-pattern">
																<option value="PA" class="circle" selected>All</option>
																@foreach($fabricPatterns as $fabricPattern)
																	<option value="{{ $fabricPattern->strFabricPatternID }}">{{ $fabricPattern->strFabricPatternName }}</option>
																@endforeach
															</select>
															<label><font size="3" color="gray">Fabric Pattern</font></label>
													</div>
												</div>

												<div class="col s3"><!--fabric thread count-->
													<div class="input-field col s12">
															<select class = "fabric-thread-count" id = "fabric-thread-count">
																<option value="TCA" class="circle" selected>All</option>
																@foreach($fabricThreadCounts as $fabricThreadCount)
																	<option value="{{ $fabricThreadCount->strFabricThreadCountID }}">{{ $fabricThreadCount->strFabricThreadCountName }}</option>
																@endforeach
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

												
					                        	@foreach($fabrics as $j => $fabric)
					                        	<div class="col s6 fabric-general {{ $fabric->strFabricTypeFK }} {{ $fabric->strFabricPatternFK }} {{ $fabric->strFabricColorFK }} {{ $fabric->strFabricThreadCountFK }}">
					                        	<div class="center col s2" style="margin-top:60px">
					                        		<input name="fabrics{{ $i+1 }}" type="radio" class="filled-in segmentFabric{{ $i+1 }}" value="{{ $fabric->strFabricID }}" id="{{ $fabric->strFabricID }}{{ $i+1 }}{{ $j+1 }}" />					                        	
					                        		<label for="{{ $fabric->strFabricID }}{{ $i+1 }}{{ $j+1 }}"></label>
					                        	</div>
					                        	 <div class="col s10">
											        <div class="card-panel teal lighten-4 z-depth-1">
											          <div class="row valign-wrapper">
											            <div class="center col s4">
											              <img src="{{URL::asset($fabric->strFabricImage)}}"class="responsive-img"> <!-- notice the "circle" class -->
											            </div>
											            <div class="col s8"> 
											              <p><b id="{{ 'fabricText'.$fabric->strFabricID }}">{{ $fabric->strFabricName }}</b></p> <!-- This will be the name of the pattern -->
											              <span class="black-text">
											                {{ $fabric->txtFabricDesc }}
											              </span>
											            </div>
											          </div>
											        </div>
											      </div>
											    </div>
												@endforeach
												
											<div class="col s12" style="margin:20px"></div>
											
											</div>
								
										<div class="modal-footer col s12">
				                          <a  class="right modal-action modal-close waves-effect waves-green btn-flat">OK</a>
				                          <!--<a  class="right modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>-->
				                        </div>
									</div>
								<!--End of modal for choosing fabric-->
								</div>

								<!--Garment Description Here-->
								<div class="col s12" style="margin-top:1%; color:gray"><p>Garment description below:</p></div>
								<div class="col s12" style="margin-left:130px">
									
										<div class="col s4" style="color:teal;"><p><b>Garment Category:</b></p></div>
										<div class="col s8"><p>{{ $segment['strGarmentCategoryName'] }}</p></div>
									
										<div class="col s4" style="color:teal;"><p><b>Garment Segment:</b></p></div>
										<div class="col s8"><p>{{ $segment['strSegmentName'] }}</p></div>									
									
										<div class="col s4" style="color:teal;"><p><b>Sex(Applicable):</b></p></div>
										@if($segment['strSegmentSex'] == 'M') <div class="col s8"><p>Male</p></div>
				                        @elseif($segment['strSegmentSex'] == 'F') <div class="col s8"><p>Female</p></div>
				                        @endif

										<div class="col s4" style="color:teal;"><p><b>Price starts from:</b></p></div>
										<div class="col s8" style="color:red"><p>{{ number_format($segment['dblSegmentPrice'], 2) }} PHP</p></div>
										<input type="hidden" class="price-per-segment" id="{{ $segment['dblSegmentPrice'] }}">

									<div class="col s4" style="color:teal;"><p><b>Time to finish(min):</b></p></div>
									<div class="col s8 " style="color:red" ><p>{{ $segment['intMinDays'] }} days</p></div>
									<input type="hidden" class="time-to-finish" id="{{ $segment['intMinDays'] }}">
																	
								</div>

								<!--To identify the quantity of garments with similar design and fabrics-->
				                <div class="col s8" style="margin-top:4%">
				                <div class="col s8" style="padding-top:3%; padding-left:50%; color:red"><center><b style="font-size:18px">QTY</b></center></div>   
				               	<div class="col s4" style="padding-left:0; margin-left:0;"><input name="quantity" id="quantity" type="number" style="border:2px teal solid; padding-left:18%; padding-right:18%" placeholder="How many?"></div>
				                </div>
				                <!--end-->
							</div>
						<!--dati dito yung div-->

							<div class="col s12" >
								<div class="divider" style="margin-bottom:30px; margin-top:30px; height:3px"></div>
							</div>
						<br>
						<div class="divider" style="height:2px;margin-top:40px"></div>
<!-- END OF LOOP -->	@endforeach
						{!! Form::close() !!}
						<!--/// END OF AN ITERATION  ///-->


							<div class="col s12" style="padding:10px">
								<!-- <div class="col s6">
									<a class="btn" style="background-color:#a7ffeb; color:black"><b><i class="mdi-navigation-close" style="padding-right:10px"></i>Cancel</b></a>
								</div>	 -->
								<div class="right col s6">
									<!--<a href="{{URL::to('transaction/walkin-individual-bulk-orders')}}" class="right btn" style="color:white; background-color:teal; margin-left:20px; border:3px teal solid">Add another set</a>-->
									<a href="{{URL::to('transaction/walkin-individual-show-items')}}" class="right btn" style="background-color:#00695c; color:white"><b><i class="mdi-content-add" style="padding-right:10px;"></i>Add another item</b></a>
								</div>
							</div>
						</div> <!--end of list-->

						<div class="col s12">
							<div class="divider" style="height:2px; margin-top:30px"></div>      	
				      		<center><p><font color="gray">End of order list wanting to purchase</font></p></center>
						</div>
						</div>
					</div>
				</div>
			</div>
		<!-- END of CUSTOMIZATION OF ORDERS HERE -->

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
		var type = $('#fabric-type');
		var color = $('#fabric-color');
		var pattern = $('#fabric-pattern');
		var threadCount = $('#fabric-thread-count');

		type.change(function () {
		  updateUI();
		});

		color.change(function () {
		  updateUI();
		});

		pattern.change(function () {
		  updateUI();
		});

		threadCount.change(function () {
		  updateUI();
		});


		function updateUI () {
		  $('.fabric-general').hide();

		  var typeValue = type.val();
		  var colorValue = color.val();
		  var patternValue = pattern.val();
		  var threadValue = threadCount.val();
		  
		  if (typeValue == 'TA' && colorValue == 'CA' && patternValue == 'PA' && threadValue == 'TCA'){
		  	return $('.fabric-general').show();
		  } 
		  
		  var typeClass = typeValue == 'TA' ? '' : '.' + typeValue;
		  var colorClass = colorValue == 'CA' ? '' : '.' + colorValue;
		  var patternClass = patternValue == 'PA' ? '' : '.' + patternValue;
		  var threadClass = threadValue == 'TCA' ? '' : '.' + threadValue;

		  var classesToUpdate = typeClass + colorClass + patternClass + threadClass;
		  console.log(classesToUpdate);
		  $(classesToUpdate).show();
		}

		updateUI();
	</script>

	<script>
		$(document).ready(function(){
			var a = document.getElementsByClassName('time-to-finish');
			var b = document.getElementsByClassName('price-per-segment');

			var totalTime = 0;
			var totalAmount = 0.0;

			for(var i = 0; i < a.length; i++){
				totalTime += parseInt(a[i].id);
				totalAmount += parseFloat(b[i].id);
			}

			$('#total-time').text(totalTime + ' days');  
			$('#total-price').text(totalAmount.toFixed(2) + ' PHP');

		});

	</script>

	<script>
	  $(document).ready(function() {
	    $('select').material_select();
		$('.tooltipped').tooltip({delay: 50});

		$segments = {!! json_encode($segments) !!};
		

		$('input[name=garmentFabrics]').on('change', function () {
			var fabricID = $('input[name=garmentFabrics]:checked').val();
			var fabricClass = $('input[name=garmentFabrics]:checked').attr('class');
			var fabricText = $('#fabricText' + fabricID).text();

			for($i = 1; $i < ($segments.length) + 1; $i++){
				$('#segmentFabricText' + $i).text(fabricText);
			}	
				
		});
	  });
	  
	</script>

@stop