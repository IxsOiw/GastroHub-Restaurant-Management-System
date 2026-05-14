<?php

namespace Ixsaiw\Bistro\Controllers;

use Ixsaiw\Bistro\Database;

abstract class BaseController
{
    protected Database $db;

    public function __construct(array $config)
    {
        $this->db = new Database($config['database']);
    }
}
