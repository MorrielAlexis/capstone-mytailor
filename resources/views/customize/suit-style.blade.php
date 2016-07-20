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
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab active"><a style="color:black" href="#tabJacket">Jacket Style</a></li>
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab"><a style="color:black" href="#tabCollarPocket">Jacket Collar & Pockets</a></li>
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab"><a style="color:black" href="#tabPants">Pants Style</a></li>
          <li style="background:#00b0ff; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab"><a style="color:black" href="#tabMonogram">Monogram</a></li>
          <div class="indicator white" style="z-index:1"></div>
        </ul>

        <!--JACKET TAB-->
        <div id="tabJacket" class="col s12 white" style="padding:20px; border 2px teal accent-4 white-text;">

          <div class="col s12"><a class="btn-flat right teal accent-4 white-text" href="tabCollarPocket">Next step</a></div>
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

          <div class="col s12" style="padding:20px;"><h5><b>Single Breasted</b></h5></div>
          <div class="col s12">

            <div class="col s2">
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <p>
                <input class="with-gap" name="classic" type="radio" id="small" />
                <label for="small"><font size="+1"><b>Classic Small</b></font></label>
              </p>
            </div>

          </div>

          <div class="col s12" style="padding:20px;"><h5><b>Double Breasted</b></h5></div>
          <div class="col s12">

            <div class="col s2">
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <p>
                <input class="with-gap" name="classic" type="radio" id="small" />
                <label for="small"><font size="+1"><b>Classic Small</b></font></label>
              </p>
            </div>

          </div>

          <div class="col s12" style="padding:20px;"><h5><b>Jacket Bottom</b></h5></div>
          <div class="col s12">

            <div class="col s2">
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <p>
                <input class="with-gap" name="classic" type="radio" id="small" />
                <label for="small"><font size="+1"><b>Classic Small</b></font></label>
              </p>
            </div>

          </div>

          <div class="col s12" style="padding:20px;"><h5><b>Vents</b></h5></div>
          <div class="col s12">

            <div class="col s2">
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <p>
                <input class="with-gap" name="classic" type="radio" id="small" />
                <label for="small"><font size="+1"><b>No Vent</b></font></label>
              </p>
            </div>

          </div>

          <div class="col s12" style="padding:20px;">
            <div class="col s6"><h5><b>Contrast Lapel</b></h5></div>
          </div>
          <div class="col s12">

            <div class="col s3">
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <label><a class="btn teal accent-4 white-text" href="{{URL::to('/customize-suit-fabric')}}"><font size="+1">Select Fabric</font>
                \</a></label>
            </div>

          </div>

          <div class="col s12 divider" style="height:4px; margin-bottom:10px;"></div>
          <div class="col s12"><a class="btn-flat right teal accent-4 white-text" href="tabCollarPocket">Next step</a></div>
  
        </div>
        <!--END OF JACKET TAB-->

        <!--COLLAR & POCKET TAB-->
        <div id="tabCollarPocket" class="col s12 white" style="padding:20px; border 2px teal accent-4 white-text;">
    
          <div class="col s12">
            <div><a class="right btn-flat teal accent-4 white-text" href="">Continue</a></div>
            <div><a class="left btn-flat teal accent-4 white-text" href="tabJacket">Previous step</a></div>
          </div>
          <div class="col s12 divider" style="height:4px; margin-top:10px;"></div>
    
          <div class="col s12" style="padding:20px;"><h5><b>Jacket Collar</b></h5></div>
          <div class="col s12">

            <div class="col s2">
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <p>
                <input class="with-gap" name="classic" type="radio" id="small" />
                <label for="small"><font size="+1"><b>Classic Small</b></font></label>
              </p>
            </div>

          </div>

          <div class="col s12" style="padding:20px;"><h5><b>Chest Pocket</b></h5></div>
          <div class="col s12">

            <div class="col s2">
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <p>
                <input class="with-gap" name="classic" type="radio" id="small" />
                <label for="small"><font size="+1"><b>Classic Small</b></font></label>
              </p>
            </div>

          </div>

          <div class="col s12" style="padding:20px;"><h5><b>Jacket Pockets</b></h5></div>
          <div class="col s12">

            <div class="col s2">
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <p>
                <input class="with-gap" name="classic" type="radio" id="small" />
                <label for="small"><font size="+1"><b>Classic Small</b></font></label>
              </p>
            </div>

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
              <div class="input-field" style="margin-top:70px;">
                <select class="browser-default">
                  <option value="" disabled selected>Choose your option</option>
                  <option value="1">Option 1</option>
                  <option value="2">Option 2</option>
                </select>
              </div>
              <h5><b>Buttonhole Color</b></h5>
              <p>Would you like buttonhole color? (cuffs only)</p>
              <div class="input-field" style="margin-top:70px;">
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
            <div><a class="right btn-flat teal accent-4 white-text" href="">Continue</a></div>
            <div><a class="left btn-flat teal accent-4 white-text" href="tabJacket">Previous step</a></div>
          </div>

        </div>
        <!--END OF COLLAR & POCKET TAB-->

        <!--PANTS TAB-->
        <div id="tabPants" class="col s12 white" style="padding:20px; border 2px teal accent-4 white-text;">

          <div class="col s12">
            <div><a class="right btn-flat teal accent-4 white-text" href="tabMonogram">Next step</a></div>
            <div><a class="left btn-flat teal accent-4 white-text" href="tabCollarPocket">Previous step</a></div>
          </div>
          <div class="col s12 divider" style="height:4px; margin-top:10px;"></div>
    
          <div class="col s12" style="padding:20px;"><h5><b>Pant's Pleats</b></h5></div>
          <div class="col s12">

            <div class="col s2">
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <p>
                <input class="with-gap" name="classic" type="radio" id="small" />
                <label for="small"><font size="+1"><b>No Pleat</b></font></label>
              </p>
            </div>

          </div>

          <div class="col s12" style="padding:20px;"><h5><b>Pant's Pockets</b></h5></div>
          <div class="col s12">

            <div class="col s2">
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <p>
                <input class="with-gap" name="classic" type="radio" id="small" />
                <label for="small"><font size="+1"><b>Classic Small</b></font></label>
              </p>
            </div>

          </div> 

          <div class="col s12" style="padding:20px;"><h5><b>BackPockets</b></h5></div>
          <div class="col s12">

            <div class="col s2">
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <p>
                <input class="with-gap" name="classic" type="radio" id="small" />
                <label for="small"><font size="+1"><b>Classic Small</b></font></label>
              </p>
            </div>

          </div> 

          <div class="col s12" style="padding:20px;"><h5><b>Pants Bottom</b></h5></div>
          <div class="col s12">

            <div class="col s2">
              <img class="materialboxed responsive-img" src="img/fabric.jpg">
              <p>
                <input class="with-gap" name="classic" type="radio" id="small" />
                <label for="small"><font size="+1"><b>Classic Small</b></font></label>
              </p>
            </div>

          </div>

          <div class="col s12" style="margin-top:20px;">
            
            <div class="col s3">
              <h5><b>Additional Pants</b></h5>
              <div class="input-field" style="margin-top:70px;">
                <select class="browser-default">
                  <option value="" disabled selected>Choose your option</option>
                  <option value="1">Option 1</option>
                </select>
              </div>
              <p>You can order two pants with the same characteristics.</p>
          </div>


          <div class="col s12 divider" style="height:4px; margin-bottom:10px;"></div>
          <div class="col s12">
            <div><a class="right btn-flat teal accent-4 white-text" href="tabMonogram">Next step</a></div>
            <div><a class="left btn-flat teal accent-4 white-text" href="tabCollarPocket">Previous step</a></div>
          </div>

        </div>
        <!--END OF PANTS TAB-->

        <!--MONOGRAM TAB-->
        <div id="tabMonogram" class="col s12 white" style="padding:20px; border 2px teal accent-4 white-text;">

          <div class="col s12">
            <div><a class="right btn-flat teal accent-4 white-text" href="{{URL::to('/customize-checkout-info')}}">Proceed to Checkout</a></div>
            <div><a class="left btn-flat teal accent-4 white-text" href="">Previous step</a></div>
          </div>
          <div class="col s12 divider" style="height:4px; margin-top:10px;"></div>

            <div class="col s12" style="margin-top:20px;">

              <h5><b>Monogram</b></h5>
              <div class="col s2">
                <p>
                  <input class="with-gap" name="classic" type="radio" id="small" />
                  <label for="small"><font size="+1"><b>No Monogram</b></font></label>
                </p>
              </div>

              <div class="col s2">
                <img class="materialboxed responsive-img" src="img/fabric.jpg">
                <p>
                  <input class="with-gap" name="classic" type="radio" id="small" />
                  <label for="small"><font size="+1"><b>Cuffed Short Sleeves</b></font></label>
                </p>
              </div>

            </div> 

            <div class="col s12" style="margin-top:20px;">
              <h5><b>Monogram Position</b></h5>

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
                <input id="monogram" type="text" class="validate"/>
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
                <input id="comment" type="text" class="validate"/>
                <label for="comment"><b>Monogram comment:</b></label>
              </div>

              <div class="col s8">
                <p>Please add any comments you would like to make regarding your monogram.</p>
              </div>

            </div>


          <div class="col s12 divider" style="height:4px; margin-bottom:10px;"></div>
          <div class="col s12">
            <div><a class="right btn-flat teal accent-4 white-text" href="{{URL::to('/customize-checkout-info')}}">Proceed to Checkout</a></div>
            <div><a class="left btn-flat teal accent-4 white-text" href="">Previous step</a></div>
          </div>

        </div>
        <!--END OF MONOGRAM TAB-->

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
