<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Produit.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate category object
  $category = new Produit($db);

  // Category read query
  $result = $category->read();
  
  // Get row count
  $num = $result->rowCount();

  // Check if any categories
  if($num > 0) {
        // Cat array
        $produit_arr = array();
        $produit_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
          extract($row);

          $produit_item = array(
            'id' => $id,
            'description' => $description,
            'token' => $token,
            'prix' => $prix,
            'stock' => $stock,
            'reference' => $reference,
            'created_at' => $created_at,
            'updated_at' => $updated_at
          );

          // Push to "data"
          array_push($produit_arr['data'], $produit_item);
        }

        // Turn to JSON & output
        echo json_encode($produit_arr);

  } else {
        // No Categories
        echo json_encode(
          array('message' => 'No Produit Found')
        );
  }
