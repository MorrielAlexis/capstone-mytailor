@extends('layouts.master')

@section('content')

  <div class="main-wrapper"  style="margin-top:30px">

    <div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><h4>Walk In Alteration</h4></span>
      </div>
    </div>

    <div class="row">
      <div class="col s12 m12 l12">
        <div class="card-panel">

          <div class="row container left">
            <div class="input-field col s4">
              <i class="mdi-action-search prefix"></i>
              <input id="icon_prefix" type="text" class="validate">
              <label for="icon_prefix">Transaction Code</label>
            </div>
            <div class="col s8">
				<a class="left btn-floating tooltipped red" data-position="bottom" data-delay="50" data-tooltip="Create new transaction" href="{{URL::to('transaction/walkin-individual')}}" style="margin-top:20px"><i class="left large mdi-content-add-circle"></i></a>	
            </div>
          </div>

          	<div class="row">
            	<div class="col s12">
              		<table class="centered">
		                <thead>
		                  	<tr>
		                      	<th style="color:#1b5e20">Track#</th>
		                      	<th style="color:#1b5e20">Company Name</th>
		                    	<th style="color:#1b5e20">Due Date</th>
		                  	</tr>
                		</thead>
              		</table>
            	</div>
       		</div>


        <ul class="collapsible z-depth-0" data-collapsible="accordion" style="border:none;">
          
	        <li style="margin-bottom:10px;">
	            <div class="collapsible-header" style="background-color:#ffebee">
	        	    <div class="row">
	            	    <div class="col s12">
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
	              	</div>
	            </div>
	          
	            <div class="collapsible-body" style="border:3px solid #ffebee;">
					<div class="row">
						<div class="col s12">
							<div class="col s9">
								<h5 style="color:#1b5e20; margin-left:20px;">Order Specification</h5>
							</div>
							<div class="col s2">
								<div class="input-field">
									<select>
									    <option value="1" data-icon="#!" class="circle">Hem</option>
									    <option value="2" data-icon="#!" class="circle">Slim</option>
									    <option value="3" data-icon="#!" class="circle">Add Darts</option>
									</select>
									<label>Alteration Type</label>
								</div>
							</div>
							<div class="col s1">
								<a class="left btn-floating modal-trigger tooltipped pink" data-position="bottom" data-delay="50" data-tooltip="Add measurement" href="#measurementmodal" style="margin-top:20px"><i class="mdi-av-playlist-add"></i></a>	
							</div>
						</div>
					</div>

				    <div class = "row">

					    <div class="col s12 m12 l12 overflow-x">
					    	<table class = "centered">
					    		<thead>
					    			<tr>
					    				<th>Garment Type</th>
					    				<th>Garment Name</th>
					    				<th>Garment Image</th>
					    				<th>Quantity</th>
					    				<th>Fabric Type</th>
					    				<th>Swatch Fabric Name</th>
					    				<th>Swatch Image</th>
					    				<th>Swatch Code</th>
					    			</tr>
					    		</thead>
					    		<tbody>
					    			<tr>
					    				<td>Uniform</td>
					    				<td>Women's Uniform</td>
					    				<td><img class="img hoverable" src="../img/uniform3.jpg"></td>
					    				<td>1</td>
					    				<td>Linen</td>
					    				<td>Linen Keme</td>
					    				<td><img class="img hoverable" src="../imgSwatches/citadel alpine.jpg"></td>
					    				<td>LINK001</td>
					    			</tr>
					    			<tr>
					    				<td>Gown</td>
					    				<td>Tube Cocktail</td>
					    				<td><img class="img hoverable" src="../img/gown2.jpg"></td>
					    				<td>1</td>
					    				<td>Cotton</td>
					    				<td>Cotton Keme</td>
					    				<td><img class="img hoverable" src="../imgSwatches/citadel grape.jpg"></td>
					    				<td>COT001</td>
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