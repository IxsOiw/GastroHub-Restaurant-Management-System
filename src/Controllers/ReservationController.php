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
        $errors = [];

        $tables = $this->db->getAll("SELECT * FROM restaurant_table ORDER BY name");

        $name = '';
        $phone = '';
        $email = '';
        $time = '';
        $date = '';
        $guests = '';
        $note = '';
        $tableId = '';

        if (isPostRequest()) {
            $name = sanitize($_POST['name'] ?? '');
            $phone = sanitize($_POST['phone'] ?? '');
            $email = sanitize($_POST['email'] ?? '');
            $date = sanitize($_POST['date'] ?? '');
            $time = sanitize($_POST['time'] ?? '');
            $guests = sanitize($_POST['guests'] ?? '');
            $note    = sanitize($_POST['note']      ?? '');
            $tableId = sanitize($_POST['table_id']  ?? '');

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
            if ($time === '') {
                $errors[] = 'Time is required.';
            }
            if ($guests  === '') {
                $errors[] = 'Number of guests is required.';
            }
            if ($tableId === '') {
                $errors[] = 'Table is required.';
            }

            if (empty($errors)) {
                $this->db->query(
                    "INSERT INTO customer (name, phone, email) VALUES (?, ?, ?)",
                    [$name, $phone, $email]
                );
                $customerId = $this->db->lastInsertId();

                $this->db->query(
                    "INSERT INTO reservation (customer_id, table_id, date, time, number_of_guests, note) 
                     VALUES (?, ?, ?, ?, ?, ?)",
                    [$customerId, $tableId, $date, $time, $guests, $note]
                );

                header('Location: /reservation?success=1');
                exit;
            }
        }

        require __DIR__ . '/../../views/reservation.view.php';
    }
}
