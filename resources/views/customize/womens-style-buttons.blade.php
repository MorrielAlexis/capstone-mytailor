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
          <center><span style="font-size:42px; color: #757575; font-family:'Lemonada',cursive;">WOMEN'S SHIRT</span></center>
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
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab active"><a style="color:black" href="#tabButtons">Buttons</a></li>
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab black-text">Pocket & Monogram</li>
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab black-text">Others</li>
          <div class="indicator light-blue" style="z-index:1"></div>
        </ul>


        <!--BUTTONS TAB-->
        {!! Form::open(['url' => 'customize-womens-style-pocket-monogram', 'method' => 'POST']) !!}
        <div id="tabButtons" class="col s12 white" style="padding:20px; border 2px teal accent-4 white-text;">

          <div class="col s12">
            <div><button class="right btn-flat teal accent-4 white-text" type="submit">Next step</button></div>
            <div><a class="left btn-flat teal accent-4 white-text" href="{{URL::to('/customize-womens-style-cuffs')}}">Previous step</a></div>
          </div>
          <div class="col s12 divider" style="height:4px; margin-top:10px;"></div>

          <div class="col s12" style="margin-top:20px;">
            <ul class="collapsible" data-collapsible="accordion" style="border:none;">
              <li>
                <div class="collapsible-header" style="background-color:#00838f; color:white; height:30px; padding-top:10px; padding-bottom:50px; font-size:18px">Buttons</div>
                <div class="collapsible-body row overflow-x" style="padding:20px;"> 
                  <div class="col s12">      
                  @foreach($buttons as $button)
                    <div class="col s2">
                      <img class="materialboxed responsive-img" src="{{URL::asset($button->strButtonImage)}}">
                      <p>
                        <input name="rdb_button" type="radio" class="filled-in" value = "{{ $button->intButtonID }}" id="{{ $button->intButtonID }}" />
                        <label for="{{$button->intButtonID}}"><font size="+1"><b>{{$button->strButtonBrand}}</b></font></label>
                      </p>
                    </div>
                  @endforeach
                  </div>                
                </div>
              </li>
            </ul>
          </div>

        <div class="divider dashed" style="height:2px;"></div>

          <div class="col s12" style="margin-top:20px;">
            <div class="col s6" style="padding-left:20px;"><h5><b>Coloured Button Threads</b></h5></div>
            <div class="col s6" style="padding-left:20px;"><h5><b>Coloured Buttonholes</b></h5></div>
          </div>

          <div class="col s12">
            <div class="col s3 button-thread" style="padding:40px;">
            <input type="hidden" name="hidden_thread_id" value="">
              <img class="materialboxed responsive-img" src="imgDesignPatterns/buttonthread.png">
            </div>

            <div class="col s3" style="padding:20px;">
              <p>Would you like coloured button threads?</p>
              <div class="input-field col s12">
                <select class = "button-thread" id = "button-thread">
                    <option value="No" class="circle" selected>No</option>
                    @foreach($threads as $thread)
                    <option value="{{$thread->intThreadID}}">{{$thread->strThreadColor}}</option>
                    @endforeach
                </select>
              </div>             
            </div>

            <div class="col s3" style="padding:40px;">
              <img class="materialboxed responsive-img" src="imgDesignPatterns/buttonhole.png">
            </div>             

            <div class="col s3" style="padding:20px;">
              <p>Would you like coloured buttonholes?</p>
              <div class="input-field">
                <select>
                    <option value="No" class="circle" selected>No</option>
                    @foreach($threads as $thread)
                    <option value="{{$thread->intThreadID}}">{{$thread->strThreadColor}}</option>
                    @endforeach
                </select>
              </div>             
            </div>         

          </div>


          <div class="col s12 divider" style="height:4px; margin-bottom:10px;"></div>
          <div class="col s12">
            <div><button class="right btn-flat teal accent-4 white-text" type="submit">Next step</button></div>
            <div><a class="left btn-flat teal accent-4 white-text" href="{{URL::to('/customize-womens-style-cuffs')}}">Previous step</a></div>
          </div>

        </div>
        {!! Form::close() !!}
        <!--END OF BUTTONS TAB-->


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
