@extends('layouts.master')

@section('content')

    <div class="main-wrapper">
                  <!--Input Validation-->
              @if (Input::get('input') == 'invalid')
                <div class="row" id="success-message">
                  <div class="col s12 m12 l12">
                    <div class="card-panel red">
                      <span class="black-text" style="color:black">Invalid input!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
                    </div>
                  </div>
                </div>
              @endif

               <!-- Errors -->
        @if ($errors->any())
           <div class="row" id="flash_message">
          <div class="col s12 m12 l12">
            <div class="card-panel red">
              <span class="black-text" style="color:black"><i class="material-icons right" onclick="$('#flash_message').hide()">clear</i></span>
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
              <span class="alert alert-success"> <i class="material-icons right" onclick="$('#flash_message').hide()">clear</i></span>
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
              <span class="alert alert-success"><i class="material-icons right" onclick="$('#flash_message').hide()">clear</i></span>
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
              <span class="alert alert-success"><i class="material-icons right" onclick="$('#flash_message').hide()">clear</i></span>
               <em> {!! session('flash_message_delete') !!}</em>
            </div>
          </div>
        </div>
      @endif

                  <!--  <Duplicate Error Message>   -->
            @if (Input::get('successHead') == 'duplicate')
                <div class="row" id="success-message">
                  <div class="col s12 m12 l12">
                    <div class="card-panel red">
                      <span class="black-text" style="color:black">Record already exists!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
                    </div>
                  </div>
                </div>
              @endif

              <!--  <Duplicate Error Message>   -->
              @if (Input::get('successPart') == 'duplicate')
                  <div class="row" id="success-message">
                    <div class="col s12 m12 l12">
                      <div class="card-panel red">
                        <span class="black-text" style="color:black">Record already exists!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
                      </div>
                    </div>
                  </div>
                @endif


                 <!--  <Data Dependency Message> -->
    @if (Input::get('success') == 'beingUsed')
    <div class="row" id="success-message">
    <div class="col s12 m12 l12">
      <div class="card-panel red">
        <span class="black-text" style="color:black">Sorry! Cannot deactivate garment category. It's still being used!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
      </div>
    </div>
    </div>
    @endif


    <div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><h4>Maintenance - Measurement Detail</h4></span>
      </div>
    </div>  
      <div class="col s6 left">
           <a class="right waves-effect waves-light modal-trigger btn-floating tooltipped btn-large light-green accent-1" data-position="bottom" data-delay="50"  data-tooltip="Click to add a new measurement detail to the table" href="#addMeasurementPart" style="color:black; margin-right:35px; margin-left: 20px;"><i class="large mdi-content-add"></i></a>
      </div>
    </div>
         <!-- ENDING TAG FOR MAIN_WRAPPER-->

          <div class="row">
            <div class="col s12 m12 l12">
              <div class="card-panel">
                <span class="card-title"><h5><center>Measurement Detail</center></h5></span>
                <div class="divider"></div>
                <div class="card-content">
                  <div class="col s12 m12 l12 overflow-x">
                  <table class = "table centered data-measDet" align = "center" border = "1">
                    <thead>
                      <tr>
                        <th data-field="MeasDetSegmentFK">Segment</th>
                        <th data-field="MeasCategoryFK">Category</th>
                        <th data-field="MeasDetailName">Measurement Detail Name</th>
                        <th data-field="MeasDetailDesc">Description</th>
                        <th data-field="MeasDetailMinCm">Cm</th>
                        <th data-field="MeasDetailMinInch">Inch</th>
                        <th data-field="action">Actions</th>
                      </tr>
                    </thead>

                    <tbody>
                      @foreach($detail as $detail)
                      @if($detail->boolIsActive == 1)
                      <tr>
                        {{-- <td>{{ $detail->strMeasurementDetailID }}</td> --}}
                        <td>{{ $detail->strSegmentName }}</td>
                        <td>{{ $detail->strMeasurementCategoryName }}</td>
                        <td>{{ $detail->strMeasDetailName }}</td>
                        <td>{{ $detail->txtMeasDetailDesc }}</td>
                        <td>{{ $detail->dblMeasDetailMinCm }}</td>
                        <td>{{ $detail->dblMeasDetailMinInch }}</td>
                        <td><a style="color:black" class="modal-trigger btn tooltipped btn-floating blue" data-position="bottom" data-delay="50" data-tooltip="Click to edit measurement detail" href="#edit{{ $detail->strMeasurementDetailID }}"><i class="mdi-editor-mode-edit"></i></a>
                        <a style="color:black" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to deactivate measurement detail from the table" href="#del{{ $detail->strMeasurementDetailID }}"><i class="mdi-action-delete"></i></a></td>

                        <div id="edit{{ $detail->strMeasurementDetailID }}" class="modal modal-fixed-footer">
                          <h5><font color = "#1b5e20"><center>UPDATE MEASUREMENT PART</center> </font> </h5>
                            
                            {!! Form::open(['url' => 'maintenance/measurement-detail/update']) !!}
                              <div class="divider" style="height:2px"></div>
                              <div class="modal-content col s12">
                                
                                    <div class="input-field">
                                      <input value="{{ $detail->strMeasurementDetailID }}" id="editDetailID" name="editDetailID" type="hidden">
                                    </div>

                                    <div class = "col s12" style="padding:15px;  border:3px solid white;"> 
                                        <div class="input-field col s12">                                                   
                                          <select class="browser-default editMeasSegment" id="{{ $detail->strMeasurementDetailID }}" name='editMeasSegment'>
                                                @foreach($segment as $segment_1)
                                                  @if($detail->strMeasDetSegmentFK == $segment_1->strSegmentID && $segment_1->boolIsActive == 1)
                                                    <option selected value="{{ $segment_1->strSegmentID }}" class="{{$segment_1->strMeasDetSegmentFK}}">{{ $segment_1->strSegmentName }}</option>
                                                  @elseif($segment_1->boolIsActive == 1)
                                                    <option value="{{ $segment_1->strSegmentID }}" class="{{$segment_1->strMeasDetSegmentFK}}">{{ $segment_1->strSegmentName }}</option>
                                                  @endif
                                                @endforeach
                                          </select>    
                                        </div> 
                                    </div>   

                                    <div class = "col s12" style="padding:15px;  border:3px solid white;"> 
                                        <div class="input-field col s12">                                                   
                                          <select class="browser-default editMeasCategory" id="{{ $detail->strMeasurementDetailID }}" name='editMeasCategory'>
                                                @foreach($measurementCategory as $measurementCategory_1)
                                                  @if($detail->strMeasCategoryFK == $measurementCategory_1->strMeasurementCategoryID && $measurementCategory_1->boolIsActive == 1)
                                                    <option selected value="{{ $measurementCategory_1->strMeasurementCategoryID }}" class="{{$measurementCategory_1->strMeasCategoryFK}}">{{ $measurementCategory_1->strMeasurementCategoryName }}</option>
                                                  @elseif($measurementCategory_1->boolIsActive == 1)
                                                    <option value="{{ $measurementCategory_1->strMeasurementCategoryID }}" class="{{$measurementCategory_1->strMeasCategoryFK}}">{{ $measurementCategory_1->strMeasurementCategoryName }}</option>
                                                  @endif
                                                @endforeach
                                          </select>    
                                        </div> 
                                    </div>  

                              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                    <div class="input-field col s12">
                                      <input required value="{{ $detail->strMeasDetailName }}" id="editMeasDetailName" name = "editMeasDetailName" type="text" class="validate" pattern="^[a-zA-Z\-'`]+(\s[a-zA-Z\-'`]+)?">
                                      <label for="measurement_name"> Measurement Name <span class="red-text"><b>*</b></span></label>
                                    </div>
                              </div>

                              <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                                    <div class="input-field col s12">
                                      <input  value="{{ $detail->txtMeasDetailDesc }}" id="editMeasDetailDesc" name = "editMeasDetailDesc" type="text" class="validate">
                                      <label for="measurement_desc">Measurement Description</label>
                                    </div>
                              </div>

                              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                    <div class="input-field col s12">
                                      <input required value="{{ $detail->dblMeasDetailMinCm }}" id="editMeasDetailMinCm" name="editMeasDetailMinCm" type="text" class="validate" pattern="^[a-zA-Z\-'`\d]+(\s[a-zA-Z\-'`]+)?">
                                      <label for="measurement_cm">Minimum Cm <span class="red-text"><b>*</b></span></label>
                                    </div>
                              </div>

                              <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                                    <div class="input-field col s12">
                                      <input  value="{{ $detail->dblMeasDetailMinInch }}" id="editMeasDetailMinInch" name="editMeasDetailMinInch" type="text" class="validate" pattern="^[a-zA-Z\-'`\d]+(\s[a-zA-Z\-'`]+)?">
                                      <label for="measurement_inch">Minimum Inch<span class="red-text"><b>*</b></span></label>
                                    </div>
                              </div>
                              </div>

                              <div class="modal-footer col s12" style="background-color:#26a69a">
                                <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">Update</button>
                                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>  
                              </div>
                          {!! Form::close() !!}
                        </div>
                          

                        <div id="del{{ $detail->strMeasurementDetailID }}" class="modal modal-fixed-footer">
                          <h5><font color = "#1b5e20"><center>ARE YOU SURE TO DEACTIVATE THIS MEASUREMENT PART?</center> </font> </h5>                            
                              
                            {!! Form::open(['url' => 'maintenance/measurement-detail/destroy']) !!}
                              <div class="divider" style="height:2px"></div>
                              <div class="modal-content col s12">
                                
                                  <div class="input-field">
                                    <input value="{{ $detail->strMeasurementDetailID }}" id="delDetailID" name="delDetailID" type="hidden">
                                  </div>

                            <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                  <div class="input-field col s12">
                                    <input value="{{ $detail->strMeasDetailName }}" type="text"  readonly>
                                    <label for="measurement_name"> Measurement Name </label>
                                  </div>
                            </div>

                            <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                  <div class="input-field col s12">
                                    <input readonly type="text"  value="{{ $detail->txtMeasDetailDesc }}" >
                                    <label for="measurement_desc">Measurement Description </label>
                                  </div>
                            </div>

                            <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                  <div class="input-field col s12">
                                    <input value="{{ $detail->dblMeasDetailMinCm }}" type="text"  readonly>
                                    <label for="measurement_cm"> Minimum Cm </label>
                                  </div>
                            </div>

                            <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                  <div class="input-field col s12">
                                    <input type="text" value="{{ $detail->dblMeasDetailMinInch }}" readonly>
                                    <label for="measurement_inch">Minimun Inch </label>
                                  </div>
                            </div>

                                  <div class="input-field col s12">
                                    <label for="inactive_reason"> Reason for Deactivation <span class="red-text"><b>*</b></span> </label>
                                    <input required value="{{ $detail->strMeasDetInactiveReason }}" id="delInactiveDetail" name="delInactiveDetail" type="text">
                                  </div>

                         
                            </div>

                              <div class="modal-footer col s12" style="background-color:#26a69a">
                                <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">OK</button>
                                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>  
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
          
                <div id="addMeasurementPart" class="modal modal-fixed-footer">
                  <h5><font color = "#1b5e20"><center>CREATE MEASUREMENT PART</center> </font> </h5>
                      
                    {!! Form::open(['url' => 'maintenance/measurement-detail', 'method' => 'post']) !!}
                      <div class="divider" style="height:2px"></div>
                      <div class="modal-content col s12">
                        
                          <div class="input-field">
                            <input value="{{$newID}}" id="strMeasurementDetailID" name="strMeasurementDetailID" type="text"  hidden>
                          </div>

                  <div class = "col s12" style="padding:15px;  border:3px solid white;">
                        <div class="input-field col s12">
                          <select class="browser-default" required id="strMeasDetSegmentFK" name="strMeasDetSegmentFK">
                                @foreach($segment as $segment)
                                  @if($segment->boolIsActive == 1)
                                    <option value="{{ $segment->strSegmentID }}" class="{{ $segment->strMeasDetSegmentFK }}">{{ $segment->strSegmentName }}</option>
                                  @endif
                                @endforeach
                          </select>
                        </div>  
                  </div>  


                   <div class = "col s12" style="padding:15px;  border:3px solid white;">
                        <div class="input-field col s12">
                          <select class="browser-default" required id="strMeasCategoryFK" name="strMeasCategoryFK">
                                @foreach($measurementCategory as $measurementCategory)
                                  @if($measurementCategory->boolIsActive == 1)
                                    <option value="{{ $measurementCategory->strMeasurementCategoryID }}" class="{{ $measurementCategory->strMeasCategoryFK }}">{{ $measurementCategory->strMeasurementCategoryName }}</option>
                                  @endif
                                @endforeach
                          </select>
                        </div>  
                  </div>


                      <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s12">
                            <input required id="strMeasDetailName" name= "strMeasDetailName" type="text" class="validate" pattern="^[a-zA-Z\-'`]+(\s[a-zA-Z\-'`]+)?" placeholder="Chest">
                            <label for="measurement_name"> Measurement Name <span class="red-text"><b>*</b></span></label>
                          </div>
                      </div>

                      <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                          <div class="input-field col s12">
                            <input  id="txtMeasDetailDesc" name ="txtMeasDetailDesc" type="text" class="validate" placeholder="Front portion to be measured">
                            <label for="measurement_desc">Measurement Description </label>
                          </div>
                      </div>

                      <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s12">
                            <input required id="dblMeasDetailMinCm" name= "dblMeasDetailMinCm" type="text" class="validate" pattern="^[a-zA-Z\-'`\d]+(\s[a-zA-Z\-'`]+)?" placeholder="Chest">
                            <label for="measurement_cm"> Minimum Cm </label>
                          </div>
                      </div>

                      <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                          <div class="input-field col s12">
                            <input  id="dblMeasDetailMinInch" name ="dblMeasDetailMinInch" type="text" class="validate" placeholder="Front portion to be measured" pattern="^[a-zA-Z\-'`\d]+(\s[a-zA-Z\-'`]+)?">
                            <label for="measurement_inch"><span class="red-text"><b>*</b></span>Minimum Inch </label>
                          </div>
                      </div>                                                                 

                      </div>

                      <div class="modal-footer col s12" style="background-color:#26a69a">
                        <button type="submit" name="send" id="send" class=" modal-action  waves-effect waves-green btn-flat">Add</button>
                        <button type="reset" value="Reset" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</button> 
                      </div>
                    {!! Form::close() !!}
                  </div>          
                </div>
              </div>
            </div>
          </div>      



