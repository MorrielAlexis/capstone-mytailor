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
              <span class="alert alert-success"><i class="materialtiny mdi-navigation-close rightns right" onclick="$('#flash_message').hide()"></i></span>
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

      <!--  <Data Dependency Message> -->
       @if (Input::get('success') == 'beingUsed')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel red">
              <span class="black-text" style="color:black">Sorry! Fabric cannot be deactivated! Fabric is still affiliated with other materials.<i class="tiny mdi-navigation-close right" onclick="$('#success-message').hide()"></i></span>
            </div>
          </div>
        </div>
      @endif

    <div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><h4>Maintenance -  Fabrics</h4></span>
      </div>
    </div>

      <div class="col s6 left">
         <a class="right waves-effect waves-light modal-trigger btn-floating tooltipped btn-large light-green accent-1" data-position="bottom" data-delay="50"  data-tooltip="Click to create new package to the table" href="#addPackage" style="color:black; margin-right:35px; margin-left: 20px;"><i class="large mdi-content-add"></i></a>
      </div>
    </div>


    <div class="row">
      <div class="col s12 m12 l12">
        <div class="card-panel">
          <span class="card-title"><h5 style="color:#1b5e20"><center>List of Fabrics</center></h5></span>
          <div class="divider"></div>
          <div class="card-content">
              <div class="col s12 m12 l12 overflow-x">
              <table class = "table centered data-fabrics" align = "center" border = "1">
                <thead>
                  <tr>
                    <!--<th data-field="id">Garment Details ID</th>-->
                    <th data-field="name">Type</th>
                    <th data-field="name">Pattern</th>
                    <th data-field="name">Color</th>
                    <th data-field="name">Thread Count</th>
                    <th data-field="name">Fabric Name</th>
                    <th data-field="name">Price</th>
                    <th data-field="name">Code</th>
                     <th data-field="price">Image</th>
                    <th data-field="days"> Description</th>
                    <th data-field="Edit">Actions</th>
                  </tr>
                </thead>

                <tbody>
                  @foreach($fabric as $fabric)
                  @if($fabric->boolIsActive == 1)
                  <tr>
                    <td>{{ $fabric->strFabricTypeName }}</td>
                    <td>{{ $fabric->strFabricPatternName }}</td>
                    <td>{{ $fabric->strFabricColorName }}</td>
                    <td>{{ $fabric->strFabricThreadCountName }}</td>
                    <td>{{ $fabric->strFabricName }}</td>
                    <td>{{ number_format($fabric->dblFabricPrice
                      , 2) . ' PHP' }}</td>
                    <td>{{ $fabric->strFabricCode }}</td>
                    <td><img class="materialboxed" width="100%" height="100%" src="{{URL::asset($fabric->strFabricImage)}}"></td>
                    <td>{{ $fabric->txtFabricDesc }}</td>
                    <td><a style="color:black" class="modal-trigger btn tooltipped btn-floating blue" data-position="bottom" data-delay="50" data-tooltip="Click to update fabric data" href="#edit{{ $fabric->strFabricID }}"><i class="mdi-editor-mode-edit"></i></a> 
                    <a style="color:black" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of segment from table" href="#del{{ $fabric->strFabricID }}"><i class="mdi-action-delete"></i></a></td>
       
                      <div id="edit{{ $fabric->strFabricID }}" class="modal modal-fixed-footer">
                        <h5><font color = "#1b5e20"><center>UPDATE FABRIC DETAILS</center> </font></h5>
                          
                          {!! Form::open(['url' => 'maintenance/fabric/update', 'files' => 'true']) !!}
                            <div class="divider" style="height:2px"></div>
                            <div class="modal-content col s12">

                              <div class="input-field">
                                <input value="{{ $fabric->strFabricID }}" id="editFabricID" name="editFabricID" type="hidden"> 
                              </div>
                          

                              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                  <div class="input-field col s12">                                                    
                                    <select class="browser-default" id="editFabricType" name="editFabricType" required>
                                      <option value="" disabled selected>Choose a fabric type:</option>
                                      @foreach($fabricType as $fabricType_1)
                                        @if($fabric->strFabricTypeFK == $fabricType_1->strFabricTypeID && $fabricType_1->boolIsActive == 1)
                                          <option selected value="{{ $fabricType_1->strFabricTypeID }}">{{ $fabricType_1->strFabricTypeName }}</option>
                                        @elseif($fabricType_1->boolIsActive == 1)
                                          <option value="{{ $fabricType_1->strFabricTypeID }}">{{ $fabricType_1->strFabricTypeName }}</option>
                                        @endif
                                      @endforeach
                                    </select>   
                                  </div>  
                              </div> 

                              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                  <div class="input-field col s12">                                                    
                                    <select class="browser-default" id="editFabricPattern" name="editFabricPattern" required>
                                      <option value="" disabled selected>Choose a pattern:</option>
                                      @foreach($fabricPattern as $fabricPattern_1)
                                        @if($fabric->strFabricPatternFK == $fabricPattern_1->strFabricPatternID && $fabricPattern_1->boolIsActive == 1)
                                          <option selected value="{{ $fabricPattern_1->strFabricPatternID }}">{{ $fabricPattern_1->strFabricPatternName }}</option>
                                        @elseif($fabricPattern_1->boolIsActive == 1)
                                          <option value="{{ $fabricPattern_1->strFabricPatternID }}">{{ $fabricPattern_1->strFabricPatternName }}</option>
                                        @endif
                                      @endforeach
                                    </select>   
                                  </div>  
                              </div> 
                        
                              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                  <div class="input-field col s12">                                                 
                                    <select class="browser-default" id="editFabricColor"  name="editFabricColor" required>
                                      <option value="" disabled selected>Choose a color:</option>
                                      @foreach($fabricColor as $fabricColor_1)
                                        @if($fabric->strFabricColorFK == $fabricColor_1->strFabricColorID && $fabricColor_1->boolIsActive == 1)
                                          <option selected value="{{ $fabricColor_1->strFabricColorID }}">{{ $fabricColor_1->strFabricColorName }}</option>
                                        @elseif($fabricColor_1->boolIsActive == 1)
                                          <option value="{{ $fabricColor_1->strFabricColorID }}">{{ $fabricColor_1->strFabricColorName }}</option>
                                        @endif
                                      @endforeach
                                    </select>   
                                  </div>  
                              </div> 

                              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                  <div class="input-field col s12">                                                    
                                    <select class="browser-default" id="editFabricThreadCount" name="editFabricThreadCount" required>
                                      <option value="" disabled selected>Choose a fabric thread count:</option>
                                      @foreach($threadCount as $threadCount_1)
                                        @if($fabric->strFabricThreadCountFK == $threadCount_1->strFabricThreadCountID && $threadCount_1->boolIsActive == 1)
                                          <option selected value="{{ $threadCount_1->strFabricThreadCountID }}">{{ $threadCount_1->strFabricThreadCountName }}</option>
                                        @elseif($threadCount_1->boolIsActive == 1)
                                          <option value="{{ $threadCount_1->strFabricThreadCountID }}">{{ $threadCount_1->strFabricThreadCountName }}</option>
                                        @endif
                                      @endforeach
                                    </select>   
                                  </div>  
                              </div> 

                              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                  <div class="input-field col s12">
                                    <input required value="{{ $fabric->strFabricName }}" id="editFabricName" name="editFabricName" type="text" class="validate" pattern="^([A-Za-z\-'`]+ )+[A-Za-z\-'`]+$|^[A-Za-z\-'`]+$" maxlength="30" minlength="2" >
                                    <label for="garment_name"> Fabric Name <span class="red-text"><b>*</b></span></label>
                                  </div>
                              </div>


                              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                  <div class="input-field col s12">
                                    <input required value = "{{ $fabric->dblFabricPrice }}" id="editFabricPrice" name= "editFabricPrice" type="text" class="validate"  data-position="bottom" pattern="^[1-9]\d{0,7}(?:\.\d{1,4})?|\.\d{1,4}$" minlength="2">
                                    <label for="days">Fabric Price:</label>
                                  </div>
                              </div>
                              

                              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                  <div class="input-field col s12">
                                    <input required value = "{{ $fabric->strFabricCode }}" id="editFabricCode" name= "editFabricCode" type="text" class="validate"  data-position="bottom" pattern="^[a-zA-Z\-'`\s\d]{2,}$" >
                                    <label for="days">Fabric Code:</label>
                                  </div>
                              </div>

                              <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                                  <div class="file-field input-field col s12">
                                    <div style="color:black" class="btn tooltipped btn-small center-text light-green lighten-2" data-position="bottom" data-delay="50" data-tooltip="May upload jpg, png, gif, bmp, tif, tiff files">
                                      <span>Upload Image</span>
                                      <input id="editImg" name="editImg" type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
                                    </div>
                                  
                                    <div class="file-path-wrapper">
                                      <input value="{{$fabric->strFabricImage}}" id="editImage" name="editImage" class="file-path validate" type="text" readonly="readonly">
                                    </div>
                                  </div>
                              </div>

                              <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                                  <div class="input-field col s12">
                                    <input  value="{{ $fabric->txtFabricDesc }}" id="editFabricDesc" name = "editFabricDesc" type="text" class="validate" >
                                   <label for="package_description">Fabric Description</label>
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
                      <div id="del{{ $fabric->strFabricID }}" class="modal modal-fixed-footer">
                        <h5><font color = "#1b5e20"><center>ARE YOU SURE TO DEACTIVATE THIS FABRIC?</center> </font> </h5>
                          

                          {!! Form::open(['url' => 'maintenance/fabric/destroy']) !!}
                            <div class="divider" style="height:2px"></div>
                            <div class="modal-content col s12"> 

                              <div class="input-field">
                                <input value="{{ $fabric->strFabricID }}" id="delFabricID" name="delFabricID" type="hidden">
                              </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">                                
                                 <input type="text" value="{{$fabric->strFabricName}}" readonly>
                                  <label>Fabric Name</label>
                              </div>   
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">
                                <input value="{{ $fabric->txtFabricDesc }}" type="text" class="" readonly>
                                <label for="package_desc">Fabric Description </label>
                              </div>
                          </div>



                              <div class="input-field col s12">
                                <label for="inactive_reason"> Reason for Deactivation <span class="red-text"><b>*</b></span> </label>
                                <input required value="{{ $fabric->strFabricInactiveReason }}" id="delInactiveFabric" name="delInactiveFabric" type="text">
                              </div>

                              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              </div>

                          </div>

                          <div class="modal-footer col s12" style="background-color:#26a69a">
                            <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">Deactivate</button>
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
                <h5><font color = "#1b5e20"><center>CREATE NEW FABRIC</center> </font> </h5> 
                
                {!! Form::open(['url' => 'maintenance/fabric', 'method' => 'post', 'files' => 'true' ]) !!}
                  <div class="divider" style="height:2px"></div>
                  <div class="modal-content col s12">
      
                <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                <input value = "{{$newID}}" id="strFabricID" name= "strFabricID" type="hidden">

                  <div class = "col s12" style="padding:15px;  border:3px solid white;">
                      <div class="input-field col s12">
                        <select class="browser-default" name='strFabricTypeFK' id='strFabricTypeFK' required>
                          <option value="" disabled selected>Choose a fabric type:</option>
                          @foreach($fabricType as $fabricType_1)
                            @if($fabricType_1->boolIsActive == 1) 
                              <option value="{{ $fabricType_1->strFabricTypeID }}">{{ $fabricType_1->strFabricTypeName }}</option>
                            @endif                       
                          @endforeach
                        </select> 
                      </div>  
                  </div>

                  <div class = "col s12" style="padding:15px;  border:3px solid white;">
                      <div class="input-field col s12">
                        <select class="browser-default" name='strFabricPatternFK' id='strFabricPatternFK' required>
                          <option value="" disabled selected>Choose a pattern:</option>
                          @foreach($fabricPattern as $fabricPattern_1)
                            @if($fabricPattern_1->boolIsActive == 1) 
                              <option value="{{ $fabricPattern_1->strFabricPatternID }}">{{ $fabricPattern_1->strFabricPatternName }}</option>
                            @endif                       
                          @endforeach
                        </select> 
                      </div>  
                  </div>

                  <div class = "col s12" style="padding:15px;  border:3px solid white;">
                      <div class="input-field col s12">
                        <select class="browser-default" name='strFabricColorFK' id='strFabricColorFK' required>
                          <option value="" disabled selected>Choose a color:</option>
                          @foreach($fabricColor as $fabricColor_1)
                            @if($fabricColor_1->boolIsActive == 1) 
                              <option value="{{ $fabricColor_1->strFabricColorID }}">{{ $fabricColor_1->strFabricColorName }}</option>
                            @endif                       
                          @endforeach
                        </select> 
                      </div>  
                  </div>

                  <div class = "col s12" style="padding:15px;  border:3px solid white;">
                      <div class="input-field col s12">
                        <select class="browser-default" name='strFabricThreadCountFK' id='strFabricThreadCountFK' required>
                          <option value="" disabled selected>Choose a thread count:</option>
                          @foreach($threadCount as $threadCount_1)
                            @if($threadCount_1->boolIsActive == 1) 
                              <option value="{{ $threadCount_1->strFabricThreadCountID }}">{{ $threadCount_1->strFabricThreadCountName }}</option>
                            @endif                       
                          @endforeach
                        </select> 
                      </div>  
                  </div>

                  <div class = "col s12" style="padding:15px;  border:3px solid white;">
                      <div class="input-field col s12">
                        <input required id="strFabricName" name= "strFabricName" type="text" class="validate" data-position="bottom" pattern="^[a-zA-Z\-'`\s\d]{2,}$" class="active"  placeholder="Tobacco Brown Plain">
                        <label for="segment_name">Fabric Name<span class="red-text"><b>*</b></span></label>
                      </div>
                  </div>

                  <div class = "col s12" style="padding:15px;  border:3px solid white;">
                      <div class="input-field col s12">
                            <input required  id="dblFabricPrice" name= "dblFabricPrice" type="text" class="validate"  data-position="bottom" pattern="^[1-9]\d{0,7}(?:\.\d{1,4})?|\.\d{1,4}$" minlength="2" placeholder="Php89.00">
                            <label for="days"><span class="red-text"><b>*</b></span>Fabric Price:</label>
                      </div>
                  </div>

                  <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s12">
                            <input required  id="strFabricCode" name= "strFabricCode" type="text" class="validate"  data-position="bottom" pattern="^[a-zA-Z\-'`\s\d]{2,}$" maxlength="4" minlength="4">
                            <label for="days"><span class="red-text"><b>*</b></span>Fabric Code:</label>
                          </div>
                  </div>

                  <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                      <div class="input-field col s12">
                        <input id="txtFabricDesc" name = "txtFabricDesc" type="text" class="validate"  data-position="bottom" placeholder="Pefect fabric for business suits." >
                        <label for="segment_description">Fabric Description:</label>
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
          $('.data-fabrics').DataTable();
          $('.data-reactSegment').DataTable();
          $('select').material_select();

          setTimeout(function () {
            $('#flash_message').hide();
        }, 5000);

      } );
    </script>

@stop
