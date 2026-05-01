<?php

use Ixsaiw\Bistro\Controllers\HomeController;
use Ixsaiw\Bistro\Controllers\ReservationController;

return [

    '' =>  \Ixsaiw\Bistro\Controllers\HomeController::class,
    '/about' =>  \Ixsaiw\Bistro\Controllers\AboutController::class,
    '/menu' => \Ixsaiw\Bistro\Controllers\MenuController::class,
    '/reservation' =>  \Ixsaiw\Bistro\Controllers\ReservationController::class,
    '/contact' =>  \Ixsaiw\Bistro\Controllers\ContactController::class,

];
