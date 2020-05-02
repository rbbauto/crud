<table ng-if="productos.length > 0" class="table table-responsive table-striped">
                    <tr>
                        <th>Id</th>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Color</th>
                        <th>Categoria</th>
                        <th>Cantidad</th>
                        <th>Publicada</th>
                        <th>Acción</th>
                    </tr>
                    <tr ng-repeat="producto in productos">
                        <td>{{$index}}</td>
                        <td><img src="{{producto.imagen}}" width="120px"</td>
                        <td>{{producto.nombre}}</td>
                        <td>{{producto.descripcion}}</td>
                        <td>{{producto.color}}</td>
                        <td>{{producto.categoria}}</td>
                        <td>{{producto.stock}}</td>
                        <td>{{producto.activa}}</td>
                        <td>
                            <button ng-click="edit($index)" class="btn btn-primary btn-xs"><i class="fas fa-pencil-alt"></i> Editar</button>
                            <button ng-click="delete($index)" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i> Eliminar</button>
                        </td>
                    </tr>
                </table>