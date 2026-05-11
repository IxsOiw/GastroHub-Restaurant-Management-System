<?php

namespace Ixsaiw\Bistro\Controllers;

use Ixsaiw\Bistro\Database;

class MenuAdminController
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

        $items = $this->db->getAll("SELECT * FROM menu_items ORDER BY category, name");
        require __DIR__ . '/../../views/admin.menu.view.php';
    }

    public function create()
    {
        if (empty($_SESSION['admin'])) {
            redirect('/admin-login');
        }
        require __DIR__ . '/../../views/admin.menu.form.view.php';
    }

    public function store()
    {
        if (empty($_SESSION['admin'])) {
            redirect('/admin-login');
        }

        $name        = sanitize($_POST['name'] ?? '');
        $description = sanitize($_POST['description'] ?? '');
        $price       = (float) ($_POST['price'] ?? 0);
        $category    = sanitize($_POST['category'] ?? '');
        $available   = isset($_POST['available']) ? 1 : 0;

        $this->db->query(
            "INSERT INTO menu_items (name, description, price, category, available) VALUES (?, ?, ?, ?, ?)",
            [$name, $description, $price, $category, $available]
        );

        redirect('/admin/menu');
    }

    public function edit()
    {
        if (empty($_SESSION['admin'])) {
            redirect('/admin-login');
        }

        $id   = $_GET['id'] ?? null;
        if (!$id) {
            redirect('/admin/menu');
        }

        $item = $this->db->get("SELECT * FROM menu_items WHERE id = ?", [$id]);
        require __DIR__ . '/../../views/admin.menu.form.view.php';
    }

    public function update()
    {
        if (empty($_SESSION['admin'])) {
            redirect('/admin-login');
        }

        $id          = $_POST['id'] ?? null;
        $name        = sanitize($_POST['name'] ?? '');
        $description = sanitize($_POST['description'] ?? '');
        $price       = (float) ($_POST['price'] ?? 0);
        $category    = sanitize($_POST['category'] ?? '');
        $available   = isset($_POST['available']) ? 1 : 0;

        $this->db->query(
            "UPDATE menu_items SET name=?, description=?, price=?, category=?, available=? WHERE id=?",
            [$name, $description, $price, $category, $available, $id]
        );

        redirect('/admin/menu');
    }

    public function destroy()
    {
        if (empty($_SESSION['admin'])) {
            redirect('/admin-login');
        }

        $id = $_POST['id'] ?? null;
        if ($id) {
            $this->db->query("DELETE FROM menu_items WHERE id = ?", [$id]);
        }

        redirect('/admin/menu');
    }
}
