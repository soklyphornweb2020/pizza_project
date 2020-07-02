<?php
namespace App\Models;
use CodeIgniter\Model;

class PizzaModel extends Model{
    protected $table = "app_pizza";
    protected $primaryKey = 'id';
    protected $returnType     = 'array';
    protected $allowedFields = ['name','ingredients','prize'];

}
