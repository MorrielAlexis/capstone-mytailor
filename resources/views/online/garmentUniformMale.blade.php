@extends('layouts.masterOnline')

@section('content')

	<div class="section">	

		<div id="maleuniform" style="height:500px; margin-top: -15px;">
	  		<div style="height:70px"></div>
	  		<center><h1 style="color:white; font-family:'Pacifico',cursive;">Custom tailored men's shirt</h1></center>
	  		<center><a style="font-family:'Yatra One',cursive; font-size:20px; margin-top:45px; padding-top:15px; padding-left:5px; padding-right:5px; width:300px; height:70px; background:rgb(236, 59, 65);" class="white-text modal-trigger waves-effect waves-light btn btn-small center-text" href="{{URL::to('/customize-mens-fabric')}}">CUSTOMIZE YOURS NOW!</a></center>
		</div>

		<div style= "height:20px;"></div>

		<div class="section white container" style="width:95%; padding-left:20px; padding-right:20px;">

			<div class="row">

				<div class="col s4 center" style="padding:20px;">
                    <figure>
                        <img class = "responsive-img" src="imgOnlineUniform/male-uniform-pants-plain.jpg">
                        <figcaption style="background-color:#ede7f6">Price starts at Php 2000.00</figcaption>
                    </figure>		
				</div>

				<div class="col s4 center" style="padding:20px;">
                    <figure>
                        <img class = "responsive-img" src="imgOnlineUniform/male-uniform-shorts-plain.jpg">
                        <figcaption style="background-color:#ede7f6">Price starts at Php 2000.00</figcaption>
                    </figure>	
				</div>

				<div class="col s4 center" style="padding:20px;">
                    <figure>
                        <img class = "responsive-img" src="imgOnlineUniform/male-uniform-plain.jpg">
                        <figcaption style="background-color:#ede7f6">Price starts at Php 2000.00</figcaption>
                    </figure>	
				</div>

			</div>

			<div class="divider container" style="margin-bottom:20px;"></div>

			<div class="row">
				<div class="col s6">
					<img style="padding:20px;" class="responsive-img" src="imgOnline/unimehe3.jpg">
				</div>
				<div class="col s6" style="padding:20px;">
					<h4 style="font-family:'Lobster Two',cursive;">Custom tailored uniforms - designed by you</h4>
					<h6>Buying a custom tailored shirt from us is always an excellent choice. We promise to give you:</h6>
					<ul style="font-family:'Yatra One',cursive;">
						<li>Guaranteed perfect fit</li>
						<li>Highest quality fabrics, materials and craftmanship</li>
						<li>Unique <b>custom tailored uniform</b> to wear with ultimate confidence</li>
					</ul>
				</div>
			</div>

			<div class="row">
				<div class="col s6" style="padding:20px;">
					<h4 style="font-family:'Lobster Two',cursive;">Modern technology - traditional craftsmanship</h4>
					<p style="font-family:'Yatra One',cursive;">Our world renowned shirt designer software lets you customize your very own shirt. The combinations are almost endless - go ahead and try!</p>
					<p style="font-family:'Yatra One',cursive;">We strive to create the greatest shopping experience. By using our cutting-edge technology to visualize your custom shirt, you can be confident that we will deliver on our promise.</p>
				</div>
				<div class="col s6">
					<img style="padding:20px;" class="responsive-img" src="imgOnline/unimehe2.jpg">
				</div>
			</div>
		</div>

	</div>
@stop

@section('scripts')	 
    <script>
   	$(document).ready(function(){

    });
   	</script>
@stop   
