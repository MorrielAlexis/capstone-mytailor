<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Good day {{$name}}! Your order has been accepted.</h2>

        <div>
            Here is the summary of your order:<br/>

            <div class="container">
                <table class = "table centered order-summary" border = "1">
                    <thead style="color:gray">
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
                <p style="color: white; padding-left:5px; margin-top:10px; background-color:teal; padding:3px;">Design:<b></b></p>
                <div class="col s12 overflow-x" style="max-height:160px; background-color:white">
                    <table class = "table centered order-summary" border = "1">
                        <thead style="color:gray">
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
                <div class="col s6"><p style="color:gray">Estimated time to finish all orders:<p style="color:black">3 days</p></p></div>
                <div class="col s6"><p style="color:gray">Total Amount to Pay:<p style="color:black">600.00 PHP</p></p></div>
            </div>

            <div>
              To pay for your order, please follow the link below. <br>
              {{URL::to('online-individual-checkout-payment')}}.<br>
            </div>

        </div>

    </body>
</html>