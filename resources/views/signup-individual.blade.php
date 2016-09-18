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
        @if(Session::has('flash_message'))
        <div class="row" id="flash_message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow accent-1">
              <span class="alert alert-success"> <i class="material-icons right" onclick="$('#flash_message').hide()">clear</i></span>
             <em> {!! session('flash_message') !!}</em>
            </div>
          </div>
        </div>
      @endif
	    <div class="row	" style="margin:50px;">
			<div class="container z-depth-5" style="background-color:#eeeeee;">
				
            	<h5 style="padding:20px;"><font color = "#1b5e20"><center>CUSTOMER PROFILE</center> </font> </h5>
                <div class="divider" style="height:2px"></div>
					{!! Form::open(['url' => '/register/profile/individual/success' , 'method' => 'post']) !!}
				<div class="col s12" style="background-color:#eeeeee;">
					<div class = "col s12" style="padding:15px;">
                        <div class="input-field col s12">                 
                          	<input value = "{{$newID}}" id="strIndivID" name="strIndivID" type="hidden" class="" readonly>
                          	<label for="indi_id">Individual ID </label>
                        </div>
                    </div>

                    <div class = "col s12" style="padding:15px;">
                        <div class="input-field col s4">
                          	<input required id="strIndivFName" name = "strIndivFName" placeholder="Hope" type="text" class="validate" required data-position="bottom" pattern="^([A-Za-z\-'`]+ )+[A-Za-z\-'`]+$|^[A-Za-z\-'`]+$" maxlength="30" minlength="2">
                          	<label for="first_name" > First Name <span class="red-text"><b>*</b></label>
                        </div>

                        <div class="input-field col s4">
                          	<input id="strIndivMName" name = "strIndivMName" placeholder="Elizabeth" type="text" class="validate" data-position="bottom" pattern="^([A-Za-z\-'`]+ )+[A-Za-z\-'`]+$|^[A-Za-z\-'`]+$" maxlength="30" minlength="2">
                          	<label for="middle_name"> Middle Name </label>
                        </div>

                        <div class="input-field col s4">
                          	<input required id="strIndivLName" name = "strIndivLName" placeholder="Soberano" type="text" class="validate" required data-position="bottom" pattern="^([A-Za-z\-'`]+ )+[A-Za-z\-'`]+$|^[A-Za-z\-'`]+$">
                          	<label for="last_name"> Last Name <span class="red-text"><b>*</b></label>
                        </div>
                    </div>

                    <div class = "col s12" style="padding:15px;">
                        <div class="input-field col s3">
                            <input required id="strIndivHouseNo" name="strIndivHouseNo" pattern="[0-9a-zA-Z\-\s]+$" type="text" placeholder="1-A" class="validate"/>
                            <label for="House No">House No. <span class="red-text"><b>*</b></label>
                        </div>

                        <div class="input-field col s3">
                            <input required id="strIndivStreet" name="strIndivStreet" pattern="^[a-zA-Z0-9\'\-\.]+([a-zA-Z0-9\'\-\.]+)*$" type="text" placeholder="Malunggay" class="validate"/>
                            <label for=" Street">Street <span class="red-text"><b>*</b></label>
                        </div><!-- ^[a-zA-Z\-'`]+(\s[a-zA-Z\-'`]+)? -->
                         <!--  ^[a-zA-Z0-9\'\-\.]+(\s[a-zA-Z0-9\'\-\.]+)*$ -->

                        <div class="input-field col s3">
                            <input  id="strIndivBarangay" name="strIndivBarangay" pattern="^[a-zA-Z0-9\'\-\.]+( [a-zA-Z0-9\'\-\.]+)*$" type="text" placeholder="Daang Bakal" class="validate"/>
                            <label for=" Brgy">Barangay/Subd </label>
                        </div>

                        <div class="input-field col s3">
                            <input required id="strIndivCity" name="strIndivCity" pattern="^[a-zA-Z\'\-]+( \s[a-zA-Z\'\-]+)*$" type="text" placeholder="Mandaluyong" class="validate"/>
                            <label for=" City">City/Municipality <span class="red-text"><b>*</b></label>
                        </div>
                    </div>

   					<div class = "col s12" style="padding:15px;">
                        <div class="input-field col s6">
                            <input id="strIndivProvince" name="strIndivProvince" pattern="^[a-zA-Z\'\-\.]+( \s[a-zA-Z\'\-\.]+)*$" type="text" placeholder="Pampanga" class="validate">
                            <label for=" Province">Province/Region </label>
                        </div>

                        <div class="input-field col s6">
                            <input id="strIndivZipCode" name="strIndivZipCode" type="text" pattern="^[0-9]+$"  placeholder="1001" class="validate">
                            <label for=" Zip Code">Zip Code </label>
                        </div>
                    </div>

					<div class = "col s12" style="padding:15px;">
                        <div class="input-field col s12">
                            <input required id="strIndivEmailAddress" name = "strIndivEmailAddress" type="email" class="validate"/>
                            <label for="email"> Email Address <span class="red-text"><b>*</b></label>
                        </div>
                    </div>

                    <div class = "col s12" style="padding:15px;">
                        <div class="input-field col s6">
                            <input required id="strIndivCPNumber" name = "strIndivCPNumber" pattern="^[0-9]{11,11}$" type="text" class="validate" placeholder="09361234567" maxlength="11">
                            <label for="cellphone"> Cellphone Number <span class="red-text"><b>*</b></label>
                        </div>

                        <div class="input-field col s6">
                            <input id="strIndivCPNumberAlt" name = "strIndivCPNumberAlt" pattern="^[0-9]{11,11}$" type="text" class="validate" placeholder="09361234567" maxlength="11">
                            <label for="cellphone"> Cellphone Number (alternate)</label>
                        </div>
                    </div>

   					<div class = "col s12" style="padding:15px; margin-bottom:40px">
                        <div class="input-field col s12">
                            <input id="strIndivLandlineNumber" name = "strIndivLandlineNumber" placeholder="5351673" pattern="^[0-9]{6,10}$" type="text" class="validate" maxlength="10">
                            <label for="tel"> Telephone Number </label>
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