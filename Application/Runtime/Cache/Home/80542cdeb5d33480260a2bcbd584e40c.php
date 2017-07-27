<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
  <title>店铺街-<?php echo ($tpshop_config['shop_info_store_title']); ?></title>
  <link rel="stylesheet" href="/Template/pc/soubao/Static/css/stores.css">
  <link rel="stylesheet" href="/Template/pc/soubao/Static/css/Common.css">
  <link rel="stylesheet" href="/Template/pc/soubao/Static/css/page.css">
</head>

<body>
<script type="text/javascript" src="/Public/js/jquery-1.10.2.min.js"></script>
<script src="/Public/js/global.js"></script>
<script src="/Public/js/layer/layer.js"></script> 
<link rel="stylesheet" type="text/css" href="/Template/pc/soubao/Static/css/common.min.css">
<link rel="stylesheet" type="text/css" href="/Template/pc/soubao/Static/css/main.min.css">
<div class="fn-cms-top">
<?php $pid =1;$ad_position = M("ad_position")->cache(true,TPSHOP_CACHE_TIME)->getField("position_id,position_name,ad_width,ad_height");$result = D("ad")->where("pid=$pid  and enabled = 1 and start_time < 1501135200 and end_time > 1501135200 ")->order("orderby desc")->cache(true,TPSHOP_CACHE_TIME)->limit("1")->select(); if(!in_array($pid,array_keys($ad_position)) && $pid) { M("ad_position")->add(array( "position_id"=>$pid, "position_name"=>CONTROLLER_NAME."页面自动增加广告位 $pid ", "is_open"=>1, "position_desc"=>CONTROLLER_NAME."页面", )); delFile(RUNTIME_PATH); } $c = 1- count($result); if($c > 0 && $_GET[edit_ad]) { for($i = 0; $i < $c; $i++) { $result[] = array( "ad_code" => "/Public/images/not_adv.jpg", "ad_link" => "/index.php?m=Admin&c=Ad&a=ad&pid=$pid", "title" =>"暂无广告图片", "not_adv" => 1, "target" => 0, ); } } foreach($result as $key=>$v): $v[position] = $ad_position[$v[pid]]; if($_GET[edit_ad] && $v[not_adv] == 0 ) { $v[style] = "filter:alpha(opacity=50); -moz-opacity:0.5; -khtml-opacity: 0.5; opacity: 0.5"; $v[ad_link] = "/index.php?m=Admin&c=Ad&a=ad&act=edit&ad_id=$v[ad_id]"; $v[title] = $ad_position[$v[pid]][position_name]."===".$v[ad_name]; $v[target] = 0; } ?><div fnp="m-top-banner" style="background:<?php echo ($v["bgcolor"]); ?>;" class="m-top-banner rel editable" moduleId="2010053" style="position:relative;min-height:35px;">
	 <div class="bar container">
	 	<a class="img-small" <?php if($v['target'] == 1): ?>target="_blank"<?php endif; ?> href="<?php echo ($v["ad_link"]); ?>"> <img class="img100" src="<?php echo ($v[ad_code]); ?>"  title="<?php echo ($v[title]); ?>" style="<?php echo ($v[style]); ?>"/></a>   
	 </div>
	 <i data-role="close" class="icon icon-close"></i>
