<?php

namespace Ixsaiw\Bistro\Controllers;

class AdminLogoutController
{
    public function index()
    {
        session_destroy();
        redirect('/admin-login');
    }
}
