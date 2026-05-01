<?php

namespace Ixsaiw\Bistro\Controllers;

class ContactController
{
    public function index()
    {

        $heading = "Contact";
        require __DIR__ . '/../../views/contact.view.php';
    }
}
