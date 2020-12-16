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

        if($addTitleCategoryResult)
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