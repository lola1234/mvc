<?php

/**
 * 
 */
class CarController extends Controller
{
	
	public function index(){
		$this->model('car');
		$this->view('car'.DIRECTORY_SEPARATOR.'index',['cars'=>$this->model->getCars()])->render();
	}
}