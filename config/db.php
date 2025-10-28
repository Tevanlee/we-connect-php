<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$host = $_ENV['DB_HOST'] ?: 'db';
$user = $_ENV['DB_USER'] ?: 'root';
$password = $_ENV['DB_PASS'] ?: 'root';
$db_name = $_ENV['DB_NAME'] ?: 'we_connect_db';

$connection = new mysqli($host, $user, $password, $db_name);

if($connection->connect_error) {
    error_log("DB connection failed", $connection->connect_error);
    http_response_code(500);
    echo json_encode(["success" => false, "error" => "Database connection failed"]);
    exit;
}
?>