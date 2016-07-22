@extends('layouts.master')

@section('content')

  <div class="main-wrapper">
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

      <!--Delete -->
      @if (Session::has('flash_message_beingused'))
        <div class="row" id="flash_message">
          <div class="col s12 m12 l12">
            <div class="card-panel red accent-2">
              <span class="alert alert-success"><i class="material-icons right" onclick="$('#flash_message').hide()">clear</i></span>
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
              <span class="black-text" style="color:black">Successfully deactivated garment category!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif

       @if (Session::has('flash_message_duplicate'))
        <div class="row" id="flash_message">
          <div class="col s12 m12 l12">
            <div class="card-panel red accent-1">
              <span class="alert alert-success"><i class="material-icons right" onclick="$('#flash_message').hide()">clear</i></span>
              <em> {!! session('flash_message_duplicate') !!}</em>
            </div>
          </div>
        </div>
      @endif  



      <!--Reactivate Garment Category-->
      @if (Input::get('successRec') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully added back garment category!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
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
              <span class="black-text" style="color:black">Sorry! Body part cannot be deactivated! Body part is still affiliated with other materials.<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif

     <div class="row">
      <div class="col s12 m12 l12">
          <span class="page-title"><h4>Maintenance - Body Part Category</h4></span>
      </div>
    </div>

       <div class="col s6 left">
         <a class="right waves-effect waves-light modal-trigger btn-floating tooltipped btn-large light-green accent-1" data-position="bottom" data-delay="50"  data-tooltip="CLick to add a new standard size category to the table" href="#addBodyPartCatInfo" style="color:black; margin-right:35px; margin-left: 20px;"><i class="large mdi-content-add"></i></a>
       </div>
     </div>        
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
                  @foreach($bodyPartCategory as $bodyPartCategory)
                    @if($bodyPartCategory->boolIsActive == 1)
                      <tr>   
                        <td>{{ $bodyPartCategory->strBodyPartCatName }}</td> 
                        <td>{{ $bodyPartCategory->textBodyPartCatDesc }}</td>               
                        <td>
                          <a style = "color:black" class="modal-trigger btn tooltipped btn-floating blue" data-position="bottom" data-delay="50" data-tooltip="Click to edit measurement information" href="#edit{{ $bodyPartCategory->strBodyPartCategoryID }}"><i class="mdi-editor-mode-edit"></i></a>
                          <a style = "color:black" class="modal-trigger btn tooltipped btn-floating red" data-position="bottom" data-delay="50" data-tooltip="Click to delete measurement information" href="#del{{ $bodyPartCategory->strBodyPartCategoryID }}"><i class="mdi-action-delete"></i></a>
                      
                          <div id="edit{{ $bodyPartCategory->strBodyPartCategoryID }}" class="modal modal-fixed-footer">  
                            <h5><font color = "#1b5e20"><center>UPDATE BODY PART INFORMATION</center> </font> </h5>
                              {!! Form::open(['url' => 'maintenance/body-part-category/update', 'method' => 'post']) !!}
                            <div class="divider" style="height:2px"></div>
                            <div class="modal-content col s12"> 

                              <div class="input-field">
                                      <input value="{{ $bodyPartCategory->strBodyPartCategoryID
                                       }}" id="editBodyPartCatID" name="editBodyPartCatID" type="hidden" readonly>                                 
                                    </div>

                              <div class="input-field">
                                <label for="editBodyPartCatName">Body Part Category Name</label>
                                <input value="{{ $bodyPartCategory->strBodyPartCatName }}" id="editBodyPartCatName" name="editBodyPartCatName" type="text">                                 
                              </div>

                              <div class="input-field">
                                <label for="editBodyPartCatDesc">Body Part Category Description</label>
                                <input value="{{ $bodyPartCategory->textBodyPartCatDesc }}" id="editBodyPartCatDesc" name="editBodyPartCatDesc" type="text">                        
                              </div>
                            </div> 

                            <div class="modal-footer col s12" style="background-color:#26a69a">
                              <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">Update</button>
                              <a class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>  
                            </div>
                              {!! Form::close() !!}
                          </div>

                         

                          <div id="del{{ $bodyPartCategory->strBodyPartCategoryID }}" class="modal modal-fixed-footer">
                            <h5><font color = "#1b5e20"><center>ARE YOU SURE TO DEACTIVATE THIS BODY PART INFORMATION?</center> </font> </h5>
                             {!! Form::open(['url' => 'maintenance/body-part-category/destroy']) !!}
                            
                            <div class="divider" style="height:2px"></div>
                            <div class="modal-content col s12">
                                
                              <div class="input-field">
                                  <input value="{{ $bodyPartCategory->strBodyPartCategoryID }}" id="delBodyPartCatID" name="delBodyPartCatID" type="hidden" readonly>                                 
                                </div>

                              <div class="input-field col s12">
                                <input value="{{ $bodyPartCategory->strBodyPartCatName }}" type="text" readonly>
                                <label for="BodyPartCat_name">Body Part Category Name</label>
                              </div>

                              <div class="input-field col s12">
                                <label for="inactive_reason"> Reason for Deactivation <span class="red-text"><b>*</b></span> </label>
                                <input  required value="{{ $bodyPartCategory->strBodyPartCategoryInactiveReason }}" id="delInactiveHead" name="delInactiveHead" type="text">                                 
                              </div>
                            </div>


                            <div class="modal-footer col s12" style="background-color:#26a69a">
                              <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">OK</button>
                              <a class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>  
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

            {{-- CREATE BODY PART CATEGORY --}}

            <div id="addBodyPartCatInfo" class="modal modal-fixed-footer">
              <h5><font color = "#1b5e20"><center>CREATE NEW BODY PART</center> </font> </h5> 

              {!! Form::open(['url' => 'maintenance/body-part-category', 'method' => 'post']) !!}                       
              <div class="divider" style="height:2px"></div>
              <div class="modal-content col s12"> 

                  <div class="input-field">
                    <input value="{{ $newID }}" id="strBodyPartCategoryID" name="strBodyPartCategoryID" type="hidden">
                  </div>
              
                                      
                <div class="input-field">
                  <label for="strBodyPartCatName"><span class="red-text"><b>*</b></span>Body Part Category Name</label>
                  <input  required id="strBodyPartCatName" name="strBodyPartCatName" type="text" placeholder="Shoulder" pattern="^[a-zA-Z\-'`]+(\s[a-zA-Z\-'`]+)?">                                 
                </div>

                <div class="input-field">
                  <label for="textBodyPartCatDesc">Body Part Category Description</label>
                  <input id="textBodyPartCatDesc" name="textBodyPartCatDesc" type="text" placeholder="Can be sloping, broad, etc.">      
                </div>
              </div>  

              <div class="modal-footer col s12" style="background-color:#26a69a">
                <button type="submit" name="send" id="send" class=" modal-action  waves-effect waves-green btn-flat">Create</button>
               <button type="reset" value="Reset" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</button>   
              </div>
             {!! Form::close() !!}
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