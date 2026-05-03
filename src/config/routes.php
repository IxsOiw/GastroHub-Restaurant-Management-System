<?php

use Ixsaiw\Bistro\Controllers\HomeController;
use Ixsaiw\Bistro\Controllers\AboutController;
use Ixsaiw\Bistro\Controllers\MenuController;
use Ixsaiw\Bistro\Controllers\ReservationController;
use Ixsaiw\Bistro\Controllers\ContactController;
use Ixsaiw\Bistro\Controllers\AdminController;
use Ixsaiw\Bistro\Controllers\AdminLoginController;

return [

    '' =>  HomeController::class,
    '/about' =>  AboutController::class,
    '/menu' => MenuController::class,
    '/reservation' =>  ReservationController::class,
    '/contact' =>  ContactController::class,
    '/admin' => AdminController::class,
    '/login/admin' => AdminLoginController::class,

];
