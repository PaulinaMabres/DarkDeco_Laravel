window.onload = function(){

  // Apaga el modal
  message('off');

  var btnDelete = document.querySelector('#deleteProduct');
  btnDelete.onclick = function(event){
    var valor = $('#deleteProduct').attr("value");
    message('confirm', 'Está seguro de borrar el producto?', "window.location.href='/deleteProduct/"+valor+"'");
  }

}
