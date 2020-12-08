<?php namespace App\Models;

use CodeIgniter\Model;

class Skills_model extends Model
{
    public function search_skills($skillName)
    {
        $db = db_connect();
        $builder = $db->table("skills");
        $builder->select("skill_id, skill_name");
        $builder->like("skill_name", $skillName, 'both');
        $data = $builder->get()->getResultArray();
    
        return $data;
    }    
}
?>