</div><?php endforeach; ?>
<div class="m-top-bar editable" moduleId="1539923" style="position:relative;min-height:25px;">
  <div class="container">
    <ul class="fl">
      <li class="fl J_login_status dn nologin">
      	<a class="menu-item fl J_do_login J_chgurl" href="<?php echo U('Home/user/login');?>">
        <span>Hi，请登录</span> </a><a class="menu-item fl ht" href="<?php echo U('Home/user/reg');?>">免费注册</a>
      </li>
      <li class="fl J_login_status dn islogin"><a href="<?php echo U('Home/user/index');?>" class="userinfo" title="" target="_self"></a>
      	<a href="<?php echo U('Home/user/logout');?>" style="margin:0 10px;" title="退出" target="_self">退出</a></li>
      <li class="fl sep"></li>
      <!-- 
      <li class="fl select-city dropdown">
        <span class="menu-item">
        <span>送货至：</span>
        <a title="" alt="" href="" class="J_cur_place"></a><i class="dd"></i></span>
      </li>-->
    </ul>
    <ul class="fr bar-right">
      <li class="fl dropdown my-feiniu"><a class="menu-item" target="_blank" href="<?php echo U('Home/Newjoin/index');?>">
        <span>商家入驻</span><i class="dd"></i></a>
        <ul class="sub-panel">
          <li><a class="J_chgurl" target="_blank" href="<?php echo U('/seller/Admin/login');?>">商家登录</a></li>
        </ul>
      </li>
      <li class="fl dropdown my-feiniu"><a class="menu-item" target="_blank" href="<?php echo U('/Home/User/index');?>">
        <span>我的商城</span>
        <i class="dd"></i></a>
        <ul class="sub-panel">
          <li><a class="J_chgurl" target="_blank" href="<?php echo U('/Home/User/order_list');?>">我的订单</a></li>
          <li><a class="J_chgurl" target="_blank" href="<?php echo U('/Home/User/account');?>">我的积分</a></li>
          <li><a class="J_chgurl" target="_blank" href="<?php echo U('/Home/User/coupon');?>">我的优惠券</a></li>
          <li><a class="J_chgurl" target="_blank" href="<?php echo U('/Home/User/goods_collect');?>">我的收藏夹</a></li>
          <li><a class="J_chgurl" target="_blank" href="<?php echo U('/Home/User/comment');?>">我的评论</a></li>
        </ul>
      </li>
      <li class="fl sep"></li> 
      <li class="fl dropdown mobile-feiniu"><a class="menu-item" href=""><i class="fl ico"></i>
        <span class="fl">手机TPshop网</span>
        <i class="dd"></i></a>
        <div class="sub-panel m-lst">
          <p>扫一扫，下载TPshop客户端</p>
          <dl>
            <dt class="fl mr10"><a target="_blank" href=""><img height="80" width="80" src="/Template/pc/soubao/Static/images/qrcode_vmall_app01.png"></a></dt>
            <dd class="fl mb10"><a target="_blank" href=""><i class="andr"></i> Andiord</a></dd>
            <dd class="fl"><a target="_blank" href=""><i class="iph"></i> iPhone</a></dd>
          </dl>
        </div>
      </li>
      <li class="fl sep"></li>
      <li class="fl"><a class="menu-item" href="<?php echo U('Home/Article/detail',array('article_id'=>17));?>" target="_blank">
        <span>帮助中心</span></a></li>
      <li class="fl sep"></li>
      <li class="fl about-us"><a class="txt fl" style="line-height:unset;" href="">关注我们：</a></li>
      <li class="fl dropdown weixin"><a href="" class="fl ico"></a>
        <div class="sub-panel wx-box">
          <span class="arrow-b">◆</span>
          <span class="arrow-a">◆</span>
          <p class="n"> 扫描二维码 <br>	关注TPshop网官方微信 </p>
          <img src="/Template/pc/soubao/Static/images/qrcode_vmall_app01.png"></div>
      </li>
    </ul>
  </div>
</div>


