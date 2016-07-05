@extends('layouts.masterOnline')


@section('content')

<div class="section container white row" style="padding:20px; width:95%; margin-top:20px; margin-bottom:20px;">
  
  <div class="row" style="margin-top:40px;">
    <div class="col s12">
      <div class="col s4">
        <div class="divider grey" style="margin-bottom:5px;"></div>
        <div class="divider grey"></div>
      </div>

      <div class="col s4" style="margin-top:-30px;">
        <center><span style="font-size:40px; color: #757575; font-family:'Playfair Display','Times';">Customize Order</span></center>
      </div>

      <div class="col s4">
        <div class="divider grey" style="margin-bottom:5px;"></div>
        <div class="divider grey"></div>
      </div>
    </div>
  </div>

  <div class="col s12" style="margin-top:20px;">

      <div class="col s6 container">
        <center><img src="{{URL::to('imgOnlineUniform/male-uniform-plain.jpg')}}" style="height:350px; width:350px; border: 3px gray solid"></center>
      </div>

      <div class="col s6">

        <div class="col s6" style="margin-bottom:30px">
          <label>Choose your design:</label>
          <div class="file-field input-field">
            <a style="color:black" class="modal-trigger btn tooltipped btn-floating teal" data-position="bottom" data-delay="50" data-tooltip="Click to choose a segment pattern" href="#editDesign"><i class="mdi-editor-mode-edit"></i></a>
          </div>
        </div>
  
        <div class="col s6" style="margin-bottom:30px">
          <label>Choose your fabric:</label>
          <div class="file-field input-field">  
            <a style="color:black" class="modal-trigger btn tooltipped btn-floating teal" data-position="bottom" data-delay="50" data-tooltip="Click to choose a fabric" href="#editFabric"><i class="mdi-editor-mode-edit"></i></a>
          </div>
        </div>

        <!--Garment Description Here-->
        <div class="col s12" style="margin-top:10px; color:gray"><p>Garment description below:</p></div>
          <div class="col s12" style="margin-left:130px">
            <div class="col s4" style="color:teal;"><p><b>Garment Category:</b></p></div>
            <div class="col s8"><p>Uniform</p></div>

            <div class="col s4" style="color:teal;"><p><b>Garment Segment:</b></p></div>
            <div class="col s8"><p>Polo</p></div>

            <div class="col s4" style="color:teal;"><p><b>Price starts from:</b></p></div>
            <div class="col s8" style="color:red"><p>800.00 PHP</p></div>
          </div>

      </div>

  </div>

    <div class="col s12">
      
      <div class="divider" style="margin-bottom:20px; margin-top:40px;"></div>

      <a class="waves-effect waves-green btn-flat white-text" style="background-color:teal; margin-right:30px" href="{{URL::to('/online-order-now')}}">CANCEL</a>
      <a class="right waves-effect waves-green btn-flat white-text modal-trigger" href="#savemodal" style="background-color:teal">SAVE</a>
    </div>

           
