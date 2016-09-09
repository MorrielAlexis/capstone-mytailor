@extends('layouts.masterOnline')

@section('content')

<div class="row" style="margin:40px;">

    <div class="row" style="margin-top:40px;">
      <div class="col s12">
        <div class="col s4">
          <div class="divider teal accent-4 white-text" style="margin-bottom:5px;"></div>
          <div class="divider teal accent-4 white-text"></div>
        </div>

        <div class="col s4" style="margin-top:-30px;">
          <center><span style="font-size:42px; color: #757575;">CHOOSE YOUR SHIRT</span></center>
        </div>

        <div class="col s4">
          <div class="divider teal accent-4 white-text" style="margin-bottom:5px;"></div>
          <div class="divider teal accent-4 white-text"></div>
        </div>
      </div>
    </div>

  <div class="row">
    <div class="card col s12 m12 l12">          

      <p class="center-align" style="color:teal; margin-bottom:20px; margin-top:20px;"><b>CHOOSE THE TYPE OF SLEEVES</b></p>

      <div class="container">
        <div class="container">
          <div class="col s12">
            <p class="col s5">
              <input name="group1" type="radio" id="test1" />
              <label for="test1"><font size="+2"><b>Short Sleeves</b></font></label>
            </p>
            <p class="col s2">
              <input name="group1" type="radio" id="test2" />
              <label for="test2"><font size="+2"><b>3/4</b></font></label>
            </p>
            <p class="col s5">
              <input name="group1" type="radio" id="test3"  />
              <label for="test3"><font size="+2"><b>Long Sleeves</b></font></label>
            </p>
          </div>
        </div>
      </div>

      <div class="col s12" style="margin-top:15px">

        <div class="divider" style="margin-bottom:40px; height:2px"></div>
        <p class="center-align" style="color:teal; margin-bottom:40px"><b>CHOOSE AMONG AVAILABLE PRODUCTS</b></p>
      
          <div class="col s4">
              <div class="center col s12">
                <input type="checkbox" name="cbx-segment-name[]"  class="filled-in cbx-segment-name" id="" value="" style="padding:5px"/>
              </div>

              <div class="center col s12"><img src="" style="height:200px; width:250px; padding:10px; border:3px gray solid"></div>
            
            <center><h6 style="color:darkgray"><b>Quantity</b></h6></center>
              <div class="container"> 
                <div class="container">
                <div class="input-field col s12" style="margin-top:-2px;">
                  <center><input class="center int-segment-qty" disabled="true" name="" id="" type="number">
                </div>
                </div>
              </div>
          </div>
      </div>

            
      <div class="col s12">
        <div class="divider"></div>
        <a href="{{ URL::to('customize-mens-fabric') }}" class="right btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to customize orders" style="padding-left:10px; padding-right:10px; margin-top:20px; margin-bottom: 20px; font-size:15px; color:white; background-color: teal; opacity:0.90;">Customize Orders</a>
        <a class="left btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to cancel orders" style="padding-left:10px; padding-right:10px; margin-top:20px; margin-bottom: 20px; font-size:15px; color:white; background-color: teal; opacity:0.90;">Reset Order</a>
      </div>

    </div>
  </div>

</div>
@stop