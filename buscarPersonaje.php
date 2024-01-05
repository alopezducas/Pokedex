<?php require_once("header.php") ?>

    <main>
        <section class="text-center container-buscador borde">
            <form class="m-auto buscador" action="buscarPersonaje.php" method="get">
                <input class="mr-sm-2 p-2" type="search" name="buscar"
                       placeholder="Buscar nuevamente un personaje por id, nombre o ciudad"
                       aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" name="button" type="submit">Buscar</button>
            </form>
        </section>
        <section class="p-4 text-center">
            <h3 class="text-center text-white border-bottom busqueda">Has buscado un personaje por el siguente filtro :
                <strong style="color: #ff0000"><?php echo $_GET['buscar']; ?></strong></h3>
        </section>
        <section class="p-1 container">
            <article class="row">
                <?php

                $boton = $_GET['button'];
                $search = $_GET['buscar'];
                if ($_SESSION["logeado"] == 1) {
                    busquedaPersonaje($conexion, $boton, $search);
                } else {
                    busquedaPersonajeVistaUsuario($conexion, $boton, $search);
                }
                ?>
            </article>
        </section>
    </main>
<?php require_once("footer.php") ?>