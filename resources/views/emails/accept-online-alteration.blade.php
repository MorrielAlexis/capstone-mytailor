<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Hi {{$name}}, </h2>
        <br>
        <p>Good day! This is to inform you that your online alteration is already confirmed and currently being processed. Your order/s have been processed at [time]. Any concerns, changes and/or additions to your order, please contact us through our hotline [set phone here] or email us at [mytailorsystems@gmail.com]. Please send your clothing at our office, #44 Liberty St, Makati City. You have 1 day parameter to send your clothing.</p>

        <div>
          <h2>Customer Details</h2>

          <b>Alteration Number: {{$order}}</b><br>
          <b>Name: {{$name}} {{$name2}} </b><br>
          <b>Email: {{$email}}</b><br>
          <b>Primary Number: {{$cp}}</b><br>
          <b>Alternative Number: </b><br>
          <b>Address: </b><br><br>
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
                          <!--<th data-field="price">Total Price</th>-->
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                           <td>Uniform, Dress</td>
                           <td hidden>Hem</td>
                           <td>Decrease by 2cm</td>
                           <td>{{-- {{ number_format($totPrice, 2) . ' PHP' }} --}}55</td>
                           <!--<td> </td>-->
                        </tr>
                        
                    </tbody>
                </table>
            </div>


            <div class="col s12" style="margin-bottom:50px; margin-top:30px">
                <div class="col s12"><div class="divider" style="height:2px"></div></div>
                <div class="col s6"><p>Estimated time to finish all orders: 3 days</p></div>
                <div class="col s6"><p>Total Amount to Pay: {{$totPrice}} PHP</p></div>
            </div>

            <div>
              To pay for your order, please send a copy of your deposit slip at mytailorsystems@gmail.com. <br>
             {{--  {{URL::to('online-individual-checkout-payment')}} --}}<br>
            </div>

        </div>

    </body>
</html>