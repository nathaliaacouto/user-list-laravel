<!DOCTYPE html>
<html>
  <head>
    <title>User List</title>
    <meta charset="UTF-8">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <style>
      body {
        background-color: #D0E6DD;
        color: black;
        margin: 10px;
      }

    </style>
  </head>

  <body>
    <h2>User List</h2>
    <table class="table table-success table-hover">
      <thead>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">age</th>
        <th scope="col">email</th>
      </thead>
      
      <tbody>
        @foreach($data->users as $user)
          <tr>
            <td scope="row">{{ $user->id }}</td> <!-- acessando o dado id do usuário -->
            <td scope="row">{{ $user->name }}</td>
            <td scope="row">{{ $user->age }}</td>
            <td scope="row">{{ $user->email }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </body>
</html>