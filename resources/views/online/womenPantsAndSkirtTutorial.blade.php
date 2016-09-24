@extends('layouts.masterOnline')

@section('content')

  <div class="container">
  
    <div align = "center">
      <div style= "height:10px"></div>
           <div class="container" style="margin:80px">
            <h3 style="color:grey;">Women's Pants and Skirt Measurement Tutorial</h3>
          </div>
    </div>

 
  <div class="row">
              <div class="col s12 left">
                <ul class="tabs">
                  <li class="tab col s3"><a href="#tutorialVideos">Videos</a></li>
                  <li class="tab col s3"><a href="#tutorialImages">Images</a></li>
                </ul>
              </div>
  </div>


  <!--Tutorial Videos-->
  <div id="tutorialVideos">
    <h2 align="center" style="margin-top:80px">Seat</h2>
    <p style="left-align; text-align:center;">
           The seat measurement is a circumferential measurement taken around the seat at your widest point.
    </p>
    <div class="container">
        <div class="video-container">
            <iframe width="540" height="200" src="vidOnlineTutorial/Seat_Women.mp4" frameborder="0" allowfullscreen></iframe>
        </div>    
    </div>
    
  
    <h2 align="center" style="margin-top:80px">Hip</h2>
    <p style="left-align; text-align:center;">
         The hip measurement is taken as a circumference measurement around your hips at the widest part.
    </p>
    <div class="container">
        <div class="video-container">
            <iframe width="540" height="200" src="vidOnlineTutorial/Hip_Women.mp4" frameborder="0" allowfullscreen></iframe>
        </div>    
    </div>
    

    <div style="margin-bottom:200px;">
      <a class="left btn-flat tooltipped modal-trigger" data-position="bottom" data-delay="50" data-tooltip="Click to go back" style="font-size:15px; color:white; background-color: teal; opacity:0.90" href="{{URL::to('/online-measuring-tutorial')}}"><i class="mdi-content-reply"> BACK</i></a>
      <a type="submit" class="right btn-flat tooltipped modal-trigger" data-position="bottom" data-delay="50" data-tooltip="Click to save measurements" style="background-color: teal; font-size:15px; color:white" href="#savemodal"><i class="mdi-content-save"> SAVE</i></a>              
    </div>    
  </div>


<!--Tutorial Images-->
<div id="tutorialImages">
    <h2 align="center" style="margin-top:80px">Seat</h2>
    <p style="left-align; text-align:center;">
      The seat measurement is a circumferential measurement taken around the seat at your widest point
    </p>
    <div class="container" align="center" >
        <img class="responsive-img hoverable" height="200" width="600" src="imgOnlineTutorial/womens_seat.JPG">
    </div>
      

    <h2 align="center" style="margin-top:80px">Hip</h2>
    <p style="left-align; text-align:center;">
        The hip measurement is a circumferential measurement.
        <br>
        <b>NOTE!</b> please measure directly on the body i.e. not outside of the garment or on top of a belt.
    </p>
    <div class="container" align="center" >
        <img class="responsive-img hoverable" height="200" width="600" src="imgOnlineTutorial/womens_hip.JPG">
    </div>
    

    <div style="margin-bottom:200px;">
      <a class="left btn-flat tooltipped modal-trigger" data-position="bottom" data-delay="50" data-tooltip="Click to go back" style="font-size:15px; color:white; background-color: teal; opacity:0.90" href="{{URL::to('/online-measuring-tutorial')}}"><i class="mdi-content-reply"> BACK</i></a>
      <a type="submit" class="right btn-flat tooltipped modal-trigger" data-position="bottom" data-delay="50" data-tooltip="Click to save measurements" style="background-color: teal; font-size:15px; color:white" href="#savemodal"><i class="mdi-content-save"> SAVE</i></a>              
    </div>  

</div>


</div>


  <!--Save Modal-->
  <div id="savemodal" class="modal modal-fixed-footer" style="font-family:'Philosopher',sans-serif; height:250px; width:500px; margin-top:150px">
    <h5><font color="green"><center><b>Saved!</b></center></font></h5>
    <div class="divider" style="height:2px"></div>
    <div class="modal-content">
      <div class="row container">
        <center><p><font size="+1">Measurements has been saved.  <i class="mdi-image-tag-faces"></i></font></p></center>
      </div>
    </div>
    <div class="modal-footer col s12" style="background-color:green; opacity:0.85">
      <a class="modal-action modal-close waves-effect waves-green btn-flat" href="#!"><font color="black">Close</font></a>
        </div>
  </div>  
    @stop

@section('scripts')  
    <script>
    $(document).ready(function(){

    });
    </script>
@stop   