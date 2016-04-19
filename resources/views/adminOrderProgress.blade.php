@extends('layouts.master')

@section('content')

	<div class = "main-wrapper">	
		<div class="row">
	      <div class="col s12 m12 l12">
	      	<span class="page-title"><h4>Job Order Progress</h4></span>
	      </div>
    </div>
  </div>

  	<div class="row">
      	<div class="col s12 m12 l12">
	        <div class="card-panel">
	          	<div class="card-content">
                <div class = "row">
                  <div class="input-field col s6">
                    <input id="jobOrder" name = "jobOrder" type="text">
                    <label for = "jobOrder">Type Job Order Number here:</label>
                  </div>
                  <div class = "col s6">
                    <center><button style="color:black" class="btn btn-small center-text light-green accent-1" href="#">Search</button></center>
                  </div>
                </div> 
	          	  <div class="col s12 m12 l12 overflow-x">
                  <table class = "centered">
                    <thead>
                      <tr>
                        <th>Job Order No.</th>
                        <th>Order Specifications</th>
                        <th>Progress</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Job Order 001</td>
                        <td><button style="color:black" class="modal-trigger btn btn-small center-text light-green accent-1" href="#modalSpecs">View</button></td>
                        <td><button style="color:black" class="modal-trigger btn btn-small center-text light-green accent-1" href="#modalProgress">Update</button></td></td>
                      </tr>
                    </tbody>
                  
                  </table>
                 
                 
                </div>                 
                <div class = "clearfix"></div>
	        	</div>
	    	</div>
		  </div>
	 </div>

  <div id="modalSpecs" class="modal modal-fixed-footer" style = "max-width:150%; max-height:100%;">
    <div class="modal-content">

      <h3>Order Specifications</h3>

      <div class ="row">

        <div class="input-field col s6">
          <input id="custName" name="custName" type="text" value = "Honey May" readonly>
          <label for="custName">Customer Name: </label>
        </div>
        <div class="input-field col s6">
          <input id="modePayment" name="modePayment" type="text" value = "Cash" readonly>
          <label for="modePayment">Mode of Payment: </label>
        </div>
        <div class="input-field col s6">
          <input id="orderDate" name="orderDate" type="text" value = "03/18/2015" readonly>
          <label for="orderDate">Date Ordered: </label>
        </div>
        <div class="input-field col s6">
          <input id="dueDate" name="dueDate" type="text" value = "05/18/2015" readonly>
          <label for="dueDate">Due Date: </label>
        </div>
      </div>

      <div class = "row">

        <div class="col s12 m12 l12 overflow-x">
          <table class = "striped centered">
            <thead>
              <tr>
                <th>Garment Type</th>
                <th>Garment Name</th>
                <th>Garment Image</th>
                <th>Quantity</th>
                <th>Fabric Type</th>
                <th>Swatch Fabric Name</th>
                <th>Swatch Image</th>
                <th>Swatch Code</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Uniform</td>
                <td>Women's Uniform</td>
                <td><img class="img hoverable" src="../img/uniform3.jpg"></td>
                <td>1</td>
                <td>Linen</td>
                <td>Linen Keme</td>
                <td><img class="img hoverable" src="../imgSwatches/citadel alpine.jpg"></td>
                <td>LINK001</td>
              </tr>
              <tr>
                <td>Gown</td>
                <td>Tube Cocktail</td>
                <td><img class="img hoverable" src="../img/gown2.jpg"></td>
                <td>1</td>
                <td>Cotton</td>
                <td>Cotton Keme</td>
                <td><img class="img hoverable" src="../imgSwatches/citadel grape.jpg"></td>
                <td>COT001</td>
              </tr>
            </tbody>
          </table>
        </div>
                  
        <div class = "clearfix"></div>
      </div>
    </div>

    <div class="modal-footer">                  
      <button type="button" class=" modal-action modal-close waves-effect waves-green btn-flat">CLOSE</a>                    
    </div>
  </div>

   <div id="modalProgress" class="modal modal-fixed-footer" style = "max-width:150%; max-height:100%;">
    <div class="modal-content">

      <h3>Progress Update</h3>

      <div class ="row">
        <div class="col s12 m12 l12 overflow-x">
          <table class = "centered">
            <thead>
              <tr>
                <td> <center>Garment Type</td></center>
                <td> <center>Garment Name</td></center>
                <td> <center>Segment Name</td></center>
                <td> <center>Quantity</td></center>
                <td> <center>Transaction Type</td></center>
                <td> <center>Transaction Type</td></center>
                <td> <center>Status</center>  </td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Uniform</td>
                <td>Women's Uniform</td>
                <td>Longsleeve</td>
                <td>1</td>
                <td> Made to Order</td>
                <td>
                  <form action="gr1">
                    <div class = "row">
                      <div class = "col s6">
                        <input name="group1" type="radio" id="gr1finished" checked= "checked"/>
                        <label for="gr1finished">Finished</label>
                      </div>
                      <div class = "col s6">
                        <input name="group1" type="radio" id="gr1unfinished" />
                        <label for="gr1unfinished">Unfinished</label>
                      </div>
                    </div>  
                  </form>
                </td>
              </tr>

              <tr>
                <td>Uniform</td>
                <td>Women's Uniform</td>
                <td>Skirt</td>
                <td>1</td>
                <td> Made to Order</td>
                <td>
                  <form action="gr2">
                    <div class = "row">
                      <div class = "col s6">
                        <input name="group2" type="radio" id="gr2finished" />
                        <label for="gr2finished">Finished</label>
                      </div>
                      <div class = "col s6">
                        <input name="group2" type="radio" id="gr2unfinished" checked= "checked" />
                        <label for="gr2unfinished">Unfinished</label>
                      </div>
                    </div>  
                  </form>
                </td>
              </tr>

              <tr>
                <td>Gown</td>
                <td>Tube Cocktail</td>
                <td>Tube</td>
                <td>1</td>
                <td> Made to Order</td>
                <td>
                  <form action="gr3">
                    <div class = "row">
                      <div class = "col s6">
                        <input name="group3" type="radio" id="gr3finished" />
                        <label for="gr3finished">Finished</label>
                      </div>
                      <div class = "col s6">
                        <input name="group3" type="radio" id="gr3unfinished" checked= "checked"/>
                        <label for="gr3unfinished">Unfinished</label>
                      </div>
                    </div>  
                  </form>
                </td>
              </tr>

              <tr>
                <td>Gown</td>
                <td>Tube Cocktail</td>
                <td>Cocktail</td>
                <td>1</td>
                <td> Made to Order</td>
                <td>
                  <form action="gr4">
                    <div class = "row">
                      <div class = "col s6">
                        <input name="group4" type="radio" id="gr4finished" />
                        <label for="gr4finished">Finished</label>
                      </div>
                      <div class = "col s6">
                        <input name="group4" type="radio" id="gr4unfinished" checked= "checked" />
                        <label for="gr4unfinished">Unfinished</label>
                      </div>
                    </div>  
                  </form>
                </td>
              </tr>
            </tbody>
          </table>  
        </div>
                  
        <div class = "clearfix"></div> 
      </div>

      <div class ="row">
        <div class = "col s12">
          <label><font size = "+2">Progress Bar:</font></label>
        </div>
        <div class = "col s2"> &nbsp </div>
        <div class = "col s8">
          <br>
          <div id="progress">
                <span id="percent">25%</span>
                <div id="bar"></div>
              
          </div>
        </div> 
      </div>  
      <label><center><font size ="+2">25% of the order was done</font></center></label>  
        
    </div>

    <div class="modal-footer">                  
      <button type="button" class=" modal-action modal-close waves-effect waves-green btn-flat">CLOSE</a>                    
    </div>
  </div> 



@stop

@section('scripts')
	<script>
    $(document).ready(function() {
    $('select').material_select();
    });
  </script>

@stop