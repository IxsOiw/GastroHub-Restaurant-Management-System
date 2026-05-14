<?php

namespace Ixsaiw\Bistro\Controllers;

use Ixsaiw\Bistro\Helpers;

class MenuAdminController extends BaseController
{
    public function index()
    {
        if (empty($_SESSION['admin'])) {
            Helpers::redirect('/admin-login');
        }

        $items = $this->db->getAll(
            "SELECT f.*, fc.name AS category_name 
             FROM food f
             LEFT JOIN food_category fc ON f.food_category_id = fc.food_category_id
             ORDER BY fc.name, f.name"
        );

        require __DIR__ . '/../../views/admin.menu.view.php';
    }

    public function create()
    {
        if (empty($_SESSION['admin'])) {
            Helpers::redirect('/admin-login');
        }

        $categories = $this->db->getAll("SELECT * FROM food_category ORDER BY name");
        require __DIR__ . '/../../views/admin.menu.form.view.php';
    }

    public function store()
    {
        if (empty($_SESSION['admin'])) {
            Helpers::redirect('/admin-login');
        }

        $name        = Helpers::sanitize($_POST['name'] ?? '');
        $description = Helpers::sanitize($_POST['description'] ?? '');
        $price       = (float) ($_POST['price'] ?? 0);
        $categoryId    = Helpers::sanitize($_POST['food_category_id'] ?? 0);
        $available   = isset($_POST['available']) ? 1 : 0;

        $this->db->query(
            "INSERT INTO food (name, description, price, food_category_id, available) VALUES (?, ?, ?, ?, ?)",
            [$name, $description, $price, $categoryId, $available]
        );

        Helpers::redirect('/admin/menu');
    }

    public function edit()
    {
        if (empty($_SESSION['admin'])) {
            Helpers::redirect('/admin-login');
        }

        $id   = $_GET['id'] ?? null;
        if (!$id) {
            Helpers::redirect('/admin/menu');
        }

        $item = $this->db->get("SELECT * FROM food WHERE food_id = ?", [$id]);
        $categories = $this->db->getAll("SELECT * FROM food_category ORDER BY name");

        require __DIR__ . '/../../views/admin.menu.form.view.php';
    }

    public function update()
    {
        if (empty($_SESSION['admin'])) {
            Helpers::redirect('/admin-login');
        }

        $id          = $_POST['id'] ?? null;
        $name        = Helpers::sanitize($_POST['name'] ?? '');
        $description = Helpers::sanitize($_POST['description'] ?? '');
        $price       = (float) ($_POST['price'] ?? 0);
        $categoryId    = Helpers::sanitize($_POST['food_category_id'] ?? '');
        $available   = isset($_POST['available']) ? 1 : 0;

        $this->db->query(
            "UPDATE food SET name=?, description=?, price=?, food_category_id=?, available=? WHERE food_id=?",
            [$name, $description, $price, $categoryId, $available, $id]
        );

        Helpers::redirect('/admin/menu');
    }

    public function destroy()
    {
        if (empty($_SESSION['admin'])) {
            Helpers::redirect('/admin-login');
        }

        $id = $_POST['id'] ?? null;
        if ($id) {
            $this->db->query("DELETE FROM food WHERE food_id = ?", [$id]);
        }

        Helpers::redirect('/admin/menu');
    }
}
