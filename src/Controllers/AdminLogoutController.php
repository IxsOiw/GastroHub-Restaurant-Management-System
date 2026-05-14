<?php

namespace Ixsaiw\Bistro\Controllers;

use Ixsaiw\Bistro\Helpers;

class AdminLogoutController
{
    public function index()
    {
        session_destroy();
        Helpers::redirect('/admin-login');
    }
}
