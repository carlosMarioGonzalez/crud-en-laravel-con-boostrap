<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CRUD</title>




    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">






</head>
<nav class="navbar navbar-expand-sm bg-light">

    <!-- Links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="#">Formulario</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Editar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#">Cerrar Sesion</a>
        </li>
    </ul>

</nav>

<body>
    <div class="container ">
        <div class="row ">
            <div class="col-sm-8 mx-auto ">

                <div class="card border-0 shadow">
                    <div class="card-body ">
                        @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                            -{{$error}}<br>
                            @endforeach
                        </div>
                        @endif
                       
              
                        <form action="{{route('users.update', $user)}}" method="POST">
                        @csrf
                        @method('put')
                            <div class="form-group">
                                <input type="text" class="form-control " value="{{$user->name}}" name="name" required autocomplete="name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control " value="{{$user->surname}}" name="surname">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control input-number " id="identification" value="{{$user->identification}}"  name="identification" ">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control"  name="email" value="{{$user->email}}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control input-number" placeholder="Celular" value="{{$user->phone}}" name="phone">
                            </div>
                            <div class="col-sm-6">
                                @csrf
                                <button class="btn-sm btn-primary" type="submit">Guardar cambios</button>

                            </div>

                        </form>
                    </div>
                </div>

                <div>
                    <br>
                    <br>
                </div>




            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css"></script>
    <script type="text/javascript">
       $('.input-number').on('input', function () { 
    this.value = this.value.replace(/[^0-9]/g,'');
});
    </script>



    <script>
        $(document).ready(function() {
            $('#usertable').DataTable({
                responsive: true,
                autoWidth: false
            });
        });
    </script>



</body>





</html>