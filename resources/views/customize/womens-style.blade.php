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
          <center><span style="font-size:42px; color: #757575; font-family:'Playfair Display','Times';">WOMEN'S SHIRT</span></center>
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
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab"><a style="color:black" href="#tabCuffs">Cuffs</a></li>
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab"><a style="color:black" href="#tabButtons">Buttons</a></li>
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab"><a style="color:black" href="#tabPocketMonogram">Pocket & Monogram</a></li>
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab"><a style="color:black" href="#tabOthers">Others</a></li>
          <div class="indicator white" style="z-index:1"></div>
        </ul>

        <!--COLLAR TAB-->
        <div id="tabCollar" class="col s12 white" style="padding:20px; border 2px teal accent-4 white-text;">
          
          <div class="col s12"><a class="btn-flat right teal accent-4 white-text" href="tabCuffs">Next step</a></div>
          <div class="col s12 divider" style="height:4px; margin-top:10px;"></div>
          
          <div class="col s12" style="margin-top:10px;">
            <label class="col s2"><font size="+1"><b>Selected Fabric</b></font></label>
            <label class="col s5"><a class="btn teal accent-4 white-text" href="{{URL::to('/customize-womens-fabric')}}"><font size="+1">Edit / Change Fabric</font></a></label>
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

          <div class="col s12" style="padding:20px;"><h4>1. Collar</h4></div>

          <div class="col s12" style="margin-top:20px;">

            <div class="col s2">
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <p>
                <input class="with-gap" name="classic" type="radio" id="small" />
                <label for="small"><font size="+1"><b>Classic Small</b></font></label>
              </p>
            </div>

          </div>

          <div class="divider dashed" style="height:2px;"></div>

          <div class="col s12" style="margin-top:20px;">
            <div class="col s3" style="padding:20px;"><h5><b>Collar Lining</b></h5></div>
            <div class="col s3" style="padding:20px;"><h5><b>Removable Collar Stay</b></h5></div>
            <div class="col s3" style="padding:20px;"><h5><b>Contrast Color</b></h5></div>
          </div>

          <div class="col s12">

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
            </div>

            <div class="col s3" style="padding:20px;">
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <div><a class="btn-flat teal accent-4 white-text" href="{{URL::to('/customize-womens-fabric')}}"><font size="+1">Select Fabric</font></a></div>
            </div> 

          </div>          

          <div class="col s12 divider" style="height:4px; margin-bottom:10px;"></div>
          <div class="col s12"><a class="right btn-flat teal accent-4 white-text" href="tabCuffs">Next step</a></div>

        </div>
        <!--END OF COLLAR TAB-->

        <!--CUFFS TAB-->
        <div id="tabCuffs" class="col s12 white" style="padding:20px; border 2px teal accent-4 white-text;">
          
          <div class="col s12">
            <div><a class="right btn-flat teal accent-4 white-text" href="tabButtons">Next step</a></div>
            <div><a class="left btn-flat teal accent-4 white-text" href="tabCollar">Previous step</a></div>
          </div>
          <div class="col s12 divider" style="height:4px; margin-top:10px;"></div>

          <div class="col s12" style="padding:20px;"><h4>2. Sleeve & Cuffs</h4></div>

          <div class="col s12" style="margin-top:20px;">

            <div class="col s2">
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <p>
                <input class="with-gap" name="classic" type="radio" id="small" />
                <label for="small"><font size="+1"><b>Round Cut 1 Button</b></font></label>
              </p>
            </div>

          </div> 

          <div class="col s12" style="margin-top:40px;">

            <div class="col s2">
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <p>
                <input class="with-gap" name="classic" type="radio" id="small" />
                <label for="small"><font size="+1"><b>Cuffed Short Sleeves</b></font></label>
              </p>
            </div>

          </div> 

          <div class="divider dashed" style="height:2px;"></div>

          <div class="col s12" style="margin-top:20px;">
            <div class="col s3" style="padding-left:20px;"><h5><b>Contrast Cuffs</b></h5></div>
            <div class="col s6" style="padding-left:20px;"><h5><b>Inside fabric for collar & cuffs</b></h5></div>
            <div class="col s3" style="padding-left:20px;"><h5><b>Select Cufflinks</b></h5></div>
          </div>

          <div class="col s12">

            <div class="col s3" style="padding:20px;">
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <div><a class="btn-flat teal accent-4 white-text" href="{{URL::to('/customize-womens-fabric')}}"><font size="+1">Select Fabric</font></a></div>
            </div>             

            <div class="col s6" style="padding:20px;">
              <div class="col s6"><img class="materialboxed responsive-img" src="img/fabric.jpg"></div>
              <div class="col s6"><img class="materialboxed responsive-img" src="img/fabric.jpg"></div>
              <div class="col s12"><a class="btn-flat teal accent-4 white-text" href="{{URL::to('/customize-womens-fabric')}}"><font size="+1">Select Fabric</font></a></div>
            </div> 

            <div class="col s3" style="padding:20px;">
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <div><a class="btn-flat teal accent-4 white-text" href="{{URL::to('/customize-womens-fabric')}}"><font size="+1">Select Cufflinks</font></a></div>
            </div> 

          </div>

          <div class="col s12 divider" style="height:4px; margin-bottom:10px;"></div>
          <div class="col s12">
            <div><a class="right btn-flat teal accent-4 white-text" href="tabButtons">Next step</a></div>
            <div><a class="left btn-flat teal accent-4 white-text" href="tabCollar">Previous step</a></div>
          </div>

        </div>
        <!--END OF CUFFS TAB-->

        <!--BUTTONS TAB-->
        <div id="tabButtons" class="col s12 white" style="padding:20px; border 2px teal accent-4 white-text;">
          
          <div class="col s12">
            <div><a class="right btn-flat teal accent-4 white-text" href="tabPocketMonogram">Next step</a></div>
            <div><a class="left btn-flat teal accent-4 white-text" href="tabCuffs">Previous step</a></div>
          </div>
          <div class="col s12 divider" style="height:4px; margin-top:10px;"></div>

          <div class="col s12" style="padding:20px;"><h4>3. Buttons</h4></div>

          <div class="col s12" style="margin-top:20px;">

            <div class="col s2">
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <p>
                <input class="with-gap" name="classic" type="radio" id="small" />
                <label for="small"><font size="+1"><b>Cuffed Short Sleeves</b></font></label>
              </p>
            </div>

          </div> 

          <div class="divider dashed" style="height:2px;"></div>

          <div class="col s12" style="margin-top:20px;">
            <div class="col s6" style="padding-left:20px;"><h5><b>Coloured Button Threads</b></h5></div>
            <div class="col s6" style="padding-left:20px;"><h5><b>Coloured Buttonholes</b></h5></div>
          </div>

          <div class="col s12">

            <div class="col s3" style="padding:40px;">
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
            </div> 

            <div class="col s2" style="padding:20px;">
              <p>Would you like coloured button threads?</p>
              <div class="input-field" style="margin-top:70px;">
                <select class="browser-default">
                  <option value="" disabled selected>Choose your option</option>
                  <option value="1">Option 1</option>
                  <option value="2">Option 2</option>
                </select>
              </div>             
            </div>

            <div class="col s3" style="padding:40px;">
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
            </div>             

            <div class="col s2" style="padding:20px;">
              <p>Would you like coloured buttonholes?</p>
              <div class="input-field" style="margin-top:70px;">
                <select class="browser-default">
                  <option value="" disabled selected>Choose your option</option>
                  <option value="1">Option 1</option>
                  <option value="2">Option 2</option>
                </select>
              </div>             
            </div>            

          </div>

          <div class="col s12 divider" style="height:4px; margin-bottom:10px;"></div>
          <div class="col s12">
            <div><a class="right btn-flat teal accent-4 white-text" href="tabPocketMonogram">Next step</a></div>
            <div><a class="left btn-flat teal accent-4 white-text" href="tabCuffs">Previous step</a></div>
          </div>

        </div>
        <!--END OF BUTTONS TAB-->

        <!--POCKETS & MONOGRAM TAB-->
        <div id="tabPocketMonogram" class="col s12 white" style="padding:20px; border 2px teal accent-4 white-text;">
          
          <div class="col s12">
            <div><a class="right btn-flat teal accent-4 white-text" href="tabOthers">Next step</a></div>
            <div><a class="left btn-flat teal accent-4 white-text" href="tabButtons">Previous step</a></div>
          </div>
          <div class="col s12 divider" style="height:4px; margin-top:10px;"></div>

          <div class="col s12" style="padding:20px;"><h4>4.Pockets</h4></div>

          <div class="col s12">
            <p>
              <input class="with-gap" name="classic" type="radio" id="small" />
              <label for="small"><font size="+1"><b>No Pocket</b></font></label>
            </p>
          </div>

          <div class="col s12" style="margin-top:20px;">

            <div class="col s2">
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <p>
                <input class="with-gap" name="classic" type="radio" id="small" />
                <label for="small"><font size="+1"><b>Cuffed Short Sleeves</b></font></label>
              </p>
            </div>

          </div> 

          <div class="col s12" style="margin-top:20px;">
            
            <div class="col s3" style="padding:20px;">
              <h5><b>Contrast Pocket</b></h5>
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <div><a class="btn-flat teal accent-4 white-text" href="{{URL::to('/customize-womens-fabric')}}"><font size="+1">Select Fabric</font></a></div>
            </div>

            <div class="col s3" style="padding:20px;">
              <h5><b>Contrast Pocket Flap</b></h5>
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <div><a class="btn-flat teal accent-4 white-text" href="{{URL::to('/customize-womens-fabric')}}"><font size="+1">Select Fabric</font></a></div>
            </div> 
                       
          </div>

          <div class="col s12" style="padding:20px;"><h4>5. Monogram</h4></div>

          <div class="col s12">
            <p>
              <input class="with-gap" name="classic" type="radio" id="small" />
              <label for="small"><font size="+1"><b>No Monogram</b></font></label>
            </p>
          </div>

          <div class="col s12" style="margin-top:20px;">

            <div class="col s2">
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <p>
                <input class="with-gap" name="classic" type="radio" id="small" />
                <label for="small"><font size="+1"><b>Cuffed Short Sleeves</b></font></label>
              </p>
            </div>

          </div> 

          <div class="col s12" style="padding:20px;"><h4>Monogram Position</h4></div>

          <div class="col s12" style="margin-top:20px;">

            <div class="col s2">
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <p>
                <input class="with-gap" name="classic" type="radio" id="small" />
                <label for="small"><font size="+1"><b>Cuffed Short Sleeves</b></font></label>
              </p>
            </div>

            <div class="col s2">
              <div class="input-field" style="margin-top:100px;">
                <input placeholder="Monogram Position" id="position" type="text" class="validate">
              </div>
              <p>
                <input class="with-gap" name="classic" type="radio" id="small" />
                <label for="small"><font size="+1"><b>Other Position</b></font></label>
              </p>              
            </div>

          </div>

          <div class="col s12" style="margin-top:20px;">

            <div class="input-field col s4">
              <input id="monogram" type="text" class="validate">
              <label for="monogram"><b>Enter your monogram:</b></label>
            </div>

            <div class="col s8">
              <p>(15 characters at most. Our standard monogram size is 10mm. If you want to change the size, please leave messages as monogram comment - note that our tailor will have to decide on the monogram size that will match the fabric choosen.)</p>
            </div>

          </div>

          <div class="col s12">

            <div class="input-field col s4">
              <select class="browser-default">
                <option value="" disabled selected>STANDARD</option>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
              </select>
              <label><b>Monogram Color</b></label>
            </div>

          </div>

          <div class="col s12">

            <div class="file-field input-field col s4">
              <div class="btn">
                <span>Upload photo</span>
                <input type="file">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
              </div>
            </div>

            <div class="col s8">
              <p>If you want to put logos instead of monograms, please email the logo to us or upload your logo here.</p>
            </div>

          </div>

          <div class="col s12">

            <div class="input-field col s4">
              <input id="comment" type="text" class="validate">
              <label for="comment"><b>Monogram comment:</b></label>
            </div>

            <div class="col s8">
              <p>Please add any comments you would like to make regarding your monogram.</p>
            </div>

          </div>

          <div class="col s12 divider" style="height:4px; margin-bottom:10px;"></div>
          <div class="col s12">
            <div><a class="right btn-flat teal accent-4 white-text" href="tabOthers">Next step</a></div>
            <div><a class="left btn-flat teal accent-4 white-text" href="tabButtons">Previous step</a></div>
          </div>

        </div>
        <!--END OF POCKETS & MONOGRAM-->

        <!--OTHERS TAB-->
        <div id="tabOthers" class="col s12 white" style="padding:20px; border 2px teal accent-4 white-text;">
          
          <div class="col s12">
            <div><a class="right btn-flat teal accent-4 white-text" href="{{URL::to('/online-order-now')}}">Go to Shopping Cart</a></div>
            <div><a class="left btn-flat teal accent-4 white-text" href="tabPocketMonogram">Previous step</a></div>
          </div>
          <div class="col s12 divider" style="height:4px; margin-top:10px;"></div>

          <div class="col s12" style="padding:20px;"><h4>6. Front</h4></div>

          <div class="col s12" style="margin-top:20px;">

            <div class="col s2">
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <p>
                <input class="with-gap" name="classic" type="radio" id="small" />
                <label for="small"><font size="+1"><b>No Placket</b></font></label>
              </p>
            </div>

            <div class="col s2">
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <p>
                <input class="with-gap" name="classic" type="radio" id="small" />
                <label for="small"><font size="+1"><b>Placket</b></font></label>
              </p>
            </div>

            <div class="col s2">
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <p>
                <input class="with-gap" name="classic" type="radio" id="small" />
                <label for="small"><font size="+1"><b>Covered Placket</b></font></label>
              </p>
            </div>                        

          </div> 

          <div class="col s12" style="margin-top:20px;">
            
            <div class="col s3" style="padding:20px;">
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <p>Inside Placket Lining<br>Button Side</p>
              <div><a class="btn-flat teal accent-4 white-text" href="{{URL::to('/customize-womens-fabric')}}"><font size="+1">Select Fabric</font></a></div>
            </div>

            <div class="col s3" style="padding:20px;">
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <p>Inside Placket Lining<br>Buttonhole Side</p>
              <div><a class="btn-flat teal accent-4 white-text" href="{{URL::to('/customize-womens-fabric')}}"><font size="+1">Select Fabric</font></a></div>
            </div> 
                       
          </div>

          <div class="col s12" style="margin-top:20px;">

            <div class="col s3">
              <h4>7. Tuxedo</h4>
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <p>
                <input class="with-gap" name="classic" type="radio" id="small" />
                <label for="small"><font size="+1"><b>Cuffed Short Sleeves</b></font></label>
              </p>
            </div>

            <div class="col s3">
              <h4>8. Epaulettes</h4>
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <div><a class="btn-flat teal accent-4 white-text" href="{{URL::to('/customize-womens-fabric')}}"><font size="+1">Select Fabric</font></a></div>
            </div>

            <div class="col s3">
              <h4>9. Back Split</h4>
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <p>
                <input class="with-gap" name="classic" type="radio" id="small" />
                <label for="small"><font size="+1"><b>Cuffed Short Sleeves</b></font></label>
              </p>
            </div>

          </div>

          <div class="col s12" style="margin-top:20px;">
            <h4>10. Back</h4>

            <div class="col s2">
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <p>
                <input class="with-gap" name="classic" type="radio" id="small" />
                <label for="small"><font size="+1"><b>Cuffed Short Sleeves</b></font></label>
              </p>
            </div>

          </div>           

          <div class="col s12" style="margin-top:20px;">
            <h4>11. Bottom</h4>

            <div class="col s2">
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <p>
                <input class="with-gap" name="classic" type="radio" id="small" />
                <label for="small"><font size="+1"><b>Cuffed Short Sleeves</b></font></label>
              </p>
            </div>

          </div>

          <div class="col s12" style="margin-top:20px;">

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

          </div>

          <div class="col s12 divider" style="height:4px; margin-bottom:10px;"></div>
          <div class="col s12">
            <div><a class="right btn-flat teal accent-4 white-text" href="{{URL::to('/online-order-now')}}">Go to Shopping Cart</a></div>
            <div><a class="left btn-flat teal accent-4 white-text" href="tabPocketMonogram">Previous step</a></div>
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
