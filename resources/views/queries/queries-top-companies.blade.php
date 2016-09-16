@extends('layouts.master')

@section('content')

  <div class="main-wrapper" style="margin-top:30px">
      
    <div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><h4>Queries -  Top Companies</h4></span>
      </div>
    </div>

     
  </div>

  <div class="row">
      <div class="col s12 m12 l12">
        <div class="card-panel">
          <span class="card-title"><h5 style="color:#1b5e20"><center>List of Companies with Frequent Orders</center></h5></span>
          <div class="divider"></div>
          <div class="card-content">

            <div class = "col s12 m12 l12 overflow-x">

            <table class = "table centered data-customers" align = "center" border = "1">
              <thead>
                  <tr>
                    <th data-field="garmentDescription">Company Name</th>
                    <th data-field="Edit">Total Orders</th>
                  </tr>
              </thead>

              <tbody>
                    @foreach($topCompanies as $topCompany)
                  <tr>
                    <td>{{ $topCompany->name }}</td>
                    <td>{{ $topCompany->ctr}}</td>
                  </tr>
                    @endforeach
              </tbody>
            </table>

            </div>

            <div class = "clearfix">

            </div>
            </div>
          </div>
        </div>
      </div>



@stop

@section('scripts')
  <script>
    $(document).ready(function() {
    
      $('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrain_width: false, // Does not change width of dropdown to that of the activator
      hover: true, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: false, // Displays dropdown below the button
      alignment: 'left' // Displays dropdown with edge aligned to the left of button
      });

      $('select').material_select();

    });
    </script>
  
     <!--DATA TABLE SCRIPT-->
    <script type="text/javascript">

      $(document).ready(function() {

          $('.data-customers').DataTable();

      } );

    </script>


       <!--DATA TABLE SCRIPT-->
    <script type="text/javascript">

      $(document).ready(function() {

          // $('.data-role').DataTable();
          $('.data-reactRole').DataTable();
          $('select').material_select();

          setTimeout(function () {
            $('#flash_message').hide();
        }, 5000);

          setTimeout(function () {
            $('#success-message').hide();
        }, 5000);

      } );
    </script>

      <!--TOOLTIP SCRIPT-->
  <script type="text/javascript">
    $(document).ready(function(){
      $('.tooltipped').tooltip({delay: 50});
  }); 
  </script>
  


@stop