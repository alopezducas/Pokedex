$(document).ready(function () {
    $("#mensaje").hide();
    $("#form").validate({
        event: "blur",
        rules: {
            'nombre': "required",
            'id': "required",
            'imagen': "required",
            'ciudad': "required",
            'descripcion': {
                required: true,
                maxlength: 1000

            }
        },
        messages: {
            'nombre': "Ingrese un nombre",
            'id': "Ingrese un id",
            'imagen': "Seleccione una imagen para subir",
            'ciudad': "Seleccione una ciudad",
            'descripcion': {
                required: 'Debe ingresar una descripcion',

                maxlength: 'No mas de 1000 caracteres'
            }
        },
        debug: true,
        errorElement: "label",
        errorContainer: $("#errores"),
        submitHandler: function (form) {
            $("#mensaje").show();
            $("#mensaje").html("<p class='pensando'>Enviando el formulario, por favor espere...</p>");
            form.submit();
        }
    });
    ;
});