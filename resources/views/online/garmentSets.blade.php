@extends('layouts.masterOnline')

@section('content')

	<div class="section">	

		<div id="sets" style="height:500px; margin-top: -15px;">
	  		<div style="height:150px"></div>
	  		<center><h1 style="color:white; font-family:'Pacifico',cursive;text-shadow: 3px 3px 8px rgba(5, 5, 5, 0.90);">Sets</h1></center>
	  		<center><a style="font-size:20px; margin-top:45px; padding-top:15px; padding-left:5px; padding-right:5px; width:500px; height:70px; background:rgb(236, 59, 65);" class="white-text modal-trigger waves-effect waves-light btn btn-small center-text" href="{{URL::to('/customize-sets-choose-set')}}">CHOOSE YOUR OWN SET HERE!</a></center>
		</div>

		<div style= "height:20px;"></div>

		<div class="section white container" style="width:95%; padding-left:20px; padding-right:20px;">

			<div class="row">

				<div class="col s4 center" style="padding:20px;">
		     		<div class="container"><a  href="{{URL::to('/customize-sets-customize-order')}}">
		     			<div class="z-depth-1 card medium" style="border:3px gray solid">
		       				<div class="card-image">
		          				<img class="responsive-img" height = "50%" src="{{URL::to('img/womens-uniform.jpg')}}">
		       				</div>
		        			<div class="card-content">
		         				<p class="center-align">
		         				 	<span class="card-title" style="color:black"><b>Women Set <font color="red">A</font></b></span>
		         					<p class="center-align" style="color:teal">Package includes:</p>
		         					<p class="center-align" style="color:gray">1 x Blouse, 1 x Skirt</p>
		         					</br>
		         					<figcaption style="background-color:#ede7f6">CHOOSE THIS SET</figcaption>
		       				 	</p>
		       				</div>
		     			</div>
		     		</div></a>
				</div>

				<div class="col s4 center" style="padding:20px;">
	         		<div class="container"><a  href="{{URL::to('/customize-sets-customize-order')}}">
	         			<div class="z-depth13 card medium" style="border:3px gray solid">
	           				<div class="card-image">
	              				<img class="responsive-img" height = "50%" src="{{URL::to('img/unisex-uniform.jpg')}}">
	           				</div>
	            			<div class="card-content">
	             				<p class="center-align">
	             					<span class="card-title" style="color:black"><b>Unisex Set <font color="red">A</font></b></span>
	             					<p class="center-align" style="color:teal">Package includes:</p>
	             					<p class="center-align" style="color:gray">2 x Polo, 2 x Pants, 1 x Belt</p>
	             					</br>
	             					<figcaption style="background-color:#ede7f6">CHOOSE THIS SET</figcaption>
	           				 	</p>
	           				</div>
	           			</div>
	         		</div></a>
				</div>

				<div class="col s4 center" style="padding:20px;">
	         		<div class="container"><a  href="{{URL::to('/customize-sets-customize-order')}}">
	         			<div class="z-depth-1 card medium" style="border:3px gray solid">
	           				<div class="card-image">
	              				<img class="responsive-img" height = "50%" src="{{URL::to('img/mens-uniform.jpg')}}">
	           				</div>
	            			<div class="card-content">
	             				<p class="center-align">
	             				 	<span class="card-title" style="color:black"><b>Men Set <font color="red">A</font></b></span>
	             					<p class="center-align" style="color:teal">Package includes:</p>
	             					<p class="center-align" style="color:gray">1 x Polo, 1 x Pants</p>
	             					</br>
	             					<figcaption style="background-color:#ede7f6">CHOOSE THIS SET</figcaption>
	           				 	</p>
	           				</div>
	         			</div>
	         		</div></a>
				</div>

			</div>

			<div class="divider container" style="margin-bottom:20px;background-color:#26a69a"></div>

			<div class="row">
				<div class="col s6">
					<img style="padding:20px;border-style: solid;border-color: #595959;border-width: 2px 2px 2px 2px;" class="responsive-img" src="imgOnline/unimehe3.jpg">
				</div>
				<div class="col s6" style="padding:20px;">
					<h4 style="font-family: 'Mada', sans-serif;color:#009688">Custom tailored uniforms - designed by you</h4>
					<h6 style="font-family: 'Rambla', sans-serif;font-size:18px">Buying a custom tailored shirt from us is always an excellent choice. We promise to give you:</h6>
					<ul>
						<li style="font-family: 'Rambla', sans-serif;font-size:18px">Guaranteed perfect fit</li>
						<li style="font-family: 'Rambla', sans-serif;font-size:18px">Highest quality fabrics, materials and craftmanship</li>
						<li style="font-family: 'Rambla', sans-serif;font-size:18px">Unique <b style="font-size:16px">custom tailored uniform</b> to wear with ultimate confidence</li>
					</ul>
				</div>
			</div>

			<div class="row">
				<div class="col s6" style="padding:20px;">
					<h4 style="font-family: 'Mada', sans-serif;color:#009688">Modern technology - traditional craftsmanship</h4>
					<p style="font-family: 'Rambla', sans-serif;font-size:18px">Our world renowned shirt designer software lets you customize your very own shirt. The combinations are almost endless - go ahead and try!</p>
					<p style="font-family: 'Rambla', sans-serif;font-size:18px">We strive to create the greatest shopping experience. By using our cutting-edge technology to visualize your custom shirt, you can be confident that we will deliver on our promise.</p>
				</div>
				<div class="col s6">
					<img style="padding:20px;border-style: solid;border-color: #595959;border-width: 2px 2px 2px 2px;" class="responsive-img" src="imgOnline/unimehe2.jpg">
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
