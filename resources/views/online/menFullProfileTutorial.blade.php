@extends('layouts.masterOnline')

@section('content')

  <div class="container">
  
    <div align = "center">
      <div style= "height:10px"></div>
           <div class="container" style="margin:80px">
            <h3 style="color:white;">Men's Full Profile Measurement Tutorial</h3>
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
  <!--Shirt Measurement-->
  <h2 align="center" style="margin-top:80px">Neck</h2>
    <p style="left-align; text-align:center">
           The neck measurement is taken around the neck with the tape resting on your shoulders. 
           You should put one finger between the tape and the neck if you want to allow for some extra room.
    </p>
    <div class="container">
        <div class="video-container">
            <!--<iframe width="540" height="200" src="http://www.youtube.com/embed/9ZKLgmnnNwI" frameborder="0" allowfullscreen></iframe>-->
            <iframe width="540" height="200" src="vidOnlineTutorial/Neck_Men.mp4" frameborder="0" allowfullscreen></iframe>
        </div>    
    </div>
    <center>
        <div class="input-field col s16" style="width:250px; margin-bottom:80px; margin-top:30px">
              <input id="neck_measure" type="text" class="validate">
              <label for="neck_measure">Input Measurement</label>
        </div>
    </center>
    
    <div class="divider" style="background-color:teal;"></div> 

  
    <h2 align="center" style="margin-top:80px">Chest</h2>
    <p style="left-align; text-align:center">
           The chest measurement is taken as a circumference measurement around your chest at the widest point. 
         Stand in a relaxed posture and breathe out.
    </p>
    <div class="container">
        <div class="video-container">
          <!--  <iframe width="540" height="200" src="http://www.youtube.com/embed/9dDa8TePCR8" frameborder="0" allowfullscreen></iframe>-->
          <iframe width="540" height="200" src="vidOnlineTutorial/Chest_Men.mp4" frameborder="0" allowfullscreen></iframe>
        </div>    
    </div>
     <center>
        <div class="input-field col s16" style="width:250px; margin-bottom:80px; margin-top:30px">
              <input id="chest_measure" type="text" style="align:center" class="validate">
              <label for="chest_measure">Input Measurement</label>
        </div>
    </center>


    <div class="divider" style="background-color:teal;"></div> 


    <h2 align="center" style="margin-top:80px">Arm Length</h2>
    <p style="left-align; text-align:center">
          The sleeve length measurement is taken from the point of your shoulder (where you took the shoulder width measurement), 
          following your bent arm down to where you want the sleeve to end.
          <br>
          <b>NOTE 1!</b> Bend your arm slightly when taking this measurement. 
          <br>
          <b>NOTE 2!</b> This measurement is always the full length of the arm. 
          For short sleeve and 3/4 sleeve you should still measure the full length of the arm
    </p>
    <div class="container">
        <div class="video-container">
          <!--  <iframe width="540" height="200" src="http://www.youtube.com/embed/6qHZNR6if1Y" frameborder="0" allowfullscreen></iframe>-->
          <iframe width="540" height="200" src="vidOnlineTutorial/ArmLength_Men.mp4" frameborder="0" allowfullscreen></iframe>
        </div>    
    </div>
     <center>
        <div class="input-field col s16" style="width:250px; margin-bottom:80px; margin-top:30px">
              <input id="arm_length_measure" type="text" style="align:center" class="validate">
              <label for="arm_length_measure">Input Measurement</label>
        </div>
    </center>


    <div class="divider" style="background-color:teal;"></div> 


    <h2 align="center" style="margin-top:80px">Shoulder</h2>
    <p style="left-align; text-align:center">
          Think of a line going from your armpit straight upwards to your shoulder. 
         Measure between those two points and hold the tape measure straight.
    </p>
    <div class="container">
        <div class="video-container">
           <!-- <iframe width="540" height="200" src="http://www.youtube.com/embed/6wyy_j6VHzw" frameborder="0" allowfullscreen></iframe>-->
           <iframe width="540" height="200" src="vidOnlineTutorial/ShoulderWidth_Men.mp4" frameborder="0" allowfullscreen></iframe>
        </div>    
    </div>
     <center>
        <div class="input-field col s16" style="width:250px; margin-bottom:80px; margin-top:30px">
              <input id="shoulder_measure" type="text" style="align:center" class="validate">
              <label for="shoulder_measure">Input Measurement</label>
        </div>
    </center>


    <div class="divider" style="background-color:teal;"></div>
    <div class="divider" style="background-color:teal;"></div> 


    <h2 align="center" style="margin-top:80px">Short Sleeve Length</h2>
    <p style="left-align; text-align:center">
         The short sleeve length measurement is taken from the point of your shoulder 
         (where you took the shoulder width measurement), down to where you want the short sleeve to end.
    </p>
    <div class="container">
        <div class="video-container">
           <!-- <iframe width="540" height="200" src="http://www.youtube.com/embed/H4g0kZk1hpE" frameborder="0" allowfullscreen></iframe>-->
           <iframe width="540" height="200" src="vidOnlineTutorial/ShortSleeve_Men.mp4" frameborder="0" allowfullscreen></iframe>
        </div>    
    </div>
     <center>
        <div class="input-field col s16" style="width:250px; margin-bottom:80px; margin-top:30px">
              <input id="short_sleeve_measure" type="text" style="align:center" class="validate">
              <label for="short_sleeve_measure">Input Measurement</label>
        </div>
    </center>


    <div class="divider" style="background-color:teal;"></div> 


    <h2 align="center" style="margin-top:80px">Biceps</h2>
    <p style="left-align; text-align:center">
         The biceps measurement is taken as a circumference measurement around your biceps.
         Relax the muscle and measure at the widest part of your upper arm.
    </p>
    <div class="container">
        <div class="video-container">
           <!-- <iframe width="540" height="200" src="http://www.youtube.com/embed/RoA_Rusd4Bg" frameborder="0" allowfullscreen></iframe>-->
           <iframe width="540" height="200" src="vidOnlineTutorial/Biceps_Men.mp4" frameborder="0" allowfullscreen></iframe>
        </div>    
    </div>
     <center>
        <div class="input-field col s16" style="width:250px; margin-bottom:80px; margin-top:30px">
              <input id="biceps_measure" type="text" style="align:center" class="validate">
              <label for="biceps_measure">Input Measurement</label>
        </div>
    </center>


     <div class="divider" style="background-color:teal;"></div> 


    <h2 align="center" style="margin-top:80px">Shirt/Piquet Polo Length</h2>
    <p style="left-align; text-align:center">
         The shirt/piqué polo length measurement is taken from the top of the shoulder, close to the mid side of your neck, 
         following your body down to the point where you want your shirt/piqué polos to end.
    </p>
    <div class="container">
        <div class="video-container">
            <!--<iframe width="540" height="200" src="http://www.youtube.com/embed/JXsmMN8S12k" frameborder="0" allowfullscreen></iframe>-->
            <iframe width="540" height="200" src="vidOnlineTutorial/ShirtPiquet_Men.mp4" frameborder="0" allowfullscreen></iframe>
        </div>    
    </div>
     <center>
        <div class="input-field col s16" style="width:250px; margin-bottom:80px; margin-top:30px">
              <input id="shirt_piquet_measure" type="text" style="align:center" class="validate">
              <label for="shirt_piquet_measure">Input Measurement</label>
        </div>
    </center>



     <div class="divider" style="background-color:teal;"></div> 


    <h2 align="center" style="margin-top:80px">Waist</h2>
    <p style="left-align; text-align:center">
         The waist measurement is taken as a circumference measurement around your waist just above your 
         belly button. Stand in a relaxed posture and breathe out.
    </p>
    <div class="container">
        <div class="video-container">
           <!-- <iframe width="540" height="200" src="http://www.youtube.com/embed/SK2fbnCKVJ0" frameborder="0" allowfullscreen></iframe>-->
           <iframe width="540" height="200" src="vidOnlineTutorial/Waist_Men.mp4" frameborder="0" allowfullscreen></iframe>
        </div>    
    </div>
     <center>
        <div class="input-field col s16" style="width:250px; margin-bottom:80px; margin-top:30px">
              <input id="waist_measure" type="text" style="align:center" class="validate">
              <label for="waist_measure">Input Measurement</label>
        </div>
    </center>


     <div class="divider" style="background-color:teal;"></div> 

     <h2 align="center" style="margin-top:80px">Wrist</h2>
    <p style="left-align; text-align:center">
         The wrist measurement is taken as a circumference measurement around your wrist.
         <br>
         <b>NOTE !</b> We will add movement ease according to the cuff you select.
    </p>
    <div class="container">
        <div class="video-container">
           <!-- <iframe width="540" height="200" src="http://www.youtube.com/embed/S4QR_1zeT-I" frameborder="0" allowfullscreen></iframe>-->
           <iframe width="540" height="200" src="vidOnlineTutorial/Wrist_Men.mp4" frameborder="0" allowfullscreen></iframe>
        </div>    
    </div>
   <center>
        <div class="input-field col s16" style="width:250px; margin-bottom:80px; margin-top:30px">
              <input id="wrist_measure" type="text" style="align:center" class="validate">
              <label for="wrist_measure">Input Measurement</label>
        </div>
    </center>

<!--Pants Measurement-->

  <div class="divider" style="background-color:teal;"></div>
  <div class="divider" style="background-color:teal;"></div>

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