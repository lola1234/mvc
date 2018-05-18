<?php

/**
 * 
 */
class HomeController extends Controller
{
	
	public function index($name='', $id='')
	{
		//call the view object to render
		$this->view('home\index', [
      'name' => $name,
      'id' => $id
		]);
		$this->view->pageTitle = 'This is the Home page';
		$this->view->render();
	}

	public function about()
	{
		
		$this->view('home\about');
		$this->view->pageTitle = 'This is the About page';
		$this->view->render();
	}
}