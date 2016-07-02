@extends('layouts.masterOnline')

@section('content')

  <div class="section container white" style="width:90%; margin-top:20px; margin-bottom:20px; padding:40px;"> 

  	<div class="row" style="margin-top:40px;">
  		<div class="col s12">
  			<div class="col s4">
  				<div class="divider grey" style="margin-bottom:5px;"></div>
  				<div class="divider grey"></div>
  		  </div>

  	  	<div class="col s4" style="margin-top:-30px;">
  	  		<center><span style="font-size:40px; color: #757575; font-family:'Playfair Display','Times';">Company Profile</span></center>
  	  	</div>

  		  <div class="col s4">
  				<div class="divider grey" style="margin-bottom:5px;"></div>
  				<div class="divider grey"></div>
  		  </div>
  	  </div>
    </div>

  	<p class="center container" style="width:80%; margin-bottom:40px; margin-top:px;">Welcome to your company page at MyTailor. Here you can find and modify all your registered company data such as addresses, previous orders, and employee profiles to make sure your information are up to date.</p>

    <!--DETAILS-->
  	<div class="container" style="width:97%; border:1px solid #757575;">
  		<h5 style="color:#757575; margin-left:15px;">Company Details</h5>
  		<div class="divider" style="margin-top:-10px; margin-bottom:20px;"></div>
  		
      <div class="row">
        <div class="col s12">
          <div class="col s6">
            <div class="col s4">
              <h6 style="color: #757575; font-family:'Playfair Display','Times';"><b>Company Name</b></h6>
              <h6 style="color: #757575; font-family:'Playfair Display','Times';"><b>Contact Person</b></h6>
              <h6 style="color: #757575; font-family:'Playfair Display','Times';"><b>E-mail Address</b></h6>
              <h6 style="color: #757575; font-family:'Playfair Display','Times';"><b>Fax Number</b></h6>
            </div>
            <div class="col s8">
              <h6>Watanabe Corp.</h6>
              <h6>Takashi Watanabe</h6>
              <h6>kahitanonalang@yahoo.com</h6>
              <h6>123-4567-8910</h6>
            </div>
          </div>
          <div class="col s6">
            <div class="col s6">
              <h6 style="margin-bottom:10px; color: #757575; font-family:'Playfair Display','Times';"><b>Contact Numbers</b></h6>
              <h6>09156359462</h6>
              <h6>6961252</h6>
            </div>
            <div class="col s6">
              <h6 style="margin-bottom:10px; color: #757575; font-family:'Playfair Display','Times';"><b>Shipping Address</b></h6>
              <h6>#042 Evangelista st.</h6>
              <h6>Santolan</h6>
              <h6>Pasig City</h6>
            </div>
          </div>
        </div>
      </div>

		  <div style="margin:10px;">
	  		<a class="btn-flat blue accent-2 modal-trigger" href="#changedetails">Change Details</a>
	  		<a class="btn-flat blue accent-2 modal-trigger" href="#changepassword">Change Password</a>
  		</div>  		
  	</div>

    <!--EMPLOYEE PROFILES-->
  	<div class="container" style=" margin-top:40px;width:97%; border:1px solid #757575;">
  		<h5 style="color:#757575; margin-left:15px;">Employees Profile</h5>
  		<div class="divider" style="margin-top:-10px; margin-bottom:20px;"></div>
  		
      <div class="container" style="width:90%">
        <table class="centered">
          <thead>
            <tr>
              <th class="col s5">Employee Name</th>
              <th class="col s3">Gender</th>
              <th class="col s4">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="col s5">Liza Soberano</td>
              <td class="col s3">Female</td>
              <td class="col s4">
                <a class="modal-trigger btn-flat deep-purple accent-1" style="padding:0; margin:10px; font-size:13px;" href="#measurementprofile"><b>Measurement Profile</b></a>
                <a class="modal-trigger btn-flat green accent-2" style="padding:0; margin:10px;" href="#editEmp"><i style="font-size:15px;" class="mdi-editor-border-color"><b> Edit</b></i></a>
                <a class="modal-trigger btn-flat red accent-2" style="padding:0; margin:10px;" href="#removeEmp"><i style="font-size:15px;" class="mdi-content-clear"><b> Remove</b></i></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
  		
  		<div style="margin:10px;">
	  		<a class="btn-flat blue accent-2 modal-trigger" href="#newprofile">Create a new profile</a>
  		</div>
  	</div>


  </div>


  <!--Modal for CHANGE DETAILS-->
  <div id="changedetails" class="modal modal-fixed-footer">
    <h5><center><b>Company Customer</b></center></h5>
    <div class="divider" style="height:2px"></div>
    <div class="modal-content">


      <div class="input-field">
        <input placeholder="Watanabe Corp." required pattern="[A-Za-z\'., ]+" id="addComName" name = "addComName" type="text" class="validate">
        <label for="company_name"> Company Name: </label>
      </div>

      <div class="input-field">
        <input placeholder="#042 Evangelista St. Santolan, Pasig City" required="" id="addAddress" name = "addAddress" type="text" class="validate">
        <label for="address"> Address: </label>
      </div>

      <div class="input-field">
        <input placeholder="Takashi Watanabe" required pattern="[A-Za-z\' ]+" id="addConPerson" name = "addConPerson" type="text" class="validate">
        <label for="company_name"> Contact Person: </label>
      </div>

      <div class="input-field">
        <input placeholder="kahitanonalang@yahoo.com" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" id="addComEmailAdd" name = "addComEmailAddress" type="text" class="validate">
        <label for="com_email_address"> Company Email Address: </label>
      </div>

      <div class="input-field">
        <input placeholder="09156359462" required pattern="[^1-9][^0-8]+\d{9}" id="addCel" name = "addCel" type="text" class="validate">
        <label for="cellphone"> Cellphone Number: </label>
      </div>

      <div class="input-field">
        <input placeholder="6961252" pattern="[0-9]{7}" id="addPhone" name = "addPhone" type="text" class="validate">
        <label for="tel"> Telephone Number: </label>
      </div>

      <div class="input-field">
        <input placeholder="123-4567-8910" pattern="[0-9]{7}" id="addFax" name = "addFax" type="text" class="validate">
        <label for="fax"> Fax Number: </label>
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
  <div id="editEmp" class="modal modal-fixed-footer" style="height:400px; width:500px; margin-top:70px">
    <h5><center><b>Edit Employee</b></center></h5>
    <div class="divider" style="height:2px"></div>
    <div class="modal-content">
      <div class="row">
        <div class="input-field col s12">
          <input placeholder="Liza" pattern="[A-Za-z ]+" id="addFName" name = "addFName" type="text" class="validate" required>
          <label for="first_name"> First Name: </label>
        </div>
        <div class="input-field col s12">
          <input placeholder="Soberano" pattern="[A-Za-z\' ]+" id="addLName" name = "addLName" type="text" class="validate" required>
          <label for="last_name"> Last Name </label>
        </div>
        <div class="input-field col s12">
          <select>
            <option value="" disabled selected>Choose your gender</option>
            <option value="1">Female</option>
            <option value="2">Male</option>
          </select>
        </div>
      </div>
    </div>
    <div class="modal-footer col s12">
            <button type="submit" class="waves-effect waves-green btn-flat" href="#!"><font color="black">Save</font></button>
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">Cancel</font></a>
        </div>
  </div>  

  <!--Modal for REMOVE-->
  <div id="removeEmp" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:150px">
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

  <!--Modal for NEW PROFILE-->
  <div id="newprofile" class="modal modal-fixed-footer" style="height:400px; width:500px; margin-top:70px">
    <h5><center><b>New Profile</b></center></h5>
    <div class="divider" style="height:2px"></div>
    <div class="modal-content">
      <div class="row">
        <div class="input-field col s12">
          <input pattern="[A-Za-z ]+" id="addFName" name = "addFName" type="text" class="validate" required>
          <label for="first_name"> First Name: </label>
        </div>
        <div class="input-field col s12">
          <input pattern="[A-Za-z\' ]+" id="addLName" name = "addLName" type="text" class="validate" required>
          <label for="last_name"> Last Name </label>
        </div>
        <div class="input-field col s12">
          <select>
            <option value="" disabled selected>Choose your gender</option>
            <option value="1">Female</option>
            <option value="2">Male</option>
          </select>
        </div>
      </div>
    </div>
    <div class="modal-footer col s12">
        <button type="submit" class="waves-effect waves-green btn-flat" href="#!"><font color="black">Save</font></button>
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">Cancel</font></a>
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

    <script>
      $(document).ready(function() {
        $('select').material_select();
      });
    </script>

@stop