@extends('layouts.master')

@section('content')

<div class="main-wrapper"  style="margin-top:30px">

	<!--PACKAGE-->
	<div class="row">
	    <div class="col s12 m12 l12">
	    	<div class="card-panel">
		        <span class="card-title"><h5 style="color:#1b5e20"><center>PACKAGE A</center></h5></span>
		        <div class="divider" style="margin-bottom:50px;"></div>

		        <div class="row">
		        	<div class="col s12">
		        		<div class="col s4">
		        			<center><img src="{{URL::to('img/female-uniform-pants.jpg')}}" style="height:300px; width:250px; border: 3px gray solid"></center>
		        			<center><h6 style="margin-top:20px;">Quantity</h6></center>
			                <div class="row">
			                    <div class="col s3 center"><i class="small mdi-content-add-circle" style="color:teal"></i></div>
			                    <div class="input-field col s6" style="margin-top:-2px;"><input class="center" id="quantity" value="1" type="text" readonly></div>
			                    <div class="col s3 center"><i class="small mdi-content-remove-circle" style="color:teal"></i></div>
			                </div>
			        	</div>
			        	<div class="col s4">
		        			<center><img src="{{URL::to('img/female-uniform-plain.jpeg')}}" style="height:300px; width:250px; border: 3px gray solid"></center>
		        			<center><h6 style="margin-top:20px;">Quantity</h6></center>
			                <div class="row">
			                    <div class="col s3 center"><i class="small mdi-content-add-circle" style="color:teal"></i></div>
			                    <div class="input-field col s6" style="margin-top:-2px;"><input class="center" id="quantity" value="1" type="text" readonly></div>
			                    <div class="col s3 center"><i class="small mdi-content-remove-circle" style="color:teal"></i></div>
			                </div>
			        	</div>
			        	<div class="col s4">
		        			<center><img src="{{URL::to('img/female-uniform-skirt.jpg')}}" style="height:300px; width:250px; border: 3px gray solid"></center>
		        			<center><h6 style="margin-top:20px;">Quantity</h6></center>
			                <div class="row">
			                    <div class="col s3 center"><i class="small mdi-content-add-circle" style="color:teal"></i></div>
			                    <div class="input-field col s6" style="margin-top:-2px;"><input class="center" id="quantity" value="1" type="text" readonly></div>
			                    <div class="col s3 center"><i class="small mdi-content-remove-circle" style="color:teal"></i></div>
			                </div>
			        	</div>
		        	</div>
				    <div class="col s12" style="margin-top:40px;">
	    				<div><a class="btn red left" style="border-radius:180px;">CANCEL</a></div>
	    				<div><a class="btn red right modal-trigger" style="border-radius:180px;" href="#savemodal">SAVE</a></div>
			        </div>
		        </div>

	        </div>
	    </div>
	</div>

	<!--CUSTOM PACKAGE-->
	<div class="row">
	    <div class="col s12 m12 l12">
	    	<div class="card-panel">
		        <span class="card-title"><h5 style="color:#1b5e20"><center>CUSTOM</center></h5></span>
		        <div class="divider" style="margin-bottom:50px;"></div>

		        <div class="row">
		        	<div class="col s12">
		        		<div class="col s4">
		        			<center><img src="{{URL::to('img/unisex-uniform.jpg')}}" style="height:300px; width:250px; border: 3px gray solid"></center>
		        			<center><h6 style="margin-top:20px;">Quantity</h6></center>
			                <div class="row">
			                    <div class="col s3 center"><i class="small mdi-content-add-circle" style="color:teal"></i></div>
			                    <div class="input-field col s6" style="margin-top:-2px;"><input class="center" id="quantity" value="1" type="text" readonly></div>
			                    <div class="col s3 center"><i class="small mdi-content-remove-circle" style="color:teal"></i></div>
			                </div>
			        	</div>
			        	<div class="col s4">
		        			<center><img src="{{URL::to('img/female-uniform-plain.jpeg')}}" style="height:300px; width:250px; border: 3px gray solid"></center>
		        			<center><h6 style="margin-top:20px;">Quantity</h6></center>
			                <div class="row">
			                    <div class="col s3 center"><i class="small mdi-content-add-circle" style="color:teal"></i></div>
			                    <div class="input-field col s6" style="margin-top:-2px;"><input class="center" id="quantity" value="1" type="text" readonly></div>
			                    <div class="col s3 center"><i class="small mdi-content-remove-circle" style="color:teal"></i></div>
			                </div>
			        	</div>
			        	<div class="col s4">
		        			<center><img src="{{URL::to('img/female-uniform-skirt.jpg')}}" style="height:300px; width:250px; border: 3px gray solid"></center>
		        			<center><h6 style="margin-top:20px;">Quantity</h6></center>
			                <div class="row">
			                    <div class="col s3 center"><i class="small mdi-content-add-circle" style="color:teal"></i></div>
			                    <div class="input-field col s6" style="margin-top:-2px;"><input class="center" id="quantity" value="1" type="text" readonly></div>
			                    <div class="col s3 center"><i class="small mdi-content-remove-circle" style="color:teal"></i></div>
			                </div>
			        	</div>
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
            <a class="modal-action modal-close waves-effect waves-green btn-flat" href="{{URL::to('transaction-modifycompanyorders-modifyemployee')}}"><font color="black">No</font></a>
            <a class="modal-action modal-close waves-effect waves-green btn-flat" href="{{URL::to('transaction-modifycompanyorders-modifyemployee')}}"><font color="black">Yes</font></a>
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