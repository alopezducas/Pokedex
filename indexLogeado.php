<?php require_once("header.php") ?>

    <main>
        <section class="text-center container-buscador borde">
            <form class="m-auto buscador" action="buscarPersonaje.php" method="get">
                <input class="mr-sm-2 p-2" type="search" name="buscar" placeholder="Buscar personaje por id, nombre o ciudad"
                       aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" name="button" type="submit">Buscar</button>
            </form>
            <div class="text-white mt-2 nuevoPerso">
                <p>Agregue un nuevo personaje <a href="nuevoPersonaje.php" class="text-danger">
                        ACÁ</a></p>
            </div>
        </section>

        <section class="p-1 container">
            <article class="row">
                <?php
                mostrarPersonajesDeLaBaseDeDatos($conexion);
                ?>
            </article>
        </section>
    </main>
<?php require_once("footer.php") ?>