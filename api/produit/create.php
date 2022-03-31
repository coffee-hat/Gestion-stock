<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
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

  $produit->description = $data->description;
  $produit->token = randomToken();
  $produit->prix = $data->prix;
  $produit->stock = $data->stock;
  $produit->reference = $data->reference;

  // Create Category
  if($produit->create()) {
    echo json_encode(
      array('message' => 'Produit Created')
    );
  } else {
    echo json_encode(
      array('message' => 'Produit Not Created')
    );
  }

  function randomToken() {
    $string = "";
    $chaine = 
    "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
    srand ( ( double ) microtime () * 1000000 );
    for($i = 0; $i < 10; $i ++) {
    $string .= $chaine [rand () % strlen ( $chaine )];
    }
     return $string;
     }
