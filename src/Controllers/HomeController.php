<?php

namespace Ixsaiw\Bistro\Controllers;

class HomeController
{
    public function index()
    {

        $heading = "Home";
        require __DIR__ . '/../../views/index.view.php';
    }

}
