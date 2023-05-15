/*var myModal = document.getElementById('myModal')
var myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', function () {
myInput.focus()})*/

  // desaparece mensaje
  window.onload = function() {
    // Espera 3 segundos y luego oculta el mensaje
    setTimeout(function() {
      var mensaje = document.getElementById('mensaje');
      if (mensaje) {
        mensaje.style.display = 'none';
      }
    }, 3000);
  }
  
    const idProveedorInput = document.getElementById('idProveedor');
    const editButtons = document.querySelectorAll('.editarProveedorBtn');
    const nombreInput = document.getElementById('nombree');
    const rfcInput = document.getElementById('rfce');
    const domicilioInput = document.getElementById('domicilioe');
    const codigoPostalInput = document.getElementById('codigoPostale');
    const ciudadInput = document.getElementById('ciudade');
    const estadoInput = document.getElementById('estadoe');
    editButtons.forEach(editButton => {
      editButton.addEventListener('click', () => {
        const id = editButton.getAttribute('data-id');
       
        idProveedorInput.value = id;
        $.ajax({
          type: "POST",
          url: "http://localhost/ejercicioCoppel/controllers/getProveedorById.php",
          data: { action: "getById", id: id },
        }).then(function(response) {
         
          nombreInput.value = response.nombre;
          rfcInput.value = response.rfc;
          domicilioInput.value = response.domicilio;
          codigoPostalInput.value = response.codigoPostal;
          ciudadInput.value = response.ciudad;
          estadoInput.value = response.estado;
        }).catch(function(error) {
          console.log(error);
        });
      
      });
    });
    
 
    
