@extends('layouts.masterOnline')

@section('content')

    <div class="container" style="width:100%;">
      <div class="row" style="margin:40px;">
        <ul class="col s12 breadcrumb">
          <li><a style="padding-left:100px; padding-top:20px; padding-bottom:20px; padding-right:20px;"><b>Select Fabric</b></a></li>
          <li><a style="padding-left:140px; padding-top:20px; padding-bottom:20px; padding-right:20px;"><b>Choose Style</b></a></li>
          <li><a class="active" style="padding-left:140px; padding-top:20px; padding-bottom:20px; padding-right:20px;"><b>Step 3: Measurement</b></a></li>
          <li><a style="padding-left:140px; padding-top:20px; padding-bottom:20px; padding-right:20px;"><b>Check Out</b></a></li>
        </ul>
      </div>
    </div>
  
	<div class="container">
	    <div class="section white row" style="padding:20px; margin-bottom:20px;"> 

	      	<div id="measure-detail" class = "hue col s12" style="padding:20px;">
	        	<div class="row">
		            <div class="col s12 m12 l12">
		                <span class="page-title" style="margin:15px"><center><h5><b>Employee Detail</b></h5></center></span>
		                <div class="divider" style="height:1px; background-color:#80d8ff"></div>
		                <div class="divider" style="height:1px; background-color:#80d8ff"></div>
		            </div>

		<div class="col s6" style="margin:20px;">
	        <div style="color:gray" class="col s8"> 
	          	<div class="col s7"><p style="color:gray; margin-top:5px; font-size:15px"><b>No. of Employees:</b></p></div>                
	          	<div class="col s5"><center><input class="center" name="num-meas-profile" id="num-meas-profile" type="number" value=""></div>
	        </div>
	        <div class="col s2"><a href="" class="btn-flat" style="background-color:teal; color:white; margin-top:10px">Add</a></div>
	    </div>        

					<div class="col s12" style="margin-bottom:30px">
						<div class="input-field col s3">
				          <input id="first_name" type="text" class="validate">
				          <label for="first_name">First Name</label>
				        </div>

				        <div class="input-field col s3">
				          <input id="last_name" type="text" class="validate">
				          <label for="last_name">Last Name</label>
				        </div>

				        <div class="input-field col s1">
				          <input id="middle_initial" type="text" class="validate">
				          <label for="middle_initial">M.I</label>
				        </div>

				        <div class="input-field col s1">
						    <select>
						      
						      <option value="1">F</option>
						      <option value="2">M</option>
						    </select>
						    <label>Sex</label>
						</div>

						<div class="input-field col s2">
						    <select>
						      
						      <option value="1">Men Set A</option>	
						      <option value="2">Women Set A</option>
						      <option value="3">Unisex Set A</option>
						    </select>
						    <label>Choose a package</label>
						</div>

						<div class="col s2">
							<a style="color:black; margin-top:15px" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to remove employee data from list" href="#removeOrder"><i class="mdi-navigation-close"></i></a>
							<div id="removeOrder" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:150px">
								<h5><font color="red"><center><b>Warning!</b></center></font></h5>
									
								{!! Form::open() !!}
								<div class="divider" style="height:2px"></div>
								<div class="modal-content col s12">
									<div class="col s3">
										<i class="mdi-alert-warning" style="font-size:50px; color:red"></i>
									</div>
									<div class="col s9">
										<p><font size="+1">Are you sure to remove this order from cart?</font></p>
									</div>
								</div>

								<div class="modal-footer col s12" style="background-color:red; opacity:0.85">
					                <button type="submit" class="waves-effect waves-green btn-flat" href="#!"><font color="black">Yes</font></button>
					                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">No</font></a>
					            </div>
								{!! Form::close() !!}
							</div>
							<a style="color:black; margin-top:15px" class="btn tooltipped btn-floating teal accent-4" data-position="bottom" data-delay="50" data-tooltip="Click to edit the set purchased" href="{{URL::to('/online-company-checkout-edit-set')}}"><i class="mdi-editor-border-color"></i></a>
						</div>
					</div>

		<!--bottom buttons-->
          <a href="#cancel-order" class="left btn modal-trigger tooltipped" data-position="top" data-delay="50" data-tooltip="Clears current transaction" style="background-color:teal; padding:9.5px; padding-bottom:45px; color:white">Cancel</a>
            <div id="cancel-order" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:80px">
              <h5><font color="red"><center><b>Warning!</b></center></font></h5>
                
              <div class="divider" style="height:2px"></div>
              <div class="modal-content col s12">
                <div class="center col s4"><i class="mdi-alert-warning" style="color:red; font-size:60px"></i></div>
                <div class="col s8"><p style="font-size:18px">Are you sure? Doing this will delete current transaction.</p></div>
              </div>

              <div class="modal-footer col s12">
                <a class="waves-effect waves-green btn-flat" href="{{URL::to('/online-home')}}"><font color="black">Yes</font></a>
                <a href="{{URL::to('/online-company-checkout-measurement')}}" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">No</font></a>
              </div>
          	</div>

          <a href="{{URL::to('/customize-sets-list-of-orders')}}" class="right btn tooltipped" data-position="top" data-delay="50" data-tooltip="Click to save employee information and measurement" style="background-color:#00695c; padding:9.5px; padding-bottom:45px; margin-left:30px"><label style="font-size:15px; color:white"><b>Save</b></label></a>

        <!--end of bottom buttons-->					



	        	</div>
		    </div>

	    </div>
  	</div>
@stop

@section('scripts')

  <script>
    $(document).ready(function() {
      $('select').material_select();
    });
  </script> 

@stop