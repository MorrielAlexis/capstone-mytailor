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
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab black-text">Cuffs</li>
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab black-text">Buttons</li>
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab active"><a style="color:black" href="#tabPocketMonogram">Pocket & Monogram</a></li>
         <!--  <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab black-text">Others</li> -->
          <div class="indicator light-blue" style="z-index:1"></div>
        </ul>

        <!--POCKETS & MONOGRAM TAB-->
        <div id="tabPocketMonogram" class="col s12 white" style="padding:20px; border 2px teal accent-4 white-text;">
          
          <div class="col s12">
           <div><a class="right btn-flat teal accent-4 white-text" href="{{URL::to('/online-order-now')}}">Go to Shopping Cart</a></div>
          </div>
          <div class="col s12 divider" style="height:4px; margin-top:10px;"></div>

          <div class="col s12">
            <ul class="collapsible" data-collapsible="accordion" style="border:none;">
              @foreach($segments as $i => $segment)
              @foreach($pockets as $j => $pocket)
              @if($pocket->boolIsActive == 1)
              <li @if($segment->strSegmentID != $pocket->strSegmentFK) hidden @endif>
                <div class="collapsible-header" style="background-color:#00838f; color:white; height:30px; padding-top:10px; padding-bottom:50px; font-size:18px">{{ $pocket->strSegStyleName }}</div>
                <div class="collapsible-body row overflow-x" style="padding:20px;">
      
                    <div class="col s12">
                      <p>
                        <input class="with-gap" name="rdb_pattern" value = "null" type="radio" id="small" />
                        <label for="small"><font size="+1"><b>No Pocket</b></font></label>
                      </p>
                      @foreach($patterns as $k => $pattern)
                      <div class="col s2" @if($pattern->strSegPStyleCategoryFK != $pocket->strSegStyleCatID) hidden @endif>
                        <img class="materialboxed responsive-img" src="{{URL::asset($pattern->strSegPImage)}}">
                        <p>
                          <input name="rdb_pattern" value = "{{ $pocket->strSegStyleCatID }}" type="radio" class="filled-in" id="{{ $pocket->strSegStyleCatID }}{{ $i+1 }}{{ $j+1 }}{{ $k+1 }}" />
                          <label for="{{ $pocket->strSegStyleCatID }}{{ $i+1 }}{{ $j+1 }}{{ $k+1 }}">{{$pattern->strSegPName}}</label>
                        </p>
                      </div>
                      @endforeach
                    </div>  

                  <div class="col s12" style="margin:20px;">
                    <div class="col s4">
                    <h5><b>Contrast Pocket</b></h5>
                      <div class="card-panel teal lighten-4 z-depth-1" style="height:230px">
                        <div class="row valign-wrapper">
                          <div class="center" style="margin:auto;">
                            <img src="imgDesignPatterns/contrastpocket.jpg" alt="" class="responsive-img">
                            <figcaption><a style="color:white" class="modal-trigger btn tooltipped teal" data-position="bottom" data-delay="50" data-tooltip="Click to choose a fabric" href="#pocketContrast">Select Fabric</a></figcaption>
                          </div>
                        </div>
                      </div>  
                    </div>

                    <div class="col s4">
                    <h5><b>Contrast Pocket Flap</b></h5>
                      <div class="card-panel teal lighten-4 z-depth-1" style="height:230px">
                        <div class="row valign-wrapper">
                          <div class="center" style="margin:auto;">
                            <img src="imgDesignPatterns/contrastpocketflap.jpg" alt="" class="responsive-img">
                            <figcaption><a style="color:white" class="modal-trigger btn tooltipped teal" data-position="bottom" data-delay="50" data-tooltip="Click to choose a fabric" href="#flapContrast">Select Fabric</a></figcaption>
                          </div>
                        </div>
                      </div>  
                    </div> 
                  </div>                                      
                </div>
              </li>
              @endif
              @endforeach 
              @endforeach 

              <!-- Pocket COntrast -->
              <div id="pocketContrast" class="modal modal-fixed-footer" style="width:1100px; height:600px">
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

                              <input name="rdb_patternContrast" value = "{{$pattern->strSegPatternID}}" type="radio" class="filled-in" id="{{$pattern->strSegPatternID}}{{ $i+1 }}{{ $j+1 }}{{ $k+1 }}" />
                              <label for="{{$pattern->strSegPatternID}}{{ $i+1 }}{{ $j+1 }}{{ $k+1 }}">{{$pattern->strSegPName}}</label>
                      
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
              <!--End of modal for Pocket Contrast -->

              <!-- Pocket Flap COntrast -->
              <div id="flapContrast" class="modal modal-fixed-footer" style="width:1100px; height:600px">
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
              <!--End of modal for Pocket Flap Contrast -->

              <li>
                <div class="collapsible-header" style="background-color:#00838f; color:white; height:30px; padding-top:10px; padding-bottom:50px; font-size:18px">Monogram</div>
                <div class="collapsible-body row overflow-x" style="padding:20px;">
                  <div class="col s12">
                    <p>
                      <input class="filled-in" name="rdb_monogram" type="radio" id="small" />
                      <label for="small"><font size="+1"><b>No Monogram</b></font></label>
                    </p>
                  </div>                
                  @foreach($monograms as $j => $monogram) 
                    <div class="col s12">
                      @foreach($patterns as $k => $pattern)
                      <div class="col s2" @if($pattern->strSegPStyleCategoryFK != $monogram->strSegStyleCatID) hidden @endif>
                        <img class="materialboxed responsive-img" src="{{URL::asset($pattern->strSegPImage)}}">
                        <p>
                          <input name="rdb_monogram" value = "{{$pattern->strSegPatternID}}" type="radio" class="filled-in" id="{{$pattern->strSegPatternID}}{{ $i+1 }}{{ $j+1 }}{{ $k+1 }}" />
                          <label for="{{$pattern->strSegPatternID}}{{ $i+1 }}{{ $j+1 }}{{ $k+1 }}">{{$pattern->strSegPName}}</label>
                       </p>
                      </div>
                      @endforeach
                    </div>
                  @endforeach                  
                </div>
              </li>
              
              <li>
                <div class="collapsible-header" style="background-color:#00838f; color:white; height:30px; padding-top:10px; padding-bottom:50px; font-size:18px">Monogram Position</div>
                <div class="collapsible-body row overflow-x" style="padding:20px;">
                  <div class="col s12" style="margin-top:20px;">
                    <div class="col s3">
                      <img class="materialboxed responsive-img" src="img/fabric.jpg">
                      <p>
                        <input class="with-gap" name="classic" type="radio" id="small" />
                        <label for="small"><font size="+1"><b>Cuffed Short Sleeves</b></font></label>
                      </p>
                    </div>

                    <div class="col s3">
                      <div class="input-field" style="margin-top:100px;">
                        <input placeholder="Monogram Position" id="position" type="text" class="validate">
                      </div>
                      <p>
                        <input class="with-gap" name="classic" type="radio" id="small" />
                        <label for="small"><font size="+1"><b>Other Position</b></font></label>
                      </p>              
                    </div>

                  </div>

                  <div class="col s12" style="margin-top:20px;">

                    <div class="input-field col s4">
                      <input id="monogram" type="text" class="validate"/>
                      <label for="monogram"><b>Enter your monogram:</b></label>
                    </div>

                    <div class="col s8">
                      <p>(15 characters at most. Our standard monogram size is 10mm. If you want to change the size, please leave messages as monogram comment - note that our tailor will have to decide on the monogram size that will match the fabric choosen.)</p>
                    </div>

                  </div>

                  <div class="col s12">

                    <div class="input-field col s4">
                      <select>
                        <option value="" disabled selected></option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                      </select>
                      <label><b>Monogram Color</b></label>
                    </div>

                  </div>

                  <div class="col s12">

                    <div class="file-field input-field col s4">
                      <div class="btn">
                        <span>Upload photo</span>
                        <input type="file">
                      </div>
                      <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                      </div>
                    </div>

                    <div class="col s8">
                      <p>If you want to put logos instead of monograms, please email the logo to us or upload your logo here.</p>
                    </div>

                  </div>

                  <div class="col s12">

                    <div class="input-field col s4">
                      <input id="comment" type="text" class="validate"/>
                      <label for="comment"><b>Monogram comment:</b></label>
                    </div>

                    <div class="col s8">
                      <p>Please add any comments you would like to make regarding your monogram.</p>
                    </div>

                  </div>

                </div>
              </li>              
            </ul>
          </div>                        

          <div class="col s12 divider" style="height:4px; margin-bottom:10px;"></div>
          <div class="col s12">
            <div><a class="right btn-flat teal accent-4 white-text" href="{{URL::to('/online-order-now')}}">GO TO SHOPPING CART</a></div>
          </div>

        </div>
        <!--END OF POCKETS & MONOGRAM-->


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

@stop