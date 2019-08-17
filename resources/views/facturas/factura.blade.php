<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Example Factura</title>
    <link rel="stylesheet" href="/css/style.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="/images/logo.png">
      </div>
      <div id="company">
        <h2 class="name">Company Name</h2>
        <div>455 Foggy Heights, AZ 85004, US</div>
        <div>(602) 519-0450</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">INVOICE TO:</div>
          <h2 class="name">{{ $factura->car->client->name }}</h2>
          <div class="address">796 Silver Harbour, TX 79273, US</div>
          <div class="email"><a href="mailto:{{ $factura->car->client->email }}">{{ $factura->car->client->email }}</a></div>
        </div>
        <div id="invoice">
          <h1>INVOICE {{ date('y')*1000 + $factura->id }}</h1>
          <div class="date">Date of Invoice: {{ $factura->date }}</div>
          <div class="date">Due Date: 30/06/2014</div>
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">#</th>
            <th class="desc">DESCRIPTION</th>
            <th class="unit">UNIT PRICE</th>
            <th class="qty">QUANTITY</th>
            <th class="unit">DISCOUNT</th>
            <th class="total">TOTAL</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($workorders as $workorder)
          <tr>
            <td class="no">{{ $workorder->id }}</td>
            <td class="desc"><h3>{{ $workorder->concept->concept }}</h3>{{ $workorder->concept->brand }}</td>
            <td class="unit">{{ '€ '.$workorder->concept->price }}</td>
            <td class="qty">{{ '€ '.$workorder->units }}</td>
            <td class="unit">{{ (($workorder->discount/$workorder->total)*100).'%' }}</td>
            <td class="total">{{ '€ '.($workorder->total - $workorder->discount) }}</td>
          </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <td colspan="3"></td>
            <td colspan="2">SUBTOTAL</td>
            <td>{{ '€ '.($factura->workorders->sum('total')-$factura->workorders->sum('discount')) }}</td>
          </tr>
          <tr>
            <td colspan="3"></td>
            <td colspan="2">TAX 21%</td>
            <td>{{ '€ '.(round((($factura->workorders->sum('total')-$factura->workorders->sum('discount'))*0.21),2)) }}</td>
          </tr>
          <tr>
            <td colspan="3"></td>
            <td colspan="2">GRAND TOTAL</td>
            <td>
                {{ '€ '.(round((($factura->workorders->sum('total')-$factura->workorders->sum('discount'))*1.21),2)) }}
            </td>
          </tr>
        </tfoot>
      </table>
      <div id="thanks">Thank you!</div>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>
