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
            "date_created" => date("Y:m:d H:i:s"),
            "date_updated" => "",
            "date_published" => "",
            "job_status" => 0
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
            "job_info_status" => 1
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

    public function insert_job_pricing($price, $job_id)
    {
        $db = db_connect();

        $builder = $db->table("jobs_pricing");

        $newPriceDataParams = array(
            "job_id" => $job_id,
            "job_price" => $price,
            "job_pricing_status" => 1
        );

        $builder->insert($newPriceDataParams);

        $updatePublishedDataParams = array(
            "date_published" => date("Y:m:d H:i:s"),
            "job_status" => 1
        );

        $whereJobDataParams = array(
            "job_id" => $job_id
        );

        $builder = $db->table("jobs");
        $builder->where($whereJobDataParams);
        $builder->update($updatePublishedDataParams);

        return $db->affectedRows() > 0;
    }

    public function update_job_draft($job_id)
    {
        $db = db_connect();

        $builder = $db->table("jobs");

        $updateJobDraftDataParams = array(
            "job_status" => 2
        );

        $whereJobDraftDataParams = array(
            "job_id" => $job_id
        );

        $builder->where($whereJobDraftDataParams);
        $builder->update($updateJobDraftDataParams);

        return $db->affectedRows() > 0;
    }

    public function update_publish_job($employer_id, $job_id)
    {

    }

    public function update_job($employer_id, $job_id, $category_id, $specialty_id)
    {
        $db = db_connect();

        $updateJobDataParams = array(
            "category_id" => $category_id,
            "specialty_id" => $specialty_id
        );

        $whereJobDataParams = array(
            "job_id" => $job_id,
            "employer_id" => $employer_id
        );

        $builder = $db->table("jobs");
        $builder->where($whereJobDataParams);
        $builder->update($updateJobDataParams);

        return $db->affectedRows() > 0;
    }

    public function get_draft_jobs($employer_id)
    {
        $db = db_connect();

        $sql = "SELECT j.job_id, ji.job_title, j.date_created FROM jobs AS j JOIN jobs_info AS ji ON ji.job_id = j.job_id WHERE j.job_status = ? AND j.employer_id = ? ORDER BY j.date_created";

        $query = $db->query($sql,[2, $employer_id]);

        return $query->getResultArray();
    }

    public function get_jobs($employer_id)
    {
        $db = db_connect();
        $sql = "SELECT j.job_id, ji.job_title, ji.job_description, j.date_published FROM jobs AS j JOIN jobs_info AS ji ON ji.job_id = j.job_id WHERE j.job_status = ? AND j.employer_id = ? AND ji.job_info_status = 1 ORDER BY j.date_published";
        
        $query = $db->query($sql,[1, $employer_id]);

        return $query->getResultArray();
    }
}
?>