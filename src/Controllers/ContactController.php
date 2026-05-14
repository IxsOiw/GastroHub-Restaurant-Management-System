<?php

namespace Ixsaiw\Bistro\Controllers;

class ContactController extends BaseController
{
    public function index()
    {

        $heading = "Contact";
        require __DIR__ . '/../../views/contact.view.php';
    }
}
