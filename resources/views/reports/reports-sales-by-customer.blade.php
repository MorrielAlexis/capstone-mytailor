@extends('layouts.master')

@section('content')


  <div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><center><h3><b>Welcome to <font color="white">MyTailor</font></b></h3></center></span>
        <center><h5>Reports - Sales By Customer</h5></center>
        <center><h7 style="color:gray">Daily, Weekly, Monthly, Quarterly and Annual Sales</h7></center> 
      </div>
    </div>


    <div class="row" style="margin-top:3%;">
    <div class="col s12 m12 l12">

      <div class="row" style="margin-bottom:0">
          <div class="col s12 m12" style="padding-left:3%">
            <div class="card-panel teal">
            <span class="white-text"><center>SALES REPORT BY CUSTOMER</center></span>
            </div>
          </div>
        </div>
      <div class="row">
          <div class="col s12 m12" style="padding-left:3%; margin-top:0">
            <div class="card-panel large white lighten-5" style="padding-top:3%; min-width: 50%;">
            <!-- <div class="col s12">
              <label style="color:gray;"> SEE A PREVIEW OF THE REPORT</label>
              <a href="" class="right btn teal" style="position:right">Preview</a><br>
              <div class="divider" style="background-color:gray; height:2px; margin-top:6%; margin-bottom:3%"></div>    
            </div> -->
                <left><span style="padding-left:3%; color:gray">Choose one report format from the following:</span></left>

                <!-- User will choose from the following three options to view on as reports:
                <!  *Daily, *Monthly, and *Annual sales (A user may only choose ONE)
                <!  But these are only based on job orders made
                <!  i.e How many job orders have they made for the day, month or year?
                <!  This will show, of course, if their business is actually growing 
                <!   through the data from these job orders -->
                <br><br>
                <div style="padding-left:5%">
                  
                  <!-- Daily -->
                  <div class="row">
                <input type="checkbox" name="cbx-date-name[]" class="cbx-date-name" id="daily-sales" onclick="resetradio1(this)" />
                <label for="daily-sales"><b>Daily</b></label>
                       
                    <div class="daily_sales" style="display:none; padding-left:5%; padding-right:3%; padding-top:2%">
                      <input onclick="document.getElementById('d_customer_no').disabled = true" class="with-gap" disabled="true" name="radio-daily-sales" type="radio" id="daily-current-date"/>
                      <label for="daily-current-date"">Current Date</label>
                   
                      <br>
      
                      <input onclick="document.getElementById('d_customer_no').disabled = false" class="left with-gap col s4" disabled="true" name="radio-daily-sales" type="radio" id="daily-transac-no" />
                      <label for="daily-transac-no" style="margin-top:3%; margin-bottom:3%;">Specify a Customer No</label>
                      <select class="right browser-default col s8" style="margin-top:1%" id="d_customer_no" disabled="disabled">
                          <option value="" disabled selected>Choose your option</option>
                          <option value="1">Customer 1</option>
                          <option value="2">Customer 2</option>
                          <option value="3">Customer 3</option>
                      </select>

                      <br>
                                    
                    <div class="col s12" style="height:2px;"><div class="divider"></div></div>
                </div>  

            </div> <!--End of Daily-->


            <!-- Weekly -->
                  <div class="row">
                <input type="checkbox" name="cbx-week-name[]" class="cbx-week-name" id="weekly-sales" onclick="resetradio4(this)" />
                <label for="weekly-sales"><b>Weekly</b></label>
                       
                    <div class="weekly_sales" style="display:none; padding-left:5%; padding-right:3%; padding-top:2%">
                      <input onclick="document.getElementById('w_customer_no').disabled = true" class="with-gap" disabled="true" name="radio-weekly-sales" type="radio" id="weekly-current-date"/>
                      <label for="weekly-current-date"">Current Week</label>
                   
                      <br>
      
                      <input onclick="document.getElementById('w_customer_no').disabled = false" class="left with-gap col s4" disabled="true" name="radio-weekly-sales" type="radio" id="weekly-transac-no" />
                      <label for="weekly-transac-no" style="margin-top:3%; margin-bottom:3%;">Specify a Customer No</label>
                      <select class="right browser-default col s8" style="margin-top:1%" id="w_customer_no" disabled="disabled">
                          <option value="" disabled selected>Choose your option</option>
                          <option value="1">Customer 1</option>
                          <option value="2">Customer 2</option>
                          <option value="3">Customer 3</option>
                      </select>

                      <br>              

                    <div class="col s12" style="height:2px;"><div class="divider"></div></div>
                </div>  

            </div>

            <!-- Monthly -->
            <div class="row">
                <input type="checkbox" name="cbx-date-name[]" class="cbx-month-name" id="monthly-sales" onclick="resetradio2(this)" />
                <label for="monthly-sales"><b>Monthly</b></label>

                    <div class="monthly_sales" style="display:none; padding-left:5%; padding-right:3%; padding-top:2%">

                      <input onclick="document.getElementById('m_customer_no').disabled = true; document.getElementById('start_month').disabled = true; document.getElementById('end_month').disabled = true" class="with-gap" disabled="true" name="radio-monthly-sales" type="radio" id="monthly-current-month" />
                      <label for="monthly-current-month">Current Month</label>

                      <br>

                      <input onclick="document.getElementById('m_customer_no').disabled = false; document.getElementById('start_month').disabled = true; document.getElementById('end_month').disabled = true" class="with-gap col s4" disabled="true" name="radio-monthly-sales" type="radio" id="monthly-transac-no" />
                      <label for="monthly-transac-no" style="margin-top:3%; margin-bottom:3%;">Specify a Customer No</label>
                        <select class="right browser-default col s8" style="margin-top:1%" id="m_customer_no" disabled="disabled">
                          <option value="" disabled selected>Choose your option</option>
                          <option value="1">Customer 1</option>
                          <option value="2">Customer 2</option>
                          <option value="3">Customer 3</option>
                      </select>

                      <br>

                      <input onclick="document.getElementById('m_customer_no').disabled = true; document.getElementById('start_month').disabled = false; document.getElementById('end_month').disabled = false" class="with-gap" disabled="true" name="radio-monthly-sales" type="radio" id="monthly-between" />
                      <label for="monthly-between" style="margin-bottom:3%">Between <font color="gray">(Specify <b>date from</b> and <b>date to</b>)</font></label>
                        <div class="col s12">
                          <select class="left browser-default col s6" id="start_month" disabled="disabled">
                            <option value="" disabled selected>Select a start month</option>
                            <option value="01">January</option>
                            <option value="02">February</option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                        <!-- <div class="col s2"></div> -->
                        <select class="right browser-default col s6" id="end_month" disabled="disabled">
                            <option value="" disabled selected>Select an end month</option>
                            <option value="01">January</option>
                            <option value="02">February</option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                      </div>
                <div class="col s12" style="height:2px;"><div class="divider"></div></div>

                </div>

            </div>

            <!-- Quarterly -->
            <div class="row">
                <input type="checkbox" name="cbx-quarter-name[]" class="cbx-quarter-name" id="quarterly-sales" onclick="resetradio5(this)" />
                <label for="quarterly-sales"><b>Quarterly</b></label>
                       
                    <div class="quarterly_sales" style="display:none; padding-left:5%; padding-right:3%; padding-top:2%">
                      <input onclick="document.getElementById('q_customer_no').disabled = true" class="with-gap" disabled="true" name="radio-quarterly-sales" type="radio" id="quarterly-current-date"/>
                      <label for="quarterly-current-date"">Current Quarter</label>
                   
                      <br>
      
                      <input onclick="document.getElementById('q_customer_no').disabled = false" class="left with-gap col s4" disabled="true" name="radio-quarterly-sales" type="radio" id="quarterly-transac-no" />
                      <label for="quarterly-transac-no" style="margin-top:3%; margin-bottom:3%;">Specify a Customer No</label>
                      <select class="right browser-default col s8" style="margin-top:1%" id="q_customer_no" disabled="disabled">
                          <option value="" disabled selected>Choose your option</option>
                          <option value="1">Customer 1</option>
                          <option value="2">Customer 2</option>
                          <option value="3">Customer 3</option>
                      </select>

                      <br>              

                    <div class="col s12" style="height:2px;"><div class="divider"></div></div>
                </div>  

            </div>


            <!--Annual -->
            <div class="row">
                <input type="checkbox" name="cbx-date-name[]" class="cbx-month-name" id="annual-sales" onclick="resetradio3(this)" />
                <label for="annual-sales"><b>Annual</b></label>

                    <div class="yearly_sales" style="display:none; padding-left:5%; padding-right:3%; padding-top:2%">
                      <input onclick="document.getElementById('y_customer_no').disabled = true; document.getElementById('start_year').disabled = true; document.getElementById('end_year').disabled = true" class="with-gap" disabled="true" name="radio-yearly-sales" type="radio" id="yearly-current-date" />
                      <label for="yearly-current-date">Current Year</label>
                      <br>
                      <input onclick="document.getElementById('y_customer_no').disabled = false; document.getElementById('start_year').disabled = true; document.getElementById('end_year').disabled = true" class="with-gap col s4" disabled="true" name="radio-yearly-sales" type="radio" id="yearly-transac-no" />
                      <label for="yearly-transac-no" style="margin-top:3%; margin-bottom:3%;">Specify a Customer No</label>
                        <select class="right browser-default col s8" style="margin-top:1%" id="y_customer_no" disabled="disabled">
                          <option value="" disabled selected>Choose your option</option>
                          <option value="1">Customer 1</option>
                          <option value="2">Customer 2</option>
                          <option value="3">Customer 3</option>
                      </select>
                      <br>
                      <input onclick="document.getElementById('y_customer_no').disabled = true; document.getElementById('start_year').disabled = false; document.getElementById('end_year').disabled = false" class="with-gap" disabled="true" name="radio-yearly-sales" type="radio" id="yearly-between" />
                      <label for="yearly-between"style="margin-bottom:3%">Between <font color="gray">(Specify <b>date from</b> and <b>date to</b>)</font></label>
                        <div class="col s12">
                          <select class="left browser-default col s6" style="margin-top:1%" id="start_year" disabled="disabled">
                            <option value="" disabled selected>Select a start year</option>
                            <option value="01">2005</option>
                            <option value="02">2006</option>
                            <option value="03">2007</option>
                            <option value="04">2008</option>
                            <option value="05">2009</option>
                            <option value="06">2010</option>
                            <option value="07">2011</option>
                            <option value="08">2012</option>
                            <option value="09">2013</option>
                            <option value="10">2014</option>
                            <option value="11">2015</option>
                            <option value="12">2016</option>
                        </select>
                        <div class="col s2"></div>
                        <select class="right browser-default col s6" style="margin-top:1%" id="end_year" disabled="disabled">
                            <option value="" disabled selected>Select an end year</option>
                            <option value="01">2005</option>
                            <option value="02">2006</option>
                            <option value="03">2007</option>
                            <option value="04">2008</option>
                            <option value="05">2009</option>
                            <option value="06">2010</option>
                            <option value="07">2011</option>
                            <option value="08">2012</option>
                            <option value="09">2013</option>
                            <option value="10">2014</option>
                            <option value="11">2015</option>
                            <option value="12">2016</option>
                        </select>
                      </div>

                <div class="col s12" style="height:2px;"><div class="divider"></div></div>

                </div>
              </div>

              <!-- Custom Date -->
              <div class="row">
                <input type="checkbox" name="cbx-custom-date[]" class="cbx-custom-date" id="custom-date" onclick="resetradio6 (this)" />
                <label for="custom-date" style="margin-bottom:3%"><b>Custom Date</b></label>
                  
                  <div class="custom_dates col s12" style="display:none; padding-left:5%; padding-right:3%">
                    <input type="date" class="datepicker col s5" name="date_from" id="date_from" disabled="disabled">                       
                    <div class="center col s1" style="margin-top:2%; color:gray" id="to"><b> to </b></div>
                  <input type="date" class="datepicker col s6" name="date_to" id="date_to" disabled="disabled">

                  <div class="col s12" style="height:2px;"><div class="divider"></div></div>  
                  </div>
              </div>

          </div>
                
                
                <div class="divider" style="background-color:gray; height:2px; margin-top:6%; margin-bottom:3%"></div>
                <div class="col s12">
                <label style="color:gray;"> SEE A PREVIEW OF THE REPORT</label>
                <a href="" class="right btn teal" style="position:right; margin-left:2%">Preview</a>
                <a href="" class="right black-text btn teal lighten-4" style="position:right">Generate PDF</a>                  
              </div>
              <br><br>
            </div>
          </div>
          <!--End of card panel-->

          <!--Preview will be here-->               
          <div class="row" style="padding-left:2%; padding-right:2%">
              <div class="col s12 m12" style="padding-left:3%; margin-top:5%; background-color:white">
                <div style="padding-top:3%; min-width: 50%">
                  <span><h5 style="color:#1b5e20"><center>Sales Report Data</center></h5></span>
                  <div class="row">
                    <table class="table centered data-salesByJobOrder" id="salesByJobOrder" align="center" border="1">
                      <thead>
                        <tr>
                          <th>Date</th>
                          <th>Customer Name</th>
                          <th>Job Order No</th>
                          <th>Times of Order</th>
                          <th>Amount</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Today</td>
                          <td>Honey May</td>
                          <td>Job Order 1</td>
                          <td>1</td>
                          <td>123.00 PHP</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                  <br><br>

                  <div class="col s12" style="padding-bottom:2%">
                    <div class="divider"></div>
                    <center><h5 style="color:teal"><b>CHARTS</b></h5></center>
                  </div>
                  <!--CHARTS will be here-->
                  <div class="row col s12" style="padding-bottom:15%">
                    <div class="col s12">
                      <span><b>AMOUNT - [Monthly] and Cumulative</b></span>
                      <div class="col s12" style="border:2px gray solid">
                      CHART will be here  
                      </div>
                      <a href="" class="right black-text btn teal lighten-4" style="position:right; margin-top:1%">Export as PDF</a>
                    </div>

                    <div class="col s12" style="margin-top:4%">
                      <span><b>QUANTITY - [Monthly] and Cumulative</b></span>
                      <div class="col s12" style="border:2px gray solid">
                      CHART will be here  
                      </div>
                      <a href="" class="right black-text btn teal lighten-4" style="position:right; margin-top:1%">Export as PDF</a>
                    </div>

                    <div class="col s12" style="margin-top:4%">
                      <span><b>QUANTITY - SALES by Customer</b></span>
                      <div class="col s12" style="border:2px gray solid">
                      CHART will be here  
                      </div>
                      <a href="" class="right black-text btn teal lighten-4" style="position:right; margin-top:1%">Export as PDF</a>
                    </div>
                  </div>

                  <br><br><br><br><br><br><br><br><br>
                </div>
              </div>
          </div>
        <!--end of pdf preview-->
     
        </div>

    </div>
  </div>


