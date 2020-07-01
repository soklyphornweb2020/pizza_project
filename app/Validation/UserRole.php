<?php namespace App\Validation;
use App\Models\UsersModel;
class UserRole{
    public function validatUser(string $str, string $fields, array $data)
	{
        $pizzaData = new UsersModel();
        $user = $pizzaData->where('email',$data['email'])->first();
        $user = $pizzaData->where('password',$data['password'])->first();
        if($user)
        return true;

        return password_verify($data['password'],$user['password']);
    }
}