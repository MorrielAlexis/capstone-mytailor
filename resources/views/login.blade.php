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

	<style>
		#peyj:hover {
			background-color: #b2dfdb;
		}
		.signup:hover {
			background-color: #b2dfdb;
		}
	</style>

	<body id="dabadehh" background="img/footer.jpg">

		<div id="login-page" class="section transparent" style="margin-left:3%; margin-right:69%; margin-top:10px;">
			<div>
				<img class="circle responsive-img" src="img/logo.jpg" style="padding-left:23%; padding-right:23%; margin-top:10px;">
			</div>

			<div style="color-background:grey; color:teal;">
      			<p class="center" id="peyj"><b><font size="+3">TAILORING MANAGEMENT SYSTEM</font></b></p>
 			</div>

		    <ul class="collapsible z-depth-0" style="margin:10px; border:0px;" data-collapsible="accordion">
			    <li>
			      	<div class="collapsible-header center white-text teal lighten-2" style="border-radius:5px; border:0px; padding:7px;"><font size="+2">LOG IN</font></div>

			      	<div class="collapsible-body row white" style="border:0px;">
				      	{!! Form::open(['url' => 'login']) !!}

		         		@if(Session::get('flash_message'))
		         			<div class = "flash">
		         				{{ Session::get('flash_message') }}
		         			</div>
		         		@endif

		    	 		<!-- Content form input -->
			      		<div class="form-group" style="padding-left:20px; padding-right:20px">
					        <div class="row margin">
			          			<div class="input-field col s12">
			           				<i class="mdi-social-person-outline prefix"></i>
			           				<input class="" id="email" type="email" name="email" value="{{ old('email') }}">
			           				<label for="email" data-error="wrong" data-success="right" class="center-align">Email</label>
			       				</div>
		        			</div>

						    <div class="row margin">
			          			<div class="input-field col s9">
			           				<i class="mdi-action-lock-outline prefix"></i>
			           				<input id="password" type="password" name="password" value="{{ old('password') }}">
		           					<label for="password">Password</label>
			       				</div>
			       				<div class="col s3" style="margin-top:14px;">
			       					<button type="submit" class="btn waves-effect waves-light col s12"><i class="mdi-action-trending-neutral" style="font-size:30px;"></i></button>
			       				</div>
			       			</div>
		       			</div>
			      	</div>
		    	 	{!! Form::close() !!}
			    
			    </li>

			    <li style="margin-top:10px; padding:0;">
			      	<div class="collapsible-header center white-text teal lighten-2" style="border-radius:5px; border:0px; padding:7px;"><font size="+2">SIGN UP</font></div>

			      	<div class="collapsible-body row white" style="border:0; padding-bottom:-10px;">
			      		<div style="padding:0; margin:0;">
					        <div class="row margin signup" style="padding:0px; margin:0;">
			          			<div class="col s8">
			           				<p class="center"><b><font size="+1.5">INDIVIDUAL</font></b></p>
			       				</div>
			       				<div class="col s4" style="margin-top:23px;">
			       					<button class="modal-trigger btn waves-effect waves-light" href="#individualsignup"><i class="mdi-social-person" style="font-size:30px;"></i></button>
			       				</div>
		        			</div>

					        <div class="row margin signup" style="padding:0px; margin:0;">
			          			<div class="col s8">
			           				<p class="center"><b><font size="+1.5">COMPANY</font></b></p>
			       				</div>
			       				<div class="col s4" style="margin-top:23px;">
			       					<button class="modal-trigger btn waves-effect waves-light" href="#companysignup"><i class="mdi-social-people" style="font-size:30px;"></i></button>
			       				</div>
		        			</div>
		       			</div>
			      	</div>
			    
			    </li>
			</ul>

		</div>

		<!--INDIVIDUAL-->
	    <div id="individualsignup" class="modal" style="width:35%; margin-top:40px; background-color:#eeeeee;">
	        
	        {!! Form::open() !!}
	        <div class="modal-content row" style="padding:20px;">
	      	<h3><font color="green"><b>SIGN UP</b></font></h3>
	        	<div class="col s12">
			        <div class="input-field col s6" style="border-radius:5px;">
			          	<input placeholder="First Name" id="first_name" type="text" class="validate">
			        </div>
			        <div class="col s1"><h1></h1></div>
			        <div class="input-field col s5" style="border-radius:5px;">
			          	<input placeholder="Last Name" id="last_name" type="text" class="validate">
			        </div>			        
	        	</div>
	        	<div class="col s12">
	        		<div class="input-field" style="padding:5px; border-radius:5px;">
			          	<input placeholder="Email Address" id="email" type="email" class="validate">
			        </div>
		        </div>
	        	<div class="col s12">
	        		<div class="input-field" style="padding:5px; border-radius:5px;">
			          	<input placeholder="Password" id="password" type="password" class="validate">
			        </div>
		        </div>
	        	<div class="col s12">
	        		<div class="input-field" style="padding:5px; border-radius:5px;">
			          	<input placeholder="Re-type Password" id="retype" type="password" class="validate">
			        </div>
		        </div>

	        </div>
	        {!! Form::close() !!}

	       	<div class="modal-footer" style="background-color:#eeeeee;">
	            <div><a href="" class="left modal-action modal-close waves-effect waves-green teal white-text btn-large btn-flat">Cancel</a></div>
	            <div><a href="" class="right modal-action modal-close waves-effect waves-green green white-text btn-large btn-flat"><b><font size="+1">Sign up</font></b></a></div>
	        </div>

	    </div>

	    <!--COMPANY-->
	    <div id="companysignup" class="modal" style="width:35%; margin-top:40px; background-color:#eeeeee;">
	        
	        {!! Form::open() !!}
	        <div class="modal-content row" style="padding:20px;">
	      	<h3><font color="green"><b>SIGN UP</b></font></h3>
	        	<div class="col s12">
			        <div class="input-field col s6" style="border-radius:5px;">
			          	<input placeholder="Company Name" id="company_name" type="text" class="validate">
			        </div>
			        <div class="col s1"><h1></h1></div>
			        <div class="input-field col s5" style="border-radius:5px;">
			          	<input placeholder="Contact Person" id="contact_person" type="text" class="validate">
			        </div>			        
	        	</div>
	        	<div class="col s12">
	        		<div class="input-field" style="padding:5px; border-radius:5px;">
			          	<input placeholder="Company Email Address" id="email" type="email" class="validate">
			        </div>
		        </div>
	        	<div class="col s12">
	        		<div class="input-field" style="padding:5px; border-radius:5px;">
			          	<input placeholder="Password" id="password" type="password" class="validate">
			        </div>
		        </div>
	        	<div class="col s12">
	        		<div class="input-field" style="padding:5px; border-radius:5px;">
			          	<input placeholder="Re-type Password" id="retype" type="password" class="validate">
			        </div>
		        </div>

	        </div>
	        {!! Form::close() !!}

	       	<div class="modal-footer" style="background-color:#eeeeee;">
	            <div><a href="" class="left modal-action modal-close waves-effect waves-green teal white-text btn-large btn-flat">Cancel</a></div>
	            <div><a href="" class="right modal-action modal-close waves-effect waves-green green white-text btn-large btn-flat"><b><font size="+1">Sign up</font></b></a></div>
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