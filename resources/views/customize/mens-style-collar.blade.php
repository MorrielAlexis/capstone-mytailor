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
          <center><span style="font-size:42px; color: #757575; font-family:'Playfair Display','Times';">MEN'S SHIRT</span></center>
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
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab active"><a style="color:black" href="#tabCollar">Collar</a></li>
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab black-text">Cuffs</li>
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab black-text">Buttons</li>
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab black-text">Pocket & Monogram</li>
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab black-text">Others</li>
          <div class="indicator teal accent-4" style="z-index:1"></div>
        </ul>

        <!--COLLAR TAB-->
        <div id="tabCollar" class="col s12 white" style="padding:20px; border 2px teal accent-4 white-text;">
          
          <div class="col s12"><a class="btn-flat right teal accent-4 white-text" href="{{URL::to('/customize-mens-style-cuffs')}}">Next step</a></div>
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

          <div class="col s12" style="padding:20px;"><h4>1. Collar</h4></div>
          @foreach($collars as $collar)
          <div class="col s12" style="margin-top:20px;">
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
          @endforeach

          <div class="col s12" style="margin-top:20px;">
           
            <div class="col s2">
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <p>
                <input name="" type="radio" class="filled-in" value = "" id="" />
                <label for=""><font size="+1"><b>Collar Name</b></font></label>
              </p>
            </div>
            
            <div class="col s2">
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <p>
                <input name="" type="radio" class="filled-in" value = "" id="" />
                <label for=""><font size="+1"><b>Collar Name</b></font></label>
              </p>
            </div>

            <div class="col s2">
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <p>
                <input name="" type="radio" class="filled-in" value = "" id="" />
                <label for=""><font size="+1"><b>Collar Name</b></font></label>
              </p>
            </div>

          </div>

          <div class="divider dashed" style="height:2px;"></div>

          <div class="col s12" style="margin-top:20px;">
            <!--<div class="col s3" style="padding:20px;"><h5><b>Collar Lining</b></h5></div>
            <div class="col s3" style="padding:20px;"><h5><b>Removable Collar Stay</b></h5></div>-->
            <div class="col s3" style="padding:20px;"><h5><b>Contrast Color</b></h5></div>
          </div>

          <!--<div class="col s12">

            <div class="col s3" style="padding:20px;">
              <div class="input-field" style="margin-top:70px;">
                <select class="browser-default">
                  <option value="" disabled selected>Choose your option</option>
                  <option value="1">Option 1</option>
                  <option value="2">Option 2</option>
                  <option value="3">Option 3</option>
                </select>
              </div>
            </div>

            <div class="col s3" style="padding:20px;">
              <div class="input-field" style="margin-top:70px;">
                <select class="browser-default">
                  <option value="" disabled selected>Choose your option</option>
                  <option value="1">Option 1</option>
                  <option value="2">Option 2</option>
                  <option value="3">Option 3</option>
                </select>
              </div>             
            </div>-->
            @foreach($fabrics as $fabric)
            <div class="col s3" style="padding:20px;">
              <img class="materialboxed responsive-img" src="{{URL::asset($fabric->strFabricImage)}}">
              <div><a class="btn-flat teal accent-4 white-text" href=""><font size="+1">Select Fabric</font></a></div>
            </div> 
            @endforeach
          </div>          

          <div class="col s12">
            <ul class="collapsible" data-collapsible="accordion" style="border:none;">
              <li>
                <div class="collapsible-header" style="background-color:#00838f; color:white; height:30px; padding-top:10px; padding-bottom:50px; font-size:18px">Collar</div>
                <div class="collapsible-body row overflow-x">
                  <div class="col s4">
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

          <div class="col s12 divider" style="height:4px; margin-bottom:10px;"></div>
          <div class="col s12"><a class="right btn-flat teal accent-4 white-text" href="{{URL::to('/customize-mens-style-cuffs')}}">Next step</a></div>

        </div>
        <!--END OF COLLAR TAB-->


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
