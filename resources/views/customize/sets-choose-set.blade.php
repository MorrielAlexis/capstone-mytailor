@extends('layouts.masterOnline')

@section('content')

    <div class="section white" style="margin:40px; padding:40px;"> 

    <div class="row" style="margin-top:40px;">
      <div class="col s12">
        <div class="col s4">
          <div class="divider grey" style="margin-bottom:5px;"></div>
          <div class="divider grey"></div>
        </div>

        <div class="col s4" style="margin-top:-30px;">
          <center><span style="font-size:40px; color: #757575;">CHOOSE YOUR SET</span></center>
        </div>

        <div class="col s4">
          <div class="divider grey" style="margin-bottom:5px;"></div>
          <div class="divider grey"></div>
        </div>
      </div>
    </div>


  <div class="row">
    <div class="col s12 m12 l12">

      <div class="col s12">
        <div id="shoppingCart">
          <div>
            <div class="row">
            <div class="col s12">

              <div class="col s6" style="margin-bottom:20px">
                <div class="input-field col s12">
                    <select>
                        <option value="M" class="circle" selected>Male</option>
                        <option value="F" class="circle">Female</option>
                        <option value="A" class="circle">All</option>
                    </select>
                    <label for="" style="font-size:15px">Select packages for:</label>
                    
                </div>
              </div>

            </div>

            <!--Modal for Reset Order-->
            <div id="reset-order" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:120px;">
              <h5><font color="red"><center><b>Warning!</b></center></font></h5>  
              {!! Form::open() !!}
                  <div class="divider" style="height:2px"></div>
                  <div class="modal-content col s12">
                    <div class="col s3">
                      <i class="mdi-alert-error" style="font-size:50px; color:red"></i>
                    </div>
                    <div class="col s9">
                      <p><font size="+1">Doing this will clear all orders made!</font></p>
                    </div>
                  </div>

                  <div class="modal-footer col s12">
                            <a class="waves-effect waves-green btn-flat" href="{{URL::to('customize-sets-choose-set')}}"><font color="black"><b>OK</b></font></a>
                            <a class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black"><b>Cancel</b></font></a>
                        </div>
                {!! Form::close() !!}
            </div>
            <!--End of Modal for Reset Order-->

            <!-- List of Packages Available-->
            <div class="col s12" style="margin-top:10px">
              <div class="divider"></div>
              <div class="divider"></div>
              <div class="divider"></div>
              <p class="center-align" style="color:teal"><b>CHOOSE AMONG AVAILABLE PACKAGE SETS</b></p>
          
                <div class="col s4" style="margin-top:20px; margin-bottom:20px">
                         <div class="container">
                         <div class="z-depth-1 card medium" style="border:3px gray solid">
                             <div class="card-image">
                                <img class="responsive-img" height = "50%" src="">
                             </div>
                            <div class="card-content">
                              <p class="center-align">
                               <span class="card-title" style="color:black"><b></b></span>
                                 <p class="center-align" style="color:teal">Package includes:</p>
                                 <p class="center-align" style="color:gray"></p>
                              </p>
                             </div>

                         </div>

                        <div class="col s12">
                          <div class="center col s3" style="margin-top:10px; padding-right:5px">
                              <input type="checkbox" name="cbx-package-name[]" class="filled-in cbx-package-name" id="" value="">
                            <label for=""></label>
                          </div>

                      <!--For the quantity-->
                          <div class="center col s9">
                            <input type="text" name="int-package-qty[]" id="" class="center int-package-qty" value=1 disabled="true">
                            <label for="">Quantity</label>
                          </div>
                          <!--End for the quantity-->
                        </div>

                      </div>
                    </div>  
                    </div>

                     <!--End of List for packages-->
                     <div class="col s12">
                  <div class="divider"></div>
                </div>

  <div class="col s12" style="padding:30px">
      <a href="#reset-order" class="btn-flat white-text" style="color:white; background-color:teal;">Reset Order</a>
      <a href="{{URL::to('/customize-sets-list-of-orders')}}" class="right btn-flat white-text" style="color:white; background-color:teal;">Customize Orders</a>
  </div>

    <div class="divider" style="margin-bottom:20px;"></div>
    


          </div>
        </div>
      </div>
    </div>


    </div>
  </div>

</div>
@stop

@section('scripts')

  <script>
    $(document).ready(function() {
      $('select').material_select();
    });
  </script>         

  <script>
   $(document).ready(function(){
    $('.tooltipped').tooltip({delay: 50});
   });
  </script>

@stop