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
          <center><span style="font-size:42px; color: #757575;">MEN'S SHIRT</span></center>
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
          <li><a style="padding-left:140px; padding-top:20px; padding-bottom:20px; padding-right:20px;"><b>Measurement</b></a></li>
          <li><a style="padding-left:140px; padding-top:20px; padding-bottom:20px; padding-right:20px;"><b>Check Out</b></a></li>
        </ul>

        <ul class="tabs transparent" style="float:left; margin-top:40px;">
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab active"><a style="color:black" href="#tabCollar">Collar</a></li>
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab black-text">Cuffs</li>
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab black-text">Buttons</li>
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab black-text">Pocket & Monogram</li>
<!--           <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab black-text">Others</li> -->
          <div class="indicator teal accent-4" style="z-index:1"></div>
        </ul>

        <!--COLLAR TAB-->
        {!! Form::open(['url' => 'customize-mens-style-cuffs', 'method' => 'POST']) !!}
        <div id="tabCollar" class="col s12 white" style="padding:20px; border 2px teal accent-4 white-text;">
          
          <div class="col s12"><button class="btn-flat right teal accent-4 white-text" type="submit">Next step</button></div>
          <div class="col s12 divider" style="height:4px; margin-top:10px;"></div>
          
          <div class="col s12" style="margin-top:10px;">
            <label class="col s2"><font size="+1"><b>Selected Fabric</b></font></label>
            <label class="col s5"><a class="btn teal accent-4 white-text" href="{{URL::to('/customize-mens-fabric')}}"><font size="+1">Edit / Change Fabric</font></a></label>
          </div>
          
          @foreach($fabrics as $fabric)
          <div class="col s12">
            <div class="col s2">
              <img class="responsive-img" src="{{ URL::asset($fabric->strFabricImage) }}">
            </div>
            <div class="col s5" style="background-color:#eeeeee;">
                <p>Fabric Name: {{ $fabric->strFabricName }}</p>
                <p>Swatch Code: {{ $fabric->strFabricCode }}</p>
                <p>Price:       {{ number_format($fabric->dblFabricPrice, 2) }} PHP</p>
            </div>
          </div>
          @endforeach

          @foreach($segments as $i => $segment)
          @foreach($collars as $j => $collar)
          @if($collar->boolIsActive == 1)
          <div class="col s12" style="margin-top:20px;">
            <ul class="collapsible" data-collapsible="accordion" style="border:none;" @if($segment->strSegmentID != $collar->strSegmentFK) hidden @endif>
              <li>
                <div class="collapsible-header" style="background-color:#00838f; color:white; height:30px; padding-top:10px; padding-bottom:50px; font-size:18px">{{ $collar->strSegStyleName }}</div>
                <div class="collapsible-body row overflow-x" style="padding:20px;">  
                  <div class="col s12">
                    @foreach($patterns as $k => $pattern)
                    <div class="col s2" @if($pattern->strSegPStyleCategoryFK != $collar->strSegStyleCatID) hidden @endif>
                      <img class="materialboxed responsive-img" src="{{URL::asset($pattern->strSegPImage)}}">
                      <p>
                        <input name="rdb_pattern{{ $collar->strSegStyleCatID }} {{ $i+1 }}" type="radio" class="filled-in" id="{{$pattern->strSegPatternID}}{{ $i+1 }}{{ $j+1 }}{{ $k+1 }}" />
                        <label for="{{$pattern->strSegPatternID}}{{ $i+1 }}{{ $j+1 }}{{ $k+1 }}">{{$pattern->strSegPName}}</label>
                      </p>
                    </div>
                    @endforeach
                  </div>                 
                </div>
              </li>
            </ul>
          </div>
          @endif
          @endforeach
          @endforeach

          <div class="divider dashed" style="height:2px;"></div>

          <div class="col s12" style="margin-top:20px;">
            <div class="col s3" style="padding:20px;"><h5><b>Collar Lining</b></h5>
              <p>Choose the rigidity or the hardness you wish for your collar. It concerns the whole collar, not just the collar points.</p>
            </div>
            <div class="col s3" style="padding:20px;"><h5><b>Removable Collar Stay</b></h5>
              <p>Shirt collar separate from the shirt.</p>
            </div>
            <div class="col s3" style="padding:20px;"><h5><b>Contrast Color</b></h5>
              <p>Collars of white or of different fabric from the shirt.</p>
            </div>
            <div >
              <div class="col s3" style="padding:20px;">
                <img class="materialboxed responsive-img" src="imgDesignPatterns/contrastcollar.jpg">
                <div><a style="color:white; margin-top:10px" class="modal-trigger btn tooltipped teal" data-position="bottom" data-delay="50" data-tooltip="Click to choose a fabric" href="#fabricContrast"><font size="+1">Select Fabric</font></a></div>
              </div> 
            </div>
          </div>


          <div class="col s12">

            <div class="col s3" style="padding:20px;">
              <div class="input-field">
                <select class="browser-default">
                  <option value="" disabled selected>Choose your option</option>
                  <option value="1">Common</option>
                  <option value="2">Stiff</option>
                  <option value="3">Soft</option>
                </select>
              </div>
            </div>

            <div class="col s3" style="padding:20px;">
              <div class="input-field">
                <select class="browser-default">
                  <option value="" disabled selected>Choose your option</option>
                  <option value="1">No Collar Stay</option>
                  <option value="2">Removable Collar Stay</option>
                  <option value="3">RSewn-in Collar Stay</option>
                </select>
              </div>             
            </div>

          </div>   

              <div id="fabricContrast" class="modal modal-fixed-footer" style="width:1100px; height:600px">
                  <h5><font color = "#1b5e20"><center>List of Available Fabrics</center> </font> </h5>
      
                    <div class="divider" style="height:2px"></div>        
                    <div class="modal-content col s12">
                        <!--Select-->
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
                        
                        <div class="col s12" style="margin:20px">
                          <div class="divider" style="height:2px gray solid"></div>
                          <div class="divider" style="height:2px gray solid"></div>
                        </div> 
                        
                        <p style="color:gray; margin-left:20px">*Choose one of your desired fabric</p>

                        
                          @foreach($contrasts as $contrast)
                          <div class="col s6 fabric-general {{ $contrast->strFabricTypeFK }} {{ $contrast->strFabricPatternFK }} {{ $contrast->strFabricColorFK }} {{ $contrast->strFabricThreadCountFK }}">
                            <div class="center col s2" style="margin-top:60px">
                              <input name="rdb_fabricContrast" type="radio" class="filled-in" value="{{ $contrast->strFabricID }}" id="{{ $contrast->strFabricID }}" />                                    
                              <label for="{{ $contrast->strFabricID }}"></label>
                            </div>
                            <div class="col s10">
                              <div class="card-panel teal lighten-4 z-depth-1">
                                <div class="row valign-wrapper">
                                  <div class="center col s4">
                                    <img src="{{URL::asset($contrast->strFabricImage)}}"class="responsive-img"> <!-- notice the "circle" class -->
                                  </div>
                                  <div class="col s8"> 
                                    <p><b id="{{ 'fabricText'.$contrast->strFabricID }}">{{ $contrast->strFabricName }}</b></p> <!-- This will be the name of the pattern -->
                                    <span class="black-text">
                                      {{ $contrast->txtFabricDesc }}
                                    </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          @endforeach
                        
                      <div class="col s12" style="margin:20px"></div>
                      
                      </div>
                
                    <div class="modal-footer col s12">
                      <a  class="right modal-action modal-close waves-effect waves-green btn-flat">OK</a>
                      <!--<a  class="right modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>-->
                    </div>
                  </div>
              <!--End of modal for choosing fabric--> 

          <div class="col s12 divider" style="height:4px; margin-bottom:10px;"></div>
          <div class="col s12"><button class="right btn-flat teal accent-4 white-text" type="submit">Next step</button></div>

        </div>
        <!--END OF COLLAR TAB-->
        {!! Form::close() !!}


      </div>
    </div>
</div>
@stop

@section('scripts')
<script>
     $(document).ready(function(){
        $('.collapsible').collapsible({
          accordion : true // A setting that changes the collapsible behavior to expandable instead of the default accordion style
        });
      });
  </script>
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

@stop