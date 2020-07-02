<?php namespace App\Controllers;
use App\Models\PizzaModel;
class Pizza extends BaseController
{
	// show list pizza
	public function index()
	{
		$model = new PizzaModel();
		$data['listPizza'] = $model->findAll();
		return view('index',$data);
	}

	// add new pizza
	public function addPizza()
	{	
		helper(['form']);
		$data = [];

		if($this->request->getMethod() == "post"){
			$rules = [
				'name' => 'required',
				'ingredients' => 'required',
				'prize' => 'required'
			];
			if(!$this->validate($rules)){
				$data['validate'] = $this->validator;
				
			}else{
				$model = new PizzaModel();
				$newData = [
					'name' => $this->request->getVar('name'),
					'ingredients' => $this->request->getVar('ingredients'),
					'prize' => $this->request->getVar('prize')
				];

				$model->save($newData);
				return redirect()->to('/dashboard');
			}

		}
		return view('index',$data);
	}

	// delete pizza
	public function deletePizza($id)
	{
		$model = new PizzaModel();
		$model->find($id);
		$delete = $model->delete($id);
		return redirect()->to('/dashboard');
	}

		
	public function editPizza($id)
	{	
		$peperoni = new PizzaModel();
		$data['edit']= $peperoni->find($id);
		return view('edit',$data);
	}

   public function updatPizza()
	{	
		$peperoni = new PizzaModel();
		$peperoni->update($_POST['id'],$_POST);
		return redirect()->to('/dashboard');
	}
}
