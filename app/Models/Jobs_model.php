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

        $sql = "SELECT j.job_id, ji.job_title, j.date_created FROM jobs AS j JOIN jobs_info AS ji ON ji.job_id = j.job_id WHERE j.job_status = ? AND j.employer_id = ? ORDER BY j.date_created DESC";

        $query = $db->query($sql,[2, $employer_id]);

        return $query->getResultArray();
    }

    public function get_jobs($employer_id)
    {
        $db = db_connect();
        $sql = "SELECT j.job_id, ji.job_title, ji.job_description, j.date_published FROM jobs AS j JOIN jobs_info AS ji ON ji.job_id = j.job_id WHERE j.job_status = ? AND j.employer_id = ? AND ji.job_info_status = 1 ORDER BY j.date_published DESC";
        
        $query = $db->query($sql,[1, $employer_id]);

        return $query->getResultArray();
    }

    public function get_jobs_row_count()
    {
        $db = db_connect();
        $builder = $db->table("jobs");
        $count = $builder->countAll();

        return $count;
    }

    public function get_jobs_by_page($pagenum, $perPageCount)
    {
        $db = db_connect();
        $lowerlimit = ($pagenum - 1) * $perPageCount;
        $sql = "SELECT j.job_id, j.employer_id, j.job_slug, j.date_published, ji.job_title, ji.job_description, jp.job_price,e.employer_slug, ei.firstname, ei.lastname, eim.file_name FROM jobs as j JOIN jobs_info as ji ON ji.job_id = j.job_id JOIN jobs_pricing as jp ON jp.job_id = j.job_id JOIN employers as e ON e.employer_id = j.employer_id JOIN employers_info as ei ON ei.employer_id = e.employer_id JOIN employers_images as eim ON eim.employer_id = e.employer_id JOIN employers_status as es ON es.employer_id = e.employer_id WHERE j.job_status = 1 AND es.activation_status = 1 AND eim.image_status = 1 GROUP BY j.job_id ORDER BY j.date_published DESC LIMIT ?,?";
        $query = $db->query($sql,[$lowerlimit, $perPageCount]);

        return $query->getResultArray();
    }

    public function delete_draft_jobs($job_id)
    {

    }

    public function delete_job_post($job_id)
    {
        $db = db_connect(); 

        $whereJobDataParams = array(
            "job_id" => $job_id
        );

        $this->db->transBegin();

        $builder = $db->table("jobs");
        $builder->where($whereJobDataParams);
        $builder->delete();

        $builder = $db->table("jobs_info");
        $builder->where($whereJobDataParams);
        $builder->delete();

        $builder = $db->table("jobs_pricing");
        $builder->where($whereJobDataParams);
        $builder->delete();

        $builder = $db->table("jobs_skills");
        $builder->where($whereJobDataParams);
        $builder->delete();

        if($this->db->transStatus() === FALSE)
        {
            $this->db->transRollback();
            return FALSE;
        }
        else
        {
            $this->db->transCommit();
            return TRUE;
        }
    }
}
?>