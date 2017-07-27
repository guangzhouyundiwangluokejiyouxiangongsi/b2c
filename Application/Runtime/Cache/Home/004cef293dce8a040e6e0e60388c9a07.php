<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html id="ng-app">
<head lang="zh">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=8">
<title>购物车-<?php echo ($tpshop_config['shop_info_store_title']); ?></title>
<meta http-equiv="keywords" content="<?php echo ($tpshop_config['shop_info_store_keyword']); ?>" />
<meta name="description" content="<?php echo ($tpshop_config['shop_info_store_desc']); ?>" />
<link href="/Template/pc/soubao/Static/css/common.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="/Template/pc/soubao/Static/css/jh.css">
<script src="/Public/js/jquery-1.8.2.min.js"></script>
<script src="/Public/js/global.js"></script>
<script src="/Public/js/pc_common.js"></script>
<script src="/Public/js/layer/layer.js"></script>
</head>
<body class="ng-scope">
<!-- 头部顶栏 start [[--> 
<div class="m-top-bar editable" moduleid="1539923" style="position:relative;min-height:25px;">
  <div class="container">
    <ul class="fl">
      <?php if($user[user_id] > 0): ?><li class="fl J_login_status"><a href="<?php echo U('Home/user/index');?>" alt="" title="" target="_self"><?php echo ($user['nickname']); ?></a>
      	<a  href="<?php echo U('Home/user/logout');?>" style="margin:0 10px;" title="退出" target="_self">退出</a></li>
      </li>
      <?php else: ?>
      	<li class="fl J_login_status"><a class="menu-item fl J_do_login J_chgurl" href="<?php echo U('Home/user/login');?>">
        <span>Hi，请登录</span> </a><a class="menu-item fl ht" href="<?php echo U('Home/user/reg');?>">免费注册</a><?php endif; ?>
      <li class="fl sep"></li>
      <li class="fl select-city dropdown">
        <span class="menu-item">
        <span>送货至：</span>
        <a title="" alt="" href="" class="J_cur_place"></a><i class="dd"></i></span>
      </li>
    </ul>
    <ul class="fr bar-right">
      <li class="fl dropdown my-feiniu"><a class="menu-item" target="_blank" href="">
        <span>我的商城</span><i class="dd"></i></a>
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
      <li class="fl"><a class="menu-item" href="" target="_blank">
        <span>帮助中心</span>
        </a></li>
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
<!-- 头部顶栏 end ]]-->
<div class="fn-cart-clearing">
  <div class="wrapper1190" my-cart=""> 
    <!-- cart-title -->
    <div class="order-header">
      <div class="layout after">
        <div class="fl">
          <div class="logo pa-to-36 wi345"> <a href="/"><img src="/Template/pc/soubao/Static/images/newLogo.png" alt=""></a> </div>
        </div>
        <div class="fr">
          <div class="pa-to-36 progress-area">
            <div class="progress-area-wd"></div>
            <div class="progress-area-tx" style="display:none"></div>
            <div class="progress-area-cg" style="display:none"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- end cart-title -->        
    <div class="ui_tab"> 
      <!-- ngIf: !status.overseasEmpty -->
      <div class="ui_tab_content">
        <div class="clearing-c cart-content">
          <div class="layout after-ta">
            <div class="sc-list">
              <form name="cart_form" id="cart_form" action="/index.php/Home/Cart/ajaxCartList.html">
                <div id="ajax_return"> </div>
              </form>
              <div class="sc-acti-list ma-to-20 ma-bo-135"> <a class="gwc-jxgw" href="javascript:history.go(-1);">继续购物</a> 
              		<a class="gwc-qjs" href="javascript:void(0)" data-url="<?php echo U('Home/Cart/cart2');?>">去结算</a> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="clearing-recommend wrapper1190"> 
      <!-- 为您推荐 --> 
      <!-- ngIf: specialOfferTips -->
      <div class="cr-block-01 cr-block-preferbuy ng-scope ng-isolate-scope" my-tab-view="" ng-if="specialOfferTips" data-tips="specialOfferTips" data-type="1" data-selected="&#39;specialOffer&#39;">
        <div class="cr-title" data-ys="0">
          <ul class="fn-tab-nav fn-fl">
            <li class="ng-scope"><a class="ng-binding titleon">为您推荐</a></li>
          </ul>          
        </div>
        <div class="cr-list-out ng-isolate-scope" data-is-show="true" data-type="1" data-index="tabData.listIndex" data-show-close-btn="false" data-extra-class="">
          <div class="cr-list fixed">
            <div class="slide-wrapper ng-scope" ng-switch-default="">
              <ul ng-repeat="list in itemList" ng-show="index == $index" class="ng-scope">
			   <?php
 $md5_key = md5("select * from `__PREFIX__goods` where  is_recommend = 1 limit 10"); $result_name = $sql_result_v = S("sql_".$md5_key); if(empty($sql_result_v)) { $Model = new \Think\Model(); $result_name = $sql_result_v = $Model->query("select * from `__PREFIX__goods` where  is_recommend = 1 limit 10"); S("sql_".$md5_key,$sql_result_v,1); } foreach($sql_result_v as $k=>$v): ?><li ng-repeat="item in list" class="ng-scope">
                  <a href="<?php echo U('/Home/Goods/goodsInfo',array('id'=>$v[goods_id]));?>"><img ng-src="<?php echo (goods_thum_images($v["goods_id"],80,80)); ?>" alt="<?php echo ($v[goods_name]); ?>" src="<?php echo (goods_thum_images($v["goods_id"],80,80)); ?>"></a>
                  <p><a class="ng-binding" href="<?php echo U('/Home/Goods/goodsInfo',array('id'=>$v[goods_id]));?>"><?php echo ($v[goods_name]); ?></a></p>
                  <div class="div-01">
                  	<em>¥</em>
                    <span  class="ng-binding"><?php echo ($v[shop_price]); ?></span>
                  </div>
                  <button class="btn add2cart" ng-click="addGood(item)" type="button" onclick="javascript:AjaxAddCart(<?php echo ($v["goods_id"]); ?>,1,0);">加入购物车</button>
                </li><?php endforeach; ?>
              </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- footer start [[--> 
<!-- footer start [[-->
<div class="foot">
          <div class="foot-box container fn-clear fixed">
    <dl class="foot-item foot-phone">
              <dt><?php echo ($tpshop_config['shop_info_phone']); ?></dt>
              <!--<dd>CEO邮箱：ceo@tp-shop.cn</dd>-->
              <dd>客服邮箱：673964249@qq.com</dd>
            </dl>
	    <?php
 $md5_key = md5("select * from `__PREFIX__article_cat` where parent_id = 2"); $result_name = $sql_result_v = S("sql_".$md5_key); if(empty($sql_result_v)) { $Model = new \Think\Model(); $result_name = $sql_result_v = $Model->query("select * from `__PREFIX__article_cat` where parent_id = 2"); S("sql_".$md5_key,$sql_result_v,1); } foreach($sql_result_v as $k=>$v): ?><dl class="foot-item foot-list">
              <dt class=""><?php echo ($v[cat_name]); ?></dt>
              <?php
 $md5_key = md5("select * from `__PREFIX__article` where cat_id = $v[cat_id]"); $result_name = $sql_result_v2 = S("sql_".$md5_key); if(empty($sql_result_v2)) { $Model = new \Think\Model(); $result_name = $sql_result_v2 = $Model->query("select * from `__PREFIX__article` where cat_id = $v[cat_id]"); S("sql_".$md5_key,$sql_result_v2,1); } foreach($sql_result_v2 as $k2=>$v2): ?><dd><a target="_blank" href="<?php echo U('Home/Article/detail',array('article_id'=>$v2[article_id]));?>"><?php echo ($v2[title]); ?></a></dd><?php endforeach; ?>
	        </dl><?php endforeach; ?>  
    <dl class="foot-item foot-attention">
              <dd>
        <div class="att-weixin"> <img src="/Template/pc/soubao/Static/images/weixin.png" width="85" height="85"> </div>
        <p>TPshop网微信</p>
      </dd>
              <dd>
        <div class="att-client"> <img src="/Template/pc/soubao/Static/images/app.png" width="85" height="85"> </div>
        <p>TPshop网客户端</p>
      </dd>
            </dl>
  </div>
  <div class="foot-info container">
    <p>Copyright <em>©</em> 2016-2025 <?php echo ($tpshop_config['shop_info_store_name']); ?>  版权所有 保留一切权利 备案号:<?php echo ($tpshop_config['shop_info_record_no']); ?></p> 
    <ul class="foot-chop">
              <!--			<li class="icbc">
							<a href="" target="_blank"></a>
						</li>
						<li class="alipay">
							<a href="" target="_blank"></a>
						</li>
						<li class="unionpay">
							<a href="" target="_blank"></a>
						</li>
						<li class="tenpay">
							<a href="" target="_blank"></a>
						</li>-->
              <li class="gongshang"> <a href="" target="_blank"></a> </li>
              <li class="sh-letter"> <a href="" target="_blank"></a> </li>
              <li class="honesty"> <a href="" target="_blank"></a> </li>
              <li> <a href="" target="_blank"> <img src="/Template/pc/soubao/Static/images/time_cnnic.jpg"> </a> </li>
              <li> <a href="" target="_blank"> <img src="/Template/pc/soubao/Static/images/aqlm.jpg"> </a> </li>
            </ul>
  </div>
</div>
<script type="text/javascript" src="/Template/pc/soubao/Static/js/jquery.lazyload.js"></script>
<script src="/Public/js/global.js"></script>
<script type="text/javascript" src="/Template/pc/soubao/Static/js/common.js"></script>
<!-- footer end ]]--> 
<!-- footer end ]]--> 
<script>

