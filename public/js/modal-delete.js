$("#eliminarModal").on("show.bs.modal", function (event) {
    /* esta función de evento se ejecuta cuando presionamos el boton con la clase .delete */ let boton =
        $(event.relatedTarget); //e.relatedTarget identifica el botón al que pertenece el evento

    let id = boton.data("id"); // boton.data('id') utiliza el boton, .data('id') obtiene el valor de la variable id que pertenece al atributo data-id

    let form = $("#form-delete"); //obtengo el formulario de eliminar

    let ruta = form.attr("data-action").slice(0, -1); // accedo al formulario y a su atributo data-acction, con el metodo slice corta el string de la ruta a partir del -1(ultimo caracter del string) y hasta ese caracter, es decir elimina el 1 de la ruta

    ruta += id; // concateno a la ruta el id obtenido del boton con atributo data-id //* es decir añado el id a la ruta que es el paramtro de la ruta

    form.attr("action", ruta); //modifico el atributo action para pasarle el nuevo valor que es la ruta completa con su parametro
});
