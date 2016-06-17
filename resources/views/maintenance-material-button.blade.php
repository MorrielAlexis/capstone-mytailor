@extends('layouts.master')

@section('content')
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
  
 <!--Add Fabric-->
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

     <!--Edit Fabric-->
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


      <!--Delete Fabric-->
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


      <!--Reactivate Garment Category-->
      @if (Input::get('successRec') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully reactivated material!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
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
              <span class="black-text" style="color:black">Sorry! Cannot deactivate the material. It's still being used!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif

	<div class="main-wrapper"  style="margin-top:30px">

      <!--BUTTONS-->
      <div id="tabButton" class="hue col s12" style="margin-top:45px; background-color: #80d8ff;">
        <div style="height:30px;"></div>

      <div class="row">
        <div class="col s12 m12 l12">
            <a class="right waves-effect waves-light modal-trigger btn-floating tooltipped btn-large light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to add a new button detail to the table" href="#addButton" style="color:black; margin-right:35px; margin-left: 20px;"><i class="large mdi-content-add"></i></a>
        </div>
      </div> 

        <div class="row">
          <div class="col s12">
            <div class="card">
              <div class="card-content">
                <div class = "col s12 m12 l12 overflow-x">
                  <h5><font color = "#1b5e20"><center>Buttons</center> </font> </h5>
                  <table class = "table centered data-button" border = "1">

                    <thead>
                      <tr>
                        <th data-field="Button Brand">Button Brand</th>
                        <th data-field="Button Size">Button Size</th>
                        <th data-field="Button Color">Button Color</th>
                        <th data-field="Button Color">Description</th>
                        <th data-field="ButtonImage">Image</th>
                        <th data-field="Button Color">Edit</th>
                        <th data-field="Button Color">Deactivate</th>
                      </tr>
                    </thead>

                    <tbody>
                      @foreach($buttons as $button)
                      @if($button->boolIsActive == 1)
                      <tr>
                        <td>{{$button->strButtonBrand}}</td>
                        <td>{{$button->strButtonSize}}</td>
                        <td>{{$button->strButtonColor}}</td>
                        <td>{{$button->strButtonDesc}}</td>
                        <td><img class="materialboxed" width="650" src="{{URL::asset($button->strButtonImage)}}"></td>
                        <td><a style="color:black" class="modal-trigger btn tooltipped btn-floating blue" data-position="bottom" data-delay="50" data-tooltip="Click to edit button detail" href="#edit{{$button->intButtonID}}"><i class="mdi-editor-mode-edit"></i></a></td>
                        <td><a style="color:black" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of button detail from the table" href="#del{{$button->intButtonID}}"><i class="mdi-action-delete"></i></a></td>
                           
                          <!-- <EDIT BUTTONS>   -->
                          <div id="edit{{$button->intButtonID}}" class="modal modal-fixed-footer">
                            <h5><font color = "#1b5e20"><center>EDIT BUTTON</center> </font> </h5>
                              
                            {!! Form::open(['url' => 'maintenance/material-button/update' , 'files' => 'true']) !!}
                              <div class="divider" style="height:2px"></div> 
                              <div class="modal-content col s12">

                                <div class="input-field">
                                  <input id="editButtonID" name = "editButtonID" value = "{{$button->intButtonID}}" type="hidden">
                                </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                <div class="input-field col s12">
                                  <input required id="editButtonBrand" name = "editButtonBrand" value = "{{$button->strButtonBrand}}" type="text" class="validate" pattern="^[a-zA-Z\-'`]+(\s[a-zA-Z\-'`]+)?">
                                  <label for="Button_Name"> Button Brand <span class="red-text"><b>*</b></span></label>
                                </div>
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                <div class="input-field col s6">
                                  <input required id="editButtonSize" name = "editButtonSize" value = "{{$button->strButtonSize}}" type="text" class="validate" pattern="^[a-zA-Z\-'`]+(\s[a-zA-Z\-'`]+)?">
                                  <label for="Button_Size"> Button Size <span class="red-text"><b>*</b></span></label>
                                </div>

                                <div class="input-field col s6">
                                  <input required id="editButtonColor" name = "editButtonColor" value = "{{$button->strButtonColor}}" type="text" class="validate" pattern="^[a-zA-Z\-'`]+(\s[a-zA-Z\-'`]+)?">
                                  <label for="Button_Color"> Button Color <span class="red-text"><b>*</b></span></label>
                                </div>
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                <div class="input-field col s12">
                                  <input  id="editButtonDesc" name = "editButtonDesc" value = "{{$button->strButtonDesc}}" type="text" class="validate">
                                  <label for="Button_Color"> Description </label>
                                </div>
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">               
                                <div class="file-field input-field col s12">
                                  <div style="color:black" class="btn tooltipped btn-small center-text light-green lighten-2" data-position="bottom" data-delay="50" data-tooltip="May upload jpg, png, gif, bmp, tif, tiff files">
                                    <span>Upload Image</span>
                                    <input type="file" id="editImg" name="editImg" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
                                  </div>
                                  <div class="file-path-wrapper">
                                    <input value="{{$button->strButtonImage}}" class="file-path validate" id="editButtonImage" name="editButtonImage" type="text">
                                  </div>
                                </div>                             
                          </div>
                          </div>    


                              <div class="modal-footer col s12" style="background-color:#26a69a">
                                <button type="submit" class="modal-action  waves-effect waves-green btn-flat">Update</button>
                                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>  
                              </div>
                            {!! Form::close() !!}  
                          </div>
                       
                       

                          <div id="del{{$button->intButtonID}}" class="modal modal-fixed-footer">
                            <h5><font color = "#1b5e20"><center>ARE YOU SURE TO DEACTIVATE THIS BUTTON?</center> </font> </h5>                             
                                
                              {!! Form::open(['url' => 'maintenance/material-button/destroy']) !!}
                                <div class="divider" style="height:2px"></div>
                                <div class="modal-content col s12">


                                  <div class="input-field">
                                   <input value="{{$button->intButtonID}}" id="delButtonID" name="delButtonID" type="hidden">
                                  </div>

                              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                  <div class="input-field col s12">
                                    <label for="Button_Name">Button Brand </label>
                                    <input value="{{$button->strButtonBrand}}" id="delButtonName" name="delButtonName" type="text" readonly>
                                  </div>
                              </div>

                              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                  <div class="input-field col s6">
                                    <label for="Button_Size">Button Size </label>
                                    <input value="{{$button->strButtonSize}}" id="delButtonSize" name="delButtonSize" type="text"  readonly>
                                  </div>

                                  <div class="input-field col s6">
                                    <label for="Button_Color">Button Color </label>
                                    <input value="{{$button->strButtonColor}}" id="delButtonColor" name="delButtonColor" type="text" readonly>
                                  </div>
                              </div>

                              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                   <div class="input-field col s12">
                                    <label for="Button_Desc">Description </label>
                                    <input value="{{$button->strButtonDesc}}" id="delButtonColor" name="delButtonColor" type="text"  readonly>
                                  </div>
                              </div>

                                  <div class="input-field col s12">
                                    <label for="inactive_reason"> Reason for Deactivation <span class="red-text"><b>*</b></span></label>
                                    <input required value="{{$button->strButtonInactiveReason}}" id="delInactiveButton" name="delInactiveButton" type="text">
                                  </div>

                              <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                                  <!--<div class="input-field col s12">
                                    <input id="delInactiveReason" name = "delInactiveReason" value="{{$button->strButtonInactiveReason}}" type="text" class="validate" required>
                                    <label for="Thread_Color"> *Reason for Deactivation </label>
                                  </div>-->
                              </div>
                              </div>

                              <div class="modal-footer col s12" style="background-color:#26a69a">
                                <button type="submit" class="waves-effect waves-green btn-flat">OK</button>
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
                <div class = "clearfix"></div>
              </div>
            </div>
          </div>
        </div>

      </div>
	
	</div>


  <!--MODAL: add Button-->
  <div id="addButton" class="modal modal-fixed-footer">
    <h5><font color = "#1b5e20"><center>ADD NEW BUTTON</center> </font> </h5>
      
    {!! Form::open(['url' => 'maintenance/material-button', 'files' => 'true' , 'method' => 'post']) !!}
      <div class="divider" style="height:2px"></div>
      <div class="modal-content col s12">
    
        <div class="input-field">
          <input id="addButtonID" name = "addButtonID" value = "{{$newButtonID}}" type="hidden">
        </div>
        
      <div class = "col s12" style="padding:15px;  border:3px solid white;">            
        <div class="input-field col s12">
          <input required  id="addButtonBrand" name = "addButtonBrand" type="text" class="validate" pattern="^[a-zA-Z\-'`]+(\s[a-zA-Z\-'`]+)?">
          <label for="Button_Name"> Button Name <span class="red-text"><b>*</b></span></label>
        </div>
      </div>

      <div class = "col s12" style="padding:15px;  border:3px solid white;">
        <div class="input-field col s6">
          <input required id="addButtonSize" name = "addButtonSize" type="text" class="validate" pattern="^[a-zA-Z\-'`]+(\s[a-zA-Z\-'`]+)?">
          <label for="Button_Size"> Button Size <span class="red-text"><b>*</b></span></label>
        </div>

        <div class="input-field col s6">
          <input required id="addButtonColor" name = "addButtonColor" type="text" class="validate" pattern="^[a-zA-Z\-'`]+(\s[a-zA-Z\-'`]+)?">
          <label for="Button_Color"> Button Color <span class="red-text"><b>*</b></span></label>
        </div>
      </div>

      <div class = "col s12" style="padding:15px;  border:3px solid white;">
        <div class="input-field col s12">
          <input id="addButtonDesc" name = "addButtonDesc" type="text" class="validate">
          <label for="Button_Desc"> Description </label>
        </div>
      </div>
         
      <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">                              
        <div class="file-field input-field col s12">
          <div style="color:black" class="btn tooltipped btn-small center-text light-green lighten-2" data-position="bottom" data-delay="50" data-tooltip="May upload jpg, png, gif, bmp, tif, tiff files">
            <span>Upload Image</span>
            <input type="file" id="addImg" name="addImg" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" id="addImage" name="addImage" type="text">
          </div>
        </div>
      </div>
      </div>
    
      <!--MODAL FOOTER-->
      <div class="modal-footer col s12" style="background-color:#26a69a">
        <button type="submit" class="modal-action  waves-effect waves-green btn-flat">Save</button>
        <button type="reset" value="Reset" href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</button> 
      </div>
    {!! Form::close() !!}
  </div>

@stop


@section('scripts')
  <script type="text/javascript">
  
      $('.validateName').on('input', function() {
          var input=$(this);
          var re = /^[a-zA-Z0-9\'\-]+( [a-zA-Z0-9\'\-]+)*$/;
          var is_name=re.test(input.val());
          if(is_name){input.removeClass("invalid").addClass("valid");}
          else{input.removeClass("valid").addClass("invalid");}
      });

      //Kapag Number
      $('.validateName').keyup(function() {
        var name = $(this).val();
        $(this).val(name.replace(/\d/, ''));
      });     

      //Kapag whitespace
      $('.validateName').blur('input', function() {
        var name = $(this).val();
        $(this).val(name.trim());
      });

      $('.validateName').blur('input', function() {
        var input=$(this);
        var re = /^[a-zA-Z0-9\'\-]+( [a-zA-Z0-9\'\-]+)*$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      }); 

      $('.validateSize').on('input', function() {
          var input=$(this);
          var $re = /^[a-zA-Z0-9]+( [a-zA-Z0-9]+)*$/;
          var is_name=re.test(input.val());
          if(is_name){input.removeClass("invalid").addClass("valid");}
          else{input.removeClass("valid").addClass("invalid");}
        });

      //Kapag whitespace
      $('.validateSize').blur('input', function() {
        var name = $(this).val();
        $(this).val(name.trim());
      });

      $('.validateSize').blur('input', function() {
        var input=$(this);
        var re = /^[a-zA-Z0-9]+( [a-zA-Z0-9]+)*$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      }); 

      $('.validateColor').on('input', function() {
          var input=$(this);
          var $re = /^[a-zA-Z\,]+( [a-zA-Z\,]+)*$/;
          var is_name=re.test(input.val());
          if(is_name){input.removeClass("invalid").addClass("valid");}
          else{input.removeClass("valid").addClass("invalid");}
        });

      //Kapag Number
      $('.validateColor').keyup(function() {
        var name = $(this).val();
        $(this).val(name.replace(/\d/, ''));
      });     

      //Kapag whitespace
      $('.validateColor').blur('input', function() {
        var name = $(this).val();
        $(this).val(name.trim());
      });

      $('.validateColor').blur('input', function() {
        var input=$(this);
        var re = /^[a-zA-Z\,]+( [a-zA-Z\,]+)*$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      }); 

      $('.validateDesc').blur('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z0-9\'\-\.\,]+( [a-zA-Z0-9\,\'\-\.]+)*$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      }); 
    
      //Kapag whitespace
      $('.validateDesc').blur('input', function() {
        var name = $(this).val();
        $(this).val(name.trim());
      });

      $('.validateDesc').on('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z0-9\'\-\.\,]+( [a-zA-Z0-9\,\'\-\.]+)*$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      }); 

  </script>
          <!--DATA TABLE SCRIPT-->
    <script type="text/javascript">
      $(document).ready(function() {
          $('.data-button').DataTable();
          $('select').material_select();
          
          setTimeout(function () {
            $('#flash_message').hide();
        }, 5000);
      } );
    </script>

@stop

  