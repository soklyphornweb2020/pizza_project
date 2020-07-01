<?php namespace App\Controllers;
use App\Models\PizzasModel;
class Dashboard extends BaseController
{
	//showlist
	public function index()
	{	
		$pizza = new PizzasModel();
		// $pizza->insert($data);
		$data['pizzaDatas'] = $pizza->findAll();
		return view('index', $data);
	}

	//addPizza
	public function addPizza(){
    helper(['form']);
	$data = [];
	if($this->request->getMethod() == "post"){
		//let to do the validation here
		$rules=[
			'name'=>'required',
			'price'=>'required',
			'ingredient'=>'required',
		];
		//show different role
        if(! $this->validate($rules)){
            $data['validation'] = $this->validator;
            return redirect()->to("/dashboard");
        }else{
            $pizza = new PizzasModel();
            $pizzaData = array(
				'name' => $this->request->getVar('name'),
				'ingredient' => $this->request->getVar('ingredient'),
				'price' => $this->request->getVar('price'),
            );
            $pizza->createPizza($pizzaData);
            return redirect()->to("/dashboard");
            }
		}
		return view('index', $data);
	}

	//delete pizza
	public function showDeletePizza($id){
		$pizza = new PizzasModel();
		$pizza->find($id);
		$deletePizza= $pizza->delete($id);
		return redirect()->to("/dashboard");
	}

	//edit pizza
	public function showEditPizza($id){
		$pizza = new PizzasModel();
		$data['edit']= $pizza ->find($id) ;
		return viw('index', $data);
	}

	//update pizza

	public function update(){
		$pizza = new PizzasModel();
		$pizza->update($_POST['id'],$_POST);
		return redirect()->to("/dashboard");
	}
}
