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
  
 <!--Add Garment Category-->
         @if (Input::get('success') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully added material!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif


      <!--Edit Garment Category-->
      @if (Input::get('successEdit') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully edited material!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif


      <!--Delete Garment Category-->
      @if (Input::get('successDel') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully deactivated material!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
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

  <div class="main-wrapper" style="margin-top:30px">
    <div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><h4>Materials</h4></span>
      </div> 
    </div>
  </div>
  
  <div style="padding:20px">

      <ul class="tabs transparent" style="float:left">
        <li class="tab col s3" id="tabcolor" style="background:lavender; border-top-left-radius: 20px; border-top-right-radius: 40px;"><a @if (Input::get('thread') == 'true') class="active" @endif  style="color:black" href="#tabThread">Threads</a></li>
        <li class="tab col s3" id="tabcolor" style="background:lavender; border-top-left-radius: 20px; border-top-right-radius: 40px;"><a @if (Input::get('needle') == 'true') class="active" @endif style="color:black" href="#tabNeedle">Needles</a></li>
        <li class="tab col s3" id="tabcolor" style="background:lavender; border-top-left-radius: 20px; border-top-right-radius: 40px;"><a @if (Input::get('button') == 'true') class="active" @endif  style="color:black" href="#tabButton">Buttons</a></li>
        <li class="tab col s3" id="tabcolor" style="background:lavender; border-top-left-radius: 20px; border-top-right-radius: 40px;"><a @if (Input::get('zipper') == 'true') class="active" @endif  style="color:black" href="#tabZipper">Zippers</a></li>
        <li class="tab col s3" id="tabcolor" style="background:lavender; border-top-left-radius: 20px; border-top-right-radius: 40px;"><a @if (Input::get('hook') == 'true') class="active" @endif  style="color:black" href="#tabHook">Hook&Eye</a></li>
        <div class="indicator white" style="z-index:1"></div>
      </ul>
  
      <!--THREADS-->
      <div id="tabThread" class="hue col s12" style="margin-top:45px; background-color: #80d8ff;">
        <div style="height:30px;"></div>


       <div class="row">
          <div class="col s12 m12 l12">
              <button style="color:black; margin-right:35px; margin-left: 20px" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1"style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to add a new thread detail to the table" href="#addThread">ADD THREAD</button>
          </div>
        </div>                                 

        <div class="row">
          <div class="col s12">
            <div class="card">
              <div class="card-content">
                <div class = "col s12 m12 l12 overflow-x">
                  <h5><font color = "#1b5e20"><center>Threads</center> </font> </h5>
                  <table class = "table centered data-thread" border = "1">

                    <thead>
                      <tr>
                        <th data-field="Thread Name">Thread Name</th>
                        <th data-field="Thread Color">Thread Color</th>
                        <th data-field="Thread Desc">Description</th>
                        <th data-field="ThreadImage">Image</th>
                        <th data-field="Edit">Edit</th>
                        <th data-field="Deactivate">Deactivate</th>
                      </tr>
                    </thead>

                    <tbody>
                      @foreach($threads as $thread)
                      @if($thread->boolIsActive == 1)
                      <tr>
                        <td>{{ $thread->strMaterialThreadName }}</td>
                        <td>{{ $thread->strMaterialThreadColor }}</td>
                        <td>{{ $thread->strMaterialThreadDesc }}</td>
                        <td><img class="materialboxed" width="650" src="{{URL::asset($thread->strMaterialThreadImage)}}"></td> 
                        <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to edit thread details" href="#edit{{ $thread->strMaterialThreadID }}">EDIT</button></td>
                        <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of thread details from the table" href="#del{{ $thread->strMaterialThreadID }}">DEACTIVATE</button>
                            
                          <!--EDIT THREADS-->
                          <div id="edit{{ $thread->strMaterialThreadID }}" class="modal modal-fixed-footer">
                            <h5><font color = "#1b5e20"><center>EDIT THREAD</center> </font> </h5>
                            <form action="{{URL::to('editThread')}}" method="POST" enctype="multipart/form-data"> 
                              <div class="divider" style="height:2px"></div>
                                <div class="modal-content col s12">


                                <div class="input-field">
                                  <input id="editThreadID" name = "editThreadID" value = "{{ $thread->strMaterialThreadID }}" type="hidden">
                                </div>
                          
                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                <div class="input-field col s12">
                                  <input id="editThreadName" name = "editThreadName" value = "{{ $thread->strMaterialThreadName }}" type="text" class="validateName">
                                  <label for="Thread_Name"> *Thread Name </label>
                                </div>
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                <div class="input-field col s12">
                                  <input id="editThreadColor" name = "editThreadColor" value = "{{ $thread->strMaterialThreadColor }}" type="text" class="validateColor">
                                  <label for="Thread_Color"> *Thread Color </label>
                                </div>
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                <div class="input-field col s12">
                                  <input id="editThreadDesc" name = "editThreadDesc" value = "{{ $thread->strMaterialThreadDesc }}" type="text" class="validateDesc">
                                  <label for="Thread_Color"> Description </label>
                                </div>
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                                <div class="file-field input-field col s12">
                                  <div style="color:black" class="btn tooltipped btn-small center-text light-green lighten-2" data-position="bottom" data-delay="50" data-tooltip="May upload jpg, png, gif, bmp, tif, tiff files">
                                    <span>Upload Image</span>
                                    <input type="file" id="editImg" name="editImg" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
                                  </div>

                                  <div class="file-path-wrapper">
                                    <input value="{{$thread->strMaterialThreadImage}}" class="file-path validate" id="editThreadImage" name="editThreadImage" type="text">
                                  </div>                   
                                </div> 
                          </div>
                          </div>    

                              <div class="modal-footer col s12" style="background-color:#26a69a">
                                <button type="submit" class="modal-action  waves-effect waves-green btn-flat">Update</button>
                                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>   
                              </div>
                            </form>
                          </div>
                        
                            <!--deactivate THREADS-->
                          <div id="del{{ $thread->strMaterialThreadID }}" class="modal modal-fixed-footer">
                            <form action="{{URL::to('delThread')}}" method="POST">                             
                                <h5><font color = "#1b5e20"><center>ARE YOU SURE TO DEACTIVATE THIS THREAD?</center> </font> </h5> 
                                <div class="divider" style="height:2px"></div>
                                <div class="modal-content col s12">
         
                                  <div class="input-field">
                                    <input value="{{$thread->strMaterialThreadID}}" id="delThreadID" name="delThreadID" type="hidden">
                                  </div>

                              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                  <div class="input-field col s12">
                                    <label for="first_name">Thread Name </label>
                                    <input value="{{$thread->strMaterialThreadName}}" id="delThreadName" name="delThreadName" type="text"  readonly>
                                  </div>
                              </div>
                                    
                              <div class = "col s12" style="padding:15px;  border:3px solid white;">            
                                   <div class="input-field col s12">
                                    <label for="middle_name">Thread Color </label>
                                    <input value="{{$thread->strMaterialThreadColor}}" id="delThreadColor" name="delThreadColor" type="text" readonly>
                                  </div>
                              </div>

                              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                  <div class="input-field">
                                    <input id="delThreadDesc" name = "delThreadDesc" value = "{{ $thread->strMaterialThreadDesc }}" type="text" readonly>
                                    <label for="Thread_Color"> Description </label>
                                  </div>
                              </div>

                                  <div class="input-field">
                                    <input value="{{$thread->strMaterialThreadID}}" id="delInactiveThread" name="delInactiveThread" type="hidden" readonly>
                                  </div>

                              <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                                  <div class="input-field col s12">
                                    <input id="delInactiveReason" name = "delInactiveReason" value="{{$thread->strInactiveReason}}" type="text" class="validate" required>
                                    <label for="Thread_Color"> *Reason for Deactivation </label>
                                  </div>
                              </div>
                              </div>

                              <div class="modal-footer col s12" style="background-color:#26a69a">
                                <button type="submit" class="waves-effect waves-green btn-flat">OK</button>
                                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
                              </div> 
                            </form>
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
                                                                                                                                                       
      <!--NEEDLES-->
      <div id="tabNeedle" class="hue col s12" style="margin-top:45px; background-color: #80d8ff;">
        <div style="height:30px;"></div>

      <div class="row">
        <div class="col s12 m12 l12">
            <button style="color:black; margin-right:35px; margin-left: 20px" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to add a new needle detail to the table" href="#addNeedle">ADD NEEDLE</button>
        </div>
      </div>  

        <div class="row">
          <div class="col s12">
            <div class="card">
              <div class="card-content">
                <div class = "col s12 m12 l12 overflow-x">
                  <h5><font color = "#1b5e20"><center>Needles</center> </font> </h5>
                  <table class = "table centered data-needle" border = "1">
                    <thead>
                      <tr>
                        <!--<th date-field= "Needle ID">Needle ID</th>-->
                        <th data-field="Needle Name">Needle Name</th>
                        <th data-field="Needle Size">Needle Size</th>
                        <th data-field="Needle Desc">Description</th>
                        <th data-field="Needle Image">Image</th>
                        <th data-field="Needle Desc">Edit</th>
                        <th data-field="Needle Image">Delete</th>
                      </tr>
                    </thead>

                    <tbody>
                      @foreach($needles as $needle)
                        @if($needle->boolIsActive == 1)
                      <tr>
                        <!--<td>{{$needle->strMaterialNeedleID}}</td>-->
                        <td>{{$needle->strMaterialNeedleName}}</td>
                        <td>{{$needle->strMaterialNeedleSize}}</td>
                        <td>{{$needle->strMaterialNeedleDesc}}</td>
                        <td><img class="materialboxed" width="650" src="{{URL::asset($needle->strMaterialNeedleImage)}}"></td>
                        <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to edit needle detail" href="#edit{{$needle->strMaterialNeedleID}}">EDIT</button></td>
                        <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of needle detail from the table" href="#del{{$needle->strMaterialNeedleID}}">DEACTIVATE</button>
                            
                          <div id="edit{{$needle->strMaterialNeedleID}}" class="modal modal-fixed-footer">
                            <h5><font color = "#1b5e20"><center>EDIT NEEDLE</center> </font> </h5>
                            <form action="{{URL::to('editNeedle')}}" method="POST" enctype="multipart/form-data"> 
                              <div class="divider" style="height:2px"></div>
                              <div class="modal-content col s12">

                                <div class="input-field">
                                  <input id="editNeedleID" name = "editNeedleID" value = "{{$needle->strMaterialNeedleID}}" type="hidden">
                                </div>
                          
                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                <div class="input-field col s12">
                                  <input required id="editNeedleName" name = "editNeedleName" value = "{{$needle->strMaterialNeedleName}}" type="text" class="validateName">
                                  <label for="Needle_Name"> *Needle Name </label>
                                </div>
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                <div class="input-field col s12">
                                  <input required id="editNeedleSize" name = "editNeedleSize" value = "{{$needle->strMaterialNeedleSize}}" type="text" class="validateSize">
                                  <label for="Needle_Size"> *Needle Size </label>
                                </div>
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                <div class="input-field col s12">
                                  <input required id="editNeedleDesc" name = "editNeedleDesc" value = "{{$needle->strMaterialNeedleDesc}}" type="text" class="validateDesc">
                                  <label for="Needle_Size"> Description </label>
                                </div>
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">                 
                                <div class="file-field input-field col s12">
                                  <div style="color:black" class="btn tooltipped btn-small center-text light-green lighten-2" data-position="bottom" data-delay="50" data-tooltip="May upload jpg, png, gif, bmp, tif, tiff files">
                                    <span>Upload Image</span>
                                    <input type="file" id="editImg" name="editImg" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
                                  </div>

                                  <div class="file-path-wrapper">
                                    <input value="{{$needle->strMaterialNeedleImage}}" class="file-path validate" id="editNeedleImage" name="editNeedleImage" type="text">
                                  </div> 
                                </div>
                          </div>
                          </div>    

                              <div class="modal-footer col s12" style="background-color:#26a69a">
                                <button type="submit" class="modal-action  waves-effect waves-green btn-flat">Update</button>
                                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>  
                              </div>
                            </form>
                          </div>
                        
                        

                          <div id="del{{$needle->strMaterialNeedleID}}" class="modal modal-fixed-footer">
                            <h5><font color = "#1b5e20"><center>ARE YOU SURE TO DEACTIVATE THIS NEEDLE?</center> </font> </h5> 
                            <form action="{{URL::to('delNeedle')}}" method="POST">
                              <div class="divider" style="height:2px"></div>
                              <div class="modal-content col s12">
                                
                                  <div class="input-field">
                                    <input value="{{$needle->strMaterialNeedleID}}" id="delNeedleID" name="delNeedleID" type="hidden">   
                                  </div>

                              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                  <div class="input-field col s12">
                                    <label for="needle_name">Needle Name </label>
                                    <input value="{{$needle->strMaterialNeedleName}}" id="delNeedleName" name="delNeedleName" type="text"  readonly>
                                  </div>
                              </div>

                              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                   <div class="input-field col s12">
                                    <label for="needle_size">Needle Size </label>
                                    <input value="{{$needle->strMaterialNeedleSize}}" id="delNeedlSize" name="delNeedleSize" type="text"  readonly>
                                  </div>
                              </div>

                              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                  <div class="input-field col s12">
                                    <label for="needle_desc">Description </label>
                                    <input value="{{$needle->strMaterialNeedleDesc}}" id="delNeedleDesc" name="delNeedleDesc" type="text"  readonly>
                                  </div>
                              </div>

                                  <div class="input-field">
                                    <input value="{{$needle->strMaterialNeedleID}}" id="delInactiveNeedle" name="delInactiveNeedle" type="hidden">
                                  </div>

                              <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                                  <div class="input-field col s12">
                                    <input id="delInactiveReason" name = "delInactiveReason" value="{{$needle->strInactiveReason}}" type="text" class="validate" required>
                                    <label for="Needle_Reason"> *Reason for Deactivation </label>
                                  </div>
                              </div>
                              </div>

                              <div class="modal-footer col s12" style="background-color:#26a69a">
                                <button type="submit" class="waves-effect waves-green btn-flat">OK</button>
                                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a> 
                              </div> 
                            </form>
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

      <!--BUTTONS-->
      <div id="tabButton" class="hue col s12" style="margin-top:45px; background-color: #80d8ff;">
        <div style="height:30px;"></div>

      <div class="row">
        <div class="col s12 m12 l12">
            <button style="color:black; margin-right:35px; margin-left: 20px" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to add a new button detail to the table" href="#addButton">ADD BUTTON</button>
        </div>
      </div> 

        <div class="row">
          <div class="col s12">
            <div class="card">
              <div class="card-content">
                <div class = "col s12 m12 l12 overflow-x">
                  <h5><font color = "#1b5e20"><center>Buttons</center> </font> </h5>
                  <table class = "table centered data-button" border = "1">

                    <thead>
                      <tr>
                       <!-- <th date-field= "Button ID">Button ID</th>-->
                        <th data-field="Button Name">Button Name</th>
                        <th data-field="Button Size">Button Size</th>
                        <th data-field="Button Color">Button Color</th>
                        <th data-field="Button Color">Description</th>
                        <th data-field="ButtonImage">Image</th>
                        <th data-field="Button Color">Edit</th>
                        <th data-field="ButtonImage">Deactivate</th>
                      </tr>
                    </thead>

                    <tbody>
                      @foreach($buttons as $button)
                      @if($button->boolIsActive == 1)
                      <tr>
                       <!-- <td>{{$button->strMaterialButtonID}}</td>-->
                        <td>{{$button->strMaterialButtonName}}</td>
                        <td>{{$button->strMaterialButtonSize}}</td>
                        <td>{{$button->strMaterialButtonColor}}</td>
                        <td>{{$button->strMaterialButtonDesc}}</td>
                        <td><img class="materialboxed" width="650" src="{{URL::asset($button->strMaterialButtonImage)}}"></td>
                        <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to edit button detail" href="#edit{{$button->strMaterialButtonID}}">EDIT</button></td>
                        <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of button detail from the table" href="#del{{$button->strMaterialButtonID}}">DEACTIVATE</button>
                           
                          <!-- <EDIT BUTTONS>   -->
                          <div id="edit{{$button->strMaterialButtonID}}" class="modal modal-fixed-footer">
                            <h5><font color = "#1b5e20"><center>EDIT BUTTON</center> </font> </h5>
                            <form action="{{URL::to('editButton')}}" method="POST" enctype="multipart/form-data">                               
                              <div class="divider" style="height:2px"></div> 
                              <div class="modal-content col s12">

                                <div class="input-field">
                                  <input id="editButtonID" name = "editButtonID" value = "{{$button->strMaterialButtonID}}" type="hidden">
                                </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                <div class="input-field col s12">
                                  <input required id="editButtonName" name = "editButtonName" value = "{{$button->strMaterialButtonName}}" type="text" class="validateName">
                                  <label for="Button_Name"> *Button Name </label>
                                </div>
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                <div class="input-field col s6">
                                  <input required id="editButtonSize" name = "editButtonSize" value = "{{$button->strMaterialButtonSize}}" type="text" class="validateSize">
                                  <label for="Button_Size"> *Button Size </label>
                                </div>

                                <div class="input-field col s6">
                                  <input required id="editButtonColor" name = "editButtonColor" value = "{{$button->strMaterialButtonColor}}" type="text" class="validateColor">
                                  <label for="Button_Color"> *Button Color </label>
                                </div>
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                <div class="input-field col s12">
                                  <input required id="editButtonDesc" name = "editButtonDesc" value = "{{$button->strMaterialButtonDesc}}" type="text" class="validateDesc">
                                  <label for="Button_Color"> Description </label>
                                </div>
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">               
                                <div class="file-field input-field col s12">
                                  <div style="color:black" class="btn tooltipped btn-small center-text light-green lighten-2" data-position="bottom" data-delay="50" data-tooltip="May upload jpg, png, gif, bmp, tif, tiff files">
                                    <span>Upload Image</span>
                                    <input type="file" id="editImg" name="editImg" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
                                  </div>
                                  <div class="file-path-wrapper">
                                    <input value="{{$button->strMaterialButtonImage}}" class="file-path validate" id="editButtonImage" name="editButtonImage" type="text">
                                  </div>
                                </div>                             
                          </div>
                          </div>    


                              <div class="modal-footer col s12" style="background-color:#26a69a">
                                <button type="submit" class="modal-action  waves-effect waves-green btn-flat">Update</button>
                                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>  
                              </div>
                            </form>  
                          </div>
                       
                       

                          <div id="del{{$button->strMaterialButtonID}}" class="modal modal-fixed-footer">
                            <h5><font color = "#1b5e20"><center>ARE YOU SURE TO DEACTIVATE THIS BUTTON?</center> </font> </h5>                             
                              <form action="{{URL::to('delButton')}}" method="POST">
                                <div class="divider" style="height:2px"></div>
                                <div class="modal-content col s12">


                                  <div class="input-field">
                                   <input value="{{$button->strMaterialButtonID}}" id="delButtonID" name="delButtonID" type="hidden">
                                  </div>

                              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                  <div class="input-field col s12">
                                    <label for="Button_Name">Button Name </label>
                                    <input value="{{$button->strMaterialButtonName}}" id="delButtonName" name="delButtonName" type="text" readonly>
                                  </div>
                              </div>

                              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                  <div class="input-field col s6">
                                    <label for="Button_Size">Button Size </label>
                                    <input value="{{$button->strMaterialButtonSize}}" id="delButtonSize" name="delButtonSize" type="text"  readonly>
                                  </div>

                                  <div class="input-field col s6">
                                    <label for="Button_Color">Button Color </label>
                                    <input value="{{$button->strMaterialButtonColor}}" id="delButtonColor" name="delButtonColor" type="text" readonly>
                                  </div>
                              </div>

                              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                   <div class="input-field col s12">
                                    <label for="Button_Desc">Description </label>
                                    <input value="{{$button->strMaterialButtonDesc}}" id="delButtonColor" name="delButtonColor" type="text"  readonly>
                                  </div>
                              </div>

                                  <div class="input-field">
                                    <input value="{{$button->strMaterialButtonID}}" id="delInactiveButton" name="delInactiveButton" type="hidden">
                                  </div>

                              <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                                  <div class="input-field col s12">
                                    <input id="delInactiveReason" name = "delInactiveReason" value="{{$button->strInactiveReason}}" type="text" class="validate" required>
                                    <label for="Thread_Color"> *Reason for Deactivation </label>
                                  </div>
                              </div>
                              </div>

                              <div class="modal-footer col s12" style="background-color:#26a69a">
                                <button type="submit" class="waves-effect waves-green btn-flat">OK</button>
                                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a> 
                              </div> 
                            </form>
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

      <!--ZIPPERS-->
      <div id="tabZipper" class="hue col s12" style="margin-top:45px; background-color: #80d8ff;">
        <div style="height:30px;"></div>

    <div class="row">
        <div class="col s12 m12 l12">
            <button style="color:black; margin-right:35px; margin-left: 20px" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to add a new zipper detail to the table" href="#addZipper">ADD ZIPPER</button>
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
                        <th data-field="Zipper Name">Zipper Name</th>
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
                        <td>{{$zipper->strMaterialZipperName}}</td>
                        <td>{{$zipper->strMaterialZipperSize}}</td>
                        <td>{{$zipper->strMaterialZipperColor}}</td>
                        <td>{{$zipper->strMaterialZipperDesc}}</td>
                        <td><img class="materialboxed" width="650" src="{{URL::asset($zipper->strMaterialZipperImage)}}"></td>
                        <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to edit zipper detail" href="#edit{{$zipper->strMaterialZipperID}}">EDIT</button></td>
                        <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of zipper detail from the table" href="#del{{$zipper->strMaterialZipperID}}">DEACTIVATE</button>
                            
                          <div id="edit{{$zipper->strMaterialZipperID}}" class="modal modal-fixed-footer">
                            <h5><font color = "#1b5e20"><center>EDIT ZIPPER</center> </font> </h5>
                            <form action="{{URL::to('editZipper')}}" method="POST" enctype="multipart/form-data">
                              <div class="divider" style="height:2px"></div>
                              <div class="modal-content col s12"> 

                                <div class="input-field">
                                  <input id="editZipperID" name = "editZipperID" value = "{{$zipper->strMaterialZipperID}}" type="hidden">
                                </div>
                          
                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                <div class="input-field col s12">
                                  <input required id="editZipperName" name = "editZipperName" value = "{{$zipper->strMaterialZipperName}}" type="text" class="validateName">
                                  <label for="Zipper_Name"> *Zipper Name </label>
                                </div>
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                <div class="input-field col s6">
                                  <input required id="editZipperSize" name = "editZipperSize" value = "{{$zipper->strMaterialZipperSize}}" type="text" class="validateSize">
                                  <label for="Zipper_Size"> *Zipper Size </label>
                                </div>

                                <div class="input-field col s6">
                                  <input required id="editZipperColor" name = "editZipperColor" value = "{{$zipper->strMaterialZipperColor}}" type="text" class="validateColor">
                                  <label for="Zipper_Color"> *Zipper Color </label>
                                </div>
                          </div>

                          <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                <div class="input-field">
                                  <input required id="editZipperDesc" name = "editZipperDesc" value = "{{$zipper->strMaterialZipperDesc}}" type="text" class="validateDesc">
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
                                    <input value="{{$zipper->strMaterialZipperImage}}" class="file-path validate" id="editZipperImage" name="editZipperImage" type="text">
                                  </div>
                                </div>
                          </div>
                          </div>    

                              <div class="modal-footer col s12" style="background-color:#26a69a">
                                <button type="submit" class="modal-action  waves-effect waves-green btn-flat">Update</button>
                                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>  
                              </div>
                            </form>
                          </div>
                        
                        

                          <div id="del{{$zipper->strMaterialZipperID}}" class="modal modal-fixed-footer">
                            <h5><font color = "#1b5e20"><center>ARE YOU SURE TO DEACTIVATE THIS ZIPPER?</center> </font> </h5>                            
                              <form action="{{URL::to('delZipper')}}" method="POST">
                                <div class="divider" style="height:2px"></div>                          
                                <div class="modal-content col s12">

                                  <div class="input-field">
                                    <input value="{{$zipper->strMaterialZipperID}}" id="delZipperID" name="delZipperID" type="hidden">
                                   </div>

                              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                  <div class="input-field col s12">
                                    <label for="Zipper_Name">Zipper Name </label>
                                    <input value="{{$zipper->strMaterialZipperName}}" id="delZipperName" name="delZipperName" type="text" readonly>
                                  </div>
                              </div>

                              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                  <div class="input-field col s6">
                                    <label for="Zipper_Size">Zipper Size </label>
                                    <input value="{{$zipper->strMaterialZipperSize}}" id="delZipperSize" name="delZipperSize" type="text" readonly>
                                  </div>

                                  <div class="input-field col s6">
                                    <label for="Zipper_Color">Zipper Color </label>
                                    <input value="{{$zipper->strMaterialZipperColor}}" id="delZipperColor" name="delZipperColor" type="text" readonly>
                                  </div>
                              </div>

                              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                  <div class="input-field col s12">
                                    <label for="Zipper_Desc">Description</label>
                                    <input value="{{$zipper->strMaterialZipperDesc}}" id="delZipperColor" name="delZipperColor" type="text" readonly>
                                  </div>
                              </div>

                                 <div class="input-field">
                                    <input value="{{$zipper->strMaterialZipperID}}" id="delInactiveZipper" name="delInactiveZipper" type="hidden">
                                  </div>

                              <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                                  <div class="input-field col s12">
                                    <input id="delInactiveReason" name = "delInactiveReason" value="{{$zipper->strInactiveReason}}" type="text" class="validate" required>
                                    <label for="Thread_Color"> *Reason for Deactivation: </label>
                                  </div>
                              </div>
                              </div>

                              <div class="modal-footer col s12" style="background-color:#26a69a">
                                <button type="submit" class="waves-effect waves-green btn-flat">OK</button>
                                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>  
                              </div> 
                            </form>
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

      <!--HOOK&EYE-->
      <div id="tabHook" class="hue col s12" style="margin-top:45px; background-color: #80d8ff;">
        <div style="height:30px;"></div>

       <div class="row">
        <div class="col s12 m12 l12">
            <button style="color:black; margin-right:35px; margin-left: 20px" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to add a new hook and eye detail to the table" href="#addHookEye">ADD HOOK AND EYE</button>
        </div>
      </div> 


        <div class="row">
          <div class="col s12">
            <div class="card">
              <div class="card-content">
                <div class = "col s12 m12 l12 overflow-x">
                  <h5><font color = "#1b5e20"><center>Hook & Eye</center> </font> </h5>
                  <table class = "table centered data-hook" border = "1">

                    <thead>
                      <tr>
                        <!--<th date-field="Hook and Eye ID">Hook and Eye ID</th>-->
                        <th data-field="Hook and Eye Name"> Hook Name</th>
                        <th data-field="Hook and Eye Size"> Hook Size</th>
                        <th data-field="Hook and Eye Color"> Hook Color</th>
                        <th data-field="Hook and Eye Desc">Description</th>
                        <th data-field="Image">Image</th>
                        <th data-field="Hook and Eye Desc">Edit</th>
                        <th data-field="Image">Deactivate</th>
                      </tr>
                    </thead>

                    <tbody>
                      @foreach($hooks as $hook)
                      @if($hook->boolIsActive == 1)
                      <tr>
                       <!-- <td>{{$hook->strMaterialHookID}}</td>-->
                        <td>{{$hook->strMaterialHookName}}</td>
                        <td>{{$hook->strMaterialHookSize}}</td>
                        <td>{{$hook->strMaterialHookColor}}</td>
                        <td>{{$hook->strMaterialHookDesc}}</td>
                        <td><img class="materialboxed" width="650" src="{{URL::asset($hook->strMaterialHookImage)}}"></td>

                        <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to edit hook and eye detail" href="#edit{{$hook->strMaterialHookID}}">EDIT</button></td>
                        <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of hook and eye detail from the table" href="#del{{$hook->strMaterialHookID}}">DEACTIVATE</button>

                            
                          <div id="edit{{$hook->strMaterialHookID}}" class="modal modal-fixed-footer">
                            <h5><font color = "#1b5e20"><center>EDIT HOOK AND EYE</center> </font> </h5>
                            <form action ="{{URL::to('editHook')}}" method="POST" enctype="multipart/form-data">
                              <div class="divider" style="height:2px"></div>
                              <div class="modal-content col s12"> 
                                                         
                                <div class="input-field">
                                  <input id="editHookID" name = "editHookID" value = "{{$hook->strMaterialHookID}}" type="hidden">
                                </div>
                          
                            <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                <div class="input-field col s12">
                                  <input id="editHookName" name = "editHookName" value = "{{$hook->strMaterialHookName}}" type="text" class="validateName">
                                  <label for="HookEye_Name"> *Hook and Eye Name </label>
                                </div>
                            </div>

                            <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                <div class="input-field col s6">
                                  <input id="editHookSize" name = "editHookSize" value = "{{$hook->strMaterialHookSize}}" type="text" class="validateSize">
                                  <label for="HookEye_Size"> *Hook and Eye Size </label>
                                </div>

                                <div class="input-field col s6">
                                  <input id="editHookColor" name = "editHookColor" value = "{{$hook->strMaterialHookColor}}" type="text" class="validateColor">
                                  <label for="Hookeye_Color"> *Hook and Eye Color </label>
                                </div>
                            </div>

                            <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                <div class="input-field col s12">
                                  <input id="editHookDesc" name = "editHookDesc" value = "{{$hook->strMaterialHookDesc}}" type="text" class="validateDesc">
                                  <label for="Hookeye_Desc">Description </label>
                                </div>
                            </div>

                            <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                                <div class="file-field input-field col s12">
                                  <div style="color:black" class="btn tooltipped btn-small center-text light-green lighten-2" data-position="bottom" data-delay="50" data-tooltip="May upload jpg, png, gif, bmp, tif, tiff files">
                                    <span>Upload Image</span>
                                    <input type="file" id="editImg" name="editImg" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
                                  </div>
                                  <div class="file-path-wrapper">
                                    <input value="{{$hook->strMaterialHookImage}}" id="editHookImage" name="editHookImage" class="file-path validate" type="text">
                                  </div>
                                </div> 
                            </div>
                            </div>    

                            <div class="modal-footer col s12" style="background-color:#26a69a">
                                <button type="submit" class="modal-action  waves-effect waves-green btn-flat">Update</button>
                                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>   
                            </div>
                            </form>
                          </div>
                        

                          <div id="del{{$hook->strMaterialHookID}}" class="modal modal-fixed-footer">
                            <h5><font color = "#1b5e20"><center>ARE YOU SURE TO DEACTIVATE THIS HOOK AND EYE?</center> </font> </h5>
                            <form action="{{URL::to('delHook')}}" method="POST">
                              <div class="divider" style="height:2px"></div>
                              <div class="modal-content col s12">
                                

                                 <div class="input-field">
                                    <input value="{{$hook->strMaterialHookID}}" id="delHookID" name="delHookID" type="hidden">
                                  </div>

                              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                  <div class="input-field col s12">
                                    <label for="Hook_Name">Hook and Eye Name </label>
                                    <input value="{{$hook->strMaterialHookName}}" id="delHookName" name="delHookName" type="text" readonly>
                                  </div>
                              </div>

                              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                  <div class="input-field col s6">
                                    <label for="Hook_Size">Hook and Eye Size </label>
                                    <input value="{{$hook->strMaterialHookSize}}" id="delHookSize" name="delHookSize" type="text" readonly>
                                  </div>

                                  <div class="input-field col s6">
                                    <label for="Hook_Color">Hook and Eye Color </label>
                                    <input value="{{$hook->strMaterialHookColor}}" id="delHookColor" name="delHookColor" type="text" readonly>
                                  </div>
                              </div>

                              <div class = "col s12" style="padding:15px;  border:3px solid white;">
                                  <div class="input-field col s12">
                                    <label for="Hook_Desc">Description </label>
                                    <input value="{{$hook->strMaterialHookDesc}}" id="delHookDesc" name="delHookDesc" type="text" readonly>
                                  </div>
                              </div>

                                  <div class="input-field">
                                    <input value="{{$hook->strMaterialHookID}}" id="delInactiveHook" name="delInactiveHook" type="hidden">
                                  </div>

                              <div class = "col s12" style="padding:15px;  border:3px solid white; margin-bottom:40px">
                                  <div class="input-field col s12">
                                    <input id="delInactiveReason" name = "delInactiveReason" value="{{$hook->strInactiveReason}}" type="text" class="validate" required>
                                    <label for="Thread_Color"> *Reason for Deactivation </label>
                                  </div>
                              </div>
                              </div>

                              <div class="modal-footer col s12" style="background-color:#26a69a">
                                <button type="submit" class="waves-effect waves-green btn-flat">OK</button>
                                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a> 
                              </div>
                            </form>
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
  

  <!--MODAL: add Thread-->
  <div id="addThread" class="modal modal-fixed-footer">
    <h5><font color = "#1b5e20"><center>ADD NEW THREAD</center> </font> </h5>
      <form action="{{URL::to('addThread')}}" method="POST" enctype="multipart/form-data">
        <div class="divider" style="height:2px"></div>
        <div class="modal-content col s12">
    
        <div class="input-field">
            <input id="addThreadID" name = "addThreadID" value = "{{$newThreadID}}" type="hidden">
         </div>
       
    <div class = "col s12" style="padding:15px;  border:3px solid white;">             
        <div class="input-field col s12">
          <input required id="addThreadName" name = "addThreadName" type="text" class="validateName">
          <label for="Thread_Name"> *Thread Name </label>
        </div>
    </div>

    <div class = "col s12" style="padding:15px;  border:3px solid white;">
        <div class="input-field col s12">
          <input required id="addThreadColor" name = "addThreadColor" type="text" class="validateColor">
          <label for="Thread_Color"> *Thread Color </label>
        </div>
    </div>

    <div class = "col s12" style="padding:15px;  border:3px solid white;">
        <div class="input-field col s12">
          <input required id="addThreadDesc" name = "addThreadDesc" type="text" class="validateDesc">
          <label for="Thread_Desc"> Description </label>
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
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a> 
      </div>
    </form>
  </div>


  <!--MODAL: add Needle-->
  <div id="addNeedle" class="modal modal-fixed-footer">
    <h5><font color = "#1b5e20"><center>ADD NEW NEEDLE</center> </font> </h5>   
      <form action="{{URL::to('addNeedle')}}" method="POST" enctype="multipart/form-data">
        <div class="divider" style="height:2px"></div>
        <div class="modal-content col s12"> 

        <div class="input-field">
           <input id="addNeedleID" name = "addNeedleID" value = "{{$newNeedleID}}" type="hidden">
         </div>
         
        <div class = "col s12" style="padding:15px;  border:3px solid white;">           
          <div class="input-field col s12">
            <input required id="addNeedleName" name = "addNeedleName"  type="text" class="validateName">
            <label for="Needle_Name"> *Needle Name </label>
          </div>
        </div>

        <div class = "col s12" style="padding:15px;  border:3px solid white;">
          <div class="input-field col s12">
            <input required  id="addNeedleSize" name = "addNeedleSize" type="text" class="validateSize">
            <label for="Needle_Size"> *Needle Size </label>
          </div>
        </div>
              
        <div class = "col s12" style="padding:15px;  border:3px solid white;">      
          <div class="input-field col s12">
            <input required  id="addNeedleDesc" name = "addNeedleDesc" type="text" class="validateDesc">
            <label for="Needle_Desc"> Description </label>
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
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a> 
      </div>
    </form>
  </div>

  <!--MODAL: add Button-->
  <div id="addButton" class="modal modal-fixed-footer">
    <h5><font color = "#1b5e20"><center>ADD NEW BUTTON</center> </font> </h5>
    <form action="{{URL::to('addButton')}}" method="POST" enctype="multipart/form-data">
      <div class="divider" style="height:2px"></div>
      <div class="modal-content col s12">
    
        <div class="input-field">
          <input id="addButtonID" name = "addButtonID" value = "{{$newButtonID}}" type="hidden">
        </div>
        
      <div class = "col s12" style="padding:15px;  border:3px solid white;">            
        <div class="input-field col s12">
          <input required  id="addButtonName" name = "addButtonName" type="text" class="validateName">
          <label for="Button_Name"> *Button Name </label>
        </div>
      </div>

      <div class = "col s12" style="padding:15px;  border:3px solid white;">
        <div class="input-field col s6">
          <input required id="addButtonSize" name = "addButtonSize" type="text" class="validateSize">
          <label for="Button_Size"> *Button Size </label>
        </div>

        <div class="input-field col s6">
          <input required id="addButtonColor" name = "addButtonColor" type="text" class="validateColor">
          <label for="Button_Color"> *Button Color </label>
        </div>
      </div>

      <div class = "col s12" style="padding:15px;  border:3px solid white;">
        <div class="input-field col s12">
          <input required id="addButtonDesc" name = "addButtonDesc" type="text" class="validateDesc">
          <label for="Button_Desc"> Description </label>
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
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a> 
      </div>
    </form>
  </div>

  <!--MODAL: add Zipper-->
  <div id="addZipper" class="modal modal-fixed-footer">
    <h5><font color = "#1b5e20"><center>ADD NEW ZIPPER</center> </font> </h5>
    <form action="{{URL::to('addZipper')}}" method="POST" enctype="multipart/form-data">
      <div class="divider" style="height:2px"></div>
      <div class="modal-content col s12">
    
        <div class="input-field">
          <input id="addZipperID" name = "addZipperID" value = "{{$newZipperID}}" type="hidden">
        </div>
        
      <div class = "col s12" style="padding:15px;  border:3px solid white;">            
        <div class="input-field col s12">
          <input required id="addZipperName" name = "addZipperName" type="text" class="validateName">
          <label for="Zipper_Name"> *Zipper Name </label>
        </div>
      </div>

      <div class = "col s12" style="padding:15px;  border:3px solid white;">
        <div class="input-field col s6">
          <input required id="addZipperSize" name = "addZipperSize" type="text" class="validateSize">
          <label for="Zipper_Size"> *Zipper Size </label>
        </div>

        <div class="input-field col s6">
          <input required id="addZipperColor" name = "addZipperColor" type="text" class="validateColor">
          <label for="Zipper_Color"> *Zipper Color </label>
        </div>
      </div>

      <div class = "col s12" style="padding:15px;  border:3px solid white;">
        <div class="input-field col s12">
          <input required id="addZipperDesc" name = "addZipperDesc" type="text" class="validateDesc">
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
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a> 
      </div>
    </form>
  </div>

  <!--MODAL: add HookEye-->
  <div id="addHookEye" class="modal modal-fixed-footer">
    <h5><font color = "#1b5e20"><center>ADD NEW HOOK AND EYE</center> </font> </h5>
    <form action="{{URL::to('addHook')}}" method="POST" enctype="multipart/form-data">
      <div class="divider" style="height:2px"></div>
      <div class="modal-content col s12">
    
        <div class="input-field">
          <input id="addHookEyeID" name = "addHookID" value = "{{$newHookID}}" type="hidden">
        </div>
          
      <div class = "col s12" style="padding:15px;  border:3px solid white;">          
        <div class="input-field col s12">
          <input required id="addHookEyeName" name = "addHookName" type="text" class="validateName">
          <label for="HookEye_Name"> *Hook and Eye Name </label>
        </div>
      </div>

      <div class = "col s12" style="padding:15px;  border:3px solid white;">
        <div class="input-field col s6">
          <input required id="addHookEyeSize" name = "addHookSize" type="text" class="validateSize">
          <label for="HookEye_Size"> *Hook and Eye Size </label>
        </div>

        <div class="input-field col s6">
          <input required id="addHookEyeColor" name = "addHookColor" type="text" class="validateColor">
          <label for="Hookeye_Color"> *Hook and Eye Color </label>
        </div>
      </div>

      <div class = "col s12" style="padding:15px;  border:3px solid white;">
         <div class="input-field col s12">
          <input required id="addHookEyeDesc" name = "addHookDesc" type="text" class="validateDesc">
          <label for="Hookeye_Desc"> Description </label>
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
        <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">Add</button>
        <button type="button" onclick="clearData()" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</button> 
      </div>
      
    </form>
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
          $('.data-thread').DataTable();
          $('.data-needle').DataTable();
          $('.data-button').DataTable();
          $('.data-zipper').DataTable();
          $('.data-hook').DataTable();
          $('select').material_select();
          
          setTimeout(function () {
            $('#success-message').hide();
        }, 5000);
      } );
    </script>

@stop

  