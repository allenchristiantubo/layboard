<?php namespace App\Controllers;

use App\Models\Jobs_model;
class JobsController extends BaseController
{
    public function insert_job()
    {   
        $jobsModel = new Jobs_model();
        $session = session();

        
        $category = $this->request->getVar("category");
        $specialty = $this->request->getVar("specialty");
        $employer_id = $session->get("user_id");

        $insertJobResult = $jobsModel->insert_job($employer_id, $category, $specialty);

        if(!empty($insertJobResult))
        {
            echo json_encode(array("job_id" => $insertJobResult));
        }
    }

    public function insert_job_info()
    {
        $jobsModel = new Jobs_model();
        $session = session();

        $title = $this->request->getVar("title");
        $description = $this->request->getVar("description");
        $job_id = $this->request->getVar("job_id");

        $insertJobInfoResult = $jobsModel->insert_job_info($title,$description, $job_id);
        
        if($insertJobInfoResult)
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

        $insertJobExpertiseResult = $jobsModel->insert_job_expertise($skill_id, $job_id);

        if($insertJobExpertiseResult)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }

    public function insert_job_pricing()
    {
        $jobsModel = new Jobs_model();

        $job_id = $this->request->getVar("job_id");
        $price = $this->request->getVar("price");

        $insertJobPricingResult = $jobsModel->insert_job_pricing($price, $job_id);

        if($insertJobPricingResult)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }

    public function publish_job()
    {
        // $jobsModel = new Job_model();

        // $job_id = $this->request->getVar("job_id");

        // $publishJobResult;
    }

    public function update_job()
    {
        $session = session();
        $jobsModel = new Jobs_model();

        $job_id = $this->request->getVar("job_id");
        $category = $this->request->getVar("category");
        $specialty = $this->request->getVar("specialty");
        $employer_id = $session->get("user_id");

        $updateJobResult = $jobsModel->update_job($employer_id, $job_id, $category, $specialty);

        if($updateJobResult)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }

    public function update_job_draft()
    {
        $jobsModel = new Jobs_model();
        
        $job_id = $this->request->getVar("job_id");

        $updateJobDraftResult = $jobsModel->update_job_draft($job_id);

        if($updateJobDraftResult)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }

    public function delete_job_post()
    {
        $jobsModel = new Jobs_model();

        $job_id = $this->request->getVar("job_id");

        $deleteJobPostResult = $jobsModel->delete_job_post($job_id);

        if($deleteJobPostResult)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }
    // public function update_job_info()
    // {
    //     $jobsModel = new Jobs_model();
    //     $session = session();

    //     $title = $this->request->getVar("title");
    //     $description = $this->request->getVar("description");
    //     $job_id = $this->request->getVar("job_id");

    //     $updateJobInfoResult = $jobsModel->update_job_info($title,$description, $job_id);
        
    //     if($updateJobInfoResult)
    //     {
    //         echo 1;
    //     }
    //     else
    //     {
    //         echo 0;
    //     }
    // }
}
?>