$(document).ready(function(){			
	ajax_cart_list(); // ajax 请求获取购物车列表
});

// ajax 提交购物车
var before_request = 1; // 上一次请求是否已经有返回来, 有才可以进行下一次请求
function ajax_cart_list(){

	if(before_request == 0) // 上一次请求没回来 不进行下一次请求
	    return false;
	before_request = 0;

	
	$.ajax({
		type : "POST",
		url:"<?php echo U('Home/Cart/ajaxCartList');?>",//+tab,
		data : $('#cart_form').serialize(),// 你的formid
		success: function(data){
			$("#ajax_return").empty().append(data);
			before_request = 1;			
		}
	});
}

/**
* 购买商品数量加加减减
* 购买数量 , 购物车id , 库存数量
*/
function switch_num(num,cart_id,store_count)
{
	var num2 = parseInt($("input[name='goods_num["+cart_id+"]']").val());
	num2 += num;
	if(num2 < 1) num2 = 1; // 保证购买数量不能少于 1
	if(num2 > store_count) 
	{   alert("库存只有 "+store_count+" 件, 你只能买 "+store_count+" 件");
		num2 = store_count; // 保证购买数量不能多余库存数量		
	}

	$("input[name='goods_num["+cart_id+"]']").val(num2);

	ajax_cart_list(); // ajax 更新商品价格 和数量
}