</div>


  <!--MODAL FOR design-->
  <div id="editDesign" class="modal modal-fixed-footer">
    
    <div class="modal-content row">

    <h5><font color = "#1b5e20"><center>List of Available Designs</center> </font> </h5>
    <div class="divider" style="height:2px; margin-bottom:40px;"></div>

      <div class="input-field row">
        <div class="col s1"><i class="small mdi-action-search"></i></div>
        <div class="col s11">
          <input id="search" type="search" placeholder="Search for any available designs (ex. slim-fit, etc..)">
          <label for="search"></label>
        </div>
      </div>

      <div class="col s12">
        <div class="col s1" style="margin-top:60px">
          <input name="garmentDesigns" type="radio" class="filled-in" id="pattern1" />
          <label for="pattern1"></label>
        </div>
        <div class="col s11">
          <div class="card-panel grey lighten-5 z-depth-1">
            <div class="row valign-wrapper">

              <div class="col s4">
                <img src="#!" alt="" class="circle responsive-img">
              </div>
              <div class="col s7"> 
                <p>STRAIGHT-CUT</p>
                <span class="black-text">
                  This is a square image. Add the "circle" class to it to make it appear circular.
                </span>
              </div>

            </div>
          </div>
        </div>
      </div>

      <div class="col s12">
        <div class="col s1" style="margin-top:60px">
          <input name="garmentDesigns" type="radio" class="filled-in" id="pattern2" />
          <label for="pattern2"></label>
        </div>
        <div class="col s11">
          <div class="card-panel grey lighten-5 z-depth-1">
            <div class="row valign-wrapper">
              <div class="col s4">
                <img src="#!" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
              </div>
              <div class="col s7">
                <p>SPECIAL PATTERN</p>
                <span class="black-text">
                  This is a square image. Add the "circle" class to it to make it appear circular.
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col s12">
        <div class="col s1" style="margin-top:60px">
          <input name="garmentDesigns" type="radio" class="filled-in" id="pattern3" />
          <label for="pattern3"></label>
        </div>
        <div class="col s11">
          <div class="card-panel grey lighten-5 z-depth-1">
            <div class="row valign-wrapper">
              <div class="col s4">
                <img src="#!" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
              </div>
              <div class="col s7">
                <p>JUST ANOTHER PATTERN</p>
                <span class="black-text">
                  This is a square image. Add the "circle" class to it to make it appear circular.
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="modal-footer">
      <a href="#!" class="right waves-effect waves-green btn-flat">OK</a>
      <a href="#!" class="right modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
    </div>
  </div>

  <!--MODAL FOR fabric-->
  <div id="editFabric" class="modal modal-fixed-footer">
   
    <div class="modal-content row">

    <h5><font color = "#1b5e20"><center>List of Available Fabrics</center> </font> </h5>
    <div class="divider" style="height:2px; margin-bottom:40px;"></div>

      <div class="input-field row">
        <div class="col s1"><i class="small mdi-action-search"></i></div>
        <div class="col s11">
          <input id="search" type="search" placeholder="Search for any available fabrics (ex. cotton, etc..)">
          <label for="search"></label>
        </div>
      </div>

      <div class="col s12">
        <div class="col s1" style="margin-top:60px">
          <input name="garmentDesigns" type="radio" class="filled-in" id="pattern1" />
          <label for="pattern1"></label>
        </div>
        <div class="col s11">
          <div class="card-panel grey lighten-5 z-depth-1">
            <div class="row valign-wrapper">

              <div class="col s4">
                <img src="#!" alt="" class="circle responsive-img">
              </div>
              <div class="col s7"> 
                <p>COTTON CHENES</p>
                <span class="black-text">
                  This is a square image. Add the "circle" class to it to make it appear circular.
                </span>
              </div>

            </div>
          </div>
        </div>
      </div>

      <div class="col s12">
        <div class="col s1" style="margin-top:60px">
          <input name="garmentDesigns" type="radio" class="filled-in" id="pattern2" />
          <label for="pattern2"></label>
        </div>
        <div class="col s11">
          <div class="card-panel grey lighten-5 z-depth-1">
            <div class="row valign-wrapper">
              <div class="col s4">
                <img src="#!" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
              </div>
              <div class="col s7">
                <p>REGULAR COTTON</p>
                <span class="black-text">
                  This is a square image. Add the "circle" class to it to make it appear circular.
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col s12">
        <div class="col s1" style="margin-top:60px">
          <input name="garmentDesigns" type="radio" class="filled-in" id="pattern3" />
          <label for="pattern3"></label>
        </div>
        <div class="col s11">
          <div class="card-panel grey lighten-5 z-depth-1">
            <div class="row valign-wrapper">
              <div class="col s4">
                <img src="#!" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
              </div>
              <div class="col s7">
                <p>REMARKABLE COTTON</p>
                <span class="black-text">
                  This is a square image. Add the "circle" class to it to make it appear circular.
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="modal-footer">
      <a href="#!" class="right waves-effect waves-green btn-flat">OK</a>
      <a href="#!" class="right modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
    </div>
  </div>

  <!--Save Modal-->
  <div id="savemodal" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:150px">
    <h5><font color="green"><center><b>Save Changes?</b></center></font></h5>
    <div class="divider" style="height:2px"></div>
    <div class="modal-content">
      <div class="row">
        <div class="col s3">
          <i class="mdi-alert-warning" style="font-size:50px; color:yellow"></i>
        </div>
        <div class="col s9">
          <p><font size="+1">Are you sure you want to save the changes made?</font></p>
        </div>
      </div>
    </div>
    <div class="modal-footer col s12" style="background-color:green; opacity:0.85">
      <a class="modal-action modal-close waves-effect waves-green btn-flat" href="#!"><font color="black">Cancel</font></a>
            <a class="modal-action modal-close waves-effect waves-green btn-flat" href="{{URL::to('/online-order-now')}}"><font color="black">No</font></a>
            <a class="modal-action modal-close waves-effect waves-green btn-flat" href="{{URL::to('/online-order-now')}}"><font color="black">Yes</font></a>
        </div>
  </div>
@stop


@section('scripts')

  <script>
    $('.modal-trigger').leanModal({
        dismissible: true, // Modal can be dismissed by clicking outside of the modal
        opacity: .5, // Opacity of modal background
        in_duration: 300, // Transition in duration
        out_duration: 200, // Transition out duration
        width:400,
      }
    );
  </script>

  <script>
    $(document).ready(function() {
      $('select').material_select();
    });
  </script>         

  <script>
   $(document).ready(function(){
    $('.tooltipped').tooltip({delay: 50});
   });
  </script>

@stop