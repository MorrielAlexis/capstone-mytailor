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
  
 <!--Add Garment Category-->
         @if (Input::get('success') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully added material!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif


      <!--Edit Garment Category-->
      @if (Input::get('successEdit') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully edited material!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif


      <!--Delete Garment Category-->
      @if (Input::get('successDel') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully deactivated material!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
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

				<!--THREADS-->
			      <div id="tabThread" class="hue col s12" style="margin-top:45px; background-color: #80d8ff;">
			        <div style="height:30px;"></div>


			       <div class="row">
			          <div class="col s12 m12 l12">
			              <a style="color:black; margin-right:35px; margin-left: 20px" class="right waves-effect waves-light modal-trigger btn-floating tooltipped btn-large light-green accent-1"style="color:black"  data-position="bottom" data-delay="50" data-tooltip="Click to add a new thread detail to the table" href="#addThread"><i class="large mdi-content-add"></i></a>
			          </div>
			        </div>                                 

			        <div class="row">
			          <div class="col s12">
			            <div class="card">
			              <div class="card-content">
			                <div class = "col s12 m12 l12 overflow-x">
			                  <h5><font color = "#1b5e20"><center>Threads</center> </font> </h5>
			                  <table class = "table centered data-thread" border = "1">

			                    <thead>
			                      <tr>
			                        <th data-field="Thread Brand">Thread Brand</th>
			                        <th data-field="Thread Color">Thread Color</th>
			                        <th data-field="Thread Desc">Description</th>
			                        <th data-field="ThreadImage">Image</th>
			                        <th data-field="Edit">Edit</th>
			                        <th data-field="Deactivate">Deactivate</th>
			                      </tr>
			                    </thead>

			                    <tbody>
			                      @foreach($threads as $thread)
			                      @if($thread->boolIsActive == 1)
			                      <tr>
			                        <td>{{ $thread->strThreadBrand }}</td>
			                        <td>{{ $thread->strThreadColor }}</td>
			                        <td>{{ $thread->strThreadDesc }}</td>
			                        <td><img class="materialboxed" width="650" src="{{URL::asset($thread->strThreadImage)}}"></td> 
			                        <td><a style="color:black" class="modal-trigger btn tooltipped btn-floating blue" data-position="bottom" data-delay="50" data-tooltip="Click to edit thread details" href="#edit{{ $thread->intThreadID }}"><i class="mdi-editor-mode-edit"></i></a></td>
			                        <td><a style="color:black" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of thread details from the table" href="#del{{ $thread->intThreadID }}"><i class="mdi-action-delete"></i></a></td>
			                            
			                          <!--EDIT THREADS-->
			                          <div id="edit{{ $thread->intThreadID }}" class="modal modal-fixed-footer">
			                            <h5><font color = "#1b5e20"><center>EDIT THREAD</center> </font> </h5>
			                            
			                            {!! Form::open(['url' => 'editThread']) !!}
			                              <div class="divider" style="height:2px"></div>
			                              <div class="modal-content col s12">


			                                <div class="input-field">
			                                  <input id="editThreadID" name = "editThreadID" value = "{{ $thread->intThreadID }}" type="hidden">
			                                </div>
			                          
			                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
			                                <div class="input-field col s12">
			                                  <input id="editThreadBrand" name = "editThreadBrand" value = "{{ $thread->strThreadBrand }}" type="text" class="validateName">
			                                  <label for="Thread_Brand"> *Thread Brand </label>
			                                </div>
			                          </div>

			                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
			                                <div class="input-field col s12">
			                                  <input id="editThreadColor" name = "editThreadColor" value = "{{ $thread->strThreadColor }}" type="text" class="validateColor">
			                                  <label for="Thread_Color"> *Thread Color </label>
			                                </div>
			                          </div>

			                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
			                                <div class="input-field col s12">
			                                  <input id="editThreadDesc" name = "editThreadDesc" value = "{{ $thread->strThreadDesc }}" type="text" class="validateDesc">
			                                  <label for="Thread_Color"> Description </label>
			                                </div>
			                          </div>

			                          <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
			                                <div class="file-field input-field col s12">
			                                  <div style="color:black" class="btn tooltipped btn-small center-text light-green lighten-2" data-position="bottom" data-delay="50" data-tooltip="May upload jpg, png, gif, bmp, tif, tiff files">
			                                    <span>Upload Image</span>
			                                    <input type="file" id="editImg" name="editImg" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
			                                  </div>

			                                  <div class="file-path-wrapper">
			                                    <input value="{{$thread->strThreadImage}}" class="file-path validate" id="editThreadImage" name="editThreadImage" type="text">
			                                  </div>                   
			                                </div> 
			                          </div>
			                          </div>    

			                              <div class="modal-footer col s12" style="background-color:#26a69a">
			                                <button type="submit" class="modal-action  waves-effect waves-green btn-flat">Update</button>
			                                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>   
			                              </div>
			                            {!! Form::close() !!}
			                          </div>
			                        
			                            <!--deactivate THREADS-->
			                          <div id="del{{ $thread->intThreadID }}" class="modal modal-fixed-footer">
			                              
			                              {!! Form::open(['url' => 'maintenance/material-thread/destroy']) !!}
			                                <h5><font color = "#1b5e20"><center>ARE YOU SURE TO DEACTIVATE THIS THREAD?</center> </font> </h5> 
			                                <div class="divider" style="height:2px"></div>
			                                <div class="modal-content col s12">
			         
			                                  <div class="input-field">
			                                    <input value="{{  $thread->intThreadID}}" id="delThreadID" name="delThreadID" type="hidden">
			                                  </div>

			                              <div class = "col s12" style="padding:15px;  border:3px solid white;">
			                                  <div class="input-field col s12">
			                                    <label for="first_name">Thread Brand </label>
			                                    <input value="{{$thread->strThreadBrand}}" id="delThreadBrand" name="delThreadBrand" type="text"  readonly>
			                                  </div>
			                              </div>
			                                    
			                              <div class = "col s12" style="padding:15px;  border:3px solid white;">            
			                                   <div class="input-field col s12">
			                                    <label for="middle_name">Thread Color </label>
			                                    <input value="{{$thread->strThreadColor}}" id="delThreadColor" name="delThreadColor" type="text" readonly>
			                                  </div>
			                              </div>

			                              <div class = "col s12" style="padding:15px;  border:3px solid white;">
			                                  <div class="input-field">
			                                    <input id="delThreadDesc" name = "delThreadDesc" value = "{{ $thread->strThreadDesc }}" type="text" readonly>
			                                    <label for="Thread_desc"> Description </label>
			                                  </div>
			                              </div>

			                                  <div class="input-field col s12">
			                                  	<label for="inactive_reason"> Reason for Deactivation <span class="red-text"><b>*</b></span></label>
			                                    <input value="{{$thread->strThreadInactiveReason}}" id="delInactiveThread" name="delInactiveThread" type="text">
			                                  </div>

			                              <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
			                                  <!--<div class="input-field col s12">
			                                    <input id="delInactiveReason" name = "delInactiveReason" value="{{$thread->strThreadInactiveReason}}" type="text" class="validate" required>
			                                    <label for="Thread_InactiveReason"> *Reason for Deactivation </label>-->
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

  <!--MODAL: add Thread-->
  <div id="addThread" class="modal modal-fixed-footer">
    <h5><font color = "#1b5e20"><center>ADD NEW THREAD</center> </font> </h5>
        
      {!! Form::open(['url' => 'addThread']) !!}
        <div class="divider" style="height:2px"></div>
        <div class="modal-content col s12">
    
        <div class="input-field">
            <input id="addThreadID" name = "addThreadID" value = "{{$newThreadID}}" type="hidden">
         </div>
       
    <div class = "col s12" style="padding:15px;  border:3px solid white;">             
        <div class="input-field col s12">
          <input required id="addThreadName" name = "addThreadName" type="text" class="validateName">
          <label for="Thread_Name"> *Thread Brand </label>
        </div>
    </div>

    <div class = "col s12" style="padding:15px;  border:3px solid white;">
        <div class="input-field col s12">
          <input required id="addThreadColor" name = "addThreadColor" type="text" class="validateColor">
          <label for="Thread_Color"> *Thread Color </label>
        </div>
    </div>

    <div class = "col s12" style="padding:15px;  border:3px solid white;">
        <div class="input-field col s12">
          <input required id="addThreadDesc" name = "addThreadDesc" type="text" class="validateDesc">
          <label for="Thread_Desc"> Description </label>
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
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a> 
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
          $('.data-thread').DataTable();
          $('.data-needle').DataTable();
          $('.data-button').DataTable();
          $('.data-zipper').DataTable();
          $('.data-hook').DataTable();
          $('select').material_select();
          
          setTimeout(function () {
            $('#success-message').hide();
        }, 5000);
      } );
    </script>

@stop

  