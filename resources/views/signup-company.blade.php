<!DOCTYPE html>
<html>
	<head>
		<title>MyTailor</title>
		  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		  	<!-- Style Here --> 
			  <link rel="shortcut icon" href="{{{ asset('img/logo.png') }}}">
			  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
			  {!! Html::style('css/materialize.min.css'); !!}
		      {!! Html::style('css/materialize.min.css'); !!}
	</head>

	<body background="img/footer.jpg">

	    <div class="row	" style="margin:50px;">
			<div class="container z-depth-5" style="background-color:#eeeeee;">
				
            	<h5 style="padding:20px;"><font color = "#1b5e20"><center>COMPANY PROFILE</center> </font> </h5>
                <div class="divider" style="height:2px"></div>
					{!! Form::open(['url' => '/register/profile/company/success' , 'method' => 'post']) !!}
				<div class="col s12" style="background-color:#eeeeee;">
					<div class = "col s12" style="padding:15px;">
			            <div class="input-field col s12">                 
			                <input value="{{$newCompId}}" id="strCompanyID" name="strCompanyID" type="text" class="" readonly>
			                <label for="company_id">Company ID </label>
			            </div>
			        </div>

			        <div class = "col s12" style="padding:15px;">
			            <div class="input-field col s12">
			                <input required id="strCompanyName" name = "strCompanyName" placeholder="Company Name" type="text" class="validate" required data-position="bottom" pattern="^([A-Za-z\-'`]+ )+[A-Za-z\-'`]+$|^[A-Za-z\-'`]+$" maxlength="30" minlength="2">
			                <label for="company_name"> Company Name <span class="red-text"><b>*</b></span></label>
			            </div>
			        </div>

			        <div class = "col s12" style="padding:15px;">
			            <div class="input-field col s3">
			               	<input required id="strCompanyBuildingNo" name="strCompanyBuildingNo" pattern="[0-9a-zA-Z\-\s]+$" name="addEmpHouseNo" type="text" placeholder="1-A" class="validate"/>
			                <label for="House No">Building No. <span class="red-text"><b>*</b></span></label>
			            </div>

			            <div class="input-field col s3">
			                <input  required id="strCompanyStreet" name="strCompanyStreet" pattern="^[a-zA-Z\d\-'`]+(\s[a-zA-Z\-'`]+)?" type="text" placeholder="Malunggay" class="validate"/>
			                <label for=" Street">Street <span class="red-text"><b>*</b></span></label>
			            </div>

			            <div class="input-field col s3">
			                <input id="strCompanyBarangay" name="strCompanyBarangay" pattern="^[a-zA-Z\d\-'`]+(\s[a-zA-Z\-'`]+)?" type="text" placeholder="Daang Bakal" class="validate"/>
			                <label for=" Brgy">Barangay/Subd </label>
			            </div>

			            <div class="input-field col s3">
			                <input required="" id="strCompanyCity" name="strCompanyCity" pattern="^[a-zA-Z\d\-'`]+(\s[a-zA-Z\-'`]+)?" type="text" placeholder="Mandaluyong" class="validate"/>
			                <label for=" City">City/Municipality <span class="red-text"><b>*</b></span></label>
			            </div>
			        </div>

			        <div class = "col s12" style="padding:15px;">
			            <div class="input-field col s6">
			                <input id="strCompanyProvince" name="strCompanyProvince" pattern="^[a-zA-Z\d\-'`]+(\s[a-zA-Z\-'`]+)?" type="text" placeholder="Pampanga" class="validate"/>
			                <label for=" Province">Province </label>
			            </div>

			            <div class="input-field col s6">
			                <input id="strCompanyZipCode" name="strCompanyZipCode" pattern="^[0-9]+$" type="text" placeholder="1001" class="validate"/>
			                <label for=" Zip Code">Zip Code </label>
			            </div>
			        </div>

			        <div class = "col s12" style="padding:15px;">
			            <div class="input-field col s6">
			                <input required id="strContactPerson" name = "strContactPerson" placeholder="Contact Person" type="text" class="validate" required data-position="bottom" pattern="^[a-zA-Z\-'`]+(\s[a-zA-Z\-'`]+)?" maxlength="30" minlength="2">
			                <label for="company_name"> Contact Person <span class="red-text"><b>*</b></span></label>
			            </div>

			            <div class="input-field col s6">
			                <input required id="strCompanyEmailAddress" name = "strCompanyEmailAddress" type="email" class="validate"/>
			                <label for="com_email_address"> Company Email Address <span class="red-text"><b>*</b></span></label>
			            </div>
			        </div>

			        <div class = "col s12" style="padding:15px;">
			            <div class="input-field col s6">
			                <input required id="strCompanyCPNumber" name = "strCompanyCPNumber" pattern="^[0-9]{11,11}$" type="text" class="validate" placeholder="09361234567" maxlength="11">
			                <label for="cellphone"> Cellphone Number <span class="red-text"><b>*</b></span></label>
			            </div>

			            <div class="input-field col s6">
			                <input id="strCompanyCPNumberAlt" name = "strCompanyCPNumberAlt" pattern="^[0-9]{11,11}$" type="text" class="validate" placeholder="09361234567" maxlength="11">
			                <label for="cellphone"> Cellphone Number (alternate)</label>
			            </div>
			        </div>

			        <div class = "col s12" style="padding:15px; margin-bottom:40px">
			            <div class="input-field col s6">
			                <input  id="strCompanyTelNumber" name = "strCompanyTelNumber" placeholder="5351673" pattern="^[0-9]{6,10}$" type="text" class="validate" maxlength="10">
			                <label for="tel"> Telephone Number </label>
			            </div>

			            <div class="input-field col s6">
			                <input id="strCompanyFaxNumber" name = "strCompanyFaxNumber" placeholder="5351673" pattern="^[0-9]{6,10}$" type="text" class="validate" maxlength="9" minlength="9">
			                <label for="fax"> Fax Number </label>
			            </div>
			        </div>
                    
                    <div class="col s12" style="margin-bottom:20px;">
			            <div><a href="" class="left waves-effect waves-green teal white-text btn-large btn-flat">Cancel</a></div>
			            <div><button type="submit" class="right waves-effect waves-green green white-text btn-large btn-flat"><b><font size="+1">Submit</font></b></button></div>
			        </div>
			        {!! Form::close() !!}
				</div>

			</div>
		</div>

		{!! Html::script('js/jquery-2.1.4.min.js'); !!}
    	{!! Html::script('js/materialize.min.js'); !!}
    	{!! Html::script('js/inputfield.js'); !!}

    	<script>

			$(".dropdown-button").dropdown();
        
    	</script>

    	<script>
    		$(document).ready(function(){
		        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
		        $('.modal-trigger').leanModal({
		            dismissible: false
		        });
		    });
    	</script>

    	@yield('scripts')
    </body>
</html>