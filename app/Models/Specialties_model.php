<?php namespace App\Models;

use CodeIgniter\Model;

class Specialties_model extends Model
{
    public function get_specialties_by_category($category_id)
    {
        $db = db_connect();
        
        $sql = "SELECT specialty_id, specialty_name FROM specialties WHERE  category_id = ? AND specialty_status = ? ORDER BY specialty_name ASC";
        $query = $db->query($sql, [$category_id, 1]);

        return $query->getResultArray();
    }

    public function get_specialty_description($specialty_id)
    {
        $db = db_connect();

        $sql = "SELECT specialty_description FROM specialties WHERE specialty_id = ? AND specialty_status = ? LIMIT 1";
        $query = $db->query($sql,[$specialty_id, 1]);

        return $query->getRowArray();
    }
}
?>