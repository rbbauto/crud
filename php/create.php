<?php

$data = json_decode(file_get_contents('php://input'), TRUE);

if (isset($data['producto'])) {

    require __DIR__ . '/library.php';

    $name = (isset($data['producto']['nombre']) ? $data['producto']['nombre'] : NULL);
    $description = (isset($data['producto']['descripcion']) ? $data['producto']['descripcion'] : NULL);
    $imagen = (isset($data['producto']['imagen']) ? $data['producto']['imagen'] : NULL);

    // validación
    if ($name == NULL) {
        http_response_code(400);
        echo json_encode(['errors' => ["El campo de nombre es obligatorio"]]);

    } else {

        // Add new product
        $crud = new Crud();

        echo $crud->Create($name, $description,$imagen);
    }
}


?>