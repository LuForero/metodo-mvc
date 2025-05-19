<?php
require_once __DIR__ . '/../models/User.php';

class AuthController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $userModel = new User();
            $user = $userModel->findByEmail($email);

            if ($user && $user['password'] === $password) { // Solo para ejemplo, usa password_hash en producción
                session_start();
                $_SESSION['user'] = $user;
                header('Location: index.php?controller=user&action=index');
                exit;
            } else {
                $error = "Correo o contraseña incorrectos";
            }
        }

        require __DIR__ . '/../views/auth/login.php';
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: index.php?controller=auth&action=login');
        exit;
    }
}
