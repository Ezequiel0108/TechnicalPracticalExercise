
//Formulario insert
let formulario = document.getElementById('formInsert');
let formularioEdit = document.getElementById('formEdit');

validarFormulario(formularioEdit);
validarFormulario(formulario);


function validarFormulario(formulario) {
  formulario.addEventListener('submit', function(event) {
    event.preventDefault(); 
    let campos = formulario.querySelectorAll('input'); // Selecciona todos los campos de entrada del formulario
    let formularioValido = true;
    for (let campo of campos) {
      if (campo.id === 'idProveedor') {
        continue; // Si el campo es el de 'idProveedor', saltar la iteración
      }
      if (!campo.checkValidity()) { // 
        campo.classList.add('is-invalid'); // Agrega la clase 'is-invalid' para resaltar el campo
        campo.nextElementSibling.textContent = campo.validationMessage; // Agrega el mensaje al siguiente div es decir al que muestra el mensaje
        formularioValido = false; 
      } else {
        campo.classList.remove('is-invalid'); // Si el campo es válido, elimina la clase 'is-invalid' para que no se resalte
        campo.nextElementSibling.textContent = ''; // Borra el mensaje de validación
      }
    }
    if (formularioValido) { // Si todos los campos son válidos, envía el formulario
      this.submit(); // 'this' hace referencia al elemento <form> actual
    }
  });
}

  
  