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

     <div class="row">
        <div class="col s12 m12 l12">
        <span class="page-title"><h4>Materials Maintenance - Needle</h4></span>
        </div>
     </div>

      <div class="row">
        <div class="col s12 m12 l12">
            <a style="color:black; margin-right:35px; margin-left: 20px" class="right waves-effect waves-light modal-trigger btn-floating tooltipped btn-large light-green accent-1"style="color:black"  data-position="bottom" data-delay="50" data-tooltip="Click to add a new needle detail to the table" href="#addNeedle"><i class="large mdi-content-add"></i></a>
        </div>
      </div>  

        <div class="row">
          <div class="col s12">
            <div class="card">
              <div class="card-content">
                <div class = "col s12 m12 l12 overflow-x">
                  <h5><font color = "#1b5e20"><center>List of Needles</center> </font> </h5>
                  <table class = "table centered data-needle" border = "1">
                    <thead>
                      <tr>
                        <th data-field="Needle Brand">Needle Brand</th>
                        <th data-field="Needle Size">Needle Size</th>
                        <th data-field="Needle Desc">Description</th>
                        <th data-field="Needle Image">Image</th>
                        <th data-field="Needle Desc">Edit</th>
                        <th data-field="Needle Desc">Deactivate</th>
                  
                      </tr>
                    </thead>

                    <tbody>
                      @foreach($needles as $needle)
                        @if($needle->boolIsActive == 1)
                      <tr>
                        <td>{{$needle->strNeedleBrand}}</td>
                        <td>{{$needle->strNeedleSize}}</td>
                        <td>{{$needle->strNeedleDesc}}</td>
                        <td><img class="materialboxed" width="650" src="{{URL::asset($needle->strNeedleImage)}}"></td>
                        <td><a style="color:black" class="modal-trigger btn tooltipped btn-floating blue" data-position="bottom" data-delay="50" data-tooltip="Click to edit needle detail" href="#edit{{$needle->intNeedleID}}"><i class="mdi-editor-mode-edit"></i></a></td>
                        <td><a style="color:black" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of needle detail from the table" href="#del{{$needle->intNeedleID}}"><i class="mdi-action-delete"></i></a></td>
                            
                          <div id="edit{{$needle->intNeedleID}}" class="modal modal-fixed-footer">
                            <h5><font color = "#1b5e20"><center>EDIT NEEDLE</center> </font> </h5>
                              
                            {!! Form::open(['url' => 'maintenance/material-needle/update', 'files' => 'true']) !!}
                              <div class="divider" style="height:2px"></div>
                              <div class="modal-content col s12">

                                <div class="input-field">
                                  <input id="editNeedleID" name = "editNeedleID" value = "{{$needle->intNeedleID}}" type="hidden">
                                </div>
                          
                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                <div class="input-field col s12">
                                  <input required id="editNeedleBrand" name = "editNeedleBrand" value = "{{$needle->strNeedleBrand}}" type="text" class="validate" pattern="^[a-zA-Z\-'`]+(\s[a-zA-Z\-'`]+)?">
                                  <label for="Needle_Brand"> Needle Brand <span class="red-text"><b>*</b></span></label>
                                </div>
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                <div class="input-field col s12">
                                  <input required id="editNeedleSize" name = "editNeedleSize" value = "{{$needle->strNeedleSize}}" type="text" class="validate" pattern="^[a-zA-Z\-'`]+(\s[a-zA-Z\-'`]+)?">
                                  <label for="Needle_Size"> Needle Size <span class="red-text"><b>*</b></span></label>
                                </div>
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                <div class="input-field col s12">
                                  <input  id="editNeedleDesc" name = "editNeedleDesc" value = "{{$needle->strNeedleDesc}}" type="text" class="validate">
                                  <label for="Needle_Size"> Description </label>
                                </div>
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">                 
                                <div class="file-field input-field col s12">
                                  <div style="color:black" class="btn tooltipped btn-small center-text light-green lighten-2" data-position="bottom" data-delay="50" data-tooltip="May upload jpg, png, gif, bmp, tif, tiff files">
                                    <span>Upload Image</span>
                                    <input type="file" id="editImg" name="editImg" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
                                  </div>

                                  <div class="file-path-wrapper">
                                    <input value="{{$needle->strNeedleImage}}" class="file-path validate" id="editNeedleImage" name="editNeedleImage" type="text">
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
                        
                        

                          <div id="del{{$needle->intNeedleID}}" class="modal modal-fixed-footer">
                            <h5><font color = "#1b5e20"><center>ARE YOU SURE TO DEACTIVATE THIS NEEDLE?</center> </font> </h5> 
                            
                            {!! Form::open(['url' => 'maintenance/material-needle/destroy']) !!}
                              <div class="divider" style="height:2px"></div>
                              <div class="modal-content col s12">
                                
                                  <div class="input-field">
                                    <input value="{{$needle->intNeedleID}}" id="delNeedleID" name="delNeedleID" type="hidden">   
                                  </div>

                              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                  <div class="input-field col s12">
                                    <label for="needle_name">Needle Brand</label>
                                    <input value="{{$needle->strNeedleBrand}}" id="delNeedleName" name="delNeedleName" type="text"  readonly>
                                  </div>
                              </div>

                              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                   <div class="input-field col s12">
                                    <label for="needle_size">Needle Size </label>
                                    <input value="{{$needle->strNeedleSize}}" id="delNeedlSize" name="delNeedleSize" type="text"  readonly>
                                  </div>
                              </div>

                              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                  <div class="input-field col s12">
                                    <label for="needle_desc">Description </label>
                                    <input value="{{$needle->strNeedleDesc}}" id="delNeedleDesc" name="delNeedleDesc" type="text"  readonly>
                                  </div>
                              </div>

                                  <div class="input-field col s12">
                                    <label for="inactive_reason"> Reason for Deactivation <span class="red-text"><b>*</b></span></label>
                                    <input required value="{{$needle->strNeedleInactiveReason}}" id="delInactiveNeedle" name="delInactiveNeedle" type="text">
                                  </div>
                              </div>
                              

                              <div class="modal-footer col s12" style="background-color:#26a69a">
                                <button type="submit" class="waves-effect waves-green btn-flat">OK</button>
                                <button href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</button> 
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

    <!--MODAL: add Needle-->
  <div id="addNeedle" class="modal modal-fixed-footer">
    <h5><font color = "#1b5e20"><center>CREATE NEW NEEDLE</center> </font> </h5>   
        
      {!! Form::open(['url' => 'maintenance/material-needle', 'method' => 'post', 'files' => 'true']) !!}
        <div class="divider" style="height:2px"></div>
        <div class="modal-content col s12"> 

        <div class="input-field">
           <input id="intNeedleID" name = "intNeedleID" value = "{{$newNeedleID}}" type="hidden">
         </div>
         
        <div class = "col s12" style="padding:15px;  border:3px solid white;">           
          <div class="input-field col s12">
            <input required id="strNeedleBrand" name = "strNeedleBrand"  type="text" class="validate" pattern="^[a-zA-Z\-'`]+(\s[a-zA-Z\-'`]+)?">
            <label for="Needle_Name"> Needle Name<span class="red-text"><b>*</b></span> </label>
          </div>
        </div>

        <div class = "col s12" style="padding:15px;  border:3px solid white;">
          <div class="input-field col s12">
            <input required  id="strNeedleSize" name = "strNeedleSize" type="text" class="validate" pattern="^[a-zA-Z\-'`]+(\s[a-zA-Z\-'`]+)?">
            <label for="Needle_Size"> Needle Size <span class="red-text"><b>*</b></span></label>
          </div>
        </div>
              
        <div class = "col s12" style="padding:15px;  border:3px solid white;">      
          <div class="input-field col s12">
            <input  id="strNeedleDesc" name = "strNeedleDesc" type="text" class="validateDesc">
            <label for="Needle_Desc"> Description </label>
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
          $('.data-needle').DataTable();
          $('select').material_select();
          
          setTimeout(function () {
            $('#flash_message').hide();
        }, 5000);
      } );
    </script>

@stop

  