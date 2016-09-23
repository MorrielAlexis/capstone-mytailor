@extends('layouts.masterOnline')

@section('content')

	<div class="section">	

		<div id="suitheader" style="height:500px; margin-top: -15px;">
	  		<div style="height:70px"></div>
	  		<center><h1 style="color:white; font-family:'Pacifico',cursive;text-shadow: 3px 3px 8px rgba(5, 5, 5, 0.90);">Custom tailored suits</h1></center>
	  		<center><a style="font-size: 20px; margin-top:45px; padding-top:15px; padding-left:5px; padding-right:5px; width:300px; height:70px; background:rgb(236, 59, 65);" class="white-text modal-trigger waves-effect waves-light btn btn-small center-text" href="{{URL::to('/customize-suit-fabric')}}">CUSTOMIZE YOURS NOW!</a></center>
		</div>

		<div style= "height:20px;"></div>

		<div class="section white container" style="width:95%;">
	
			<div class="row">

				<div class="col s12 m12 l4  center" style="padding:30px;">
		            <figure>
			            <img class = "responsive-img" src="imgOnlineSuit/suit2.jpg">
			            <figcaption style="background-color:#4db6ac;color:white;">Price starts at Php 2000.00</figcaption>
			        </figure>
				</div>

				<div class="col s12 m12 l4 center" style="padding:30px;">
		            <figure>
			            <img class = "responsive-img" src="imgOnlineSuit/suit4.jpg">
			            <figcaption style="background-color:#4db6ac;color:white;">Price starts at Php 2000.00</figcaption>
			        </figure>
				</div>

				<div class="col s12 m12 l4 center" style="padding:30px;">
		            <figure>
			            <img class = "responsive-img" src="imgOnlineSuit/suit5.jpg">
			            <figcaption style="background-color:#4db6ac;color:white;">Price starts at Php 2000.00</figcaption>
			        </figure>
				</div>

			</div>

			<div class="divider container" style="margin-bottom:20px;background-color:#26a69a"></div>

		<div class="section white container" style="width:95%; padding-left:20px; padding-right:20px;">

			<div class="row">
				<div class="col s12 m12 l6 center">
					<img class="responsive-img" src="imgOnline/suity.jpg" style="border-style: solid;border-color: #595959;border-width: 2px 2px 2px 2px;padding:20px;">
				</div>
				<div class="col s12 m12 l6" style="padding:20px;">
					<h4 style="font-family: 'Mada', sans-serif;color:#009688">Fine custom mens suits - expert tailoring</h4>
					<h6  style="font-family: 'Rambla', sans-serif;font-size:18px">Trust us to tailor your new suit. Our experienced tailors will stop at nothing to give you:</h6>
					<ul>
						<li style="font-family: 'Rambla', sans-serif;font-size:18px">A perfect fit - always a made-to-measure with fit guarantee</li>
						<li style="font-family: 'Rambla', sans-serif;font-size:18px">Highest quality fabrics, materials & craftmanship</li>
						<li style="font-family: 'Rambla', sans-serif;font-size:18px">Finely tailored suits with an individual touch - made for you.</li>
					</ul>
				</div>
			</div>

			<div class="row">
				<div class="col s12 m12 l6" style="padding:20px;">
					<h4 style="font-family: 'Mada', sans-serif;color:#009688">Custom made - to your measurements</h4>
					<p style="font-family: 'Rambla', sans-serif;font-size:18px">With our unique suit customizer, you can easily create a suit that perfectly matches your personality.</p>
					<p style="font-family: 'Rambla', sans-serif;font-size:18px">Tailored to your individual measurements, we dare to guarantee a perfect fit - every time.</p>
				</div>
				<div class="col s12 m12 l6 center">
					<img class="responsive-img" src="imgOnline/suitmehe.jpg" style="border-style: solid;border-color: #595959;border-width: 2px 2px 2px 2px;padding:20px;">
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
