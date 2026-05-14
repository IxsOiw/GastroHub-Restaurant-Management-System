<?php

namespace Ixsaiw\Bistro\Controllers;

class AdminLoginController
{
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            if ($email === 'admin@bistro.sk' && password_verify($password, $_ENV['ADMIN_PASSWORD_HASH'])) {

                $_SESSION['admin'] = true;
                redirect('/admin');
            } else {
                $error = 'Nesprávne meno alebo heslo.';
            }
        }
        require __DIR__ . '/../../views/admin.login.view.php';
    }
}
