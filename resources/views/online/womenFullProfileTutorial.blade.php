@extends('layouts.masterOnline')

@section('content')

  <div class="container">
  
    <div align = "center">
      <div style= "height:10px"></div>
           <div class="container" style="margin:80px">
            <h3 style="color:grey;">Women's Shirt Measurement Tutorial</h3>
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
    <h2 align="center" style="margin-top:80px">Neck</h2>
    <p style="left-align; text-align:center;">
          The neck measurement is taken around the neck with the tape resting on your shoulders.
          You should put one finger between the tape and the neck if you want to allow for some extra room.
    </p>
    <div class="container">
        <div class="video-container">
            <iframe width="540" height="200" src="vidOnlineTutorial/Neck_Women.mp4" frameborder="0" allowfullscreen></iframe>
        </div>    
    </div>
    <center>
        <div class="input-field col s16" style="width:250px; margin-bottom:80px; margin-top:30px">
              <input id="neck_measure" type="text" class="validate">
              <label for="neck_measure">Input Measurement</label>
        </div>
    </center>
  
    <h2 align="center" style="margin-top:80px">Chest</h2>
    <p style="left-align; text-align:center;">
         The chest measurement is taken as a circumference measurement around your chest at the widest point. 
         Stand in a relaxed posture and breathe out. 
         Measure around the chest standing in a relaxed posture.
    </p>
    <div class="container">
        <div class="video-container">
            <iframe width="540" height="200" src="vidOnlineTutorial/Chest_Women.mp4" frameborder="0" allowfullscreen></iframe>
        </div>    
    </div>
    <center>
        <div class="input-field col s16" style="width:250px; margin-bottom:80px; margin-top:30px">
              <input id="chest_measure" type="text" style="align:center" class="validate">
              <label for="chest_measure">Input Measurement</label>
        </div>
    </center>

    <h2 align="center" style="margin-top:80px">Shoulder</h2>
    <p style="left-align; text-align:center;">
         Think of a line going from your armpit straight upwards to your shoulder. 
         Measure between those two points and hold the tape measure straight. 
         Measure between the points of your shoulders, where a sleeve seam of a normal t-shirt would be.
    </p>
    <div class="container">
        <div class="video-container">
            <iframe width="540" height="200" src="vidOnlineTutorial/Shoulder_Women.mp4" frameborder="0" allowfullscreen></iframe>
        </div>    
    </div>
    <center>
        <div class="input-field col s16" style="width:250px; margin-bottom:80px; margin-top:30px">
              <input id="shoulder_measure" type="text" style="align:center" class="validate">
              <label for="shoulder_measure">Input Measurement</label>
        </div>
    </center>

    <h2 align="center" style="margin-top:80px">Biceps</h2>
    <p style="left-align; text-align:center;">
         The biceps measurement is taken as a circumference measurement around your biceps. 
         Relax the muscle and measure at the widest part of your upper arm.
    </p>
    <div class="container">
        <div class="video-container">
            <iframe width="540" height="200" src="vidOnlineTutorial/Biceps_Women.mp4" frameborder="0" allowfullscreen></iframe>
        </div>    
    </div>
    <center>
        <div class="input-field col s16" style="width:250px; margin-bottom:80px; margin-top:30px">
              <input id="biceps_measure" type="text" style="align:center" class="validate">
              <label for="biceps_measure">Input Measurement</label>
        </div>
    </center>

    <h2 align="center" style="margin-top:80px">Short Sleeve Length</h2>
    <p style="left-align; text-align:center;">
         The short sleeve length measurement is taken from the point of your shoulder (where you took the shoulder width measurement), 
         down to where you want the short sleeve to end. 
         Measure from the shoulder point where you ended the shoulder measurement to the point 
         where you want your short sleeve to end.
    <div class="container">
        <div class="video-container">
            <iframe width="540" height="200" src="vidOnlineTutorial/ShortSleeveLength_Women.mp4" frameborder="0" allowfullscreen></iframe>
        </div>    
    </div>
    <center>
        <div class="input-field col s16" style="width:250px; margin-bottom:80px; margin-top:30px">
              <input id="short_sleeve_measure" type="text" style="align:center" class="validate">
              <label for="short_sleeve_measure">Input Measurement</label>
        </div>
    </center>

    <h2 align="center" style="margin-top:80px">Arm Length</h2>
    <p style="left-align; text-align:center;">
         The sleeve length measurement is taken from the point of your shoulder 
         (where you took the shoulder width measurement), following your bent arm down to where you want the sleeve to end.
    <div class="container">
        <div class="video-container">
            <iframe width="540" height="200" src="vidOnlineTutorial/ArmLength_Women.mp4" frameborder="0" allowfullscreen></iframe>
        </div>    
    </div>
    <center>
        <div class="input-field col s16" style="width:250px; margin-bottom:80px; margin-top:30px">
              <input id="arm_length_measure" type="text" style="align:center" class="validate">
              <label for="arm_length_measure">Input Measurement</label>
        </div>
    </center>

    <h2 align="center" style="margin-top:80px">Length to Seat</h2>
    <p style="left-align; text-align:center;">
         The length to seat measurement is taken from the top of the shoulder, 
         close to the mid side of your neck, following your body down to the point where you took the seat measurement.
    <div class="container">
        <div class="video-container">
            <iframe width="540" height="200" src="vidOnlineTutorial/LengthToSeat_Women.mp4" frameborder="0" allowfullscreen></iframe>
        </div>    
    </div>
    <center>
        <div class="input-field col s16" style="width:250px; margin-bottom:80px; margin-top:30px">
              <input id="length_seat_measure" type="text" style="align:center" class="validate">
              <label for="length_seat_measure">Input Measurement</label>
        </div>
    </center>

    <h2 align="center" style="margin-top:80px">Waist</h2>
    <p style="left-align; text-align:center;">
        The waist measurement is taken as a circumference measurement around your waist
        just above your belly button. Stand in a relaxed posture and breathe out.
    <div class="container">
        <div class="video-container">
            <iframe width="540" height="200" src="vidOnlineTutorial/Waist_Women.mp4" frameborder="0" allowfullscreen></iframe>
        </div>    
    </div>  
    <center>
        <div class="input-field col s16" style="width:250px; margin-bottom:80px; margin-top:30px">
              <input id="waist_measure" type="text" style="align:center" class="validate">
              <label for="waist_measure">Input Measurement</label>
        </div>
    </center>

    <h2 align="center" style="margin-top:80px">Shirt Length</h2>
    <p style="left-align; text-align:center;">
        The shirt length measurement is taken from the top of the shoulder, 
        close to the mid side of your neck, following your body down to the point where you want your shirt to end.
    <div class="container">
        <div class="video-container">
            <iframe width="540" height="200" src="vidOnlineTutorial/ShirtLength_Women.mp4" frameborder="0" allowfullscreen></iframe>
        </div>    
    </div>  
    <center>
        <div class="input-field col s16" style="width:250px; margin-bottom:80px; margin-top:30px">
              <input id="shirt_length_measure" type="text" style="align:center" class="validate">
              <label for="shirt_length_measure">Input Measurement</label>
        </div>
    </center>

    <h2 align="center" style="margin-top:80px">Piquet Polo Length</h2>
    <p style="left-align; text-align:center;">
        The piqué polo length measurement is taken from the top of the shoulder, 
        close to the mid side of your neck, following your body down to the point where you want your piqué polos to end. 
    <div class="container">
        <div class="video-container">
            <iframe width="540" height="200" src="vidOnlineTutorial/PiquetPolo_Women.mp4" frameborder="0" allowfullscreen></iframe>
        </div>    
    </div>  
    <center>
        <div class="input-field col s16" style="width:250px; margin-bottom:80px; margin-top:30px">
              <input id="piquet_measure" type="text" style="align:center" class="validate">
              <label for="piquet_measure">Input Measurement</label>
        </div>
    </center>

    <h2 align="center" style="margin-top:80px">Length to Waist</h2>
    <p style="left-align; text-align:center;">
        The length to waist measurement is taken from the top of the shoulder, 
        close to the mid side of your neck, following your body over the chest down to the point where you 
        took the waist measurement. 
    <div class="container">
        <div class="video-container">
            <iframe width="540" height="200" src="vidOnlineTutorial/LengthToWaist_Women.mp4" frameborder="0" allowfullscreen></iframe>
        </div>    
    </div>
    <center>
        <div class="input-field col s16" style="width:250px; margin-bottom:80px; margin-top:30px">
              <input id="length_waist_measure" type="text" style="align:center" class="validate">
              <label for="length_waist_measure">Input Measurement</label>
        </div>
    </center>

    <h2 align="center" style="margin-top:80px">Chest Width</h2>
    <p style="left-align; text-align:center;">
        Measure across your chest between the points where your arms meet your torso. Measure across your chest
    <div class="container">
        <div class="video-container">
            <iframe width="540" height="200" src="vidOnlineTutorial/ChestWidth_Women.mp4" frameborder="0" allowfullscreen></iframe>
        </div>    
    </div>
    <center>
        <div class="input-field col s16" style="width:250px; margin-bottom:80px; margin-top:30px">
              <input id="chest_width_measure" type="text" style="align:center" class="validate">
              <label for="chest_width_measure">Input Measurement</label>
        </div>
    </center>

    <h2 align="center" style="margin-top:80px">Length to Hip</h2>
    <p style="left-align; text-align:center;">
       The length to hip measurement is taken from the top of the shoulder, close to the mid side of your neck,
       following your body over the chest down to the point where you took the hip measurement.
    <div class="container">
        <div class="video-container">
            <iframe width="540" height="200" src="vidOnlineTutorial/LengthToHip_Women.mp4" frameborder="0" allowfullscreen></iframe>
        </div>    
    </div>
    <center>
        <div class="input-field col s16" style="width:250px; margin-bottom:80px; margin-top:30px">
              <input id="length_hip_measure" type="text" style="align:center" class="validate">
              <label for="length_hip_measure">Input Measurement</label>
        </div>
    </center>

    <h2 align="center" style="margin-top:80px">Wrist</h2>
    <p style="left-align; text-align:center;">
       The wrist measurement is taken as a circumference measurement around your wrist. 
       <br>
       <b>NOTE!</b> We will add movement ease according to the cuff you select.
    <div class="container">
        <div class="video-container">
            <iframe width="540" height="200" src="vidOnlineTutorial/Wrist_Women.mp4" frameborder="0" allowfullscreen></iframe>
        </div>    
    </div>
    <center>
        <div class="input-field col s16" style="width:250px; margin-bottom:80px; margin-top:30px">
              <input id="wrist_measure" type="text" style="align:center" class="validate">
              <label for="wrist_measure">Input Measurement</label>
        </div>
    </center>

    <h2 align="center" style="margin-top:80px">Length to Chest</h2>
    <p style="left-align; text-align:center;">
       The length to chest measurement is taken from the top of your shoulder, 
       close to the mid side of your neck, down to the point where you took the chest circumference measurement.
    <div class="container">
        <div class="video-container">
            <iframe width="540" height="200" src="vidOnlineTutorial/LengthToChest_Women.mp4" frameborder="0" allowfullscreen></iframe>
        </div>    
    </div>
    <center>
        <div class="input-field col s16" style="width:250px; margin-bottom:80px; margin-top:30px">
              <input id="length_chest_measure" type="text" style="align:center" class="validate">
              <label for="length_chest_measure">Input Measurement</label>
        </div>
    </center>

    <div class="divider" style="background-color:teal;"></div> 
    <div class="divider" style="background-color:teal;"></div> 
    <div class="divider" style="background-color:teal;"></div> 

     <h2 align="center" style="margin-top:80px">Seat</h2>
    <p style="left-align; text-align:center;">
           The seat measurement is a circumferential measurement taken around the seat at your widest point.
    </p>
    <div class="container">
        <div class="video-container">
            <iframe width="540" height="200" src="vidOnlineTutorial/Seat_Women.mp4" frameborder="0" allowfullscreen></iframe>
        </div>    
    </div>
    <center>
        <div class="input-field col s16" style="width:250px; margin-bottom:80px; margin-top:30px">
              <input id="seat_measure" type="text" style="align:center" class="validate">
              <label for="seat_measure">Input Measurement</label>
        </div>
    </center>
      
    <h2 align="center" style="margin-top:80px">Hip</h2>
    <p style="left-align; text-align:center;">
         The hip measurement is taken as a circumference measurement around your hips at the widest part.
    </p>
    <div class="container">
        <div class="video-container">
            <iframe width="540" height="200" src="vidOnlineTutorial/Hip_Women.mp4" frameborder="0" allowfullscreen></iframe>
        </div>    
    </div>
    <center>
        <div class="input-field col s16" style="width:250px; margin-bottom:80px; margin-top:30px">
              <input id="hip_measure" type="text" style="align:center" class="validate">
              <label for="hip_measure">Input Measurement</label>
        </div>
    </center>

    <div style="margin-bottom:200px;">
      <a class="left btn-flat tooltipped modal-trigger" data-position="bottom" data-delay="50" data-tooltip="Click to go back" style="font-size:15px; color:white; background-color: teal; opacity:0.90" href="{{URL::to('/online-measuring-tutorial')}}"><i class="mdi-content-reply"> BACK</i></a>
      <a type="submit" class="right btn-flat tooltipped modal-trigger" data-position="bottom" data-delay="50" data-tooltip="Click to save measurements" style="background-color: teal; font-size:15px; color:white" href="#savemodal"><i class="mdi-content-save"> SAVE</i></a>              
    </div>    
  </div>

