<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Hi {{$name}}, </h2>
        <br>
        <p>Good day! This is to inform you that your online order has been rejected due to job order schedule. Thank you for your understanding! Meanwhile, please try and order different set of products. Thank you!</p>

        {{-- <div>
          <h2>Customer Details</h2>

          <b>Alteration Number: {{$order}}</b><br>
          <b>Name: {{$name}}</b><br>
          <b>Email: {{$email}}</b><br>
          <b>Primary Number: {{$cp}}</b><br>
          <b>Address: {{$address}}</b><br><br>
        </div> --}}

        {{-- <div>
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

        </div> --}}

    </body>
</html>