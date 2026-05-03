<?php

namespace Ixsaiw\Bistro\Controllers;

class AdminLoginController
{
    public function index()
    {
        $heading = "About";
        require __DIR__ . '/../../views/admin.login.view.php';
    }
}
