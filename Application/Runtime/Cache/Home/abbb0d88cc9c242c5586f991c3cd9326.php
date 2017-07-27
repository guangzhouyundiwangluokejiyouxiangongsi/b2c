<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="/Template/pc/soubao/Static/css/appointment.css">
<title>用户中心-<?php echo ($tpshop_config['shop_info_store_title']); ?></title>
<meta http-equiv="keywords" content="<?php echo ($tpshop_config['shop_info_store_keyword']); ?>" />
<meta name="description" content="<?php echo ($tpshop_config['shop_info_store_desc']); ?>" />
<link rel="stylesheet" href="/Template/pc/soubao/Static/css/common_order.css"></link>
</head>
<style>
    .indexloading{text-align: center; padding-top: 20px}
    .indexloading img{ width:16px; height: 16px }
    .my_card .brand {
    	background: url(../static/images/card_bg.png) 0 -100px no-repeat;
    }
	.related .browse_related_list .slide_box a:hover{ border:0}
	div.informations .in_01 .personal_head img {
	  width: 84px;
	  height: 84px;
	  border: 1px solid #f1f1f1;
	  padding: 2px;
	  border-radius: 50%;
	  -moz-border-radius: 50%;
	  -webkit-border-radius: 50%;
	  behavior: url(iecss3.htc);
	  position:relative;
	  z-index:2;
	}		
</style>
<!-- 头部-s -->
<link href="/Template/pc/soubao/Static/css/common_www.css" rel="stylesheet" type="text/css" />
<link href="/Template/pc/soubao/Static/css/public.css" rel="stylesheet" type="text/css" />
<link href="/Template/pc/soubao/Static/css/default.css" rel="stylesheet" type="text/css" />
<link href="/Template/pc/soubao/Static/css/art_skin_order.css" rel="stylesheet" type="text/css" />
<link href="/Template/pc/soubao/Static/css/common.css" rel="stylesheet" type="text/css" />
<link href="/Template/pc/soubao/Static/css/message.index.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="/Template/pc/soubao/Static/css/minicart.css">
<script  type="text/javascript" src="/Template/pc/soubao/Static/js/jquery-1.9.0.min.js"></script>
<script src="/Public/js/global.js"></script>
<!--[if lt IE 9]>
		<script src="js/html5.js"></script>
		<![endif]-->
<style type="text/css">
#global-topbar .topbar-right #msg_center {
	background: none;
}
.topbar-right #msg_center .tips {
	position: absolute;
	left: -30px;
	top: 28px;
	min-width: 70px;
	max-width: 132px;
	height: 20px;
 *line-height: 19px;
	border-radius: 2px;
	padding: 0px 20px 0 10px;
	background: #666;
	color: #fff;/*display: none;*/
}
#msg_center .tips .tip-cnt {
	color: #fff;
	text-decoration: none;
}
#msg_center .tips .tip-cnt span {
	display: block;
	white-space: nowrap;
	overflow: hidden;
	text-overflow: ellipsis;
}
.tips .tip-t {
	position: absolute;
	left: 72px;
	top: -11px;
	width: 0;
	height: 0;
	font-size: 0;
	border-width: 6px;
	border-style: dashed dashed solid dashed;
	border-color: transparent transparent #666 transparent;
}
.tips .tip-times {
	position: absolute;
	display: block;
	right: 5px;
	top: 0px;
	font-size: 16px;
	font-style: normal;
	color: #bfb5b5;
	cursor: pointer;
}
.tips .tip-times:hover {
	color: #fff;
}
#global-topbar .topbar-right #msg_center .num {
	color: #f00;
}
#show_category {
	float:left
}
.catagories {
	display:none
}
#show_category:hover .catagories {
	display:block
}
.catagory-detail {
	display:none;
	min-height:456px
}
#global-nav .catagories li:hover {
	margin-right: -10px;
	color: #fff;
	background: #f22e00;
}
#global-nav .catagories li:hover h3 {
	color:#FFF
}
#global-nav .catagories li h3 a:hover {
	color:#FFF
}
ul.catagories li:hover:after {
	content:"";
	position:absolute;
	border-right:2px solid #f22e00;
	right:-2px;
	height:30px;
	z-index:199;
}
ul.catagories li:hover .catagory-detail {
	display:block
}
.icon-feiniu:before{
	content:'';
	background-image:none;
	display:none;
}
</style>
<div id="global-topbar">
  <div class="topbar-wrapper clearfix">
    <ul class="topbar-left">
      <li class="dropdown my-location">
        <span class="current-place"></span>
        <i class="icon-location icon-down"></i> </li>
    </ul>
    <ul class="topbar-right" id="topbar-right">
      <li id="wellcome_wording"><a href="<?php echo U('Home/user/index');?>"><?php echo ($user['nickname']); ?></a></li>
      <li id="link_signin" style="display: none;"></li>
      <?php if($user_id > 0): ?><li id="link_signup"><a href="<?php echo U('Home/user/logout');?>" class="signup target_no">[退出]</a></li><?php endif; ?>
      <li><a href="<?php echo U('Home/user/index');?>">我的TPshop</a></li>
      <li><a href="<?php echo U('Home/Article/detail',array('article_id'=>17));?>" target="_blank">帮助中心</a></li>
    </ul>
  </div>
