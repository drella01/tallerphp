<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Message</title>
  </head>
  <body>
    <h2>WELCOME {{ $data->name }} as email de toda la vida</h2>
    <p>
      Name: {{ $data->name}}<br>
      e-mail: {{ $data->email }}<br>
    </p>
  </body>
</html>
