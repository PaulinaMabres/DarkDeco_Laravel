window.onload = function(){
  fetch('https://apis.datos.gob.ar/georef/api/localidades?formato=json&max=5000')
  .then(function(response){
    return response.json();
  })
  .then(function(data){
    var select = document.querySelector('select#selectLocations');
    var localidades_id = 0;
    for (var i = 0; i < data.localidades.length; i++) {
      if (data.localidades[i].provincia.id == '02'){
        // console.log(data.localidades[i].nombre);
        var nameLocation = data.localidades[i].nombre;
        var option = document. createElement('option');
        option.innerText = nameLocation;
        option.setAttribute('value', localidades_id);
        localidades_id++;
        select.append(option);
      }
    }
  })
  .catch(function(error){
    console.log(error);
  });
}
