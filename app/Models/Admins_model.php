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

        $query = $db->query($sql, [$slug]);
        return $query->getRowArray();
    }

    public function get_image($slug)
    {
        $db = db_connect();

        $sql = "SELECT * FROM admins_images AS eim JOIN admins as e ON e.admin_id = eim.admin_id WHERE e.admin_slug = ?";

        $query = $db->query($sql, [$slug]);

        return $query->getRowArray();
    }

}