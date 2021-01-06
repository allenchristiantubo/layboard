<?php namespace App\Models;

use CodeIgniter\Model;

class Skills_model extends Model
{
    public function search_skills($skillName, $specialtyID = FALSE)
    {
        $db = db_connect();
        $builder = $db->table("skills");
        $builder->select("skill_id, skill_name");
        $builder->like("skill_name", $skillName, 'both');
        if($specialtyID != FALSE)
        {
            $builder->where("specialty_id", $specialtyID);
        }
        $data = $builder->get()->getResultArray();
    
        return $data;
    }
}
?>