<?php

namespace Ixsaiw\Bistro\Controllers;

use Ixsaiw\Bistro\Helpers;

class AdminLoginController extends BaseController
{
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            if ($email === $_ENV['ADMIN_EMAIL'] && password_verify($password, $_ENV['ADMIN_PASSWORD_HASH'])) {

                session_regenerate_id(true);
                $_SESSION['admin'] = true;
                Helpers::redirect('/admin');
            } else {
                $error = 'Nesprávne meno alebo heslo.';
            }
        }
        require __DIR__ . '/../../views/admin.login.view.php';
    }
}
