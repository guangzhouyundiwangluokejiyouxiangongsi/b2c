<?php

namespace Min\Controller;
class IndexController extends PublicController 
{


	public function index()
	{

		
		$this->data['index'] = array(1,2,3,4,5,6);
		// dump($this->data);
	}




}