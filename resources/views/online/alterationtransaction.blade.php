@extends('layouts.masterOnline')

@section('content')

	<div style="height:150px; margin-top: -10px;">
    <div style="height:20px;"></div>
    <center><h2 style="font-family: 'Mada', sans-serif;color:#009688">Choose your transaction</h2></center>
    <div class="container divider" style="background-color:black"></div>
  </div>

    <div class="row section transparent container" style="height:300px;">

      <div class="col s12" style="padding:80px;">
        <div class="col s12 m12 l6" style="padding:20px">
          <center><div><a class="btn waves-effect teal accent-4 waves-teal container" href="{{URL::to('transaction/online-alterationtransaction-newcustomer')}}" style="height:100px; padding:10px;"><font size="+5">NEW CUSTOMER</font></a></div></center>
        </div>

      {{--   <div class="col s12 m12 l6" style="padding:20px">
          <center><div><a class="btn waves-effect teal accent-4 waves-teal container" href="{{URL::to('transaction/online-alterationtransaction-patron')}}" style="height:100px; padding:30px;"><font size="+5">PATRON</font></a></div></center>
        </div> --}}
      </div>

    </div>

@stop