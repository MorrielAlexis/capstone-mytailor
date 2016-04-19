@extends('layouts.master')

@section('content')

	
	<a style="color:black" class="btn btn-large center-text light-green accent-1"  href="{{URL::to('transaction/walk')}}">Back to Customer Type</a>

	<div class = "main-wrapper">	
		<div class="row">
	      <div class="col s12 m12 l12">
	      	<span class="page-title"><h4>Transaction</h4></span>
	      </div>
    	</div> 
  	</div>

  	<div class = "container">
	  	<div class="row">
	      	<div class="col s12 m12 l12">
		        <div class="card-panel">
		          <div class="card-content">
						      <div class = "col s12">
                    <label><font size= "+2" color = "black">Choose Transacation Type</font></label>
                  </div>    

                  <div class = "row">
                    <div class ="col s6">
                      <br>
                      <center><a style="color:black" class="btn btn-large center-text light-green accent-1" href="{{URL::to('/alteration')}}">Alteration</a></center>
                    </div>
                    <div class ="col s6">
                      <br>
                      <center><a style="color:black" class="btn btn-large center-text light-green accent-1" href="{{URL::to('/madeOrder')}}">Made to Order</a></center>
                  </div>
				</div>
            </div>
				  </div>
			 </div>
		</div>
	
						

@stop

