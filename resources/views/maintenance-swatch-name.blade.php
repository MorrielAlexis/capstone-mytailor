@extends('layouts.master')

@section('content')
  <div class="main-wrapper" style="margin-top:30px">  <!-- Main Wrapper  -->   
      <!--Input Validation-->

      <!--Add Swatch Name-->
         @if (Input::get('success') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully added swatch name!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif
    <div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><h4>Swatch Name</h4></span>
      </div> 
    </div>

      <div class="col s6 left">
         <a class="right waves-effect waves-light modal-trigger btn-floating tooltipped btn-large light-green accent-1" data-position="bottom" data-delay="50"  data-tooltip="CLick to add a new role to the table" href="#addFabricType" style="color:black; margin-right:35px; margin-left: 20px;"><i class="large mdi-content-add"></i></a>
      </div>
    </div>
   <!-- End of Main Wrapper  --> 



  <div class="row"> <!-- row -->

    	<div class="col s12 m12 l12">  <!-- col s12 m12 l12 -->

    		<div class="card-panel">  <!-- card-panel -->
   		    <span class="card-title"><h5 style="color:#1b5e20"><center>Swatch Name</center></h5></span>
   				<div class="divider"> </div>
            <div class="card-content"><!-- card-content  --> 

              <div class="col s12 m12 l12 overflow-x">

       				<table class = "table centered data-swatchName" align = "center" border = "1">
                <thead>
                  <tr>
              		  <!--<th data-field="fabricID">Fabric Type ID</th>-->
                    <th data-field="swatchNameType">Type</th>
                    <th data-field="swatchName">Name</th>
              		  <th data-field="swatchDescription">Description</th>
                    <th data-field="Edit">Actions</th>
                    

              	  </tr>
                </thead>
              
                <tbody>
                   @foreach($swatchnamemainte as $swatchnamemainte)
                     @if($swatchnamemainte->boolIsActive == 1)
                  <tr>
                    <td>{{ $swatchnamemainte->strFabricTypeName}}</td>
               		  <td>{{ $swatchnamemainte->strSName}}</td>
              		  <td>{{ $swatchnamemainte->txtSwatchNameDesc}}</td>
              		  <td><a style="color:black" class="modal-trigger btn tooltipped btn-floating blue" data-position="bottom" data-delay="50" data-tooltip="Click to edit data of swatch name" href="#edit{{$swatchnamemainte->strSwatchNameID}}"><i class="mdi-editor-mode-edit"></i></a>
                    <a style="color:black" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of swatch name from the table" href="#del{{$swatchnamemainte->strSwatchNameID}}"><i class="mdi-action-delete"></i></a></td>
              	
                    <div id="edit{{$swatchnamemainte->strSwatchNameID}}" class="modal modal-fixed-footer"> <!-- editFabricType  --> 
                      <h5><font color = "#1b5e20"><center>EDIT SWATCH NAME</center> </font> </h5>
                        {!! Form::open(['url' => 'maintenance/swatch-name/update']) !!}
                        <div class="divider" style="height:2px"></div>
                        <div class="modal-content col s12">
                        
                        <div class="input-field">
                          <input value = "{{$swatchnamemainte->strSwatchNameID}}" id="editSwatchNameID" name = "editSwatchNameID" type="hidden">
                        </div>

                         <div class = "col s12" style="padding:15px;  border:3px solid white;">
                              <div class="input-field col s12">                                                    
                                <select class="browser-default" id="editCategory" name="editCategory"required>
                                  <option value="" disabled selected>Choose fabric type:</option>
                                  @foreach($fabricType as $fab)
                                    @if($swatchnamemainte->strSwatchNameTypeFK == $fab->strFabricTypeID && $fab->boolIsActive == 1)
                                      <option selected value="{{ $fab->strFabricTypeID }}">{{ $fab->strFabricTypeName }}</option>
                                    @elseif($fab->boolIsActive == 1)
                                      <option value="{{ $fab->strFabricTypeID }}">{{ $fab->strFabricTypeName }}</option>
                                    @endif
                                  @endforeach
                                </select>  
                                <!-- <label >Type<span class="red-text"><b>*</b></span></label>  -->
                              </div>  
                          </div> 




                  <div class = "col s12" style="padding:15px;  border:3px solid white;">
                        <div class="input-field col s12">
                          <input required value = "{{$swatchnamemainte->strSName}}" id="editSName" name = "editSName" type="text" pattern="^[a-zA-Z\-'`\s]{2,}$" class="validate" required data-position="bottom">
                          <label for="swatch_name">Swatch Name <span class="red-text"><b>*</b></span> </label>
                        </div>
                  </div>

                  <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                        <div class="input-field col s12">
                          <input  value = "{{$swatchnamemainte->txtSwatchNameDesc}}" id="editSwatchNameDesc" name = "editSwatchNameDesc" type="text" class="validate">
                          <label for="swatch_description">Swatch Desription </label>
                        </div>  
                  </div>
                  </div>

                      <div class="modal-footer col s12" style="background-color:#26a69a">
                        <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">Update</button>
                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat" button type="reset" value="Reset">Cancel</a> 
                      </div>
                      {!! Form::close() !!}
                    </div> <!-- editFabricType  -->    
                  

              <!--**********DELETE***********-->
              <div id="del{{$swatchnamemainte->strSwatchNameID}}" class="modal modal-fixed-footer">                     
                <h5><font color = "#1b5e20"><center>ARE YOU SURE TO DEACTIVATE THIS SWATCH NAME?</center> </font> </h5>                       
                   {!! Form::open(['url' => 'maintenance/swatch-name/destroy']) !!}  
                  
                    <div class="divider" style="height:2px"></div>
                    <div class="modal-content col s12">
                      
                          <div class="input-field">
                            <input value="{{$swatchnamemainte->strSwatchNameID}}" id="delSwatchNameID" name="delSwatchNameID" type="hidden">
                          </div>

                      <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s12">
                            <label for="swatch_name">Swatch Name </label>
                            <input value="{{$swatchnamemainte->strSName}}" id="delSwatchName" name="delSwatchName" type="text" readonly>
                          </div>
                      </div>

                      <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s12">
                            <label for="swatch_desc">Swatch Desription </label>
                            <input value="{{$swatchnamemainte->txtSwatchNameDesc}}" id="delSwatchDesc" name="delSwatchDesc" type="text" readonly>
                          </div>
                      </div>

                          <div class="input-field col s12">
                            <label for="inactive_reason"> Reason for Deactivation <span class="red-text"><b>*</b></span> </label>
                            <input value="{{$swatchnamemainte->strSwatchNameInactiveReason}}" id="delInactiveSwatchName" name="delInactiveSwatchName" type="text">
                          </div>

                      <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                           
                      </div>
                      </div>

                          <div class="modal-footer col s12" style="background-color:#26a69a">

                            <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">OK</button>
                            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a> 
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

              <div class = "clearfix">

              </div>  

            <!--********ADD******-->
             <div id="addFabricType" class="modal modal-fixed-footer">                  
                <h5><font color = "#1b5e20"><center>ADD NEW SWATCH NAME</center> </font> </h5> 
                  {!! Form::open(['url' => 'maintenance/swatch-name', 'method' => 'post']) !!} 
                <div class="divider" style="height:2px"></div>
                  <div class="modal-content col s12">
                            

                  <div class="input-field">
                    <input value = "{{$newID}}" id="addSwatchNameID" name = "addSwatchNameID" type="hidden">
                  </div>


                  <div class = "col s12" style="padding:15px;  border:3px solid white;">
                      <div class="input-field col s12">
                      <select class="browser-default" id="addCategory" name="addCategory"required>
                                      <option value="" disabled selected>Choose fabric type:</option>
                                        @foreach($fabricType as $fabricType_1)
                                        @if($fabricType_1->boolIsActive == 1) 
                                          <option value="{{ $fabricType_1->strFabricTypeID }}">{{ $fabricType_1->strFabricTypeName
                                       }}</option>
                                    @endif                       
                                  @endforeach
                                </select>  
                              </div>  
                          </div> 

              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                  <div class="input-field col s12">
                    <input required id="addSwatchName" name = "addSwatchName" type="text" class="validate" required data-position="bottom" pattern="[0-9a-zA-Z\-\s]+$" placeholder="Nickel">
                    <label for="swatch_name">Swatch Name <span class="red-text"><b>*</b></span></label>
                  </div>
              </div>    

              <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                  <div class="input-field col s12">
                    <input id="addSwatchDesc" name = "addSwatchDesc" type="text" class="validate" placeholder="Smooth and reddish like version of citadel.">
                    <label for="swatch_description">Swatch Description </label>
                  </div>
              </div>
              </div>

                  <div class="modal-footer col s12" style="background-color:#26a69a">
                    <button type="submit" id="send" name="send" class=" modal-action  waves-effect waves-green btn-flat">Add</button>
                    <button type="reset" value="Reset" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</button> 
                  </div>
                    {!! Form::close() !!}
    	       </div><!-- addFabricType  -->
            </div><!-- card-content  --> 
        </div>  <!-- card-panel -->
      </div> <!-- col s12 m12 l12 --> 
  </div> 
      <!-- row --> 



@stop

@section('scripts')

    <script type="text/javascript">
      $('.validateName').on('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z\'\-]+( [a-zA-Z\'\-]+)*$/;
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
        var re=/^[a-zA-Z\'\-]+( [a-zA-Z\'\-]+)*$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      }); 

      $('.validateDesc').on('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z0-9\'\-\.\,]+( [a-zA-Z0-9\,\'\-\.]+)*$/;
        var is_desc=re.test(input.val());
        if(is_desc){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      //Kapag whitespace
      $('.validateDesc').blur('input', function() {
        var desc = $(this).val();
        $(this).val(desc.trim());
      }); 

      $('.validateDesc').blur('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z0-9\'\-\.\,]+( [a-zA-Z0-9\,\'\-\.]+)*$/;
        var is_desc=re.test(input.val());
        if(is_desc){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });
      </script>
        <!--DATA TABLE SCRIPT-->
    <script type="text/javascript">

      $(document).ready(function() {

          $('.data-fabricName').DataTable();
          $('select').material_select();

          setTimeout(function () {
            $('#success-message').hide();
        }, 5000);

      } );
    </script>

@stop