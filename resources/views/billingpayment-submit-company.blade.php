@extends('layouts.master')

@section('content')


	<div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><center><h3><b>Welcome to <font color="white">MyTailor</font></b></h3></center></span>
        <center><h5>Payment - Company</h5></center>
      </div>
    </div>

    <div class="row" style="padding:30px">
		
		<div class="col s12">
			{!! Form::open(['url' => 'transaction/payment/company/print-receipt', 'method' => 'GET']) !!}
			<div id="payment-info" class = "hue col s12 active" style="background-color: white; border:2px outset">
		        <div class="row">
			        <div class="col s12 m12 l12">
	                	<span class="page-title" style="margin:15px; color:teal"><center><h5><b>Oops! One more thing before you're done...</b></h5></center></span>
	              		<div class="divider" style="height:1px; background-color:#80d8ff"></div>
	              		<div class="divider" style="height:1px; background-color:#80d8ff"></div>
	              	</div>
		       	</div>

		       	<div class="row" style="background-color:white; padding:40px">
	            	<div class="col s12">
						
						<a class="center" href="#!" onclick="window.open('/transaction/payment/company/generate-receipt')">
							<center><img style="height:20%; width:20%" src="{{URL::to('img/temp-online.png')}}"></center>
							<p align="center" style="font-size:30px; color:teal"><center><b><u><font size="4em">Print order receipt</font></u></b></center></p>
						</a>
						
						<br><br>
						<div class="col s12"><div class="divider" style="height:2px; background-color:teal; margin-bottom:18px"></div></div>
						<right><button type="submit" class="right" style="background-color:teal; color:white; height:4%; width:8%">Done!</button></right>


	            	</div> <!-- end of col s12 -->
	            </div> <!-- end of row -->
		    </div> <!-- end of payment info -->
				
			{!! Form::close() !!}
		</div> <!-- end of col s12 -->

    </div> <!-- end of row -->

@stop

@section('scripts')