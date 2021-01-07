<?php namespace App\Controllers;

use App\Models\Jobs_model;
class JobsController extends BaseController
{
    public function insert_job_title_category()
    {   
        $jobsModel = new Jobs_model();
        $session = session();

        $title = $this->request->getVar("title");
        $category = $this->request->getVar("category");
        $specialty = $this->request->getVar("specialty");
        $employer_id = $session->get("user_id");

        $addTitleCategoryResult = $jobsModel->insert_job_title_category($title, $employer_id, $category, $specialty);

        if(!empty($addTitleCategoryResult))
        {
            echo json_encode(array("job_id" => $addTitleCategoryResult));
        }
    }

    public function update_job_description()
    {
        $jobsModel = new Jobs_model();
        $session = session();

        $description = $this->request->getVar("description");
        $job_id = $this->request->getVar("job_id");

        $updateJobDescResult = $jobsModel->update_job_description($description, $job_id);
        
        if($updateJobDescResult)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }

    public function insert_job_expertise()
    {
        $jobsModel = new Jobs_model();
        $session = session();

        $job_id = $this->request->getVar("job_id");
        $skill_id = $this->request->getVar("skill_id");

        $updateJobExpertiseResult = $jobsModel->insert_job_expertise($skill_id, $job_id);

        if($updateJobDescResult)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }
}
?>