<?php namespace App\Controllers;

use App\Models\Skills_model;
class SkillsController extends BaseController
{
    public function search_skills()
    {
        $skillsModel = new Skills_model();

        $skillName = $this->request->getVar("skill_name");
        $getSkillsResult = $skillsModel->search_skills($skillName);
        if(empty($getSkillsResult))
        {
            echo "empty";
        }
        echo json_encode($getSkillsResult);
    }
}
?>