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

        <h2 style="color:dimgray;"><center>PRODUCT SALES REPORT</center></h2>
        <p>Report Type: <strong>{{$ReportType}}</strong></p>
        <p>From: <strong>{{$datFrom}}</strong></p>
        <p>To: &nbsp;&nbsp;&nbsp;&nbsp;<strong>{{$datTo}}</strong></p>
        <table width="100%" id="list">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Segment Name</th>
                    <th>Times Ordered</th>
                    <th class="right-align">Sum Amount</th>
                    <th class="right-align">Cumulative Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php $Cumulative = 0; ?>
                @foreach($data as $value)
                    <tr>
                        <td>{{$Name}} {{$value->columnOne}}</td>
                        <td>{{$value->strSegmentName}}</td>
                        <td>{{$value->TimesOrdered}}</td>
                        <td class="right-align">{{number_format($value->Amount)}}</td>
                        <?php $Cumulative += $value->Amount?>
                        <td class="right-align">{{number_format($Cumulative)}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
  </body>

</html>

