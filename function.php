<?php
class Contactify {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "contactify";
    private $dbh;

    public function connect() {
        try {
            $this->dbh = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }



    public function insert($name, $lastname, $email, $phonenumber) {
        try {
            $stmt = $this->dbh->prepare("INSERT INTO contact (nom, prenom, email, numero_telephone) VALUES (:name, :lastname, :email, :phonenumber)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phonenumber', $phonenumber);
            $stmt->execute();
            echo "New contact inserted successfully!";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function fetch() {
        try {
            $stmt = $this->dbh->prepare("SELECT * FROM contact");
            $stmt->execute();
            $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $contacts;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function update($id, $name, $lastname, $email, $phonenumber) {
        try {
            $stmt = $this->dbh->prepare("UPDATE contact SET nom = :name, prenom = :lastname, email = :email, numero_telephone = :phonenumber WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phonenumber', $phonenumber);
            $stmt->execute();
            echo "Contact updated successfully!";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    public function delete($id) {
        try {
            $stmt = $this->dbh->prepare("DELETE FROM contact WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            echo "Contact deleted successfully!";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

// $contactify = new Contactify();

<<<<<<< HEAD
// // Fetch all contacts
// $contacts = $contactify->fetch();
// echo "<pre>";
// print_r($contacts);
// echo "</pre>";

// // Update a contact with ID 1
// $contactify->update(1, "John", "Doe", "john.doe@example.com", "987654321");

// // Delete a contact with ID 1
// $contactify->delete(1);
=======

>>>>>>> 2dbdc58a19c00c1bf397ffd28b8f4bd7462eca98
?>
