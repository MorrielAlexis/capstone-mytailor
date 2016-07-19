@extends('layouts.master')

@section('content')

  <div class="main-wrapper"  style="margin-top:30px">

    <div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><h4>Job Order Progress</h4></span>
      </div>
    </div>

    <div class = "row">
      <div class = "col s12">
        <ul class = "tabs">
          <li class = "tab col s6"><a href = "#indi"><b><font color = "black">Individual Job Order</font></b></a></li>
          <li class = "tab col s6"><a href = "#com"><b><font color = "black">Company   Job Order</font></a></li>
        </ul>          
      </div>  
    </div>
    <div id = "indi" class = "col s12"> 
      <div class="row">
        <div class="col s12 m12 l12">
          <div class="card-panel">

            <div class="row container left">
              <div class="input-field col s6">
                <i class="mdi-action-search prefix"></i>
                <input id="icon_prefix" type="text" class="validate">
                <label for="icon_prefix">Search Individual Job Order</label>
              </div>
            </div>

            <div class="row">
              <div class="col s12">
                <table class="centered">
                  <thead>
                    <tr>
                        <th style="color:#1b5e20">Track#</th>
                        <th style="color:#1b5e20">Customer Name</th>
                        <th style="color:#1b5e20">Due Date</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>

            <ul class="collapsible z-depth-0" data-collapsible="accordion" style="border:none;">
            
              <li style="margin-bottom:10px;">
                <div class="collapsible-header" style="background-color:#ffebee">
                  <div class="row">
                    <div class="col s12">
                      <table class="centered">
                          <tbody>
                              <tr>
                                <td>#001</td>
                                <td>Terena Marqueta</td>
                                <td>01/04/03</td>
                              </tr>
                          </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              
                <div class="collapsible-body" style="border:3px solid #ffebee;">
                  <h3>Progress Update</h3>

                  <div class ="row">
                    <div class="col s12 m12 l12 overflow-x">
                      <table class = "centered">
                        <thead>
                          <tr>
                            <td> <center>Garment Type</center></td>
                            <td> <center>Garment Name</center></td>
                            <td> <center>Segment Name</center></td>
                            <td> <center>Quantity</center></td>
                            <td> <center>Transaction Type</center></td>
                            <td> <center>No. of Finished Garment</center></td>
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
                                <input type="input-field" id="in1"/>
                                <label id= "in1" fontsize= "+2"></label>                     
                              </td>
                            </tr>

                            <tr>
                              <td>Uniform</td>
                              <td>Women's Uniform</td>
                              <td>Skirt</td>
                              <td>1</td>
                              <td> Made to Order</td>
                              <td> 
                                <input type="input-field" id="in2"/>
                                <label for="in2"></label>                              
                              </td>
                            </tr>

                            <tr>
                              <td>Gown</td>
                              <td>Tube Cocktail</td>
                              <td>Tube</td>
                              <td>1</td>
                              <td> Made to Order</td>
                              <td>
                                <input type="input-field" id="in3"/>
                                <label for="in3"></label>
                              </td>
                            </tr>

                            <tr>
                              <td>Gown</td>
                              <td>Tube Cocktail</td>
                              <td>Cocktail</td>
                              <td>1</td>
                              <td> Made to Order</td>
                              <td>
                                <input type="input-field" id="in4"/>
                                <label for="in4"></label>
                              </td>
                            </tr>
                          

                        </tbody>
                      </table>  
                    </div>
                    
                    <div class ="row">
                      <div class = "col s12">
                        <div class = "col s6">
                          <br>
                          <center><a class="waves-effect waves-light btn">Update</a></center>
                        </div>
                        <div class = "col s6">
                          <br>
                          <center><a class="waves-effect waves-light btn">Cancel</a></center>
                        </div>  
                      </div>
                    </div>

                    <div class ="row">
                      <div class = "col s12">
                        <label><font size = "+2">Progress Bar: &#09</font></label>
                        <label id= "lbl"></label>
                      </div>
                    </div>

                    <div class = "clearfix"></div>
                    <div class="progress" style= "height: 30px;">
                      <div class="determinate" style="width: 0%" >
                        <span id="span" style = "padding-left: 558px;"></span>
                      </div>
                    </div> 

                  </div>

                </div>
              </li>

            </ul>

          </div>
        </div>
      </div>
    </div>

    <div id = "com" class = "col s12"> 
      <div class="row">
        <div class="col s12 m12 l12">
          <div class="card-panel">

            <div class="row container left">
              <div class="input-field col s6">
                <i class="mdi-action-search prefix"></i>
                <input id="icon_prefix" type="text" class="validate">
                <label for="icon_prefix">Search Company Job Order</label>
              </div>
            </div>

            <div class="row">
              <div class="col s12">
                <table class="centered">
                  <thead>
                    <tr>
                        <th style="color:#1b5e20">Track#</th>
                        <th style="color:#1b5e20">Company Name</th>
                        <th style="color:#1b5e20">Due Date</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>

            <ul class="collapsible z-depth-0" data-collapsible="accordion" style="border:none;">
            
              <li style="margin-bottom:10px;">
                <div class="collapsible-header" style="background-color:#ffebee">
                  <div class="row">
                    <div class="col s12">
                      <table class="centered">
                          <tbody>
                              <tr>
                                <td>#001</td>
                                <td>Pfizer Company</td>
                                <td>01/04/03</td>
                              </tr>
                          </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              
                <div class="collapsible-body" style="border:3px solid #ffebee;">
                  <h3>Progress Update</h3>

                  <div class ="row">
                    <div class="col s12 m12 l12 overflow-x">
                      <table class = "centered">
                        <thead>
                          <tr>
                            <td> <center>Garment Type</center></td>
                            <td> <center>Garment Name</center></td>
                            <td> <center>Segment Name</center></td>
                            <td> <center>Quantity</center></td>
                            <td> <center>Transaction Type</center></td>
                            <td> <center>No. of Finished Garment</center></td>
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
                                <input type="input-field" id="in1"/>
                                <label id= "in1" fontsize= "+2"></label>                     
                              </td>
                            </tr>

                            <tr>
                              <td>Uniform</td>
                              <td>Women's Uniform</td>
                              <td>Skirt</td>
                              <td>1</td>
                              <td> Made to Order</td>
                              <td> 
                                <input type="input-field" id="in2"/>
                                <label for="in2"></label>                              
                              </td>
                            </tr>

                            <tr>
                              <td>Gown</td>
                              <td>Tube Cocktail</td>
                              <td>Tube</td>
                              <td>1</td>
                              <td> Made to Order</td>
                              <td>
                                <input type="input-field" id="in3"/>
                                <label for="in3"></label>
                              </td>
                            </tr>

                            <tr>
                              <td>Gown</td>
                              <td>Tube Cocktail</td>
                              <td>Cocktail</td>
                              <td>1</td>
                              <td> Made to Order</td>
                              <td>
                                <input type="input-field" id="in4"/>
                                <label for="in4"></label>
                              </td>
                            </tr>
                          

                        </tbody>
                      </table>  
                    </div>
                    
                    <div class ="row">
                      <div class = "col s12">
                        <div class = "col s6">
                          <br>
                          <center><a class="waves-effect waves-light btn">Update</a></center>
                        </div>
                        <div class = "col s6">
                          <br>
                          <center><a class="waves-effect waves-light btn">Cancel</a></center>
                        </div>  
                      </div>
                    </div>

                    <div class ="row">
                      <div class = "col s12">
                        <label><font size = "+2">Progress Bar: &#09</font></label>
                        <label id= "lbl"></label>
                      </div>
                    </div>

                    <div class = "clearfix"></div>
                    <div class="progress" style= "height: 30px;">
                      <div class="determinate" style="width: 0%" >
                        <span id="span" style = "padding-left: 558px;"></span>
                      </div>
                    </div> 

                  </div>

                </div>
              </li>

            </ul>

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
      // var checked = 0;
      // var allItems = $('.chkbx').length;
      // $('.chkbx').each(function () {
      //   checked += this.checked ? 1 : 0;
      // });
      
      // var progress = checked > 0 ? ((checked/allItems) * 100) : 0;
      
      // console.log('progress', progress);
      
      // $('.determinate').css('width', progress + '%');

      // var lbl = document.getElementById("lbl");
      // lbl.style.fontSize = "2em";
      // lbl.innerHTML = progress + '%';

      // var span = document.getElementById("span");
      // span.style.fontSize = "1em";
      // span.innerHTML = progress + '%';
    });
  </script>


  <script type="text/javascript">
    // $('.chkbx').on('change', function () {
    //   var checked = 0;
    //   var allItems = $('.chkbx').length;
    //   $('.chkbx').each(function () {
    //     checked += this.checked ? 1 : 0;
    // });
      
    //   var progress = checked > 0 ? ((checked/allItems) * 100) : 0;
      
    //   console.log('progress', progress);
      
    // $('.determinate').css('width', progress + '%');

    //   var lbl = document.getElementById("lbl");
    //   lbl.style.fontSize = "2em";
    //   lbl.innerHTML = progress + '%';

    //   var span = document.getElementById("span");
    //   span.style.fontSize = "1em";
    //   span.innerHTML = progress + '%';
    // });
  </script>

  <script type="text/javascript">
    $(document).ready(function(){
      $('ul.tabs').tabs();
    });
  </script>

@stop