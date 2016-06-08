@extends('layouts.master')

@section('content')

<div class="main-wrapper"  style="margin-top:30px">

	<div class="row">
	    <div class="col s12 m12 l12">
	    	<div class="card-panel">
		        <span class="card-title"><h5 style="color:#1b5e20"><center>Modify Order</center></h5></span>
		        <div class="divider" style="margin-bottom:30px;"></div>

		        <div class="row">
			        <div class="col s6">
						<center><img src="{{URL::to('img/female-uniform-plain.jpeg')}}" style="height:450px; width:450px;"></center>
			        	<div class="divider" style="margin-bottom:10px; margin-top:30px;"></div>
			        	<div class="divider" style="margin-bottom:30px;"></div>
						<center><img src="{{URL::to('../imgSwatches/citadel alpine.jpg')}}" style="height:300px; width:300px;"></center>
			        </div>

			        <div class="col s6">
			        	<div class="divider" style="margin-bottom:10px;"></div>
			        	<div class="divider" style="margin-bottom:30px;"></div>

			        	<div>
				        	{!! Form::open() !!}
				        	<div class="file-field input-field" style="margin:40px;">
						      	<div class="btn">
						        	<span>File</span>
						        	<input type="file">
						      	</div>
						      	<div class="file-path-wrapper">
						        	<input placeholder="Garment Image" class="file-path validate" type="text">
						      	</div>
						    </div>
				        	<div class="input-field" style="margin:40px;">
								<select>
								    <option value="1" data-icon="#!" class="circle">Uniform</option>
								    <option value="2" data-icon="#!" class="circle">Suit</option>
								    <option value="3" data-icon="#!" class="circle">Gown</option>
								</select>
								<label>Garment Type</label>
							</div>
							<div class="input-field" style="margin:40px;">
								<select>
								    <option value="1" data-icon="#!" class="circle">Skirt</option>
								    <option value="2" data-icon="#!" class="circle">Pants</option>
								    <option value="3" data-icon="#!" class="circle">Polo</option>
								    <option value="4" data-icon="#!" class="circle">Shorts</option>
								</select>
								<label>Garment Segment</label>
							</div>
							<div class="input-field" style="margin:40px;">
								<select>
								    <option value="1" data-icon="#!" class="circle">Pencil Cut</option>
								    <option value="2" data-icon="#!" class="circle">Balloon</option>
								</select>
								<label>Segment Pattern</label>
							</div>
							<div class="file-field input-field" style="margin:40px;">
						      	<div class="btn">
						        	<span>File</span>
						        	<input type="file">
						      	</div>
						      	<div class="file-path-wrapper">
						        	<input placeholder="Swatch Pattern" class="file-path validate" type="text">
						      	</div>
						    </div>
							<div style="margin:20px;">
								<center><h6>Quantity</h6></center>
				                <div class="row">
				                    <div class="col s3 center"><i class="small mdi-content-add-circle" style="color:teal"></i></div>
				                    <div class="input-field col s6" style="margin-top:-2px;"><input class="center" id="quantity" value="1" type="text" readonly></div>
				                    <div class="col s3 center"><i class="small mdi-content-remove-circle" style="color:teal"></i></div>
				                </div>
				            </div>
							<div class="input-field" style="margin:40px;">
								<select>
								    <option value="1" data-icon="#!" class="circle">Cotton</option>
								    <option value="2" data-icon="#!" class="circle">Linen</option>
								    <option value="2" data-icon="#!" class="circle">Silk</option>
								</select>
								<label>Fabric Type</label>
							</div>
							{!! Form::close() !!}

		    				<center><div class="container"><a class=" btn modal-trigger tooltipped" href="#measurementmodal" data-position="top" data-delay="50" data-tooltip="Edit measurement">Measurements</a></div></center>
						</div>

			        	<div class="divider" style="margin-bottom:10px; margin-top:30px;"></div>
			        	<div class="divider"></div>
			        </div>

			        <div class="col s12" style="margin-top:40px;">
	    				<div><a class="btn red left" style="border-radius:180px;">CANCEL</a></div>
	    				<div><a class="btn red right modal-trigger" style="border-radius:180px;" href="#savemodal">SAVE</a></div>
			        </div>
		       </div>

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
	                  	<label for="measurement">Hem</label>
	                </div>
	                <div class="input-field">
	                  	<input id ="measurement" type="text" class="validate">
	                  	<label for="measurement">Slim</label>
	                </div>
	                <div class="input-field">
	                  	<input id ="measurement" type="text" class="validate">
	                  	<label for="measurement">Sleeves</label>
	                </div>
				</div>
				<div class="col s6">
					<div class="input-field">
	                  	<input id ="measurement" type="text" class="validate">
	                  	<label for="measurement">Hips</label>
	                </div>
	                <div class="input-field">
	                  	<input id ="measurement" type="text" class="validate">
	                  	<label for="measurement">Circumference</label>
	                </div>
	                <div class="input-field">
	                  	<input id ="measurement" type="text" class="validate">
	                  	<label for="measurement">Slit</label>
	                </div>
				</div>
			</div>

		</div>

		<div class="modal-footer" style="background-color:#26a69a">
			<a href="" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
			<a href="" class="modal-action modal-close waves-effect waves-green btn-flat">Save</a>
		</div>
	</div>


	<!--Save Modal-->
	<div id="savemodal" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:150px">
		<h5><font color="green"><center><b>Save Changes?</b></center></font></h5>
		<div class="divider" style="height:2px"></div>
		<div class="modal-content">
			<div class="row">
				<div class="col s3">
					<i class="mdi-alert-warning" style="font-size:50px; color:yellow"></i>
				</div>
				<div class="col s9">
					<p><font size="+1">Are you sure you want to save the changes made?</font></p>
				</div>
			</div>
		</div>
		<div class="modal-footer col s12" style="background-color:green; opacity:0.85">
			<a class="modal-action modal-close waves-effect waves-green btn-flat" href="#!"><font color="black">Cancel</font></a>
            <a class="modal-action modal-close waves-effect waves-green btn-flat" href="{{URL::to('transaction/modifyIndividual')}}"><font color="black">No</font></a>
            <a class="modal-action modal-close waves-effect waves-green btn-flat" href="{{URL::to('transaction/modifyIndividual')}}"><font color="black">Yes</font></a>
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
	    $('.materialboxed').materialbox();
	  });
	 </script>

@stop