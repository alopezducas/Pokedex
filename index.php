<?php require_once("header.php") ?>
    <main>
        <section class="p-3 text-center">
            <?php
                $error =isset( $_GET["error"]) ? $_GET["error"] : false;
                if($error){
                    echo '<h4 class="text-danger">Error al iniciar sesion. Usuario Incorrecto</h4>';
                }
            ?>
        </section>
        <section class="text-center container-buscador borde">
            <form class="m-auto buscador" action="buscarPersonaje.php" method="get">
                <input class="mr-sm-2 p-2" type="search" name="buscar" placeholder="Buscar personaje por id, nombre o ciudad"
                       aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" name="button" type="submit">Buscar</button>
            </form>

        </section>

        <section class="p-1 container">
            <article class="row">
                <?php
                mostrarPersonajesDeLaBaseDeDatosVistaUsuario($conexion);
                ?>
            </article>
        </section>
    </main>
<?php require_once("footer.php") ?>