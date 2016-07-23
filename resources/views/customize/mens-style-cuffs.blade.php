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
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab black-text">Collar</li>
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab active"><a style="color:black" href="#tabCuffs">Cuffs</a></li>
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab black-text">Buttons</li>
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab black-text">Pocket & Monogram</li>
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab black-text">Others</li>
          <div class="indicator light-blue" style="z-index:1"></div>
        </ul>

        <!--CUFFS TAB-->
          {!! Form::open(['url' => 'customize-pants-style-buttons']) !!}
        <div id="tabCuffs" class="col s12 white" style="padding:20px; border 2px teal accent-4 white-text;">
          
          <div class="col s12">
            <div><button class="right btn-flat teal accent-4 white-text" type="submit">Next step</button></div>
            <div><a class="left btn-flat teal accent-4 white-text" href="{{URL::to('/customize-mens-style-collar')}}">Previous step</a></div>
          </div>
          <div class="col s12 divider" style="height:4px; margin-top:10px;"></div>

          <div class="col s12" style="padding:20px;"><h4>2. Sleeve & Cuffs</h4></div>
          <div class="col s12" style="padding:20px;"><h5>Sleeve</h5></div>

          <div class="col s12" style="margin-top:20px;">
            <div class="col s2">
              <img class="materialboxed responsive-img" src="imgCustomize/cuffed-short-sleeves.jpg">
              <p>
                <input class="with-gap" name="classic" type="radio" id="small" />
                <label for="small"><font size="+1"><b>Cuffed Short Sleeves</b></font></label>
              </p>
            </div>
          </div> 

          <div class="col s12" style="margin-top:20px;">
            <div class="col s2">
              <img class="materialboxed responsive-img" src="imgCustomize/plain-short-sleeves.jpg">
              <p>
                <input class="with-gap" name="classic" type="radio" id="small" />
                <label for="small"><font size="+1"><b>Plain Short Sleeves</b></font></label>
              </p>
            </div>
          </div>


          <div class="col s12" style="padding:20px;"><h5>Cuffs</h5></div>
          <div class="col s12" style="margin-top:20px;">
            <div class="col s2">
              <img class="materialboxed responsive-img" src="imgDesignPatterns/french-square.jpg">
              <p>
                <input class="with-gap" name="classic" type="radio" id="small" />
                <label for="small"><font size="+1"><b>French Square</b></font></label>
              </p>
            </div>
          </div> 

          <div class="col s12" style="margin-top:20px;">
            <div class="col s2">
              <img class="materialboxed responsive-img" src="imgDesignPatterns/HiddenButtonCuffs.jpg">
              <p>
                <input class="with-gap" name="classic" type="radio" id="small" />
                <label for="smal"><font size="+1"><b>Hidden Button Cuffs</b></font></label>
              </p>
            </div>
          </div>

          <!--<div class="divider dashed" style="height:2px;"></div>

          <div class="col s12" style="margin-top:20px;">
            <div class="col s3" style="padding-left:20px;"><h5><b>Contrast Cuffs</b></h5></div>
            <div class="col s6" style="padding-left:20px;"><h5><b>Inside fabric for collar & cuffs</b></h5></div>
            <div class="col s3" style="padding-left:20px;"><h5><b>Select Cufflinks</b></h5></div>
          </div>

          <div class="col s12">

            <div class="col s3" style="padding:20px;">
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <div><a class="btn-flat teal accent-4 white-text" href="{{URL::to('/customize-mens-fabric')}}"><font size="+1">Select Fabric</font></a></div>
            </div>             

            <div class="col s6" style="padding:20px;">
              <div class="col s6"><img class="materialboxed responsive-img" src="img/fabric.jpg"></div>
              <div class="col s6"><img class="materialboxed responsive-img" src="img/fabric.jpg"></div>
              <div class="col s12"><a class="btn-flat teal accent-4 white-text" href="{{URL::to('/customize-mens-fabric')}}"><font size="+1">Select Fabric</font></a></div>
            </div> 

            <div class="col s3" style="padding:20px;">
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <div><a class="btn-flat teal accent-4 white-text" href="{{URL::to('/customize-mens-fabric')}}"><font size="+1">Select Cufflinks</font></a></div>
            </div> 

          </div>-->

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
        