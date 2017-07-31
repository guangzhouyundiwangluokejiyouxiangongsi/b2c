<?php

namespace Min\Controller;
class GoodsclassController extends PublicController 
{


	//分类
	public function index()
	{
		$pid = I('pid',0);
		$this->data['class'] = M('store_goods_class')->where(array('store_id'=>STORE_ID,'parent_id'=>$pid))->select();
	}




}