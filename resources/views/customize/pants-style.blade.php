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
          <center><span style="font-size:42px; color: #757575; font-family:'Playfair Display','Times';">SUIT CUSTOMIZATION</span></center>
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
          <li><a class="active"  style="padding-left:140px; padding-top:20px; padding-bottom:20px; padding-right:20px;"><b>Step 2: CHOOSE STYLE</b></a></li>
          <li><a style="padding-left:140px; padding-top:20px; padding-bottom:20px; padding-right:20px;"><b>Check Out</b></a></li>
          <li><a style="padding-left:140px; padding-top:20px; padding-bottom:20px; padding-right:20px;"><b>Measurement</b></a></li>
        </ul>

        <ul class="tabs transparent" style="float:left; margin-top:40px;">
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab active"><a style="color:black" href="#tabPleats">Pleats</a></li>
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab"><a style="color:black" href="#tabPockets">Pockets</a></li>
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab"><a style="color:black" href="#tabBottom">Bottom</a></li>
          <div class="indicator white" style="z-index:1"></div>
        </ul>

        <!--PLEATS TAB-->
        <div id="tabPleats" class="col s12 white" style="padding:20px; border 2px teal accent-4 white-text;">
          
          <div class="col s12"><a class="btn-flat right teal accent-4 white-text" href="tabPockets">Next step</a></div>
          <div class="col s12 divider" style="height:4px; margin-top:10px;"></div>
          
          <div class="col s12" style="margin-top:10px;">
            <label class="col s2"><font size="+1"><b>Selected Fabric</b></font></label>
            <label class="col s5"><a class="btn teal accent-4 white-text" href="{{URL::to('/customize-mens-fabric')}}"><font size="+1">Edit / Change Fabric</font></a></label>
          </div>
          
          <div class="col s12">
            <div class="col s2">
              <img class="responsive-img" src="img/fabric.jpg" style="">
            </div>
            <div class="col s5" style="background-color:#eeeeee;">
              <p>Fabric Name</p>
              <p>Swatch Code</p>
              <p>Fabric Type</p>
              <p>Price</p>
            </div>
          </div>

          <div class="col s12" style="padding:20px;"><h4>Pant's Pleats</h4></div>

          <div class="col s12">

            <div class="col s2">
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <p>
                <input class="with-gap" name="classic" type="radio" id="small" />
                <label for="small"><font size="+1"><b>Classic Small</b></font></label>
              </p>
            </div>

          </div>

          <div class="col s12 divider" style="height:4px; margin-bottom:10px;"></div>
          <div class="col s12"><a class="right btn-flat teal accent-4 white-text" href="tabPockets">Next step</a></div>

        </div>
        <!--END OF PLEATS TAB-->

        <!--POCKETS TAB-->
        <div id="tabPockets" class="col s12 white" style="padding:20px; border 2px teal accent-4 white-text;">
          
          <div class="col s12">
            <div><a class="right btn-flat teal accent-4 white-text" href="tabBottom">Next step</a></div>
            <div><a class="left btn-flat teal accent-4 white-text" href="tabPleats">Previous step</a></div>
          </div>
          <div class="col s12 divider" style="height:4px; margin-top:10px;"></div>
          
          <div class="col s12" style="padding:20px;"><h4>Pant's Pockets</h4></div>
          <div class="col s12">

            <div class="col s2">
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <p>
                <input class="with-gap" name="classic" type="radio" id="small" />
                <label for="small"><font size="+1"><b>Classic Small</b></font></label>
              </p>
            </div>

          </div>

          <div class="col s12" style="padding:20px;"><h4>Backpockets</h4></div>
          <div class="col s12">

            <div class="col s2">
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <p>
                <input class="with-gap" name="classic" type="radio" id="small" />
                <label for="small"><font size="+1"><b>Classic Small</b></font></label>
              </p>
            </div>

          </div>          

          <div class="col s12 divider" style="height:4px; margin-bottom:10px;"></div>
          <div class="col s12">
            <div><a class="right btn-flat teal accent-4 white-text" href="tabBottom">Next step</a></div>
            <div><a class="left btn-flat teal accent-4 white-text" href="tabPleats">Previous step</a></div>
          </div>

        </div>
        <!--END OF POCKETS TAB-->

        <!--BOTTOM TAB-->
        <div id="tabBottom" class="col s12 white" style="padding:20px; border 2px teal accent-4 white-text;">

          <div class="col s12">
            <div><a class="right btn-flat teal accent-4 white-text" href="{{URL::to('/customize-checkout-info')}}">Proceed to Checkout</a></div>
            <div><a class="left btn-flat teal accent-4 white-text" href="tabPockets">Previous step</a></div>
          </div>          
          <div class="col s12 divider" style="height:4px; margin-top:10px;"></div>

          <div class="col s12" style="padding:20px;"><h4>Pant's Bottom</h4></div>

          <div class="col s12">

            <div class="col s2">
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <p>
                <input class="with-gap" name="classic" type="radio" id="small" />
                <label for="small"><font size="+1"><b>Classic Small</b></font></label>
              </p>
            </div>

          </div>

          <div class="col s12 divider" style="height:4px; margin-bottom:10px;"></div>
          <div class="col s12">
            <div><a class="right btn-flat teal accent-4 white-text" href="{{URL::to('/customize-checkout-info')}}">Proceed to Checkout</a></div>
            <div><a class="left btn-flat teal accent-4 white-text" href="tabPockets">Previous step</a></div>
          </div>

        </div>
        <!--END OF BOTTOM TAB-->

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
