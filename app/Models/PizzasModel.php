<?php namespace App\Models;
use CodeIgniter\Model;

class PizzasModel extends Model
{
    protected $table      = 'app_pizza';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $allowedFields = ['name', 'ingredient', 'price'];

    public function createPizza($appPizza){
		$this->insert([
			'name' =>$appPizza['name'],
			'ingredient' =>$appPizza['ingredient'],
			'price' =>$appPizza['price'],
		]);
	}
}