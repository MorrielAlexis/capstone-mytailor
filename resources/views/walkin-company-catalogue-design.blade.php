@extends('layouts.master')

@section('content')

	<div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><center><h3><b>Welcome to <font color="white">MyTailor</font></b></h3></center></span>
        <center><h5>Walk-in - Catalogue Designs</h5></center>
      </div>
    </div>

	<div class="row">
		<div class="col s12 m12 l12">

			<div class="col s12">
				<ul class="tabs transparent" style="margin-top:15px">
					<li class="tab col s12" style="border-top-left-radius: 20px; border-top-right-radius: 20px; background-color: #00b0ff;"><a style="color:black; padding-top:5px; opacity:0.80" href="#shoppingCart"></a></li>	
					<div class="indicator white" style="z-index:1"></div>
	            </ul>
				<div id="catalogue-design" class="card-panel">
					<div class="card-content">
						<div class="row">
						<div class="col s6">
							<div class="col s6"><p>Choose your garment type</p></div>
							<div class="col s6">
								<div class="input-field col s12">
										<select>
										    <option value="1" class="circle">Uniform</option>
										    <option value="2" class="circle">Suit</option>
										    <option value="3" class="circle">Uniform</option>
										</select>
								</div>
							</div>
						</div>

						<div class="col s6">
							<div class="col s6"><p>Choose your garment segment</p></div>
							<div class="col s6">
								<div class="input-field col s12">
										<select>
										    <option value="1" class="circle">Polo</option>
										    <option value="2" class="circle">Pants</option>
										    <option value="3" class="circle">Skirt</option>
										</select>
								</div>
							</div>
						</div>

						<div class="col s12" style="margin-bottom:20px">
							<div class="col s3">
		      							<label for="label"><font size="+0.5">Show garments for:</font></label>
		      				</div>
							<div class="col s3">
				          				<input type="radio" class="filled-in" id="male" />
		      							<label for="male">Male Only</label>
		      				</div>
		      				<div class="col s3">
				          				<input type="radio" class="filled-in" id="female" />
		      							<label for="female">Female Only</label>
		      				</div>
		      				<div class="col s3">
				          				<input type="radio" class="filled-in" id="all" checked/>
		      							<label for="all">All</label>
		      				</div>
						</div>

						<div class="divider"></div>

						<div class="col s12">
							<div class="divider"></div>
						</div>


					<div class="col s12" style="margin-top:20px">
							<p class="center-align" style="color:teal">CHOOSE AMONG THE DESIGNS AVAILABLE</p>

						<div class="col s4" style="margin-top:20px; margin-bottom:20px">
			           		 <div class="container">
			         			 <div class="z-depth-1 card medium" style="border:3px gray solid">
			           				 <div class="card-image">
			              				<img class="responsive-img" height = "80%" src="{{URL::to('imgCatalogue/men-polo-design-1.jpg')}}">
			           				 </div>
			            			<div class="card-content">
			             				<p class="center-align">
			             				 <span class="card-title" style="color:teal; font-size:20px"><b>Classic straight-cut</b></span>
			             					 <p class="center-align" style="color:gray">This polo design is unbelievably comfortable and I have nothing more to say.</p>
			           				 	</p>
			           				 </div>

			         			 </div>

			         			 <div class="center col s12">
				          				<input type="checkbox" class="filled-in" id="male_set"/>
		      							<label for="male_set"></label>
		      					</div>
			      			</div>
			       		 </div>
			       		
			       		<div class="col s4" style="margin-top:20px; margin-bottom:20px">
			           		 <div class="container">
			         			 <div class="z-depth-1 card medium" style="border:3px gray solid">
			           				 <div class="card-image">
			              				<img class="responsive-img" height = "80%" src="{{URL::to('imgCatalogue/men-polo-design-2.jpg')}}">
			           				 </div>
			            			<div class="card-content">
			             				<p class="center-align">
			             				 <span class="card-title" style="color:teal; font-size:20px"><b>Long-sleeve Polo</b></span>
			             					 <p class="center-align" style="color:gray">Looking for something formal? This is the perfect choice for you!</p>
			           				 	</p>
			           				 </div>

			         			 </div>

			         			 <div class="center col s12">
				          				<input type="checkbox" class="filled-in" id="male_set"/>
		      							<label for="male_set"></label>
		      					</div>
			      			</div>
			       		</div>

			       		<div class="col s4" style="margin-top:20px; margin-bottom:20px">
			           		 <div class="container">
			         			 <div class="z-depth-1 card medium" style="border:3px gray solid">
			           				 <div class="card-image">
			              				<img class="responsive-img" height = "80%" src="{{URL::to('imgCatalogue/unisex-design-polo-1.jpg')}}">
			           				 </div>
			            			<div class="card-content">
			             				<p class="center-align">
			             				 <span class="card-title" style="color:teal; font-size:20px"><b>Unisex Polo</b></span>
			             					 <p class="center-align" style="color:gray">If you can't seem to decide on which one to take, it's safer to go with this design.</p>
			           				 	</p>
			           				 </div>

			         			 </div>

			         			 <div class="center col s12">
				          				<input type="checkbox" class="filled-in" id="male_set"/>
		      							<label for="male_set"></label>
		      					</div>
			      			</div>
			       		</div>

			       		<div class="col s4" style="margin-top:20px; margin-bottom:20px">
			           		 <div class="container">
			         			 <div class="z-depth-1 card medium" style="border:3px gray solid">
			           				 <div class="card-image">
			              				<img class="responsive-img" height = "80%" src="{{URL::to('imgCatalogue/women-polo-design-1.jpg')}}">
			           				 </div>
			            			<div class="card-content">
			             				<p class="center-align">
			             				 <span class="card-title" style="color:teal; font-size:20px"><b>Slim-fit Polo</b></span>
			             					 <p class="center-align" style="color:gray">Wanna show that lovely curves but has to settle for an office uniform. This one's perfect for you.</p>
			           				 	</p>
			           				 </div>

			         			 </div>

			         			 <div class="center col s12">
				          				<input type="checkbox" class="filled-in" id="male_set"/>
		      							<label for="male_set"></label>
		      					</div>
			      			</div>
			       		</div>

			       		<div class="col s4" style="margin-top:20px; margin-bottom:20px">
			           		 <div class="container">
			         			 <div class="z-depth-1 card medium" style="border:3px gray solid">
			           				 <div class="card-image">
			              				<img class="responsive-img" height = "80%" src="{{URL::to('imgCatalogue/women-polo-design-2.jpg')}}">
			           				 </div>
			            			<div class="card-content">
			             				<p class="center-align">
			             				 <span class="card-title" style="color:teal; font-size:20px"><b>Modern White Polo</b></span>
			             					 <p class="center-align" style="color:gray">What else is there to say? Just choose this design. It's perfect!</p>
			           				 	</p>
			           				 </div>

			         			 </div>

			         			 <div class="center col s12">
				          				<input type="checkbox" class="filled-in" id="male_set"/>
		      							<label for="male_set"></label>
		      					</div>
			      			</div>
			       		</div>

			       		<div class="col s4" style="margin-top:20px; margin-bottom:20px">
			           		 <div class="container">
			         			 <div class="z-depth-1 card medium" style="border:3px gray solid">
			           				 <div class="card-image">
			              				<img class="responsive-img" height = "80%" src="{{URL::to('imgCatalogue/women-polo-design-3.jpg')}}">
			           				 </div>
			            			<div class="card-content">
			             				<p class="center-align">
			             				 <span class="card-title" style="color:teal; font-size:20px"><b>Plain Polo</b></span>
			             					 <p class="center-align" style="color:gray">Do you love Coldplay? I do, too. And if you love them, choose this! You can be Chris' next Gwyn.</p>
			           				 	</p>
			           				 </div>

			         			 </div>

			         			 <div class="center col s12">
				          				<input type="checkbox" class="filled-in" id="male_set"/>
		      							<label for="male_set"></label>
		      					</div>
			      			</div>
			       		</div>


			       	</div>


				</div>

				<div class="col s12"><div class="divider" style="height:2px; margin-top:20px; margin-bottom:20px"></div></div>
					<div class="col s12">
						<a class="right waves-effect waves-green btn" style="background-color:teal; margin-left:80px; margin-right:80px" href="{{URL::to('transaction/walkin-company-customize-orders-package')}}">Save</a>
						<a href="{{URL::to('transaction/walkin-company-customize-orders-package')}}" class="right waves-effect waves-green btn" style="background-color:teal">Cancel</a>
					</div>

					<div class="col s12"><div class="divider" style="height:2px; margin-top:20px; margin-bottom:20px"></div></div>      	
			      		<center><p><font color="gray">End of list of catalogue designs</font></p></center>
			</div><!--Card content-->
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