</div>
<div class="wrapper clearfix" id="global-header">
  <div id="hd-banner" class="wrapper"> 
    <!--
		<a href="" target="_blank"><img src="/Template/pc/soubao/Static/images/201602261202471456459367_kk-0.jpg" width="1220" height="60" alt""></a>
	--> 
  </div>
  <div id="headerall" class="wrapper clearfix"> <a href="/" title="首页" class="logohref">
    <h1 id="hd-logo" class="icon-feiniu">
      <img src="<?php echo ($tpshop_config['shop_info_store_logo']); ?>"/>
    </h1>
    </a>
<!--搜索框-->
    <div id="hd-search">
      <div class="search-form">
		<form name="sourch_form" id="sourch_form" method="post" action="<?php echo U("/Home/Goods/search");?>">
		  <input type="text" data-role="input-search" autocomplete="off" class="search-keyword"  name="q" id="q" value="<?php echo ($_POST['search_key']); ?>" placeholder="搜索关键字"/>
          <button class="btn-search" type="submit"onclick="if($.trim($('#q').val()) != '') $('#sourch_form').submit();">搜索</button>
        </form>
      </div>
      <div class="hd-hot-keywords">
        <ul id="hotsearch">
        	<?php if(is_array($tpshop_config["hot_keywords"])): foreach($tpshop_config["hot_keywords"] as $k=>$wd): ?><li><a href="<?php echo U('Home/Goods/search',array('q'=>$wd));?>" <?php if($k == 0): ?>class="ht"<?php endif; ?>><?php echo ($wd); ?></a></li><?php endforeach; endif; ?>          
        </ul>
      </div>
    </div>
<!--搜索框  end -->    
    <!--鼠标移动上去 显示购物车-->
    <div id="hd-my-cart">
      <span class="icon-cart-gwc">
      <span class="quantity col888"><b><em class="cart_quantity"></em></b></span>
      </span>
      <p class="icon-cart-hd">我的购物车</p>
      <div id="show_minicart" style="display:none;">
            <?php if(count($cartList) == 0): ?><div id="content_test">
                  <div id="minicart" class="ui_poptip minicart minicartContent">
                    <div class="ui_poptip_container">
                      <div class="ui_poptip_arrow poptip_up"></div>
                      <div class="ui_poptip_content">
                        <span class="nop emptycart">购物车中没有TPshop商品哟！</span>
                      </div>
                    </div>
                  </div>
                </div>
            <?php else: ?>
                <div id="content_test">
                  <div class="ui_poptip minicart minicartContent" id="minicart">
                    <div class="ui_poptip_container">
                      <div class="ui_poptip_arrow poptip_up"></div>
                      <div class="ui_poptip_content">
                        <div class="mini_product">
                          <p class="mini_tit">最新加入商品</p>
                          <div class="cart_con js_cart_top">
                            <?php if(is_array($cartList)): foreach($cartList as $k=>$v): ?><div class="one_active js_camp_list">
                                <ul class="ul_product   js_cart_pro_list" cart_id="798325">
                                  <li><a class="pdetail" href=""><img src="<?php echo (goods_thum_images($v["goods_id"],60,60)); ?>">
                                    <p>
                                      <span class="name"><?php echo ($v[goods_name]); ?></span>
                                      <span class="price"><em class="symbol">¥</em><?php echo ($v[goods_price]); ?></span>
                                    </p>
                                    </a>
                                    <div class="mini_op">                                    
                                    <a class="delete js_delete" onclick="header_cart_del(<?php echo ($v["id"]); ?>);" href="javascript:void(0);">删除</a>
                                    </div>
                                  </li>
                                </ul>
                              </div><?php endforeach; endif; ?>
                          </div>
                          <div class="mini_total clearfix">
                            <p class="cart_num">共<span class="num" id="total_qty"><?php echo ($cart_total_price[anum]); ?></span>件商品</p>
                            <p class="cart_total">
                              <span class="tit">共计</span>
                              <span class="price"><em class="symbol">¥</em>
                              <span id="total_pay"><?php echo ($cart_total_price[total_fee]); ?></span>
                              </span>
                            </p>
                          </div>
                          <p class="cart_bot"><a class="cart_buy" href="<?php echo U('Home/Cart/cart');?>">去购物车结算</a></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div><?php endif; ?>       
      </div>
    </div>
    <!--鼠标移动上去 显示购物车 end--> 
  </div>
  <div id="header"></div>
