<?php

namespace Ixsaiw\Bistro\Controllers;

class AboutController
{
    public function index()
    {
        $heading = "About";
        require __DIR__ . '/../../views/about.view.php';
    }
}
