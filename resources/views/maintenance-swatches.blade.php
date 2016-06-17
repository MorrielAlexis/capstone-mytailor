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


      <!--Reactivate Fabric Swatch-->
      @if (Input::get('successRec') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully added back fabric swatch!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
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

    <div class="row">
      <div class="col s12 m12 l12">
      <span class="page-title"><h4>Fabric Swatch</h4></span>
      </div>
    </div>

    <div class="col s6 left">
         <a class="right waves-effect waves-light modal-trigger btn-floating tooltipped btn-large light-green accent-1" data-position="bottom" data-delay="50"  data-tooltip="Click to add a new swatch to the table" href="#addSwatches" style="color:black; margin-right:35px; margin-left: 20px;"><i class="large mdi-content-add"></i></a>
    </div>
  </div>
  



  <div class="row">
    <div class="col s12 m12 l12">
    	<div class="card-panel">
        <span class="card-title"><h5 style="color:#1b5e20"><center>Swatch Details</center></h5></span>
        <div class="divider"></div>
        <div class="card-content">
            <div class="col s12 m12 l12 overflow-x">
   
      				<table class = "table centered data-swatches" align = "center" border = "1">
       				 <thead>
          				<tr>
              			<th data-field="Swatch Type">Swatch Type</th>
             		  	<th data-field="SwatchName">Swatch Name</th>
                    <th data-field="SwatchCode">Swatch Code</th>
              			<th data-field="SwatchImage">Image</th>
                    <th data-field="Edit">Actions</th>
                 	</tr>
                </thead>
 
              	<tbody>
                  @foreach($swatch as $swatch)
                    @if($swatch->boolIsActive == 1)
                  <tr>
                    <td>{{ $swatch->strFabricTypeName }}</td>
                    <td>{{ $swatch->strSName }}</td>
                    <td>{{ $swatch->strSwatchCode }}</td>
                    <td><img class="materialboxed" width="100%" height="100%" src="{{URL::asset($swatch->strSwatchImage)}}"></td>
              		  <td><a style="color:black" class="modal-trigger btn tooltipped btn-floating blue" data-position="bottom" data-delay="50" data-tooltip="Click to edit swatch detail" href="#edit{{ $swatch->strSwatchID }}"><i class="mdi-editor-mode-edit"></i></a>
                    <a style="color:black" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of swatch from the table" href="#del{{ $swatch->strSwatchID }}"><i class="mdi-action-delete"></i></a></td>
    

                      <div id="edit{{$swatch->strSwatchID}}" class="modal modal-fixed-footer">                        
                        <h5><font color = "#1b5e20"><center>EDIT FABRIC SWATCH</center> </font> </h5>
                            
                          {!! Form::open(['url' => 'maintenance/swatch/update', 'files' => 'true']) !!}
                            <div class="divider" style="height:2px"></div>
                            <div class="modal-content col s12">
                                                      
                              <div class="input-field">
                                <input value = "{{ $swatch->strSwatchID }}" id="editSwatchID" name= "editSwatchID" type="hidden">
                              </div>

                        <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">
                                <select class="browser-default" required  name='editFabric' id="editFabric">
                                  <option disabled selected value="">Choose Swatch Type:</option>
                                  @foreach($fabricType as $fab)
                                    @if($swatch->strSwatchTypeFK == $fab->strFabricTypeID && $fab->boolIsActive == 1)
                                      <option selected value="{{ $fab->strFabricTypeID }}">{{ $fab->strFabricTypeName }}</option>
                                    @elseif($fab->boolIsActive == 1)
                                      <option value="{{ $fab->strFabricTypeID }}">{{ $fab->strFabricTypeName }}</option>
                                    @endif
                                  @endforeach
                                </select>
                                <!--<label>*Fabric Type</label>-->
                              </div>  
                        </div>

                        <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s6">   
                            <select class="browser-default editSwatchName"  required name='editSwatchName'>
                                  @foreach($swatchnamemainte as $swatchnamemainte_1)
                                    @if($swatch->strSwatchNameFK == $swatchnamemainte_1->strSwatchNameID && $swatchnamemainte_1->boolIsActive == 1)
                                      <option selected value="{{ $swatchnamemainte_1->strSwatchNameID }}" class="{{$swatchnamemainte_1->strSwatchTypeFK  }}">{{ $swatchnamemainte_1->strSName }}</option>
                                    @elseif($swatchnamemainte_1->boolIsActive == 1)
                                      <option value="{{ $swatchnamemainte_1->strSwatchNameID }}" class="{{$swatchnamemainte_1->strSwatchTypeFK  }}">{{ $swatchnamemainte_1->strSName }}</option>
                                    @endif
                                  @endforeach
                            </select>    
                          </div> 

                              <div class="input-field col s6">
                                <input required value="{{$swatch->strSwatchCode}}" id="editSwatchCode" name = "editSwatchCode" type="text" class="validate" pattern="^[a-zA-Z\-'`]+(\s[a-zA-Z\-'`]+)?">
                                <label for="swatch_code">Swatch Code <span class="red-text"><b>*</b></span></label>
                              </div>
                        </div>

                        <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                              <div class="file-field input-field col s12">
                                <div style="color:black" class="btn tooltipped btn-small center-text light-green lighten-2" data-position="bottom" data-delay="50" data-tooltip="May upload jpg, png, gif, bmp, tif, tiff files">
                                  <span>Upload Image</span>
                                  <input id="editImg" name="editImg" type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
                                </div>
                              
                                <div class="file-path-wrapper">
                                  <input value="{{$swatch->strSwatchImage}}" id="editSwatchImage" name="editSwatchImage" class="file-path validate" type="text" readonly="readonly">
                                </div>
                              </div>
                        </div>
                        </div>            
                              <div class="modal-footer col s12" style="background-color:#26a69a">
                                <button type="submit" class=" modal-action modal-close waves-effect waves-green btn-flat">Update</button>
                                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>  
                              </div>                          
                          {!! Form::close() !!}
                          </div> 
                          <!--******************Soft Delete*************************-->
                  <div id="del{{$swatch->strSwatchID}}" class="modal modal-fixed-footer">                        
                        <h5><font color = "#1b5e20"><center>ARE YOU SURE TO DEACTIVATE THIS SWATCH?</center> </font> </h5>                           
                        
                        {!! Form::open(['url' => 'maintenance/swatch/destroy']) !!}
                          <div class="divider" style="height:2px"></div>
                          <div class="modal-content col s12">  
                            
                              <div class="input-field">
                                <input value = "{{ $swatch->strSwatchID }}" id="delSwatchID" name= "delSwatchID" type="hidden">
                              </div>

                        <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">
                                  <input type="text" value="{{$swatch->strSwatchTypeFK}}" readonly>
                                  <label>Fabric Type</label>
                              </div>
                        </div>  

                        <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s6">
                                <input value="{{$swatch->strSName}}" type="text" class="" readonly>
                                <label for="swatch_name">Swatch Name </label>
                              </div>    

                              <div class="input-field col s6">
                                <input value="{{$swatch->strSwatchCode}}" type="text" class="" readonly>
                                <label for="swatch_code">Swatch Code </label>
                              </div>
                        </div>

                              <div class="input-field col s12">
                                <label for="inactive_reason"> Reason for Deactivation <span class="red-text"><b>*</b></span> </label>
                                <input value = "{{ $swatch->strSwatchInactiveReason }}" required id="delInactiveSwatch" name= "delInactiveSwatch" type="text">
                              </div>   

                        <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                              <!--<div class="input-field col s12">
                                <input value="{{$swatch->strSwatchInactiveReason}}" id="delInactiveReason" name= "delInactiveReason" type="text" class="" required>
                                <label for="swatch_code">*Reason for Deactivation </label>
                              </div> -->
                        </div>                
                        </div>
                          
                            <div class="modal-footer col s12" style="background-color:#26a69a">
                              <button type="submit" class=" modal-action waves-effect waves-green btn-flat">OK</button>
                              <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>  
                            </div>
                          </p>
                        {!! Form::close() !!}
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


                <!--    <Modal Structure for Add swatches> -->
            <div id="addSwatches" class="modal modal-fixed-footer">
             <h5><font color = "#1b5e20"><center>ADD NEW FABRIC SWATCH</center> </font> </h5>
              
              {!! Form::open(['url' => 'maintenance/swatch', 'method' => 'post', 'files' => 'true']) !!}
                <div class="divider" style="height:2px"></div>
                <div class="modal-content col s12">
 
                    <div class="input-field">
                      <input value = "{{$newID}}" id="addSwatchID" name= "addSwatchID" type="hidden">
                    </div>

                  <div class = "col s12" style="padding:15px;  border:3px solid white;">
                    <div class="input-field col s12">
                      <select class="browser-default" name='addFabric' id='addFabric' required>
                         <option disabled selected value="">Choose Swatch Name:</option>
                          @foreach($fabricType as $fab)
                            @if($fab->boolIsActive == 1)
                              <option value="{{ $fab->strFabricTypeID }}">{{ $fab->strFabricTypeName }}</option>
                            @endif
                          @endforeach
                      </select>
                      <!--<label>*Fabric Type</label>-->
                    </div> 
                  </div> 

                  <div class = "col s12" style="padding:15px;  border:3px solid white;">
                    <div class="input-field col s12">
                      <select class="browser-default" name='addSwatchName' id='addSwatchName' required>
                         <option disabled selected value="">Choose Swatch Category:</option>
                          @foreach($swatchnamemainte as $snmainte)
                            @if($snmainte->boolIsActive == 1)
                              <option value="{{ $snmainte->strSwatchNameID }}">{{ $snmainte->strSName }}</option>
                            @endif
                          @endforeach
                      </select>
                      <!--<label>*Fabric Type</label>-->
                    </div> 
                  </div> 

                <div class = "col s12" style="padding:15px;  border:3px solid white;">   

                    <div class="input-field col s12">
                      <input required id="addSwatchCode" name = "addSwatchCode" type="text" class="validate" pattern="^[a-zA-Z\-'`]+(\s[a-zA-Z\-'`]+)?">
                      <label for="swatch_code">Swatch Code <span class="red-text"><b>*</b></span></label>
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
                  <button type="submit" id="send" name="send" class=" modal-action waves-effect waves-green btn-flat">Add</button>
                  <button type="button" onclick="clearData()" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>  
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
    </script>

    
    <script>
      $(document).ready(function(){
    $('.materialboxed').materialbox();
     });
    </script>


    <script>
      function clearData(){
        document.getElementById('addSwatchName').value = "";
        document.getElementById('addSwatchCode').value = "";
        document.getElementById('addImage').value = "";
      }
    </script>

    <script type="text/javascript">
      $('.validateSwatchName').on('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z\'\-]+( [a-zA-Z\'\-]+)*$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      //Kapag Number
      $('.validateSwatchName').keyup(function() {
        var name = $(this).val();
        $(this).val(name.replace(/\d/, ''));
      });     

      //Kapag whitespace
      $('.validateSwatchName').blur('input', function() {
        var desc = $(this).val();
        $(this).val(desc.trim());
      }); 

      $('.validateSwatchName').blur('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z\'\-]+( [a-zA-Z\'\-]+)*$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      }); 

      $('.validateSwatchCode').on('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z0-9]+$/;
        var is_desc=re.test(input.val());
        if(is_desc){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      $('.validateSwatchCode').blur('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z0-9]+$/;
        var is_desc=re.test(input.val());
        if(is_desc){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      //Kapag space
      $('.validateSwatchCode').keyup(function() {
        var name = $(this).val();
        $(this).val(name.replace(/\s/, ''));
      });  
      </script>

         <!--DATA TABLE SCRIPT-->
    <script type="text/javascript">

      $(document).ready(function() {

          $('.data-swatches').DataTable();
          $('select').material_select();

          setTimeout(function () {
            $('#flash_message').hide();
        }, 5000);

      } );
    </script>
@stop