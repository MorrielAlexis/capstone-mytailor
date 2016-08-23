@extends('layouts.masterOnline')

@section('content')

  <div class="section white"> 

    <div style="height:250px; margin-top: -15px; background-image:url(imgOnline/gradient.jpg)">
      <div style="height:20px;"></div>
      <center><h1 style="color:white; font-family:'Pacifico',cursive;">How It Works</h1></center>
      <div class="container divider"></div>
      <center><h4 style="color:white;">Three easy steps to make custom-fit garments</h4></center>
    </div>

    <div class="divider"></div>
    <div style= "height:50px;"></div>
        <div class="row">
         <div class="col s4">
                    <div class="container">
                       <p align="center">
                        <img style = "height:250px" src="imgOnline/one1.jpg">
                          <a class="btn-flat" style= "background:#4db6ac; padding:4px; color:#fafafa" href="{{URL::to('/online-garmentGown')}}">Go to Gallery</a>
                            <p align="center">Select your desired garments from the gallery for tailoring or alteration</p>
                        </p>
                    </div>
              </div>

              <div class="col s4">
                    <div class="container">
                      <p align="center">
                        <img style = "height:250px" src="imgOnline/two.jpg">
                          <a class="btn-flat" style= "background:#4db6ac; padding:4px; color:#fafafa" href="{{URL::to('/customize-suit-fabric')}}">Go to Designer</a>
                            <p align="center">Design and customize your own garment here</p>
                        </p>
                    </div>
              </div>

              <div class="col s4">
                    <div class="container">
                <p align="center">
                         <img style = "height:250px" src="imgOnline/three.jpg">
                          <a class="btn-flat" style= "background:#4db6ac; padding:4px; color:#fafafa" href="{{URL::to('/online-measuring-tutorial')}}">Go to Measurements</a>
                            <p align="center">Add measurements with the help of our video and picture tutorial</p>
                        </p>
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
