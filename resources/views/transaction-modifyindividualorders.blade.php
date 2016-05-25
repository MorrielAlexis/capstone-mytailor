@extends('layouts.master')

@section('content')

<div class="main-wrapper"  style="margin-top:30px">

  	<div class="row">
    	<div class="col s6">
        	<span class="page-title"><h4>Individual Orders</h4></span>
      	</div>
      	<div class="col s6">
      		<font size="+2"><ul style="margin-right:25px; margin-top:-20px;" class="right section table-of-contents">
        		<li><a class="white-text" href="#walkinorders">Walk In Orders</a></li>
        		<li><a class="white-text" href="#onlineorders">Online Orders</a></li>
      		</ul></font>
 	 	</div>
    </div>

	<div class="row">
	    <div class="col s12 m12 l12">
	    	<div class="card-panel">
				
				<!--WALK IN ORDERS-->
				<div  id="walkinorders" class="container" style="background-color:#ef5350; border-radius:180px; width:95%;"><h5 style="color:#1b5e20; padding:20px;"><center><b>Walk In Orders</b></center></h5></div>
		        <div class="divider" style="margin-bottom:30px;"></div>

		        <ul class="collapsible popout" data-collapsible="accordion" style="border:none;">
			    
			    <li style="margin-bottom:10px;">
			        <div class="collapsible-header">
			        	<div class="row">
			        		<div class="col s1">
			        			<div style="margin-top:25px;"><i class="mdi-maps-directions-walk" style="font-size:50px;"></i></div>
			        		</div>
			        		<div class="col s11">
			        			<p>CUSTOMER NAME</P>
			        		</div>
			        	</div>
			        </div>

					<div class="collapsible-body">
						<h5 style="color:#1b5e20; margin-left:20px;">Order Specification</h5>

						<div class = "row">

						    <div class="col s12 m12 l12 overflow-x">
						    	<table class = "centered">
						    		<thead>
						    			<tr>
						    				<th>Garment Type</th>
						    				<th>Garment Image</th>
						    				<th>Garment Segment</th>
						    				<th>Segment Pattern</th>
						    				<th>Quantity</th>
						    				<th>Fabric Type</th>
						    				<th>Swatch Pattern</th>
						    				<th></th>
						    				<th></th>
						    			</tr>
						    		</thead>
						    		<tbody>
						    			<tr style="border:2px solid red">
						    				<td class="input-field">
												<select>
												    <option value="1" data-icon="#!" class="circle">Uniform</option>
												    <option value="2" data-icon="#!" class="circle">Suit</option>
												    <option value="3" data-icon="#!" class="circle">Gown</option>
												</select>
											</td>
						    				<td class="file-field"><img class="img hoverable" src="../img/uniform3.jpg"></td>
						    				<td class="input-field">
												<select>
												    <option value="1" data-icon="#!" class="circle">Skirt</option>
												    <option value="2" data-icon="#!" class="circle">Pants</option>
												    <option value="3" data-icon="#!" class="circle">Polo</option>
												    <option value="4" data-icon="#!" class="circle">Shorts</option>
												</select>
											</td>
						    				<td class="input-field">
												<select>
												    <option value="1" data-icon="#!" class="circle">Pencil Cut</option>
												    <option value="2" data-icon="#!" class="circle">Balloon</option>
												</select>
											</td>
						    				<td><a class="btn modal-trigger" href="#orderQuantity">1</a></td>
						    				<td><a class="btn modal-trigger" href="#fabrictype">Linen</a></td>
						    				<td><img class="img hoverable modal-trigger" href="#swatchpattern" src="../imgSwatches/citadel alpine.jpg"></td>
						    				<td><a class=" btn modal-trigger tooltipped" href="#measurementmodal" data-position="top" data-delay="50" data-tooltip="Measurements"><i class="mdi-action-view-headline"></i></a></td>
						    				<td><a class="btn modal-trigger tooltipped circle red" href="#removeOrder" data-position="top" data-delay="50" data-tooltip="Delete Order" style="border-radius:180px;"><i class="mdi-content-clear"></i></a></td>
						    			</tr>
						    			<tr>
						    				<td class="input-field">
												<select>
												    <option value="1" data-icon="#!" class="circle">Uniform</option>
												    <option value="2" data-icon="#!" class="circle">Suit</option>
												    <option value="3" data-icon="#!" class="circle">Gown</option>
												</select>
											</td>
						    				<td><img class="img hoverable" src="../img/gown2.jpg"></td>
						    				<td class="input-field">
												<select>
												    <option value="1" data-icon="#!" class="circle">Skirt</option>
												    <option value="2" data-icon="#!" class="circle">Pants</option>
												    <option value="3" data-icon="#!" class="circle">Polo</option>
												    <option value="4" data-icon="#!" class="circle">Shorts</option>
												</select>
											</td>
						    				<td class="input-field">
												<select>
												    <option value="1" data-icon="#!" class="circle">Pencil Cut</option>
												    <option value="2" data-icon="#!" class="circle">Balloon</option>
												</select>
											</td>
						    				<td><a class="btn modal-trigger" href="#orderQuantity">1</a></td>
						    				<td><a class="btn modal-trigger" href="#fabrictype">Cotton</a></td>
						    				<td><img class="img hoverable modal-trigger" href="#swatchpattern" src="../imgSwatches/citadel grape.jpg"></td>
						    				<td><a class="btn modal-trigger tooltipped" href="#measurementmodal" data-position="top" data-delay="50" data-tooltip="Measurements"><i class="mdi-action-view-headline"></i></a></td>
						    				<td><a class="btn modal-trigger tooltipped circle red" href="#removeOrder" data-position="top" data-delay="50" data-tooltip="Delete Order" style="border-radius:180px;"><i class="mdi-content-clear"></i></a></td>
						    			</tr>
						    		</tbody>
						    	</table>
						    </div>
				                  
				            <div class = "clearfix"></div>
				        </div>

					</div>
			    </li>
			    <li style="margin-bottom:10px;">
			        <div class="collapsible-header">
			        	<div class="row">
			        		<div class="col s1">
			        			<div style="margin-top:25px;"><i class="mdi-maps-directions-walk" style="font-size:50px;"></i></div>
			        		</div>
			        		<div class="col s11">
			        			<p>CUSTOMER NAME</P>
			        		</div>
			        	</div>
			        </div>

					<div class="collapsible-body">
						<h5 style="color:#1b5e20; margin-left:20px;">Order Specification</h5>

						<div class = "row">

						    <div class="col s12 m12 l12 overflow-x">
						    	<table class = "centered">
						    		<thead>
						    			<tr>
						    				<th>Garment Type</th>
						    				<th>Garment Image</th>
						    				<th>Garment Segment</th>
						    				<th>Segment Pattern</th>
						    				<th>Quantity</th>
						    				<th>Fabric Type</th>
						    				<th>Swatch Pattern</th>
						    				<th></th>
						    				<th></th>
						    			</tr>
						    		</thead>
						    		<tbody>
						    			<tr>
						    				<td class="input-field">
												<select>
												    <option value="1" data-icon="#!" class="circle">Uniform</option>
												    <option value="2" data-icon="#!" class="circle">Suit</option>
												    <option value="3" data-icon="#!" class="circle">Gown</option>
												</select>
											</td>
						    				<td class="file-field"><img class="img hoverable" src="../img/uniform3.jpg"></td>
						    				<td class="input-field">
												<select>
												    <option value="1" data-icon="#!" class="circle">Skirt</option>
												    <option value="2" data-icon="#!" class="circle">Pants</option>
												    <option value="3" data-icon="#!" class="circle">Polo</option>
												    <option value="4" data-icon="#!" class="circle">Shorts</option>
												</select>
											</td>
						    				<td class="input-field">
												<select>
												    <option value="1" data-icon="#!" class="circle">Pencil Cut</option>
												    <option value="2" data-icon="#!" class="circle">Balloon</option>
												</select>
											</td>
						    				<td><a class="btn modal-trigger" href="#orderQuantity">1</a></td>
						    				<td><a class="btn modal-trigger" href="#fabrictype">Linen</a></td>
						    				<td><img class="img hoverable modal-trigger" href="#swatchpattern" src="../imgSwatches/citadel alpine.jpg"></td>
						    				<td><a class=" btn modal-trigger tooltipped" href="#measurementmodal" data-position="top" data-delay="50" data-tooltip="Measurements"><i class="mdi-action-view-headline"></i></a></td>
						    				<td><a class="btn modal-trigger tooltipped circle red" href="#removeOrder" data-position="top" data-delay="50" data-tooltip="Delete Order" style="border-radius:180px;"><i class="mdi-content-clear"></i></a></td>
						    			</tr>
						    			<tr>
						    				<td class="input-field">
												<select>
												    <option value="1" data-icon="#!" class="circle">Uniform</option>
												    <option value="2" data-icon="#!" class="circle">Suit</option>
												    <option value="3" data-icon="#!" class="circle">Gown</option>
												</select>
											</td>
						    				<td><img class="img hoverable" src="../img/gown2.jpg"></td>
						    				<td class="input-field">
												<select>
												    <option value="1" data-icon="#!" class="circle">Skirt</option>
												    <option value="2" data-icon="#!" class="circle">Pants</option>
												    <option value="3" data-icon="#!" class="circle">Polo</option>
												    <option value="4" data-icon="#!" class="circle">Shorts</option>
												</select>
											</td>
						    				<td class="input-field">
												<select>
												    <option value="1" data-icon="#!" class="circle">Pencil Cut</option>
												    <option value="2" data-icon="#!" class="circle">Balloon</option>
												</select>
											</td>
						    				<td><a class="btn modal-trigger" href="#orderQuantity">1</a></td>
						    				<td><a class="btn modal-trigger" href="#fabrictype">Cotton</a></td>
						    				<td><img class="img hoverable modal-trigger" href="#swatchpattern" src="../imgSwatches/citadel grape.jpg"></td>
						    				<td><a class="btn modal-trigger tooltipped" href="#measurementmodal" data-position="top" data-delay="50" data-tooltip="Measurements"><i class="mdi-action-view-headline"></i></a></td>
						    				<td><a class="btn modal-trigger tooltipped circle red" href="#removeOrder" data-position="top" data-delay="50" data-tooltip="Delete Order" style="border-radius:180px;"><i class="mdi-content-clear"></i></a></td>
						    			</tr>
						    		</tbody>
						    	</table>
						    </div>
				                  
				            <div class = "clearfix"></div>
				        </div>

					</div>
			    </li>
				</ul>

				<!--ONLINE ORDERS-->
				<div id="onlineorders" class="container" style="background-color:#ef5350; border-radius:180px; width:95%;"><h5 style="color:#1b5e20; padding:20px;"><center><b>Online Orders</b></center></h5></div>
		        <div class="divider" style="margin-bottom:30px;"></div>

		        <ul class="collapsible popout" data-collapsible="accordion" style="border:none;">
			    <li style="margin-bottom:10px;">
			        <div class="collapsible-header">
			        	<div class="row">
			        		<div class="col s1">
			        			<div style="margin-top:25px;"><i class="mdi-hardware-computer" style="font-size:50px;"></i></div>
			        		</div>
			        		<div class="col s11">
			        			<p>CUSTOMER NAME</P>
			        		</div>
			        	</div>
			        </div>

					<div class="collapsible-body">
						<h5 style="color:#1b5e20; margin-left:20px;">Order Specification</h5>

						<div class = "row">

						    <div class="col s12 m12 l12 overflow-x">
						    	<table class = "centered">
						    		<thead>
						    			<tr>
						    				<th>Garment Type</th>
						    				<th>Garment Image</th>
						    				<th>Garment Segment</th>
						    				<th>Segment Pattern</th>
						    				<th>Quantity</th>
						    				<th>Fabric Type</th>
						    				<th>Swatch Pattern</th>
						    				<th></th>
						    				<th></th>
						    			</tr>
						    		</thead>
						    		<tbody>
						    			<tr>
						    				<td class="input-field">
												<select>
												    <option value="1" data-icon="#!" class="circle">Uniform</option>
												    <option value="2" data-icon="#!" class="circle">Suit</option>
												    <option value="3" data-icon="#!" class="circle">Gown</option>
												</select>
											</td>
						    				<td class="file-field"><img class="img hoverable" src="../img/uniform3.jpg"></td>
						    				<td class="input-field">
												<select>
												    <option value="1" data-icon="#!" class="circle">Skirt</option>
												    <option value="2" data-icon="#!" class="circle">Pants</option>
												    <option value="3" data-icon="#!" class="circle">Polo</option>
												    <option value="4" data-icon="#!" class="circle">Shorts</option>
												</select>
											</td>
						    				<td class="input-field">
												<select>
												    <option value="1" data-icon="#!" class="circle">Pencil Cut</option>
												    <option value="2" data-icon="#!" class="circle">Balloon</option>
												</select>
											</td>
						    				<td><a class="btn modal-trigger" href="#orderQuantity">1</a></td>
						    				<td><a class="btn modal-trigger" href="#fabrictype">Linen</a></td>
						    				<td><img class="img hoverable modal-trigger" href="#swatchpattern" src="../imgSwatches/citadel alpine.jpg"></td>
						    				<td><a class=" btn modal-trigger tooltipped" href="#measurementmodal" data-position="top" data-delay="50" data-tooltip="Measurements"><i class="mdi-action-view-headline"></i></a></td>
						    				<td><a class="btn modal-trigger tooltipped circle red" href="#removeOrder" data-position="top" data-delay="50" data-tooltip="Delete Order" style="border-radius:180px;"><i class="mdi-content-clear"></i></a></td>
						    			</tr>
						    			<tr>
						    				<td class="input-field">
												<select>
												    <option value="1" data-icon="#!" class="circle">Uniform</option>
												    <option value="2" data-icon="#!" class="circle">Suit</option>
												    <option value="3" data-icon="#!" class="circle">Gown</option>
												</select>
											</td>
						    				<td><img class="img hoverable" src="../img/gown2.jpg"></td>
						    				<td class="input-field">
												<select>
												    <option value="1" data-icon="#!" class="circle">Skirt</option>
												    <option value="2" data-icon="#!" class="circle">Pants</option>
												    <option value="3" data-icon="#!" class="circle">Polo</option>
												    <option value="4" data-icon="#!" class="circle">Shorts</option>
												</select>
											</td>
						    				<td class="input-field">
												<select>
												    <option value="1" data-icon="#!" class="circle">Pencil Cut</option>
												    <option value="2" data-icon="#!" class="circle">Balloon</option>
												</select>
											</td>
						    				<td><a class="btn modal-trigger" href="#orderQuantity">1</a></td>
						    				<td><a class="btn modal-trigger" href="#fabrictype">Cotton</a></td>
						    				<td><img class="img hoverable modal-trigger" href="#swatchpattern" src="../imgSwatches/citadel grape.jpg"></td>
						    				<td><a class="btn modal-trigger tooltipped" href="#measurementmodal" data-position="top" data-delay="50" data-tooltip="Measurements"><i class="mdi-action-view-headline"></i></a></td>
						    				<td><a class="btn modal-trigger tooltipped circle red" href="#removeOrder" data-position="top" data-delay="50" data-tooltip="Delete Order" style="border-radius:180px;"><i class="mdi-content-clear"></i></a></td>
						    			</tr>
						    		</tbody>
						    	</table>
						    </div>
				                  
				            <div class = "clearfix"></div>
				        </div>

					</div>
			    </li>
			    <li style="margin-bottom:10px;">
			        <div class="collapsible-header">
			        	<div class="row">
			        		<div class="col s1">
			        			<div style="margin-top:25px;"><i class="mdi-hardware-computer" style="font-size:50px;"></i></div>
			        		</div>
			        		<div class="col s11">
			        			<p>CUSTOMER NAME</P>
			        		</div>
			        	</div>
			        </div>

					<div class="collapsible-body">
						<h5 style="color:#1b5e20; margin-left:20px;">Order Specification</h5>

						<div class = "row">

						    <div class="col s12 m12 l12 overflow-x">
						    	<table class = "centered">
						    		<thead>
						    			<tr>
						    				<th>Garment Type</th>
						    				<th>Garment Image</th>
						    				<th>Garment Segment</th>
						    				<th>Segment Pattern</th>
						    				<th>Quantity</th>
						    				<th>Fabric Type</th>
						    				<th>Swatch Pattern</th>
						    				<th></th>
						    				<th></th>
						    			</tr>
						    		</thead>
						    		<tbody>
						    			<tr>
						    				<td class="input-field">
												<select>
												    <option value="1" data-icon="#!" class="circle">Uniform</option>
												    <option value="2" data-icon="#!" class="circle">Suit</option>
												    <option value="3" data-icon="#!" class="circle">Gown</option>
												</select>
											</td>
						    				<td class="file-field"><img class="img hoverable" src="../img/uniform3.jpg"></td>
						    				<td class="input-field">
												<select>
												    <option value="1" data-icon="#!" class="circle">Skirt</option>
												    <option value="2" data-icon="#!" class="circle">Pants</option>
												    <option value="3" data-icon="#!" class="circle">Polo</option>
												    <option value="4" data-icon="#!" class="circle">Shorts</option>
												</select>
											</td>
						    				<td class="input-field">
												<select>
												    <option value="1" data-icon="#!" class="circle">Pencil Cut</option>
												    <option value="2" data-icon="#!" class="circle">Balloon</option>
												</select>
											</td>
						    				<td><a class="btn modal-trigger" href="#orderQuantity">1</a></td>
						    				<td><a class="btn modal-trigger" href="#fabrictype">Linen</a></td>
						    				<td><img class="img hoverable modal-trigger" href="#swatchpattern" src="../imgSwatches/citadel alpine.jpg"></td>
						    				<td><a class=" btn modal-trigger tooltipped" href="#measurementmodal" data-position="top" data-delay="50" data-tooltip="Measurements"><i class="mdi-action-view-headline"></i></a></td>
						    				<td><a class="btn modal-trigger tooltipped circle red" href="#removeOrder" data-position="top" data-delay="50" data-tooltip="Delete Order" style="border-radius:180px;"><i class="mdi-content-clear"></i></a></td>
						    			</tr>
						    			<tr>
						    				<td class="input-field">
												<select>
												    <option value="1" data-icon="#!" class="circle">Uniform</option>
												    <option value="2" data-icon="#!" class="circle">Suit</option>
												    <option value="3" data-icon="#!" class="circle">Gown</option>
												</select>
											</td>
						    				<td><img class="img hoverable" src="../img/gown2.jpg"></td>
						    				<td class="input-field">
												<select>
												    <option value="1" data-icon="#!" class="circle">Skirt</option>
												    <option value="2" data-icon="#!" class="circle">Pants</option>
												    <option value="3" data-icon="#!" class="circle">Polo</option>
												    <option value="4" data-icon="#!" class="circle">Shorts</option>
												</select>
											</td>
						    				<td class="input-field">
												<select>
												    <option value="1" data-icon="#!" class="circle">Pencil Cut</option>
												    <option value="2" data-icon="#!" class="circle">Balloon</option>
												</select>
											</td>
						    				<td><a class="btn modal-trigger" href="#orderQuantity">1</a></td>
						    				<td><a class="btn modal-trigger" href="#fabrictype">Cotton</a></td>
						    				<td><img class="img hoverable modal-trigger" href="#swatchpattern" src="../imgSwatches/citadel grape.jpg"></td>
						    				<td><a class="btn modal-trigger tooltipped" href="#measurementmodal" data-position="top" data-delay="50" data-tooltip="Measurements"><i class="mdi-action-view-headline"></i></a></td>
						    				<td><a class="btn modal-trigger tooltipped circle red" href="#removeOrder" data-position="top" data-delay="50" data-tooltip="Delete Order" style="border-radius:180px;"><i class="mdi-content-clear"></i></a></td>
						    			</tr>
						    		</tbody>
						    	</table>
						    </div>
				                  
				            <div class = "clearfix"></div>
				        </div>

					</div>
			    </li>
				</ul>

		    </div>
		</div>
	</div>


	<!--Quantity Modal-->
	<div id="orderQuantity" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:150px">
		<h5><font color="#42a5f5"><center><b>Quantity</b></center></font></h5>
		<div class="divider" style="height:2px"></div>
		<div class="modal-content">
			<div class="row container">
			    <div class="input-field container">
			      	<input value="1" id="quantity" type="text" class="validate center">
			    </div>
			</div>
		</div>
		<div class="modal-footer col s12" style="background-color:#42a5f5; opacity:0.85">
            <button type="submit" class="waves-effect waves-green btn-flat" href="#!"><font color="black">Save</font></button>
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">Cancel</font></a>
        </div>
	</div>

	<!--Fabric Type button Modal-->
	<div id="fabrictype" class="modal modal-fixed-footer">
		<h5><font color = "#1b5e20"><center>Fabric</center> </font> </h5>

        <div class="row">
            <div class="divider" style="height:2px"></div>
            <div class="modal-content col s12">
            	<div class="col s1" style="margin-top:60px">
            		<input type="checkbox" class="filled-in" id="fabric1" />
            		<label for="fabric1"></label>
            	</div>
            	 <div class="col s11">
			        <div class="card-panel grey lighten-5 z-depth-1">
			          <div class="row valign-wrapper">
			            <div class="col s4">
			              <img src="#!" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
			            </div>
			            <div class="col s7"> 
			              <p>COTTON CHENES</p> <!-- This will be the name of the pattern -->
			              <span class="black-text">
			                This is a square image. Add the "circle" class to it to make it appear circular.
			              </span>
			            </div>
			          </div>
			        </div>
			      </div>

			    <div class="col s1" style="margin-top:60px">
            		<input type="checkbox" class="filled-in" id="fabric2" />
            		<label for="fabric2"></label>
            	</div>
			      <div class="col s11">
			        <div class="card-panel grey lighten-5 z-depth-1">
			          <div class="row valign-wrapper">
			            <div class="col s4">
			              <img src="#!" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
			            </div>
			            <div class="col s7">
			            	<p>REGULAR COTTON</p>
			              <span class="black-text">
			                This is a square image. Add the "circle" class to it to make it appear circular.
			              </span>
			            </div>
			          </div>
			        </div>
			      </div>


			    <div class="col s1" style="margin-top:60px">
            		<input type="checkbox" class="filled-in" id="fabric3" />
            		<label for="fabric3"></label>
            	</div>
			      <div class="col s11">
			        <div class="card-panel grey lighten-5 z-depth-1">
			          <div class="row valign-wrapper">
			            <div class="col s4">
			              <img src="#!" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
			            </div>
			            <div class="col s7">
			            	<p>REMARKABLE COTTON</p>
			              <span class="black-text">
			                This is a square image. Add the "circle" class to it to make it appear circular.
			              </span>
			            </div>
			          </div>
			        </div>
			      </div>
			<div style="margin:570px"></div>
			</div>


		<div class="modal-footer col s12" style="background-color:#26a69a">
          <button type="submit" class="waves-effect waves-green btn-flat">OK</button>
          <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
        </div>
        </div>
	</div>

	<!--Swatch button Modal-->
	<div id="swatchpattern" class="modal modal-fixed-footer">
		<div class="modal-content">
			<h4 style="color:#1b5e20" class="center">Swatches</h4>
			<div class="divider container" style="margin-bottom:40px;"></div>
		
			<div class="row">
				<div class="center">
				<div class="col s3">
					<div style="margin-bottom:20px;">
						<div>
							<center><img class="img-hoverable materialboxed" width="50" src="#!"></center>
							<label><font size="+1">Swatch name</font></label>
						</div>
						<div>
							{!! Form::open() !!}
								<input type="checkbox" class="filled-in" id="fabric3" />
		            			<label for="fabric3"></label>
							{!! Form::close() !!}
						</div>
					</div>
					<div style="margin-bottom:20px;">
						<div>
							<center><img class="img-hoverable materialboxed" width="50" src="#!"></center>
							<label><font size="+1">Swatch name</font></label>
						</div>
						<div>
							{!! Form::open() !!}
								<input type="checkbox" class="filled-in" id="fabric3" />
		            			<label for="fabric3"></label>
							{!! Form::close() !!}
						</div>
					</div>
					<div style="margin-bottom:20px;">
						<div>
							<center><img class="img-hoverable materialboxed" width="50" src="#!"></center>
							<label><font size="+1">Swatch name</font></label>
						</div>
						<div>
							{!! Form::open() !!}
								<input type="checkbox" class="filled-in" id="fabric3" />
		            			<label for="fabric3"></label>
							{!! Form::close() !!}
						</div>
					</div>
				</div>
				<div class="col s3">
					<div style="margin-bottom:20px;">
						<div>
							<center><img class="img-hoverable materialboxed" width="50" src="#!"></center>
							<label><font size="+1">Swatch name</font></label>
						</div>
						<div>
							{!! Form::open() !!}
								<input type="checkbox" class="filled-in" id="fabric3" />
		            			<label for="fabric3"></label>
							{!! Form::close() !!}
						</div>
					</div>
					<div style="margin-bottom:20px;">
						<div>
							<center><img class="img-hoverable materialboxed" width="50" src="#!"></center>
							<label><font size="+1">Swatch name</font></label>
						</div>
						<div>
							{!! Form::open() !!}
								<input type="checkbox" class="filled-in" id="fabric3" />
		            			<label for="fabric3"></label>
							{!! Form::close() !!}
						</div>
					</div>
					<div style="margin-bottom:20px;">
						<div>
							<center><img class="img-hoverable materialboxed" width="50" src="#!"></center>
							<label><font size="+1">Swatch name</font></label>
						</div>
						<div>
							{!! Form::open() !!}
								<input type="checkbox" class="filled-in" id="fabric3" />
		            			<label for="fabric3"></label>
							{!! Form::close() !!}
						</div>
					</div>
				</div>
				<div class="col s3">
					<div style="margin-bottom:20px;">
						<div>
							<center><img class="img-hoverable materialboxed" width="50" src="#!"></center>
							<label><font size="+1">Swatch name</font></label>
						</div>
						<div>
							{!! Form::open() !!}
								<input type="checkbox" class="filled-in" id="fabric3" />
		            			<label for="fabric3"></label>
							{!! Form::close() !!}
						</div>
					</div>
					<div style="margin-bottom:20px;">
						<div>
							<center><img class="img-hoverable materialboxed" width="50" src="#!"></center>
							<label><font size="+1">Swatch name</font></label>
						</div>
						<div>
							{!! Form::open() !!}
								<input type="checkbox" class="filled-in" id="fabric3" />
		            			<label for="fabric3"></label>
							{!! Form::close() !!}
						</div>
					</div>
					<div style="margin-bottom:20px;">
						<div>
							<center><img class="img-hoverable materialboxed" width="50" src="#!"></center>
							<label><font size="+1">Swatch name</font></label>
						</div>
						<div>
							{!! Form::open() !!}
								<input type="checkbox" class="filled-in" id="fabric3" />
		            			<label for="fabric3"></label>
							{!! Form::close() !!}
						</div>
					</div>
				</div>
				<div class="col s3">
					<div>
						<div>
							<center><img class="img-hoverable materialboxed" width="50" src="#!"></center>
							<label><font size="+1">Swatch name</font></label>
						</div>
						<div>
							{!! Form::open() !!}
								<input type="checkbox" class="filled-in" id="fabric3" />
		            			<label for="fabric3"></label>
							{!! Form::close() !!}
						</div>
					</div>
					<div>
						<div>
							<center><img class="img-hoverable materialboxed" width="50" src="#!"></center>
							<label><font size="+1">Swatch name</font></label>
						</div>
						<div>
							{!! Form::open() !!}
								<input type="checkbox" class="filled-in" id="fabric3" />
		            			<label for="fabric3"></label>
							{!! Form::close() !!}
						</div>
					</div>
					<div>
						<div>
							<center><img class="img-hoverable materialboxed" width="50" src="#!"></center>
							<label><font size="+1">Swatch name</font></label>
						</div>
						<div>
							{!! Form::open() !!}
								<input type="checkbox" class="filled-in" id="fabric3" />
		            			<label for="fabric3"></label>
							{!! Form::close() !!}
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>

		<div class="modal-footer" style="background-color:#26a69a">
			<a href="" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
			<a href="" class="modal-action modal-close waves-effect waves-green btn-flat">Save</a>
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

		</div>

		<div class="modal-footer" style="background-color:#26a69a">
			<a href="" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
			<a href="" class="modal-action modal-close waves-effect waves-green btn-flat">Save</a>
		</div>
	</div>

	<!--Remove Order Modal-->
	<div id="removeOrder" class="modal modal-fixed-footer" style="height:250px; width:500px; margin-top:150px">
		<h5><font color="red"><center><b>Warning!</b></center></font></h5>
		<div class="divider" style="height:2px"></div>
		<div class="modal-content">
			<div class="row">
				<div class="col s3">
					<i class="mdi-alert-warning" style="font-size:50px; color:red"></i>
				</div>
				<div class="col s9">
					<p><font size="+1">Are you sure you want to remove this order?</font></p>
				</div>
			</div>
		</div>
		<div class="modal-footer col s12" style="background-color:red; opacity:0.85">
            <button type="submit" class="waves-effect waves-green btn-flat" href="#!"><font color="black">Yes</font></button>
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"><font color="black">No</font></a>
        </div>
	</div>	

@stop

@section('scripts')

	<script>
	  $('.modal-trigger').leanModal({
	      dismissible: true, // Modal can be dismissed by clicking outside of the modal
	      opacity: .5, // Opacity of modal background
	      in_duration: 300, // Transition in duration
	      out_duration: 200, // Transition out duration
	      width:400,
	    }
	  );
	</script>

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

	<script>
		$(document).ready(function(){
		    $('.collapsible').collapsible({
		    	accordion : true // A setting that changes the collapsible behavior to expandable instead of the default accordion style
		    });
		});
	</script>

	<script>
	 $(document).ready(function(){
	    $('.materialboxed').materialbox();
	  });
	 </script>

@stop