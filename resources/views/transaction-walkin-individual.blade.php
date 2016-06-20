@extends('layouts.master')

@section('content')

	<div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><center><h3><b>Welcome to <font color="white">MyTailor</font></b></h3></center></span>
        <center><h5>Walk-in Individual - Order Process</h5></center>
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
							<div class="col s5">
								<div class="input-field col s12">
										<select>
											<option disabled>Choose a garment category...</option>
										    @foreach($categories as $category)
										    	<option value="{{ $category->strGarmentCategoryID }}" class="circle">{{ $category->strGarmentCategoryName }}</option>
											@endforeach
										</select>
								</div>
							</div>
						

							<div class="col s5" style="margin-bottom:20px">
								<div class="input-field col s12">
										<select>
											<option disabled>Show garments for...</option>
										    <option value="M" class="circle">Male</option>
										    <option value="F" class="circle">Female</option>
										    <option value="A" selected class="circle">All</option>
										</select>
										
								</div>
							</div>

							<div class="col s2" style="margin-bottom:20px; background-color:white">
						       <a href="#!" class="btn" style="background-color:#26a69a; color:white; margin-top:20px; margin-left:20px">Search</a>
							</div>

					</div>
					{!! Form::open(['url' => 'transaction/walkin-individual']) !!}
						<div class="col s12">
							<div class="divider"></div>
								<a class="left btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to customize orders" style="margin-top:30px; font-size:15px; color:white; background-color: teal; opacity:0.90" href="{{URL::to('/transaction/walkin-individual-customize-orders')}}"><!--<i class="mdi-editor-add" style="font-size:20px;">-->  Reset Order<!--</i>--></a>
								<button type="submit" class="right btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to add orders to cart " style="margin-top:30px; background-color: teal; font-size:15px; color:white" href="#!"><!--<i class="mdi-editor-add" style="font-size:20px;">-->  View Cart<!--</i>--></a>							
						</div>

						<div class="col s12" style="margin-bottom:20px"></div>
				
						<div class="col s12" style="margin-top:15px">
							<div class="divider" style="margin-bottom:40px; height:2px"></div>
							<p class="center-align" style="color:teal; margin-bottom:40px"><b>CHOOSE AMONG AVAILABLE PRODUCTS</b></p>
						
						@foreach($garments as $garment)
							
								<div class="col s4">
										<div class="center col s12">
					          				<input type="checkbox" name="cbx-segment-name[]"  class="filled-in" id="{{ $garment->strSegmentID }}" value="{{ $garment->strSegmentID }}" style="padding:5px"/>
			      							<label for="{{ $garment->strSegmentID }}"><font size="+1">{{ $garment->strSegmentName }}</font></label>
			      							@if($garment->strSegmentSex == 'M')<label for="{{ $garment->strSegmentID }}"><font color="gray">Male</font></label>
			      							@elseif($garment->strSegmentSex == 'F')<label for="{{ $garment->strSegmentID }}"><font color="gray">Female</font></label>
			      							@endif
			      						</div>

										<div class="center col s12"><img src="{{URL::asset($garment->strSegmentImage)}}" style="height:200px; width:250px; padding:10px; border:3px gray solid"></div>
									
									<center><h6>Quantity</h6></center>
					                  <div class="row">
					                    <div class="col s3 center"><i class="small mdi-content-add-circle" style="color:teal"></i></div>
					                    <div class="input-field col s6" style="margin-top:-2px;">
					                      <input class="center" name="int-segment-qty[]" id="quantity" value="1" type="number">
					                    </div>
					                    <div class="col s3 center"><i class="small mdi-content-remove-circle" style="color:teal"></i></div>
					                  </div>
								</div>
						@endforeach
						</div>

						<div class="col s12">
							<div class="divider"></div>
						<div>

							<div class="col s12">
								<a class="right btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to customize orders" style="margin-left:40px; margin-top:30px; font-size:15px; color:white; background-color: teal; opacity:0.90" href="{{URL::to('/transaction/walkin-individual-customize-orders')}}"><!--<i class="mdi-editor-add" style="font-size:20px;">-->  Customize Orders<!--</i>--></a>
								<a class="right btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to add orders to cart " style="margin-top:30px; background-color: teal; font-size:15px; color:white" href="#!"><!--<i class="mdi-editor-add" style="font-size:20px;">-->  Add to Cart<!--</i>--></a>
								<a class="left tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to see available package 5sets" href="{{URL::to('/transaction/walkin-individual-bulk-orders')}}" style=" margin-top:30px; font-size:18px;"><i class="mdi-navigation-arrow-back"></i><b><u>Go to Bulk Orders</u></b></a>
							</div>
						</div>

					</div>
					{!! Form::close() !!}
					<div class="col s12">
						<div class="divider" style="height:2px; margin-top:30px"></div>      	
		      			<center><p><font color="gray">End of product list for MyTailor</font></p></center>
					</div>
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