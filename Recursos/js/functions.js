const cantidad = 1000;

function contarCaracteres() {
    var caracteres = document.getElementById("descripcion").value.length;
    var restantes = cantidad - caracteres;
    document.getElementById("caracteres").innerHTML = restantes;

}
