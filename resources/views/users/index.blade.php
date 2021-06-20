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
    <div class="container">
        <div class="row">
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

                        <form action="{{route('users.store')}}" method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control " placeholder="Nombres" value="{{old ('name')}}" name="name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control " placeholder="Apellidos" name="surname" value="{{old ('surname')}}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control input-number " id="identification" placeholder="Cedula (solo números)" value="{{old ('identification')}}" name="identification" value="{{old ('email')}}" pattern="{0,9}">

                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Correo" name="email" value="{{old ('email')}}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control input-number" placeholder="Celular (solo números)" value="{{old ('phone')}}" name="phone">
                            </div>
                            <div class="col-sm-6">
                                @csrf
                                <button class="btn-sm btn-primary" type="submit">Crear Usuario</button>

                            </div>

                        </form>
                    </div>
                </div>

                <div>
                    <br>
                    <br>
                </div>



                <table class="table table-hover table-sm  table-bordered" style="width:100%" id="usertable">
                <caption>Tabla De Usuarios</caption>
                    <thead class="thead-light thead-sm ">
                        <tr>

                            <th>Id</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Cedula</th>
                            <th>Email</th>
                            <th>Celular</th>
                            <th>&nbsp;
                            </th>
                            <th>&nbsp;
                            </th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->surname}}</td>
                            <td>{{$user-> identification}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>

                            <td>
                                <form action="{{route('users.destroy', $user)}}" method="POST">
                                    @method('DELETE')
                                    @csrf

                                    <input type="submit" name="" value="Eliminar" class="btn btn-sm btn-danger" onclick="return confirm('¿desea eliminar ?')">
                                </form>
                            </td>

                            <td>
                                <a href="{{route('users.edit', $user)}}" class="btn btn-sm btn-primary">Editar</a>
                            </td>



                        </tr>
                        @endforeach

                    </tbody>

                </table>



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
        $('.input-number').on('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
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