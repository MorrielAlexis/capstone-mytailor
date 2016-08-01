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
          <li><a class="active"  style="padding-left:140px; padding-top:20px; padding-bottom:20px; padding-right:20px;"><b>Step 2: Choose Style</b></a></li>
          <li><a style="padding-left:140px; padding-top:20px; padding-bottom:20px; padding-right:20px;"><b>Check Out</b></a></li>
          <li><a style="padding-left:140px; padding-top:20px; padding-bottom:20px; padding-right:20px;"><b>Measurement</b></a></li>
        </ul>

        <ul class="tabs transparent" style="float:left; margin-top:40px;">
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab black-text">Jacket Style</li>
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab active"><a style="color:black" href="#tabCollarPocket">Jacket Collar & Pockets</a></li>
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab black-text">Pants Style</li>
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab black-text">Monogram</li>
          <div class="indicator light-blue" style="z-index:1"></div>
        </ul>

        <!--COLLAR POCKET TAB-->
        <div id="tabCollarPocket" class="col s12 white" style="padding:20px; border: 2px teal accent-4;">

          <div class="col s12">
            <div><button class="right btn-flat teal accent-4 white-text" type="submit">Continue</button></div>
            <div><a class="left btn-flat teal accent-4 white-text" href="{{URL::to('/customize-suit-style-jacket')}}">Previous step</a></div>
          </div>
          <div class="col s12 divider" style="height:4px; margin-top:10px;"></div>

          <div class="col s12">
            <ul class="collapsible" data-collapsible="accordion" style="border:none;">
              <li>
                <div class="collapsible-header" style="background-color:#00838f; color:white; height:30px; padding-top:10px; padding-bottom:50px; font-size:18px">Jacket Collar</div>
                <div class="collapsible-body row overflow-x" style="padding:20px;">
                  <div class="col s6">
                    <div class="center col s2 " style="margin-top:60px">
                      <input name="" type="radio" class="filled-in" value = "" id="" />
                      <label for=""></label>
                    </div>
                      <div class="col s10">
                        <div class="card-panel teal lighten-4 z-depth-1" style="height:200px">
                          <div class="row valign-wrapper">
                            <div class="center col s4">
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
                <div class="collapsible-header" style="background-color:#00838f; color:white; height:30px; padding-top:10px; padding-bottom:50px; font-size:18px">Chest Pocket</div>
                <div class="collapsible-body row overflow-x" style="padding:20px;">
                  <div class="col s6">
                    <div class="center col s2 " style="margin-top:60px">
                      <input name="" type="radio" class="filled-in" value = "" id="" />
                      <label for=""></label>
                    </div>
                      <div class="col s10">
                        <div class="card-panel teal lighten-4 z-depth-1" style="height:200px">
                          <div class="row valign-wrapper">
                            <div class="center col s4">
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
                <div class="collapsible-header" style="background-color:#00838f; color:white; height:30px; padding-top:10px; padding-bottom:50px; font-size:18px">Jacket Pockets</div>
                <div class="collapsible-body row overflow-x" style="padding:20px;">
                  <div class="col s6">
                    <div class="center col s2 " style="margin-top:60px">
                      <input name="" type="radio" class="filled-in" value = "" id="" />
                      <label for=""></label>
                    </div>
                      <div class="col s10">
                        <div class="card-panel teal lighten-4 z-depth-1" style="height:200px">
                          <div class="row valign-wrapper">
                            <div class="center col s4">
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

          <div class="col s12" style="margin-top:20px;">
            
            <div class="col s3">

              <h5><b>Functional Buttonhole on Sleeves</b></h5>
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <div class="col s6">
                <p>
                  <input class="with-gap" name="classic" type="radio" id="small" />
                  <label for="small"><font size="+1"><b>yes</b></font></label>
                </p>
              </div>
              <div class="col s6">
                <p>
                  <input class="with-gap" name="classic" type="radio" id="small" />
                  <label for="small"><font size="+1"><b>No</b></font></label>
                </p>
              </div>

            </div>

            <div class="col s3">

              <h5><b>Functional Buttonniere</b></h5>
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <div class="col s6">
                <p>
                  <input class="with-gap" name="classic" type="radio" id="small" />
                  <label for="small"><font size="+1"><b>yes</b></font></label>
                </p>
              </div>
              <div class="col s6">
                <p>
                  <input class="with-gap" name="classic" type="radio" id="small" />
                  <label for="small"><font size="+1"><b>No</b></font></label>
                </p>
              </div>

            </div>

            <div class="col s3" style="padding-top:50px;">
              <h5><b>Thread Color</b></h5>
              <p>Would you like coloured button threads?</p>
              <div class="input-field" style="margin-top:20px;">
                <select class="browser-default">
                  <option value="" disabled selected>Choose your option</option>
                  <option value="1">Option 1</option>
                  <option value="2">Option 2</option>
                </select>
              </div>
              <h5><b>Buttonhole Color</b></h5>
              <p>Would you like buttonhole color? (cuffs only)</p>
              <div class="input-field" style="margin-top:20px;">
                <select class="browser-default">
                  <option value="" disabled selected>Choose your option</option>
                  <option value="1">Option 1</option>
                  <option value="2">Option 2</option>
                </select>
              </div>                              
            </div>         

          </div>

          <div class="col s12">

            <div class="col s3">

              <h5><b>Need Pants</b></h5>
              <div class="col s6">
                <p>
                  <input class="with-gap" name="classic" type="radio" id="small" />
                  <label for="small"><font size="+1"><b>yes</b></font></label>
                </p>
              </div>
              <div class="col s6">
                <p>
                  <input class="with-gap" name="classic" type="radio" id="small" />
                  <label for="small"><font size="+1"><b>No</b></font></label>
                </p>
              </div>

            </div>

          </div>          

          <div class="col s12 divider" style="height:4px; margin-bottom:10px;"></div>
          <div class="col s12">
            <div><button class="right btn-flat teal accent-4 white-text" typ="submit">Continue</button></div>
            <div><a class="left btn-flat teal accent-4 white-text" href="{{URL::to('/customize-suit-style-jacket')}}">Previous step</a></div>
          </div>

        </div>
        <!--END OF COLLAR POCKET TAB-->


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

