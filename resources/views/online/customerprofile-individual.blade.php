@extends('layouts.masterOnline')

@section('content')

  <div class="section container white" style="width:90%; margin-top:20px; margin-bottom:20px; padding:40px;"> 

	<div class="row" style="margin-top:40px;">
		<div class="col s12">
			<div class="col s5">
				<div class="divider grey" style="margin-bottom:5px;"></div>
				<div class="divider grey"></div>
		  	</div>

		  	<div class="col s2" style="margin-top:-30px;">
		  		<center><span style="font-size:40px; color: #757575; font-family:'Playfair Display','Times';">My Profile</span></center>
		  	</div>

		  	<div class="col s5">
				<div class="divider grey" style="margin-bottom:5px;"></div>
				<div class="divider grey"></div>
		  	</div>
	  	</div>
  	</div>

  	<p class="center container" style="width:80%; margin-bottom:40px; margin-top:px;">Welcome to your personal page at MyTailor. Here you can find and modify all your registered personal data such as addresses, previous orders, and measurement profiles to make sure your information are up to date.</p>


  	<div class="container" style="width:97%; border:1px solid #757575;">
  		<h5 style="color:#757575; margin-left:15px;">My Details</h5>
  		<div class="divider" style="margin-top:-10px; margin-bottom:20px;"></div>
  		<span style="margin:20px;">Here you can view and edit information such as addresses, phone numbers and email addresses.</span>
  		<br>
  		<span style="margin:20px;">Your current registered details are:</span>
  		
  		<div class="row">
  			<div class="col s12">
  				<div class="col s3">
  					<h5 style="color: #757575; font-family:'Playfair Display','Times';">Full Name</h5>
  				</div>
  				<div class="col s9" style="margin-top:10px;">
  					<h6>Cassandra De Asis</h6>
  				</div>
  			</div>
  			<div class="col s12">
  				<div class="col s4">
  					<h5 style="color: #757575; font-family:'Playfair Display','Times';">Shipping Address</h5>
  				</div>
  				<div class="col s4">
  					<h5 style="color: #757575; font-family:'Playfair Display','Times';">Contact Numbers</h5>
  				</div>
  				<div class="col s4">
  					<h5 style="color: #757575; font-family:'Playfair Display','Times';">E-mail Address</h5>
  				</div>
  			</div>
  			<div class="divider black" style="margin-bottom:20px;"></div>
  			<div class="col s12">
  				<div class="col s4">
  					<h6>BlkLot Zamboanga Cor. Naga</h6>
  					<h6>Primavera Homes, Brgy. San Luis</h6>
  					<h6>Antipolo City</h6>
  				</div>
  				<div class="col s4">
  					<h6>09365702049</h6>
  				</div>
  				<div class="col s4">
  					<h6>casandradeasis@yahoo.com</h6>
  				</div>
  			</div>
  		</div>

		<div style="margin:10px;">
	  		<a class="btn-flat blue accent-2 modal-trigger" href="#changedetails">Change Details</a>
	  		<a class="btn-flat blue accent-2 modal-trigger" href="#changepassword">Change Password</a>
  		</div>  		
  	</div>

  	<div class="container" style=" margin-top:40px;width:97%; border:1px solid #757575;">
  		<h5 style="color:#757575; margin-left:15px;">My Measurement Profiles</h5>
  		<div class="divider" style="margin-top:-10px; margin-bottom:20px;"></div>
  		<span style="margin:20px;">Here are the following current profiles filed for you:</span>
  		
  		<div class="container" style="width:90%">
  			<table class="centered">
  				<thead>
  					<tr>
  						<th class="col s4">Name of Profile</th>
  						<th class="col s4">Last Changed</th>
  						<th class="col s4"></th>
  					</tr>
  				</thead>
  				<tbody>
  					<tr>
  						<td class="col s4"><a class="btn-flat modal-trigger blue-text" href="#measurementprofile">Wedding Gown</a></td>
  						<td class="col s4">today at 07:15</td>
  						<td class="col s4">
  							<a class="btn-flat modal-trigger" href="#modalEdit" style="color:#40c4ff;"><i style="font-size:15px;" class="mdi-editor-border-color"><b> Edit</b></i></a>
				  			<a class="btn-flat modal-trigger" href="#modalRemove" style="color:#40c4ff;"><i style="font-size:15px;" class="mdi-content-clear"><b> Remove</b></i></a>
  						</td>
  					</tr>
  				</tbody>
  			</table>
  		</div>

	  		<span style="margin:10px;">* changes do not affect running orders</span>

  		</div>
  </div>


  	<!--MODAL FOR CHANGE DETAILS-->
    <div id="changedetails" class="modal modal-fixed-footer">
        <h5><center><b>Individual Customer</b></center></h5>
	    <div class="divider" style="height:2px"></div>
	    <div class="modal-content">

		    <div class="input-field">
		        <input placeholder="Cassandra" pattern="[A-Za-z ]+" id="addFName" name = "addFName" type="text" class="validate" required>
		        <label for="first_name"> First Name: </label>
		    </div>

	        <div class="input-field">
	            <input placeholder="De Asis" pattern="[A-Za-z\' ]+" id="addLName" name = "addLName" type="text" class="validate" required>
	            <label for="last_name"> Last Name </label>
	        </div>

	        <div class="input-field">
	            <input placeholder="BlkLot Zamboanga Cor. Naga Primavera Homes Brgy. San Luis, Antipolo City" id="addStreet" name = "addAddress" type="text" class="validate" required>
	            <label for="Address"> Address: </label>
	        </div>

	        <div class="input-field">
	            <input placeholder="cassandradeasis@yahoo.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" id="addEmail" name = "addEmail" type="text" class="validate">
	            <label for="email"> Email Address: </label>
	        </div>

	        <div class="input-field">
	            <input placeholder="09365702049" pattern="[^1-9][^0-8]+\d{9}" id="addCel" name = "addCel" type="text" class="validate" required>
	            <label for="cellphone"> Cellphone Number: </label>
	        </div>

	        <div class="input-field">
	            <input placeholder="2193856" pattern="[0-9]{7}" id="addPhone" name = "addPhone" type="text" class="validate">
	            <label for="tel"> Telephone Number: </label>
	        </div>
	    </div>

	    <div class="modal-footer">
	      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Save</a>          
	      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Cancel</a>
	    </div>
	</div>

	<!--Modal for CHANGE PASSWORD-->
	<div id="changepassword" class="modal modal-fixed-footer" style="height:400px; width:500px; margin-top:70px">
		<h5><center><b>Change Password</b></center></h5>
		<div class="divider" style="height:2px"></div>
		<div class="modal-content">
			<div class="row">
				<div class="input-field col s12">
		        	<input id="current" type="password" class="validate">
		            <label for="current">Current Password</label>
		        </div>
		        <div class="input-field col s12">
		        	<input id="new" type="password" class="validate">
		            <label for="new">New Password</label>
		        </div>
		        <div class="input-field col s12">
		        	<input id="retype" type="password" class="validate">
		            <label for="retype">Re-type Password</label>
		        </div>
			</div>
		</div>
		<div class="modal-footer col s12">
            <button type="submit" class="waves-effect waves-green btn-flat" href="#!"><font color="black">Save</font></button>
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">Cancel</font></a>
        </div>
	</div>	

	<!--Modal for EDIT-->
	<div id="modalEdit" class="modal modal-fixed-footer" style="width:700px;">
    <h5><center><b>Measurements</b></center></h5>
      <div class="divider" style="height:2px"></div>
      <div class="modal-content">

      	<div class="input-field">
	        <input pattern="[A-Za-z ]+" id="addProfile" name = "addProfile" type="text" class="validate" required>
	        <label for="addProfile"> Profile Name: </label>
	    </div>

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

    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Save</a>
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
    </div>
  </div>

	<!--Modal for REMOVE-->
	<div id="modalRemove" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:150px">
		<h5><center><b>Warning!</b></center></h5>
		<div class="divider" style="height:2px"></div>
		<div class="modal-content">
			<div class="row">
				<div class="col s3">
					<i class="mdi-alert-warning" style="font-size:50px;"></i>
				</div>
				<div class="col s9">
					<p><font size="+1">Are you sure you want to remove this profile?</font></p>
				</div>
			</div>
		</div>
		<div class="modal-footer col s12">
            <button type="submit" class="waves-effect waves-green btn-flat" href="#!"><font color="black">Yes</font></button>
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">No</font></a>
        </div>
	</div>	

  <!--MEASUREMENT PROFILE-->
  <div id="measurementprofile" class="modal modal-fixed-footer" style="width:700px;">
    <h5><center><b>Measurements</b></center></h5>
      <div class="divider" style="height:2px"></div>
      <div class="modal-content">

      	<div class="input-field">
	        <input placeholder="Wedding Gown" pattern="[A-Za-z ]+" id="addProfile" name = "addProfile" type="text" class="validate" required>
	        <label for="addProfile"> Profile Name: </label>
	    </div>

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

    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Save</a>
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
    </div>
  </div>

@stop

@section('scripts')

	<!--
    <script>
      $(document).ready(function(){
        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
        $('.modal-trigger').leanModal();
      });
    </script>
    -->
    
  	<script>
  		$(document).ready(function() {
		    Materialize.updateTextFields();
		});
  	</script>

@stop