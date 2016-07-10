@extends('layouts.masterOnline')

@section('content')

	<div style="height:150px; margin-top: -15px;">
    <div style="height:20px;"></div>
    <center><h2 style="color:white; font-family:'Playfair Display','Times';">Choose your transaction</h2></center>
    <div class="container divider"></div>
  </div>

    <div class="row section transparent container" style="height:300px;">

      <div class="col s12" style="padding:80px;">
        <div class="col s6">
          <center><div><a class="btn waves-effect waves-teal container" href="{{URL::to('/online-alterationtransaction-newcustomer')}}" style="height:100px; padding:10px;"><font size="+5">NEW CUSTOMER</font></a></div></center>
        </div>

        <div class="col s6">
          <center><div><a class="btn waves-effect waves-teal container" href="{{URL::to('/online-alterationtransaction-patron')}}" style="height:100px; padding:30px;"><font size="+5">PATRON</font></a></div></center>
        </div>
      </div>

    </div>

@stop