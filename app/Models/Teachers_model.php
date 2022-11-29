<?php

namespace App\Models;

use CodeIgniter\Model;

class Teachers_model extends Model
{
    protected $db;
    protected $DBGroup = 'default';
    protected $table = 'teachers';

    public function add_teacher($data)
    {
        $query = $this->db->table('teachers')->insert($data);
        return $query;
    }

    public function get_teacher($idTeachers) {
        $query_text = 'SELECT * FROM teachers where idTeachers= ?';
        $query = $this->db->query($query_text, $idTeachers);
        return $query->getResult();
    }

    //table data used for Log-In, please do not remove
    protected $allowedFields = [
        'firstname',
        'lastname',
        'email',
        /*        'password',*/
        'created_at'
    ];

}