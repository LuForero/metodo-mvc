<?php
require_once __DIR__ . '/../models/City.php';

session_start();
if (!isset($_SESSION['user'])) {
    header('Location: index.php?controller=auth&action=login');
    exit;
}


class CityController {
    private $cityModel;

    public function __construct() {
        $this->cityModel = new City();
    }

    public function index() {
        $cities = $this->cityModel->getAll();
        require __DIR__ . '/../views/city/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $city = $_POST['city'] ?? '';
            if (!empty($city)) {
                $this->cityModel->create($city);
                header('Location: index.php?controller=city&action=index');
                exit;
            }
        }
        require __DIR__ . '/../views/city/create.php';
    }

    public function edit() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: index.php?controller=city&action=index');
            exit;
        }

        $city = $this->cityModel->find($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $updatedCity = $_POST['city'] ?? '';
            if (!empty($updatedCity)) {
                $this->cityModel->update($id, $updatedCity);
                header('Location: index.php?controller=city&action=index');
                exit;
            }
        }

        require __DIR__ . '/../views/city/edit.php';
    }

    public function delete() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->cityModel->delete($id);
        }
        header('Location: index.php?controller=city&action=index');
        exit;
    }
}