<div class="m-top-sidebar m-sdb-sale J-sdb " moduleId="2026855" style="z-index:401;" fnp="m-top-sidebar">
  <div class="t-main">
    <div class="tb-tabs">
      <div class="tb-tabs-up">
      	<a href="<?php echo U('Home/Cart/cart');?>" class="i-cart" data-role="ico-cart">
        <span class="text">购物车</span><span id ="miniCartRightQty" class="num"></span></a>
        <a href="<?php echo U('/Home/User/order_list');?>" target="_blank" class="i-ico i-ico-order" data-role="ico-btn">
        <span>我的订单</span><i class="demo-icon">&#xe807;</i></a>
        <a href="<?php echo U('/Home/User/coupon');?>" target="_blank" class="i-ico i-ico-coupon" data-role="ico-btn">
        <span>我的优惠券</span><i class="demo-icon">&#xe80f;</i></a>
        <a href="<?php echo U('/Home/User/goods_collect');?>" target="_blank" class="i-ico i-ico-fav" data-role="ico-btn">
        <span>我的收藏</span><i class="demo-icon">&#xe808;</i></a>
        <a href="<?php echo U('/Home/User/comment');?>" target="_blank" class="i-ico i-ico-foot" data-role="ico-btn">
        <span>我的评论</span><i class="demo-icon">&#xe805;</i></a>
      </div>
      <div class="tb-tabs-down">
        <a href="" target="_blank" class="i-ico i-ico-ur" data-role="ico-btn">
        <span>意见反馈</span>
        <i></i></a><a href="" class="i-ico i-ico-gotop" data-role="ico-gotop"><em></em>
        <span>返回顶部</span>
        <i></i></a></div>
      <div class="my-cart-shim"></div>
    </div>
    <div class="my-cart">
      <div class="mn-c-top" ><a href="<?php echo U('Home/Cart/cart');?>">我的购物车</a><i data-role="cart-close-btn"></i></div>
      <div class="sub-panel u-fn-cart u-mn-cart">
        <div id="miniCartRight"></div>
        <div class="empty-c fn-hide">
          <span class="ma"><i class="c-i oh"></i>购物车中没有TPshop商品哟！</span>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="m-top-search editable" moduleId="1539927" style="position:relative;min-height:35px;">
  <div class="container">
    <div class="logo fl">
    	<a href="/" target="_blank" class="item fl"><img height="60" width="160" src="<?php echo ($tpshop_config['shop_info_store_logo']); ?>"></a>
    	<!-- <a href="" target="_blank" class="item fl"><img height="60" width="140" src="/Template/pc/soubao/Static/images/csmrrvbluvoamtx8aaeoswlm7gg007.gif"></a>-->
    </div>
    <div fnp="m-top-search-form" class="m-top-search-form fl">
     <form name="sourch_form" id="sourch_form" method="post" action="<?php echo U("/Home/Goods/search");?>">
        <div data-role="form-inner" class="s-form"><i class="s-ico"></i>         
		 <input type="text" data-role="input-search" autocomplete="off" class="fl s-input" name="q" id="q" value="<?php echo I('q'); ?>" placeholder="搜索关键字"/>
          <a data-role="btn" href="javascript:void(0);" class="s-btn fl" onclick="if($.trim($('#q').val()) != '') $('#sourch_form').submit();">搜索</a>
        </div>
        <div class="s-hotword">
        	<?php if(is_array($tpshop_config["hot_keywords"])): foreach($tpshop_config["hot_keywords"] as $k=>$wd): ?><a href="<?php echo U('Home/Goods/search',array('q'=>$wd));?>" <?php if($wd == I('q')): ?>class="ht"<?php endif; ?>><?php echo ($wd); ?></a><?php endforeach; endif; ?>
        </div>
        <ul data-role="tip-list" class="s-tip-list">
        </ul>
      </form>
    </div>
    <div class="my-cart fr" id="hd-my-cart">
      <p class="c-n fl">我的购物车</p>
      <p class="c-num fl quantity">(<span class="count cart_quantity" id="cart_quantity"></span>) <i class="i-c oh"></i></p>
      <div id="show_minicart" class="sub-panel u-fn-cart u-mn-cart">
        <div id="minicart" class="minicartContent">

        </div>
      </div>
    </div>
  </div>
</div>

<div class="m-top-nav editable" moduleId="1539926" style="position:relative;min-height:35px;">
  <div class="main-container new-year">
    <div class="main-title-wrap"><a href="" target="_blank" class="main-title">
      <span class="ico"><i class="il il-lt"></i><i class="il il-lc"></i><i class="il il-lb"></i>
      <i class="il il-rt"></i><i class="il il-rc"></i><i class="il il-rb"></i></span>商城商品分类</a>
      <!--  <div class="nav-list" fnp="nav-list">
        <ul class="nav-list-warpper">
        </ul>
      </div>-->
    </div>
     
    <ul class="main-nav">
      <li class="nav-item"><a class="menu-item <?php if( CONTROLLER_NAME == 'Index' ): ?>menu-item-active"<?php endif; ?> target="_blank" href="/" style="overflow: visible;">首页 </a></li>
      <?php
 $md5_key = md5("SELECT * FROM `__PREFIX__navigation` where is_show = 1 ORDER BY `sort` DESC"); $result_name = $sql_result_v = S("sql_".$md5_key); if(empty($sql_result_v)) { $Model = new \Think\Model(); $result_name = $sql_result_v = $Model->query("SELECT * FROM `__PREFIX__navigation` where is_show = 1 ORDER BY `sort` DESC"); S("sql_".$md5_key,$sql_result_v,1); } foreach($sql_result_v as $k=>$v): ?><li class="nav-item"><a  style="overflow: visible;"   href="<?php echo ($v[url]); ?>" 
       		<?php  if($_SERVER['REQUEST_URI']==str_replace('&amp;','&',$v[url])){ echo "class='menu-item menu-item-active'";} else{ echo "class='menu-item'"; } ?>> <?php echo ($v[name]); ?> </a></li><?php endforeach; ?>
      <li class="nav-item"><a class="menu-item "  href="javascript:void();" style="overflow: visible;">TPshop商城<i class="e-hot"></i></a></li>
    </ul>     
    </div>
