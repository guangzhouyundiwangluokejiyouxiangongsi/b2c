<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>tpshop商家管理后台</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
 	<link href="/Public/bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 --
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="/Public/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
    	folder instead of downloading all of them to reduce the load. -->
    <link href="/Public/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="/Public/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />   
    <!-- jQuery 2.1.4 -->
    <script src="/Public/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="/Public/js/global.js"></script>
    <script src="/Public/js/myFormValidate.js"></script>    
    <script src="/Public/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/Public/js/layer/layer-min.js"></script><!-- 弹窗js 参考文档 http://layer.layui.com/-->
    <script src="/Public/js/myAjax.js"></script>
    <script type="text/javascript">
    function delfunc(obj){
    	layer.confirm('确认删除？', {
    		  btn: ['确定','取消'] //按钮
    		}, function(){
    		    // 确定
   				$.ajax({
   					type : 'post',
   					url : $(obj).attr('data-url'),
   					data : {act:'del',del_id:$(obj).attr('data-id')},
   					dataType : 'json',
   					success : function(data){
   						if(data==1){
   							layer.msg('操作成功', {icon: 1});
   							$(obj).parent().parent().remove();
   						}else{
   							layer.msg(data, {icon: 2,time: 2000});
   						}
   						layer.closeAll();
   					}
   				})
    		}, function(index){
    			layer.close(index);
    			return false;// 取消
    		}
    	);
    }
    
    function selectAll(name,obj){
    	$('input[name*='+name+']').prop('checked', $(obj).checked);
    }    
	
    function get_help(obj){
        layer.open({
            type: 2,
            title: '帮助手册',
            shadeClose: true,
            shade: 0.3,
            area: ['70%', '80%'],
            content: $(obj).attr('data-url'), 
        });
    }	
    </script>        
  </head>
  <body style="background-color:#ecf0f5;">
 

<div class="wrapper">
    <div class="breadcrumbs" id="breadcrumbs">
	<ol class="breadcrumb">
	<?php if(is_array($navigate_admin)): foreach($navigate_admin as $k=>$v): if($k == '后台首页'): ?><li><a href="<?php echo ($v); ?>"><i class="fa fa-home"></i>&nbsp;&nbsp;<?php echo ($k); ?></a></li>
	    <?php else: ?>    
	        <li><a href="<?php echo ($v); ?>"><?php echo ($k); ?></a></li><?php endif; endforeach; endif; ?>          
	</ol>
</div>

    <section class="content" style="padding:0px 15px;">
        <!-- Main content -->
        <div class="container-fluid">
            <div class="pull-right">
                <a href="javascript:history.go(-1)" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="返回"><i class="fa fa-reply"></i></a>
            </div>
            <div class="panel panel-default">           
                <div class="panel-body ">   
                   	<ul class="nav nav-tabs">
						<li class="active"><a href="javascript:void(0)"  data-toggle="tab">店铺装修</a></li> 
					</ul>
                    <!--表单数据-->
                    <form method="post" id="handlepost" action="">                    
                        <!--通用信息-->
                    <div class="tab-content" style="padding:20px 0px;">                 	  
                        <div class="tab-pane active" id="tab_tongyong">                           
                            <table class="table table-bordered">
                                <tbody> 
                                <tr><td>启用店铺装修：</td>
                                	<td><input type="radio" name="store_decoration_switch" value="<?php echo ($decoration["decoration_id"]); ?>" <?php if($store["store_decoration_switch"] > 0): ?>checked<?php endif; ?>>是<i>&nbsp;&nbsp;&nbsp;&nbsp;</i>
                                		<input type="radio" name="store_decoration_switch" value="0" <?php if($store["store_decoration_switch"] == 0): ?>checked<?php endif; ?>>否
                                	<br/><br/>
                                	<p class="text-warning">选择是否使用店铺装修模板；
									如选择“是”，店铺首页背景、头部、导航以及上方区域都将根据店铺装修模板所设置的内容进行显示；
									如选择“否”根据 “店铺主题” 所选中的系统预设值风格进行显示。</p>
                                	</td>
                                </tr>
                                <tr><td>仅显示装修内容：</td>
                                	<td><input type="radio" name="store_decoration_only" value="1" <?php if($store["store_decoration_only"] == 1): ?>checked<?php endif; ?>>是<i>&nbsp;&nbsp;&nbsp;&nbsp;</i>
                                		<input type="radio" name="store_decoration_only" value="0" <?php if($store["store_decoration_only"] == 0): ?>checked<?php endif; ?>>否
                                	<br/><br/>
                                	<p class="text-warning">该项设置如选择“是”，则店铺首页仅显示店铺装修所设定的内容；
										如选择“否”则按标准默认风格模板延续显示页面下放内容，即左侧店铺导航、销售排行，右侧轮换广告、最新商品、推荐商品等相关店铺信息。</p>
                                	</td>

                                </tr>
                                <tr>
                                    <td>店铺装修：</td>
                                    <td><a href="<?php echo U('Decoration/decoration_edit',array('decoration_id'=>$decoration[decoration_id]));?>" target="_blank" class="btn btn-info">装修页面</a><i>&nbsp;&nbsp;&nbsp;&nbsp;</i>
                                    	<a href="<?php echo U('Home/Store/decoration_preview',array('decoration_id'=>$decoration[decoration_id],'store_id'=>$store[store_id]));?>" target="_blank" class="btn btn-warning">预览页面</a>
                                    	<br/><br/>
                                    	<p class="text-warning">
                                    	点击“装修页面”按钮，在新窗口对店铺首页进行装修设计；
										预览效果满意后，点击“生成页面”按钮则可将预览效果保存为您的“店铺装修”风格模板。</p>
                                    </td>
                                </tr>   
            
                                </tbody> 
                                <tfoot>
                                	<tr>
                                	<td></td>
                                	<td class="text-center">
                                		<input class="btn btn-success" type="button" onclick="adsubmit()" value="保存">
                                	</td>
                                	</tr>
                                </tfoot>                               
                                </table>
                        </div>                           
                    </div>              
			    	</form><!--表单数据-->
                </div>
            </div>
        </div>
    </section>
</div>

<script>
function adsubmit(){
	$('#handlepost').submit();
}

function goset(obj){
	window.location.href = $(obj).attr('data-url');
}

function callback1(img_str){
	$('input[name="store_logo"]').val(img_str);
	$('#store_logo').attr('src',img_str);
}

function callback2(img_str){
	$('input[name="store_banner"]').val(img_str);
	$('#store_banner').attr('src',img_str);
}
</script>
</body>
</html>