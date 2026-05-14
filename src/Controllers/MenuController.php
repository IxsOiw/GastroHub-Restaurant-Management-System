<?php

namespace Ixsaiw\Bistro\Controllers;

class MenuController extends BaseController
{
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
