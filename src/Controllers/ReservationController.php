<?php

namespace Ixsaiw\Bistro\Controllers;

use Ixsaiw\Bistro\Helpers;

class ReservationController extends BaseController
{
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

        if (Helpers::isPostRequest()) {
            $name = Helpers::sanitize($_POST['name'] ?? '');
            $phone = Helpers::sanitize($_POST['phone'] ?? '');
            $email = Helpers::sanitize($_POST['email'] ?? '');
            $date = Helpers::sanitize($_POST['date'] ?? '');
            $time = Helpers::sanitize($_POST['time'] ?? '');
            $guests = Helpers::sanitize($_POST['guests'] ?? '');
            $note    = Helpers::sanitize($_POST['note']      ?? '');
            $tableId = Helpers::sanitize($_POST['table_id']  ?? '');

            if ($name === '') {
                $errors[] = 'Name is required.';
            }
            if ($phone === '') {
                $errors[] = 'Phone is required.';
            }
            if ($email === '') {
                $errors[] = 'Email is required.';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Invalid email format.';
            }
            if ($date === '') {
                $errors[] = 'Date is required.';
            } elseif ($date < date('Y-m-d')) {
                $errors[] = 'Date cannot be in the past.';
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
