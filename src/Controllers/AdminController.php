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

        $yesterdayReservations = $this->db->get(
            "SELECT COUNT(*) AS pocet 
            FROM reservation 
            WHERE DATE(date) = CURDATE() - INTERVAL 1 DAY"
        );

        $menuItemsCount = $this->db->get(
            "SELECT COUNT(*) AS pocet FROM food"
        );

        $items = $this->db->getAll(
            "SELECT f.*, fc.name AS category_name 
            FROM food f
            LEFT JOIN food_category fc ON f.food_category_id = fc.food_category_id
            ORDER BY fc.name, f.name 
            LIMIT 10"
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
}
