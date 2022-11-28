<?php
namespace App\Models;
use CodeIgniter\Model;

//This model is used for the log in :)
class StudentModel extends Model{
    protected $table = 'students';

    protected $allowedFields = [
        'firstname',
        'lastname',
        'email',
        /*        'password',*/
        'created_at'
    ];
}