<?php
require __DIR__ . '/library.php';
 
$productos = new Crud();
 
echo $productos->ReadCat();
 
?>