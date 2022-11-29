<?php

namespace App\Models;

use CodeIgniter\Model;


class Students_model extends Model {

    protected $db;
    protected $DBGroup = 'default';
    protected $table = 'students';


    public function get_students($idTeacher) {
        $query_text = 'SELECT * FROM students where idTeacher_fk= ?';
        $query = $this->db->query($query_text, $idTeacher);
        return $query->getResult();
    }

    public function add_student($data)
    {
        $query = $this->db->table('students')->insert($data);
        return $query;
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
