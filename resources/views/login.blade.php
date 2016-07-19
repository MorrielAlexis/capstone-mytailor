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

    @if (count($errors->register) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->register->all() as $error)
					<P>{{ $error }}</p>
				@endforeach
			</ul>
		</div>
	@endif

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
	        
	        {!! Form::open(['url' => '/signup/individual' , 'method' => 'post']) !!}
	        <div class="modal-content row" style="padding:20px;">
	      	<h3><font color="green"><b>SIGN UP</b></font></h3>
	        		<div class="input-field col s6" style="border-radius:5px;">
			          	<input placeholder="ID" value="{{$newUserId}}" name="userId" id="userId" type="hidden" class="validate">
			        </div>
	        	<div class="col s12">
			        <div class="input-field col s6" style="border-radius:5px;">
			          	<input placeholder="Name" id="userName" value="{{ old('userName') }}" name="userName" type="text" class="validate">
			        </div>			        
	        	</div>
	        	<div class="col s12">
	        		<div class="input-field" style="padding:5px; border-radius:5px;">
			          	<input placeholder="Email Address" name="email" id="email" value="{{ old('email') }}" type="email" class="validate">
			        </div>
		        </div>
	        	<div class="col s12">
	        		<div class="input-field" style="padding:5px; border-radius:5px;">
			          	<input placeholder="Password" name="password" id="password" value="{{ old('password') }}" type="password" class="validate">
			        </div>
		        </div>
	        	<div class="col s12">
	        		<div class="input-field" style="padding:5px; border-radius:5px;">
			          	<input placeholder="Re-type Password" name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}" type="password" class="validate">
			        </div>
		        </div>

	        </div>

	       	<div class="modal-footer" style="background-color:#eeeeee;">
	            <div><a href="" class="left modal-action modal-close waves-effect waves-green teal white-text btn-large btn-flat">Cancel</a></div>
	            <div><button type="submit" class="right modal-action modal-close waves-effect waves-green green white-text btn-large btn-flat"><b><font size="+1">Sign up</font></b></button></div>
	        </div>
	        
	        {!! Form::close() !!}

	    </div>

	    <!--COMPANY-->
	    <div id="companysignup" class="modal" style="width:35%; margin-top:40px; background-color:#eeeeee;">
	        
	        {!! Form::open(['url' => '/signup/company' , 'method' => 'post']) !!}
	        <div class="modal-content row" style="padding:20px;">
	      	<h3><font color="green"><b>SIGN UP</b></font></h3>
	      	<div class="input-field col s6" style="border-radius:5px;">
			          	<input placeholder="ID" value="{{$newUserId}}" name="userId" id="userId" type="hidden" class="validate">
			        </div>
	        	<div class="col s12">
			        <div class="input-field col s6" style="border-radius:5px;">
			          	<input placeholder="Company Name" name="compName" id="compName" value="{{ old('compName')}}" type="text" class="validate">
			        </div>			        
	        	</div>
	        	<div class="col s12">
	        		<div class="input-field" style="padding:5px; border-radius:5px;">
			          	<input placeholder="Company Email Address" name="email" id="email" value="{{ old('email')}}" type="email" class="validate">
			        </div>
		        </div>
	        	<div class="col s12">
	        		<div class="input-field" style="padding:5px; border-radius:5px;">
			          	<input placeholder="Password" name="password" id="password" value="{{ old('password')}}" type="password" class="validate">
			        </div>
		        </div>
	        	<div class="col s12">
	        		<div class="input-field" style="padding:5px; border-radius:5px;">
			          	<input placeholder="Re-type Password" name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation')}}" type="password" class="validate">
			        </div>
		        </div>

	        </div>

	       	<div class="modal-footer" style="background-color:#eeeeee;">
	            <div><a href="" class="left modal-action modal-close waves-effect waves-green teal white-text btn-large btn-flat">Cancel</a></div>
	            <div><button type="submit" class="right modal-action modal-close waves-effect waves-green green white-text btn-large btn-flat"><b><font size="+1">Sign up</font></b></button></div>
	        </div>
	        {!! Form::close() !!}
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