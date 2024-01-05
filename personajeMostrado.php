<?php require_once("header.php") ?>

    <main>
        <?php
        $id = $_GET["id"];
        mostrarPersonajeEspecifico($id, $conexion);
        ?>
    </main>
<?php require_once("footer.php") ?>