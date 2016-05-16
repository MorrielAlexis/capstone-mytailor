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
  

             <!--Add Measurement Info-->
              @if (Input::get('successHead') == 'true')
                <div class="row" id="success-message">
                  <div class="col s12 m12 l12">
                    <div class="card-panel yellow">
                      <span class="black-text" style="color:black">Successfully added measurement information!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
                    </div>
                  </div>
                </div>
              @endif


             <!--Edit Measurement Info-->
             @if (Input::get('successHeadEdit') == 'true')
                <div class="row" id="success-message">
                  <div class="col s12 m12 l12">
                    <div class="card-panel yellow">
                      <span class="black-text" style="color:black">Successfully edited measurement information!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
                    </div>
                  </div>
                </div>
              @endif 


              <!--Delete Measurement Info-->
              @if (Input::get('successHeadDel') == 'true')
                <div class="row" id="success-message">
                  <div class="col s12 m12 l12">
                    <div class="card-panel yellow">
                      <span class="black-text" style="color:black">Successfully deactivated measurement information!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
                    </div>
                  </div>
                </div>
              @endif

              <!--Add Measurement Part-->
                 @if (Input::get('successPart') == 'true')
                    <div class="row" id="success-message">
                      <div class="col s12 m12 l12">
                        <div class="card-panel yellow">
                          <span class="black-text" style="color:black">Successfully added measurement part!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
                        </div>
                      </div>
                    </div>
                  @endif

                <!--Edit Measurement Part-->
                @if (Input::get('successPartEdit') == 'true')
                    <div class="row" id="success-message">
                      <div class="col s12 m12 l12">
                        <div class="card-panel yellow">
                          <span class="black-text" style="color:black">Successfully edited measurement part!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
                        </div>
                      </div>
                    </div>
                  @endif

                  <!--Delete Measurement Part-->
                  @if (Input::get('successPartDel') == 'true')
                    <div class="row" id="success-message">
                      <div class="col s12 m12 l12">
                        <div class="card-panel yellow">
                          <span class="black-text" style="color:black">Successfully deactivated measurement part!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
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
  

  <br><br><br>
 <p><h4 style="lightpink">Measurement Category</h4></p>
    <div class="row" style="padding:20px">
    

    <!--Measurement Tabs-->
<!--      <div class="col s12" id="measurements" name="measurements">
        <ul class="tabs transparent">
          <li id="detailTab" class="tab col s3" style="background-color: #00b0ff;"><a style="color:black; padding-top:5px; opacity:0.80" class="tooltipped center-text" accent data-position="bottom" data-delay="50" data-tooltip="Click to see to parts being measured" href="#tabDetails"><b>Details</b></a></li>     
          <li id="categoryTab" class="tab col s3" style="background-color: #00b0ff;"><a @if (Input::get('isCat') == 'true') class="active" @endif style="color:black; padding-top:5px; opacity:0.80" class="tooltipped center-text" accent data-position="bottom" data-delay="50" data-tooltip="Click to see measurement details about a particular garment" href="#tabCategory"><b>Category</b></a></li>
          <div class="indicator white" style="z-index:1"></div>
        </ul>
