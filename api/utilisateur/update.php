<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Utilisateur.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $post = new Utilisateur($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to update
  $post->id = $data->id;

  $post->nom = $data->nom;
  $post->prenom = $data->prenom;
  $post->token = $data->token;
  $post->role = $data->role;

  // Update post
  if($post->update()) {
    echo json_encode(
      array('message' => 'Utilisateur Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'Utilisateur Not Updated')
    );
  }

