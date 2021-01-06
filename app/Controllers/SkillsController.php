<?php namespace App\Controllers;

use App\Models\Skills_model;
class SkillsController extends BaseController
{
    public function search_skills()
    {
        $skillsModel = new Skills_model();

        $skillName = $this->request->getVar("skill_name");
        $getSkillsResult = $skillsModel->search_skills($skillName);
        echo json_encode($getSkillsResult);
    }

    public function search_skills_by_specialty()
    {  
        $skillsModel = new Skills_model();

        $skillName = $this->request->getVar("skill_name");
        $getSkillResult = $skillsModel->search_skills($skillName,$specialty_id);
        echo json_encode($getSkillResult);
    }
}
?>