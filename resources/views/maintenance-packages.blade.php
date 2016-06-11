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

    <div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><h4>Packages</h4></span>
      </div>
    </div>

      <div class="col s6 left">
         <a class="right waves-effect waves-light modal-trigger btn-floating tooltipped btn-large light-green accent-1" data-position="bottom" data-delay="50"  data-tooltip="Click to create new package to the table" href="#addPackage" style="color:black; margin-right:35px; margin-left: 20px;"><i class="large mdi-content-add"></i></a>
      </div>
    </div>


    <div class="row">
      <div class="col s12 m12 l12">
        <div class="card-panel">
          <span class="card-title"><h5 style="color:#1b5e20"><center>List of Packages</center></h5></span>
          <div class="divider"></div>
          <div class="card-content">
              <div class="col s12 m12 l12 overflow-x">
              <table class = "table centered data-garmentsDetails" align = "center" border = "1">
                <thead>
                  <tr>
                    <!--<th data-field="id">Garment Details ID</th>-->
                    <th data-field="name">Package Name</th>
                    <th data-field="name">Segment 1</th>
                    <th data-field="name">Segment 2</th>
                    <th data-field="name">Segment 3</th>
                    <th data-field="name">Segment 4</th>
                    <th data-field="name">Segment 5</th>
                    <th data-field="name">Image</th>
                    <th data-field="address">Description</th>
                    <th data-field="Edit">Actions</th>
                  </tr>
                </thead>

                <tbody>
                  @foreach($packages as $packages)
                  @if($packages->boolIsActive == 1)
                  <tr>
                  <td>{{ $packages->strPackageName }}</td>
                    <td>{{ $packages->strSegmentName }}</td>
                    <td>{{ $packages->strSegmentName }}</td>
                    <td>{{ $packages->strSegmentName }}</td>
                    <td>{{ $packages->strSegmentName }}</td>
                    <td>{{ $packages->strSegmentName }}</td>
                    <td>{{ $packages->strSegmentName }}</td>
                    <td><img class="materialboxed" width="100%" height="100%" src="{{URL::asset($packages->strPackageImage)}}"></td>
                    <td>{{ $packages->strPackageDesc }}</td>
                    <td><a style="color:black" class="modal-trigger btn tooltipped btn-floating blue" data-position="bottom" data-delay="50" data-tooltip="Click to edit data of segment" href="#edit{{ $packages->strPackageID }}"><i class="mdi-editor-mode-edit"></i></a> 
                    <a style="color:black" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of segment from table" href="#del{{ $packages->strPackageID }}"><i class="mdi-action-delete"></i></a></td>
       
                      <div id="edit{{ $packages->strPackageID }}" class="modal modal-fixed-footer">
                        <h5><font color = "#1b5e20"><center>EDIT PACKAGE DETAILS</center> </font> </h5>
                          
                          {!! Form::open(['url' => 'maintenance/packages/update', 'files' => 'true']) !!}
                            <div class="divider" style="height:2px"></div>
                            <div class="modal-content col s12">

                              <div class="input-field">
                                <input value="{{ $packages->strPackageID }}" id="editPackageID" name="editPackageID" type="hidden"> 
                              </div>

                                <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">
                                <input required value="{{ $packages->strPackageName }}" pattern="[A-Za-z\s]+" id="editPackageName" name= "editPackageName" type="text" class="">
                                <label for="segment_name">Package Name </label>
                    <span id="left"></span></label>
                              </div>
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">                                                    
                                <select class="browser-default" id="editSegment1" name="editSegment1"required>
                                  <option value="" disabled selected>Choose a segment:</option>
                                  @foreach($segment as $segment_1)
                                    @if($packages->strPackageSeg1FK == $segment_1->strSegmentID && $segment_1->boolIsActive == 1)
                                      <option selected value="{{ $segment_1->strSegmentID }}">{{ $segment_1->strSegmentName }}</option>
                                    @elseif($segment_1->boolIsActive == 1)
                                      <option value="{{ $segment_1->strSegmentID }}">{{ $segment_1->strSegmentName }}</option>
                                    @endif
                                  @endforeach
                                </select>   
                              </div>  
                          </div> 

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">                                                    
                                <select class="browser-default" id="editSegment2" name="editSegment2"required>
                                  <option value="" disabled selected>Choose a segment:</option>
                                  @foreach($segment as $segment_2)
                                    @if($packages->strPackageSeg2FK == $segment_2->strSegmentID && $segment_2->boolIsActive == 1)
                                      <option selected value="{{ $segment_2->strSegmentID }}">{{ $segment_2->strSegmentName }}</option>
                                    @elseif($segment_2->boolIsActive == 1)
                                      <option value="{{ $segment_2->strSegmentID }}">{{ $segment_2->strSegmentName }}</option>
                                    @endif
                                  @endforeach
                                </select>   
                              </div>  
                          </div> 
                        
                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">                                                    
                                <select class="browser-default" id="editSegment3" name="editSegment3"required>
                                  <option value="" disabled selected>Choose a segment:</option>
                                  @foreach($segment as $segment_3)
                                    @if($packages->strPackageSeg3FK == $segment_3->strSegmentID && $segment_3->boolIsActive == 1)
                                      <option selected value="{{ $segment_3->strSegmentID }}">{{ $segment_3->strSegmentName }}</option>
                                    @elseif($segment_3->boolIsActive == 1)
                                      <option value="{{ $segment_3->strSegmentID }}">{{ $segment_3->strSegmentName }}</option>
                                    @endif
                                  @endforeach
                                </select>   
                              </div>  
                          </div> 

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">                                                    
                                <select class="browser-default" id="editSegment4" name="editSegment4"required>
                                  <option value="" disabled selected>Choose a segment:</option>
                                  @foreach($segment as $segment_4)
                                    @if($packages->strPackageSeg4FK == $segment_4->strSegmentID && $segment_4->boolIsActive == 1)
                                      <option selected value="{{ $segment_4->strSegmentID }}">{{ $segment_4->strSegmentName }}</option>
                                    @elseif($segment_4->boolIsActive == 1)
                                      <option value="{{ $segment_4->strSegmentID }}">{{ $segment_4->strSegmentName }}</option>
                                    @endif
                                  @endforeach
                                </select>   
                              </div>  
                          </div> 

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">                                                    
                                <select class="browser-default" id="editSegment5" name="editSegment5"required>
                                  <option value="" disabled selected>Choose a segment:</option>
                                  @foreach($segment as $segment_5)
                                    @if($packages->strPackageSeg5FK == $segment_5->strSegmentID && $segment_5->boolIsActive == 1)
                                      <option selected value="{{ $segment_5->strSegmentID }}">{{ $segment_5->strSegmentName }}</option>
                                    @elseif($segment_5->boolIsActive == 1)
                                      <option value="{{ $segment_5->strSegmentID }}">{{ $segment_5->strSegmentName }}</option>
                                    @endif
                                  @endforeach
                                </select>   
                              </div>  
                          </div> 

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s12">
                            <input required value = "{{ $packages->strPackageDesc }}" id="editPackageDesc" name= "editPackageDesc" type="text" class="validate" required data-position="bottom" pattern="^[a-zA-Z\-'`\s]{2,}$">
                            <label for="package_name">Package Description </label>
                          </div>
                      </div>

                      <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                          <div class="file-field input-field col s12">
                            <div style="color:black" class="btn tooltipped btn-small center-text light-green lighten-2" data-position="bottom" data-delay="50" data-tooltip="May upload jpg, png, gif, bmp, tif, tiff files">
                              <span>Upload Image</span>
                              <input id="editImg" name="editImg" type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
                            </div>
                          
                            <div class="file-path-wrapper">
                              <input value="{{$packages->strPackageImage}}" id="editImage" name="editImage" class="file-path validate" type="text" readonly="readonly">
                            </div>
                          </div>
                      </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                              <div class="input-field col s12">
                                <input  value="{{ $packages->strPackageDesc }}" id="editPackageDesc" name = "editPackageDesc" type="text" class="validate">
                               <label for="package_description">Package Description</label>
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
                      <div id="del{{ $packages->strPackageID }}" class="modal modal-fixed-footer">
                        <h5><font color = "#1b5e20"><center>ARE YOU SURE TO DEACTIVATE THIS PACKAGE?</center> </font> </h5>
                          
                          {!! Form::open(['url' => 'maintenance/packages/destroy']) !!}
                            <div class="divider" style="height:2px"></div>
                            <div class="modal-content col s12"> 

                              <div class="input-field">
                                <input value="{{ $packages->strPackageID }}" id="delPackageID" name="delPackageID" type="hidden">
                              </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">                                                    
                                  <input type="text" value="{{$packages->strPackageName}}" readonly>
                                  <label>Package Name</label>
                              </div>   
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">
                                <input value="{{ $packages->strPackageDesc }}" type="text" class="" readonly>
                                <label for="package_desc">Package Description </label>
                              </div>
                          </div>



                              <div class="input-field col s12">
                                <label for="inactive_reason"> Reason for Deactivation <span class="red-text"><b>*</b></span> </label>
                                <input required value="{{ $packages->strPackageInactiveReason }}" id="delInactivePackage" name="delInactivePackage" type="text">
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


              <div id="addPackage" class="modal modal-fixed-footer">
                <h5><font color = "#1b5e20"><center>CREATE NEW PACKAGE</center> </font> </h5> 
                
                {!! Form::open(['url' => 'maintenance/packages', 'method' => 'post', 'files' => 'true' ]) !!}
                  <div class="divider" style="height:2px"></div>
                  <div class="modal-content col s12">


                      <div class="input-field">
                        <input value="{{ $newID }}" id="addPackageID" name="addPackageID" type="hidden">
                      </div>

                  <div class = "col s12" style="padding:15px;  border:3px solid white;">
                      <div class="input-field col s12">
                        <input required id="addPackageName" name= "addPackageName" type="text" class="validate" data-position="bottom" pattern="^[a-zA-Z\-'`\s]{2,}$" class="active"  >
                        <label for="segment_name">Package Name<span class="red-text"><b>*</b></span></label>
                      </div>
                  </div>

                  <div class = "col s12" style="padding:15px;  border:3px solid white;">
                      <div class="input-field col s12">
                        <select class="browser-default" name='addSegment1' id='addSegment1' required>
                          <option value="" disabled selected>Choose a segment for your package:</option>
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
                        <select class="browser-default" name='addSegment2' id='addSegment2' required>
                          <option value="" disabled selected>Choose a segment for your package:</option>
                          @foreach($segment as $segment_2)
                            @if($segment_2->boolIsActive == 1) 
                              <option value="{{ $segment_2->strSegmentID }}">{{ $segment_2->strSegmentName }}</option>
                            @endif                       
                          @endforeach
                        </select> 
                      </div>  
                  </div>

                  <div class = "col s12" style="padding:15px;  border:3px solid white;">
                      <div class="input-field col s12">
                        <select class="browser-default" name='addSegment3' id='addSegment3' required>
                          <option value="" disabled selected>Choose a segment for your package:</option>
                          @foreach($segment as $segment_3)
                            @if($segment_3->boolIsActive == 1) 
                              <option value="{{ $segment_3->strSegmentID }}">{{ $segment_3->strSegmentName }}</option>
                            @endif                       
                          @endforeach
                        </select> 
                      </div>  
                  </div>

                  <div class = "col s12" style="padding:15px;  border:3px solid white;">
                      <div class="input-field col s12">
                        <select class="browser-default" name='addSegment4' id='addSegment4' required>
                          <option value="" disabled selected>Choose a segment for your package:</option>
                          @foreach($segment as $segment_4)
                            @if($segment_4->boolIsActive == 1) 
                              <option value="{{ $segment_4->strSegmentID }}">{{ $segment_4->strSegmentName }}</option>
                            @endif                       
                          @endforeach
                        </select> 
                      </div>  
                  </div>

                  <div class = "col s12" style="padding:15px;  border:3px solid white;">
                      <div class="input-field col s12">
                        <select class="browser-default" name='addSegment5' id='addSegment5' required>
                          <option value="" disabled selected>Choose a segment for your package:</option>
                          @foreach($segment as $segment_5)
                            @if($segment_5->boolIsActive == 1) 
                              <option value="{{ $segment_5->strSegmentID }}">{{ $segment_5->strSegmentName }}</option>
                            @endif                       
                          @endforeach
                        </select> 
                      </div>  
                  </div>

                  <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                      <div class="input-field col s12">
                        <input id="addPackageDesc" name = "addPackageDesc" type="text" class="validate"  data-position="bottom" >
                        <label for="segment_description">Package Description </label>
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
                    <button type="submit" name="send" id="send" class=" modal-action  waves-effect waves-green btn-flat">Add</button>
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
