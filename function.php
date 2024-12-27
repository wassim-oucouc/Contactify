<?php
class contactify{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
   
   public function connect(){
      try {
         $connection = new PDO("mysql:host=$this->servername;dbname=contactify", $this->username, $this->password);
         $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $this->dbh = $connection;
          echo "Connected successfully";
       } catch(PDOException $e) {
         echo "Connection failed: " . $e->getMessage();
       }
     
   }

   public function insert($name,$lastname,$email,$phonenumber)
   {
      $inse = mysqli_query($this->dbh,"INSERT INTO contact(nom,prenom,email,numero_telephone) VALUES($name,$lastname,email,numero_telephone) ");
      return $inse;

   }

   public function fetch()
   {
      $result = mysqli_query()
   }
}

?>