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
        <div class="col s12">
          <div class="col s4"><p style="color:gray"><b>Measurement Type</b></p></div>
          <div class="col s8">    
              <select id = "measurement-category">
                @foreach($categories as $category)
                  <option value="{{ $category->strMeasurementCategoryID }}" class="circle">{{ $category->strMeasurementCategoryName }}</option>
                @endforeach
              </select>
          </div>
        </div>
                <div class="col s12" style="padding:20px"> 
                  
                  <div id="for_top" class="col s12" style="color:black">
                    <h5><b>Parts to be measured - </b></h5>
                    
              <!--if Body and Cloth Measurement-->
                       @foreach($measurements as $j => $measurement)
                        <div class="container measurement-general {{ $measurement->strMeasCategoryFK }}"> 
                            <div style="color:black; padding-left:140px" class="input-field col s6 ">   
                              <input type="hidden" name="" value="{{ $measurement->strMeasurementDetailID }}">              
                                    <input name="" type="text">
                                    <label style="color:teal" for="">{{ $measurement->strMeasDetailName }} (cm): </label>
                                </div>
                            </div>
                     
                        @endforeach
              <!--End of Body and Cloth Measurement-->

              <!--if Standard Size Measurement-->
              
              <!--if Standard Size Measurement-->
              <div class="col s12 z-depth-1 measurement-general MEASCAT001" style="padding:20px">
                <div class="container">
                  <div class="left col s6">
                    <center><img src="" style="height:200px; width:200px; border:3px gray solid"></center> 
                    <p><center></center></p>                          
                  </div><!--this will be the garment detail-->

                  <div class="right col s6" style="margin-top:20px">
                    <div class="col s6"><p style="color:teal" for="standard_size">Choose Fit Type:</p></div>      
                            <div style="color:black;" class="col s6">                   
                                    <select>
                          <option value="">Normal Fit</option>
                        </select><!--Standard sizes for the specific Garment-->
                                </div>  
                            </div> 

                  <div class="right col s6">
                    <div class="col s6"><p style="color:teal" for="standard_size">Choose Standard Size:</p></div>     
                            <div style="color:black;" class="col s6">                   
                                    <select>
                                      @foreach($standard_categories as $standard_category)
                            <option value="{{ $standard_category->strStandardSizeCategoryID }}">{{ $standard_category->strStandardSizeCategoryName }}</option>
                          @endforeach
                        </select><!--Standard sizes for the specific Garment-->
                                </div>  
                            </div> 
                          </div>
                      </div>

                      <div class="col s12"><div class="divider" style="height:2px gray solid; margin:20px"></div></div>
              <!--End of standard size measurement-->

                      </div>

                      <p style="color:red">In case of multiple measurements</p>
                        <div style="color:black; padding-left:160px" class="input-field col s5">                 
                            <input id="length" name="profile_name" type="text" class="">
                            <label style="color:gray" for="length">Measurement Profile Name: </label>
                        </div>

                        <div style="color:gray" class="input-field col s3">                 
                            <select name="profile_sex">
                              <option value="" disabled selected color="red">Sex</option>
                              <option value="M">Female</option>
                              <option value="F">Male</option>
                            </select>
                        </div>
              
                        <div style="color:gray" class="input-field col s3">                 
                            <select>
                              <option value="" disabled selected color="red">Target Garment</option>
                              <option value="1"></option>
                            </select>
                        </div>
                </div>


        <!--bottom buttons-->
          <a href="{{URL::to('/online-individual-checkout-info')}}" class="right btn tooltipped" data-position="top" data-delay="50" data-tooltip="Click to save payment information and get measured" style="background-color:teal; padding:9.5px; padding-bottom:45px; margin-right:50px; color:white"><label style="font-size:15px; color:white">Check Out</label></a>

          <a href="#cancel-order" class="right btn modal-trigger tooltipped" data-position="top" data-delay="50" data-tooltip="Clears current transaction" style="background-color:teal; padding:9.5px; padding-bottom:45px; margin-right:50px; color:white">Cancel Transaction</a>
            <div id="cancel-order" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:80px">
              <h5><font color="red"><center><b>Warning!</b></center></font></h5>
                
              <div class="divider" style="height:2px"></div>
              <div class="modal-content col s12">
                <div class="center col s4"><i class="mdi-alert-warning" style="color:red; font-size:60px"></i></div>
                <div class="col s8"><p style="font-size:18px">Are you sure? Doing this will delete current transaction.</p></div>
              </div>

              <div class="modal-footer col s12">
                <a class="waves-effect waves-green btn-flat" href="{{URL::to('/online-home')}}"><font color="black">Yes</font></a>
                <a href="{{URL::to('/online-individual-checkout-measurement')}}" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">No</font></a>
            </div>
          </div>
        <!--end of bottom buttons-->

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

  <script>
    $('#measurement-category').change(function(){
      var measurementCat = $('#measurement-category').val();
      updateUI(measurementCat);
    });


    function updateUI(category)
    {
      $('.measurement-general').hide();
      $('.' + category).show();
    }
  </script>

  <script>
    $(document).ready(function() {
        $('.measurement-general').hide();

        $('select').material_select();
        $('body').on('load', 'ul.tabs', function() {
        $('ul.tabs').tabs();
    });
      
      $("#addMeasurementDetail").on('click', function(){
/*        setTimeout(function(){
          $('ul.tabs').tabs();
          $('#tabMeasurementDetail').style('display', 'block');
        }, 2000);
*/      });

      });
  </script> 

@stop