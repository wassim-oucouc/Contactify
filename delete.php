<?php
$id_contact = $_GET["delete_id"];




require_once("function.php");


$contactify = new Contactify();

$contactify->connect();

$contactify->delete($id_contact);


header("Location: index.php");
?>