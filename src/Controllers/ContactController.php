<?php

namespace Ixsaiw\Bistro\Controllers;

use Ixsaiw\Bistro\Helpers;

class ContactController extends BaseController
{
    public function index()
    {

        $heading = "Contact";
        require __DIR__ . '/../../views/contact.view.php';
    }
    public function store()
    {
        $name    = Helpers::sanitize($_POST['name']    ?? '');
        $email   = Helpers::sanitize($_POST['email']   ?? '');
        $message = Helpers::sanitize($_POST['message'] ?? '');

        if ($name && $email && $message) {
            $this->db->query(
                "INSERT INTO message (name, email, message) VALUES (?, ?, ?)",
                [$name, $email, $message]
            );
        }
        Helpers::redirect('/contact');
    }
}
