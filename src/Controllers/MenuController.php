<?php

namespace Ixsaiw\Bistro\Controllers;

class MenuController
{
    public function index()
    {

        $heading = "Menu";
        require __DIR__ . '/../../views/menu.view.php';
    }

}
