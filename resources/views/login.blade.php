<!DOCTYPE html>
<html>
	<head>
		<title>Fashion Collection</title>
		  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		  	<!-- Style Here --> 
			  <link rel="shortcut icon" href="{{{ asset('img/logo.png') }}}">
		  	  {!! Html::style('css/materialize.min.css'); !!}
		      {!! Html::style('css/materialize.min.css'); !!}
	</head>

	<body background="img/fashion.jpg">
		<p></p><br><br><br><br>
       <div id="login-page" class="row">

    		<div class="col s4 push-s4 z-depth-4 card-panel">
	    	 	{!! Form::open(['url' => 'login']) !!}

	    	 		<!--Title form input -->
	    	 		<div class="form-group">
		        		<div style="padding:30px; color:teal">
		          			<p class="center login-form-text"><b><font size="+2.5">TAILORING MANAGEMENT SYSTEM</font></b></p>
	         			</div>
	         		</div>

	    	 		<!-- Content form input -->
				    <div class="form-group" style="padding-left:20px; padding-right:20px">
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
	       			</div>


	       			<div class="row margin" style="padding:20px">
	       				<div class="col s12">
	           				<button type="submit" class="btn waves-effect waves-light col s12">Login</button>
         				</div>
         			</div>
	    	 	{!! Form::close() !!}
	    	</div>
	    </div>

	    {!! Html::script('js/jquery-2.1.4.min.js'); !!}
    	{!! Html::script('js/materialize.min.js'); !!}
    	{!! Html::script('js/inputfield.js'); !!}

    </body>
</html>