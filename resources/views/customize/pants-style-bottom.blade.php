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
          <center><span style="font-size:42px; color: #757575; font-family:'Playfair Display','Times';">PANTS CUSTOMIZATION</span></center>
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
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab black-text">Pleats</li>
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab active">Pockets</li>
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab active"><a style="color:black" href="#tabBottom">Bottom</a></li>
          <div class="indicator light-blue" style="z-index:1"></div>
        </ul>

        <!--BOTTOM TAB-->
        {!! Form::open(['url' => 'shopping-cart', 'method' => 'POST']) !!}
        <div id="tabBottom" class="col s12 white" style="padding:20px; border 2px teal accent-4 white-text;">

          <div class="col s12">
            <div><button class="right btn-flat teal accent-4 white-text" type="submit">Go to Shopping Cart</button></div>
            <div><a class="left btn-flat teal accent-4 white-text" href="{{URL::to('/customize-pants-style-pockets')}}">Previous step</a></div>
          </div>          
          <div class="col s12 divider" style="height:4px; margin-top:10px;"></div>

          <div class="col s12" style="padding:20px;"><h4>Pants' Bottom</h4></div>
          @foreach($bottomSegment as $bottom)
          <div class="col s12">
            @foreach($pattern as $pattern)
            <div class="col s2" @if($pattern->strSegPStyleCategoryFK != $bottom->strSegStyleCatID) hidden @endif>
              <img class="materialboxed responsive-img" src="{{URL::asset($pattern->strSegPImage)}}">
              <p>
                <input name="rdb_pattern{{ $bottom->strSegStyleCatID }}" type="radio" class="filled-in" value = "{{ $pattern->strSegPatternID }}" id="{{ $pattern->strSegPatternID }}" />
                <label for="{{ $pattern->strSegPatternID }}"><font size="+1"><b>{{$pattern->strSegPName}}</b></font></label>
              </p>
            </div>
            @endforeach
          </div>
          @endforeach


         <!-- <div class="col s12">
            
            <div class="col s2">
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <p>
                <input name="" type="radio" class="filled-in" value = "" id="" />
                <label for=""><font size="+1"><b>Bottom Name</b></font></label>
              </p>
            </div>

          </div> -->

          <div class="col s12 divider" style="height:4px; margin-bottom:10px;"></div>
          <div class="col s12">
            <div><button class="right btn-flat teal accent-4 white-text" type="submit">Go to Shopping Cart</button></div>
            <div><a class="left btn-flat teal accent-4 white-text" href="{{URL::to('/customize-pants-style-pockets')}}">Previous step</a></div>
          </div>

        </div>
        {!! Form::close() !!}
        <!--END OF BOTTOM TAB-->

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
        