</div>
<nav id="global-nav" class="clearfix">
  <div class="wrapper">
    <div id="show_category">
      <span class="catagories-title"><i class="icon"></i><a style="color:#fff;text-decoration:none;" href="javascript:void(0);" >全部商品分类</a></span>
      <ul class="catagories">
        <?php if(is_array($goods_category_tree)): foreach($goods_category_tree as $k=>$v): ?><li cate_id="C24640">
            <span class="icon-drink"></span>
            <h3 class="catagory"><a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v[id]));?>"><?php echo ($v[name]); ?></a></h3>
            <div class="catagory-detail clearfix cate_loading">
              <div class="sub-item J_cate_item hide">
                <div class="col fl">
                  <?php if(is_array($v[tmenu])): foreach($v[tmenu] as $k2=>$v2): if(($k2 % 3) == 0): ?><dl class="fixed">
                        <dt> <a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v2[id]));?>"><?php echo ($v2[name]); ?></a> </dt>
                        <dd>
                          <?php if(is_array($v2[sub_menu])): foreach($v2[sub_menu] as $k3=>$v3): ?><a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v3[id]));?>"><?php echo ($v3[name]); ?></a><?php endforeach; endif; ?>
                        </dd>
                      </dl><?php endif; endforeach; endif; ?>
                </div>
                <div class="col fl">
                  <?php if(is_array($v[tmenu])): foreach($v[tmenu] as $k2=>$v2): if(($k2 % 3) == 1): ?><dl class="fixed">
                        <dt> <a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v2[id]));?>"><?php echo ($v2[name]); ?></a> </dt>
                        <dd>
                          <?php if(is_array($v2[sub_menu])): foreach($v2[sub_menu] as $k3=>$v3): ?><a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v3[id]));?>"><?php echo ($v3[name]); ?></a><?php endforeach; endif; ?>
                        </dd>
                      </dl><?php endif; endforeach; endif; ?>
                </div>
                <div class="col fl">
                  <?php if(is_array($v[tmenu])): foreach($v[tmenu] as $k2=>$v2): if(($k2 % 3) == 2): ?><dl class="fixed">
                        <dt> <a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v2[id]));?>"><?php echo ($v2[name]); ?></a> </dt>
                        <dd>
                          <?php if(is_array($v2[sub_menu])): foreach($v2[sub_menu] as $k3=>$v3): ?><a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v3[id]));?>"><?php echo ($v3[name]); ?></a><?php endforeach; endif; ?>
                        </dd>
                      </dl><?php endif; endforeach; endif; ?>
                </div>
                <div class="col brand fl">
                  <ul class="fixed">
                   <?php if(is_array($v["brand"])): $i = 0; $__LIST__ = $v["brand"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$br): $mod = ($i % 2 );++$i;?><li class="lst" <?php if(($mod) == "1"): ?>even<?php endif; ?>>
	                  	<a href="" target="_blank">
	                  	<img class="nav-prod" src="/Template/pc/soubao/Static/images/loading.gif" alt="" data-images="<?php echo ($br["logo"]); ?>" height="40" width="80"></a>
	                  </li><?php endforeach; endif; else: echo "" ;endif; ?> 
                  </ul>
                  <!--分类商品图片-->
                      <a class="ad mt15" href="<?php echo U('Home/Goods/goodsList',array('id'=>$v[id]));?>"> 
	                      <img src="<?php echo ($v[image]); ?>" height="150" width="210"> 
                      </a> 
                  <!--分类商品图片 end-->                     
                  </div>
              </div>
            </div>
          </li><?php endforeach; endif; ?>
      </ul>
    </div>
    <ul class="horizontal-nav">
      <li is_fresh="0"><a class="" href="/">
        <span>首页</span>
        <i class=""></i></a></li>
      <?php
 $md5_key = md5("SELECT * FROM `__PREFIX__navigation` where is_show = 1 ORDER BY `sort` DESC"); $result_name = $sql_result_v = S("sql_".$md5_key); if(empty($sql_result_v)) { $Model = new \Think\Model(); $result_name = $sql_result_v = $Model->query("SELECT * FROM `__PREFIX__navigation` where is_show = 1 ORDER BY `sort` DESC"); S("sql_".$md5_key,$sql_result_v,1); } foreach($sql_result_v as $k=>$v): ?><li is_fresh="0"> 
          <a <?php if($v[is_new] == 1): ?>target="_blank"<?php endif; ?>href="<?php echo ($v[url]); ?>" >
          <span><?php echo ($v[name]); ?></span>
          <i class=""></i> </a> </li><?php endforeach; ?>
    </ul>
  </div>