@stop


<script type="text/javascript">


  //daily 
  function resetradio1 (checkbox) {

    var buttons = document.querySelector('.daily_sales');
      var radios = document.getElementsByName('radio-daily-sales');
      var index = 0, length = radios.length;

      if (checkbox.checked == true) {
  
          for ( ; index < length; index++) {
              radios[index].disabled = false;
          }
          buttons.style.display = 'block';

      }
      else {
      
        for( ; index < length; index++){
          radios[index].disabled = true;
        }
        buttons.style.display = 'none';
      }
  }


  //monthly
  function resetradio2 (checkbox){

    var buttons = document.querySelector('.monthly_sales');
      var radios = document.getElementsByName('radio-monthly-sales');
      var index = 0, length = radios.length;

      if (checkbox.checked == true) {
    
          for ( ; index < length; index++) {
              radios[index].disabled = false;
          }
          buttons.style.display = 'block';
      }
      else {
        
        for( ; index < length; index++){
          radios[index].disabled = true;
        }
        buttons.style.display = 'none';
      }
  }

  //annual
  function resetradio3 (checkbox){

    var buttons = document.querySelector('.yearly_sales');
      var radios = document.getElementsByName('radio-yearly-sales');
      var index = 0, length = radios.length;

      if (checkbox.checked == true) {
        
          for ( ; index < length; index++) {
              radios[index].disabled = false;
          }
          buttons.style.display = 'block';
          
      }
      else {
      
        for( ; index < length; index++){
          radios[index].disabled = true;
        }
        buttons.style.display = 'none';
      }
  }

  //weekly
  function resetradio4 (checkbox){

    var buttons = document.querySelector('.weekly_sales');
      var radios = document.getElementsByName('radio-weekly-sales');
      var index = 0, length = radios.length;

      if (checkbox.checked == true) {
        
          for ( ; index < length; index++) {
              radios[index].disabled = false;
          }
          buttons.style.display = 'block';
          
      }
      else {
      
        for( ; index < length; index++){
          radios[index].disabled = true;
        }
        buttons.style.display = 'none';
      }
  }


  //quarterly
  function resetradio5 (checkbox){

    var buttons = document.querySelector('.quarterly_sales');
      var radios = document.getElementsByName('radio-quarterly-sales');
      var index = 0, length = radios.length;

      if (checkbox.checked == true) {
        
          for ( ; index < length; index++) {
              radios[index].disabled = false;
          }
          buttons.style.display = 'block';
          
      }
      else {
      
        for( ; index < length; index++){
          radios[index].disabled = true;
        }
        buttons.style.display = 'none';
      }
  }


  //custom date
  function resetradio6 (checkbox){

    var buttons = document.querySelector('.custom_dates');
      var a = document.getElementById('date_from');
      var b = document.getElementById('date_to');
      var c = document.getElementById('to');

      if (checkbox.checked == true) {
        
        buttons.style.display = 'block';
          a.disabled = false;
          b.disabled = false;
          c.style.color = 'black';
          
      }
      else {
        
        buttons.style.display = 'none';
        a.disabled = true;
        b.disabled = true;
        c.style.color = 'gray';
        
      }
  }



  // function setcheckbox () {
  //     var checkbox = document.getElementsByName('cbx-month-name')[0];
  //     if (checkbox.checked == true) {
  //      checkbox.checked = true;

  //      //document.getElementById('daily').style.display = "block"; 
  //     }
  // }

</script>

<script type="text/javascript">
     $('.datepicker').pickadate({
      selectMonths: true, // Creates a dropdown to control month
      selectYears: 12 // Creates a dropdown of 15 years to control year
    });
</script>

