<?php namespace App\Models;

use CodeIgniter\Model;

class Skills_model extends Model
{
    public function search_skills($skill_name)
    {
        $db = db_connect();
        $builder = $db->table("skills");
        $builder->select("skill_id, skill_name");
        $builder->like("skill_name", $skill_name, 'both');
        $data = $builder->get()->getResultArray();
    
        return $data;
    }

    public function search_skills_by_specialty($skill_name, $specialty_id)
    {
        $db = db_connect();
        $builder = $db->table("skills");
        $builder->select("skill_id, skill_name");
        $builder->like("skill_name", $skill_name, 'both');
        $data = $builder->get()->getResultArray();

        return $data;
    }
}
?>