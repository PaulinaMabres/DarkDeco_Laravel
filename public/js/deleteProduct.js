window.onload = function(){

  // Apaga el modal
  message('off');

  var btnDelete = document.querySelector('#deleteProduct');
  btnDelete.onclick = function(event){
    var valor = $('#deleteProduct').attr("value");
    message('confirm', 'Está seguro de borrar el producto?', "window.location.href='/deleteProduct/"+valor+"'");
  }

  // Errores que vienen del controlador al intentar grabar
  var error = document.querySelector('.error');
  console.log(error.innerText);
  if (error.innerText.trim() != 'OK') {
    message('alert', error.innerText, "$('.message-card').fadeToggle();$('.message-card-container').fadeToggle()")
  }
}
