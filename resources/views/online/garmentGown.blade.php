@extends('layouts.masterOnline')

@section('content')

	<div class="section">	

		<div id="gownheader" style="height:500px; margin-top: -15px;">
	  		<div style="height:70px"></div>
	  		<center><h1 style="color:white; font-family:'Pacifico',cursive;text-shadow: 3px 3px 8px rgba(5, 5, 5, 0.90);">Custom tailored gowns</h1></center>
	  		<center><a style="font-size:20px; margin-top:45px; padding-top:15px; padding-left:5px; padding-right:5px; width:300px; height:70px; background:rgb(236, 59, 65);" class="white-text modal-trigger waves-effect waves-light btn btn-small center-text" href="{{URL::to('/customize-gown-fabric')}}">CUSTOMIZE YOURS NOW!</a></center>
		</div>

		<div style= "height:20px;"></div>

		<div class="section  container" style="width:95%;background-color:#f2f2f2">

			<div class="row">

				<div class="col s4 center" style="padding:30px;">
                    <figure>
                <img class = "responsive-img" src="imgOnlineGown/gown3.jpg">
                <figcaption style="background-color:#4db6ac;color:white">Price starts at Php 2000.00</figcaption>
            </figure>

				</div>

				<div class="col s4 center" style="padding:30px;">
                    <figure>
                <img class = "responsive-img" src="imgOnlineGown/gown6.jpg">
                <figcaption style="background-color:#4db6ac;color:white">Price starts at Php 2000.00</figcaption>
            </figure>

				</div>

				<div class="col s4 center" style="padding:30px;">
                    <figure>
                <img class = "responsive-img" src="imgOnlineGown/gown7.jpg">
                <figcaption style="background-color:#4db6ac;color:white">Price starts at Php 2000.00</figcaption>
            </figure>

				</div>

			</div>

			<div class="divider container" style="margin-bottom:40px;background-color:#26a69a"></div>

			     <div class="row">

        <div class="col s4 center" style="padding:30px;">
            <figure>
                <img class = "responsive-img" src="imgOnlineGown/gown1.jpg">
                <figcaption style="background-color:#4db6ac;color:white">Price starts at Php 2000.00</figcaption>
            </figure>
        </div>

        <div class="col s4 center" style="padding:30px;">
            <figure>
                <img class = "responsive-img" src="imgOnlineGown/gown2.jpg">
                <figcaption style="background-color:#4db6ac;color:white">Price starts at Php 2000.00</figcaption>
            </figure>
        </div>

        <div class="col s4 center" style="padding:30px;">
            <figure>
                <img class = "responsive-img" src="imgOnlineGown/gown4.jpg">
                <figcaption style="background-color:#4db6ac;color:white">Price starts at Php 2000.00</figcaption>
            </figure>
        </div>

      </div>

      <div class="divider container" style="margin-bottom:40px;background-color:#26a69a"></div>

      <div class="row">

        <div class="col s4 center" style="padding:30px;">
            <figure>
                <img class = "responsive-img" src="imgOnlineGown/gown5.jpg">
                <figcaption style="background-color:#4db6ac;color:white">Price starts at Php 2000.00</figcaption>
            </figure>
        </div>

        <div class="col s4 center" style="padding:30px;">
            <figure>
                <img class = "responsive-img" src="imgOnlineGown/gown8.jpg">
                <figcaption style="background-color:#4db6ac;color:white">Price starts at Php 2000.00</figcaption>
            </figure>
        </div>

        <div class="col s4 center" style="padding:30px;">
            <figure>
                <img class = "responsive-img" src="imgOnlineGown/gown.jpg">
                <figcaption style="background-color:#4db6ac;color:white">Price starts at Php 2000.00</figcaption>
            </figure>
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
