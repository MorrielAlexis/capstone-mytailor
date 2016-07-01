@extends('layouts.masterOnline')

@section('content')

  <div class="container">
  
    <div align = "center">
      <div style= "height:10px"></div>
           <div class="container" style="margin:80px">
            <h3 style="color:white;">Men's Pants Measurement Tutorial</h3>
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
    <p style="left-align; text-align:center">
           The seat measurement is a circumferential measurement taken around the seat at your widest point.
    </p>
    <div class="container">
        <div class="video-container">
            <!--<iframe width="540" height="200" src="http://www.youtube.com/embed/1nbJmMHgHQo" frameborder="0" allowfullscreen></iframe>-->
            <iframe width="540" height="200" src="vidOnlineTutorial/Seat_Men.mp4" frameborder="0" allowfullscreen></iframe>
        </div>    
    </div>
    <center>
        <div class="input-field col s16" style="width:250px; margin-bottom:80px; margin-top:30px">
              <input id="seat_measure" type="text" style="align:center" class="validate">
              <label for="seat_measure">Input Measurement</label>
        </div>
    </center>

    
    <div class="divider" style="background-color:teal;"></div>

  
    <h2 align="center" style="margin-top:80px">Hip</h2>
    <p style="left-align; text-align:center">
         The hip measurement is a circumferential measurement. 
         <br>
         <b>NOTE!</b> please measure directly on the body i.e.
         not outside of the garment or on top of a belt.
    </p>
    <div class="container">
        <div class="video-container">
            <!--<iframe width="540" height="200" src="http://www.youtube.com/embed/Spk9gp-XqDQ" frameborder="0" allowfullscreen></iframe>-->
            <iframe width="540" height="200" src="vidOnlineTutorial/Waist_Men.mp4" frameborder="0" allowfullscreen></iframe>
        </div>    
    </div>
    <center>
        <div class="input-field col s16" style="width:250px; margin-bottom:80px; margin-top:30px">
              <input id="hip_measure" type="text" style="align:center" class="validate">
              <label for="hip_measure">Input Measurement</label>
        </div>
    </center>


    <div class="divider" style="background-color:teal;"></div> 


    <h2 align="center" style="margin-top:80px">Inseam</h2>
    <p style="left-align; text-align:center">
          The inseam is measured from the crotch along the inner side of the leg to a point where you want 
         the hem of the trousers to end. 
         Stand upright, do not bend the leg and ask someone to help you take the measurement.
    </p>
    <div class="container">
        <div class="video-container">
           <!-- <iframe width="540" height="200" src="http://www.youtube.com/embed/OLgQbBUXyII" frameborder="0" allowfullscreen></iframe>-->
           <iframe width="540" height="200" src="vidOnlineTutorial/Inseam_Men.mp4" frameborder="0" allowfullscreen></iframe>
        </div>    
    </div>
    <center>
        <div class="input-field col s16" style="width:250px; margin-bottom:80px; margin-top:30px">
              <input id="inseam_measure" type="text" style="align:center" class="validate">
              <label for="inseam_measure">Input Measurement</label>
        </div>
    </center>


    <div class="divider" style="background-color:teal;"></div> 


    <h2 align="center" style="margin-top:80px">Inseam for Shorts</h2>
    <p style="left-align; text-align:center">
         The inseam for shorts is measured from the crotch along the inner side of the leg to a point where 
         you woudl like your shorts to end. Stand upright, do not bend the leg and ask someone to help you 
         take the measurement.
    </p>
    <div class="container">
        <div class="video-container">
           <!-- <iframe width="540" height="200" src="http://www.youtube.com/embed/UosmnJpqH10" frameborder="0" allowfullscreen></iframe>-->
           <iframe width="540" height="200" src="vidOnlineTutorial/Inseam Short-Men.mp4" frameborder="0" allowfullscreen></iframe>
        </div>    
    </div>
  <center>
        <div class="input-field col s16" style="width:250px; margin-bottom:80px; margin-top:30px">
              <input id="inseam_short_measure" type="text" style="align:center" class="validate">
              <label for="inseam_short_measure">Input Measurement</label>
        </div>
    </center>
  </div>

  <!--Tutorial Images-->
  <div id="tutorialImages">
    <h2 align="center" style="margin-top:80px">This is where the images should be</h2>


  </div>


</div>

    @stop

@section('scripts')  
    <script>
    $(document).ready(function(){

    });
    </script>
@stop   