<?php namespace App\Models;

use CodeIgniter\Model;
use App\Libraries\Common_utils;
class Employers_model extends Model
{
    public function email_exists($email)
    {
        $db = db_connect();
        $builder = $db->table('employers');
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

        $sql = "SELECT * FROM employers AS e JOIN employers_status AS es ON  es.employer_id = e.employer_id WHERE e.email_address = ? AND es.activation_status = 1";

        $query = $db->query($sql, [$email]);
        $row = $query->getRowArray();
        if(isset($row))
        {
            if(md5($password) === $row['employer_pass'])
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

        $builder = $db->table('employers');
        $common_utils = new Common_utils();

        $validateEmployerSlug = 0;
        while($validateEmployerSlug <= 0)
        {
            $employerSlug = $common_utils->GenerateRandomString(20);
            $builder->where(['employer_slug' => $employerSlug]);
            $count = $builder->countAllResults();
            if($count == 0)
            {
                $validateEmployerSlug = 1;
            }
        }

        $validateEmployerCode = 0;
        while($validateEmployerCode <= 0)
        {
            $employerCode = $common_utils->GenerateRandomString(8);
            $builder->where(['employer_code' => $employerCode]);
            $count = $builder->countAllResults();
            if($count == 0)
            {
                $validateEmployerCode = 1;
            }
        }

        $newEmployerDataParams = array(
            "email_address" => $email,
            "employer_pass" => md5($password),
            "employer_slug" => $employerSlug,
            "employer_code" => $employerCode,
            "date_created" => date("Y-m-d")
        );

        $builder->insert($newEmployerDataParams);
        $employerID = $db->insertID();
        
        $newEmployerInfoDataParams = array(
            "employer_id" => $employerID,
            "firstname" => $firstname,
            "lastname" => $lastname,
            "contact_no" => "",
            "gender" => ""
        );

        $builder = $db->table("employers_info");
        $builder->insert($newEmployerInfoDataParams);

        $newEmployerStatusDataParams = array(
            "employer_id" => $employerID,
            "verification_status" => 0,
            "activation_status" => 1,
            "online_status" => 0,
            "profile_status" => 0,
            "payment_status" => 0
        );

        $builder = $db->table("employers_status");
        $builder->insert($newEmployerStatusDataParams);

        $validateImageFileSlug = 0;

        $builder = $db->table("employers_images");
        while($validateImageFileSlug <= 0)
        {
            $employerImageFileSlug = $common_utils->GenerateRandomString(24);
            $builder->where(['file_slug' => $employerImageFileSlug]);
            $count = $builder->countAllResults();
            if($count == 0)
            {
                $validateImageFileSlug = 1;
            }
        }

        $newEmployerImageDataParams = array(
            "employer_id" => $employerID,
            "file_name" => "default.png",
            "file_slug" => $employerImageFileSlug,
            "image_status" => 1
        );

        $builder->insert($newEmployerImageDataParams);

        return $db->affectedRows() > 0; 
    }
}