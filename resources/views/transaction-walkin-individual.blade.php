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
							<div class="col s4">
								<div class="input-field col s12" style="background-color:teal">
										<select class="browser-default">
											<option value="" readonly style="color:gray">Choose a garment category...</option>
										    <option value="1" class="circle">Uniform</option>
										    <option value="2" class="circle">Suit</option>
										    <option value="3" class="circle">Gown</option>
										</select>
								</div>
							</div>
						

							<div class="col s4" style="margin-bottom:20px">
								<div class="input-field col s12" style="background-color:teal">
										<select class="browser-default">
											<option value="" readonly style="color:gray">Show garments for...</option>
										    <option value="1" class="circle">Male</option>
										    <option value="2" class="circle">Female</option>
										    <option value="3" class="circle">All</option>
										</select>
										
								</div>
							</div>

							<div class="col s4" style="margin-bottom:20px; background-color:white">
						        <nav class="white" style="border: 2px black inset">
						            <div class="input-field col s12" style="padding-top:20px;">
						                <input id="search" type="search" required="" placeholder="Search...">
						                <label for="search"><i class="large mdi-action-search" style="color:gray"></i></label>
						                <i class="mdi-navigation-close"></i>
						            </div>
						        </nav>
							</div>

					</div>

						<div class="col s12">
							<div class="divider"></div>
								<a class="left btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to customize orders" style="margin-top:30px; font-size:15px; color:white; background-color: teal; opacity:0.90" href="{{URL::to('/transaction/walkin-individual-customize-orders')}}"><!--<i class="mdi-editor-add" style="font-size:20px;">-->  Reset Order<!--</i>--></a>
								<a class="right btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to add orders to cart " style="margin-top:30px; background-color: teal; font-size:15px; color:white" href="#!"><!--<i class="mdi-editor-add" style="font-size:20px;">-->  View Cart<!--</i>--></a>							
						</div>

						<div class="col s12" style="margin-bottom:20px"></div>

						<div class="col s12" style="margin-top:15px">
							<div class="divider" style="margin-bottom:40px; height:2px"></div>
							<p class="center-align" style="color:teal; margin-bottom:40px"><b>CHOOSE AMONG AVAILABLE PRODUCTS</b></p>
							<div class="col s4">
									<div class="center col s12">
				          				<input type="checkbox" class="filled-in" id="polo-male" style="padding:5px"/>
		      							<label for="polo-male" ><font size="+1">Polo</font></label>
		      							<label for="polo-male" ><font color="gray">Male</font></label>
		      						</div>
									<div class="center col s12"><img src="{{URL::to('img/male-uniform-plain.jpg')}}" style="height:200px; width:250px; padding:10px; border:3px gray solid"></div>
								
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
									<div class="center col s12">
										<input type="checkbox" class="filled-in" id="pants-male" style="padding:5px" />
		      							<label for="pants-male"><font size="+1">Pants</font></label>
		      							<label for="pants-male" ><font color="gray">Male</font></label>
		      						</div>
									<div class="center col s12"><img src="{{URL::to('img/male-uniform-pants-plain.jpg')}}" style="height:200px; width:250px; padding:10px; border:3px gray solid"></div>
								
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
									<div class="center col s12">
										<input type="checkbox" class="filled-in" id="shorts-male" style="padding:5px"/>
		      							<label for="shorts-male"><font size="+1">Shorts</font></label>
		      							<label for="shorts-male" ><font color="gray">Male</font></label>
		      						</div>
									<div class="center col s12"><img src="{{URL::to('img/male-uniform-shorts-plain.jpg')}}" style="height:200px; width:250px; padding:30px; border:3px gray solid"></div>
								
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
									<div class="center col s12">
				          				<input type="checkbox" class="filled-in" id="polo-female" style="padding:5px"/>
		      							<label for="polo-female" ><font size="+1">Polo</font></label>
		      							<label for="polo-female" ><font color="gray">Female</font></label>
		      						</div>
									<div class="center col s12"><img src="{{URL::to('img/female-uniform-plain.jpeg')}}" style="height:200px; width:250px; padding:10px; border:3px gray solid"></div>
								
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
									<div class="center col s12">
										<input type="checkbox" class="filled-in" id="pants-female" style="padding:5px" />
		      							<label for="pants-female"><font size="+1">Pants</font></label>
		      							<label for="pants-female" ><font color="gray">Female</font></label>
		      						</div>
									<div class="center col s12"><img src="{{URL::to('img/female-uniform-pants.jpg')}}" style="height:200px; width:250px; padding:10px; border:3px gray solid"></div>
								
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
									<div class="center col s12">
										<input type="checkbox" class="filled-in" id="skirt-female" style="padding:5px"/>
		      							<label for="skirt-female"><font size="+1">Skirt</font></label>
		      							<label for="skirt-female" ><font color="gray">Female</font></label>
		      						</div>
									<div class="center col s12"><img src="{{URL::to('img/female-uniform-skirt.jpg')}}" style="height:200px; width:250px; padding:30px; border:3px gray solid"></div>
								
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
								<a class="right btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to customize orders" style="margin-left:40px; margin-top:30px; font-size:15px; color:white; background-color: teal; opacity:0.90" href="{{URL::to('/transaction/walkin-individual-customize-orders')}}"><!--<i class="mdi-editor-add" style="font-size:20px;">-->  Customize Orders<!--</i>--></a>
								<a class="right btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to add orders to cart " style="margin-top:30px; background-color: teal; font-size:15px; color:white" href="#!"><!--<i class="mdi-editor-add" style="font-size:20px;">-->  Add to Cart<!--</i>--></a>
								<a class="left tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to see available package 5sets" href="{{URL::to('/transaction/walkin-individual-bulk-orders')}}" style=" margin-top:30px; font-size:18px;"><i class="mdi-navigation-arrow-back"></i><b><u>Go to Bulk Orders</u></b></a>
							</div>
						</div>

					</div>

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