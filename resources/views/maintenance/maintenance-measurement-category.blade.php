@extends('layouts.master')

@section('content')
    <div class="main-wrapper">
                  <!--Input Validation-->
              @if (Input::get('input') == 'invalid')
                <div class="row" id="success-message">
                  <div class="col s12 m12 l12">
                    <div class="card-panel red">
                      <span class="black-text" style="color:black">Invalid input!<i class="tiny mdi-navigation-close right" onclick="$('#success-message').hide()"></i></span>
                    </div>
                  </div>
                </div>
              @endif


          <!-- Errors -->
        @if ($errors->any())
           <div class="row" id="flash_message">
          <div class="col s12 m12 l12">
            <div class="card-panel red">
              <span class="black-text" style="color:black"><i class="tiny mdi-navigation-close right" onclick="$('#flash_message').hide()"></i></span>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </div>
          </div>
        </div>
      @endif
  

            <!--Add -->
        @if(Session::has('flash_message'))
        <div class="row" id="flash_message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow accent-1">
              <span class="alert alert-success"> <i class="tiny mdi-navigation-close right" onclick="$('#flash_message').hide()"></i></span>
             <em> {!! session('flash_message') !!}</em>
            </div>
          </div>
        </div>
      @endif

     <!--Edit -->
      @if (Session::has('flash_message_update'))
        <div class="row" id="flash_message">
          <div class="col s12 m12 l12">
            <div class="card-panel blue accent-1">
              <span class="alert alert-success"><i class="tiny mdi-navigation-close right" onclick="$('#flash_message').hide()"></i></span>
              <em> {!! session('flash_message_update') !!}</em>
            </div>
          </div>
        </div>
      @endif


      <!--Delete -->
      @if (Session::has('flash_message_delete'))
        <div class="row" id="flash_message">
          <div class="col s12 m12 l12">
            <div class="card-panel red accent-2">
              <span class="alert alert-success"><i class="tiny mdi-navigation-close right" onclick="$('#flash_message').hide()"></i></span>
               <em> {!! session('flash_message_delete') !!}</em>
            </div>
          </div>
        </div>
      @endif

       <!-- Update Duplicate -->
       @if (Session::has('flash_message_duplicate'))
        <div class="row" id="flash_message">
          <div class="col s12 m12 l12">
            <div class="card-panel red accent-1">
              <span class="alert alert-success"><i class="tiny mdi-navigation-close right" onclick="$('#flash_message').hide()"></i></span>
              <em> {!! session('flash_message_duplicate') !!}</em>
            </div>
          </div>
        </div>
      @endif            
      
     <!--  <Data Dependency Message> -->
       @if (Input::get('success') == 'beingUsed')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel red">
              <span class="black-text" style="color:black">Sorry! Segment cannot be deactivated! Segment is still affiliated with other materials.<i class="tiny mdi-navigation-close right" onclick="$('#success-message').hide()"></i></span>
            </div>
          </div>
        </div>
      @endif
      
  

  <br><br><br>
 <p><h4 style="lightpink"> Maintenance - Measurement Category</h4></p>
    <div class="row" style="padding:20px">
    

    <!--Measurement Category-->
        <div class="col s1 left">
             <a class="right waves-effect waves-light modal-trigger btn-floating tooltipped btn-large light-green accent-1" data-position="bottom" data-delay="50"  data-tooltip="Click to add a new measurement information to the table" href="#addMeasurementInfo" style="color:black; margin-right:35px; margin-left: 20px;"><i class="large mdi-content-add"></i></a>
          </div>
        </div> 
    </div> <!--DIV CLASS MAIN WRAPPER-->       
 
          <div class="row">
            <div class="col s12 m12 l12">
              <div class="card-panel">
                <span class="card-title"><h5><center>List of Measurement Category</center></h5></span>
                <div class="divider"></div>
                <div class="card-content">

                  <div class="col s12 m12 l12 overflow-x">
                    <table class = "table centered data-measHead" align = "center" border = "1">
                      <thead>
                        <tr>
                          <th data-field="Garmentcategory">Measurement Category Name</th>
                          <th data-field="MeasurementName">Measurement Category Description</th>
                          <th data-field="MeasurementName">Actions</th>
                          
                        </tr>
                      </thead>

                      <tbody>
                            @foreach($measurement_categories as $meas_category) 
                            @if($meas_category->boolIsActive == 1) 
                        <tr>   
                          <td>{{ $meas_category->strMeasurementCategoryName }}</td> 
                          <td>{{ $meas_category->txtMeasurementCategoryDesc }}</td>
                          <td><a style = "color:black" class="modal-trigger btn tooltipped btn-floating blue" data-position="bottom" data-delay="50" data-tooltip="Click to edit measurement information" href="#edit{{$meas_category->strMeasurementCategoryID}}"><i class="mdi-editor-mode-edit"></i></a>
                          <a style = "color:black" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to edit measurement information" href="#del{{$meas_category->strMeasurementCategoryID}}"><i class="mdi-action-delete"></i></a>
                        
                          <div id="edit{{$meas_category->strMeasurementCategoryID}}" class="modal modal-fixed-footer">
                            <h5><font color = "#1b5e20"><center>UPDATE MEASUREMENT CATEGORY</center> </font> </h5>
                              {!! Form::open(['url' => 'maintenance/measurement-category/update', 'method' => 'POST']) !!}
                                <div class="divider" style="height:2px"></div>
                                <div class="modal-content col s12"> 
 
                                    <div class="input-field">
                                      <input value="{{ $meas_category->strMeasurementCategoryID }}" id="editMeasurementCategoryID" name="editMeasurementCategoryID" type="hidden" readonly>                                 
                                    </div>

                                    <div class="input-field">
                                      <label for="editMeasurementCategoryName"><span class="red-text"><b>*</b></span>Measurement Category Name</label>
                                      <input value="{{ $meas_category->strMeasurementCategoryName }}" id="editMeasurementCategoryName" name="editMeasurementCategoryName" type="text">                                 
                                    </div>

                                    <div class="input-field">
                                      <label for="editMeasurementCategoryDesc">Measurement Category Description</label>
                                      <input value="{{ $meas_category->txtMeasurementCategoryDesc }}" id="editMeasurementCategoryDesc" name="editMeasurementCategoryDesc" type="text">                                 
                                    </div>
  
                                </div> 

                                <div class="modal-footer col s12" style="background-color:#26a69a">
                                  <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">Update</button>
                                  <a class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>  
                                </div>
                              {!! Form::close() !!}
                            </div>

                         

                          <div id="del{{$meas_category->strMeasurementCategoryID}}" class="modal modal-fixed-footer">
                            <h5><font color = "#1b5e20"><center>ARE YOU SURE TO DEACTIVATE THIS MEASUREMENT INFORMATION?</center> </font> </h5>
                            
                            {!! Form::open(['url' => 'maintenance/measurement-category/destroy']) !!}
                              <div class="divider" style="height:2px"></div>
                              <div class="modal-content col s12">
                                
                                  <div class="input-field">
                                      <input value="{{ $meas_category->strMeasurementCategoryID }}" id="delMeasurementID" name="delMeasurementID" type="hidden" readonly>                                 
                                    </div>

                                  <div class="input-field col s12">
                                    <input value="{{ $meas_category->strMeasurementCategoryName }}" type="text" readonly>
                                    <label for="measurement_name">Measurement Category Name</label>
                                  </div>

                                  <div class="input-field col s12">
                                    <label for="inactive_reason">Reason for Deactivation <span class="red-text"><b>*</b></span> </label>
                                    <input value="{{ $meas_category->strMeasCatInactiveReason}}" id="delInactiveHead" name="delInactiveHead" type="text">                                 
                                  </div>
                            </div>

                              <div class="modal-footer col s12" style="background-color:#26a69a">
                                <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">OK</button>
                                <a class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>  
                              </div>
                            {!! Form::close() !!}
                          </div>
                        </td>
                        </tr>
                        @endif
                        @endforeach
                      </tbody>
                    </table>
                  </div>

                  <div class = "clearfix">

                  </div>

                  <div id="addMeasurementInfo" class="modal modal-fixed-footer">
                    <h5><font color = "#1b5e20"><center>CREATE NEW MEASUREMENT INFORMATION</center> </font> </h5> 
                      
                    {!! Form::open(['url' => 'maintenance/measurement-category', 'method' => 'post']) !!}
                      <div class="divider" style="height:2px"></div>
                        <div class="modal-content col s12"> 
                          
                          <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                          <input value="{{ $newID }}" id="strMeasurementCategoryID" name="strMeasurementCategoryID" type="text" hidden>
                                                
                          <div class="input-field">
                            <label for="strMeasurementCategoryName"><span class="red-text"><b>*</b></span>Measurement Category Name</label>
                            <input id="strMeasurementCategoryName" name="strMeasurementCategoryName" type="text">                                 
                          </div>

                          <div class="input-field">
                            <label for="txtMeasurementCategoryDesc">Measurement Category Description</label>
                            <input id="txtMeasurementCategoryDesc" name="txtMeasurementCategoryDesc" type="text">                                 
                          </div>

                      </div>

                      <div class="modal-footer col s12" style="background-color:#26a69a">
                        <button type="submit" name="send" id="send" class=" modal-action  waves-effect waves-green btn-flat">Create</button>
                         <button type="reset" value="Reset" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a> 
                      </div>
                    {!! Form::close() !!}
                  </div> 
                  
                </div> 
              </div>
            </div>
          </div>
      
        <!--END OF MEASUREMENT CATEGORY-->



  @stop

