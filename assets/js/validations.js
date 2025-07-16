// Validación de categorías
$(document).ready(function() {
console.log("Validaciones cargadas correctamente.");


  $("#form-categoria").on("submit", function(event) {
    let isValid = true;
    $(".error-msg").remove();

    const nombreCat = $("#nombreCategoria").val().trim();
    if (nombreCat === "") {
      $("#nombreCategoria").after('<span class="error-msg"> Christian Marucco te avisa que este campo obligatorio</span>');
      isValid = false;
    }
    const descCat = $("#descripcionCategoria").val().trim();
    if (descCat === "") {
      $("#descripcionCategoria").after('<span class="error-msg">Christian Marucco te avisa que este campo obligatorio</span>');
      isValid = false;
    }
    if (!isValid) event.preventDefault();
  });

  // Validación de productos
  $("#form-producto").on("submit", function(event) {
    let isValid = true;
    $(".error-msg").remove();

    const nombre = $("#nombreProducto").val().trim();
    if (nombre === "") {
      $("#nombreProducto").after('<span class="error-msg">Christian Marucco te avisa que este campo es obligatorio</span>');
      isValid = false;
    }
    const precio = parseFloat($("#precioProducto").val());
    if (isNaN(precio) || precio <= 0) {
      $("#precioProducto").after('<span class="error-msg">Christian Marucco te avisa que el valor de este campo debe ser mayor a 0</span>');
      isValid = false;
    }
    const categoria = $("#categoriaProducto").val();
    if (categoria === "") {
      $("#categoriaProducto").after('<span class="error-msg">Christian Marucco te avisa selecciones una categoría</span>');
      isValid = false;
    }
    const descripcion = $("#descripcionProducto").val().trim();
    if (descripcion === "") {
      $("#descripcionProducto").after('<span class="error-msg">Christian Marucco te avisa que este campo es obligatorio</span>');
      isValid = false;
    }
    if (!isValid) event.preventDefault();
  });
});