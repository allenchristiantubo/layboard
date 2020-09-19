<?php namespace App\Models;

use CodeIgniter\Model;
use App\Libraries\Common_utils;
class Employers_model extends Model
{
    public function email_exists($email) : bool
    {
        $db = db_connect();
        $builder = $db->table('employers');
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

        $sql = "SELECT * FROM employers AS e JOIN employers_status AS es ON  es.employer_id = e.employer_id WHERE e.email_address = ? AND es.activation_status = 1";

        $query = $db->query($sql, [$email]);
        $row = $query->getRowArray();
        if(isset($row))
        {
            if(md5($password) === $row['employer_pass'])
            {
                $session = session();
                $sessionData = ["employer_id" => $row->employer_id, "user_type" => "employer"];
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

        $builder = $db->table('employers');
        $common_utils = new Common_utils();

        $validateEmployerSlug = 0;
        while($validateEmployerSlug <= 0)
        {
            $employerSlug = $common_utils->GenerateRandomString(20);
            $builder->where(['freelancer_slug' => $employerSlug]);
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
            $builder->where(['freelancer_code' => $employerCode]);
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
            "gender" => ""
        );

        $builder = $db->table("freelancers_info");
        $builder->insert($newFreelancerInfoDataParams);

        $newEmployerStatusDataParams = array(
            "employer_id" => $employerID,
            "verification_status" => 0,
            "activation_status" => 1,
            "online_status" => 0,
            "profile_status" => 0,
            "payment_status" => 0
        );

        $builder = $db->table("employer_status");
        $builder->insert($newFreelancerStatusDataParams);

        return $db->affectedRows() > 0; 
    }
}