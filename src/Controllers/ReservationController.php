<?php

namespace Ixsaiw\Bistro\Controllers;

class ReservationController
{
    public function index()
    {

        $heading = "reservation";
        require __DIR__ . '/../../views/reservation.view.php';
    }
}
