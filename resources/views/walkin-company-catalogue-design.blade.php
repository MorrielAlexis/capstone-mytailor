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
						<div class="col s12">
							<div class="col s3">
								<div class="input-field col s12" style="background-color:teal">
										<select class="browser-default">
											<option value="" readonly style="color:gray">Select a category...</option>
										    <option value="1" class="circle">Uniform</option>
										    <option value="2" class="circle">Suit</option>
										    <option value="3" class="circle">Gown</option>
										</select>
								</div>
							</div>
						
							<div class="col s3">
								<div class="input-field col s12" style="background-color:teal">
										<select class="browser-default">
											<option value="" readonly style="color:gray">Select a segment...</option>
										    <option value="1" class="circle">Polo</option>
										    <option value="2" class="circle">Pants</option>
										    <option value="3" class="circle">Skirt</option>
										</select>
								</div>
							</div>

							<div class="col s3" style="margin-bottom:20px">
								<div class="input-field col s12" style="background-color:teal">
										<select class="browser-default">
											<option value="" readonly style="color:gray">Show garments for...</option>
										    <option value="1" class="circle">Male</option>
										    <option value="2" class="circle">Female</option>
										    <option value="3" class="circle">All</option>
										</select>
										
								</div>
							</div>

							<div class="col s3" style="margin-bottom:20px; background-color:white">
						        <nav class="white" style="border: 2px black inset">
						            <div class="input-field col s12" style="padding-top:20px;">
						                <input id="search" type="search" required="" placeholder="Search...">
						                <label for="search"><i class="large mdi-action-search" style="color:gray"></i></label>
						                <i class="mdi-navigation-close"></i>
						            </div>
						        </nav>
							</div>

						</div>


						<div class="divider"></div>

						<div class="col s12">
							<div class="divider"></div>
						</div>


					<div class="col s12" style="margin-top:20px">
							<p class="center-align" style="color:teal"><b>CHOOSE AMONG THE DESIGNS AVAILABLE</b></p>

						<div class="col s4" style="margin-top:20px; margin-bottom:20px">
			           		 <div class="container">
			         			 <div class="z-depth-1 card medium" style="border:3px gray solid">
			           				 <div class="card-image">
			              				<img class="responsive-img" height = "80%" src="{{URL::to('imgCatalogue/men-polo-design-1.jpg')}}">
			           				 </div>
			            			<div class="card-content">
			             				<p class="center-align">
			             				 <span class="card-title" style="color:teal; font-size:20px"><b>Classic straight-cut</b></span>
			             					 <p class="center-align"><font color="red">Fabric(s) used:</font></p>
			             					 <p class="center-align">Blue Cotton</p>
			           				 	</p>
			           				 </div>

			           				 <div class="divider"></div>
			           				 <center><a href="" style="font-size:15px; color:#fbc02d "><b>SEE DESIGN</b></a></center>
			         			 </div>

			         			 <div class="center col s12">
				          				<input name="catDesigns" type="radio" class="filled-in" id="polo"/>
		      							<label for="polo"></label>
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
			             					 <p class="center-align"><font color="red">Fabric(s) used:</font></p>
			             					 <p class="center-align">Plain Cotton</p>
			           				 	</p>
			           				 </div>
			           				 <div class="divider"></div>
			           				 <center><a href="" style="font-size:15px; color:#fbc02d "><b>SEE DESIGN</b></a></center>
			         			 </div>

			         			 <div class="center col s12">
				          				<input name="catDesigns" type="radio" class="filled-in" id="long_sleeve"/>
		      							<label for="long_sleeve"></label>
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
			             					 <p class="center-align"><font color="red">Fabric(s) used:</font></p>
			             					 <p class="center-align">Just Another Cotton</p>          					 
			           				 	</p>
			           				 </div>
			           				 <div class="divider"></div>
			           				 <center><a href="" style="font-size:15px; color:#fbc02d "><b>SEE DESIGN</b></a></center>
			         			 </div>

			         			 <div class="center col s12">
				          				<input name="catDesigns" type="radio" class="filled-in" id="short_sleeve"/>
		      							<label for="short_sleeve"></label>
		      					</div>
			      			</div>
			       		</div>

			       		
			       	</div>


				</div>

				<div class="col s12"><div class="divider" style="height:2px; margin-top:20px; margin-bottom:20px"></div></div>
					<div class="col s12">
						<a href="{{URL::to('transaction/walkin-company')}}" class="left btn" style="background-color:teal">Cancel Transaction</a>
						<a class="right waves-effect waves-green btn" style="background-color:teal; margin-left:80px; margin-right:30px" href="{{URL::to('transaction/walkin-company-customize-orders-package')}}">Save</a>
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