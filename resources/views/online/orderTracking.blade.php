@extends('layouts.masterOnline')


@section('content')
  <div class = "section">
      
    <center><h1 style="color:#009688; font-family: 'Mada', sans-serif;">Order Tracking</h1></center>
    <div class="divider container" style="margin-bottom:25px;"></div>

    <div class="section container white" style="width:80%; margin-top:20px; margin-bottom:20px; padding:40px;box-shadow: 9px 9px 4px #a6a6a6;"> 
      <div class="row">
        <div class="col s12">
         
          <div class="col s6">
            <form action="#">
              <label class="center"><font size="+1" color="teal">Proof of purchase</font></label>
              <div class="file-field input-field">
                <div class="btn teal">
                  <span style="padding:10px;">File</span>
                  <input type="file">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" placeholder="Upload your deposit slip here" type="text">
                </div>
              </div>
            </form>

            <form action="#" style="margin-top:20px;">
              <label class="center"><font size="+1" color="teal">Tracking code</font></label>
              <div class = "input-field">
                <input class="center" id = "trackno" value = "JOB001" name = "trackno" type = "text" readonly>
              </div>
              <div class = "col s12 center">
                    <button  type = "submit" class="teal waves-effect waves-light btn" style= "padding:5px" href="#!">Track</button>
                </div>
            </form>
          </div>

          <div class="col s6" style="padding:20px;">
            <div style="border:1px solid pink; padding:5px;">
              <div style="border:1px solid pink; padding:10px; ">
                <h5>Order Summary</h5>
                <div class="divider"></div>
                <h6><b>Name:</b> Liza Soberano</h6>
                <h6><b>Address:</b> Blk10 Lot16 Zamboanga Cor. Naga Primavera Homes Brgy. San Luis, Antipolo City</h6>
                <h6><b>Contact Number:</b> 09365702049</h6>
                <h6><b>Quantity of Order:</b> 50</h6>
                <h6><b>Total Price:</b> Php 4,100.00</h6>
              </div>
            </div>
          </div>
        </div>

        <div class="col s12" style="margin-top:40px;">
          <div class = "container">
            <h6 class="center" style="margin-bottom:20px;"><font size = "+2" color = "black">Job Order: JOB001</font></h6>
            <div class="divider" style="background-color:#26a69a"></div>

            <label style="color:#737373"><center><font size = "+1">Progress:</font></center> </label>

            <div id="progress">
              <span id="percent">60%</span>
              <div id="bar"></div>
                <label style="color:#737373"><center><font size ="+2">30 out of 50 garments is done</font></center></label>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
@stop