<?php namespace App\Controllers;

class Users extends BaseController
{
	public function showLogin()
	{
		return view('auths/login');
    }
    
    public function showRegister()
	{
		return view('auths/register');
	}

	public function showList()
	{
		return view('index');
	}

}
