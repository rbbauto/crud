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
                <!-- Tabla Productos -->
                <?php require_once"view/table.view.php"; ?>
                <!-- / Tabla -->
            </div>
        </div>

	
	<!-- Bootstrap Modals -->

        <!-- Create -->
        <?php require_once"view/modalCreate.view.php"; ?>
        <!-- // Modal -->
    	
    	<!-- Modal - Update -->
            <?php require_once"view/modalUpdate.view.php"; ?>
        <!-- // Modal -->
    <!-- End Modals -->
    </div>

	
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script type="text/javascript" src="lib/angular.min.js"></script>
<script type="text/javascript" src="lib/app.js"></script>


</body>
</html>