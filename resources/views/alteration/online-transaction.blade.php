@extends('layouts.master')

@section('content')

<div class="main-wrapper"  style="margin-top:30px">

  	<div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><h4>Online Alteration Customers</h4></span>
      </div>
    </div>

    <div class="row">
        <div class="col s12 m12 l12">
        	<div class="card-panel">

                <span class="card-title"><h5 style="color:#1b5e20"><center>Orders</center></h5></span>
                <div class="divider" style="margin-bottom:50px;"></div>

   		        <div class="row">
		        	<div class="col s7">
		        		<table class="centered">
		        			<thead>
						    	<tr>
						        	<th style="color:#1b5e20">Track#</th>
						            <th style="color:#1b5e20">Name</th>
						            <th style="color:#1b5e20">Due Date</th>
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
			        <div class="collapsible-header" style="background-color:#f3e5f5">
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
								        	<td><a class="btn modal-trigger" href="{{URL::to('/alteration-acceptorder')}}"><i class="mdi-action-done"></i>Accept</a></td>
								        	<td><a class="btn modal-trigger" href="#rejectmodal"><i class="mdi-content-clear"></i>Reject</a></td>
								        </tr>
								    </tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="collapsible-body" style="border:3px solid #f3e5f5;">
						<h5 style="color:#1b5e20; margin-left:20px;">Order Specification</h5>
						
						<div class = "row">
						    <div class="col s12 m12 l12 overflow-x">
						    	<table class = "centered striped">
						    		<thead>
						    			<tr>
						    				<th>Garment Type</th>
						    				<th>Garment Image</th>
						    				<th>Quantity</th>
						    				<th>Fabric Type</th>
						    				<th>Swatch Pattern</th>
						    				<th>Garment Segment</th>
						    				<th>Alteration Type</th>
						    				<th></th>
						    			</tr>
						    		</thead>
						    		<tbody>
						    			<tr>
						    				<td>Uniform</td>
						    				<td><img class="img hoverable" src="../img/uniform3.jpg"></td>
						    				<td>1</td>
						    				<td>Linen</td>
						    				<td><img class="img hoverable modal-trigger" href="#swatchpattern" src="../imgSwatches/citadel alpine.jpg"></td>
						    				<td>Polo</td>
						    				<td>Hem</td>
						    				<td><a class=" btn modal-trigger tooltipped" href="#measurementmodal" data-position="top" data-delay="50" data-tooltip="View measurements"><i class="mdi-action-view-headline"></i></a></td>
						    			</tr>
						    			<tr>
						    				<td>Gown</td>
						    				<td><img class="img hoverable" src="../img/gown2.jpg"></td>
						    				<td>1</td>
						    				<td>Cotton</td>
						    				<td><img class="img hoverable modal-trigger" href="#swatchpattern" src="../imgSwatches/citadel grape.jpg"></td>
						    				<td>Skirt</td>
						    				<td>Hem Pleats</td>
											<td><a class="btn modal-trigger tooltipped" href="#measurementmodal" data-position="top" data-delay="50" data-tooltip="View measurements"><i class="mdi-action-view-headline"></i></a></td>
						    			</tr>
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

			<h4 style="color:#1b5e20" class="center">Note</h4>
			<div class="divider container" style="margin-bottom:20px;"></div>
			    <div class="input-field col s12">
		          	<textarea id="textarea" class="textarea"></textarea>
		          	<label for="textarea"></label>
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
		  $(document).ready(function() {
		    $('select').material_select();
		  });
	</script>

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

@stop