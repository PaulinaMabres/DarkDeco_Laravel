// Generador para el seeder de ciudades.
// Usarlo linkeado a un html vacío, va  generando las líneas que después hay que copiar y pegar en el seeder

window.onload = function(){

  fetch('https://apis.datos.gob.ar/georef/api/localidades?formato=json&max=5000')
  .then(function(response){
    return response.json();
  })
  .then(function(data){
    var body = document.querySelector('body');
    for (var i = 0; i < data.localidades.length; i++) {
      // if (data.localidades[i].provincia.id == '02'){
        var nameLocation = data.localidades[i].nombre;

        var line = document.createElement('l');
        line.innerText = 'City::create(["cityName" => "' + nameLocation + '"]);';
        body.append(line);
        var line = document.createElement('br');
        body.append(line);
      // }
    }
  })
  .catch(function(error){
    console.log(error);
  });
}
