const codigoPostal = document.getElementById('codigoPostalI');
const ciudad = document.getElementById('ciudadI');
const estado = document.getElementById('estadoI');

codigoPostal.addEventListener('blur', function() {
const cp = parseInt(codigoPostal.value);
//url de la api https://www.zippopotam.us/   Example: api.zippopotam.us/us/90210

const url = `https://api.zippopotam.us/mx/${cp}`;

  fetch(url)
 
  
    .then(response => response.json())
    .then(data => {
        
        ciudad.value = data.places[1]['place name'];
        estado.value = data.places[1].state;
        console.log(data);
    })
    .catch(error => console.error(error));
});
