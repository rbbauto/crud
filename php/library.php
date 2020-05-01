<?php
require __DIR__ . '/database_connection.php';

class Crud{

    protected $db;

    public function __construct()
    {
        $this->db = DB();
    }


    public function Read()
    {
        $query = $this->db->prepare("SELECT * FROM productos");
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }

        return json_encode(['productos' => $data]);
    }


    public function Create($name, $description,$imagen)
    {
        $query = $this->db->prepare("INSERT INTO productos(nombre, descripcion, imagen) VALUES (:nombre,:descripcion,:imagen)");
        $query->bindParam("nombre", $name, PDO::PARAM_STR);
        $query->bindParam("descripcion", $description, PDO::PARAM_STR);
        $query->bindParam("imagen", $imagen, PDO::PARAM_STR);
        $query->execute();

        return json_encode(['producto' => [
            'id'          => $this->db->lastInsertId(),
            'nombre'        => $name,
            'descripcion' => $description,
            'imagen' => $imagen
        ]]);
    }
    

    public function Delete($product_id)
    {
        $query = $this->db->prepare("DELETE FROM productos WHERE id = :id");
        $query->bindParam("id", $product_id, PDO::PARAM_STR);
        $query->execute();
    }


    public function Update($name, $description, $product_id,$imagen)
    {
        $query = $this->db->prepare("UPDATE productos SET imagen = :imagen, nombre = :nombre, descripcion = :descripcion WHERE id = :id");
        $query->bindParam("nombre", $name, PDO::PARAM_STR);
        $query->bindParam("descripcion", $description, PDO::PARAM_STR);
        $query->bindParam("id", $product_id, PDO::PARAM_STR);
        $query->bindParam("imagen", $imagen, PDO::PARAM_STR);
        $query->execute();
    }

   

   

}

?>