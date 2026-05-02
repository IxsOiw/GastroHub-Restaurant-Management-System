<?php

use Ixsaiw\Bistro\Controllers\HomeController;
use Ixsaiw\Bistro\Controllers\AboutController;
use Ixsaiw\Bistro\Controllers\MenuController;
use Ixsaiw\Bistro\Controllers\ReservationController;
use Ixsaiw\Bistro\Controllers\ContactController;

return [

    '' =>  HomeController::class,
    '/about' =>  AboutController::class,
    '/menu' => MenuController::class,
    '/reservation' =>  ReservationController::class,
    '/contact' =>  ContactController::class,

];
