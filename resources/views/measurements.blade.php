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
 <!--<p><h4 style="lightpink">Measurements</h4></p>-->
    <div class="row" style="padding:20px">
    
    <!--Measurement Tabs-->
      <div class="col s12" id="measurements" name="measurements">
        <ul class="tabs transparent">
          <li id="detailTab" class="tab col s3" style="background-color: #00b0ff;"><a style="color:black; padding-top:5px; opacity:0.80" class="tooltipped center-text" accent data-position="bottom" data-delay="50" data-tooltip="Click to see to parts being measured" href="#tabDetails"><b>Details</b></a></li>     
          <li id="categoryTab" class="tab col s3" style="background-color: #00b0ff;"><a @if (Input::get('isCat') == 'true') class="active" @endif style="color:black; padding-top:5px; opacity:0.80" class="tooltipped center-text" accent data-position="bottom" data-delay="50" data-tooltip="Click to see measurement details about a particular garment" href="#tabCategory"><b>Category</b></a></li>
          <div class="indicator white" style="z-index:1"></div>
        </ul>
    
    <!--Tab Contents-->
    <!--Measurement Category-->
        <div id="tabCategory" class="hue col s12" style="background-color: #80d8ff;">

            <div class="row">
              <div class="col s12 m12 l12">
                <span class="page-title"><h4>Measurement Information</h4></span>
              </div>
            </div>

            <div class="row">
              <div class="col s12 m12 l12">
                <button style="color:black; margin-right:35px; margin-left: 20px" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to add a new measurement information to the table" href="#addMeasurementInfo"> ADD MEASUREMENT INFO </button>
              </div>
            </div>        
 
          <div class="row">
            <div class="col s12 m12 l12">
              <div class="card-panel">
                <span class="card-title"><h5><center>Measurement Information</center></h5></span>
                <div class="divider"></div>
                <div class="card-content">

                  <div class="col s12 m12 l12 overflow-x">
                    <table class = "table centered data-measHead" align = "center" border = "1">
                      <thead>
                        <tr>
                          <th data-field="Garmentcategory">Garment Category</th>
                          <th data-field="Garmentcategory">Segment</th>
                          <th data-field="MeasurementName">Measurement Name</th>
                          <th data-field="MeasurementName">Edit</th>
                          <th data-field="MeasurementName">Deactivate</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach($head as $head)
                        @if($head->boolIsActive == 1)
                        <tr>   
                          <!--<td>{{ $head->strMeasurementID }}</td>-->
                          <td>{{ $head->strGarmentCategoryName }}</td>
                          <td>{{ $head->strGarmentSegmentName }}</td>
                          <td>{{ $head->strMeasurementDetailName }}</td>
                          <td><button style = "color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to edit measurement information" href="#edit{{$head->strMeasurementID}}">EDIT</button></td>
                          <td><button style = "color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to edit measurement information" href="#del{{$head->strMeasurementID}}">DEACTIVATE</button>
                        
                          <div id="edit{{$head->strMeasurementID}}" class="modal modal-fixed-footer">
                            <h5><font color = "#1b5e20"><center>EDIT MEASUREMENT INFORMATION</center> </font> </h5>
                              <form action="{{URL::to('editMeasurementCategory')}}" method="POST"> 
                                <div class="divider" style="height:2px"></div>
                                <div class="modal-content col s12"> 
 
                                    <div class="input-field">
                                      <input value="{{ $head->strMeasurementID }}" id="editMeasurementID" name="editMeasurementID" type="hidden" readonly>                                 
                                    </div>

                              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                    <div class="input-field col s6">                                                    
                                      <select class="browser-default editCategory" name="editCategory" id="{{ $head->strMeasurementID}}"> 
                                        @foreach($category as $cat)
                                            @if($head->strCategoryName == $cat->strGarmentCategoryID && $cat->boolIsActive == 1) 
                                              <option value="{{ $cat->strGarmentCategoryID }}" selected>{{ $cat->strGarmentCategoryName }}</option> 
                                            @elseif($cat->boolIsActive == 1)
                                              <option value="{{ $cat->strGarmentCategoryID }}">{{ $cat->strGarmentCategoryName }}</option>
                                            @endif 
                                        @endforeach                                  
                                      </select>    
                                    </div>       
                                      
                                    <div class="input-field col s6">                                                    
                                      <select class="browser-default editSegment" required name='editSegment' id="{{ $head->strMeasurementID}}">
                                        @foreach($segment as $seg)
                                          @if($head->strSegmentName == $seg->strGarmentSegmentID && $seg->boolIsActive == 1)
                                            <option value="{{ $seg->strGarmentSegmentID }}" class="{{ $seg->strCategory }}" selected>{{ $seg->strGarmentSegmentName }}</option>
                                          @elseif($seg->boolIsActive == 1)
                                            <option value="{{ $seg->strGarmentSegmentID }}" class="{{ $seg->strCategory }}">{{ $seg->strGarmentSegmentName }}</option>
                                          @endif
                                        @endforeach
                                      </select>    
                                    </div> 
                                </div>    
    
                                <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                                    <div class="input-field col s12">                                                                               
                                       <select class="browser-default" name="editDetail" id="editDetail" required>
                                           @foreach($detailList as $dl)
                                              @if($head->strMeasurementName == $dl->strMeasurementDetailID && $dl->boolIsActive == 1)
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
                              </form>
                            </div>

                          <!--///////////////////////DELETE/////////////-->

                          <div id="del{{$head->strMeasurementID}}" class="modal modal-fixed-footer">
                            <h5><font color = "#1b5e20"><center>ARE YOU SURE TO DEACTIVATE THIS MEASUREMENT INFORMATION?</center> </font> </h5>
                            <form action="{{URL::to('delMeasurementCategory')}}" method="POST"> 
                              <div class="divider" style="height:2px"></div>
                              <div class="modal-content col s12">
                                
                                  <div class="input-field">
                                      <input value="{{ $head->strMeasurementID }}" id="delMeasurementID" name="delMeasurementID" type="hidden" readonly>                                 
                                    </div>

                            <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                  <div class="input-field col s6">
                                    <input value="{{ $head->strGarmentCategoryName }}" type="text" readonly>
                                    <label for="measurement_id">Garment Category </label>
                                  </div>

                                  <div class="input-field col s6">
                                    <input value="{{ $head->strGarmentSegmentName }}" type="text" readonly>
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
                                      <input value="{{ $head->strMeasurementID }}" id="delInactiveHead" name="delInactiveHead" type="hidden">                                 
                                  </div>

                            <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                                  <div class="input-field">
                                    <input value="{{ $head->strInactiveReason }}" id="delInactiveReason" name="delInactiveReason" type="text" class="validate" required>
                                    <label for="measurement_desc">Reason for Deactivation </label>
                                  </div>
                            </div>
                            </div>

                              <div class="modal-footer col s12" style="background-color:#26a69a">
                                <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">OK</button>
                                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>  
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

                  <div id="addMeasurementInfo" class="modal modal-fixed-footer">
                    <h5><font color = "#1b5e20"><center>ADD NEW MEASUREMENT INFORMATION</center> </font> </h5> 
                      <form action="{{URL::to('addMeasurementCategory')}}" method="POST">
                        <div class="divider" style="height:2px"></div>
                        <div class="modal-content col s12">

                          <div class="input-field">
                            <input value="{{ $categoryNewID }}" id="addMeasurementID" name="addMeasurementID" type="text" hidden>
                          </div>

                      <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s6">                                                    
                              <select class="browser-default" required id="addCategory" name='addCategory'>                                      
                                  @foreach($category as $category_1)
                                    @if($category_1->boolIsActive == 1)  
                                      <option value="{{ $category_1->strGarmentCategoryID }}">{{ $category_1->strGarmentCategoryName }}</option>
                                    @endif
                                  @endforeach
                              </select>    
                          </div>        
                
                          <div class="input-field col s6">                                                    
                            <select class="browser-default" required id="addSegment" name='addSegment'>
                                @foreach($segment as $segment_1)
                                  @if($segment_1->boolIsActive == 1)
                                    <option value="{{ $segment_1->strGarmentSegmentID }}" class="{{ $segment_1->strCategory }}">{{ $segment_1->strGarmentSegmentName }}</option>
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
                    </form>
                  </div> 
                  
                </div> 
              </div>
            </div>
          </div>
        </div>
      
        <!--END OF MEASUREMENT CATEGORY-->

        <div id="tabDetails" class="hue col s12" style="background-color: #80d8ff;">

            <div class="row">
              <div class="col s12 m12 l12">
                <span class="page-title"><h4>Measurement Parts</h4></span>
              </div>
            </div>

            <div class="row">
              <div class="col s12 m12 l6">
                <button style="color:black; margin-right:35px; margin-left: 20px" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to add a new measurement detail to the table" href="#addMeasurementPart">ADD MEASUREMENT PART</button>
              </div>
            </div>

          <div class="row">
            <div class="col s12 m12 l12">
              <div class="card-panel">
                <span class="card-title"><h5><center>Measurement Parts</center></h5></span>
                <div class="divider"></div>
                <div class="card-content">
                  <div class="col s12 m12 l12 overflow-x">
                  <table class = "table centered data-measDet" align = "center" border = "1">
                    <thead>
                      <tr>
                        <th data-field="name">Measurement Name</th>
                        <th data-field="description">Measurement Description</th>
                        <th data-field="action">Edit</th>
                        <th data-field="action">Deactivate</th>
                      </tr>
                    </thead>

                    <tbody>
                      @foreach($detail as $detail)
                      @if($detail->boolIsActive == 1)
                      <tr>
                        <td>{{ $detail->strMeasurementDetailName }}</td>
                        <td>{{ $detail->strMeasurementDetailDesc }}</td>
                        <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to edit measurement detail" href="#edit{{ $detail->strMeasurementDetailID }}">EDIT</button></td>
                        <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to deactivate measurement detail from the table" href="#del{{ $detail->strMeasurementDetailID }}">DEACTIVATE</button>

                        <div id="edit{{ $detail->strMeasurementDetailID }}" class="modal modal-fixed-footer">
                          <h5><font color = "#1b5e20"><center>EDIT MEASUREMENT PART</center> </font> </h5>
                            <form action="{{URL::to('editMeasurementDetail')}}" method="POST"> 
                              <div class="divider" style="height:2px"></div>
                              <div class="modal-content col s12">
                                
                                    <div class="input-field">
                                      <input value="{{ $detail->strMeasurementDetailID }}" id="editDetailID" name="editDetailID" type="hidden">
                                    </div>

                              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                    <div class="input-field col s12">
                                      <input required value="{{ $detail->strMeasurementDetailName }}" id="editDetailName" name = "editDetailName" type="text" class="validateDetailName">
                                      <label for="measurement_name"> *Measurement Name </label>
                                    </div>
                              </div>

                              <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                                    <div class="input-field col s12">
                                      <input required value="{{ $detail->strMeasurementDetailDesc }}" id="editDetailDesc" name = "editDetailDesc" type="text" class="validateDetailDesc">
                                      <label for="measurement_desc">*Measurement Description </label>
                                    </div>
                              </div>
                              </div>

                              <div class="modal-footer col s12" style="background-color:#26a69a">
                                <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">Update</button>
                                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>  
                              </div>
                          </form>
                        </div>
                          <!--///////////////////////DELETE/////////////-->

                        <div id="del{{ $detail->strMeasurementDetailID }}" class="modal modal-fixed-footer">
                          <h5><font color = "#1b5e20"><center>ARE YOU SURE TO DEACTIVATE THIS MEASUREMENT PART?</center> </font> </h5>                            
                            <form action="{{URL::to('delMeasurementDetail')}}" method="POST"> 
                              <div class="divider" style="height:2px"></div>
                              <div class="modal-content col s12">
                                
                                  <div class="input-field">
                                    <input value="{{ $detail->strMeasurementDetailID }}" id="delDetailID" name="delDetailID" type="hidden">
                                  </div>

                            <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                  <div class="input-field col s12">
                                    <input value="{{ $detail->strMeasurementDetailName }}" type="text"  readonly>
                                    <label for="measurement_name"> Measurement Name </label>
                                  </div>
                            </div>

                            <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                  <div class="input-field col s12">
                                    <input value="{{ $detail->strMeasurementDetailDesc }}"type="text"  readonly>
                                    <label for="measurement_desc">Measurement Description </label>
                                  </div>
                            </div>

                                  <div class="input-field">
                                    <input value="{{ $detail->strMeasurementDetailID }}" id="delInactiveDetail" name="delInactiveDetail" type="hidden">
                                  </div>

                            <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                                  <div class="input-field col s12">
                                    <input value="{{ $detail->strInactiveReason }}" id="delInactiveReason" name="delInactiveReason" type="text"  required>
                                    <label for="measurement_desc">Reason for Deactivation </label>
                                  </div>
                            </div>
                            </div>

                              <div class="modal-footer col s12" style="background-color:#26a69a">
                                <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">OK</button>
                                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>  
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
          
                <div id="addMeasurementPart" class="modal modal-fixed-footer">
                  <h5><font color = "#1b5e20"><center>ADD NEW MEASUREMENT PART</center> </font> </h5>
                    <form action="{{URL::to('addMeasurementDetail')}}" method="POST">
                      <div class="divider" style="height:2px"></div>
                      <div class="modal-content col s12">
                        
                          <div class="input-field">
                            <input value="{{$detailNewID}}" id="addDetailID" name="addDetailID" type="text"  hidden>
                          </div>

                      <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s12">
                            <input required id="addDetailName" name= "addDetailName" type="text" class="validateDetailName" >
                            <label for="measurement_name"> *Measurement Name </label>
                          </div>
                      </div>

                      <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                          <div class="input-field col s12">
                            <input required id="addDetailDesc" name ="addDetailDesc" type="text" class="validateDetailDesc">
                            <label for="measurement_desc">*Measurement Description </label>
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