<?php
class User {
    private $connection;
    private $table = "users";
    private $count = 0;

    public function __construct($connection)
    {   
        $this->connection = $connection;
    }

    public function addUser($name, $email, $phone, $message) {
        $stmt = $this->connection->prepare("INSERT INTO {$this->table} (name, email, phone, message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $phone, $message);
        return $stmt->execute();
    }

    public function getAllUsers() {
        $result = $this->connection->query("SELECT * FROM {$this->table}");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function existsByName($name) {
        $stmt = $this->connection->prepare("SELECT COUNT(*) FROM {$this->table} WHERE name = ?");
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $stmt->bind_result($this->count);
        $stmt->fetch();
        return $this->count > 0;
    }

}
?>