<?php
  class Produit {
    // DB stuff
    private $conn;
    private $table = 'produit';

    // Post Properties
    public $id;
    public $description;
    public $token;
    public $prix;
    public $stock;
    public $reference;
    public $created_at;
    public $updated_at;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Posts
    public function read() {
      // Create query
      $query = 'SELECT id, description, token, prix, stock, reference, created_at, updated_at
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

    // Create produit
    public function create() {
      // Create query
      $query = 'INSERT INTO ' . $this->table . ' SET description = :description, token = :token, prix = :prix, stock = :stock, reference = :reference';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Clean data
      $this->description = htmlspecialchars(strip_tags($this->description));
      $this->token = htmlspecialchars(strip_tags($this->token));
      $this->prix = htmlspecialchars(strip_tags($this->prix));
      $this->stock = htmlspecialchars(strip_tags($this->stock));
      $this->reference = htmlspecialchars(strip_tags($this->reference));
      
      // Bind data
      $stmt->bindParam(':description', $this->description);
      $stmt->bindParam(':token', $this->token);
      $stmt->bindParam(':prix', $this->prix);
      $stmt->bindParam(':stock', $this->stock);
      $stmt->bindParam(':reference', $this->reference);
      
      // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }
  
  // Update Category
  public function update() {
    // Create query
    $query = 'UPDATE ' . $this->table . '
    SET
      description = :description,
      token = :token,
      prix = :prix,
      stock = :stock,
      reference = :reference,
      updated_at = :updated_at
    WHERE
      token = :token';
    
      //Prepare statement
      $stmt = $this->conn->prepare($query);

      // Clean data
      $this->description = htmlspecialchars(strip_tags($this->description));
      $this->token = htmlspecialchars(strip_tags($this->token));
      $this->prix = htmlspecialchars(strip_tags($this->prix));
      $this->stock = htmlspecialchars(strip_tags($this->stock));
      $this->reference = htmlspecialchars(strip_tags($this->reference));
      $this->updated_at = htmlspecialchars(strip_tags($this->updated_at));
  
      // Bind data
      $stmt->bindParam(':description', $this->description);
      $stmt->bindParam(':token', $this->token);
      $stmt->bindParam(':prix', $this->prix);
      $stmt->bindParam(':stock', $this->stock);
      $stmt->bindParam(':reference', $this->reference);
      $stmt->bindParam(':updated_at', $this->updated_at);

    // Execute query
    if($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);

    return false;
  }

  // Delete Produit
  public function delete() {
    // Create query
    $query = 'DELETE FROM ' . $this->table . ' WHERE token = :token';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->token = htmlspecialchars(strip_tags($this->token));

    // Bind data
    $stmt->bindParam(':token', $this->token);

    // Execute query
    if($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);

    return false;
  }

}