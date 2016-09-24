<!DOCTYPE html>
<html>
  <head>
    <title>Fashion Collection - Issue Receipt</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    
  </head>
  <style type="text/css">

      table{
        border-collapse: collapse;
        margin-left: 20px;
        margin-right:20px;
        margin-top:2%;
      }

      table, th, td{
        border: 1px solid teal;
        text-align: center;
      }
      
      .page-break {
          page-break-after: always;
      }

    </style>
  <body>
    <div class="col s12">
      <left>
        <h1 style="color:teal; font-size:20px;">
          <img src="img/logo.jpg" class="left circle responsive-img valign profile-image center" style="height:5%; width:5%; margin-top:5px;">
          <b>MyTailor</b> Store
          <p style="color:gray; font-size:-0.5px;"></p>
          <p style="color:gray">123-A Heaven St., Sta. Mesa, Manila</p>
          <p style="color:gray">Contact: 0908-223-5065</p>
          <p style="color:gray">Visit: www.myTailor.com</p>
        </h1>
      </left>
      <right>
        
      </right>
    </div>
        <div class="col s12"><div class="divider" style="height:3px; background-color:teal"></div></div>

        <h2 style="color:dimgray;"><center>CUSTOMER SALES REPORT</center></h2>
        <p>Report Type: <strong>{{$ReportType}}</strong></p>
        <p>Date: <strong>{{date('D, M. d Y h:i a')}}</strong></p>
        <table width="100%" id="list">
            <thead>
				<tr>
					<th>#</th>
					<th>Customer Name</th>
					<th>Employee Name</th>
					<th class="right-align">Partial Amount</th>
					<th class="right-align">Fee</th>
					<th class="right-align">Total</th>
					<th class="right-align">Cumulative Amount</th>
				</tr>
			</thead>
			<tbody>
				<?php 
            $Cumulative = 0; 
            $CurValue = "";
          ?>
          @foreach($data as $value)
          <tr>
            <td>
            @if($CurValue == $value->columnOne)
              {{""}}
              <?php $CurValue = $value->columnOne?>
            @else
              {{$Name}} {{$value->columnOne}}
              <?php $CurValue = $value->columnOne?>
            @endif
            </td>
					<td>
						@if($value->strCompanyName == null)
							{{$value->IndividualCustomer}}
						@else
							{{$value->strCompanyName}}
						@endif
					</td>
					<td>{{$value->EmployeeName}}</td>
					<td class="right-align">{{number_format($value->Total)}}</td>
					<td class="right-align">{{number_format($value->Fee)}}</td>
					<td class="right-align">{{number_format($value->Total+$value->Fee)}}</td>
					<?php $Cumulative += $value->Total+$value->Fee?>
					<td class="right-align">{{number_format($Cumulative)}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
  </body>

</html>

