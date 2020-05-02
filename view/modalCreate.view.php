<div class="modal fade" id="add_new_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
        <!--    <div class="modal-header">
                   
                    <h4 class="modal-title" id="myModalLabel">Nuevo Producto</h4> <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div> 
            -->
                <div class="modal-body">

                	 <ul class="alert alert-danger" ng-if="errors.length > 0">
                        <li ng-repeat="error in errors">
                        	{{ error }}
                        </li>
                     </ul>

                    <div class="form-group">
                        
                        <input placeholder="Nombre del Producto" ng-model="producto.nombre" type="text" id="name" class="form-control"/><i class="alert-danger">obligatorio!</i>
                    </div>

                    <div class="form-group">
                        
                        <textarea placeholder="Descripcion del Producto" ng-model="producto.descripcion" class="form-control" name="description"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="color">Color</label>
                        <select ng-model="producto.color" class="form-control">
                            <option ng-repeat="color in colores">{{color}}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="categoria">Categoria</label>
                        <select ng-model="producto.categoria" class="form-control">
                            <option ng-repeat="categoria in categorias">{{categoria}}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="stock">Cantidad</label>
                        <input class="form-control" type="number" ng-model="producto.stock">
                    </div>

                    <div class="form-group">
                        <label for="stock">Activa</label>
                        <select ng-model="producto.activa">
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select>
                        <i class="alert-danger">obligatorio!</i>
                    </div>

                    <div class="form-group">
                        
                        <div class="card" style="width: 18rem;">
                          <img  class="card-img-top img-card-custom" src="{{ detalle_producto.imagen }}">
                          <div class="card-body">
                            <form enctype="multipart/form-data" id="formu">
                                <input type="file" id="archivo" class="form-control-file"/> <br/>
                                <input ng-model="producto.imagen" type="hidden" name="imagen" class="form-control" />
                                <button ng-click="AddImagen()" class="btn btn-info" >Subir</button>
                        
                    </form>
                            
                          </div>
                        </div>
   
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" ng-click="addProduct()">Guardar Producto</button>
                </div>
            </div>
        </div>
    </div>