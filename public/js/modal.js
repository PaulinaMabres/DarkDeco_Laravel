// Función que maneja el funcionamiento del modalAction
// ver modal.blade.php

// modalAction = off --> oculta el modal
// modalAction = alert --> funciona como un alert
// modalAction = confirm --> funciona como un confirm

function message(modalAction, message = '', btnAcceptAction = ''){
  // Cambio texto del mensaje
  $('.message-card-body').text(message);

  if (modalAction == 'off') {
    // Oculto el modal
    $('.message-card').hide();
    $('.message-card-container').hide();
  } else {
    // Muestro y escondo card y botones
    $('.message-card').show();
    $('.message-card-container').show();
    if (modalAction == 'alert') {
      $('#btn-cancel').hide();
    } else {
      $('#btn-cancel').show();
    }
  }

  // Botón aceptar - onclick
  $('#btn-accept').attr("onclick", btnAcceptAction);
}
