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

    public function addClient($first_name, $last_name, $middle_initials, $gender, $email, $phone, $address) {
        $stmt = $this->conn->prepare("INSERT INTO clients (first_name, last_name, middle_initials, gender, email, phone, address) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $first_name, $last_name, $middle_initials, $gender, $email, $phone, $address);
        return $stmt->execute();
    }

    public function getClient($id) {
        $stmt = $this->conn->prepare("SELECT * FROM clients WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function updateClient($id, $first_name, $last_name, $middle_initials, $gender, $email, $phone, $address) {
        $stmt = $this->conn->prepare("UPDATE clients SET first_name=?, last_name=?, middle_initials=?, gender=?, email=?, phone=?, address=? WHERE id=?");
        $stmt->bind_param("sssssssi", $first_name, $last_name, $middle_initials, $gender, $email, $phone, $address, $id);
        return $stmt->execute();
    }

    public function deleteClient($id) {
        $stmt = $this->conn->prepare("DELETE FROM clients WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
