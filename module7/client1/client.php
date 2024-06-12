<?php
include 'db.php';

class Client {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAllClients() {
        $sql = "SELECT * FROM clients";
        return $this->conn->query($sql);
    }

    public function addClient($name, $email, $phone, $address) {
        $stmt = $this->conn->prepare("INSERT INTO clients (name, email, phone, address) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $phone, $address);
        return $stmt->execute();
    }

    public function getClient($id) {
        $stmt = $this->conn->prepare("SELECT * FROM clients WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function updateClient($id, $name, $email, $phone, $address) {
        $stmt = $this->conn->prepare("UPDATE clients SET name=?, email=?, phone=?, address=? WHERE id=?");
        $stmt->bind_param("ssssi", $name, $email, $phone, $address, $id);
        return $stmt->execute();
    }

    public function deleteClient($id) {
        $stmt = $this->conn->prepare("DELETE FROM clients WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
