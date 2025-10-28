<?php
include '../../../config/cors.php';
include __DIR__ . '/../../../config/db.php';
include __DIR__ . '/../../../includes/helpers.php';
include __DIR__ . '/../../../includes/validation.php';
include __DIR__ . '/../../../models/User.php';


$data = json_decode(file_get_contents("php://input"), true);

$error = validateUserInput($data);
if ($error) jsonResponse(["success" => false, "error" => $error], 400);

$user = new User($connection);

if ($user->existsByName($data['name'])) {
    jsonResponse(["success" => false, "error" => "Name already exists"], 400);
}

if ($user->addUser($data['name'], $data['email'], $data['phone'], $data['message'])) {
    jsonResponse(["success" => true, "message" => "User created successfully"]);
} else {
    jsonResponse(["success" => false, "error" => "Failed to create user"], 500);
}

?>