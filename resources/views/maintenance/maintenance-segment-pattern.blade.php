@extends('layouts.master')


@section('content')
  <div class="main-wrapper" style="margin-top:30px">
      <!--Input Validation-->
      @if (Input::get('input') == 'invalid')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel red">
              <span class="black-text" style="color:black">Invalid input!<i class="materialtiny mdi-navigation-close rightns right" onclick="$('#success-message').hide()"></i></span>
            </div>
          </div>
        </div>
      @endif


      <!-- Errors -->
        @if ($errors->any())
           <div class="row" id="flash_message">
          <div class="col s12 m12 l12">
            <div class="card-panel red">
              <span class="black-text" style="color:black"><i class="mdi-action-close" onclick="$('#flash_message').hide()"></i></span>
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


       <!--Reactivate Segment Pattern-->
      @if (Input::get('successRec') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully added back segment pattern!<i class="tiny mdi-navigation-close right" onclick="$('#success-message').hide()"></i></span>
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


    <div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><h4>Maintenance - Segment Pattern</h4></span>
      </div>
    </div>

      <div class="col s6 left">
         <a class="right waves-effect waves-light modal-trigger btn-floating tooltipped btn-large light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to add a new segment pattern to the table" href="#addDesign" style="color:black; margin-right:35px; margin-left: 20px;"><i class="large mdi-content-add"></i></a>
      </div>
    </div>
  


  <div class="row">
    <div class="col s12 m12 l12">
    	<div class="card-panel">
        <span class="card-title"><h5 style="color:#1b5e20"><center>List Segment Pattern</center></h5></span>
        <div class="divider"></div>

    		<div class="card-content"> 
            <div class="col s12 m12 l12 overflow-x">
      			<table class = "table centered data-segmentPattern" align = "center" border = "1">
       				<thead>
          			<tr>
                  <!--<th data-field= "Catalog ID">Segment Pattern ID</th>-->
              		<th data-field="Garment Name">Segment Style Name</th>
             		  <th data-field="Pattern Name">Pattern Name</th>
                  <th data-field="Pattern Price">Pattern Price</th>
                  <th data-field="Pattern Image">Pattern Description</th>
              		<th data-field="Pattern Image">Pattern Image</th>
                  <th data-field="Edit">Actions</th>
              	</tr>
              </thead>

              <tbody>
                @foreach($pattern as $pattern)
                @if($pattern->boolIsActive == 1)
                <tr>
             		<!--<td>{{ $pattern->strSegPatternID }}</td>-->
                  <td>{{ $pattern->strSegStyleName }}</td>
              		<td>{{ $pattern->strSegPName }}</td>
                  <td>{{ number_format($pattern->dblPatternPrice, 2) . ' PHP' }}</td>
                  <td>{{ $pattern->txtSegPDesc }}</td>
                  <td><img class="materialboxed" width="100%" height="100%" src="{{URL::asset($pattern->strSegPImage)}}"></td>
              		<td><a style="color:black" class="modal-trigger btn tooltipped btn-floating blue" data-position="bottom" data-delay="50" data-tooltip="Click to edit data of pattern" href="#edit{{ $pattern->strSegPatternID }}"><i class="mdi-editor-mode-edit"></i></a>
                  <a style="color:black" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="CLick to remove data of pattern from table" href="#del{{ $pattern->strSegPatternID }}"><i class="mdi-action-delete"></i></a></td>
                      
                    <div id="edit{{ $pattern->strSegPatternID }}" class="modal modal-fixed-footer">                     
                        <h5><font color = "#1b5e20"><center>EDIT SEGMENT PATTERN</center> </font> </h5>                        

                      {!! Form::open(['url' => 'maintenance/segment-pattern/update', 'files' => true]) !!}
                        <div class="divider" style="height:2px"></div>
                        <div class="modal-content col s12">
                          
                          <div class="input-field">
                            <input value= "{{ $pattern->strSegPatternID }}" id="editPatternID" name= "editPatternID" type="hidden">
                          </div>

                      <div class = "col s12" style="padding:15px;  border:3px solid white;"> 

                          <div class="input-field col s12">                                                   
                            <select class="browser-default editSegmentStyle" id="{{ $pattern->strSegPatternID }}" name='editSegmentStyle'>
                                  @foreach($segmentStyle as $segmentStyle_1)
                                    @if($pattern->strSegPStyleCategoryFK == $segmentStyle_1->strSegStyleCatID && $segmentStyle_1->boolIsActive == 1)
                                      <option selected value="{{ $segmentStyle_1->strSegStyleCatID }}" class="{{$segmentStyle_1->strSegStyleCatID  }}">{{ $segmentStyle_1->strSegStyleName }}</option>
                                    @elseif($segmentStyle_1->boolIsActive == 1)
                                      <option value="{{ $segmentStyle_1->strSegStyleCatID }}" class="{{$segmentStyle_1->strSegStyleCatID  }}">{{ $segmentStyle_1->strSegStyleName }}</option>
                                    @endif
                                  @endforeach
                            </select>    
                          </div> 
                      </div>  

                      <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s12">
                            <input required value = "{{ $pattern->strSegPName }}" id="editPatternName" name= "editPatternName" type="text" class="validate"  data-position="bottom" pattern="^[a-zA-Z\-'`]+(\s[a-zA-Z\-'`]+)?">
                            <label for="pattern_name">Pattern Name </label>
                          </div>
                      </div>

                      <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                            <div class="input-field col s12">
                                  <input  value="{{ $pattern->dblPatternPrice }}" id="editPatternPrice" name = "editPatternPrice" type="text" class="validate" pattern="^[1-9]\d{0,7}(?:\.\d{1,4})?|\.\d{1,4}$">
                               <label for="segment_description">Pattern Price</label>
                            </div>
                      </div>


                      <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                            <div class="input-field col s12">
                                  <input  value="{{ $pattern->txtSegPDesc }}" id="editSegPDesc" name = "editSegPDesc" type="text" class="validate">
                               <label for="segment_description">Pattern Description</label>
                            </div>
                      </div>

                      <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                          <div class="file-field input-field col s12">
                            <div style="color:black" class="btn tooltipped btn-small center-text light-green lighten-2" data-position="bottom" data-delay="50" data-tooltip="May upload jpg, png, gif, bmp, tif, tiff files">
                              <span>Upload Image</span>
                              <input id="editImg" name="editImg" type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
                            </div>
                          
                            <div class="file-path-wrapper">
                              <input value="{{$pattern->strSegPImage}}" id="editImage" name="editImage" class="file-path" type="text" readonly="readonly">
                            </div>
                          </div>
                      </div>
                      </div>

                        <div class="modal-footer col s12" style="background-color:#26a69a">
                          <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">Update</button>
                          <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a> 
                        </div>
                      {!! Form::close() !!}
                   </div>  
                

                <div id="del{{ $pattern->strSegPatternID }}" class="modal modal-fixed-footer">
                      <h5><font color = "#1b5e20"><center>ARE YOU SURE TO DEACTIVATE THIS SEGMENT PATTERN?</center> </font> </h5>
                        
                      {!! Form::open(['url' => 'maintenance/segment-pattern/destroy']) !!}
                        <div class="divider" style="height:2px"></div>
                        <div class="modal-content col s12">

                        <div class="input-field">
                          <input value= "{{ $pattern->strSegPatternID }}" id="delPatternID" name= "delPatternID" type="hidden">
                        </div>

                    <div class = "col s12" style="padding:15px;  border:3px solid white;">

                        <div class="input-field col s6">                                                    
                            <input type="text" value="{{$pattern->strSegStyleName}}" readonly>
                          <label>Segment:</label>
                        </div>  
                    </div> 
  
                    <div class = "col s12" style="padding:15px;  border:3px solid white;">
                        <div class="input-field col s12">
                          <input value = "{{ $pattern->strSegPName }}" type="text" class="validate" readonly>
                          <label for="pattern_name">Pattern Name: </label>
                        </div>
                    </div>

                    <div class = "col s12" style="padding:15px;  border:3px solid white;">
                        <div class="input-field col s12">
                          <input value = "{{ $pattern->dblPatternPrice }}" type="text" class="validate" readonly>
                          <label for="pattern_name">Pattern Price: </label>
                        </div>
                    </div>

                    <div class = "col s12" style="padding:15px;  border:3px solid white;">
                        <div class="input-field col s12">
                          <input value = "{{ $pattern->txtSegPDesc }}" type="text" class="validate" readonly>
                          <label for="pattern_name">Pattern Description: </label>
                        </div>
                    </div>

                    <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                          <div class="input-field col s12">
                            <label for="inactive_reason"> Reason for Deactivation <span class="red-text"><b>*</b></span> </label>
                            <input required id="delInactivePattern" name = "delInactivePattern" value = "{{$pattern->strSegPInactiveReason}}" type="text">
                          </div> 
                    </div>
                    </div>              

                      <div class="modal-footer col s12" style="background-color:#26a69a">
                        <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">OK</button>
                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a> 
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
           

            <div id="addDesign" class="modal modal-fixed-footer">
              <h5><font color = "#1b5e20"><center>CREATE SEGMENT PATTERN</center> </font> </h5> 
                
              {!! Form::open(['url' => 'maintenance/segment-pattern', 'method' => 'post', 'files' => true]) !!}
                <div class="divider" style="height:2px"></div>
                <div class="modal-content col s12">
                
                <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                <input value = "{{$newID}}" id="strSegPatternID" name= "strSegPatternID" type="hidden">

            <div class = "col s12" style="padding:15px;  border:3px solid white;">
                <div class="input-field col s12">
                  <select class="browser-default" required id="strSegPStyleCategoryFK" name="strSegPStyleCategoryFK">
                        @foreach($segmentStyle as $segmentStyle)
                          @if($segmentStyle->boolIsActive == 1)
                            <option value="{{ $segmentStyle->strSegStyleCatID }}" class="{{ $segmentStyle->strSegPStyleCategoryFK }}">{{ $segmentStyle->strSegStyleName }}</option>
                          @endif
                        @endforeach
                  </select>
                </div>  
            </div> 

            <div class = "col s12" style="padding:15px;  border:3px solid white;">
                <div class="input-field col s12">
                  <input required id="strSegPName" name= "strSegPName" type="text" class="validate"  data-position="bottom" pattern="^[a-zA-Z\-'`]+(\s[a-zA-Z\-'`]+)?" placeholder="Button Down">
                  <label for="pattern_name">Pattern Name <span class="red-text"><b>*</b></span></label>
                </div>
            </div>


             <div class = "col s12" style="padding:15px;  border:3px solid white;">
                  <div class="input-field col s12">
                      <input id="dblPatternPrice" name="dblPatternPrice" type="text" class="validate" placeholder="50.00" pattern="^[1-9]\d{0,7}(?:\.\d{1,4})?|\.\d{1,4}$">
                      <label for="pattern_name">Pattern Price <span class="red-text"><b>*</b></span></label>
                  </div>
             </div>

             <div class = "col s12" style="padding:15px;  border:3px solid white;">
                  <div class="input-field col s12">
                      <input id="txtSegPDesc" name="txtSegPDesc" type="text" class="validate">
                      <label for="pattern_name">Pattern Description: </label>
                  </div>
             </div>
          
          
            <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                <div class="file-field input-field col s12">
                  <div style="color:black" class="btn tooltipped btn-small center-text light-green lighten-2" data-position="bottom" data-delay="50" data-tooltip="May upload jpg, png, gif, bmp, tif, tiff files">
                    <span>Upload Image</span>
                    <input id="addImg" name="addImg" type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
                  </div>
                
                  <div class="file-path-wrapper">
                    <input id="addImage" name="addImage" class="file-path validate" type="text">
                  </div>
                </div>
            </div>
            </div>

              <div class="modal-footer col s12" style="background-color:#26a69a">
                <button type="submit" id="send" name"send" class=" modal-action  waves-effect waves-green btn-flat">Create</button>
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
    {{-- <script>
      // $(document).ready() executes this script AFTER the whole page loads
      $(document).ready(function () {

        // Get jQuery object for element with ID as 'category' (first select element)
        var categoryElement = $('#strSegPCategoryFK');

        // Get jQuery object for element with ID as 'types' (second select element)
        var typesElement = $('#strSegPNameFK');

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
      $('select').material_select();
      });
    </script>

    <script>
      $(document).ready(function(){
    $('.materialboxed').materialbox();
     });
    </script>

    
   <!--  <script>
      function clearData(){
        document.getElementById('addPatternName').value = "";
        document.getElementById('addImage').value = "";
      }
    </script> -->

    <script type="text/javascript">
      $('.validatePatternName').on('input', function() {
        var input=$(this);
        $regex = "/^[a-zA-Z\'\-]+( [a-zA-Z\'\-]+)*$/";
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      //Kapag Number
      $('.validatePatternName').keyup(function() {
        var name = $(this).val();
        $(this).val(name.replace(/\d/, ''));
      });     

      //Kapag whitespace
      $('.validatePatternName').blur('input', function() {
        var desc = $(this).val();
        $(this).val(desc.trim());
      }); 

      $('.validatePatternName').blur('input', function() {
        var input=$(this);
        $regex = "/^[a-zA-Z\'\-]+( [a-zA-Z\'\-]+)*$/";
        var is_name=re.test(input.val())  ;
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      }); 
    </script>
         <!--DATA TABLE SCRIPT-->
    <script type="text/javascript">

      $(document).ready(function() {

          $('.data-segmentPattern').DataTable();
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
