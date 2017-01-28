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


      <!--Reactivate Garment Segment-->
      @if (Input::get('successRec') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully added back garment segment!<i class="tiny mdi-navigation-close right" onclick="$('#success-message').hide()"></i></span>
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

     <!--  End of flash messages -->

    <div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><h4>Maintenance - Standard Size Detail</h4></span>
      </div>
    </div>

      <div class="col s6 left">
         <a class="right waves-effect waves-light modal-trigger btn-floating tooltipped btn-large light-green accent-1" data-position="bottom" data-delay="50"  data-tooltip="Click to add a new segment to the table" href="#addSegment" style="color:black; margin-right:35px; margin-left: 20px;"><i class="large mdi-content-add"></i></a>
      </div>
    </div>


    <div class="row">
    	<div class="col s12 m12 l12">
    		<div class="card-panel">
   		    <span class="card-title"><h5 style="color:#1b5e20"><center>Standard Size Detail</center></h5></span>
   				<div class="divider"></div>
    			<div class="card-content">
              <div class="col s12 m12 l12 overflow-x">
      				<table class = "table centered data-stanSizeDet" align = "center" border = "1">
       			    <thead>
          				<tr>
              			<th data-field="StanSizeSegmentFK">Segment</th>
             		   	<th data-field="StanSizeMeasCatFK">Measurement Category</th>
                    <th data-field="StanSizeCategoryFK">Standard Size Category</th>
                    <th data-field="StanSizeDetailName">Detail Name</th>
                    <th data-field="StanSizeFitType">Fit Type</th>
                    <th data-field="StanSizeInch">Inch</th>
                    <th data-field="StanSizeCm">CM</th>
                    <th data-field="StanSizeDesc">Description</th>
                    <th data-field="Action">Actions</th>
                    
              		</tr>
                </thead>

                <tbody>
                  @foreach($standardDetail as $standardDetail)
                  @if($standardDetail->boolIsActive == 1)
                  <tr>
             		    <td>{{ $standardDetail->strSegmentName }}</td>
                    <td>{{ $standardDetail->strMeasurementCategoryName }}</td>
                    <td>{{ $standardDetail->strStandardSizeCategoryName }}</td>
                    <td>{{ $standardDetail->strStanSizeDetailName }}</td>
                    <td>{{ $standardDetail->strStanSizeFitType }}</td>
                    <td>{{ $standardDetail->dblStanSizeInch }}</td>
                    <td>{{ $standardDetail->dblStanSizeCm }}</td>
                    <td>{{ $standardDetail->txtStanSizeDesc }}</td>

                    <td><a style="color:black" class="modal-trigger btn tooltipped btn-floating blue" data-position="bottom" data-delay="50" data-tooltip="Click to edit data of segment" href="#edit{{ $standardDetail->strStandardSizeDetID }}"><i class="mdi-editor-mode-edit"></i></a> 
                    <a style="color:black" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of segment from table" href="#del{{ $standardDetail->strStandardSizeDetID }}"><i class="mdi-action-delete"></i></a></td>
       
                      <div id="edit{{ $standardDetail->strStandardSizeDetID }}" class="modal modal-fixed-footer">
                        <h5><font color = "#1b5e20"><center>UPDATE STANDARD SIZE DETAIL</center> </font> </h5>
                          
                          {!! Form::open(['url' => 'maintenance/standard-size-detail/update', 'files' => 'true']) !!}
                            <div class="divider" style="height:2px"></div>
                            <div class="modal-content col s12">

                              <div class="input-field">
                                <input value="{{ $standardDetail->strStandardSizeDetID }}" id="editStandardSizeDetID" name="editStandardSizeDetID" type="hidden"> 
                              </div>


                        <div class = "col s12" style="padding:15px;  border:3px solid white;"> 
                          <div class="input-field col s12">                                                   
                            <select class="browser-default editStandardDetSegment" id="{{ $standardDetail->strStandardSizeDetID }}" name='editStandardDetSegment'>
                                  @foreach($segment as $segment_1)
                                    @if($standardDetail->strStanSizeSegmentFK == $segment_1->strSegmentID && $segment_1->boolIsActive == 1)
                                      <option selected value="{{ $segment_1->strSegmentID }}" class="{{$segment_1->strSegmentFK}}">{{ $segment_1->strSegmentName }}</option>
                                    @elseif($segment_1->boolIsActive == 1)
                                      <option value="{{ $segment_1->strSegmentID }}" class="{{$segment_1->strStanSizeSegmentFK}}">{{ $segment_1->strSegmentName }}</option>
                                    @endif
                                  @endforeach
                            </select>     
                          </div> 
                        </div>   

                        <div class = "col s12" style="padding:15px;  border:3px solid white;"> 
                            <div class="input-field col s12">                                                   
                              <select class="browser-default editMeasCategory" id="{{ $standardDetail->strStandardSizeDetID }}" name='editMeasCategory' >
                                    @foreach($measurementCategory as $measurementCategory_1)
                                      @if($standardDetail->strStanSizeMeasCatFK == $measurementCategory_1->strMeasurementCategoryID && $measurementCategory_1->boolIsActive == 1)
                                        <option selected value="{{ $measurementCategory_1->strMeasurementCategoryID }}" class="{{$measurementCategory_1->strStanSizeMeasCatFK}}">{{ $measurementCategory_1->strMeasurementCategoryName }}</option>
                                      @elseif($measurementCategory_1->boolIsActive == 1)
                                        <option value="{{ $measurementCategory_1->strMeasurementCategoryID }}" class="{{$measurementCategory_1->strStanSizeMeasCatFK}}">{{ $measurementCategory_1->strMeasurementCategoryName }}</option>
                                      @endif
                                    @endforeach
                              </select>    
                            </div> 
                        </div>

                        <div class = "col s12" style="padding:15px;  border:3px solid white;"> 
                            <div class="input-field col s12">                                                   
                              <select class="browser-default editStandardSizeCategory" id="{{ $standardDetail->strStandardSizeDetID }}" name='editStandardSizeCategory' >
                                    @foreach($standard as $standard_1)
                                      @if($standardDetail->strStanSizeCategoryFK == $standard_1->strStandardSizeCategoryID && $standard_1->boolIsActive == 1)
                                        <option selected value="{{ $standard_1->strStandardSizeCategoryID }}" class="{{$standard_1->strStanSizeMeasCatFK}}">{{ $standard_1->strStandardSizeCategoryName }}</option>
                                      @elseif($standard_1->boolIsActive == 1)
                                        <option value="{{ $standard_1->strStandardSizeCategoryID }}" class="{{$standard_1->strStanSizeMeasCatFK}}">{{ $standard_1->strStandardSizeCategoryName }}</option>
                                      @endif
                                    @endforeach
                              </select>    
                            </div> 
                        </div>
                        

                         
                        
                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">
                                <input required value="{{ $standardDetail->strStanSizeDetailName }}" id="editStanSizeDetailName" name= "editStanSizeDetailName" type="text" class="validate" pattern="^[a-zA-Z\-'`]+(\s[a-zA-Z\-'`]+)?">
                                <label for="stanSizeDet_name">Standard Size Detail Name <span class="red-text"><b>*</b></span></label>
                              </div>
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">
                                <input required value="{{ $standardDetail->strStanSizeFitType }}" id="editStanSizeFitType" name= "editStanSizeFitType" type="text" class="validate" pattern="^[a-zA-Z\-'`]+(\s[a-zA-Z\-'`]+)?">
                                <label for="stanSizeDet_fitType">Fit Type <span class="red-text"><b>*</b></span></label>
                              </div>
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">
                                <input required value="{{ $standardDetail->dblStanSizeInch }}" id="editStanSizeInch" name= "editStanSizeInch" type="text" class="validate" pattern="^[0-9]*$" maxlength="4">
                                <label for="stansize_inch">Inch <span class="red-text"><b>*</b></span></label>
                              </div>
                          </div> 
                                                   
                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">
                                <input required value="{{ $standardDetail->dblStanSizeCm }}" id="editStanSizeCm" name= "editStanSizeCm" type="text" class="validate" pattern="^[0-9]*$" maxlength="4">
                                <label for="stanSizeDet_cm">Cm <span class="red-text"><b>*</b></span></label>
                              </div>
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                              <div class="input-field col s12">
                                <input  value="{{ $standardDetail->txtStanSizeDesc }}" id="editStanSizeDesc" name = "editStanSizeDesc" type="text" class="validate">
                               <label for="stanSizeDet_description">Description</label>
                              </div>
                          </div> 
                        </div>

                          <div class="modal-footer col s12" style="background-color:#26a69a">
                            <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">Update</button>
                            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>  
                          </div>
                        {!! Form::close() !!}
                      </div>
                    <!--***************************Soft Delete********************************-->
                      <div id="del{{ $standardDetail->strStandardSizeDetID }}" class="modal modal-fixed-footer">
                        <h5><font color = "#1b5e20"><center>ARE YOU SURE TO DEACTIVATE THIS STANDARD SIZE DETAIL?</center> </font> </h5>
                          
                          {!! Form::open(['url' => 'maintenance/standard-size-detail/destroy']) !!}
                            <div class="divider" style="height:2px"></div>
                            <div class="modal-content col s12"> 

                              <div class="input-field">
                                <input value="{{ $standardDetail->strStandardSizeDetID }}" id="delStandardSizeDetID" name="delStandardSizeDetID" type="hidden">
                              </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">
                                <input value="{{ $standardDetail->strStanSizeDetailName }}" type="text" readonly>
                                <label for="stanSizeDet_name">Detail Name </label>
                              </div>
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">
                                <input value="{{ $standardDetail->strStanSizeFitType }}" type="text" readonly>
                                <label for="stanSizeDet_type">Fit Type </label>
                              </div>
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">
                                <input value="{{ $standardDetail->dblStanSizeInch }}" type="text" readonly>
                                <label for="stanSizeDet_inch">Inch </label>
                              </div>
                          </div>
                                                   
                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">
                                <input value="{{ $standardDetail->dblStanSizeCm }}"type="text" readonly>
                                <label for="stanSizeDet_cm">Cm </label>
                              </div>
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                              <div class="input-field col s12">
                                <input required value="{{ $standardDetail->strStandardSizeDetInactiveReason }}" type="text" name="delStandardSizeDet" id="delStandardSizeDet">
                                <label for="stanSizeDet_desc"><span class="red-text"><b>*</b></span>Reason for Deactivation: </label>
                              </div>
                          </div>

                              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              </div>

                          </div>

                          <div class="modal-footer col s12" style="background-color:#26a69a">
                            <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">OK</button>
                            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>  
                          </div>
                        {!! Form::close() !!}
                      </div>
                      <!--***********************************************************-->
                    </td>
                    </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>

              </div>

              <div class = "clearfix">

              </div>

             <!--  Create New Segment -->


    			    <div id="addSegment" class="modal modal-fixed-footer">
                <h5><font color = "#1b5e20"><center>CREATE NEW STANDARD SIZE DETAIL</center> </font> </h5> 
                
                {!! Form::open(['url' => 'maintenance/standard-size-detail', 'method' => 'post', 'files' => true ]) !!}
                  <div class="divider" style="height:2px"></div>
                  <div class="modal-content col s12">



                      <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                <input value = "{{$newID}}" id="strStandardSizeDetID" name= "strStandardSizeDetID" type="hidden">

                   <div class = "col s12" style="padding:15px;  border:3px solid white;">
                      <div class="input-field col s12">
                        <select class="browser-default" name='strStanSizeSegmentFK' id='strStanSizeSegmentFK' >
                          <option value="" disabled selected>Choose a segment:</option>
                          @foreach($segment as $segment_1)
                            @if($segment_1->boolIsActive == 1) 
                              <option value="{{ $segment_1->strSegmentID }}">{{ $segment_1->strSegmentName }}</option>
                            @endif                       
                          @endforeach
                        </select> 
                      </div>  
                  </div>

                  <div class = "col s12" style="padding:15px;  border:3px solid white;">
                      <div class="input-field col s12">
                        <select class="browser-default" name='strStanSizeMeasCatFK' id='strStanSizeMeasCatFK' >
                          <option value="" disabled selected>Choose a measurement category:</option>
                          @foreach($measurementCategory as $measurementCategory_1)
                            @if($measurementCategory_1->boolIsActive == 1) 
                              <option value="{{ $measurementCategory_1->strMeasurementCategoryID }}">{{ $measurementCategory_1->strMeasurementCategoryName }}</option>
                            @endif                       
                          @endforeach
                        </select> 
                      </div>  
                  </div>

                   <div class = "col s12" style="padding:15px;  border:3px solid white;">
                      <div class="input-field col s12">
                        <select class="browser-default" name='strStanSizeCategoryFK' id='strStanSizeCategoryFK' >
                          <option value="" disabled selected>Choose a standard size category:</option>
                          @foreach($standard as $standard_1)
                            @if($standard_1->boolIsActive == 1) 
                              <option value="{{ $standard_1->strStandardSizeCategoryID }}">{{ $standard_1->strStandardSizeCategoryName }}</option>
                            @endif                       
                          @endforeach
                        </select> 
                      </div>  
                  </div>


                  <div class = "col s12" style="padding:15px;  border:3px solid white;">
                      <div class="input-field col s12">
                        <input required id="strStanSizeDetailName" name= "strStanSizeDetailName" type="text" class="validate" data-position="bottom" pattern="^[a-zA-Z\-'`]+(\s[a-zA-Z\-'`]+)?" class="active"  placeholder="Chest">
                        <label for="stanSizeDet_name">Standard Size Detail Name<span class="red-text"><b>*</b></span></label>
                      </div>
                  </div>

                  <div class = "col s12" style="padding:15px;  border:3px solid white;">
                      <div class="input-field col s12">
                        <input required id="strStanSizeFitType" name= "strStanSizeFitType" type="text" class="validate" data-position="bottom" pattern="^[a-zA-Z\-'`]+(\s[a-zA-Z\-'`]+)?" class="active"  placeholder="Normal Fit">
                        <label for="stanSizeDet_type">Fit Type<span class="red-text"><b>*</b></span></label>
                      </div>
                  </div>

                  <div class = "col s12" style="padding:15px;  border:3px solid white;">
                      <div class="input-field col s12">
                        <input required id="dblStanSizeInch" name= "dblStanSizeInch" type="text" class="validate" data-position="bottom" pattern="^[0-9]*$" class="active"  placeholder="15" maxlength="4">
                        <label for="stanSizeDet_inch">Inch<span class="red-text"><b>*</b></span></label>
                      </div>
                  </div>
                                                   
                  <div class = "col s12" style="padding:15px;  border:3px solid white;">
                      <div class="input-field col s12">
                        <input required id="dblStanSizeCm" name= "dblStanSizeCm" type="text" class="validate" data-positiow="bottom" pattern="^[0-9]*$" class="active"  placeholder="17" maxlength="4">
                        <label for="stanSizeDet_cm">Cm<span class="red-text"><b>*</b></span></label>
                      </div>
                  </div>

                  <div class = "col s12" style="padding:15px;  border:3px solid white;">
                      <div class="input-field col s12">
                        <input required id="txtStanSizeDesc" name= "txtStanSizeDesc" type="text" class="validate" data-position="bottom" class="active"  placeholder="Measurement around the neck.">
                        <label for="stanSizeDet_desc">Description<span class="red-text"><b>*</b></span></label>
                      </div>
                  </div>

                  <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">

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


@stop

@section('scripts')
    <script>
      $(document).ready(function(){
      $('select').material_select();
      });
    </script>}
    
    <script type="text/javascript">
      $('.validateSegName').on('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z\'\-]+( [a-zA-Z\'\-]+)*$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      //Kapag Number
      $('.validateSegName').keyup(function() {
        var name = $(this).val();
        $(this).val(name.replace(/\d/, ''));
      });       

      //Kapag whitespace
      $('.validateSegName').blur('input', function() {
        var desc = $(this).val();
        $(this).val(desc.trim());
      }); 

      $('.validateSegName').blur('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z\'\-]+( [a-zA-Z\'\-]+)*$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      }); 

      //Kapag whitespace
      $('.validateSegDesc').blur('input', function() {
        var desc = $(this).val();
        $(this).val(desc.trim());
      }); 

      $('.validateSegDesc').on('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z0-9\'\-\.\,]+( [a-zA-Z0-9\,\'\-\.]+)*$/;
        var is_desc=re.test(input.val());
        if(is_desc){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      $('.validateSegDesc').blur('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z0-9\'\-\.\,]+( [a-zA-Z0-9\,\'\-\.]+)*$/;
        var is_desc=re.test(input.val());
        if(is_desc){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      }); 
      </script>
      
         // <!--DATA TABLE SCRIPT-->

    <script type="text/javascript">

      $(document).ready(function() {
          $('.data-stanSizeDet').DataTable();
          $('select').material_select();

          setTimeout(function () {
            $('#flash_message').hide();
        }, 5000);

      } );
    </script>

@stop
