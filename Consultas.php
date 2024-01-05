<?php
function mostrarPersonajesDeLaBaseDeDatosVistaUsuario($conexion)
{

    $sql = "select * from Personaje";

    $resultado = $conexion->query($sql);

    while ($row = $resultado->fetch_assoc()) {
        $nombre = $row["nombre"];
        $ciudad = $row["ciudad"];
        $idPersonaje = $row["id"];
        $img = $row["url_imagen"];
        $descripcion = $row["descripcion"];

        echo '
        <div class="col-12 col-md-6 col-lg-4 m-auto">
            <div class="card mb-3 fondo">
                <a href="personajeMostrado.php?id=' . $idPersonaje . '"><img class="card-img-top" src="Recursos/img/personajes/' . $img . '" alt="' . $nombre . '"></a>
                <div class="card-body border-top">
                    <h2 class="card-title text-black">' . $idPersonaje . ' | ' . $nombre . '</h2>
                    <hr>
                    <p class="card-text font-x-large"><img src="Recursos/img/ciudad/' . $ciudad . '.png"
                            alt="' . $ciudad . '" class="ciudad">' . $ciudad . '
                    </p>
                </div>
            </div>
        </div>        
        ';
    }
}


function mostrarPersonajesDeLaBaseDeDatos($conexion)
{
    $sql = "select * from Personaje";

    $resultado = $conexion->query($sql);

    while ($row = $resultado->fetch_assoc()) {
        $nombre = $row["nombre"];
        $ciudad = $row["ciudad"];
        $idPersonaje = $row["id"];
        $img = $row["url_imagen"];
        $descripcion = $row["descripcion"];

        echo '
        <div class="col-12 col-md-6 col-lg-4 m-auto">
            <div class="card mb-3 fondo">
                <a href="personajeMostrado.php?id=' . $idPersonaje . '"><img class="card-img-top" src="Recursos/img/personajes/' . $img . '" alt="' . $nombre . '"></a>
                <div class="card-body border-top">
                    <h2 class="card-title text-black">' . $idPersonaje . ' | ' . $nombre . '</h2>
                    <hr>
                    <p class="card-text font-x-large"><img src="Recursos/img/ciudad/' . $ciudad . '.png"
                            alt="' . $ciudad . '" class="ciudad">' . $ciudad . '
                    </p>
                    <!-- Contenedor de botones -->
                    <div>
                        <!-- Boton editar modal -->
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                            data-target="#staticBackdrop' . $idPersonaje . '">
                            Editar Personaje
                        </button>
                        <!-- Boton eliminar modal -->
                        <button type="button" class="btn btn-outline-danger" data-toggle="modal"
                            data-target="#exampleModal' . $idPersonaje . '">
                            Eliminar Personaje
                        </button>
        
                        <!-- Modal Eliminar personaje-->
                        <div class="modal fade" id="exampleModal' . $idPersonaje . '" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-editar">
                                        <h5 class="modal-title text-white" id="exampleModalLabel">Estas a punto de eliminar un personaje
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body bg-editar text-white">
                                        ¿Estas seguro de que deseas hacerlo?
                                    </div>
                                    <div class="modal-footer bg-editar text-white">
                                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">
                                            Cancelar
                                        </button>
                                        
                                        <a href="eliminarPersonaje.php?id=' . $idPersonaje . '" type="button" class="btn btn-outline-primary">
                                            Confirmar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Editar personaje-->
                        <div class="modal fade" id="staticBackdrop' . $idPersonaje . '" data-backdrop="static" data-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-editar">
                                        <h5 class="modal-title text-white" id="staticBackdropLabel">Editar Personaje</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body bg-editar">
                                        <form action="actualizarPersonaje.php?idViejo=' . $idPersonaje . '" method="POST" enctype="multipart/form-data">
                                            <div class="form-group mb-4">
                                                <input type="text" class="nuevoPersonaje text-white" name="nombre" id="nombre"
                                                    aria-describedby="emailHelp" placeholder="Nombre: ' . $nombre . '">
                                            </div>
                                            <div class="form-group mb-4">
                                                <input type="number" class="nuevoPersonaje" name="id" id="id"
                                                    placeholder="Id: ' . $idPersonaje . '">
                                            </div>
        
                                            <div class="custom-file mb-4">
                                                <input type="file" class="nuevoPersonajeArchivo" name="imagen" id="imagen"
                                                    aria-describedby="inputGroupFileAddon01">
                                            </div>
        
                                            <div class="input-group mb-4">
                                                <select name="ciudad" class="custom-select nuevoPersonaje" id="ciudad">
                                                    <option selected disabled>Eliga la ciudad:</option>
                                                    <option value="springfield">Springfield</option>
                                                    <option value="shelbyville">Shelbyville</option>
                                                    <option value="las-vegas">Las Vegas</option>
                                                    <option value="new-york">Nueva York</option>
                                                </select>
                                            </div>
                                            <div class="form-group mb-4">
                                                <textarea class="form-control nuevoPersonaje" name="descripcion" id="descripcion"
                                                    rows="3" placeholder="Ingrese una descripcion del personaje" maxlength="1000"
                                                    onkeyup="contarCaracteres()">' . $descripcion . '</textarea>
                                                <p class="text-white"><span id="caracteres"></span>/1000</p>
                                            </div>
                                            <div class="text-center">
                                            <button type="submit" class="btn btn-nuevo">Actualizar datos del personaje</button>
                                            </div>
                                            <div id="mensaje" class="error">
        
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
        ';
    }
}

