<?php namespace App\Models;

use CodeIgniter\Model;
use App\Libraries\Common_utils;
class Jobs_model extends Model
{
    public function insert_job($employer_id, $category_id, $specialty_id)
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
            "date_created" => "",
            "date_updated" => "",
            "job_status" => 2
        );

        $builder->insert($newJobDataParams);
        $job_id = $db->insertID();

        if($db->affectedRows() > 0)
        {
            return $job_id;
        }
    }

    public function insert_job_info($title, $description, $job_id)
    {
        $db = db_connect();

        $builder = $db->table("jobs_info");

        $newInfoDataParams = array(
            "job_id" => $job_id,
            "job_title" => $title,
            "job_description" => $description,
            "job_info_status" => 0
        );

        $builder->insert($newInfoDataParams);

        if($db->affectedRows() > 0)
        {
            return true;
        }
    }

    public function insert_job_expertise($skill_id, $job_id)
    {
        $db = db_connect();

        $builder = $db->table("jobs_skills");

        $newSkillDataParams = array(
            "job_id" => $job_id,
            "skill_id" => $skill_id,
            "job_skill_status" => 1
        );

        $builder->insert($newSkillDataParams);

        return $db->affectedRows() > 0;
    }

    public function insert_job_pricing($skill_id, $price)
    {
        
    }

    public function update_job($employer_id, $job_id, $category, $specialty)
    {
        
    }

    public function get_draft_jobs($employer_id)
    {
        $db = db_connect();

        $sql = "SELECT j.job_id, ji.job_title, j.date_created FROM jobs AS j JOIN jobs_info AS ji ON ji.job_id = j.job_id JOIN jobs_status AS js ON js.job_id = j.job_id WHERE js.job_status = ? AND j.employer_id = ? ORDER BY j.date_created";

        $query = $db->query($sql,[2, $employer_id]);

        return $query->getResultArray();
    }
}
?>