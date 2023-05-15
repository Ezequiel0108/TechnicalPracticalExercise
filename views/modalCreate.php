
<!-- Modal -->
<div class="modal fade" id="ModalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agrega un nuevo proveedor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formInsert" action="controllers/insertProveedor.php" method="post" novalidate>
                    <div class="px-3">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre(sólo letras, comas y puntos, hasta 30 caracteres): </label>
                            <input type="text" class="form-control px3" id="nombre" name="nombre" pattern="[A-Za-záéíóúüñÑ\s.,]{1,30}" required>
                            <div class="invalid-feedback alert alert-danger"></div>
                        </div>
                        <div class="mb-3">
                            <label for="rfc" class="form-label">RFC(sólo letras y números, hasta 20 caracteres):</label>
                            <input type="text" class="form-control px-3" id="rfc" name="rfc" pattern="[A-Za-z0-9]{1,20}" required>
                            <div class="invalid-feedback alert alert-danger"></div>
                        </div>
                        <div class="mb-3">
                            <label for="domicilio" class="form-label">Domicilio(sólo letras, números y espacios en blanco, hasta 80 caracteres):</label>
                            <input type="text" class="form-control px-3" id="domicilio" name="domicilio" pattern="[A-Za-z0-9\s]{1,80}" required>
                            <div class="invalid-feedback alert alert-danger"></div>
                        </div>
                        <div class="mb-3">
                            <label for="codigoPostal" class="form-label">Código Postal(debe ser de 5 dígitos):</label>
                            <input type="text" class="form-control px-3" id="codigoPostalI" name="codigoPostal" pattern="\d{5}" required>
                            <div class="invalid-feedback alert alert-danger"></div>
                        </div>
                        <div class="mb-3">
                            <label for="ciudad" class="form-label">Ciudad(sólo letras, hasta 20 caracteres):</label>
                            <input type="text" class="form-control px-3" id="ciudadI" name="ciudad" pattern="[A-Za-záéíóúüñÑ]{1,20}" required>
                            <div class="invalid-feedback alert alert-danger"></div>
                        </div>
                        <div class="mb-3">
                            <label for="estado" class="form-label">Estado(sólo letras, hasta 20 caracteres):</label>
                            <input type="text" class="form-control px-3" id="estadoI" name="estado" pattern="[A-Za-záéíóúüñÑ]{1,20}" required>
                            <div class="invalid-feedback alert alert-danger"></div>
                        </div>

                      
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success ">Agregar proveedor</button>
                        </div>
                    </div>
        </form>
      </div>
     
    </div>
  </div>
</div>

