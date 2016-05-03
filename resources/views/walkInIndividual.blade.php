@extends('layouts.master')

@section('content')

  <div class="main-wrapper"  style="margin-top:30px">

  	<div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><h4>Individual Walk In Customer</h4></span>
      </div>
    </div>

	<div class="row">
	    <div class="col s12 m12 l12">
	    	<div class="card-panel">
	        <span class="card-title"><h5 style="color:#1b5e20"><center>Walk In Order</center></h5></span>
	        <div class="divider"></div>

	    		<div class="card-content">
	    			<div class="row">
	    				<div class="col s6 m6 l6" style="margin-top:30px">
	    					<div class="container">
	    						  <div class="input-field col s12">
								    <select>
								      <option value="" disabled selected>Choose garment</option>
								      <option value="1">Gown</option>
								      <option value="2">Suit</option>
								      <option value="3">Uniform</option>
								    </select>
								    <label>Select your garment here</label>
								  </div>

								  <div class="container" style="margin-top:70px;">
								  	<img src="#!" class="responsive-img" style="width:100%; height:200px;">
								  </div>

								    <form class="col s12">
										<div class="file-field input-field">
											<div class="btn" style="margin-top:20px">
												<span>Catalogues</span>
													<input type="file">
											</div>
											<div class="file-path-wrapper">
												<input class="file-path validate" type="text">
											</div>
										</div>
									</form>

	    					</div>
	    				</div>

	    				<div class="col s6 m6 l6" style="margin-top:20px">
	    					<div class="right button red accent-4" style="margin-bottom:100px;">
	    						<label><h3>Track #001</h3></label>
		    				</div>

		    				<div style="margin-top:110px">
		    					<ul class="collapsible" data-collapsible="accordion">
							    	<li>
							      		<div class="collapsible-header"><i class="material-icons"></i>
							      			<p>Segment</p>
							      		</div>
							      		<div class="collapsible-body">
							      			<form class="col s12">
										      <div class="row">
										        <div class="input-field col s6">
										          <input id="first_name" type="text" class="validate">
										          <label for="first_name">First Name</label>
										        </div>
										        <div class="input-field col s6">
										          <input id="last_name" type="text" class="validate">
										          <label for="last_name">Last Name</label>
										        </div>
										      </div>
							      			</form>
							      		</div>
							    	</li>
							    </ul>
							    <ul class="collapsible" data-collapsible="accordion" style="margin-top:30px">
							    	<li>
							      		<div class="collapsible-header"><i class="material-icons"></i>
							      			<p>Segment</p>
							      		</div>
							      		<div class="collapsible-body">
							      			<form class="col s12">
										      <div class="row">
										        <div class="input-field col s6">
										          <input id="first_name" type="text" class="validate">
										          <label for="first_name">First Name</label>
										        </div>
										        <div class="input-field col s6">
										          <input id="last_name" type="text" class="validate">
										          <label for="last_name">Last Name</label>
										        </div>
										      </div>
							      			</form>
							      		</div>
							    	</li>
							    </ul>
		    				</div>
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

@stop