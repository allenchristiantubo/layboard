<?php namespace App\Models;

use CodeIgniter\Model;
use App\Libraries\Common_utils;
class Freelancers_model extends Model
{
    
    public function email_exists($email) : bool
    {
      $db = db_connect();
      $builder = $db->table('freelancers');
      $builder->where(array("email_address" => $email));
      $count = $builder->countAllResults();
      if($count > 0)
      {
          return true;
      }
      return false;
    }

    public function login($email, $password) : bool
    {
        $db = db_connect();
        
        $sql = "SELECT * FROM freelancers AS f JOIN freelancers_status AS fs ON  fs.freelancer_id = f.freelancer_id WHERE f.email_address = ? AND fs.activation_status = 1";
        
        $query = $db->query($sql, [$email]);
        $row = $query->getRowArray();
        if(isset($row))
        {
            if(md5($password) === $row['freelancer_pass'])
            {
                $session = session();
                $sessionData = ["freelancer_id" => $row->freelancer_id, "user_type" => "freelancer"];
                $session->set($sessionData);
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    public function create_account($email, $password, $firstname, $lastname) : bool
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

        return $db->affectedRows() > 0; 
    }

    public function get_info($slug) : array
    {
        $db = db_connect();
        
        $sql = "SELECT * FROM freelancers_info AS fi JOIN freelancers AS f ON  f.freelancer_id = fi.freelancer_id WHERE f.freelancer_slug = ?";

        $query = $db->query($sql, [$slug]);
        return $query->getRowArray();
    }

    public function get_image($slug) : array
    {
        $db = db_connect();

        $sql = "SELECT * FROM freelancers_images AS fim JOIN freelancers as f ON f.freelancer_id = f.freelancer_id = fim.freelancer_id WHERE f.freelancer_slug = ?";

        $query = $db->query($sql, [$slug]);

        return $query->getRowArray();
    }
}
?>