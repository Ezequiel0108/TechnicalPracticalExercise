<table class="table table-striped table-hover table-light">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>RFC</th>
                        <th>Domicilio</th>
                        <th>Código Postal</th>
                        <th>Ciudad</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $proveedores=$controlador->getAllProveedores();
                    foreach ($proveedores as $proveedor): ?>
                        <tr>
                            <td><?php echo $proveedor['id']; ?></td>
                            <td><?php echo $proveedor['nombre']; ?></td>
                            <td><?php echo $proveedor['rfc']; ?></td>
                            <td><?php echo $proveedor['domicilio']; ?></td>
                            <td><?php echo $proveedor['codigoPostal']; ?></td>
                            <td><?php echo $proveedor['ciudad']; ?></td>
                            <td><?php echo $proveedor['estado']; ?></td>
                            <td>
                               
                            <button id="" type="button" class="editarProveedorBtn btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalEdit" data-id="<?php echo $proveedor['id']; ?>"  >Editar</button>
                            
                            </td>
                            <td>
                            <form action="./controllers/deleteProveedor.php" method="POST" class="d-inline">
                            <input type="hidden" name="idProveedor" value="<?php echo $proveedor['id']; ?>">
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                            </td>
                         </tr>
                     <?php endforeach; ?>
                      
                    </tbody>
                   
</table>
