<?php namespace App\Models;

use CodeIgniter\Model;
use App\Libraries\Common_utils;
class Admins_model extends Model
{
    public function email_exists($email)
    {
        $db = db_connect();
        $builder = $db->table('admins');
        $builder->where("email_address", $email);
        $count = $builder->countAllResults();
        if($count > 0)
        {
            return true;
        }
        return false;
    }

    public function login($email, $password)
    {
        $db = db_connect();

        $sql = "SELECT * FROM admins AS e JOIN admins_status AS es ON  es.admin_id = e.admin_id WHERE e.email_address = ? AND es.activation_status = 1";

        $query = $db->query($sql, [$email]);
        $row = $query->getRowArray();
        if(isset($row))
        {
            if(md5($password) === $row['admin_pass'])
            {
                return $row;
            }
            else
            {
                return false;
            }
        }
    }

    public function get_info($slug)
    {
        $db = db_connect();
        
        $sql = "SELECT * FROM admins_info AS ei JOIN admins AS e ON  e.admin_id = ei.admin_id WHERE e.admin_slug = ?";

        $query = $db->query($sql, [ $slug]);
        return $query->getRowArray();
    }

    public function get_image($slug)
    {
        $db = db_connect();

        $sql = "SELECT * FROM admins_images AS eim JOIN admins as e ON e.admin_id = eim.admin_id WHERE e.admin_slug = ?";

        $query = $db->query($sql, [ $slug]);

        return $query->getRowArray();
    }

    /* DASHBOARD PROJECT */  /* DASHBOARD PROJECT */  /* DASHBOARD PROJECT */  /* DASHBOARD PROJECT */

    public function get_jobs($employer_id)
    {
        $db = db_connect();
        $sql = "SELECT j.job_id, ji.job_title, ji.job_description, j.date_published FROM jobs AS j JOIN jobs_info AS ji ON ji.job_id = j.job_id WHERE j.job_status = ? AND j.employer_id = ? AND ji.job_info_status = 1 ORDER BY j.date_published";
        
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

    /* DASHBOARD EMPLOYERS LIST */  /* DASHBOARD EMPLOYERS LIST */  /* DASHBOARD EMPLOYERS LIST */  

    public function get_employers($employer_id)
    {
        $db = db_connect();
        $sql = "SELECT e.employer_id, e.email_address, e.date_created FROM employers AS e JOIN employers_info AS ei ON ei.employer_id = e.employer_id  WHERE ei.employers_info_id = ? AND e.employer_id = 1 ORDER BY e.date_created";
        
        $query = $db->query($sql,[$employer_id]);

        return $query->getResultArray();
    }


    public function get_employers_row_count()
    {
        $db = db_connect();
        $builder = $db->table("employers");
        $count = $builder->countAll();

        return $count;
    }

    public function get_employers_by_page($pagenum, $perPageCount)
    {
        $db = db_connect();
        $lowerlimit = ($pagenum - 1) * $perPageCount;
        $sql = "SELECT e.employer_id, e.email_address, e.employer_slug, e.date_created, ei.firstname, ei.lastname, ei.contact_no FROM employers AS e JOIN employers_info AS ei ON ei.employer_id = e.employer_id JOIN employers_status as es ON es.employer_id = ei.employer_id WHERE es.activation_status = 1 ORDER BY e.date_created ";
        $query = $db->query($sql,[$lowerlimit, $perPageCount]);

        return $query->getResultArray();
    }

    

    /* DASHBOARD FREELANCERS LIST */  /* DASHBOARD FREELANCERS LIST */  /* DASHBOARD FREELANCERS LIST */

    public function get_freelancers($freelancer_id)
    {
        $db = db_connect();
        $sql = "SELECT f.freelancer_id, f.email_address, f.date_created FROM freelancers AS f JOIN freelancers_info AS fi ON fi.freelancer_id = f.freelancer_id WHERE fi.freelancers_info_id = ? AND f.freelancer_id = 1 ORDER BY f.date_created";
        
        $query = $db->query($sql,[$freelancer_id]);

        return $query->getResultArray();
    }


    public function get_freelancers_row_count()
    {
        $db = db_connect();
        $builder = $db->table("freelancers");
        $count = $builder->countAll();

        return $count;
    }

    public function get_freelancers_by_page($pagenum, $perPageCount)
    {
        $db = db_connect();
        $lowerlimit = ($pagenum - 1) * $perPageCount;
        $sql = "SELECT f.freelancer_id, f.email_address, f.freelancer_slug, f.date_created, fi.firstname, fi.lastname, fi.contact_no FROM freelancers AS f JOIN freelancers_info AS fi ON fi.freelancer_id = f.freelancer_id JOIN freelancers_status as fs ON fs.freelancer_id = fi.freelancer_id WHERE fs.activation_status = 1 ORDER BY f.date_created";
        $query = $db->query($sql,[$lowerlimit, $perPageCount]);

        return $query->getResultArray();
    }
}
?>