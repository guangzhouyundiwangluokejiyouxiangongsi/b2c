<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>登录-<?php echo ($tpshop_config['shop_info_store_title']); ?></title>
<meta http-equiv="keywords" content="<?php echo ($tpshop_config['shop_info_store_keyword']); ?>" />
<meta name="description" content="<?php echo ($tpshop_config['shop_info_store_desc']); ?>" />
<link rel="stylesheet" type="text/css" href="/Template/pc/soubao/Static/css/login.css">
<link rel="stylesheet" type="text/css" href="/Template/pc/soubao/Static/css/common.min.css">
<script type="text/javascript" src="/Public/js/jquery-1.10.2.min.js"></script>
</head>
<body>
<div class="header area"> <a href="/index.php" class="logo_s" title="首页" style="margin: 10px 0;height: 59px; "><img style="margin-top: 10px;" src="<?php echo ($tpshop_config['shop_info_store_logo']); ?>"/></a> </div>
<div class="m-login" style="background-color: #e9e9e9;" id="divMLogin">
  <div class="login-wrap">
    <div class="banner"> <a href="#" id="aBanner"><img src="/Template/pc/soubao/Static/images/yongxin800_454.jpg" width="620" height="410"/></a> </div>
    <div class="login-form">
      <div class="title oh">
        <h1 class="fl">登录TPshop</h1>
        <div class="regist-link fr"> <a href="<?php echo U('Home/User/reg');?>">免费注册</a> </div>
      </div>
      <div class="u-msg-wrap">
        <div class="msg msg-warn" style="display:none;"> <i></i>
          <span>公共场所不建议自动登录，以防帐号丢失</span>
        </div>
        <div class="msg msg-err" style="display:none;"> <i></i>
          <span class="J-errorMsg"></span>
        </div>
      </div>
      <form id="login-form" method="post">
      	<p class="co_ye">测试账号:13800138006 &nbsp;&nbsp; 测试密码:123456</p>
        <div class="u-input mb20">
          <label class="u-label u-name"></label>
          <input type="text" class="u-txt J-input-txt" value="" placeholder="手机号/邮箱" name="username" id="username" autocomplete="off">
        </div>
        <div class="u-input mb15">
          <label class="u-label u-pwd"></label>
          <input type="password" class="u-txt J-input-txt" placeholder="密码"  name="password" id="password" autocomplete="off">
        </div>
        <div class="u-input mb15">
			<input type="text" placeholder="不区分大小写" name="verify_code" id="verify_code" class="u-txt J-input-txt" style="width:100px; padding:10px;"/>
            <img    onclick="verify(this);" width="140" height="42" src="/index.php/Home/User/verify.html" id="verify_code_img" class="po-ab to0">
            <a><img onclick="verify(this);" src="/Template/pc/soubao/Static/images/chg_image.png" class="ma-le-142 po-ab to18"></a>
        </div>        
        <div class="u-safe">
          <span class="auto">
          <label>
          	<input type="hidden" name="referurl" id="referurl" value="<?php echo ($referurl); ?>">
            <input type="checkbox" class="u-ckb J-auto-rmb"  name="remember">自动登录</label>
          </span>
          <span class="forget"><a href="<?php echo U('Home/User/forget_pwd');?>">忘记密码？</a></span>
        </div>         
        <div class="u-btn mb20 mt20"> <a href="javascript:void(0);" onClick="checkSubmit();" class="J-login-submit" name="sbtbutton">登&nbsp;&nbsp;&nbsp;&nbsp;录</a> </div>
      </form>
      <dl class="account">
        <dt class="mr20">使用合作网站帐号登录TPshop:</dt>
          <?php
 $md5_key = md5("select * from __PREFIX__plugin where type='login' AND status = 1"); $result_name = $sql_result_v = S("sql_".$md5_key); if(empty($sql_result_v)) { $Model = new \Think\Model(); $result_name = $sql_result_v = $Model->query("select * from __PREFIX__plugin where type='login' AND status = 1"); S("sql_".$md5_key,$sql_result_v,1); } foreach($sql_result_v as $k=>$v): if($v['code'] == 'qq'): ?><dd><a href="<?php echo U('LoginApi/login',array('oauth'=>'qq'));?>" class="qq" title="QQ"></a></dd><?php endif; ?>
              <?php if($v['code'] == 'weixin'): ?><dd><a href="<?php echo U('LoginApi/login',array('oauth'=>'weixin'));?>" class="qq weixin" title="weixin"></a></dd><?php endif; ?>
              <?php if($v['code'] == 'alipay'): ?><dd><a href="<?php echo U('LoginApi/login',array('oauth'=>'alipay'));?>" class="qq pay" title="支付宝"></a></dd><?php endif; endforeach; ?>
      </dl>
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
 <script>
	function checkSubmit()
	{
		$('.msg-err').hide();
		$('.J-errorMsg').empty();
		var username = $.trim($('#username').val());
		var password = $.trim($('#password').val());
		var referurl = $('#referurl').val();
		var verify_code = $.trim($('#verify_code').val());
		if(username == ''){
			showErrorMsg('用户名不能为空!');
			return false;
		}
		if(!checkMobile(username) && !checkEmail(username)){
			showErrorMsg('账号格式不匹配!');
			return false;
		}
		if(password == ''){
			showErrorMsg('密码不能为空!');
			return false;
		}
		if(verify_code == ''){
			showErrorMsg('验证码不能为空!');
			return false;
		}
		//$('#login-form').submit();
		$.ajax({
			type : 'post',
			url : '/index.php?m=Home&c=User&a=do_login&t='+Math.random(),
			data : {username:username,password:password,referurl:referurl,verify_code:verify_code},	
			dataType : 'json',
			success : function(res){
				if(res.status == 1){
					window.location.href = res.url;
				}else{
					showErrorMsg(res.msg);
					verify();
				}
			},
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				showErrorMsg('网络失败，请刷新页面后重试');
			}
		})
		
	}
	
    function checkMobile(tel) {
        var reg = /(^1[3|4|5|7|8][0-9]{9}$)/;
        if (reg.test(tel)) {
            return true;
        }else{
            return false;
        };
    }
    
    function checkEmail(str){
        var reg = /^([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
        if(reg.test(str)){
            return true;
        }else{
            return false;
        }
    }
    
    function showErrorMsg(msg){
    	$('.msg-err').show();
    	$('.J-errorMsg').html(msg);
    }
    
    function verify(){
        $('#verify_code_img').attr('src','/index.php?m=Home&c=User&a=verify&r='+Math.random());
     }
</script>
</body>
</html>