@extends('layouts.masterOnline')

@section('content')


  <div class="row section white container" style="margin-top:40px; padding:40px;">

    <div class="row" style="margin-top:40px;">
      <div class="col s12">
        <div class="col s4">
          <div class="divider grey" style="margin-bottom:5px;"></div>
          <div class="divider grey"></div>
        </div>

        <div class="col s4" style="margin-top:-30px;">
          <center><span style="font-size:40px; color: #757575; font-family:'Playfair Display','Times';">Alteration Order</span></center>
        </div>

        <div class="col s4">
          <div class="divider grey" style="margin-bottom:5px;"></div>
          <div class="divider grey"></div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col s12" style="margin-top:10px;">
      {!! Form::open() !!}
        <div class="input-field col s12" style="padding:20px;">
          <select>
            <option value="" disabled selected>All</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
          </select>
          <label><font size="3">Choose a garment category:</font></label>
        </div>
         <div class="input-field col s12" style="padding:20px;">
          <select>
            <option value="" disabled selected>All</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
          </select>
          <label><font size="3">Choose a segment:</font></label>
        </div>
         <div class="input-field col s12" style="padding:20px;">
          <select>
            <option value="" disabled selected>All</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
          </select>
          <label><font size="3">Choose an alteration type:</font></label>
        </div>
        <div class="col s12">
          <h4 style="color:#1b5e20" class="center">Note</h4>
          <div class="divider container" style="margin-bottom:20px;"></div>
          <div class="input-field col s12">
            <textarea id="textarea" class="textarea"></textarea>
            <label for="textarea"></label>
          </div>
        </div>
        {!! Form::close() !!}

        <div class="col s12" style="margin-top:25px;">
          <div class="divider"></div>
          <a class="left btn-flat tooltipped modal-trigger" data-position="bottom" data-delay="50" data-tooltip="Click to reset order" style="margin-top:30px; font-size:15px; color:white; background-color: teal; opacity:0.90" href="#resetOrder">RESET ORDER</a>
          <a type="submit" class="right btn-flat tooltipped modal-trigger" data-position="bottom" data-delay="50" data-tooltip="Click to save order" style="margin-top:30px; background-color: teal; font-size:15px; color:white" href="#summary-of-order">SAVE & PROCEED TO CHECKOUT</a>              
        </div>
      </div>

    </div>
  </div>

<!--MODALS-->

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
      <button type="submit" class="waves-effect waves-green btn-flat" href="{{URL::to('/online-alterationtransaction-newcustomer')}}"><font color="black">Yes</font></button>
      <a href="" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">No</font></a>
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
                           <td></td>
                           <td></td>
                           <td></td>
                           <!--<td> </td>-->
                        </tr>
                        </tbody>
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
            <a class="waves-effect waves-green btn-flat" href="{{URL::to('/online-check-out')}}"><font color="black">Yes</font></a>
            <a class="modal-action modal-close waves-effect waves-green btn-flat" href=""><font color="black">No</font></a>
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

    <script>

      $(document).ready(function(){
        $('.modal-trigger').leanModal();
      });
          
    </script>
 @stop