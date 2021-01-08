<?php namespace App\Controllers;

use App\Models\Skills_model;
class SkillsController extends BaseController
{
    public function search_skills()
    {
        $skillsModel = new Skills_model();

        $skill_name = $this->request->getVar("skill_name");
        $getSkillsResult = $skillsModel->search_skills($skill_name);
        echo json_encode($getSkillsResult);
    } 

    public function search_skills_by_specialty()
    {  
        $skillsModel = new Skills_model();

        $skill_name = $this->request->getVar("skill_name");
        $specialty_id = $this->request->getVar("specialty_id");
        $getSkillResult = $skillsModel->search_skills_by_specialty($skill_name,$specialty_id);
        echo json_encode($getSkillResult);
    }
}
?>