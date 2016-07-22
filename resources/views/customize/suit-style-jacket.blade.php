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
          <center><span style="font-size:42px; color: #757575; font-family:'Playfair Display','Times';">SUIT CUSTOMIZATION</span></center>
        </div>

        <div class="col s4">
          <div class="divider teal accent-4 white-text" style="margin-bottom:5px;"></div>
          <div class="divider teal accent-4 white-text"></div>
        </div>
      </div>
    </div>

    <div class="container" style="width:100%;">
      <div class="row" style="margin:40px;">
        <ul class="col s12 breadcrumb">
          <li><a style="padding-left:100px; padding-top:20px; padding-bottom:20px; padding-right:20px;"><b>Select Fabric</b></a></li>
          <li><a class="active"  style="padding-left:140px; padding-top:20px; padding-bottom:20px; padding-right:20px;"><b>Step 2: Choose Style</b></a></li>
          <li><a style="padding-left:140px; padding-top:20px; padding-bottom:20px; padding-right:20px;"><b>Check Out</b></a></li>
          <li><a style="padding-left:140px; padding-top:20px; padding-bottom:20px; padding-right:20px;"><b>Measurement</b></a></li>
        </ul>

        <ul class="tabs transparent" style="float:left; margin-top:40px;">
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab active"><a style="color:black" href="#tabJacket">Jacket Style</a></li>
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab black-text">Jacket Collar & Pockets</li>
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab black-text">Pants Style</li>
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab black-text">Monogram</li>
          <div class="indicator teal accent-4" style="z-index:1"></div>
        </ul>

        <!--JACKET TAB-->
        <div id="tabJacket" class="col s12 white" style="padding:20px; border: 2px teal accent-4;">

          <div class="col s12"><a class="btn-flat right teal accent-4 white-text" href="{{URL::to('/customize-suit-style-collar-pocket')}}">Next step</a></div>
          <div class="col s12 divider" style="height:4px; margin-top:10px;"></div>
          
          <div class="col s12" style="margin-top:10px;">
            <label class="col s2"><font size="+1"><b>Selected Fabric</b></font></label>
            <label class="col s5"><a class="btn teal accent-4 white-text" href="{{URL::to('/customize-mens-fabric')}}"><font size="+1">Edit / Change Fabric</font></a></label>
          </div>
          
          @foreach($fabrics as $fabric)
          <div class="col s12">
            <div class="col s2">
              <img class="responsive-img" src="{{ URL::asset($fabric->strFabricImage) }}" style="">
            </div>
            
            <div class="col s5" style="background-color:#eeeeee;">
                <p>Fabric Name: {{ $fabric->strFabricName }}</p>
                <p>Swatch Code: {{ $fabric->strFabricCode }}</p>
                <p>Fabric Type: {{ $fabric->strFabricTypeName }}</p>
                <p>Price:       {{ number_format($fabric->dblFabricPrice, 2) }} PHP</p>
            </div>
          </div>
          @endforeach

        @foreach($segment as $segment)

          @foreach($style as $style)
          <div class="col s12 @if($style->strSegmentFK != $segment->strSegmentID) hidden @endif" style="padding:20px;"><h5><b>{{$style->strSegStyleName}}</b></h5></div>
            <div class="col s12">
              @foreach($segpattern as $pattern)
                <div class="col s2" @if($pattern->strSegPStyleCategoryFK != $style->strSegStyleCatID) hidden @endif>
                  <img class="materialboxed responsive-img" src="{{URL::asset($pattern->strSegPImage)}}">
                  <p>
                    <input class="with-gap" name="classic" type="radio" id="small" />
                    <label for="{{$pattern->strSegPatternID}}"><font size="+1"><b>{{$pattern->strSegPName}}</b></font></label>
                  </p>
                </div>
              @endforeach
            </div>
          @endforeach

        @endforeach

          <div class="col s12 divider" style="height:4px; margin-bottom:10px;"></div>
          <div class="col s12"><a class="btn-flat right teal accent-4 white-text" href="{{URL::to('/customize-suit-style-collar-pocket')}}">Next step</a></div>

        </div>
        <!--END OF JACKET TAB-->


      </div>
    </div>
</div>
@stop

@section('scripts')

  <script>
    
    $(document).ready(function(){
      $('.modal-trigger').leanModal();
    });

    $(document).ready(function(){
      $('ul.tabs').tabs('select_tab', 'tab_id');
    });

    $(document).ready(function() {
      $('select').material_select();
    });

    $(document).ready(function() {
      Materialize.updateTextFields();
    });

  </script>

