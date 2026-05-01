<?php

namespace Ixsaiw\Bistro\Controllers;

class ReservationController
{
    public function index()
    {
        $heading = "reservation";

        $name = '';
        $phone = '';
        $email = '';
        $timings = '';
        $date = '';
        $people = '';

        $succes = '';
        $error = [];

        if (isPostRequest()) {
            $name = trim($_POST['name'] ?? '');
            $phone = trim($_POST['phone'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $timings = trim($_POST['timings'] ?? '');
            $date = trim($_POST['date'] ?? '');
            $people = trim($_POST['people'] ?? '');

            if (
                $name === '' ||
                $phone === '' ||
                $email === '' ||
                $timings === '' ||
                $date === '' ||
                $people === ''
            ) {
                echo " <h1>Všetky polia sú povinné. </h1>";
            }

            if (empty($errors)) {
                echo " <h1> Rezervácia bola úspešne odoslaná.</h1>";
            }
        }

        require __DIR__ . '/../../views/reservation.view.php';
    }
}
