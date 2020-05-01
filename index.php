<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>AngularJS PHP CRUD</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/main.css">
	
</head>
<body ng-app="crud">

<div ng-controller="crudController">

	<div class="container">
	
		 <div class="row">
            <div class="col-md-12">
                 <h1><i class="fas fa-shopping-cart"></i> Tienda Virtual Administracion</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="float-right">
                    <button ng-click="errors= []" class="btn btn-success" data-toggle="modal" data-target="#add_new_modal"> <i class="fas fa-plus-circle"></i> Nuevo Producto
                    </button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h3><i class="fas fa-boxes"></i> Productos:</h3>
                <table ng-if="productos.length > 0" class="table table-responsive table-striped">
                    <tr>
                        <th>Id</th>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Acción</th>
                    </tr>
                    <tr ng-repeat="producto in productos">
                        <td>{{$index}}</td>
                        <td><img src="{{producto.imagen}}" width="120px"</td>
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

	
	<!-- Bootstrap Modals -->
   
    <div class="modal fade" id="add_new_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                   
                    <h4 class="modal-title" id="myModalLabel">Nuevo Producto</h4> <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                	 <ul class="alert alert-danger" ng-if="errors.length > 0">
                        <li ng-repeat="error in errors">
                        	{{ error }}
                        </li>
                     </ul>

                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input ng-model="producto.nombre" type="text" id="name" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea ng-model="producto.descripcion" class="form-control" name="description"></textarea>
                    </div>

                    <div class="form-group">
                        
                        <div class="card" style="width: 18rem;">
                          <img  class="card-img-top img-card-custom" src="{{ detalle_producto.imagen }}">
                          <div class="card-body">
                            <form enctype="multipart/form-data" id="formu">
                                <input type="file" id="archivo" class="form-control-file"/> <br/>
                                <input ng-model="producto.imagen" type="text" name="imagen" class="form-control" />
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
    <!-- // Modal -->
	
	<!-- Modal - Update -->
    <div class="modal fade" id="modal_update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Editar Producto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    
                    <ul class="alert alert-danger" ng-if="errors.length > 0">
                        <li ng-repeat="error in errors">
                            {{ error }}
                        </li>
                     </ul>

                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input ng-model="detalle_producto.nombre" type="text" id="name" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea ng-model="detalle_producto.descripcion" class="form-control" name="description"></textarea>
                    </div>

                    
                        
                    <div class="card">
                        <img class="card-img-top img-card-custom" src="{{ detalle_producto.imagen }}">
                        <div class="card-body">
                            <form enctype="multipart/form-data" id="formu">
                                <input type="file" id="archivo2" class="form-control-file"/> <br/>
                                <input ng-model="detalle_producto.imagen" type="text" name="imagen" class="form-control" />
                                <button ng-click="subiendoAJAX()" class="btn btn-info" >Subir</button>
                            </form>
                        </div>
                            
                    </div>

                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button ng-click="updateProduct()" type="button" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>
    <!-- // Modal -->
    
    </div>

	
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script type="text/javascript" src="lib/angular.min.js"></script>
<script type="text/javascript" src="lib/app.js"></script>


</body>
</html>