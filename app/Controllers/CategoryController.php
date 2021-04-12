<?php namespace App\Controllers;

use App\Models\Categories_model;
class CategoryController extends BaseController
{
    public function get_category_description()
    {
        $categoriesModel = new Categories_model();

        $category_id = $this->request->getVar("category_id");

        $categoryDescriptionResult = $categoriesModel->get_category_description($category_id);

        echo json_encode($categoryDescriptionResult);
    }

    public function get_categories()
    {
        $categoriesModel = new Categories_model();

        $categoriesResult = $categoriesModel->get_categories();

        echo json_encode($categoriesResult);
    }
}
?>