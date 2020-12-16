<?php namespace App\Models;

use CodeIgniter\Model;

class Categories_model extends Model
{
    public function get_categories($category_id = FALSE)
    {
        $db = db_connect();
        if($category_id === FALSE)
        {   
            $sql = "SELECT * FROM categories WHERE category_status = ? ORDER BY category_name ASC";
            $query = $db->query($sql, 1);

            return $query->getResultArray();
        }
        else
        {
            $sql = "SELECT * FROM categories WHERE category_id = ? AND category_status = ? LIMIT 1";
            $query = $db->query($sql,[$category_id,1]);

            return $query->getResultArray();
        }
    }

    public function get_category_description($category_id)
    {
        $db = db_connect();
        $sql = "SELECT category_description FROM categories WHERE category_id = ? AND category_status = ? LIMIT 1";
        $query = $db->query($sql,[$category_id, 1]);
        
        return $query->getRowArray();
    }
}
?>