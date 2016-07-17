@extends('layouts.master')

@section('content')
  <div class="main-wrapper" style="margin-top:30px">  <!-- Main Wrapper  -->   
      <!--Input Validation-->

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
    <div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><h4>Maintenance - Fabric Color</h4></span>
      </div> 
    </div>

      <div class="col s6 left">
         <a class="right waves-effect waves-light modal-trigger btn-floating tooltipped btn-large light-green accent-1" data-position="bottom" data-delay="50"  data-tooltip="Click to add a new fabric color to the table" href="#addFabricColor" style="color:black; margin-right:35px; margin-left: 20px;"><i class="large mdi-content-add"></i></a>
      </div>
    </div>
   <!-- End of Main Wrapper  --> 



  <div class="row"> <!-- row -->

    	<div class="col s12 m12 l12">  <!-- col s12 m12 l12 -->

    		<div class="card-panel">  <!-- card-panel -->
   		    <span class="card-title"><h5 style="color:#1b5e20"><center>List of Fabric Colors</center></h5></span>
   				<div class="divider"> </div>
            <div class="card-content"><!-- card-content  --> 

              <div class="col s12 m12 l12 overflow-x">

       				<table class = "table centered data-fabricColor" align = "center" border = "1">
                <thead>
                  <tr>
              		  <!--<th data-field="fabricID">Fabric Type ID</th>-->
                    <th data-field="swatchName">Color Name</th>
              		  <th data-field="swatchDescription">Description</th>
                    <th data-field="Edit">Actions</th>
                    

              	  </tr>
                </thead>
              
                <tbody>
                   @foreach($fabricColor as $fabricColor)
                     @if($fabricColor->boolIsActive == 1)
                  <tr>
               		  <td>{{ $fabricColor->strFabricColorName}}</td>
              		  <td>{{ $fabricColor->txtFabricColorDesc}}</td>
              		  <td><a style="color:black" class="modal-trigger btn tooltipped btn-floating blue" data-position="bottom" data-delay="50" data-tooltip="Click to update data of thread count" href="#edit{{$fabricColor->strFabricColorID}}"><i class="mdi-editor-mode-edit"></i></a>
                    <a style="color:black" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of thread count from the table" href="#del{{$fabricColor->strFabricColorID}}"><i class="mdi-action-delete"></i></a></td>


              	   <!-- Update FabricColor Modal --> 
                    <div id="edit{{$fabricColor->strFabricColorID}}" class="modal modal-fixed-footer"> 
                      <h5><font color = "#1b5e20"><center>UPDATE COLOR</center> </font> </h5>
                        {!! Form::open(['url' => 'maintenance/fabric-color/update']) !!}
                          <div class="divider" style="height:2px"></div>
                              <div class="modal-content col s12">
                        
                                <div class="input-field">
                                      <input value = "{{$fabricColor->strFabricColorID}}" id="editfabricColor" name = "editfabricColor" type="hidden">
                                </div>

                              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                      <div class="input-field col s12">
                                            <input required value = "{{$fabricColor->strFabricColorName}}" id="editColorName" name = "editColorName" type="text" pattern="^[a-zA-Z\d\-'`]+(\s[a-zA-Z\-'`]+)?" class="validate" required data-position="bottom">
                                            <label for="swatch_name">Color Name <span class="red-text"><b>*</b></span> </label>
                                      </div>
                                </div>

                                <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                                      <div class="input-field col s12">
                                            <input  value = "{{$fabricColor->txtfabricColorDesc}}" id="editColorDesc" name = "editColorDesc" type="text" class="validate">
                                            <label for="swatch_description">Color Description </label>
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
              <div id="del{{$fabricColor->strFabricColorID}}" class="modal modal-fixed-footer">                     
                <h5><font color = "#1b5e20"><center>ARE YOU SURE TO DEACTIVATE THIS COLOR?</center> </font> </h5>                       
                   {!! Form::open(['url' => 'maintenance/fabric-color/destroy']) !!}  
                  
                    <div class="divider" style="height:2px"></div>
                    <div class="modal-content col s12">
                      
                          <div class="input-field">
                            <input value="{{$fabricColor->strFabricColorID}}" id="delfabricColorID" name="delfabricColorID" type="hidden">
                          </div>

                      <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s12">
                            <label for="thread count name">Color Name </label>
                            <input value="{{$fabricColor->strFabricColorName}}" id="delfabricColorName" name="delfabricColorName" type="text" readonly>
                          </div>
                      </div>

                      <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s12">
                            <label for="swatch_desc">Color Desription </label>
                            <input value="{{$fabricColor->txtFabricColorDesc}}" id="delfabricColorDesc" name="delfabricColorDesc" type="text" readonly>
                          </div>
                      </div>

                          <div class="input-field col s12">
                            <label for="inactive_reason"> Reason for Deactivation <span class="red-text"><b>*</b></span> </label>
                            <input value="{{$fabricColor->strFabricColorInactiveReason}}" id="delInactivefabricColor" name="delInactivefabricColor" type="text" required>
                          </div>

                      <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                           
                      </div>
                      </div>

                          <div class="modal-footer col s12" style="background-color:#26a69a">

                            <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">Ok</button>
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

            <!--********ADD MODAL******-->
             <div id="addFabricColor" class="modal modal-fixed-footer">                  
                <h5><font color = "#1b5e20"><center>CREATE FABRIC COLOR</center> </font> </h5> 
                  {!! Form::open(['url' => 'maintenance/fabric-color', 'method' => 'post']) !!} 
                <div class="divider" style="height:2px"></div>
                  <div class="modal-content col s12">
                            

                  <div class="input-field">
                    <input value = "{{$newID}}" id="strFabricColorID" name = "strFabricColorID" type="hidden">
                  </div>
                
              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                  <div class="input-field col s12">
                      <input required id="strFabricColorName" name = "strFabricColorName" type="text" class="validate" data-position="bottom" pattern="^[a-zA-Z\d\-'`]+(\s[a-zA-Z\-'`]+)?" placeholder="Pink">
                      <label for="swatch_name">Color Name <span class="red-text"><b>*</b></span></label>
                  </div>
              </div>    

              <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                  <div class="input-field col s12">
                    <input id="txtFabricColorDesc" name = "txtFabricColorDesc" type="text" class="validate" placeholder="Perfect color for debut.">
                    <label for="swatch_description">Color Description </label>
                  </div>
              </div>
              </div>

                  <div class="modal-footer col s12" style="background-color:#26a69a">
                    <button type="submit" id="send" name="send" class=" modal-action  waves-effect waves-green btn-flat">Create</button>
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

          $('.data-fabricColor').DataTable();
          $('select').material_select();

          setTimeout(function () {
            $('#flash_message').hide();
        }, 5000);

      } );
    </script>

@stop