<?php

use Ixsaiw\Bistro\Controllers\HomeController;
use Ixsaiw\Bistro\Controllers\AboutController;
use Ixsaiw\Bistro\Controllers\MenuController;
use Ixsaiw\Bistro\Controllers\ReservationController;
use Ixsaiw\Bistro\Controllers\ContactController;
use Ixsaiw\Bistro\Controllers\AdminController;
use Ixsaiw\Bistro\Controllers\AdminLoginController;
use Ixsaiw\Bistro\Controllers\AdminLogoutController;
use Ixsaiw\Bistro\Controllers\MenuAdminController;
use Ixsaiw\Bistro\Controllers\OrderController;

return [

    '' =>  [HomeController::class, 'index'],
    '/about' =>  [AboutController::class, 'index'],
    '/menu' => [MenuController::class, 'index'],
    '/reservation' =>  [ReservationController::class, 'index'],
    '/contact' =>  [ContactController::class, 'index'],

    '/admin' => [AdminController::class, 'index'],
    '/admin/reservation/status' => [AdminController::class, 'updateStatus'],
    '/admin/reservation/delete' => [AdminController::class, 'deleteReservation'],
    '/admin/menu'         => [MenuAdminController::class, 'index'],
    '/admin/menu/create'  => [MenuAdminController::class, 'create'],
    '/admin/menu/store'   => [MenuAdminController::class, 'store'],
    '/admin/menu/edit'    => [MenuAdminController::class, 'edit'],
    '/admin/menu/update'  => [MenuAdminController::class, 'update'],
    '/admin/menu/delete'  => [MenuAdminController::class, 'destroy'],
    '/admin-login' => [AdminLoginController::class, 'index'],
    '/admin-logout' => [AdminLogoutController::class, 'index'],

    '/menu/coffee'    => [MenuController::class, 'category'],
    '/menu/lunch'     => [MenuController::class, 'category'],
    '/menu/dinner'    => [MenuController::class, 'category'],
    '/menu/breakfast' => [MenuController::class, 'category'],
    '/menu/drinks'    => [MenuController::class, 'category'],
    '/menu/desserts'  => [MenuController::class, 'category'],

    '/order'       => [OrderController::class, 'index'],
    '/order/store' => [OrderController::class, 'store'],

];
