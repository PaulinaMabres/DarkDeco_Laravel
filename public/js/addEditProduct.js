window.onload = function(){

  // Apaga el modal
  message('off');

  // Errores que vienen del controlador al intentar grabar
  var errores = document.querySelector('.error');
  if (errores) {
    message('alert', errores.innerText, "$('.message-card').fadeToggle();$('.message-card-container').fadeToggle()")
  }

  // Valores por default
  var price = document.querySelector('#price');
  if (price.value == '') {
    price.value = 0;
  }
  var stock = document.querySelector('#stock');
  if (stock.value == '') {
    stock.value = 0;
  }

  // var esNumero = function(){
  //   if(isNaN(this.value)){
  //     this.style.borderColor = "red";
  //     this.focus();
  //   }else{
  //     this.style.borderColor = "initial";
  //   }
  // }
  // price.addEventListener('blur',esNumero);
  // stock.addEventListener('blur',esNumero);


  // console.log(preview.files[0].name);
  // console.log($('#img-upload').attr('value'));

  // Carga foto
  var imgInput = document.querySelector('#imgInp');
  imgInput.onchange = function(event){
    var preview = document.querySelector('#img-upload');
    var file    = this.files[0];
    imgPreview(preview, file);
    // $('#img-upload').attr('src', this.files[0].name);
    // var label = document.querySelector('#imgLabel');
    // label.innerText = this.files[0].name;
  }

  // Validaciones
  var formAddEditProduct = document.querySelector('.addEditProduct');
  formAddEditProduct.onsubmit = function(event){
    event.preventDefault();
    var errores = 0;

    if ( $('#img-upload').attr('src') == '') {
      errores++;
      message('alert', 'Ingrese una foto', "$('.message-card').fadeToggle();$('.message-card-container').fadeToggle();imgInp.focus()");
    }

    var productName = document.querySelector('#productName');
    if (productName.value.length < 5) {
      errores++;
      message('alert', 'El nombre es muy corto', "$('.message-card').fadeToggle();$('.message-card-container').fadeToggle();productName.focus()");
    }
    var price = document.querySelector('#price');
    if (isNaN(price.value) || price.value < 1) {
      errores++;
      message('alert', 'Precio incorrecto', "$('.message-card').fadeToggle();$('.message-card-container').fadeToggle();price.focus()");
    }
    var price = document.querySelector('#stock');
    if (isNaN(stock.value) || stock.value < 0) {
      errores++;
      message('alert', 'Stock incorrecto', "$('.message-card').fadeToggle();$('.message-card-container').fadeToggle();stock.focus()");
    }
    var description = document.querySelector('#description');
    if (description.value.length > 255){
      errores++;
      message('alert', 'La descripción no puede superar los 255 caracteres.', "$('.message-card').fadeToggle();$('.message-card-container').fadeToggle();description.focus()");
    }
    if (errores == 0) {
      this.submit();
    }
  }

}
