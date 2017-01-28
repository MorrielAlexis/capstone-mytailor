@extends('layouts.master')


@section('content')
  <div class="main-wrapper" style="margin-top:30px">
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


        <!--  <Duplicate Error Message>   -->
    @if (Input::get('success') == 'duplicate')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel red">
              <span class="black-text" style="color:black">Record already exists!<i class="tiny mdi-navigation-close right" onclick="$('#success-message').hide()"></i></span>
            </div>
          </div>
        </div>
      @endif

       <!--  <Data Dependency Message> -->
       @if (Input::get('success') == 'beingUsed')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel red">
              <span class="black-text" style="color:black">Sorry! Segment style cannot be deactivated! Segment style is still affiliated with other materials.<i class="tiny mdi-navigation-close right" onclick="$('#success-message').hide()"></i></span>
            </div>
          </div>
        </div>
      @endif


    <div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><h4>Maintenance - Segment Style Category</h4></span>
      </div>
    </div>

      <div class="col s6 left">
         <a class="right waves-effect waves-light modal-trigger btn-floating tooltipped btn-large light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to add a new segment segment style to the table" href="#addDesign" style="color:black; margin-right:35px; margin-left: 20px;"><i class="large mdi-content-add"></i></a>
      </div>
    </div>
  


  <div class="row">
    <div class="col s12 m12 l12">
    	<div class="card-panel">
        <span class="card-title"><h5 style="color:#1b5e20"><center>List of Segment Style</center></h5></span>
        <div class="divider"></div>

    		<div class="card-content"> 
            <div class="col s12 m12 l12 overflow-x">
      			<table class = "table centered data-segmentsegmentStyle" align = "center" border = "1">
       				<thead>
          			<tr>
                  <!--<th data-field= "Catalog ID">Segment segmentStyle ID</th>-->
              		<th data-field="Segment Name">Segment</th>
             		  <th data-field="Segment  Style Name">Style Category Name</th>
                  <th data-field="Desc">Description</th>
                  <th data-field="Edit">Actions</th>
              	</tr>
              </thead>

              <tbody>
                @foreach($segmentStyle as $segmentStyle)
                @if($segmentStyle->boolIsActive == 1)
                <tr>
             		
                  <td>{{ $segmentStyle->strSegmentName }}</td>
              		<td>{{ $segmentStyle->strSegStyleName }}</td>
                  <td>{{ $segmentStyle->txtSegStyleCatDesc }}</td>
              		<td><a style="color:black" class="modal-trigger btn tooltipped btn-floating blue" data-position="bottom" data-delay="50" data-tooltip="Click to update segment style data" href="#edit{{ $segmentStyle->strSegStyleCatID }}"><i class="mdi-editor-mode-edit"></i></a>
                  <a style="color:black" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="CLick to remove segment style data from the table" href="#del{{ $segmentStyle->strSegStyleCatID }}"><i class="mdi-action-delete"></i></a></td>
                      
                    <div id="edit{{ $segmentStyle->strSegStyleCatID }}" class="modal modal-fixed-footer">                     
                        <h5><font color = "#1b5e20"><center>UPDATE SEGMENT STYLE</center> </font> </h5>                        

                      {!! Form::open(['url' => 'maintenance/segment-style/update', 'files' => true]) !!}
                        <div class="divider" style="height:2px"></div>
                        <div class="modal-content col s12">
                          
                          <div class="input-field">
                            <input value= "{{ $segmentStyle->strSegStyleCatID }}" id="editSegmentStyleID" name= "editSegmentStyleID" type="hidden">
                          </div>

                      <div class = "col s12" style="padding:15px;  border:3px solid white;"> 
                          <div class="input-field col s12">                                                   
                            <select class="browser-default editSegmentStyle" id="{{ $segmentStyle->strSegStyleCatID }}" name='editSegmentStyle'>
                                  @foreach($segment as $segment_1)
                                    @if($segmentStyle->strSegmentFK == $segment_1->strSegmentID && $segment_1->boolIsActive == 1)
                                      <option selected value="{{ $segment_1->strSegmentID }}" class="{{$segment_1->strSegmentFK}}">{{ $segment_1->strSegmentName }}</option>
                                    @elseif($segment_1->boolIsActive == 1)
                                      <option value="{{ $segment_1->strSegmentID }}" class="{{$segment_1->strSegmentFK}}">{{ $segment_1->strSegmentName }}</option>
                                    @endif
                                  @endforeach
                            </select>    
                          </div> 
                      </div>   

                      <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s12">
                            <input required value = "{{ $segmentStyle->strSegStyleName }}" id="editSegmentStyleName" name= "editSegmentStyleName" type="text" class="validate"  data-position="bottom" pattern="^[a-zA-Z\-'`]+(\s[a-zA-Z\-'`]+)?">
                            <label for="Style_name"><span class="red-text"><b>*</b></span>Style Name </label>
                          </div>
                      </div>

                      <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                            <div class="input-field col s12">
                                  <input  value="{{ $segmentStyle->txtSegStyleCatDesc }}" id="editStyleDesc" name = "editStyleDesc" type="text" class="validate">
                               <label for="segment_description">Style Description</label>
                            </div>
                      </div>
                  </div>

                        <div class="modal-footer col s12" style="background-color:#26a69a">
                            <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">Update</button>
                            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a> 
                        </div>
                      {!! Form::close() !!}
              </div>  
                

                <div id="del{{ $segmentStyle->strSegStyleCatID }}" class="modal modal-fixed-footer">
                      <h5><font color = "#1b5e20"><center>ARE YOU SURE TO DEACTIVATE THIS SEGMENT STYLE?</center> </font> </h5>
                        
                      {!! Form::open(['url' => 'maintenance/segment-style/destroy']) !!}
                        <div class="divider" style="height:2px"></div>
                        <div class="modal-content col s12">

                                <div class="input-field">
                                      <input value= "{{ $segmentStyle->strSegStyleCatID }}" id="delsegmentStyleID" name= "delsegmentStyleID" type="hidden">
                                </div>

                        <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s6">                                                    
                                    <input type="text" value="{{$segmentStyle->strSegmentName}}" readonly>
                                    <label>Segment</label>
                              </div>  
                        </div> 
  
                    <div class = "col s12" style="padding:15px;  border:3px solid white;">
                        <div class="input-field col s12">
                          <input value = "{{ $segmentStyle->strSegStyleName }}" type="text" class="validate" readonly>
                          <label for="segmentStyle_name">Style Name: </label>
                        </div>
                    </div>

                    <div class = "col s12" style="padding:15px;  border:3px solid white;">
                        <div class="input-field col s12">
                            <input value = "{{ $segmentStyle->txtSegStyleCatDesc }}" type="text" class="validate" readonly>
                            <label for="segmentStyle_name">Style Description: </label>
                        </div>
                    </div>

                    <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">        
                      <div class="input-field col s12">
                            <label for="inactive_reason"> Reason for Deactivation <span class="red-text"><b>*</b></span> </label>
                            <input required id="delInactiveSegmentStyle" name = "delInactiveSegmentStyle" value = "{{$segmentStyle->strSegStyleCatInactiveReason}}" type="text">
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
              <h5><font color = "#1b5e20"><center>CREATE SEGMENT STYLE</center> </font> </h5> 
                
              {!! Form::open(['url' => 'maintenance/segment-style', 'method' => 'post']) !!}
                <div class="divider" style="height:2px"></div>
                <div class="modal-content col s12">


                
                <div class="input-field">
                    <input value="{{ $newID }}" id="strSegStyleCatID" name="strSegStyleCatID" type="hidden">
                </div>

              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                <div class="input-field col s12">
                  <select class="browser-default" required id="strSegmentFK" name="strSegmentFK">
                        @foreach($segment as $segment)
                          @if($segment->boolIsActive == 1)
                            <option value="{{ $segment->strSegmentID }}" class="{{ $segment->strSegmentFK }}">{{ $segment->strSegmentName }}</option>
                          @endif
                        @endforeach
                  </select>
                </div>  
            </div>  

            <div class = "col s12" style="padding:15px;  border:3px solid white;">
                <div class="input-field col s12">
                  <input required id="strSegStyleName" name= "strSegStyleName" type="text" class="validate"  data-position="bottom" segmentStyle="^[a-zA-Z\-'`]+(\s[a-zA-Z\-'`]+)?" placeholder="Button Down">
                  <label for="Style Name">Style Name <span class="red-text"><b>*</b></span></label>
                </div>
            </div>


             <div class = "col s12" style="padding:15px;  border:3px solid white;">
                  <div class="input-field col s12">
                        <input id="txtSegStyleCatDesc" name="txtSegStyleCatDesc" type="text" class="validate">
                        <label for="Style Desc">Style Description <span class="red-text"><b>*</b></span></label>
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
        document.getElementById('addsegmentStyleName').value = "";
        document.getElementById('addImage').value = "";
      }
    </script> -->

    <script type="text/javascript">
      $('.validatesegmentStyleName').on('input', function() {
        var input=$(this);
        $regex = "/^[a-zA-Z\'\-]+( [a-zA-Z\'\-]+)*$/";
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      //Kapag Number
      $('.validatesegmentStyleName').keyup(function() {
        var name = $(this).val();
        $(this).val(name.replace(/\d/, ''));
      });     

      //Kapag whitespace
      $('.validatesegmentStyleName').blur('input', function() {
        var desc = $(this).val();
        $(this).val(desc.trim());
      }); 

      $('.validatesegmentStyleName').blur('input', function() {
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

          $('.data-segmentsegmentStyle').DataTable();
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
