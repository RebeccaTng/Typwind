<?php

namespace App\Models;

use CodeIgniter\Model;


class Students_model extends Model {

    protected $db;
    protected $DBGroup = 'default';
    protected $table = 'students';



    public function add_student($data)
    {
        $query = $this->db->table('students')->insert($data);
        return $query;
    }

    public function get_student($idStudent) {
        $query_text = 'SELECT * FROM students where idStudents= ?';
        $query = $this->db->query($query_text, $idStudent);
        return $query->getResult();
    }

    public function get_students() {
        $query_text = 'SELECT students.idStudents, students.firstname, students.lastname, students.password, students.email, students.gender, students.birthday
,students.handSelection, students.isActive, students.notes, students.reminder, students.coins, students.streak
, teachers.firstname as teacherFirstname, teachers.lastname as teacherLastname, teachers.email as teacherEmail
, teachers.password as teacherPassword FROM a22ux02.students 
INNER JOIN a22ux02.teachers ON students.idTeacher_fk=teachers.idTeachers order by students.firstname';
        $query = $this->db->query($query_text);
        return $query->getResult();
    }
    public function edit_student($data)
    {

        $builder = $this->db->table('students');
        $query = $builder->replace($data);
        //$query_text= 'UPDATE `a22ux02`.`students` SET `firstname` = ?, `lastname` = ?, `gender` = ?, `birthday` = ?, `handSelection` = ?, `isActive` = ?, `notes` = ?, `idTeacher_fk` = ? WHERE (`idStudents` = ?)';
        //$query = $this->db->query($query_text, $data['firstname'],$data['lastname'], $data['gender'], $data['birthday'], $data['handSelection'], $data['isActive'],$data['notes'],$data['idTeacher_fk'], $data['idStudents'] );
        return $query;
    }

    public function getStudentExercises()
    {
        $session=session();
        $query_text = 'SELECT * FROM student_exercise_fk WHERE idStudent_fk='.$session->id;
        $query = $this->db->query($query_text);
        return $query->getResult();
    }

    public function getExercises()
    {
        $query_text = 'SELECT * FROM exercises';
        $query = $this->db->query($query_text);
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
