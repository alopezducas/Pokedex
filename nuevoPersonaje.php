<?php require_once("header.php") ?>

    <main>
        <section class="text-center text-white p-3">
            <h3>Agregar un nuevo personaje</h3>
        </section>
        <section class="ancho p-2">
            <form action="agregarPersonaje.php" method="POST" enctype="multipart/form-data" name="form" id="form">
                <div class="form-group mb-4">
                    <input type="text" class="nuevoPersonaje text-white" name="nombre" id="nombre"
                           aria-describedby="emailHelp"
                           placeholder="Ingrese el nombre del personaje">
                </div>
                <div class="form-group mb-4">
                    <input type="number" class="nuevoPersonaje" name="id" id="id" placeholder="Ingrese el ID del personaje">
                </div>

                <div class="custom-file mb-4">
                    <input type="file" class="nuevoPersonajeArchivo" name="imagen" id="imagen"
                           aria-describedby="inputGroupFileAddon01">
                </div>

                <div class="input-group mb-4">
                    <select name="ciudad" class="custom-select nuevoPersonaje" id="ciudad">
                        <option selected disabled>Eliga una ciudad:</option>
                        <option value="springfield">Springfield</option>
                        <option value="shelbyville">Shelbyville</option>
                        <option value="las-vegas">Las Vegas</option>
                        <option value="new-york">Nueva York</option>
                    </select>
                </div>
                <div class="form-group mb-4">
                <textarea class="form-control nuevoPersonaje" name="descripcion" id="descripcion" rows="3"
                          placeholder="Ingrese una descripcion del personaje" maxlength="1000"
                          onkeyup="contarCaracteres()"></textarea>
                    <p class="text-white"><span id="caracteres"></span>/1000</p>
                </div>
                <button type="submit" class="btn btn-nuevo">Subir nuevo Personaje</button>
                <div id="mensaje" class="error">

                </div>
            </form>
        </section>
    </main>
<?php require_once("footer.php") ?>