-->    
    <!--Tab Contents-->
    <!--Measurement Category-->
        <div class="col s6 left">
             <a class="right waves-effect waves-light modal-trigger btn-floating tooltipped btn-large light-green accent-1" data-position="left" data-delay="50"  data-tooltip="Click to add a new measurement information to the table" href="#addMeasurementInfo" style="color:black; margin-right:35px; margin-left: 20px;"><i class="large mdi-content-add"></i></a>
          </div>
        </div> 
    </div> <!--DIV CLASS MAIN WRAPPER-->       
 
          <div class="row">
            <div class="col s12 m12 l12">
              <div class="card-panel">
                <span class="card-title"><h5><center>Measurement Category</center></h5></span>
                <div class="divider"></div>
                <div class="card-content">

                  <div class="col s12 m12 l12 overflow-x">
                    <table class = "table centered data-measHead" align = "center" border = "1">
                      <thead>
                        <tr>
                          <th data-field="Garmentcategory">Garment Category</th>
                          <th data-field="Garmentcategory">Segment</th>
                          <th data-field="MeasurementName">Measurement Name</th>
                          <th data-field="MeasurementName">Actions</th>
                          
                        </tr>
                      </thead>

                      <tbody>
                            @foreach($head as $head) 
                            @if($head->boolIsActive == 1) 
                        <tr>   
                          <td>{{ $head->strGarmentCategoryName }}</td>
                          <td>{{ $head->strSegmentName }}</td>
                          <td>{{ $head->strMeasurementDetailName }}</td> 
                          <td><a style = "color:black" class="modal-trigger btn tooltipped btn-floating blue" data-position="bottom" data-delay="50" data-tooltip="Click to edit measurement information" href="#edit{{$head->strMeasCatID}}"><i class="mdi-editor-mode-edit"></i></a>
                          <a style = "color:black" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to edit measurement information" href="#del{{$head->strMeasCatID}}"><i class="mdi-action-delete"></i></a>
                        
                          <div id="edit{{$head->strMeasCatID}}" class="modal modal-fixed-footer">
                            <h5><font color = "#1b5e20"><center>EDIT MEASUREMENT INFORMATION</center> </font> </h5>
                              {!! Form::open(['url' => 'editMeasurementCategory']) !!}
                                <div class="divider" style="height:2px"></div>
                                <div class="modal-content col s12"> 
 
                                    <div class="input-field">
                                      <input value="{{ $head->strMeasCatID }}" id="editMeasurementID" name="editMeasurementID" type="hidden" readonly>                                 
                                    </div>

                              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                    <div class="input-field col s6">                                                    
                                      <select class="browser-default editCategory" name="editCategory" id="{{ $head->strMeasCatID}}"> 
                                        @foreach($category as $cat)
                                            @if($head->strMeasGarFK == $cat->strGarmentCategoryID && $cat->boolIsActive == 1) 
                                              <option value="{{ $cat->strGarmentCategoryID }}" selected>{{ $cat->strGarmentCategoryName }}</option> 
                                            @elseif($cat->boolIsActive == 1)
                                              <option value="{{ $cat->strGarmentCategoryID }}">{{ $cat->strGarmentCategoryName }}</option>
                                            @endif 
                                        @endforeach                                  
                                      </select>    
                                    </div>       
                                      
                                    <div class="input-field col s6">                                                    
                                      <select class="browser-default editSegment" required name='editSegment' id="{{ $head->strMeasCatID}}">
                                        @foreach($segment as $seg)
                                          @if($head->strMeasSegmentFK == $seg->strGarmentSegmentID && $seg->boolIsActive == 1)
                                            <option value="{{ $seg->strGarmentSegmentID }}" class="{{ $seg->strCategory }}" selected>{{ $seg->strSegmentName }}</option>
                                          @elseif($seg->boolIsActive == 1)
                                            <option value="{{ $seg->strGarmentSegmentID }}" class="{{ $seg->strCategory }}">{{ $seg->strSegmentName }}</option>
                                          @endif
                                        @endforeach
                                      </select>    
                                    </div> 
                                </div>    
    
                                <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                                    <div class="input-field col s12">                                                                               
                                       <select class="browser-default" name="editDetail" id="editDetail" required>
                                           @foreach($detailList as $dl)
                                              @if($head->strMeasDetFK == $dl->strMeasurementDetailID && $dl->boolIsActive == 1)
                                                <option selected value ="{{ $dl->strMeasurementDetailID }}">{{$dl->strMeasurementDetailName}}</option>
                                              @elseif($dl->boolIsActive == 1)
                                                <option value ="{{ $dl->strMeasurementDetailID }}">{{$dl->strMeasurementDetailName}}</option>
                                              @endif  
                                           @endforeach
                                       </select>   
                                     </div>
                                  </div>
                                </div> 

                                <div class="modal-footer col s12" style="background-color:#26a69a">
                                  <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">Update</button>
                                  <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>  
                                </div>
                              {!! Form::close() !!}
                            </div>

                         

                          <div id="del{{$head->strMeasCatID}}" class="modal modal-fixed-footer">
                            <h5><font color = "#1b5e20"><center>ARE YOU SURE TO DEACTIVATE THIS MEASUREMENT INFORMATION?</center> </font> </h5>
                            
                            {!! Form::open(['url' => 'delMeasurementCategory']) !!}
                              <div class="divider" style="height:2px"></div>
                              <div class="modal-content col s12">
                                
                                  <div class="input-field">
                                      <input value="{{ $head->strMeasCatID }}" id="delMeasurementID" name="delMeasurementID" type="hidden" readonly>                                 
                                    </div>

                            <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                  <div class="input-field col s6">
                                    <input value="{{ $head->strGarmentCategoryName }}" type="text" readonly>
                                    <label for="measurement_id">Garment Category </label>
                                  </div>

                                  <div class="input-field col s6">
                                    <input value="{{ $head->strSegmentName }}" type="text" readonly>
                                    <label for="measurement_name">Segment </label>
                                  </div>
                            </div>

                            <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                  <div class="input-field col s12">
                                    <input value="{{ $head->strMeasurementDetailName }}" type="text" readonly>
                                    <label for="measurement_desc">Measurement Name </label>
                                  </div>
                            </div>

                                  <div class="input-field">
                                      <input value="{{ $head->strMeasCatID }}" id="delInactiveHead" name="delInactiveHead" type="hidden">                                 
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

                  <div id="addMeasurementInfo" class="modal modal-fixed-footer">
                    <h5><font color = "#1b5e20"><center>ADD NEW MEASUREMENT INFORMATION</center> </font> </h5> 
                      
                      {!! Form::open(['url' => 'addMeasurementCategory']) !!}
                        <div class="divider" style="height:2px"></div>
                        <div class="modal-content col s12">

                          <div class="input-field">
                            <input value="{{ $newID }}" id="addMeasurementID" name="addMeasurementID" type="text" hidden>
                          </div>

                      <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s6">                                                    
                              <select class="browser-default" required id="addCategory" name="addCategory">                                      
                                  @foreach($category as $category_1)
                                    @if($category_1->boolIsActive == 1)  
                                      <option value="{{ $category_1->strGarmentCategoryID }}">{{ $category_1->strGarmentCategoryName }}</option>
                                    @endif
                                  @endforeach
                              </select>    
                          </div>        
                
                          <div class="input-field col s6">                                                    
                            <select class="browser-default" required id="addSegment" name="addSegment">
                                @foreach($segment as $segment_1)
                                  @if($segment_1->boolIsActive == 1)
                                    <option value="{{ $segment_1->strSegmentID }}" class="{{ $segment_1->strSegCategoryFK }}">{{ $segment_1->strSegmentName }}</option>
                                  @endif
                                @endforeach                          
                            </select>    
                          </div>   
                      </div>  

                      <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                          <div class="input-field col s12">                                                                                 
                            <select class="browser-default" name="addDetail" id="addDetail" required>
                                @foreach($detailList as $detail_1)
                                  @if($detail_1->boolIsActive == 1)
                                    <option value="{{ $detail_1->strMeasurementDetailID }}" class="">{{ $detail_1->strMeasurementDetailName }}</option>
                                  @endif
                                @endforeach                               
                            </select>
                          </div>
                      </div>                       
                      </div>

                      <div class="modal-footer col s12" style="background-color:#26a69a">
                        <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">Add</button>
                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>  
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
    
    <script>
      function clearData(){
          document.getElementById('addDetailDesc').value = "";
          document.getElementById('addDetailName').value = "";
      }
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
            $('#success-message').hide();
        }, 5000);
      } );
    </script>


@stop