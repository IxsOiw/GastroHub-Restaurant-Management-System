<?php

namespace Ixsaiw\Bistro\Controllers;

use Ixsaiw\Bistro\Database;

class ReservationController
{
    protected Database $db;

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

        if (isPostRequest()) {
            $name = sanitize($_POST['name'] ?? '');
            $phone = sanitize($_POST['phone'] ?? '');
            $email = sanitize($_POST['email'] ?? '');
            $date = sanitize($_POST['date'] ?? '');
            $timing = sanitize($_POST['timing'] ?? '');
            $people = sanitize($_POST['people'] ?? '');

            if ($name === '') {
                $errors[] = 'Name is required.';
            }
            if ($phone === '') {
                $errors[] = 'Phone is required.';
            }
            if ($email === '') {
                $errors[] = 'Email is required.';
            }
            if ($date === '') {
                $errors[] = 'Date is required.';
            }
            if ($timing === '') {
                $errors[] = 'Time is required.';
            }
            if ($people === '') {
                $errors[] = 'Number of guests is required.';
            }

            if (empty($errors)) {
                $this->db->query(
                    "INSERT INTO reservation (name, phone, email, timing, people, date) VALUES (?, ?, ?, ?, ?, ?)",
                    [$name, $phone, $email, $timing, $people ,$date]
                );
                header('Location: /reservation?success=1');
                exit;
            }
        }

        require __DIR__ . '/../../views/reservation.view.php';
    }
}
