@extends('layouts.master')

@section('content')

<div class="main-wrapper"  style="margin-top:30px">

 <!--Flash Messages-->
      @if (Session::has('flash_message'))
        <div class="row" id="flash_message">
          <div class="col s12 m12 l12">
            <div class="card-panel blue accent-1">
              <span class="alert alert-success"><i class="tiny mdi-navigation-close right" onclick="$('#flash_message').hide()"></i></span>
              <em> {!! session('flash_message') !!}</em>
            </div>
          </div>
        </div>
      @endif

      <!--Flash Messages for Reject-->
      @if (Session::has('flash_message_delete'))
        <div class="row" id="flash_message">
          <div class="col s12 m12 l12">
            <div class="card-panel red accent-2">
              <span class="alert alert-success"><i class="tiny mdi-navigation-close right" onclick="$('#flash_message').hide()"></i></span>
               <em> {!! session('flash_message_delete') !!}</em>
            </div>
          </div>
        </div>
      @endif

  	<div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><h4>Online Individual Customers</h4></span>
      </div>
    </div>

	<div class="row">
	    <div class="col s12 m12 l12">
	    	<div class="card-panel">
		        <span class="card-title"><h5 style="color:#1b5e20"><center>Orders</center></h5></span>
		        <div class="divider" style="margin-bottom:30px;"></div>

   		        <div class="row">
		        	<div class="col s7">
		        		<table class="centered">
		        			<thead>
						    	<tr>
						        	<th style="color:#1b5e20">Job Order #</th>
						            <th style="color:#1b5e20">Customer Name</th>
						            <th style="color:#1b5e20">Email</th>
						            <th>
						        </tr>
						    </thead>
						</table>
		        	</div>
		        	<div class="col s5">
		        		<table class="centered">
		        			<thead>
						    	<tr>
						            <th style="color:#1b5e20">Action</th>
						        </tr>
						    </thead>
						</table>
		        	</div>
		        </div>


		        <ul class="collapsible z-depth-0" data-collapsible="accordion" style="border:none;">
			    
			    <!--Order#1-->
			    <li style="margin-bottom:10px;">
			        <div class="collapsible-header" style="background-color:#ffebee">
						<div class="row">
							<div class="col s7">
								<table class="centered">
								    <tbody>
								        <tr>
								        	<td>#001</td>
								        	<td>Terena Marqueta</td>
								        	<td>01/04/03</td>
								        </tr>
								    </tbody>
								</table>
							</div>
							<div class="col s5 center">
								<table class="centered">
								    <tbody>
								        <tr>
								        	<td><a style="color:black" class="modal-trigger btn tooltipped btn-floating blue" data-position="bottom" data-delay="50" data-tooltip="Click to accept online order" href="{{URL::to('/acceptIndividual')}}"><i class="mdi-action-done"></i></a>
					                          {{-- <a style="color:black" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to reject order." href="{{URL::to('/rejectIndividual')}}"><i class="mdi-action-delete"></i></a> --}}</td>
								        </tr>
								    </tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="collapsible-body" style="border:3px solid #ffebee;">
						<h5 style="color:#1b5e20; margin-left:20px;">Order Specification</h5>

					    <div class = "row">

						    <div class="col s12 m12 l12 overflow-x">
						    	<table class = "centered">
						    		<thead>
						    			<tr>
						    				<th>Segment Name</th>
						    				<th>Segment Image</th>
						    				<th>Quantity</th>
						    				<th>Fabric Type</th>
						    				<th>Design</th>
						    				<th>Swatch Image</th>
						    				<th>Swatch Code</th>
						    				<th></th>
						    			</tr>
						    		</thead>
						    		<tbody>
						    			<tr>
						    				<td>Polo Shirt</td>
						    				<td><img class="img hoverable" src="../img/uniform3.jpg"></td>
						    				<td>1</td>
						    				<td>Linen</td>
						    				<td>Collar - Button Down</td>
						    				<td><img class="img hoverable" src="../imgSwatches/citadel alpine.jpg"></td>
						    				<td>LINK001</td>
						    				<td><a class="btn modal-trigger tooltipped" href="#measurementmodal" data-position="top" data-delay="50" data-tooltip="Measurements"><i class="mdi-action-view-headline"></i></a></td>
						    			</tr>
						    			<tr>
						    		</tbody>
						    	</table>
						    </div>
				                  
				            <div class = "clearfix"></div>
				        </div>

					</div>
				</li>
				</ul>

		    </div>
		</div>
	</div>


	<!--Accept button Modal-->
	<div id="acceptmodal" class="modal modal-fixed-footer" style="height:320px; width:700px;">
		<div class="modal-content">
			<h4 style="color:#1b5e20" class="center">Accepted Order</h4>
			<div class="divider container" style="margin-bottom:20px;"></div>
			<div class="row">
		        <div class="col s12">
		            <div class="card" style="background-color:#ffebee">
		            	<div class="card-content">
		            		<table class="centered">
							    <tbody>
							        <tr>
							        	<td>track#</td>
							        	<td>customer name</td>
							        	<td></td>
							        	<td style="color:#1b5e20">Paid</td>
							        </tr>
							    </tbody>
							</table>
		            	</div>
		            </div>
		        </div>
		    </div>

		</div>

		<div class="modal-footer" style="background-color:#26a69a">
			<a href="" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
			<a href="" class="modal-action modal-close waves-effect waves-green btn-flat">Save</a>
		</div>
	</div>

	<!--Measurement button Modal-->
	<div id="measurementmodal" class="modal modal-fixed-footer">
		<div class="modal-content">
			<h4 style="color:#1b5e20" class="center">Measurements</h4>
			<div class="divider container" style="margin-bottom:20px;"></div>
			<div class="row">
				<div class="col s6">
					<div class="input-field">
	                  	<input id ="measurement" type="text" class="validate">
	                  	<label for="measurement">Measurement</label>
	                </div>
	                <div class="input-field">
	                  	<input id ="measurement" type="text" class="validate">
	                  	<label for="measurement">Measurement</label>
	                </div>
	                <div class="input-field">
	                  	<input id ="measurement" type="text" class="validate">
	                  	<label for="measurement">Measurement</label>
	                </div>
				</div>
				<div class="col s6">
					<div class="input-field">
	                  	<input id ="measurement" type="text" class="validate">
	                  	<label for="measurement">Measurement</label>
	                </div>
	                <div class="input-field">
	                  	<input id ="measurement" type="text" class="validate">
	                  	<label for="measurement">Measurement</label>
	                </div>
	                <div class="input-field">
	                  	<input id ="measurement" type="text" class="validate">
	                  	<label for="measurement">Measurement</label>
	                </div>
				</div>
			</div>

		</div>

		<div class="modal-footer" style="background-color:#26a69a">
			<a href="" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
			<a href="" class="modal-action modal-close waves-effect waves-green btn-flat">Save</a>
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

	   setTimeout(function () {
            $('#flash_message').hide();
        }, 5000);

	</script>	        

	<script>
	 $(document).ready(function(){
		$('.tooltipped').tooltip({delay: 50});
	 });
	</script>

	<script>
		$(document).ready(function(){
		    $('.collapsible').collapsible({
		    	accordion : true // A setting that changes the collapsible behavior to expandable instead of the default accordion style
		    });
		});
	</script>

@stop