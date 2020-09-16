<?php namespace App\Models;

use CodeIgniter\Model;
class Employers_model extends Model
{
    public function email_exists($email)
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

    public function register()
    {

    }
}