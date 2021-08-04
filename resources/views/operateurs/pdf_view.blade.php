<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Demo in Laravel 7</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  </head>
  <body>
    <table class="table table-bordered">
    <thead>
      <tr class="table-danger">
        <td>Name</td>
        <td>Email</td>
        <td>Phone Number</td>
        <td>DOB</td>
      </tr>
      </thead>
      <tbody>
        @foreach ($operateur as $data)
        <tr>
            <td>{{ $data->name }}</td>
            <td>{{ $data->email1 }}</td>
            <td>{{ $data->telephone1 }}</td>
            <td>{{ $data->type_structure }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </body>
</html>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>