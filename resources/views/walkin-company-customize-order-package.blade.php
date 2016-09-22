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
				{!! Form::open(['url' => 'transaction/walkin-company-save-design', 'method' => 'POST']) !!}
						<input type="hidden" name="hidden-package-index" value="{{ $customized_index }}">
						@foreach($package as $package)
							<div class="col s12" style="margin-top:2px; padding-top:5px; margin-bottom:30px;">
						        <center><h4 style="color:teal"><b>Package: </b><font color="red">{{ $package->strPackageName  }}</font><!--<a class="right btn-floating tooltipped btn-large blue" data-position="bottom" data-delay="50"  data-tooltip="CLick to print a receipt for current transaction" href="#!" style="color:black; margin-right:35px; margin-left: 20px;"><i class="large mdi-editor-mode-edit"></i></a>--></h4></center>
						        <center><p style="color:gray">All garments included in the set are listed below.</p></center>
						        <div class="divider" style="margin-bottom:5px; background-color:teal; height:2px"></div>
						    </div>   
						@endforeach
			
						@for($i = 0; $i < count($segments); $i++)
						    <div class="col s6">
						    	<div class="container">
									<center><img src="{{URL::asset($segments[$i]->strSegmentImage)}}" style="margin-top:15px; height:350px; width:350px; border: 3px gray solid"></center>
								</div>
							</div>

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
										<ul class="collapsible z-depth-2" data-collapsible="accordion" style="border:none" @if($segments[$i]->strSegmentID != $style->strSegmentFK) hidden @endif>
										    <li style="margin-bottom:10px;">
										      	<div class="collapsible-header" style="background-color:#00838f; color:white; height:30px; padding-top:10px; padding-bottom:50px; font-size:18px">{{ $style->strSegStyleName }}</div>
										      	<div class="collapsible-body overflow-x">
										      		<div class="col s12">
												      	<div class="left col s6"><p style="color:gray; margin-left:20px">*Choose one of your desired design</p></div>
												      	<div class="pull-right col s6"  style="margin-top:2.8%; font-size:15px; padding-left:10%"><a class="modal-trigger tooltipped" href="#custom-fabric{{ $i+1 }}{{ $j+1 }}" data-position="bottom" data-delay="50" data-tooltip="Click this if you want a separate fabric for this specific style category"><u><b>Click to specify fabric for this specific style category</b></u></a></div>
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
														              <span><b>{{ $pattern->strSegPName }} ({{ number_format($pattern->dblPatternPrice, 2) }} PHP)</b></span> <!-- This will be the name of the pattern -->
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
							<!--End of modal for choosing design-->


							<!--Modal for choosing fabric facbric-->
							@foreach($patterns as $j => $pattern)
								<div id="custom-fabric{{ $i+1 }}{{ $j+1 }}" class="modal modal-fixed-footer" style="width:80%; height:85%;">
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

												
					                        	@foreach($fabrics as $k => $fabric)
					                        	<div class="col s6 custom-fabric-general">
					                        	<div class="center col s2" style="margin-top:60px">
					                        		<input name="custom-fabrics{{ $j+1 }}" id="custom{{ $fabric->strFabricID }}{{ $i + 1}}{{ $j+1 }}"  type="radio" class="filled-in segmentFabric{{ $j+1 }}" value="{{ $fabric->strFabricID }}"/>					                        	
					                        		<label for="custom{{ $fabric->strFabricID }}{{ $i + 1}}{{ $j+1 }}"></label>
					                        	</div>
					                        	 <div class="col s10">
											        <div class="card-panel teal lighten-4 z-depth-1">
											          <div class="row valign-wrapper">
											            <div class="center col s4">
											              <img src="{{URL::asset($fabric->strFabricImage)}}"class="responsive-img">
											            </div>
											            <div class="col s8"> 
											              <p><b id="{{ 'fabricText'.$fabric->strFabricID }}">{{ $fabric->strFabricName }} ({{ number_format($fabric->dblFabricPrice, 2) }} PHP)	</b></p> 
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
						@endforeach
							<!--End of Modal for choosing fabric-->



							
							<!--Modal for choosing fabric facbric-->
								<div id="fabric{{ $i+1 }}" class="modal modal-fixed-footer" style="width:80%; height:85%;">
		 								<h5><font color = "#1b5e20"><center>List of Available Fabrics</center> </font> </h5>
		    
				                        <div class="divider" style="height:2px"></div>				
				                        <div class="modal-content col s12">
												
												<div class="col s3">
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

												<div class="col s3">
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

												<div class="col s3">
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

												<div class="col s3">
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
												
												
												<div class="col s12" style="margin:20px">
													<div class="divider" style="height:2px gray solid"></div>
													<div class="divider" style="height:2px gray solid"></div>
												</div> 
												
												<p style="color:gray; margin-left:20px">*Choose one of your desired fabric</p>

												
					                        	@foreach($fabrics as $j => $fabric)
					                        	<div class="col s6 fabric-general">
					                        	<div class="center col s2" style="margin-top:60px">
					                        		<input name="fabrics{{ $i+1 }}" type="radio" class="filled-in segmentFabric{{ $i+1 }}" value="{{ $fabric->strFabricID }}" id="{{ $fabric->strFabricID }}{{ $i+1 }}{{ $j+1 }}" />					                        	
					                        		<label for="{{ $fabric->strFabricID }}{{ $i+1 }}{{ $j+1 }}"></label>
					                        	</div>
					                        	 <div class="col s10">
											        <div class="card-panel teal lighten-4 z-depth-1">
											          <div class="row valign-wrapper">
											            <div class="center col s4">
											              <img src="{{URL::asset($fabric->strFabricImage)}}"class="responsive-img">
											            </div>
											            <div class="col s8"> 
											              <p><b id="{{ 'fabricText'.$fabric->strFabricID }}">{{ $fabric->strFabricName }} ({{ number_format($fabric->dblFabricPrice, 2) }} PHP)	</b></p> 
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
	
							<!--End of Modal for choosing fabric-->



							<div class="col s6">
								<div class="col s6" style="margin-top:7%">
											<a style="color:white; margin-top:10px" class="modal-trigger btn tooltipped teal" data-position="bottom" data-delay="50" data-tooltip="Click to choose a segment pattern" href="#pattern{{ $i+1 }}"><i class="mdi-content-content-cut" style="padding-right:0.5%"></i><font size="-1" style="padding-bottom:-5%"><b>Choose Design</b></font></a>
											
											<!--<div class="file-field input-field">
												<a style="color:black" class="modal-trigger btn tooltipped btn-floating teal" data-position="bottom" data-delay="50" data-tooltip="Click to choose a segment pattern" href="#editDesign"><i class="mdi-editor-mode-edit"></i></a>
													
												<div class="file-path-wrapper">
													<input class="file-path validate" type="text">
												</div>
											</div>-->
								</div>
								
								<div class="col s6" style="margin-top:7%;">
											<a style="color:white; margin-top:10px" class="modal-trigger btn tooltipped teal" data-position="bottom" data-delay="50" data-tooltip="Click to choose a fabric" href="#fabric{{ $i+1 }}"><i class="mdi-maps-layers" style="padding-right:0.5%"></i><font size="-1" style="padding-bottom:-5%"><b>Choose Fabric</b></font></a>
											<!--<div class="file-field input-field">	
												<a style="color:black" class="modal-trigger btn tooltipped btn-floating teal" data-position="bottom" data-delay="50" data-tooltip="Click to choose a fabric" href="#editFabric"><i class="mdi-editor-mode-edit"></i></a>
                     								
												<div class="file-path-wrapper">
													<input class="file-path validate" type="text">
												</div>
											</div>-->
								</div>

								<!--Garment Description Here-->
								<div class="col s12" style="margin-top:1%; color:gray"><p>Garment description below:</p></div>
									<div class="col s12" style="margin-left:0">
									<div class="container">
										<div class="col s7" style="color:teal;"><p><b>Garment Category:</b></p></div>
										<div class="col s5"><p>{!! $segments[$i]->strGarmentCategoryName !!}</p></div>

										<div class="col s7" style="color:teal;"><p><b>Garment Segment:</b></p></div>
										<div class="col s5"><p>{!! $segments[$i]->strSegmentName !!}</p></div>

										<div class="col s7" style="color:teal;"><p><b>Price starts from:</b></p></div>
										<div class="col s5" style="color:black;font-weight:bold"><p>{{ number_format($segments[$i]->dblSegmentPrice, 2) }} PHP</p></div>
									</div>
									</div>
							</div>
							<div class="col s12"><div class="divider" style="height:2px; margin-top:10px; margin-bottom:10px"></div></div>
							@endfor
						</div>
							<!--End of First Garment-->
						</div>

						<div class="col s12">
							<button type="submit" class="right waves-effect waves-green btn" style="background-color:teal; margin-left:80px; margin-right:30px">Save</button>
							<a href="{{URL::to('transaction/walkin-company-customize-orders')}}" class="right waves-effect waves-green btn" style="background-color:teal">Cancel</a>
						</div>
					{!! Form::close() !!}
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

		  $(classesToUpdate).show();
		}

		updateUI();
	</script>

	<script>
		var type = $('#custom-fabric-type');
		var color = $('#custom-fabric-color');
		var pattern = $('#custom-fabric-pattern');
		var threadCount = $('#custom-fabric-thread-count');

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
		  $('.custom-fabric-general').hide();

		  var typeValue = type.val();
		  var colorValue = color.val();
		  var patternValue = pattern.val();
		  var threadValue = threadCount.val();
		  
		  if (typeValue == 'TA' && colorValue == 'CA' && patternValue == 'PA' && threadValue == 'TCA'){
		  	return $('.custom-fabric-general').show();
		  } 
		  
		  var typeClass = typeValue == 'TA' ? '' : '.' + typeValue;
		  var colorClass = colorValue == 'CA' ? '' : '.' + colorValue;
		  var patternClass = patternValue == 'PA' ? '' : '.' + patternValue;
		  var threadClass = threadValue == 'TCA' ? '' : '.' + threadValue;

		  var classesToUpdate = typeClass + colorClass + patternClass + threadClass;

		  $(classesToUpdate).show();
		}

		updateUI();
	</script>

	<script>
		 $(document).ready(function(){
		    $('.collapsible').collapsible({
		      accordion : true // A setting that changes the collapsible behavior to expandable instead of the default accordion style
		    });
		  });
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