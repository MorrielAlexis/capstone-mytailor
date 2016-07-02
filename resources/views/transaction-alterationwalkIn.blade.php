@extends('layouts.master')

@section('content')

<div class="main-wrapper"  style="margin-top:30px">

	<div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><center><h3><b>Welcome to <font color="white">MyTailor</font></b></h3></center></span>
        <center><h5>Walk-in Alteration </h5></center>
      </div>
    </div>

    <div class="row">
        <div class="col s12 m12 l12">
        	<div class="card-panel">

                <span class="card-title"><h5 style="color:#1b5e20"><center>Alteration Order</center></h5></span>
                <div class="divider" style="margin-bottom:50px;"></div>

            <div class="row">
                <div class="col s6" style="margin-top:10px;">
                      {{-- start of garment category dropdown --}}
                      <div class="input-field col s12" style="padding:20px;">
                        <select>
                          <option value="" disabled selected>Choose your garment</option>
                          <option value="1">Uniform</option>
                          <option value="2">Gown</option>
                          <option value="3">Suit</option>
                        </select>
                        <label>Garment Type</label>
                      </div>
                     {{--  end of garment category dropdown --}}

                      {{-- < Start of Segment> --}}
                      <div class="input-field col s12" style="padding:20px;">
                        <select>
                          <option value="" disabled selected>Choose your segment</option>
                          <option value="1">Polo</option>
                          <option value="2">Shorts</option>
                          <option value="3">Pants</option>
                        </select>
                        <label>Garment Segment</label>
                      </div>
                      {{-- end of segment dropdown --}}

                      <div class="input-field col s12" style="padding:20px;">

                      {{-- start of alteration dropdown --}}
                        <div class="col s10">
                            <select multiple>
                              <option value="" disabled selected>What to alter?</option>
                              <option value="1">Hem</option>
                              <option value="2">Slim</option>
                              <option value="3">Sleeves</option>
                            </select>
                            <label>Alteration Type</label>
                        </div>
                        {{-- end of alteration dropdown --}}

                        <div class="col s2">
                            <a class="btn modal-trigger tooltipped" href="#measurementmodal" data-position="top" data-delay="50" data-tooltip="Supply measurements"><i class="mdi-av-playlist-add"></i></a>
                        </div>
                      </div>
                </div>
                <div class="col s6 container">
                    <center><img class="responsive-img" src="#!" style="height:250px; width:250px;"></center>
                    <form action="#">
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>File</span>
                                <input type="file">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                    </form>
                </div>
            
            <div class="col s12" style="margin-top:25px;">
              <div class="divider"></div>
              <a class="left btn tooltipped modal-trigger" data-position="bottom" data-delay="50" data-tooltip="Click to reset order" style="margin-top:30px; font-size:15px; color:white; background-color: teal; opacity:0.90" href="#resetOrder">RESET ORDER</a>
              <button type="submit" class="right btn tooltipped modal-trigger" data-position="bottom" data-delay="50" data-tooltip="Click to save order" style="margin-top:30px; background-color: teal; font-size:15px; color:white" href="#saveOrder">SAVE</a>              
            </div>

        	</div>

 
            </div>
        </div>
    </div>

  <!--Reset Order Modal-->
  <div id="resetOrder" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:150px">
    <h5><font color="red"><center><b>Warning!</b></center></font></h5>
    <div class="divider" style="height:2px"></div>
    <div class="modal-content">
      <div class="row">
        <div class="col s3">
          <i class="mdi-alert-warning" style="font-size:50px; color:red"></i>
        </div>
        <div class="col s9">
          <p><font size="+1">Are you sure you want to reset your order?</font></p>
        </div>
      </div>
    </div>
    <div class="modal-footer col s12" style="background-color:red; opacity:0.85">
      <button type="submit" class="waves-effect waves-green btn-flat" href="#!"><font color="black">Yes</font></button>
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">No</font></a>
    </div>
  </div>  

  <!--Save Modal-->
  <div id="saveOrder" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:150px">
    <h5><font color="green"><center><b>Save Order</b></center></font></h5>
    <div class="divider" style="height:2px"></div>
    <div class="modal-content">
      <div class="row">
        <div class="col s3">
          <i class="mdi-alert-warning" style="font-size:50px; color:yellow"></i>
        </div>
        <div class="col s9">
          <p><font size="+1">Are you sure you want to save your order?</font></p>
        </div>
      </div>
    </div>
    <div class="modal-footer col s12" style="background-color:green; opacity:0.85">
      <a class="modal-action modal-close waves-effect waves-green btn-flat" href="#!"><font color="black">Cancel</font></a>
      <a class="modal-action modal-close waves-effect waves-green btn-flat" href="#!"><font color="black">No</font></a>
      <a class="modal-action modal-close waves-effect waves-green btn-flat modal-trigger" href="#savednotif"><font color="black">Yes</font></a>
    </div>
  </div>  

  <!--Saved notif-->
   <div id="savednotif" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:150px">
        <div class="modal-content">
          <h5 style="color:#1b5e20; margin-top:50px;" class="center">ORDER SUCCESSFULLY SAVED</h5>
          <div class="divider container" style="height:2px;"></div>
        </div>

        <div class="modal-footer" style="background-color:#26a69a">
            <a href="{{URL::to('transaction/alterationWalkIn')}}" class="left modal-action modal-close waves-effect waves-green btn-flat">add another order</a>
            <a href="#summary-of-order" class="right modal-action modal-close waves-effect waves-green btn-flat modal-trigger">Proceed to checkout</a>
        </div>
    </div>

    <!--Measurement button Modal-->
    <div id="measurementmodal" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4 style="color:#1b5e20" class="center">Measurements</h4>
            <div class="divider container" style="margin-bottom:20px;"></div>
            <div class="row">
                <div class="col s6">
                    <div class="input-field">
                        <input id ="measurement" type="text" class="validate">
                        <label for="measurement">Measurement</label>
                    </div>
                    <div class="input-field">
                        <input id ="measurement" type="text" class="validate">
                        <label for="measurement">Measurement</label>
                    </div>
                    <div class="input-field">
                        <input id ="measurement" type="text" class="validate">
                        <label for="measurement">Measurement</label>
                    </div>
                </div>
                <div class="col s6">
                    <div class="input-field">
                        <input id ="measurement" type="text" class="validate">
                        <label for="measurement">Measurement</label>
                    </div>
                    <div class="input-field">
                        <input id ="measurement" type="text" class="validate">
                        <label for="measurement">Measurement</label>
                    </div>
                    <div class="input-field">
                        <input id ="measurement" type="text" class="validate">
                        <label for="measurement">Measurement</label>
                    </div>
                </div>
            </div>

            <h4 style="color:#1b5e20" class="center">Note</h4>
            <div class="divider container" style="margin-bottom:20px;"></div>
                <div class="input-field col s12">
                    <textarea id="textarea" class="textarea"></textarea>
                    <label for="textarea"></label>
                </div>

        </div>

        <div class="modal-footer" style="background-color:#26a69a">
            <a href="" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
            <a href="" class="modal-action modal-close waves-effect waves-green btn-flat">Save</a>
        </div>
    </div>


    <!--PROCEED TO CHECKOUT-->
    <div id="summary-of-order" class="modal modal-fixed-footer" style="height:500px; width:800px; margin-top:30px">
      <h5><font color="teal"><center><b>Summary of Orders</b></center></font></h5>
        
        {!! Form::open() !!}
          <div class="divider" style="height:2px"></div>
          <div class="modal-content col s12">
            <label>This is a summary of orders:</label>
            <div class="container">
                          <table class = "table centered order-summary" border = "1">
                    <thead style="color:gray">
                        <tr>
                            <th data-field="garment">Garment</th>         
                            <th data-field="segment">Segment</th>
                            <th data-field="alterationtype">Alteration Type</th>
                            <th data-field="price">Unit Price</th>
                            <!--<th data-field="price">Total Price</th>-->
                          </tr>
                        </thead>
                        <tbody>
                        <tr>
                           <td>Uniform</td>
                           <td>Skirt</td>
                           <td>Slim</td>
                           <td>PHP</td>
                           <!--<td> </td>-->
                        </tr>
                </table>
                </div>

                <div class="divider"></div>
                <div class="divider"></div>

                <div class="col s12" style="margin-bottom:50px" >
              <div class="col s6"><p style="color:gray">Estimated time to finish all orders:<p style="color:black" id="total-time"></p></p></div>
              <div class="col s6"><p style="color:gray">Total Amount to Pay:<p style="color:black" id="total-price"></p></p></div>
            </div>
          </div>

          <div class="modal-footer col s12">
            <p class="left" style="margin-left:10px; color:gray;">Continue to payment?</p>
            <a class="waves-effect waves-green btn-flat" href="{{URL::to('/transaction/walkin-individual-payment-customer-info')}}"><font color="black">Yes</font></a>
            <a class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">No</font></a>
          </div>
        {!! Form::close() !!}
    </div>
 @stop

 @section('scripts')

    <script>
          $(document).ready(function() {
            $('select').material_select();
          });
    </script>

@stop