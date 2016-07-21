@extends('layouts.masterOnline')

@section('content')

    <div class="container" style="width:100%;">
      <div class="row" style="margin:40px;">
        <ul class="col s12 breadcrumb">
          <li><a style="padding-left:100px; padding-top:20px; padding-bottom:20px; padding-right:20px;"><b>Select Fabric</b></a></li>
          <li><a style="padding-left:140px; padding-top:20px; padding-bottom:20px; padding-right:20px;"><b>Choose Style</b></a></li>
          <li><a style="padding-left:140px; padding-top:20px; padding-bottom:20px; padding-right:20px;"><b>Check Out</b></a></li>
          <li><a class="active" style="padding-left:140px; padding-top:20px; padding-bottom:20px; padding-right:20px;"><b>Step 4: MEASUREMENT</b></a></li>
        </ul>
      </div>
    </div>
  
  <div class="container">
    <div class="section white" style="padding:20px; margin-bottom:20px;"> 

      <div class="row">
        <div class="col s12 m12 l12">
          <span class="page-title" style="margin:15px"><center><h5><b>Measurement Details</b></h5></center></span>
          <div class="divider" style="height:1px; background-color:#80d8ff"></div>
          <div class="divider" style="height:1px; background-color:#80d8ff"></div>
        </div>
      </div>

      <div class="container" style="color:gray">
        <center><h6><b>NOTES WHEN TAKING MEASUREMENTS:</b></h6></center>
        <center><h6>* Use "inches" (no allowance).</h6></center>
        <center><h6>* Place one (1) finger between bust and measuring tape while measuring waist.</h6></center>
        <center><h6>* Place one (1) finger between waistline and measuring tape while measuring waist.</h6></center>
        <center><h6>* Measure four (4) inches from waistline (downward) and place three (3) fingers between hips and measuring tape to get measurement of first hip.</h6></center>
        <center><h6>* Meaure eight (8) inches from waistline and place three (3) fingers between hips and measuring tape to get measurement second hip.</h6></center>
        <center><h6>* Measure from waistline to knee to get measurement of length of skirt.</h6></center>
        <div class="divider"></div>
        <div class="divider"></div>
      </div>

      <div class="row" style="margin-top:20px">
        
        <div class="col s12" style="font-size:15px; color:red; margin-top:10px; margin-bottom:50px; margin-left:30px">
          <a class="modal-trigger tooltipped" href="#add-new-fields-measure" data-position="right" data-delay="50" data-tooltip="Click to add more measurement fields to accomodate multiple customers in a single transaction"><u>Add another fields for measurement</u></a>
        </div>

        <div class="container">
          <div class="col s12"> 
            <div id="for_top" style="color:black">
              <h5><b>Parts to be measured</b></h5>
              <div style="color:black; padding-left:140px" class="input-field col s6">                 
                <input value="" id="shoulder" name="shoulder" type="text" class="">
                <label style="color:teal" for="shoulder">Shoulder: </label>
              </div>
              <div style="color:black; padding-left:140px" class="input-field col s6">                 
                <input value="" id="bust" name="bust" type="text" class="">
                <label style="color:teal" for="bust">Bust: </label>
              </div>
              <div style="color:black; padding-left:140px" class="input-field col s6">                 
                <input value="" id="waist" name="waist" type="text" class="">
                <label style="color:teal" for="waist">Waist: </label>
              </div>
              <div style="color:black; padding-left:140px" class="input-field col s6">                 
                <input value="" id="hip" name="hip" type="text" class="">
                <label style="color:teal" for="hip">Hip: </label>
              </div>
              <div style="color:black; padding-left:140px" class="input-field col s6">                 
                <input value="" id="armhole" name="armhole" type="text" class="">
                <label style="color:teal" for="armhole">Armhole: </label>
              </div>
              <div style="color:black; padding-left:140px" class="input-field col s6">                 
                <input value="" id="circumference" name="circumference" type="text" class="">
                <label style="color:teal" for="circumference">Circumference: </label>
              </div>
              <div style="color:black; padding-left:140px" class="input-field col s6">                 
                <input value="" id="length_sleeves" name="length_sleeves" type="text" class="">
                <label style="color:teal" for="length_sleeves">Length of Sleeves: </label>
              </div>
              <div style="color:black; padding-left:140px" class="input-field col s6">                 
                <input value="" id="length_polo" name="length_polo" type="text" class="">
                <label style="color:teal" for="length_polo">Length of Polo: </label>
              </div>
              <div style="color:black; padding-left:140px" class="input-field col s6">                 
                <input value="" id="neck" name="neck" type="text" class="">
                <label style="color:teal" for="neck">Neck: </label>
              </div>
              <div style="color:black; padding-left:140px" class="input-field col s6">                 
                <input value="" id="thigh" name="thigh" type="text" class="">
                <label style="color:teal" for="thigh">Thigh: </label>
              </div>
              <div style="color:black; padding-left:140px" class="input-field col s6">                 
                <input value="" id="knee" name="knee" type="text" class="">
                <label style="color:teal" for="knee">Knee: </label>
              </div>
              <div style="color:black; padding-left:140px" class="input-field col s6">                 
                <input value="" id="cuffs" name="cuffs" type="text" class="">
                <label style="color:teal" for="cuffs">Cuffs: </label>
              </div>
              <div style="color:black; padding-left:140px" class="input-field col s6">                 
                <input value="" id="crotch" name="crotch" type="text" class="">
                <label style="color:teal" for="crotch">Crotch: </label>
              </div>
              <div style="color:black; padding-left:140px" class="input-field col s6">                 
                <input value="" id="length" name="length" type="text" class="">
                <label style="color:teal" for="length">Length: </label>
              </div>
            </div>
          </div>
        </div>

        <div class="col s12">
          <div class="container">
            <p style="color:red">In case of multiple measurements</p>
            <div style="color:black;" class="input-field col s8">                 
              <input value="" id="length" name="length" type="text" class="">
              <label style="color:gray" for="length">Target Customer: </label>
            </div>
            <div style="color:gray" class="input-field col s4">                 
              <select>
                <option value="" disabled selected color="red">Sex</option>
                <option value="1">Female</option>
                <option value="2">Male</option>
              </select>
            </div>
          </div>
        </div>

      </div>

      <div class="col s12"><div class="divider" style="height:5px; color:gray; margin-top:15px; margin-bottom:15px"></div></div>

      <div class="row">
        <a href="#save-transaction" class="right modal-trigger btn tooltipped" data-position="top" data-delay="50" data-tooltip="Click to save measurement information and go back to shop" style="background-color:teal; margin-right:50px; padding:9.5px; padding-bottom:45px; color:white">Save Measurements</a>
        <a href="{{URL::to('/online-home')}}" class="left btn tooltipped" data-position="top" data-delay="50" data-tooltip="Transfers you back home and clears current unsaved transaction" style="background-color:teal; padding:9.5px; padding-bottom:45px; margin-left:50px; color:white">Cancel Transaction</a>
      </div>

    </div>
  </div>

  <!--SAVE TRANSACTION-->
  <div id="save-transaction" class="modal modal-fixed-footer" style="height:200px; width:500px; margin-top:150px">        
    {!! Form::open() !!}
      <div class="modal-content col s12 row">
        <div class="col s3">
          <i class="mdi-action-done" style="font-size:50px; color:green"></i>
        </div>
        <div class="col s9">
          <p><font size="+1">Successfully saved measurement and transaction!</font></p>
        </div>
      </div>

      <div class="modal-footer col s12" style="background-color:green; opacity:0.85">
        <a class="waves-effect waves-green btn-flat" href="{{URL::to('/online-home')}}"><font color="black">OK</font></a>
      </div>
    {!! Form::close() !!}
  </div>


  <!--ADD NEW FIELDS FOR MEASUREMENT-->
  <div id="add-new-fields-measure" class="modal modal-fixed-footer row" style="height:400px; width:600px; margin-top:50px">
                                        
    <div class="modal-content col s12">
      <div class="col s12">
      {!! Form::open() !!}

        <div class="col s3" style="color:teal"><p>Category</p></div>
        <div class="col s3" style="color:black">
          <div class="input-field col s12">
            <select>
              <option value="1" class="circle">Uniform</option>
              <option value="2" class="circle">Suit</option>
              <option value="3" class="circle">Gown</option>
            </select>
          </div>
        </div>

        <div class="col s3" style="color:teal"><p>Section</p></div>
        <div class="col s3" style="color:black">
          <div class="input-field col s12">
            <select>
                <option value="1" class="circle">Top</option>
                <option value="2" class="circle">Bottom</option>
            </select>
          </div>
        </div>

        <div class="col s12" style="margin-bottom:30px; height:3px; background-color:teal"><div class="divider"></div></div>

        <div class="col s12" style="margin-left:30px">
          <div class="col s6">
            <input type="checkbox" class="filled-in" name="shoulder" id="shoulder"/>
            <label for="shoulder">Shoulder</label>
          </div>
          <div class="col s6">
            <input type="checkbox" class="filled-in" name="bust" id="bust"/>
            <label for="bust">Bust</label>
          </div>
          <div class="col s6">
            <input type="checkbox" class="filled-in" name="waist" id="waist"/>
            <label for="waist">Waist</label>
          </div>
          <div class="col s6">
          <input type="checkbox" class="filled-in" name="hip" id="hip"/>
              <label for="hip">Hip</label>
          </div>
          <div class="col s6">
            <input type="checkbox" class="filled-in" name="armhole" id="armhole"/>
            <label for="armhole">Armhole</label>
          </div>
          <div class="col s6">
            <input type="checkbox" class="filled-in" name="circumference" id="circumference"/>
            <label for="circumference">Circumference</label>
          </div>
          <div class="col s6">
            <input type="checkbox" class="filled-in" name="length_sleeves" id="length_sleeves"/>
            <label for="length_sleeves">Length of Sleeves</label>
          </div>
          <div class="col s6">
            <input type="checkbox" class="filled-in" name="length_polo" id="length_polo"/>
            <label for="length_polo">Length of Polo</label>
          </div>
          <div class="col s6">
            <input type="checkbox" class="filled-in" name="neck" id="neck"/>
            <label for="neck">Neck</label>
          </div>
          <div class="col s6">
            <input type="checkbox" class="filled-in" name="thigh" id="thigh"/>
            <label for="thigh">Thigh</label>
          </div>
          <div class="col s6">
            <input type="checkbox" class="filled-in" name="knee" id="knee"/>
            <label for="knee">Knee</label>
          </div>
          <div class="col s6">
            <input type="checkbox" class="filled-in" name="cuffs" id="cuffs"/>
            <label for="cuffs">Cuffs</label>
          </div>
          <div class="col s6">
            <input type="checkbox" class="filled-in" name="crotch" id="crotch"/>
            <label for="crotch">Crotch</label>
          </div>
          <div class="col s6">
            <input type="checkbox" class="filled-in" name="length" id="length"/>
            <label for="length">Length</label>
          </div>
        </div>
        {!! Form::close() !!}

      </div>
    </div>

    <div class="modal-footer row">                  
      <div class="col s12">
        {!! Form::open() !!}
        <div class="col s4" style="padding-left:10px; color:red; padding-top:10px">
          <input type="checkbox" class="left filled-in" name="select_all" id="select_all">
          <label for="select_all" style="color:red">Select All</label>
        </div>
        {!! Form::close() !!}
        <div class="col s8">
          <a href="{{URL::to('/customize-checkout-measurement')}}" class="right waves-effect waves-green btn-flat">Cancel</a>
          <a class="right waves-effect waves-green btn-flat" href="{{URL::to('/customize-checkout-measurement')}}"><font color="black">OK</font></a>
        </div>
      </div>
    </div>

  </div>
@stop

@section('scripts')

  <script>
    $(document).ready(function() {
      $('select').material_select();
    });
  </script> 

@stop