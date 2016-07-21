@extends('layouts.master')

@section('content')

  <div class="main-wrapper">
                 
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