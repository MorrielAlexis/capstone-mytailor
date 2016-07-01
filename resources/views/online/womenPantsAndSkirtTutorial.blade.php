@extends('layouts.masterOnline')

@section('content')

  <div class="container">
  
    <div align = "center">
      <div style= "height:10px"></div>
           <div class="container" style="margin:80px">
            <h3 style="color:white;">Women's Pants and Skirt Measurement Tutorial</h3>
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
            <iframe width="540" height="200" src="http://www.youtube.com/embed/9GYuh5EwhDs" frameborder="0" allowfullscreen></iframe>
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
         The hip measurement is taken as a circumference measurement around your hips at the widest part.
    </p>
    <div class="container">
        <div class="video-container">
            <iframe width="540" height="200" src="http://www.youtube.com/embed/lV7W7d9Y4TY" frameborder="0" allowfullscreen></iframe>
        </div>    
    </div>
    <center>
        <div class="input-field col s16" style="width:250px; margin-bottom:80px; margin-top:30px">
              <input id="hip_measure" type="text" style="align:center" class="validate">
              <label for="hip_measure">Input Measurement</label>
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