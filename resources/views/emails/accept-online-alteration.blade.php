<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>

        <header>
            <img src="../img/logo.jpg"  alt="" class="right circle responsive-img valign profile-image center" style="height:70px; width:80px; margin-top:5px;">
            <div class="right col s9 " style="padding-top:20px">
              <font size = "+2" color = "black" style="margin-top:5px" >MyTailor</font>
            </div>
        </header>

        <h2>Hi {{$name}}, </h2>
        <br>
        <p>Good day! This is to inform you that your online alteration is already confirmed and currently being processed. Your order/s have been processed at [time]. Any concerns, changes and/or additions to your order, please contact us through our hotline [set phone here] or email us at [mytailorsystems@gmail.com]. Please send your clothing at our office, #44 Liberty St, Makati City. You have 1 day parameter to send your clothing.</p>

        <div>
          <h2>Customer Details</h2>

          <b>Alteration Number: {{$order}}</b><br>
          <b>Name: {{$name}} </b><br>
          <b>Email: {{$email}}</b><br>
          <b>Primary Number: {{$cp}}</b><br>
          <b>Address: {{$address}}</b><br><br>
        </div>

        <div>
            <h2>Order Details</h2>

            <div class="container">
                <table class = "table centered order-summary" border = "1">
                    <thead>
                        <tr>
                          <th data-field="product">Segment</th>         
                          <th data-field="quantity" hidden>Alteration Type</th>
                          <th data-field="fabric">Description</th>
                          <th data-field="price">Total Price</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                           <td>{{$segment}}</td>
                           <td hidden>{{$alteration}}</td>
                           <td>Decrease by 2cm</td>
                           <td>{{ number_format($totPrice, 2) . ' PHP' }}</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>


            <div class="col s12" style="margin-bottom:50px; margin-top:30px">
                <div class="col s12"><div class="divider" style="height:2px"></div></div>
                <div class="col s6"><p>Estimated time to finish all orders: 3 days</p></div>
                <div class="col s6"><h2>Total Amount to Pay: PHP {{ number_format($totPrice, 2) }}</h2></div>
            </div>

            <div>
              To pay for your order, please send a copy of your deposit slip at mytailorsystems@gmail.com. <br>
             {{--  {{URL::to('online-individual-checkout-payment')}} --}}<br>
            </div>

        </div>

    </body>
</html>