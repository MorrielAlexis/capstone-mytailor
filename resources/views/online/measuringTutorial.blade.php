@extends('layouts.masterOnline')

@section('content')

	<div class="section white">	
      
      <div id="backyy" style="height:500px; margin-top: -15px; background-image:url(imgOnline/measure.jpg);">
          <div style="height:120px;"></div>
          <center><h1 style="color:teal; font-family:'Lobster Two',cursive;"><b>Start Measuring Yourself</b></h1></center>
          <center><h5  style="color:teal; font-family:'Yatra One',cursive;"><b>Get accurate measurements even with no professional experience in tailoring</b></h5></center>
      </div>

		<div class="divider"></div>
		<div style= "height:20px;"></div>
		<p class="center-align" style="color:gray; font-family:'Lemonada',cursive;"><font size = "+3">For Him</font></p>
		<div style= "height:20px;"></div>
		<div class="row">
        	<div class="col s4">
           		 <div class="container">
         			 <div class="card large">
           				 <div class="card-image">
              				<img class="responsive-img" height = "50%" src="imgOnline/menshirt.png">
           				 </div>
            			<div class="card-content" style="font-family:'Philosopher',sans-serif;">
             				<p class="center-align">
             				 <span class="card-title" style="color:black">Men's Shirt</span>
             					 <p class="center-align">See how to measure your upper body to fit that nice shirt you wanted!</p>
           				 	</p>
           				 </div>
            			<div class="card-action">
              			<a href="{{URL::to('/online-men-shirt-tutorial')}}" style="font-family:'Yatra One',cursive;">Proceed to tutorial</a>
           				 </div>
         			 </div>
      			</div>
       		 </div>

       		 <div class="col s4">
           		 <div class="container">
         			 <div class="card large">
           				 <div class="card-image">
              				<img class="responsive-img" height = "50%" src="imgOnline/pants.png">
           				 </div>
            			<div class="card-content" style="font-family:'Philosopher',sans-serif;">
             				<p class="center-align">
             				 <span class="card-title" style="color:black">Men's Pants and Shorts</span>
             					 <p class="center-align">See how to measure your lower body to fit that nice pants or shorts you wanted!</p>
           					</p>
           				 </div>
            			<div class="card-action">
              			<a href="{{URL::to('/online-men-pants-tutorial')}}" style="font-family:'Yatra One',cursive;">Proceed to tutorial</a>
           				 </div>
         			 </div>
      			</div>
       		 </div>

       		 <div class="col s4">
           		 <div class="container">
         			 <div class="card large">
           				 <div class="card-image">
              				<img class="responsive-img" height = "50%" src="imgOnline/menfull.jpg">
           				 </div>
            			<div class="card-content" style="font-family:'Philosopher',sans-serif;">
             				<p class="center-align">
             				 <span class="card-title" style="color:black">Men's Full Profile</span>
             					 <p class="center-align">See how to measure your whole body to fit that nice suit you wanted!</p>
           					</p>
           				 </div>
            			<div class="card-action">
              			<a href="{{URL::to('/online-men-fullprof-tutorial')}}" style="font-family:'Yatra One',cursive;">Proceed to tutorial</a>
           				 </div>
         			 </div>
      			</div>
       		 </div>

     	 </div>


     	<div style= "height:20px;"></div>
		<p class="center-align" style="color:gray; font-family:'Lemonada',cursive;"><font size = "+3">For Her</font></p>
		<div style= "height:20px;"></div>
		<div class="row">
        	<div class="col s4">
           		 <div class="container">
         			 <div class="card large">
           				 <div class="card-image">
              				<img class="responsive-img" height = "50%" src="imgOnline/menshirt.png">
           				 </div>
            			<div class="card-content" style="font-family:'Philosopher',sans-serif;">
            				<p class="center-align">
             				 <span class="card-title" style="color:black">Women's Shirt</span>
             					 <p class="center-align">See how to measure your upper body to fit that nice shirt you wanted!</p>
           				 	</p>
           				 </div>
            			<div class="card-action">
              			<a href="{{URL::to('/online-women-shirt-tutorial')}}" style="font-family:'Yatra One',cursive;">Proceed to tutorial</a>
           				 </div>
         			 </div>
      			</div>
       		 </div>

       		 <div class="col s4">
           		 <div class="container">
         			 <div class="card large">
           				 <div class="card-image">
              				<img class="responsive-img" height = "50%" src="imgOnline/pants.png">
           				 </div>
            			<div class="card-content" style="font-family:'Philosopher',sans-serif;">
            				<p class="center-align">
             				 <span class="card-title" style="color:black">Women's Pants and Skirts</span>
             					 <p class="center-align">See how to measure your lower body to fit that nice pants or skirts you wanted!</p>
             				</p>
           				 </div>
            			<div class="card-action">
              			<a href="{{URL::to('/online-women-pants-skirt-tutorial')}}" style="font-family:'Yatra One',cursive;">Proceed to tutorial</a>
           				 </div>
         			 </div>
      			</div>
       		 </div>

       		 <div class="col s4">
           		 <div class="container">
         			 <div class="card large">
           				 <div class="card-image">
              				<img class="responsive-img" height = "50%" src="imgOnline/menfull.jpg">
           				 </div>
            			<div class="card-content" style="font-family:'Philosopher',sans-serif;">
            				<p class="center-align">
             				 <span class="card-title" style="color:black">Women's Full Profile</span>
             					 <p class="center-align">See how to measure your whole body to fit that nice suit and dress you wanted!</p>
           				 	</p>
           				 </div>
            			<div class="card-action">
              			<a href="{{URL::to('/online-women-fullprof-tutorial')}}" style="font-family:'Yatra One',cursive;">Proceed to tutorial</a>
           				 </div>
         			 </div>
      			</div>
       		 </div>

     	 </div> 
            
	</div>

   @stop

@section('scripts')	 
    <script>
   	$(document).ready(function(){

    });
   	</script>
@stop   