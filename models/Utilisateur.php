<?php
//class Utilisateur
class Utilisateur{
  // DB stuff
  private $conn;
  private $table = 'utilisateur';

   // Post Properties
   public $id;
   public $nom;
   public $prenom;
   public $token;
   public $role;
   public $created_at;
   public $updated_at;
 

   // Constructor with DB
   public function __construct($db) {
     $this->conn = $db;
   }

   // Get Posts
    public function read() {
      // Create query
      $query = 'SELECT id, nom, prenom, token, role, created_at, updated_at
                            FROM
                              ' . $this->table . '
                            ORDER BY
                              created_at DESC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);
  
      // Execute query
      $stmt->execute();
  
      return $stmt;
    }

    //create
    public function create(){
      // Create query
      $query = 'INSERT INTO ' . $this->table . ' SET nom = :nom, prenom = :prenom, token = :token, role = :role';
  
      // Prepare statement
      $stmt = $this->conn->prepare($query);
  
      // Clean data
      $this->nom = htmlspecialchars(strip_tags($this->nom));
      $this->prenom = htmlspecialchars(strip_tags($this->prenom));
      $this->token = htmlspecialchars(strip_tags($this->token));
      $this->role = htmlspecialchars(strip_tags($this->role));
     
  
      // Bind data
      $stmt->bindParam(':nom', $this->nom);
      $stmt->bindParam(':prenom', $this->prenom);
      $stmt->bindParam(':token', $this->token);
      $stmt->bindParam(':role', $this->role);
      
  
      // Execute query
      if($stmt->execute()){
        return true;
      }
  
      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);
  
      return false;
    }

    //update
    public function update(){
      // Create query
      $query = 'UPDATE ' . $this->table . '
                                SET nom = :nom, prenom = :prenom, token = :token, role = :role
                                WHERE id = :id';
  
      // Prepare statement
      $stmt = $this->conn->prepare($query);
  
      // Clean data
      $this->nom = htmlspecialchars(strip_tags($this->nom));
      $this->prenom = htmlspecialchars(strip_tags($this->prenom));
      $this->token = htmlspecialchars(strip_tags($this->token));
      $this->role = htmlspecialchars(strip_tags($this->role));
      $this->id = htmlspecialchars(strip_tags($this->id));
  
      // Bind data
      $stmt->bindParam(':nom', $this->nom);
      $stmt->bindParam(':prenom', $this->prenom);
      $stmt->bindParam(':token', $this->token);
      $stmt->bindParam(':role', $this->role);
      $stmt->bindParam(':id', $this->id);
  
      // Execute query
      if($stmt->execute()){
        return true;
      }
  
      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);
  
      return false;
    }

    //delete
    public function delete(){
      // Create query
      $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
  
      // Prepare statement
      $stmt = $this->conn->prepare($query);
  
      // Clean data
      $this->id = htmlspecialchars(strip_tags($this->id));
  
      // Bind data
      $stmt->bindParam(':id', $this->id);
  
      // Execute query
      if($stmt->execute()){
        return true;
      }
  
      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);
  
      return false;
    }

}

