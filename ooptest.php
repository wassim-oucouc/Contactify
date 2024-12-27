<?php

class car{
public $id;
public $nom;
public $prenom;
public $email;
public $numero;



public function affichage()
{
    echo "les informations de l utilisateur est : .$id. et $nom";
}





}


$newobject = new car();

$newobject->nom = "wassim";

?>