/**  全选 反选 **/				
function check_all()
{	   
	var vt = $("#select_all").is(':checked');
	$("input[name^='cart_select']").prop('checked',vt);
	// var checked = !$('#select_all').attr('checked');
	// $("input[name^='cart_select']").attr("checked",!checked); 		 	
	 ajax_cart_list(); // ajax 更新商品价格 和数量		
}
 
var isdel=1; 
// ajax 删除购物车的商品
function ajax_del_cart(ids)
{
	$.ajax({
		type : "POST",
		url:"<?php echo U('Home/Cart/ajaxDelCart');?>",//+tab,
		data:{ids:ids}, // 
	    dataType:'json',		
		success: function(data){
		   if(data.status == 1){
			   $('.fn-delete-alert').show();
			   $('.fn-delete-alert').find('.ng-binding').html(isdel);
			   isdel++;
			   ajax_cart_list(); // ajax 请求获取购物车列表		
		   }else{
			   alert(data.msg);
		   }	   			   
		}
	});
}

// 批量删除购物车的商品
function del_cart_more()
{
	if(!confirm('确定要删除吗?')) 
	  return false;
	// 循环获取复选框选中的值  
	var chk_value = [];
	$('input[name^="cart_select"]:checked').each(function(){
		var s_name = $(this).attr('name');
		var id = s_name.replace('cart_select[','').replace(']','');		
		chk_value.push(id);
	}); 
	// ajax  调用删除
	if(chk_value.length > 0)
		ajax_del_cart(chk_value.join(','));
}

$('.gwc-qjs').click(function(){
	var user_id = '<?php echo ($user_id); ?>';
	if(user_id == '0'){
	    layer.open({
	        type: 2,
	        title: '<b>登陆TPshop</b>',
	        skin: 'layui-layer-rim',
	        shadeClose: true,
	        shade: 0.5,
	        area: ['490px', '460px'],
	        content: "<?php echo U('Home/User/pop_login');?>", 
	    });
	}else{
		window.location.href = $(this).attr('data-url');
	}
})
</script>
</body>
</html>