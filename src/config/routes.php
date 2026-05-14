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
use Ixsaiw\Bistro\Controllers\AdminOrderController;

return [

  '' => [ 'GET' => [HomeController::class, 'index'],  ],

  '/about' => [ 'GET' => [AboutController::class, 'index'],  ],

  '/menu' =>           [  'GET' => [MenuController::class, 'index'],    ],
  '/menu/coffee'    => [  'GET' => [MenuController::class, 'category'], ],
  '/menu/lunch'     => [  'GET' => [MenuController::class, 'category'], ],
  '/menu/dinner'    => [  'GET' => [MenuController::class, 'category'], ],
  '/menu/breakfast' => [  'GET' => [MenuController::class, 'category'], ],
  '/menu/drinks'    => [  'GET' => [MenuController::class, 'category'], ],
  '/menu/desserts'  => [  'GET' => [MenuController::class, 'category'], ],

  '/reservation' => [ 'GET' => [ReservationController::class, 'index'],
                      'POST' => [ReservationController::class, 'index'],],

  '/contact' => [ 'GET' => [ContactController::class, 'index'], ],

  '/order'       => [ 'GET' => [OrderController::class, 'index'], ],
  '/order/store' => [ 'POST' => [OrderController::class, 'store'],  ],


  '/admin' => [ 'GET' => [AdminController::class, 'index'], ],

  '/admin/reservation/status' => [  'POST' => [AdminController::class, 'updateStatus'],],
  '/admin/reservation/delete' => [  'POST' => [AdminController::class, 'deleteReservation'],],

  '/admin/menu'         => ['GET' => [MenuAdminController::class, 'index'],],
  '/admin/menu/create'  => ['GET' => [MenuAdminController::class, 'create'],],
  '/admin/menu/store'   => ['POST' => [MenuAdminController::class, 'store'],],
  '/admin/menu/edit'    => ['GET' => [MenuAdminController::class, 'edit'],],
  '/admin/menu/update'  => ['POST' => [MenuAdminController::class, 'update'],],
  '/admin/menu/delete'  => ['POST' => [MenuAdminController::class, 'destroy'],],

  '/admin/orders'               => ['GET' => [AdminOrderController::class, 'index'],],
  '/admin/orders/update-status' => ['POST' => [AdminOrderController::class, 'updateStatus'],],

  '/admin-login' => ['GET' => [AdminLoginController::class, 'index'],
                      'POST' => [AdminLoginController::class, 'index'],],
  '/admin-logout' => [ 'GET' => [AdminLogoutController::class, 'index'],],



];
