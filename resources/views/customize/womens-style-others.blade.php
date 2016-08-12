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
          <center><span style="font-size:42px; color: #757575; font-family:'Playfair Display','Times';">WOMEN'S SHIRT</span></center>
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
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab black-text">Collar</li>
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab black-text">Cuffs</li>
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab black-text">Buttons</li>
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab black-text">Pocket & Monogram</li>
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab active"><a style="color:black" href="#tabOthers">Others</a></li>
          <div class="indicator light-blue" style="z-index:1"></div>
        </ul>

        <!--OTHERS TAB-->
        <div id="tabOthers" class="col s12 white" style="padding:20px; border 2px teal accent-4 white-text;">
          
          <div class="col s12">
            <div><a class="right btn-flat teal accent-4 white-text" href="{{URL::to('/online-order-now')}}">Go to Shopping Cart</a></div>
            <div><a class="left btn-flat teal accent-4 white-text" href="{{URL::to('/customize-womens-style-pocket-monogram')}}">Previous step</a></div>
          </div>
          <div class="col s12 divider" style="height:4px; margin-top:10px;"></div>

          <div class="col s12">
            <ul class="collapsible" data-collapsible="accordion" style="border:none;">
              <li>
                <div class="collapsible-header" style="background-color:#00838f; color:white; height:30px; padding-top:10px; padding-bottom:50px; font-size:18px">Front</div>
                <div class="collapsible-body row overflow-x" style="padding:20px;">
                  @foreach($plackets as $placket)
                  <div class="col s12">
                    @foreach($patterns as $pattern)
                    <div class="col s2" @if($pattern->strSegPStyleCategoryFK != $placket->strSegStyleCatID) hidden @endif>
                      <img class="materialboxed responsive-img" src="{{URL::asset($pattern->strSegPImage)}}">
                      <p>
                        <input name="rdb_pattern{{ $placket->strSegStyleCatID }}" type="radio" class="filled-in" value = "{{ $pattern->strSegPatternID }}" id="{{ $pattern->strSegPatternID }}" />
                        <label for="{{$pattern->strSegPatternID}}"><font size="+1"><b>{{$pattern->strSegPName}}</b></font></label>
                      </p>
                    </div>
                    @endforeach
                  </div>
                  @endforeach 

                  <div class="col s12" style="margin:20px;">
                    <div class="col s4">
                      <div class="card-panel teal lighten-4 z-depth-1" style="height:260px">
                        <div class="row valign-wrapper">
                          <div class="center" style="margin:auto;">
                            <img src="imgDesignPatterns/insideplacketbuttonside.jpg" alt="" class="responsive-img">
                            <figcaption style="margin-top:10px">Inside Placket Lining</figcaption>
                            <figcaption>Button Side</figcaption>
                            <figcaption><a style="color:white; margin-top:10px" class="modal-trigger btn tooltipped teal" data-position="bottom" data-delay="50" data-tooltip="Click to choose a fabric" href="#placketButtonSide">Select Fabric</a></figcaption>
                          </div>
                        </div>
                      </div>
                    </div>  

                    <div class="col s4">
                      <div class="card-panel teal lighten-4 z-depth-1" style="height:260px">
                        <div class="row valign-wrapper">
                          <div class="center" style="margin:auto;">
                            <img src="imgDesignPatterns/insideplacketbuttonholeside.jpg" alt="" class="responsive-img">
                            <figcaption style="margin-top:10px">Inside Placket Lining</figcaption>
                            <figcaption>Buttonhole Side</figcaption>
                            <figcaption><a style="color:white; margin-top:10px" class="modal-trigger btn tooltipped teal" data-position="bottom" data-delay="50" data-tooltip="Click to choose a fabric" href="#placketButtonholeSide">Select Fabric</a></figcaption>
                          </div>
                        </div>
                      </div>
                    </div> 

                  </div>                  
                </div>

                <!-- Button Side -->
          <div id="placketButtonSide" class="modal modal-fixed-footer" style="width:1100px; height:600px">
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

                        
                          @foreach($fabrics as $fabric)
                          <div class="col s6 fabric-general {{ $fabric->strFabricTypeFK }} {{ $fabric->strFabricPatternFK }} {{ $fabric->strFabricColorFK }} {{ $fabric->strFabricThreadCountFK }}">
                            <div class="center col s2" style="margin-top:60px">
                              <input name="rdb_fabricButton" type="radio" class="filled-in" value="{{ $fabric->strFabricID }}" id="{{ $fabric->strFabricID }}" />                                    
                              <label for="{{ $fabric->strFabricID }}"></label>
                            </div>
                            <div class="col s10">
                              <div class="card-panel teal lighten-4 z-depth-1">
                                <div class="row valign-wrapper">
                                  <div class="center col s4">
                                    <img src="{{URL::asset($fabric->strFabricImage)}}"class="responsive-img"> <!-- notice the "circle" class -->
                                  </div>
                                  <div class="col s8"> 
                                    <p><b id="{{ 'fabricText'.$fabric->strFabricID }}">{{ $fabric->strFabricName }}</b></p> <!-- This will be the name of the pattern -->
                                    <span class="black-text">
                                      {{ $fabric->txtFabricDesc }}
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
              <!--End of modal for Button Side Fabric -->

              <!-- Buttonhole Side  -->
              <div id="placketButtonholeSide" class="modal modal-fixed-footer" style="width:1100px; height:600px">
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

                        
                          @foreach($fabrics as $fabric)
                          <div class="col s6 fabric-general {{ $fabric->strFabricTypeFK }} {{ $fabric->strFabricPatternFK }} {{ $fabric->strFabricColorFK }} {{ $fabric->strFabricThreadCountFK }}">
                            <div class="center col s2" style="margin-top:60px">
                              <input name="rdb_fabricButtonhole" type="radio" class="filled-in" value="{{ $fabric->strFabricID }}" id="{{ $fabric->strFabricID }}" />                                    
                              <label for="{{ $fabric->strFabricID }}"></label>
                            </div>
                            <div class="col s10">
                              <div class="card-panel teal lighten-4 z-depth-1">
                                <div class="row valign-wrapper">
                                  <div class="center col s4">
                                    <img src="{{URL::asset($fabric->strFabricImage)}}"class="responsive-img"> <!-- notice the "circle" class -->
                                  </div>
                                  <div class="col s8"> 
                                    <p><b id="{{ 'fabricText'.$fabric->strFabricID }}">{{ $fabric->strFabricName }}</b></p> <!-- This will be the name of the pattern -->
                                    <span class="black-text">
                                      {{ $fabric->txtFabricDesc }}
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
              <!--End of modal for Buttonhole Side -->

              </li>
              <li>
                <div class="collapsible-header" style="background-color:#00838f; color:white; height:30px; padding-top:10px; padding-bottom:50px; font-size:18px">Tuxedo</div>
                <div class="collapsible-body row overflow-x" style="padding:20px;">
                  <div class="col s6">
                    <div class="center col s2 " style="margin-top:100px">
                      <input name="" type="radio" class="filled-in" value = "" id="" />
                      <label for=""></label>
                    </div>
                    <div class="col s10">
                      <div class="card-panel teal lighten-4 z-depth-1" style="height:200px">
                        <div class="row valign-wrapper">
                          <div class="center col s6">
                            <img src="" alt="" class="responsive-img">
                          </div>
                          <div class="col s6"> 
                            <span><b></b></span>
                            <br/>
                            <span class="black-text">
                              
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>

              <li>
                <div class="collapsible-header" style="background-color:#00838f; color:white; height:30px; padding-top:10px; padding-bottom:50px; font-size:18px">Epaulettes</div>
                <div class="collapsible-body row overflow-x" style="padding:20px;">
                  <div class="col s4">
                    <div class="card-panel teal lighten-4 z-depth-1" style="height:230px">
                      <div class="row valign-wrapper">
                        <div class="center" style="margin:auto;">
                          <img src="imgDesignPatterns/epaulettes.jpg" alt="" class="responsive-img">
                          <figcaption style="margin:10px;"><a style="color:white; margin-top:10px" class="modal-trigger btn tooltipped teal" data-position="bottom" data-delay="50" data-tooltip="Click to choose a fabric" href="#fabricEpaulettes">Select Fabric</a></figcaption>
                        </div>
                      </div>
                    </div>  
                  </div>
                </div>
              </li>

              <!-- Epaulettes Fabric  -->
              <div id="fabricEpaulettes" class="modal modal-fixed-footer" style="width:1100px; height:600px">
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

                        
                          @foreach($fabrics as $fabric)
                          <div class="col s6 fabric-general {{ $fabric->strFabricTypeFK }} {{ $fabric->strFabricPatternFK }} {{ $fabric->strFabricColorFK }} {{ $fabric->strFabricThreadCountFK }}">
                            <div class="center col s2" style="margin-top:60px">
                              <input name="rdb_fabricButtonhole" type="radio" class="filled-in" value="{{ $fabric->strFabricID }}" id="{{ $fabric->strFabricID }}" />                                    
                              <label for="{{ $fabric->strFabricID }}"></label>
                            </div>
                            <div class="col s10">
                              <div class="card-panel teal lighten-4 z-depth-1">
                                <div class="row valign-wrapper">
                                  <div class="center col s4">
                                    <img src="{{URL::asset($fabric->strFabricImage)}}"class="responsive-img"> <!-- notice the "circle" class -->
                                  </div>
                                  <div class="col s8"> 
                                    <p><b id="{{ 'fabricText'.$fabric->strFabricID }}">{{ $fabric->strFabricName }}</b></p> <!-- This will be the name of the pattern -->
                                    <span class="black-text">
                                      {{ $fabric->txtFabricDesc }}
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
              <!--End of modal for Epaulettes Fabric -->

              <li>
                <div class="collapsible-header" style="background-color:#00838f; color:white; height:30px; padding-top:10px; padding-bottom:50px; font-size:18px">Back Split</div>
                <div class="collapsible-body row overflow-x" style="padding:20px;">
                  <div class="col s6">
                    <div class="center col s2 " style="margin-top:100px">
                      <input name="" type="radio" class="filled-in" value = "" id="" />
                      <label for=""></label>
                    </div>
                    <div class="col s10">
                      <div class="card-panel teal lighten-4 z-depth-1" style="height:200px">
                        <div class="row valign-wrapper">
                          <div class="center col s6">
                            <img src="" alt="" class="responsive-img">
                          </div>
                          <div class="col s6"> 
                            <span><b></b></span>
                            <br/>
                            <span class="black-text">
                              
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li>
                <div class="collapsible-header" style="background-color:#00838f; color:white; height:30px; padding-top:10px; padding-bottom:50px; font-size:18px">Back</div>
                <div class="collapsible-body row overflow-x" style="padding:20px;">
                  <div class="col s6">
                    <div class="center col s2 " style="margin-top:100px">
                      <input name="" type="radio" class="filled-in" value = "" id="" />
                      <label for=""></label>
                    </div>
                    <div class="col s10">
                      <div class="card-panel teal lighten-4 z-depth-1" style="height:200px">
                        <div class="row valign-wrapper">
                          <div class="center col s6">
                            <img src="" alt="" class="responsive-img">
                          </div>
                          <div class="col s6"> 
                            <span><b></b></span>
                            <br/>
                            <span class="black-text">
                              
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>              
              <li>
                <div class="collapsible-header" style="background-color:#00838f; color:white; height:30px; padding-top:10px; padding-bottom:50px; font-size:18px">Bottom</div>
                <div class="collapsible-body row overflow-x" style="padding:20px;">
                  <div class="col s6">
                    <div class="center col s2 " style="margin-top:100px">
                      <input name="" type="radio" class="filled-in" value = "" id="" />
                      <label for=""></label>
                    </div>
                    <div class="col s10">
                      <div class="card-panel teal lighten-4 z-depth-1" style="height:200px">
                        <div class="row valign-wrapper">
                          <div class="center col s6">
                            <img src="" alt="" class="responsive-img">
                          </div>
                          <div class="col s6"> 
                            <span><b></b></span>
                            <br/>
                            <span class="black-text">
                              
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>              
            </ul>
          </div>

          <div class="col s12" style="margin-top:20px; margin-left:10px;">

            <h5><b>Provide image for our reference (optional)</b></h5>

            <div class="col s12">
              <div class="file-field input-field col s4">
                <div class="btn">
                  <span>Choose File</span>
                  <input type="file">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text">
                </div>
              </div>
            </div>

            <div class="col s6">
              <h6><b>Would you like to add lable in the back of collar?</b></h6>
              <p>
                <input class="with-gap" name="classic" type="radio" id="small" />
                <label for="small"><font size="+1"><b>Yes</b></font></label>
              </p>
              <p>
                <input class="with-gap" name="classic" type="radio" id="small" />
                <label for="small"><font size="+1"><b>No</b></font></label>
              </p>                            
            </div>

            <div class="col s12">
              <p><b>Additional requirement for it (optional)</b></p>
              <div class="input-field col s4">
                <input id="comment" type="text" class="validate">
              </div>
            </div>

          </div>

          <div class="col s12 divider" style="height:4px; margin-bottom:10px;"></div>
          <div class="col s12">
            <div><a class="right btn-flat teal accent-4 white-text" href="{{URL::to('/online-order-now')}}">Go to Shopping Cart</a></div>
            <div><a class="left btn-flat teal accent-4 white-text" href="{{URL::to('/customize-womens-style-pocket-monogram')}}">Previous step</a></div>
          </div>

        </div>
        <!--END OF OTHERS-->

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
        