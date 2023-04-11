<!doctype html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Hello, world!</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
    <h1>Hello, world!</h1>
    <a href="{{route('productoinsertar2')}}" class="btn btn-primary">Ir a insertar</a>



    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>    
        <tbody>
    @foreach($productos as $prod)
    <tr>
        <td>{{$prod->name}}</td>
        <td>{{$prod->descripcion}}</td>
        <td>{{$prod->precio}}</td>
        <td>{{$prod->categoria->name}}</td>
    </tr>
    @endforeach
        </tbody>   
    </div>
</div>
</div>
    </body>

</html>

 
</table>    