</nav>
<script>
/**
* 鼠标移动端到头部购物车上面 就ajax 加载
*/
// 鼠标是否移动到了上方
var header_cart_list_over = 0;
var cart_cn = getCookie('cn');
$("#hd-my-cart").hover(function(){
   $("#show_minicart").show(); // 显示购物车列表			
      if(header_cart_list_over == 1) return false;
       header_cart_list_over = 1;
   		$.ajax({
   			type : "GET",
   			url:"/index.php?m=Home&c=Cart&a=header_cart_list&template=header_cart_list2",//+tab,
   			success: function(data){	
   				//cart_cn = getCookie('cn');
   			 	$("#hd-my-cart > #show_minicart").html(data);							
   			}
   		});	
},function(){
	 (typeof(t) == "undefined") || clearTimeout(t); 	 
	 t = setTimeout(function () { 
			header_cart_list_over = 0; /// 标识鼠标已经离开	        
	  }, 2000);		
      $("#show_minicart").hide();//  隐藏购物车列表
});

$('.cart_quantity').html(cart_cn);
// 购物车 显示隐藏
/*
$("#hd-my-cart").hover(function(){
	$("#show_minicart").show(); // 显示购物车列表	
}).mouseleave(function(){
	$("#show_minicart").hide();//  隐藏购物车列表	
});
*/
// ajax 删除购物车的商品
function header_cart_del(ids)
{
	$.ajax({
		type : "POST",
		url:"<?php echo U('Home/Cart/ajaxDelCart');?>",//+tab,
		data:{ids:ids}, // 
	    dataType:'json',		
		success: function(data){
		  // alert(data.msg);
		   if(data.status == 1)				
			{
				header_cart_list_over = 0; /// 标识鼠标已经离开
				$("#hd-my-cart > .icon-cart-hd").trigger('mouseenter');	 // 无法触发 hover 改为 trigger('mouseenter');//hover修改为mouseenter/mouseleave/mouseover/mouseout
			}
		}
	});
}
</script>
<!-- 头部-e -->
<div class="wrap"> 
  <!-- bread crumbs star -->
  <div class="bread_crumbs"> <a href="<?php echo U('Home/User/index');?>" class="crumbs_font target_no">我的TPshop</a> </div>
  <!-- bread crumbs end --> 
  
  <!--菜单--> 
  <div class="sideBar_nav">
<dl>
  <dt>交易中心 </dt>
  <dd><i class="icon_square"></i><a class="target_no <?php if(strtolower(ACTION_NAME) == 'order_list'): ?>active<?php endif; ?>" href="<?php echo U('Home/User/order_list');?>">我的订单</a></dd>
  <dd><i class="icon_square"></i><a class="target_no <?php if(strtolower(ACTION_NAME) == 'comment'): ?>active<?php endif; ?>" href="<?php echo U('Home/User/comment');?>">我的评价</a></dd>
  <dd><i class="icon_square"></i><a class="target_no <?php if(strtolower(ACTION_NAME) == 'coupon'): ?>active<?php endif; ?>" href="<?php echo U('Home/User/coupon');?>">优惠券</a></dd>
  <dd><i class="icon_square"></i><a class="target_no <?php if(strtolower(ACTION_NAME) == 'account'): ?>active<?php endif; ?>" href="<?php echo U('Home/User/account');?>">我的积分</a></dd>
  <dd><i class="icon_square"></i><a class="target_no <?php if(strtolower(ACTION_NAME) == 'goods_collect'): ?>active<?php endif; ?>" href="<?php echo U('Home/User/goods_collect');?>">我的收藏</a></dd>
  <dd><i class="icon_square"></i><a class="target_no <?php if(strtolower(ACTION_NAME) == 'withdrawals'): ?>active<?php endif; ?>" href="<?php echo U('User/withdrawals');?>">申请提现</a></dd>  
</dl>
<dl>
  <dt>个人中心</dt>
  <dd><i class="icon_square"></i><a class="target_no <?php if(strtolower(ACTION_NAME) == 'info'): ?>active<?php endif; ?>" href="<?php echo U('Home/User/info');?>">个人信息</a></dd>
  <dd><i class="icon_square"></i><a class="target_no <?php if(strtolower(ACTION_NAME) == 'message_notice'): ?>active<?php endif; ?>" href="<?php echo U('Home/User/message_notice');?>">消息通知</a></dd>
  <dd><i class="icon_square"></i><a class="target_no <?php if(strtolower(ACTION_NAME) == 'address_list'): ?>active<?php endif; ?>" href="<?php echo U('Home/User/address_list');?>">地址管理</a></dd>
  <dd><i class="icon_square"></i><a class="target_no <?php if(strtolower(ACTION_NAME) == 'safety_settings'): ?>active<?php endif; ?>" href="<?php echo U('Home/User/safety_settings');?>">安全设置</a></dd>
  <dd><i class="icon_square"></i><a class="target_no <?php if(strtolower(ACTION_NAME) == 'mywallet'): ?>active<?php endif; ?>" href="<?php echo U('Home/User/recharge');?>">我的余额</a></dd>
