<?php

namespace Ixsaiw\Bistro\Controllers;

class AdminController
{
    public function index()
    {
        $heading = "About";
        require __DIR__ . '/../../views/admin.view.php';
    }
}
