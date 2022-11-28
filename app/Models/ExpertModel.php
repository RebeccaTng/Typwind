<?php
namespace App\Models;
use CodeIgniter\Model;

//This model is used for the log in :)
class ExpertModel extends Model{
    protected $table = 'teachers';

    protected $allowedFields = [
        'firstname',
        'lastname',
        'email',
/*        'password',*/
        'created_at'
    ];
}