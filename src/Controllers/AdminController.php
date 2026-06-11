<?php

namespace Ixsaiw\Bistro\Controllers;

use Ixsaiw\Bistro\Helpers;

class AdminController extends BaseController
{
    public function index()
    {

        if (empty($_SESSION['admin'])) {
            Helpers::redirect('/admin-login');
        }

        $reservations = $this->db->getAll(
            "SELECT r.*, c.name, c.phone, c.email, rt.name AS table_name
            FROM reservation r
            JOIN customer c ON r.customer_id = c.customer_id
            JOIN restaurant_table rt ON r.table_id = rt.table_id
            ORDER BY r.created_at DESC
            LIMIT 5"
        );

        $todayReservations = $this->db->get(
            "SELECT COUNT(*) AS pocet 
            FROM reservation 
              WHERE DATE(created_at) = CURDATE()"
        );

        $pendingReservations = $this->db->get(
            "SELECT COUNT(*) AS pocet FROM reservation WHERE reservation_status_id = 1"
        );

        $yesterdayReservations = $this->db->get(
            "SELECT COUNT(*) AS pocet 
            FROM reservation 
            WHERE DATE(date) = CURDATE() - INTERVAL 1 DAY"
        );

        $menuItemsCount = $this->db->get(
            "SELECT COUNT(*) AS pocet FROM food WHERE available = 1"
        );

        $items = $this->db->getAll(
            "SELECT f.*, fc.name AS category_name 
            FROM food f
            LEFT JOIN food_category fc ON f.food_category_id = fc.food_category_id
            WHERE f.available = 1
            ORDER BY fc.name, f.name 
            LIMIT 10"
        );

        $messages = $this->db->getAll(
            "SELECT * FROM message ORDER BY created_at DESC LIMIT 5"
        );

        $unreadMessages = $this->db->get(
            "SELECT COUNT(*) AS pocet FROM message WHERE is_read = 0"
        );

        $heading = "Admin";
        require __DIR__ . '/../../views/admin.view.php';
    }
    public function updateStatus()
    {
        if (empty($_SESSION['admin'])) {
            Helpers::redirect('/admin-login');
        }

        $id = $_POST['id'] ?? null;
        $status = $_POST['status'] ?? null;

        if ($id === null || $status === null) {
            Helpers::redirect('/admin');
        }

        $this->db->query(
            "UPDATE reservation SET reservation_status_id = ? WHERE reservation_id = ?",
            [$status, $id]
        );

        Helpers::redirect('/admin');
    }
    public function deleteReservation()
    {
        if (empty($_SESSION['admin'])) {
            Helpers::redirect('/admin');
        }

        $id = $_POST['id'] ?? null;

        if ($id === null) {
            Helpers::redirect('/admin');
        }

        $this->db->query(
            "DELETE FROM reservation WHERE reservation_id = ?",
            [$id]
        );

        Helpers::redirect('/admin');
    }
    public function createReservation()
    {
        if (empty($_SESSION['admin'])) {
            Helpers::redirect('/admin-login');
        }

        $tables = $this->db->getAll("SELECT * FROM restaurant_table ORDER BY name");

        require __DIR__ . '/../../views/admin.reservation.form.view.php';
    }
    public function storeReservation()
    {
        if (empty($_SESSION['admin'])) {
            Helpers::redirect('/admin-login');
        }

        $name    = Helpers::sanitize($_POST['name']    ?? '');
        $phone   = Helpers::sanitize($_POST['phone']   ?? '');
        $email   = Helpers::sanitize($_POST['email']   ?? '');
        $date    = Helpers::sanitize($_POST['date']    ?? '');
        $time    = Helpers::sanitize($_POST['time']    ?? '');
        $guests  = Helpers::sanitize($_POST['guests']  ?? '');
        $tableId = Helpers::sanitize($_POST['table_id'] ?? '');
        $note    = Helpers::sanitize($_POST['note']    ?? '');

        $this->db->query(
            "INSERT INTO customer (name, phone, email) VALUES (?, ?, ?)",
            [$name, $phone, $email]
        );
        $customerId = $this->db->lastInsertId();

        $this->db->query(
            "INSERT INTO reservation (customer_id, table_id, date, time, number_of_guests, note) VALUES (?, ?, ?, ?, ?, ?)",
            [$customerId, $tableId, $date, $time, $guests, $note]
        );

        Helpers::redirect('/admin');
    }
    public function editReservation()
    {
        if (empty($_SESSION['admin'])) {
            Helpers::redirect('/admin-login');
        }

        $id = $_GET['id'] ?? null;
        if (!$id) {
            Helpers::redirect('/admin');
        }

        $reservation = $this->db->get(
            "SELECT r.*, c.name, c.phone, c.email 
         FROM reservation r
         JOIN customer c ON r.customer_id = c.customer_id
         WHERE r.reservation_id = ?",
            [$id]
        );

        $tables = $this->db->getAll("SELECT * FROM restaurant_table ORDER BY name");

        require __DIR__ . '/../../views/admin.reservation.form.view.php';
    }

    public function updateReservation()
    {
        if (empty($_SESSION['admin'])) {
            Helpers::redirect('/admin-login');
        }

        $id      = $_POST['id']       ?? null;
        $name    = Helpers::sanitize($_POST['name']     ?? '');
        $phone   = Helpers::sanitize($_POST['phone']    ?? '');
        $email   = Helpers::sanitize($_POST['email']    ?? '');
        $date    = Helpers::sanitize($_POST['date']     ?? '');
        $time    = Helpers::sanitize($_POST['time']     ?? '');
        $guests  = Helpers::sanitize($_POST['guests']   ?? '');
        $tableId = Helpers::sanitize($_POST['table_id'] ?? '');
        $note    = Helpers::sanitize($_POST['note']     ?? '');

        $reservation = $this->db->get(
            "SELECT customer_id FROM reservation WHERE reservation_id = ?",
            [$id]
        );

        $this->db->query(
            "UPDATE customer SET name=?, phone=?, email=? WHERE customer_id=?",
            [$name, $phone, $email, $reservation['customer_id']]
        );

        $this->db->query(
            "UPDATE reservation SET table_id=?, date=?, time=?, number_of_guests=?, note=? WHERE reservation_id=?",
            [$tableId, $date, $time, $guests, $note, $id]
        );

        Helpers::redirect('/admin');
    }

    public function deleteMessage()
    {
        $id = (int)($_POST['id'] ?? 0);
        if ($id > 0) {
            $this->db->query("DELETE FROM message WHERE message_id = ?", [$id]);
        }
        Helpers::redirect('/admin');
    }
}
