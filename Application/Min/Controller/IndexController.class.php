<?php

namespace Min\Controller;
class IndexController extends PublicController 
{


	public function index()
	{

		$this->indexnav();
		$this->recommend();
	}

	//导航
	protected function indexnav()
	{
		$this->data['indexnav'] = M('store_navigation')->field('sn_id,sn_title,sn_url')->where(array('sn_store_id'=>STORE_ID,'sn_is_show'=>1))->order('sn_sort')->select();
	}


	//推荐产品
	protected function recommend()
	{

		$sql = "SELECT `goods_id`,`goods_name`,`shop_price`,`cost_price`,`original_img`,`comment_count`,`sales_sum`,`cat_name` FROM __PREFIX__goods INNER JOIN __PREFIX__store_goods_class on __PREFIX__goods.store_cat_id1 = __PREFIX__store_goods_class.cat_id where __PREFIX__goods.store_id = 6 and __PREFIX__goods.is_recommend=1";
		$this->data['recommend'] = M()->query($sql);

	}




	//分类 /min/index/goodsclass/store_id/6/pid/21
	public function goodsclass()
	{
		$pid = I('pid',0);
		$this->data['class'] = M('store_goods_class')->where(array('store_id'=>STORE_ID,'parent_id'=>$pid,'is_show'=>1))->order('cat_sort')->select();
		//默认的二级分类
		if(!$pid){
		$this->data['child'] = M('store_goods_class')->where(array('store_id'=>STORE_ID,'parent_id'=>$this->data['class']['0']['cat_id'],'is_show'=>1))->select();

		}
	}


	//产品列表 /min/index/goodslist/store_id/6/cid/2/p/1

	public function goodslist()
	{
		$cid = I('cid');
		$where['store_id'] = STORE_ID;
		if($cid) $where['store_cat_id2'] = $cid;
		 $goodslist = M('goods')->field('goods_id,goods_name,click_count,shop_price,cost_price,original_img,store_cat_id2,comment_count,sales_sum')->where($where)->page($_GET['p'].',20')->select();
		 foreach($goodslist as &$v){
		 	$v['cat_name'] = M('store_goods_class')->where(array('cat_id'=>$v['store_cat_id2']))->getField('cat_name');
		 	$v['img'] = M('goods_images')->where(array('goods_id'=>$v['goods_id']))->getField('image_url',true);
		 }
		 $this->data['goodslist'] = $goodslist;
	}
// tp_comment 


	//商品詳情頁
	public function goods()
	{
		$id = I('id');
		if(!$id){return;}
		//商品基本信息
		$goods = M('goods')->where(array('store_id'=>STORE_ID,'goods_id'=>$id))->find();
		$goods['goods_content'] = htmlspecialchars_decode($goods['goods_content']);
		$this->data['goods'] = $goods;

		//相冊圖片
		 $this->data['goodsimg'] = M('goods_images')->where(array('goods_id'=>$id))->getField('image_url',true);


		 //商品规格 spec_goods_price
		$this->specifications($id);


		 //商品属性 goods_attr
        $goods_attr_list = M('GoodsAttr')->where("goods_id = $id")->select(); // 查询商品属性表  
        foreach($goods_attr_list as &$vv){
        	$vv['attr_name'] = M('GoodsAttribute')->where(array('attr_id'=>$vv['attr_id']))->getField('attr_name');
        } 
        $this->data['attr'] = $goods_attr_list;


        //相关推荐
        $this->data['recommend'] = M('goods')->where("store_cat_id2 = ".$goods['store_cat_id2']." or store_cat_id1 = ".$goods['store_cat_id1']."")->order(' RAND()')->limit(4)->select();


        //产品评论
        $comment = M('comment as c')->field('u.head_pic,u.nickname,c.content,c.img,c.goods_rank,c.add_time')->where(array('goods_id'=>$goods['goods_id']))->join('__USERS__ as u on c.user_id=u.user_id')->limit(2)->order('c.add_time desc')->select();
        foreach($comment as &$v){
        	$v['img'] = explode(',', $v['img']);
        	$v['add_time'] = date('Y-m-d H:i:s',$v['add_time']);
        }
        $this->data['comment'] = $comment;
        // dump($this->data['comment']);


	}


	//产品详情页规格
	protected function specifications($goods_id)
	{

		$keys = M('spec_goods_price')->where("goods_id = $goods_id")->getField("GROUP_CONCAT(`key` SEPARATOR '_') ");
		if($keys){
			$keys = str_replace('_', ',', $keys);

			// $spec = M('spec')->field('')->join('__SPEC_item__ as item on __SPEC__.id = item.spec_id')->where('item.id in('.$keys.')')->order('__SPEC__.order');
		$spec = M()->query("SELECT a.name,a.order,b.* FROM __PREFIX__spec AS a INNER JOIN __PREFIX__spec_item AS b ON a.id = b.spec_id WHERE b.id IN($keys) ORDER BY a.order");

		foreach($spec as $key => $val)
	   		{

	   			$filter_spec[$val['name']][] = array(
	   					'item_id'=> $val['id'],
	   					'item'=> $val['item'],
	   					'src'=>$specImage[$val['id']],
	   					'index' => pinyin($val['name'],'utf-8'),

	   			);
	   		}
	   		$item_id = array();
	   		$i == 0;
	   		foreach($filter_spec as $k=>&$v){
	   				foreach($v as $kk=>&$vv){
	   					if($kk == 0){
	   						$item_id[] = $vv['item_id'];//查询默认价格
	   						$vv['checked'] = 1;//默认选中
	   						$str .= pinyin($k,'utf-8').'_'.$vv['item_id'].'&&&';
	   					}
	   				}

	   		}

	   		sort($item_id);
	   		$this->data['items'] = $str;
	   		$this->data['price'] = M('spec_goods_price')->field('store_count,price,key')->where(array('key'=>implode('_',$item_id)))->find();
	   		$this->data['specifications'] = $filter_spec;
	   		// dump($filter_spec);

		}

		
	}

	//计算价格
	public function price()
	{
		$items = I('items');
		// file_put_contents('./test.html', $items);
		$arr = explode('&amp;&amp;&amp;', $items);
		foreach($arr as $k=>$v){
			$s = explode('_', $v);
			$array[$s[0]][] = array(
					'item_id'=>$s['1'],
				);
		}
		foreach($array as $vv){
			if($vv[0]['item_id']){
				$itemarr[] = $vv[0]['item_id'];
			}
		}
		sort($itemarr);
		$this->data['price'] = M('spec_goods_price')->field('store_count,price,key')->where(array('key'=>implode('_',$itemarr)))->find();

	}


	//商品评论
	public function comment($goods_id='1')
	{
		$this->data['comment'] = M('comment')->where(array('goods_id'=>$goods_id))->select();
		
	}




	public function login()
	{
		
	}


	//搜索 /min/index/search/store_id/6/str/测试测试
	public function search()
	{
		$str = I('str');
		$where['goods_name']  = array('like', '%'.$str.'%');
		$where['keywords']  = array('like','%'.$str.'%');
		$where['_logic'] = 'or';
		$map['_complex'] = $where;
		$map['store_id'] = STORE_ID;
		$this->data['goodslist'] = M('goods')->field('goods_id,goods_name,click_count,shop_price,cost_price,original_img,store_cat_id2,comment_count,sales_sum')->where($map)->page($_GET['p'].',20')->select();
	}



}

