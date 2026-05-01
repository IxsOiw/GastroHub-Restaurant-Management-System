<?php

namespace Ixsaiw\Bistro\Controllers;

use Ixsaiw\Bistro\Database;

class HomeController
{
    protected $db;

    public function __construct($config)
    {
        $this->db = new Database($config['database']);
    }

    public function index()
    {
        $heading = "Home";
        require __DIR__ . '/../../views/index.view.php';
    }

}