</div>
<div>
  <div class="J_side_nav_trigger"></div>
</div>
</div>
<script type="text/javascript"> 
$(document).ready(function(){
	get_cart_num();
	var uname= getCookie('uname');
	if(uname == ''){
		$('.islogin').remove();
		$('.nologin').show();
	}else{
		$('.nologin').remove();
		$('.islogin').show();
		$('.userinfo').html(decodeURIComponent(uname));
	}
});

function get_cart_num(){
   var cart_cn = getCookie('cn');
   if(cart_cn == ''){
	$.ajax({
		type : "GET",
		url:"/index.php?m=Home&c=Cart&a=header_cart_list",//+tab,
		success: function(data){								 
			cart_cn = getCookie('cn');
			$('#cart_quantity').html(cart_cn);					
		}
	});	
  }
  $('#cart_quantity').html(cart_cn);
  $('#miniCartRightQty').html(cart_cn);
}
</script>
<div class="margin-w1210">
  <div class="flow">
    <div class="cate_attr clearfix">
      <div class="nav-tag">
        <h5 class="filter-label-ab">分类</h5>
        <div class="cate_attr_con">
          <div class="filter-all-ab"> <a class="selected" target="_self" href="<?php echo U('Home/Index/street');?>"><span>全部</span></a> </div>
          <div class="district-tab">
            <?php if(is_array($store_class)): $i = 0; $__LIST__ = $store_class;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sc): $mod = ($i % 2 );++$i;?><a target="_self" href="<?php echo U('Home/Index/street',array('sc_id'=>$sc['sc_id']));?>"><span><?php echo ($sc['sc_name']); ?></span></a><?php endforeach; endif; else: echo "" ;endif; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="flow-wrap">
      <?php if(is_array($store_list)): $i = 0; $__LIST__ = $store_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$scl): $mod = ($i % 2 );++$i;?><div class="flow-item first">
          <a href="<?php echo U('Home/Store/index',array('store_id'=>$scl['store_id']));?>" class="flow-datu" title="L&amp;L">
            <img title="L&amp;L" width="150" height="150" alt="" src="<?php echo ($scl['store_logo']); ?>">
          </a>
          <div class="flow-content">
            <h4 class="flow-title"> <a href="<?php echo U('Home/Store/index',array('store_id'=>$scl['store_id']));?>" title="<?php echo ($scl['store_name']); ?>"><span><?php echo ($scl['store_name']); ?></span></a>
              <span class="guanzhu" id="favoriteStore" data-id=<?php echo ($scl['store_id']); ?>>关注</span>
            </h4>
            <p class="flow-logo">
              <a href="<?php echo U('Home/Store/index',array('store_id'=>$scl['store_id']));?>" style="float:none; display:inline-block;">
                <img id="j_logo_5" alt="" width="90" height="45" src="<?php echo ((isset($scl['store_banner']) && ($scl['store_banner'] !== ""))?($scl['store_banner']):'/Template/pc/soubao/Static/images/57c7ed6bcc96f.jpg'); ?>">
              </a>
            </p>
            <p class="flow-desc"> <span>卖家：</span>
              <a href="supplier.php?suppId=5" title="<?php echo ($scl['store_name']); ?>管理员" target="_blank"></a>
              <a href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo ($scl['store_qq']); ?>&amp;site=qq&amp;menu=yes" target="_blank" alt="点击这里联系我" title="点击这里联系我" class="flow-qq">
                <img src="/Template/pc/soubao/Static/images/button_old_41.gif" height="16" border="0" alt="QQ"> </a>
              <a href="http://amos1.taobao.com/msg.ww?v=2&amp;uid=<?php echo ($scl['store_aliwangwang']); ?>&amp;s=2" target="_blank" class="flow-qq">
                <img src="/Template/pc/soubao/Static/images/T1B7m.XeXuXXaHNz_X-16-16.gif" width="16" height="16" border="0" alt="淘宝旺旺">
              </a>
            </p>
            <p class="flow-desc"> <span>所在地：</span><?php echo ($scl['province_name']); ?>,<?php echo ($scl['city_name']); ?>,<?php echo ($scl['district_name']); ?> </p>
            <p class="flow-desc"> <a href="<?php echo U('Home/Store/index',array('store_id'=>$scl['store_id']));?>" title="进入店铺，查看所有的商品">共<strong><?php echo ($scl['goods_array']['goods_count']); ?></strong>件宝贝&gt;&gt;</a> </p>
          </div>
          <div class="flow-score">
            <h3>店铺动态评分</h3>
            <p>描述相符：<span><?php echo ($scl['store_desccredit']); ?></span></p>
            <p>服务态度：<span><?php echo ($scl['store_servicecredit']); ?></span></p>
            <p>发货速度：<span><?php echo ($scl['store_deliverycredit']); ?></span></p>
          </div>
          <div class="flow-main flow-main1">
            <div class="picMarquee-left">
              <div class="bda">
                <div class="picListta">
                  <ul>
                    <?php if(is_array($scl['goods_array']['goods_list'])): $i = 0; $__LIST__ = $scl['goods_array']['goods_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goods): $mod = ($i % 2 );++$i;?><li>
                        <a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$goods['goods_id']));?>"
                           title="<?php echo ($goods['goods_name']); ?>" target="_blank" class="img">
                          <img src="<?php echo (goods_thum_images($goods['goods_id'],112,112)); ?>"> <span>￥<?php echo ($goods['shop_price']); ?></span>
                        </a>
                        <a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$goods['goods_id']));?>" title="<?php echo ($goods['goods_name']); ?>" target="_blank" class="name"><?php echo ($goods['goods_name']); ?></a>
                      </li><?php endforeach; endif; else: echo "" ;endif; ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
