@extends('layouts.masterOnline')

@section('content')

	<div class="section">	

		<div id="gownheader" style="height:500px; margin-top: -15px;">
	  		<div style="height:70px"></div>
	  		<center><h1 style="color:white; font-family:'Playfair Display','Times';">Custom tailored gowns</h1></center>
	  		<center><a style="margin-top:45px; padding-top:15px; padding-left:5px; padding-right:5px; width:250px; height:70px; background:rgb(236, 59, 65);" class="white-text modal-trigger waves-effect waves-light btn btn-small center-text" href="{{URL::to('/online-customize-order')}}"><font size="+1">CUSTOMIZE YOURS NOW!</font></a></center>
		</div>

		<div style= "height:20px;"></div>

		<div class="section white container" style="width:95%;">

			<div class="row">

				<div class="col s4 center" style="padding:30px;">
                    <figure>
                        <img class = "responsive-img" src="imgOnlineGown/gown3.jpg">
                        <figcaption style="background-color:#ede7f6">Price starts at Php 2000.00</figcaption>
                    </figure>
	            	<div><a class="red darken-1 container" href="{{URL::to('/online-order-now')}}" style="border:1px solid white; padding:10px;"><font color= "white">ADD TO CART </font><i style="font-size:17px;" class="white-text mdi-action-shopping-cart"></i></a></div>
				</div>

				<div class="col s4 center" style="padding:30px;">
                    <figure>
                        <img class = "responsive-img" src="imgOnlineGown/gown6.jpg">
                        <figcaption style="background-color:#ede7f6">Price starts at Php 2000.00</figcaption>
                    </figure>
	            	<div><a class="red darken-1 container" href="{{URL::to('/online-order-now')}}" style="border:1px solid white; padding:10px;"><font color= "white">ADD TO CART </font><i style="font-size:17px;" class="white-text mdi-action-shopping-cart"></i></a></div>
				</div>

				<div class="col s4 center" style="padding:30px;">
                    <figure>
                        <img class = "responsive-img" src="imgOnlineGown/gown7.jpg">
                        <figcaption style="background-color:#ede7f6">Price starts at Php 2000.00</figcaption>
                    </figure>
	            	<div><a class="red darken-1 container" href="{{URL::to('/online-order-now')}}" style="border:1px solid white; padding:10px;"><font color= "white">ADD TO CART </font><i style="font-size:17px;" class="white-text mdi-action-shopping-cart"></i></a></div>
				</div>

			</div>

			<div class="divider container" style="margin-bottom:40px;"></div>

			     <div class="row">

        <div class="col s4 center" style="padding:30px;">
                    <figure>
                        <img class = "responsive-img" src="imgOnlineGown/gown1.jpg">
                        <figcaption style="background-color:#ede7f6">Price starts at Php 2000.00</figcaption>
                    </figure>
                <div><a class="red darken-1 container" href="{{URL::to('/online-order-now')}}" style="border:1px solid white; padding:10px;"><font color= "white">ADD TO CART </font><i style="font-size:17px;" class="white-text mdi-action-shopping-cart"></i></a></div>
        </div>

        <div class="col s4 center" style="padding:30px;">
                    <figure>
                        <img class = "responsive-img" src="imgOnlineGown/gown2.jpg">
                        <figcaption style="background-color:#ede7f6">Price starts at Php 2000.00</figcaption>
                    </figure>
                <div><a class="red darken-1 container" href="{{URL::to('/online-order-now')}}" style="border:1px solid white; padding:10px;"><font color= "white">ADD TO CART </font><i style="font-size:17px;" class="white-text mdi-action-shopping-cart"></i></a></div>
        </div>

        <div class="col s4 center" style="padding:30px;">
                    <figure>
                        <img class = "responsive-img" src="imgOnlineGown/gown4.jpg">
                        <figcaption style="background-color:#ede7f6">Price starts at Php 2000.00</figcaption>
                    </figure>
                <div><a class="red darken-1 container" href="{{URL::to('/online-order-now')}}" style="border:1px solid white; padding:10px;"><font color= "white">ADD TO CART </font><i style="font-size:17px;" class="white-text mdi-action-shopping-cart"></i></a></div>
        </div>

      </div>

      <div class="divider container" style="margin-bottom:40px;"></div>

      <div class="row">

        <div class="col s4 center" style="padding:30px;">
                    <figure>
                        <img class = "responsive-img" src="imgOnlineGown/gown5.jpg">
                        <figcaption style="background-color:#ede7f6">Price starts at Php 2000.00</figcaption>
                    </figure>
                <div><a class="red darken-1 container" href="{{URL::to('/online-order-now')}}" style="border:1px solid white; padding:10px;"><font color= "white">ADD TO CART </font><i style="font-size:17px;" class="white-text mdi-action-shopping-cart"></i></a></div>
        </div>

        <div class="col s4 center" style="padding:30px;">
                    <figure>
                        <img class = "responsive-img" src="imgOnlineGown/gown8.jpg">
                        <figcaption style="background-color:#ede7f6">Price starts at Php 2000.00</figcaption>
                    </figure>
                <div><a class="red darken-1 container" href="{{URL::to('/online-order-now')}}" style="border:1px solid white; padding:10px;"><font color= "white">ADD TO CART </font><i style="font-size:17px;" class="white-text mdi-action-shopping-cart"></i></a></div>
        </div>

        <div class="col s4 center" style="padding:30px;">
                    <figure>
                        <img class = "responsive-img" src="imgOnlineGown/gown.jpg">
                        <figcaption style="background-color:#ede7f6">Price starts at Php 2000.00</figcaption>
                    </figure>
                <div><a class="red darken-1 container" href="{{URL::to('/online-order-now')}}" style="border:1px solid white; padding:10px;"><font color= "white">ADD TO CART </font><i style="font-size:17px;" class="white-text mdi-action-shopping-cart"></i></a></div>
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
