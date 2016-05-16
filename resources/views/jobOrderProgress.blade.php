@extends('layouts.master')

@section('content')

  <div class="main-wrapper"  style="margin-top:30px">

    <div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><h4>Job Order Progress</h4></span>
      </div>
    </div>

    <div class="row">
      <div class="col s12 m12 l12">
        <div class="card-panel">

          <div class="row container left">
            <div class="input-field col s6">
              <i class="mdi-action-search prefix"></i>
              <input id="icon_prefix" type="text" class="validate">
              <label for="icon_prefix">Search Job Order</label>
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
                        <td> <center>Status</center></td>
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

              <div class ="row">
                <div class = "col s3" style="margin-top:20px;">
                  <label><font size = "+2">Progress Bar:</font></label>
                </div>

                <div class="col s9">
                  <form action="#">
                    <p class="range-field">
                      <input type="range" id="test5" min="0" max="100" />
                    </p>
                  </form>
                </div>
              </div>

            </div>
          </li>

          </ul>

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

@stop