@stop

@section('scripts')
    <script src="js/jquery-1.12.0.min.js"></script>
    <script src="js/jquery-migrate-1.2.1.min.js"></script>

    <script>
      // $(document).ready() executes this script AFTER the whole page loads
      $(document).ready(function () {
        // Get jQuery object for element with ID as 'category' (first select element)
        var categoryElement = $('#addCategory');

        // Get jQuery object for element with ID as 'types' (second select element)
        var typesElement = $('#addSegment');

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
      $('.validateDetailName').on('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z\'\-]+( [a-zA-Z\'\-]+)*$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });
      //Kapag Number
      $('.validateDetailName').keyup(function() {
        var name = $(this).val();
        $(this).val(name.replace(/\d/, ''));
      });

      $('.validateDetailName').blur('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z\'\-]+( [a-zA-Z\'\-]+)*$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      }); 

      //Kapag whitespace
      $('.validateDetailName').blur('input', function() {
        var desc = $(this).val();
        $(this).val(desc.trim());
      }); 

      $('.validateDetailDesc').on('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z0-9\'\-\.\,]+( [a-zA-Z0-9\,\'\-\.]+)*$/;
        var is_desc=re.test(input.val());
        if(is_desc){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });
      $('.validateDetailDesc').blur('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z0-9\'\-\.\,]+( [a-zA-Z0-9\,\'\-\.]+)*$/;
        var is_desc=re.test(input.val());
        if(is_desc){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

            //Kapag whitespace
      $('.validateDetailDesc').blur('input', function() {
        var desc = $(this).val();
        $(this).val(desc.trim());
      }); 

    </script>
         <!--DATA TABLE SCRIPT-->
    <script type="text/javascript">
      $(document).ready(function() {
          $('.data-measDet').DataTable();
          $('.data-measHead').DataTable();
          $('select').material_select();
          
          setTimeout(function () {
            $('#flash_message').hide();
        }, 5000);
      } );
    </script>


@stop