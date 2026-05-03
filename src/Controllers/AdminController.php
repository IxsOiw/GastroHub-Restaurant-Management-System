<?php

namespace Ixsaiw\Bistro\Controllers;

use Ixsaiw\Bistro\Database;

class AdminController
{
    protected Database $db;

    public function __construct($config)
    {
        $this->db = new Database($config['database']);
    }

    public function index()
    {

        if (empty($_SESSION['admin'])) {
            redirect('/admin-login');
        }

        $reservations = $this->db->getAll(
            "SELECT * FROM reservation ORDER BY date DESC, timing DESC LIMIT 5"
        );


        $heading = "Admin";
        require __DIR__ . '/../../views/admin.view.php';
    }
}
