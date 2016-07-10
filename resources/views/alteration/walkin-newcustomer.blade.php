@extends('layouts.master')

@section('content')

<div class="main-wrapper" style="margin-top:30px; margin:40px;">

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
                            <div class="divider" style="margin-bottom:30px;"></div>

                              <div class="col s12">
                                  <label style="margin-left:10px;"><font size="+2" color="teal">Your Order:</font></label>
                                  <div style="margin-right:20px; margin-top:-30px;"><button class="red accent-2 btn-flat modal-trigger right tooltipped white-text" href="#create-order" data-position="bottom" data-delay="50" data-tooltip="Click to create a new order">CREATE ORDER</button></button></div>
                              </div>

                              <div style="padding:20px;">
                                  <table class="centered">
                                    <thead>
                                      <tr>
                                          <th>Segment</th>
                                          <th>Alteration Type</th>
                                          <th>Description</th>
                                          <th></th>
                                      </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($alterationtransac as $alterationtransacs)
                                      <tr>
                                        <td>{{ $alterationtransacs->strSegmentName}}</td>
                                        <td>{{ $alterationtransacs->strAlterationName}}</td>
                                        <td>{{ $alterationtransacs->txtAltTransacDesc}}</td>
                                        <td><a style="color:black" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of garment from table" href="#removeOrder"><i class="mdi-action-delete"></i></a></td>
                                      </tr>
                                      @endforeach
                                    </tbody>
                                  </table>
                              </div>

                              <div class="row" style="padding:20px;">
                                  <a href="#summary-of-order" class="teal right modal-trigger btn tooltipped" data-position="top" data-delay="50" data-tooltip="Click to save transaction and proceed to checkout">CHECKOUT</a>   
                              </div>

                    </div>
                  </div>
              </div>
          </div>

                    <!--Remove Order Modal-->
                       <div id="removeOrder" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:150px">
                          <h5><font color="red"><center><b>Warning!</b></center></font></h5>
                              <div class="divider" style="height:2px"></div>
                                <div class="modal-content">
                                  <div class="row">
                                    <div class="col s3">
                                      <i class="mdi-alert-warning" style="font-size:50px; color:yellow"></i>
                                        </div>
                                          <div class="col s9">
                                           <p><font size="+1">Are you sure you want to remove this order?</font></p>
                                         </div>
                                     </div>
                                </div>
                                <div class="modal-footer col s12" style="background-color:red; opacity:0.85">
                                        <button type="submit" class="waves-effect waves-green btn-flat" href="#!"><font color="black">Yes</font></button>
                                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">No</font></a>
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
                                      <a class="waves-effect waves-green btn-flat" href="{{URL::to('/alteration-checkout-info')}}"><font color="black">Yes</font></a>
                                      <a class="modal-action modal-close waves-effect waves-green btn-flat" href=""><font color="black">No</font></a>
                                    </div>
                                  {!! Form::close() !!}
                              </div>

                              <!--CREATE ORDER MODAL-->
                              <div id="create-order" class="modal modal-fixed-footer" style="width:800px;">
                                    <div class="modal-content" style="padding:20px;">
                                        <h5><font color="teal"><center><b>New Order</b></center></font></h5>
                                            <div class="divider container" style="margin-bottom:20px;"></div>
                                      
                                          {!! Form::open(['url' => '/alteration-walkin-newcustomer', 'method' => 'post']) !!}

                                            {{-- Dropdown for segment option --}}

                                             <div class="input-field col s12" style="padding:20px;">
                                                  <select id = "alte-segment" name = "alte-segment">
                                                      @foreach($segment as $segments)
                                                          @if($segments->boolIsActive == 1)
                                                            <option value="{{ $segments->strSegmentID }}" class="{{ $segments->strAltTransacSegFK }}">{{ $segments->strSegmentName }}</option>
                                                          @endif
                                                        @endforeach
                                                  </select>
                                                  <label><font size="3">Choose a segment:</font></label>
                                            </div>

                                            {{-- End of Dropdown for segment option --}}

                                            <div class="input-field col s12" style="padding:20px;">
                                              <select id="alte-type" name="alte-type">
                                                    @foreach($alteration as $alterations)
                                                      <option value="{{ $alterations->strAlterationID }}" class="{{ $alterations->strAltTransacAltTypeFK }}">{{ $alterations->strAlterationName }}</option>
                                                    @endforeach
                                              </select>
                                                  <label><font size="3">Choose an alteration type:</font></label>
                                            </div>

                                      
                                            <div class="input-field">
                                               <input  id="alte-desc" name="alte-desc" type="text" class="validate">
                                               <label for="garment_description">Order Description:</label>
                                            </div>
                                           </div> 
                                            
                                        <div class="modal-footer col s12 teal">
                                          <button type="submit" name="send" id="send" class="waves-effect waves-green btn-flat white-text">Save</button>
                                          <button type="button" class="modal-action modal-close waves-effect waves-green btn-flat left white-text">Cancel</button>
                                        </div>

                                      {!! Form::close() !!}
                                    </div>
                                  </div>
                                </div>

 @stop

 @section('scripts')

    <script>
      $(document).ready(function() {
        $('select').material_select();
      });
    </script>

    <script>
      // $(document).ready() executes this script AFTER the whole page loads
      $(document).ready(function () {

        // Get jQuery object for element with ID as 'category' (first select element)
        var categoryElement = $('#strAltTransacSegFK');

        // Get jQuery object for element with ID as 'types' (second select element)
        var typesElement = $('#strAltTransacAltTypeFK');

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