<?php
require_once __DIR__ . '/../config/database.php';

class City {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM cities");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM cities WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($city) {
        $stmt = $this->db->prepare("INSERT INTO cities (city) VALUES (?)");
        return $stmt->execute([$city]);
    }

    public function update($id, $city) {
        $stmt = $this->db->prepare("UPDATE cities SET city = ? WHERE id = ?");
        return $stmt->execute([$city, $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM cities WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
