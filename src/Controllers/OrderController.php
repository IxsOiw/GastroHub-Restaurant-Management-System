<?php

namespace Ixsaiw\Bistro\Controllers;

use Ixsaiw\Bistro\Helpers;

class OrderController extends BaseController
{
    public function index()
    {
        $foods = $this->db->getAll(
            "SELECT f.*, fc.name AS category_name 
             FROM food f
             LEFT JOIN food_category fc ON f.food_category_id = fc.food_category_id
             WHERE f.available = 1
             ORDER BY fc.name, f.name"
        );

        $categories = $this->db->getAll(
            "SELECT * FROM food_category ORDER BY name"
        );

        $heading = "Order";
        require __DIR__ . '/../../views/order.view.php';
    }

    public function store()
    {
        $name    = Helpers::sanitize($_POST['name']  ?? '');
        $phone   = Helpers::sanitize($_POST['phone'] ?? '');
        $email   = Helpers::sanitize($_POST['email'] ?? '');
        $items   = $_POST['items']          ?? [];

        $errors = [];

        if ($name  === '') {
            $errors[] = 'Name is required.';
        }
        if ($phone === '') {
            $errors[] = 'Phone is required.';
        }
        if ($email === '') {
            $errors[] = 'Email is required.';
        }
        if (empty($items)) {
            $errors[] = 'Please select at least one item.';
        }

        if (!empty($errors)) {
            $foods = $this->db->getAll(
                "SELECT f.*, fc.name AS category_name 
                 FROM food f
                 LEFT JOIN food_category fc ON f.food_category_id = fc.food_category_id
                 WHERE f.available = 1
                 ORDER BY fc.name, f.name"
            );
            $categories = $this->db->getAll("SELECT * FROM food_category ORDER BY name");
            $heading = "Order";
            require __DIR__ . '/../../views/order.view.php';
            return;
        }

        $this->db->query(
            "INSERT INTO customer (name, phone, email) VALUES (?, ?, ?)",
            [$name, $phone, $email]
        );
        $customerId = $this->db->lastInsertId();

        $this->db->query(
            "INSERT INTO orders (customer_id) VALUES (?)",
            [$customerId]
        );
        $orderId = $this->db->lastInsertId();

        $this->db->query(
            "INSERT INTO order_status_history (order_id, order_status_id) VALUES (?, 1)",
            [$orderId]
        );

        foreach ($items as $foodId => $quantity) {
            $quantity = (int) $quantity;
            if ($quantity <= 0) {
                continue;
            }

            $food = $this->db->get(
                "SELECT price FROM food WHERE food_id = ?",
                [$foodId]
            );

            if (!$food) {
                continue;
            }

            $this->db->query(
                "INSERT INTO order_food (order_id, food_id, quantity, price_at_order_time) VALUES (?, ?, ?, ?)",
                [$orderId, $foodId, $quantity, $food['price']]
            );
        }

        header('Location: /order?success=1');
        exit;
    }
}