function mostrarPersonajeEspecifico($id, $conexion)
{
    $sql = "select * from Personaje WHERE id ='$id'";

    $resultado = $conexion->query($sql);
    $row = $resultado->fetch_assoc();
    $nombre = $row["nombre"];
    $ciudad = $row["ciudad"];
    $idPersonaje = $row["id"];
    $img = $row["url_imagen"];
    $descripcion = $row["descripcion"];
    echo '
            <section class="row justify-content-center">
            <article class="col-12 col-md-6 text-center">
                <img src="Recursos/img/personajes/' . $img . '" alt="' . $nombre . '" class="mostrarPersonajes anchoNuevo rounded border border-secondary">
            </article>
            <article class="col-12 col-md-6 pt-2 desPerso">
                <h2 class="text-white border-bottom p-2 informacion">' . $nombre . '</h2>
                <p class="card-text text-white">ID: ' . $idPersonaje . '</p>
                <p class="card-text text-white">Ciudad: <img src="Recursos/img/ciudad/' . $ciudad . '.png" alt="' . $ciudad . '"
                                                                                 class="ciudad1"> ' . $ciudad . '</p>
                <p class="card-text text-white">Descripcion: ' . $descripcion . '
                </p>
            </article>
        </section>
        ';
}

function busquedaPersonaje($conexion, $boton, $buscar)
{
    if (isset($boton)) {

        $search = $buscar;

        $query = "select * from Personaje where id like '%{$search}%' or nombre like '%{$search}%' or ciudad like '%{$search}%'  ";
        $resultado = $conexion->query($query);
        if (mysqli_num_rows($resultado) > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $nombre = $row["nombre"];
                $ciudad = $row["ciudad"];
                $idPersonaje = $row["id"];
                $img = $row["url_imagen"];
                $descripcion = $row["descripcion"];

                echo '
                <div class="col-12 col-md-6 col-lg-4 m-auto">
                    <div class="card mb-3 fondo">
                        <a href="personajeMostrado.php?id=' . $idPersonaje . '"><img class="card-img-top" src="Recursos/img/personajes/' . $img . '" alt="' . $nombre . '"></a>
                        <div class="card-body border-top">
                            <h2 class="card-title text-black">' . $idPersonaje . ' | ' . $nombre . '</h2>
                            <hr>
                            <p class="card-text font-x-large"><img src="Recursos/img/ciudad/' . $ciudad . '.png"
                                    alt="' . $ciudad . '" class="ciudad">' . $ciudad . '
                            </p>
                            <div>
                                <!-- Boton editar modal -->
                                <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                                    data-target="#staticBackdrop' . $idPersonaje . '">
                                    Editar Personaje
                                </button>
                                <!-- Boton eliminar modal -->
                                <button type="button" class="btn btn-outline-danger" data-toggle="modal"
                                    data-target="#exampleModal' . $idPersonaje . '">
                                    Eliminar Personaje
                                </button>
                
                                <!-- Modal Eliminar personaje-->
                                <div class="modal fade" id="exampleModal' . $idPersonaje . '" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-editar">
                                                <h5 class="modal-title text-white" id="exampleModalLabel">Estas a punto de eliminar un personaje
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body bg-editar text-white">
                                                ¿Estas seguro de que deseas hacerlo?
                                            </div>
                                            <div class="modal-footer bg-editar text-white">
                                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">
                                                    Cancelar
                                                </button>
                                                
                                                <a href="eliminarPersonaje.php.php?id=' . $idPersonaje . '" type="button" class="btn btn-outline-primary">
                                                    Confirmar
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal Editar personaje-->
                                <div class="modal fade" id="staticBackdrop' . $idPersonaje . '" data-backdrop="static" data-keyboard="false"
                                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-editar">
                                                <h5 class="modal-title text-white" id="staticBackdropLabel">Editar Personaje</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body bg-editar">
                                                <form action="actualizarPersonaje.php.php?idViejo=' . $idPersonaje . '" method="POST" enctype="multipart/form-data">
                                                    <div class="form-group mb-4">
                                                        <input type="text" class="nuevoPersonaje text-white" name="nombre" id="nombre"
                                                            aria-describedby="emailHelp" placeholder="Nombre: ' . $nombre . '">
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <input type="number" class="nuevoPersonaje" name="id" id="id"
                                                            placeholder="Id: ' . $idPersonaje . '">
                                                    </div>
                
                                                    <div class="custom-file mb-4">
                                                        <input type="file" class="nuevoPersonajeArchivo" name="imagen" id="imagen"
                                                            aria-describedby="inputGroupFileAddon01">
                                                    </div>
                
                                                    <div class="input-group mb-4">
                                                        <select name="ciudad" class="custom-select nuevoPersonaje" id="ciudad">
                                                            <option selected disabled>Elija una ciudad:</option>
                                                            <option value="Springfield">Springfield</option>
                                                            <option value="Shelbyville">Shelbyville</option>
                                                            <option value="Las Vegas">Las Vegas</option>
                                                            <option value="NewYork">Nueva York</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <textarea class="form-control nuevoPersonaje" name="descripcion" id="descripcion"
                                                            rows="3" placeholder="Ingrese una descripcion del personaje" maxlength="1000"
                                                            onkeyup="contarCaracteres()">' . $descripcion . '</textarea>
                                                        <p class="text-white"><span id="caracteres"></span>/1000</p>
                                                    </div>
                                                    <div class="text-center">
                                                    <button type="submit" class="btn btn-nuevo">Actualizar datos del personaje</button>
                                                    </div>
                                                    <div id="mensaje" class="error">
                
                                                    </div>
                                                </form>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>        
        ';
            }
        } else {
            echo "
            <div class='justify-content-center'>
                <h2 class='border p-3 text-danger text-center'>
                    <i class='fas fa-exclamation-circle'></i> No se han encontrado personaje con ese filtro <i class='fas fa-exclamation-circle'></i>
                </h2>
            </div>
            ";
        }

    }

}
function busquedaPersonajeVistaUsuario($conexion, $boton, $buscar)
{
    if (isset($boton)) {

        $search = $buscar;

        $query = "select * from Personaje where id like '%{$search}%' or nombre like '%{$search}%' or ciudad like '%{$search}%'  ";
        $resultado = $conexion->query($query);
        if (mysqli_num_rows($resultado) > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $nombre = $row["nombre"];
                $ciudad = $row["ciudad"];
                $idPersonaje = $row["id"];
                $img = $row["url_imagen"];

                echo '
                <div class="col-12 col-md-6 col-lg-4 m-auto">
                    <div class="card mb-3 fondo">
                        <a href="personajeMostrado.php?id=' . $idPersonaje . '"><img class="card-img-top" src="Recursos/img/personajes/' . $img . '" alt="' . $nombre . '"></a>
                        <div class="card-body border-top">
                            <h2 class="card-title text-black">' . $idPersonaje . ' | ' . $nombre . '</h2>
                            <hr>
                            <p class="card-text font-x-large"><img src="Recursos/img/ciudad/' . $ciudad . '.png"
                                    alt="' . $ciudad . '" class="ciudad">' . $ciudad . '
                            </p>
                        </div>
                    </div>
                </div>        
        ';
            }
        } else {
            echo "
            <div class='justify-content-center'>
                <h2 class='border p-3 text-danger text-center'>
                    <i class='fas fa-exclamation-circle'></i> No se han encontrado personajes con ese filtro <i class='fas fa-exclamation-circle'></i>
                </h2>
            </div>
            ";
        }

    }

}


