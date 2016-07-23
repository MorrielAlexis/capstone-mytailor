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

       @if (Session::has('flash_message_duplicate'))
        <div class="row" id="flash_message">
          <div class="col s12 m12 l12">
            <div class="card-panel red accent-1">
              <span class="alert alert-success"><i class="material-icons right" onclick="$('#flash_message').hide()">clear</i></span>
              <em> {!! session('flash_message_duplicate') !!}</em>
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


      <!--Reactivate Body Part Form-->

      @if (Input::get('successRec') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully added back Body Part Form!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
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


      <!--  <Data Dependency Message> -->
       @if (Input::get('success') == 'beingUsed')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel red">
              <span class="black-text" style="color:black">Sorry! Body Part Form cannot be deactivated! Body Part Form is still affiliated with other materials.<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif



     <!--  End of flash messages -->

    <div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><h4>Maintenance - Body Part Form</h4></span>
      </div>
    </div>

      <div class="col s6 left">
         <a class="right waves-effect waves-light modal-trigger btn-floating tooltipped btn-large light-green accent-1" data-position="bottom" data-delay="50"  data-tooltip="Click to add a new Body Part Form to the table" href="#addBodyForm" style="color:black; margin-right:35px; margin-left: 20px;"><i class="large mdi-content-add"></i></a>
      </div>
    </div>


    <div class="row">
      <div class="col s12 m12 l12">
        <div class="card-panel">
          <span class="card-title"><h5 style="color:#1b5e20"><center>Body Part Form</center></h5></span>
          <div class="divider"></div>
          <div class="card-content">
              <div class="col s12 m12 l12 overflow-x">
              <table class = "table centered data-garmentsDetails" align = "center" border = "1">
                <thead>
                  <tr>
                    <!--<th data-field="id">Garment Details ID</th>-->
                    <th data-field="BodyPartFK">Body Part</th>
                    <th data-field="BodyFormName">Body Part Form Name</th>
                    <th data-field="BodyFormImage">Image</th>
                    <th data-field="BodyFormDesc">Description</th>
                    <th data-field="Action">Actions</th>
                    
                  </tr>
                </thead>

                <tbody>
                  @foreach($bodyForm as $bodyForm)
                  @if($bodyForm->boolIsActive == 1)
                  <tr>
                    <td>{{ $bodyForm->strBodyPartCatName }}</td>
                    <td>{{ $bodyForm->strBodyFormName }}</td>
                    <td><img class="materialboxed" width="100%" height="100%" src="{{URL::asset($bodyForm->strBodyFormImage)}}"></td>
                    <td>{{ $bodyForm->txtBodyFormDesc }}</td>

                    <td><a style="color:black" class="modal-trigger btn tooltipped btn-floating blue" data-position="bottom" data-delay="50" data-tooltip="Click to edit data of body part" href="#edit{{ $bodyForm->strBodyFormID }}"><i class="mdi-editor-mode-edit"></i></a> 
                    <a style="color:black" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of body part from table" href="#del{{ $bodyForm->strBodyFormID }}"><i class="mdi-action-delete"></i></a></td>
       
                      <div id="edit{{ $bodyForm->strBodyFormID }}" class="modal modal-fixed-footer">
                        <h5><font color = "#1b5e20"><center>EDIT BODY PART FORM</center> </font> </h5>
                          
                          {!! Form::open(['url' => 'maintenance/body-part-form/update', 'files' => 'true']) !!}
                            <div class="divider" style="height:2px"></div>
                            <div class="modal-content col s12">

                              <div class="input-field">
                                <input value="{{ $bodyForm->strBodyFormID }}" id="editBodyFormID" name="editBodyFormID" type="hidden"> 
                              </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">                                                    
                                <select class="browser-default" id="editPartCategory" name="editPartCategory" required>
                                  <option value="" disabled selected>Choose body part:</option>
                                  @foreach($bodyPartCategory as $bodyPart)
                                    @if($bodyForm->strBodyPartFK == $bodyPart->strBodyPartCategoryID && $bodyPart->boolIsActive == 1)
                                      <option selected value="{{ $bodyPart->strBodyPartCategoryID }}">{{ $bodyPart->strBodyPartCatName }}</option>
                                    @elseif($bodyPart->boolIsActive == 1)
                                      <option value="{{ $bodyPart->strBodyPartCategoryID }}">{{ $bodyPart->strBodyPartCatName }}</option>
                                    @endif
                                  @endforeach
                                </select>   
                              </div>  
                          </div> 
                        
                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">
                                <input required value="{{ $bodyForm->strBodyFormName }}" id="editBodyFormName" name= "editBodyFormName" type="text" class="validate" pattern="^[a-zA-Z\-'`]+(\s[a-zA-Z\-'`]+)?">
                                <label for="bodyform_name">Body Form Name <span class="red-text"><b>*</b></span></label>
                              </div>
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                              <div class="input-field col s12">
                                <input  value="{{ $bodyForm->txtBodyFormDesc }}" id="BodyFormDesc" name = "editBodyFormDesc" type="text" class="validate">
                               <label for="bodyform_description">Description</label>
                              </div>
                          </div> 

                          <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                          <div class="file-field input-field col s12">
                            <div style="color:black" class="btn tooltipped btn-small center-text light-green lighten-2" data-position="bottom" data-delay="50" data-tooltip="May upload jpg, png, gif, bmp, tif, tiff files">
                              <span>Upload Image</span>
                              <input id="editImg" name="editImg" type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
                            </div>
                          
                            <div class="file-path-wrapper">
                              <input value="{{$bodyForm->strBodyFormImage}}" id="editImage" name="editImage" class="file-path validate" type="text" readonly="readonly">
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
                      <div id="del{{ $bodyForm->strBodyFormID }}" class="modal modal-fixed-footer">
                        <h5><font color = "#1b5e20"><center>ARE YOU SURE TO DEACTIVATE THIS BODY FORM?</center> </font> </h5>
                          
                          {!! Form::open(['url' => 'maintenance/body-part-form/destroy']) !!}
                            <div class="divider" style="height:2px"></div>
                            <div class="modal-content col s12"> 

                              <div class="input-field">
                                <input value="{{ $bodyForm->strBodyFormID }}" id="delBodyFormID" name="delBodyFormID" type="hidden">
                              </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">                                                    
                                  <input type="text" value="{{$bodyForm->strBodyPartCatName}}">
                                  <label>Body Part Category</label>
                              </div>   
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">
                                <input type="text" value="{{ $bodyForm->strBodyFormName }}" readonly>
                                <label for="Form Name">Body Part Form Name </label>
                              </div>
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">
                                <input value="{{ $bodyForm->txtBodyFormDesc }}" type="text" readonly>
                                <label for="bodyform_description">Description </label>
                              </div>
                          </div>

                              <div class="input-field col s12">
                                <label for="inactive_reason"> Reason for Deactivation <span class="red-text"><b>*</b></span> </label>
                                <input required value="{{ $bodyForm->strBodyFormInactiveReason }}" id="delInactiveBodyForm" name="delInactiveBodyForm" type="text">
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

             <!--  Create New Body Part -->


              <div id="addBodyForm" class="modal modal-fixed-footer">
                <h5><font color = "#1b5e20"><center>CREATE NEW BODY PART</center> </font> </h5> 
                
                {!! Form::open(['url' => 'maintenance/body-part-form', 'method' => 'post', 'files' => true ]) !!}
                  <div class="divider" style="height:2px"></div>
                  <div class="modal-content col s12">



                      <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                <input value = "{{$newID}}" id="strBodyFormID" name= "strBodyFormID" type="hidden">

                  <div class = "col s12" style="padding:15px;  border:3px solid white;">
                      <div class="input-field col s12">
                        <select class="browser-default" name='strBodyPartFK' id='strBodyPartFK' required>
                          <option value="" disabled selected>Choose Body Part Category:</option>
                          @foreach($bodyPartCategory as $bodyPartCategory_1)
                            @if($bodyPartCategory_1->boolIsActive == 1) 
                              <option value="{{ $bodyPartCategory_1->strBodyPartCategoryID }}">{{ $bodyPartCategory_1->strBodyPartCatName }}</option>
                            @endif                       
                          @endforeach
                        </select> 
                      </div>  
                  </div>

                  <div class = "col s12" style="padding:15px;  border:3px solid white;">
                      <div class="input-field col s12">
                        <input required id="strBodyFormName" name= "strBodyFormName" type="text" class="validate" data-position="bottom" pattern="^[a-zA-Z\-'`]+(\s[a-zA-Z\-'`]+)?" class="active"  placeholder="Dress">
                        <label for="bodyform_name">Body Part Form Name<span class="red-text"><b>*</b></span></label>
                      </div>
                  </div>

                   <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                      <div class="input-field col s12">
                        <input id="textBodyFormDesc" name = "textBodyFormDesc" type="text" class="validate"  data-position="bottom" >
                        <label for="bodyform_description">Description </label>
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
