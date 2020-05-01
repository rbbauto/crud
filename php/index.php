 <div class="row">
            <div class="col-md-12">
                <h3><i class="fas fa-boxes"></i> Productos:</h3>
                <table ng-if="productos.length > 0" class="table table-bordered table-responsive table-striped">
                    <tr>
                        <th>No</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Acción</th>
                    </tr>
                    <tr ng-repeat="producto in productos">
                        <td>{{$index + 1}}</td>
                        <td>{{producto.nombre}}</td>
                        <td>{{producto.descripcion}}</td>
                        <td>
                            <button ng-click="edit($index)" class="btn btn-primary btn-xs"><i class="fas fa-pencil-alt"></i> Editar</button>
                            <button ng-click="delete($index)" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i> Eliminar</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>