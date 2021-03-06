@extends('layouts.masterOnline')

@section('content')

    <div class="container" style="width:100%;">
      <div class="row" style="margin:40px;">
        <ul class="col s12 breadcrumb">
          <li><a style="padding-left:100px; padding-top:20px; padding-bottom:20px; padding-right:20px;"><b>Select Fabric</b></a></li>
          <li><a style="padding-left:140px; padding-top:20px; padding-bottom:20px; padding-right:20px;"><b>Choose Style</b></a></li>
          <li><a class="active" style="padding-left:140px; padding-top:20px; padding-bottom:20px; padding-right:20px;"><b>Step 3: Measurement</b></a></li>
          <li><a style="padding-left:140px; padding-top:20px; padding-bottom:20px; padding-right:20px;"><b>Check Out</b></a></li>
        </ul>
      </div>
    </div>
  
  <div class="container">
    <div class="section white row" style="padding:20px; margin-bottom:20px;"> 

      <div id="measure-detail" class = "hue col s12" style="padding:20px;">
          <div class="row">
            <div class="col s12 m12 l12">
                  <span class="page-title" style="margin:15px"><center><h5><b>Measurement Detail</b></h5></center></span>
                  <div class="divider" style="height:1px; background-color:#80d8ff"></div>
                  <div class="divider" style="height:1px; background-color:#80d8ff"></div>
                </div>
          </div>

          <!--<div class="container" style="color:gray">
            <center><h6><b>NOTES WHEN TAKING MEASUREMENTS:</b></h6></center>
            <center><h6>* Use "inches" (no allowance).</h6></center>
            <center><h6>* Place one (1) finger between bust and measuring tape while measuring waist.</h6></center>
            <center><h6>* Place one (1) finger between waistline and measuring tape while measuring waist.</h6></center>
            <center><h6>* Measure four (4) inches from waistline (downward) and place three (3) fingers between hips and measuring tape to get measurement of first hip.</h6></center>
            <center><h6>* Meaure eight (8) inches from waistline and place three (3) fingers between hips and measuring tape to get measurement second hip.</h6></center>
            <center><h6>* Measure from waistline to knee to get measurement of length of skirt.</h6></center>
            <div class="divider"></div>
            <div class="divider"></div>
          </div>-->


      <div class="col s12" style="padding:20px;">
        <div class="col s5">
          <div class="col s4"><p style="color:gray"><b>Measurement Type</b></p></div>
          <div class="col s8">    
              <select class = "fabric-pattern" id = "fabric-pattern">
                  <option value="" class="circle"></option>
              </select>
          </div>
        </div>

        <div style="color:gray" class="col s5"> 
          <div class="col s7"><p style="color:gray; margin-top:5px; font-size:15px"><b>No. of Measurement Profile:</b></p></div>                
          <div class="col s5"><center><input class="center" name="num-meas-profile" id="num-meas-profile" type="number" value=""></div>
        </div>
        <div class="col s2"><a href="" class="btn-flat" style="background-color:teal; color:white; margin-top:10px">Add</a></div>
      </div>


          <div class="row" style="background-color:white; margin-top:20px">


          <div class="col s8" style="margin-left:20px;color:red">
            <p><b>Unit of Measurement</b></p>
                            <div class="col s6">
                        <input name="uom" type="radio" class="filled-in payment" id="cm" />
                      <label for="cm">centimeter (cm)</label>
                </div>
                <div class="col s6">
                        <input name="uom" type="radio" class="filled-in payment" id="in" />
                      <label for="in">inch (in)</label>
                    </div>
                  </div>

                <div class="col s12" style="padding:20px"> 
                  <div id="for_top" class="col s12" style="color:black">
                    <h5><b>Parts to be measured</b></h5>
                    <div class="container"> 
                          <div style="color:black; padding-left:140px" class="input-field col s6">                 
                                <input name="shoulder" type="text">
                                <label style="color:teal" for="shoulder"></label>
                              </div>
                        </div>
                      </div>

                      <p style="color:red">In case of multiple measurements</p>
                        <div style="color:black; padding-left:160px" class="input-field col s5">                 
                            <input value="" id="length" name="length" type="text" class="">
                            <label style="color:gray" for="length">Profile Name: </label>
                        </div>

                        <div style="color:gray" class="input-field col s3">                 
                            <select>
                  <option value="" disabled selected color="red">Sex</option>
                  <option value="1">Female</option>
                  <option value="2">Male</option>
                </select>
                        </div>

                        <div style="color:gray" class="input-field col s3">                 
                            <select>
                  <option value="" disabled selected color="red">Target Garment</option>
                  <option value="1"></option>
                </select>
                        </div>

                        <div class="col s1"><a href="#!" class="btn-floating" style="background-color:#a7ffeb; margin-top:20px"><i class="mdi-navigation-check" style="color:black;"></i></a></div>
                </div>

                    <div class="col s12"><div class="divider" style="height:5px; color:gray; margin-top:15px; margin-bottom:15px"></div></div>

          <a href="{{URL::to('/online-company-checkout-edit-set')}}" class="right btn tooltipped" data-position="top" data-delay="50" data-tooltip="Click to save employee measurement" style="background-color:teal; padding:9.5px; padding-bottom:45px; margin-right:50px; color:white">Save</a>
          <a href="{{URL::to('/online-company-checkout-edit-set')}}" class="right btn tooltipped" data-position="top" data-delay="50" data-tooltip="Cancels employee measurement profile" style="background-color:teal; padding:9.5px; padding-bottom:45px; margin-right:50px; color:white">Cancel</a>

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