<?php namespace App\Models;
date_default_timezone_set("Asia/Manila");
use CodeIgniter\Model;
use App\Libraries\Common_utils;
class Jobs_model extends Model
{
    public function insert_job_title_category($title, $employer_id, $category_id, $specialty_id)
    {
        $db = db_connect();
        $builder = $db->table("jobs");
        $common_utils = new Common_utils();

        $validateJobSlug = 0;
        while($validateJobSlug <= 0)
        {
            $jobSlug = $common_utils->GenerateRandomString(20);
            $builder->where(['job_slug' => $jobSlug]);
            $count = $builder->countAllResults();
            if($count == 0)
            {
                $validateJobSlug = 1;
            }
        }

        $validateJobCode = 0;
        while($validateJobCode <= 0)
        {
            $jobCode = $common_utils->GenerateRandomString(8);
            $builder->where(['job_code' => $jobCode]);
            $count = $builder->countAllResults();
            if($count == 0)
            {
                $validateJobCode = 1;
            }
        }

        $newJobDataParams = array(
            "employer_id" => $employer_id,
            "category_id" => $category_id,
            "specialty_id" => $specialty_id,
            "job_slug" => $jobSlug,
            "job_code" => $jobCode,
            "date_created" => date("Y-m-d H:i:s")
        );

        $builder->insert($newJobDataParams);
        $job_id = $db->insertID();

        $newJobInfoDataParams = array(
            "job_id" => $job_id,
            "job_title" => $title,
            "job_description" => "",
            "job_price" => 0,
        );

        $builder = $db->table("jobs_info");
        $builder->insert($newJobInfoDataParams);

        /*
            JOB STATUS...
            0 = archived or inactive
            1 = posted
            2 = draft
            3 = active
            4 = done

            ACTIVATION STATUS FOR FREELANCERS...
            0 = inactive
            1 = active

            PAYMENT STATUS
            0 = NO PAYMENT
            1 = ON HOLD
            2 = PAID
        */
        $newJobStatusDataParams = array(
            "job_id" => $job_id,
            "employer_id" => $employer_id,
            "freelancer_id" => 0,
            "job_status" => 0,
            "activation_status" => 0,
            "payment_status" => 0
        );
        
        $builder = $db->table("jobs_status");
        $builder->insert($newJobStatusDataParams);

        return $db->affectedRows() > 0;
    }

    public function get_draft_jobs($employer_id)
    {
        $db = db_connect();

        $sql = "SELECT ji.job_title, j.date_created FROM jobs AS j JOIN jobs_info AS ji ON ji.job_id = j.job_id JOIN jobs_status AS js ON js.job_id = j.job_id WHERE js.job_status = ? AND j.employer_id = ? ORDER BY j.date_created";

        $query = $db->query($sql,[2, $employer_id]);

        return $query->getResultArray();
    }
}
?>