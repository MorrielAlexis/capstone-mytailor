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
          <center><span style="font-size:42px; color: #757575; font-family:'Lemonada',cursive;">SUIT CUSTOMIZATION</span></center>
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
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab active"><a style="color:black" href="#tabJacket">Jacket Style</a></li>
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab black-text">Pants Style</li>
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab black-text">Monogram</li>
          <div class="indicator teal accent-4" style="z-index:1"></div>
        </ul>

        <!--JACKET TAB-->
        <div id="tabJacket" class="col s12 white" style="padding:20px; border: 2px teal accent-4;">

      {!! Form::open(['url' => 'customize-suit-style-pants', 'method' => 'post']) !!}
          <div class="col s12"><button class="btn-flat right teal accent-4 white-text" type="submit">Next step</button></div>
          <div class="col s12 divider" style="height:4px; margin-top:10px;"></div>
          
          <div class="col s12" style="margin-top:10px;">
            <label class="col s2"><font size="+1"><b>Selected Fabric</b></font></label>
            <label class="col s5"><a class="btn teal accent-4 white-text" href="{{URL::to('/customize-suit-fabric')}}"><font size="+1">Edit / Change Fabric</font></a></label>
          </div>

          @foreach($fabrics as $fabric)
          <div class="col s12">
            <div class="col s2">
              <img class="responsive-img" src="{{URL::asset($fabric->strFabricImage)}}" style="">
            </div>
            <div class="col s5" style="background-color:#eeeeee;">
              <p>{{$fabric->strFabricName}}</p>
              <p>{{$fabric->strFabricCode}}</p>
              <!--<p>Fabric Type</p>-->
              <p>{{ number_format($fabric->dblFabricPrice, 2) }} PHP</p>
            </div>
          </div>
          @endforeach

          @foreach($segments as $segment)
          <div class="col s12">
            <ul class="collapsible" data-collapsible="accordion" style="border:none;">
              @foreach($singleSegment as $single)
              @if($single->boolIsActive == 1)
              <li @if($segment->strSegmentID != $single->strSegmentFK) hidden @endif>
                <div class="collapsible-header" style="background-color:#00838f; color:white; height:30px; padding-top:10px; padding-bottom:50px; font-size:18px">{{ $single->strSegStyleName }}</div>
                <div class="collapsible-body row overflow-x" style="padding:20px;">
                  <div class="col s12">
                    @foreach($patterns as $pattern)
                    <div class="col s2" @if($pattern->strSegPStyleCategoryFK != $single->strSegStyleCatID) hidden @endif>
                      <img class="materialboxed responsive-img" src="{{URL::asset($pattern->strSegPImage)}}">
                      <p>
                        <input name="rdb_pattern{{ $single->strSegStyleCatID }}" type="radio" class="filled-in" value = "{{ $pattern->strSegPatternID }}" id="{{ $pattern->strSegPatternID }}" />
                        <label for="{{ $pattern->strSegPatternID }}"><font size="+1"><b>{{$pattern->strSegPName}}</b></font></label>
                      </p>
                    </div>
                    @endforeach
                  </div> 
                </div>
              </li>
              @endif
              @endforeach

              @foreach($doubleSegment as $double)
              @if($double->boolIsActive == 1)
              <li @if($segment->strSegmentID != $double->strSegmentFK) hidden @endif>
                <div class="collapsible-header" style="background-color:#00838f; color:white; height:30px; padding-top:10px; padding-bottom:50px; font-size:18px">{{ $double->strSegStyleName }}</div>
                <div class="collapsible-body row overflow-x" style="padding:20px;">
                  <div class="col s12">
                    @foreach($patterns as $pattern)
                    <div class="col s2" @if($pattern->strSegPStyleCategoryFK != $double->strSegStyleCatID) hidden @endif>
                      <img class="materialboxed responsive-img" src="{{URL::asset($pattern->strSegPImage)}}">
                      <p>
                        <input name="rdb_pattern{{ $double->strSegStyleCatID }}" type="radio" class="filled-in" value = "{{ $pattern->strSegPatternID }}" id="{{ $pattern->strSegPatternID }}" />
                        <label for="{{ $pattern->strSegPatternID }}"><font size="+1"><b>{{$pattern->strSegPName}}</b></font></label>
                      </p>
                    </div>
                    @endforeach
                  </div>
                </div>
              </li>
              @endif
              @endforeach 


              @foreach($jacketSegment as $jacket)
              @if($jacket->boolIsActive == 1)
              <li @if($segment->strSegmentID != $jacket->strSegmentFK) hidden @endif>
                <div class="collapsible-header" style="background-color:#00838f; color:white; height:30px; padding-top:10px; padding-bottom:50px; font-size:18px">{{ $jacket->strSegStyleName }}</div>
                <div class="collapsible-body row overflow-x" style="padding:20px;">
                  <div class="col s12">
                    @foreach($patterns as $pattern)
                    <div class="col s2" @if($pattern->strSegPStyleCategoryFK != $jacket->strSegStyleCatID) hidden @endif>
                      <img class="materialboxed responsive-img" src="{{URL::asset($pattern->strSegPImage)}}">
                      <p>
                        <input name="rdb_pattern{{ $jacket->strSegStyleCatID }}" type="radio" class="filled-in" value = "{{ $pattern->strSegPatternID }}" id="{{ $pattern->strSegPatternID }}" />
                        <label for="{{ $pattern->strSegPatternID }}"><font size="+1"><b>{{$pattern->strSegPName}}</b></font></label>
                      </p>
                    </div>
                    @endforeach
                  </div>
                </div>
              </li> 
              @endif
              @endforeach 

              @foreach($ventsSegment as $vents)
              @if($vents->boolIsActive == 1)
              <li @if($segment->strSegmentID != $vents->strSegmentFK) hidden @endif>
                <div class="collapsible-header" style="background-color:#00838f; color:white; height:30px; padding-top:10px; padding-bottom:50px; font-size:18px">{{ $vents->strSegStyleName }}</div>
                <div class="collapsible-body row overflow-x" style="padding:20px;">
                  <div class="col s12">
                    @foreach($patterns as $pattern)
                    <div class="col s2" @if($pattern->strSegPStyleCategoryFK != $vents->strSegStyleCatID) hidden @endif>
                      <img class="materialboxed responsive-img" src="{{URL::asset($pattern->strSegPImage)}}">
                      <p>
                        <input name="rdb_pattern{{ $vents->strSegStyleCatID }}" type="radio" class="filled-in" value = "{{ $pattern->strSegPatternID }}" id="{{ $pattern->strSegPatternID }}" />
                        <label for="{{ $pattern->strSegPatternID }}"><font size="+1"><b>{{$pattern->strSegPName}}</b></font></label>
                      </p>
                    </div>
                    @endforeach
                  </div>
                </div>
              </li> 
              @endif
              @endforeach 

              @foreach($collarSegment as $collar)
              @if($collar->boolIsActive == 1)
              <li @if($segment->strSegmentID != $collar->strSegmentFK) hidden @endif>
                <div class="collapsible-header" style="background-color:#00838f; color:white; height:30px; padding-top:10px; padding-bottom:50px; font-size:18px">{{ $collar->strSegStyleName }}</div>
                <div class="collapsible-body row overflow-x" style="padding:20px;">
                  <div class="col s12">
                    @foreach($patterns as $pattern)
                    <div class="col s2" @if($pattern->strSegPStyleCategoryFK != $collar->strSegStyleCatID) hidden @endif>
                      <img class="materialboxed responsive-img" src="{{URL::asset($pattern->strSegPImage)}}">
                      <p>
                        <input name="rdb_pattern{{ $collar->strSegStyleCatID }}" type="radio" class="filled-in" value = "{{ $pattern->strSegPatternID }}" id="{{ $pattern->strSegPatternID }}" />
                        <label for="{{ $pattern->strSegPatternID }}"><font size="+1"><b>{{$pattern->strSegPName}}</b></font></label>
                      </p>
                    </div>
                    @endforeach
                  </div>
                </div>
              </li>
              @endif
              @endforeach

              @foreach($chestSegment as $chest)
              @if($chest->boolIsActive == 1)
              <li @if($segment->strSegmentID != $chest->strSegmentFK) hidden @endif>
                <div class="collapsible-header" style="background-color:#00838f; color:white; height:30px; padding-top:10px; padding-bottom:50px; font-size:18px">{{ $chest->strSegStyleName }}</div>
                <div class="collapsible-body row overflow-x" style="padding:20px;">
                  <div class="col s12">
                    @foreach($patterns as $pattern)
                    <div class="col s2" @if($pattern->strSegPStyleCategoryFK != $chest->strSegStyleCatID) hidden @endif>
                      <img class="materialboxed responsive-img" src="{{URL::asset($pattern->strSegPImage)}}">
                      <p>
                        <input name="rdb_pattern{{ $chest->strSegStyleCatID }}" type="radio" class="filled-in" value = "{{ $pattern->strSegPatternID }}" id="{{ $pattern->strSegPatternID }}" />
                        <label for="{{ $pattern->strSegPatternID }}"><font size="+1"><b>{{$pattern->strSegPName}}</b></font></label>
                      </p>
                    </div>
                    @endforeach
                  </div>
                </div>
              </li>
              @endif
              @endforeach

              @foreach($jackpotSegment as $jackpot)
              @if($jackpot->boolIsActive == 1)
              <li @if($segment->strSegmentID != $jackpot->strSegmentFK) hidden @endif>
                <div class="collapsible-header" style="background-color:#00838f; color:white; height:30px; padding-top:10px; padding-bottom:50px; font-size:18px">{{ $jackpot->strSegStyleName }}</div>
                <div class="collapsible-body row overflow-x" style="padding:20px;">
                  <div class="col s12">
                    @foreach($patterns as $pattern)
                    <div class="col s2" @if($pattern->strSegPStyleCategoryFK != $jackpot->strSegStyleCatID) hidden @endif>
                      <img class="materialboxed responsive-img" src="{{URL::asset($pattern->strSegPImage)}}">
                      <p>
                        <input name="rdb_pattern{{ $jackpot->strSegStyleCatID }}" type="radio" class="filled-in" value = "{{ $pattern->strSegPatternID }}" id="{{ $pattern->strSegPatternID }}" />
                        <label for="{{ $pattern->strSegPatternID }}"><font size="+1"><b>{{$pattern->strSegPName}}</b></font></label>
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

          <div class="col s12" style="margin-top:20px;">
            
            <div class="col s3">
              <h5><b>Functional Buttonhole on Sleeves</b></h5>
              <img class="materialboxed responsive-img" src="imgDesignPatterns/buttonholesonsleeve.jpg">
              <div class="col s6">
                <p>
                  <input class="with-gap" name="yesButtonhole" type="radio" id="yesButtonhole" />
                  <label for="yesButtonhole"><font size="+1"><b>yes</b></font></label>
                </p>
              </div>
              <div class="col s6">
                <p>
                  <input class="with-gap" name="noButtonhole" type="radio" id="noButtonhole" />
                  <label for="noButtonhole"><font size="+1"><b>No</b></font></label>
                </p>
              </div>
            </div>

            <div class="col s3">
              <h5><b>Functional Buttonniere</b></h5><br>
              <img class="materialboxed responsive-img" src="imgDesignPatterns/buttonniere.jpg">
              <div class="col s6">
                <p>
                  <input class="with-gap" name="yesButtonniere" type="radio" id="yesButtonniere" />
                  <label for="yesButtonniere"><font size="+1"><b>yes</b></font></label>
                </p>
              </div>
              <div class="col s6">
                <p>
                  <input class="with-gap" name="noButtonniere" type="radio" id="noButtonniere" />
                  <label for="noButtonniere"><font size="+1"><b>No</b></font></label>
                </p>
              </div>
            </div>

            <div class="col s3">
              <h5><b>Thread Color</b></h5>
              <p>Would you like coloured button threads?</p>
              <div class="input-field" style="margin-top:20px;">
                <select>
                  <option value="" disabled selected>Choose your option</option>
                  @foreach($threads as $thread)
                  <option value="{{$thread->intThreadID}}">{{$thread->strThreadBrand}} {{$thread->strThreadColor}}</option>
                  @endforeach
                </select>
              </div>
              <h5><b>Buttonhole Color</b></h5>
              <p>Would you like buttonhole color? (cuffs only)</p>
              <div class="input-field" style="margin-top:20px;">
                <select>
                  <option value="" disabled selected>Choose your option</option>
                  @foreach($threads as $thread)
                  <option value="{{$thread->intThreadID}}">{{$thread->strThreadBrand}} {{$thread->strThreadColor}}</option>
                  @endforeach
                </select>
              </div>                              
            </div>         

          </div>

          <!--<div class="col s12">
            <div class="col s3">
              <h5><b>Need Pants</b></h5>
              <div class="col s6">
                <p>
                  <input class="with-gap" name="yesPants" type="radio" id="yesPants" />
                  <label for="yesPants"><font size="+1"><b>yes</b></font></label>
                </p>
              </div>
              <div class="col s6">
                <p>
                  <input class="with-gap" name="noPants" type="radio" id="noPants" />
                  <label for="noPants"><font size="+1"><b>No</b></font></label>
                </p>
              </div>
            </div>
          </div> -->         

          <div class="col s12" style="margin-top:20px;">

          <div class="col s12 divider" style="height:4px; margin-bottom:10px;"></div>
          <div class="col s12"><button class="btn-flat right teal accent-4 white-text" type="submit">Next step</button></div>

        </div>

      {!! Form::close() !!}
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

    $(document).ready(function(){
      $('.collapsible').collapsible({
        accordion : false
      });
    });

  </script>

@stop