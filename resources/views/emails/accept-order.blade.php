<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Hi {{$name}}, </h2>
        <br>
        <p>Good day! This is to inform you that your online order is already confirmed and currently being processed. Your order/s have been processed at [time]. Any concerns, changes and/or additions to your order, please contact us through our hotline [set phone here] or email us at [mytailorsystems@gmail.com]. You have 1 week parameter to change or add your order.</p>

        <div>
          <h3>Customer Details</h3>

          <b>JO Number: </b>
          <b>Name: </b>
          <b>Email: </b>
          <b>Primary Number: </b>
          <b>Alternative Number: </b>
          <b>Address: </b>
        </div>

        <div>
            <h3>Order Details</h3>

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
                <div class="col s6"><p>Estimated time to finish all orders:<p>3 days</p></p></div>
                <div class="col s6"><p>Total Amount to Pay:<p>600.00 PHP</p></p></div>
            </div>

            <div>
              To pay for your order, please follow the link below. <br>
              {{URL::to('online-individual-checkout-payment')}}.<br>
            </div>

        </div>

    </body>
</html>