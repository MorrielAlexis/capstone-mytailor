@extends('layouts.master')

@section('content')

<div class="main-wrapper"  style="margin-top:30px">

  <div class="row">
    <div class="col s12 m12 l12">
      <span class="page-title"><center><h3><b>Welcome to <font color="white">MyTailor</font></b></h3></center></span>
      <center><h5>Walk-in Alteration </h5></center>
    </div>
  </div>


    <div class="row section white" style="height:300px; border:2px solid grey; margin:40px;">

      <div class="col s12" style="padding:40px; margin-top:30px;">
        <div class="col s6">
          <center><div><a class="btn waves-effect waves-teal container" href="{{URL::to('transaction/alteration-walkin-newcustomer')}}" style="height:100px; padding:10px;"><font size="+5">NEW CUSTOMER</font></a></div></center>
        </div>

        <div class="col s6">
          <center><div><a class="btn waves-effect waves-teal container" href="{{URL::to('transaction/alteration-walkin-oldcustomer')}}" style="height:100px; padding:10px;"><font size="+5">OLD CUSTOMER</font></a></div></center>
        </div>
      </div>

    </div>

@stop