<?php namespace App\Controllers;

use App\Models\Specialties_model;
class SpecialtyController extends BaseController
{
    public function get_specialties()
    {
        $specialtiesModel = new Specialties_model();

        $category_id = $this->request->getVar("category_id");

        $specialtiesResult = $specialtiesModel->get_specialties_by_category($category_id);

        echo json_encode($specialtiesResult);
    }

    public function get_specialty_description()
    {
        $specialtiesModel = new Specialties_model();

        $specialty_id = $this->request->getVar("specialty_id");

        $specialtyDescriptionResult = $specialtiesModel->get_specialty_description($specialty_id);

        echo json_encode($specialtyDescriptionResult);
    }
}
?>