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
        $builder->where('idStudents', $data['idStudents']);
        $builder->update($data);
    }

    public function getStudentExercises($idStudent)
    {
        $query_text = 'SELECT * FROM exercises INNER JOIN student_exercise_fk ON exercises.idExercises = student_exercise_fk.idExercise_fk WHERE student_exercise_fk.idStudent_fk=?';
        $query = $this->db->query($query_text,$idStudent);
        return $query->getResult();
    }

    public function getSpecificExercises($idStudent) {
        $query_text = 'SELECT * FROM student_exercise_fk WHERE idStudent_fk= ?';
        $query = $this->db->query($query_text, $idStudent);
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

    public function add_results($data)
    {
        $query =$this->db->table('student_exercise_fk')->insert($data);
        return $query;
    }

}
