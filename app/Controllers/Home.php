<?php namespace App\Controllers;

class Home extends BaseController
{
	/**
	 * 留言板主畫面
	 */
	public function index()
	{
		echo view('header');
		
		return view('welcome_message');
	}
}
