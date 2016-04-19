@extends('layouts.master')

@section('content')
	
	<a style="color:black" class="btn btn-large center-text light-green accent-1" href="{{URL::to('transaction/walk')}}">Previous</a>

	<div class = "main-wrapper">	
		<div class="row">
	      <div class="col s12 m12 l12">
	      	<span class="page-title"><h4>Alterations</h4></span>
	      </div>
    	</div>
  	</div>


  	<div class="row">
	    <div class="col s12">
	      <ul class="tabs">
	        <li class="tab col s2"><a href="#tabTop">Tops Shirts and Blouses</a></li>
	        <li class="tab col s2"><a href="#tabPants">Pants and Bottom</a></li>
	        <li class="tab col s2"><a href="#tabDenim">Denim</a></li>
	        <li class="tab col s2"><a href="#tabJacket">Jacket and Coats</a></li>
	        <li class="tab col s2"><a href="#tabDress">Dresses and Skirts</a></li>
	        <li class="tab col s2"><a href="#tabOther">Other</a></li>

	      </ul>
	    </div>
	    <div id="tabTop" class="col s12">
	    	<div class = "row">
	  			<br><br>
	  			<div class="col s12 m12 l12">
					<div class="card-panel">
	  					<div class="card-content">
			          		<h5>Tops Shirts and Blouses</h5>

			          		<div class = "row">
			          			<br>
			          			<div class = "col s3">
			          				<input type="checkbox" class="filled-in" id="topHem" />
	      							<label for="topHem">Hem (Php 50.00)</label>
			          			</div>
			          			<div class = "col s3">
			          				<input type="checkbox" class="filled-in" id="topSlim" />
	      							<label for="topSlim">Slim (PHP 50.00)</label>
			          			</div>
			          			<div class = "col s3">
			          				<input type="checkbox" class="filled-in" id="topNoCuff" />
	      							<label for="topNoCuff">Shorten Sleeve - no cuff (PHP 50.00) </label>
			          			</div>
			          			<div class = "col s3">
			          				<input type="checkbox" class="filled-in" id="topWithCuff" />
	      							<label for="topWithCuff">Shorten Sleeve - with cuff (PHP 50.00) </label>
			          			</div>	
			          		</div>
			          		<div class = "row">
			          			<div class = "col s3">
			          				<input type="checkbox" class="filled-in" id="topNoSleeve" />
	      							<label for="topNoSleeve">Adjust Shoulder - no sleeves (PHP 50.00)</label>
			          			</div>
			          			<div class = "col s3">
			          				<input type="checkbox" class="filled-in" id="topWithSleeve" />
	      							<label for="topWithSleeve">Adjust Shoulder - with sleeves (PHP 50.00)</label>
			          			</div>
			          			<div class = "col s3">
			          				<input type="checkbox" class="filled-in" id="topSlimSleeve" />
	      							<label for="topSlimSleeve">Slim Sleeves (PHP 50.00)</label>
			          			</div>
			          			<div class = "col s3">
			          				<input type="checkbox" class="filled-in" id="topDarts"  />
	      							<label for="topDarts">Add Darts (PHP 50.00)</label>
			          			</div>	
			          		</div>
			          		<div class = "row">
				                <div class="input-field col s12">
				                  <input id="note" name = "note" type="text" readonly>
				                  <label for="note"> Note:</label>
				                </div>
				          	</div>

				        	<center><a style="color:black" class="btn btn-large center-text light-green accent-1" href="">Place Order</a></center>
			          	</div>
			        </div>
			    </div>      		
			</div>
	    </div>

	    <div id="tabPants" class="col s12">
	    	<div class = "row">
	  			<br><br>
	  			<div class="col s12 m12 l12">
					<div class="card-panel">
	  					<div class="card-content">
			          		<h5>Pants and Bottoms</h5>
			          		<br>

			          		<div class = "row">
			          			<div class = "col s4">
			          				<input type="checkbox" class="filled-in" id="pantHem" />
	      							<label for="pantHem">Hem (Php 50.00)</label>
			          			</div>
			          			<div class = "col s4">
			          				<input type="checkbox" class="filled-in" id="pantSlim" />
	      							<label for="pantSlim">Slim Leg (PHP 50.00)</label>
			          			</div>
			          			<div class = "col s4">
			          				<input type="checkbox" class="filled-in" id="pantWaist" />
	      							<label for="pantWaist">Adjust Waist (PHP 50.00) </label>
			          			</div>
			          		</div>
			          		<div class = "row">
				                <div class="input-field col s12">
				                  <input id="note" name = "note" type="text" readonly>
				                  <label for="note"> Note:</label>
				                </div>
				          	</div>

				        	<center><a style="color:black" class="btn btn-large center-text light-green accent-1" href="">Place Order</a></center>
			          	</div>
			        </div>
			    </div>      		
			</div> 

	    </div>

	    <div id="tabDenim" class="col s12">
	    	<div class = "row">
	  			<br><br>
	  			<div class="col s12 m12 l12">
					<div class="card-panel">
	  					<div class="card-content">
			          		<h5>Denim</h5>
			          		<br>

			          		<div class = "row">
			          			<div class = "col s3">
			          				<input type="checkbox" class="filled-in" id="denimHem" />
	      							<label for="denimHem">Hem (Php 50.00)</label>
			          			</div>
			          			<div class = "col s3">
			          				<input type="checkbox" class="filled-in" id="denimOrigHem" />
	      							<label for="denimOrigHem">Original Hem (Php 50.00)</label>
			          			</div>
			          			<div class = "col s3">
			          				<input type="checkbox" class="filled-in" id="denimSlim" />
	      							<label for="denimSlim">Slim Leg (PHP 50.00)</label>
			          			</div>
			          			<div class = "col s3">
			          				<input type="checkbox" class="filled-in" id="denimWaist" />
	      							<label for="denimWaist">Adjust Waist (PHP 50.00) </label>
			          			</div>
			          		</div>
			          		<div class = "row">
				                <div class="input-field col s12">
				                  <input id="note" name = "note" type="text" readonly>
				                  <label for="note"> Note:</label>
				                </div>
				          	</div>

				        	<center><a style="color:black" class="btn btn-large center-text light-green accent-1" href="">Place Order</a></center>
			          	</div>	
		          	</div>
		        </div>    		
			</div> 
	    </div>

	    <div id="tabJacket" class="col s12">
	    	<div class = "row">
	  			<br><br>
	  			<div class="col s12 m12 l12">
					<div class="card-panel">
	  					<div class="card-content">
			          		<h5>Jacket and Coats</h5>
			          		<br>

			          		<div class = "row">
			          			<div class = "col s3">
			          				<input type="checkbox" class="filled-in" id="jacketShorten" />
	      							<label for="jacketShorten">Shorten (Php 50.00)</label>
			          			</div>
			          			<div class = "col s3">
			          				<input type="checkbox" class="filled-in" id="jacketSlim" />
	      							<label for="jacketSlim">Slim (PHP 50.00)</label>
			          			</div>
			          			<div class = "col s3">
			          				<input type="checkbox" class="filled-in" id="jacketShortenCuff" />
	      							<label for="jacketShortenCuff">Shorten Sleeves (Php 50.00)</label>
			          			</div>
			          			<div class = "col s3">
			          				<input type="checkbox" class="filled-in" id="jacketShortenShoulder" />
	      							<label for="jacketShortenShoulder">Shorten Shoulder (Php 50.00)</label>
			          			</div>	
			          		</div>
			          		<div class = "row">
			          			<div class = "col s3">
			          				<input type="checkbox" class="filled-in" id="jacketSlimSleeve" />
	      							<label for="jacketSlimSleeve">Slim Sleeves (Php 50.00)</label>
			          			</div>
			          			<div class = "col s3">
			          				<input type="checkbox" class="filled-in" id="jacketShoulder" />
	      							<label for="jacketShoulder">Adjust Shoulder(PHP 50.00)</label>
			          			</div>
			          			<div class = "col s3">
			          				<input type="checkbox" class="filled-in" id="jacketDarts"  />
	      							<label for="jacketDarts">Add Darts (PHP 50.00)</label>
			          			</div>
			          			<div class = "col s3">
			          				<input type="checkbox" class="filled-in" id="jacketLining"  />
	      							<label for="jacketLining">Replace Lining (PHP 50.00)</label>
			          			</div>	
			          		</div>
			          		<div class = "row">
				                <div class="input-field col s12">
				                  <input id="note" name = "note" type="text" readonly>
				                  <label for="note"> Note:</label>
				                </div>
				          	</div>

				        	<center><a style="color:black" class="btn btn-large center-text light-green accent-1" href="">Place Order</a></center>
			          	</div>
		          	</div>
		        </div> 		
			</div> 
	    </div>

	    <div id="tabDress" class="col s12">
	    	<div class = "row">
	  			<br><br>
	  			<div class="col s12 m12 l12">
					<div class="card-panel">
	  					<div class="card-content">
			          		<h5>Dresses and Skirts</h5>
			          		<br>

			          		<div class = "row">
			          			<div class = "col s3">
			          				<input type="checkbox" class="filled-in" id="dressHem" />
	      							<label for="dressHem">Hem (Php 50.00)</label>
			          			</div>
			          			<div class = "col s3">
			          				<input type="checkbox" class="filled-in" id="dressHemPleats" />
	      							<label for="dressHemPleats">Hem with Pleats Details (Php 50.00)</label>
			          			</div>
			          			<div class = "col s3">
			          				<input type="checkbox" class="filled-in" id="dressSlim" />
	      							<label for="dressSlim">Slim (PHP 50.00)</label>
			          			</div>
			          			<div class = "col s3">
			          				<input type="checkbox" class="filled-in" id="dressNoCuff" />
	      							<label for="dressNoCuff">Shorten Sleeve - no cuff (PHP 50.00) </label>
			          			</div>
			          		</div>
		          			<div class = "row">
			          			<div class = "col s3">
			          				<input type="checkbox" class="filled-in" id="dressWithCuff" />
	      							<label for="dressWithCuff">Shorten Sleeve - with cuff (PHP 50.00) </label>
			          			</div>
			          			<div class = "col s3">
			          				<input type="checkbox" class="filled-in" id="dressSlimSleeve" />
	      							<label for="dressSlimSleeve">Slim Sleeves (PHP 50.00)</label>
			          			</div>	
			          			<div class = "col s3">
			          				<input type="checkbox" class="filled-in" id="DressNoSleeve" />
	      							<label for="dressNoSleeve">Adjust Shoulder - no sleeves (PHP 50.00)</label>
			          			</div>
			          			<div class = "col s3">
			          				<input type="checkbox" class="filled-in" id="dressWithSleeve" />
	      							<label for="dressWithSleeve">Adjust Shoulder - with sleeves (PHP 50.00)</label>
			          			</div>
		          			</div>
		          			<div class = "row">
				                <div class="input-field col s12">
				                  <input id="note" name = "note" type="text" readonly>
				                  <label for="note"> Note:</label>
				                </div>
				          	</div>

				        	<center><a style="color:black" class="btn btn-large center-text light-green accent-1" href="">Place Order</a></center>
		          		</div>	
	          		</div>
			    </div>      		
			</div>
	    </div>

	    <div id="tabOther" class="col s12">
	    	<div class = "row">
	  			<br><br>
	  			<div class="col s12 m12 l12">
					<div class="card-panel">
	  					<div class="card-content">
			          		<h5>Others</h5>
			          		<br>

			          		<div class = "row">
			          			<div class = "col s3">
			          				<input type="checkbox" class="filled-in" id="otherAddRemove" />
	      							<label for="otherAddremove">Add/Remove Zippers/Buttons (Php 50.00)</label>
			          			</div>
			          			<div class = "col s3">
			          				<input type="checkbox" class="filled-in" id="otherZipper" />
	      							<label for="otherZipper">Move Zipper (PHP 50.00)</label>
			          			</div>
			          			<div class = "col s3">
			          				<input type="checkbox" class="filled-in" id="otherHeavily" />
	      							<label for="otherHeavily">Heavily Embellished Items (PHP 50.00) </label>
			          			</div>
			          			<div class = "col s3">
			          				<input type="checkbox" class="filled-in" id="otherHem" />
	      							<label for="otherHem">Hem Leather (PHP 50.00) </label>
			          			</div>	
			          		</div>
			          		<div class = "row">
				                <div class="input-field col s12">
				                  <input id="note" name = "note" type="text" readonly>
				                  <label for="note"> Note:</label>
				                </div>
				          	</div>

				        	<center><a style="color:black" class="btn btn-large center-text light-green accent-1" href="">Place Order</a></center>
			          	</div>
			        </div>
			    </div>      		
			</div> 
	    </div>

  	</div>
        
@stop
@section('scripts')
	<script type="text/javascript">
		$(document).ready(function() {
	    $('select').material_select();
	  });
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
	    	$('ul.tabs').tabs();
	  	});
	</script>


@stop