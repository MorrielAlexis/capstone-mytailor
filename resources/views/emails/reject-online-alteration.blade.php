<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Hi {{$name}}, </h2>
        <br>
        <p>Good day! This is to inform you that your online order has been rejected due to job order schedule. Thank you for your understanding!</p>

        <div>
          <h2>Customer Details</h2>

          <b>Alteration Number: </b><br>
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
                          <th data-field="product">Segment</th>         
                          <th data-field="quantity" hidden>Alteration Type</th>
                          <th data-field="fabric">Description</th>
                          <th data-field="price">Unit Price</th>
                          <!--<th data-field="price">Total Price</th>-->
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                           <td>Uniform, Dress</td>
                           <td hidden>Hem</td>
                           <td>Blue Striped Soft</td>
                           <td>PHP 600.00</td>
                           <!--<td> </td>-->
                        </tr>
                        
                    </tbody>
                </table>
            </div>

            <div class="col s12" style="margin-bottom:50px; margin-top:30px">
                <div class="col s12"><div class="divider" style="height:2px"></div></div>
                <div class="col s6"><p>Estimated time to finish all orders: 3 days</p></div>
                <div class="col s6"><p>Total Amount to Pay: 600.00 PHP</p></div>
            </div>

        </div>

    </body>
</html>