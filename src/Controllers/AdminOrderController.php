<?php

namespace Ixsaiw\Bistro\Controllers;

use Ixsaiw\Bistro\Database;

class AdminOrderController
{
    protected Database $db;

    public function __construct($config)
    {
        $this->db = new Database($config['database']);
    }

    public function index()
    {
        if (empty($_SESSION['admin'])) {
            redirect('/admin-login');
        }

        $orders = $this->db->getAll(
            "SELECT o.order_id, o.created_at,
            c.name, c.phone, c.email,
            os.name AS status_name,
            GROUP_CONCAT(f.name ORDER BY f.name SEPARATOR ', ') AS items
     FROM orders o
     JOIN customer c ON o.customer_id = c.customer_id
     LEFT JOIN order_status_history osh ON osh.order_id = o.order_id
         AND osh.order_status_history_id = (
             SELECT MAX(order_status_history_id) 
             FROM order_status_history 
             WHERE order_id = o.order_id
         )
     LEFT JOIN order_status os ON os.order_status_id = osh.order_status_id
     LEFT JOIN order_food of2 ON of2.order_id = o.order_id
     LEFT JOIN food f ON f.food_id = of2.food_id
     GROUP BY o.order_id, o.created_at, c.name, c.phone, c.email, os.name
     ORDER BY o.created_at DESC"
        );

        require __DIR__ . '/../../views/admin.orders.view.php';
    }

    public function updateStatus()
    {
        if (empty($_SESSION['admin'])) {
            redirect('/admin-login');
        }

        $orderId  = $_POST['order_id'] ?? null;
        $statusId = $_POST['status_id'] ?? null;

        if ($orderId && $statusId) {
            $this->db->query(
                "INSERT INTO order_status_history (order_id, order_status_id) VALUES (?, ?)",
                [$orderId, $statusId]
            );
        }

        redirect('/admin/orders');
    }
}
