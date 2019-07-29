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

  var imgInput = document.querySelector('#imgInp');
  imgInput.onchange = function(event){
    var preview = document.querySelector('#img-upload');
    var file    = document.querySelector('#imgInp').files[0];
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

  // Validaciones
  var formAddEditProduct = document.querySelector('.addEditProduct');
  formAddEditProduct.onsubmit = function(event){
    event.preventDefault();
    var errores = 0;

    var productName = document.querySelector('#productName');
    if (productName.value.length < 5) {
      alert('El nombre es muy corto');
      errores++;
    }
    var price = document.querySelector('#price');
    if (price.value < 1) {
      alert('Precio incorrecto');
      errores++;
    }
    var description = document.querySelector('#description');
    if (description.value.length > 255){
      alert('La descripción no puede superar los 255 caracteres.')
      errores++;
    }
    if (errores == 0) {
      this.submit();
    }
  }

  // function CurrencyFormatted(amount) {
  //   var i = parseFloat(amount);
  //   if(isNaN(i)) { i = 0.00; }
  //   var minus = '';
  //   if(i < 0) { minus = '-'; }
  //   i = Math.abs(i);
  //   i = parseInt((i + .005) * 100);
  //   i = i / 100;
  //   s = new String(i);
  //   if(s.indexOf('.') < 0) { s += '.00'; }
  //   if(s.indexOf('.') == (s.length - 2)) { s += '0'; }
  //   s = minus + s;
  //   return s;
  // }
}
