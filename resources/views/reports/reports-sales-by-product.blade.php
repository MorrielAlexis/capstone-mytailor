@extends('layouts.master')

@section('content')


	<div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><center><h3><b>Welcome to <font color="white">MyTailor</font></b></h3></center></span>
        <center><h5>Reports - Sales By Product</h5></center>
      </div>
    </div>

    <div class="row" style="margin-top:6%;">
    <div class="col s12 m12 l12">

      <div class="row" style="margin-bottom:0">
          <div class="col s12 m12" style="padding-left:3%">
            <div class="card-panel teal">
            <span class="white-text"><center>SALES REPORT BY PRODUCT</center></span>
            </div>
          </div>
        </div>
      <div class="row">
          <div class="col s12 m6" style="padding-left:3%; margin-top:0">
            <div class="card-panel large white lighten-5" style="padding-top:5%; min-width: 50%;">
            <div class="col s12">
              <label style="color:gray;"> SEE A PREVIEW OF THE REPORT</label>
              <a href="" class="right btn teal" style="position:right">Preview</a><br>
              <div class="divider" style="background-color:gray; height:2px; margin-top:6%; margin-bottom:3%"></div>    
            </div>
                <span class="black-text" style="padding-left:3%">Choose an option from the following:</span>

                <!-- User will choose from the following three options to view on as reports:
                <!  *Daily, *Monthly, and *Annual sales (A user may only choose ONE)
                <!  But these are only based on job orders made
                <!  i.e How many job orders have they made for the day, month or year?
                <!  This will show, of course, if their business is actually growing 
                <!   through the data from these job orders -->
                <br><br>
                <div style="padding-left:5%">
                  
                  <div class="row">
                <input type="checkbox" name="cbx-date-name[]" class="cbx-date-name" id="daily-sales" onclick="resetradio1(this)" />
                <label for="daily-sales">Daily</label>
                       
                    <div class="daily_sales" style="display:none; padding-left:5%; padding-right:3%">
                      <input class="with-gap" disabled="true" name="radio-daily-sales" type="radio" id="daily-current-date"/>
                      <label for="daily-current-date"">Current Date</label>
                   
                      <br>
      
                      <input class="left with-gap col s4" disabled="true" name="radio-daily-sales" type="radio" id="daily-product-no" />
                      <label for="daily-product-no" style="margin-top:3%; margin-bottom:3%;">Product #</label>
                      <select class="right browser-default col s8">
                          <option value="" disabled selected>Choose a Product Number</option>
                          <option value="1">Product 1</option>
                          <option value="2">Product 2</option>
                          <option value="3">Product 3</option>
                      </select>
                      <br>
                      <input class="with-gap col s12" disabled="true" name="radio-daily-sales" type="radio" id="daily-between" />
                      <label for="daily-between" style="margin-bottom:3%">Between <font color="gray">(Specify <b>date from</b> and <b>date to</b>)</font></label>
                        <input type="date" class="datepicker col s5" name="dl_date_from" id="dl_date_from">                       
                        <div class="center col s1" style="margin-top:4%"> to </div>
                      <input type="date" class="datepicker col s6" name="dl_date_to" id="dl_date_to" >
                </div>  

            </div>

            <div class="row">
                <input type="checkbox" name="cbx-date-name[]" class="cbx-month-name" id="monthly-sales" onclick="resetradio2(this)" />
                <label for="monthly-sales">Monthly</label>

                    <div class="monthly_sales" style="display:none; padding-left:5%; padding-right:3%">
                      <input class="with-gap" disabled="true" name="radio-monthly-sales" type="radio" id="monthly-current-month" />
                      <label for="monthly-current-month">Current Month</label>
                      <br>
                      <input class="with-gap col s4" disabled="true" name="radio-monthly-sales" type="radio" id="monthly-product-no" />
                      <label for="monthly-product-no" style="margin-top:3%; margin-bottom:3%;">Product #</label>
                        <select class="right browser-default col s8">
                          <option value="" disabled selected>Choose a Product Number</option>
                          <option value="1">Product 1</option>
                          <option value="2">Product 2</option>
                          <option value="3">Product 3</option>
                      </select>
                      <br>
                      <input class="with-gap" disabled="true" name="radio-monthly-sales" type="radio" id="monthly-between" />
                      <label for="monthly-between" style="margin-bottom:3%">Between <font color="gray">(Specify <b>date from</b> and <b>date to</b>)</font></label>
                        <select class="left browser-default col s6">
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
                      <div class="col s2"></div>
                      <select class="right browser-default col s6">
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

            </div>

            <div class="row">
                <input type="checkbox" name="cbx-date-name[]" class="cbx-month-name" id="annual-sales" onclick="resetradio3(this)" />
                <label for="annual-sales">Annual</label>

                    <div class="yearly_sales" style="display:none; padding-left:5%; padding-right:3%">
                      <input class="with-gap" disabled="true" name="radio-yearly-sales" type="radio" id="yearly-current-date" />
                      <label for="yearly-current-date">Current Date</label>
                      <br>
                      <input class="with-gap col s4" disabled="true" name="radio-yearly-sales" type="radio" id="yearly-product-no" />
                      <label for="yearly-product-no" style="margin-top:3%; margin-bottom:3%;">Product #</label>
                        <select class="right browser-default col s8">
                          <option value="" disabled selected>Choose a Product Number</option>
                          <option value="1">Product 1</option>
                          <option value="2">Product 2</option>
                          <option value="3">Product 3</option>
                      </select>
                      <br>
                      <input class="with-gap" disabled="true" name="radio-yearly-sales" type="radio" id="yearly-between" />
                      <label for="yearly-between"style="margin-bottom:3%">Between <font color="gray">(Specify <b>date from</b> and <b>date to</b>)</font></label>
                        <select class="left browser-default col s6">
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
                      <select class="right browser-default col s6">
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

              </div>

          </div>
                
                
                <div class="divider" style="background-color:gray; height:2px; margin-top:6%; margin-bottom:3%"></div>
                <div class="col s12">
                <label style="color:gray;"> SEE A PREVIEW OF THE REPORT</label>
                <!--<a href="" class="right btn teal" style="position:right">Preview</a>-->                 
              </div>
              <br>
            </div>
          </div>
          <!--End of card panel-->

          <!--Pdf preview-->        
          <div class="col s12 m6" style="border:2px gray solid; padding:3%; margin-top:0.7%; background-color:gray; min-width:50%; min-height:54%; max-height:54%">
            <span class="white-text">PDF Preview will be here</span>
          </div>

          <!--end of pdf preview-->
     
        </div>

    </div>
  </div>


@stop

@section('scripts')

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
