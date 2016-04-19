@extends('layouts.master')


@section('content')
  <div class="main-wrapper" style="margin-top:30px">
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

        <!--Add Segment Pattern-->
         @if (Input::get('success') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully added segment pattern!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
        @endif


        <!--Edit Segment Pattern-->
       @if (Input::get('successEdit') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully edited segment pattern!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
        @endif

        <!--Delete Segment Pattern-->
      @if (Input::get('successDel') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully deactivated segment pattern!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
        @endif

       <!--Reactivate Segment Pattern-->
      @if (Input::get('successRec') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully added back segment pattern!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
        @endif

        <!--  <Duplicate Error Message>   -->
    @if (Input::get('success') == 'duplicate')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel red">
              <span class="black-text" style="color:black">Record already exists!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif


    <div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><h4>Segment Pattern</h4></span>
      </div>
    </div>

    <div class="row">
      <div class="col s12 m12 l12">
          <button style="color:black; margin-right:35px; margin-left: 20px" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to add a new segment pattern to the table" href="#addDesign">ADD SEGMENT PATTERN</button>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col s12 m12 l12">
    	<div class="card-panel">
        <span class="card-title"><h5 style="color:#1b5e20"><center>Segment Pattern Details</center></h5></span>
        <div class="divider"></div>

    		<div class="card-content"> 
            <div class="col s12 m12 l12 overflow-x">
      			<table class = "table centered data-segmentPattern" align = "center" border = "1">
       				<thead>
          			<tr>
                  <!--<th data-field= "Catalog ID">Segment Pattern ID</th>-->
                  <th data-field="Category Name">Category Name </th>
              		<th data-field="Garment Name">Segment Name </th>
             		  <th data-field="Pattern Name">Pattern Name</th>
              		<th data-field="Pattern Image">Pattern Image</th>
                  <th data-field="Edit">Edit</th>
                  <th data-field="Edit">Deactivate</th>
              	</tr>
              </thead>

              <tbody>
                @foreach($pattern as $pattern)
                @if($pattern->boolIsActive == 1)
                <tr>
              		<!--<td>{{ $pattern->strDesignPatternID }}</td>-->
                  <td>{{ $pattern->strGarmentCategoryName }}</td>
                  <td>{{ $pattern->strGarmentSegmentName }}</td>
              		<td>{{ $pattern->strPatternName }}</td>
                  <td><img class="materialboxed" width="100%" height="100%" src="{{URL::asset($pattern->strPatternImage)}}"></td>
              		<td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to edit data of pattern" href="#edit{{ $pattern->strDesignPatternID }}">EDIT</button></td>
                  <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="CLick to remove data of pattern from table" href="#del{{ $pattern->strDesignPatternID }}">DEACTIVATE</button>
                      
                    <div id="edit{{ $pattern->strDesignPatternID }}" class="modal modal-fixed-footer">                     
                        <h5><font color = "#1b5e20"><center>EDIT SEGMENT PATTERN</center> </font> </h5>                        
                        <form action="{{URL::to('editDesignPattern')}}" method="POST" enctype="multipart/form-data">
                        <div class="divider" style="height:2px"></div>
                        <div class="modal-content col s12">
                          
                          <div class="input-field">
                            <input value= "{{ $pattern->strDesignPatternID }}" id="editPatternID" name= "editPatternID" type="hidden">
                          </div>

                      <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s6">                                                    
                            <select class="browser-default editCategory" id="{{ $pattern->strDesignPatternID }}" name='editCategory'>
                              @foreach($category as $cat)
                                @if($pattern->strDesignCategory == $cat->strGarmentCategoryID && $cat->boolIsActive == 1)
                                  <option selected value="{{ $cat->strGarmentCategoryID }}">{{ $cat->strGarmentCategoryName }}</option>
                                @elseif($cat->boolIsActive == 1)
                                  <option value="{{ $cat->strGarmentCategoryID }}">{{ $cat->strGarmentCategoryName }}</option>
                                @endif
                              @endforeach
                            </select>    
                          </div>  

                          <div class="input-field col s6">                                                    
                            <select class="browser-default editSegment" id="{{ $pattern->strDesignPatternID }}" name='editSegment'>
                                  @foreach($segment as $segment_2)
                                    @if($pattern->strDesignSegmentName == $segment_2->strGarmentSegmentID && $segment_2->boolIsActive == 1)
                                      <option selected value="{{ $segment_2->strGarmentSegmentID }}" class="{{$segment_2->strCategory }}">{{ $segment_2->strGarmentSegmentName }}</option>
                                    @elseif($segment_2->boolIsActive == 1)
                                      <option value="{{ $segment_2->strGarmentSegmentID }}" class="{{$segment_2->strCategory }}">{{ $segment_2->strGarmentSegmentName }}</option>
                                    @endif
                                  @endforeach
                            </select>    
                          </div> 
                      </div>  

                      <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s12">
                            <input required value = "{{ $pattern->strPatternName }}" id="editPatternName" name= "editPatternName" type="text" class="validatePatternName">
                            <label for="pattern_name">Pattern Name </label>
                          </div>
                      </div>

                      <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                          <div class="file-field input-field col s12">
                            <div style="color:black" class="btn tooltipped btn-small center-text light-green lighten-2" data-position="bottom" data-delay="50" data-tooltip="May upload jpg, png, gif, bmp, tif, tiff files">
                              <span>Upload Image</span>
                              <input id="editImg" name="editImg" type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
                            </div>
                          
                            <div class="file-path-wrapper">
                              <input value="{{$pattern->strPatternImage}}" id="editImage" name="editImage" class="file-path validate" type="text" readonly="readonly">
                            </div>
                          </div>
                      </div>
                      </div>

                        <div class="modal-footer col s12" style="background-color:#26a69a">
                          <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">OK</button>
                          <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a> 
                        </div>
                      </form>
                   </div>  
                 <!-- DELETE DESIGN PATTERN --> 

                <div id="del{{ $pattern->strDesignPatternID }}" class="modal modal-fixed-footer">
                      <h5><font color = "#1b5e20"><center>ARE YOU SURE TO DEACTIVATE THIS SEGMENT PATTERN?</center> </font> </h5>
                        <form action="{{URL::to('delDesignPattern')}}" method="POST" enctype="multipart/form-data">
                        <div class="divider" style="height:2px"></div>
                        <div class="modal-content col s12">

                        <div class="input-field">
                          <input value= "{{ $pattern->strDesignPatternID }}" id="delPatternID" name= "delPatternID" type="hidden">
                        </div>

                    <div class = "col s12" style="padding:15px;  border:3px solid white;">
                        <div class="input-field col s6">                                                    
                            <input type="text" value="{{$pattern->strGarmentCategoryName}}" readonly>
                          <label>Category</label>
                        </div> 

                        <div class="input-field col s6">                                                    
                            <input type="text" value="{{$pattern->strGarmentSegmentName}}" readonly>
                          <label>Segment</label>
                        </div>  
                    </div> 
  
                    <div class = "col s12" style="padding:15px;  border:3px solid white;">
                        <div class="input-field col s12">
                          <input value = "{{ $pattern->strPatternName }}" type="text" class="validate" readonly>
                          <label for="pattern_name">Pattern Name </label>
                        </div>
                    </div>

                          <div class="input-field">
                            <input id="delInactivePattern" name = "delInactivePattern" value = "{{$pattern->strDesignPatternID}}" type="hidden">
                          </div>

                    <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                          <div class="input-field col s12">
                            <input id="delInactiveReason" name = "delInactiveReason" value = "{{$pattern->strInactiveReason}}" type="text" class="validate" required>
                            <label for="fax"> *Reason for Deactivation </label>
                          </div>
                    </div>
                    </div>              

                      <div class="modal-footer col s12" style="background-color:#26a69a">
                        <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">OK</button>
                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a> 
                      </div>
                    </form>              
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
              <h5><font color = "#1b5e20"><center>ADD NEW SEGMENT PATTERN</center> </font> </h5> 
                <form action="{{URL::to('addDesignPattern')}}" method="POST" enctype="multipart/form-data">
                <div class="divider" style="height:2px"></div>
                <div class="modal-content col s12">

                <div class="input-field">
                  <input value = "{{$newID}}" id="addPatternID" name= "addPatternID" type="hidden">
                </div>

            <div class = "col s12" style="padding:15px;  border:3px solid white;">
                <div class="input-field col s6">
                  <select class="browser-default" name='addCategory' id='addCategory' required>
                      @foreach($category as $category)
                        @if($category->boolIsActive == 1)
                          <option value="{{ $category->strGarmentCategoryID }}">{{ $category->strGarmentCategoryName }}</option>
                        @endif
                      @endforeach
                  </select>   
                </div>  

                <div class="input-field col s6">
                  <select class="browser-default" required id="addSegment" name="addSegment">
                        @foreach($segment as $segment_1)
                          @if($segment_1->boolIsActive == 1)
                            <option value="{{ $segment_1->strGarmentSegmentID }}" class="{{ $segment_1->strCategory }}">{{ $segment_1->strGarmentSegmentName }}</option>
                          @endif
                        @endforeach
                  </select>
                </div>  
            </div> 

            <div class = "col s12" style="padding:15px;  border:3px solid white;">
                <div class="input-field col s12">
                  <input required id="addPatternName" name= "addPatternName" type="text" class="validatePatternName">
                  <label for="pattern_name">Pattern Name </label>
                </div>
            </div>

            <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                <div class="file-field input-field col s12">
                  <div style="color:black" class="btn tooltipped btn-small center-text light-green lighten-2" data-position="bottom" data-delay="50" data-tooltip="May upload jpg, png, gif, bmp, tif, tiff files">
                    <span>Upload Image</span>
                    <input id="addImg" name="addImg" type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
                  </div>
                
                  <div class="file-path-wrapper">
                    <input id="addImage" name="addImage" class="file-path validate" type="text" readonly="readonly">
                  </div>
                </div>
            </div>
            </div>

              <div class="modal-footer col s12" style="background-color:#26a69a">
                <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">Add</button>
                <button type="button" onclick="clearData()" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</button> 
              </div>
              </form>
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
      $('select').material_select();
      });
    </script>

    <script>
      $(document).ready(function(){
    $('.materialboxed').materialbox();
     });
    </script>

    
    <script>
      function clearData(){
        document.getElementById('addPatternName').value = "";
        document.getElementById('addImage').value = "";
      }
    </script>

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
            $('#success-message').hide();
        }, 5000);

      } );
    </script>

@stop
