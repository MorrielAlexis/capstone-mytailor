<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Hi {{$name}}, </h2>
        <br>
        <p>Good day! This is to inform you that your online order is already confirmed and currently being processed. Your order/s have been processed at {{$time}}. Any concerns, changes and/or additions to your order, please contact us through our hotline [set phone here] or email us at [mytailorsystems@gmail.com .</p>

        <div>
          <h2>Customer Details</h2>

          <b>JO Number:{{$order}} </b><br>
          <b>Name:{{$name}} </b><br>
          <b>Email:{{$email}} </b><br>
          <b>Mobile Number:{{$cp}} </b><br>
          <b>Address: {{$address}}</b><br><br>
        </div>

        <div>
            <h2>Order Details</h2>

            <div class="container">
                <table class = "table centered order-summary" border = "1">
                    <thead>
                        <tr>
                          <th data-field="product">Product(Segment)</th>         
                          <th data-field="quantity" hidden>Quantity</th>
                          <th data-field="fabric">Fabric</th>
                          <th data-field="price">Unit Price</th>
                          <!--<th data-field="price">Total Price</th>-->
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                           <td>{{$segment}}</td>
                           <td hidden>{{$intQuantity}}</td>
                           <td>{{$fabric}}</td>
                           <td>{{$unitPrice}}</td>
                           <!--<td> </td>-->
                        </tr>
                        
                    </tbody>
                </table>
            </div>


            <div class="col s12" style="margin-bottom:50px; margin-top:30px">
                <div class="col s12"><div class="divider" style="height:2px"></div></div>
                <div class="col s6"><p>Estimated date to finish all orders: {{-- {{$expDate}} --}}</p></div>
                <div class="col s6"><p>Total Amount to Pay:PHP {{$totPrice}}</p></div>
            </div>

            <div>
              To pay for your order, please send a copy of your deposit slip at mytailorsystems@gmail.com. <br>
             {{--  {{URL::to('online-individual-checkout-payment')}} --}}<br>
            </div>

        </div>

    </body>
</html>