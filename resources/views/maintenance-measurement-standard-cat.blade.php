@extends('layouts.master')

@section('content')

  <div class="main-wrapper">

          <!--Input Validation-->
      @if (Input::get('input') == 'invalid')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel red">
              <span class="black-text" style="color:black">Invalid input!<i class="materialtiny mdi-navigation-close rightns right" onclick="$('#success-message').hide()"></i></span>
            </div>
          </div>
        </div>
      @endif

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

      <!--Delete -->
      @if (Session::has('flash_message_beingused'))
        <div class="row" id="flash_message">
          <div class="col s12 m12 l12">
            <div class="card-panel red accent-2">
              <span class="alert alert-success"><i class="tiny mdi-navigation-close right" onclick="$('#flash_message').hide()"></i></span>
               <em> {!! session('flash_message_delete') !!}</em>
            </div>
          </div>
        </div>
      @endif

      <!--Delete Garment Category-->
      @if (Input::get('successDel') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully deactivated garment category!<i class="tiny mdi-navigation-close right" onclick="$('#success-message').hide()"></i></span>
            </div>
          </div>
        </div>
      @endif



      <!--Reactivate Garment Category-->
      @if (Input::get('successRec') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully added back garment category!<i class="tiny mdi-navigation-close right" onclick="$('#success-message').hide()"></i></span>
            </div>
          </div>
        </div>
      @endif

    <!--  <Duplicate Error Message>   -->
    @if (Input::get('success') == 'duplicate')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel red">
              <span class="black-text" style="color:black">Record already exists!<i class="tiny mdi-navigation-close right" onclick="$('#success-message').hide()"></i></span>
            </div>
          </div>
        </div>
      @endif

     <!--  <Data Dependency Message> -->
       @if (Input::get('success') == 'beingUsed')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel red">
              <span class="black-text" style="color:black">Sorry! Segment cannot be deactivated! Segment is still affiliated with other materials.<i class="tiny mdi-navigation-close right" onclick="$('#success-message').hide()"></i></span>
            </div>
          </div>
        </div>
      @endif

     <div class="row">
      <div class="col s12 m12 l12">
          <span class="page-title"><h4>Maintenance - Standard Size Category</h4></span>
      </div>
    </div>

       <div class="col s6 left">
         <a class="right waves-effect waves-light modal-trigger btn-floating tooltipped btn-large light-green accent-1" data-position="bottom" data-delay="50"  data-tooltip="CLick to add a new standard size category to the table" href="#addStandardSizeCatInfo" style="color:black; margin-right:35px; margin-left: 20px;"><i class="large mdi-content-add"></i></a>
       </div>
     </div>
                 
    <div class="row">
      <div class="col s12 m12 l12">
        <div class="card-panel">
          <span class="card-title"><h5><center>Standard Size Category</center></h5></span>
          <div class="divider"></div>
          <div class="card-content">

            <div class="col s12 m12 l12 overflow-x">
              <table class = "table centered data-standard" align = "center" border = "1">
                <thead>
                  <tr>
                    <th data-field="StandardSizeCatName">Standard Size Category Name</th>
                    <th data-field="StandardSizeCatDesc">Standard Size Category Description</th>
                    <th data-field="Action">Actions</th>                
                  </tr>
                </thead>

                <tbody>
                  @foreach($standard as $standard)
                    @if($standard->boolIsActive == 1)
                      <tr>   
                        <td>{{ $standard->strStandardSizeCategoryName }}</td> 
                        <td>{{ $standard->txtStandardSizeCategoryDesc }}</td>
                        <td>
                          <a style = "color:black" class="modal-trigger btn tooltipped btn-floating blue" data-position="bottom" data-delay="50" data-tooltip="Click to edit measurement information" href="#edit"><i class="mdi-editor-mode-edit"></i></a>
                          <a style = "color:black" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to delete measurement information" href="#del"><i class="mdi-action-delete"></i></a>
                      
                          <div id="edit" class="modal modal-fixed-footer">
                            <h5><font color = "#1b5e20"><center>EDIT STANDARD SIZE INFORMATION</center> </font> </h5>
                             
                            <div class="divider" style="height:2px"></div>
                            <div class="modal-content col s12"> 

                              <div class="input-field">
                                <input value="" id="editStandardSizeCatID" name="editStandardSizeCatID" type="hidden" readonly>                                 
                              </div>

                              <div class="input-field">
                                <label for="editStandardSizeCatName">Standard Size Category Name</label>
                                <input value="" id="editStandardSizeCatName" name="editStandardSizeCatName" type="text">                                 
                              </div>

                              <div class="input-field">
                                <label for="editStandardSizeCatDesc">Standard Size Category Description</label>
                                <input value="" id="editStandardSizeCatDesc" name="editStandardSizeCatDesc" type="text">                                 
                              </div>

                            </div> 

                            <div class="modal-footer col s12" style="background-color:#26a69a">
                              <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">Update</button>
                              <a class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>  
                            </div>
                          </div>

                         

                          <div id="del" class="modal modal-fixed-footer">
                            <h5><font color = "#1b5e20"><center>ARE YOU SURE TO DEACTIVATE THIS STANDARD SIZE INFORMATION?</center> </font> </h5>
                            
                            <div class="divider" style="height:2px"></div>
                            <div class="modal-content col s12">
                                
                              <div class="input-field">
                                  <input value="" id="delStandardSizeCatID" name="delStandardSizeCatID" type="hidden" readonly>                                 
                                </div>

                              <div class="input-field col s12">
                                <input value="" type="text" readonly>
                                <label for="StandardSizeCat_name">Standard Size Category Name</label>
                              </div>

                              <div class="input-field col s12">
                                <label for="inactive_reason"> Reason for Deactivation <span class="red-text"><b>*</b></span> </label>
                                <input value="" id="delInactiveHead" name="delInactiveHead" type="text">                                 
                              </div>
                            </div>

                            <div class="modal-footer col s12" style="background-color:#26a69a">
                              <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">OK</button>
                              <a class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>  
                            </div>
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

            <div id="addStandardSizeCatInfo" class="modal modal-fixed-footer">
              <h5><font color = "#1b5e20"><center>CREATE NEW STANDARD SIZE INFORMATION</center> </font> </h5> 
                                    
              <div class="divider" style="height:2px"></div>
              <div class="modal-content col s12"> 
                
                <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                <input value="" name="strStandardSizeCategoryID" type="text" hidden>
                                      
                <div class="input-field">
                  <label for="strStandardSizeCategoryName">Standard Size Category Name</label>
                  <input id="strStandardSizeCategoryName" name="strStandardSizeCategoryName" type="text">                                 
                </div>

                <div class="input-field">
                  <label for="txtStandardSizeCategoryDesc">Standard Size Category Description</label>
                  <input id="txtStandardSizeCategoryDesc" name="txtStandardSizeCategoryDesc" type="text">                                 
                </div>

              </div>  

              <div class="modal-footer col s12" style="background-color:#26a69a">
                <button type="submit" name="send" id="send" class=" modal-action  waves-effect waves-green btn-flat">Create</button>
                <a class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>  
              </div>
            </div> 
            
          </div> 
        </div>
      </div>
    </div>
    </div>  
@stop

@section('scripts')

  <script type="text/javascript">

    $(document).ready(function() {

        $('.data-standard').DataTable();
        $('select').material_select();

        setTimeout(function () {
          $('#flash_message').hide();
      }, 5000);

    });
  </script>
@stop