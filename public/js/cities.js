window.onload = function(){

  function strToTitle(string) {
    var title = '';
    upper = true;
    string = string.toLowerCase();
    for (letter of string) {
      // console.log(letter);
      if (upper) {
        letter = letter.toUpperCase();
      }
      title += letter;
      upper = letter == " " || letter == "'";
    }
    console.log(title);
    return title;
  }

  fetch('https://apis.datos.gob.ar/georef/api/localidades?formato=json&max=5000')
  .then(function(response){
    return response.json();
  })
  .then(function(data){
    var body = document.querySelector('body');
    for (var i = 0; i < data.localidades.length; i++) {
      // if (data.localidades[i].provincia.id == '02'){
        // console.log(data.localidades[i].nombre);
        var nameLocation = data.localidades[i].nombre;
        nameLocation = strToTitle(nameLocation);

        var line = document.createElement('l');
        // line.innerText = "City::create(['cityName' => '" + nameLocation + "']);";
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
