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
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab active"><a style="color:black" href="#tabPockets">Pockets</a></li>
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab black-text">Bottom</li>
          <div class="indicator light-blue" style="z-index:1"></div>
        </ul>

        <!--POCKETS TAB-->
        <div id="tabPockets" class="col s12 white" style="padding:20px; border: 2px teal accent-4;">
          
          {!! Form::open(['url' => 'customize-pants-style-pockets', 'method' => 'post']) !!}
          <div class="col s12">
            <div><button class="right btn-flat teal accent-4 white-text" type="submit">Next step</button></div>
            <div><a class="left btn-flat teal accent-4 white-text" href="{{URL::to('/customize-pants-style-pleats')}}">Previous step</a></div>
          </div>
          <div class="col s12 divider" style="height:4px; margin-top:10px;"></div> 

          <div class="col s12" style="margin-top:20px;">
            <ul class="collapsible" data-collapsible="accordion" style="border:none;">
              <li>
                <div class="collapsible-header" style="background-color:#00838f; color:white; height:30px; padding-top:10px; padding-bottom:50px; font-size:18px">Pant's Pockets</div>
                <div class="collapsible-body row overflow-x" style="padding:20px;">       
                  @foreach($pocketSegment as $pocket)
                  <div class="col s12">
                    @foreach($patterns as $pattern)
                    <div class="col s2" @if($pattern->strSegPStyleCategoryFK != $pocket->strSegStyleCatID) hidden @endif>
                      <img class="materialboxed responsive-img" src="{{URL::asset($pattern->strSegPImage)}}">
                      <p>
                        <input name="rdb_pattern{{ $pocket->strSegStyleCatID }}" type="radio" class="filled-in" value = "{{ $pattern->strSegPatternID }}" id="{{ $pattern->strSegPatternID }}" />
                        <label for="{{ $pattern->strSegPatternID }}"><font size="+1"><b>{{$pattern->strSegPName}}</b></font></label>
                      </p>
                    </div>
                    @endforeach
                  </div>
                  @endforeach                  
                </div>
              </li>
              <li>
                <div class="collapsible-header" style="background-color:#00838f; color:white; height:30px; padding-top:10px; padding-bottom:50px; font-size:18px">Backpockets</div>
                <div class="collapsible-body row overflow-x" style="padding:20px;">       
                  @foreach($backSegment as $back)
                  <div class="col s12">
                    @foreach($patterns as $pattern)
                    <div class="col s2" @if($pattern->strSegPStyleCategoryFK != $back->strSegStyleCatID) hidden @endif>
                      <img class="materialboxed responsive-img" src="{{URL::asset($pattern->strSegPImage)}}">
                      <p>
                        <input name="rdb_pattern{{ $back->strSegStyleCatID }}" type="radio" class="filled-in" value = "{{ $pattern->strSegPatternID }}" id="{{ $pattern->strSegPatternID }}" />
                        <label for="{{ $pattern->strSegPatternID }}"><font size="+1"><b>{{$pattern->strSegPName}}</b></font></label>
                      </p>
                    </div>
                    @endforeach
                  </div> 
                  @endforeach                 
                </div>
              </li>              
            </ul>
          </div>          

          <div class="col s12 divider" style="height:4px; margin-bottom:10px;"></div>
          <div class="col s12">
            <div><button class="right btn-flat teal accent-4 white-text" type="submit">Next step</button></div>
            <div><a class="left btn-flat teal accent-4 white-text" href="{{URL::to('/customize-pants-style-pleats')}}">Previous step</a></div>
          </div>

        </div>
        {!! Form::close() !!}
        <!--END OF POCKETS TAB-->


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
        