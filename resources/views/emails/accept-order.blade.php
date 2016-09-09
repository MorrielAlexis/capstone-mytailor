<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Hi {{$name}}, </h2>
        <br>
        <p>Good day! This is to inform you that your online order is already confirmed and currently being processed. Your order/s have been processed at [time]. Any concerns, changes and/or additions to your order, please contact us through our hotline [set phone here] or email us at [mytailorsystems@gmail.com]. You have 1 day parameter to change or add your order.</p>

        <div>
          <h2>Customer Details</h2>

          <b>JO Number: </b><br>
          <b>Name: </b><br>
          <b>Email: </b><br>
          <b>Primary Number: </b><br>
          <b>Alternative Number: </b><br>
          <b>Address: </b><br><br>
        </div>

        <div>
            <h2>Order Details</h2>

            <div class="container">
                <table class = "table centered order-summary" border = "1">
                    <thead>
                        <tr>
                          <th data-field="product">Product</th>         
                          <th data-field="quantity" hidden>Quantity</th>
                          <th data-field="fabric">Fabric</th>
                          <th data-field="price">Unit Price</th>
                          <!--<th data-field="price">Total Price</th>-->
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                           <td>Uniform, Dress</td>
                           <td hidden>1</td>
                           <td>Blue Striped Soft</td>
                           <td>PHP 600.00</td>
                           <!--<td> </td>-->
                        </tr>
                        
                    </tbody>
                </table>
            </div>

            <!--For the design summary-->
            <div class="container">
                <p style="padding-left:5px; margin-top:10px; padding:3px;">Design:<b></b></p>
                <div class="col s12 overflow-x" style="max-height:160px;">
                    <table class = "table centered order-summary" border = "1">
                        <thead>
                            <tr>
                              <th data-field="product">Style Category</th>         
                              <th data-field="quantity">Segment Pattern</th>
                              <!--<th data-field="price">Total Price</th>-->
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                               <td>Lapel</td>
                               <td>Shawl Type</td>
                               <!--<td> </td>-->
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col s12" style="margin-bottom:50px; margin-top:30px">
                <div class="col s12"><div class="divider" style="height:2px"></div></div>
                <div class="col s6"><p>Estimated time to finish all orders: 3 days</p></div>
                <div class="col s6"><p>Total Amount to Pay: 600.00 PHP</p></div>
            </div>

            <div>
              To pay for your order, please send a copy of your deposit slip at mytailorsystems@gmail.com. <br>
             {{--  {{URL::to('online-individual-checkout-payment')}} --}}<br>
            </div>

        </div>

    </body>
</html>