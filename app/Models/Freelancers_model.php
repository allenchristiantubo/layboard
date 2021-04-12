<?php namespace App\Models;

use CodeIgniter\Model;
use App\Libraries\Common_utils;
class Freelancers_model extends Model
{
    public function email_exists($email)
    {
        $db = db_connect();
        $builder = $db->table('freelancers');
        $builder->where("email_address", $email);
        $count = $builder->countAllResults();
        if($count > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function profile_exists($slug)
    {
        $db = db_connect();
        $builder = $db->table('freelancers');
        $builder->where(array("freelancer_slug" => $slug));
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
        $sql = "SELECT * FROM freelancers AS f JOIN freelancers_status AS fs ON  fs.freelancer_id = f.freelancer_id WHERE f.email_address = ? AND fs.activation_status = 1";
        
        $query = $db->query($sql, [$email]);
        $row = $query->getRowArray();
        if(isset($row))
        {
            if(md5($password) === $row['freelancer_pass'])
            {
                return $row;
            }
            else
            {
                return false;
            }
        }
    }

    public function create_account($email, $password, $firstname, $lastname)
    {
        $db = db_connect();
        $builder = $db->table('freelancers');
        $common_utils = new Common_utils();

        $validateFreelancerSlug = 0;
        while($validateFreelancerSlug <= 0)
        {
            $freelancerSlug = $common_utils->GenerateRandomString(20);
            $builder->where(['freelancer_slug' => $freelancerSlug]);
            $count = $builder->countAllResults();
            if($count == 0)
            {
                $validateFreelancerSlug = 1;
            }
        }

        $validateFreelancerCode = 0;
        while($validateFreelancerCode <= 0)
        {
            $freelancerCode = $common_utils->GenerateRandomString(8);
            $builder->where(['freelancer_code' => $freelancerCode]);
            $count = $builder->countAllResults();
            if($count == 0)
            {
                $validateFreelancerCode = 1;
            }
        }

        $newFreelancerDataParams = array(
            "email_address" => $email,
            "freelancer_pass" => md5($password),
            "freelancer_slug" => $freelancerSlug,
            "freelancer_code" => $freelancerCode,
            "date_created" => date("Y-m-d")
        );

        $builder->insert($newFreelancerDataParams);
        $freelancerID = $db->insertID();

        $newFreelancerInfoDataParams = array(
            "freelancer_id" => $freelancerID,
            "firstname" => $firstname,
            "lastname" => $lastname,
            "contact_no" => "",
            "gender" => ""
        );

        $builder = $db->table("freelancers_info");
        $builder->insert($newFreelancerInfoDataParams);

        $newFreelancerStatusDataParams = array(
            "freelancer_id" => $freelancerID,
            "verification_status" => 0,
            "activation_status" => 1,
            "online_status" => 0,
            "profile_status" => 0,
            "payment_status" => 0
        );

        $builder = $db->table("freelancers_status");
        $builder->insert($newFreelancerStatusDataParams);

        $validateImageFileSlug = 0;
        $builder = $db->table("freelancers_images");
        while($validateImageFileSlug <= 0)
        {
            $freelancerImageFileSlug = $common_utils->GenerateRandomString(24);
            $builder->where(['file_slug' => $freelancerImageFileSlug]);
            $count = $builder->countAllResults();
            if($count == 0)
            {
                $validateImageFileSlug = 1;
            }
        }

        $newFreelancerImageDataParams = array(
            "freelancer_id" => $freelancerID,
            "file_name" => "default.png",
            "file_slug" => $freelancerImageFileSlug,
            "image_status" => 1
        );

        
        $builder->insert($newFreelancerImageDataParams);

        return $db->affectedRows() > 0; 
    }

    public function get_info($slug)
    {
        $db = db_connect();
        
        $sql = "SELECT * FROM freelancers_info AS fi JOIN freelancers AS f ON  f.freelancer_id = fi.freelancer_id WHERE f.freelancer_slug = ?";

        $query = $db->query($sql, [$slug]);
        return $query->getRowArray();
    }

    public function get_image($slug)
    {
        $db = db_connect();

        $sql = "SELECT * FROM freelancers_images AS fim JOIN freelancers as f ON f.freelancer_id = fim.freelancer_id WHERE f.freelancer_slug = ?";

        $query = $db->query($sql, [$slug]);

        return $query->getRowArray();
    }

    public function get_skills($slug)
    {
        $db = db_connect();

        $sql = "SELECT fs.skill_id, s.skill_name FROM freelancers_skills AS fs JOIN skills AS s ON s.skill_id = fs.skill_id JOIN freelancers AS f ON f.freelancer_id = fs.freelancer_id WHERE f.freelancer_slug = ? AND fs.freelancer_skill_status = 1 AND s.skill_status = 1";

        $query = $db->query($sql, [$slug]);

        return $query->getResultArray();
    }

    public function insert_skills($skillID, $freelancerID)
    {
        $db = db_connect();

        $newFreelancerSkillDataParams = array(
            "freelancer_id" => $freelancerID,
            "skill_id" => $skillID,
            "freelancer_skill_status" => 1
        );

        $builder = $db->table("freelancers_skills");
        $builder->insert($newFreelancerSkillDataParams);

        return $db->affectedRows() > 0;
    }

    public function skills_exists($skillID, $freelancerID) : bool
    {
        $db = db_connect();
        $builder = $db->table('freelancers_skills');
        $builder->where(array("skill_id" => $skillID, "freelancer_id" => $freelancerID));
        $count = $builder->countAllResults();
        if($count > 0)
        {
            return true;
        }
        return false;
    }

    public function deactivate_skill($skillID, $freelancerID) : bool
    {
        $db = db_connect();
        $builder = $db->table("freelancers_skills");
        
        $newFreelancerSkillsResetDataParams = array(
            "freelancer_skill_status" => 0
        );

        $deactivateSkillArrayCondition = array(
            "skill_id" => $skillID,
            "freelancer_id" => $freelancerID
        );

        $builder->where($deactivateSkillArrayCondition);
        $builder->update($newFreelancerSkillsResetDataParams);

        return $db->affectedRows() > 0;
    }

    public function update_skills($skillID, $freelancerID) : bool
    {
        $db = db_connect();

        $updateSkillArrayCondition = array(
            "skill_id" => $skillID,
            "freelancer_id" => $freelancerID
        );

        $builder = $db->table("freelancers_skills");
        $builder->where($updateSkillArrayCondition);
        $count = $builder->countAllResults();
        if($count > 0)
        {
            $newFreelancerSkillsUpdateDataParams = array(
                "freelancer_skill_status" => 1
            );
    
            $builder->where($updateSkillArrayCondition);
            $builder->update($newFreelancerSkillsUpdateDataParams);   
        }
        else
        {
            $newFreelancerSkillsInsertDataParams = array(
                "freelancer_id" => $freelancerID,
                "skill_id" => $skillID,
                "freelancer_skill_status" => 1
            );

            $builder->insert($newFreelancerSkillsInsertDataParams);
        }
        return $db->affectedRows() > 0; 
    }

    public function insert_categories($categoryID, $freelancerID)
    {
        $db = db_connect();

        $newFreelancerCategoryDataParams = array(
            "freelancer_id" => $freelancerID,
            "category_id" => $categoryID,
            "freelancer_category_status" => 1
        );

        $builder = $db->table("freelancers_categories");
        $builder->insert($newFreelancerCategoryDataParams);

        return $db->affectedRows() > 0;
    }

    public function get_categories($slug)
    {
        $db = db_connect();

        $sql = "SELECT fc.category_id, c.category_name FROM freelancers_categories AS fc JOIN categories AS c ON c.category_id = fc.category_id JOIN freelancers AS f ON f.freelancer_id = fc.freelancer_id WHERE f.freelancer_slug = ? AND fc.freelancer_category_status = 1 AND c.category_status = 1";

        $query = $db->query($sql, [$slug]);

        return $query->getResultArray();
    }
}
?>