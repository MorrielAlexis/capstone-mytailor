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


      <!--Reactivate Garment Segment-->
      @if (Input::get('successRec') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully added back garment segment!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
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


      <!--  <Data Dependency Message> -->
       @if (Input::get('success') == 'beingUsed')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel red">
              <span class="black-text" style="color:black">Sorry! Segment cannot be deactivated! Segment is still affiliated with other materials.<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
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

     <!--  End of flash messages -->

    <div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><h4>Garment Segment</h4></span>
      </div>
    </div>

      <div class="col s6 left">
         <a class="right waves-effect waves-light modal-trigger btn-floating tooltipped btn-large light-green accent-1" data-position="bottom" data-delay="50"  data-tooltip="Click to add a new segment to the table" href="#addSegment" style="color:black; margin-right:35px; margin-left: 20px;"><i class="large mdi-content-add"></i></a>
      </div>
    </div>


    <div class="row">
    	<div class="col s12 m12 l12">
    		<div class="card-panel">
   		    <span class="card-title"><h5 style="color:#1b5e20"><center>Garment Segments</center></h5></span>
   				<div class="divider"></div>
    			<div class="card-content">
              <div class="col s12 m12 l12 overflow-x">
      				<table class = "table centered data-garmentsDetails" align = "center" border = "1">
       			    <thead>
          				<tr>
              			<!--<th data-field="id">Garment Details ID</th>-->
             		   	<th data-field="name">Category Name</th>
                    <th data-field="name">Segment Name</th>
                    <th data-field="name">Starting Price</th>
                    <th data-field="description">Segment Description</th>
                    <th data-field="Sex">Sex </th>
                    <th data-field="days">Min Production Days</th>
                    <th data-field="Image">Image</th>
                    <th data-field="Edit">Actions</th>
                    
              		</tr>
                </thead>

                <tbody>
                  @foreach($segment as $segment)
                  @if($segment->boolIsActive == 1)
                  <tr>
             		    <td>{{ $segment->strGarmentCategoryName }}</td>
                    <td>{{ $segment->strSegmentName }}</td>
                    <td>{{ number_format($segment->dblSegmentPrice, 2) . ' PHP' }}</td>
              		  <td>{{ $segment->textSegmentDesc }}</td>
                    <td>
                      @if($segment->strSegmentSex == 'M') For men
                      @elseif($segment->strSegmentSex == 'F') For women
                      @endif
                    </td>
                    <td>{{ $segment->intMinDays }}</td>
                    <td><img class="materialboxed" width="100%" height="100%" src="{{URL::asset($segment->strSegmentImage)}}"></td>
              		  <td><a style="color:black" class="modal-trigger btn tooltipped btn-floating blue" data-position="bottom" data-delay="50" data-tooltip="Click to edit data of segment" href="#edit{{ $segment->strSegmentID }}"><i class="mdi-editor-mode-edit"></i></a> 
                    <a style="color:black" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of segment from table" href="#del{{ $segment->strSegmentID }}"><i class="mdi-action-delete"></i></a></td>
       
                      <div id="edit{{ $segment->strSegmentID }}" class="modal modal-fixed-footer">
                        <h5><font color = "#1b5e20"><center>EDIT GARMENT SEGMENT</center> </font> </h5>
                          
                          {!! Form::open(['url' => 'maintenance/garment-segment/update', 'files' => 'true']) !!}
                            <div class="divider" style="height:2px"></div>
                            <div class="modal-content col s12">

                              <div class="input-field">
                                <input value="{{ $segment->strSegmentID }}" id="editSegmentID" name="editSegmentID" type="hidden"> 
                              </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">                                                    
                                <select class="browser-default" id="editCategory" name="editCategory"required>
                                  <option value="" disabled selected>Choose garment category</option>
                                  @foreach($garment as $garm)
                                    @if($segment->strSegCategoryFK == $garm->strGarmentCategoryID && $garm->boolIsActive == 1)
                                      <option selected value="{{ $garm->strGarmentCategoryID }}">{{ $garm->strGarmentCategoryName }}</option>
                                    @elseif($garm->boolIsActive == 1)
                                      <option value="{{ $garm->strGarmentCategoryID }}">{{ $garm->strGarmentCategoryName }}</option>
                                    @endif
                                  @endforeach
                                </select>   
                              </div>  
                          </div> 
                        
                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">
                                <input required value="{{ $segment->strSegmentName }}" id="editSegmentName" name= "editSegmentName" type="text" class="validate" pattern="^[a-zA-Z\-'`]+(\s[a-zA-Z\-'`]+)?">
                                <label for="segment_name">Segment Name <span class="red-text"><b>*</b></span></label>
                              </div>
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">
                                <input required value="{{ $segment->dblSegmentPrice }}" id="editSegmentPrice" name= "editSegmentPrice" type="text" class="validate" pattern="^[1-9]\d{0,7}(?:\.\d{1,4})?|\.\d{1,4}$">
                                <label for="segment_name">Starting Price: <span class="red-text"><b>*</b></span></label>
                              </div>
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                              <div class="input-field col s12">
                                <input  value="{{ $segment->textSegmentDesc }}" id="SegmentDesc" name = "editSegmentDesc" type="text" class="validate">
                               <label for="segment_description">Segment Description</label>
                              </div>
                          </div>

                          <div class="input-field col s12" style="margin-top: 40px !important;">
                              <select required class="browser-default" name="editSegmentSex" id="editSegmentSex">
                                <option value="" disabled selected>Sex</option>
                                <option value="{{$segment->strSegmentSex}}">Male</option>
                                <option value="{{$segment->strSegmentSex}}">Female</option>
                              </select>
                              <label for="strSegmentSex" class="active">Sex<span class="red-text">*</span></label>
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s6">
                                <input required value="{{ $segment->intMinDays }}" id="editMinDays" name= "editMinDays" type="text" class="validate" pattern="^[0-9]*$" maxlength="2">
                                <label for="segment_name">Minimum Production Days:<span class="red-text"><b>*</b></span></label>
                              </div>
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                          <div class="file-field input-field col s12">
                            <div style="color:black" class="btn tooltipped btn-small center-text light-green lighten-2" data-position="bottom" data-delay="50" data-tooltip="May upload jpg, png, gif, bmp, tif, tiff files">
                              <span>Upload Image</span>
                              <input id="editImg" name="editImg" type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
                            </div>
                          
                            <div class="file-path-wrapper">
                              <input value="{{$segment->strSegmentImage}}" id="editImage" name="editImage" class="file-path validate" type="text" readonly="readonly">
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
                    <!--***************************Soft Delete********************************-->
                      <div id="del{{ $segment->strSegmentID }}" class="modal modal-fixed-footer">
                        <h5><font color = "#1b5e20"><center>ARE YOU SURE TO DEACTIVATE THIS GARMENT SEGMENT?</center> </font> </h5>
                          
                          {!! Form::open(['url' => 'maintenance/garment-segment/destroy']) !!}
                            <div class="divider" style="height:2px"></div>
                            <div class="modal-content col s12"> 

                              <div class="input-field">
                                <input value="{{ $segment->strSegmentID }}" id="delSegmentID" name="delSegmentID" type="hidden">
                              </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">                                                    
                                  <input type="text" value="{{$segment->strGarmentCategoryName}}">
                                  <label>Category Name</label>
                              </div>   
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">
                                <input value="{{ $segment->strSegmentName }}"type="text" readonly>
                                <label for="segment_name">Segment Name </label>
                              </div>
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">
                                <input value="{{ $segment->dblSegmentPrice }}"type="text" readonly>
                                <label for="segment_name">Starting Price:</label>
                              </div>
                          </div>


                         <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">                                                    
                                  <input type="text" value="{{$segment->strSegmentSex}}">
                                  <label>Sex</label>
                              </div>   
                          </div>

                            <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">                                                    
                                  <input type="text" value="{{$segment->strSegmentSex}}">
                                  <label>Sex</label>
                              </div>   
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">
                                <input value="{{ $segment->intMinDays }}" type="text" readonly>
                                <label for="Prod Days">Min Production Days: </label>
                              </div>
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">
                                <input value="{{ $segment->textSegmentDesc }}" type="text" readonly>
                                <label for="segment_description">Segment Description </label>
                              </div>
                          </div>

                              <div class="input-field col s12">
                                <label for="inactive_reason"> Reason for Deactivation <span class="red-text"><b>*</b></span> </label>
                                <input required value="{{ $segment->strSegInactiveReason }}" id="delInactiveSegment" name="delInactiveSegment" type="text">
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
                <h5><font color = "#1b5e20"><center>CREATE NEW GARMENT SEGMENT</center> </font> </h5> 
                
                {!! Form::open(['url' => 'maintenance/garment-segment', 'method' => 'post', 'files' => true ]) !!}
                  <div class="divider" style="height:2px"></div>
                  <div class="modal-content col s12">



                      <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                <input value = "{{$newID}}" id="strSegmentID" name= "strSegmentID" type="hidden">

                  <div class = "col s12" style="padding:15px;  border:3px solid white;">
                      <div class="input-field col s12">
                        <select class="browser-default" name='strSegCategoryFK' id='strSegCategoryFK' required>
                          <option value="" disabled selected>Choose garment category</option>
                          @foreach($garment as $garment_1)
                            @if($garment_1->boolIsActive == 1) 
                              <option value="{{ $garment_1->strGarmentCategoryID }}">{{ $garment_1->strGarmentCategoryName }}</option>
                            @endif                       
                          @endforeach
                        </select> 
                      </div>  
                  </div>

                  <div class = "col s12" style="padding:15px;  border:3px solid white;">
                      <div class="input-field col s12">
                        <input required id="strSegmentName" name= "strSegmentName" type="text" class="validate" data-position="bottom" pattern="^[a-zA-Z\-'`]+(\s[a-zA-Z\-'`]+)?" class="active"  placeholder="Dress">
                        <label for="segment_name">Segment Name<span class="red-text"><b>*</b></span></label>
                      </div>
                  </div>

                  <div class = "col s12" style="padding:15px;  border:3px solid white;">
                      <div class="input-field col s12">
                        <input required id="dblSegmentPrice" name= "dblSegmentPrice" type="text" class="validate" pattern="^[1-9]\d{0,7}(?:\.\d{1,4})?|\.\d{1,4}$" placeholder="Php500.00">
                        <label for="segment_name">Starting Price: <span class="red-text"><b>*</b></span></label>
                      </div>
                  </div>

                   <div class="input-field col s12" style="margin-top: 40px !important;">
                              <select required class="browser-default" name="strSegmentSex" id="strSegmentSex">
                                <option value="" disabled selected>Sex</option>
                                <option value="{{$segment->strSegmentSex}}">Male</option>
                                <option value="{{$segment->strSegmentSex}}">Female</option>
                              </select>
                              <label for="Sex" class="active">Sex<span class="red-text">*</span></label>
                  </div> 

                  <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s6">
                                <input required id="intMinDays" name= "intMinDays" type="text" class="validate" pattern="^[0-9]*$" maxlength="2">
                                <label for="min days">Minimum Production Days:<span class="red-text"><b>*</b></span></label>
                              </div>
                  </div>

                   <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                      <div class="input-field col s12">
                        <input id="textSegmentDesc" name = "textSegmentDesc" type="text" class="validate"  data-position="bottom" >
                        <label for="segment_description">Segment Description </label>
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
          $('.data-garmentsDetails').DataTable();
          $('.data-reactSegment').DataTable();
          $('select').material_select();

          setTimeout(function () {
            $('#flash_message').hide();
        }, 5000);

      } );
    </script>

@stop
