@extends('layouts.masterOnline')

@section('content')

<div class="row" style="margin:40px;">

    <div class="row" style="margin-top:40px;">
      <div class="col s12">
        <div class="col s4">
          <div class="divider grey" style="margin-bottom:5px;"></div>
          <div class="divider grey"></div>
        </div>

        <div class="col s4" style="margin-top:-30px;">
          <center><span style="font-size:42px; color: #757575; font-family:'Lemonada',cursive;">MEN'S SHIRT</span></center>
        </div>

        <div class="col s4">
          <div class="divider grey" style="margin-bottom:5px;"></div>
          <div class="divider grey"></div>
        </div>
      </div>
    </div>

    <div class="container" style="width:100%;">
      <div class="row" style="margin:40px;">
        <ul class="col s12 breadcrumb">
          <li><a class="active" style="padding-left:100px; padding-top:20px; padding-bottom:20px; padding-right:20px;"><b>Step 1: Select Fabric</b></a></li>
          <li><a style="padding-left:140px; padding-top:20px; padding-bottom:20px; padding-right:20px;"><b>Choose Style</b></a></li>
          <li><a style="padding-left:140px; padding-top:20px; padding-bottom:20px; padding-right:20px;"><b>Measurement</b></a></li>
          <li><a style="padding-left:140px; padding-top:20px; padding-bottom:20px; padding-right:20px;"><b>Check Out</b></a></li>
        </ul>
      </div>
    </div>

    <div class="container" style="width:100%;">
    <div class="section white" style="margin:40px; padding:40px;">

      <div class="col s12" style="margin-bottom:20px; padding:20px; padding-top:0;">

        <div class="col s3"><!--fabric type-->
          <div class="input-field col s12">
              <select class = "fabric-type" id = "fabric-type">
                <option value="TA" class="circle" selected>All</option>
                @foreach($fabricTypes as $fabricType)
                  <option value="{{ $fabricType->strFabricTypeID }}">{{ $fabricType->strFabricTypeName }}</option>
                @endforeach
              </select>
              <label><font size="3" color="gray">Fabric Type</font></label>
          </div>
        </div>

        <div class="col s3"><!--fabric color-->
          <div class="input-field col s12">
              <select class = "fabric-color" id = "fabric-color">
                <option value="CA" class="circle" selected>All</option>
                @foreach($fabricColors as $fabricColor)
                  <option value="{{ $fabricColor->strFabricColorID }}">{{ $fabricColor->strFabricColorName }}</option>
                @endforeach
              </select>
              <label><font size="3" color="gray">Fabric Color</font></label>
          </div>
        </div>

        <div class="col s3"><!--fabric pattern-->
          <div class="input-field col s12">
              <select class = "fabric-pattern" id = "fabric-pattern">
                <option value="PA" class="circle" selected>All</option>
                @foreach($fabricPatterns as $fabricPattern)
                  <option value="{{ $fabricPattern->strFabricPatternID }}">{{ $fabricPattern->strFabricPatternName }}</option>
                @endforeach
              </select>
              <label><font size="3" color="gray">Fabric Pattern</font></label>
          </div>
        </div>

        <div class="col s3"><!--fabric thread count-->
          <div class="input-field col s12">
              <select class = "fabric-thread-count" id = "fabric-thread-count">
                <option value="TCA" class="circle" selected>All</option>
                @foreach($fabricThreadCounts as $fabricThreadCount)
                  <option value="{{ $fabricThreadCount->strFabricThreadCountID }}">{{ $fabricThreadCount->strFabricThreadCountName }}</option>
                @endforeach
              </select>
              <label><font size="3" color="gray">Fabric Thread Count</font></label>
          </div>
        </div>
        <!--end of select-->

      </div>
     
      <center><span class="red-text"><font size="+1">Click fabric photo to view fabric in detail</font></span></center>
      <div class="col s12 divider dashed" style="height:4px; margin-top:10px; margin-bottom:10px;"></div>
      
      
      {!! Form::open(['url' => 'customize-mens-style-collar', 'method' => 'post']) !!}
      <div class="col s12" style="margin-bottom:20px;"><button class="right btn-flat teal accent-4 white-text" type="submit">Continue</button></div>

      @foreach($fabrics as $fabric)
      <div class="col s12 fabric-general {{ $fabric->strFabricTypeFK }} {{ $fabric->strFabricPatternFK }} {{ $fabric->strFabricColorFK }} {{ $fabric->strFabricThreadCountFK }}" style="margin-bottom:20px; padding:20px; padding-top:0;">
        <div class="col s6">
          <div class="center col s2 " style="margin-top:100px">
            <input name="rdb_fabric" type="radio" class="filled-in" value = "{{$fabric->strFabricID}}" id="{{$fabric->strFabricID}}" />
            <label for="{{$fabric->strFabricID}}"></label>
          </div>
          <div class="col s10">
            <div class="card-panel teal lighten-4 z-depth-1" style="height:265px">
              <div class="row valign-wrapper">
                <div class="center col s6">
                  <img src="{{URL::asset($fabric->strFabricImage)}}"class="responsive-img">
                </div>
                <div class="col s6"> 
                  <span><b>{{$fabric->strFabricName}}</b></span>
                  <br/>
                  <span class="black-text">
                    <b>{{$fabric->strFabricCode}}</b> <br>
                    <b>{{ number_format($fabric->dblFabricPrice, 2) }} PHP</b>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach 
      {!! Form::close() !!}
      
      <div class="col s12 divider dashed" style="height:4px; margin-bottom:10px;"></div>
      <center><span class="red-text"><font size="+1">Click fabric photo to view fabric in detail</font></span></center>

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
      $('.materialboxed').materialbox();
    });

  </script>

  <script>
    var type = $('#fabric-type');
    var color = $('#fabric-color');
    var pattern = $('#fabric-pattern');
    var threadCount = $('#fabric-thread-count');

    type.change(function () {
      updateUI();
    });

    color.change(function () {
      updateUI();
    });

    pattern.change(function () {
      updateUI();
    });

    threadCount.change(function () {
      updateUI();
    });


    function updateUI () {
      $('.fabric-general').hide();

      var typeValue = type.val();
      var colorValue = color.val();
      var patternValue = pattern.val();
      var threadValue = threadCount.val();
      
      if (typeValue == 'TA' && colorValue == 'CA' && patternValue == 'PA' && threadValue == 'TCA'){
        return $('.fabric-general').show();
      } 
      
      var typeClass = typeValue == 'TA' ? '' : '.' + typeValue;
      var colorClass = colorValue == 'CA' ? '' : '.' + colorValue;
      var patternClass = patternValue == 'PA' ? '' : '.' + patternValue;
      var threadClass = threadValue == 'TCA' ? '' : '.' + threadValue;

      var classesToUpdate = typeClass + colorClass + patternClass + threadClass;
      console.log(classesToUpdate);
      $(classesToUpdate).show();
    }

    updateUI();
  </script>

  <script>

    $(document).ready(function() {
      $('select').material_select();
    });

  </script>

@stop
