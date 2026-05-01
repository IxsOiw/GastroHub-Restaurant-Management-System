<?php

namespace Ixsaiw\Bistro\Controllers;

use Ixsaiw\Bistro\Database;

class ReservationController
{
    protected $db;

    public function __construct($config)
    {
        $this->db = new Database($config['database']);
    }

    public function index()
    {
        $heading = "reservation";

        $name = '';
        $phone = '';
        $email = '';
        $timing = '';
        $date = '';
        $people = '';

        $errors = [];

        if (\isPostRequest()) {
            $name = trim($_POST['name'] ?? '');
            $phone = trim($_POST['phone'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $date = trim($_POST['date'] ?? '');
            $timing = trim($_POST['timing'] ?? '');
            $people = trim($_POST['people'] ?? '');

            if (
                $name === '' ||
                $phone === '' ||
                $email === '' ||
                $date === '' ||
                $timing === '' ||
                $people === ''
            ) {
                echo " <h1>Všetky polia sú povinné. </h1>";
            }

            if (empty($errors)) {
                echo " <h1> Rezervácia bola úspešne odoslaná.</h1>";

                $this->db->query(
                    "INSERT INTO reservation (name, phone, email, timing, people, date) VALUES (?, ?, ?, ?, ?, ?)",
                    [$name, $phone, $email, $timing, $people ,$date]
                );
            }
        }

        require __DIR__ . '/../../views/reservation.view.php';
    }
}
