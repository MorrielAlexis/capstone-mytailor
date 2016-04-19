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
  

      <!--Add Fabric Swatch-->
         @if (Input::get('success') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully added fabric swatch!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif

      <!--Edit Fabric Swatch-->
      @if (Input::get('successEdit') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully edited fabric swatch!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif


      <!--Deleted Fabric Swatch-->
      @if (Input::get('successDel') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully deleted fabric swatch!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
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

    <div class="row">
      <div class="col s12 m12 l12">
        <button style="color:black; margin-right:35px; margin-left: 20px" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to add a new swatch to the table" href="#addSwatches">ADD FABRIC SWATCH</button>
      </div>
    </div>
  </div>



  <div class="row">
    <div class="col s12 m12 l12">
    	<div class="card-panel">
        <span class="card-title"><h5 style="color:#1b5e20"><center>Swatches Details</center></h5></span>
        <div class="divider"></div>
        <div class="card-content">
            <div class="col s12 m12 l12 overflow-x">
   
      				<table class = "table centered data-swatches" align = "center" border = "1">
       				 <thead>
          				<tr>
                    <!--<th date-field="Swatch ID">Swatch ID</th>-->
              			<th data-field="Swatch fabric type Name">Swatch Fabric Type Name</th>
             		  	<th data-field="SwatchName">Swatch Name</th>
                    <th data-field="SwatchCode">Swatch Code</th>
              			<th data-field="SwatchImage">Image</th>
                    <th data-field="Edit">Edit</th>
                    <th data-field="Edit">Deactivate</th>

              		</tr>
                </thead>

              	<tbody>
                  @foreach($swatch as $swatch)
                    @if($swatch->boolIsActive == 1)
                  <tr>
                    <td>{{ $swatch->strFabricTypeName }}</td>
                    <td>{{ $swatch->strSwatchName }}</td>
                    <td>{{ $swatch->strSwatchCode }}</td>
                    <td><img class="materialboxed" width="100%" height="100%" src="{{URL::asset($swatch->strSwatchImage)}}"></td>
              		  <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to edit swatch detail" href="#edit{{ $swatch->strSwatchID }}">EDIT</button></td>
                    <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of swatch from the table" href="#del{{ $swatch->strSwatchID }}">DEACTIVATE</button>
    

                      <div id="edit{{$swatch->strSwatchID}}" class="modal modal-fixed-footer">                        
                        <h5><font color = "#1b5e20"><center>EDIT FABRIC SWATCH</center> </font> </h5>
                          <form action="{{URL::to('editSwatch')}}" method="POST" enctype="multipart/form-data">
                            <div class="divider" style="height:2px"></div>
                            <div class="modal-content col s12">
                                                      
                              <div class="input-field">
                                <input value = "{{ $swatch->strSwatchID }}" id="editSwatchID" name= "editSwatchID" type="hidden">
                              </div>

                        <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">
                                <select class="browser-default" required  name='editFabric'>
                                  <option disabled selected value="">*Fabric Type</option>
                                  @foreach($fabricType as $fab)
                                    @if($swatch->strSwatchFabricTypeName == $fab->strFabricTypeID && $fab->boolIsActive == 1)
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
                                <input required value="{{$swatch->strSwatchName}}" id="editSwatchName" name = "editSwatchName" type="text" class="validateSwatchName">
                                <label for="swatch_name">*Swatch Name </label>
                              </div>    

                              <div class="input-field col s6">
                                <input required value="{{$swatch->strSwatchCode}}" id="editSwatchCode" name = "editSwatchCode" type="text" class="validateSwatchCode">
                                <label for="swatch_code">*Swatch Code </label>
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
                          </form>
                          </div> 
                          <!--******************Soft Delete*************************-->
                      <div id="del{{$swatch->strSwatchID}}" class="modal modal-fixed-footer">                        
                        <h5><font color = "#1b5e20"><center>ARE YOU SURE TO DEACTIVATE THIS SWATCH?</center> </font> </h5>                           
                          <form action="{{URL::to('delSwatch')}}" method="POST"> 
                          <div class="divider" style="height:2px"></div>
                          <div class="modal-content col s12">  
                            
                              <div class="input-field">
                                <input value = "{{ $swatch->strSwatchID }}" id="delSwatchID" name= "delSwatchID" type="hidden">
                              </div>

                        <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">
                                  <input type="text" value="{{$swatch->strFabricTypeName}}" readonly>
                                  <label>Fabric Type</label>
                              </div>
                        </div>  

                        <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s6">
                                <input value="{{$swatch->strSwatchName}}" type="text" class="" readonly>
                                <label for="swatch_name">Swatch Name </label>
                              </div>    

                              <div class="input-field col s6">
                                <input value="{{$swatch->strSwatchCode}}" type="text" class="" readonly>
                                <label for="swatch_code">Swatch Code </label>
                              </div>
                        </div>

                              <div class="input-field">
                                <input value = "{{ $swatch->strSwatchID }}" id="delInactiveSwatch" name= "delInactiveSwatch" type="hidden">
                              </div>   

                        <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                              <div class="input-field col s12">
                                <input value="{{$swatch->strInactiveReason}}" id="delInactiveReason" name= "delInactiveReason" type="text" class="" required>
                                <label for="swatch_code">*Reason for Deactivation </label>
                              </div> 
                        </div>                
                        </div>
                          
                            <div class="modal-footer col s12" style="background-color:#26a69a">
                              <button type="submit" class=" modal-action waves-effect waves-green btn-flat">OK</button>
                              <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>  
                            </div>
                          </p>
                        </form>
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
              <form action="{{URL::to('addSwatch')}}" method="POST" id="addSwatch" name="addSwatch" enctype="multipart/form-data"> 
                <div class="divider" style="height:2px"></div>
                <div class="modal-content col s12">
 
                    <div class="input-field">
                      <input value = "{{$newID}}" id="addSwatchID" name= "addSwatchID" type="hidden">
                    </div>

                <div class = "col s12" style="padding:15px;  border:3px solid white;">
                    <div class="input-field col s12">
                      <select class="browser-default" name='addFabric' id='addFabric' required>
                         <option disabled selected value="">*Fabric Type</option>
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
                    <div class="input-field col s6">
                      <input required id="addSwatchName" name="addSwatchName" type="text" class="validateSwatchName">
                      <label for="swatch_name">*Swatch Name </label>
                    </div>    

                    <div class="input-field col s6">
                      <input required id="addSwatchCode" name = "addSwatchCode" type="text" class="validateSwatchCode">
                      <label for="swatch_code">*Swatch Code </label>
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
              </form>
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
            $('#success-message').hide();
        }, 5000);

      } );
    </script>
@stop