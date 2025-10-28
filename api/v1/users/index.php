<?php
include "../../../config/cors.php";
include __DIR__ . "/../../../config/db.php";
include __DIR__ . '/../../../includes/helpers.php';
include __DIR__ . '/../../../models/User.php';

$user = new User($connection);
$data = $user->getAllUsers();
jsonResponse($data)
?>