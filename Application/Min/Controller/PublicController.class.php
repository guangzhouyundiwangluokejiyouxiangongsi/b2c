<?php

namespace Min\Controller;
use Think\Controller;
class PublicController extends Controller 
{

	protected $data = array();

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

		$store['province'] = M('region')->where(array('id'=>$store['province_id']))->getField('name');
		$store['city'] = M('region')->where(array('id'=>$store['city_id']))->getField('name');
		$store['districts'] = M('region')->where(array('id'=>$store['district']))->getField('name');
		$imgs = array_filter(explode(',', $store['store_slide']));//轮播图图片
		$url = array_filter(explode(',', $store['store_slide_url']));//轮播图链接
		foreach($imgs as $k=>$v){
			$img[ $k ]['img'] = $v;
			$img[$k]['url'] = $url[$k];
		}
		$store['shuffling'] = $img;
		$this->data['store'] = $store;
		
	}


	public function __destruct()
	{
		// dump(M());
		// $this->display();
		echo json_encode($this->data);
		// echo '<pre>';print_r($this->data);
	}




 


}


