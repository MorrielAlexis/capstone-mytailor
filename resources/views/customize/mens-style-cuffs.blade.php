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
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab black-text">Collar</li>
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab active"><a style="color:black" href="#tabCuffs">Cuffs</a></li>
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab black-text">Buttons</li>
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab black-text">Pocket & Monogram</li>
         <!--  <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab black-text">Others</li> -->
          <div class="indicator light-blue" style="z-index:1"></div>
        </ul>

        <!--CUFFS TAB-->
        {!! Form::open(['url' => 'customize-mens-style-buttons', 'method' => 'POST']) !!}
        <div id="tabCuffs" class="col s12 white" style="padding:20px; border 2px teal accent-4 white-text;">
          
          <div class="col s12">
            <div><button class="right btn-flat teal accent-4 white-text" type="submit">Next step</button></div>
            <div><a class="left btn-flat teal accent-4 white-text" href="{{URL::to('/customize-mens-style-collar')}}">Previous step</a></div>
          </div>
          <div class="col s12 divider" style="height:4px; margin-top:10px;"></div>

          @foreach($segments as $segment)
          <div class="col s12">
            <ul class="collapsible" data-collapsible="accordion" style="border:none;">
              @foreach($sleeves as $sleeve)
              @if($sleeve->boolIsActive == 1)
              <li @if($segment->strSegmentID != $sleeve->strSegmentFK) hidden @endif>
                <div class="collapsible-header" style="background-color:#00838f; color:white; height:30px; padding-top:10px; padding-bottom:50px; font-size:18px">{{ $sleeve->strSegStyleName }}</div>
                <div class="collapsible-body row overflow-x" style="padding:20px;">       
                  <div class="col s12">
                    @foreach($patterns as $pattern)
                    <div class="col s2" @if($pattern->strSegPStyleCategoryFK != $sleeve->strSegStyleCatID) hidden @endif>
                      <img class="materialboxed responsive-img" src="{{URL::asset($pattern->strSegPImage)}}">
                      <p>
                        <input name="rdb_pattern{{ $sleeve->strSegStyleCatID }}" type="radio" class="filled-in" value = "{{ $pattern->strSegPatternID }}" id="{{ $pattern->strSegPatternID }}" />
                        <label for="{{$pattern->strSegPatternID}}"><font size="+1"><b>{{$pattern->strSegPName}}</b></font></label>
                      </p>
                    </div>
                    @endforeach
                  </div>                
                </div>
              </li>
              @endif
              @endforeach 
     
              @foreach($cuffs as $cuff)
              @if($cuff->boolIsActive == 1)
              <li @if($segment->strSegmentID != $cuff->strSegmentFK) hidden @endif>
                <div class="collapsible-header" style="background-color:#00838f; color:white; height:30px; padding-top:10px; padding-bottom:50px; font-size:18px">{{ $cuff->strSegStyleName }}</div>
                <div class="collapsible-body row overflow-x" style="padding:20px;">  
                  <div class="col s12">
                    @foreach($patterns as $pattern)
                    <div class="col s2" @if($pattern->strSegPStyleCategoryFK != $cuff->strSegStyleCatID) hidden @endif>
                      <img class="materialboxed responsive-img" src="{{URL::asset($pattern->strSegPImage)}}">
                      <p>
                        <input name="rdb_pattern{{ $cuff->strSegStyleCatID }}" type="radio" class="filled-in" value = "{{ $pattern->strSegPatternID }}" id="{{ $pattern->strSegPatternID }}" />
                        <label for="{{$pattern->strSegPatternID}}"><font size="+1"><b>{{$pattern->strSegPName}}</b></font></label>
                      </p>
                    </div>
                    @endforeach
                  </div>                 
                </div>
              </li> 
              @endif 
              @endforeach            
            </ul>
          </div> 
          @endforeach         

          <div class="divider dashed" style="height:2px;"></div>

          <div class="col s12" style="margin-top:20px;">
            <div class="col s3" style="padding-left:20px;"><h5><b>Contrast Cuffs</b></h5></div>
            <div class="col s6" style="padding-left:20px;"><h5><b>Inside fabric for collar & cuffs</b></h5></div>
            <div class="col s3" style="padding-left:20px;"><h5><b>Select Cufflinks</b></h5></div>
          </div>

          <div class="col s12">

            <div class="col s3" style="padding:20px;">
              <img class="materialboxed responsive-img" src="imgDesignPatterns/contrastcuff.jpg">
              <div><a style="color:white; margin-top:10px" class="modal-trigger btn tooltipped teal" data-position="bottom" data-delay="50" data-tooltip="Click to choose a fabric" href="#cuffContrast"><font size="+1">Select Fabric</font></a></div>
            </div>             

            <div class="col s6" style="padding:20px;">
              <div class="col s3"><img class="materialboxed responsive-img" src="imgDesignPatterns/insidecollar.jpg"></div>
              <div class="col s3"><img class="materialboxed responsive-img" src="imgDesignPatterns/insidecuff.jpg"></div>
              <div class="col s12"><a style="color:white; margin-top:10px" class="modal-trigger btn tooltipped teal" data-position="bottom" data-delay="50" data-tooltip="Click to choose a fabric" href="#fabricInside"><font size="+1">Select Fabric</font></a></div>
            </div> 

            <div class="col s3" style="padding:20px;">
              <img class="materialboxed responsive-img" src="imgDesignPatterns/cufflinksamp.jpg">
              <div><a style="color:white; margin-top:10px" class="modal-trigger btn tooltipped teal" data-position="bottom" data-delay="50" data-tooltip="Click to choose a fabric" href="#cufflinks"><font size="+1">Select Cufflinks</font></a></div>
            </div> 

          </div>     

          <!-- Cuff COntrast -->
          <div id="cuffContrast" class="modal modal-fixed-footer" style="width:1100px; height:600px">
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
              <!--End of modal for Cuff Contrast -->

              <!-- Collar Cuff Insides -->
              <div id="fabricInside" class="modal modal-fixed-footer" style="width:1100px; height:600px">
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
              <!--End of modal for CC Inside-->   

              <!-- Cuff COntrast -->
              <div id="cufflinks" class="modal modal-fixed-footer" style="width:1100px; height:600px">
                  <h5><font color = "#1b5e20"><center>List of Available Cufflinks</center> </font> </h5>
      
                    <div class="divider" style="height:2px"></div>        
                    <div class="modal-content col s12">
                        
                          @foreach($cufflinks as $link)
                          <div class="col s6 fabric-general {{ $link->strFabricTypeFK }} {{ $link->strFabricPatternFK }} {{ $link->strFabricColorFK }} {{ $link->strFabricThreadCountFK }}">
                            <div class="center col s2" style="margin-top:60px">
                              <input name="rdb_fabricContrast" type="radio" class="filled-in" value="{{ $link->strFabricID }}" id="{{ $link->strFabricID }}" />                                    
                              <label for="{{ $link->strFabricID }}"></label>
                            </div>
                            <div class="col s10">
                              <div class="card-panel teal lighten-4 z-depth-1">
                                <div class="row valign-wrapper">
                                  <div class="center col s4">
                                    <img src="{{URL::asset($link->strFabricImage)}}"class="responsive-img"> <!-- notice the "circle" class -->
                                  </div>
                                  <div class="col s8"> 
                                    <p><b id="{{ 'fabricText'.$link->strFabricID }}">{{ $link->strFabricName }}</b></p> <!-- This will be the name of the pattern -->
                                    <span class="black-text">
                                      {{ $link->txtFabricDesc }}
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
              <!--End of modal for Cuff Contrast -->

          <div class="col s12 divider" style="height:4px; margin-bottom:10px;"></div>
          <div class="col s12">
            <div><button class="right btn-flat teal accent-4 white-text" type="submit">Next step</button></div>
            <div><a class="left btn-flat teal accent-4 white-text" href="{{URL::to('/customize-mens-style-collar')}}">Previous step</a></div>
          </div>

        </div>
        {!! Form::close() !!}
        <!--END OF CUFFS TAB-->


      </div>
    </div>
</div>
@stop

@section('scripts')

  <script>
    

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
        