<!--Tutorial Images-->
<div id="tutorialImages">
  <!--shirt measure-->
    <h2 align="center" style="margin-top:80px">Neck</h2>
    <p style="left-align; text-align:center;">
           The neck measurement is taken around the neck with the tape resting on your shoulders. 
           You should put one finger between the tape and the neck if you want to allow for some extra room.
    </p>
    <div class="container" align="center" >
        <img class="responsive-img hoverable" height="200" width="600" src="imgOnlineTutorial/womens_neck.JPG">
    </div>
    <center>
        <div class="input-field col s16" style="width:250px; margin-bottom:80px; margin-top:30px">
              <input id="neck_measure" type="text" style="align:center" class="validate">
              <label for="neck_measure">Input Measurement</label>
        </div>
    </center>

 


    <h2 align="center" style="margin-top:80px">Chest</h2>
    <p style="left-align; text-align:center;">
          The chest measurement is taken as a circumference measurement around your chest at the widest point. 
         Stand in a relaxed posture and breathe out.
    </p>
    <div class="container" align="center" >
        <img class="responsive-img hoverable" height="200" width="600" src="imgOnlineTutorial/womens_chest.JPG">
    </div>
    <center>
        <div class="input-field col s16" style="width:250px; margin-bottom:80px; margin-top:30px">
              <input id="chest_measure" type="text" style="align:center" class="validate">
              <label for="chest_measure">Input Measurement</label>
        </div>
    </center>
 


    <h2 align="center" style="margin-top:80px">Arm Length</h2>
    <p style="left-align; text-align:center;">
         The sleeve length measurement is taken from the point of your shoulder (where you took the shoulder width measurement), 
          following your bent arm down to where you want the sleeve to end.
          <br>
          <b>NOTE 1!</b> Bend your arm slightly when taking this measurement. 
          <br>
          <b>NOTE 2!</b> This measurement is always the full length of the arm. 
          For short sleeve and 3/4 sleeve you should still measure the full length of the arm
    </p>
    <div class="container" align="center" >
        <img class="responsive-img hoverable" height="200" width="600" src="imgOnlineTutorial/womens_arm length.JPG">
    </div>
    <center>
        <div class="input-field col s16" style="width:250px; margin-bottom:80px; margin-top:30px">
              <input id="arm_length_measure" type="text" style="align:center" class="validate">
              <label for="arm_length_measure">Input Measurement</label>
        </div>
    </center>

 


    <h2 align="center" style="margin-top:80px">Shoulder</h2>
    <p style="left-align; text-align:center;">
          Think of a line going from your armpit straight upwards to your shoulder. 
         Measure between those two points and hold the tape measure straight.
    </p>
    <div class="container" align="center" >
        <img class="responsive-img hoverable" height="200" width="600" src="imgOnlineTutorial/womens_shoulder.JPG">
    </div>
    <center>
        <div class="input-field col s16" style="width:250px; margin-bottom:80px; margin-top:30px">
              <input id="shoulder_measure" type="text" style="align:center" class="validate">
              <label for="shoulder_measure">Input Measurement</label>
        </div>
    </center>
 


    <h2 align="center" style="margin-top:80px">Waist</h2>
    <p style="left-align; text-align:center;">
         The waist measurement is taken as a circumference measurement around your waist just above your 
         belly button. Stand in a relaxed posture and breathe out.
    </p>
    <div class="container" align="center" >
        <img class="responsive-img hoverable" height="200" width="600" src="imgOnlineTutorial/womens_waist.JPG">
    </div>
    <center>
        <div class="input-field col s16" style="width:250px; margin-bottom:80px; margin-top:30px">
              <input id="waist_measure" type="text" style="align:center" class="validate">
              <label for="waist_measure">Input Measurement</label>
        </div>
    </center>

 


    <h2 align="center" style="margin-top:80px">Wrist</h2>
    <p style="left-align; text-align:center;">
         The waist measurement is taken as a circumference measurement around your waist just above your 
         belly button. Stand in a relaxed posture and breathe out.
    </p>
    <div class="container" align="center" >
        <img class="responsive-img hoverable" height="200" width="600" src="imgOnlineTutorial/womens_wrist.JPG">
    </div>
    <center>
        <div class="input-field col s16" style="width:250px; margin-bottom:80px; margin-top:30px">
              <input id="wrist_measure" type="text" style="align:center" class="validate">
              <label for="wrist_measure">Input Measurement</label>
        </div>
    </center>

 


    <h2 align="center" style="margin-top:80px">Shirt Length</h2>
    <p style="left-align; text-align:center;">
         The shirt length measurement is taken from the top of the shoulder, 
        close to the mid side of your neck, following your body down to the point where you want your shirt to end.
    </p>
    <div class="container" align="center" >
        <img class="responsive-img hoverable" height="200" width="600" src="imgOnlineTutorial/womens_shirt_length.JPG">
    </div>
    <center>
        <div class="input-field col s16" style="width:250px; margin-bottom:80px; margin-top:30px">
              <input id="shirt_length_measure" type="text" style="align:center" class="validate">
              <label for="shirt_length_measure">Input Measurement</label>
        </div>
    </center>

  <!--Pants measure-->               
    <div class="divider" style="background-color:teal;"></div> 
    <div class="divider" style="background-color:teal;"></div> 
    <div class="divider" style="background-color:teal;"></div> 

    <h2 align="center" style="margin-top:80px">Seat</h2>
    <p style="left-align; text-align:center;">
      The seat measurement is a circumferential measurement taken around the seat at your widest point
    </p>
    <div class="container" align="center" >
        <img class="responsive-img hoverable" height="200" width="600" src="imgOnlineTutorial/womens_seat.JPG">
    </div>
    <center>
        <div class="input-field col s16" style="width:250px; margin-bottom:80px; margin-top:30px">
              <input id="seat_measure" type="text" style="align:center" class="validate">
              <label for="seat_measure">Input Measurement</label>
        </div>
    </center>
      

    <h2 align="center" style="margin-top:80px">Hip</h2>
    <p style="left-align; text-align:center;">
        The hip measurement is a circumferential measurement.
        <br>
        <b>NOTE!</b> please measure directly on the body i.e. not outside of the garment or on top of a belt.
    </p>
    <div class="container" align="center" >
        <img class="responsive-img hoverable" height="200" width="600" src="imgOnlineTutorial/womens_hip.JPG">
    </div>
    <center>
        <div class="input-field col s16" style="width:250px; margin-bottom:80px; margin-top:30px">
              <input id="hip_measure" type="text" style="align:center" class="validate">
              <label for="hip_measure">Input Measurement</label>
        </div>
    </center>


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