</dl>
<dl class="service_center">
  <dt>服务中心</dt>
  <dd><i class="icon_square"></i><a class="target_no <?php if(strtolower(ACTION_NAME) == 'return_goods_list'): ?>active<?php endif; ?>" href="<?php echo U('Home/User/return_goods_list');?>">退货管理</a></dd>
</dl>
</div> 
  <!--菜单--> 
  
  <!-- 首页右侧 start -->
  <div class="col_main myfeiniu">
    <div class="informations clearfix">
      <ul>
        <li class="in_01">
          <span id="loadingpic" class="indexloading"> <a class="personal_head   target_no" href="javascript:void(0);"><img width="100" height="100" src="<?php echo ((isset($user["head_pic"]) && ($user["head_pic"] !== ""))?($user["head_pic"]):'/Template/pc/soubao/Static/images/img88.jpg'); ?>"></a> </span>
          <h2>
            <span class="num" id="spanNickname"><?php echo ($user["nickname"]); ?></span>
            <div> <a class="usertitle target_no" href="" >普通会员</a> </div>
            <p id="greeting" class="greeting">您好，欢迎来到TPshop网</p>
          </h2>
        </li>
        <!--                     <li class="in_02"> --> 
        <!--                         <i class="icon_purse"></i> --> 
        <!--                         <dl class="inf_purse"> --> 
        <!--                             <dt class="tips">购物卡余额</dt> --> 
        
        <!--                         </dl> --> 
        <!--                     </li> -->
        <li class="in_02">
          <div id="myQuanBonusBalance"> <i class="icon_line"></i> 
          <a class="target_no" href=""> 
             <i class="icon_yue"></i>
            <span class="label">会员折扣</span>
            <span class="text"><small class="rmb"><?php echo ($user[discount] * 10); ?></small> 折</span>
            <span class="go">&gt;</span>
          </a> 
          </div>
          <div id="myAcctBalance"> 
             <i class="icon_line"></i> 
             <a class="target_no" href=""> 
                 <i class="icon_purse"></i>
                <span class="label">账户余额</span>
                <span class="text"><small class="rmb"><?php echo ($user[user_money]); ?></small> 元</span>
                <span class="go">&gt;</span>
            </a>
            </div>
          <div id="myAvaliableScore"> 
          <i class="icon_line"></i> 
          <a class="target_no" href=""> 
          	<i class="icon_point"></i>
            <span class="label">可用积分</span>
            <span class="text"><small class="rmb"><?php echo ($user[pay_points]); ?></small> 分</span>
            <span class="go">&gt;</span>
          </a>
          </div>
        </li>
        <li class="in_03">
          <div id="loadinguserinfo" class="slide_box J_slide_box">
            <div class="account_security">
              <span class="title">账户安全：</span>
              <div class="progress_bar">
                <div style="width:80%" class="progress"></div>
              </div>
              <span class="security_tips">高</span>
            <!--  <a class="security_up blue target_no" href="https://i.tp-shop.cn/safetySettings/view">强化</a>-->
            </div>
            <ul class="genre clearfix">
              <li>
                <span class="gray"><i class="icon_phone"></i>手机</span>
                <a class="blue target_no" href="<?php echo U('/Home/User/mobile_validate',array('type'=>'mobile','step'=>1));?>">
                    <?php if($user['mobile_validated'] == 0): ?>未绑定<?php else: ?>更换绑定<?php endif; ?>
                </a>
              </li>
              <li>
                <span class="gray"><i class="icon_email"></i>邮箱</span>
                <a class="red target_no" href="<?php echo U('/Home/User/email_validate',array('type'=>'email','step'=>1));?>">
	                <?php if($user['email_validated'] == 0): ?>未绑定<?php else: ?>更换绑定<?php endif; ?>
                </a>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
    <div class="grid_02">
      <div class="middle_infor">
        <div class="order_tips">
          <div class="cell_title clearfix">
            <h2>我的订单</h2>
            <p class="type">
              <a class="target_no" href="<?php echo U('Home/User/order_list',array('type'=>'WAITPAY'));?>"  title="待付款">待付款</a>
              <span class="v_line"></span>
              <a class="target_no" href="<?php echo U('Home/User/order_list',array('type'=>'WAITSEND'));?>" title="待发货">待发货</a>
              <span class="v_line"></span>
              <a class="target_no" href="<?php echo U('Home/User/order_list',array('type'=>'WAITRECEIVE'));?>" title="待收货">待收货</a>
              <span class="v_line"></span>
              <a class="target_no" href="<?php echo U('Home/User/order_list',array('type'=>'WAITCCOMMENT'));?>" title="待评价">待评价</a>
            </p>                        
              <a href="<?php echo U('Home/User/order_list');?>" class="order_viewAll">查看全部订单</a> 
          </div>
          <div class="order_list J_order_list">
          
           <?php
 $md5_key = md5("select * from `__PREFIX__order` where user_id = $user[user_id] order by order_id desc limit 1"); $result_name = $sql_result_v = S("sql_".$md5_key); if(empty($sql_result_v)) { $Model = new \Think\Model(); $result_name = $sql_result_v = $Model->query("select * from `__PREFIX__order` where user_id = $user[user_id] order by order_id desc limit 1"); S("sql_".$md5_key,$sql_result_v,1); } foreach($sql_result_v as $k=>$v): $v = set_btn_order_status($v); ?>
            <?php if(count($v) > 0): ?><!--购买过商品-->
              <table class='paying'>
                <tr class="list_top">
                  <td colspan="3">
                    <div class="f_left order_info">
                      <span class="time num"><?php echo (date("Y-m-d H:i",$v[add_time])); ?></span>
                      <span class="order_No">订单号：<small class="num"><?php echo ($v['order_sn']); ?></small></span>
                    </div>
                    <div class="f_right order_tip">
                      <span class="num">金额：<em class="rmb">￥</em><?php echo ($v['order_amount']); ?></span>                      
                      		<?php if($v["pay_btn"] == 1): ?><a href='<?php echo U('/Home/Cart/cart4',array('order_id'=>$v[order_id]));?>' class="btn_pay">立即付款</a><?php endif; ?>
                      		<?php if($v["receive_btn"] == 1): ?><a onclick="if(confirm('你确定收到货了吗?')) location.href='<?php echo U('Home/User/order_confirm',array('id'=>$v['order_id']));?>'"  class="btn_pay">收货确认</a><?php endif; ?>                      
                     </div>
                  </td>
                </tr>
	           <?php
 $md5_key = md5("select * from `__PREFIX__order_goods` where order_id = $v[order_id]"); $result_name = $sql_result_v2 = S("sql_".$md5_key); if(empty($sql_result_v2)) { $Model = new \Think\Model(); $result_name = $sql_result_v2 = $Model->query("select * from `__PREFIX__order_goods` where order_id = $v[order_id]"); S("sql_".$md5_key,$sql_result_v2,1); } foreach($sql_result_v2 as $k2=>$v2): ?><tr class='list_cont '>
                  <td class="td_01">
                    <div class="list_main clearfix">
                    	<a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$v2[goods_id]));?>" class="J_hover"> <img src="<?php echo (goods_thum_images($v2["goods_id"],80,80)); ?>"></a>
                        <?php echo ($v2["goods_name"]); ?>
                    </div>
                  </td>
                  <td class="td_02">
                    <p><a class="target_no" href="<?php echo U('Home/User/order_detail',array('id'=>$v[order_id]));?>">订单详情</a></p>
                  </td>
                  <td class="td_03">
                    <p><a href='<?php echo U('Home/Goods/goodsInfo',array('id'=>$v2[goods_id]));?>' class="btn-02">再次购买</a></p>
                    <?php if(($v[comment_btn] == 1) and ($v2[is_comment] == 0)): ?><p><a href='<?php echo U('Home/User/comment');?>' class="btn-02">评价</a></p><?php endif; ?>                    
                  </td>
                </tr><?php endforeach; ?> 
                <!-- 预售单处理 -->
              </table>
              <!--购买过商品 end-->
              <?php else: ?>
              <!--未购买过商品-->
              <div class="null">
                <p>您还没购买过商品哟，<a class="blue" title="去逛逛吧！" alt="去逛逛吧！" href="/" target="_blank">去逛逛吧！</a></p>
              </div>
              <!--未购买过商品 end--><?php endif; endforeach; ?> 
            
            
          </div>
        </div>
        <div class="items_collect">
          <h4 class="cell_title">商品收藏</h4>
          <div class="browse_related_list J_slide_parent">
                     
           <?php
 $md5_key = md5("select * from __PREFIX__goods_collect where user_id = $user[user_id] order by collect_id desc limit 3"); $collect_result = $sql_result_item = S("sql_".$md5_key); if(empty($sql_result_item)) { $Model = new \Think\Model(); $collect_result = $sql_result_item = $Model->query("select * from __PREFIX__goods_collect where user_id = $user[user_id] order by collect_id desc limit 3"); S("sql_".$md5_key,$sql_result_item,1); } foreach($sql_result_item as $key=>$item): endforeach; ?>          
            <?php if(count($collect_result) > 0): ?><!--有收藏-->
              <div id="favShow" class="slide_box J_slide_box">
                <ul class="clearfix">
                    <?php if(is_array($collect_result)): foreach($collect_result as $key=>$v): ?><li>                         
                              <a target="_blank" class="items_tit" href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$v[goods_id]));?>">
                              	 <img width="100" height="100" src="<?php echo (goods_thum_images($v["goods_id"],100,100)); ?>">
                              </a>
                          </li><?php endforeach; endif; ?>  
                </ul>
              </div>
              <div class="view_all_order" id="favMore"><a class="target_no" href="<?php echo U('Home/User/goods_collect');?>">查看更多收藏</a></div>
              <!--有收藏 end-->
              <?php else: ?>
              <!--没有收藏-->
              <div class="null">
                <p>您还没收藏商品哟，<a class="blue" title="去逛逛吧！" href="/">去逛逛吧！</a></p>
              </div>
              <!--没有收藏 end--><?php endif; ?>
          </div>
        </div>
        <div class="my_card">
          <h4 class="cell_title">我的优惠券</h4>
          <div class="browse_related_list J_slide_parent">          
           <?php
 $md5_key = md5("select * from __PREFIX__goods_collect where user_id = $user[user_id] order by collect_id desc limit 3"); $coupon_list = $sql_result_item = S("sql_".$md5_key); if(empty($sql_result_item)) { $Model = new \Think\Model(); $coupon_list = $sql_result_item = $Model->query("select * from __PREFIX__goods_collect where user_id = $user[user_id] order by collect_id desc limit 3"); S("sql_".$md5_key,$sql_result_item,1); } foreach($sql_result_item as $key=>$item): endforeach; ?>
            <?php if(count($collect_result) > 0): ?><!--有优惠券-->
              <div id="favShow" class="slide_box J_slide_box">
                <ul class="clearfix">
                 <?php if(is_array($collect_result)): foreach($collect_result as $key=>$v): ?><a target="_blank" class="items_tit" href="<?php echo U('Home/User/coupon');?>">
                         <img width="100" height="100" src="/Template/pc/soubao/Static/images/youhuiquan.jpg">
                      </a><?php endforeach; endif; ?>
                </ul>
              </div>
              <div class="view_all_order" id="cardMore"><a class="target_no" href="<?php echo U('Home/User/coupon');?>">查看更多优惠券</a></div>
              <!--有优惠券-->
              <?php else: ?>
              <!--没有优惠券-->
              <div class="null">
                <p>您还没有优惠券哦.</p>
              </div>
              <!--没有优惠券 end--><?php endif; ?>
          </div>
        </div>
        <div style="clear: both"></div>
        <div class="related">
          <div class="ui_tab">
            <ul class="ui_tab_nav clearfix">
              <li class="active"><a href="">为你推荐</a>
                <span class="v_line" style="display: none;"></span>
              </li>
            </ul>
            <div class="nav_line"></div>
            <div class="ui_tab_content">
              <div class="ui_panel" style="display:block">
                <div class="browse_related_list J_slide_parent" data-scrollNum="4" data-maxNum="4" data-controller="1" data-speed="400" data-index="0"> 
                  <!--为你推荐-->
                  <div id="guessShow" class="slide_box J_slide_box">
                    <ul class="clearfix">
			         <?php
 $md5_key = md5("select * from __PREFIX__goods order by goods_id desc limit 4"); $result_name = $sql_result_v = S("sql_".$md5_key); if(empty($sql_result_v)) { $Model = new \Think\Model(); $result_name = $sql_result_v = $Model->query("select * from __PREFIX__goods order by goods_id desc limit 4"); S("sql_".$md5_key,$sql_result_v,1); } foreach($sql_result_v as $k=>$v): ?><li class="heig_tz">
                          <a class="items_tit items_tz" href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$v[goods_id]));?>">
                                <img width="150" height="150" src="<?php echo (goods_thum_images($v["goods_id"],160,160)); ?>">
                                <span class="items_tit"><?php echo ($v[goods_name]); ?></span>
                                <span class="num"><em class="rmb">￥</em><?php echo ($v[shop_price]); ?></span>                             
                          </a>                      
                      </li><?php endforeach; ?> 
                    </ul>
                  </div>
                  <!--为你推荐 end--> 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="right_infor">
        <div class="fl weixin_box">
          <div class="clearfix in">
            <span class="wxcodes fl"><img src="/Template/pc/soubao/Static/images/qrcode_weixin.png" width="80" height="80"/></span>
            <p class="fl wxtxt">
              <span>下载APP手机端</span>
            </p>
          </div>
        </div>
        <div class="my_cart">
          <h4 class="cell_title">我的购物车</h4>
          <div class="browse_related_list" id="cartShow">
           <?php
 $md5_key = md5("select * from __PREFIX__cart where user_id = $user[user_id] order by id desc limit 8"); $cart_list = $sql_result_item = S("sql_".$md5_key); if(empty($sql_result_item)) { $Model = new \Think\Model(); $cart_list = $sql_result_item = $Model->query("select * from __PREFIX__cart where user_id = $user[user_id] order by id desc limit 8"); S("sql_".$md5_key,$sql_result_item,1); } foreach($sql_result_item as $key=>$item): endforeach; ?>
            <?php if(count($cart_list) > 0): ?><!--购物车有商品-->
              <ul class="clearfix">
               <?php if(is_array($cart_list)): foreach($cart_list as $key=>$v): ?><li>
                       <img width="100" height="100" alt="<?php echo ($v[goods_name]); ?>" src="<?php echo (goods_thum_images($v["goods_id"],100,100)); ?>">
                       <div class="mask">
	                       <a class="items_tit" href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$v[goods_id]));?>">
                                <span class="goods_name"><?php echo ($v[goods_name]); ?></span>
                                <span class="num"><em class="rmb">￥</em><?php echo ($v[member_goods_price]); ?></span>
                            </a>
                        </div>
                    </li><?php endforeach; endif; ?>
              </ul>
              <div class="view_all_order" id="cartMore"><a href="<?php echo U('Home/Cart/cart');?>" title="查看更多">查看更多</a></div>
              <!--购物车有商品 end-->
              <?php else: ?>
              <!--购物车没商品-->
              <div class="null">
                <p>购物车内没有商品，<a class="blue" title="去逛逛吧！" href="/">去逛逛吧！</a></p>
              </div>
              <!--购物车没商品  end--><?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- 首页右侧  end --> 
