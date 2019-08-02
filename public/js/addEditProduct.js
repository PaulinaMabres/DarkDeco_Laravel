window.onload = function(){

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

  // Carga foto
  var imgInput = document.querySelector('#imgInp');
  imgInput.onchange = function(event){
    var preview = document.querySelector('#img-upload');
    var file    = this.files[0];
    imgPreview(preview, file);
    // var label = document.querySelector('#imgLabel');
    // label.innerText = this.files[0].name;
  }

  // Validaciones
  var formAddEditProduct = document.querySelector('.addEditProduct');
  formAddEditProduct.onsubmit = function(event){
    event.preventDefault();
    var errores = 0;

    var productName = document.querySelector('#productName');
    if (productName.value.length < 5) {
      alert('El nombre es muy corto');
      productName.focus();
      errores++;
    }
    var price = document.querySelector('#price');
    if (isNaN(price.value) || price.value < 1) {
      alert('Precio incorrecto');
      price.focus();
      errores++;
    }
    var price = document.querySelector('#stock');
    if (isNaN(stock.value) || stock.value < 0) {
      alert('Stock incorrecto');
      price.focus();
      errores++;
    }
    var description = document.querySelector('#description');
    if (description.value.length > 255){
      alert('La descripción no puede superar los 255 caracteres.')
      description.focus();
      errores++;
    }
    if (errores == 0) {
      this.submit();
    }
  }

}
