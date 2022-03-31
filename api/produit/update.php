<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Produit.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $produit = new Produit($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to UPDATE
  $produit->id = $data->id;
  $produit->description = $data->description;
  $produit->token = $data->token;
  $produit->prix = $data->prix;
  $produit->stock = $data->stock;
  $produit->reference = $data->reference;

  // Update post
  if($produit->update()) {
    echo json_encode(
      array('message' => 'Produit Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'Produit not updated')
    );
  }
