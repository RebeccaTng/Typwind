<?php

namespace App\Models;

use CodeIgniter\Model;
class ExerciseModel extends Model
{
    protected $table = 'exercises';

    public function getExercises($id_exercise = false)
    {
        if ($id_exercise === false) {
            return $this->findAll();
        }

        return $this->where(['id_exercise' => $id_exercise])->first();
    }
}