<div class="mui-page">
        <div class="mui-page-wrap">
          <div class="operating fixed" id="bottom">
            <div class="fn_page clearfix">
              <?php echo ($page); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="fn-cms-footer">
  <div class="m-footer-g">
    <div class="footer-map">
      <ul class="fn-clear">
        <li class="map"><i class="footer-icon z-icon"></i><strong class="tit">正品低价</strong><br/>
          <span class="desc">正品行货 品质保障</span>
        </li>
        <li class="line"></li>
        <li class="map"><i class="footer-icon q-icon"></i><strong class="tit">品类齐全</strong><br/>
          <span class="desc">品类齐全 选择丰富</span>
        </li>
        <li class="line"></li>
        <li class="map"><i class="footer-icon k-icon"></i><strong class="tit">快速配送</strong><br/>
          <span class="desc">多仓直发 极速配送</span>
        </li>
        <li class="line"></li>
        <li class="map"><i class="footer-icon t-icon"></i><strong class="tit">售后无忧</strong><br/>
          <span class="desc">7天无理由退货</span>
        </li>
      </ul>
    </div>
    <div class="server-list">
      <ul class="fn-clear">
	    <?php
 $md5_key = md5("select * from `__PREFIX__article_cat` where parent_id = 2"); $result_name = $sql_result_v = S("sql_".$md5_key); if(empty($sql_result_v)) { $Model = new \Think\Model(); $result_name = $sql_result_v = $Model->query("select * from `__PREFIX__article_cat` where parent_id = 2"); S("sql_".$md5_key,$sql_result_v,1); } foreach($sql_result_v as $k=>$v): ?><li><i class="list-icon icon<?php echo ($k+1); ?>"></i>
          <dl class="list-item">
            <dt><?php echo ($v[cat_name]); ?></dt>
            <?php
 $md5_key = md5("select * from `__PREFIX__article` where cat_id = $v[cat_id]  and is_open=1"); $result_name = $sql_result_v2 = S("sql_".$md5_key); if(empty($sql_result_v2)) { $Model = new \Think\Model(); $result_name = $sql_result_v2 = $Model->query("select * from `__PREFIX__article` where cat_id = $v[cat_id]  and is_open=1"); S("sql_".$md5_key,$sql_result_v2,1); } foreach($sql_result_v2 as $k2=>$v2): ?><dd><a href="<?php echo U('Home/Article/detail',array('article_id'=>$v2[article_id]));?>"><?php echo ($v2[title]); ?></a></dd><?php endforeach; ?>
          </dl>
        </li><?php endforeach; ?>
        <li class="app-item">
          <p>TPshop官网</p>
          <img width="90" height="90" title="" alt="TPshop网客户端" src="/Template/pc/soubao/Static/images/qrcode_vmall_app01.png">
        </li>
      </ul>
    </div>
    <div class="site-info">
      <div class="foot-nav">
        <?php
 $md5_key = md5("select * from `__PREFIX__article` where cat_id = 5 and is_open=1"); $result_name = $sql_result_v = S("sql_".$md5_key); if(empty($sql_result_v)) { $Model = new \Think\Model(); $result_name = $sql_result_v = $Model->query("select * from `__PREFIX__article` where cat_id = 5 and is_open=1"); S("sql_".$md5_key,$sql_result_v,1); } foreach($sql_result_v as $k=>$v): ?><a href="<?php echo U('Home/Article/detail',array('article_id'=>$v[article_id]));?>" target="_blank"><?php echo ($v[title]); ?></a>|<?php endforeach; ?>
	      <a href="<?php echo U('Newjoin/index');?>" target="_blank">商家入驻</a>| 
	      <a href="<?php echo U('Article/detail',array('article_id'=>19));?>" target="_blank">招商标准</a>| 
	      <a href="" style="cursor:default;text-decoration:none;">客服热线 <?php echo ($tpshop_config['shop_info_phone']); ?></a>
	  </div>
      <div class="link">
        <p>
        Copyright © 2016-2025 <?php echo ($tpshop_config['shop_info_store_name']); ?>  版权所有 保留一切权利 备案号:<?php echo ($tpshop_config['shop_info_record_no']); ?>
        
        <!--您好,请您给TPshop留个友情链接-->
        &nbsp;&nbsp;<a href="http://www.tp-shop.cn/">TPshop开源商城</a>
        <!--您好,请您给TPshop留个友情链接-->         
        </p>
      </div>
      <div class="inline-box logowall"><a href="" class="item shgs" target="_blank"></a><a href="" class="item shwl" target="_blank"></a><a href="" class="item cxwz" target="_blank"></a><a href="" class="item kxwz" target="_blank"></a><a href="" class="item hyyz" target="_blank"></a></div>
    </div>
  </div>
</div>
<script type="text/javascript" src="/Template/pc/soubao/Static/js/jquery.lazyload.js"></script>
<script type="text/javascript" src="/Template/pc/soubao/Static/js/common.js"></script>
<script type="text/javascript">
  //收藏店铺
  $('.guanzhu').click(function () {
    if (getCookie('user_id') == '') {
      pop_login();
    } else {
      $.ajax({
        type: 'post',
        dataType: 'json',
        data: {store_id: $(this).attr('data-id')},
        url: "<?php echo U('Home/Store/collect_store');?>",
        success: function (res) {
          if (res.status == 1) {
            layer.msg('成功添加至收藏夹', {icon: 1});
          } else {
            layer.msg(res.msg, {icon: 3});
          }
        }
      });
    }
  });
  function pop_login(){
    layer.open({
      type: 2,
      title: '<b>登陆TPshop网</b>',
      skin: 'layui-layer-rim',
      shadeClose: true,
      shade: 0.5,
      area: ['490px', '460px'],
      content: "<?php echo U('Home/User/pop_login');?>",
    });
  }
</script>
</html>