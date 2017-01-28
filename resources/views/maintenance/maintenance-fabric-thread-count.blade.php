@extends('layouts.master')

@section('content')
  <div class="main-wrapper" style="margin-top:30px">  <!-- Main Wrapper  -->   
      <!--Input Validation-->

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
              <span class="alert alert-success"><i class="tiny mdi-navigation-close right" onclick="$('#flash_message').hide()"></i></span>
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

    <!--  <Data Dependency Message> -->
       @if (Input::get('success') == 'beingUsed')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel red">
              <span class="black-text" style="color:black">Sorry! Thread count cannot be deactivated! Thread count is still affiliated with other materials.<i class="tiny mdi-navigation-close right" onclick="$('#success-message').hide()"></i></span>
            </div>
          </div>
        </div>
      @endif
      
    <div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><h4>Maintenance - Fabric Thread Count</h4></span>
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
   		    <span class="card-title"><h5 style="color:#1b5e20"><center>List of  Thread Counts</center></h5></span>
   				<div class="divider"> </div>
            <div class="card-content"><!-- card-content  --> 

              <div class="col s12 m12 l12 overflow-x">

       				<table class = "table centered data-threadcount" align = "center" border = "1">
                <thead>
                  <tr>
              		  <!--<th data-field="fabricID">Fabric Type ID</th>-->
                    <th data-field="swatchName">Thread Count Name</th>
              		  <th data-field="swatchDescription">Description</th>
                    <th data-field="Edit">Actions</th>
                    

              	  </tr>
                </thead>
              
                <tbody>
                   @foreach($threadCount as $threadCount)
                     @if($threadCount->boolIsActive == 1)
                  <tr>
               		  <td>{{ $threadCount->strFabricThreadCountName}}</td>
              		  <td>{{ $threadCount->txtFabricThreadCountDesc}}</td>
              		  <td><a style="color:black" class="modal-trigger btn tooltipped btn-floating blue" data-position="bottom" data-delay="50" data-tooltip="Click to update data of thread count" href="#edit{{$threadCount->strFabricThreadCountID}}"><i class="mdi-editor-mode-edit"></i></a>
                    <a style="color:black" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of thread count from the table" href="#del{{$threadCount->strFabricThreadCountID}}"><i class="mdi-action-delete"></i></a></td>
              	
                    <div id="edit{{$threadCount->strFabricThreadCountID}}" class="modal modal-fixed-footer"> <!-- editFabricType  --> 
                      <h5><font color = "#1b5e20"><center>UPDATE THREAD COUNT</center> </font> </h5>
                        {!! Form::open(['url' => 'maintenance/fabric-thread-count/update']) !!}
                          <div class="divider" style="height:2px"></div>
                              <div class="modal-content col s12">
                        
                                <div class="input-field">
                                      <input value = "{{$threadCount->strFabricThreadCountID}}" id="editThreadCount" name = "editThreadCount" type="hidden">
                                </div>

                              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                      <div class="input-field col s12">
                                            <input required value = "{{$threadCount->strFabricThreadCountName}}" id="editThreadCountName" name = "editThreadCountName" type="text" pattern="^[a-zA-Z\d\-'`]+(\s[a-zA-Z\-'`]+)?" class="validate" required data-position="bottom">
                                            <label for="thread count name">Thread Count Name <span class="red-text"><b>*</b></span> </label>
                                      </div>
                                </div>

                                <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                                      <div class="input-field col s12">
                                            <input  value = "{{$threadCount->txtFabricThreadCountDesc}}" id="editThreadCountDesc" name = "editThreadCountDesc" type="text" class="validate">
                                            <label for="swatch_description">Thread Count Description </label>
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
              <div id="del{{$threadCount->strFabricThreadCountID}}" class="modal modal-fixed-footer">                     
                <h5><font color = "#1b5e20"><center>ARE YOU SURE TO DEACTIVATE THIS THREAD COUNT?</center> </font> </h5>                       
                   {!! Form::open(['url' => 'maintenance/fabric-thread-count/destroy']) !!}  
                  
                    <div class="divider" style="height:2px"></div>
                    <div class="modal-content col s12">
                      
                          <div class="input-field">
                            <input value="{{$threadCount->strFabricThreadCountID}}" id="delThreadCountID" name="delThreadCountID" type="hidden">
                          </div>

                      <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s12">
                            <label for="thread count name">Thread Count Name </label>
                            <input value="{{$threadCount->strFabricThreadCountName}}" id="delThreadCountName" name="delThreadCountName" type="text" readonly>
                          </div>
                      </div>

                      <div class = "col s12" style="padding:15px;  border:3px solid white;">
                          <div class="input-field col s12">
                            <label for="swatch_desc">Thread Count Desription </label>
                            <input value="{{$threadCount->txtFabricThreadCountDesc}}" id="delThreadCountDesc" name="delThreadCountDesc" type="text" readonly>
                          </div>
                      </div>

                      <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                           <div class="input-field col s12">
                            <label for="inactive_reason"> Reason for Deactivation <span class="red-text"><b>*</b></span> </label>
                            <input value="{{$threadCount->strFabricThreadCountInactiveReason}}" id="delInactiveThreadCount" name="delInactiveThreadCount" type="text" required>
                          </div>
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
                <h5><font color = "#1b5e20"><center>CREATE THREAD COUNT</center> </font> </h5> 
                  {!! Form::open(['url' => 'maintenance/fabric-thread-count', 'method' => 'post']) !!} 
                <div class="divider" style="height:2px"></div>
                  <div class="modal-content col s12">
                            

                  <div class="input-field">
                    <input value = "{{$newID}}" id="strFabricThreadCountID" name = "strFabricThreadCountID" type="hidden">
                  </div>
                
              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                  <div class="input-field col s12">
                      <input required id="strFabricThreadCountName" name = "strFabricThreadCountName" type="text" class="validate" data-position="bottom" pattern="^[a-zA-Z\d\-'`]+(\s[a-zA-Z\-'`]+)?" placeholder="60s">
                      <label for="swatch_name">Thread Count Name <span class="red-text"><b>*</b></span></label>
                  </div>
              </div>    

              <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                  <div class="input-field col s12">
                    <input id="txtFabricThreadCountDesc" name = "txtFabricThreadCountDesc" type="text" class="validate" placeholder="Use for bed sheets.">
                    <label for="swatch_description">Thread Count Description </label>
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

          $('.data-threadcount').DataTable();
          $('select').material_select();

          setTimeout(function () {
            $('#flash_message').hide();
        }, 5000);

          setTimeout(function () {
            $('#success-message').hide();
        }, 5000);

      } );
    </script>

@stop