// Función para mostrar la foto de un input en un preview
function imgPreview(preview, file){
  var reader  = new FileReader();
  reader.onloadend = function () {
    preview.src = reader.result;
  }
  if (file) {
    reader.readAsDataURL(file); //reads the data as a URL
  } else {
    preview.src = "";
  }
}
