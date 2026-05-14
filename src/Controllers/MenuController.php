<?php

namespace Ixsaiw\Bistro\Controllers;

use Ixsaiw\Bistro\Database;

class MenuController
{
    protected Database $db;

    public function __construct($config)
    {
        $this->db = new Database($config['database']);
    }

    public function category()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $category = basename($uri); // "coffee", "lunch"...

        $items = $this->db->getAll(
            "SELECT f.* FROM food f
            JOIN food_category fc ON f.food_category_id = fc.food_category_id
            WHERE LOWER(fc.name) = ? AND f.available = 1
            ORDER BY f.name ASC",
            [strtolower($category)]
        );

        $categoryTitle = ucfirst($category);
        $heading = $categoryTitle;

        require __DIR__ . '/../../views/menu-category.view.php';
    }

    public function index()
    {

        $heading = "Menu";
        require __DIR__ . '/../../views/menu.view.php';
    }

}
