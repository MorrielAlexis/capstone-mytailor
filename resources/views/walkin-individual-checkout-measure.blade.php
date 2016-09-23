@extends('layouts.master')

@section('content')


	<div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><center><h3><b>Welcome to <font color="white">MyTailor</font></b></h3></center></span>
        <center><h5>Walk-in Individual - Payout</h5></center>
      </div>
    </div>

	<div class="row" style="padding:30px">
        <div class="col s12" style="padding-left:15%">
	        <ul class="breadcrumb">
				<li><a>1. Fill-up form</a></li>
				<li><a class="active" href="#measure-detail">2. Add measurement detail</a></li>
				<li><a>3. Payment</a></li>
			</ul>
		</div>

		<!-- Tab for Adding Measurement Detail-->
	    <div id="measure-detail" class = "hue col s12" style="background-color: white; border:2px outset">
	        <div class="row">
		        <div class="col s12 m12 l12">
                	<span class="page-title" style="margin:15px"><center><h5><b>Measurement Detail</b></h5></center></span>
              		<div class="divider" style="height:1px; background-color:#80d8ff"></div>
              		<div class="divider" style="height:1px; background-color:#80d8ff"></div>
              	</div>
	       	</div>

	       	<!--<div class="container" style="color:gray">
		       	<center><h6><b>NOTES WHEN TAKING MEASUREMENTS:</b></h6></center>
		       	<center><h6>* Use "inches" (no allowance).</h6></center>
	      		<center><h6>* Place one (1) finger between bust and measuring tape while measuring waist.</h6></center>
	      		<center><h6>* Place one (1) finger between waistline and measuring tape while measuring waist.</h6></center>
	      		<center><h6>* Measure four (4) inches from waistline (downward) and place three (3) fingers between hips and measuring tape to get measurement of first hip.</h6></center>
	      		<center><h6>* Meaure eight (8) inches from waistline and place three (3) fingers between hips and measuring tape to get measurement second hip.</h6></center>
	      		<center><h6>* Measure from waistline to knee to get measurement of length of skirt.</h6></center>
	      		<div class="divider"></div>
	      		<div class="divider"></div>
	      	</div>-->
			{!! Form::open(['url' => 'transaction/walkin-individual-save-measurements', 'method' => 'POST']) !!}
			<div class="col s12" style="margin-bottom:10px">
				<div class="col s12">
					<div class="col s4"><p style="color:gray"><b>Measurement Type</b></p></div>
					<div class="col s8">		
							<select id = "measurement-category">
								@foreach($categories as $category)
									<option value="{{ $category->strMeasurementCategoryID }}" class="circle">{{ $category->strMeasurementCategoryName }}</option>
								@endforeach
							</select>
					</div>
				</div>


				
			<!--

				<div style="color:gray" class="col s5"> 
					<div class="col s7"><p style="color:gray; margin-top:5px; font-size:15px"><b>No. of Measurement Profile:</b></p></div>                
                  	<div class="col s5"><center><input class="center" name="num-meas-profile" id="num-meas-profile" type="number" value=""></div>
                </div>

                <div class="col s2"><a href="" class="btn" style="background-color:teal; color:white; margin-top:10px">Add</a></div>
			
			</div>-->

			@foreach($segments as $i => $segment)
			<div class="col s12"><div class="divider" style="height:2px; background-color:gray"></div></div><!--divider-->


	       	<div class="row" style="background-color:white; margin-top:20px">


					<!-- <div class="col s8" style="margin-left:20px;color:red">
						<p><b>Unit of Measurement</b></p>
	                        	<div class="col s6">
			          				<input name="uom{{ $i+1 }}" value="cm" type="radio" class="filled-in payment" id="cm{{ $i+1 }}" />
	      							<label for="cm{{ $i+1 }}">centimeter (cm)</label>
								</div>
								<div class="col s6">
				          			<input name="uom{{ $i+1 }}" value="in" type="radio" class="filled-in payment" id="in{{ $i+1 }}" />
		      						<label for="in{{ $i+1 }}">inch (in)</label>
		      					</div>
	      			</div> -->

		            		<div class="col s12" style="margin-top:20px">
					          	<input type="checkbox" name="cbx-measure-all[]"  class="filled-in cbx-measure-all" id="{{ $segment['strSegmentID'] }}" value="{{ $segment['strSegmentID'] }}" style="padding:5px"/>
					          	<label for="{{ $segment['strSegmentID'] }}"><font size="+1"><b>Apply to all</b></font></label>
					        </div>

			
			@for($k = 0; $k < $quantities[$i]; $k++) 
	            	<div class="col s12" style="padding:20px"> 
	            		
		            	<div id="for_top" class="col s12" style="color:black">


		            		<h5><b>Parts to be measured - {{ $segment['strSegmentName'] }}</b></h5>
		            		
							<!--if Body and Cloth Measurement-->
			            	@foreach($measurements as $j => $measurement)
			            		@if($measurement->strMeasDetSegmentFK == $segment['strSegmentID'])
		            				<div class="container measurement-general {{ $measurement->strMeasCategoryFK }}"> 
					            	   	<div style="color:black; padding-left:140px" class="input-field col s6 ">   
					            	   		<div class="col s8">
						            	   		<input class="right" type="hidden" name="detailName{{ $i+1 }}{{ $j+1 }}{{ $k+1 }}" value="{{ $measurement->strMeasurementDetailID }}">              
					                            <input class="right" name="{{ $measurement->strMeasurementDetailID }}{{ $i+1 }}{{ $k+1 }}" type="text">
					                        </div>
					                        <div class="col s4">
				                            	<label style="color:teal" for="{{ $measurement->strMeasurementDetailID }} {{ $i+1 }}{{ $k+1 }}"><b>{{ $measurement->strMeasDetailName }}</b> (cm): </label>
				                        	</div>
				                        </div>
		                    		</div>
			                    @endif
		                    @endforeach
							<!--End of Body and Cloth Measurement-->

							<!--if Standard Size Measurement-->
							<div class="col s12 z-depth-1 measurement-general MEASCAT001" style="padding:2%">
								<div class="container">
									<div class="left col s6">
										<center><img src="{{ URL::asset($segment['strSegmentImage']) }}" style="height:60%; width:60%; border:3px gray solid"></center>	
										<p><center>{{ $segment['strSegmentName'] }}</center></p>							          	
									</div><!--this will be the garment detail-->

									<div class="right col s6" style="margin-top:2%">
										<div class="col s6"><p style="color:teal" for="standard_size"><b>Choose Fit Type:</b></p></div>  		
					            	   	<div style="color:black;" class="col s6">                 	
				                          	<select>
			    								<option value="">Normal Fit</option>
		    								</select><!--Standard sizes for the specific Garment-->
				                        </div>  
				                    </div> 

									<div class="right col s6" style="margin-top:5%">
										<div class="col s6"><p style="color:teal" for="standard_size"><b>Choose Standard Size:</b></p></div>  		
					            	   	<div style="color:black; margin-top:2%" class="col s6">                 	
				                          	<select>
				                          		@foreach($standard_categories as $standard_category)
			    									<option value="{{ $standard_category->strStandardSizeCategoryID }}">{{ $standard_category->strStandardSizeCategoryName }}</option>
		    									@endforeach
		    								</select><!--Standard sizes for the specific Garment-->
				                        </div>  
				                    </div> 
			                    </div>
			                </div>

			                <div class="col s12"><div class="divider" style="height:2px gray solid; margin:20px"></div></div>
							<!--End of standard size measurement-->

	                    </div>

	                    <p style="color:red">In case of multiple measurements</p>
	                    	<div style="color:black;" class="input-field col s5">                 
	                          <div class="col s8" style="margin-left:55%; padding-right:18%"><input id="length" name="profile_name{{ $i+1 }}" type="text" class=""></div>
	                          <div class="col s4"><label style="color:gray" for="length"><b>Measurement Profile Name: </b></label></div>
	                    	</div>

	                    	<div style="color:gray" class="input-field col s3">                 
	                          <select name="profile_sex{{ $i+1 }}">
							    <option value="" disabled selected color="red">Sex</option>
							    <option value="M">Female</option>
							    <option value="F">Male</option>
							  </select>
	                    	</div>
							
	                    	<div style="color:gray" class="input-field col s3">                 
	                          <select>
							    <option value="" disabled selected color="red">Target Garment</option>
							    <option value="1">{{ $segment['strGarmentCategoryName'] }} - {{ $segment['strSegmentName'] }}</option>
							  </select>
	                    	</div>

	                    	<!-- <div class="col s1"><a href="#!" class="btn-floating" style="background-color:#a7ffeb; margin-top:20px"><i class="mdi-navigation-check" style="color:black;"></i></a></div> -->
	            	</div>
	    @endfor
				@endforeach
                    <div class="col s12"><div class="divider" style="height:5px; color:gray; margin-top:15px; margin-bottom:15px"></div></div>
				
				
                <button type="submit" class="right btn tooltipped" data-position="top" data-delay="50" data-tooltip="Click to save measurements and begin processing" style="background-color:teal; margin-right:50px; padding:9.5px; padding-bottom:45px; color:white"><!--<i class="mdi-action-done"> -->Save Measurements<!--</i>--></button>

				{!! Form::close() !!}
                    
				<!--end of bottom buttons-->

	        </div>

	        <div class="divider" style="height:1px; margin-bottom:20px; margin-top:30px"></div>
	      	
	      		<p><font color="gray"><center>End of Measurement Form</center></font></p>
	

	    </div>
	    <!-- End of Tab for Adding Measurement Detail-->

	</div>

@stop

@section('scripts')
	
	<script>
		$('#measurement-category').change(function(){
			var measurementCat = $('#measurement-category').val();
			updateUI(measurementCat);
		});

		function updateUI(category)
		{
			$('.measurement-general').hide();
			$('.' + category).show();
		}
	</script>

	<script>
	  $(document).ready(function() {
	  		$('.measurement-general').hide();

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