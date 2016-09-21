@extends('layouts.master')

@section('content')

  <div class="main-wrapper" style="margin-top:30px">
      
    {{-- <div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><h4>Queries -  Top Companies</h4></span>
      </div>
    </div> --}}

     
  </div>

<div class="col s12">
    <div class="row">
      <div class="col offset-s1 s10 ">
        {!! Form::open(['url' => 'utilities/utilities-general/update', 'files' => 'true', 'method' => 'POST']) !!}
          <span class="" style="color:#263238;font-size:35px;">General Setting</span>
            <div class="tooltipped" data-position="top" data-delay="50" data-tooltip="Company Logo" style="margin-top:49px;margin-left:29px;">
               <center><img id="imgShopLogo" src="../{!! $shop_logo !!}" style="width:150px;height:150px;border: 1px solid black;" /> </center>
            </div>
            <div class="row">
              <div class="col s6">
                  <div class="file-field input-field">
                          <div class="btn waves-effect waves-black tooltipped teal accent-4 white-text" data-position="top" data-delay="50" data-tooltip="Choose file">
                            <span>File</span>
                            <input id="updateLogo" name="updateLogo" type="file" onchange="readURL(this);">
                          </div>
                          <div class="file-path-wrapper">
                            <input name="updateFile" value="{{ $shop_logo }}" readonly class="file-path validate black-text text-darken-2" type="text">
                          </div>
                  </div>
              </div> 
            </div> 
            <div class="row">
              <div class="col s12">
                  <div class="input-field">
                    <input id="updateShopName" name="updateShopName" type="text" value="{{ $shop_name }}" class="validate">

                    <label for="shop_name">Shop Name</label>
                  </div>
              </div> 
            </div>    
            <div class="row">
              <div class="col offset-s10 s6">
                  <button class="btn waves-effect waves-black tooltipped teal accent-4 white-text" type="submit" name="action">Submit
                    <i class="material-icons right">send</i>
                  </button>
              </div> 
            </div>    
            {!! Form::close() !!}        
        </div>
      </div>
    </div> 
             
</div> 
    
    <script> function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(160)
                    .height(150);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }</script>
    <script> $(document).ready(function(){
    $('.tooltipped').tooltip({delay: 50});
  });</script>


@stop

@section('scripts')
  <script>
    $(document).ready(function() {
    
      $('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrain_width: false, // Does not change width of dropdown to that of the activator
      hover: true, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: false, // Displays dropdown below the button
      alignment: 'left' // Displays dropdown with edge aligned to the left of button
      });

      $('select').material_select();

    });
    </script>
  
     <!--DATA TABLE SCRIPT-->
    <script type="text/javascript">

      $(document).ready(function() {

          $('.data-customers').DataTable();

      } );

    </script>


       <!--DATA TABLE SCRIPT-->
    <script type="text/javascript">

      $(document).ready(function() {

          // $('.data-role').DataTable();
          $('.data-reactRole').DataTable();
          $('select').material_select();

          setTimeout(function () {
            $('#flash_message').hide();
        }, 5000);

          setTimeout(function () {
            $('#success-message').hide();
        }, 5000);

      } );
    </script>

      <!--TOOLTIP SCRIPT-->
  <script type="text/javascript">
    $(document).ready(function(){
      $('.tooltipped').tooltip({delay: 50});
  }); 
  </script>
  


@stop