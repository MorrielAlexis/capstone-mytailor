@extends('layouts.master')

@section('content')

  <div class="main-wrapper">
                 
    <div class="row">
      <div class="col s12 m12 l12">
        <div class="card-panel">
          <span class="card-title"><h5><center>Body Part Category</center></h5></span>
          <div class="divider"></div>
          <div class="card-content">

            <div class="col s12 m12 l12 overflow-x">
              <table class = "table centered data-part" align = "center" border = "1">
                <thead>
                  <tr>
                    <th data-field="BodyPartCatName">Body Part Category Name</th>
                    <th data-field="BodyPartCatDesc">Body Part Category Description</th>
                    <th data-field="Action">Actions</th>                
                  </tr>
                </thead>

                <tbody>
                  @foreach($part as $part)
                    @if($part->boolIsActive == 1)
                      <tr>   
                        <td>{{ $part->strBodyPartCatName }}</td> 
                        <td>{{ $part->textBodyPartCatDesc }}</td>               
                        <td>
                          <a style = "color:black" class="modal-trigger btn tooltipped btn-floating blue" data-position="bottom" data-delay="50" data-tooltip="Click to edit measurement information" href="#edit"><i class="mdi-editor-mode-edit"></i></a>
                          <a style = "color:black" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to delete measurement information" href="#del"><i class="mdi-action-delete"></i></a>
                      
                          <div id="edit" class="modal modal-fixed-footer">
                            <h5><font color = "#1b5e20"><center>EDIT BODY PART INFORMATION</center> </font> </h5>
                             
                            <div class="divider" style="height:2px"></div>
                            <div class="modal-content col s12"> 

                              <div class="input-field">
                                <input value="" id="editBodyPartCatID" name="editBodyPartCatID" type="hidden" readonly>                                 
                              </div>

                              <div class="input-field">
                                <label for="editBodyPartCatName">Body Part Category Name</label>
                                <input value="" id="editBodyPartCatName" name="editBodyPartCatName" type="text">                                 
                              </div>

                              <div class="input-field">
                                <label for="editBodyPartCatDesc">Body Part Category Description</label>
                                <input value="" id="editBodyPartCatDesc" name="editBodyPartCatDesc" type="text">                                 
                              </div>

                            </div> 

                            <div class="modal-footer col s12" style="background-color:#26a69a">
                              <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">Update</button>
                              <a class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>  
                            </div>
                          </div>

                         

                          <div id="del" class="modal modal-fixed-footer">
                            <h5><font color = "#1b5e20"><center>ARE YOU SURE TO DEACTIVATE THIS BODY PART INFORMATION?</center> </font> </h5>
                            
                            <div class="divider" style="height:2px"></div>
                            <div class="modal-content col s12">
                                
                              <div class="input-field">
                                  <input value="" id="delBodyPartCatID" name="delBodyPartCatID" type="hidden" readonly>                                 
                                </div>

                              <div class="input-field col s12">
                                <input value="" type="text" readonly>
                                <label for="BodyPartCat_name">Body Part Category Name</label>
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

            <div id="addBodyPartCatInfo" class="modal modal-fixed-footer">
              <h5><font color = "#1b5e20"><center>CREATE BODY PART INFORMATION</center> </font> </h5> 
                                    
              <div class="divider" style="height:2px"></div>
              <div class="modal-content col s12"> 
                
                <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                <input value="" name="strBodyPartCategoryID" type="text" hidden>
                                      
                <div class="input-field">
                  <label for="strBodyPartCatName">Body Part Category Name</label>
                  <input id="strBodyPartCatName" name="strBodyPartCatName" type="text">                                 
                </div>

                <div class="input-field">
                  <label for="textBodyPartCatDesc">Body Part Category Description</label>
                  <input id="textBodyPartCatDesc" name="textBodyPartCatDesc" type="text">                                 
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

        $('.data-part').DataTable();
        $('select').material_select();

        setTimeout(function () {
          $('#flash_message').hide();
      }, 5000);

    });
  </script>

@stop