</div>
<div style="clear: both;"></div>
<!--导入用户中心的底部-->
<footer>
  <div id="ft-service-infr"  class="move-down">
    <div class="wrapper">
      <dl class="contact-infr">
        <dt class="icon-phone"><i class="icon-tel"></i>招商进驻</dt>
        <!--dd>CEO邮箱：<a href="mailto:ceo@feiyu.com" target="_blank">CEO@feiyu.com</a></dd-->
        <dd><a href="<?php echo U('Newjoin/index');?>" target="_blank">商家进驻</a></dd>
	    <dd><a href="<?php echo U('Article/detail',array('article_id'=>19));?>" target="_blank">招商标准</a></dd>
      </dl>
     <?php
 $md5_key = md5("select * from `__PREFIX__article_cat` where parent_id = 2"); $result_name = $sql_result_v = S("sql_".$md5_key); if(empty($sql_result_v)) { $Model = new \Think\Model(); $result_name = $sql_result_v = $Model->query("select * from `__PREFIX__article_cat` where parent_id = 2"); S("sql_".$md5_key,$sql_result_v,1); } foreach($sql_result_v as $k=>$v): ?><dl class="nav-service">
        <dt><?php echo ($v[cat_name]); ?></dt>
        <?php
 $md5_key = md5("select * from `__PREFIX__article` where cat_id = $v[cat_id] and is_open=1"); $result_name = $sql_result_v2 = S("sql_".$md5_key); if(empty($sql_result_v2)) { $Model = new \Think\Model(); $result_name = $sql_result_v2 = $Model->query("select * from `__PREFIX__article` where cat_id = $v[cat_id] and is_open=1"); S("sql_".$md5_key,$sql_result_v2,1); } foreach($sql_result_v2 as $k2=>$v2): ?><dd><a href="<?php echo U('Home/Article/detail',array('article_id'=>$v2[article_id]));?>"><?php echo ($v2[title]); ?></a></dd><?php endforeach; ?>
      </dl><?php endforeach; ?>
    </div>
  </div>
  <div class="wrapper" id="global-footer" style="width: 100%;">
    <p class="copyright">Copyright © 2016-2025 <?php echo ($tpshop_config['shop_info_store_name']); ?>  版权所有 保留一切权利 备案号:<?php echo ($tpshop_config['shop_info_record_no']); ?></p>
    <dl class="authentic">
      <a target="_blank" href="" taregt="_blank"><dd class="sgs"></dd></a>
      <a target="_blank" href="" taregt="_blank"><dd class="zx110"></dd></a>
      <a target="_blank" href="" taregt="_blank"><img src="/Template/pc/soubao/Static/images/time_cnnic.jpg"></a>
      <a target="_blank" href="" taregt="_blank" class="aqlm"><img src="/Template/pc/soubao/Static/images/aqlm.jpg"></a>
    </dl>
  </div>
  <!-- /#global-footer --> 
</footer>
</body>
</html>