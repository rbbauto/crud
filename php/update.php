<?php

$data = json_decode(file_get_contents('php://input'), TRUE);

if (isset($data['producto'])) {

    require __DIR__ . '/library.php';

    $name = (isset($data['producto']['nombre']) ? $data['producto']['nombre'] : NULL);
    $description = (isset($data['producto']['descripcion']) ? $data['producto']['descripcion'] : NULL);
    $product_id = (isset($data['producto']['id']) ? $data['producto']['id'] : NULL);
    $imagen = (isset($data['producto']['imagen']) ? $data['producto']['imagen'] : NULL);

    // validar
    if ($name == NULL) {
        http_response_code(400);
        echo json_encode(['errors' => ["El campo de nombre es obligatorio"]]);

    } else {

        // Update
        $crud = new Crud();

        $crud->Update($name, $description, $product_id,$imagen);
    }
}

?>