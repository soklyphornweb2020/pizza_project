<?php namespace App\Controllers;

class Auths extends BaseController
{
	public function index()
	{
		return view('auths/login');
    }
    
    public function register()
	{
		return view('auths/register');
	}

}
