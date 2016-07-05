@extends('layouts.master')

@section('content')

<div class="main-wrapper"  style="margin-top:30px">

	<div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><center><h3><b>Welcome to <font color="white">MyTailor</font></b></h3></center></span>
        <center><h5>Walk-in Alteration </h5></center>
      </div>
    </div>

    <div class="row">
        <div class="col s12 m12 l12">
        	<div class="card-panel">

                <span class="card-title"><h5 style="color:#1b5e20"><center>Alteration Order</center></h5></span>
                <div class="divider" style="margin-bottom:50px;"></div>

            <div class="row">
                <div class="col s12" style="margin-top:10px;">

                      {{-- start of garment category dropdown --}}
                      {{-- <div class="input-field col s12" style="padding:20px;">
                        <select class = "filled-in garment-category" id = "selectedGarment" name="garment-category[]">
                        <option value="All" class="circle" selected>All</option>
                        @foreach($categories as $category)
                          <option value="{{ $category->strGarmentCategoryID }}" class="circle">{{ $category->strGarmentCategoryName }}</option>
                      @endforeach
                    </select>
                        <label><font size="3" color="Red">Choose a garment category</font></label>
                      </div> --}}
                     {{--  end of garment category dropdown --}}

                      {{-- < Start of Segment> --}}
                      <div class="input-field col s12" style="padding:20px;">
                      <select class = "selectedSegment" id = "segment" name="selectedSegment">
                        <option value="All" class="circle" selected>All</option>
                        @foreach($alterations  as $alteration )
                          <option value="{{ $alteration->strAlterationID }}" class="circle">{{ $alteration->strSegmentName }}</option>
                      @endforeach
                    </select>

                        <label><font size="3" color="Red">Choose a segment:</font></label>
                      </div>
                      {{-- end of segment dropdown --}}

                      <div class="input-field col s12" style="padding:20px;">

                      {{-- start of alteration dropdown --}}
                        <div class="col s12">
                            <select class = "selectedType" id = "type" name="selectedType">
                        <option value="All" class="circle" selected>All</option>
                        @foreach($alterations  as $alteration )
                          <option value="{{ $alteration->strAlterationID }}" class="circle">{{ $alteration->strAlterationName }}</option>
                      @endforeach
                          </select>
                            <label><font size="3" color="Red">Choose an alteration type:</font></label>
                        </div>
                        
                        {{-- end of alteration dropdown --}}
{{-- 
                        <div class="col s2">
                            <a class="btn modal-trigger tooltipped" href="#measurementmodal" data-position="top" data-delay="50" data-tooltip="Supply measurements"><i class="mdi-av-playlist-add"></i></a>
                        </div> --}}
                        

                       {{--  //notes area --}}
                       
                        <h4 style="color:#1b5e20" class="center">Note</h4>
                    <div class="divider container" style="margin-bottom:20px;"></div>
                        <div class="input-field col s12">
                            <textarea id="textarea" class="textarea"></textarea>
                            <label for="textarea"></label>
                        </div>
                         {{--  //end of notes area --}}
                      </div>
                </div>

                {{-- <div class="col s6 container">
                    <center><img class="responsive-img" src="#!" style="height:250px; width:250px;"></center>
                    <form action="#">
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>File</span>
                                <input type="file">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                    </form>
                </div>
             --}}

            <div class="col s12" style="margin-top:25px;">
              <div class="divider"></div>
              <a class="left btn tooltipped modal-trigger" data-position="bottom" data-delay="50" data-tooltip="Click to reset order" style="margin-top:30px; font-size:15px; color:white; background-color: teal; opacity:0.90" href="#resetOrder">RESET ORDER</a>
              <button type="submit" class="right btn tooltipped modal-trigger" data-position="bottom" data-delay="50" data-tooltip="Click to save order" style="margin-top:30px; background-color: teal; font-size:15px; color:white" href="#summary-of-order">ADD TO CART</a>              
            </div>

        	</div>

 
            </div>
        </div>
    </div>

  <!--Reset Order Modal-->
  <div id="resetOrder" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:150px">
    <h5><font color="red"><center><b>Warning!</b></center></font></h5>
    <div class="divider" style="height:2px"></div>
    <div class="modal-content">
      <div class="row">
        <div class="col s3">
          <i class="mdi-alert-warning" style="font-size:50px; color:red"></i>
        </div>
        <div class="col s9">
          <p><font size="+1">Are you sure you want to reset your order?</font></p>
        </div>
      </div>
    </div>
    <div class="modal-footer col s12" style="background-color:red; opacity:0.85">
      <button type="submit" class="waves-effect waves-green btn-flat" href="#!"><font color="black">Yes</font></button>
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">No</font></a>
    </div>
  </div>  

  <!--Save Modal-->
  <div id="saveOrder" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:150px">
    <h5><font color="green"><center><b>Save Order</b></center></font></h5>
    <div class="divider" style="height:2px"></div>
    <div class="modal-content">
      <div class="row">
        <div class="col s3">
          <i class="mdi-alert-warning" style="font-size:50px; color:yellow"></i>
        </div>
        <div class="col s9">
          <p><font size="+1">Are you sure you want to save your order?</font></p>
        </div>
      </div>
    </div>
    <div class="modal-footer col s12" style="background-color:green; opacity:0.85">
      <a class="modal-action modal-close waves-effect waves-green btn-flat" href="#!"><font color="black">Cancel</font></a>
      <a class="modal-action modal-close waves-effect waves-green btn-flat modal-trigger" href="#savednotif"><font color="black">Save</font></a>
    </div>
  </div>  

  <!--Saved notif-->
   <div id="savednotif" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:150px">
        <div class="modal-content">
          <h5 style="color:#1b5e20; margin-top:50px;" class="center">ORDER SUCCESSFULLY SAVED</h5>
          <div class="divider container" style="height:2px;"></div>
        </div>

        <div class="modal-footer" style="background-color:#26a69a">
            <a href="{{URL::to('transaction/alteration-walkin')}}" class="left modal-action modal-close waves-effect waves-green btn-flat">Add Another Order</a>
            <a href="#summary-of-order" class="right modal-action modal-close waves-effect waves-green btn-flat modal-trigger">Proceed to Checkout</a>
        </div>
    </div>

    <!--Measurement button Modal-->
    <div id="measurementmodal" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4 style="color:#1b5e20" class="center">Measurements</h4>
            <div class="divider container" style="margin-bottom:20px;"></div>
            <div class="row">
                <div class="col s6">
                    <div class="input-field">
                        <input id ="measurement" type="text" class="validate">
                        <label for="measurement">Measurement</label>
                    </div>
                    <div class="input-field">
                        <input id ="measurement" type="text" class="validate">
                        <label for="measurement">Measurement</label>
                    </div>
                    <div class="input-field">
                        <input id ="measurement" type="text" class="validate">
                        <label for="measurement">Measurement</label>
                    </div>
                </div>
                <div class="col s6">
                    <div class="input-field">
                        <input id ="measurement" type="text" class="validate">
                        <label for="measurement">Measurement</label>
                    </div>
                    <div class="input-field">
                        <input id ="measurement" type="text" class="validate">
                        <label for="measurement">Measurement</label>
                    </div>
                    <div class="input-field">
                        <input id ="measurement" type="text" class="validate">
                        <label for="measurement">Measurement</label>
                    </div>
                </div>
            </div>

            <h4 style="color:#1b5e20" class="center">Note</h4>
            <div class="divider container" style="margin-bottom:20px;"></div>
                <div class="input-field col s12">
                    <textarea id="textarea" class="textarea"></textarea>
                    <label for="textarea"></label>
                </div>

        </div>

        <div class="modal-footer" style="background-color:#26a69a">
            <a href="" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
            <a href="" class="modal-action modal-close waves-effect waves-green btn-flat">Save</a>
        </div>
    </div>


    <!--PROCEED TO CHECKOUT-->
    <div id="summary-of-order" class="modal modal-fixed-footer" style="height:500px; width:800px; margin-top:30px">
      <h5><font color="teal"><center><b>Summary of Orders</b></center></font></h5>
        
        {!! Form::open() !!}
          <div class="divider" style="height:2px"></div>
          <div class="modal-content col s12">
            <label>This is a summary of orders:</label>
            <div class="container">
                          <table class = "table centered order-summary" border = "1">
                    <thead style="color:gray">
                        <tr>      
                            <th data-field="segment">Segment</th>
                            <th data-field="alterationtype">Alteration Type</th>
                            <th data-field="price">Unit Price</th>
                            <!--<th data-field="price">Total Price</th>-->
                          </tr>
                        </thead>
                        <tbody>
                           {{--  @foreach($alterations as $alteration_1) --}}
                        <tr>
                           <td><i id = selectedSegment></i></td>
                            <td><i id = selectedType></i></td>                           {{-- <td> {{ number_format($alteration_1->dblAlterationPrice, 2) }} PHP</td> --}}
                           <!--<td> </td>-->
                        </tr>
                      {{--     @endforeach --}}
                        </tbody>
                </table>
                </div>

                <div class="divider"></div>
                <div class="divider"></div>

                <div class="col s12" style="margin-bottom:50px" >
              <div class="col s6"><p style="color:gray">Estimated time to finish all orders:<p style="color:black" id="total-time"></p></p></div>
              <div class="col s6"><p style="color:gray">Total Amount to Pay:<p style="color:black" id="total-price"></p></p></div>
            </div>
          </div>

          <div class="modal-footer col s12">
            <p class="left" style="margin-left:10px; color:gray;">Continue to payment?</p>
            <a class="waves-effect waves-green btn-flat" href="{{URL::to('/transaction/walkin-individual-payment-customer-info')}}"><font color="black">Yes</font></a>
            <a class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">No</font></a>
          </div>
        {!! Form::close() !!}
    </div>
 @stop

 @section('scripts')

    <script>
          $(document).ready(function() {
            $('select').material_select();
          });
    </script>

    <script>
      $('.modal-trigger').on('click', function () {
        $('#selectedGarment').text($('#garment').val());
        $('#selectedSegment').text($('#segment').val());
        $('#selectedType').text($('#type').val() + ' ' + $('#segment').val());
  });
});
    </script>

  


    <script>
      // $(document).ready() executes this script AFTER the whole page loads
      $(document).ready(function () {

        // Get jQuery object for element with ID as 'category' (first select element)
        var categoryElement = $('#strAlterationSegmentFK');

        // Get jQuery object for element with ID as 'types' (second select element)
        var typesElement = $('#strAlterationName');

        // Get children elements of typesElement
        var typeOptions = typesElement.children();

        // Invoke updateValue() once with initial category value for initial page load
        updateValue(categoryElement.val());

        // Listen for changes on the categoryElement
        categoryElement.on('change', function () {
          // Invoke updateValue() with currently selected category as parameter
          updateValue(categoryElement.val());
        });

        // Define default current type
        var defaultType = '';

        // updateValue function definition
        function updateValue(category) {
          // On update, show everything first
          typeOptions.show();

          // Set default type to empty string for All
          defaultType = '';

          // If the selected category is all, do not hide anything
          if (category == 'All') return;

          // Iterate over options (children elements of typesElement)
          for (var i = 0; i < typeOptions.length; i++) {
            // Return each child as jQuery object
            var optionElement = $(typeOptions[i]);

            // Check class of optionElement, hide it if it's not equal to the current selected category
            if (!optionElement.hasClass(category)) optionElement.hide();

            // Check class of optionElement if it matches currently selected category AND if defaultType is an empty string,
            // if the evaluation is true, set defaultType to optionElement value. We do this to set the default value
            // when we pick another category
            if (optionElement.hasClass(category) && defaultType == '') defaultType = optionElement.attr('value');
          }

          // If defaultType is not empty string, set it as typesElement value
          if (defaultType != '') typesElement.val(defaultType);
        }
      });
    </script>

@stop