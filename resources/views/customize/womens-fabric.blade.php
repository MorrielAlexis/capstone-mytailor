@extends('layouts.masterOnline')

@section('content')

<div class="row" style="margin:40px;">

    <div class="row" style="margin-top:40px;">
      <div class="col s12">
        <div class="col s4">
          <div class="divider grey" style="margin-bottom:5px;"></div>
          <div class="divider grey"></div>
        </div>

        <div class="col s4" style="margin-top:-30px;">
          <center><span style="font-size:42px; color: #757575; font-family:'Playfair Display','Times';">WOMEN'S SHIRT</span></center>
        </div>

        <div class="col s4">
          <div class="divider grey" style="margin-bottom:5px;"></div>
          <div class="divider grey"></div>
        </div>
      </div>
    </div>

    <div class="container" style="width:100%;">
      <div class="row" style="margin:40px;">
        <ul class="col s12 breadcrumb">
          <li><a class="active" style="padding-left:100px; padding-top:20px; padding-bottom:20px; padding-right:20px;"><b>Step 1: SELECT FABRIC</b></a></li>
          <li><a style="padding-left:140px; padding-top:20px; padding-bottom:20px; padding-right:20px;"><b>Choose Style</b></a></li>
          <li><a style="padding-left:140px; padding-top:20px; padding-bottom:20px; padding-right:20px;"><b>Check Out</b></a></li>
          <li><a style="padding-left:140px; padding-top:20px; padding-bottom:20px; padding-right:20px;"><b>Measurement</b></a></li>
        </ul>
      </div>
    </div>

    <div class="container" style="width:100%;">
    <div class="section white" style="margin:40px; padding:40px;">

      <div class="col s12" style="margin-top:20px; margin-bottom:20px; padding:20px;">

        <div class="input-field col s3">
          <select>
            <option value="" disabled selected>Fabric Type</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
          </select>
        </div>

        <div class="input-field col s3">
          <select>
            <option value="" disabled selected>Fabric Pattern</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
          </select>
        </div>

        <div class="input-field col s3">
          <select>
            <option value="" disabled selected>Color</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
          </select>
        </div>

        <div class="input-field col s3">
          <select>
            <option value="" disabled selected color="pink">Thread Count</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
          </select>
        </div>

      </div>
     
      <center><span class="red-text"><font size="+1">Click fabric photo to view fabric in detail</font></span></center>
      <div class="col s12 divider dashed" style="height:4px; margin-top:10px;"></div>

      <div class="col s12">
        <div class="col s3">
          <div style="padding:20px;">
            <img class="materialboxed responsive-img" src="img/fabric.jpg">
            <figcaption style="background-color:#ede7f6">Fabric Name</figcaption>
            <figcaption style="background-color:#ede7f6">Swatch Code</figcaption>
            <figcaption style="background-color:#ede7f6">Fabric Type</figcaption>
            <figcaption style="background-color:#ede7f6; color:red;">Price</figcaption>
            <div><a class="btn teal accent-4 white-text" href="{{URL::to('/customize-womens-style')}}"><i class="mdi-action-shopping-cart">Choose this fabric</i></a></div>
          </div>
        </div>
      </div>      
      
      <div class="col s12 divider dashed" style="height:4px; margin-bottom:10px;"></div>
      <center><span class="red-text"><font size="+1">Click fabric photo to view fabric in detail</font></span></center>

    </div>
    </div>

</div>
@stop

@section('scripts')

  <script>
    
    $(document).ready(function(){
      $('.modal-trigger').leanModal();
    });

    $(document).ready(function(){
      $('.materialboxed').materialbox();
    });

  </script>

  <script>

    $(document).ready(function() {
      $('select').material_select();
    });

  </script>

