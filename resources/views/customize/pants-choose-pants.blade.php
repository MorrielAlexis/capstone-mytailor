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
          <center><span style="font-size:42px; color: #757575;">CHOOSE YOUR PANTS</span></center>
        </div>

        <div class="col s4">
          <div class="divider teal accent-4 white-text" style="margin-bottom:5px;"></div>
          <div class="divider teal accent-4 white-text"></div>
        </div>
      </div>
    </div>

  <div class="row">
    <div class="card col s12 m12 l12">     

      {!! Form::open(['url' => 'customize-pants-fabric', 'method' => 'POST', "id" => "order-form"]) !!}
     

        <div class="col s12" style="margin-top:15px">
          <div class="divider" style="margin-bottom:40px; height:2px"></div>
          <p class="center-align" style="color:teal; margin-bottom:40px"><b>CHOOSE AMONG AVAILABLE PRODUCTS</b></p>
        
          @foreach($garments as $garment)
              @if($garment->boolIsActive==1)
               
                  <div class="col s4">

                    <div class="center col s12">
                      <input type="radio" name = "pants" class="filled-in cbx-segment-name" id="{{$garment->strSegmentID}}" value="{{$garment->strSegmentID}}" style="padding:5px"/>
                      <label for="{{$garment->strSegmentID}}">{{$garment->strSegmentName}}</label>
                    </div>

                    <div class="center col s12">
                      <img src="{{$garment->strSegmentImage}}" style="height:200px; width:250px; padding:10px; border:3px gray solid">
                    </div>
                  </div>
              @endif
            @endforeach
        </div>

              
        <div class="col s12">
          <div class="divider"></div>
          <button type = "submit" class="right btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to customize orders" style="padding-left:10px; padding-right:10px; margin-top:20px; margin-bottom: 20px; font-size:15px; color:white; background-color: teal; opacity:0.90;">Customize Orders</button>
          <button class="left btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click to cancel orders" style="padding-left:10px; padding-right:10px; margin-top:20px; margin-bottom: 20px; font-size:15px; color:white; background-color: teal; opacity:0.90;">Reset Order</button>
        </div>
      {!! Form::close() !!}

    </div>
  </div>

</div>
@stop