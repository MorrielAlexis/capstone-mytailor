@extends('layouts.masterOnline')

@section('content')

    <div class="container" style="width:100%;">
      <div class="row" style="margin:40px;">
        <ul class="col s12 breadcrumb">
          <li><a style="padding-left:100px; padding-top:20px; padding-bottom:20px; padding-right:20px;"><b>Select Fabric</b></a></li>
          <li><a style="padding-left:140px; padding-top:20px; padding-bottom:20px; padding-right:20px;"><b>Choose Style</b></a></li>
          <li><a class="active" style="padding-left:140px; padding-top:20px; padding-bottom:20px; padding-right:20px;"><b>Step 3: Measurement</b></a></li>
          <li><a style="padding-left:140px; padding-top:20px; padding-bottom:20px; padding-right:20px;"><b>Check Out</b></a></li>
        </ul>
      </div>
    </div>

  <div class="container">
    <div class="section white row" style="padding:20px; margin-bottom:20px;"> 

      <div class="col s12">
        <h5><font color="teal"><center><b>Employee Data</b></center></font></h5>
        <div class="divider" style="height:2px"></div>
        <div class="modal-content col s12" style="padding-bottom:10%">

          <div class="col s12" style="font-size:1.2em">
            <div class="left col s7"><p style="color:dimgray"><b>Employee Name:</b> <font color="teal" style="padding-left:5%"><i>Honey May Buenavides</i></font></p></div>
            <div class="right col s3"><p style="color:dimgray"><b>Sex:</b> <font color="teal" style="padding-left:5%"><i>Female</i></font></p></div>
          </div>

          <div class="col s12"><div class="divider" style="height:4px"></div></div>

          <div class="col s12">
            <div class="col s12" style="font-size:1.5em"><p>Package Availed: <font color="red" style="padding-left:5%"><b><i>Generic FA</i></b></font></p></div>
            <div class="col s12 z-depth-1">
              <table class = "table centered" border = "1">
                <thead>
                  <tr>
                    <th>Item</th>
                    <th>Image</th>
                    <th>Quantity</th>
                    <th style="color:gray">Add or Edit</th>                       
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td>Uniform, Skirt</td>
                    <td><img style="width:200px; height:250px; " src="../img/female-uniform-skirt.jpg"/></td>
                    <td>1</td>
                    <td><a class="modal-trigger tooltipped" data-position="bottom" data-delay="50" data-tooltip="Add or edit quantity of this garment" href="{{URL::to('/online-company-checkout-measurement')}}">Add/Edit</a></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <div class="col s12" style="margin-top:20px;">
            <a href="{{URL::to('/online-company-checkout-employee-details')}}" class="right btn tooltipped" data-position="top" data-delay="50" data-tooltip="Click to save employee measurement" style="background-color:teal; padding:9.5px; padding-bottom:45px; margin-right:50px; color:white">Save</a>
            <a href="{{URL::to('/online-company-checkout-employee-details')}}" class="right btn tooltipped" data-position="top" data-delay="50" data-tooltip="Cancels employee measurement profile" style="background-color:teal; padding:9.5px; padding-bottom:45px; margin-right:50px; color:white">Cancel</a>  
          </div>

        </div>
      </div>      

    </div>
  </div>     

</div>	
@stop