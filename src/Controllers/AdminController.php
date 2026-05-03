<?php

namespace Ixsaiw\Bistro\Controllers;

class AdminController
{
    public function index()
    {
        if (empty($_SESSION['admin'])) {
            redirect('/admin-login');
        }
        $heading = "Admin";
        require __DIR__ . '/../../views/admin.view.php';
    }
}
