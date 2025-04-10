/*Previsualizar imagen*/
const $seleccionImage = document.querySelector("#image"),
$seleccionImage2 = document.querySelector(".container-img"),
 $imagenPrevisualizacion = document.querySelector("#imagePrevisualizacion");

// Escuchar cuando cambie
$seleccionImage.addEventListener("change", () => {
  // Los archivos seleccionados
  const archivos = $seleccionImage.files;
  // Si no hay archivos salimos de la función y quitamos la imagen
  if (!archivos || !archivos.length) {
    $imagenPrevisualizacion.src = "";
    return;
  }
  // Ahora tomamos el primer archivo, el cual vamos a previsualizar
  const primerArchivo = archivos[0];
  // Lo convertimos a un objeto de tipo objectURL
  const objectURL = URL.createObjectURL(primerArchivo);
  // Y a la fuente de la imagen le ponemos el objectURL
  $imagenPrevisualizacion.src = objectURL;
});

$seleccionImage2.addEventListener("change", () => {
  // Los archivos seleccionados
  const archivos = $seleccionImage.files;
  // Si no hay archivos salimos de la función y quitamos la imagen
  if (!archivos || !archivos.length) {
    $imagenPrevisualizacion.src = "";
    return;
  }
  // Ahora tomamos el primer archivo, el cual vamos a previsualizar
  const primerArchivo = archivos[0];
  // Lo convertimos a un objeto de tipo objectURL
  const objectURL = URL.createObjectURL(primerArchivo);
  // Y a la fuente de la imagen le ponemos el objectURL
  $imagenPrevisualizacion.src = objectURL;
});