@section('scripts')
    <script src="js/jquery-1.12.0.min.js"></script>
    <script src="js/jquery-migrate-1.2.1.min.js"></script>

    {{-- <script>
      // $(document).ready() executes this script AFTER the whole page loads
      $(document).ready(function () {
        // Get jQuery object for element with ID as 'category' (first select element)
        var categoryElement = $('#strMeasGarFK');

        // Get jQuery object for element with ID as 'types' (second select element)
        var typesElement = $('#strMeasSegmentFK');

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
    </script> --}}

    <script>
    $(document).ready(function () {
        // Get jQuery object for element with ID as 'category' (first select element)
        var categoryElements = $('.editCategory');

        // Get jQuery object for element with ID as 'types' (second select element)
        var typesElement = $('.editSegment');

        var typeOptions = {};

        typesElement.each(function (typeElem, elem) {
          var elem = $(elem);
          typeOptions[elem.attr('id')] = { element: elem, children: elem.children() };
        });

        console.log(typeOptions);

        // Get children elements of typesElement
        // var typeOptions = typesElement.children();

        categoryElements.each(function (index, categoryElement) {
          var elem = $(categoryElement);

          // Invoke updateValue() once with initial category value for initial page load
          updateValue(elem);

          // Listen for changes on the categoryElement
          elem.on('change', function () {
            // Invoke updateValue() with currently selected category as parameter

            updateValue(elem);
          });
        });


        // Define default current type
        var defaultType = '';

        // updateValue function definition
        function updateValue(categoryElement) {
          var typeOption = typeOptions[categoryElement.attr('id')];
          var category = categoryElement.val();

          // On update, show everything first
          typeOption.children.show();
          
          // Set default type to empty string for All
          defaultType = '';

          // If the selected category is all, do not hide anything
          if (category == 'All') return;

          // Iterate over options (children elements of typesElement)
          for (var i = 0; i < typeOption.children.length; i++) {
            // Return each child as jQuery object
            var optionElement = $(typeOption.children[i]);

            // Check class of optionElement, hide it if it's not equal to the current selected category
            if (!optionElement.hasClass(category)) optionElement.hide();

            // Check class of optionElement if it matches currently selected category AND if defaultType is an empty string,
            // if the evaluation is true, set defaultType to optionElement value. We do this to set the default value
            // when we pick another category
            if (optionElement.hasClass(category) && defaultType == '') defaultType = optionElement.attr('value');
          }

          // If defaultType is not empty string, set it as typesElement value
          if (defaultType != '') typeOption.element.val(defaultType);
        }
      });
    </script>

    <script>
     $(document).ready(function(){
        $('ul.tabs').tabs();
        });
    </script>
    
    <script>
      $(document).ready(function(){
      $('select').material_select();
      });
    </script>


    <script type="text/javascript">
            //Kapag whitespace
      $('.validateDetailDesc').blur('input', function() {
        var desc = $(this).val();
        $(this).val(desc.trim());
      }); 

    </script>

         <!--DATA TABLE SCRIPT-->
    <script type="text/javascript">
      $(document).ready(function() {
          $('.data-measHead').DataTable();
          $('select').material_select();
          
          setTimeout(function () {
            $('#flash_message').hide();
        }, 5000);

           setTimeout(function () {
            $('#success-message').hide();
        }, 5000);
      } );
    </script>


@stop