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

		      <!--ZIPPERS-->
      <div id="tabZipper" class="hue col s12" style="margin-top:45px; background-color: #80d8ff;">
        <div style="height:30px;"></div>

    <div class="row">
        <div class="col s12 m12 l12">
            <a class="right waves-effect waves-light modal-trigger btn-floating tooltipped btn-large light-green accent-1" data-position="left" data-delay="50" data-tooltip="Click to add a new zipper detail to the table" href="#addZipper" style="color:black; margin-right:35px; margin-left: 20px;"><i class="large mdi-content-add"></i></a>
        </div>
      </div> 

        <div class="row">
          <div class="col s12">
            <div class="card">
              <div class="card-content">
                <div class = "col s12 m12 l12 overflow-x">
                  <h5><font color = "#1b5e20"><center>Zippers</center> </font> </h5>
                  <table class = "table centered data-zipper" border="1">

                    <thead>
                      <tr>
                        <!--<th date-field= "Zipper ID">Zipper ID</th>-->
                        <th data-field="Zipper Brand">Zipper Brand</th>
                        <th data-field="Zipper Size">Zipper Size</th>
                        <th data-field="Zipper Color">Zipper Color</th>
                        <th data-field="Zipper Desc">Description</th>
                        <th data-field="ZipperImage">Image</th>
                        <th data-field="Zipper Desc">Edit</th>
                        <th data-field="ZipperImage">Deactivate</th>
                      </tr>
                    </thead>

                    <tbody>
                      @foreach($zippers as $zipper)
                      @if($zipper->boolIsActive == 1)
                      <tr>
                        <!--<td>{{$zipper->strMaterialZipperID}}</td>-->
                        <td>{{$zipper->strZipperBrand}}</td>
                        <td>{{$zipper->strZipperSize}}</td>
                        <td>{{$zipper->strZipperColor}}</td>
                        <td>{{$zipper->txtZipperDesc}}</td>
                        <td><img class="materialboxed" width="650" src="{{URL::asset($zipper->strZipperImage)}}"></td>
                        <td><a style="color:black" class="modal-trigger btn tooltipped btn-floating blue" data-position="bottom" data-delay="50" data-tooltip="Click to edit zipper detail" href="#edit{{$zipper->intZipperID}}"><i class="mdi-editor-mode-edit"></i></a></td>
                        <td><a style="color:black" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of zipper detail from the table" href="#del{{$zipper->intZipperID}}"><i class="mdi-action-delete"></i></a></td>
                            
                          <div id="edit{{$zipper->intZipperID}}" class="modal modal-fixed-footer">
                            <h5><font color = "#1b5e20"><center>EDIT ZIPPER</center> </font> </h5>
                            
                            {!! Form::open(['url' => 'maintenance/material-zipper/update', 'files' => 'true']) !!}
                              <div class="divider" style="height:2px"></div>
                              <div class="modal-content col s12"> 

                                <div class="input-field">
                                  <input id="editZipperID" name = "editZipperID" value = "{{$zipper->intZipperID}}" type="hidden">
                                </div>
                          
                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                <div class="input-field col s12">
                                  <input required id="editZipperBrand" name = "editZipperBrand" pattern="^[a-zA-Z\-'`]+(\s[a-zA-Z\-'`]+)?" value = "{{$zipper->strZipperBrand}}" type="text" class="validate">
                                  <label for="Zipper_Name"> Zipper Brand <span class="red-text"><b>*</b></span></label>
                                </div>
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                <div class="input-field col s6">
                                  <input required id="editZipperSize" name = "editZipperSize" value = "{{$zipper->strZipperSize}}" type="text" class="validate" pattern="^[a-zA-Z\-'`]+(\s[a-zA-Z\-'`]+)?">
                                  <label for="Zipper_Size"> Zipper Size <span class="red-text"><b>*</b></span></label>
                                </div>

                                <div class="input-field col s6">
                                  <input required id="editZipperColor" name = "editZipperColor" value = "{{$zipper->strZipperColor}}" type="text" class="validate" pattern="^[a-zA-Z\-'`]+(\s[a-zA-Z\-'`]+)?">
                                  <label for="Zipper_Color"> Zipper Color <span class="red-text"><b>*</b></span></label>
                                </div>
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                <div class="input-field">
                                  <input  id="editZipperDesc" name = "editZipperDesc" value = "{{$zipper->txtZipperDesc}}" type="text" class="validate">
                                  <label for="Zipper_Desc"> Description </label>
                                </div>
                          </div>
                         
                          <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                                <div class="file-field input-field">
                                  <div style="color:black" class="btn tooltipped btn-small center-text light-green lighten-2" data-position="bottom" data-delay="50" data-tooltip="May upload jpg, png, gif, bmp, tif, tiff files">
                                    <span>Upload Image</span>
                                    <input type="file" id="editImg" name="editImg" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
                                  </div>

                                  <div class="file-path-wrapper">
                                    <input value="{{$zipper->strZipperImage}}" class="file-path validate" id="editZipperImage" name="editZipperImage" type="text">
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
                        
                        

                          <div id="del{{$zipper->intZipperID}}" class="modal modal-fixed-footer">
                            <h5><font color = "#1b5e20"><center>ARE YOU SURE TO DEACTIVATE THIS ZIPPER?</center> </font> </h5>                            
                                
                              {!! Form::open(['url' => 'maintenance/material-zipper/destroy']) !!}
                                <div class="divider" style="height:2px"></div>                          
                                <div class="modal-content col s12">

                                  <div class="input-field">
                                    <input value="{{$zipper->intZipperID}}" id="delZipperID" name="delZipperID" type="hidden">
                                   </div>

                              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                  <div class="input-field col s12">
                                    <label for="Zipper_Name">Zipper Name </label>
                                    <input value="{{$zipper->strZipperBrand}}" id="delZipperName" name="delZipperName" type="text" readonly>
                                  </div>
                              </div>

                              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                  <div class="input-field col s6">
                                    <label for="Zipper_Size">Zipper Size </label>
                                    <input value="{{$zipper->strZipperSize}}" id="delZipperSize" name="delZipperSize" type="text" readonly>
                                  </div>

                                  <div class="input-field col s6">
                                    <label for="Zipper_Color">Zipper Color </label>
                                    <input value="{{$zipper->strZipperColor}}" id="delZipperColor" name="delZipperColor" type="text" readonly>
                                  </div>
                              </div>

                              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                  <div class="input-field col s12">
                                    <label for="Zipper_Desc">Description</label>
                                    <input value="{{$zipper->txtZipperDesc}}" id="delZipperColor" name="delZipperColor" type="text" readonly>
                                  </div>
                              </div>

                                 <div class="input-field col s12">
                                    <label for="inactive_reason"> Reason for Deactivation <span class="red-text"><b>*</b></span> </label>
                                    <input required value="{{$zipper->strZipperInactiveReason}}" id="delInactiveZipper" name="delInactiveZipper" type="text">
                                  </div>

                              <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                                <!--  <div class="input-field col s12">
                                    <input id="delInactiveReason" name = "delInactiveReason" value="{{$zipper->strZipperInactiveReason}}" type="text" class="validate" required>
                                    <label for="Thread_Color"> *Reason for Deactivation: </label>
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

	  <!--MODAL: add Zipper-->
  <div id="addZipper" class="modal modal-fixed-footer">
    <h5><font color = "#1b5e20"><center>ADD NEW ZIPPER</center> </font> </h5>
    
    {!! Form::open(['url' => 'maintenance/material-zipper' , 'method' => 'post', 'files' => 'true']) !!}
      <div class="divider" style="height:2px"></div>
      <div class="modal-content col s12">
    
        <div class="input-field">
          <input id="addZipperID" name = "addZipperID" value = "{{$newZipperID}}" type="hidden">
        </div>
        
      <div class = "col s12" style="padding:15px;  border:3px solid white;">            
        <div class="input-field col s12">
          <input required id="addZipperBrand" name = "addZipperBrand" type="text" class="validate" pattern="^[a-zA-Z\-'`]+(\s[a-zA-Z\-'`]+)?">
          <label for="Zipper_Name"> Zipper Brand <span class="red-text"><b>*</b></span></label>
        </div>
      </div>

      <div class = "col s12" style="padding:15px;  border:3px solid white;">
        <div class="input-field col s6">
          <input required id="addZipperSize" name = "addZipperSize" type="text" class="validate" pattern="^[a-zA-Z\-'`]+(\s[a-zA-Z\-'`]+)?">
          <label for="Zipper_Size"> Zipper Size <span class="red-text"><b>*</b></span></label>
        </div>

        <div class="input-field col s6">
          <input required id="addZipperColor" name = "addZipperColor" type="text" class="validate" pattern="^[a-zA-Z\-'`]+(\s[a-zA-Z\-'`]+)?">
          <label for="Zipper_Color"> Zipper Color <span class="red-text"><b>*</b></span></label>
        </div>
      </div>

      <div class = "col s12" style="padding:15px;  border:3px solid white;">
        <div class="input-field col s12">
          <input id="addZipperDesc" name = "addZipperDesc" type="text" class="validateDesc">
          <label for="Zipper_Desc"> Description </label>
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
        <button href="#!" type="reset" value="Reset" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</button> 
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
          $('.data-zipper').DataTable();
          $('select').material_select();
          
          setTimeout(function () {
            $('#flash_message').hide();
        }, 5000);
      } );
    </script>

@stop

  