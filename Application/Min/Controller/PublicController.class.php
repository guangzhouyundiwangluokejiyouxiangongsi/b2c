<?php

namespace Min\Controller;
use Think\Controller;
class PublicController extends Controller 
{

	public $data = array();

	public function _initialize()
	{
		if(!$store_id = I('store_id')){exit();}
		 define('STORE_ID',$store_id); 

		 $this->storedata();
	}


	//配置数据
	protected function storedata()
	{
		$store = M('store')->where(array('store_id'=>STORE_ID))->find();
		$store['shuffling']['img'] = explode(',', $store['store_slide']);//轮播图图片
		$store['shuffling']['url'] = explode(',', $store['store_slide_url']);//轮播图链接
		$this->data['store'] = $store;
		
	}


	public function _after_index()
	{
		// echo json_encode($this->data);
		dump($this->data);
	}







}