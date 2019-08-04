window.onload = function(){

  function strToTitle(string) {
    var title = '';
    var upper = true;
    string = string.toLowerCase();
    for (letter of string) {
      if (upper) {
        letter = letter.toUpperCase();
      }
      title += letter;
      upper = letter == " " || letter == "'";
    }
    return title;
  }

  fetch('https://apis.datos.gob.ar/georef/api/localidades?formato=json&max=5000')
  .then(function(response){
    return response.json();
  })
  .then(function(data){
    var body = document.querySelector('body');
    for (var i = 0; i < data.localidades.length; i++) {
      // Solo 02-CABA y 06-Provincia de Bs. As.
      if (data.localidades[i].provincia.id == '02' || data.localidades[i].provincia.id == '06'){
        var nameLocation = data.localidades[i].nombre;
        nameLocation = strToTitle(nameLocation);

        var line = document.createElement('l');
        line.innerText = 'City::create(["cityName" => "' + nameLocation + '"]);';
        body.append(line);
        var line = document.createElement('br');
        body.append(line);
      }
    }
  })
  .catch(function(error){
    console.log(error);
  });
}
