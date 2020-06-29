<?php namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table      = 'students';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $allowedFields = ['name', 'email', 'password', 'age', 'province'];
}