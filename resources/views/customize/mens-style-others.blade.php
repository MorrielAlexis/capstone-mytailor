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
            <div><a class="left btn-flat teal accent-4 white-text" href="{{URL::to('/customize-mens-style-pocket-monogram')}}">Previous step</a></div>
          </div>
          <div class="col s12 divider" style="height:4px; margin-top:10px;"></div>

          <div class="col s12" style="padding:20px;"><h4>6. Front</h4></div>

          <div class="col s12" style="margin-top:20px;">

            <div class="col s2">
              <img class="materialboxed responsive-img" src="imgDesignPatterns/FRONTCOVEREDPLACKET.jpg">
              <p>
                <input class="with-gap" name="classic" type="radio" id="small" />
                <label for="small"><font size="+1"><b>Front Covered Placket</b></font></label>
              </p>
            </div>

            <div class="col s2">
              <img class="materialboxed responsive-img" src="imgDesignPatterns/FRONTONPLACKET.jpg">
              <p>
                <input class="with-gap" name="classic" type="radio" id="small" />
                <label for="small"><font size="+1"><b>Front-on Placket</b></font></label>
              </p>
            </div>

            <div class="col s2">
              <img class="materialboxed responsive-img" src="imgDesignPatterns/FRONTPLACKET.jpg">
              <p>
                <input class="with-gap" name="classic" type="radio" id="small" />
                <label for="small"><font size="+1"><b>Front Placket</b></font></label>
              </p>
            </div>                        

          </div> 

          <!--<div class="col s12" style="margin-top:20px;">
            
            <div class="col s3" style="padding:20px;">
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <p>Inside Placket Lining<br>Button Side</p>
              <div><a class="btn-flat teal accent-4 white-text" href="{{URL::to('/customize-mens-fabric')}}"><font size="+1">Select Fabric</font></a></div>
            </div>

            <div class="col s3" style="padding:20px;">
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <p>Inside Placket Lining<br>Buttonhole Side</p>
              <div><a class="btn-flat teal accent-4 white-text" href="{{URL::to('/customize-mens-fabric')}}"><font size="+1">Select Fabric</font></a></div>
            </div> 
                       
          </div>-->

          <div class="col s12" style="margin-top:20px;">

            <div class="col s3">
              <h4>7. Tuxedo</h4>
              <img class="materialboxed responsive-img" src="imgCustomize/tuxedo.jpg">
              <p>
                <input class="with-gap" name="classic" type="radio" id="small" />
                <label for="small"><font size="+1"><b>Tuxedo</b></font></label>
              </p>
            </div>

            <div class="col s3">
              <h4>8. Epaulettes</h4>
              <img class="materialboxed responsive-img" src="imgCustomize/epaulettes.jpg">
              <div><a class="btn-flat teal accent-4 white-text" href="{{URL::to('/customize-mens-fabric')}}"><font size="+1">Select Fabric</font></a></div>
            </div>

            <div class="col s3">
              <h4>9. Back Split</h4>
              <img class="materialboxed responsive-img" src="imgCustomize/backsplit.jpg">
              <p>
                <input class="with-gap" name="classic" type="radio" id="small" />
                <label for="small"><font size="+1"><b>Back Split</b></font></label>
              </p>
            </div>

          </div>

          <div class="col s12" style="margin-top:20px;">
            <h4>10. Back</h4>

            <div class="col s2">
              <img class="materialboxed responsive-img" src="imgCustomize/BACKBOXPLEATS.jpg">
              <p>
                <input class="with-gap" name="classic" type="radio" id="small" />
                <label for="small"><font size="+1"><b>Back Box Pleats</b></font></label>
              </p>
            </div>

          </div>           

          <div class="col s12" style="margin-top:20px;">
            <h4>11. Bottom</h4>

            <div class="col s2">
              <img class="materialboxed responsive-img" src="imgCustomize/BOTTOMSSTRAIGHTCUT.jpg">
              <p>
                <input class="with-gap" name="classic" type="radio" id="small" />
                <label for="small"><font size="+1"><b>Bottom Straight Cut</b></font></label>
              </p>
            </div>

            

          </div>

          <!--<div class="col s12" style="margin-top:20px;">

            <h5><b>13. Provide image for our reference (optional)</b></h5>

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

          </div>-->

          <div class="col s12">
            <ul class="collapsible" data-collapsible="accordion" style="border:none;">
              <li>
                <div class="collapsible-header" style="background-color:#00838f; color:white; height:30px; padding-top:10px; padding-bottom:50px; font-size:18px">Front</div>
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
              <li>
                <div class="collapsible-header" style="background-color:#00838f; color:white; height:30px; padding-top:10px; padding-bottom:50px; font-size:18px">Tuxedo</div>
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
              <li>
                <div class="collapsible-header" style="background-color:#00838f; color:white; height:30px; padding-top:10px; padding-bottom:50px; font-size:18px">Epaulettes</div>
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
              <li>
                <div class="collapsible-header" style="background-color:#00838f; color:white; height:30px; padding-top:10px; padding-bottom:50px; font-size:18px">Back Split</div>
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
              <li>
                <div class="collapsible-header" style="background-color:#00838f; color:white; height:30px; padding-top:10px; padding-bottom:50px; font-size:18px">Back</div>
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
              <li>
                <div class="collapsible-header" style="background-color:#00838f; color:white; height:30px; padding-top:10px; padding-bottom:50px; font-size:18px">Bottom</div>
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
          <div class="col s12">
            <div><a class="right btn-flat teal accent-4 white-text" href="{{URL::to('/online-order-now')}}">Go to Shopping Cart</a></div>
            <div><a class="left btn-flat teal accent-4 white-text" href="{{URL::to('/customize-mens-style-pocket-monogram')}}">Previous step</a></div>
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
        