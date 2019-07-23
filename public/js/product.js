window.onload = function(){
  window.alert('hola');
  var btnDelete = querySelector('a deleteProduct');
  btnDelete.onclick = function(){
    window.confirm('Está seguro de borrar el producto?');
  }


}
