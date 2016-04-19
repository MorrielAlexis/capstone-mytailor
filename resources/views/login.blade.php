<!DOCTYPE html>
<html>
	<head>
		<title>Fashion Collection</title>
		  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		  	<!-- Style Here --> 
		  	  {{ HTML::style('css/materialize.min.css') }}
		      {{ HTML::style('css/materialize.min.css') }}
	</head>

	<body background="img/fashion.jpg">
		<p></p><br><br><br><br>
       <div id="login-page" class="row">

    		<div class="col s4 push-s4 z-depth-4 card-panel">
	    	  <form class="login-form" action="{{URL::to('login')}}" method="post">
	      		  	<div class="row">
	        			<div class="input-field col s12 center">
	          				<p class="center login-form-text">TAILORING MANAGEMENT SYSTEM</p>
	          				<p></p>
	         			</div>
	         		</div>

	         		<div class="row margin">
	          			<div class="input-field col s12">
	           				<i class="mdi-social-person-outline prefix"></i>
	           				<input class="validate" id="username" type="text" name="username">
	           				<label for="email" data-error="wrong" data-success="right" class="center-align">Username</label>
	       				</div>
	        		</div>

	        		<div class="row margin">
	          			<div class="input-field col s12">
	           				<i class="mdi-action-lock-outline prefix"></i>
	           				<input id="password" type="password" name="password">
           					<label for="password">Password</label>
	       				</div>
	       			</div>

	       			<!--<div class="row margin">
          				<div class="col s12">
		       			
  							<input type="checkbox" class="filled-in" id="filled-in-box"/>
  							<label for="filled-in-box">Remember Me</label>
  						</div>
  					</div>-->

	       			
	       			<div class="row">

	       				<div class="col s12">
	           				<button type="submit" class="btn waves-effect waves-light col s12">Login</button>
         				</div>
         			</div>
         			<p></p>

         			<!--<div class = "row">
         				<div class = "col s12">
         					<button href = "#" class="btn-flat waves-effect waves-light col s12"><font color = teal size = "-2">Forgot Password?</font></button>
         				</div>
         				<!-- <div class = "col s6">
         					<a class="btn-flat waves-effect waves-light">Forgot Password?</a>
         				</div> -->
         			</div>
	    		</form>
	    	</div>
	    </div>

	    {{ HTML::script('js/jquery-2.1.4.min.js') }}
    	{{ HTML::script('js/materialize.min.js') }}
    	{{ HTML::script('js/inputfield.js')}}

    </body>
</html>