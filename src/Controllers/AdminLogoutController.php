<?php

namespace Ixsaiw\Bistro\Controllers;

class AdminLogoutController
{
    public function index()
    {
        $_SESSION['admin'] = false;
        redirect('/admin-login');
    }
}
