<?php namespace App\Models;

use CodeIgniter\Model;
class Freelancers_model extends Model
{
    
    public function email_exists($email)
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
}
?>